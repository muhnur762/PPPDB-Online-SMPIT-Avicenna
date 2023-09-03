<?php

namespace App\Models;

use CodeIgniter\Model;

class FileModel extends Model
{
    protected $table = 'tb_form_file';
    protected $useTimestamps = 'true';
    protected $allowedFields = ['id_daftar', 'foto_file', 'kk_file', 'akte_file', 'nisn_file', 'serti1_file', 'serti2_file',  'status'];
}
