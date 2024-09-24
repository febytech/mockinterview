<?php include ('navbar.php'); ?>
    <style>
        h1,p{
            text-align:center;
        }
        body{
            border-style:solid;
            text-align:center;
                }
            </style>
            </head>
        <body>
            <h1>CREATE ACCOUNT</h2>
    <form action="" method="get">
    <input type="text" name="name" placeholder="enter your name" required><br>
    <input type="number" name="age" placeholder="enter your age" required><br>
    <input type="text" name="email" placeholder="enter your email" required><br>
    <input type="number" name="phoneno" placeholder="enter your phoneno" required><br>
    <input type="text" name="photo" placeholder="upload your photo" required><br>
    <input type="text" name="qualification" placeholder="enter your qualification" required><br>
    <input type="text" name="userid" placeholder="enter your userid" required><br>
    <input type="text" name="password" placeholder="enter your password" required><br>
    <button type="submit" name="register">submit</button>
</form><br>
<p>Already have an account?<a href="login.php">login</a></p>
            </body>
            </html>
<?php
$conn=mysqli_connect("localhost","root","","mockinterview");
if($conn)
{
    echo "connection sucessfully";
}else{
    echo"connection failed";
}
if(isset($_GET["register"]))
{
    $name=$_GET["name"];
    $age=$_GET["age"];
    $email=$_GET["email"];
    $phoneno=$_GET["phoneno"];
    $photo=$_GET["photo"];
    $qualification=$_GET["qualification"];
    $userid=$_GET["userid"];
    $password=$_GET["password"];
$insert=$conn->query("INSERT INTO `register`(`name`, `age`, `email`, `phoneno`, `photo`, `qualification`, `userid`, `password`) VALUES('$name','$age','$email','$phoneno','$photo','$qualification','$userid','$password')");
}
?>