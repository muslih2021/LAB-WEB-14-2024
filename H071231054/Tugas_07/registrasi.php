<?php
include './config/config.php';
session_start();

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $nim = trim($_POST['nim']);
    $nama = trim($_POST['nama']);
    $prodi = trim($_POST['prodi']);
    

    if (empty($nim) || empty($nama) || empty($prodi)) {
        $error = "Semua kolom harus diisi!";
    } else {
        $checkQuery = $conn->prepare("SELECT * FROM mahasiswa WHERE nim = ?");
        $checkQuery->bind_param('s', $nim);
        $checkQuery->execute();
        $checkResult = $checkQuery->get_result();

        if ($checkResult->num_rows > 0) {
            $error = "NIM sudah terdaftar!";
        } else {
            $role = 'mahasiswa';

            $query = $conn->prepare("INSERT INTO mahasiswa (nim, nama, prodi, role) VALUES (?, ?, ?, ?)");
            $query->bind_param('ssss', $nim, $nama, $prodi, $role);

            if ($query->execute()) {
                $_SESSION['success'] = "Pendaftaran berhasil! Silakan login menggunakan NIM Anda.";
                header('Location: login.php');
                exit;
            } else {
                $error = "Terjadi kesalahan saat mendaftarkan pengguna!";
            }
        }
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://cdn.jsdelivr.net/npm/flowbite@2.5.2/dist/flowbite.min.css" rel="stylesheet" />
</head>
<body class="h-screen bg-cover"  style="background-image: url('image/bg2.jpg')">
    <div class="container mx-auto mt-5 max-w-md">
        <?php if (isset($error)) { ?>
            <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative mb-4" role="alert">
                <span class="block sm:inline"><?php echo $error; ?></span>
            </div>
        <?php } ?>
    <div class="mt-10">
    <form method="POST" action="" class="bg-white shadow-md  px-8 pt-6 pb-8">
        <h2 class="text-xl text-black font-bold mb-4 text-center">Register Mahasiswa</h2>
            <div class="mb-4">
                <label class="block text-black text-sm font-bold mb-2" for="nim">
                    NIM:
                </label>
                <input class="shadow appearance-none border rounded w-full py-2 px-3 text-black leading-tight focus:outline-none focus:shadow-outline" 
                    type="text" name="nim" required>
                <p class="text-gray-600 text-xs italic mt-1">NIM akan digunakan sebagai username dan password untuk login</p>
            </div>

            <div class="mb-4">
                <label class="block text-black text-sm font-bold mb-2" for="nama">
                    Nama:
                </label>
                <input class="shadow appearance-none border rounded w-full py-2 px-3 text-black leading-tight focus:outline-none focus:shadow-outline" 
                    type="text" name="nama" required>
            </div>

            <div class="mb-6">
                <label class="block text-black text-sm font-bold mb-2" for="prodi">
                    Program Studi:
                </label>
                <input class="shadow appearance-none border rounded w-full py-2 px-3 text-black leading-tight focus:outline-none focus:shadow-outline" 
                    type="text" name="prodi" required>
            </div>

            <div class="flex items-center justify-between">
                <button class="bg-blue-500 hover:bg-blue-700 text-black font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline" 
                    type="submit">
                    Register
                </button>
                <a class="inline-block align-baseline font-bold text-sm text-black" href="login.php">
                    Sudah punya akun? Login
                </a>
            </div>
        </form>
    </div>
        
    </div>
</body>
</html>