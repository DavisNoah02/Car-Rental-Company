<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Book car - WheelsWander</title>
    <link rel="stylesheet" type="text/css" href="\assets\css\book_car.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.3.0/css/all.min.css">
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:400,600&display=swap" rel="stylesheet">
</head>
<body>

<?php
    $carId = $_GET['car_id'];
    session_start();
    if (!isset($_SESSION["user_id"])) {
        header("Location: login.php");
        exit();
    }

    include("../includes/header.php");

require_once('../scripts/database.php');
$db = new Database();
$conn = $db->connect();

// Check if a car ID is provided in the query if not, redirect to car_listing page
if (!isset($carId)) {
    header("Location: cars.php");
    exit();
}

$car_id = $_GET["car_id"];

$sql = "SELECT * FROM cars WHERE id=$car_id";
$result = $conn->query($sql);

if ($result->num_rows == 1) {
    $row = $result->fetch_assoc();
    $car_name = $row["car_name"];
    $price = $row["price"];
} else {
    $conn->close();
    header("Location: cars.php");
    exit();
}

// Initialize variables for booking
$selectedDates = "";
$selectedDatesErr = "";

// Check if the booking form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["book-now"])) {
    // Validate selected booking dates
    $selectedDates = test_input($_POST["selected-dates"]);

    if (empty($selectedDates)) {
        $selectedDatesErr = "Please select booking dates";
    } else {
        // Validate the date format (YYYY-MM-DD)
        if (!preg_match("/^\d{4}-\d{2}-\d{2}$/", $selectedDates)) {
            $selectedDatesErr = "Invalid date format. Please use YYYY-MM-DD";
        } else {
            //TODO: Payment process by integrating with a payment gateway 

            // Upon successful payment, store booking details in the database and Insert the booking information into a bookings table

            // Check if the user is logged in; if not, redirect to the login page
            if (!isset($_SESSION["user_id"])) {
                header("Location: login.php");
                exit();
            }
            $user_id = $_SESSION["user_id"];
            $booking_date = date("Y-m-d H:i:s");
            $booking_sql = "INSERT INTO bookings (user_id, car_id, booking_date, selected_dates) VALUES ($user_id, $car_id, '$booking_date', '$selectedDates')";

            if ($conn->query($booking_sql) === TRUE) {
                // Booking successful, redirect to a confirmation page
                // header("Location: booking_confirmation.php");
                //exit();
            } else {
                echo "Error: " . $booking_sql . "<br>" . $conn->error;
            }
        }
    }
}

// Function to sanitize user input
function test_input($data) {
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}

// Upon successful payment and booking, send a confirmation email
if (empty($selectedDatesErr)) {
    // Compose the email subject and message
    $subject = "Car Booking Confirmation for $car_name";
    $message = "Dear " . $_SESSION["user_name"] . ",\n\n";
    $message .= "Thank you for booking the $car_name.\n";
    $message .= "Booking Details:\n";
    $message .= "Car Name: $car_name\n";
    $message .= "Selected Dates: $selectedDates\n";
    $message .= "Total Price: Ksh." . ($price * count(explode(",", $selectedDates))) . "\n\n";
    $message .= "For any inquiries or support, please contact our support team at support@wheelWander.com.\n\n";
    $message .= "Best regards,\nWheelsWander Team";

    // Send the email by integrating mailing function from scripts
    $recipient = $_SESSION["user_email"];

    require_once("../scripts/Email.php");
}
?>
<section class="car-booking">
    
    <h2>Welcome, <?php echo $_SESSION["user_name"]; ?></h2>

    <h2>Book Car - <?php echo $car_name; ?></h2>

    <p>Price per day: $<?php echo $price; ?></p>

    <form method="POST" action="booking.php?id=<?php echo $car_id; ?>">
        <label for="fuel-type">Select Car Fuel Type:</label>
        <select name="fuel-type" id="fuel-type">
            <option value="diesel">Diesel</option>
            <option value="petrol">Petrol</option>
            <option value="hybrid">Hybrid</option>
            <option value="electric">Electric</option>
        </select>

        <label for="car-color">Select Car Color:</label>
        <select name="car-color" id="car-color">
            <option value="black">Black</option>
            <option value="blue">Blue</option>
            <option value="red">Red</option>
            <option value="silver">Silver</option>
            <option value="white">White</option>
        </select>

        <label for="selected-dates">Select Pickup Date:</label>
        <input type="text" name="selected-dates" id="selected-dates" onfocus="(this.type='date')" onblur="(this.type='text')" placeholder="YYYY-MM-DD">
        <span class="error"><?php echo $selectedDatesErr; ?></span>

        <button type="submit" name="book-now" id="book_btn" onclick="BookingConfirmationMsg()">Book Now</button>
    </form>
</section>

<?php
// Include the footer to complete the page
include("../includes/Footer.php");
?>
<script src="/assets/js/Message.js"></script>
</body>
</html>
