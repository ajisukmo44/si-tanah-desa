<!DOCTYPE html>
<html lang="en">

<?php
include 'komponen/header.php';
include 'fungsi/imgpreview.php';
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

                        <!-- DataTales Example -->
                        <div class="card shadow mb-4">
                            <div class="card-header py-3">
                                <h6 class="m-0 font-weight-bold text-primary">Data Profil <a href="#" class="badge badge-primary text-warning badge-xs" data-id="<?= $sesen_id; ?>" data-toggle="modal" data-target="#editModal"> <i class="fa fa-plus"></i> Edit Data</a>
                                </h6>
                            </div>
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table class="table table-hover table-bordered" width="100%" cellspacing="0">
                                        <?php
                                        $sql    = "SELECT * FROM tb_user a JOIN tb_jabatan b ON a.jabatan = b.id_jabatan WHERE a.id_user = '$sesen_id'";
                                        $result = mysqli_query($conn, $sql);
                                        $data   = mysqli_fetch_array($result);
                                        $tgl    = date('d-m-Y', strtotime($data['bergabung']));
                                        ?>

                                        <thead>
                                            <tr class="bg-light">
                                                <th>Nama&nbsp;Data</th>
                                                <th>Isi&nbsp;Data</th>
                                            </tr>
                                            <tr>
                                                <td>Foto</td>
                                                <td><a href="img/user/<?= $data['foto'] ?>"><img src='img/user/<?= $data['foto'] ?>' width='250px' height='230px'></a></td>

                                            </tr>
                                            <tr>
                                                <td>Nama User</td>
                                                <td><?= $data['nama']; ?></td>
                                            </tr>

                                            <tr>
                                                <td>Jabatan</td>
                                                <td><?= $data['nama_jabatan']; ?></td>
                                            </tr>
                                            <tr>
                                                <td>Alamat</td>
                                                <td><?= $data['alamat']; ?></td>
                                            </tr>
                                            <tr>
                                                <td>Email</td>
                                                <td><?= $data['email']; ?></td>
                                            </tr>
                                            <tr>
                                                <td>No Hp</td>
                                                <td><?= $data['no_hp']; ?></td>
                                            </tr>
                                            <tr>
                                                <td>Bergabung</td>
                                                <td><?= $tgl ?></td>
                                            </tr>
                                        </thead>
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



    <!-- modal edit -->
    <div class="modal fade" id="editModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="fetched-data"></div>
        </div>
    </div>

    <!-- Scroll to Top Button-->
    <a class="scroll-to-top rounded" href="#page-top">
        <i class="fas fa-angle-up"></i>
    </a>

    <!-- js edit -->
    <script type="text/javascript">
        $(document).ready(function() {
            $('#editModal').on('show.bs.modal', function(e) {
                var rowid = $(e.relatedTarget).data('id');
                $.ajax({
                    type: 'post',
                    url: 'modal/edituserprofil.php',
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