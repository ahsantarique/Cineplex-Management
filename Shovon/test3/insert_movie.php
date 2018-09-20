<?php
require('db.php');
include("auth.php"); //include auth.php file on all secure pages
$status = "";
if(isset($_POST['new']) && $_POST['new']==1)
{
$trn_date = date("Y-m-d H:i:s");
//$id=$_REQUEST['m_id'];
$m_name =$_REQUEST['m_name'];
$genre = $_REQUEST['genre'];
$certificate =$_REQUEST['certificate'];
$Imdb_rating = $_REQUEST['Imdb_rating'];
$image=$_REQUEST['image'];
$ins_query="insert into movie(`m_name`,`genre`,`certificate`,`Imdb_rating`,`image`)values('$m_name','$genre','$certificate','$Imdb_rating','$image')";
mysql_query($ins_query) or die(mysql_error());
$status = "New Movie Record Inserted Successfully.</br></br><a href='view_movie.php'>View Inserted Record</a>";
}
?>
<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<title>Insert New Movie Record</title>
<link rel="stylesheet" href="css/style.css" />
</head>
<body>
<div class="form">
<p><a href="dashboard.php">Dashboard</a> | <a href="view_movie.php">View Movie Records</a> | <a href="http://localhost/test3/login.php">Logout</a></p>
<div>
<h1>Insert New Record</h1>
<form name="form" method="post" action=""> 
<input type="hidden" name="new" value="1" />
<p><input type="text" name="m_name" placeholder="Enter Movie Name" required /></p>
<p><input type="text" name="genre" placeholder="Enter Genre" required /></p>
<p><input type="text" name="certificate" placeholder="Enter Certificate" required /></p>
<p><input type="text" name="Imdb_rating" placeholder="Enter Imdb Rating" required /></p>
<p><input type="text" name="image" placeholder="Enter Image Name" required/></p>
<p><input name="submit" type="submit" value="Submit" /></p>
<p style="color:#FF0000;"><?php echo $status; ?></p>
</form>
</div>
</div>
</body>
</html>
