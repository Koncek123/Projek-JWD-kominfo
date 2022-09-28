<?php 
session_start();
include 'koneksi.php';
?>

<!DOCTYPE html>
<html>
<head>
	<title>Homepage</title>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta name="author" content="Adi Muhamad Fajar">
	<meta name="description" content="Homepage">
	<link  rel="stylesheet" href="css/bootstrap.min.css">
	<script src="js/bootstrap.min.js"></script>
	
</head>
<body>
	<ul class="nav justify-content-center">
	  <li class="nav-item">
	    <a class="nav-link active" aria-current="page" href="homepage.php">Home</a>
	  </li>
	  <li class="nav-item">
	    <a class="nav-link" href="login.php">Login</a>
	  </li>
	</ul>

	<div>
		<h2 style="font-family: times new roman"><b>Berita</b></h2>
	    <table id="table-data" class="table table-striped">
	      <thead>
	      <tr>
	        <th>No</th>
	        <th>Judul</th>
	        <th>Konten</th>
	        <th>Tanggal</th>
	      </tr>
	      </thead>
	      <tbody>
	      <?php
	      $berita=mysqli_query($db, "SELECT * FROM berita");
	      $no=1;
	      foreach($berita as $beritas){?>
	      <tr>
	        <td><?=$no?></td>
	        <td><?= $beritas['judul']?></td>
	        <td><?= $beritas['konten']?></td>
	        <td><?= $beritas['tanggal']?></td>
	      </tr>
	      <?php $no++;}?>
	      </tbody>
	    </table>
    </div>

    <div>
		<h2 style="font-family: times new roman"><b>Kontak</b></h2>
	    <table id="table-data" class="table table-striped">
	      <thead>
	      <tr>
	        <th>No.</th>
	        <th>Nama</th>
	        <th>No. Hp</th>
	      </tr>
	      </thead>
	      <tbody>
	      <?php
	      $kontak=mysqli_query($db, "SELECT * FROM kontak");
	      $no=1;
	      foreach($kontak as $kontaks){?>
	      <tr>
	        <td><?=$no?></td>
	        <td><?= $kontaks['Nama']?></td>
	        <td><?= $kontaks['nohp']?></td>
	      </tr>
	      <?php $no++;}?>
	      </tbody>
	    </table>
    </div>
</body>
<script>
    tinymce.init({
      selector: 'textarea'
    });

    $(document).ready(function(){
      $('#table-data').DataTable();
    });
</script>
</html>