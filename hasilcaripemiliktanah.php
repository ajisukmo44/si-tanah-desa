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
                <form action="hasilcaripemiliktanah.php" method="post"> 
                <div class="row col-12 justify-content-center  bg-primary p-3 " style="border-radius:2%">     
                <div class="col-12 col-sm-7 mb-1">
                    <input type="text" class="form-control" name="data" placeholder="Search nomer iuran atau nama pemilik ......" aria-label="Recipient's username">
                    </div>
                    <div class="col-12 col-sm-3 mb-1">
                        <select name="type" id="" class="form-control">
                            <option value="no_iuran">No Iuran</option>
                            <option value="nama">Nama Pemilik</option>
                        </select>
                    </div>
                    <div class="col-12 col-sm-2">
                    <button type="submit" name="submit" class="btn btn-warning btn-block"  class="form-control" ><i class="fa fa-search"></i> CARI </button>
                    </div>
                </div>
                </div>
                </form>
                
                <div class="card card-body mt-2">
                   <!-- data developer -->
              <div class="table-responsive" style="font-size:13px">
                <table class="table-sm table-bordered" width="100%" cellspacing="0">
                  <thead class="bg-light">
                    <tr>
                      <th>ID&nbsp;</th>
                      <th>Nomer&nbsp;Iuran</th>
                      <th>Nama&nbsp;Wajib&nbsp;Iuran</th>
                      <th>Tempat&nbsp;Tinggal</th>
                      <th>Jumlah&nbsp;Tanah</th>
                      <th>Data&nbsp;Tanah</th>
                  </tr>
                    </tr>
                  </thead>
                  <tbody>
                    <?php
                    $no = 1;
                    include 'koneksi.php';
                    if($type == 'no_iuran') {
                        $query = mysqli_query($conn, "SELECT * FROM tb_pemilik_tanah WHERE nomer_iuran LIKE  '%$data%'; ");
                    } else if ($type == 'nama') {
                        $query = mysqli_query($conn, "SELECT * FROM tb_pemilik_tanah WHERE nama_pemilik LIKE  '%$data%';  ");
                    }

                    while ($data = mysqli_fetch_assoc($query)) {



                        $ipt   = $data['id_pemilik_tanah'];
                        $np   = $data['nama_pemilik'];
                        $tt   = $data['tempat_tinggal'];
                        $ni   = $data['nomer_iuran'];
                 
                        
                        $sql1    = "SELECT * FROM tb_tanah_sawah WHERE nomer_iuran = '$ni' ";
                        $result1 = mysqli_query($conn, $sql1);
                        $datats = mysqli_num_rows($result1);

                        $sql2    = "SELECT * FROM tb_tanah_kering WHERE nomer_iuran = '$ni' ";
                        $result2 = mysqli_query($conn, $sql2);
                        $datatk = mysqli_num_rows($result2);
                    ?>

                          <tr>
                          <td><?= $no++ ?></td>
                          <td><?= $ni ?></td>
                          <td><?= $np ?></td>
                          <td><?= $tt ?></td>
                          <td><button type="button" class="btn btn-primary btn-sm">
                                            Sawah <span class="badge badge-light"> <?= $datats; ?> </span>
                                            </button>  &nbsp; <button type="button" class="btn btn-primary btn-sm">
                                            Kering <span class="badge badge-light"> <?= $datatk; ?> </span>
                                            </button>    </td>
                          <td><a href="datatanahpemilik.php?no_iuran=<?= $ni; ?>" class="badge badge-primary p-2">Lihat Data Tanah</a></td>
                         
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