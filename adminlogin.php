<h2>ADMIN LOGIN</h2>
<form action="" method="get">
    userid  :<input type="text" name="userid" placeholder="enter your userid" required><br>
    password:<input type="text" name="password" placeholder="enter your password" required><br>
    <button type="submit" name="admin">LOGIN</button>
</form><br>

<?php
if(isset($_GET['admin']))
{
    $userid=$_GET['userid'];
    $password=$_GET['password'];
    $select=$conn->query("SELECT * FROM admin where userid='$userid' and password='$password'");
    if($select->num_rows==1)
    {
        while($r=mysqli_fetch_array($select))
        {
            $userid=$r['userid'];
            $password=$r['password'];
            $password=$r['password'];
        }
        header("location:adminpanel.php");
    }
    else{
        echo"invalid details";
    }
}
?>




