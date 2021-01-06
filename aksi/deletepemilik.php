<?php session_start();
include '../koneksi.php';

$ipt   = mysqli_real_escape_string($conn, $_GET['ipt']);

$sql = "DELETE FROM tb_pemilik_tanah WHERE id_pemilik_tanah = '$ipt' ";
if (mysqli_query($conn, $sql)) {
    echo "<script>location.replace('../datapemilik.php')</script>";
} else {
    echo "Error updating record: " . mysqli_error($conn);
}
