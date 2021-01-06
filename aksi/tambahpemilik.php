<?php session_start();
include '../koneksi.php';

if (isset($_POST['submit'])) {



    $noiuran    = mysqli_real_escape_string($conn, $_POST['no_iuran']);
    $nama       = mysqli_real_escape_string($conn, $_POST['nama_pemilik']);
    $tt      = mysqli_real_escape_string($conn, $_POST['tempat_tinggal']);

    $cekdata    = "SELECT nomer_iuran FROM tb_pemilik_tanah WHERE nomer_iuran = '$noiuran' ";

    $ada        =  mysqli_query($conn, $cekdata);

    if (mysqli_num_rows($ada) > 0) {

        echo "<script>alert('ERROR: No iuran telah terdaftar, silahkan pakai nomer lain!');history.go(-1)</script>";
    } else {

        // Proses insert data dari form ke db
        $sql = "INSERT INTO tb_pemilik_tanah ( id_pemilik_tanah,
                                nomer_iuran,
                                nama_pemilik,
                                tempat_tinggal
                                )
                        VALUES ('',
                                '$noiuran',
                                '$nama',
                                '$tt'
                                )";

        if (mysqli_query($conn, $sql)) {
            echo "<script>alert('Insert data berhasil! Klik ok untuk melanjutkan');location.replace('../datapemilik.php')</script>";
        } else {
            echo "Error updating record: " . mysqli_error($conn);
        }
    }
} else {
    echo "<script>alert('Gak boleh tembak langsung ya, pencet dulu tombol uploadnya!');history.go(-1)</script>";
}
