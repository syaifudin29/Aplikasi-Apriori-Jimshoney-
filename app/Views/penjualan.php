<?= $this->extend('template');
    $this->section('content');
?>
 <div class="container-fluid">

                    <!-- Page Heading -->
                    <h1 class="h3 mb-2 text-gray-800">Data Transaksi</h1>
                        <p class="mb-4">Data transaksi yang terdapat di JIMSHONEY.  
                        <a href="/transaksi/produk" class="btn btn-primary btn-icon-split float-right">
                            <span class="icon text-white-50">
                                <i class="fas fa-plus"></i>
                            </span>
                            <span class="text">Tambah transaksi</span>
                        </a>
                    <!-- DataTales Example -->
                    <div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <h6 class="m-0 font-weight-bold text-primary">Tabel Data transaksi</h6>

                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                    <thead>
                                        <tr>
                                            <th>Tanggal</th>
                                            <th>ID Penjualan</th>
                                            <th>Jumlah produk</th>
                                            <th>Total Harga</th>
                                            <th>Aksi</th>
                                        </tr>
                                    </thead>
                                    <tfoot>
                                        <tr>
                                            <th>Tanggal</th>
                                            <th>ID Penjualan</th>
                                            <th>Jumlah produk</th>
                                            <th>Total Harga</th>
                                            <th>Aksi</th>
                                        </tr>
                                    </tfoot>
                                    <tbody>
                                        <?php
                                        foreach ($id_trans as $keys): 
                                        $juml = 0; 
                                        $harga = 0;
                                            foreach ($penjualan as $key) {
                                                if ($keys['id_penjualan']==$key['id_penjualan']) {
                                                    $juml = $juml+$key['jumlah'];
                                                    $harga = $harga+($key['jumlah']*$key['harga']);
                                                }
                                            }
                                            ?>
                                            
                                        <tr>
                                            <td><?php echo $keys['tanggal']; ?></td>
                                            <td><?php echo $keys['id_penjualan']; ?></td>
                                             <td><?php echo $juml; ?></td>
                                            <td><?php echo "Rp. ".number_format($harga,2,',','.'); ?></td>
                                            <td>
                                                <a href="/transaksi/delete/<?php echo $keys['id_penjualan']; ?>" class="btn btn-danger btn-circle"><i class="fas fa-trash"></i></a>
                                            </td>
                                        </tr>
                                        <?php endforeach ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>

                </div>
                <!-- Modal-->
                <div class="modal fade" id="tambah" tabindex="-1" role="dialog" aria-labelledby="tambah" aria-hidden="true">
                <form method="post" action="/barang/tambah">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel">Tambah Data barang</h5>
                            </div>
                            <div class="modal-body">
                                <div class="form-group">
                                  <label>Nama</label>
                                  <input type="text" class="form-control" name="nama" placeholder="tas ">
                                </div>
                                <div class="form-group">
                                  <label>Berat</label>
                                  <div class="input-group mb-3">
                                    <input type="text" class="form-control stok_isi" name="berat" placeholder="0">
                                    <div class="input-group-append">
                                      <span class="input-group-text satuan">kg</i></span>
                                    </div>
                                  </div>
                                </div>
                                <div class="form-group">
                                      <label>Harga</label>
                                      <input type="number" class="form-control" name="harga" placeholder="0">
                                </div>
                            </div>
                            <div class="modal-footer">
                                <button class="btn btn-secondary" type="button" data-bs-dismiss="modal">Close</button>
                                <button class="btn btn-primary" type="submit">Save changes</button>
                            </div>
                        </div>
                    </div>
                </form>
                </div>
<?php $this->endSection(); ?>