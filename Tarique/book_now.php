
<!-- Template by Quackit.com -->
<?php
    require('db.php');
    include("auth.php");
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

    <?php
        $id=$_REQUEST['id'];

            define("someUnguessableVariable", "anotherUnguessableVariable");
            if(!($_SESSION['login'] == "true")){
                header ("Location: member.php");
            }       
    ?>

    <div class="form">
    <div class="jumbotron feature">
            <div class="container">
        <div class="row">
            <div class="col-sm-6 col-md-4 col-md-offset-4">
                <form action="" method="post" name="login">
                <div class="account-wall">

                <?php
                    $update = "SELECT * from shows ss join movie mm on (ss.m_id = mm.m_id) where s_id = '$id';";
                    $result = mysql_query($update) or die(mysql_error());
                    $rows = mysql_fetch_assoc($result);
                    echo "<h2> You are about to purchase for: <h2>";
                    echo $rows["m_name"];
                    echo "<h2>";
                    echo $rows["start_time"];
                    print(" <h3>
<form action=\"#\" method=\"post\">
<select name=\"number\"
<option value = 0> None </option>
<option value= 1 >1 Person</option>
<option value= 2 >2 Persons</option>
<option value= 3 >3 Persons</option>
<option value= 4 >4 Persons</option>
</select>");


echo (
        "<input type=\"submit\" name=\"submit\" value=\"\" />
        </form>");
                    
                      // Displaying Selected Values


                    $selected_val = 0;
                    if(isset($_POST['submit'])){
                    $selected_val = $_POST['number'];  // Storing Selected Value In Variable
                    //echo "You have selected :" .$selected_val;  // Displaying Selected Value
                    }

                        // Displaying Selected Value

                    echo $rows["price"];     
                    echo " taka <h2> Are you sure you want to continue?";     
                ?>

                    

                    <button class="btn btn-lg btn-primary btn-block" type="submit" name = "confirm" onclick="<?php $selected_val = $_POST['number']?>this.form.action='ticket_booked.php?id=<?php echo $id;?>&cnt=<?php echo $selected_val;?>';this.form.submit()">
                        confirm</button>
                    <button class="btn btn-lg btn-primary btn-block" type="submit" name = "back"  onclick="this.form.action='view_showlist.php';this.form.submit()">
                        back</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <!-- jQuery -->
    <script src="//code.jquery.com/jquery-1.11.3.min.js"></script>
    <!-- Bootstrap Core JavaScript -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js" integrity="sha384-0mSbJDEHialfmuBBQP6A4Qrprq5OVfW37PRR3j5ELqxss1yVqOtnepnHVP9aJ7xS" crossorigin="anonymous"></script>
    
    <!-- Placeholder Images -->
    
</body>

