<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <style>
        /* Membuat seluruh halaman menjadi flex container */
        body {
            display: flex;
            justify-content: center;
            align-items: center;
            min-height: 100vh; /* Membuat halaman setinggi viewport */
            margin: 0;
            background-color: #f0f0f0; /* Warna latar belakang */
        }

        /* Styling untuk form agar lebih menarik */
        form {
            background-color: #fff;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0px 0px 15px rgba(0, 0, 0, 0.1);
            width: 300px;
            text-align: center;
        }

        h1 {
            margin-bottom: 20px;
        }

        label {
            font-weight: bold;
        }

        input {
            width: 100%;
            padding: 8px;
            margin: 10px 0;
            border: 1px solid #ccc;
            border-radius: 4px;
        }

        button {
            padding: 10px 20px;
            background-color: #0000FF;
            color: white;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            width: 100%;
        }

        button:hover {
            background-color: #45a049;
        }

        /* Styling untuk pesan error */
        p {
            color: red;
            font-weight: bold;
        }
    </style>
</head>

<body>
    <form action="index.php" method="POST">
        <h1>Login Form</h1>
        <label for="email_or_username">Email or Username</label><br>
        <input type="text" name="email_or_username" id="email_or_username" required><br><br>

        <label for="password">Password</label><br>
        <input type="password" name="password" id="password" required><br><br>

        <button type="submit">Kirim</button>
    </form>

    <?php
    session_start();
    
    // Array pengguna
    $users = [
        [
           'email' => 'admin@gmail.com',
           'username' => 'adminxxx',
           'name' => 'Admin',
           'password' => password_hash('admin123', PASSWORD_DEFAULT),
           'role' => 'admin',  // Tambahkan role untuk admin
       ],
       [
           'email' => 'nanda@gmail.com',
           'username' => 'nanda_aja',
           'name' => 'Wd. Ananda Lesmono',
           'password' => password_hash('nanda123', PASSWORD_DEFAULT),
           'gender' => 'Female',
           'faculty' => 'MIPA',
           'batch' => '2021',
           'role' => 'user', // Role user biasa
       ],
       [
           'email' => 'arif@gmail.com',
           'username' => 'arif_nich',
           'name' => 'Muhammad Arief',
           'password' => password_hash('arief123', PASSWORD_DEFAULT),
           'gender' => 'Male',
           'faculty' => 'Hukum',
           'batch' => '2021',
           'role' => 'user', // Role user biasa
       ],
       [
           'email' => 'eka@gmail.com',
           'username' => 'eka59',
           'name' => 'Eka Hanny',
           'password' => password_hash('eka123', PASSWORD_DEFAULT),
           'gender' => 'Female',
           'faculty' => 'Keperawatan',
           'batch' => '2021',
           'role' => 'user', // Role user biasa
       ],
       [
           'email' => 'adnan@gmail.com',
           'username' => 'adnan72',
           'name' => 'Adnan',
           'password' => password_hash('adnan123', PASSWORD_DEFAULT),
           'gender' => 'Male',
           'faculty' => 'Teknik',
           'batch' => '2020',
           'role' => 'user', // Role user biasa
       ]
    ];

    // Proses login
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $email_or_username = $_POST["email_or_username"];
        $password = $_POST["password"];
        
        // Cek apakah pengguna terdaftar
        foreach ($users as $user) {
            if (($email_or_username === $user['email'] || $email_or_username === $user['username']) &&
                password_verify($password, $user['password'])) {
                
                $_SESSION["user"] = $user; // Simpan role di session

                
                // Redirect berdasarkan role
                if ($user['role'] === 'admin') {
                    header("Location: dashboard.php");
                } else {
                    header("Location: dashboard2.php");
                }
                exit();
            }
        }

        // Jika login gagal
        echo "<p>Login gagal, silakan coba lagi.</p>";
    }
    ?>
</body>

</html>
