<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>WheelsWander-Sign up form</title>
    <link rel="stylesheet" type="text/css" href="\assets\css\register.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.3.0/css/all.min.css">
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:400,600&display=swap" rel="stylesheet">
</head>
<body>

<?php
include("../includes/header.php");

require_once('../scripts/database.php');

$db = new Database();
$conn = $db->connect();

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Initializing variables to store user registration data
$name = $email = $password = "";
$nameErr = $emailErr = $passwordErr = "";

// Checking if the registration form has been submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Validate and sanitize user inputs
    $name = test_input($_POST["name"]);
    $email = test_input($_POST["email"]);
    $password = test_input($_POST["password"]);

    // Validate username
    if (empty($name)) {
        $nameErr = "Name is required";
    }

    // Validate email
    if (empty($email)) {
        $emailErr = "Email is required";
    } elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $emailErr = "Invalid email format";
    }

    // Validate password
    if (empty($password)) {
        $passwordErr = "Password is required";
    }

    // If no validation errors, proceed with the registration
    if (empty($nameErr) && empty($emailErr) && empty($passwordErr)) {

        // Encrypt the password for security purposes
        $hashedPassword = password_hash($password, PASSWORD_DEFAULT);

        // Insert user data into the database
        $sql = "INSERT INTO users (name, email, password) VALUES ('$name', '$email', '$hashedPassword')";

        if ($conn->query($sql) === TRUE) {
            // Registration successful, redirect to login page
            header("Location: login.php");
            exit();
        } else {
            //TODO: handle error on the client side also
            echo "Error: " . $sql . "<br>" . $conn->error;
        }
        $conn->close();
    }
}

// Function to sanitize user input
function test_input($data) {
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}
?>

<section class="registration">
    <h2>Sign Up</h2>
    <form method="POST" action="register.php">
        <label for="name">Name:</label>
        <input type="text" name="name" id="name">
        <span class="error"><?php echo $nameErr; ?></span>

        <label for="email">Email:</label>
        <input type="email" name="email" id="email">
        <span class="error"><?php echo $emailErr; ?></span>

        <label for="password">Password:</label>
        <input type="password" name="password" id="password">
        <span class="error"><?php echo $passwordErr; ?></span>

        <button type="submit">Register</button>
    </form>
</section>

<?php
include("../includes/Footer.php");
?>
</body>
</html>
