<?php
// Menginclude file konfigurasi untuk koneksi database
include 'config.php';
session_start();
$search = isset($_GET["search"]) ? $_GET["search"] : null ;
    
// Mengambil data dari tabel obatherbal
$sql = "SELECT id, nama, gambar, deskripsi, url FROM obatherbal";
if ($search) {
  $sql .=" WHERE nama LIKE '%$search%'";
}
$result = $koneksi->query($sql);
?>
<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>MedikaObat.com</title>
    <link rel="stylesheet" href="asset/style.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/remixicon/4.0.1/remixicon.css" integrity="sha512-ZH3KB6wI5ADHaLaez5ynrzxR6lAswuNfhlXdcdhxsvOUghvf02zU1dAsOC6JrBTWbkE1WNDNs5Dcfz493fDMhA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.2/font/bootstrap-icons.min.css">
    <link rel="icon" href="img/icon.ico" type="image/x-icon">


    <style>
      @media screen and (max-width: 800px) {
        .wrap {
          flex-wrap: wrap;
        }
        /* HOME */
        @media screen and (max-width :1060px) {
          .wrap {
            flex-wrap: wrap;
          }
          
        }
        
        
      }
    </style>
  </head>
  <body class="bg-dark text-white">
    <?php include "include/navbar.php";?>
    <!-- <nav class="navbar navbar-expand  position-sticky top-0 napbar" style="z-index: 999;">
      <div class="container-fluid">
        <a class="navbar-brand" href="#">Toko Dua saudara</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
          <div class="navbar-nav mx-auto" >
            <a class="nav-link active" aria-current="page" href="#">Home</a>
            <a class="nav-link" href="#">About</a>
            <a class="nav-link" href="#">Product</a>
            <a class="nav-link" href="#">Gallery</a>
            <a class="nav-link" href="#">Contact</a>
            <div class="cart"><i class="ri-shopping-cart-line"></i></div>
          </div>
        </div>
      </div>
    </nav> -->
    <!-- Carouser -->
    <section id="home">
      <div class="container-home">
        <div class="home-text">
          <h5>WELCOME TO</h5>
          <h2>Medika<span>Obat</span></h2>
          <hr class="w-25 mx-auto border border-2 border-warning opacity-100" >
          

          </a>
        </div>
      </div>
    </section>
  

    <!-- Tentang Kami -->
    <section id="about" class="pt-5">
      <div class="container py-5 pt-5">
        <div data-aos="fade-up" class="d-flex flex-column flex-md-row justify-content-center gap-5">
          <img src="img/medicinalplants.jpg" class="rounded-3">
          <div data-aos="fade-up"  class="content-about">
            <h2 class="text-center">Tentang Kami</h2>
            <p>Sebelum terciptanya manusia di permukaan bumi, telah diciptakan alam sekitarnya dan isinya sehingga mulai dari sejak manusia mulai ada dan mulai mencoba memanfaatkan alam sekitarnya untuk memenuhi keperluan sosial dan pribadi maka alam menyediakan kebutuhan bagi kehidupannya adalah kehidupan dan sumber kehidupannya, termasuk keperluan obat-obatan untuk mengatasi masalah-masalah kesehatan. Kenyataan menunjukkan bahwa dengan bantuan obat-obatan asal bahan alam tersebut, masyarakat dapat mengatasi masalah-masalah kesehatan yang dihadapinya. Hal ini menunjukkan bahwa obat yang berasal dari sumber bahan alam khususnya tanaman telah memperlihatkan peranannya dalam penyelenggaraan upaya-upaya kesehatan masyarakat dan makin diteliti tnaman obat yang merupakan segala jenis tumbuh-tumbuhan yang mempunyai khasiat atau kegunaan sebagai obat.</p>

          </div>
  
          
        </div>
      </div>
    </section>
    <!-- Produk -->
    <section id="product" class="pt-5">
      <h1 class="text-center pb-4 pt-5">Obat Herbal</h1>
      <div class="d-flex wrap flex-wrap justify-content-center align-items-center gap-4 mb-4 mb-md-0 hover-zoom">
      <?php
            if ($result->num_rows > 0) {
                while($row = $result->fetch_assoc()) {
                    echo '<div data-aos="fade-up" class="card p-2" style="width: 18rem;">';
                    echo '<img src="./img/' . $row["gambar"] . '" class="card-img-top" width="100" height="200">';
                    echo '<div>';
                    echo '<h6 class="py-2 text-dark">' . $row["nama"] . '</h6>';
                    echo '<div class="d-flex justify-content-around">';
                    // echo '<p style="color:black;">' . $row["deskripsi"] . '</p>';
                    echo '</div>';
                    echo '</div>';
                    echo '</div>';
                }
            } else {
                echo '<p>Tidak ada data</p>';
            }
            ?>
            </div>
    </section>

    <!-- Gallery -->
    <section id="gallery" class="py-5 py-md-5">
      <div data-aos="fade-up" class="text-center mb-5 pt-5">
        <h1>Gallery</h1>
      </div>
      <div class="container">
        <div data-aos="fade-up" class="d-flex flex-wrap gap-3 justify-content-center">
          <img src="img/geserkanan.jpg" alt="" alt=""/>

          <img src="img/geserkiri.jpg" alt="" alt=""/>

        </div>
      </div>
    </section>
    <!-- CONTACT -->
    <section id="contact" class="py-5  w-100">
      <div data-aos="fade-up" class="text-center mb-5 pt-5">
        <h1>Contact Me</h1>
      </div>
      <div class="d-flex flex-column flex-md-row justify-content-center align-items-center w-100">
        <div class="content-form mx-auto px-3 px-md-0 container-contact">
          <form>
            <div class="mb-3">
              <label for="nama" class="form-label">Nama Lengkap</label>
              <input type="text" class="form-control" id="nama">
              
            </div>
            <div class="mb-3">
              <label for="exampleInputEmail1" class="form-label">Email address</label>
              <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
              
            </div>
            <div class="mb-3">
              <label for="pesan" class="form-label">Message</label>
              <textarea name="" class="form-control" cols="3" rows="4"></textarea>
            </div>
          
            <button type="submit" class="btn btn-primary">Submit</button>
          </form>
        </div>
      </div>

    </section>

    <div class="container">
      <footer class="py-3 my-4">
        <ul class="nav justify-content-center border-bottom pb-3 mb-3">
          <li class="nav-item"><a href="#" class="nav-link px-2 text-body-secondary">Home</a></li>
          <li class="nav-item"><a href="#about" class="nav-link px-2 text-body-secondary">Tentang Kami</a></li>
          <li class="nav-item"><a href="#product" class="nav-link px-2 text-body-secondary">Product</a></li>
          <li class="nav-item"><a href="#gallery" class="nav-link px-2 text-body-secondary">Gallery</a></li>
          <li class="nav-item"><a href="#contact" class="nav-link px-2 text-body-secondary">Contact Me</a></li>
        </ul>
        <p class="text-center text-body-secondary">&copy; Medika Obat</p>
      </footer>
    </div>
    
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
    <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>


    <script>
      AOS.init();
    </script>


  </body>
</html>