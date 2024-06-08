<?php 
include("../../config.php");
$nama = $_POST['nama'];
$url = $_POST['url'];
$deskripsi = $_POST['deskripsi'];
$gambar = $_FILES['gambar']['name'];

$sql = "INSERT INTO obatherbal ( nama, gambar, deskripsi, url) VALUES ( '$nama', '$gambar', '$deskripsi', '$url')";

if ($koneksi->query($sql) === TRUE) {
    echo "Data baru berhasil ditambahkan";
} else {
    echo "Error: " . $sql . "<br>" . $koneksi->error;
}

$uploaddir = "../../img/";
$uploadfile = $uploaddir . basename($_FILES['gambar']['name']);

echo '<pre>';
if (move_uploaded_file($_FILES['gambar']['tmp_name'], $uploadfile)) {
    echo "
    <script>
    alert('data berhasil ditambah!');
    document.location.href = 'dasboard.php';
    </script>
    ";
} else {
    echo "
    <script>
    alert('ada yang salah!');
    document.location.href = 'dasboard.php';
    </script>
    ";
}
?>
