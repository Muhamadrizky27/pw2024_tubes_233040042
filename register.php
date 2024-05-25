<?php
include 'config.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST['username'];
    $email = $_POST['email'];
    $password = $_POST['password'];

    // Hash password sebelum menyimpan ke database
    $hashed_password = password_hash($password, PASSWORD_DEFAULT);

    $query = "INSERT INTO user (username, email, password) VALUES (?, ?, ?)";
    $stmt = mysqli_prepare($koneksi, $query);
    mysqli_stmt_bind_param($stmt, "sss", $username, $email, $hashed_password);

    if (mysqli_stmt_execute($stmt)) {
        echo "$username berhasil registrasi.";
        header("Location: login.php");
        exit();
    } else {
        echo "Error: " . mysqli_stmt_error($stmt);
    }

    mysqli_stmt_close($stmt);
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
<link rel="icon" href="img/icon.ico" type="image/x-icon">
    <meta charset="UTF-8">
    <title>Register</title>
    <style>
   @import url('https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200; 1.300;1.400;1.500;1.600;1.700;1.800;1.900&display=swap'); 
  body {
    font-family: Arial, Helvetica, sans-serif;
    background-image: url(./img/bg1.jpg);
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
    background-color: white;
    padding: 20px;
    border-radius: 8px;
    box-shadow: 0 2px 10px  rgba(0, 0, 0, 0.1);
    width: 100%;
    max-width: 500px;
    text-align: center;
    margin: 1% auto;
    background-color: rgba(255, 255, 255, 0.6);
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
  input[type="password"], 
  input[type="email"] {
    width: 250px;
    padding: 10px;
    border: 1px solid #ccc;
    border-radius: 4px;
    font-size: 16px;
    margin-bottom: 20px;
    text-align: left;
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
            <div class="form_place">
            <h1>Register</h1>
            
            <div style="display: flex; gap: 15vh;">
              <label for="username">Username:</label>
              <input type="text" id="username" name="username" required>
            </div>
            <div style="display: flex; gap: 20vh;">
            <label for="email">Email:</label>
            <input type="email" id="email" name="email" required>
           </div>
            <div style="display: flex; gap: 15vh;">
            <label for="password">Password:</label>
            <input type="password" id="password" name="password" required>
          </div>
           
            
            <div style="display: flex; justify-content: space-evenly; flex-direction:row;">
            <input type="submit" value="register" class="btn btn-success" style="font-size: larger; width: fit-content; background-color:#218838">
                <a href="login.php" class="btn btn-primary" style="font-size: larger; width: fit-content; place-content: center;">kembali</a>
            </div>
            </div>
        </form>
    </div>
</body>
</html>