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

                    <!-- DataTales Example -->
                    <div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <h6 class="m-0 font-weight-bold text-primary">Data User <a href="" class="badge badge-primary text-warning badge-xs" data-toggle="modal" data-target="#tambahModal"><i class="fa fa-plus"></i> Tambah User</a></h6>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive" style="font-size:12px">
                                <table class="table-sm table-bordered table table-bordered table-hover table-striped">
                                    <thead class="bg-light">
                                        <tr>
                                            <th class="header text-center">Foto</th>
                                            <th>ID&nbsp;User</th>
                                            <th>Nama&nbsp;User</th>
                                            <th>Alamat</th>
                                            <th>Email</th>
                                            <th>No&nbsp;Hp</th>
                                            <th>Jabatan</th>
                                            <th>Tindakan&nbsp;&nbsp;</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        include 'koneksi.php';
                                        $query = mysqli_query($conn, "SELECT * FROM tb_user");
                                        while ($data = mysqli_fetch_assoc($query)) {
                                            $id   = $data['id_user'];
                                            $ft   = $data['foto'];
                                            $nm   = $data['nama'];
                                            $alm  = $data['alamat'];
                                            $eml  = $data['email'];
                                            $nohp = $data['no_hp'];
                                            $jb   = $data['jabatan'];
                                        ?>
                                            <tr>
                                                <td><a href="img/user/<?= $ft ?>"><img src="img/user/<?= $ft ?>" alt="" width="40" height="40"></a></td>
                                                <td><?= $id ?></td>
                                                <td><?= $nm ?></td>
                                                <td><?= $alm ?></td>
                                                <td><?= $eml ?></td>
                                                <td><?= $nohp ?></td>
                                                <td><?= $jb; ?></td>
                                                <td>
                                                    <div class="btn-group" role="group" aria-label="Basic example">
                                                        <a href="#" data-toggle="modal" data-target="#editModal" data-id="<?= $id; ?>" class="btn btn-info btn-sm d-inline-block"><i class="fa fa-edit"></i></a><a href="aksi/deleteuser.php?id=<?= $id; ?>" onclick="return confirm('Anda yakin mau menghapus data ini ?')" class="btn btn-danger btn-sm ml-1 d-inline-block"><i class=" fa fa-times"></i></a>
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
                <div class="modal-header bg-light border-left-warning">
                    <h6>TAMBAH DATA USER</h6>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body bg-white overflow-hidden">
                    <form action="aksi/tambahuser.php" method="POST" enctype="multipart/form-data">

                        <div class="form-group row">
                            <label for="nama" class="col-sm-3 col-form-label">Nama</label>
                            <div class="col-sm-9">
                                <input type="text" class="form-control" id="nama" name="nama" required>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="plat_motor" class="col-sm-3 col-form-label">Alamat</label>
                            <div class="col-sm-9">
                                <input type="text" class="form-control" id="alamat" name="alamat" required>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="plat_motor" class="col-sm-3 col-form-label">Email</label>
                            <div class="col-sm-9">
                                <input type="text" class="form-control" id="email" name="email" required>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="no_hp" class="col-sm-3 col-form-label">No Hp</label>
                            <div class="col-sm-9">
                                <input type="text" class="form-control" id="no_hp" name="no_hp" required>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="jabatan" class="col-sm-3 col-form-label">Jabatan</label>
                            <div class="col-sm-9">
                                <select name="id_jabatan" id="id_jabatan" class="form-control" required>
                                    <option value="admin">admin</option>
                                </select>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="password" class="col-sm-3 col-form-label">Password</label>
                            <div class="col-sm-9">
                                <input type="password" class="form-control" id="password" name="password" required>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="plat_motor" class="col-sm-3 col-form-label">Foto</label>
                            <div class="col-sm-9">
                                <input type="file" name="foto" id="foto" aria-hidden onchange="tampilkanPreview(this,'preview')" required />
                                <br><b>Preview Gambar</b><br>
                                <img id="preview" src="" alt="" width="25%" />
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-primary text-warning" data-dismiss="modal"><i class="fa fa-times"></i> Batal</button>
                            <button type="submit" name="submit" class="btn btn-warning text-primary"><i class="fa fa-check"></i> Simpan</button>
                        </div>

                    </form>
                </div>
            </div>
        </div>
    </div>


    <div class="modal fade" id="editModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog " role="document">
            <div class="fetched-data"></div>
        </div>
    </div>

    <!-- Scroll to Top Button-->
    <a class="scroll-to-top rounded" href="#page-top">
        <i class="fas fa-angle-up"></i>

        <!-- js tambah -->
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
                        url: 'modal/edituser.php',
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