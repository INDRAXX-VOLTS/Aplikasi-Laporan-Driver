<?php

namespace App\Models;

use CodeIgniter\Model;

class Drivermodel extends Model
{
    protected $table = 'driver'; // Nama tabel di database
    protected $primaryKey = 'id'; // Nama kolom primary key
    protected $allowedFields = ['id_driver', 'username', 'password']; // Daftar kolom yang diizinkan untuk diisi

    // Tambahkan metode lain jika diperlukan
    public function deletes($id)
    {
        return $this->where('id', $id)->delete();
    }
    
    public function edits($id,$data)
    { 
        $db = db_connect();
        $db->table('driver')
        ->where('id', $id)
        ->update($data);
        print_r($id);
        //return;
    }
}
