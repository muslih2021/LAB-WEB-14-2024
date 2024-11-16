<?php
session_start();
include "./config/config.php";

// Pastikan mahasiswa sudah login
if (!isset($_SESSION['nim'])) {
    header("Location: student_login.php");
    exit;
}

// Ambil NIM mahasiswa yang sedang login dari sesi
$nim = $_SESSION['nim'];

// Fetch student data based on NIM from the session
$queryGet = "SELECT id, `name`, nim, studyProgram FROM mahasiswa WHERE nim = '$nim' LIMIT 1";
$executeQGet = mysqli_query($conn, $queryGet);
$data = mysqli_fetch_assoc($executeQGet);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mahasiswa Dashboard</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">
    <div class="container mt-5">
        <h2 class="text-center">Welcome, <?= explode(' ', $data['name'])[0] ?>!</h2>

        <!-- Display student information -->
        <div class="card shadow p-4" style="max-width: 400px; margin: auto;">
            <h4 class="text-center">Data Mahasiswa</h4>
            <p><strong>Nama:</strong> <?= $data['name'] ?></p>
            <p><strong>NIM:</strong> <?= $data['nim'] ?></p>
            <p><strong>Program Studi:</strong> <?= $data['studyProgram'] ?></p>
        </div>
        <div class="d-flex justify-content-end mt-3">
            <button class="btn btn-danger" onclick="window.location.href='logout.php'">Logout</button>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
