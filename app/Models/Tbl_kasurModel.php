<?php

namespace App\Models;

use CodeIgniter\Model;

class Tbl_kasurModel extends Model
{
    protected $table = 'tbl_kasur';
    protected $allowedFields = ['no', 'id', 'type_kasur', 'jumlah_kasur'];
}
