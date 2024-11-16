<?php 
session_start();

if (isset($_SESSION['admin'])) {
    header('Location: admin_dashboard.php');
    exit();
}

if (isset($_SESSION['nim'])) {
    header('Location: student_dashboard.php');
    exit();
}
?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light d-flex justify-content-center align-items-center min-vh-100">
    <div class="container">
        <div class="card shadow p-4" style="max-width: 400px; margin: auto;">
            <h2 class="text-center mb-4">Login</h2>
            <div class="mb-3">
                <a href="admin_login.php" class="btn btn-primary w-100">Login sebagai Admin</a>
            </div>
            <div>
                <a href="student_login.php" class="btn btn-success w-100">Login sebagai Mahasiswa</a>
            </div>
            <div class="d-flex justify-content-center">
                <button type="button" class="btn btn-danger mt-3" onclick="window.location.href='welcome.php'">Kembali</button>
            </div>
        </div>
    </div>
</body>
</html>
