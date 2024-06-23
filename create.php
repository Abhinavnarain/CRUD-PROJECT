<?php
require 'db.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $title = $_POST['title'];
    $description = $_POST['description'];
    $due_date = $_POST['due_date'];

    $sql = "INSERT INTO tasks (title, description, due_date) VALUES ('$title', '$description', '$due_date')";
    if ($conn->query($sql) === TRUE) {
        header("Location: index.php");
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}

$conn->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Add Task</title>
    <link rel="stylesheet" href="css/styles.css">
</head>
<body>
    <h1>Add Task</h1>
    <form action="create.php" method="POST">
        <label for="title">Title:</label>
        <input type="text" name="title" required><br>
        <label for="description">Description:</label>
        <textarea name="description" required></textarea><br>
        <label for="due_date">Due Date:</label>
        <input type="date" name="due_date" required><br>
        <input type="submit" value="Add Task">
    </form>
    <a href="index.php">Back to Task List</a>

    <script src="js/script.js"></script>
</body>
</html>
