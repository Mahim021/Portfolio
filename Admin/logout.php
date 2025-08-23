<?php
session_start();      // Resume the current session
session_unset();      // Remove all session variables
session_destroy();    // Destroy the session completely
header("Location: login.php"); // Redirect to login page
exit;                 // Stop further execution
