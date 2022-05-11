<?php 
include 'config.php';
 
$nama = $_POST['nama'];
$username = $_POST['username'];
$password = md5($_POST['password']);
 
$reg = mysqli_query($conn, "INSERT INTO `user` (nama, username, password) VALUES ('" . $nama . "', '" . $username . "', '" . $password . "')") or die(mysqli_error($conn));
 
if($reg){
    echo "<script>alert ('Berhasil Membuat Akun')</script>";
	echo "<script>window.location.href='login_page.php'</script>";
}else{
    echo "<script>alert ('Gagal')</script>";
    echo "<script>window.location.href='register_page.php'</script>";
}
 
?>