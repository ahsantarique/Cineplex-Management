<?php 
require('db.php');
include("auth.php");
//$customer_id=$_REQUEST['customer_id'];
$id=$_REQUEST['id'];
$query = "SELECT * from employee where id='".$id."'"; 
$result = mysql_query($query) or die ( mysql_error());
$row = mysql_fetch_assoc($result);
?>
<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<title>Update Record</title>
<link rel="stylesheet" href="css/style.css" />
</head>
<body>
<div class="form">
<p><a href="dashboard.php">Dashboard</a> | <a href="insert_employee.php">Insert New Employee Record</a> | <a href="http://localhost/test3/login.php">Logout</a></p>
<h1>Update Record</h1>
<?php
$status = "";
if(isset($_POST['new']) && $_POST['new']==1)
{
//$id=$_REQUEST['customer_id'];
$name =$_REQUEST['name'];
$email = $_REQUEST['email'];
$phoneno =$_REQUEST['phoneno'];
$salary = $_REQUEST['salary'];
$update="update employee set name='$name', email='$email', phoneno='$phoneno', salary='$salary' where id='".$id."'";
mysql_query($update) or die(mysql_error());
$status = "Record Updated Successfully. </br></br><a href='view_employee.php'>View Updated Record</a>";
echo '<p style="color:#FF0000;">'.$status.'</p>';
}else {
?>
<div>
<form name="form" method="post" action=""> 
<input type="hidden" name="new" value="1" />
<input name="id" type="hidden" value="<?php echo $row['id'];?>" />
<p><input type="text" name="name" placeholder="Enter Name" required value="<?php echo $row['name'];?>" /></p>
<p><input type="text" name="email" placeholder="Enter Email" required value="<?php echo $row['email'];?>" /></p>
<p><input type="text" name="phoneno" placeholder="Enter Phoneno" required value="<?php echo $row['phoneno'];?>" /></p>
<p><input type="text" name="salary" placeholder="Enter Salary" required value="<?php echo $row['salary'];?>" /></p>
<p><input name="submit" type="submit" value="Update" /></p>
</form>
<?php } ?>
</div>
</div>
</body>
</html>
