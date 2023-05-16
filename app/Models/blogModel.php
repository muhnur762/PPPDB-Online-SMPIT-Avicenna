<?php

namespace App\Models;

use CodeIgniter\Model;

class BlogModel extends Model
{
    protected $table = 'blog';
    protected $useTimestamps = 'true';
    protected $allowedFields = ['judul', 'slug', 'penulis', 'isi', 'kategori', 'cover', 'file'];

    public function blogLimit()
    {
        return $this->orderBy('created_at', 'DESC')->paginate(3);
    }
    public function pengumumanLimit()
    {
        return $this->where('kategori', 'Pengumuman')->orderBy('created_at', 'DESC')->paginate(3);
    }
    public function search($keyword)
    {
        return $this->table('blog')->like('judul', $keyword);
    }
}
