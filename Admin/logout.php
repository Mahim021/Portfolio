<?php
// cookie for visit tracking
if (!isset($_COOKIE['visits'])) {
    setcookie("visits", 1, time() + (30 * 24 * 60 * 60), "/");
} else {
    setcookie("visits", $_COOKIE['visits'] + 1, time() + (30 * 24 * 60 * 60), "/");
}

session_start();
session_unset();
session_destroy(); 
header("Location: login.php"); 
exit;
?>