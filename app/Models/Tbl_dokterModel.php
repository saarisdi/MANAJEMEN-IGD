<?php

namespace App\Models;

use CodeIgniter\Model;

class Tbl_dokterModel extends Model
{
    public $table = 'tbl_dokter';
    public $allowedFields = ['no','id', 'nama', 'keterangan', 'jadwal'];


}
