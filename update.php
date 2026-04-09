<!-- <?php
include 'koneksi.php';

$id = $_GET['id'];

if (isset($_POST['update'])) {
    $status = $_POST['status'];

    mysqli_query($conn, "UPDATE pengaduan 
        SET status='$status' 
        WHERE id='$id'");

    header("Location: admin.php");
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Update Status</title>
    
</head>
<body>

<div class="container">
    <h2>Update Status Pengaduan</h2>

    <form method="POST">
        <select name="status">
            <option value="Menunggu">Menunggu</option>
            <option value="Diproses">Diproses</option>
            <option value="Selesai">Selesai</option>
        </select>

        <button name="update">Simpan</button>
    </form>
</div>

</body>
</html> -->