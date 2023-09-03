<?php

namespace App\Models;

use CodeIgniter\Model;

class PengumumanModel extends Model
{
    protected $table = 'pengumuman';
    protected $useTimestamps = 'true';
    protected $allowedFields = ['tanggal', 'status'];
}
