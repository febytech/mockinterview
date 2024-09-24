
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>My project</title>
</head>
<?php
session_start();
?>

<body>
    <style>
        * {
            margin: 0;
            padding: 0;
        }

        #navbar {
            background-color:#353755;

            padding: 50px;
            display: flex;
            justify-content: space-around;
            gap: 50px;
        }

        .nav-link {
            color: rgb(255, 255, 255);
            text-decoration: none;
        }

        .nav-link:hover {
            color: yellow
        }

        #navlogo {
            font-size: 20px;
            color: white;
            font-weight: bolder;
            text-transform: uppercase;
            text-decoration: none;
        }
    </style>


    <div id="navbar">
        <div><a href="" id="navlogo">Mock interview</a></div>
        <div><a class="nav-link" href="index.php">Home</a></div>

        <div><a class="nav-link" href="about.php">About</a></div>

        <div><a class="nav-link" href="contact.php">Contact</a></div>
        
        <?php
        if (isset($_SESSION['userid'])) {
            ?>
            <div><a class="nav-link" href="interviewer.php">interviewer</a></div>
            <div><a class="nav-link" href="viewbookings.php"> My Bookings</a></div>
            <div><a class="nav-link" href="feedback.php"> feedback</a></div>

            <div><a class="nav-link" href="logout.php">Logout</a></div>
            <div><a class="nav-link" href="">Hello <?php echo $_SESSION['userid']; ?></a></div>

            <?php
        } else {
            ?>
            <div><a class="nav-link" href="register.php">Register</a></div>

            <div><a class="nav-link" href="login.php">Login</a></div>
            <?php
        }

        ?>


    </div>