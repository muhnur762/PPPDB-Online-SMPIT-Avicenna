<?php

namespace App\Models;

use CodeIgniter\Model;

class PendaftaranModel extends Model
{
    protected $table = 'pendaftaran';
    protected $useTimestamps = 'true';
    protected $allowedFields = ['user_id', 'status', 'verifikasi', 'verfikator', 'tgl_verfikasi'];
}
