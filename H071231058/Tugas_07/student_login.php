<?php
session_start();
include "./config/config.php";

$error = "";

if (isset($_SESSION['admin'])) {
    header('Location: admin_dashboard.php');
    exit();
}

if (isset($_SESSION['nim'])) {
    header('Location: student_dashboard.php');
    exit();
}

if (isset($_POST['login'])) {
    $nim = $_POST['nim'];

    // Check if NIM exists in the database
    $query = "SELECT * FROM mahasiswa WHERE nim = '$nim'";
    $result = mysqli_query($conn, $query);

    if (mysqli_num_rows($result) > 0) {
        $_SESSION['nim'] = $nim; 
        header("Location: student_dashboard.php"); 
        exit;
    } else {
        $error = "NIM tidak ditemukan";
    }
}
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Mahasiswa</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light d-flex justify-content-center align-items-center min-vh-100">
    <div class="container">
        <div class="card shadow p-4" style="max-width: 400px; margin: auto;">
            <h2 class="text-center mb-4">Login Mahasiswa</h2>

            <?php if ($error) { ?>
                <div class="alert alert-danger">
                    <?= $error ?>
                </div>
            <?php } ?>

            <form action="" method="POST">
                <div class="mb-3">
                    <input type="text" name="nim" class="form-control" placeholder="Nomor Induk Mahasiswa" required>
                </div>
                <button type="submit" name="login" class="btn btn-success w-100">Login</button>
            </form>

            <div class="text-center mt-3">
                <a href="register.php" class="text-decoration-none">Belum punya akun? Daftar di sini</a>
            </div>
        </div>
    </div>
</body>
</html>
