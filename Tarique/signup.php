<?php
require('db.php');
include("auth.php"); //include auth.php file on all secure pages
$status = "";
if(isset($_POST['new']) && $_POST['new']==1)
{
$trn_date = date("Y-m-d H:i:s");
$c_name =$_REQUEST['c_name'];
$email = $_REQUEST['email'];
$phoneno =$_REQUEST['phoneno'];
$password = $_REQUEST['password'];
$ins_query="insert into customer(`customer_id`,`c_name`,`email`,`phoneno`,`password`)values('$id','$c_name','$email','$phoneno','$password')";
mysql_query($ins_query) or die(mysql_error());
$status = "New Customer Record Inserted Successfully.</br></br><a href='view.php'>View Inserted Record</a>";
header("Location: member.php");
}
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->

    <title>Confirmation</title>

    <!-- Bootstrap Core CSS -->
  
<link href="//maxcdn.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap.min.css" rel="stylesheet">


    <!-- Custom CSS: You can use this stylesheet to override any Bootstrap styles and/or apply your own styles -->


    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

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

<title>Insert New Record</title>
<link rel="stylesheet" href="css/style.css" />
</head>
<body>
<div class="form">
<div>
<h1>Insert New Record</h1>
<form name="form" method="post" action=""> 
<input type="hidden" name="new" value="1" />
<p><input type="text" name="c_name" placeholder="Enter Name" required /></p>
<p><input type="text" name="email" placeholder="Enter Email" required /></p>
<p><input type="text" name="phoneno" placeholder="Enter Phoneno" required /></p>
<p><input type="text" name="password" placeholder="Enter Password" required /></p>
<p><input name="submit" type="submit" value="Submit" /></p>
</form>
<p style="color:#FF0000;"><?php echo $status; ?></p>
</div>
</div>
</body>
</html>
