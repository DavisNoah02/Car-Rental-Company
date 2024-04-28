<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>WheelsWander-car List</title>
    <link rel="stylesheet" type="text/css" href="\assets\css\cars.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.3.0/css/all.min.css">
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:400,600&display=swap" rel="stylesheet">
</head>
<body>

<?php
// Check if the user is logged in; if not, redirect to the login page
session_start();

include("../includes/header.php");

require_once('../scripts/database.php');
$db = new Database();
$conn = $db->connect();


// Defining number of cars to be displayed per page
$itemsPerPage = 9;

// Retrieve the current page number from the query string
$page = isset($_GET['page']) ? (int)$_GET['page'] : 1;

// Calculate the offset for the SQL query (pagination)
$offset = ($page - 1) * $itemsPerPage;

// Initialize filters and handling the filtering logic
$carTypeFilter = isset($_GET['car-type']) ? $_GET['car-type'] : "";
$priceRangeFilter = isset($_GET['price-range']) ? $_GET['price-range'] : "";
$locationFilter = isset($_GET['location']) ? $_GET['location'] : "";

// Building the SQL query based on filters
$sql = "SELECT * FROM cars WHERE 1 = 1";

if (!empty($carTypeFilter)) {
    $sql .= " AND car_type = '$carTypeFilter'";
}

if (!empty($priceRangeFilter)) {
    // mapping price ranges to actual price values in the database
    $priceRanges = ["1" => [0, 5000], "2" => [5001, 10000], "3" => [10001, 30000]];
    $priceRanges[$priceRangeFilter];
    // Append the appropriate SQL condition to filter by price range
    $sql .= " AND price >= {$priceRanges[$priceRangeFilter][0]} AND price <= {$priceRanges[$priceRangeFilter][1]}";
}

if (!empty($locationFilter)) {
    $sql .= " AND location = '$locationFilter'";
}

// Counting the total number of cars for pagination
$totalCarsQuery = $conn->query($sql);
$totalCars = $totalCarsQuery->num_rows;

// Modify the SQL query to include pagination
$sql .= " LIMIT $itemsPerPage OFFSET $offset";

$result = $conn->query($sql);
?>

<section class="car-listings">

    <section class="search-bar">
        <form action="/pages/cars.php" method="GET">
            <label for="car-type">Car Type:</label>
            <select name="car-type" id="car-type">
                <option value="">All</option>
                <!-- Adding options for different car types -->

                <option value="Sedan">Sedan</option>
                <option value="SUV">SUV</option>
                <option value="Convertible">Convertible</option>
            </select>

            <label for="price-range">Price Range:</label>
            <select name="price-range" id="price-range">
                <option value="">All</option>
                <option value="1">0-5,000</option>
                <option value="2">5,001-10,000</option>
                <option value="3">10,001 and Above</option>
            </select>

            <label for="location">Location:</label>
            <input type="text" name="location" id="location" placeholder="Enter a location....">

            <button type="submit" name="search-cars">Search</button>
        </form>
    </section>

    <h2>Available Cars</h2>
    
    <!-- Pagination link buttons to switch between pages and Back -->
    <div class="pagination">
        <?php
        $totalPages = ceil($totalCars / $itemsPerPage);
        for ($i = 1; $i <= $totalPages; $i++) {
            echo '<a href="cars.php?page=' . $i;
            if (!empty($carTypeFilter)) {
                echo '&car-type=' . $carTypeFilter;
            }
            if (!empty($priceRangeFilter)) {
                echo '&price-range=' . $priceRangeFilter;
            }
            if (!empty($locationFilter)) {
                echo '&location=' . $locationFilter;
            }
            echo '">' . $i . '</a>';
        }
        ?>
        
    </div>

    <!-- Filters for refining the search -->
    <div class="car-list">
        <?php
        // Loop through the result and display each car listing with booking options
        while ($row = $result->fetch_assoc()) {
            $car_id = $row["id"];
            $car_name = $row["car_name"];
            $car_image = $row["car_image"];
            $price = $row["price"];
            $location = $row["location"];

            // Display car information and a link to book the car
            echo '<a href="car_details.php?car_id=' . $car_id . '">';
            echo '<div class="car-listing">';
            echo '<img src="' . $car_image .' " alt=" '. $car_name .' ">';
            echo '<h3>' . $car_name . '</h3>';
            echo '<p>Price: Ksh.' . $price . ' per day</p>';
            echo '<p>Location: ' . $location . '</p>';
            echo '<a href="car_details.php?car_id=' . $car_id . '"><button>Car details</button> </a>';
            echo '<a href="booking.php?car_id=' . $car_id . '"><button>Book Now</button> </a>';
            echo '</div>'; 
            echo '</a>';           
        }
        $conn->close();
        ?>
    </div>

    <!-- Pagination link buttons to switch between pages and Back -->
    <div class="pagination">
        <?php
        $totalPages = ceil($totalCars / $itemsPerPage);
        for ($i = 1; $i <= $totalPages; $i++) {
            echo '<a href="cars.php?page=' . $i;
            if (!empty($carTypeFilter)) {
                echo '&car-type=' . $carTypeFilter;
            }
            if (!empty($priceRangeFilter)) {
                echo '&price-range=' . $priceRangeFilter;
            }
            if (!empty($locationFilter)) {
                echo '&location=' . $locationFilter;
            }
            echo '">' . $i . '</a>';
        }
        ?>
        
    </div>
</section>

    <button onclick="topFunction()" id="back-to-top" title="Go to top">
        <i class="fas fa-arrow-up"></i>
    </button>

    <script src="/assets/js/ToTopButton.js"></script>
    <?php
    include("../includes/Footer.php");
    ?>
</body>
</html>

