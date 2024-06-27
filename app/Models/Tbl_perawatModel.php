<?php

namespace App\Models;

use CodeIgniter\Model;

class Tbl_perawatModel extends Model
{
    public $table = 'tbl_perawat';
    public $allowedFields = ['no','id', 'nama', 'keterangan', 'jadwal'];

    public function getNurseById($id)
    {
        return $this->find($id);
    }

    public function updateNurse($id, $data)
    {
        return $this->update($id, $data);
    }
}
