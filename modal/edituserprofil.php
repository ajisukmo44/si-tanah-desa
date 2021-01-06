<?php
include '../koneksi.php';
include '../fungsi/imgpreview.php';

if ($_POST['rowid']) {
    $id = $_POST['rowid'];
}

// mengambil data berdasarkan id
$sql = "SELECT * FROM tb_user WHERE id_user = '$id' ";
$result = $conn->query($sql);
foreach ($result as $data) {
?>

    <div class="modal-content">
        <div class="modal-header bg-light">
            <h6>EDIT PROFIL</h6>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
        <div class="modal-body">
            <form action="aksi/editprofiluser.php" method="POST" enctype="multipart/form-data">
                <div class="form-group">
                    <input type="hidden" class="form-control" name="id_user" value="<?= $data['id_user']; ?>">
                </div>
                <div class="form-group row">
                    <label for="nama" class="col-sm-3 col-form-label">Nama</label>
                    <div class="col-sm-9">
                        <input type="text" class="form-control" id="nama" name="nama" value="<?= $data['nama']; ?>" required>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="plat_motor" class="col-sm-3 col-form-label">Alamat</label>
                    <div class="col-sm-9">
                        <input type="text" class="form-control" id="alamat" name="alamat" value="<?= $data['alamat']; ?>" required>
                    </div>
                </div>

                <div class="form-group row">
                    <label for="plat_motor" class="col-sm-3 col-form-label">Email</label>
                    <div class="col-sm-9">
                        <input type="text" class="form-control" id="email" name="email" value="<?= $data['email']; ?>" required>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="no_hp" class="col-sm-3 col-form-label">No Hp</label>
                    <div class="col-sm-9">
                        <input type="text" class="form-control" id="no_hp" name="no_hp" value="<?= $data['no_hp']; ?>" required>
                    </div>
                </div>

                <div class="form-group row">
                    <label for="fotolama" class="col-sm-3 col-form-label">Foto Lama</label>
                    <div class="col-sm-9">
                        <img style="margin-left:0px; margin-right:45px; margin-bottom:15px;" src="img/user/<?= $data['foto'] ?> " width="75px" height="75px" /><br>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="fotolama" class="col-sm-3 col-form-label">Foto Baru</label>
                    <div class="col-sm-9">
                        <input type="file" id="foto" name="foto" onchange="tampilkanPreview(this,'preview1')" class="form-control-file">
                        <br><b>Preview Gambar</b><br>
                        <img id="preview1" src="" alt="" width="20%" />
                    </div>
                </div>
                <div class="modal-footer">
                            <button type="button" class="btn btn-warning text-primary" data-dismiss="modal"><i class="fa fa-times"></i> Batal</button>
                            <button type="submit" name="submit" class="btn btn-primary text-warning"><i class="fa fa-check"></i> Simpan</button>
                        </div>
               
            </form>
        </div>
    </div>

<?php } ?>