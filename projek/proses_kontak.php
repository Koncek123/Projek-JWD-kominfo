<?php
session_start();
 include 'koneksi.php' ; 
if (isset($_GET['tambah'])){

	$nama = $_POST['nama'];
	$nohp = $_POST['nohp'];
	
	$query =mysqli_query($db,"INSERT INTO kontak(nama,nohp) VALUES ('$nama','$nohp')");
		header('location:db_kontak.php');



} elseif (isset($_GET['delete'])){
	//query delete data
	$query =mysqli_query($db,"DELETE FROM kontak WHERE id='$_GET[id]'");
	header('location:db_kontak.php');

} elseif (isset($_GET['update'])){
	
	$id = $_POST['id'];
	$nama = $_POST['nama'];
	$nohp = $_POST['nohp'];
	$query =mysqli_query($db,"UPDATE kontak SET nama='$nama', 
		nohp='$nohp'
		where id='$id'")or die (mysqli_error($db));
		header('location:db_kontak.php');

}

?>
