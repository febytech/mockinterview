
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <?php

$conn=mysqli_connect("localhost","root","","mockinterview");
if(isset($_POST['booking'])){

$user_id = $_POST['user_id'];
$interviewer_id = $_POST['interviewer_id'];
$description = $_POST['description'];
$date_of_booking = $_POST['date_of_booking'];
$status = $_POST['status'];
$payment_status = $_POST['payment_status'];
}
// Insert into database
$sql = "INSERT INTO bookings (user_id, interviewer_id, description, date_of_booking, status, payment_status)
VALUES ('$user_id', '$interviewer_id', '$description', '$date_of_booking', '$status', '$payment_status')";

if ($conn->query($sql) === TRUE) {
    echo "New booking created successfully";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();
?>
    <title>Booking Form</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>
<div class="container mt-5">
    <h2>Book an Interview</h2>
    <form action="submit_booking.php" method="POST">
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
            <input type="text" class="form-control" id="description" name="description" required>
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
        <button type="submit" class="btn btn-primary">Book Now</button>
    </form>
</div>
// Fetch data from database
$sql = "SELECT * FROM bookings";
$result = $conn->query($sql);

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>View Bookings</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>
<div class="container mt-5">
    <h2>All Bookings</h2>
    <table class="table table-bordered">
        <thead>
            <tr>
                <th>ID</th>
                <th>User ID</th>
                <th>Interviewer ID</th>
                <th>Description</th>
                <th>Date of Booking</th>
                <th>Status</th>
                <th>Payment Status</th>
            </tr>
        </thead>
        <tbody>
            <?php while($row = $result->fetch_assoc()) { ?>
            <tr>
                <td><?php echo $row['id']; ?></td>
                <td><?php echo $row['user_id']; ?></td>
                <td><?php echo $row['interviewer_id']; ?></td>
                <td><?php echo $row['description']; ?></td>
                <td><?php echo $row['date_of_booking']; ?></td>
                <td><?php echo $row['status']; ?></td>
                <td><?php echo $row['payment_status']; ?></td>
            </tr>
            <?php 
        } 
        ?>
        </tbody>
    </table>
</div>


<?php
$conn->close();
?>
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
