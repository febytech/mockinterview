<?php include ('navbar.php'); ?>
<?php
$conn=mysqli_connect("localhost","root","","mockinterview");

if(isset($_POST['LOGIN'])){



    $userid=$_POST['userid'];
    $password=$_POST['password'];
    $confirmpassword=$_POST['confirmpassword'];

    if ($password==$confirmpassword){
    $check=$conn->query("SELECT * FROM REGISTER where userid='$userid' and password='$password'");
    if($check->num_rows>0)
    {
        echo"<script>alert('user exist');</script>";
        
        $_SESSION['userid']=$userid;
        $_SESSION['role']="user";
        header("location:index.php");
    }
    else{
        echo"<script>alert('user does not exist');</script>";
    }
}
else{
    echo"<script>alert('password not correct');</script>";
}
}
?>


<style>
    .form-control{
        padding:5px;
        border-radius:5px;
        width:300px;
        border:1px solid grey;
        margin-top:5px;
        margin-bottom:5px;
    }
    .btn-primary:hover{
        background-color:blue;
    }
    </style>
    <div style="display:flex;justify-content:center; align-items:center; content-align:center;height:80vh;width:100%;">
    <form action="" method="post" style="text-align:center;">
        <h1 style="text-align:center;">Login</h1>
        <input class="form-control" type="text" name="userid" id="" placeholder="userid" required><br>
        <input class="form-control" type="password" name="password" id="" placeholder="password" required><br>
        <input class="form-control" type="password" name="confirmpassword" id="" placeholder="confirmpassword" required><br>

        <button type="submit" name="LOGIN" class="btn-primary">Login</button>
</form>
</div>

    
    

        