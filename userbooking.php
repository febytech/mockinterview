<?php
// Database connection
$host = "localhost";
$dbname = "your_database_name";
$username = "root";
$password = "";

// Create a connection
$conn = new mysqli($host, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Form submission handling
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $user_id = $_POST['user_id'];
    $interviewer_id = $_POST['interviewer_id'];
    $description = $_POST['description'];
    $date_of_booking = $_POST['date_of_booking'];
    $status = $_POST['status'];
    $payment_status = $_POST['payment_status'];

    // Insert booking data into database
    $sql = "INSERT INTO bookings (user_id, interviewer_id, description, date_of_booking, status, payment_status) 
            VALUES ('$user_id', '$interviewer_id', '$description', '$date_of_booking', '$status', '$payment_status')";

    if ($conn->query($sql) === TRUE) {
        $success_message = "Your booking has been successfully created!";
    } else {
        $error_message = "Error: " . $sql . "<br>" . $conn->error;
    }
}

// Close connection
$conn->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mock Interview Booking</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>
<div class="container mt-5">
    <h2>Book Your Mock Interview</h2>
    
    <!-- Success/Error message -->
    <?php if (isset($success_message)): ?>
        <div class="alert alert-success">
            <?php echo $success_message; ?>
        </div>
    <?php elseif (isset($error_message)): ?>
        <div class="alert alert-danger">
            <?php echo $error_message; ?>
        </div>
    <?php endif; ?>

    <!-- Booking form -->
    <form action="" method="POST">
        <div class="form-group">
            <label for="user_id">User ID</label>
            <input type="number" class="form-control" id="user_id" name="user_id" required>
        </div>
        <div class="form-group">
            <label for="interviewer_id">Interviewer ID</label>
            <input type="number" class="form-control" id="interviewer_id" name="interviewer_id" required>
        </div>
        <div class="form-group">
            <label for="description">Description</label>
            <textarea class="form-control" id="description" name="description" rows="3" required></textarea>
        </div>
        <div class="form-group">
            <label for="date_of_booking">Date of Booking</label>
            <input type="date" class="form-control" id="date_of_booking" name="date_of_booking" required>
        </div>
        <div class="form-group">
            <label for="status">Status</label>
            <select class="form-control" id="status" name="status" required>
                <option>Pending</option>
                <option>Confirmed</option>
            </select>
        </div>
        <div class="form-group">
            <label for="payment_status">Payment Status</label>
            <select class="form-control" id="payment_status" name="payment_status" required>
                <option>Paid</option>
                <option>Unpaid</option>
            </select>
        </div>
        <button type="submit" class="btn btn-primary">Submit Booking</button>
    </form>
</div>

<!-- Bootstrap JS and jQuery (optional) -->
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
