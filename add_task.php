<?php
require 'db.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $task_name = $_POST['task_name'];
    $description = $_POST['description'];

    $sql = "INSERT INTO tasks (task_name, description) VALUES ('$task_name', '$description')";
    if ($conn->query($sql)) {
        header("Location: index.php");
    } else {
        echo "Error: " . $conn->error;
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Task</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <style>
        body {
            background-color: #F5F5DC; /* Beige color */
        }
    </style>
</head>
<body>
    <div class="container mt-5">
        <h1 class="text-center">Add New Task</h1>
        <div class="card mt-4 shadow-sm">
            <div class="card-body">
                <form method="post">
                    <div class="form-group">
                        <label for="task_name">Task Name <span class="text-danger">*</span></label>
                        <input type="text" id="task_name" name="task_name" class="form-control" placeholder="Enter task name" required>
                    </div>
                    <div class="form-group">
                        <label for="description">Description</label>
                        <textarea id="description" name="description" class="form-control" rows="4" placeholder="Enter task description"></textarea>
                    </div>
                    <div class="text-center">
                        <button type="submit" class="btn btn-primary">Add Task</button>
                        <a href="index.php" class="btn btn-secondary">Cancel</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.4.4/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
