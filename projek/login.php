<?php
session_start();
include('koneksi.php');

?>
<!doctype html>
    <!DOCTYPE html>
    <html>
    <header>
        <title>login</title>
        <link  rel="stylesheet" href="css/bootstrap.min.css">
        <script type="text/javascript" src="lib/tinymce/js/tinymce/tinymce.min.js"></script>
        <script src="js/bootstrap.min.js"></script>
        <script src="lib/datatables/jQuery-3.6.0/jquery-3.6.0.min.js"></script>
    </header>
    <body>
        <h3>login</h3>
        <a href="homepage.php">Kembali ke home</a>
        <form action="" method="POST">
            username<input type="text" name="username"><br>
            password<input type="password" name="password"><br>
            <input type="submit" name="login" value="login">
        </form>
        <?php
        if (isset($_POST['login'])) {
            $username=$_POST['username'];
            $password=md5($_POST['password']);
           

            $hasil=$db->query("SELECT * FROM user where username='$username' AND password='$password'");
            if($hasil->num_rows > 0){
                $data = mysqli_fetch_array($hasil);
                $_SESSION['username'] = $data['username'];
                $_SESSION['level'] = $data['level'];
                header('location:homepage_2.php');
            }else{
                //error
                echo "<script>alert('username atau password yang anda input salah.coba kembali!!!')</script>";
            }
        }
        ?>
    </body>
    </html>