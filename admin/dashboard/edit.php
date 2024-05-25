<?php
// Koneksi ke database
$koneksi = new mysqli("localhost", "root", "", "pw2024_tubes_233040042");
if ($koneksi->connect_error) {
    die("Koneksi gagal: " . $koneksi->connect_error);
}

// Mengambil NRP dari query string
$id = $_GET['id'];

// SQL untuk mengambil data mahasiswa yang akan diubah
$sql = "SELECT * FROM obatherbal WHERE id = '$id'";
$result = $koneksi->query($sql);
$data = $result->fetch_assoc();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Mengambil data dari form
    $nama = $_POST['nama'];
    $gambar = $_POST['gambar'];
    $deskripsi = $_POST['deskripsi'];
    $url = $_POST['url'];

    // SQL untuk update data
    $updateSql = "UPDATE obatherbal SET nama='$nama', gambar='$gambar', deskripsi='$deskripsi', url='$url' WHERE id='$id'";
    if ($koneksi->query($updateSql) === TRUE) {
        echo "Data berhasil diupdate.";
        header("Location: dasboard.php");
        exit();
    } else {
        echo "Error: " . $koneksi->error;
    }
}

$koneksi->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ubah Data Mahasiswa</title>
</head>
<body>
    <h2>Ubah Data Mahasiswa</h2>
    <form method="post">
        Nama: <input type="text" name="nama" value="<?php echo $data['nama']; ?>"><br>
        Gambar: <input type="text" name="gambar" value="<?php echo $data['gambar']; ?>"><br>
        Deskripsi: <input type="text" name="deskripsi" value="<?php echo $data['deskripsi']; ?>"><br>
        Url: <input type="text" name="url" value="<?php echo $data['url']; ?>"><br>
        <input type="submit" value="Update">
    </form>
</body>
</html>