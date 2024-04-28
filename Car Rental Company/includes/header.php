<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>WheelsWander - Your Journey, Your Way</title>
    <link rel="stylesheet" type="text/css" href="\assets\css\header_footer.css">
 
</head>
<body>

<header>
    <nav>
        <div class="logo">
            <a href="\pages\index.php">WheelsW<span>ander</span></a>
        </div>
        <ul class="menu">
            <li><a href="\pages\index.php">Home</a></li>
            <li><a href="\pages\cars.php">Cars</a></li>
            <li><a href="\pages\about.php">About Us</a></li>
            <li><a href="\pages\contact.php">Contact Us</a></li>
        </ul>
        <div class="user-actions">
            <?php
            // Check if the user is logged in and display appropriate options
            if (isset($_SESSION["user_id"])) {
                // Display user's name and links to profile and logout
                echo '<span style="color: #fff; font-size:24px;">Welcome, ' . $_SESSION['user_name'] .  '</span>';
                echo '<a href="profile.php"><i class="fas fa-user"></i></a>';
                echo '<a href="logout.php"><i class="fas fa-sign-out-alt"></i></a>';
                
            } 
            else {
                // Display login and registration links
                echo '<a href="login.php">Login</a>';
                echo '<a href="register.php">Sign Up</a>';
            }
            ?>
        </div>
    </nav>
</header>

</body>
</html>
