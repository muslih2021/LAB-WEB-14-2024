<?php
include './config/config.php';
session_start();

if (!isset($_SESSION['role'])) {
    header('Location: login.php');
    exit;
}

$success = "";
$error = "";
$duplicate_error = "";
$role = $_SESSION['role'];
$user_nim = isset($_SESSION['nim']) ? $_SESSION['nim'] : null; 

$edit_mode = false;
$edit_data = [];

if ($role == 'admin' && isset($_GET['edit'])) {
    $edit_mode = true;
    $id = $_GET['edit'];
    $edit_query = $conn->prepare("SELECT * FROM mahasiswa WHERE id = ?");
    $edit_query->bind_param('i', $id);
    $edit_query->execute();
    $result = $edit_query->get_result();
    $edit_data = $result->fetch_assoc();
}

if ($role == 'admin' && isset($_POST['update'])) {
    $id = $_POST['id'];
    $nim = $_POST['nim'];
    $nama = $_POST['nama'];
    $prodi = $_POST['prodi'];

    $check_duplicate = $conn->prepare("SELECT * FROM mahasiswa WHERE nim = ? AND id != ?");
    $check_duplicate->bind_param('si', $nim, $id);
    $check_duplicate->execute();
    $result = $check_duplicate->get_result();

    if ($result->num_rows > 0) {
        $duplicate_error = "Data dengan NIM yang sama sudah ada!";
    } else {
        $update_query = $conn->prepare("UPDATE mahasiswa SET nim = ?, nama = ?, prodi = ? WHERE id = ?");
        $update_query->bind_param('sssi', $nim, $nama, $prodi, $id);
        if ($update_query->execute()) {
            $success = "Data berhasil diperbarui!";
            header("Location: index.php?success=" . urlencode($success));
            exit;
        } else {
            $error = "Terjadi kesalahan saat memperbarui data!";
        }
    }
}

if ($role == 'admin' && isset($_POST['tambah'])) {
    $nim = trim($_POST['nim']);
    $nama = trim($_POST['nama']);
    $prodi = trim($_POST['prodi']);
    $role = trim($_POST['role']);

    if (empty($nim) || empty($nama) || empty($prodi) || empty($role)) {
        $error = "Semua kolom harus diisi!";
    } else {
        $checkQuery = $conn->prepare("SELECT * FROM mahasiswa WHERE nim = ?");
        $checkQuery->bind_param('s', $nim);
        $checkQuery->execute();
        $checkResult = $checkQuery->get_result();

        if ($checkResult->num_rows > 0) {
            $error = "NIM sudah terdaftar!";
        } else {
            $insertQuery = $conn->prepare("INSERT INTO mahasiswa (nim, nama, prodi, role) VALUES (?, ?, ?, ?)");
            $insertQuery->bind_param('ssss', $nim, $nama, $prodi, $role);

            if ($insertQuery->execute()) {
                $success = "Data mahasiswa berhasil ditambahkan!";
                header("Location: index.php?success=" . urlencode($success));
                exit;
            } else {
                $error = "Terjadi kesalahan saat menambahkan data!";
            }
        }
    }
}


if ($role == 'admin' && isset($_GET['delete'])) {
    $id = $_GET['delete'];
    $delete_query = $conn->prepare("DELETE FROM mahasiswa WHERE id = ?");
    $delete_query->bind_param('i', $id);
    if ($delete_query->execute()) {
        $success = "Data berhasil dihapus!";
        header("Location: index.php?success=" . urlencode($success));
        exit;
    }
}

if ($role == 'admin') {
    $result = $conn->query("SELECT * FROM mahasiswa");
} else {
$query = "SELECT * FROM mahasiswa WHERE nim = ?";
$stmt = $conn->prepare($query);
$stmt->bind_param('s', $user_nim);
$stmt->execute();
$result = $stmt->get_result();
}

// Ambil success message dari URL jika ada
if (isset($_GET['success'])) {
    $success = $_GET['success'];
}

