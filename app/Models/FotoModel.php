<?php

namespace App\Models;

use CodeIgniter\Model;

class FotoModel extends Model
{
    protected $table = 'foto';
    protected $useTimestamps = 'true';
    protected $allowedFields = ['cover', 'caption', 'penulis'];

    public function fotoLimit()
    {
        return $this->orderBy('created_at', 'DESC')->paginate(20, 'foto');
    }
    public function search($keyword)
    {
        return $this->table('foto')->like('caption', $keyword);
    }
}
