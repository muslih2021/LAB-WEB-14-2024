<?php
$host = "localhost";
$user = "root";
$pass = "";
$db = "db_university";

// Membuat koneksi
$conn = new mysqli($host, $user, $pass, $db);

// Cek koneksi
if ($conn->connect_error) {
    die("Koneksi ke database GAGAL: " . $conn->connect_error);
}
?>
