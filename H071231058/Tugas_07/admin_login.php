<?php
session_start();
include "./config/config.php";

if (isset($_SESSION['admin'])) {
    header('Location: admin_dashboard.php');
    exit();
}

if (isset($_SESSION['nim'])) {
    header('Location: student_dashboard.php');
    exit();
}

$error = "";

if (isset($_POST['login'])) {
    $input = $_POST['email_or_username'];
    $password = $_POST['password'];

    $query = "SELECT * FROM admin WHERE (email = '$input' OR username = '$input') AND password = '$password'";
    $result = mysqli_query($conn, $query);

    if (mysqli_num_rows($result) > 0) {
        $_SESSION['admin'] = $input;
        header("Location: admin_dashboard.php");
    } else {
        $error = "Email/Username atau password salah";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Admin</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light d-flex justify-content-center align-items-center min-vh-100">
    <div class="container">
        <div class="card shadow p-4" style="max-width: 400px; margin: auto;">
            <h2 class="text-center mb-4">Login Admin</h2>

            <?php if ($error) { ?>
                <div class="alert alert-danger">
                    <?= $error ?>
                </div>
            <?php } ?>

            <form action="" method="POST">
                <div class="mb-3">
                    <input type="text" name="email_or_username" class="form-control" placeholder="Email atau Username" required>
                </div>
                <div class="mb-3">
                    <input type="password" name="password" class="form-control" placeholder="Password" required>
                </div>
                <button type="submit" name="login" class="btn btn-primary w-100">Login</button>
            </form>
        </div>
    </div>
</body>
</html>
