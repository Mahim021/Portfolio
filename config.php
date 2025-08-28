<?php
$servername = "localhost";
$username   = "root";
$password   = ""; 
$dbname     = "portfolio_db"; 

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

function getProjects($conn)
{
    return $conn->query("SELECT * FROM projects ORDER BY id");
}
