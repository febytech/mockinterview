<?php
// File: dashboard.php
session_start();

// Check if the interviewer is logged in
if (!isset($_SESSION['interviewer_id'])) {
    header("Location: index.php");
    exit;
}

// Include the header for common styles
include('includes/header.php');
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Interviewer Dashboard</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container mt-5">
        <h2>Welcome to your Dashboard</h2>
        <p>You can view your bookings below:</p>
        <a href="interviewerbookings1.php" class="btn btn-primary">View Bookings</a>
    </div>
</body>
</html>
