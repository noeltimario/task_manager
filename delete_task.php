<?php
require 'db.php';

$id = $_GET['id'];
$sql = "DELETE FROM tasks WHERE id = $id";

if ($conn->query($sql)) {
    header("Location: index.php");
} else {
    echo "Error: " . $conn->error;
}
?>