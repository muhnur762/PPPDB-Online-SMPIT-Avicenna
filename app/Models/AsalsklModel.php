<?php

namespace App\Models;

use CodeIgniter\Model;

class AsalsklModel extends Model
{
    protected $table = 'tb_form_aslskl';
    protected $useTimestamps = 'true';
    protected $allowedFields = ['id_daftar', 'nama_skl', 'st_sekolah', 'kecamatan_skl', 'kotkab_skl', 'prov_skl', 'status'];
}
