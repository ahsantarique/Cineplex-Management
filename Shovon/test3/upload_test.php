<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<title>Insert New Movie Record</title>
<link rel="stylesheet" href="css/style.css" />
</head>
<body>
<div class="form">
<p><a href="dashboard.php">Dashboard</a> | <a href="view_movie.php">View Movie Records</a> | <a href=""http://localhost/test3/login.php"">Logout</a></p>
<div>
<form action="upload.php" method="post" enctype="multipart/form-data">
    Select image to upload:
    <input type="file" name="fileToUpload" id="fileToUpload">
    <input type="submit" value="Upload Image" name="submit">
</form>

</body>
</html>