<?php
session_start();
if (!isset($_SESSION['admin'])) {
    header("Location: login.php");
    exit;
}
require "../config.php";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $title = $_POST['title'];
    $image = $_POST['image'];
    $link1 = $_POST['link1'];
    $link2 = $_POST['link2'];

    $stmt = $conn->prepare("INSERT INTO projects (project_title, project_image, link1, link2) VALUES (?, ?, ?, ?)");
    $stmt->bind_param("ssss", $title, $image, $link1, $link2);

    if ($stmt->execute()) {
        header("Location: dashboard.php?msg=Project+Added+Successfully");
        exit;
    } else {
        $error = "Error: " . $stmt->error;
    }
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Add New Project</title>
</head>

<body>
    <h1>Add New Project</h1>
    <?php if (!empty($error)) echo "<p style='color:red;'>$error</p>"; ?>
    <form method="POST">
        <label>Project Title:</label><br>
        <input type="text" name="title" required><br><br>

        <label>Image URL/Path:</label><br>
        <input type="text" name="image" required><br><br>

        <label>Github Link:</label><br>
        <input type="url" name="link1"><br><br>

        <label>LinkedIn Link:</label><br>
        <input type="url" name="link2"><br><br>

        <button type="submit">Add Project</button>
    </form>
    <br>
    <a href="dashboard.php">⬅ Back to Dashboard</a>
</body>

</html>