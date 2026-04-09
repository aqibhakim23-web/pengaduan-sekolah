<?php include 'koneksi.php'; ?>

<!DOCTYPE html>
<html>
<head>
    <title>Data Pengaduan</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>

<div class="container">
    <h2>Data Pengaduan</h2>

<table border="1">
<tr>
    <th>Nama</th>
    <th>Kelas</th>
    <th>Lokasi</th>
    <th>Jenis</th>
    <th>Deskripsi</th>
    <th>Status</th>
</tr>

<?php
$data = mysqli_query($conn, "SELECT * FROM pengaduan");

while ($d = mysqli_fetch_array($data)) {
?>
<tr>
    <td><?= $d['nama']; ?></td>
    <td><?= $d['kelas']; ?></td>
    <td><?= $d['lokasi']; ?></td>
    <td><?= $d['jenis']; ?></td>
    <td><?= $d['deskripsi']; ?></td>
    <td><?= $d['status']; ?></td>
</tr>
<?php } ?>

</table>

<a href="index.php">Kembali</a>

</body>
</html>