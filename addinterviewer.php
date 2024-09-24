<form action="" method="get">
    <input type="text" name="name" placeholder="enter your name" required><br>
    <input type="text" name="email" placeholder="enter your email" required><br>
    <input type="number" name="phoneno" placeholder="enter your phoneno" required><br>
    <input type="text" name="photo" placeholder="upload your photo" required><br>
    <input type="text" name="qualification" placeholder="enter your qualification" required><br>
    <input type="text" name="userid" placeholder="enter your userid" required><br>
    <input type="text" name="password" placeholder="enter your password" required><br>
    <button type="submit" name="interviewer">submit</button>
</form>
<?php
$conn=mysqli_connect("localhost","root","","mockinterview");
if($conn)
{
    echo "connection sucessfully";
}else{
    echo"connection failed";
}
if(isset($_GET['interviewer']))
{
    $name=$_GET["name"];
    $email=$_GET["email"];
    $phoneno=$_GET["phoneno"];
    $photo=$_GET["photo"];
    $qualification=$_GET["qualification"];
    $userid=$_GET["userid"];
    $password=$_GET["password"];

$insert=$conn->query("INSERT INTO `interviewer`(`name`, `email`, `phoneno`, `photo`, `qualification`, `userid`, `password`) VALUES('$name','$email','$phoneno','$photo','$qualification','$userid','$password')");
}
?>