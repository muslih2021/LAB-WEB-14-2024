<?php
session_start();


$users = [
    [
        'email' => 'admin@gmail.com',
        'username' => 'admin',
        'name' => 'Admin',
        'password' => password_hash('admin123', PASSWORD_DEFAULT),
    ],
    [
        'email' => 'ida@gmail.com',
        'username' => 'ida',
        'name' => 'Nur Wahida',
        'password' => password_hash('ida123', PASSWORD_DEFAULT),
        'gender' => 'Female',
        'faculty' => 'MIPA',
        'batch' => '2021',
    ],
    [
        'email' => 'winny@gmail.com',
        'username' => 'Winny_nich',
        'name' => 'Sahwanil Nabila Asyah',
        'password' => password_hash('winny123', PASSWORD_DEFAULT),
        'gender' => 'Female',
        'faculty' => 'Arsi',
        'batch' => '2023',
    ],
    [
        'email' => 'amel@gmail.com',
        'username' => 'amel59',
        'name' => 'Amelia Permata',
        'password' => password_hash('amel123', PASSWORD_DEFAULT),
        'gender' => 'Female',
        'faculty' => 'Matematika',
        'batch' => '2023',
    ],
    [
        'email' => 'ianDPR@gmail.com',
        'username' => 'ianDPR72',
        'name' => 'ianDPR',
        'password' => password_hash('ianDPR123', PASSWORD_DEFAULT),
        'gender' => 'Male',
        'faculty' => 'Teknik',
        'batch' => '2020',
    ],
];

if (isset($_POST['login'])) {
    $usernameOrEmail = $_POST['usernameOrEmail'];
    $password = $_POST['password'];

    foreach ($users as $user) {
        if (($user['email'] == $usernameOrEmail || $user['username'] == $usernameOrEmail) && password_verify($password, $user['password'])) {
            $_SESSION['user'] = $user;
            header('Location: dashboard.php');
            exit;
        }
    }
    $error = "Login failed!.";
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <title>Login</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="wrapper">
        <div class="login_box">
            <div class="login-header">
                <span>Login</span>
            </div>
            <?php if (isset($error)) echo "<p style='color:red;'>$error</p>"; ?>
            <form method="post">
                <div class="input_box">
                    <input type="text" name="usernameOrEmail" class="input-field" required>
                    <label class="label">User Name/Email</label>
                    <i class="bx bx-user icon"></i>
                </div>
                <div class="input_box">
                    <input type="password" name="password" class="input-field" required>
                    <label class="label">Password</label>
                    <i class="bx bx-lock-alt icon"></i>
                </div>
                <div class="login_button">
                    <input type="submit" name="login" class="input-submit" value="Submit">
                </div>
            </form>
        </div>
    </div>
</body>
</html>
