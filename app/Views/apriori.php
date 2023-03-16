<?= $this->extend('template');
    $this->section('content');
?>
<div class="container-fluid">
    <div class="card col-md-6" style="margin:0 auto">
        <div class="card-header">
            <h5 class="card-title">Proses Apriori</h5>
        </div>
        <form method="post" action="/apriori/proses">
            <div class="card-body">
                <div class="row">
                    <div class="form-group col-md-6">
                        <label>Dari tanggal</label>
                        <input type="date"  class="form-control" name="tgl_awal" required>
                    </div>
                    <div class="form-group col-md-6">
                        <label>Sampai tanggal</label>
                        <input type="date"  class="form-control" name="tgl_akhir" required>
                    </div>
                </div>
                <div class="row">
                    <div class="form-group col-md-6">
                        <label>Support</label>
                        <input type="number" step="0.01" class="form-control" name="support" required>
                    </div>
                    <div class="form-group col-md-6">
                        <label>Cofidence</label>
                        <input type="number" step="0.01" class="form-control" name="cofidence" required>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                 <?php
                $k = session()->getFlashdata('info');
                    if(isset($k)){
                        ?>
                         <div class="alert alert-danger  float-left" role="alert">
                   <?php echo $k; ?>
                </div>
                    <?php
                    }
                 ?>
                <button class="btn btn-primary" type="submit">Proses</button>
            </div>
                </form>
                
    </div>
    <div class="card shadow col-md-6" style="margin:0 auto; margin-top:20px;" >
                        <div class="card-header py-3">
                            <h6 class="m-0 font-weight-bold text-primary">Data transaksi</h6>
                        </div>
                        <div class="card-body">
                            
                            <div class="table-responsive">
                                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>No Transaksi</th>
                                            <th>Jumlah Barang</th>
                                        </tr>
                                    </thead>
                                    <tfoot>
                                  <tr>
                                            <th>No</th>
                                            <th>No Transaksi</th>
                                            <th>Jumlah Barang</th>
                                        </tr>
                                    </tfoot>
                                    <tbody>
                                    <?php
                                        $no = 1;
                                        foreach ($transaksi as $key) {
                                        ?>
                                        <tr>
                                            <th><?php echo $no++; ?></th>
                                            <th><?php echo $key['id_penjualan']; ?></th>
                                            <th><?php echo $key['total']; ?></th>
                                        </tr>
                                    <?php } ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
    
</div>

<?php $this->endSection(); ?>