<?php
require 'functions.php';

if (isset($_POST["register"])) {
    if (registrasi($_POST) > 0) {
        echo "<script>alert('User baru berhasil ditambahkan!');</script>";
        header("Location: login.php");
        exit;
    } else {
        echo "<script>alert('Registrasi gagal!');</script>";
    }
}
?>

<!DOCTYPE html>
<html lang="en" data-theme="light">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style/admin.css">

    <title>Register</title>
</head>

<body>
    <form method="POST" action="" class="login">
        <h1>Register</h1>
        <input class="border rounded w-full py-2 px-3 text-sm" type="text" id="username" name="username" placeholder="Enter new username or email" required>
        <input class="border rounded w-full py-2 px-3 text-sm" type="password" id="password" name="password" placeholder="Enter new password" required>
        <input class="border rounded w-full py-2 px-3 text-sm" type="password" id="password2" name="password2" placeholder="Confirm your password" required>

        <button type="submit" name="register">Register</button>
    </form>
</body>

</html>