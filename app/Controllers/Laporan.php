<?php

namespace App\Controllers;

use App\Models\LaporanModel;
use App\Models\Daftarkendaraanmodel;

class Laporan extends BaseController
{
    public function laporan()
    {
        $model = new LaporanModel();
        $model->hapusDataTua();
        $models = new Daftarkendaraanmodel();
        $session = session();
        $data['id'] = $session->get('id');
        $data['role'] = $session->get('role');
        $data['username'] = $session->get('username');
        $data['laporans'] = $model->select("*,laporan_driver.id as lap")->join('daftar_kendaraan', 'daftar_kendaraan.id = laporan_driver.id_kendaraan')->join('driver', 'driver.id = laporan_driver.id_driver')->findAll();  
        $data['kendaraan'] = $models->where('status', "Tidak Dipakai")->findAll();  
        return view('laporan', $data);
    }

    public function add_laporan()
    {
        // Ambil data yang dikirim dari form
        $session = session();
        $id_driver = $session->get('id');
        $tanggal = $this->request->getPost('tanggal');
        $id_kendaraan = $this->request->getPost('id_kendaraan');
        $jarak_tempuh = $this->request->getPost('jarak_tempuh');
        $jumlah = $this->request->getPost('jumlah');
        $foto = "";
        $tujuan = "";
        for($i=0;$i<$jumlah;$i++){
            $tujuan .= " ".$this->request->getPost('tujuan'.($i)).",";
            $gambar = $this->request->getFile('foto'.($i));
            $uniqueId = uniqid();
        
            // Extract the file extension from the uploaded file
            $fileExtension = $gambar->getClientExtension();
            // Generate a random string for the file name
            $randomString = bin2hex(random_bytes(8)); // Generate 16 characters (8 bytes) of random data
        
            // Combine the unique identifier and random string to create a unique file name
            $newName = $uniqueId . '_' . $randomString. '.' . $fileExtension;
            $gambar->move(ROOTPATH. '/public/uploads', $newName);
            $foto.=$newName.",";
        }
        $tujuan=substr($tujuan, 0, -1);
        //echo $foto; return;
        $foto=substr($foto, 0, -1);

        // Validasi data jika diperlukan
        // Misalnya, Anda dapat menggunakan validasi yang disediakan oleh CodeIgniter

        // Simpan data ke dalam database menggunakan model
        $LaporanModel = new LaporanModel();
        $data = [
            'id_driver' => $id_driver,
            'tanggal' => $tanggal,
            'id_kendaraan' => $id_kendaraan,
            'jarak_tempuh' => $jarak_tempuh,
            'tujuan' => $tujuan,
            'foto' => $foto
        ];
        $LaporanModel->insert($data);

        // Redirect ke halaman lain setelah berhasil menyimpan data
        return redirect()->to(site_url('laporan/laporan'));
    }

    public function edit_laporan()
    {
        // Ambil data yang dikirim dari form
        $session = session();
        $id_driver = $session->get('id');
        $tanggal = $this->request->getPost('tanggal');
        $tujuan = $this->request->getPost('tujuan');
        $id_kendaraan = $this->request->getPost('id_kendaraan');
        $jarak_tempuh = $this->request->getPost('jarak_tempuh');
        $id = $this->request->getPost('del');
        $jumlah = $this->request->getPost('jumlah');
        $foto = "";
        $tujuan = "";
        
        $LaporanModel = new LaporanModel();
        $data = [
            'tanggal' => $tanggal,
            'id_kendaraan' => $id_kendaraan,
            'jarak_tempuh' => $jarak_tempuh,
        ];
        $LaporanModel->edits($id,$data);

        // Redirect ke halaman lain setelah berhasil menyimpan data
        return redirect()->to(site_url('laporan/laporan'));
    }

    
    public function delete_laporan()
    {
        $LaporanModel = new LaporanModel();
        $LaporanModel->deletes($this->request->getPost('del'));
        return redirect()->to(site_url('laporan/laporan'));

        // Redirect atau tampilkan pesan sukses, dll.
    }
}
