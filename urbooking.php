<form action="book_interview.php" method="POST">
    <label for="date_of_booking">Select Booking Date:</label>
    <input type="datetime-local" id="date_of_booking" name="date_of_booking" required>


    <label for="description">Description:</label>
    <textarea id="description" name="description" placeholder="Describe your interview requirements..." required></textarea>

    <button type="submit" name="submit_booking">Book Interview</button>
</form>
<?php
session_start();
$conn = new mysqli('localhost', 'root', '', 'mockinterview');

if (isset($_POST['submit_booking'])) {
    // Ensure interviewer, date, and description are provided
    if (!empty($_POST['interviewer_id']) && !empty($_POST['date_of_booking']) && !empty($_POST['description'])) {
        
        // Assuming user_id is stored in the session after login
        $user_id = $_SESSION['user_id']; 
        $interviewer_id = $_POST['interviewer_id'];
        $date_of_booking = $_POST['date_of_booking'];
        $description = $_POST['description'];
        $status = 'pending';  // Default status is pending
        $payment_status = 'unpaid';  // Default payment status is unpaid

        // Insert booking into the database
        $stmt = $conn->prepare("INSERT INTO bookings (user_id, interviewer_id, description, date_of_booking, status, payment_status) VALUES (?, ?, ?, ?, ?, ?)");
        $stmt->bind_param("iissss", $user_id, $interviewer_id, $description, $date_of_booking, $status, $payment_status);

        // Execute query and check if successful
        if ($stmt->execute()) {
            echo "Booking confirmed!";
        } else {
            echo "Error in booking: " . $stmt->error;
        }

        $stmt->close();
    } else {
        echo "Please fill in all required fields.";
    }
}

$conn->close();
?>
