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

$stmt = $conn->prepare("SELECT * FROM projects WHERE id=?");
$stmt->bind_param("i", $id);
$stmt->execute();
$project = $stmt->get_result()->fetch_assoc();

if (!$project) {
    header("Location: dashboard.php?msg=Project+Not+Found");
    exit;
}

if (isset($_POST['confirm'])) {
    $stmt = $conn->prepare("DELETE FROM projects WHERE id=?");
    $stmt->bind_param("i", $id);
    if ($stmt->execute()) {
        header("Location: dashboard.php?msg=Project+Deleted+Successfully");
        exit;
    } else {
        $error = "Error deleting project: " . $stmt->error;
    }
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Delete Project</title>
</head>

<body>
    <h1>Delete Project</h1>

    <?php if (!empty($error)) echo "<p style='color:red;'>$error</p>"; ?>

    <p>Are you sure you want to delete this project?</p>
    <p><strong><?= htmlspecialchars($project['project_title']) ?></strong></p>
    <img src="<?= htmlspecialchars($project['project_image']) ?>" width="200"><br><br>

    <form method="POST">
        <button type="submit" name="confirm">Yes, Delete</button>
        <a href="dashboard.php">Cancel</a>
    </form>
</body>

</html>