<?php
// ========================= DISPLAYS SIGNUP ERROR OR SUCCESS MESSAGES ON THE PAGE ========================

declare(strict_types = 1);

function check_signup_errors()
{

    echo "<div class='mt-3'>";

    if (isset($_SESSION["signup_errors"])) {
        $errors = $_SESSION["signup_errors"];

        foreach ($errors as $error) {
            echo "<p class='text-danger text-center mb-1'>$error</p>";
        }


        echo '</div>';

        unset($_SESSION["signup_errors"]);
    } else if (isset($_GET["signup"]) && $_GET["signup"] === "success") {
        echo '<br>';
        echo "<p class='text-success text-center'>SignUp success!</p>";
    }
}
