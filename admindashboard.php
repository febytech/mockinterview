<?php
session_start();

// Check if admin is logged in
if (!isset($_SESSION['admin'])) {
    header("Location: index.html");
    exit();
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container mt-5">
        <h1>Welcome to the Admin Dashboard, <?php echo $_SESSION['admin']; ?>!</h1>
        <a href="logout.php" class="btn btn-danger mt-3">Logout</a>
    </div>
</body>
</html>
<html>
    <head>
        <title>adminpanel</title>
    </head>
    <body style="border:1px solid black;">

      <a href="addinterviewer.php">addstaff</a><br>
      <a href="viewinterviewer.php">view staff</a><br>
      <a href="viewussers.php">viewusers</a><br>
      <a href="viewbookings.php">viewbookings</a><br>
</body>
</html>