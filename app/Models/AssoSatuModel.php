<?php

namespace App\Models;

use CodeIgniter\Model;

class AssoSatuModel extends Model
{
    protected $table = 'asso2';
    protected $primaryKey = 'id';
    // protected $useAutoIncrement = false;
    protected $allowedFields = ['id_produk_1', 'id_produk_2', 'jumlah'];

}