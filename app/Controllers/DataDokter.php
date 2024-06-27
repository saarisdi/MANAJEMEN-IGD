<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\Tbl_dokterModel;

class DataDokter extends BaseController
{
    public function index()
    {
        // Instance model
        $tbl_dokterModel = new Tbl_dokterModel();

        // Mengambil data dari tabel 
        $data['doctors'] = $tbl_dokterModel->findAll();

        
        return view('datadokter', $data);
    }

    public function edit($id)
    {
        
        $tbl_dokterModel = new Tbl_dokterModel();
        $data['doctor'] = $tbl_dokterModel->find($id);
    
        
        return view('edit_datadokter', $data);
    }
    public function update($id)
    {
        $tbl_dokterModel = new Tbl_dokterModel();

        // Validasi input
        $validation = \Config\Services::validation();
        $validation->setRules([
            'nama' => 'required',
            'keterangan' => 'required',
            'jadwal' => 'required',
        ]);

        if (!$validation->withRequest($this->request)->run()) {
            return redirect()->to('/edit_datadokter/' . $id)->withInput()->with('errors', $validation->getErrors());
        }

        // Ambil data dari form
        $data = [
            'nama' => $this->request->getPost('nama'),
            'keterangan' => $this->request->getPost('keterangan'),
            'jadwal' => $this->request->getPost('jadwal'),
        ];

        // Update data 
        $tbl_dokterModel->update($id, $data);

       
        return redirect()->to('/datadokter')->with('success', 'Data dokter berhasil diperbarui.');
    }

    public function delete($id)
    {
        // Inisialisasi model
        $tbl_dokterModel = new Tbl_dokterModel();

        // Hapus data  berdasarkan ID
        if ($tbl_dokterModel->delete($id)) {
            return redirect()->to('/datadokter')->with('success', 'Data dokter berhasil dihapus.');
        } else {
            return redirect()->to('/datadokter')->with('error', 'Data dokter gagal dihapus.');
        }
    }

    public function create()
    {
        // Tampilkan form tambah 
        return view('tambah_datadokter');
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
            return redirect()->to('/tambah_datadokter')->withInput()->with('errors', $validation->getErrors());
        }

        $tbl_dokterModel = new Tbl_dokterModel();

        $tbl_dokterModel->insert([
            'id' => $this->request->getPost('id'),
            'nama' => $this->request->getPost('nama'),
            'keterangan' => $this->request->getPost('keterangan'),
            'jadwal' => $this->request->getPost('jadwal'),
        ]);

        return redirect()->to('/datadokter')->with('success', 'Data dokter berhasil ditambahkan.');
    }
}