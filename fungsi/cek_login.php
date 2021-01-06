<?php
// Cek sudah Login/belum
if (!isset($_SESSION['email'])) {
  echo "<script language='javascript'>location.replace('login.php')</script>";
} else {
}
