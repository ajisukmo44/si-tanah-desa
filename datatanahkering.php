<!DOCTYPE html>
<html lang="en">

<?php
include 'fungsi/imgpreview.php';
include 'komponen/header.php';

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
                <div class="container-fluid">

                    <!-- Page Heading -->
                    <div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <h6 class="m-0 font-weight-bold text-primary">Data Tanah Kering <a href="" class="badge badge-primary text-warning badge-xs" data-toggle="modal" data-target="#tambahModal"><i class="fa fa-plus"></i> Tambah Data Tanah Kering</a></h6>
                        </div>
                        <div class=" card-body mt-2">
                   <!-- data developer -->
              <div class="table-responsive" style="font-size:13px">
                <table class="table-sm table-bordered" id="dataTable" width="100%" cellspacing="0">
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
                    $query = mysqli_query($conn, "SELECT * FROM tb_tanah_kering a JOIN tb_pemilik_tanah b ON a.nomer_iuran = b.nomer_iuran");

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
            <!-- End of Main Content -->


            <!-- Footer -->
            <?php include 'komponen/footer.php' ?>

        </div>

    </div>
    <!-- End of Page Wrapper -->


    <!--   modal tambah -->
    <div class="modal fade" id="tambahModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog " role="document">
            <div class="modal-content">
                <div class="modal-header bg-light">
                    <h6>TAMBAH DATA TANAH KERING</h6>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body bg-white">
            <form action="aksi/tambahtanahkering.php" method="POST" enctype="multipart/form-data">
            <div class="form-group row">
                            <label for="user" class="col-sm-4 col-form-label">Nomer / Pemilik</label>
                            <div class="col-sm-8">
                                <select name="nomer_iuran" id="nomer_iuran" class="form-control" required>
                                    <?php
                                    $query = "SELECT * FROM tb_pemilik_tanah ";
                                    $sql = mysqli_query($conn, $query);
                                    while ($data = mysqli_fetch_array($sql)) {
                                        echo '<option value="' . $data['nomer_iuran'] . '">'  . $data['nomer_iuran'] . ' - '. $data['nama_pemilik'] . '</option>';
                                    }
                                    ?>
                                </select>
                            </div>
                        </div>
              <div class="form-group row">
                <label for="no_persil" class="col-sm-4 col-form-label">Nomer Persil</label>
                <div class="col-sm-8">
                  <input type="text" class="form-control" id="no_persil" name="no_persil" required>
                </div>
              </div>
              <div class="form-group row">
                <label for="kelas_desa" class="col-sm-4 col-form-label">Kelas Desa</label>
                <div class="col-sm-8">
                 <select name="kelas_desa" id="kelas_desa" class="form-control">
                 <option value="D-1">D-1</option>
                 <option value="D-2">D-2</option>
                 <option value="D-3">D-3</option>
                 <option value="S-1">S-1</option>
                 <option value="S-2">S-2</option>
                 </select>
                </div>
              </div>
              <div class="form-group row">
                <label for="luas_ha" class="col-sm-4 col-form-label">Luas Tanah</label>
                <div class="col-sm-4">
                  <input type="text" class="form-control" id="luas_ha" name="luas_ha" placeholder="Ha" required>
                </div>
                <div class="col-sm-4">
                  <input type="text" class="form-control" id="luas_ha" name="luas_ha" placeholder="Da" required>
                </div>
              </div>

              <div class="form-group row">
                <label for="iuran_r" class="col-sm-4 col-form-label">Iuran Pajak </label>
                <div class="col-sm-4"> 
                  <input type="text" class="form-control" id="iuran_r" name="iuran_r" placeholder="Rp" required>
                </div>
                <div class="col-sm-4"> 
                  <input type="text" class="form-control" id="iuran_s" name="iuran_s" placeholder="S" required>
                </div>
              </div>
              <div class="form-group row">
                <label for="stp" class="col-sm-4 col-form-label">Sebab Tanggal Perubahan</label>
                <div class="col-sm-8">
                  <input type="text" class="form-control" id="stp" name="stp" required>
                </div>
              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-warning text-primary" data-dismiss="modal"><i class="fa fa-times"></i> Batal</button>
                <button type="submit" name="submit" class="btn btn-primary text-warning"><i class="fa fa-check"></i> Simpan</button>
              </div>

            </form>
          </div>
            </div>
        </div>
    </div>

    <!-- modal edit -->

    <div class="modal fade" id="editModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog " role="document">
            <div class="fetched-data"></div>
        </div>
    </div>

    <!-- Scroll to Top Button-->
    <a class="scroll-to-top rounded" href="#page-top">
        <i class="fas fa-angle-up"></i>


        <script>
            $('#tambahModal').on('show.bs.modal', function(event) {
                var button = $(event.relatedTarget)
                var modal = $(this)
                modal.find('.modal-title').text('New message to ')
                modal.find('.modal-body input')
            })
        </script>



</body>

</html>