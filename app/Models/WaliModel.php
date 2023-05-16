<?php

namespace App\Models;

use CodeIgniter\Model;

class WaliModel extends Model
{
    protected $table = 'tb_form_wali';
    protected $useTimestamps = 'true';
    protected $allowedFields = ['id_daftar', 'nm_wl', 'nik_wl', 'tmplhr_wl', 'tgllhr_wl', 'agama_wl', 'wrg_wl', 'pend_wl', 'peker_wl', 'alamat_wl', 'tlprmh_wl', 'hp_wl', 'tlpkntr_wl', 'ket_wl', 'status'];
}
