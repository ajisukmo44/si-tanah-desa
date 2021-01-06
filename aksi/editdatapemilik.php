<?php
include '../koneksi.php';

if (isset($_POST['submit'])) {


    $noiuran    = mysqli_real_escape_string($conn, $_POST['no_iuran']);
    $nama       = mysqli_real_escape_string($conn, $_POST['nama_pemilik']);
    $tt         = mysqli_real_escape_string($conn, $_POST['tempat_tinggal']);


    // Proses update data dari form ke db
    $sql = "UPDATE tb_pemilik_tanah SET   nomer_iuran     = '$noiuran',
                                    nama_pemilik   = '$nama',
                                    tempat_tinggal = '$tt'
                            WHERE   nomer_iuran     = '$noiuran' ";

    if (mysqli_query($conn, $sql)) {
        echo "<script>alert('Update data berhasil! Klik ok untuk melanjutkan');location.replace('../datapemilik.php')</script>";
    } else {
        echo "Error updating record: " . mysqli_error($conn);
    }
} else {
    echo "<script>alert('Gak boleh tembak langsung ya, pencet dulu tombol uploadnya!');history.go(-1)</script>";
}
