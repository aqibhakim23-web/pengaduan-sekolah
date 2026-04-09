<?php
session_start();
include 'koneksi.php';

// CEK ROLE ADMIN
if (!isset($_SESSION['role']) || $_SESSION['role'] != 'admin') {
    header("Location: index.php");
    exit;
}

// UPDATE STATUS
if (isset($_POST['ubah_status'])) {
    $id = $_POST['id'];
    $status = $_POST['status'];

    mysqli_query($conn, "UPDATE pengaduan 
        SET status='$status' 
        WHERE id='$id'");
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Halaman Admin</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>

<h2>Halaman Admin</h2>

<table border="1">
    <tr>
        <th>Nama</th>
        <th>Lokasi</th>
        <th>Jenis</th>
        <th>Deskripsi</th>
        <th>Status</th>
        <th>Aksi</th>
    </tr>

    <?php
    $data = mysqli_query($conn, "SELECT * FROM pengaduan");

    while ($d = mysqli_fetch_array($data)) {
    ?>
    <tr>
        <td><?= $d['nama']; ?></td>
        <td><?= $d['lokasi']; ?></td>
        <td><?= $d['jenis']; ?></td>
        <td><?= $d['deskripsi']; ?></td>

        <td>
            <form method="POST">
                <input type="hidden" 
                       name="id" 
                       value="<?= $d['id']; ?>">

                <select name="status">
                    <option value="Menunggu"
                    <?= $d['status']=='Menunggu'?'selected':'' ?>>
                    Menunggu
                    </option>

                    <option value="Diproses"
                    <?= $d['status']=='Diproses'?'selected':'' ?>>
                    Diproses
                    </option>

                    <option value="Selesai"
                    <?= $d['status']=='Selesai'?'selected':'' ?>>
                    Selesai
                    </option>
                </select>

                <button name="ubah_status">   Simpan
                </button>
            </form>
        </td>
        <td>
            <a href="hapus.php?id=<?= $d['id']; ?>"> Hapus </a>
        </td>
    </tr>
    <?php } ?>

</table>

<br>

<a href="logout.php">
    <button>Logout</button>
</a>

</body>
</html>