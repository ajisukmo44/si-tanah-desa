<?php session_start();
include '../koneksi.php';

$id   = mysqli_real_escape_string($conn, $_GET['id']);
$ni   = mysqli_real_escape_string($conn, $_GET['no_iuran']);

$sql = "DELETE FROM tb_tanah_kering WHERE id = '$id' ";
if (mysqli_query($conn, $sql)) {
    echo "<script>location.replace('../datatanahpemilik.php?no_iuran={$ni}')</script>";
} else {
    echo "Error updating record: " . mysqli_error($conn);
}
