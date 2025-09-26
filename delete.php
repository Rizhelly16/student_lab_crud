<?php
require_once 'db_connect.php';

if (isset($_GET['sid'])) {
    $deleteID = $_GET['sid'];
    $dbConn->query("DELETE FROM students WHERE id=$deleteID");
}

header("Location: index.php");
exit;
?>
