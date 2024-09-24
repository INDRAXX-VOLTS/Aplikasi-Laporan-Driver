<?php

namespace App\Controllers;

use App\Models\Drivermodel;

class Driver extends BaseController
{
    
    public function driver()
    {
        $model = new Drivermodel();
        $session = session();
        $data['username'] = $session->get('username');
        $data['id'] = $session->get('id');
        $data['role'] = $session->get('role');
        $data['drivers'] = $model->findAll();  
        return view('driver', $data);
    }

    public function add_driver()
    {
        // Ambil data yang dikirim dari form
        $id_driver = $this->request->getPost('id_driver');
        $username = $this->request->getPost('username');
        $password = $this->request->getPost('password'); 

        // Validasi data jika diperlukan
        // Misalnya, Anda dapat menggunakan validasi yang disediakan oleh CodeIgniter

        // Simpan data ke dalam database menggunakan model
        $driver = new Drivermodel();
        $data = [
            'id_driver' => $id_driver,
            'username' => $username,
            'password' => $password
        ];
        $driver->insert($data);

        // Redirect ke halaman lain setelah berhasil menyimpan data
        return redirect()->to(site_url('driver/driver'));
    }

    public function edit_driver()
    {
        // Ambil data yang dikirim dari form
        $id_driver = $this->request->getPost('id_driver');
        $id = $this->request->getPost('del');
        $username = $this->request->getPost('username');
        $password = $this->request->getPost('password');

        // Validasi data jika diperlukan
        // Misalnya, Anda dapat menggunakan validasi yang disediakan oleh CodeIgniter

        // Simpan data ke dalam database menggunakan model
        $driver = new Drivermodel();
        $data = [
            'id_driver' => $id_driver,
            'username' => $username,
            'password' => $password
        ];
        $driver->edits($id,$data);

        // Redirect ke halaman lain setelah berhasil menyimpan data
        return redirect()->to(site_url('driver/driver'));
    }

    
    public function delete_driver()
    {
        $driver = new Drivermodel();
        $driver->deletes($this->request->getPost('del'));
        return redirect()->to(site_url('driver/driver'));

        // Redirect atau tampilkan pesan sukses, dll.
    }
}