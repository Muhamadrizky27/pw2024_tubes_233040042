<?php 
$username = isset($_SESSION['username']) ? $_SESSION['username'] :'Guest';
define('BASE_URL', 'http://localhost/pw2024_tubes_233040042/');

?>

<!-- Navbar -->
<nav class="navbar navbar-expand-lg napbar position-sticky top-0" style="z-index: 10;">
      <div class="container-fluid"> <i class="bi bi-flower2 p-3"></i>
        <a class="navbar-brand" href="#">Medika Obat</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
          <div class="navbar-nav mx-md-auto">
            <a class="nav-link active" aria-current="page" href="<?php echo BASE_URL; ?>index.php#home">Home</a>
            <a class="nav-link" href="<?php echo BASE_URL; ?>index.php#about">About</a>
            <a class="nav-link" href="<?php echo BASE_URL; ?>index.php#product">Product</a>
            <a class="nav-link" href="<?php echo BASE_URL; ?>index.php#gallery">Gallery</a>
            <a class="nav-link" href="<?php echo BASE_URL; ?>index.php#contact">Contact</a>
            <?php if ($username !== 'Guest'): ?>
        <a class="nav-link" href="<?php echo BASE_URL; ?>logout.php">Logout</a>
        <a class="nav-link" href="<?php echo BASE_URL; ?>profile.php"><?php echo $username; ?></a>
    <?php else: ?>
        <a class="nav-link" href="<?php echo BASE_URL; ?>login.php">Login</a>
        <a class="nav-link" href="<?php echo BASE_URL; ?>register.php">Register</a>
    <?php endif; ?>
            <form class="d-flex" role="search" method="GET">
        <input class="form-control me-2" id="searchInputAja" name="search" type="search" placeholder="Cari" aria-label="Search" value="<?php echo isset($search) ? $search : ''; ?>">
        <button class="btn btn-primary" type="submit">Cari</button>
      </form>
          </div>
        </div>
      </div>
    </nav>