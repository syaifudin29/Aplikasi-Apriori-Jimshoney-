<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>SPK APRIORI</title>
<!--     <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous"> -->
    <!-- Styles -->
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" />
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" />
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/select2-bootstrap-5-theme@1.3.0/dist/select2-bootstrap-5-theme.min.css" />
	<!-- Or for RTL support -->
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/select2-bootstrap-5-theme@1.3.0/dist/select2-bootstrap-5-theme.rtl.min.css" />


  </head>
  <body>
   <div style="margin-top: 50px;">
   	<form method="post" action="/transaksi/produk/proses">
   		<input type="hidden" name="id_penjualan" value="<?php echo $id_penjualan; ?>">
   	 <div class="card border-left-primary shadow h-100 py-2" style="width: 30rem; margin: 0 auto;">
		  <div class="card-header text-white" style="background-color: #4e73df;">
	    Tambah Produk ke transaksi
	  </div>	
	  <div class="card-body">
	    <div class="mb-3">
		  <label for="exampleFormControlInput1" class="form-label">Nama Produk</label>
		  <select style="width: 100%"; id="select-field" name="id_produk" required>
		  	<?php foreach ($produk as $key): ?>
		  		<option value="<?php echo $key['id_produk']; ?>"><?php echo $key['nama']; ?></option>
		  	<?php endforeach ?>
			</select>
		</div>
		<div class="mb-3">
		  <label for="exampleFormControlInput2" class="form-label">Jumlah</label>
		  <input type="number" class="form-control" id="exampleFormControlInput2" name="jumlah" placeholder="0" required>
		</div>
		  <div class="mb-3">
		  	<input type="submit" class="btn text-white" style="background-color: #4e73df;" value="SIMPAN">
		  </div>
	  </div>
	</div>
	</form>
   </div>

<!-- 
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script> -->
    <!-- Scripts -->
	<script src="https://cdn.jsdelivr.net/npm/jquery@3.5.0/dist/jquery.slim.min.js"></script>
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
	<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
	<script type="text/javascript">
		$( '#select-field' ).select2( {
		    theme: 'bootstrap-5'
		} );
	</script>
  </body>
</html>