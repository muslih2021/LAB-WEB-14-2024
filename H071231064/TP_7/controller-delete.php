<?php
ob_start();
include("model.php");
session_start();

if ($_POST) {
    $currentUser = $_SESSION['user']; // User yang sedang login
    $requestId = $_POST['id']; // ID mahasiswa yang akan dihapus

    // Hapus data mahasiswa berdasarkan ID
    if (deleteMahasiswa($requestId)) {
        $_SESSION['success'] = "Data mahasiswa berhasil dihapus."; // Simpan pesan sukses ke session
    } else {
        $_SESSION['error'] = "Gagal menghapus data mahasiswa."; // Simpan pesan error ke session
    }

    header('Location: index.php');
    exit(); // Pastikan untuk menghentikan eksekusi skrip setelah header
}