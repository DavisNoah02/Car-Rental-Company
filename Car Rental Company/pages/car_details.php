<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Car Details - WheelsWander</title>
    <link rel="stylesheet" type="text/css" href="/assets/css/car_details.css">
</head>
<body>
    <?php
    session_start();

    include("../includes/header.php");

    // Check if the car ID is provided in the query string
    if (!isset($_GET["car_id"])) {
        header("Location: cars.php");
        exit();
    }

    // Get the car ID from the query string
    $car_id = $_GET["car_id"];

    // Retrieve car details from the database
    $carDetails = getCarDetails($car_id);

    // Function to get car details from the database
    function getCarDetails($car_id) {
        require_once('../scripts/database.php');
        $db = new Database();
        $conn = $db->connect();

        $sql = "SELECT * FROM cars WHERE id = $car_id";
        $result = $conn->query($sql);

        if ($result->num_rows == 1) {
            return $result->fetch_assoc();
        } else {
            header("Location: booking.php");
            exit();
        }
    }   
    ?>

    <section class="car-details">
        <div class="car-details-content">
            <div class="car-details-image">
                <img src="<?php echo $carDetails['car_image']; ?>" alt="<?php echo $carDetails['car_name']; ?>">
            </div>
            
            <div class="car-details-description">
                <h2><?php echo $carDetails['car_name']; ?></h2>
                <p>Price per day: Ksh.<?php echo $carDetails['price']; ?></p>
                <p>Brand: <?php echo $carDetails['brand']; ?></p>
                <p>Model: <?php echo $carDetails['model']; ?></p>
                <p>Engine Type: <?php echo $carDetails['engine_type']; ?></p>
                <p>Car Type: <?php echo $carDetails['car_type']; ?></p>
                <p>Location: <?php echo $carDetails['location']; ?></p>
                <button id="book-button">Book Now</button>
            </div>
        </div>
    </section>

    <script>
        document.getElementById("book-button").addEventListener("click", function() {
            // Redirect the user to the booking page with car_id
            window.location.href = "booking.php?car_id=<?php echo $car_id; ?>";
        });
    </script>

    <?php
    include("../includes/Footer.php");
    ?>
</body>
</html>
