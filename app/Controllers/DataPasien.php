<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\Tbl_pasienModel;

class DataPasien extends BaseController
{
    public function index()
    {
        // Instance model
        $tbl_pasienModel = new Tbl_pasienModel();

        // Mengambil data dari tabel tbl_pasien
        $data['patients'] = $tbl_pasienModel->findAll();

        // Menampilkan halaman data pasien dengan data pasien
        return view('datapasien', $data);
    }

    public function edit($id)
    {
        // Ambil data pasien berdasarkan ID
        $tbl_pasienModel = new Tbl_pasienModel();
        $data['patient'] = $tbl_pasienModel->find($id);
    
        // Tampilkan halaman edit dengan data pasien
        return view('edit_datapasien', $data);
    }
    public function update($id)
    {
        $tbl_pasienModel = new Tbl_pasienModel();

        // Validasi input
        $validation = \Config\Services::validation();
        $validation->setRules([
            'nama' => 'required',
            'umur' => 'required|numeric',
            'alamat' => 'required',
            'ket_masuk' => 'required',
            'ket_kesehatan' => 'required'
        ]);

        if (!$validation->withRequest($this->request)->run()) {
            return redirect()->to('/edit_datapasien/' . $id)->withInput()->with('errors', $validation->getErrors());
        }

        // Ambil data dari form
        $data = [
            'nama' => $this->request->getPost('nama'),
            'umur' => $this->request->getPost('umur'),
            'alamat' => $this->request->getPost('alamat'),
            'ket_masuk' => $this->request->getPost('ket_masuk'),
            'ket_kesehatan' => $this->request->getPost('ket_kesehatan')
        ];

        // Update data pasien
        $tbl_pasienModel->update($id, $data);

        // Redirect ke halaman data pasien
        return redirect()->to('/datapasien')->with('success', 'Data pasien berhasil diperbarui.');
    }

    public function delete($id)
    {
        // Inisialisasi model
        $tbl_pasienModel = new Tbl_pasienModel();

        // Hapus data pasien berdasarkan ID
        if ($tbl_pasienModel->delete($id)) {
            // Redirect ke halaman data pasien dengan pesan sukses
            return redirect()->to('/datapasien')->with('success', 'Data pasien berhasil dihapus.');
        } else {
            // Redirect ke halaman data pasien dengan pesan error
            return redirect()->to('/datapasien')->with('error', 'Data pasien gagal dihapus.');
        }
    }

    public function create()
    {
        // Tampilkan form tambah pasien
        return view('tambah_datapasien');
    }

    public function store()
    {
        // Validasi input
        $validation = \Config\Services::validation();
        $validation->setRules([
            'id' => 'required',
            'nama' => 'required',
            'umur' => 'required|numeric',
            'alamat' => 'required',
            'ket_masuk' => 'required',
            'ket_kesehatan' => 'required'
        ]);

        if (!$validation->withRequest($this->request)->run()) {
            // Jika validasi gagal, tampilkan pesan kesalahan dan redirect kembali ke halaman tambah
            return redirect()->to('/tambah_datapasien')->withInput()->with('errors', $validation->getErrors());
        }

        // Inisialisasi model
        $tbl_pasienModel = new Tbl_pasienModel();

        // Simpan data pasien
        $tbl_pasienModel->insert([
            'id' => $this->request->getPost('id'),
            'nama' => $this->request->getPost('nama'),
            'umur' => $this->request->getPost('umur'),
            'alamat' => $this->request->getPost('alamat'),
            'ket_masuk' => $this->request->getPost('ket_masuk'),
            'ket_kesehatan' => $this->request->getPost('ket_kesehatan')
        ]);

        // Redirect pengguna kembali ke halaman data pasien dengan pesan sukses
        return redirect()->to('/datapasien')->with('success', 'Data pasien berhasil ditambahkan.');
    }
}
