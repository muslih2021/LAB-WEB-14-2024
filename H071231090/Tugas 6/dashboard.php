<?php
session_start();

if (!isset($_SESSION['user'])) {
    header('Location: index.php');
    exit;
}

$user = $_SESSION['user'];

// Data users
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
]
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Dashboard</title>
</head>
<body>
    <div class="wrapper">
        <div class="dashboard-container">
            
            <h2>Welcome, <?= $user['name'] ?></h2>

            <?php if ($user['username'] === 'admin') : ?>
                <h3>All Users Data</h3>
                <table>
                    <thead>
                        <tr>
                            <th>Name</th>
                            <th>Email</th>
                            <th>Username</th>
                            <th>Gender</th>
                            <th>Faculty</th>
                            <th>Batch</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($users as $u) : ?>
                            <?php if ($u['username'] === 'admin') continue; ?>
                            <tr>
                                <td><?= $u['name'] ?></td>
                                <td><?= $u['email'] ?></td>
                                <td><?= $u['username'] ?></td>
                                <td><?= $u['gender'] ?></td>
                                <td><?= $u['faculty'] ?></td>
                                <td><?= $u['batch'] ?></td>
                            </tr>
                        <?php endforeach; ?>

                    </tbody>
                </table>
            <?php else : ?>
                <h3>Your Profile</h3>
                    <table class="profile-table">
                        <tr>
                            <td><strong>Name:</strong></td>
                            <td><?= $user['name'] ?></td>
                        </tr>
                        <tr>
                            <td><strong>Email:</strong></td>
                            <td><?= $user['email'] ?></td>
                        </tr>
                        <tr>
                            <td><strong>Username:</strong></td>
                            <td><?= $user['username'] ?></td>
                        </tr>
                    </table>
            <?php endif; ?>
            <a href="logout.php" class="logout-button">Logout</a>
        </div>
    </div>
</body>
</html>
