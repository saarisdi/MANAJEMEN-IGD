<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\Tbl_kasurModel;

class DataKasur extends BaseController
{
    public function index()
    {
        // Instance model
        $tbl_kasurModel = new Tbl_kasurModel();

        // Mengambil data dari tabel tbl_kasur
        $data['bed'] = $tbl_kasurModel->findAll();

        // Menampilkan halaman data kasur dengan data kasur
        return view('datakasur', $data);
    }
    public function edit($id)
    {
        // Ambil data kasur berdasarkan ID
        $tbl_kasurModel = new Tbl_kasurModel();
        $data['bed'] = $tbl_kasurModel->find($id);
    
        // Tampilkan halaman edit dengan data kasur
        return view('edit_datakasur', $data);
    }
    public function update($id)
    {
        $tbl_kasurModel = new Tbl_kasurModel();

        // Validasi input
        $validation = \Config\Services::validation();
        $validation->setRules([
            'type_kasur' => 'required',
            'jumlah_kasur' => 'required|numeric'
        ]);

        if (!$validation->withRequest($this->request)->run()) {
            return redirect()->to('/edit/' . $id)->withInput()->with('errors', $validation->getErrors());
        }

        // Ambil data dari form
        $data = [
            'type_kasur' => $this->request->getPost('type_kasur'),
            'jumlah_kasur' => $this->request->getPost('jumlah_kasur')
        ];

        // Update data kasur
        $tbl_kasurModel->update($id, $data);

        // Redirect ke halaman data kasur
        return redirect()->to('/datakasur')->with('success', 'Data kasur berhasil diperbarui.');
    }

    public function delete($id)
    {
        // Inisialisasi model
        $tbl_kasurModel = new Tbl_kasurModel();

        // Hapus data kasur berdasarkan ID
        if ($tbl_kasurModel->delete($id)) {
            // Redirect ke halaman data kasur dengan pesan sukses
            return redirect()->to('/datakasur')->with('success', 'Data kasur berhasil dihapus.');
        } else {
            // Redirect ke halaman data kasur dengan pesan error
            return redirect()->to('/datakasur')->with('error', 'Data kasur gagal dihapus.');
        }
    }

    public function create()
    {
        // Tampilkan form tambah kasur
        return view('tambah_datakasur');
    }

    public function store()
    {
        // Validasi input
        $validation = \Config\Services::validation();
        $validation->setRules([
            'id' => 'required',
            'type_kasur' => 'required',
            'jumlah_kasur' => 'required|numeric'
        ]);

        if (!$validation->withRequest($this->request)->run()) {
            // Jika validasi gagal, tampilkan pesan kesalahan dan redirect kembali ke halaman tambah
            return redirect()->to('/tambah')->withInput()->with('errors', $validation->getErrors());
        }

        // Inisialisasi model
        $tbl_kasurModel = new Tbl_kasurModel();

        // Simpan data kasur
        $tbl_kasurModel->insert([
            'id' => $this->request->getPost('id'),
            'type_kasur' => $this->request->getPost('type_kasur'),
            'jumlah_kasur' => $this->request->getPost('jumlah_kasur')
        ]);

        // Redirect pengguna kembali ke halaman data kasur dengan pesan sukses
        return redirect()->to('/datakasur')->with('success', 'Data kasur berhasil ditambahkan.');
    }
}