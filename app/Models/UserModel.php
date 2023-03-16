<?php

namespace App\Models;

use CodeIgniter\Model;

class UserModel extends Model
{
    protected $table = 'user';
    protected $primaryKey = 'id_user';
    // protected $useAutoIncrement = false;
    protected $allowedFields = ['id_user', 'nama','username', 'password'];

}