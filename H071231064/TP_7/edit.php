<?php
include("model.php");
session_start();

// Ambil ID dari parameter GET
if (!isset($_GET['id'])) {
    // Jika tidak ada ID, redirect ke halaman index
    header('Location: index.php');
    exit;
}

$mahasiswaId = $_GET['id']; // ID mahasiswa dari parameter GET

// Ambil data mahasiswa berdasarkan ID
$mahasiswa = getMahasiswaById($mahasiswaId);

if (!$mahasiswa) {
    echo "Mahasiswa tidak ditemukan!";
    exit;
}

// Jika user submit form untuk mengupdate data mahasiswa
if ($_POST) {
    $currentUser = $_SESSION['user']; // User yang sedang login
    $requestNama = $_POST['nama']; // Nama mahasiswa baru
    $requestNim = $_POST['nim']; // NIM mahasiswa baru
    $requestProdi = $_POST['prodi']; // Prodi mahasiswa baru

    // Memperbarui data mahasiswa berdasarkan input
    if (updateMahasiswa($mahasiswaId, $requestNama, $requestNim, $requestProdi, $currentUser['id'])) {
        $_SESSION['success'] = "Data mahasiswa berhasil diperbarui.";
        header('Location: index.php');
        exit;
    } else {
        $error = "Gagal memperbarui data mahasiswa.";
    }
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Mahasiswa</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="d-flex justify-content-center align-items-center vh-100">
    <div class="card shadow p-4" style="width: 100%; max-width: 400px;">
        <h2 class="text-center mb-4">Edit Mahasiswa</h2>

        <form action="edit.php?id=<?= $mahasiswaId ?>" method="POST">
            <div class="mb-3">
                <label for="nama" class="form-label">Nama</label>
                <input type="text" class="form-control" id="nama" name="nama" value="<?= $mahasiswa['nama_mahasiswa'] ?>" required>
            </div>
            <div class="mb-3">
                <label for="nim" class="form-label">NIM</label>
                <input type="text" class="form-control" id="nim" name="nim" value="<?= $mahasiswa['nim'] ?>" required>
            </div>
            <div class="mb-3">
                <label for="prodi" class="form-label">Prodi</label>
                <select class="form-select" id="prodi" name="prodi" required>
                    <option value="1" <?= $mahasiswa['prodi_id'] == 1 ? 'selected' : '' ?>>Sistem Informasi</option>
                    <option value="2" <?= $mahasiswa['prodi_id'] == 2 ? 'selected' : '' ?>>Aktuaria</option>
                    <option value="3" <?= $mahasiswa['prodi_id'] == 3 ? 'selected' : '' ?>>Matematika</option>
                    <option value="4" <?= $mahasiswa['prodi_id'] == 4 ? 'selected' : '' ?>>Statistika</option>
                </select>
            </div>

            <!-- Menampilkan pesan error jika ada -->
            <?php if (isset($error)): ?>
                <div class="alert alert-danger" role="alert">
                    <?= $error; ?>
                </div>
            <?php endif; ?>

            <div class="d-grid">
                <button type="submit" class="btn btn-primary">Update</button>
            </div>
        </form>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>