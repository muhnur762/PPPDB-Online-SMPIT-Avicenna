<?php

namespace App\Models;

use CodeIgniter\Model;

class PendaftaranModel extends Model
{
    protected $table = 'pendaftaran';
    protected $useTimestamps = 'true';
    protected $allowedFields = ['user_id', 'status', 'verifikasi', 'keterangan', 'verifikator', 'tgl_verifikasi'];

    public function dataDaftar()
    {
        return $this->select('pendaftaran.id id_daftar, users.fullname nama, pendaftaran.status,pendaftaran.created_at tgl_daftar,tb_form_siswa.nama nama_siswa')->join('users', 'users.id=pendaftaran.user_id')->join('tb_form_siswa', 'tb_form_siswa.id_daftar=pendaftaran.id')->where('pendaftaran.status !=', '0')->findAll();
    }
    public function dataPeng()
    {
        return $this->select('pendaftaran.id id_daftar, users.fullname nama, pendaftaran.keterangan,pendaftaran.created_at tgl_daftar,tb_form_siswa.nama nama_siswa')->join('users', 'users.id=pendaftaran.user_id')->join('tb_form_siswa', 'tb_form_siswa.id_daftar=pendaftaran.id')->where('pendaftaran.status', '2')->findAll();
    }
    public function dataverifikator($id)
    {
        return $this->select('pendaftaran.id, pendaftaran.status,pendaftaran.tgl_verifikasi,users.fullname')->join('users', 'users.id=pendaftaran.verifikator')->where(['pendaftaran.id' => $id])->first();
    }
    public function detaildaftar($id)
    {
        return $this->join('tb_form_siswa', 'tb_form_siswa.id_daftar=pendaftaran.id')
            ->join('tb_form_saudara', 'tb_form_saudara.id_daftar=pendaftaran.id')
            ->join('tb_form_jamsos', 'tb_form_jamsos.id_daftar=pendaftaran.id')
            ->join('tb_form_tmpttgl', 'tb_form_tmpttgl.id_daftar=pendaftaran.id')
            ->join('tb_form_kesehatan', 'tb_form_kesehatan.id_daftar=pendaftaran.id')
            ->join('tb_form_aslskl', 'tb_form_aslskl.id_daftar=pendaftaran.id')
            ->join('tb_form_ayah', 'tb_form_ayah.id_daftar=pendaftaran.id')
            ->join('tb_form_ibu', 'tb_form_ibu.id_daftar=pendaftaran.id')
            ->join('tb_form_wali', 'tb_form_wali.id_daftar=pendaftaran.id')
            ->join('tb_form_lomba', 'tb_form_lomba.id_daftar=pendaftaran.id')
            ->join('tb_form_file', 'tb_form_file.id_daftar=pendaftaran.id')
            ->where(['pendaftaran.id' => $id])
            ->first();
    }
    public function ketlolos($user_id)
    {
        return $this->select('pendaftaran.user_id,tb_form_siswa.id_daftar, pendaftaran.keterangan,pendaftaran.status,pendaftaran.created_at, tb_form_siswa.nama, tb_form_siswa.tmp_lahir, tb_form_siswa.tgl_lahir,tb_form_aslskl.nama_skl ')
            ->join('tb_form_siswa', 'tb_form_siswa.id_daftar=pendaftaran.id')
            ->join('tb_form_aslskl', 'tb_form_aslskl.id_daftar=pendaftaran.id')
            ->where('pendaftaran.user_id', $user_id)
            ->first();
    }
}
