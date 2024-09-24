<?php

namespace App\Models;

use CodeIgniter\Model;

class  LaporanModel extends Model
{
    protected $table = 'laporan_driver'; // Nama tabel di database
    protected $primaryKey = 'id'; // Nama kolom primary key
    protected $allowedFields = ['id_driver', 'tanggal', 'id_kendaraan','tujuan', 'foto', 'jarak_tempuh']; // Daftar kolom yang diizinkan untuk diisi

    // Tambahkan metode lain jika diperlukan

    
    public function deletes($id)
    {
        return $this->where('id', $id)->delete();
    }
    
    public function edits($id,$data)
    { 
        $db = db_connect();
        $db->table('laporan_driver')
        ->where('id', $id)
        ->update($data);
        print_r($id);
        //return;
    }
    public function hapusDataTua()
    {
        // Calculate the date 30 days ago
        $thirtyDaysAgo = date('Y-m-d', strtotime('-30 days'));

        // Delete records older than 30 days
        return $this->where('tanggal <', $thirtyDaysAgo)->delete();
    }
}
