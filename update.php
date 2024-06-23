<?php
require 'db.php';

$id = $_GET['id'];
$sql = "SELECT * FROM tasks WHERE id=$id";
$result = $conn->query($sql);
$task = $result->fetch_assoc();

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $title = $_POST['title'];
    $description = $_POST['description'];
    $due_date = $_POST['due_date'];

    $sql = "UPDATE tasks SET title='$title', description='$description', due_date='$due_date' WHERE id=$id";
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
    <title>Edit Task</title>
    <link rel="stylesheet" href="css/styles.css">
</head>
<body>
    <h1>Edit Task</h1>
    <form action="update.php?id=<?php echo $id; ?>" method="POST">
        <label for="title">Title:</label>
        <input type="text" name="title" value="<?php echo $task['title']; ?>" required><br>
        <label for="description">Description:</label>
        <textarea name="description" required><?php echo $task['description']; ?></textarea><br>
        <label for="due_date">Due Date:</label>
        <input type="date" name="due_date" value="<?php echo $task['due_date']; ?>" required><br>
        <input type="submit" value="Update Task">
    </form>
    <a href="index.php">Back to Task List</a>

    <script src="js/script.js"></script>
</body>
</html>
