<?php

namespace App\Models;

use CodeIgniter\Model;

class Daftarkendaraanmodel extends Model
{
    protected $table = 'daftar_kendaraan'; // Nama tabel di database
    protected $primaryKey = 'id'; // Nama kolom primary key
    protected $allowedFields = ['jenis_kendaraan', 'nama_kendaraan', 'bp_kendaraan','foto_kendaraan', 'status']; // Daftar kolom yang diizinkan untuk diisi

    // Tambahkan metode lain jika diperlukan

    
    public function deletes($id)
    {
        return $this->where('id', $id)->delete();
    }
    
    public function edits($id,$data)
    { 
        $db = db_connect();
        $db->table('daftar_kendaraan')
        ->where('id', $id)
        ->update($data);
        print_r($id);
        //return;
    }
}
