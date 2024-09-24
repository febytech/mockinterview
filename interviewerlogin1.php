<?php
$conn=mysqli_connect("localhost","root","","mockinterview");

// Handle login
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $userid = $_POST['userid'];
    $password = $_POST['password'];


    // Fetch interviewer by email
    $sql = "SELECT * FROM interviewers WHERE userid = '$userid'";
    $result = $conn->query($sql);

    if ($result->num_rows>0) {
        $interviewer = $result->fetch_assoc();
        session_start();
        $_SESSION['interviewerid'] = $interviewer['interviewerid'];
        header("Location: dashboard.php");
    } else {
        echo "Invalid email!";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Interviewer Login</title>
    <!-- Include Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container mt-5">
        <h2>Interviewer Login</h2>
        <form method="POST">
            <div class="mb-3">
                <label for="email" class="form-label">Email address</label>
                <input type="email" class="form-control" id="email" name="email" required>
            </div>
            <button type="submit" class="btn btn-primary">Login</button>
        </form>
    </div>
</body>
</html>
