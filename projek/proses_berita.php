<?php
session_start();
 include 'koneksi.php' ; 
if (isset($_GET['tambah'])){

	$judul = $_POST['judul'];
	$konten = $_POST['konten'];
	$tanggal = $_POST['tanggal'];
	
	$query =mysqli_query($db,"INSERT INTO berita(judul,konten,tanggal) VALUES ('$judul','$konten','$tanggal')");
		header('location:db_berita.php');



} elseif (isset($_GET['delete'])){
	//query delete data
	$query =mysqli_query($db,"DELETE FROM berita WHERE id='$_GET[id]'");
	header('location:db_berita.php');

} elseif (isset($_GET['update'])){
	
	$id = $_POST['id'];
	$judul = $_POST['judul'];
	$konten = $_POST['konten'];
	$tanggal = $_POST['tanggal'];
	$query =mysqli_query($db,"UPDATE berita SET 
		judul='$judul',
		konten='$konten',
		tanggal='$tanggal' 
		where id='$id'");
		header('location:db_berita.php');

}

?>
