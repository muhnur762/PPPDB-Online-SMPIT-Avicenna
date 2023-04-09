<?php

namespace App\Models;

use CodeIgniter\Model;

class sambutModel extends Model
{
    protected $table = 'sambutan';
    protected $useTimestamps = 'true';
    // protected $allowedFields = ['judul', 'slug', 'penulis', 'isi', 'kategori', 'cover'];

    public function sambutan()
    {
        return $this->first();
    }
}
