<?php
session_start();
include '../../config.php';
$error = '';
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST['username'];
    $password = $_POST['password'];

    // Query ke database untuk mencari user dengan username yang diberikan
    $query = "SELECT password FROM admin WHERE username = ?";
    $stmt = mysqli_prepare($koneksi, $query);
    mysqli_stmt_bind_param($stmt, "s", $username);
    mysqli_stmt_execute($stmt);
    mysqli_stmt_bind_result($stmt, $password_user);
    $result = mysqli_stmt_fetch($stmt);
    mysqli_stmt_close($stmt);

    if ($result) {
        // Verifikasi password
        if (password_verify($password, $password_user)) {
            // Setel sesi sebagai user
            $_SESSION['username'] = $username;
            $_SESSION['role'] = 'admin';
            header("Location: dasboard.php");
            exit();
        } else {
            $error = 'Username atau password salah!';
        }
    } else {
        $error = 'Anda belum terdaftar!';
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
<link rel="icon" href="../../img/icon.ico" type="image/x-icon">
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>

<style>
   @import url('https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200; 1.300;1.400;1.500;1.600;1.700;1.800;1.900&display=swap'); 
  body {
    font-family: Arial, Helvetica, sans-serif;
    background-image: url(../../img/bege.jpg);
    background-position: center;
    background-size: cover;
    display: flex;
    justify-content: center;
    align-items: center;
    height: 100vh;
    margin: 0;
  }
  
  .form {
    width: 100%;
  }

  .form_place {
    padding: 20px;
    border-radius: 8px;
    box-shadow: 0 2px 10px  rgba(0, 0, 0, 0.1);
    width: 100%;
    max-width: 500px;
    text-align: center;
    margin: 1% auto;
    background-color:rgb(3 37 7 / 60%);
    backdrop-filter: blur(1px);
    background-size: cover;
    background-position: center;
  }

  h1 {
    margin-bottom: 20px;
    color: white;
    font-family: "Poppins", sans-serif;
    font-weight: bold;
  }

  .error-message {
    color: red;
    text-align: center;
    margin-bottom: 20px;
  }

  label {
    display: block;
    margin: 10px 0 5px;
    color: white;
    text-align: center;
    font-family: "Poppins", sans-serif;
    font-weight: 300;
  }

  input[type="text"],
  input[type="password"] {
    width: 100px;
    padding: 10px;
    border: 1px solid #ccc;
    border-radius: 4px;
    font-size: 16px;
    margin-bottom: 20px;
    text-align: center;
    font-family: "Poppins", sans-serif;
    font-weight: 300;
  }

  .button-group {
    display: flex;
    justify-content: space-evenly;
    flex-wrap: wrap;
    margin: 10px auto;
    gap: 10px;
  }

  .btn {
    font-size: larger;
    padding: 10px 20px;
    border: none;
    border-radius: 4px;
    color: white;
    text-decoration: none;
    text-align: center;
    cursor: pointer;
    transition: background-color 0.35s;
    font-family: "Poppins", sans-serif;
    font-weight: 300;
  }

  .btn-succes {
    background-color: #28a745;
  }

  .btn-succes:hover {
    background-color: #218838;
  }

  .btn-primary {
    background-color: #007bff;
  }

  .btn-primary:hover {
    background-color: #0056b3;
  }


</style>
  


</head>
<body>
    <div class="form container-fluid">
        <form method="post">
            <div class="form_place container-lg" style="margin: 1% auto; width: 90%; padding: 1%;">
                <h1>Login Admin</h1>
                <?php if ($error): ?>
                    <p style="color: red; text-align: center;"><?php echo $error; ?></p>
                <?php endif; ?>
                <label for="username">Username:</label>
                <input type="text" id="username" name="username" style="text-align: center; width: 60%; margin: 0 auto;" required>
                <label for="password">Password:</label>
                <input type="password" id="password" name="password" style="text-align: center; width: 60%; margin: 0 auto;" required>
                <div style="display: flex; justify-content: space-evenly; flex-wrap: wrap; flex-direction: row; margin: 10px auto; gap: 10px;">
                <input type="submit" value="Login" class="btn btn-success" style="font-size: larger; width: fit-content;">
                <a href="../../index.php" class="btn btn-primary" style="font-size: larger; width: fit-content; place-content: center;">Home</a>               
                </div>
                
            </div>
        </form>
    </div>
</body>
</html>