<?php
session_start();
include "./config/config.php";

if (isset($_SESSION['admin'])) {
    header('Location: admin_dashboard.php');
    exit();
}

if (isset($_SESSION['nim'])) {
    header('Location: student_dashboard.php');
    exit();
}

$success = "";
$error = "";

if (isset($_POST['register'])) {
    $name = $_POST['name'];
    $nim = $_POST['nim'];
    $studyProgram = $_POST['studyProgram'];

    // Check if the NIM already exists
    $queryCheckNIM = "SELECT * FROM mahasiswa WHERE nim = '$nim' LIMIT 1";
    $resultCheckNIM = mysqli_query($conn, $queryCheckNIM);

    if (mysqli_num_rows($resultCheckNIM) > 0) {
        $error = "NIM sudah terdaftar";
    } else {
        // If NIM is not found, insert new record
        $query = "INSERT INTO mahasiswa(`name`, nim, studyProgram) VALUES('$name', '$nim', '$studyProgram')";
        if (mysqli_query($conn, $query)) {
            $success = "Pendaftaran berhasil. Silakan login.";
            header("Location: student_login.php?success=1");
            exit;
        } else {
            $error = "Terjadi kesalahan saat mendaftarkan akun.";
        }
    }
}
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register Mahasiswa</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light d-flex justify-content-center align-items-center min-vh-100">
    <div class="container">
        <div class="card shadow p-4" style="max-width: 400px; margin: auto;">
            <h2 class="text-center mb-4">Register Mahasiswa</h2>

            <?php if ($error) { ?>
                <div class="alert alert-danger">
                    <?= $error ?>
                </div>
            <?php } ?>

            <form action="" method="POST">
                <div class="mb-3">
                    <input type="text" name="name" class="form-control" placeholder="Nama" required>
                </div>
                <div class="mb-3">
                    <input type="text" name="nim" class="form-control" placeholder="NIM" required>
                </div>
                <div class="mb-3">
                    <input type="text" name="studyProgram" class="form-control" placeholder="Program Studi" required>
                </div>
                <button type="submit" name="register" class="btn btn-primary w-100">Register</button>
            </form>
        </div>
    </div>
</body>
</html>
