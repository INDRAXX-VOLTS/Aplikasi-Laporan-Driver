<?php

namespace App\Models;

use CodeIgniter\Model;

class LoginDriverModel extends Model
{
    protected $table            = 'driver';
    protected $primaryKey       = 'id';
    protected $allowedFields    = ['id_Driver','username','password'];

}
