<?php
session_start();
if (!isset($_SESSION['admin'])) {
    header("Location: login.php");
    exit;
}
require "../config.php";

if (!isset($_GET['id'])) {
    header("Location: dashboard.php?msg=Invalid+Project+ID");
    exit;
}

$id = intval($_GET['id']);

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $title = $_POST['title'];
    $image = $_POST['image'];
    $link1 = $_POST['link1'];
    $link2 = $_POST['link2'];

    $stmt = $conn->prepare("UPDATE projects SET project_title=?, project_image=?, link1=?, link2=? WHERE id=?");
    $stmt->bind_param("ssssi", $title, $image, $link1, $link2, $id);

    if ($stmt->execute()) {
        header("Location: dashboard.php?msg=Project+Updated+Successfully");
        exit;
    } else {
        $error = "Error: " . $stmt->error;
    }
}

$stmt = $conn->prepare("SELECT * FROM projects WHERE id=?");
$stmt->bind_param("i", $id);
$stmt->execute();
$project = $stmt->get_result()->fetch_assoc();

if (!$project) {
    header("Location: dashboard.php?msg=Project+Not+Found");
    exit;
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Edit Project</title>
</head>

<body>
    <h1>Edit Project</h1>
    <?php if (!empty($error)) echo "<p style='color:red;'>$error</p>"; ?>
    <form method="POST">
        <label>Project Title:</label><br>
        <input type="text" name="title" value="<?= htmlspecialchars($project['project_title']) ?>" required><br><br>

        <label>Image URL/Path:</label><br>
        <input type="text" name="image" value="<?= htmlspecialchars($project['project_image']) ?>" required><br><br>

        <label>Github Link:</label><br>
        <input type="url" name="link1" value="<?= htmlspecialchars($project['link1']) ?>"><br><br>

        <label>LinkedIn Link:</label><br>
        <input type="url" name="link2" value="<?= htmlspecialchars($project['link2']) ?>"><br><br>

        <button type="submit">Update Project</button>
    </form>
    <br>
    <a href="dashboard.php">⬅ Back to Dashboard</a>
</body>

</html>