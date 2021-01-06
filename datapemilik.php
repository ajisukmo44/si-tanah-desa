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
                            <h6 class="m-0 font-weight-bold text-primary">Data Pemilik Tanah <a href="" class="badge badge-primary text-warning badge-xs" data-toggle="modal" data-target="#tambahModal"><i class="fa fa-plus"></i> Tambah Data Pemilik</a></h6>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive" style="font-size:13px">
                                <table class="table-sm table-bordered" id="dataTable" width="100%" cellspacing="0">
                                    <thead class="bg-light">
                                        <tr>
                                            <th>ID&nbsp;</th>
                                            <th>Nomer&nbsp;Iuran</th>
                                            <th>Nama&nbsp;Wajib&nbsp;Iuran</th>
                                            <th>Tempat&nbsp;Tinggal</th>
                                            <th>Jumlah&nbsp;Tanah</th>
                                            <th>Data&nbsp;Tanah</th>
                                            <th>Tindakan</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        include 'koneksi.php';
                                        
                                       

                                        $no = 1;
                                        $query = mysqli_query($conn, "SELECT * FROM tb_pemilik_tanah ORDER BY nomer_iuran ");
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
                                            <td><button type="button" class="btn btn-primary btn-sm mb-1">
                                            Sawah <span class="badge badge-light"> <?= $datats; ?> </span>
                                            </button>  &nbsp; <button type="button" class="btn btn-primary btn-sm mb-1">
                                            Kering <span class="badge badge-light"> <?= $datatk; ?> </span>
                                            </button>    </td>
                                               
                                                <td><a href="datatanahpemilik.php?no_iuran=<?= $ni; ?>" class="badge badge-primary p-2">Lihat Data Tanah </a> </td>
                                                <td>
                                                    <div class="btn-group" role="group" aria-label="Basic example">
                                                        <a href="#" data-toggle="modal" data-target="#editModal" data-id="<?= $ni; ?>" class="btn btn-info btn-sm d-inline-block"><i class="fa fa-edit"></i></a><a href="aksi/deletepemilik.php?ipt=<?= $ipt; ?>" onclick="return confirm('Anda yakin mau menghapus data ini ?')" class="btn btn-danger btn-sm ml-1 d-inline-block"><i class=" fa fa-times"></i></a>
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
                    <h6>TAMBAH DATA PEMILIK TANAH</h6>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form action="aksi/tambahpemilik.php" method="POST" enctype="multipart/form-data">
                        <div class="form-group row">
                            <label for="no_iuran" class="col-sm-4 col-form-label">No Iuran</label>
                            <div class="col-sm-8">
                                <input type="text" class="form-control" id="no_iuran" name="no_iuran" required>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="nama_pemilik" class="col-sm-4 col-form-label">Nama Wajib Iuran </label>
                            <div class="col-sm-8">
                                <input type="text" class="form-control" id="nama_pemilik" name="nama_pemilik" required>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="tempat_tinggal" class="col-sm-4 col-form-label">Tempat Tinggal</label>
                            <div class="col-sm-8">
                                <input type="text" class="form-control" id="tempat_tinggal" name="tempat_tinggal" required>
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

        <script type="text/javascript">
            $(document).ready(function() {
                $('#editModal').on('show.bs.modal', function(e) {
                    var rowid = $(e.relatedTarget).data('id');
                    $.ajax({
                        type: 'post',
                        url: 'modal/editpemilik.php',
                        data: 'rowid=' + rowid,
                        success: function(data) {
                            $('.fetched-data').html(data);
                        }
                    });
                });
            });
        </script>

</body>

</html>