<!DOCTYPE html>
<html lang="en">

<?php
include 'fungsi/imgpreview.php';
include 'komponen/header.php';

$noiuran = $_GET['no_iuran'];

$query = mysqli_query($conn, "SELECT * FROM tb_pemilik_tanah WHERE nomer_iuran = '$noiuran' ");
while ($data = mysqli_fetch_assoc($query)) {
  $id   = $data['id_pemilik_tanah'];
  $np   = $data['nama_pemilik'];
  $tt   = $data['tempat_tinggal'];
  $ni   = $data['nomer_iuran'];
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
              <div class="row">
              <div class="col-12 col-sm-6 mb-1">
              <h6 class="m-0 font-weight-bold text-primary mb-1">DATA TANAH &nbsp;  <a href="datapemilik.php" class="btn btn-warning btn-sm" style='text-decoration:none'> <i class="fa fa-arrow-left"></i> Kembali</a></h6>
              </div>
              <div class="col-12 col-sm-6 text-left text-sm-right">
              <a href="cetakdatatanah.php?no_iuran=<?= $noiuran; ?>" class="btn btn-primary btn-sm" style='text-decoration:none'> <i class="fa fa-print text-right"></i> Cetak Data</a>
              </div>
              </div>
            
              </div>

              <div class="card-body">
                <div class="row mt-3">
                  <div class="col-12 col-sm-4 mb-1  text-left">
                    <p>Nama Pemilik Tanah : <?= $data['nama_pemilik']; ?> </p>
                  </div>
                  <div class="col-12 col-sm-4 mb-1 text-left  text-sm-center">
            <p>Nomer &nbsp; : <b> <?= $ni ?> </b></p>
                  </div>
                  <div class="col-12 col-sm-4  text-sm-right">
                    <p>Tempat Tinggal : <?= $tt; ?> </p>
                  </div>
                </div>

              <?php } ?>
              <hr>



              <!-- data developer -->
              <center>
                <p class="mt-4 text-left" style="font-size:14px">Data Tanah Sawah
                  <a href='' class='badge badge-success badge-xs ' data-toggle='modal' data-target='#tambahModal'><i class='fa fa-plus'></i> Tambah Tanah Sawah</a>

                </p>
              </center>
              <div class="table-responsive" style="font-size:13px">
                <table class="table-sm table-bordered" width="100%" cellspacing="0">
                  <thead class="bg-light">
                    <tr class="text-center">
                      <td scope="col" rowspan="2">No</td>
                      <td scope="col" rowspan="2">No Persil</td>
                      <td scope="col" rowspan="2">Kelas Desa</td>
                      <td scope="col" colspan="2">Luas Tanah</td>
                      <td scope="col" colspan="2">Iuran Pajak</td>
                      <td scope="col" rowspan="2">Sebab Tanggal Perubahan</td>
                      <td scope="col" rowspan="2">Tindakan</td>
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
                    $query = mysqli_query($conn, "SELECT * FROM tb_tanah_sawah WHERE nomer_iuran = '$noiuran' ");

                    while ($data = mysqli_fetch_assoc($query)) {

                      $id       = $data['id'];
                      $ni       = $data['nomer_iuran'];
                      $np       = $data['no_persil'];
                      $kd       = $data['kelas_desa'];
                      $ltha     = $data['luas_tanah_ha'];
                      $ltda     = $data['luas_tanah_da'];
                      $ir       = number_format($data['iuran_r']);
                      $is       = $data['iuran_s'];
                      $stp      = $data['sebab_tanggal_perubahan'];
                    ?>
                      <tr class="text-center">
                        <th scope="row"><?= $no++ ?></th>
                        <td><?= $np; ?></td>
                        <td><?= $kd; ?></td>
                        <td><?= $ltha; ?></td>
                        <td><?= $ltda; ?></td>
                        <td><?= $ir; ?></td>
                        <td><?= $is; ?> </td>
                        <td><?= $stp; ?></td>
                        <td>
                          <div class="btn-group" role="group" aria-label="Basic example">
                            <a href="#" data-toggle="modal" data-target="#editModal" data-id="<?= $id; ?>" class="btn btn-info btn-sm d-inline-block"><i class="fa fa-edit"></i></a><a href="aksi/deletetanahsawah.php?id=<?= $id; ?>&no_iuran=<?= $ni; ?>" onclick="return confirm('Anda yakin mau menghapus data ini ?')" class="btn btn-danger btn-sm ml-1 d-inline-block"><i class=" fa fa-times"></i></a>
                          </div>
                        </td>
                      </tr>
                    <?php } ?>
                  </tbody>
                </table>
              </div>

              <!-- data developer -->
              <center>
                <p class="mt-4 text-left" style="font-size:14px">Data Tanah Kering
                  <a href='' class='badge badge-success badge-xs ' data-toggle='modal' data-target='#tambahModal2'><i class='fa fa-plus'></i> Tambah Tanah Kering</a>

                </p>
              </center>
              <div class="table-responsive" style="font-size:13px">
                <table class="table-sm table-bordered" width="100%" cellspacing="0">
                  <thead class="bg-light">
                    <tr class="text-center">
                      <td scope="col" rowspan="2">No</td>
                      <td scope="col" rowspan="2">No Persil</td>
                      <td scope="col" rowspan="2">Kelas Desa</td>
                      <td scope="col" colspan="2">Luas Tanah</td>
                      <td scope="col" colspan="2">Iuran Pajak</td>
                      <td scope="col" rowspan="2">Sebab Tanggal Perubahan</td>
                      <td scope="col" rowspan="2">Tindakan</td>
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
                    $query = mysqli_query($conn, "SELECT * FROM tb_tanah_kering WHERE nomer_iuran = '$noiuran'  ");

                    while ($data = mysqli_fetch_assoc($query)) {

                      $id      = $data['id'];
                      $ni      = $data['nomer_iuran'];
                      $np       = $data['no_persil'];
                      $kd       = $data['kelas_desa'];
                      $ltha     = $data['luas_tanah_ha'];
                      $ltda     = $data['luas_tanah_da'];
                      $ir       = number_format($data['iuran_r']);
                      $is       = $data['iuran_s'];
                      $stp      = $data['sebab_tanggal_perubahan'];
                    ?>
                      <tr class="text-center">
                        <th scope="row"><?= $no++ ?></th>
                        <td><?= $np; ?></td>
                        <td><?= $kd; ?></td>
                        <td><?= $ltha; ?></td>
                        <td><?= $ltda; ?></td>
                        <td><?= $ir; ?></td>
                        <td><?= $is; ?> </td>
                        <td><?= $stp; ?></td>
                        <td>
                          <div class="btn-group" role="group" aria-label="Basic example">
                            <a href="#" data-toggle="modal" data-target="#editModal2" data-id="<?= $id; ?>" class="btn btn-info btn-sm d-inline-block"><i class="fa fa-edit"></i></a><a href="aksi/deletetanahkering.php?id=<?= $id; ?>&no_iuran=<?= $ni; ?>" onclick="return confirm('Anda yakin mau menghapus data ini ?')" class="btn btn-danger btn-sm ml-1 d-inline-block"><i class=" fa fa-times"></i></a>
                          </div>
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
          <div class="modal-header bg-light border-left-warning">
            <h6>TAMBAH DATA TANAH SAWAH</h6>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body bg-white">
            <form action="aksi/tambahtanahsawah.php" method="POST" enctype="multipart/form-data">
              <input type="hidden" name="nomer_iuran" value="<?= $noiuran; ?>">
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


    <!-- tambah layanan -->
    <div class="modal fade" id="tambahModal2" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog " role="document">
        <div class="modal-content">
          <div class="modal-header bg-light border-left-warning">
            <h6>TAMBAH DATA TANAH KERING</h6>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body bg-white">
            <form action="aksi/tambahtanahkering.php" method="POST" enctype="multipart/form-data">
              <input type="hidden" name="nomer_iuran" value="<?= $noiuran; ?>">
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

    <div class="modal fade" id="editModal2" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog " role="document">
        <div class="fetched-data2"></div>
      </div>
    </div>

    <!-- Scroll to Top Button-->
    <a class="scroll-to-top rounded" href="#page-top">
      <i class="fas fa-angle-up"></i>

      <!-- js tambah -->
      <script type="text/javascript">
        $(document).ready(function() {
          $('#editModal').on('show.bs.modal', function(e) {
            var rowid = $(e.relatedTarget).data('id');
            $.ajax({
              type: 'post',
              url: 'modal/editdatatanahsawah.php',
              data: 'rowid=' + rowid,
              success: function(data) {
                $('.fetched-data').html(data);
              }
            });
          });
        });
      </script>

      <script type="text/javascript">
        $(document).ready(function() {
          $('#editModal2').on('show.bs.modal', function(e) {
            var rowid = $(e.relatedTarget).data('id');
            $.ajax({
              type: 'post',
              url: 'modal/editdatatanahkering.php',
              data: 'rowid=' + rowid,
              success: function(data) {
                $('.fetched-data2').html(data);
              }
            });
          });
        });
      </script>

      <script>
        $('#tambahModal').on('show.bs.modal', function(event) {
          var button = $(event.relatedTarget)
          var modal = $(this)
          modal.find('.modal-title').text('New message to ')
          modal.find('.modal-body input')
        })
      </script>

      <script>
        $('#tambahModal2').on('show.bs.modal', function(event) {
          var button = $(event.relatedTarget)
          var modal = $(this)
          modal.find('.modal-title').text('New message to ')
          modal.find('.modal-body input')
        })
      </script>

  </body>

</html>