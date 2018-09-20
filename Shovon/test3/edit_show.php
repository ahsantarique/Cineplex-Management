<?php 
require('db.php');
include("auth.php");
//$customer_id=$_REQUEST['customer_id'];
$id=$_REQUEST['id'];
$query = "SELECT s.s_id,s.start_time,s.end_time,s.language,m.m_name from shows s join movie m on(s.m_id=m.m_id) where s_id='".$id."'"; 
$result = mysql_query($query) or die ( mysql_error());
$row = mysql_fetch_assoc($result);
?>
<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>Update Record</title>
<link rel="stylesheet" href="css/style.css" />
<!--link the bootstrap css file-->
    <link href="//maxcdn.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap.min.css" rel="stylesheet">

    <!-- link jquery ui css-->
    <link href="//code.jquery.com/jquery-ui-1.11.2/jquery-ui.min.css'); ?>" rel="stylesheet">
    <!--include jquery library-->
    <script src="//code.jquery.com/jquery-1.11.3.min.js"></script>
    <!--load jquery ui js file-->
    <script src="//code.jquery.com/jquery-1.10.2.js"></script>
    <script src="//code.jquery.com/ui/1.11.4/jquery-ui.js"></script>
</head>
<body>

 <nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
 		<div class="container">
    <!-- Navbar links -->
            <div class="collapse navbar-collapse" id="navbar">
                <ul class="nav navbar-nav">
                    <li>
                        <a href="http://localhost/test3/dashboard.php">Dashboard</a>
                    </li>
                    <li>
                        <a href="http://localhost/test3/view_show.php">View Show Records</a>
                    </li>
                    <li>
                        <a href="http://localhost/test3/login.php">Logout</a>
                    </li>
                </ul>
            </div>
            </div>
            <!-- /.navbar-collapse -->
            </nav>
<div class="container">
<div class="jumbotron feature">
<div class="row">
        <div class="col-sm-offset-3 col-lg-6 col-sm-6 well">
        	<div class="form">

<?php
$status = "";
if(isset($_POST['new']) && $_POST['new']==1)
{
//$id=$_REQUEST['customer_id'];
$start_time = @date('Y-m-d h:i:sa', @strtotime($_REQUEST['start_time']));
$end_time = @date('Y-m-d h:i:sa', @strtotime($_REQUEST['end_time']));
$language =$_REQUEST['language'];
$m_name=$_REQUEST['m_name'];
$quer="SELECT m_id from movie where m_name='$m_name'";
$res = mysql_query($quer) or die ( mysql_error());
$r = mysql_fetch_assoc($res);
$m_id=$r['m_id'];
//$password = $_REQUEST['password'];
$update="update shows set start_time='$start_time',end_time='$end_time',language='$language',m_id='".$m_id."' where s_id='".$id."'";
mysql_query($update) or die(mysql_error());
$status = "Show Record Updated Successfully. </br></br><a href='view_show.php'>View Updated Record</a>";
echo '<p style="color:#FF0000;">'.$status.'</p>';
}else {
?>
<div>
<legend>Update Record</legend>
<form name="form" method="post" action=""> 
<input type="hidden" name="new" value="1" />
<input name="id" type="hidden" value="<?php echo $row['s_id'];?>" />
<p><input type="text" name="start_time" placeholder="Enter Start Time" required value="<?php echo $row['start_time'];?>" /></p>
<p><input type="text" name="end_time" placeholder="Enter End Time" required value="<?php echo $row['end_time'];?>" /></p>
<p><input type="text" name="language" placeholder="Enter Language" required value="<?php echo $row['language'];?>" /></p>
<p><input type="text" name="m_name" placeholder="Enter Movie Name" required value="<?php echo $row['m_name'];?>" /></p>
<p><input name="submit" type="submit" value="Update" /></p>
</form>
<?php } ?>
</div>
</div>
</div>
</div>
</div>
</div>
</body>
</html>
