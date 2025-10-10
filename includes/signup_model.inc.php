<?php

// --- Enable strict typing mode ---
// This tells PHP to be strict about the types of data passed to functions.
// For example, if a function expects an integer, PHP will not automatically
// convert a string like "5" into an integer — it will show an error instead.
// This helps catch bugs early and makes the code more reliable.
declare(strict_types=1);

function get_username(object $pdo, string $username)
{
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

function get_email(object $pdo, string $email)
{
    $query = "SELECT email FROM users WHERE email = :email;";

    $stmt = $pdo->prepare($query);
    $stmt->bindParam(":email", $email);
    $stmt->execute();

    $result = $stmt->fetch(PDO::FETCH_ASSOC);

    return $result;
}

function set_user(object $pdo, string $username, string $password, string $email)
{
    $query = "INSERT INTO users (username, pwd, email) VALUES (:username, :pwd, :email);";

    $stmt = $pdo->prepare($query);

    // Set password hashing strength and create a secure hashed version of the user's password.
    // 'cost' => 12 means the hashing will be stronger but take slightly more time to compute.

    $options = [
        'cost' => 12
    ];

    $hashedPwd = password_hash($password, PASSWORD_BCRYPT, $options);

    $stmt->bindParam(":username", $username);
    $stmt->bindParam(":pwd", $hashedPwd);
    $stmt->bindParam(":email", $email);

    $stmt->execute();
}
