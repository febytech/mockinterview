<?php
session_start();
$conn = new mysqli('localhost', 'root', '', 'mockinterview');

if (isset($_POST['submit_booking'])) {
    // Check if all required fields are provided
    if (!empty($_POST['description']) && !empty($_POST['date_of_booking']) && !empty($_POST['interviewer_id'])) {
        
        // Automatically get user_id from the session after the user logs in
        $user_id = $_SESSION['user_id']; 
        $interviewer_id = $_POST['interviewer_id'];  // Passed via hidden input from interviewer page
        $description = $_POST['description'];
        $date_of_booking = $_POST['date_of_booking'];
        $status = 'pending';  // Default booking status is 'pending'
        $payment_status = 'unpaid';  // Default payment status is 'unpaid'

        // Insert the booking into the bookings table
        $stmt = $conn->prepare("INSERT INTO bookings (user_id, interviewer_id, description, date_of_booking, status, payment_status) VALUES (?, ?, ?, ?, ?, ?)");
        $stmt->bind_param("iissss", $user_id, $interviewer_id, $description, $date_of_booking, $status, $payment_status);

        // Execute the query and check if successful
        if ($stmt->execute()) {
            echo "Booking confirmed!";
        } else {
            echo "Error: " . $stmt->error;
        }

        // Close the statement
        $stmt->close();
    } else {
        // If any field is empty
        echo "Please provide all the required details.";
    }
}

// Close the database connection
$conn->close();
?>
