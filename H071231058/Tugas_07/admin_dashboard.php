<?php
session_start();
include "./config/config.php";

$name = "";
$nim = "";
$studyProgram = "";
$success = "";
$error = "";
$action = "";

if (!isset($_SESSION['admin'])) {
    header("Location: admin_login.php");
    exit;
}

// Handle success or error messages from URL parameters
if (isset($_GET['success'])) {
    $success = $_GET['success'];
}
if (isset($_GET['error'])) {
    $error = $_GET['error'];
}

if (isset($_GET['action'])) {
    $action = $_GET['action'];
}

if ($action == 'edit') {
    $id = $_GET['id'];
    $queryGetData = "SELECT * FROM mahasiswa WHERE id = $id";
    $resultGetData = mysqli_query($conn, $queryGetData);
    $dataEdit = mysqli_fetch_array($resultGetData);
    $name = $dataEdit['name'];
    $nim = $dataEdit['nim'];
    $studyProgram = $dataEdit['studyProgram'];
}

// tambah data
if (isset($_POST['save'])) {
    $name = $_POST['name'];
    $nim = $_POST['nim'];
    $studyProgram = $_POST['studyProgram'];

    if ($nim && $name && $studyProgram) {
        $queryCheckNIM = "SELECT * FROM mahasiswa WHERE nim = '$nim'";
        $resultCheckNIM = mysqli_query($conn, $queryCheckNIM);

        if (mysqli_num_rows($resultCheckNIM) > 0 && $action != 'edit') {
            $error = "NIM sudah terdaftar";
        } else {
            if ($action == 'edit') {
                $id = $_GET['id'];
                $queryUpdate = "UPDATE mahasiswa SET `name`='$name', nim='$nim', `studyProgram`='$studyProgram' WHERE id='$id'";
                $executeQUpdate =  mysqli_query($conn, $queryUpdate);
                if ($executeQUpdate) {
                    $success = "Data berhasil diperbarui";
                    header("Location: admin_dashboard.php?success=$success");
                }else {
                    $error = "Data gagal diperbarui";
                }
            } else {
                $queryInsert = "INSERT INTO mahasiswa(`name`, nim, studyProgram) VALUES('$name', '$nim', '$studyProgram')";
                try {
                    $executeQInsert = mysqli_query($conn, $queryInsert);
                    if ($executeQInsert) {
                        $success = "Data mahasiswa berhasil ditambahkan YEAYYYY";
                        header("Location: admin_dashboard.php?success=$success");
                    }
                } catch (mysqli_sql_exception $err) {
                    $error = "Data mahasiswa gagal ditambahkan🥲";
                }
            }
        }
    } else {
        $error = "Data yang masukkan tidak lengkap";
    }
}

// Delete student data if 'action=delete' is triggered
if ($action == 'delete') {
    $id = $_GET['id'];
    $queryDelete = "DELETE FROM mahasiswa WHERE id = $id";
    $executeQDelete = mysqli_query($conn, $queryDelete);
    if ($executeQDelete) {
        $success = "Data berhasil dihapus";
    } else {
        $error = "Gagal menghapus data";
    }
}

