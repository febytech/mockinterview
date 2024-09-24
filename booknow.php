<?php include ('navbar.php'); ?>
<?php

$staffid=$_GET['book'];
?>
<form action="" method="post">

Userid <input name="userid" type="text" value="<?php  echo $_SESSION['userid']; ?>" ><br>
Staff id<input name="staffid" type="text" value="<?php  echo $staffid; ?>"><br>

description<input name="description" type="text" ><br>
<button type="submit" name="booknow">Book</button>

</form>