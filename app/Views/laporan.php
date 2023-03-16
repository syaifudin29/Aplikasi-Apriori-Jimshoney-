<?= $this->extend('template');
    $this->section('content');
?>

<div class="container-fluid">
<!-- Page Heading -->
    <h1 class="h3 mb-2 text-gray-800">Laporan</h1>
    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Tabel Laporan</h6>

        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>Awal</th>
                            <th>Akhir</th>
                            <th>Support</th>
                            <th>Confidence</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tfoot>
                        <tr>
                            <th>Awal</th>
                            <th>Akhir</th>
                            <th>Support</th>
                            <th>Confidence</th>
                            <th>Aksi</th>
                        </tr>
                    </tfoot>
                    <tbody>
                        <?php foreach ($hasil as $key): ?>
                            
                        
                        <tr>
                            <td><?php echo $key['tanggal_awal']; ?></td>
                            <td><?php echo $key['tanggal_akhir']; ?></td>
                             <td><?php echo $key['support']; ?></td>
                            <td><?php echo $key['confidence']; ?></td>
                            <td>
                                <a href="/laporan/view/<?php echo $key['id']; ?>" class="btn btn-warning"><i class="fas fa-eye"></i></a>
                                <a href="/laporan/delete/<?php echo $key['id']; ?>" class="btn btn-danger btn-circle"><i class="fas fa-trash"></i></a>
                            </td>
                        </tr>
                        <?php endforeach ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
<?php $this->endSection(); ?>