<?php
require_once 'db_connect.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $studName   = $_POST['studentName'];
    $studEmail  = $_POST['studentEmail'];
    $studCourse = $_POST['studentCourse'];

    $insertSQL = "INSERT INTO students (name, email, course) VALUES ('$studName', '$studEmail', '$studCourse')";
    if ($dbConn->query($insertSQL)) {
        header("Location: index.php");
        exit;
    } else {
        echo "Insert failed: " . $dbConn->error;
    }
}
?>
