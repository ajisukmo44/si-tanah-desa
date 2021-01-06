<?php
include '../koneksi.php';

if ($_POST['rowid']) {
    $id = $_POST['rowid'];
}

// mengambil data berdasarkan id
$sql = "SELECT * FROM tb_tanah_sawah WHERE id = '$id' ";

$result = $conn->query($sql);
foreach ($result as $data) {
?>

    <div class="modal-content">
        <div class="modal-header bg-light">
            <h6>EDIT DATA TANAH SAWAH</h6>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
        <div class="modal-body">
            <form action="aksi/editdatatanahsawah.php" method="POST" enctype="multipart/form-data">
                <div class="form-group row">
                    <label for="no_iuran" class="col-sm-4 col-form-label">No Iuran</label>
                    <div class="col-sm-8">
                        <input type="hidden" class="form-control" id="id" name="id" value="<?= $data['id']; ?>" readonly>
                        <input type="text" class="form-control" id="no_iuran" name="no_iuran" value="<?= $data['nomer_iuran']; ?>" readonly>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="no_persil" class="col-sm-4 col-form-label">Nomer Persil</label>
                    <div class="col-sm-8">
                        <input type="text" class="form-control" id="no_persil" name="no_persil" value="<?= $data['no_persil']; ?>" required>
                    </div>
                </div>
                <div class="form-group row">
                <label for="kelas_desa" class="col-sm-4 col-form-label">Kelas Desa</label>
                <div class="col-sm-8">
                 <select name="kelas_desa" id="kelas_desa" class="form-control">
                     <option value="<?= $data['kelas_desa']; ?>"><?= $data['kelas_desa']; ?></option>
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
                    <div class="col-sm-3">Ha
                        <input type="text" class="form-control" id="luas_ha" name="luas_ha" value="<?= $data['luas_tanah_ha']; ?>" required>
                    </div>
                    <div class="col-sm-3"> Da
                        <input type="text" class="form-control" id="luas_da" name="luas_da" value="<?= $data['luas_tanah_da']; ?>" required>
                    </div>
                </div>

                <div class="form-group row">
                    <label for="iuran_r" class="col-sm-4 col-form-label">Iuran Pajak</label>
                    <div class="col-sm-3"> R
                        <input type="text" class="form-control" id="iuran_r" name="iuran_r" value="<?= $data['iuran_s']; ?>" required>
                    </div>
                    <div class="col-sm-3"> S
                        <input type="text" class="form-control" id="iuran_s" name="iuran_s" value="<?= $data['iuran_r']; ?>" required>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="stp" class="col-sm-4 col-form-label">Sebab Tanggal Perubahan</label>
                    <div class="col-sm-8">
                        <input type="text" class="form-control" id="stp" name="stp" value="<?= $data['sebab_tanggal_perubahan']; ?>" required>
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