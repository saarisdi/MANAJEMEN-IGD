<?php

namespace App\Models;

use CodeIgniter\Model;

class Tbl_masukModel extends Model
{


    public $table = 'tbl_masuk';
    public $allowedFields = ['no','id', 'nama', 'tanggal_masuk', 'jam_masuk'];

    public function getPatientInById($id)
    {
        return $this->find($id);
    }

    public function updatePatientIn($id, $data)
    {
        return $this->update($id, $data);
    }


}
