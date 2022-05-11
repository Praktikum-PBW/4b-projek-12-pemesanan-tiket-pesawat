<?php
include 'config.php';

$nama = $_POST['nama'];
$email = $_POST['email'];
$pesan = $_POST['massege'];

$cntct = mysqli_query($conn, "INSERT INTO `contact` (nama, email, massege) VALUES ('" . $nama . "', '" . $email . "', '" . $pesan . "')") or die(mysqli_error($conn));

if ($cntct) {
    echo "<script>alert ('Berhasil')</script>";
    echo "<script>window.location.href='dashboard.php'</script>";
} else {
    echo "<script>alert ('Gagal')</script>";
    echo "<script>window.location.href='dashboard.php'</script>";
}
