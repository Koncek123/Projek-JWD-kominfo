<?php
	session_start();
 	include 'koneksi.php' ; 
 	
 	function update ($data){
	global $conn;

	$id = $data["id"];
	$judul = htmlspecialchars($_POST['judul']);
	$konten = htmlspecialchars($_POST['konten']);
	$tanggal = htmlspecialchars($_POST['tanggal']);

	$query="UPDATE berita SET 
		judul='$judul',
		konten='$konten',
		tanggal='$tanggal' 
		where id='$id'";
	header('location:db_berita.php');

}
?>