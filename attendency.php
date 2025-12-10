<?php
include('connection.php');

$level = $_POST['level'] ?? '';
$levels_type = $_POST['levels_type'] ?? '';
$class_section = $_POST['class_section'] ?? '';

$query = "SELECT id AS student_id, student_name, level_type, class_level, class_name 
          FROM students 
          WHERE 1=1";

if ($level != '') $query .= " AND level_type = '$level'";
if ($levels_type != '') $query .= " AND class_level = '$levels_type'";
if ($class_section != '') $query .= " AND class_name = '$class_section'";

$result = mysqli_query($conn, $query);
?>

<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Attendance</title>
<style>
body {
    font-family: Arial, sans-serif;
    background-color: #f5f5f5;
    margin: 0;
    padding: 20px;
}

h2 {
    text-align: center;
    color: black;
    margin-bottom: 30px;
}

.attendance-container {
    max-width: 1000px;
    margin: auto;
    background: #fff;
    padding: 20px;
    border-radius: 12px;
    box-shadow: 0 6px 20px rgba(0,0,0,0.1);
}

form {
    display: flex;
    gap: 10px;
    justify-content: center;
    margin-bottom: 20px;
    flex-wrap: wrap;
}

form select, form input {
    padding: 8px;
    border-radius: 6px;
    border: 1px solid #ccccccff;
}

form button {
    padding: 8px 15px;
    border-radius: 6px;
    border: none;
    background-color: red;
    color: white;
    cursor: pointer;
}

table {
    width: 100%;
    border-collapse: collapse;
    margin-bottom: 20px;
}

thead tr {
    color: #FFD700;
}

th, td {
    padding: 12px;
    text-align: center;
    border-bottom: 1px solid #ddd;
}

tr:hover {
    background: #f0f0f0;
}

button.present,.back {
    background-color: #28a745;
    width:100px;
    height:30px;
    border:none;
    border-radius:10px;
    outline:none;
    color: white;
    margin-right: 3px;
}

button.absent {
        width:100px;
    height:30px;
    border:none;
    border-radius:10px;
    outline:none;
    background-color: #dc3545;
    color: white;
}

#submitAttendance {
    display: block;
    margin: 20px auto;
    padding: 12px 25px;
    font-size: 16px;
    background-color: #112;
    color: #FFD700;
    border: none;
    border-radius: 8px;
    cursor: pointer;
}

@media screen and (max-width: 768px) {
    th, td {
        padding: 8px;
        font-size: 14px;
    }
    button.present, button.absent {
        padding: 5px 8px;
        font-size: 12px;
    }
    #submitAttendance {
        width: 90%;
        font-size: 14px;
        padding: 10px;
    }
}
</style>
</head>
<body>

<div class="attendance-container">
    <h2>Gs Amahoro Attendency List</h2>

    <form method="POST" action="attendency.php">
        <select name="level" required>
            <option value="">Select Level</option>
            <option value="Primary" <?= ($level=='Primary')?'selected':'' ?>>Primary</option>
            <option value="Pre-Primary" <?= ($level=='Pre-Primary')?'selected':'' ?>>Pre-Primary</option>
            <option value="Secondary" <?= ($level=='Secondary')?'selected':'' ?>>Secondary</option>
        </select>

        <input name="levels_type" type="text" placeholder="Enter Level Type (P1, S2...)" value="<?= htmlspecialchars($levels_type) ?>" required />

        <select name="class_section" required>
            <option value="">Select Section</option>
            <option value="A" <?= ($class_section=='A')?'selected':'' ?>>A</option>
            <option value="B" <?= ($class_section=='B')?'selected':'' ?>>B</option>
            <option value="C" <?= ($class_section=='C')?'selected':'' ?>>C</option>
        </select>

        <button type="submit">Attend</button>
    </form>

    <table>
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
            <?php while($row = mysqli_fetch_assoc($result)): ?>
            <tr>
                <td><?= $row['student_id'] ?></td>
                <td><?= $row['student_name'] ?></td>
                <td><?= $row['level_type'] ?></td>
                <td><?= $row['class_level'] ?></td>
                <td><?= $row['class_name'] ?></td>
                <td>
                    <button class="present" onclick="markAttendance(<?= $row['student_id'] ?>,'Present')">Present</button>
                    <button class="absent" onclick="markAttendance(<?= $row['student_id'] ?>,'Absent')">Absent</button>
                </td>
                <td id="status-<?= $row['student_id'] ?>">-</td>
            </tr>
            <?php endwhile; ?>
        </tbody>
    </table>

    <button id="submitAttendance" onclick="submitAttendance()">Submit Attendance</button>
    <button class="back" onclick="window.location.href='index.php'">Back home</button>
</div>

<script>
let attendance = {};

function markAttendance(studentId, status) {
    attendance[studentId] = status;
    const el = document.getElementById('status-' + studentId);
    el.innerText = status;
    el.style.color = (status === 'Present') ? '#28a745' : 'red';
}

function submitAttendance() {
    let presentCount = 0;
    let absentCount = 0;

    for (let id in attendance) {
        if (attendance[id] === 'Present') presentCount++;
        else if (attendance[id] === 'Absent') absentCount++;
    }

    alert(`Total Present: ${presentCount}\nTotal Absent: ${absentCount}`);
    console.log(attendance);
}
</script>

</body>
</html>
