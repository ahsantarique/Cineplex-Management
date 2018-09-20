<?php
require('db.php');
include("auth.php"); //include auth.php file on all secure pages
$status = "";
if(isset($_POST['new']) && $_POST['new']==1)
{
$trn_date = date("Y-m-d H:i:s");
//$id=$_REQUEST['customer_id'];
$name =$_REQUEST['name'];
$email = $_REQUEST['email'];
$phoneno =$_REQUEST['phoneno'];
$salary = $_REQUEST['salary'];
$ins_query="insert into Employee(`name`,`email`,`phoneno`,`salary`)values('$name','$email','$phoneno','$salary')";
mysql_query($ins_query) or die(mysql_error());
$status = "New Employee Record Inserted Successfully.</br></br><a href='view_employee.php'>View Inserted Record</a>";
}
?>
<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<title>Insert New Record</title>
<link rel="stylesheet" href="css/style.css" />
</head>
<body>
<div class="form">
<p><a href="dashboard.php">Dashboard</a> | <a href="view_employee.php">View Employee Records</a> | <a href="http://localhost/test3/login.php">Logout</a></p>
<div>
<h1>Insert New Record</h1>
<form name="form" method="post" action=""> 
<input type="hidden" name="new" value="1" />

<p><input type="text" name="name" placeholder="Enter Name" required /></p>
<p><input type="text" name="email" placeholder="Enter Email" required /></p>
<p><input type="text" name="phoneno" placeholder="Enter Phoneno" required /></p>
<p><input type="text" name="salary" placeholder="Enter Salary" required /></p>
<p><input name="submit" type="submit" value="Submit" /></p>
</form>
<p style="color:#FF0000;"><?php echo $status; ?></p>
</div>
</div>
</body>
</html>
