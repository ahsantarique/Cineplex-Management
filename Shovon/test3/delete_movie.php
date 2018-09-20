<?php 
require('db.php');
$id=$_REQUEST['id'];
$query = "DELETE FROM movie WHERE m_id=$id"; 
$result = mysql_query($query) or die ( mysql_error());
header("Location: view_movie.php"); 
 ?>
