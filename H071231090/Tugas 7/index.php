<?php
session_start();

// Koneksi ke database
$host = 'localhost';
$dbname = 'crud';
$username = 'root';
$password = '';

$conn = new mysqli($host, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Koneksi gagal: " . $conn->connect_error);
}

if (!isset($_SESSION['user_id'])) {
    header("Location: login.php");
    exit();
}

$is_admin = $_SESSION['role'] === 'admin';

if ($is_admin && isset($_POST['tambah'])) {
    $nama = $_POST['nama'];
    $nim = $_POST['nim'];
    $prodi = $_POST['prodi'];

    $stmt = $conn->prepare("INSERT INTO mahasiswa (nama, nim, prodi) VALUES (?, ?, ?)");
    $stmt->bind_param("sss", $nama, $nim, $prodi);
    $stmt->execute();
    header("Location: index.php");
    exit();
}

if ($is_admin && isset($_GET['delete'])) {
    $id = $_GET['delete'];
    $stmt = $conn->prepare("DELETE FROM mahasiswa WHERE id = ?");
    $stmt->bind_param("i", $id);
    $stmt->execute();
    header("Location: index.php");
    exit();
}

if ($is_admin && isset($_POST['update'])) {
    $id = $_POST['id'];
    $nama = $_POST['nama'];
    $nim = $_POST['nim'];
    $prodi = $_POST['prodi'];

    $stmt = $conn->prepare("UPDATE mahasiswa SET nama = ?, nim = ?, prodi = ? WHERE id = ?");
    $stmt->bind_param("sssi", $nama, $nim, $prodi, $id);
    $stmt->execute();
    header("Location: index.php");
    exit();
}

$result = $conn->query("SELECT * FROM mahasiswa");

$editData = null;
if ($is_admin && isset($_GET['edit'])) {
    $id = $_GET['edit'];
    $stmt = $conn->prepare("SELECT * FROM mahasiswa WHERE id = ?");
    $stmt->bind_param("i", $id);
    $stmt->execute();
    $editData = $stmt->get_result()->fetch_assoc();
}
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link
      href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700;800&display=swap"
      rel="stylesheet"
    />
    <link rel="stylesheet" href="bootstrap.min.css">
    <link rel="stylesheet" href="styles.css"> 
    <title>Data Mahasiswa</title>
</head>
<body>
    <div class="wrapper">
        <div class="form-container">
            <h2 class="text-center">Data Mahasiswa</h2>

            <?php if ($is_admin): ?>
                <!-- Form Tambah Data -->
                <form action="index.php" method="POST" class="mb-4">
                    <div class="form-group">
                        <label for="nama">Nama:</label>
                        <input type="text" class="form-control" name="nama" value="<?php echo $editData['nama'] ?? ''; ?>" required>
                    </div>
                    <div class="form-group">
                        <label for="nim">NIM:</label>
                        <input type="text" class="form-control" name="nim" value="<?php echo $editData['nim'] ?? ''; ?>" required>
                    </div>
                    <div class="form-group">
                        <label for="prodi">Program Studi:</label>
                        <input type="text" class="form-control" name="prodi" value="<?php echo $editData['prodi'] ?? ''; ?>" required>
                    </div>
                    <input type="hidden" name="id" value="<?php echo $editData['id'] ?? ''; ?>">
                    <button type="submit" class="btn btn-primary button" name="<?php echo isset($editData) ? 'update' : 'tambah'; ?>">
                        <?php echo isset($editData) ? 'Update Data' : 'Tambah Data'; ?>
                    </button>
                </form>
                <hr>
            <?php endif; ?>

            <!-- Tabel Data Mahasiswa -->
            <table class="table table-striped">
                <thead>
                    <tr>
                        <!-- <th>ID</th> -->
                        <th>Nama</th>
                        <th>NIM</th>
                        <th>Program Studi</th>
                        <?php if ($is_admin): ?>
                            <th>Aksi</th>
                        <?php endif; ?>
                    </tr>
                </thead>
                <tbody>
                    <?php while ($row = $result->fetch_assoc()): ?>
                    <tr>
                        <!-- <td></td> -->
                        <td><?php echo $row['nama']; ?></td>
                        <td><?php echo $row['nim']; ?></td>
                        <td><?php echo $row['prodi']; ?></td>
                        <?php if ($is_admin): ?>
                            <td>
                                <a href="index.php?edit=<?php echo $row['id']; ?>" class="btn btn-warning">Edit</a>
                                <a href="index.php?delete=<?php echo $row['id']; ?>" class="btn btn-danger" onclick="return confirm('Yakin ingin menghapus data?');">Hapus</a>
                            </td>
                        <?php endif; ?>
                    </tr>
                    <?php endwhile; ?>
                </tbody>
            </table>
            <br>
            <div class="text-center">
                <a href="login.php?logout=true" class="button">Logout</a>
            </div>
        </div>
    </div>    
</body>
</html>
