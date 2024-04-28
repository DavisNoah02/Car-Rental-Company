<?php
    require_once('../scripts/database.php');
    $db = new Database();
    $conn = $db->connect();

    // Initialize variables to store user login data
    $email = $password = "";
    $emailErr = $passwordErr = "";
    $loginErr = "";

    // Check if the login form is submitted
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        // Validate and sanitize user inputs
        $email = test_input($_POST["email"]);
        $password = test_input($_POST["password"]);

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

        // If no validation errors, proceed with login
        if (empty($emailErr) && empty($passwordErr)) {

            // Fetch user data from the database
            $sql = "SELECT id, name, email, password FROM users WHERE email='$email'";
            $result = $conn->query($sql);

            if ($result->num_rows == 1) {
                $row = $result->fetch_assoc();

                // Verify the password
                if (password_verify($password, $row["password"])) {
                    // Start a session and store user data
                    session_start();
                    $_SESSION["user_id"] = $row["id"];
                    $_SESSION["user_name"] = $row["name"];
                    $_SESSION["user_email"] = $row["email"];

                    // Redirect to the homepage
                    // TODO: Should redirect back to the page the user was in before not homepage

                    header("Location: booking.php");
                    exit();
                } else {
                    $loginErr = "Incorrect email or password";
                }
            } else {
                $loginErr = "User not found\n<a> href='\pages\profile.php'>forgot your password?</a>";  
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
<!-- <php?
require_once('C:\Users\hp\Documents\Web Development\Projects\Car Rental Company\scripts\database.php');
$db = new Database();
$conn = $db->connect();

// Initialize variables to store user login data
$email = $password = "";
$emailErr = $passwordErr = "";
$loginErr = "";

// Check if the login form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Validate and sanitize user inputs
    $email = test_input($_POST["email"]);
    $password = test_input($_POST["password"]);

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

    // If no validation errors, proceed with login
    if (empty($emailErr) && empty($passwordErr)) {
        // Fetch user data from the database
        $sql = "SELECT id, name, email, password FROM users WHERE email='$email'";
        $result = $conn->query($sql);

        if ($result->num_rows == 1) {
            $row = $result->fetch_assoc();

            // Verify the password
            if (password_verify($password, $row["password"])) {
                // Start a session and store user data
                session_start();
                $_SESSION["user_id"] = $row["id"];
                $_SESSION["user_name"] = $row["name"];
                $_SESSION["user_email"] = $row["email"];

                // Redirect to the homepage if not already on it
                if (!isset($_SESSION["redirected"]) || !$_SESSION["redirected"]) {
                    header("Location: index.php");
                    exit();
                }
            } else {
                $loginErr = "Incorrect email or password";
            }
        } else {
            $loginErr = "User not found\n<a> href=/pages/profile.php'>forgot your password?</a>";
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
?> -->