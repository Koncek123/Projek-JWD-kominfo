<?php 
session_start();
include 'koneksi.php';
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
 	<div class="container">
      <?php if (isset($_GET['tambah'])) {?>
      <h1>Tambah Kontak</h1>
  </div>
        <form method="POST" action="proses_kontak.php?tambah">
	        <div class="mb-3 row">
	          <label class="col-sm-2 col-form-label">Nama</label>
	          <div class="col-sm-10">
	            <input type="text" class="form-control" name="nama">
	          </div>
	        </div>
		    	<div class="mb-3 row">
	          <label class="col-sm-2 col-form-label">No. Hp</label>
	          <div class="col-sm-10">
	            <input type="number" class="form-control" name="nohp">
	          </div>
	        </div>
	        <div class="mb-3 row">
	            <div class="col-sm-12">
	             <button name="simpan" class="btn btn-success">simpan</button>
	            </div>
	        </div>
        </form>
			<?php }

			else {?>
      <h2 style="font-family: sans-serif; color: black;">db_kontak</h2>
      <div class="mb-3 row">
      	<a href="homepage_2.php">Kembali ke Home</a>
        <a href="?tambah">Tambah kontak</a>
		    <table id="table-data" class="table table-striped">
		      <thead>
		      <tr>
		        <th>No.</th>
		        <th>Nama</th>
		        <th>No.Hp</th>
		        <th>aksi</th>
		      </tr>
		      </thead>
		      <tbody>
		      <?php
		      $kontak=mysqli_query($db, "SELECT * FROM kontak");
		      $no=1;
		      foreach($kontak as $kontaks){?>
		      <tr>
		        <td><?=$no?></td>
		        <td><?= $kontaks['nama']?></td>
		        <td><?= $kontaks['nohp']?></td>
		        <td><a href="proses_kontak.php?delete&id=<?=$kontaks['id']?>">Delete |<a href="edit_kontak.php?id=<?= $kontaks['id']?>;"> Edit</td>
		      </tr>
		      <?php $no++;}?>
		      </tbody>
		    </table>
      </div>
    <?php }?>
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