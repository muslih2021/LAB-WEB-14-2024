<?php
include("model.php");
session_start();

if ($_POST) {
    $currentUser = $_SESSION['user']; // User yang sedang login
    $requestId = $_POST['id']; // ID mahasiswa yang akan diubah
    $requestNama = $_POST['nama']; // Nama mahasiswa baru
    $requestNim = $_POST['nim']; // NIM mahasiswa baru
    $requestProdi = $_POST['prodi']; // Prodi mahasiswa baru

    // Memperbarui data mahasiswa berdasarkan input
    if (updateMahasiswa($requestId, $requestNama, $requestNim, $requestProdi, $currentUser['id'])) {
        echo "Data mahasiswa berhasil diperbarui.";
    } else {
        echo "Gagal memperbarui data mahasiswa.";
    }

    header('Location: index.php');
}