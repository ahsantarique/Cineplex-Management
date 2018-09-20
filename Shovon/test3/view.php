<?php 
require('db.php');
include("auth.php");
?>
<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<title>View Records</title>
<link rel="stylesheet" href="css/style.css" />
</head>
<body>
<div class="form">
<p><a href="Dashboard.php">Dashboard</a> | <a href="insert.php">Insert New Customer Record</a> | <a href="http://localhost/test3/login.php">Logout</a></p>
<h2>View Records</h2>
<table width="100%" border="1" style="border-collapse:collapse;">
<thead>
<tr><th><strong>customer_id</strong></th><th><strong>Name</strong></th><th><strong>Email</strong></th><th><strong>Phoneno</strong></th><th><strong>Password</strong></th><th><strong>Edit</strong></th><th><strong>Delete</strong></th></tr>
</thead>
<tbody>
<?php
$count=1;
$sel_query="Select * from customer order by customer_id asc;";
$result = mysql_query($sel_query);
while($row = mysql_fetch_assoc($result)) { ?>
<tr><td align="center"><?php echo $count; ?></td><td align="center"><?php echo $row["c_name"]; ?></td><td align="center"><?php echo $row["email"]; ?></td><td align="center"><?php echo $row["phoneno"]; ?></td><td align="center"><?php echo $row["password"]; ?></td><td align="center"><a href="edit.php?id=<?php echo $row["customer_id"]; ?>">Edit</a></td><td align="center"><a href="delete.php?id=<?php echo $row["customer_id"]; ?>">Delete</a></td></tr>
<?php $count++; } ?>
</tbody>
</table>
</div>
</body>
</html>
