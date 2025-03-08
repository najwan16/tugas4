<?php
session_start();
require "functions.php";

if (isset($_POST["login"])) {
    global $conn; 

    $username = $_POST["username"];
    $password = $_POST["password"];

    $result = mysqli_query($conn, "SELECT * FROM users WHERE username = '$username'"); // Tambahkan titik koma `;`

    // Cek user 
    if (mysqli_num_rows($result) === 1) {
        $row = mysqli_fetch_assoc($result);

        // Verifikasi password
        if (password_verify($password, $row["password"])) {
            // Simpan session agar user tetap login
            $_SESSION["login"] = true;
            $_SESSION["username"] = $row["username"];

            header("Location: index.php");
            exit;
        }
    }

    // Tampilkan error jika login gagal
    $error = "Username atau password salah!";
}
?>

<!DOCTYPE html>
<html lang="en" data-theme="light">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style/admin.css">
    <title>Login</title>
</head>

<body>
    <!-- LOGIN -->
    <form method="POST" action="" id="login" class="login">
        <h1>Login Admin</h1>

        <?php if (isset($error)) : ?>
            <p style="color: red;"><?php echo $error; ?></p>
        <?php endif; ?>

        <input class="border rounded w-full py-2 px-3 text-sm" type="text" id="username" name="username" placeholder="Enter your username or email" value="<?php echo isset($username) ? htmlspecialchars($username) : ''; ?>" required>
        <input class="border rounded w-full py-2 px-3 text-sm" type="password" id="password" name="password" placeholder="Enter your password" required>

        <button type="submit" name="login">Login</button>
    </form>
</body>

</html>
