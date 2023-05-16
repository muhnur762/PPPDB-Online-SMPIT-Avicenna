<?php

namespace App\Models;

use CodeIgniter\Model;

class AyahModel extends Model
{
    protected $table = 'tb_form_ayah';
    protected $useTimestamps = 'true';
    protected $allowedFields = ['id_daftar', 'nm_ay', 'nik_ay', 'tmplhr_ay', 'tgllhr_ay', 'agama_ay', 'wrg_ay', 'pend_ay', 'peker_ay', 'alamat_ay', 'tlprmh_ay', 'hp_ay', 'tlpkntr_ay', 'ket_ay', 'status'];
}
