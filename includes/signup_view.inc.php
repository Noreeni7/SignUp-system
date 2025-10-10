<?php

declare(strict_types=1);

function check_signup_errors() {

    echo '<div class="text-danger text-center mt-3" >';

    if (isset($_SESSION["signup_errors"])) {
        $errors = $_SESSION["signup_errors"];

        foreach ($errors as $error) {
            echo $error;
        }
    }

    echo '</div>';

    unset($_SESSION["signup_errors"]);
}