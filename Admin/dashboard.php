<?php
session_start();
if (!isset($_SESSION['admin'])) {
    header("Location: login.php");
    exit;
}
require "../config.php";

// Handle messages (insert/update/delete feedback)
$msg = "";
if (isset($_GET['msg'])) {
    $msg = htmlspecialchars($_GET['msg']);
}

// Fetch all projects
$result = $conn->query("SELECT * FROM projects ORDER BY id");
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Admin Dashboard</title>
</head>

<body>
    <h1>Admin Dashboard</h1>

    <?php if ($msg): ?>
        <p><?= $msg ?></p>
    <?php endif; ?>

    <p>
        <a href="add_project.php">Add New Project</a> |
        <a href="logout.php">Logout</a>
    </p>

    <table border="1" cellpadding="5" cellspacing="0">
        <tr>
            <th>ID</th>
            <th>Project Title</th>
            <th>Image</th>
            <th>Github</th>
            <th>LinkedIn</th>
            <th>Actions</th>
        </tr>
        <?php if ($result->num_rows > 0): ?>
            <?php while ($row = $result->fetch_assoc()): ?>
                <tr>
                    <td><?= $row['id'] ?></td>
                    <td><?= htmlspecialchars($row['project_title']) ?></td>
                    <td><img src="<?= htmlspecialchars($row['project_image']) ?>" width="100" alt="Project Image"></td>
                    <td><a href="<?= htmlspecialchars($row['link1']) ?>" target="_blank">Github</a></td>
                    <td><a href="<?= htmlspecialchars($row['link2']) ?>" target="_blank">LinkedIn</a></td>
                    <td>
                        <a href="edit_project.php?id=<?= $row['id'] ?>">Edit</a> |
                        <a href="delete_project.php?id=<?= $row['id'] ?>" onclick="return confirm('Are you sure?');">Delete</a>
                    </td>
                </tr>
            <?php endwhile; ?>
        <?php else: ?>
            <tr>
                <td colspan="6">No projects found.</td>
            </tr>
        <?php endif; ?>
    </table>
</body>

</html>