<!-- DataTales Example -->
<div class="card shadow mb-4">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">Tambah Tujuan Transaksi</h6>
    </div>
    <div class="card-body">
        <form action="admin/proses/input_tujuan.php" method="post">
            <div class="form-group">
                <label for="tujuan">Tujuan Transaksi</label>
                <input type="text" name="tujuan" class="form-control" id="tujuan">
            </div>
            <div class="form-group">
                <label for="tipe">Tipe Transaksi</label>
                <select name="tipe" id="" class="form-control">
                    <option value="M">Masuk</option>
                    <option value="K">Keluar</option>
                </select>
            </div>
            <div class="form-group">
                <button type="submit" name="submit" class="btn btn-primary">Simpan</button>
            </div>
        </form>
    </div>
</div>