<?php
$host = "localhost";
$user = "root";  // Sesuaikan dengan username MySQL kamu
$pass = "";  // Kosongkan jika pakai XAMPP
$db = "toko";

$conn = mysqli_connect($host, $user, $pass, $db);

if (!$conn) {
    die("Koneksi gagal: " . mysqli_connect_error());
}
?>
