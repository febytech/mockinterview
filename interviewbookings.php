<?php
$conn=mysqli_connect("localhost","root","","mockinterview");


// Check if the connection is successful
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// 2. Get interviewer ID (from URL or set manually)
$interviewerid = isset($_GET['interviewerid']) ? $_GET['interviewerid'] : 1; // Default interviewer ID = 1

// 3. Fetch all schedules (bookings) for this interviewer
$sql = "SELECT intervieweeid, interview_date FROM schedule WHERE interviewerid = $interviewerid";
$schedule_result = $conn->query($sql);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Interviewer Bookings</title>
    <!-- Bootstrap CSS for styling -->
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
                
                if ($schedule_result->num_rows > 1) {
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
                    // If no bookings found
                    echo "<tr><td colspan='2' class='text-center'>No bookings found</td></tr>";
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
// 5. Close the database connection
$conn->close();
?>
