<?php
include("model.php");
session_start();

if ($_POST && !isset($_SESSION['user'])) {
    $requestUsername = $_POST['username'];
    $requestPassword = $_POST['password'];
    
    // Mencoba login
    $user = loginUser($requestUsername, $requestPassword);
    if ($user) {
        $_SESSION['user'] = $user;
        header('Location: index.php');
    } else {
        // Simpan pesan error di session
        $_SESSION['error'] = 'Username atau password salah';
        header('Location: login.php');
    }
    exit;
}