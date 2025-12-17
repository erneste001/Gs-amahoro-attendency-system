<?php
session_start();
include('connection.php');

if (!isset($_SESSION['email'])) {
    header("Location: login.php");
    exit();
}

$today = date('Y-m-d');
$dayOfWeek = date('l');

$level = $_POST['level'] ?? '';
$levels_type = $_POST['levels_type'] ?? '';
$class_section = $_POST['class_section'] ?? '';

$message = "";

$attendanceExists = false;
if ($level && $levels_type && $class_section) {
    $stmtCheck = $pdo->prepare("SELECT COUNT(*) FROM save WHERE level_type=? AND class_level=? AND class_name=? AND date=?");
    $stmtCheck->execute([$level, $levels_type, $class_section, $today]);
    $attendanceExists = $stmtCheck->fetchColumn() > 0;
}

if ($_SERVER['REQUEST_METHOD'] === 'POST' && $level && $levels_type && $class_section && !$attendanceExists) {
    if (!in_array($dayOfWeek, ['Monday','Tuesday','Wednesday','Thursday','Friday'])) {
        $message = "Attendance can only be submitted Monday to Friday.";
    } else {
        $stmtStudents = $pdo->prepare("SELECT * FROM students WHERE level_type=? AND class_level=? AND class_name=?");
        $stmtStudents->execute([$level, $levels_type, $class_section]);
        $students = $stmtStudents->fetchAll(PDO::FETCH_ASSOC);

        if (!empty($students)) {
            $submittedAttendance = json_decode($_POST['attendance'] ?? '{}', true);
            $countRecorded = 0;

            $stmtInsert = $pdo->prepare("
                INSERT INTO save (student_id, student_name, level_type, class_level, class_name, classyear, status, date, day)
                VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?)
                ON DUPLICATE KEY UPDATE status=VALUES(status)
            ");

            foreach ($students as $stu) {
                $status = $submittedAttendance[$stu['id']] ?? 'Absent';
                $stmtInsert->execute([
                    $stu['id'],
                    $stu['student_name'],
                    $stu['level_type'],
                    $stu['class_level'],
                    $stu['class_name'],
                    $stu['classyear'] ?? '',
                    $status,
                    $today,
                    $dayOfWeek
                ]);
                $countRecorded++;
            }

            if ($countRecorded > 0) {
                $message = "Attendance submitted successfully for $countRecorded students.";
            }
        }
    }
} elseif ($attendanceExists) {
    $message = "Attendance for this class has already been recorded today. You cannot submit again.";
}

$query = "
SELECT s.*, IFNULL(a.status,'Absent') AS status_today
FROM students s
LEFT JOIN save a ON s.id=a.student_id AND a.date=:today
WHERE 1=1
";
$params = ['today'=>$today];
if ($level != '') { $query .= " AND s.level_type=:level"; $params['level']=$level; }
if ($levels_type != '') { $query .= " AND s.class_level=:levels_type"; $params['levels_type']=$levels_type; }
if ($class_section != '') { $query .= " AND s.class_name=:class_section"; $params['class_section']=$class_section; }

$stmt = $pdo->prepare($query);
$stmt->execute($params);
$students = $stmt->fetchAll(PDO::FETCH_ASSOC);

