<?php

namespace App\Models;

use CodeIgniter\Model;

class ItemsetSatuModel extends Model
{
    protected $table = 'itemset1';
    protected $primaryKey = 'id';
    // protected $useAutoIncrement = false;
    protected $allowedFields = ['id_produk', 'jumlah','support', 'lolos'];

}