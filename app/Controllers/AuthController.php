<?php

namespace App\Controllers;

use App\Models\AdminModel;
use CodeIgniter\Controller;

class AuthController extends Controller
{
    public function index()
    {
        return view('login');
    }

    public function login()
    {
        $session = session();
        $model = new AdminModel();
        $username = $this->request->getVar('username');
        $password = $this->request->getVar('password');
        $data = $model->where('username', $username)->first();

        if ($data) {
            $pass = $data['password'];
            $authenticatePassword = password_verify($password, $pass);
            if ($authenticatePassword) {
                $ses_data = [
                    'id' => $data['id'],
                    'username' => $data['username'],
                    'nama' => $data['nama'],
                    'logged_in' => TRUE
                ];
                $session->set($ses_data);
                $session->setFlashdata('msg', 'Login berhasil.');
                return redirect()->to('/dashboard');
            } else {
                $session->setFlashdata('msg', 'Password salah.');
                return redirect()->to('/login');
            }
        } else {
            $session->setFlashdata('msg', 'Username tidak ditemukan.');
            return redirect()->to('/login');
        }
    }

    public function register()
    {
        return view('register');
    }

    public function store()
    {
        $model = new AdminModel();
        $data = [
            'username' => $this->request->getVar('username'),
            'nama' => $this->request->getVar('nama'),
            'password' => password_hash($this->request->getVar('password'), PASSWORD_DEFAULT),
            'no_telp' => $this->request->getVar('no_telp')
        ];

        if ($model->insert($data)) {
            session()->setFlashdata('msg', 'Registrasi berhasil.');
            session()->setFlashdata('msg_type', 'success');
        } else {
            session()->setFlashdata('msg', 'Registrasi gagal.');
            session()->setFlashdata('msg_type', 'danger');
        }

        return redirect()->to('/login');
    }

    public function dashboard()
    {
        $session = session();
        if (!$session->get('logged_in')) {
            return redirect()->to('/login');
        }
        return view('dashboard');
    }

    public function logout()
    {
        $session = session();
        $session->destroy();
        return redirect()->to('/login');
    }
}
