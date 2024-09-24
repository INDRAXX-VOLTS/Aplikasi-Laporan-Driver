<?php

namespace App\Controllers;

use App\Models\LoginModel;
use App\Models\LoginDriverModel;
use App\Controllers\BaseController;

class Login extends BaseController
{
    public function index()
    {
        $data = [
            'validation' => \Config\Services::validation()
        ];
        return view('login', $data);
    }

    public function login_action()
{
    $rules = [
        'username' => 'required',
        'password' => 'required',
    ];

    if (!$this->validate($rules)) {
        $data['validation'] = $this->validator;
        return view('login', $data);
    } else {
        $session = session();
        $loginModel = new LoginModel();

        $username = $this->request->getVar('username');
        $password = $this->request->getVar('password');
        $cekusername = $loginModel->where('username', $username)->first();

        if($cekusername) {
            $password_db = $cekusername['password'];
            $cek_password = password_verify($password, $password_db);
            $session->set('id', $cekusername['id']);
            $session->set('role', 1);
            $session->set('username', $cekusername['username']);
            if($cek_password){
                // Login berhasil, arahkan ke halaman layout
                return redirect()->to('home');
            } else {
                return redirect()->to('home');
                //$session->setFlashdata('pesan','Password salah, silahkan coba lagi');
                //return redirect('/');
            } 
        } else {
            $loginModel = new LoginDriverModel();

            $username = $this->request->getVar('username');
            $password = $this->request->getVar('password');
            $cekusername = $loginModel->where('username', $username)->first();

            if($cekusername) {
                $password_db = $cekusername['password'];
                $cek_password = password_verify($password, $password_db);
                $session->set('id', $cekusername['id']);
                $session->set('username', $cekusername['username']);
                $session->set('role', 2);
                
                if($cek_password){
                    // Login berhasil, arahkan ke halaman layout
                    return redirect()->to('home');
                } else {
                    return redirect()->to('home');
                    //$session->setFlashdata('pesan','Password salah, silahkan coba lagi');
                    //return redirect('/');
                } 
            } else {
                $session->setFlashdata('pesan','Username salah, silahkan coba lagi');
                return redirect('/');
            }
        }
    }
  }
  public function logout()
    {
        // Lakukan logika logout di sini, misalnya membersihkan sesi atau melakukan tindakan logout lainnya
        $session = session();
        $session->destroy(); // Menghapus semua data sesi

        // Setelah logout, arahkan pengguna kembali ke halaman login
        return redirect()->to('/');
    }
}
