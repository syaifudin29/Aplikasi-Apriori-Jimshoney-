<?php

namespace App\Models;

use CodeIgniter\Model;

class AnalisaModel extends Model
{
    protected $table = 'analisa';
    protected $primaryKey = 'id';
    // protected $useAutoIncrement = false;
    protected $allowedFields = ['id', 'kelompok', 'id_produk','jumlah','itemset'];

}