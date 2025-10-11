<?php

// Include session setup and signup error display files
// config_session.inc.php → starts or configures sessions so we can store messages
// signup_view.inc.php → shows signup errors or success messages on the page
require_once 'includes/config_session.inc.php';
require_once 'includes/signup_view.inc.php';
require_once 'includes/login_view.inc.php';
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <title>Document</title>
</head>

<body>

    <div class="container">

        <!-- login -->
        <div class="text-center">
            <h3 class="mt-4">Login</h3>

            <form action="includes/login.inc.php" method="post" class="d-flex flex-column align-items-center gap-1 fs-5">
                <input type="text" name="username" placeholder="Username" class="">
                <input type="text" name="pwd" placeholder="Password">
                <button class="btn btn-dark px-5 py-2 mt-2">Login</button>
            </form>

        <?php
        check_login_errors();
        ?>

        </div>

        <!-- sign up -->
        <div class="text-center">
            <h3 class="mt-5">Sign Up</h3>
            <form action="includes/signup.inc.php" method="post" class="d-flex flex-column align-items-center gap-1 fs-5">
                <input type="text" name="username" placeholder="Username">
                <input type="password" name="pwd" placeholder="Password">
                <input type="text" name="email" placeholder="E-Mail">
                <button class="btn btn-dark px-5 py-2 mt-2">SignUp</button>
            </form>
        </div>
    </div>

    <?php

    check_signup_errors();

    ?>

    <!-- logout -->
        <div class="text-center">
            <h3 class="mt-4">Logout</h3>

            <form action="includes/logout.inc.php" method="post" class="d-flex flex-column align-items-center gap-1 fs-5">
                <button class="btn btn-dark px-5 py-2 mt-2">Logout</button>
            </form>

</body>

</html>