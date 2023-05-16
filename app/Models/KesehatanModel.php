<?php

namespace App\Models;

use CodeIgniter\Model;

class KesehatanModel extends Model
{
    protected $table = 'tb_form_kesehatan';
    protected $useTimestamps = 'true';
    protected $allowedFields = ['id_daftar', 'gol_dar', 'th_penyakit_1', 'nm_penyakit_1', 'kt_penyakit_1', 'th_penyakit_2', 'nm_penyakit_2', 'kt_penyakit_2', 'kl_jasmani', 'kl_jasmani_lain', 'tb', 'bb', 'vaksin', 'covid', 'status'];
}
