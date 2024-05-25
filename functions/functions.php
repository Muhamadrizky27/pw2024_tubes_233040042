<?php 

function koneksi( ) {
  return mysqli_connect('localhost','root','root','pw2024_tubes_233040042');
}

function query( $query ) {  
  $conn = koneksi() ;
}
function login($data) {

  $conn = koneksi();

  $username = htmlspecialchars($data["username"]);
  $password = htmlspecialchars($data["password"]);  

  if ($username ==  'admin' && $password == '12345') {
    header("Location: index.php");
    exit;
  } else {
    return[
      'error' => 'true',
      'pesan'=> 'Username / Password Salah!'
    ];
  }

}

?>