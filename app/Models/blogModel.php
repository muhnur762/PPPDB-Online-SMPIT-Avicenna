<?php

namespace App\Models;

use CodeIgniter\Model;

class blogModel extends Model
{
    protected $table = 'blog';
    protected $useTimestamps = 'true';
    protected $allowedFields = ['judul', 'slug', 'penulis', 'isi', 'kategori', 'cover'];

    public function blogLimit()
    {
        return $this->orderBy('created_at', 'DESC')->paginate(3);
    }
    public function pengumumanLimit()
    {
        return $this->where('kategori', 'Pengumuman')->orderBy('created_at', 'DESC')->paginate(3);
    }
}
