<?php
include '../koneksi.php';

if (isset($_POST['submit'])) {


    $id        = mysqli_real_escape_string($conn, $_POST['id']);
    $noiuran        = mysqli_real_escape_string($conn, $_POST['no_iuran']);
    $nopersil      = mysqli_real_escape_string($conn, $_POST['no_persil']);
    $kd             = mysqli_real_escape_string($conn, $_POST['kelas_desa']);
    $lha            = mysqli_real_escape_string($conn, $_POST['luas_ha']);
    $lda            = mysqli_real_escape_string($conn, $_POST['luas_da']);
    $ir             = mysqli_real_escape_string($conn, $_POST['iuran_r']);
    $is             = mysqli_real_escape_string($conn, $_POST['iuran_s']);
    $stp            = mysqli_real_escape_string($conn, $_POST['stp']);


    // Proses update data dari form ke db
    $sql = "UPDATE tb_tanah_sawah SET   id          = '$id',
                                    nomer_iuran     = '$noiuran',
                                    no_persil       = '$nopersil',
                                    kelas_desa      = '$kd',
                                    luas_tanah_ha   = '$lha',
                                    luas_tanah_da   = '$lda',
                                    iuran_r         = '$ir',
                                    iuran_s         = '$is',
                                    sebab_tanggal_perubahan = '$stp'
                            WHERE   id              = '$id' ";

    if (mysqli_query($conn, $sql)) {
        echo "<script>alert('Update data berhasil! Klik ok untuk melanjutkan');location.replace('../datatanahpemilik.php?no_iuran={$noiuran}')</script>";
    } else {
        echo "Error updating record: " . mysqli_error($conn);
    }
} else {
    echo "<script>alert('Gak boleh tembak langsung ya, pencet dulu tombol uploadnya!');history.go(-1)</script>";
}
