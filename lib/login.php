<?php 
include 'config.php';
 
$username = $_POST['username'];
$password = md5($_POST['password']);
 
$login = mysqli_query($conn, "select * from user where username='$username' and password='$password'") or die(mysqli_error($conn));
$cek = mysqli_num_rows($login);
 
if($cek > 0){
    echo "<script>alert ('Berhasil Masuk')</script>";
	echo "<script>window.location.href='dashboard.php'</script>";
}else{
    echo "<script>alert ('Gagal')</script>";
    echo "<script>window.location.href='login_page.php'</script>";
}
