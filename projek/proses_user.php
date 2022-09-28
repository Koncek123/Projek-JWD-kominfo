<?php
session_start();
 include 'koneksi.php' ; 
if (isset($_GET['tambah'])){

	$username = $_POST['username'];
	$password = md5($_POST['password']);
	
	$query =mysqli_query($db,"INSERT INTO user(username,password) VALUES ('$username','$password')") or die (mysqli_error($db));
		header('location:user.php');



} elseif (isset($_GET['delete'])){
	//query delete data
	$query =mysqli_query($db,"DELETE FROM user WHERE id='$_GET[id]'");
	header('location:user.php');

} elseif (isset($_GET['update'])){
	$id = $_POST['id'];
	$username = $_POST['username'];
	$password = md5($_POST['password']);

	$query =mysqli_query($db,"UPDATE user SET 
		username='$username', 
		password='$password'
		where id='$id'")or die (mysqli_error($db));
		header('location:user.php');

}

?>