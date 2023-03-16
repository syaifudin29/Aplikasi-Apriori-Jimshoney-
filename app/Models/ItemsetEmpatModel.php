<?php

namespace App\Models;

use CodeIgniter\Model;

class ItemsetEmpatModel extends Model
{
    protected $table = 'itemset4';
    protected $primaryKey = 'id';
    // protected $useAutoIncrement = false;
    protected $allowedFields = ['id_produk_1','id_produk_2', 'id_produk_3', 'id_produk_4','jumlah','support'];

}