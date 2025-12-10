<?php
include('connection.php');

$level = $_POST['level'] ?? '';

switch ($level) {
    case 'primary':
        $level = 'Primary';
        break;
    case 'secondary':
        $level = 'Secondary';
        break;
    default:
        $level = '';
}

$query = "SELECT 
            id AS student_id, 
            classyear AS year, 
            student_name, 
            class_name 
          FROM students 
          WHERE 1=1";

if ($level != '') {
    $query .= " AND level_type = '$level'";
}

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
        color: #333;
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

    table {
        width: 100%;
        border-collapse: collapse;
        margin-bottom: 20px;
    }

    thead tr {
        background: #112;
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

    button {
        padding: 6px 12px;
        margin: 0 3px;
        border: none;
        border-radius: 6px;
        font-weight: bold;
        cursor: pointer;
        transition: all 0.3s ease;
    }

    button.present {
        background-color: #28a745;
        color: white;
    }

    button.absent {
        background-color: #dc3545;
        color: white;
    }

    button:hover {
        opacity: 0.8;
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
        transition: 0.3s;
    }

    #submitAttendance:hover {
        opacity: 0.9;
    }

    @media screen and (max-width: 768px) {
        th, td {
            padding: 8px;
            font-size: 14px;
        }

        button {
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
    <h2>Attendance List</h2>
    <table>
        <thead>
            <tr>
                <th>Student ID</th>
                <th>Year</th>
                <th>Student Name</th>
                <th>Class</th>
                <th>Actions</th>
                <th>Status</th>
            </tr>
        </thead>
        <tbody>
            <?php while($row = mysqli_fetch_assoc($result)): ?>
            <tr>
                <td><?= $row['student_id'] ?></td>
                <td><?= $row['year'] ?></td>
                <td><?= $row['student_name'] ?></td>
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
