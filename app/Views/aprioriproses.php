<?= $this->extend('template');
    $this->section('content');
?>
<div class="container-fluid">
        <div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <h6 class="m-0 font-weight-bold text-primary">Itemset 1</h6>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered display" width="100%" cellspacing="0">
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>Produk</th>
                                            <th>Transaksi</th>
                                            <th>Support</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        $no=1;
                                        foreach ($item1 as $key ) {?>
                                         <tr>
                                            <td><?php echo $no++; ?></td>
                                            <td><?php echo $key['nama']; ?></td>
                                            <td><?php echo $key['jumlah']; ?></td>
                                             <td><?php echo $key['support']; ?></td>
                                        </tr>
                                        <?php
                                        } 
                                        ?>
                                    </tbody>
                                </table>
                            </div>
                            <br>
                            <h5 class="text-success"><b>Itemset 1 Lolos</b></h5>
                            <div class="table-responsive">
                                <table class="table table-bordered display" width="100%" cellspacing="0">
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>Produk</th>
                                            <th>Support</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        $no=1;
                                        foreach ($data['item1'] as $key ) {?>
                                         <tr>
                                            <td><?php echo $no++; ?></td>
                                            <td><?php echo $key['nama']; ?></td>
                                             <td><?php echo $key['total']; ?></td>
                                        </tr>
                                        <?php
                                        } 
                                        ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>

                    <div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <h6 class="m-0 font-weight-bold text-primary">Itemset 2</h6>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered display"  width="100%" cellspacing="0">
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>Produk 1</th>
                                            <th>Produk 2</th>
                                            <th>Transaksi</th>
                                            <th>Support</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        $no=1;
                                        foreach ($item2 as $key ) {?>
                                         <tr>
                                            <td><?php echo $no++; ?></td>
                                            <?php 
                                                foreach ($produk as $keys) {
                                                    if($keys['id_produk'] == $key['id_produk_1']){
                                                    ?>
                                                      <td><?php echo $keys['nama']; ?></td>
                                                    <?php
                                                    }
                                                }
                                                 foreach ($produk as $keys) {
                                                    if($keys['id_produk'] == $key['id_produk_2']){
                                                    ?>
                                                      <td><?php echo $keys['nama']; ?></td>
                                                    <?php
                                                    }
                                                }
                                            ?>
                                            <td><?php echo $key['jumlah']; ?></td>
                                            <td><?php echo $key['support']; ?></td>
                                        </tr>
                                        <?php
                                        } 
                                        ?>
                                    </tbody>
                                </table>
                            </div>
                            <br>
                            <h5 class="text-success"><b>Itemset 2 Lolos</b></h5>
                            <div class="table-responsive">
                                <table class="table table-bordered display" width="100%" cellspacing="0">
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>Produk 1</th>
                                            <th>Produk 2</th>
                                            <th>Support</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        $no=1;
                                        foreach ($data['item2_lolos'] as $key ) {?>
                                        <tr>
                                            <td><?php echo $no++; ?></td>
                                            <?php 
                                            foreach ($produk as $keys) {
                                                    if($keys['id_produk'] == $key['id_produk_1']){
                                                    ?>
                                                        <td><?php echo $keys['nama']; ?></td>
                                                    <?php
                                                    }
                                                }
                                                foreach ($produk as $keys) {
                                                    if($keys['id_produk'] == $key['id_produk_2']){
                                                    ?>
                                                        <td><?php echo $keys['nama']; ?></td>
                                                    <?php
                                                    }
                                                }
                                            ?>
                                                <td><?php echo $key['total']; ?></td>
                                        </tr>
                                        <?php
                                        } 
                                        ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                    <!-- item set 3 -->
                    <div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <h6 class="m-0 font-weight-bold text-primary">Itemset 3</h6>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered display" width="100%" cellspacing="0">
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>Produk 1</th>
                                            <th>Produk 2</th>
                                            <th>Produk 3</th>
                                            <th>Transaksi</th>
                                            <th>Support</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        $no=1;
                                        foreach ($data['item3'] as $key ) {?>
                                         <tr>
                                            <td><?php echo $no++; ?></td>
                                           <?php 
                                            foreach ($produk as $keys) {
                                                    if($keys['id_produk'] == $key['id_produk_1']){
                                                    ?>
                                                        <td><?php echo $keys['nama']; ?></td>
                                                    <?php
                                                    }
                                                }
                                                foreach ($produk as $keys) {
                                                    if($keys['id_produk'] == $key['id_produk_2']){
                                                    ?>
                                                        <td><?php echo $keys['nama']; ?></td>
                                                    <?php
                                                    }
                                                }
                                                foreach ($produk as $keys) {
                                                    if($keys['id_produk'] == $key['id_produk_3']){
                                                    ?>
                                                        <td><?php echo $keys['nama']; ?></td>
                                                    <?php
                                                    }
                                                }
                                            ?>
                                                <td><?php echo $key['total']; ?></td>
                                                <td><?php echo $key['jumlah']; ?></td>
                                        </tr>
                                        <?php
                                        } 
                                        ?>
                                    </tbody>
                                </table>
                            </div>
                            <h5 class="text-success"><b>Itemset 3 Lolos</b></h5>
                            <div class="table-responsive">
                                <table class="table table-bordered display"  width="100%" cellspacing="0">
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>Produk 1</th>
                                            <th>Produk 2</th>
                                            <th>Produk 3</th>
                                            <th>Transaksi</th>
                                            <th>Support</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        $no=1;
                                        foreach ($data['item3_lolos'] as $key ) {?>
                                        <tr>
                                            <td><?php echo $no++; ?></td>
                                        <?php 
                                            foreach ($produk as $keys) {
                                                    if($keys['id_produk'] == $key['id_produk_1']){
                                                    ?>
                                                        <td><?php echo $keys['nama']; ?></td>
                                                    <?php
                                                    }
                                                }
                                                foreach ($produk as $keys) {
                                                    if($keys['id_produk'] == $key['id_produk_2']){
                                                    ?>
                                                        <td><?php echo $keys['nama']; ?></td>
                                                    <?php
                                                    }
                                                }
                                                foreach ($produk as $keys) {
                                                    if($keys['id_produk'] == $key['id_produk_3']){
                                                    ?>
                                                        <td><?php echo $keys['nama']; ?></td>
                                                    <?php
                                                    }
                                                }
                                            ?>
                                                <td><?php echo $key['total']; ?></td>
                                                <td><?php echo $key['jumlah']; ?></td>
                                        </tr>
                                        <?php
                                        } 
                                        ?>
                                    </tbody>
                                </table>
                            </div>
                            <br>
                            <?php if(count($data['item3_lolos']) == 1){
                            ?>
                            <div class="alert alert-danger" role="alert">
                                Itemset 3 minimal 2 data yang lolos. Maka itemset 3 tidak termasuk.
                            </div>
                            <?php    
                            }else if(count($data['item3_lolos']) == 0){
                            ?>
                            <div class="alert alert-danger" role="alert">
                                Itemset 3 kurang dari nilai support. Maka itemset 3 tidak termasuk.
                            </div>
                            <?php
                            } ?>
                            <span class="badge rounded-pill text-bg-danger"></span>

                        </div>
                    </div>
                    <!-- assoc item set 3 -->
                    <!-- //assosiasi -->
                    <?php if (!isset($data['item4_lolos'])) { ?>
                    <div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <h6 class="m-0 font-weight-bold text-primary">Pola Asosiasi</h6>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered display"  width="100%" cellspacing="0">
                                    <thead>
                                        <tr>
                                            <th>Rule</th>
                                            <th>A&B</th>
                                            <th>A</th>
                                            <th>Confidence</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        $no=1;
                                        foreach ($data['asso_item2'] as $key ) {?>
                                        <?php 
                                            foreach ($produk as $keys) {
                                                    if($keys['id_produk'] == $key['id_produk_1']){
                                                        $nama1 = $keys['nama'];
                                                    }
                                                }
                                                foreach ($produk as $keys) {
                                                    if($keys['id_produk'] == $key['id_produk_2']){
                                                        $nama2 = $keys['nama'];
                                                    }
                                                }
                                            ?>
                                                <tr>
                                                    <td>Jika membeli <b><?php echo $nama1; ?></b> maka membeli <b><?php echo $nama2; ?></b></td>
                                                    <td><?php echo $key['AB']; ?></td>
                                                    <td><?php echo $key['A']; ?></td>
                                                    <td><?php echo $key['cofidence']; ?></td>
                                                </tr>
                                        <?php
                                        } 
                                        ?>
                                    </tbody>
                                </table>
                            </div>
                            <br>
                            <h5 class="text-success"><b>Asosiasi Final</b></h5>
                            <div class="table-responsive">
                                <table class="table table-bordered display"  width="100%" cellspacing="0">
                                    <thead>
                                        <tr>
                                            <th>Rule</th>
                                            <th>Support</th>
                                            <th>Confidence</th>
                                            <th>Support x Cofidence</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        $no=1;
                                        foreach ($data['asso_item2_berhasil'] as $key ) {?>
                                          <?php 
                                            foreach ($produk as $keys) {
                                                    if($keys['id_produk'] == $key['id_produk_1']){
                                                        $nama1 = $keys['nama'];
                                                    }
                                                }
                                                foreach ($produk as $keys) {
                                                    if($keys['id_produk'] == $key['id_produk_2']){
                                                        $nama2 = $keys['nama'];
                                                    }
                                                }
                                            ?>
                                         <tr>
                                                <td>Jika membeli <b><?php echo $nama1; ?></b> maka membeli <b><?php echo $nama2; ?></b></td>
                                                <td><?php echo $key['support']; ?></td>
                                                <td><?php echo $key['cofidence']; ?></td>
                                                <td><?php echo $key['total']; ?></td>
                                        </tr>
                                        <?php
                                        } 
                                        ?>
                                    </tbody>
                                </table>
                            </div>
                            
                        </div>
                    </div>
                    <div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <h6 class="m-0 font-weight-bold text-primary">Hasil</h6>
                        </div>
                        <div class="card-body">
                            <h5>Aturan Asosiasi</h5>
                           
                             <?php 
                                foreach ($produk as $keys) {
                                        if($keys['id_produk'] == $assoMax[0]['id_produk_1']){
                                            $nama1 = $keys['nama'];
                                        }
                                    }
                                    foreach ($produk as $keys) {
                                        if($keys['id_produk'] == $assoMax[0]['id_produk_2']){
                                            $nama2 = $keys['nama'];
                                        }
                                    }
                                ?>
                                 <h6>diambil dari support x confidence yang besar maka : </h6> <h4 class="text-danger">Jika membeli produk <b><?php echo $nama1; ?></b> maka membeli produk <b><?php echo $nama2; ?></b></h4>
                            
                        </div>
                    </div>
                    <?php } ?>
                    <!-- item set 4 -->
                     <?php if (isset($data['item4_lolos'])) { ?>
                     <div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <h6 class="m-0 font-weight-bold text-primary">Itemset 4</h6>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered display" width="100%" cellspacing="0">
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>Produk 1</th>
                                            <th>Produk 2</th>
                                            <th>Produk 3</th>
                                            <th>Produk 4</th>
                                            <th>Transaksi</th>
                                            <th>Support</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        $no=1;
                                        foreach ($data['item4'] as $key ) {?>
                                         <tr>
                                            <td><?php echo $no++; ?></td>
                                           <?php 
                                            foreach ($produk as $keys) {
                                                    if($keys['id_produk'] == $key['id_produk_1']){
                                                    ?>
                                                        <td><?php echo $keys['nama']; ?></td>
                                                    <?php
                                                    }
                                                }
                                                foreach ($produk as $keys) {
                                                    if($keys['id_produk'] == $key['id_produk_2']){
                                                    ?>
                                                        <td><?php echo $keys['nama']; ?></td>
                                                    <?php
                                                    }
                                                }
                                                foreach ($produk as $keys) {
                                                    if($keys['id_produk'] == $key['id_produk_3']){
                                                    ?>
                                                        <td><?php echo $keys['nama']; ?></td>
                                                    <?php
                                                    }
                                                }
                                                foreach ($produk as $keys) {
                                                    if($keys['id_produk'] == $key['id_produk_4']){
                                                    ?>
                                                        <td><?php echo $keys['nama']; ?></td>
                                                    <?php
                                                    }
                                                }
                                            ?>
                                                <td><?php echo $key['total']; ?></td>
                                                <td><?php echo $key['jumlah']; ?></td>
                                        </tr>
                                        <?php
                                        } 
                                        ?>
                                    </tbody>
                                </table>
                            </div>
                            <h5 class="text-success"><b>Itemset 4 Lolos</b></h5>
                            <div class="table-responsive">
                                <table class="table table-bordered display"  width="100%" cellspacing="0">
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>Produk 1</th>
                                            <th>Produk 2</th>
                                            <th>Produk 3</th>
                                            <th>Produk 4</th>
                                            <th>Transaksi</th>
                                            <th>Support</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        $no=1;
                                        foreach ($data['item4_lolos'] as $key ) {?>
                                        <tr>
                                            <td><?php echo $no++; ?></td>
                                        <?php 
                                            foreach ($produk as $keys) {
                                                    if($keys['id_produk'] == $key['id_produk_1']){
                                                    ?>
                                                        <td><?php echo $keys['nama']; ?></td>
                                                    <?php
                                                    }
                                                }
                                                foreach ($produk as $keys) {
                                                    if($keys['id_produk'] == $key['id_produk_2']){
                                                    ?>
                                                        <td><?php echo $keys['nama']; ?></td>
                                                    <?php
                                                    }
                                                }
                                                foreach ($produk as $keys) {
                                                    if($keys['id_produk'] == $key['id_produk_3']){
                                                    ?>
                                                        <td><?php echo $keys['nama']; ?></td>
                                                    <?php
                                                    }
                                                }
                                                foreach ($produk as $keys) {
                                                    if($keys['id_produk'] == $key['id_produk_4']){
                                                    ?>
                                                        <td><?php echo $keys['nama']; ?></td>
                                                    <?php
                                                    }
                                                }
                                            ?>
                                                <td><?php echo $key['total']; ?></td>
                                                <td><?php echo $key['jumlah']; ?></td>
                                        </tr>
                                        <?php
                                        } 
                                        ?>
                                    </tbody>
                                </table>
                            </div>
                            <br>
                            <?php if(count($data['item4_lolos']) == 1){
                            ?>
                            <div class="alert alert-danger" role="alert">
                                Itemset 4 minimal 2 data yang lolos. Maka itemset 4 tidak termasuk.
                            </div>
                            <?php    
                            }else if(count($data['item4_lolos']) == 0){
                            ?>
                            <div class="alert alert-danger" role="alert">
                                Itemset 4 kurang dari nilai support. Maka itemset 4 tidak termasuk.
                            </div>
                            <?php
                            } ?>
                            <span class="badge rounded-pill text-bg-danger"></span>

                        </div>
                    </div>
                    <?php } ?>
                     <!-- item set 5 -->
                    <?php if (isset($data['item5_lolos'])) { ?>
                     <div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <h6 class="m-0 font-weight-bold text-primary">Itemset 5</h6>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered display" width="100%" cellspacing="0">
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>Produk 1</th>
                                            <th>Produk 2</th>
                                            <th>Produk 3</th>
                                            <th>Produk 4</th>
                                            <th>Produk 5</th>
                                            <th>Transaksi</th>
                                            <th>Support</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        $no=1;
                                        foreach ($data['item5'] as $key ) {?>
                                         <tr>
                                            <td><?php echo $no++; ?></td>
                                           <?php 
                                            foreach ($produk as $keys) {
                                                    if($keys['id_produk'] == $key['id_produk_1']){
                                                    ?>
                                                        <td><?php echo $keys['nama']; ?></td>
                                                    <?php
                                                    }
                                                }
                                                foreach ($produk as $keys) {
                                                    if($keys['id_produk'] == $key['id_produk_2']){
                                                    ?>
                                                        <td><?php echo $keys['nama']; ?></td>
                                                    <?php
                                                    }
                                                }
                                                foreach ($produk as $keys) {
                                                    if($keys['id_produk'] == $key['id_produk_3']){
                                                    ?>
                                                        <td><?php echo $keys['nama']; ?></td>
                                                    <?php
                                                    }
                                                }
                                                foreach ($produk as $keys) {
                                                    if($keys['id_produk'] == $key['id_produk_4']){
                                                    ?>
                                                        <td><?php echo $keys['nama']; ?></td>
                                                    <?php
                                                    }
                                                }
                                                 foreach ($produk as $keys) {
                                                    if($keys['id_produk'] == $key['id_produk_5']){
                                                    ?>
                                                        <td><?php echo $keys['nama']; ?></td>
                                                    <?php
                                                    }
                                                }
                                            ?>
                                                <td><?php echo $key['total']; ?></td>
                                                <td><?php echo $key['jumlah']; ?></td>
                                        </tr>
                                        <?php
                                        } 
                                        ?>
                                    </tbody>
                                </table>
                            </div>
                            <h5 class="text-success"><b>Itemset 5 Lolos</b></h5>
                            <div class="table-responsive">
                                <table class="table table-bordered display"  width="100%" cellspacing="0">
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>Produk 1</th>
                                            <th>Produk 2</th>
                                            <th>Produk 3</th>
                                            <th>Produk 4</th>
                                            <th>Produk 5</th>
                                            <th>Transaksi</th>
                                            <th>Support</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        $no=1;
                                        foreach ($data['item5_lolos'] as $key ) {?>
                                        <tr>
                                            <td><?php echo $no++; ?></td>
                                        <?php 
                                            foreach ($produk as $keys) {
                                                    if($keys['id_produk'] == $key['id_produk_1']){
                                                    ?>
                                                        <td><?php echo $keys['nama']; ?></td>
                                                    <?php
                                                    }
                                                }
                                                foreach ($produk as $keys) {
                                                    if($keys['id_produk'] == $key['id_produk_2']){
                                                    ?>
                                                        <td><?php echo $keys['nama']; ?></td>
                                                    <?php
                                                    }
                                                }
                                                foreach ($produk as $keys) {
                                                    if($keys['id_produk'] == $key['id_produk_3']){
                                                    ?>
                                                        <td><?php echo $keys['nama']; ?></td>
                                                    <?php
                                                    }
                                                }
                                                foreach ($produk as $keys) {
                                                    if($keys['id_produk'] == $key['id_produk_4']){
                                                    ?>
                                                        <td><?php echo $keys['nama']; ?></td>
                                                    <?php
                                                    }
                                                }
                                                foreach ($produk as $keys) {
                                                    if($keys['id_produk'] == $key['id_produk_5']){
                                                    ?>
                                                        <td><?php echo $keys['nama']; ?></td>
                                                    <?php
                                                    }
                                                }
                                            ?>
                                                <td><?php echo $key['total']; ?></td>
                                                <td><?php echo $key['jumlah']; ?></td>
                                        </tr>
                                        <?php
                                        } 
                                        ?>
                                    </tbody>
                                </table>
                            </div>
                            <br>
                            <?php if(count($data['item5_lolos']) == 1){
                            ?>
                            <div class="alert alert-danger" role="alert">
                                Itemset 5 minimal 2 data yang lolos. Maka itemset 5 tidak termasuk.
                            </div>
                            <?php    
                            }else if(count($data['item5_lolos']) == 0){
                            ?>
                            <div class="alert alert-danger" role="alert">
                                Itemset 5 kurang dari nilai support. Maka itemset 5 tidak termasuk.
                            </div>
                            <?php
                            } ?>
                            <span class="badge rounded-pill text-bg-danger"></span>

                        </div>
                    </div>
                    <div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <h6 class="m-0 font-weight-bold text-primary">Pola Asosiasi</h6>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered display"  width="100%" cellspacing="0">
                                    <thead>
                                        <tr>
                                            <th>Rule</th>
                                            <th>A & B & C & D</th>
                                            <th>ABC & D</th>
                                            <th>Confidence</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        $no=1;
                                        foreach ($data['asso_item4'] as $key ) {?>
                                        <?php 
                                            foreach ($produk as $keys) {
                                                    if($keys['id_produk'] == $key['id_produk_1']){
                                                        $nama1 = $keys['nama'];
                                                    }
                                                }
                                                foreach ($produk as $keys) {
                                                    if($keys['id_produk'] == $key['id_produk_2']){
                                                        $nama2 = $keys['nama'];
                                                    }
                                                }
                                                foreach ($produk as $keys) {
                                                    if($keys['id_produk'] == $key['id_produk_3']){
                                                        $nama3 = $keys['nama'];
                                                    }
                                                }
                                                foreach ($produk as $keys) {
                                                    if($keys['id_produk'] == $key['id_produk_4']){
                                                        $nama4 = $keys['nama'];
                                                    }
                                                }
                                            ?>
                                                <tr>
                                                    <td>Jika membeli <b><?php echo $nama1.", ".$nama2.", ".$nama3; ?></b> maka membeli <b><?php echo $nama4; ?></b></td>
                                                    <td><?php echo $key['ABCD']; ?></td>
                                                    <td><?php echo $key['ABC']; ?></td>
                                                    <td><?php echo $key['cofidence']; ?></td>
                                                </tr>
                                        <?php
                                        } 
                                        ?>
                                    </tbody>
                                </table>
                            </div>
                            <br>
                            <h5 class="text-success"><b>Asosiasi Final</b></h5>
                            <div class="table-responsive">
                                <table class="table table-bordered display"  width="100%" cellspacing="0">
                                    <thead>
                                        <tr>
                                            <th>Rule</th>
                                            <th>Support</th>
                                            <th>Confidence</th>
                                            <th>Support x Cofidence</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        $no=1;
                                        foreach ($data['assoc_item4_final'] as $key ) {?>
                                        <?php 
                                            foreach ($produk as $keys) {
                                                    if($keys['id_produk'] == $key['id_produk_1']){
                                                        $nama1 = $keys['nama'];
                                                    }
                                                }
                                                foreach ($produk as $keys) {
                                                    if($keys['id_produk'] == $key['id_produk_2']){
                                                        $nama2 = $keys['nama'];
                                                    }
                                                }
                                                foreach ($produk as $keys) {
                                                    if($keys['id_produk'] == $key['id_produk_3']){
                                                        $nama3 = $keys['nama'];
                                                    }
                                                }
                                                foreach ($produk as $keys) {
                                                    if($keys['id_produk'] == $key['id_produk_4']){
                                                        $nama4 = $keys['nama'];
                                                    }
                                                }
                                            ?>
                                        <tr>
                                                <td>Jika membeli <b><?php echo $nama1.", ".$nama2.", ".$nama3; ?></b> maka membeli <b><?php echo $nama4; ?></b></td>
                                                <td><?php echo $key['support']; ?></td>
                                                <td><?php echo $key['cofidence']; ?></td>
                                                <td><?php echo ($key['support']*$key['cofidence']); ?></td>
                                        </tr>
                                        <?php
                                        }
                                        if(count($data['assoc_item4_final']) == 0){
                                            echo " <tr><td>Tidak ada yang lolos dari nilai confidence</td></tr>";
                                        } 
                                        ?>
                                    </tbody>
                                </table>
                            </div>
                            
                        </div>
                    </div>
                    <div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <h6 class="m-0 font-weight-bold text-primary">Hasil</h6>
                        </div>
                        <div class="card-body">
                            <h5>Aturan Asosiasi</h5>
                            <?php 
                            foreach ($data['hasil_assoc_itemset4'] as $key) {
                            
                                foreach ($produk as $keys) {
                                    if($keys['id_produk'] == $key['id_produk_1']){
                                        $nama1 = $keys['nama'];
                                    }
                                }
                                foreach ($produk as $keys) {
                                    if($keys['id_produk'] == $key['id_produk_2']){
                                        $nama2 = $keys['nama'];
                                    }
                                }
                                foreach ($produk as $keys) {
                                    if($keys['id_produk'] == $key['id_produk_3']){
                                        $nama3 = $keys['nama'];
                                    }
                                }
                                foreach ($produk as $keys) {
                                    if($keys['id_produk'] == $key['id_produk_4']){
                                        $nama4 = $keys['nama'];
                                    }
                                }
                                ?>
                                <h6>diambil dari support x confidence yang besar maka : </h6> <h4 class="text-danger">Jika membeli produk <b><?php echo $nama1.", ".$nama2.", ".$nama3; ?></b> maka membeli produk <b><?php echo $nama4; ?></b></h4>
                            <?php }
                             if(count($data['assoc_item4_final']) == 0){
                                echo " <tr><td>Tidak ada yang lolos dari nilai confidence</td></tr>";
                            } 
                            ?>

                        </div>
                    </div>
                    <?php }  ?>
                    

</div>

<?php $this->endSection(); ?>