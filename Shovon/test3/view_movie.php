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
<p><a href="Dashboard.php">Dashboard</a> | <a href="insert_movie.php">Insert New Movie Record</a> | <a href="http://localhost/test3/login.php">Logout</a></p>
<h2>View Records</h2>
<table width="100%" border="1" style="border-collapse:collapse;">
<thead>
<tr><th><strong>Movie_id</strong></th><th><strong>Movie_Name</strong></th><th><strong>Genre</strong></th><th><strong>Certificate</strong></th><th><strong>Imdb_rating</strong></th><th><strong>Image Name</strong></th><th><strong>Edit</strong></th><th><strong>Delete</strong></th></tr>
</thead>
<tbody>
<?php
$count=1;
$sel_query="Select * from movie order by m_id asc;";
$result = mysql_query($sel_query);
while($row = mysql_fetch_assoc($result)) { ?>
<tr><td align="center"><?php echo $count; ?></td><td align="center"><?php echo $row["m_name"]; ?></td><td align="center"><?php echo $row["genre"]; ?></td><td align="center"><?php echo $row["certificate"]; ?></td><td align="center"><?php echo $row["Imdb_rating"]; ?></td><td align="center"><?php echo $row["image"]; ?></td><td align="center"><a href="edit_movie.php?id=<?php echo $row["m_id"]; ?>">Edit</a></td><td align="center"><a href="delete_movie.php?id=<?php echo $row["m_id"]; ?>">Delete</a></td></tr>
<?php $count++; } ?>
</tbody>
</table>
</div>
</body>
</html>
