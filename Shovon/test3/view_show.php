<?php 
require('db.php');
include("auth.php");
?>
<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<title>View Show Records</title>
<link rel="stylesheet" href="css/style.css" />
</head>
<body>
<div class="form">
<p><a href="Dashboard.php">Dashboard</a> | <a href="http://localhost/ci5/index.php/employee">Insert New Show Record</a> | <a href="http://localhost/test3/login.php">Logout</a></p>
<h2>View Show Records</h2>
<table width="100%" border="1" style="border-collapse:collapse;">
<thead>
<tr><th><strong>Show_id</strong></th><th><strong>Start_Time_Y:M:D_H:M:S</strong></th><th><strong>End_Time_Y:M:D_H:M:S</strong></th><th><strong>Language</strong></th><th><strong>Movie_Name</strong></th><th><strong>Edit</strong></th><th><strong>Delete</strong></th></tr>
</thead>
<tbody>
<?php
$count=1;
$sel_query="Select s.s_id,s.start_time,s.end_time,s.language,m.m_name from shows s join movie m on(s.m_id=m.m_id) order by s_id asc;";
$result = mysql_query($sel_query);
while($row = mysql_fetch_assoc($result)) { ?>
<tr><td align="center"><?php echo $count; ?></td><td align="center"><?php echo $row["start_time"]; ?></td><td align="center"><?php echo $row["end_time"]; ?></td><td align="center"><?php echo $row["language"]; ?></td><td align="center"><?php echo $row["m_name"]; ?></td><td align="center"><a href="edit_show.php?id=<?php echo $row["s_id"]; ?>">Edit</a></td><td align="center"><a href="delete_show.php?id=<?php echo $row["s_id"]; ?>">Delete</a></td></tr>
<?php $count++; } ?>
</tbody>
</table>
</div>
</body>
</html>
