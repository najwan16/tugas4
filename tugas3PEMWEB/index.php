<?php
session_start();

// Cek apakah user sudah login
if (!isset($_SESSION["login"])) {
    header("Location: login.php"); // Redirect ke halaman login jika belum login
    exit;
}

// Simpan data dari form ke session jika ada input
if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $_SESSION["cv"] = [
        "nama" => $_POST["nama"] ?? "",
        "tempat_lahir" => $_POST["tempat_lahir"] ?? "",
        "tanggal_lahir" => $_POST["tanggal_lahir"] ?? "",
        "pendidikan_terakhir" => $_POST["pendidikan_terakhir"] ?? ""
    ];
    header("Location: cv.php");
    exit;
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Input CV</title>
    <link rel="stylesheet" href="style/index.css">
</head>

<body>
    <div class="form-container">
        <h2 class="form-title">Isi Data CV</h2>
        <form method="POST" action="">
            <div class="form-group">
                <label for="nama">Nama Lengkap</label>
                <input type="text" id="nama" name="nama" class="form-input" required>
            </div>

            <div class="form-group">
                <label for="tempat_lahir">Tempat Lahir</label>
                <input type="text" id="tempat_lahir" name="tempat_lahir" class="form-input" required>
            </div>

            <div class="form-group">
                <label for="tanggal_lahir">Tanggal Lahir</label>
                <input type="date" id="tanggal_lahir" name="tanggal_lahir" class="form-input" required>
            </div>

            <div class="form-group">
                <label for="pendidikan_terakhir">Pendidikan Terakhir</label>
                <input type="text" id="pendidikan_terakhir" name="pendidikan_terakhir" class="form-input" required>
            </div>

            <button type="submit" class="form-button">Simpan Data</button>
        </form>
    </div>
</body>

</html>