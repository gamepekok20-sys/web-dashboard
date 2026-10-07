<?php

session_start();

if (isset($_SESSION['id'])) {

    if ($_SESSION['role'] == 'admin') {
        header("Location: admin/dashboard.php");
        exit;
    }

}

header("Location: auth/login.php");
exit;

?>