<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>WheelsWander-Contact us</title>
    <link rel="stylesheet" type="text/css" href="\assets\css\contact.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.3.0/css/all.min.css">
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:400,600&display=swap" rel="stylesheet">
</head>
<body>
<?php
    // Check if the user is logged in; if not, redirect to the login page
    session_start();

    include("../includes/header.php");

    // Define variables to store form data
    $name = $email = $message = "";
    $nameErr = $emailErr = $messageErr = "";

    // Handling form submission and validation
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        // Validate the name
        if (empty($_POST["name"])) {
            $nameErr = "Name is required";
        } else {
            $name = test_input($_POST["name"]);
        }

        // Validate the email
        if (empty($_POST["email"])) {
            $emailErr = "Email is required";
        } else {
            $email = test_input($_POST["email"]);
            // Check if the email address is well-formed
            if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
                $emailErr = "Invalid email format";
            }
        }

        // Validate the message
        if (empty($_POST["message"])) {
            $messageErr = "Message is required";
        } else {
            $message = test_input($_POST["message"]);
        }

        // If there are no validation errors, display an alert message
        // if (empty($nameErr) && empty($emailErr) && empty($messageErr)) {
        //     echo '<script>alert("Form submitted successfully!");</script>';
        // }
    }

    // Function to sanitize user input
    function test_input($data) {
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
    }
?>

<section class="contact-us">
    <h2>Contact Us</h2>

    <div class="contact-info">
        <p class="address">
            If you have any questions, feel free to reach out to our customer support team.
            Chuka 12 Street near Ndagani
        </p>
        <p class="phone">
            Phone: <a href="tel:+254113392782">+254113392782</a>
            Email: <a href="mailto:wheelswander@gmail.com">wheelswander@gmail.com</a>
        </p>
    </div>

    <div class="contact-form">
        <h3>Send Us a Message</h3>
        <form method="POST" action="contact.php">
            <label for="name">Your Name:</label>
            <input type="text" name="name" id="name" value="<?php echo $name; ?>" required>
            <span class="error"><?php echo $nameErr; ?></span>

            <label for="email">Your Email:</label>
            <input type="email" name="email" id="email" value="<?php echo $email; ?>" required>
            <span class="error"><?php echo $emailErr; ?></span>

            <label for="message">Your Message:</label>
            <textarea name="message" id="message" rows="4" required><?php echo $message; ?></textarea>
            <span class="error"><?php echo $messageErr; ?></span>

            <button type="submit" onclick="FormSubmissionMessage()">Send Message</button>
        </form>
    </div>
</section>

<script src="/assets/js/Message.js"></script>

<?php
include("../includes/Footer.php");
?>

</body>
</html>


