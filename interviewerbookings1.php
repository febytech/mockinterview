<?php
// File: interviewer_bookings.php
session_start();

// Check if the interviewer is logged in
if (!isset($_SESSION['interviewerid'])) {
    header("Location: interviewerbookings1.php");
    exit;
}

// Include the database connection
include('includes/navbar.php');

// Get the interviewer ID from the session
$interviewerid = $_SESSION['interviewerid'];

// Fetch all schedules (bookings) for this interviewer
$sql = "SELECT interviewid, interview_date FROM schedule WHERE interviewe_id = $interviewer_id";
$schedule_result = $conn->query($sql);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Interviewer Bookings</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container mt-5">
        <h2>Your Scheduled Bookings</h2>
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>Interviewee Name</th>
                    <th>Interview Date</th>
                </tr>
            </thead>
            <tbody>
                <?php
                // Check if bookings exist for this interviewer
                if ($schedule_result->num_rows > 0) {
                    // Loop through each schedule (interview)
                    while ($schedule_row = $schedule_result->fetch_assoc()) {
                        $interviewee_id = $schedule_row['interviewee_id'];

                        // Fetch interviewee name based on the interviewee_id
                        $interviewee_query = "SELECT name FROM interviewees WHERE interviewee_id = $interviewee_id";
                        $interviewee_result = $conn->query($interviewee_query);
                        $interviewee = $interviewee_result->fetch_assoc();

                        // Display interviewee name and interview date
                        echo "<tr>";
                        echo "<td>" . htmlspecialchars($interviewee['name']) . "</td>";
                        echo "<td>" . htmlspecialchars($schedule_row['interview_date']) . "</td>";
                        echo "</tr>";
                    }
                } else {
                    echo "<tr><td colspan='2'>No bookings found</td></tr>";
                }
                ?>
            </tbody>
        </table>
    </div>

    <!-- Optional: Bootstrap JS for better interaction -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>

<?php
// Close the database connection
$conn->close();
?>
