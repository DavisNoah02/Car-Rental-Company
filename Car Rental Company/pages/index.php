<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>WheelsWander Car-Rental Home</title>
    <link rel="stylesheet" type="text/css" href="\assets\css\index.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.3.0/css/all.min.css">
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:400,600&display=swap" rel="stylesheet">
</head>
<body>
    <?php
    // Check if the user is logged in; if not, redirect to the login page
    session_start();
    // error_reporting(0);
    include("../includes/header.php");
    
    ?>

    <section class="banner">
        <video autoplay muted loop id="bannerVideo">
            <source src="/assets/images/Banner/BannerVideo3.mp4" type="video/mp4">
            Your browser does not support the video tag.
        </video>
        <div class="banner-content">
            <form action="/pages/cars.php" method="GET">
                <input type="text" name="location" placeholder="Enter a location.....">
                <button type="submit" name="search_carsbtn"><i class="fas fa-search"></i></button>
            </form>
            <h1>Discover Your Next Adventure</h1>
            <p>Rent a car and explore the world with WheelsWander.</p>
        </div>
       <a href="cars.php">Drive</a>
    </section>

    <section class="featured-cars">
    <h2>Featured Cars</h2>
    <div class="car-listings">
        <?php
        // Set a session variable to indicate redirected status
        $_SESSION["redirected"] = true;
        
        // Create a database connection and verifying conn. by calling the database file once
        require_once('../scripts/database.php');

        $db = new Database();
        $conn = $db->connect();

        // Fetch featured car listings with a limit of 4
        $sql = "SELECT * FROM cars WHERE is_featured = 1 LIMIT 5"; 
        $result = $conn->query($sql);

        // Loop through the result fetched from the database and display each car listing
        while ($row = $result->fetch_assoc()) {
            $car_id = $row["id"];
            $car_name = $row["car_name"];
            $car_image = $row["car_image"];
            $price = $row["price"];
            $location = $row["location"];

            // Display car information and a link to view details
            echo '<a href="car_details.php?car_id=' . $car_id . '">';
            echo '<div class="car-listing">';
            echo '<img src="' . $car_image . '" alt="' . $car_name . '">';
            echo '<h3>' . $car_name . '</h3>';
            echo '<p>Price: ksh.' . $price . ' per day</p>';
            echo '<p>Location: ' . $location . '</p>';
            echo '<a href="car_details.php?car_id=' . $car_id . '"><button>Car details</button></a>';
            echo '</div>';
            echo '</a>';
        }
        $conn->close();
        ?>
    </div>
</section>

    <section class="testimonials">
        <h2>What Our Customers Say</h2>
        <div class="testimonial-list">
            <div class="testimonial">
                <div class="customer-info">
                    <!-- <i class="fas fa-user"></i> -->
                    <img src="/assets/images/Members/Phyllis Kututa.jpg" alt="Customer 1 profile-image">
                    <h4>Phyllis Kututa</h4>
                </div>
                <p>"I had an amazing experience with WheelsWander. Their cars are top-notch, and the service is excellent!"</p>
            </div>
            <div class="testimonial">
                <div class="customer-info">
                <!-- <i class="fas fa-user"></i> -->
                    <img src="/assets/images/Members/Henrie Mwangi passport.jpg" alt="Customer 2 profile-image">
                    <h4>Henry Mwangi</h4>
                </div>
                <p>"WheelsWander made my vacation unforgettable. I found the perfect car for my trip"</p>
            </div>
            <div class="testimonial">
                <div class="customer-info">
                <!-- <i class="fas fa-user"></i> -->
                    <img src="/assets/images/Members/Dismas Onyango passport.jpg" alt="Customer 3 profile-image">
                    <h4>Dismas Onyango</h4>
                </div>
                <p>"At WheelsWander I had the best customer discount. Their Pricing is competitively low. I Like it"</p>
            </div>
        </div>
    </section>

    <button onclick="topFunction()" id="back-to-top" title="Go to top">
    <i class="fas fa-arrow-up"></i>
    </button>

    <script src = "/assets/js/Banner_Animate.js"></script>
    <script src = "/assets/js/ChangeBannerImage.js"></script>
    <script src="/assets/js/ToTopButton.js"></script>

    <?php
    include("../includes/Footer.php");
    ?>

</body>
</html>
