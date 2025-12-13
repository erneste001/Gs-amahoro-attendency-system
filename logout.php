<?php
session_start();

$_SESSION = [];          // Clear all session variables
session_destroy();       // Destroy the session

header("Location: login.php"); // or wherever you want
exit;
