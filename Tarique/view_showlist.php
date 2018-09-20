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
<title>Show List</title>
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

 <!-- Navigation -->
    <nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
        <div class="container">
            <!-- Logo and responsive toggle -->
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#navbar">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="#">
                    <span class="glyphicon glyphicon-fire"></span> 
                    Logo
                </a>
            </div>
            <!-- Navbar links -->
            <div class="collapse navbar-collapse" id="navbar">
                <ul class="nav navbar-nav">
                    <li class="active">
                        <a href="http://localhost/ci2/index.php/home">Home</a>
                    </li>
                    <li>
                        <a href="http://localhost/test3/about.php">About</a>
                    </li>
                    <li>
                        <a href="http://localhost/test3/view_showlist.php">Show Schedule</a>
                    </li>
                    <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Login <span class="caret"></span></a>
                        <ul class="dropdown-menu" aria-labelledby="about-us">
                            <li><a href="http://localhost/test3/member.php">Member</a></li>
                            <li><a href="http://localhost/test3/login.php">Admin</a></li>
                        </ul>
                    </li>
                </ul>

                <!-- Search -->
                <form class="navbar-form navbar-right" role="search">
                    <div class="form-group">
                        <input type="text" class="form-control">
                    </div>
                    <button type="submit" class="btn btn-default">Search</button>
                </form>

            </div>
            <!-- /.navbar-collapse -->
        </div>
        <!-- /.container -->
    </nav>
<div class="container">

<div class="row">
        <div class="col-sm-offset-3 col-lg-6 col-sm-6 well">
<div class="form">
<h2>Show List</h2>
<table width="100%" border="1" style="border-collapse:collapse;">
<thead>
<tr><th><strong>Movie</strong></th><th><strong>Start_Time</strong></th><th><strong>Book Now</strong></th>
</thead>
<tbody>
<?php
$count=1;
$sel_query="Select s.s_id,s.start_time,s.end_time,s.language,m.m_name from shows s join movie m on(s.m_id=m.m_id) order by s_id asc;";
$result = mysql_query($sel_query);
while($row = mysql_fetch_assoc($result)) { ?>
<tr><td align="center"><?php echo $row["m_name"]; ?></td><td align="center"><?php echo $row["start_time"]; ?></td><td align="center"><a href="book_now.php?id=<?php echo $row["s_id"]; ?>">Book Now</a></td>
<?php $count++; } ?>
</tbody>
</table>
</div>
</div>
</div>
</div>
</body>
</html>
