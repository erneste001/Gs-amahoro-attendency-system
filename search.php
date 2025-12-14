<?php
require "connection.php";

if (!isset($_GET['q'])) {
    exit;
}

$q = trim($_GET['q']);

$stmt = $pdo->prepare("
    SELECT student_name 
    FROM students 
    WHERE student_name LIKE ?
    LIMIT 10
");

$stmt->execute([$q . "%"]);

while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
    echo "<div class='item'
            style='padding:8px; cursor:pointer;'
            onclick=\"selectItem('{$row['student_name']}')\">
            {$row['student_name']}
          </div>";
}
?>
