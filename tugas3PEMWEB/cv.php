<?php
session_start();

// Cek apakah user sudah login
if (!isset($_SESSION["login"])) {
    header("Location: login.php");
    exit;
}

// Ambil data CV dari session
$nama = isset($_SESSION["cv"]["nama"]) ? $_SESSION["cv"]["nama"] : "-";
$tempat_lahir = isset($_SESSION["cv"]["tempat_lahir"]) ? $_SESSION["cv"]["tempat_lahir"] : "-";
$tanggal_lahir = isset($_SESSION["cv"]["tanggal_lahir"]) ? $_SESSION["cv"]["tanggal_lahir"] : "-";
$pendidikan = isset($_SESSION["cv"]["pendidikan_terakhir"]) ? $_SESSION["cv"]["pendidikan_terakhir"] : "-";
$username = $_SESSION["username"] ?? "username";
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@300;400;600&family=Playfair+Display:wght@600&display=swap">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <title>Najwan CV</title>
    <link rel="stylesheet" href="style/cv.css">


</head>

<body>
    <div class="kotak">
        <div class="sidebar"> <img src="img/profil.jpg" alt="Profile Photo" class="gambar">
            <h1 class="name-highlight"><?php echo $nama; ?></h1>
            <p class="subtitle">Mahasiswa Universitas Brawijaya</p>
            <div class="contact-section">
                <h2 class="section-title">Contact</h2>
                <div class="contact-info">
                    <p><i class="fas fa-phone"></i>+62 858 3891 8072</p>
                    <p><i class="fas fa-phone"></i><?php echo $tempat_lahir; ?>, <?php echo $tanggal_lahir; ?></p>
                    <p><i class="fas fa-envelope"></i>naje161205@student.ub.ac.id</p>
                    <p><i class="fas fa-map-marker-alt"></i>Sukun, Malang</p>
                    <p><i class="fab fa-github"></i>github.com/najwansyauqi</p>
                    <p><i class="fab fa-linkedin"></i>linkedin.com/in/najwansyauqi</p>
                </div>
            </div>
            <h2 class="section-title">Skills</h2>
            <div class="skills-container">
                <div class="skill-item">HTML/CSS</div>
                <div class="skill-item">PHP</div>
                <div class="skill-item">UI/UX Design</div>
                <div class="skill-item">Flutter</div>
                <div class="skill-item">Microsoft Office</div>
                <div class="skill-item">Public Speaking</div>
            </div>
            <h2 class="section-title">Languages</h2>
            <div class="languages-container">
                <div class="language-item"> <span>Indonesian</span>
                    <div class="language-bar">
                        <div class="language-progress" style="width: 100%"></div>
                    </div>
                </div>
                <div class="language-item"> <span>English</span>
                    <div class="language-bar">
                        <div class="language-progress" style="width: 80%"></div>
                    </div>
                </div>
            </div>
        </div>
        <div class="main-content">
            <h2 class="section-title">Profile</h2>
            <p class="bio-text"> Saat ini saya sedang menempuh pendidikan di program studi Sistem Informasi, di mana saya belajar mengenai manajemen sistem informasi, pengembangan perangkat lunak, serta analisis dan pengelolaan data. </p>
            <h2 class="section-title">Education</h2>
            <div class="timeline-item">
                <!-- <div class="timeline-date">2021 - 2024</div> -->
                <h3 class="timeline-title"><?php echo htmlspecialchars($pendidikan); ?></h3>
                <!-- <p class="timeline-subtitle">REKAYASA PERANGKAT LUNAK</p>
                <div class="timeline-date">2024 - Sekarang</div>
                <h3 class="timeline-title">Universitas Brawijaya</h3>
                <p class="timeline-subtitle">S1 Sistem Informasi</p> -->
            </div>
            <h2 class="section-title">Experience</h2>
            <div class="timeline-item">
                <div class="timeline-date">2023 - 2024</div>
                <h3 class="timeline-title">Wakil Ketua II</h3>
                <p class="timeline-subtitle">OSIS SMK Telkom Makassar</p>
                <ul class="bio-text">
                    <li>Bertanggung jawab dalam pengelolaan kegiatan OSIS dan memastikan kelancaran acara yang diselenggarakan oleh organisasi siswa.</li>
                </ul>
            </div>
            <div class="timeline-item">
                <div class="timeline-date">2023</div>
                <h3 class="timeline-title">Koordinator Acara MPLS</h3>
                <p class="timeline-subtitle">OSIS SMK Telkom Makassar</p>
                <ul class="bio-text">
                    <li>Memimpin dan mengatur kegiatan Masa Pengenalan Lingkungan Sekolah (MPLS) untuk siswa baru, termasuk penyusunan jadwal dan koordinasi dengan pihak sekolah.</li>
                </ul>
            </div>
            <h2 class="section-title">Projects</h2>
            <div class="timeline-item">
                <h3 class="timeline-title">APP MOTO AID</h3>
                <ul class="bio-text">
                    <li>Aplikasi berbasis mobile mengenai informasi bengkel di sekitar anda</li>
                    <li>Teknologi: Flutter, Firebase, Material UI</li>
                </ul>
            </div>
        </div>
    </div>
</body>