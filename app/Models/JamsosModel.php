<?php

namespace App\Models;

use CodeIgniter\Model;

class JamsosModel extends Model
{
    protected $table = 'tb_form_jamsos';
    protected $useTimestamps = 'true';
    protected $allowedFields = ['id_daftar', 'kks', 'kps', 'kip', 'dtks', 'status', 'status'];
}
