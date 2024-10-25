<?php
$servername = "db";
$username = "root";
$password = "secret";
$database = "laravel";
$port = 3306;

// Membuat koneksi ke database
$conn = mysqli_connect($servername, $username, $password, $database, $port);

if (!$conn) {
    die("Koneksi gagal: " . mysqli_connect_error());
}

// Fungsi untuk mengambil semua data mahasiswa
function getAllMahasiswa() {
    global $conn;
    $query = "SELECT *
              FROM mahasiswa m
              JOIN prodi p ON m.prodi_id = p.id
              JOIN users u ON m.user_id = u.id"; // Tambahkan JOIN ke tabel users
    $result = mysqli_query($conn, $query);

    $data = [];
    if (mysqli_num_rows($result) > 0) {
        while ($row = mysqli_fetch_assoc($result)) {
            $data[] = $row;
        }
    }
    return $data;
}

function getAllProdi() {
    global $conn; // Menggunakan koneksi global
    $query = "SELECT * FROM prodi";
    $result = mysqli_query($conn, $query);

    $data = [];
    if (mysqli_num_rows($result) > 0) {
        while ($row = mysqli_fetch_assoc($result)) {
            $data[] = $row;
        }
    }
    return $data;
}

// Fungsi untuk login user
function loginUser($username, $password) {
    global $conn;
    $query = "SELECT u.*, r.role_name, m.nama_mahasiswa, m.nim, p.prodi_name 
              FROM users u
              LEFT JOIN roles r ON u.role_id = r.id
              LEFT JOIN mahasiswa m ON u.id = m.user_id
              LEFT JOIN prodi p ON m.prodi_id = p.id
              WHERE u.username = ?";
    $stmt = mysqli_prepare($conn, $query);
    mysqli_stmt_bind_param($stmt, "s", $username);
    mysqli_stmt_execute($stmt);
    $result = mysqli_stmt_get_result($stmt);
    $user = mysqli_fetch_assoc($result);

    // Verifikasi password menggunakan password_verify
    if ($user && password_verify($password, $user['password'])) {
        return $user;
    } else {
        return false;
    }
}

// Fungsi untuk mendaftarkan user baru
function insertUser($email, $username, $password, $role_id) {
    global $conn;
    $passwordHash = password_hash($password, PASSWORD_BCRYPT);
    $query = "INSERT INTO users (email, username, password, role_id, created_at, updated_at) 
              VALUES (?, ?, ?, ?, NOW(), NOW())";
    $stmt = mysqli_prepare($conn, $query);
    mysqli_stmt_bind_param($stmt, "sssi", $email, $username, $passwordHash, $role_id);
    return mysqli_stmt_execute($stmt);
}

// Fungsi untuk memasukkan data mahasiswa
function insertMahasiswa($requestNama, $requestNim, $requestProdi, $idUser) {
    global $conn;

    $query = "INSERT INTO mahasiswa (nama_mahasiswa, nim, prodi_id, user_id, created_at, updated_at) 
              VALUES (?, ?, ?, ?, NOW(), NOW())";
    $stmt = mysqli_prepare($conn, $query);
    mysqli_stmt_bind_param($stmt, "ssii", $requestNama, $requestNim, $requestProdi, $idUser);
    return mysqli_stmt_execute($stmt); 
}

// Fungsi untuk memperbarui data mahasiswa
function updateMahasiswa($id, $nama, $nim, $prodi_id, $currentUser) {
    global $conn;
    $query = "UPDATE mahasiswa 
              SET nama_mahasiswa = ?, nim = ?, prodi_id = ?, updated_at = NOW(), updated_by = ?
              WHERE id = ?";
    $stmt = mysqli_prepare($conn, $query);
    mysqli_stmt_bind_param($stmt, "ssiii", $nama, $nim, $prodi_id, $currentUser, $id);
    return mysqli_stmt_execute($stmt);
}

function getMahasiswaById($id) {
    global $conn;
    $query = "SELECT m.*, p.prodi_name 
              FROM mahasiswa m
              LEFT JOIN prodi p ON m.prodi_id = p.id
              WHERE m.id = ?";
    $stmt = mysqli_prepare($conn, $query);
    mysqli_stmt_bind_param($stmt, "i", $id);
    mysqli_stmt_execute($stmt);
    $result = mysqli_stmt_get_result($stmt);
    return mysqli_fetch_assoc($result);
}


function deleteMahasiswa($id) {
    global $conn;
    $query = "DELETE FROM mahasiswa WHERE id = ?";
    $stmt = mysqli_prepare($conn, $query);
    mysqli_stmt_bind_param($stmt, "i", $id);
    return mysqli_stmt_execute($stmt);
}

function updateUser($id, $email, $username, $password, $role_id, $currentUser) {
    global $conn;
    $passwordHash = password_hash($password, PASSWORD_BCRYPT);
    $query = "UPDATE users 
              SET email = ?, username = ?, password = ?, role_id = ?, updated_at = NOW(), updated_by = ?
              WHERE id = ?";
    $stmt = mysqli_prepare($conn, $query);
    mysqli_stmt_bind_param($stmt, "sssiii", $email, $username, $passwordHash, $role_id, $currentUser, $id);
    return mysqli_stmt_execute($stmt);
}

function deleteUser($id) {
    global $conn;
    $query = "DELETE FROM users WHERE id = ?";
    $stmt = mysqli_prepare($conn, $query);
    mysqli_stmt_bind_param($stmt, "i", $id);
    return mysqli_stmt_execute($stmt);
}

function isUsernameExists($username) {
    global $conn;
    $query = "SELECT id FROM users WHERE username = ?";
    $stmt = mysqli_prepare($conn, $query);
    mysqli_stmt_bind_param($stmt, "s", $username);
    mysqli_stmt_execute($stmt);
    $result = mysqli_stmt_get_result($stmt);
    return mysqli_num_rows($result) > 0;
}

function isEmailExists($email) {
    global $conn;
    $query = "SELECT id FROM users WHERE email = ?";
    $stmt = mysqli_prepare($conn, $query);
    mysqli_stmt_bind_param($stmt, "s", $email);
    mysqli_stmt_execute($stmt);
    $result = mysqli_stmt_get_result($stmt);
    return mysqli_num_rows($result) > 0;
}