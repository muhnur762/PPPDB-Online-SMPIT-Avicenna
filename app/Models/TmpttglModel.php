<?php

namespace App\Models;

use CodeIgniter\Model;

class TmpttglModel extends Model
{
    protected $table = 'tb_form_tmpttgl';
    protected $useTimestamps = 'true';
    protected $allowedFields = ['id_daftar', 'sesuai_kk', 'daerah', 'jl', 'desa_kel', 'kecamatan', 'rt', 'rw', 'no_rmh', 'kab_kota', 'kd_pos', 'jrk', 'tigl_bersama', 'transportasi', 'status'];
}
