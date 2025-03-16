<?php
session_start();

if (!isset($_SESSION["session_username"])) {
    header("Location: login.php");
    exit;
}
if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $file = $_FILES["file"]["name"];
    $tmp_name = $_FILES["file"]["tmp_name"];
    $target_directory = "images/";
    $target_file = $target_directory . basename($file);

    if (move_uploaded_file($tmp_name, $target_file)) {
        $_SESSION["cv"] = [
            "nama" => $_POST["nama"] ?? "",
            "tempat_lahir" => $_POST["tempat_lahir"] ?? "",
            "tanggal_lahir" => $_POST["tanggal_lahir"] ?? "",
            "pendidikan_terakhir" => $_POST["pendidikan_terakhir"] ?? "",
            "file" => $target_file 
        ];
    }
    header("Location: cv.php");
    exit;
}

?>

<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Form CV</title>
    <style>
        body {
            margin: 0;
            padding: 0;
            display: flex;
            justify-content: center;
            align-items: center;
            min-height: 100vh;
            font-family: 'Open Sans', sans-serif;
            background-color: #f8f9fa;
        }

        .form-container {
            width: 90%;
            max-width: 500px;
            background: white;
            padding: 30px;
            border-radius: 10px;
            box-shadow: 0 5px 25px rgba(0, 0, 0, 0.1);
            border-left: 5px solid #2C3E50;
        }

        h2 {
            text-align: center;
            color: #2C3E50;
            font-family: 'Playfair Display', serif;
            margin-bottom: 20px;
        }

        .form-group {
            margin-bottom: 15px;
        }

        label {
            display: block;
            font-weight: bold;
            color: #2C3E50;
            margin-bottom: 5px;
        }

        .form-input {
            width: 100%;
            padding: 10px;
            border: 2px solid #ddd;
            border-radius: 5px;
            font-size: 16px;
            transition: border-color 0.3s;
        }

        .form-input:focus {
            border-color: #2C3E50;
            outline: none;
        }

        .form-button {
            width: 100%;
            padding: 12px;
            background: #2C3E50;
            color: white;
            border: none;
            border-radius: 5px;
            font-size: 16px;
            cursor: pointer;
            transition: background 0.3s;
        }

        .form-button:hover {
            background: #1A252F;
        }

        .logout-link {
            display: block;
            text-align: center;
            margin-top: 15px;
            color: #E74C3C;
            text-decoration: none;
            font-weight: bold;
        }

        .logout-link:hover {
            text-decoration: underline;
        }
    </style>
</head>

<body>
    <div class="form-container">
        <h2>Isi Data CV</h2>
        <form action="form.php" method="post" enctype="multipart/form-data">

            <div class="form-group">
                <label for="nama">Nama:</label>
                <input type="text" id="nama" name="nama" class="form-input" required>
            </div>
            <div class="form-group">
                <label for="tempat_lahir">Tempat Lahir:</label>
                <input type="text" id="tempat_lahir" name="tempat_lahir" class="form-input" required>
            </div>
            <div class="form-group">
                <label for="tanggal_lahir">Tanggal Lahir:</label>
                <input type="date" id="tanggal_lahir" name="tanggal_lahir" class="form-input" required>
            </div>
            <div class="form-group">
                <label for="pendidikan_terakhir">Pendidikan Terakhir:</label>
                <input type="text" id="pendidikan_terakhir" name="pendidikan_terakhir" class="form-input" required>
            </div>
            <div class="form-group">
                <label for="file">Foto Diri:</label>
                <input type="file" id="file" name="file" class="form-input" required>
            </div>
            <button type="submit" class="form-button">Submit</button>
        </form>

    </div>
</body>

</html>