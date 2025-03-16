<?php
session_start();

if (!isset($_SESSION["login"])) {
    header("Location: login.php");
    exit;
}

$nama = $_SESSION["cv"]["nama"] ?? "-";
$tempat_lahir = $_SESSION["cv"]["tempat_lahir"] ?? "-";
$tanggal_lahir = $_SESSION["cv"]["tanggal_lahir"] ?? "-";
$pendidikan = $_SESSION["cv"]["pendidikan_terakhir"] ?? "-";
$foto = isset($_SESSION["cv"]["file"]) ? $_SESSION["cv"]["file"] : "img/profil.jpg";
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@300;400;600&family=Playfair+Display:wght@600&display=swap">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <title>Najwan CV</title>
    <style>
        body {
            margin: 0;
            padding: 20px;
            background-color: #F1E5D1;
            font-family: 'Open Sans', sans-serif;
            display: flex;
            justify-content: center;
        }

        .container {
            width: 90%;
            max-width: 1000px;
            background: white;
            border-radius: 10px;
            display: flex;
            flex-wrap: wrap;
            box-shadow: 0 5px 25px rgba(0, 0, 0, 0.1);
            overflow: hidden;
        }

        .sidebar {
            flex: 1;
            background: #2C3E50;
            color: white;
            padding: 30px;
            text-align: center;
        }

        .sidebar img {
            width: 150px;
            height: 150px;
            object-fit: cover;
            border-radius: 50%;
            border: 4px solid white;
            margin-bottom: 20px;
        }

        .sidebar h1 {
            font-family: 'Open Sans', sans-serif;
            font-size: 1.8em;
            margin: 10px 0;
        }

        .sidebar p {
            font-size: 1em;
            opacity: 0.8;
        }

        .content {
            flex: 2;
            padding: 30px;
        }

        .section-title {
            font-family: 'Open Sans', sans-serif;
            font-size: 1.4em;
            margin-bottom: 15px;
            border-bottom: 2px solid #2C3E50;
            display: inline-block;
        }

        .bio-text {
            font-size: 1em;
            color: #444;
            line-height: 1.6;
        }

        .timeline-item {
            margin-bottom: 20px;
            padding-left: 15px;
            border-left: 2px solid #2C3E50;
        }

        .timeline-item h3 {
            margin: 5px 0;
            color: #2C3E50;
        }

        .timeline-item p {
            margin: 5px 0 10px;
            color: #555;
            font-size: 0.9em;
        }

        .skills-container,
        .languages-container {
            display: flex;
            flex-wrap: wrap;
            gap: 10px;
        }

        .skill-item,
        .language-item {
            background: #F1E5D1;
            padding: 8px 12px;
            border-radius: 20px;
            font-size: 0.9em;
        }

        @media (max-width: 768px) {
            .container {
                flex-direction: column;
            }
        }
    </style>
</head>

<body>
    <div class="container">
        <div class="sidebar">
            <img src="<?php echo htmlspecialchars($foto); ?>" alt="Profile Photo">
            <h1><?php echo $nama; ?></h1>
            <p>Mahasiswa Universitas Brawijaya</p>
        </div>
        <div class="content">
            <h2 class="section-title">Profil</h2>
            <p class="bio-text">Saat ini saya sedang menempuh pendidikan di program studi Sistem Informasi, di mana saya belajar mengenai manajemen sistem informasi, pengembangan perangkat lunak, serta analisis dan pengelolaan data.</p>

            <h2 class="section-title">Riwayat Pendidikan</h2>
            <div class="timeline-item">
                <h3><?php echo htmlspecialchars($pendidikan); ?></h3>
            </div>

            <h2 class="section-title">Tempat Tanggal Lahir</h2>
            <div class="timeline-item">
                <h3><?php echo $tempat_lahir ?></h3>
                <p><?php echo $tanggal_lahir; ?></p>
            </div>

            <h2 class="section-title">Skill</h2>
            <div class="skills-container">
                <div class="skill-item">HTML/CSS</div>
                <div class="skill-item">PHP</div>
                <div class="skill-item">UI/UX Design</div>
                <div class="skill-item">Flutter</div>
            </div>

            <h2 class="section-title">Bahasa</h2>
            <div class="languages-container">
                <div class="language-item">Indonesian (Fluent)</div>
                <div class="language-item">English (Advanced)</div>
            </div>
        </div>
    </div>
</body>

</html>