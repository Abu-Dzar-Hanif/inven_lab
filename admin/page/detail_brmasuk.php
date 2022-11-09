<?php
$id = $_GET['i'];
$cek = mysqli_query($koneksi,"SELECT id_transaksi FROM tbl_transaksi");
while ($a = mysqli_fetch_array($cek)) {
    if(password_verify($a['id_transaksi'],$id)){
        $id = $a['id_transaksi'];
    }
}
?>
<!-- DataTales Example -->
<div class="card shadow mb-4">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">Transaki Barang Masuk #<?= $id?></h6>
    </div>
    <div class="card-body">
        <?php
        $query = mysqli_query($koneksi,"SELECT * FROM tbl_transaksi inner JOIN tbl_barang_masuk ON tbl_transaksi.id_transaksi = tbl_barang_masuk.id_barang_masuk inner JOIN tbl_barang ON tbl_barang_masuk.barang = tbl_barang.id_barang inner JOIN tbl_brand ON tbl_barang.brand = tbl_brand.id_brand WHERE id_transaksi='$id'");
        while ($b = mysqli_fetch_array($query)) {
        ?>
        <div class="mb-3">
            <div class="row no-gutters">
                <div class="col-2">
                    <div class="card-body">
                        <img class="rounded" src="admin/img/<?= $b['foto']?>" width="100px" alt="">
                    </div>
                </div>
                <div class="col">
                    <div class="card-body">
                        <table>
                            <tr>
                                <th>Nama Barang</th>
                                <th>:</th>
                                <td><?= $b['nama_barang']; ?></td>
                            </tr>
                            <tr>
                                <th>Brand</th>
                                <th>:</th>
                                <td><?= $b['nama_brand']; ?></td>
                            </tr>
                            <tr>
                                <th>Jumlah Masuk</th>
                                <th>:</th>
                                <td><?= $b['jumlah_masuk']; ?></td>
                            </tr>
                        </table>
                    </div>
                </div>
            </div>
        </div>
        <?php }
        $query = mysqli_query($koneksi,"SELECT * FROM tbl_transaksi inner JOIN tbl_tujuan ON tbl_transaksi.jenis_transaksi = tbl_tujuan.id_tujuan WHERE id_transaksi='$id'");
        $c = mysqli_fetch_array($query);
        ?>
        <div class="mb-3">
            <div class="row no-gutters">
                <div class="col-2">
                    <div class="card-body">
                    </div>
                </div>
                <div class="col">
                    <div class="card-body">
                        <table>
                            <tr>
                                <th>Jenis Transaksi</th>
                                <th>:</th>
                                <td><?=$c['tujuan']?></td>
                            </tr>
                            <tr>
                                <th>Keterangan</th>
                                <th>:</th>
                                <td><?=$c['keterangan']?></td>
                            </tr>
                            <tr>
                                <th>Total Barang Masuk</th>
                                <th>:</th>
                                <td><?=$c['total_item']?></td>
                            </tr>
                        </table>
                    </div>
                </div>
            </div>
        </div>

    </div>
    <div class="card-footer">
        <a target="_blank" href="admin/proses/ba_bm.php?i=<?= $id?>" class="btn btn-primary btn-sm my-2">Buat BA</a>
    </div>
</div>