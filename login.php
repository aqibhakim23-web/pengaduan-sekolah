<?php
session_start();
include 'koneksi.php';

if (isset($_POST['login'])) {
    $user = $_POST['username'];
    $pass = $_POST['password'];

    $data = mysqli_query($conn, "SELECT * FROM admin 
        WHERE username='$user' AND password='$pass'");

    $cek = mysqli_fetch_assoc($data);

    if ($cek) {
        $_SESSION['username'] = $cek['username'];
        $_SESSION['role'] = $cek['role'];

        if ($cek['role'] == 'admin') {
            header("Location: admin.php");
        } else {
            header("Location: index.php");
        }

    } else {
        echo "<p style='color:red;text-align:center;'>Login gagal</p>";
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Login</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>

<div class="login-container">
    <h2>Login</h2>

    <form method="POST">
        <input type="text" name="username" placeholder="Username"><br>
        <input type="password" name="password" placeholder="Password"><br>
        <button name="login">Login</button>
    </form>
</div>

</body>
</html>