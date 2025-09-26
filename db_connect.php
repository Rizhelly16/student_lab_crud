<?php
// Database connection script
$hostName = "localhost";
$dbUser   = "root";
$dbPass   = "";
$dbName   = "student_lab";

// Establish connection
$dbConn = new mysqli($hostName, $dbUser, $dbPass, $dbName);

// Validate connection
if ($dbConn->connect_errno) {
    die("Unable to connect to database: " . $dbConn->connect_error);
}
?>
