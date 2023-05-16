<?php

namespace App\Models;

use CodeIgniter\Model;

class BannerModel extends Model
{
    protected $table = 'banner';
    protected $useTimestamps = 'true';
    protected $allowedFields = ['image', 'author'];
}
