<?php

namespace App\Models;

use CodeIgniter\Model;

class IbuModel extends Model
{
    protected $table = 'tb_form_ibu';
    protected $useTimestamps = 'true';
    protected $allowedFields = ['id_daftar', 'nm_ib', 'nik_ib', 'tmplhr_ib', 'tgllhr_ib', 'agama_ib', 'wrg_ib', 'pend_ib', 'peker_ib', 'alamat_ib', 'tlprmh_ib', 'hp_ib', 'tlpkntr_ib', 'ket_ib', 'status'];
}
