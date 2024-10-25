<?php
    session_start();
    if ($_SESSION['user']) {
        session_destroy();
        header('Location: login.php');
    }else {
        header('Location: index.php');
    }