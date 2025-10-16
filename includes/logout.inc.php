<?php
// ============================== HANDLES USER LOGOUT AND ENDS THE SESSION ========================

session_start(); // Start or resume the session
session_unset(); // Remove all session variables
session_destroy(); // Destroy the session completely

// Redirect back to the homepage or login page
header("Location: ../index.php");
exit();
