<?php
// Menginclude file konfigurasi untuk koneksi database
include '../../config.php';
session_start();
if (!isset($_SESSION['username']) || $_SESSION['role'] !== 'admin') {
    header("Location: ./login.php");
    exit();
}
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
    <link rel="icon" href="../../img/icon.ico" type="image/x-icon">
    <!-- <link rel="stylesheet" href="../../admin/dashboard/dasboard.css"> -->
    <link rel="stylesheet" href="../../admin/dashboard/dashboard.js">
    <link rel="stylesheet" href="../../admin/dashboard/dashboard.css">
     


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
                        <th scope="col" colspan="2">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $x = 1;
                    if ($result->num_rows > 0) {
                        while($row = $result->fetch_assoc()) {
                            echo "<tr>";
                            echo "<th scope='row'>" . $x++ . "</th>";
                            echo "<td>" . $row["nama"] . "</td>";
                            echo "<td><img src='../../img/" . $row["gambar"] . "' alt='" . $row["nama"] . "' style='width: 100px;'></td>";
                            echo "<td>" . $row["deskripsi"] . "</td>";
                            echo "<td><a href='" . $row["url"] . "' target='_blank'>Link</a></td>";
                            echo "<td colspan='2'><a href='edit.php?id=" . $row["id"] . "'><svg clip-rule='evenodd' fill-rule='evenodd' stroke-linejoin='round' stroke-miterlimit='2' viewBox='0 0 24 24' xmlns='http://www.w3.org/2000/svg'><path d='m11.25 6c.398 0 .75.352.75.75 0 .414-.336.75-.75.75-1.505 0-7.75 0-7.75 0v12h17v-8.75c0-.414.336-.75.75-.75s.75.336.75.75v9.25c0 .621-.522 1-1 1h-18c-.48 0-1-.379-1-1v-13c0-.481.38-1 1-1zm-2.011 6.526c-1.045 3.003-1.238 3.45-1.238 3.84 0 .441.385.626.627.626.272 0 1.108-.301 3.829-1.249zm.888-.889 3.22 3.22 8.408-8.4c.163-.163.245-.377.245-.592 0-.213-.082-.427-.245-.591-.58-.578-1.458-1.457-2.039-2.036-.163-.163-.377-.245-.591-.245-.213 0-.428.082-.592.245z' fill-rule='nonzero'/></svg></a><a href='hapus.php?id= " . $row["id"] . "'><svg width='24' height='24' fill='red' xmlns='http://www.w3.org/2000/svg' fill-rule='evenodd' clip-rule='evenodd'><path d='M19 24h-14c-1.104 0-2-.896-2-2v-16h18v16c0 1.104-.896 2-2 2m-9-14c0-.552-.448-1-1-1s-1 .448-1 1v9c0 .552.448 1 1 1s1-.448 1-1v-9zm6 0c0-.552-.448-1-1-1s-1 .448-1 1v9c0 .552.448 1 1 1s1-.448 1-1v-9zm6-5h-20v-2h6v-1.5c0-.827.673-1.5 1.5-1.5h5c.825 0 1.5.671 1.5 1.5v1.5h6v2zm-12-2h4v-1h-4v1z'/></svg></a></td>";
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
    <div class="container-fluid container-sm">
        <h2>Tambah Data</h2>
        <form method="POST" enctype="multipart/form-data" action="tambah.php">
            <label class="form-label" for="nama">Nama: </label>
            <input class="form-control" type="text" id="nama" name="nama" required><br><br>
            <label class="form-label" for="gambar">Gambar: </label>
            <input class="form-control" type="file" id="gambar" name="gambar" required><br><br>
            <label class="form-label" for="deskripsi">Deskripsi: </label>
            <input class="form-control" type="text" id="deskripsi" name="deskripsi" required><br><br>
            <label class="form-label" for="url">Url: </label>    
            <input class="form-control" type="text" id="url" name="url" required><br><br>
            <button type="submit">Tambah Data</button>
        </form> 
    </div>

   <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
    <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>

</body>
</html>
<?php
$koneksi->close();
?>