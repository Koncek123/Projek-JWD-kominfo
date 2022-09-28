<?php 
session_start();
include 'koneksi.php';
$id=$_GET['id'];
$kontak=mysqli_query($db, "SELECT * FROM kontak WHERE id=$id");
foreach($kontak as $kontaks);
var_dump($kontaks);
?>
<!DOCTYPE html>
<html>
<head>
	<title>Homepage</title>
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta name="author" content="Adi Muhamad Fajar">
	<meta name="description" content="db_berita">
	<link  rel="stylesheet" href="css/bootstrap.min.css">
    <script type="text/javascript" src="lib/tinymce/js/tinymce/tinymce.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="lib/datatables/jQuery-3.6.0/jquery-3.6.0.min.js"></script>
    <link rel="stylesheet" type="text/css" href="lib/datatables/datatables.min.css">
    <script type="text/javascript" charset="utf-8" src="lib/datatables/datatables.min.js"></script>
</head>
<body>
	<ul class="nav justify-content-center">
	  <li class="nav-item">
	    <a class="nav-link active" aria-current="page" href="homepage_2.php">Home</a>
	  </li>
	  <li class="nav-item">
	    <a class="nav-link" href="db_berita.php">db_berita</a>
	  </li>
	  <li class="nav-item">
	    <a class="nav-link" href="db_kontak.php">db_kontak</a>
	  </li>
	  <li class="nav-item">
	    <a class="nav-link" href="user.php">User</a>
	  </li>
	  <li class="nav-item">
	    <a class="nav-link" href="homepage.php">logout</a>
	  </li>
	</ul>
	<h2>Edit Kontak</h2>
	<div class="container">
		<form method="POST" action="proses_kontak.php?update">
			<input type="hidden" name="id" value="<?=$kontaks["id"]; ?>">
	        <div class="mb-3 row">
	          <label class="col-sm-2 col-form-label">Nama</label>
	          <div class="col-sm-10">
	            <input type="text" class="form-control" name="nama" value="<?=$kontaks["nama"];?>">
	          </div>
	        </div>
	         <div class="mb-3 row">
	          <label class="col-sm-2 col-form-label">No.Hp</label>
	          <div class="col-sm-10">
	            <input type="number" class="form-control" name="nohp" value="<?=$kontaks["nohp"];?>">
	          </div>
	        </div>
		    
	        <div class="mb-3 row">
	            <div class="col-sm-12">
	             <button name="submit" class="btn btn-success">simpan</button>
	            </div>
	        </div>
        </form>
    </div>
</body>
</html>