<?php
session_start();
session_destroy();
header('Location: loginRole.php');
exit();
