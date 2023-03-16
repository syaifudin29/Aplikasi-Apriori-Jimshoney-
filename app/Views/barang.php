<?= $this->extend('template');
    $this->section('content');
?>
 <div class="container-fluid">

                    <!-- Page Heading -->
                    <h1 class="h3 mb-2 text-gray-800">Data Barang</h1>
                        <p class="mb-4">Data barang yang terdapat di JIMSHONEY.  
                        <a class="btn btn-primary btn-icon-split float-right" data-bs-toggle="modal" data-bs-target="#tambah">
                            <span class="icon text-white-50">
                                <i class="fas fa-plus"></i>
                            </span>
                            <span class="text">Tambah barang</span>
                        </a>
                    <!-- DataTales Example -->
                    <div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <h6 class="m-0 font-weight-bold text-primary">Tabel Data Barang</h6>

                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                    <thead>
                                        <tr>
                                            <th>Nama</th>
                                            <th>Berat</th>
                                            <th>Jenis</th>
                                            <th>harga</th>
                                            <th>Aksi</th>
                                        </tr>
                                    </thead>
                                    <tfoot>
                                        <tr>
                                            <th>Nama</th>
                                            <th>Berat</th>
                                            <th>Jenis</th>
                                            <th>harga</th>
                                            <th>Aksi</th>
                                        </tr>
                                    </tfoot>
                                    <tbody>
                                        <?php foreach ($produk as $key): ?>
                                            
                                        
                                        <tr>
                                            <td><?php echo $key['nama']; ?></td>
                                            <td><?php echo $key['berat']." kg"; ?></td>
                                            <td><?php echo $key['jenis']; ?></td>
                                            <td><?php echo "Rp. ".number_format($key['harga'],2,',','.'); ?></td>
                                            <td>
                                                <a data-bs-toggle="modal" data-bs-target="#edit<?php echo $key['id_produk'];?>"  class="btn btn-warning btn-circle"><i class="fas fa-edit"></i></a>
                                                <a href="/barang/delete/<?php echo $key['id_produk']; ?>" class="btn btn-danger btn-circle"><i class="fas fa-trash"></i></a>
                                            </td>
                                              <div class="modal fade" id="edit<?php echo $key['id_produk'];?>" tabindex="-1" role="dialog" aria-labelledby="edit" aria-hidden="true">
                                                <form method="post" action="/barang/edit">
                                                    <input type="hidden" name="id_produk" value="<?php echo $key['id_produk']; ?>">
                                                <div class="modal-dialog" role="document">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h5 class="modal-title" id="exampleModal">Edit Data barang</h5>
                                                        </div>
                                                       <div class="modal-body">
                                                            <div class="form-group">
                                                              <label>Nama</label>
                                                              <input type="text" value="<?php echo $key['nama']; ?>" class="form-control" name="nama">
                                                            </div>
                                                            <div class="form-group">
                                                              <label>Berat</label>
                                                              <div class="input-group mb-3">
                                                                <input type="number" class="form-control stok_isi" value="<?php echo $key['berat']; ?>" name="berat">
                                                                <div class="input-group-append">
                                                                  <span class="input-group-text satuan">kg</i></span>
                                                                </div>
                                                              </div>
                                                            </div>
                                                             <div class="form-group">
                                                              <label>Jenis</label>
                                                              <input type="text" value="<?php echo $key['jenis']; ?>" class="form-control" name="jenis">
                                                            </div>
                                                            <div class="form-group">
                                                                  <label>Harga</label>
                                                                  <input type="number" value="<?php echo $key['harga']; ?>" class="form-control" name="harga">
                                                            </div>
                                                        </div>
                                                        <div class="modal-footer">
                                                            <button class="btn btn-secondary" type="button" data-bs-dismiss="modal">Close</button>
                                                            <button class="btn btn-primary" type="submit">Update</button>
                                                        </div>
                                                    </div>
                                                </div>
                                              </form>
                                            </div>
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
                                    <input type="number" class="form-control stok_isi" name="berat" placeholder="0">
                                    <div class="input-group-append">
                                      <span class="input-group-text satuan">kg</i></span>
                                    </div>
                                  </div>
                                </div>
                                <div class="form-group">
                                  <label>Jenis</label>
                                  <input type="text" class="form-control" name="jenis" placeholder="jam tangan">
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