<?php session_start();
ob_start();
include 'koneksi.php';
include 'fungsi/base_url.php';
include 'fungsi/cek_session_public.php';
include 'fungsi/tgl_indo.php';

$noiuran = $_GET['no_iuran'];

?>
<html xmlns="http://www.w3.org/1999/xhtml">
<!-- Bagian halaman HTML yang akan konvert -->

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />

    <title>Desa Karanggeneng</title>

    <!-- Font Awesome Icon -->
    <style type="text/css">
        .tabel2 {
            border-collapse: collapse;
            margin-top: 20px;
            width: 100%;
        }

        .tabel2 tr.odd td {
            background-color: #f9f9f9;

            width: 100%;
        }

        .tabel2 th,
        .tabel2 td {
            border: 1px;
            border-color: #000;
            padding: 7px 7px;
            line-height: 20px;
            vertical-align: top;
        }
    </style>
</head>

<body>

    <!-- query join tabel -->
    <?php
    include 'koneksi.php';
    $sql = "SELECT* FROM tb_pemilik_tanah WHERE nomer_iuran = '$noiuran' ";
    $result = mysqli_query($conn, $sql);
    $data1 = mysqli_fetch_array($result);
    ?>


    <p align="center"> <img src="img/batang.png" alt="" style="width:50px"></p>
    <h3 align="center"><strong> KUTIPAN BUKU C </strong></h3>
    <p align="center">Desa Karanggeneng, Kecamatan Kandeman, Kabupaten Batang, Jawa Tengah, Indonesia. 51261</p>
    <hr>
    <!-- data motor dan customer -->
    <table>
        <thead>
            <tr>
                <col width="300">
                <td align="left"><b>Nama Pemilik Tanah: </b> <?= $data1['nama_pemilik']; ?> </td>
                <col width="100">
                <td align="left"><b>Nomer :  </b> <?= $noiuran; ?> </td>
                <col width="300">
                <td align="right"><b>Tempat Tinggal: </b> <?= $data1['tempat_tinggal']; ?> </td>
            </tr>
        </thead>
        <tbody>
            <tr>

                <td></td>

                <td> </td>
            </tr>

        </tbody>
    </table>
    <hr>
    <br>
    <p align="center"><strong>DATA TANAH SAWAH</strong></p>
    <table class="tabel2" border="1" cellspacing="1" cellpadding="1">
        <tr style="background-color:#F8F9FC;">
            <col width="10">
            <th rowspan="2" align="center">No</th>
            <col width="50">
            <th rowspan="2" align="center">Nomer Persil dan Huruf Bagian Persil</th>
            <col width="45">
            <th rowspan="2" align="center">Kelas Desa</th>
            <col width="45">
            <th colspan="2" align="center">Luas Tanah</th>
            <col width="45">
            <th colspan="2" align="center">Iuran Pajak</th>
            <col width="40">
            <th rowspan="2" align="center">Sebab dan Tanggal Perubahan</th>
            <col width="60">
        </tr>
        <tr style="background-color:#F8F9FC;">
            <th align="center">Ha</th>
            <th align="center">Da</th>
            <th align="center">Rp</th>
            <th align="center">S</th>
        </tr>
        <?php
        $no = 1;
        include 'koneksi.php';

        $query = mysqli_query($conn, "SELECT * FROM tb_tanah_sawah WHERE nomer_iuran = '$noiuran' ");

        while ($data  = mysqli_fetch_assoc($query)) {
            $id       = $data['id'];
            $ni       = $data['nomer_iuran'];
            $np       = $data['no_persil'];
            $kd       = $data['kelas_desa'];
            $ltha     = $data['luas_tanah_ha'];
            $ltda     = $data['luas_tanah_da'];
            
            $ir       = number_format($data['iuran_r']);
            $is       = number_format($data['iuran_s']);
            $stp      = $data['sebab_tanggal_perubahan'];
        ?>
            <tr>
                <th align="center"><?= $no++; ?></th>
                <td align="center"><?= $np; ?></td>
                <td align="center"><?= $kd; ?></td>
                <td align="center"><?= $ltha; ?></td>
                <td align="center"><?= $ltda; ?></td>
                <td align="center"><?= $ir; ?></td>
                <td align="center"><?= $is; ?></td>
                <col width="80">
                <td align="center"><?= $stp; ?></td>
            </tr>
        <?php } ?>
    </table>
<br>
    <br>
    <br>
    <p align="center"><strong>DATA TANAH KERING</strong></p>
    <table class="tabel2" border="1" cellspacing="1" cellpadding="1">
        <tr style="background-color:#F8F9FC;">
            <col width="10">
            <th rowspan="2" align="center">No</th>
            <col width="45">
            <th rowspan="2" align="center">Nomer Persil dan Huruf Bagian Persil</th>
            <col width="45">
            <th rowspan="2" align="center">Kelas Desa</th>
            <col width="45">
            <th colspan="2" align="center">Luas Tanah</th>
            <col width="45">
            <th colspan="2" align="center">Iuran Pajak</th>
            <col width="45">
            <th rowspan="2" align="center">Sebab Tanggal Perubahan</th>
            <col width="80">
        </tr>
        <tr style="background-color:#F8F9FC;">
            <th align="center">Ha</th>
            <th align="center">Da</th>
            <th align="center">Rp</th>
            <th align="center">S</th>
        </tr>
        <?php
        $no = 1;
        include 'koneksi.php';

        $query = mysqli_query($conn, "SELECT * FROM tb_tanah_kering WHERE nomer_iuran = '$noiuran' ");

        while ($data  = mysqli_fetch_assoc($query)) {
            $id       = $data['id'];
            $ni       = $data['nomer_iuran'];
            $np       = $data['no_persil'];
            $kd       = $data['kelas_desa'];
            $ltha     = $data['luas_tanah_ha'];
            $ltda     = $data['luas_tanah_da'];
            
            $ir       = number_format($data['iuran_r']);
            $is       = number_format($data['iuran_s']);
            $stp      = $data['sebab_tanggal_perubahan'];
        ?>
            <tr>
                <th align="center"><?= $no++; ?></th>
                <td align="center"><?= $np; ?></td>
                <td align="center"><?= $kd; ?></td>
                <td align="center"><?= $ltha; ?></td>
                <td align="center"><?= $ltda; ?></td>
                <td align="center"><?= $ir; ?></td>
                <td align="center"><?= $is; ?></td>
                <col width="80">
                <td align="center"><?= $stp; ?></td>
            </tr>
        <?php } ?>
    </table>
    <br>
    <br>
    <br>
    <br>
    <hr>
    <p align="right"><b>
            Kepala Desa Karanggeneng</b> <br>
    </p>
    <br><br>
    <p align="right">Bpk. Ari Gunawan</p>
</body>

</html>
<!-- Akhir halaman HTML yang akan di konvert -->

<?php
$content = ob_get_clean();
include 'html2pdf/html2pdf.class.php';
try {
    $html2pdf = new HTML2PDF('P', 'A4', 'en', false, 'UTF-8', array(10, 5, 10, 0));
    $html2pdf->pdf->SetDisplayMode('fullpage');
    $html2pdf->writeHTML($content);
    $html2pdf->Output('invoice.pdf');
} catch (HTML2PDF_exception $e) {
    echo $e;
    exit;
}
?>