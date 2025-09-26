<?php require_once 'db_connect.php'; ?>
<!DOCTYPE html>
<html>
<head>
    <title>Student Records CRUD</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css">
</head>
<body class="container mt-4">

    <h2 class="text-center mb-4">Student Records</h2>

    <!-- Add Student Form -->
    <div class="card mb-4">
        <div class="card-header">Add Student</div>
        <div class="card-body">
            <form method="POST" action="insert.php">
                <div class="mb-3">
                    <label for="studentName">Name:</label>
                    <input type="text" class="form-control" name="studentName" required>
                </div>
                <div class="mb-3">
                    <label for="studentEmail">Email:</label>
                    <input type="email" class="form-control" name="studentEmail" required>
                </div>
                <div class="mb-3">
                    <label for="studentCourse">Course:</label>
                    <input type="text" class="form-control" name="studentCourse" required>
                </div>
                <button type="submit" class="btn btn-success">Save</button>
            </form>
        </div>
    </div>

    <!-- Display Students -->
    <table class="table table-striped table-bordered">
        <thead class="table-dark">
            <tr>
                <th>ID</th><th>Name</th><th>Email</th><th>Course</th><th>Actions</th>
            </tr>
        </thead>
        <tbody>
        <?php
            $records = $dbConn->query("SELECT * FROM students ORDER BY id ASC");
            while ($student = $records->fetch_assoc()) {
        ?>
            <tr>
                <td><?= $student['id'] ?></td>
                <td><?= $student['name'] ?></td>
                <td><?= $student['email'] ?></td>
                <td><?= $student['course'] ?></td>
                <td>
                    <a href="update.php?sid=<?= $student['id'] ?>" class="btn btn-warning btn-sm">Edit</a>
                    <a href="delete.php?sid=<?= $student['id'] ?>" 
                       class="btn btn-danger btn-sm"
                       onclick="return confirm('Delete this record?');">Delete</a>
                </td>
            </tr>
        <?php } ?>
        </tbody>
    </table>
</body>
</html>
