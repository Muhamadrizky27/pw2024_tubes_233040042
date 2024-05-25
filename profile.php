<?php
session_start();
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

    <h1>Selamat Datang, <?php echo $username ?></h1>



    
    
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
    <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>

  </body>
</html>