<?php

namespace App\Models;

use CodeIgniter\Model;

class PenjualanModel extends Model
{
    protected $table = 'penjualan';
    protected $primaryKey = 'id';
    // protected $useAutoIncrement = false;
    protected $allowedFields = ['id', 'id_penjualan', 'id_produk','jumlah','tanggal', 'status'];

}