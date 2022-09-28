<!DOCTYPE html>
<html>
<head>
	<title>Tambah user</title>
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta name="author" content="Adi Muhamad Fajar">
	<meta name="description" content="user">
	<link  rel="stylesheet" href="css/bootstrap.min.css">
  	<script type="text/javascript" src="lib/tinymce/js/tinymce/tinymce.min.js"></script>
  	<script src="js/bootstrap.min.js"></script>
  	<script src="lib/datatables/jQuery-3.6.0/jquery-3.6.0.min.js"></script>
  	<link rel="stylesheet" type="text/css" href="lib/datatables/datatables.min.css">
 	 <script type="text/javascript" charset="utf-8" src="lib/datatables/datatables.min.js"></script>
</head>
<body>
	<h2>Tambah User</h2>
	<form method="post" action="">
	        <div class="mb-3 row">
	          <label class="col-sm-2 col-form-label">Username</label>
	          <div class="col-sm-10">
	            <input type="text" class="form-control" name="username">
	          </div>
	        </div>
		    	<div class="mb-3 row">
	          <label class="col-sm-2 col-form-label">Password</label>
	          <div class="col-sm-10">
	            <input type="password" class="form-control" name="password">
	          </div
	        </div>
	        <div class="mb-3 row">
	            <div class="col-sm-12">
	             <input type="submit" name="submit" class="btn btn-success">
	            </div>
	        </div>
    </form>
</body>
</html>

<?php
	include 'koneksi.php';
	if (isset($_POST['submit'])){
		$username = $_POST['username'];
		$password= md5($_POST['password']);
		$sql= "INSERT INTO user (username,passsword) VALUES ('$username','$password')";
		mysqli_query($conn, $sql);
	}
?>