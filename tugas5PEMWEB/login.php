<?php
session_start();

$host_db = "localhost";
$user_db = "root";
$pass_db = "";
$nama_db = "tugas5";
$koneksi = new mysqli($host_db, $user_db, $pass_db, $nama_db);
if ($koneksi->connect_error) {
    die("Koneksi gagal: " . $koneksi->connect_error);
}

$err = "";
$username = "";

if (isset($_SESSION['session_username'])) {
    header("Location: form.php");
    exit();
}

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['login'])) {
    $username = trim($_POST['username']);
    $password = trim($_POST['password']);

    if (empty($username) || empty($password)) {
        $err .= "<li>Silakan masukkan username dan password.</li>";
    } else {
        $stmt = $koneksi->prepare("SELECT username, password FROM login WHERE username = ?");
        $stmt->bind_param("s", $username);
        $stmt->execute();
        $result = $stmt->get_result();
        $r1 = $result->fetch_assoc();
        $stmt->close();

        if (!$r1) {
            $err .= "<li>Username <b>$username</b> tidak ditemukan.</li>";
        } elseif (md5($password) !== $r1['password']) {
            $err .= "<li>Password yang dimasukkan salah.</li>";
        } else {
            $_SESSION['session_username'] = $username;
            $_SESSION['login'] = true;
            header("Location: form.php");
            exit();
        }
    }
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login - Professional</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;600&display=swap" rel="stylesheet">
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: 'Poppins', sans-serif;
        }

        body {
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            background: linear-gradient(to right,rgb(0, 0, 0), #10054D);
        }

        .login-container {
            background: #fff;
            padding: 30px;
            border-radius: 10px;
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.1);
            text-align: center;
            width: 350px;
        }

        .login-container h2 {
            margin-bottom: 20px;
            font-weight: 600;
            color: #2c3e50;
        }

        .input-field {
            position: relative;
            margin-bottom: 15px;
        }

        .input-field input {
            width: 100%;
            padding: 12px;
            padding-left: 40px;
            border-radius: 5px;
            border: 1px solid #ccc;
            font-size: 16px;
        }

        .input-field i {
            position: absolute;
            left: 15px;
            top: 50%;
            transform: translateY(-50%);
            color: #aaa;
        }

        .login-btn {
            width: 100%;
            padding: 12px;
            background:rgb(0, 0, 0);
            border: none;
            color: white;
            font-size: 18px;
            border-radius: 5px;
            cursor: pointer;
            transition: 0.3s;
        }

        .login-btn:hover {
            background: #10054D;
        }

        .error-message {
            color: red;
            font-size: 14px;
            margin-bottom: 10px;
        }
    </style>
</head>

<body>
    <div class="login-container">
        <h2>Login</h2>
        <?php if ($err): ?>
            <div class="error-message">
                <ul><?php echo $err; ?></ul>
            </div>
        <?php endif; ?>
        <form action="" method="post">
            <div class="input-field">
                <i class="fa fa-user"></i>
                <input type="text" name="username" placeholder="Masukkan Email" required>
            </div>
            <div class="input-field">
                <i class="fa fa-lock"></i>
                <input type="password" name="password" placeholder="Masukkan Password" required>
            </div>
            <button type="submit" name="login" class="login-btn">Login</button>
        </form>
    </div>
</body>

</html>