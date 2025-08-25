<?php
$servername = "localhost";
$username   = "root";
$password   = ""; // default password for XAMPP is empty
$dbname     = "portfolio_db"; // my database name

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// 🔹 Reusable function
function getProjects($conn)
{
    return $conn->query("SELECT * FROM projects ORDER BY id");
}
