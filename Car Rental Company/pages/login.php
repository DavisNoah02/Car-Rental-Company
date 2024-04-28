<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>WheelsWander-userLogin</title>
    <link rel="stylesheet" type="text/css" href="\assets\css\login.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.3.0/css/all.min.css">
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:400,600&display=swap" rel="stylesheet">
</head>
<body>

<?php
include("../includes/header.php");
require("../scripts/Email.php");
?>

<section class="login">
    <h2>Sign in</h2>
    <form method="POST" action="login.php">
        <label for="email">Email:</label>
        <input type="email" name="email" id="email">
        <span class="error"><?php echo $emailErr; ?></span>

        <label for="password">Password:</label>
        <input type="password" name="password" id="password">
        <span class="error"><?php echo $passwordErr; ?></span>

        <button type="submit">Login</button>
    </form>
    <span class="error"><?php echo $loginErr; ?></span>
</section>

<?php

include("../includes/Footer.php");
?>
</body>
</html>
