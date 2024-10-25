<?php
include("model.php");
session_start();

if ($_POST) {
    $requestEmail = $_POST['email'];
    $requestUsername = $_POST['username'];
    $requestPassword = $_POST['password'];
    $requestNama = $_POST['nama'];
    $requestNim = $_POST['nim'];
    $requestProdi = $_POST['prodi'];

    // Cek apakah username sudah ada di database
    if (isUsernameExists($requestUsername)) {
        $_SESSION['error'] = 'Username sudah ada, silakan pilih username lain.';
        header('Location: register.php');
    }
    // Cek apakah email sudah ada di database
    elseif (isEmailExists($requestEmail)) {
        $_SESSION['error'] = 'Email sudah ada, silakan gunakan email lain.';
        header('Location: register.php');
    }
    else {
        // Tambahkan user baru ke database
        $role_id = 2; // Role mahasiswa
        $userInserted = insertUser($requestEmail, $requestUsername, $requestPassword, $role_id);
        
        if ($userInserted) {
            // Setelah user berhasil ditambahkan, dapatkan ID user yang baru
            $newUser = loginUser($requestUsername, $requestPassword); // Dapatkan user yang baru dimasukkan
            $idUser = $newUser['id']; // Dapatkan ID user yang baru
            
            // Tambahkan mahasiswa ke database dan hubungkan dengan user_id
            $mahasiswaInserted = insertMahasiswa($requestNama, $requestNim, $requestProdi, $idUser);
            
            if ($mahasiswaInserted) {
                // Berhasil mendaftarkan user dan mahasiswa
                header('Location: login.php');
            } else {
                $_SESSION['error'] = 'Gagal menambahkan data mahasiswa';
                header('Location: register.php');
            }
        } else {
            $_SESSION['error'] = 'Gagal mendaftarkan user';
            header('Location: register.php');
        }
    }
}