<?php
session_start();

if (!isset($_SESSION['user'])) {
    header('Location: login.php');
    exit();
}

$user = $_SESSION['user'];

$users = [
    [
        'email' => 'admin@gmail.com',
        'username' => 'adminxxx',
        'name' => 'Admin',
        'password' => password_hash('admin123', PASSWORD_DEFAULT),
    ],
    [
        'email' => 'nanda@gmail.com',
        'username' => 'nanda_aja',
        'name' => 'Wd. Ananda Lesmono',
        'password' => password_hash('nanda123', PASSWORD_DEFAULT),
        'gender' => 'Female',
        'faculty' => 'MIPA',
        'batch' => '2021',
    ],
    [
        'email' => 'arif@gmail.com',
        'username' => 'arif_nich',
        'name' => 'Muhammad Arief',
        'password' => password_hash('arief123', PASSWORD_DEFAULT),
        'gender' => 'Male',
        'faculty' => 'Hukum',
        'batch' => '2021',
    ],
    [
        'email' => 'eka@gmail.com',
        'username' => 'eka59',
        'name' => 'Eka Hanny',
        'password' => password_hash('eka123', PASSWORD_DEFAULT),
        'gender' => 'Female',
        'faculty' => 'Keperawatan',
        'batch' => '2021',
    ],
    [
        'email' => 'adnan@gmail.com',
        'username' => 'adnan72',
        'name' => 'Adnan',
        'password' => password_hash('adnan123', PASSWORD_DEFAULT),
        'gender' => 'Male',
        'faculty' => 'Teknik',
        'batch' => '2020',
    ]
]
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>
    <div class="dashboard-container">
        <h2>Welcome, <?= $user['name'] ?></h2>
        <?php if ($user['username'] === 'adminxxx') : ?>
            <p>Email: <?= $user['email'] ?></p>
            <p>Username: <?= $user['username'] ?></p>
            <h3>All Users</h3>
            <table>
                <tr>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Username</th>
                    <th>Gender</th>
                    <th>Faculty</th>
                    <th>Batch</th>
                </tr>
                <?php foreach ($users as $u) : ?>
                    <tr>
                        <td><?= $u['name'] ?></td>
                        <td><?= $u['email'] ?></td>
                        <td><?= $u['username'] ?></td>
                        <td><?= $u['gender'] ?? 'N/A' ?></td>
                        <td><?= $u['faculty'] ?? 'N/A' ?></td>
                        <td><?= $u['batch'] ?? 'N/A' ?></td>
                    </tr>
                <?php endforeach; ?>
            </table>
            <?php else : ?>
                <h3>Your Data</h3>
                <p>Name: <?= $user['name'] ?></p>
                <p>Email: <?= $user['email'] ?></p>
                <p>Username: <?= $user['username'] ?></p>
                <p>Gender: <?= $user['gender'] ?? 'N/A' ?></p>
                <p>Faculty: <?= $user['faculty'] ?? 'N/A' ?></p>
                <p>Batch: <?= $user['batch'] ?? 'N/A' ?></p>
            <?php endif; ?>
            <button class="logout" onclick="window.location.href='logout.php'">Logout</button>
    </div>
</body>
</html>
