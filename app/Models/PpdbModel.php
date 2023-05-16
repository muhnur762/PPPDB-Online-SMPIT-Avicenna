<?php

namespace App\Models;

use CodeIgniter\Model;

class PpdbModel extends Model
{
    protected $table = 'informasi_ppdb';
    protected $useTimestamps = 'true';
    protected $allowedFields = ['judul', 'isi'];
}
