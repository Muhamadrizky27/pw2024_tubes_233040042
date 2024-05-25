<?php
session_start();
session_destroy();
header("Location: login.php"); // Sesuaikan redirect location sesuai kebutuhan
exit();