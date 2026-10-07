<?php

session_start();

if (isset($_SESSION['id'])) {
    header("Location: ../admin/dashboard.php");
    exit;
}

?>

<!DOCTYPE html>
<html>
<head>

    <title>Corporate Login</title>

    <link rel="stylesheet" href="../assets/css/style.css">

</head>

<body class="login-page">

<div class="login-box">

    <div class="login-logo">
        CORPORATE
    </div>

    <p class="login-subtitle">
        Business Management System
    </p>

    <form action="process_login.php" method="POST">

        <div class="form-group">

            <label>Username</label>

            <input
                type="text"
                name="username"
                placeholder="Enter username"
                required
            >

        </div>

        <div class="form-group">

            <label>Password</label>

            <input
                type="password"
                name="password"
                placeholder="Enter password"
                required
            >

        </div>

        <button type="submit" class="btn-login">
            LOGIN
        </button>

    </form>

</div>

</body>
</html>