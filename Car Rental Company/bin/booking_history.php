<?php
// Include the header to maintain a consistent layout
include("includes/header.php");

// Database connection details
$db_host = "your_db_host";
$db_user = "your_db_user";
$db_pass = "your_db_password";
$db_name = "your_db_name";

// Check if the user is logged in; if not, redirect to the login page
session_start();
if (!isset($_SESSION["user_id"])) {
    header("Location: login.php");
    exit();
}

$user_id = $_SESSION["user_id"];

// Create a database connection
$conn = new mysqli($db_host, $db_user, $db_pass, $db_name);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Fetch user's booking history
$sql = "SELECT b.id, c.car_name, b.booking_date, b.selected_dates FROM bookings b
        INNER JOIN cars c ON b.car_id = c.id
        WHERE b.user_id = $user_id
        ORDER BY b.booking_date DESC";

$result = $conn->query($sql);
?>

<section class="booking-history">
    <h2>Booking History</h2>

    <?php
    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            $bookingId = $row["id"];
            $carName = $row["car_name"];
            $bookingDate = $row["booking_date"];
            $selectedDates = $row["selected_dates"];

            echo '<div class="booking-item">';
            echo "<h3>Booking ID: $bookingId</h3>";
            echo "<p>Car Name: $carName</p>";
            echo "<p>Booking Date: $bookingDate</p>";
            echo "<p>Selected Dates: $selectedDates</p>";

            // Implement a cancellation option here (if allowed)
           echo '<button class="cancel-booking" onclick="cancelBooking('.$bookingId.')">Cancel Booking</button>';

            echo '</div>';
        }
    } else {
        echo '<p>No booking history available.</p>';
    }
    ?>

    <script>
        // JavaScript function for cancelling a booking
        function cancelBooking(bookingId) {
            // Implement the cancellation logic (e.g., update the database and notify the user)
        }
    </script>
</section>

<?php
// Include the footer to complete the page
include("includes/footer.php");
?>
