<?php

namespace App\Models;

use CodeIgniter\Model;

class SaudaraModel extends Model
{
    protected $table = 'tb_form_saudara';
    protected $useTimestamps = 'true';
    protected $allowedFields = ['id_daftar', 'ank_ke', 'jml_sdr_kdg', 'jml_sdr_akt', 'jml_sdr_tri', 'nm_sdr_avc_1', 'skl_sdr_avc_1', 'nm_sdr_avc_2', 'skl_sdr_avc_2', 'status'];
}
