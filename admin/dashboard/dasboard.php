<?php
// Menginclude file konfigurasi untuk koneksi database
include '../../config.php';

// Mengambil data dari tabel obatherbal
$search = isset($_GET["search"]) ? $_GET["search"] : null ;
$sql = "SELECT id, nama, gambar, deskripsi, url FROM obatherbal";
if ($search) {
  $sql .=" WHERE nama LIKE '%$search%'";
}
$result = $koneksi->query($sql);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin</title>
</head>

<link rel="stylesheet" href="../../asset/style.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/remixicon/4.0.1/remixicon.css" integrity="sha512-ZH3KB6wI5ADHaLaez5ynrzxR6lAswuNfhlXdcdhxsvOUghvf02zU1dAsOC6JrBTWbkE1WNDNs5Dcfz493fDMhA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.2/font/bootstrap-icons.min.css">



<body>
   <?php 
   include '../../include/navbar.php';
   ?>
   <div class="container mt-5">
        <div class="table-responsive">
            <table class="table">
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Nama</th>
                        <th scope="col">Gambar</th>
                        <th scope="col">Deskripsi</th>
                        <th scope="col">URL</th>
                        <th scope="col">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    if ($result->num_rows > 0) {
                        while($row = $result->fetch_assoc()) {
                            echo "<tr>";
                            echo "<th scope='row'>" . $row["id"] . "</th>";
                            echo "<td>" . $row["nama"] . "</td>";
                            echo "<td><img src='../../img/" . $row["gambar"] . "' alt='" . $row["nama"] . "' style='width: 100px;'></td>";
                            echo "<td>" . $row["deskripsi"] . "</td>";
                            echo "<td><a href='" . $row["url"] . "' target='_blank'>Link</a></td>";
                            echo "<td><a href='edit.php?id=" . $row["id"] . "' target='_blank'>edit</a><a href='hapus.php?id=" . $row["id"] . "'>hapus</a></td>";
                            echo "</tr>";
                        }
                    } else {
                        echo "<tr><td colspan='5'>Tidak ada data</td></tr>";
                    }
                    ?>
                </tbody>
            </table>
        </div>
    </div>

    <form method="POST" enctype="multipart/form-data" action="tambah.php">
        <label for="nama">Nama: </label>
        <input type="text" id="nama" name="nama" required><br><br>
        <label for="gambar">Gambar: </label>
        <input type="file" id="gambar" name="gambar" required><br><br>
        <label for="deskripsi">Deskripsi: </label>
        <input type="text" id="deskripsi" name="deskripsi" required><br><br>
        <label for="url">Url: </label>    
        <input type="text" id="url" name="url" required><br><br>
        <button type="submit">Tambah Data</button>
    </form> 

   <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
    <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>

</body>
</html>
<?php
$koneksi->close();
?>