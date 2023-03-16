<?php

namespace App\Models;

use CodeIgniter\Model;

class HasilModel extends Model
{
    protected $table = 'hasil';
    protected $primaryKey = 'id';
    // protected $useAutoIncrement = false;
    protected $allowedFields = ['id', 'tanggal_awal', 'tanggal_akhir','confidence','support'];
}