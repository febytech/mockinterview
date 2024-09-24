<h2>INTERVIEWER </h2>
<form action="" method="get">
    userid  :<input type="text" name="userid" placeholder="enter your userid" required><br>
    password:<input type="text" name="password" placeholder="enter your password" required><br>
    <button type="submit" name="interviewer">LOGIN</button>
</form><br>


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
    $userid=$_GET['userid'];
    $password=$_GET['password'];

    $select=$conn->query("SELECT * FROM interviewer where userid='$userid' and password='$password'");
    if($select->num_rows==0)
    {
        while($r=mysqli_fetch_array($select))
        {
            $userid=$r['userid'];
            $password=$r['password'];
            $password=$r['password'];
        }
        header("location:interviewerpanel.php");
    }
    else{
        echo"invalid details";
    }
}
?>