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
    <title>Selamat Datang</title>
    <link href="styles.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    
</head>
<body>

    <div class="welcome-container">
        <h1>Selamat Datang di Sistem Kami</h1>
        <p>Silakan klik tombol di bawah untuk melanjutkan ke halaman login</p>
        <a href="loginRole.php" class="btn btn-primary btn-lg">Mulai</a>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
