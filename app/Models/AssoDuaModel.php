<?php

namespace App\Models;

use CodeIgniter\Model;

class AssoDuaModel extends Model
{
    protected $table = 'hasil_asso2';
    protected $primaryKey = 'id';
    // protected $useAutoIncrement = false;
    protected $allowedFields = ['id_produk_1', 'id_produk_2','cofidence', 'total'];

}