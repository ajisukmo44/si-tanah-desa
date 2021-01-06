<?php session_start();
include '../koneksi.php';
$id   = mysqli_real_escape_string($conn, $_GET['id']);

$sql = "DELETE FROM tb_user WHERE id_user = '$id' ";
if (mysqli_query($conn, $sql)) {
    echo "<script>location.replace('../datauser.php')</script>";
} else {
    echo "Error updating record: " . mysqli_error($conn);
}
