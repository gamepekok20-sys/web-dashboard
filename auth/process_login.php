<?php

session_start();

include "../config/database.php";

$username = $_POST['username'];
$password = $_POST['password'];

$query = mysqli_query(
    $conn,
    "SELECT * FROM user
     WHERE username='$username'
     AND password='$password'"
);

if (mysqli_num_rows($query) == 1) {

    $data = mysqli_fetch_assoc($query);

    $_SESSION['id'] = $data['id'];
    $_SESSION['username'] = $data['username'];
    $_SESSION['role'] = $data['role'];

    if ($data['role'] == 'admin') {

        header("Location: ../admin/dashboard.php");
        exit;

    }

} else {

    echo "
    <script>
        alert('Username atau password salah!');
        window.location='login.php';
    </script>
    ";

}

?>