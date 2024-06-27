<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\Tbl_masukModel;

class PasienMasuk extends BaseController
{
    public function index()
    {
        // Instance model
        $tbl_masukModel = new Tbl_masukModel();

        // Mengambil data dari tabel tbl_masuk
        $data['patientin'] = $tbl_masukModel->findAll();

        // Menampilkan halaman data pasien dengan data pasien
        return view('pasienmasuk', $data);
    }

    public function edit($id)
    {
        // Ambil data pasien berdasarkan ID
        $tbl_masukModel = new Tbl_masukModel();
        $data['patientin'] = $tbl_masukModel->find($id);
    
        // Tampilkan halaman edit dengan data pasien
        return view('edit_pasienmasuk', $data);
    }
    public function update($id)
    {
        $tbl_masukModel = new Tbl_masukModel();

        // Validasi input jika diperlukan
        $validation = \Config\Services::validation();
        $validation->setRules([
            'nama' => 'required',
            'tanggal_masuk' => 'required|valid_date',
            'jam_masuk' => 'required|regex_match[/^(?:2[0-3]|[01][0-9]):[0-5][0-9]:[0-5][0-9]$/]',
        ]);

        if (!$validation->withRequest($this->request)->run()) {
            return redirect()->to('/edit_pasienmasuk/' . $id)->withInput()->with('errors', $validation->getErrors());
        }

        // Ambil data dari form
        $data = [
            'nama' => $this->request->getPost('nama'),
            'tanggal_masuk' => $this->request->getPost('tanggal_masuk'),
            'jam_masuk' => $this->request->getPost('jam_masuk')
        ];

        // Update data pasien
        $tbl_masukModel->update($id, $data);

        // Redirect ke halaman data pasien
        return redirect()->to('/pasienmasuk')->with('success', 'Data pasien masuk berhasil diperbarui.');
    }

    public function delete($id)
    {
        // Inisialisasi model
        $tbl_masukModel = new Tbl_masukModel();

        // Hapus data pasien berdasarkan ID
        if ($tbl_masukModel->delete($id)) {
            // Redirect ke halaman data pasien dengan pesan sukses
            return redirect()->to('/pasienmasuk')->with('success', 'Data pasien masuk berhasil dihapus.');
        } else {
            // Redirect ke halaman data pasien dengan pesan error
            return redirect()->to('/pasienmasuk')->with('error', 'Data pasien masuk gagal dihapus.');
        }
    }

    public function create()
    {
        // Tampilkan form tambah pasien
        return view('tambah_pasienmasuk');
    }

    public function store()
    {
        // Validasi input
        $validation = \Config\Services::validation();
        $validation->setRules([
            'id' => 'required',
            'nama' => 'required',
            'tanggal_masuk' => 'required|valid_date',
            'jam_masuk' => 'required|regex_match[/^(?:2[0-3]|[01][0-9]):[0-5][0-9]:[0-5][0-9]$/]'
        ]);

        if (!$validation->withRequest($this->request)->run()) {
            // Jika validasi gagal, tampilkan pesan kesalahan dan redirect kembali ke halaman tambah
            return redirect()->to('/tambah_pasienmasuk')->withInput()->with('errors', $validation->getErrors());
        }

        // Inisialisasi model
        $tbl_masukModel = new Tbl_masukModel();

        // Simpan data pasien
        $tbl_masukModel->insert([
            'id' => $this->request->getPost('id'),
            'nama' => $this->request->getPost('nama'),
            'tanggal_masuk' => $this->request->getPost('tanggal_masuk'),
            'jam_masuk' => $this->request->getPost('jam_masuk')
        ]);

        // Redirect pengguna kembali ke halaman data pasien dengan pesan sukses
        return redirect()->to('/pasienmasuk')->with('success', 'Data pasien masuk berhasil ditambahkan.');
    }
}