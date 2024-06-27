<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\AdminModel;

class KelolaUser extends BaseController
{
    public function index()
    {
        $AdminModel = new AdminModel();
        $data['patients'] = $AdminModel->findAll();
        return view('kelolauser', $data);
    }
    public function edit($id)
    {
        // Ambil data admin berdasarkan ID
        $AdminModel = new AdminModel();
        $data['username'] = $AdminModel->find($id);
        return view('edit_kelolauser', $data);
    }
    public function update($id)
{
    $AdminModel = new AdminModel();

    // Validasi input
    $validation = \Config\Services::validation();
    $validation->setRules([
        'nama' => 'required',
        'no_telp' => 'required|numeric'
    ]);

    if (!$validation->withRequest($this->request)->run()) {
        return redirect()->to('/edit/' . $id)->withInput()->with('errors', $validation->getErrors());
    }

    // Get data from form (corrected)
    $data = [
        'nama' => $this->request->getVar('nama'),
        'no_telp' => $this->request->getVar('no_telp')
    ];

    // Update data admin
    if ($AdminModel->update($id, $data)) {
        // Update successful - redirect with success message
        return redirect()->to('/kelolauser')->with('success', 'Data admin berhasil diperbarui.');
    } else {
        // Update failed - redirect with error message (optional)
        return redirect()->to('/edit/' . $id)->withInput()->with('errors', ['update' => 'Update data admin gagal']);
    }
}

    public function delete($id)
    {
        // Inisialisasi model
        $AdminModel = new AdminModel();

        // Hapus data 
        if ($AdminModel->delete($id)) {
            return redirect()->to('/kelolauser')->with('success', 'Data user berhasil dihapus.');
        } else {
            return redirect()->to('/kelolauser')->with('error', 'Data user gagal dihapus.');
        }
    }
}