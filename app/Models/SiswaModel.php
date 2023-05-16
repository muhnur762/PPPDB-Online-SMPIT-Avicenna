<?php

namespace App\Models;

use CodeIgniter\Model;

class SiswaModel extends Model
{
    protected $table = 'tb_form_siswa';
    protected $useTimestamps = 'true';
    protected $allowedFields = ['id_daftar', 'nama', 'nik', 'nisn', 'kewarganegaraan', 'jk', 'tmp_lahir', 'tgl_lahir', 'no_akte', 'agama', 'status_siswa', 'status'];
}
