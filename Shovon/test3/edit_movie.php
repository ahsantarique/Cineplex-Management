<?php 
require('db.php');
include("auth.php");
//$customer_id=$_REQUEST['customer_id'];
$id=$_REQUEST['id'];
$query = "SELECT * from movie where m_id='".$id."'"; 
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
<p><a href="dashboard.php">Dashboard</a> | <a href="insert_movie.php">Insert New Movie Record</a> | <a href="http://localhost/test3/login.php">Logout</a></p>
<h1>Update Record</h1>
<?php
$status = "";
if(isset($_POST['new']) && $_POST['new']==1)
{
//$id=$_REQUEST['customer_id'];
$m_name =$_REQUEST['m_name'];
$genre = $_REQUEST['genre'];
$certificate =$_REQUEST['certificate'];
$Imdb_rating = $_REQUEST['Imdb_rating'];
$image=$_REQUEST['image'];
$update="update movie set m_name='$m_name', genre='$genre', certificate='$certificate', Imdb_rating='$Imdb_rating',image='$image' where m_id='".$id."'";
mysql_query($update) or die(mysql_error());
$status = "Movie Record Updated Successfully. </br></br><a href='view_movie.php'>View Updated Movie Record</a>";
echo '<p style="color:#FF0000;">'.$status.'</p>';
}else {
?>
<div>
<form name="form" method="post" action=""> 
<input type="hidden" name="new" value="1" />
<input name="id" type="hidden" value="<?php echo $row['m_id'];?>" />
<p><input type="text" name="m_name" placeholder="Enter Movie Name" required value="<?php echo $row['m_name'];?>" /></p>
<p><input type="text" name="genre" placeholder="Enter Genre" required value="<?php echo $row['genre'];?>" /></p>
<p><input type="text" name="certificate" placeholder="Enter Certificate" required value="<?php echo $row['certificate'];?>" /></p>
<p><input type="text" name="Imdb_rating" placeholder="Enter Imdb Rating" required value="<?php echo $row['Imdb_rating'];?>" /></p>
<p><input type="text" name="image" placeholder="Enter Image Name" required value="<?php echo $row['image'];?>" /></p>
<p><input name="submit" type="submit" value="Update" /></p>
</form>
<?php } ?>
</div>
</div>
</body>
</html>
