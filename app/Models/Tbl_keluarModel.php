<?php

namespace App\Models;

use CodeIgniter\Model;

class Tbl_keluarModel extends Model
{


    public $table = 'tbl_keluar';
    public $allowedFields = ['no','id', 'nama', 'tanggal_keluar', 'jam_keluar'];

    public function getPatientOutById($id)
    {
        return $this->find($id);
    }

    public function updatePatientOut($id, $data)
    {
        return $this->update($id, $data);
    }


}
