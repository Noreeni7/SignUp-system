
<?php

// --- Database connection setup ---

// The name of the server hosting your database.
// For local development using XAMPP, this is usually 'localhost'.
$servername = 'localhost';

// The name of your database
$dbname = 'signup_system_database';

// The username used to connect to the database.
$dbusername = 'root';

// The password for the database user.
$dbpassword ='';

// --- Try connecting to the database using PDO (PHP Data Objects) ---
try {

    // Create a new PDO instance.
    // This line tries to open a connection to your MySQL database.
    // The 'mysql:host=...' part tells PHP which database type and server to connect to.
    // The 'dbname=...' part specifies which database to use.
    $pdo = new PDO ("mysql:host=$servername;dbname=$dbname",$dbusername,$dbpassword);

    // Tell PDO to throw an exception (error message) if something goes wrong.
    // This helps you see detailed errors instead of silent failures
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    die("Connection failed: " . $e->getMessage());
}
