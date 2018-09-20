
<!-- Template by Quackit.com -->
<?php
    require('db.php');
    include("auth.php");

    $id=$_REQUEST['id'];
    $cnt= $_REQUEST['cnt'];


    	/*$q3 = "SELECT * from customer where c_id = $customer;";
		$r3 = mysql_query($query) or die ( mysql_error());
		$row = mysql_fetch_assoc($r3);*/

		$user= $_SESSION['username'];
		$q3 = "SELECT * from customer where c_name ='$user'";

		$r3 = mysql_query($q3) or die ( mysql_error());
		$rows3 = mysql_fetch_assoc($r3);

		$cid = $rows3['customer_id'];


		$query = "SELECT * from shows ss join  movie mm on (ss.m_id = mm.m_id) where s_id='".$id."'";
		$result = mysql_query($query) or die ( mysql_error());
		$row = mysql_fetch_assoc($result);

		$q2 = "select max(seat_no) seat, max(ticket_number) ticket from ticket t join shows s on(t.s_id = s.s_id) where s.hall_no='".$row['hall_no']."'";
		$r2 = mysql_query($q2) or die ( mysql_error());
		$rows2 = mysql_fetch_assoc($r2);


		$h = $row['hall_no'];
		$tid = 1;
		$p = $row['price'];
		$seat = $rows2['seat'];
		$d = $row['start_time'];
		$ticket = $rows2['ticket'];


		$i = 0;
		while($i < $cnt){
		$ins_query="insert into ticket(`hall_no`,`t_id`,`price`,`seat_no`,`show_date`, `s_id`) values('$h','$tid','$p','$seat','$d', '$id')";
		$in2 = "insert into booking (`c_id`, `ticket_no`, `booking_date`) values($cid, $ticket, sysdate())";
		$result = mysql_query($ins_query) or die ( mysql_error());
		$result2 = mysql_query($in2) or die ( mysql_error());

		$seat = $seat+1;
		$i = $i +1;

	}
	//echo "ok";
?>

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
                    <li>
                        <a href="http://localhost/ci2/index.php/home">Home</a>
                    </li>
                    <li>
                        <a href="http://localhost/test3/about.php">About</a>
                    </li>
                    <li>
                        <a href="http://localhost/ci2/index.php/show_schedule">Show Schedule</a>
                    </li>
                    <li class="active">
                        
                            <a href="http://localhost/test3/login.php">Member Login</a>
                        
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

<div class= "jumbotron feature">
<h2> You have successfully booked
<?php
	echo $_SESSION['username'];
	echo $cnt;
	echo " tickets for ";
	echo $row['m_name'];
	echo "<h2> Date: "; echo $d;
	echo "<h2> Hall no: "; echo $h;
	echo " <h2> for ";
	echo $cnt*$p; echo " taka";
?>
</div>

</body>

