<?php include ('navbar.php'); ?>
<?php
$conn=mysqli_connect("localhost","root","","mockinterview");

$addinterviewer=$conn->query("SELECT * FROM interviewer "); 
if($addinterviewer->num_rows>0)
{
    ?>
    <table style="border:1px solid black;">
        <tr style="background-color:black;
        color:white;">
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
    <tr style="background-color:yellow;">
        <td><?php echo $r['name'];?></td>
        <td><?php echo $r['email'];?></td>
        <td><?php echo $r['phoneno'];?></td>
        <td><?php echo $r['photo'];?></td>
        <td><?php echo $r['qualification'];?></td>
        <td><?php echo $r['userid'];?></td>
        <td><?php echo $r['password'];?></td>
        <td>
            <form action="booknow.php" method="GET"><button type="submit" name="book" value=<?php echo $r['userid'];?>>book </button></form>
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
