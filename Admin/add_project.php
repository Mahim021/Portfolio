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
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add New Project</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background: #f7f7f7;
            margin: 0;
            padding: 0;
            display: flex;
            justify-content: center;
            align-items: flex-start;
            min-height: 100vh;
            padding-top: 50px;
        }

        .form-container {
            background: #fff;
            padding: 30px 40px;
            border-radius: 8px;
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.1);
            width: 100%;
            max-width: 400px;
        }

        h1 {
            text-align: center;
            color: #333;
            margin-bottom: 20px;
        }

        label {
            display: block;
            margin-bottom: 5px;
            font-weight: bold;
            color: #555;
        }

        input {
            width: 100%;
            padding: 10px 12px;
            margin-bottom: 15px;
            border: 1px solid #ccc;
            border-radius: 4px;
            box-sizing: border-box;
        }

        button {
            width: 100%;
            padding: 10px;
            background: #28a745;
            border: none;
            color: white;
            border-radius: 4px;
            cursor: pointer;
            font-size: 16px;
        }

        button:hover {
            background: #218838;
        }

        .error {
            color: red;
            text-align: center;
            margin-bottom: 15px;
        }

        .back-link {
            display: block;
            text-align: center;
            margin-top: 20px;
            color: #007bff;
            text-decoration: none;
        }

        .back-link:hover {
            text-decoration: underline;
        }
    </style>
</head>

<body>
    <div class="form-container">
        <h1>Add New Project</h1>
        <?php if (!empty($error)) echo "<p class='error'>$error</p>"; ?>
        <form method="POST">
            <label>Project Title:</label>
            <input type="text" name="title" required>

            <label>Image URL/Path:</label>
            <input type="text" name="image" required>

            <label>Github Link:</label>
            <input type="url" name="link1">

            <label>LinkedIn Link:</label>
            <input type="url" name="link2">

            <button type="submit">Add Project</button>
        </form>
        <a class="back-link" href="dashboard.php">⬅ Back to Dashboard</a>
    </div>
</body>

</html>