<?php
include '../koneksi.php';

$random = rand(100000, 999999);
$id = "USR" . $random;

$nm     = mysqli_real_escape_string($conn, $_POST['nama']);
$al     = mysqli_real_escape_string($conn, $_POST['alamat']);
$em     = mysqli_real_escape_string($conn, $_POST['email']);
$hr     = mysqli_real_escape_string($conn, $_POST['no_hp']);
$jb     = mysqli_real_escape_string($conn, $_POST['id_jabatan']);
$ps     = password_hash($_POST['password'], PASSWORD_DEFAULT);
$foto   = $_FILES['foto']['name'];

//cek dulu jika ada gambar produk jalankan coding ini
if ($foto != "") {
    $ekstensi_diperbolehkan = array('jpeg', 'png', 'jpg');
    $x                      = explode('.', $foto);
    $ekstensi               = strtolower(end($x));
    $file_tmp               = $_FILES['foto']['tmp_name'];
    $angka_acak             = rand(1, 999);
    $fotoku                 = $angka_acak . '-' . $foto;

    if (in_array($ekstensi, $ekstensi_diperbolehkan) === true) {
        move_uploaded_file($file_tmp, '../img/user/' . $fotoku);

        $query = "INSERT INTO tb_user ( id_user, nama, alamat, email, no_hp, jabatan,  password, foto )
         VALUES ('$id','$nm','$al','$em','$hr','$jb','$ps','$fotoku')";

        $result = mysqli_query($conn, $query);

        // periska query apakah ada error
        if (!$result) {
            die("Query gagal dijalankan: " . mysqli_errno($conn) .
                " - " . mysqli_error($conn));
        } else {
            echo "<script>alert('Data berhasil ditambah.');window.location='../datauser.php';</script>";
        }
    } else {
        //jika file ekstensi tidak jpg dan png maka alert ini yang tampil
        echo "<script>alert('Ekstensi gambar yang boleh hanya jpg atau png.');window.location='../datauser.php';</script>";
    }
} else {
    $query = "INSERT INTO tb_user ( id_user, nama, alamat, email, no_hp, jabatan, bergabung, password, foto )
    VALUES ('$id','$nm','$al','$em','$hr','$jb','$bg','$ps',1)";

    $result = mysqli_query($conn, $query);
    if (!$result) {
        die("Query gagal dijalankan: " . mysqli_errno($conn) .
            " - " . mysqli_error($conn));
    } else {

        echo "<script>alert('Data berhasil ditambah.');window.location='../datauser.php';</script>";
    }
};
