<?php
include("model.php");
    session_start();
    if (!isset($_SESSION['user'])) {
        header('Location: login.php');
        exit;
    } else {
        $currentUser = $_SESSION['user'];
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SIM Mahasiswa</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container-fluid">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <h1>Welcome <?= $currentUser['username'] ?>!</h1>
            </div>
            <div class="col-md-8">
                <h3><?= $currentUser['role_id'] === 1 ? 'Admin Profile' : 'Your Profile' ?></h3>
            </div>
            <div class="col-md-8 table-responsive">
                <table class="table text-start table-borderless">
                    <tr>
                        <th>Email</th>
                        <td>: <?= $currentUser['email'] ?></td>
                    </tr>
                    <tr>
                        <th>Username</th>
                        <td>: <?= $currentUser['username'] ?></td>
                    </tr>
                    <tr>
                        <th>Role</th>
                        <td>: <?= $currentUser['role_name'] ?></td>
                    </tr>
                    <?php if (!empty($currentUser['nama_mahasiswa'])): ?>
                    <tr>
                        <th>Nama Mahasiswa</th>
                        <td>: <?= $currentUser['nama_mahasiswa'] ?></td>
                    </tr>
                    <tr>
                        <th>NIM</th>
                        <td>: <?= $currentUser['nim'] ?></td>
                    </tr>
                    <tr>
                        <th>Program Studi</th>
                        <td>: <?= $currentUser['prodi_name'] ?></td>
                    </tr>
                    <?php endif; ?>
                </table>
            </div>
            <div class="col-md-8">
                <a href="controller-logout.php" class="btn btn-danger">Logout</a>
            </div>
        <?php if ($currentUser['role_id'] === 1): ?>
        <?php $datamahasiswa = getAllMahasiswa(); ?>
            <div class="col-md-8 table-responsive">
                <table class="table table-striped table-hover">
                    <thead>
                        <tr>
                            <th>Email</th>
                            <th>Username</th>
                            <th>Name</th>
                            <th>NIM</th>
                            <th>Program Studi</th>
                            <th>Actions</th> <!-- Kolom baru untuk aksi -->
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($datamahasiswa as $mahasiswa): ?>
                        <tr>
                            <td><?= $mahasiswa['email'] ?></td>
                            <td><?= $mahasiswa['username'] ?></td>
                            <td><?= $mahasiswa['nama_mahasiswa'] ?></td>
                            <td><?= $mahasiswa['nim'] ?></td>
                            <td><?= $mahasiswa['prodi_name'] ?></td>
                            <td>
                                <!-- Tombol Edit -->
                                <a href="edit.php?id=<?= $mahasiswa['id'] ?>" class="btn btn-warning btn-sm">Edit</a>

                                <!-- Tombol Hapus (gunakan form untuk submit) -->
                                <form action="controller-delete.php" method="POST" style="display:inline;">
                                    <input type="hidden" name="id" value="<?= $mahasiswa['id'] ?>">
                                    <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Apakah Anda yakin ingin menghapus mahasiswa ini?')">Delete</button>
                                </form>
                            </td>
                        </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
        <?php endif; ?>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>