$search_query = '';
if ($role == 'admin') {
    if (isset($_GET['search']) && !empty($_GET['search'])) {
        $search_query = trim($_GET['search']);

        $sql = "SELECT * FROM mahasiswa WHERE 
                nim LIKE ? OR 
                nama LIKE ? OR 
                prodi LIKE ?";
        
        $search_param = "%$search_query%";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param('sss', $search_param, $search_param, $search_param);
        $stmt->execute();
        $result = $stmt->get_result();
    } else {
        $result = $conn->query("SELECT * FROM mahasiswa");
    }
} else {
    $query = "SELECT * FROM mahasiswa WHERE nim = ?";
    $stmt = $conn->prepare($query);
    $stmt->bind_param('s', $user_nim);
    $stmt->execute();
    $result = $stmt->get_result();
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edinburgh</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <script src="https://cdn.tailwindcss.com?plugins=forms,typography,aspect-ratio,line-clamp,container-queries"></script>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="relative bg-cover min-h-screen" style="background-image: url('image/bg2.jpg')">
    <div class="fixed top-0 w-full">
        <nav class=" border-gray-200 bg-gray-900/50 ">
        <div class="max-w-screen-xl flex flex-wrap items-center justify-between mx-auto p-4">
            <a href="https://flowbite.com/" class="flex items-center space-x-3 rtl:space-x-reverse">
                <img src="image/navbar.png" alt="" class="h-8" alt="Flowbite Logo" />
                <span class="self-center text-4xl font-semibold whitespace-nowrap text-white" style="font-family: 'harry';">Edinburgh</span>
            </a>

            <div class="hidden w-full md:block md:w-auto" id="navbar-default">
            <ul class="font-medium flex flex-col p-4 md:p-0 mt-4 ">
            <div class="mb-2">
                    <a href="logout.php" class="text-white bg-red-700 hover:bg-red-800 focus:outline-none focus:ring-4 focus:ring-red-300 font-medium rounded-full text-sm px-5 py-2.5 text-center me-2">Logout</a>
                </div>
            </ul>
            </div>
        </div>
        </nav>
        </div>

        <br><br><br>

        <!-- Tampilkan pesan -->
        <?php if ($success) { ?>
            <p class="text-green-500 mb-4"><?= $success; ?></p>
        <?php } ?>
        <?php if ($error) { ?>
            <p class="text-red-500 mb-4"><?= $error; ?></p>
        <?php } ?>
        <?php if ($duplicate_error) { ?>
            <p class="text-yellow-500 mb-4"><?= $duplicate_error; ?></p>
        <?php } ?>

    <div class="p-6 mx-auto mb-6 mt-6">
        <div>
        <?php if ($role == 'admin') { ?>
        <form method="POST" action="" class="bg-white p-4 rounded shadow-md mb-4 ">
                <?php if ($edit_mode) { ?>
                    <h3 class="text-lg font-semibold mb-3">Edit Data Mahasiswa</h3>
                    <input type="hidden" name="id" value="<?= $edit_data['id'] ?>">
                <?php } else { ?>
                    <h3 class="text-lg font-semibold mb-3">Tambah Data Mahasiswa</h3>
                <?php } ?>

                <div class="grid grid-cols-1 md:grid-cols-4 gap-4">
                    <div>
                        <label class="block text-black mb-2">Nama:</label>
                        <input type="text" name="nama" value="<?= $edit_mode ? $edit_data['nama'] : '' ?>" 
                            class="border p-2 w-full rounded" required>
                    </div>
                    <div>
                        <label class="block text-black mb-2">NIM:</label>
                        <input type="text" name="nim" value="<?= $edit_mode ? $edit_data['nim'] : '' ?>" 
                            class="border p-2 w-full rounded" required>
                    </div>
                    <div>
                        <label class="block text-black mb-2">Program Studi:</label>
                        <input type="text" name="prodi" value="<?= $edit_mode ? $edit_data['prodi'] : '' ?>" 
                            class="border p-2 w-full rounded" required>
                    </div>
                    <div>
                        <label class="block text-black mb-2">Role:</label>
                        <input type="dropdown" name="role" value="<?= $edit_mode ? $edit_data['prodi'] : '' ?>" 
                            class="border p-2 w-full rounded" required>
                    </div>
                </div>
                <div class="mt-4">
                    <?php if ($edit_mode) { ?>
                        <button type="submit" name="update" class="bg-green-500 text-white px-4 py-2 rounded hover:bg-green-600">
                            Update Data
                        </button>
                        <a href="index.php" class="ml-2 bg-gray-500 text-white px-4 py-2 rounded hover:bg-gray-600">
                            Batal
                        </a>
                    <?php } else { ?>
                        <button type="submit" name="tambah" class="bg-blue-500/50 text-white px-4 py-2 rounded hover:bg-blue-600">
                            Tambah Data
                        </button>
                    <?php } ?>
                </div>
            </form>
        <?php } ?>
    </div>

        <?php if ($role == 'admin') { ?>
        <div class="mt-5 mb-5">
            <form class="flex items-center max-w-sm mx-auto" method="GET" action="">   
                <label for="simple-search" class="sr-only">Search</label>
                <div class="relative w-full">
                    <input type="text" 
                        id="simple-search" 
                        name="search" 
                        class="bg-gray-50 border border-gray-300 text-black text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full ps-10 p-2.5" 
                        placeholder="Cari NIM, Nama, atau Prodi" 
                        value="<?= htmlspecialchars($search_query) ?>" />
                </div>
                <button type="submit" 
                        class="p-2.5 ms-2 text-sm font-medium text-white bg-blue-700 rounded-lg border border-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300">
                    <svg class="w-4 h-4" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 20">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m19 19-4-4m0-7A7 7 0 1 1 1 8a7 7 0 0 1 14 0Z"/>
                    </svg>
                    <span class="sr-only">Search</span>
                </button>
            </form>
            <?php if (!empty($search_query) && $result->num_rows === 0) { ?>
                <p class="text-center mt-4 text-gray-500">Tidak ada hasil yang ditemukan untuk "<?= htmlspecialchars($search_query) ?>"</p>
            <?php } ?>
        </div>
        <?php } ?>

        <!-- Tabel Data Mahasiswa -->
        <div class="bg-white rounded shadow-md overflow-x-auto">
            <table class="w-full">
                <thead class="bg-gray-50">
                    <tr>
                        <th class="px-4 py-2 text-left">Nama</th>
                        <th class="px-4 py-2 text-left">NIM</th>
                        <th class="px-4 py-2 text-left">Program Studi</th>
                        <?php if ($role == 'admin') { ?>
                            <th class="px-4 py-2 text-center">Aksi</th>
                        <?php } ?>
                    </tr>
                </thead>
                <tbody>
                    <?php while ($row = $result->fetch_assoc()) { ?>
                        <tr class="border-t hover:bg-gray-50">
                            <td class="px-4 py-2"><?= $row['nama']; ?></td>
                            <td class="px-4 py-2"><?= $row['nim']; ?></td>
                            <td class="px-4 py-2"><?= $row['prodi']; ?></td>
                            <?php if ($role == 'admin') { ?>
                                <td class="text-center flex">
                                    <a href="?edit=<?= $row['id']; ?>" 
                                        class="text-blue-500 hover:text-blue-700 mr-2">
                                        <img class="w-6" src="image/compose.png" alt="">
                                    </a>
                                    <a href="?delete=<?= $row['id']; ?>" 
                                        class="text-red-500 hover:text-red-700 mr-2"
                                        onclick="return confirm('Hapus data ini?')">
                                        <img class="w-6" src="image/trash.png" alt="">
                                    </a>
                                    <a href="?tambah<?= $row['id']; ?>" 
                                        class="text-green-500 hover:text-green-500 mr-2">
                                        <img class="w-6" src="image/plus.png" alt="">
                                    </a>
                                </td>
                            <?php } ?>
                        </tr>
                    <?php } ?>
                </tbody>
            </table>
        </div>
    </div>
</div>
</body>
</html>