$attendance = [];
foreach ($students as $stu) {
    $attendance[$stu['id']] = $stu['status_today'];
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Attendance</title>
<link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&display=swap" rel="stylesheet">
<style>
body { font-family: 'Calibri', sans-serif; background:black; margin:0; padding:20px; position:relative;}
body::before { content:""; position:absolute; top:0; left:0; width:100%; height:100%; background:blue; opacity:0.5; pointer-events:none;}
.attendance-container { max-width:1000px; margin:auto; background:black; padding:20px; border-radius:12px; opacity:0.9; position:relative;}
.attendance-container::before { content:""; position:absolute; top:0; left:0; width:100%; height:100%; background:blue; opacity:0.3; pointer-events:none;}
form { display:flex; gap:10px; justify-content:center; flex-wrap:wrap; margin-bottom:20px;}
form select, form input { padding:8px; border-radius:6px; border:1px solid #ccc;}
form button { padding:8px 15px; border-radius:6px; border:none; background:red; color:white; cursor:pointer;}
.table-container{ overflow-y:auto; max-height:400px; border-radius:10px; background: rgba(0,0,0,0.1);}
table { width:100%; border-collapse:collapse; color:white; margin-bottom:20px;}
thead tr { color:#FFD700;}
th, td { padding:12px; text-align:center; border-bottom:1px solid #ddd;}
tr:hover { background:#112;}
button.present,.back { background:#28a745; width:100px; height:30px; border:none; border-radius:10px; color:white; margin-right:3px;}
button.absent { background:#dc3545; width:100px; height:30px; border:none; border-radius:10px; color:white;}
#submitAttendance { display:block; margin:20px auto; padding:12px 25px; font-size:16px; background:#112; color:#FFD700; border:none; border-radius:8px; cursor:pointer;}
.totals { text-align:center; font-size:18px; color:#FFD700; margin-bottom:15px;}
@media screen and (max-width:768px){th,td{padding:8px;font-size:14px;} button.present,button.absent{padding:5px 8px;font-size:12px;} #submitAttendance{width:90%; font-size:14px; padding:10px;}}

.vid{position:fixed; top:0; left:0; width:100vw; height:100vh; pointer-events:none; object-fit:cover; z-index:-1000;}
</style>
</head>
<body>
<iframe id="myVideo" class="vid" width="100%" height="100%" frameborder="0" allow="autoplay; fullscreen" allowfullscreen src="https://www.youtube.com/embed/u8t1uWw34CI?controls=0&modestbranding=1&rel=0&showinfo=0"></iframe>
<button id="playBtn" style="position:absolute; margin-top:400px; width:120px; height:30px; background:red; color:white; border:none; border-radius:10px;">Play Video</button>

<div class="attendance-container">
<h2>Gs Amahoro Attendance List</h2>

<form method="POST" action="attendency.php">
<select id="getLevels" name="level" required>
<option value="">Select Level</option>
<option value="Primary" <?= ($level=='Primary')?'selected':'' ?>>Primary</option>
<option value="Pre-Primary" <?= ($level=='Pre-Primary')?'selected':'' ?>>Pre-Primary</option>
<option value="Secondary" <?= ($level=='Secondary')?'selected':'' ?>>Secondary</option>
</select>
<input name="levels_type" type="text" placeholder="Enter Level Type (P1, S2...)" value="<?= htmlspecialchars($levels_type) ?>" required/>
<select name="class_section" required>
<option value="">Select Section</option>
<option value="A" <?= ($class_section=='A')?'selected':'' ?>>A</option>
<option value="B" <?= ($class_section=='B')?'selected':'' ?>>B</option>
<option value="C" <?= ($class_section=='C')?'selected':'' ?>>C</option>
</select>
<button type="submit">Attend</button>
</form>

<div class="table-container">
<table id="tables">
<thead>
<tr>
<th>Student ID</th>
<th>Name</th>
<th>Level</th>
<th>Level Type</th>
<th>Section</th>
<th>Actions</th>
<th>Status</th>
</tr>
</thead>
<tbody>
<?php foreach($students as $row): ?>
<tr>
<td><?= $row['id'] ?></td>
<td><?= htmlspecialchars($row['student_name']) ?></td>
<td><?= $row['level_type'] ?></td>
<td><?= $row['class_level'] ?></td>
<td><?= $row['class_name'] ?></td>
<td>
<button class="present" onclick="markAttendance(<?= $row['id'] ?>,'Present')">Present</button>
<button class="absent" onclick="markAttendance(<?= $row['id'] ?>,'Absent')">Absent</button>
</td>
<td id="status-<?= $row['id'] ?>"><?= $row['status_today'] ?></td>
</tr>
<?php endforeach; ?>
</tbody>
</table>
</div>

<button id="submitAttendance">Submit Attendance</button>
<p id="message" style="text-align:center; color:#FFD700; font-size:18px; margin-top:20px;"><?= $message ?></p>
<button class="back" onclick="window.location.href='index.php'">Back home</button>
</div>

<script>
const playBtn = document.getElementById('playBtn');
const iframe = document.getElementById('myVideo');
playBtn.addEventListener('click',()=>{ iframe.src = "https://www.youtube.com/embed/u8t1uWw34CI?autoplay=1&controls=0&modestbranding=1&rel=0&showinfo=0"; });

let attendance = <?= json_encode($attendance) ?>;

function updateLocalCounts() {
    const levelSelected = document.getElementById("getLevels").value;
    let presentCount = 0;
    let absentCount = 0;
    for (let id in attendance){
        if(attendance[id]==='Present') presentCount++;
        else if(attendance[id]==='Absent') absentCount++;
    }
    let totalPresent = Number(localStorage.getItem(`presents-${levelSelected}`)) || 0;
    let totalAbsent  = Number(localStorage.getItem(`absents-${levelSelected}`)) || 0;
    totalPresent += presentCount;
    totalAbsent  += absentCount;
    localStorage.setItem(`presents-${levelSelected}`, totalPresent);
    localStorage.setItem(`absents-${levelSelected}`, totalAbsent);
}

for (let id in attendance){
    let el = document.getElementById('status-'+id);
    el.innerText = attendance[id];
    el.style.color = (attendance[id]==='Present')?'#28a745':'#dc3545';
}

function markAttendance(studentId,status){
    attendance[studentId] = status;
    let el = document.getElementById('status-'+studentId);
    el.innerText = status;
    el.style.color = (status==='Present')?'#28a745':'#dc3545';
}

if (<?= $attendanceExists ? 'true' : 'false' ?>) {
    document.getElementById('submitAttendance').disabled = true;
    document.getElementById('submitAttendance').style.background = '#555';
    document.getElementById('submitAttendance').style.cursor = 'not-allowed';
}


    const levelSelected = document.getElementById("getLevels").value;
    let presentCount = 0;
    let absentCount = 0;
    for (let id in attendance){
        if(attendance[id]==='Present') presentCount++;
        else if(attendance[id]==='Absent') absentCount++;
    }
    let totalPresent = Number(localStorage.getItem(`presents-${levelSelected}`)) || 0;
    let totalAbsent  = Number(localStorage.getItem(`absents-${levelSelected}`)) || 0;
    totalPresent += presentCount;
    totalAbsent  += absentCount;
    localStorage.setItem(`presents-${levelSelected}`, totalPresent);
    localStorage.setItem(`absents-${levelSelected}`, totalAbsent);
document.getElementById('submitAttendance').addEventListener('click',function(){
    const form = document.createElement('form');
    form.method = 'POST';
    form.action = 'attendency.php';

    const attendanceInput = document.createElement('input');
    attendanceInput.type = 'hidden';
    attendanceInput.name = 'attendance';
    attendanceInput.value = JSON.stringify(attendance);
    form.appendChild(attendanceInput);

    form.appendChild(Object.assign(document.createElement('input'), {type:'hidden', name:'level', value:document.getElementById('getLevels').value}));
    form.appendChild(Object.assign(document.createElement('input'), {type:'hidden', name:'levels_type', value:document.querySelector('input[name="levels_type"]').value}));
    form.appendChild(Object.assign(document.createElement('input'), {type:'hidden', name:'class_section', value:document.querySelector('select[name="class_section"]').value}));

    updateLocalCounts(); 
    document.body.appendChild(form);
    form.submit();
});
</script>
</body>
</html>
