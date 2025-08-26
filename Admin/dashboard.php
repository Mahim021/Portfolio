<?php
session_start();
if (!isset($_SESSION['admin'])) {
    header("Location: login.php");
    exit;
}
require "../config.php";

// Handle messages
$msg = "";
if (isset($_GET['msg'])) {
    $msg = htmlspecialchars($_GET['msg']);
}

// Fetch all projects
$result = getProjects($conn);
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Admin Dashboard</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background: #f7f7f7;
            margin: 0;
            padding: 20px;
        }

        h1 {
            text-align: center;
            color: #333;
        }

        .top-links {
            text-align: center;
            margin-bottom: 20px;
        }

        .top-links a {
            text-decoration: none;
            color: #007bff;
            margin: 0 10px;
            font-weight: bold;
        }

        .top-links a:hover {
            text-decoration: underline;
        }

        .msg {
            text-align: center;
            margin-bottom: 15px;
            color: green;
            font-weight: bold;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            background: #fff;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }

        th,
        td {
            padding: 12px 15px;
            text-align: center;
        }

        th {
            background: #007bff;
            color: white;
        }

        tr:nth-child(even) {
            background: #f2f2f2;
        }

        tr:hover {
            background: #d9edf7;
        }

        td img {
            max-width: 100px;
            border-radius: 5px;
        }

        a.action-link {
            color: #007bff;
            text-decoration: none;
            margin: 0 5px;
        }

        a.action-link:hover {
            text-decoration: underline;
        }
    </style>
</head>

<body>
    <h1>Admin Dashboard</h1>

    <?php if ($msg): ?>
        <p class="msg"><?= $msg ?></p>
    <?php endif; ?>

    <div class="top-links">
        <a href="add_project.php">Add New Project</a> |
        <a href="logout.php">Logout</a>
    </div>

    <table>
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
                    <td><img src="<?= htmlspecialchars($row['project_image']) ?>" alt="Project Image"></td>
                    <td><a href="<?= htmlspecialchars($row['link1']) ?>" target="_blank">Github</a></td>
                    <td><a href="<?= htmlspecialchars($row['link2']) ?>" target="_blank">LinkedIn</a></td>
                    <td>
                        <a class="action-link" href="edit_project.php?id=<?= $row['id'] ?>">Edit</a> |
                        <a class="action-link" href="delete_project.php?id=<?= $row['id'] ?>" onclick="return confirm('Are you sure?');">Delete</a>
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