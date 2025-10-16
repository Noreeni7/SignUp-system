<?php
// ============================== HANDLES LOGIN VALIDATION LOGIC AND PASSWORD CHECKS ==============================

declare(strict_types=1);

function is_input_empty(object $pdo, string $username, string $pwd) {
    if (empty($username) || empty($pwd)) {
        return true;
    }else {
        return false;
    }
}

function is_username_wrong(bool|array $results) {
    if (!$results) {
        return true;
    } else {
        return false;
    }
}

function is_password_wrong (string $pwd, string $hashedPwd) {
    if (!password_verify($pwd, $hashedPwd)) {
        return true;
    }
    else{
        return false;
    }
}

