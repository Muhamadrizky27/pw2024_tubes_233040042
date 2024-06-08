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
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">

    <title>Edit Data</title>
</head>
<body>
    <div class="container-fluid container-sm" >

        <h2 style="text-align: center;">Edit Data</h2>
        <form method="post">
            Nama: <input class="form-control" type="text" name="nama" value="<?php echo $data['nama']; ?>"><br>
            Gambar: <input class="form-control" type="text" name="gambar" value="<?php echo $data['gambar']; ?>"><br>
            Deskripsi: <input class="form-control" type="text" name="deskripsi" value="<?php echo $data['deskripsi']; ?>"><br>
            Url: <input class="form-control" type="text" name="url" value="<?php echo $data['url']; ?>"><br>
            <input type="submit" value="Update">
        </form>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
</body>
</html>

