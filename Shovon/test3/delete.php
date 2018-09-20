<?php 
require('db.php');
$id=$_REQUEST['id'];
$query = "DELETE FROM customer WHERE customer_id=$id"; 
$result = mysql_query($query) or die ( mysql_error());
header("Location: view.php"); 
 ?>
