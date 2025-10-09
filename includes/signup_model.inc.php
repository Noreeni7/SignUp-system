<?php

// --- Enable strict typing mode ---
// This tells PHP to be strict about the types of data passed to functions.
// For example, if a function expects an integer, PHP will not automatically
// convert a string like "5" into an integer — it will show an error instead.
// This helps catch bugs early and makes the code more reliable.
declare(strict_types=1);

function get_username(object $pdo, string $username) {
    $query = "SELECT username FROM users WHERE username = :username;";
    
    // Prevents SQL injection
    $stmt = $pdo->prepare($query);

    // Safely connects the user's input to the query
    $stmt->bindParam(":username", $username);

    // Runs the secure query
    $stmt->execute();

    // Get the result from the database (if any)
    $result = $stmt->fetch(PDO::FETCH_ASSOC);

    return $result;
}

function get_email(object $pdo, string $email) {
    $query = "SELECT email FROM users WHERE email = :email;";

    $stmt = $pdo->prepare($query);
    $stmt->bindParam(":email", $email);
    $stmt->execute();

    $result = $stmt->fetch(PDO::FETCH_ASSOC);

    return $result;
}