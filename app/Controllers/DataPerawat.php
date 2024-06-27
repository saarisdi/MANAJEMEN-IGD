<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\Tbl_perawatModel;

class DataPerawat extends BaseController
{
    public function index()
    {
        $tbl_pasienModel = new Tbl_perawatModel();
        $data['nurse'] = $tbl_pasienModel->findAll();
        return view('dataperawat', $data);
    }

    public function edit($id)
    {
        $tbl_perawatModel = new Tbl_perawatModel();
        $data['nurses'] = $tbl_perawatModel->find($id);
        return view('edit_dataperawat', $data);
    }
    public function update($id)
    {
        $tbl_perawatModel = new Tbl_perawatModel();

        // Validasi input
        $validation = \Config\Services::validation();
        $validation->setRules([
            'nama' => 'required',
            'keterangan' => 'required',
            'jadwal' => 'required',
        ]);

        if (!$validation->withRequest($this->request)->run()) {
            return redirect()->to('/edit_dataperawat/' . $id)->withInput()->with('errors', $validation->getErrors());
        }

        // Ambil data dari form
        $data = [
            'nama' => $this->request->getPost('nama'),
            'keterangan' => $this->request->getPost('keterangan'),
            'jadwal' => $this->request->getPost('jadwal'),
        ];

        // Update data 
        $tbl_perawatModel->update($id, $data);

        // Redirect ke halaman data 
        return redirect()->to('/dataperawat')->with('success', 'Data perawat berhasil diperbarui.');
    }

    public function delete($id)
    {
        // Inisialisasi model
        $tbl_perawatModel = new Tbl_perawatModel();

        // Hapus data berdasarkan ID
        if ($tbl_perawatModel->delete($id)) {
            return redirect()->to('/dataperawat')->with('success', 'Data perawat berhasil dihapus.');
        } else {
            return redirect()->to('/dataperawat')->with('error', 'Data perawat gagal dihapus.');
        }
    }

    public function create()
    {
        // Tampilkan form tambah 
        return view('tambah_dataperawat');
    }

    public function store()
    {
        // Validasi input
        $validation = \Config\Services::validation();
        $validation->setRules([
            'id' => 'required',
            'nama' => 'required',
            'keterangan' => 'required',
            'jadwal' => 'required',
        ]);

        if (!$validation->withRequest($this->request)->run()) {
            return redirect()->to('/tambah_dataperawat')->withInput()->with('errors', $validation->getErrors());
        }
        $tbl_perawatModel = new Tbl_perawatModel();
        // Simpan data 
        $tbl_perawatModel->insert([
            'id' => $this->request->getPost('id'),
            'nama' => $this->request->getPost('nama'),
            'keterangan' => $this->request->getPost('keterangan'),
            'jadwal' => $this->request->getPost('jadwal'),
        ]);
        return redirect()->to('/dataperawat')->with('success', 'Data perawat berhasil ditambahkan.');
    }
}
