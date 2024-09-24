<?php
$conn=mysqli_connect("localhost","root","","mockinterview");
if(isset($_GET["update"]))
{
    $name=$_GET['name'];
    $email=$_GET['email'];
    $phoneno=$_GET['phoneno'];
    $photo=$_GET['photo'];
    $qualification=$_GET['qualification'];
    
    $password=$_GET['password'];
    $userid=$_GET['update'];
    $update=$conn->query("UPDATE `interviewer` SET `name`='$name',`email`='$email',`phoneno`='$phoneno',`photo`='$photo',`qualification`='$qualification',`password`='$password' WHERE `userid`='$userid'");
}

if(isset($_GET["delete"]))
{
    $d=$_GET["delete"];
    $delete=$conn->query("DELETE FROM interviewer where userid='$d'");
}
$addinterviewer=$conn->query("SELECT * FROM interviewer "); 
if($addinterviewer->num_rows>0)
{
    ?>
    <table>
        <tr>
            <th>name</th>
            <th>email</th>
            <th>phoneno</th>
            <th>photo</th>
            <th>qualification</th>
            <th>userid</th>
            <th>password</th>
</tr>
<?php
while($r=mysqli_fetch_array($addinterviewer))
{
    ?>
    <tr>
        <form method="get" action="">
        <td><input type="text" name="name" value="<?php echo $r['name'];?>"></td>
        <td><input type="text" name="email" value="<?php echo $r['email'];?>"></td>
        <td><input type="text" name="phoneno" value="<?php echo $r['phoneno'];?>"></td>
        <td><input type="text" name="photo" value="<?php echo $r['photo'];?>"></td>
        <td><input type="text" name="qualification" value="<?php echo $r['qualification'];?>"></td>
        <td><?php echo $r['userid'];?></td>
        <td><input type="text" name="password" value="<?php echo $r['password'];?>"></td>
        <td><button type="submit" name="update" value="<?php echo $r['userid'];?>">update</button></form></td>
        <td><form action="" method="get">
        <button type="submit" name="delete" value="<?php echo $r['userid'];?>">delete</button> </form></td>
</tr>
<?php      
}
?>
</table>
<?php
}
else{
    echo"<br> TABLE IS EMPTY";
}
?>
