<?php

namespace App\Models;

use CodeIgniter\Model;

class ItemsetTigaModel extends Model
{
    protected $table = 'itemset3';
    protected $primaryKey = 'id';
    // protected $useAutoIncrement = false;
    protected $allowedFields = ['id_produk_1','id_produk_2', 'id_produk_3', 'jumlah','support'];

}