<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\Tbl_keluarModel;

class PasienKeluar extends BaseController
{
    public function index()
    {
        // Instance model
        $tbl_keluarModel = new Tbl_keluarModel();

        // Mengambil data dari tabel tbl_keluar
        $data['patientin'] = $tbl_keluarModel->findAll();

        // Menampilkan halaman data pasien dengan data pasien
        return view('pasienkeluar', $data);
    }

    public function edit($id)
    {
        // Ambil data pasien berdasarkan ID
        $tbl_keluarModel = new Tbl_keluarModel();
        $data['patientin'] = $tbl_keluarModel->find($id);
    
        // Tampilkan halaman edit dengan data pasien
        return view('edit_pasienkeluar', $data);
    }
    public function update($id)
    {
        $tbl_keluarModel = new Tbl_keluarModel();

        // Validasi input jika diperlukan
        $validation = \Config\Services::validation();
        $validation->setRules([
            'nama' => 'required',
            'tanggal_keluar' => 'required|valid_date',
            'jam_keluar' => 'required|regex_match[/^(?:2[0-3]|[01][0-9]):[0-5][0-9]:[0-5][0-9]$/]',
        ]);

        if (!$validation->withRequest($this->request)->run()) {
            return redirect()->to('/edit_pasienkeluar/' . $id)->withInput()->with('errors', $validation->getErrors());
        }

        // Ambil data dari form
        $data = [
            'nama' => $this->request->getPost('nama'),
            'tanggal_keluar' => $this->request->getPost('tanggal_keluar'),
            'jam_keluar' => $this->request->getPost('jam_keluar')
        ];

        // Update data pasien
        $tbl_keluarModel->update($id, $data);

        // Redirect ke halaman data pasien
        return redirect()->to('/pasienkeluar')->with('success', 'Data pasien keluar berhasil diperbarui.');
    }

    public function delete($id)
    {
        // Inisialisasi model
        $tbl_keluarModel = new Tbl_keluarModel();

        // Hapus data pasien berdasarkan ID
        if ($tbl_keluarModel->delete($id)) {
            // Redirect ke halaman data pasien dengan pesan sukses
            return redirect()->to('/pasienkeluar')->with('success', 'Data pasien keluar berhasil dihapus.');
        } else {
            // Redirect ke halaman data pasien dengan pesan error
            return redirect()->to('/pasienkeluar')->with('error', 'Data pasien keluar gagal dihapus.');
        }
    }

    public function create()
    {
        // Tampilkan form tambah pasien
        return view('tambah_pasienkeluar');
    }

    public function store()
    {
        // Validasi input
        $validation = \Config\Services::validation();
        $validation->setRules([
            'id' => 'required',
            'nama' => 'required',
            'tanggal_keluar' => 'required|valid_date',
            'jam_keluar' => 'required|regex_match[/^(?:2[0-3]|[01][0-9]):[0-5][0-9]:[0-5][0-9]$/]'
        ]);

        if (!$validation->withRequest($this->request)->run()) {
            // Jika validasi gagal, tampilkan pesan kesalahan dan redirect kembali ke halaman tambah
            return redirect()->to('/tambah_pasienkeluar')->withInput()->with('errors', $validation->getErrors());
        }

        // Inisialisasi model
        $tbl_keluarModel = new Tbl_keluarModel();

        // Simpan data pasien
        $tbl_keluarModel->insert([
            'id' => $this->request->getPost('id'),
            'nama' => $this->request->getPost('nama'),
            'tanggal_keluar' => $this->request->getPost('tanggal_keluar'),
            'jam_keluar' => $this->request->getPost('jam_keluar')
        ]);

        // Redirect pengguna kembali ke halaman data pasien dengan pesan sukses
        return redirect()->to('/pasienkeluar')->with('success', 'Data pasien keluar berhasil ditambahkan.');
    }
}