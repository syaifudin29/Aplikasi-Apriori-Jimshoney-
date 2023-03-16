<?php

namespace App\Models;

use CodeIgniter\Model;

class ProdukModel extends Model
{
    protected $table = 'produk';
    protected $primaryKey = 'id_produk';
    // protected $useAutoIncrement = false;
    protected $allowedFields = ['id_produk', 'nama','jenis','berat', 'harga','is_delete'];

}