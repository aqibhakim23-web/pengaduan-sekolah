<?php 
session_start(); 
include 'koneksi.php'; 
?>

<!DOCTYPE html>
<html>
<head>
    <title>Form Pengaduan</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>

<div class="container">

<?php if (isset($_SESSION['admin'])) { ?>
    <a href="logout.php">Logout</a><br><br>
<?php } ?>

<h2>Form Pengaduan</h2>

<form method="POST">
    <input type="text" name="nama" placeholder="Nama" required>

    <input type="text" name="kelas" placeholder="Kelas / Bagian" required>

    <input type="text" name="lokasi" placeholder="Lokasi Kerusakan" required>

    <input type="text" name="jenis" placeholder="Jenis Kerusakan" required>

    <textarea name="deskripsi" 
        placeholder="Deskripsi Pengaduan"
        required></textarea>

    <button type="submit" name="kirim">Kirim</button>
</form>

<?php
if (isset($_POST['kirim'])) {

    $nama = trim($_POST['nama']);
    $kelas = trim($_POST['kelas']);
    $lokasi = trim($_POST['lokasi']);
    $jenis = trim($_POST['jenis']);
    $deskripsi = trim($_POST['deskripsi']);

    // VALIDASI BACKEND
    if (
        empty($nama) ||
        empty($kelas) ||
        empty($lokasi) ||
        empty($jenis) ||
        empty($deskripsi)
    ) {
        echo "<p style='color:red; text-align:center;'>
                Semua form wajib diisi!
              </p>";
    } else {

        mysqli_query($conn, "INSERT INTO pengaduan 
        (nama, kelas, lokasi, jenis, deskripsi) 
        VALUES 
        ('$nama','$kelas','$lokasi','$jenis','$deskripsi')");

        echo "<p style='color:green; text-align:center;'>
                Data berhasil dikirim!
              </p>";
    }
}
?>

<br>
<a href="data.php">Lihat Data</a> <br>
<a href="logout.php">Logout</a>

</div>

</body>
</html>