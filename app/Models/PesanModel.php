<?php

namespace App\Models;

use CodeIgniter\Model;

class PesanModel extends Model
{
    protected $table = 'pesan';
    protected $useTimestamps = 'true';
    protected $allowedFields = ['nama', 'email', 'pesan', 'jawaban', 'status'];
}
