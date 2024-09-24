<?php
$conn=mysqli_connect("localhost","root","","mockinterview");
if($conn)
{
    echo "connection sucessfully";
}else{
    echo"connection failed";
}
if(isset($_GET['register']))
{
    $name=$_GET["name"];
    $email=$_GET["email"];
    $phoneno=$_GET["phoneno"];
    $photo=$_GET["photo"];
    $qualification=$_GET["qualification"];
    $userid=$_GET["userid"];
    $password=$_GET["password"];
}
if(isset($_GET["delete"]))

{
    $d=$_GET["delete"];
    $delete=$conn->query("DELETE FROM register where userid='$d'");
}

$register=$conn->query("SELECT * FROM register ");


if($register->num_rows>1)
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
while($r=mysqli_fetch_array($register)){
    ?>
    <tr>
        <td><?php echo $r['name']?></td>
        <td><?php echo $r['email']?></td>
        <td><?php echo $r['phoneno']?></td>
        <td><?php echo $r['photo']?></td>
        <td><?php echo $r['qualification']?></td>
        <td><?php echo $r['userid']?></td>
        <td><?php echo $r['password']?></td>
        <td>
            <form action="" method=GET><button type="submit" name="delete" value=<?php echo $r["userid"];?>>delete</button></form>
</td>
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
