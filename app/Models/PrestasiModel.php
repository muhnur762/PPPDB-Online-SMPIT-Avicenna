<?php

namespace App\Models;

use CodeIgniter\Model;

class PrestasiModel extends Model
{
    protected $table = 'tb_form_lomba';
    protected $useTimestamps = 'true';
    protected $allowedFields = ['id_daftar', 'jns_lmak', 'pny_lmak', 'ting_lmak', 'jra_lmak', 'serti_lmak', 'jns_lmnak', 'pny_lmnak', 'ting_lmnak', 'jra_lmnak', 'serti_lmnak', 'status'];
}
