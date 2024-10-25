<?php
session_start();
include 'users.php';

if (!isset($_SESSION['user'])) {
    header('Location: login.php');
    exit;
}

$currentUser = $_SESSION['user'];
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <h1>Welcome <?= $currentUser['username'] ?>!</h1>
            </div>
            <div class="col-md-8">
                <h3><?= $currentUser['username'] === 'adminxxx' ? 'Admin Profile' : 'Your Profile' ?></h3>
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
                        <th>Name</th>
                        <td>: <?= $currentUser['name'] ?></td>
                    </tr>
                    <!-- <tr>
                        <th>Password</th>
                        <td>: <?= $currentUser['password'] ?></td>
                    </tr> -->
                    <tr>
                        <th>Gender</th>
                        <td>: <?= !empty($currentUser['gender']) ? $currentUser['gender'] : 'Not specified' ?></td>
                    </tr>
                    <tr>
                        <th>Faculty</th>
                        <td>: <?= !empty($user['faculty']) ? $user['faculty'] : 'No faculty' ?></td>
                    </tr>
                </table>
            </div>
            <div class="col-md-8">
                <a href="logout.php" class="btn btn-danger">Logout</a>
            </div>
            <div class="col-md-8">
                <?php if ($currentUser['username'] === 'adminxxx'): ?>
                    <h3>Users</h3>
            </div>
            <div class="col-md-8 table-responsive">
                    <table class="table table-striped table-hover">
                        <thead>
                            <tr>
                                <th>Email</th>
                                <th>Username</th>
                                <th>Name</th>
                                <th>Gender</th>
                                <th>Faculty</th>
                                <th>Batch</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($users as $user): ?>
                                <tr>
                                    <td><?= !empty($user['email']) ? $user['email'] : 'No email' ?></td>
                                    <td><?= !empty($user['username']) ? $user['username'] : 'No username' ?></td>
                                    <td><?= !empty($user['name']) ? $user['name'] : 'No name' ?></td>
                                    <td><?= !empty($user['gender']) ? $user['gender'] : 'Not specified' ?></td>
                                    <td><?= !empty($user['faculty']) ? $user['faculty'] : 'No faculty' ?></td>
                                    <td><?= !empty($user['batch']) ? $user['batch'] : 'No batch' ?></td>
                                </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                <?php endif; ?>

            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
