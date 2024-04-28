<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>WheelsWander-profile</title>
    <link rel="stylesheet" type="text/css" href="\assets\css\profile.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.3.0/css/all.min.css">
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:400,600&display=swap" rel="stylesheet">
</head>
<body>
<?php

    session_start(); 

    include("../includes/header.php");

    require_once('../scripts/database.php');
    $db = new Database();
    $conn = $db->connect();

    // Function to sanitize/clean up user input
    function test_input($data) {
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
    }

    $user_id = $_SESSION["user_id"];
    $user_name = $_SESSION["user_name"];
    $user_email = $_SESSION["user_email"];

    // Initialize variables for user profile password change
    $newPassword = $newPasswordErr = "";

    // Checking if the password change form has been submitted
    if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["change-password"])) {
        $newPassword = test_input($_POST["new-password"]);

        // Validate new password
        if (empty($newPassword)) {
            $newPasswordErr = "New password is required";
        } else {
            // Hashing the new password for security purposes(encryption)
            $hashedPassword = password_hash($newPassword, PASSWORD_DEFAULT);

            $sql = "UPDATE users SET password='$hashedPassword' WHERE id=$user_id";

            if ($conn->query($sql) === TRUE) {
                $successMessage = "Password updated successfully.";
            } else {
                $newPasswordErr = "Error updating password: " . $conn->error;
            }
            $conn->close();
        }
    }
?>
<section class="profile">
    <h2>Welcome, <?php echo $user_name; ?>!</h2>
    <p>Email: <?php echo $user_email; ?></p>

    <h3>Change Password</h3>
    <form method="POST" action="profile.php">
        <label for="new-password">New Password:</label>
        <input type="password" name="new-password" id="new-password">
        <span class="error"><?php echo $newPasswordErr; ?></span>

        <button type="submit" name="change-password">Change Password</button>
    </form>
    <?php if (isset($successMessage)) {
        echo '<div class="success">' . $successMessage . '</div>';
    } ?>
</section>

<?php
include("../scripts/database.php");
?>

</body>
</html>
