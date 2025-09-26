<?php
require_once 'db_connect.php';

$id = $_GET['sid'] ?? null;
if (!$id) {
    header("Location: index.php");
    exit;
}

$query = $dbConn->query("SELECT * FROM students WHERE id = $id");
$student = $query->fetch_assoc();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $newName   = $_POST['studentName'];
    $newEmail  = $_POST['studentEmail'];
    $newCourse = $_POST['studentCourse'];

    $updateSQL = "UPDATE students SET name='$newName', email='$newEmail', course='$newCourse' WHERE id=$id";
    if ($dbConn->query($updateSQL)) {
        header("Location: index.php");
        exit;
    }
}
?>
<!DOCTYPE html>
<html>
<head>
    <title>Edit Student</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css">
</head>
<body class="container mt-4">
    <h2>Edit Student</h2>
    <form method="POST">
        <div class="mb-3">
            <label>Name:</label>
            <input type="text" class="form-control" name="studentName" value="<?= $student['name'] ?>" required>
        </div>
        <div class="mb-3">
            <label>Email:</label>
            <input type="email" class="form-control" name="studentEmail" value="<?= $student['email'] ?>" required>
        </div>
        <div class="mb-3">
            <label>Course:</label>
            <input type="text" class="form-control" name="studentCourse" value="<?= $student['course'] ?>" required>
        </div>
        <button type="submit" class="btn btn-primary">Update</button>
        <a href="index.php" class="btn btn-secondary">Cancel</a>
    </form>
</body>
</html>
