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
      <h1>Tambah Berita</h1>
  </div>
        <form method="POST" action="proses_berita.php?tambah">
	        <div class="mb-3 row">
	          <label class="col-sm-2 col-form-label">Judul</label>
	          <div class="col-sm-10">
	            <input type="text" class="form-control" name="judul">
	          </div>
	        </div>
		    	<div class="mb-3 row">
	          <label class="col-sm-2 col-form-label">Konten</label>
	        </div>
	        <div class="row">
	            <div class="col-sm-12">
	               <textarea name="konten" class="form-control" rows="10"></textarea>
	            </div>
	        </div>
	        <div class="mb-3 row">
	          <label class="col-sm-2 col-form-label">tanggal</label>
	          <div class="col-sm-10">
	            <input type="date" class="form-control" name="tanggal">
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
      <h2 style="font-family: sans-serif; color: black;">db_berita</h2>
      <div class="mb-3 row">
      	<a href="homepage_2.php">Kembali ke Home</a>
        <a href="?tambah">Tambah Berita</a>
		    <table id="table-data" class="table table-striped">
		      <thead>
		      <tr>
		        <th>no</th>
		        <th>Judul</th>
		        <th>Konten</th>
		        <th>Tanggal</th>
		        <th>aksi</th>
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
		        <td><a href="proses_berita.php?delete&id=<?=$beritas['id']?>">Delete |<a href="edit_berita.php?id=<?= $beritas['id']?>;"> Edit</td>
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