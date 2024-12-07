<?php
require 'db.php';

$id = $_GET['id'];
$sql = "SELECT * FROM tasks WHERE id = $id";
$result = $conn->query($sql);
$task = $result->fetch_assoc();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $task_name = $_POST['task_name'];
    $description = $_POST['description'];
    $status = $_POST['status'];

    $sql = "UPDATE tasks SET task_name = '$task_name', description = '$description', status = '$status' WHERE id = $id";
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
    <title>Edit Task</title>
</head>
<body>
    <h1>Edit Task</h1>
    <form method="post">
        <label for="task_name">Task Name:</label>
        <input type="text" id="task_name" name="task_name" value="<?= htmlspecialchars($task['task_name']) ?>" required><br>
        <label for="description">Description:</label>
        <textarea id="description" name="description"><?= htmlspecialchars($task['description']) ?></textarea><br>
        <label for="status">Status:</label>
        <select id="status" name="status">
            <option value="todo" <?= $task['status'] === 'todo' ? 'selected' : '' ?>>To Do</option>
            <option value="in-progress" <?= $task['status'] === 'in-progress' ? 'selected' : '' ?>>In Progress</option>
            <option value="completed" <?= $task['status'] === 'completed' ? 'selected' : '' ?>>Completed</option>
        </select><br>
        <button type="submit">Update Task</button>
    </form>
</body>
</html>
