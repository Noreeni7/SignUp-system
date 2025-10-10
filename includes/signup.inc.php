<?php

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $username = $_POST["username"];
    $password = $_POST["pwd"];
    $email = $_POST["email"];

    try {

        // --- Include necessary files for the signup process ---

        // Connects to the database.
        // This file creates the $pdo variable so other files can talk to the database.
        require_once 'dbh.inc.php';

        // Contains the functions that directly handle the database operations (the Model).
        // For example: saving a new user or checking if a username already exists.
        require_once 'signup_model.inc.php';

        // Contains the logic (the Controller) that handles user input and validation.
        // For example: checking if fields are empty, or calling the model to insert the user.
        require_once 'signup_contr.inc.php';


        // ERROR HANDLERS
        $errors = [];

        if (is_input_empty($username, $password, $email)) {
            $errors["empty_input"] = "Fill in all fields!";
        }

        if (is_email_invalid ($email)) {
            $errors["invalid_email"] = "Email is invalid!";
        }

        if (is_username_taken($pdo, $username)) {
            $errors["username_taken"] = "Username is already taken";
        }

        if (is_email_registered($pdo, $email)) {
            $errors["email_used"] = "Email already registered";
        }

        require_once 'config_session.inc.php';

        // --- If there are errors, send them back to the signup page ---
        if ($errors) {
            $_SESSION["signup_errors"] = $errors;
            header("Location: ../index.php");
            die();
        }

        // If no errors → Create user
create_user($pdo, $username, $password, $email);
      

    } catch (PDOException $e) {
        die("Query failed: " . $e->getMessage());
    }
} else {
    header("Location: ../index.php");
    die();
}
