<?php

namespace App\Models;

use CodeIgniter\Model;

class AdminModel extends Model
{
    protected $table = 'tbl_admin';
    protected $allowedFields = ['id', 'username', 'nama', 'password', 'no_telp'];

    public function getPatientById($id)
    {
        return $this->find($id);
    }

    public function updatePatient($id, $data)
    {
        return $this->update($id, $data);
    }
}
