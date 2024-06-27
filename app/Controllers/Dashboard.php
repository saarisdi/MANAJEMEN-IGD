<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\Tbl_kasurModel;

class Dashboard extends BaseController
{
    public function index()
    {
        // Instance model
        $Tbl_kasurModel = new Tbl_kasurModel();

        // Mengambil data dari tabel tbl_kasur
        $data['jumlah_kasur'] = $Tbl_kasurModel->findAll();

        // Menampilkan halaman dashboard dengan data jumlah kasur
        return view('dashboard', $data);
    }
}
