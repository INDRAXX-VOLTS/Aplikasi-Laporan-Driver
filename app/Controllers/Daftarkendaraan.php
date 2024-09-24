<?php

namespace App\Controllers;

use App\Models\Daftarkendaraanmodel;

class Daftarkendaraan extends BaseController
{
    public function daftar_kendaraan()
    {
        $model = new Daftarkendaraanmodel();
        $session = session();
        $data['username'] = $session->get('username');
        $data['id'] = $session->get('id');
        $data['role'] = $session->get('role');
        $data['daftar_kendaraan'] = $model->findAll();  
        return view('daftar_kendaraan', $data);
    }

    public function tambah_daftar()
    {
        return view('tambah_daftar_kendaraan');
    }

    public function add_kendaraan()
    {
        // Ambil data yang dikirim dari form
        $jenis_kendaraan = $this->request->getPost('jenis_kendaraan');
        $nama_kendaraan = $this->request->getPost('nama_kendaraan');
        $bp_kendaraan = $this->request->getPost('bp_kendaraan');
        $status = $this->request->getPost('status');
        $uploadedFiles = $this->request->getFiles();
        $foto_kendaraan = "";
        
        foreach ($uploadedFiles['foto_kendaraan'] as $image) {
            if ($image->isValid() && !$image->hasMoved()) {
                $newName = $image->getRandomName();
                $image->move(ROOTPATH. '/public/uploads', $newName);
                $foto_kendaraan.=$newName.",";
            }
        }
        $foto_kendaraan=substr($foto_kendaraan, 0, -1);

        // Validasi data jika diperlukan
        // Misalnya, Anda dapat menggunakan validasi yang disediakan oleh CodeIgniter

        // Simpan data ke dalam database menggunakan model
        $daftarKendaraanModel = new DaftarKendaraanModel();
        $data = [
            'jenis_kendaraan' => $jenis_kendaraan,
            'nama_kendaraan' => $nama_kendaraan,
            'bp_kendaraan' => $bp_kendaraan,
            'status' => $status,
            'foto_kendaraan' => $foto_kendaraan
        ];
        $daftarKendaraanModel->insert($data);

        // Redirect ke halaman lain setelah berhasil menyimpan data
        return redirect()->to(site_url('daftarkendaraan/daftar_kendaraan'));
    }

    public function edit_kendaraan()
    {
        // Ambil data yang dikirim dari form
        $jenis_kendaraan = $this->request->getPost('jenis_kendaraan');
        $nama_kendaraan = $this->request->getPost('nama_kendaraan');
        $bp_kendaraan = $this->request->getPost('bp_kendaraan');
        $status = $this->request->getPost('status');
        $uploadedFiles = $this->request->getFiles();
        $id = $this->request->getPost('del');
        
        

        // Validasi data jika diperlukan
        // Misalnya, Anda dapat menggunakan validasi yang disediakan oleh CodeIgniter

        // Simpan data ke dalam database menggunakan model
        $daftarKendaraanModel = new DaftarKendaraanModel();
        $data = [
            'jenis_kendaraan' => $jenis_kendaraan,
            'nama_kendaraan' => $nama_kendaraan,
            'bp_kendaraan' => $bp_kendaraan,
            'status' => $status,
        ];
        $daftarKendaraanModel->edits($id,$data);

        // Redirect ke halaman lain setelah berhasil menyimpan data
        return redirect()->to(site_url('daftarkendaraan/daftar_kendaraan'));
    }

    
    public function delete_kendaraan()
    {
        $daftarKendaraanModel = new DaftarKendaraanModel();
        $daftarKendaraanModel->deletes($this->request->getPost('del'));
        return redirect()->to(site_url('daftarkendaraan/daftar_kendaraan'));

        // Redirect atau tampilkan pesan sukses, dll.
    }
}
