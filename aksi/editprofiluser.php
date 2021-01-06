<?php session_start();
include '../koneksi.php';

$id     = mysqli_real_escape_string($conn, $_POST['id_user']);
$nm     = mysqli_real_escape_string($conn, $_POST['nama']);
$al     = mysqli_real_escape_string($conn, $_POST['alamat']);
$em     = mysqli_real_escape_string($conn, $_POST['email']);
$hp     = mysqli_real_escape_string($conn, $_POST['no_hp']);
$foto   = $_FILES['foto']['name'];

if ($foto != "") {
    $ekstensi_diperbolehkan = array('jpeg', 'png', 'jpg');
    $x                      = explode('.', $foto);
    $ekstensi               = strtolower(end($x));
    $file_tmp               = $_FILES['foto']['tmp_name'];
    $angka_acak             = rand(1, 999);
    $ft       = $angka_acak . '-' . $foto;

    if (in_array($ekstensi, $ekstensi_diperbolehkan) === true) {
        move_uploaded_file($file_tmp, '../img/user/' . $ft);
        $query  = "UPDATE tb_user SET nama = '$nm',  alamat = '$al',  email = '$em',  no_hp = '$hp',  foto = '$ft' ";
        $query .= "WHERE id_user = '$id'";
        $result = mysqli_query($conn, $query);

        if (!$result) {
            die("Query gagal dijalankan: " . mysqli_errno($conn) .
                " - " . mysqli_error($conn));
        } else {
            echo "<script>alert('Data berhasil diubah.');window.location='../dataprofil.php';</script>";
        }
    } else {
        echo "<script>alert('Ekstensi gambar yang boleh hanya jpg atau png.');window.location='../dataprofil.php';</script>";
    }
} else {
    $query  = "UPDATE tb_user SET nama = '$nm',  alamat = '$al',  email = '$em',  no_hp = '$hp'  ";
    $query .= "WHERE id_user = '$id'";
    $result = mysqli_query($conn, $query);

    if (!$result) {
        die("Query gagal dijalankan: " . mysqli_errno($conn) .
            " - " . mysqli_error($conn));
    } else {
        echo "<script>alert('Data berhasil diubah.');window.location='../dataprofil.php';</script>";
    }
}