// Fetch student data for displaying in the table
$queryGet = "SELECT id, `name`, nim, studyProgram FROM mahasiswa ORDER BY id ASC";
$executeQGet = mysqli_query($conn, $queryGet);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">
    <div class="container mt-5">
        <h2 class="text-center">Welcome, Admin!</h2>

        <!-- Display success or error messages -->
        <?php if ($error) { ?>
            <div class="alert alert-danger">
                <?= $error ?>
            </div>
        <?php } ?>
        <?php if ($success) { ?>
            <div class="alert alert-success">
                <?= $success ?>
            </div>
        <?php } ?>

        <div class="d-flex justify-content-between mb-3">
            <h4>Daftar Mahasiswa</h4>
            <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">Tambah Data</button>
            <!-- Modal -->
            <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h1 class="modal-title fs-5" id="exampleModalLabel">Tambah Data</h1>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <div class="card-body">
                                <?php if ($error) { ?>
                                <div class="alert alert-danger">
                                    <?php echo $error ?>
                                </div>
                                <?php header("refresh:3;url=admin_dashboard.php");
                                } ?>
                                <form action="" method="post">
                                    <div class="mb-3 row">
                                        <label for="nim" class="col-sm-2 col-form-label">NIM</label>
                                            <div class="col-sm-10">
                                                <input type="text" id="nim" name="nim" value="<?php echo $nim ?>" class="form-control" required>
                                            </div>
                                    </div>
                                    <div class="mb-3 row">
                                        <label for="name" class="col-sm-2 col-form-label">Nama</label>
                                            <div class="col-sm-10">
                                                <input type="text" id="name" name="name" value="<?php echo $name ?>" class="form-control" required>
                                            </div>
                                    </div>
                                    <div class="mb-3 row">
                                        <label for="studyProgram" class="col-sm-2 col-form-label">Program Studi</label>
                                        <div class="col-sm-10">
                                            <input type="text" id="studyProgram" name="studyProgram" value="<?php echo $studyProgram ?>" class="form-control" required>
                                        </div>
                                    </div>
                                    <button type="submit" name="save" class="btn btn-primary">Simpan</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Data Table -->
        <table class="table table-bordered">
            <thead class="table-light">
                <tr>
                    <th>No</th>
                    <th>Nama</th>
                    <th>NIM</th>
                    <th>Program Studi</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $number = 1;
                $queryGet = "SELECT * FROM mahasiswa ORDER BY id ASC";
                $executeQGet = mysqli_query($conn, $queryGet);
                while ($data = mysqli_fetch_array($executeQGet)) {
                    $id = $data['id'];
                ?>
                <tr class="odd:bg-white even:bg-gray-100">
                    <td class="border px-4 py-2"><?= $number++ ?></td>
                    <td class="border px-4 py-2"><?= $data['name'] ?></td>
                    <td class="border px-4 py-2"><?= $data['nim'] ?></td>
                    <td class="border px-4 py-2"><?= $data['studyProgram'] ?></td>
                    <td class="border px-4 py-2">
                        <a href="admin_dashboard.php?action=edit&id=<?php echo $id; ?>" class="btn btn-warning" data-bs-toggle="modal" data-bs-target="#editModal<?php echo $id; ?>">Edit</a>
                        <!-- Modal -->
                        <div class="modal fade" id="editModal<?php echo $id; ?>" tabindex="-1" aria-labelledby="editModalLabel<?php echo $id; ?>" aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="editModalLabel<?php echo $id; ?>">Edit Data Mahasiswa</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                <form action="admin_dashboard.php?action=edit&id=<?php echo $id; ?>" method="post">
                                <div class="mb-3">
                                    <label for="name<?php echo $id; ?>" class="form-label">Nama</label>
                                    <input type="text" class="form-control" id="name<?php echo $id; ?>" name="name" value="<?php echo $data['name']; ?>">
                                </div>
                                <div class="mb-3">
                                    <label for="nim<?php echo $id; ?>" class="form-label">NIM</label>
                                    <input type="text" class="form-control" id="nim<?php echo $id; ?>" name="nim" value="<?php echo $data['nim']; ?>">
                                </div>
                                <div class="mb-3">
                                    <label for="studyProgram<?php echo $id; ?>" class="form-label">Program Studi</label>
                                    <input type="text" class="form-control" id="studyProgram<?php echo $id; ?>" name="studyProgram" value="<?php echo $data['studyProgram']; ?>">
                                </div>
                                <button type="submit" name="save" class="btn btn-primary">Simpan Perubahan</button>
                                </form>
                            </div>
                            </div>
                        </div>
                        </div>

                        <a href="admin_dashboard.php?action=delete&id=<?= $id ?>" class="btn btn-danger" onclick="return confirm('Yakin ingin menghapus data ini?')">Hapus</a>
                    </td>
                    </tr>
                <?php } ?>
            </tbody>
        </table>
        <div class="d-flex justify-content-end mt-3">
            <button class="btn btn-danger" onclick="window.location.href='logout.php'">Logout</button>
        </div>    
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
