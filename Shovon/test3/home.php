<?php
    include("nivoslider.php");
    include ('config.php');
    $data1='http://localhost/ci2/images/';
    $nivo=new NivoSlider('nivoslider',618,246);     // base path is same directory
     $qslide = mysql_query("SELECT * FROM movie order by m_id");
            //$result = mysql_query("SELECT * FROM Users WHERE UserName LIKE '$username'");

        if($qslide === FALSE) { 
              die(mysql_error()); // TODO: better error handling
             }else{
                while ($dataslide = mysql_fetch_array($qslide)) {
                    $result = $data1 . $dataslide['image'];
                    $nivo->add_slide($result,'http://localhost/ci2/index.php/show_schedule',$dataslide['m_name']);
                }
             }
    //$nivo->add_slide(ImagePath,URL,Caption);
    
    
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link href="//maxcdn.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap.min.css" rel="stylesheet">
<?php $nivo->render_includes(); ?>
<title>Home Page</title>
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
                        <a href="http://localhost/test3/home.php">Home</a>
                    </li>
                    <li>
                        <a href="http://localhost/test3/about.php">About</a>
                    </li>
                    <li>
                        <a href="http://localhost/ci2/index.php/show_schedule">Show Schedule</a>
                    </li>
                    <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Login <span class="caret"></span></a>
                        <ul class="dropdown-menu" aria-labelledby="about-us">
                            <li><a href="#">Member</a></li>
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
<div class="jumbotron feature">
        <div class="container">
            <h1 class="intro-text text-center">Now Showing  </h1>
            <?php $nivo->render_slides() ?>
        </div>
    </div>


 <footer>
        <div class="container">
            <div class="row">
                <div class="col-lg-12 text-center">
                    <p>Copyright &copy; Sk. Adnan Hassan and A.S.M Ahsanul Haque 2015</p>
                </div>
            </div>
        </div>
    </footer>
</body>
</html>