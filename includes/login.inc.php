<?php
// ================================== HANDLES USER LOGIN VALIDATION AND REDIRECTION ========================


if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $username = $_POST["username"];
    $pwd = $_POST["pwd"];

    try {
        require_once 'dbh.inc.php';
        require_once 'login_model.inc.php';
        require_once 'login_contr.inc.php';

        // ERROR HANDLERS
        $errors = [];

        if (is_input_empty($pdo, $username, $pwd)) {
            $errors["empty_input"] = "Fill in all inputs"; 
        }

        $result = get_user($pdo, $username);

        if (is_username_wrong($result)) {
            $errors["login_incorrect"] = "Incorrect login info";
        }

        if (!is_username_wrong($result) && is_password_wrong($pwd, $result["pwd"])) {
            $errors["login_incorrect"] = "Incorrect login info";
        }

        require_once 'config_session.inc.php';

        if ($errors) {
            $_SESSION["error_login"] = $errors;
            header("Location: ../index.php");
            die();
        }

        header("Location: ../index.php?login=success");
        $pdo = null;
        $stmt = null;

        die();

    } catch (PDOException $e) {
        echo ("Connection failed: " . $e->getMessage());
        die();
    }
} else
    header("Location: ../index.php");
die();
