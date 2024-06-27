<?php

namespace App\Models;

use CodeIgniter\Model;

class Tbl_pasienModel extends Model
{
    public $table = 'tbl_pasien';
    public $allowedFields = ['no','id', 'nama', 'umur', 'alamat', 'ket_masuk', 'ket_kesehatan'];

    public function getPatientById($id)
    {
        return $this->find($id);
    }

    public function updatePatient($id, $data)
    {
        return $this->update($id, $data);
    }
}
