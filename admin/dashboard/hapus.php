<?php
// Koneksi ke database
$koneksi = new mysqli("localhost", "root", "", "pw2024_tubes_233040042");
if ($koneksi->connect_error) {
    die("Koneksi gagal: " . $koneksi->connect_error);
}

// Mengambil NRP dari query string
$id = $_GET['id'];

// SQL untuk menghapus data
$sql = "DELETE FROM obatherbal WHERE id = '$id'";

if ($koneksi->query($sql) === TRUE) {
    echo "
    <script>
    alert('data berhasil dihapus!');
    document.location.href = 'dasboard.php';
    </script>
    ";
} else {
    echo "<script>
    aler('data gagal dihapus!');
    document.location.href = 'dasboard.php';
    </script>";
}

$koneksi->close();
exit();