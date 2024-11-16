<?php
include './config/config.php';
session_start();

$error = '';



if (isset($_POST['login'])) {
    $nama = $_POST['nama'];
    $nim = $_POST['nim'];

    // Query untuk mencari user berdasarkan nama
    $query = $conn->prepare("SELECT * FROM mahasiswa WHERE nama = ?");
    $query->bind_param('s', $nama);
    $query->execute();
    $result = $query->get_result();

    if ($result->num_rows > 0) {
        $user = $result->fetch_assoc();
        // Verifikasi NIM
        if ($nim === $user['nim']) {
            $_SESSION['role'] = $user['role'];
            $_SESSION['nama'] = $user['nama'];
            $_SESSION['nim'] = $user['nim'];
            header('Location: index.php');
            exit;
        } else {
            $error = 'NIM salah!';
        }
    } else {
        $error = 'Nama tidak ditemukan!';
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://cdn.jsdelivr.net/npm/flowbite@2.5.2/dist/flowbite.min.css" rel="stylesheet" />
    <link rel="stylesheet" href="style.css">
</head>
<body class="h-screen bg-cover"  style="background-image: url('image/bg1.jpg')">

    <div class="min-h-screen flex items-center justify-center">
        <div class="max-w-md w-full p-6 bg-slate-800/50 rounded-lg shadow-md">
        <h2 class="text-9xl font-bold text-white text-center mb" style="font-family: 'harry';">Edinburgh University</h2>
            <?php if ($error) { ?>
                <p class="text-red-500 text-center mb-4"><?= $error; ?></p>
            <?php } ?>

            <form method="POST" action="">
                <div class="mb-4">
                    <label class="block text-slate-100 mb-2">Nama:</label>
                    <input type="text" name="nama" class="w-full p-2 border rounded" required>
                </div>
                <div class="mb-6">
                    <label class="block text-white mb-2">NIM:</label>
                    <input type="password" name="nim" class="w-full p-2 border rounded" required>
                </div>
                <button type="submit" name="login" class="w-full bg-slate-700 text-white py-2 px-4 rounded hover:bg-slate-600">
                    Login
                </button>
            </form>

            <p class="mt-4 text-center text-white">
                Belum punya akun? 
                <a href="registrasi.php" class="text-slate-400 hover:text-slate-600">Daftar disini</a>
            </p>
        </div>
    </div>
</body>
</html>