<?= $this->extend('template');
    $this->section('content');

    $jumlah=count($juml);
?>
 <div class="container-fluid">
    <form method="post" action="/transaksi/tambah">
        <!-- Page Heading -->
        <h1 class="h3 mb-2 text-gray-800">Tambah Data Transaksi</h1>
          <a href="/transaksi/produk/tambah/TMS0<?php echo $jumlah+1; ?>" class="btn btn-primary btn-icon-split float-right">
                <span class="icon text-white-50">
                    <i class="fas fa-plus"></i>
                </span>
                <span class="text">Tambah produk</span>
            </a>
       <div class="row">
            <div class="col-3">
            <div class="form-group">
              <label>ID TRANSAKSI</label>
              <input type="text" class="form-control" value="TMS0<?php echo $jumlah+1; ?>" name="id" disabled>
               <input type="hidden" name="id_trans" class="form-control" value="TMS0<?php echo $jumlah+1; ?>" name="id">
            </div>
        </div>
         <div class="col-3">
            <div class="form-group">
              <label>Tanggal</label>
              <input type="date" class="form-control" name="tanggal" required>
            </div>
        </div>
       </div>
        <!-- DataTales Example -->
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">Produk yang dibeli</h6>

            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th>Produk</th>
                                <th>Jumlah</th>
                                <th>Harga</th>
                                <th>Happus</th>
                            </tr>
                        </thead>
                        <tbody>
                                
                            <?php
                            $total=0; 
                            foreach ($penjualan as $key):
                                $total=$total+($key['jumlah']*$key['harga']);
                             ?>
                            <tr>
                                <td><?php echo $key['nama']; ?></td>
                                <td><?php echo $key['jumlah']; ?> pcs</td>
                                <td><?php echo "Rp. ".number_format(($key['jumlah']*$key['harga']),0,',','.'); ?></td>
                                <td>
                                    <a href="/transaksi/produk/delete/<?php echo $key['id_produk']."/TRX-12-0".($jumlah+1); ?>" class="btn btn-danger btn-circle"><i class="fas fa-trash"></i></a>
                                </td>
                            </tr>
                            <?php endforeach ?>
                            <tr>
                                <td colspan="2"><b>Total Harga</b></td>
                                <td colspan="2"><b><?php echo "Rp. ".number_format($total,0,',','.');?></b></td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        <a href="/transaksi" class="btn btn-danger">Kembali</a>
        <button type="submit" class="btn btn-primary">Simpan transaksi</button>
    </form>
</div>
<?php $this->endSection(); ?>