     <!-- Page Heading -->
     <div class="d-sm-flex align-items-center justify-content-between mb-4">
         <h1 class="h3 mb-0 text-gray-800">Dashboard</h1>
     </div>

     <!-- Content Row -->
     <div class="row">
         <!-- Earnings (Monthly) Card Example -->
         <div class="col-xl-3 col-md-6 mb-4">
             <div class="card border-left-success shadow h-100 py-2">
                 <div class="card-body">
                     <div class="row no-gutters align-items-center">
                         <div class="col mr-2">
                             <div class="text-xs font-weight-bold text-success text-uppercase mb-1">
                                 Total Barang Masuk</div>
                             <?php
                            $qbm = mysqli_query($koneksi,"SELECT SUM(jumlah_masuk) AS tbm FROM tbl_barang_masuk");
                            $dbm = mysqli_fetch_array($qbm);
                            ?>
                             <div class="h5 mb-0 font-weight-bold text-gray-800"><?= $dbm['tbm']?></div>
                         </div>
                         <div class="col-auto">
                             <i class="fas fa-box fa-2x text-gray-300"></i>
                         </div>
                     </div>
                 </div>
             </div>
         </div>
         <!-- Earnings (Monthly) Card Example -->
         <div class="col-xl-3 col-md-6 mb-4">
             <div class="card border-left-danger shadow h-100 py-2">
                 <div class="card-body">
                     <div class="row no-gutters align-items-center">
                         <div class="col mr-2">
                             <div class="text-xs font-weight-bold text-danger text-uppercase mb-1">
                                 Total Barang Keluar</div>
                             <?php
                            $qbk = mysqli_query($koneksi,"SELECT SUM(jumlah_keluar) AS tbk FROM tbl_barang_keluar");
                            $dbk = mysqli_fetch_array($qbk);
                            ?>
                             <div class="h5 mb-0 font-weight-bold text-gray-800"><?= $dbk['tbk']?></div>
                         </div>
                         <div class="col-auto">
                             <i class="fas fa-box-open fa-2x text-gray-300"></i>
                         </div>
                     </div>
                 </div>
             </div>
         </div>
         <!-- Earnings (Monthly) Card Example -->
         <div class="col-xl-3 col-md-6 mb-4">
             <div class="card border-left-primary shadow h-100 py-2">
                 <div class="card-body">
                     <div class="row no-gutters align-items-center">
                         <div class="col mr-2">
                             <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                                 Total stok Barang</div>
                             <?php
                                 $qs = mysqli_query($koneksi,"SELECT SUM(stok) AS ts FROM tbl_stok");
                                 $ds = mysqli_fetch_array($qs)
                                 ?>
                             <div class="h5 mb-0 font-weight-bold text-gray-800"><?=$ds['ts']?></div>
                         </div>
                         <div class="col-auto">
                             <i class="fas fa-boxes fa-2x text-gray-300"></i>
                         </div>
                     </div>
                 </div>
             </div>
         </div>
     </div>