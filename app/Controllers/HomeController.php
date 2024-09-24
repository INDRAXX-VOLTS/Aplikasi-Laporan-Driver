<?php

namespace App\Controllers;
use App\Models\LaporanModel;
use App\Models\Daftarkendaraanmodel;
use App\Models\Drivermodel;

use App\Controllers\BaseController;
class HomeController extends BaseController
{
    public function index()
    {
        // You can customize the logic for your home page here
        $model1 = new Drivermodel();
        $model2 = new Drivermodel();
        $model3 = new Drivermodel();
        $session = session();
        $data['username'] = $session->get('username');
        $data['laporan'] = $model1->findAll();
        $data['daftar'] = $model2->findAll();
        $data['driver'] = $model3->findAll();
        $data['id'] = $session->get('id');
        $data['role'] = $session->get('role');
        return view('home',$data);
    }
}
