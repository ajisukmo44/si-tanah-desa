<?php session_start();
include '../koneksi.php';

if (isset($_POST['submit'])) {

    $noiuran        = mysqli_real_escape_string($conn, $_POST['nomer_iuran']);
    $no_persil      = mysqli_real_escape_string($conn, $_POST['no_persil']);
    $kd             = mysqli_real_escape_string($conn, $_POST['kelas_desa']);
    $lha            = mysqli_real_escape_string($conn, $_POST['luas_ha']);
    $lda            = mysqli_real_escape_string($conn, $_POST['luas_da']);
    $ir             = mysqli_real_escape_string($conn, $_POST['iuran_r']);
    $is             = mysqli_real_escape_string($conn, $_POST['iuran_s']);
    $stp            = mysqli_real_escape_string($conn, $_POST['stp']);

    // Proses insert data dari form ke db
    $sql = "INSERT INTO tb_tanah_sawah ( id,
                                nomer_iuran,
                                no_persil,
                                kelas_desa,
                                luas_tanah_ha,
                                luas_tanah_da,
                                iuran_r,
                                iuran_s,
                                sebab_tanggal_perubahan
                                )
                        VALUES ('',
                                '$noiuran',
                                '$no_persil',
                                '$kd',
                                '$lha',
                                '$lda',
                                '$ir',
                                '$is',
                                '$stp'
                                )";

    if (mysqli_query($conn, $sql)) {
        echo "<script>alert('Insert data berhasil! Klik ok untuk melanjutkan');location.replace('../datatanahsawah.php')</script>";
    } else {
        echo "Error updating record: " . mysqli_error($conn);
    }
} else {
    echo "<script>alert('Gak boleh tembak langsung ya, pencet dulu tombol uploadnya!');history.go(-1)</script>";
}
