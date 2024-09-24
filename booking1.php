
<?php
session_start();

if(isset($_POST['booked'])){
    
$userid = $_POST['userid'];
$interviewerid = $_POST['interviewerid'];
$description = $_POST['description'];
$dateofbooking = $_POST['dateofbooking'];
$status = $_POST['status'];
$paymentstatus = $_POST['paymentstatus'];

$sql=$conn->query("INSERT INTO bookings(userid, interviewerid, description, dateofbooking, status, paymentstatus) VALUES ('$userid','$interviewerid','$description','$dateofbooking','$status','$paymentstatus')");

if ($sql) {
    echo "New booking created successfully";
} 
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Booking Form</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>
<div class="container mt-5">
    <h2>Book an Interview</h2>
    <form action="" method="POST">
    
        <div class="form-group">
            <label for="userid">User ID</label>
             <input type="text" class="form-control" id="userid" name="userid" value="<?php  echo $_SESSION['userid']; ?>" ><br><required>
        </div>
        
      

        <div class="form-group">
            <label for="interviewerid">Interviewer ID</label>
            <input type="text" class="form-control" id="interviewerid" name="interviewerid" value="<?php  echo ['interviewerid']; ?>"><br><required>
            
        </div>
        <div class="form-group">
            <label for="description">Description</label>
            <input type="text" class="form-control" id="description" name="description" required>
        </div>
        <div class="form-group">
            <label for="dateofbooking">Date of Booking</label>
            <input type="date" class="form-control" id="dateofbooking" name="dateofbooking" required>
        </div>
        <div class="form-group">
            <label for="status">Status</label>
            <select class="form-control" id="status" name="status" required>
                <option>Pending</option>
                <option>Confirmed</option>
            </select>
        </div>
        <div class="form-group">
            <label for="paymentstatus">Payment Status</label>
            <select class="form-control" id="paymentstatus" name="paymentstatus" required>
                <option>Paid</option>
                <option>Unpaid</option>
            </select>
        </div>
        <button type="submit" name="book" class="btn btn-primary">Book Now</button>
    </form>
</div>
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>