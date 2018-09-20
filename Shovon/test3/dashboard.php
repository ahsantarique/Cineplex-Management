<?php 
require('db.php');
include("auth.php"); //include auth.php file on all secure pages ?>
<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<title>Dashboard - View Records</title>
<link rel="stylesheet" href="css/style.css" />
</head>
<body>
<div class="form">
<p>Welcome to Dashboard.</p>
<p><a href="index.php">Admin Home</a><p>
<p><a href="insert.php">Insert New Customer Record</a></p>
<p><a href="view.php">View Customer Records</a><p>
<p><a href="insert_movie.php">Insert New Movie Record</a></p>
<p><a href="upload_test.php">Upload Movie Picture</a></p>
<p><a href="view_movie.php">View Movie Records</a><p>
<p><a href="http://localhost/ci5/index.php/employee">Insert New Show Record</a></p>
<p><a href="view_show.php">View Show Records</a><p>
<p><a href="insert_employee.php">Insert New Employee Record</a></p>
<p><a href="view_employee.php">View Employee Records</a><p>
<p><a href="http://localhost/test3/login.php">Logout</a></p>
</div>
</body>
</html>
