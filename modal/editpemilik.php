<?php
include '../koneksi.php';

if ($_POST['rowid']) {
    $id = $_POST['rowid'];
}

// mengambil data berdasarkan id
$sql = "SELECT * FROM tb_pemilik_tanah WHERE nomer_iuran = '$id' ";

$result = $conn->query($sql);
foreach ($result as $data) {
?>

    <div class="modal-content">
        <div class="modal-header bg-light">
            <h6>EDIT DATA PEMILIK TANAH</h6>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
        <div class="modal-body">
            <form action="aksi/editdatapemilik.php" method="POST" enctype="multipart/form-data">
                <div class="form-group row">
                    <label for="no_iuran" class="col-sm-4 col-form-label">No Iuran</label>
                    <div class="col-sm-8">
                        <input type="text" class="form-control" id="no_iuran" name="no_iuran" value="<?= $data['nomer_iuran']; ?>" readonly>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="nama_pemilik" class="col-sm-4 col-form-label">Nama Pemilik</label>
                    <div class="col-sm-8">
                        <input type="text" class="form-control" id="nama_pemilik" name="nama_pemilik" value="<?= $data['nama_pemilik']; ?>">
                    </div>
                </div>
                <div class="form-group row">
                    <label for="tempat_tinggal" class="col-sm-4 col-form-label">Tempat Tinggal</label>
                    <div class="col-sm-8">
                        <input type="text" class="form-control" id="tempat_tinggal" name="tempat_tinggal" value="<?= $data['tempat_tinggal']; ?>">
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