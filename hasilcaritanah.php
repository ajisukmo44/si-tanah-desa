<!DOCTYPE html>
<html lang="en">

<?php
include 'fungsi/imgpreview.php';
include 'komponen/header.php';

$data  = mysqli_real_escape_string($conn, $_POST['data']);
$type  = mysqli_real_escape_string($conn, $_POST['type']);

?>

<body id="page-top">

    <!-- Page Wrapper -->
    <div id="wrapper">

        <!-- Sidebar -->
        <?php include 'komponen/sidebar.php' ?>

        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">

            <!-- Main Content -->
            <div id="content">

                <!-- Topbar -->
                <?php include 'komponen/topbar.php' ?>

                <!-- Begin Page Content -->
                <div class="container-fluid ">
                  
                
                <div class="card card-body bg-primary">
                <center> <h5> Cari Berdasarkan ..</h5></center>
                   <form action="hasilcaritanah.php" method="post"> 
                <div class="row col-12 justify-content-center  bg-primary p-3 " style="border-radius:2%">     
                <div class="col-12 col-sm-7 mb-1">
                    <input type="text" class="form-control" name="data" placeholder="Search nomer iuran atau nama pemilik ......" aria-label="Recipient's username">
                    </div>
                    <div class="col-12 col-sm-3 mb-1">
                        <select name="type" id="" class="form-control">
                            <option value="sawah">Data Tanah Sawah</option>
                            <option value="kering">Data Tanah Kering</option>
                        </select>
                    </div>
                    <div class="col-12 mb-1 col-sm-2">
                    <button type="submit" name="submit" class="btn btn-warning btn-block"  class="form-control" ><i class="fa fa-search"></i> CARI </button>
                    </div>
                </div>
                </form>
                
                <div class="card card-body mt-2">
                   <!-- data developer -->
              <div class="table-responsive" style="font-size:13px">
                <table class="table-sm table-bordered" width="100%" cellspacing="0">
                  <thead class="bg-light">
                    <tr class="text-center">
                      <td scope="col" rowspan="2">Nomer</td>
                      <td scope="col" rowspan="2">Nama Pemilik</td>
                      <td scope="col" rowspan="2">No Persil</td>
                      <td scope="col" rowspan="2">Kelas Desa</td>
                      <td scope="col" colspan="2">Luas Tanah</td>
                      <td scope="col" colspan="2">Iuran Pajak</td>
                      <td scope="col" rowspan="2">Sebab Tanggal Perubahan</td>
                      <td scope="col" rowspan="2">Cetak</td>
                    </tr>
                    <tr class="text-center">
                      <td>Ha</td>
                      <td>Da</td>
                      <td>Rp</td>
                      <td>S</td>
                    </tr>
                  </thead>
                  <tbody>
                    <?php
                    $no = 1;
                    include 'koneksi.php';

                    if($type == 'sawah') {
                        $query = mysqli_query($conn, "SELECT * FROM tb_tanah_sawah a JOIN tb_pemilik_tanah b ON a.nomer_iuran = b.nomer_iuran WHERE a.nomer_iuran LIKE  '%$data%'; ");
                    } else if ($type == 'kering') {
                        $query = mysqli_query($conn, "SELECT * FROM tb_tanah_kering a JOIN tb_pemilik_tanah b ON a.nomer_iuran = b.nomer_iuran WHERE a.nomer_iuran LIKE  '%$data%'; ");
                    }

                    while ($data = mysqli_fetch_assoc($query)) {
    
                        $id       = $data['id'];
                        $npt      = $data['nama_pemilik'];
                        $ni       = $data['nomer_iuran'];
                        $np       = $data['no_persil'];
                        $kd       = $data['kelas_desa'];
                        $ltha     = $data['luas_tanah_ha'];
                        $ltda     = $data['luas_tanah_da'];
                        $ir       = number_format($data['iuran_r']);
                        $is       = number_format($data['iuran_s']);
                        $stp      = $data['sebab_tanggal_perubahan'];
                 
                    ?>

                      <tr class="text-center">
                        <td><?= $ni; ?></td>
                        <td><?= $npt; ?></td>
                        <td><?= $np; ?></td>
                        <td><?= $kd; ?></td>
                        <td><?= $ltha; ?></td>
                        <td><?= $ltda; ?></td>
                        <td><?= $ir; ?></td>
                        <td><?= $is; ?> </td>
                        <td><?= $stp; ?></td>
                        <td>
                        <div class="btn-group" role="group" aria-label="Basic example">
                            <a href="datatanahpemilik.php?no_iuran=<?= $ni; ?>"  class="btn btn-info btn-sm d-inline-block"><i class="fa fa-eye"></i></a><a href="cetakdatatanah.php?no_iuran=<?= $ni; ?>"  class="btn btn-success btn-sm ml-1 d-inline-block"><i class=" fa fa-print"></i></a>
                          </div>
                        </td>
                      </tr>
                    <?php } ?>
                  </tbody>
                </table>
              </div>
                    </div>
                
              </div>
              </div>
                </div>
            </div>
            </div>
            <!-- End of Main Content -->


            <!-- Footer -->
            <?php include 'komponen/footer.php' ?>

        </div>

    </div>
    <!-- End of Page Wrapper -->


 

    <!-- Scroll to Top Button-->
    <a class="scroll-to-top rounded" href="#page-top">
        <i class="fas fa-angle-up"></i>



</body>

</html>