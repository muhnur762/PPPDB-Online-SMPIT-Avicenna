<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\AsalsklModel;
use App\Models\JamsosModel;
use App\Models\KesehatanModel;
use App\Models\PendaftaranModel;
use App\Models\SaudaraModel;
use App\Models\SiswaModel;
use App\Models\TmpttglModel;
use App\Models\UsersModel;
use Myth\Auth\Models\UserModel;
use Myth\Auth\Password;

class User extends BaseController
{
    protected $UsersModel, $SiswaModel, $PendaftaranModel, $SaudaraModel, $TmpttglModel, $JamsosModel, $kesehatanModel, $AsalsklModel;
    protected $helpers = ['form'];
    public function __construct()
    {
        $this->UsersModel = new UsersModel();
        $this->SiswaModel = new SiswaModel();
        $this->PendaftaranModel = new PendaftaranModel();
        $this->SaudaraModel = new SaudaraModel();
        $this->TmpttglModel = new TmpttglModel();
        $this->JamsosModel = new JamsosModel();
        $this->kesehatanModel = new KesehatanModel();
        $this->AsalsklModel = new AsalsklModel();
    }
    public function index()
    {
        $data = [
            'title' => 'User Home | SMPIT AVICENNA',
        ];
        return view('user/home_v', $data);
    }
    public function myProfile($username)
    {
        $decode = base64_decode($username);
        $data = $this->UsersModel->getProfile($decode);
        $admin = $data[0];
        $data = [
            'title' => 'My Profile | SMPIT AVICENNA',
            'admin' => $admin
        ];
        return view('user/myProfile_v', $data);
    }
    public function updateProfile($id_user)
    {
        // validasi input
        $dataLama = $this->UsersModel->where(['users.id' => $id_user])->first();
        if ($dataLama['email'] == $this->request->getVar('email')) {
            $rulesEmail = 'required';
        } else {
            $rulesEmail = 'required|is_unique[users.email]';
        }

        if ($dataLama['username'] == $this->request->getVar('username')) {
            $rulesUsername = 'required';
        } else {
            $rulesUsername = 'required|is_unique[users.username]';
        }
        if (!$this->validate([
            'email' => [
                'rules' => $rulesEmail,
                'errors' => [
                    'required' => 'Email cannot be empty !!',
                    'is_unique' => 'Email already registered !!'

                ]
            ],
            'fullname' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Name cannot be empty !!',
                ]
            ],
            'username' => [
                'rules' => $rulesUsername,
                'errors' => [
                    'required' => 'Username cannot be empty !!',
                    'is_unique' => 'Username already registered !!'
                ]
            ],

        ])) {
            return redirect()->back()->withInput();
        }
        $username =  $this->request->getVar('username');
        $userMyth = new UserModel();
        $userMyth->save([
            'id' => $this->request->getVar('id_user'),
            'email' => $this->request->getVar('email'),
            'username' => $username,
            'fullname' => $this->request->getVar('fullname'),
        ]);

        session()->setFlashdata('pesan', 'User successfully edited');
        return redirect()->to('user/myProfile/' . $username);
    }
    public function gantiPassword($id_user)
    {
        // validasi input



        if (!$this->validate([

            'oldpassword' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Password wajib diisi !!',

                ]
            ],
            'password' => [
                'rules' => 'required|alpha_numeric|is_unique[users.password_hash]strong_password|min_length[8]|max_length[24]',
                'errors' => [
                    'required' => 'Password wajib diisi !!',
                    'alpha_numeric' => 'Hanya berisi huruf dan angka !!',
                    'is_unique' => 'Password sudah digunakan !!',
                    'strong_password' => 'Password Lemah !!',
                    'min_length' => 'Minimal 8 karakter !!',
                    'max_length' => 'Maksimal 24 Karakter !!'

                ]
            ],
            'confirmpassword' => [
                'rules' => 'required|alpha_numeric|min_length[8]|max_length[24]|matches[password]',
                'errors' => [
                    'required' => 'Password wajib diisi !!',
                    'alpha_numeric' => 'hanya berisi huruf dan angka',
                    'min_length' => 'Minimal 8 karakter !!',
                    'max_length' => 'Maksimal 24 Karakter !!',
                    'matches' => 'Password Tidak cocok'
                ]
            ],

        ])) {
            return redirect()->back()->withInput();
        }

        $password = $this->request->getVar('password');
        $username = $this->request->getVar('username');


        // dd($password);
        $userMyth = new UserModel();
        $userMyth->save([
            'id' => $id_user,
            'password_hash' => Password::hash($password),

        ]);

        session()->setFlashdata('pesan2', 'Password successfully edited');
        return redirect()->to('user/myProfile/' . $username);
    }

    public function formulir($id)
    {

        $decode = base64_decode($id);
        $id_user = substr($decode, 5);
        $tb_daftar = $this->PendaftaranModel->where(['user_id' => $id_user])->first();
        $id_daftar = $tb_daftar['id'];
        $page = ($this->request->getVar('f')) ? $this->request->getVar('f') : '0';
        $data = [
            'title' => 'Formulir PPDB | SMPIT AVICENNA',
            'page' => $page,
            'user_hash' => $id,
            'tb_siswa' => $this->SiswaModel->where(['id_daftar' => $id_daftar])->first(),
            'tb_saudara' => $this->SaudaraModel->where(['id_daftar' => $id_daftar])->first(),
            'tb_tmpttgl' => $this->TmpttglModel->where(['id_daftar' => $id_daftar])->first(),
            'tb_jamsos' => $this->JamsosModel->where(['id_daftar' => $id_daftar])->first(),
            'tb_kesehatan' => $this->kesehatanModel->where(['id_daftar' => $id_daftar])->first(),
            'tb_asalskl' => $this->AsalsklModel->where(['id_daftar' => $id_daftar])->first(),
        ];
        return view('user/formulir_v', $data);
    }

    public function editSiswa($id)
    {
        if (!$this->validate([
            'nama' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Nama wajib diisi !!',

                ]
            ],
            'nik' => [
                'rules' => 'required|integer',
                'errors' => [
                    'required' => 'NIK wajib diisi !!',
                    'integer' => 'NIK hanya boleh berisi angka !!',
                ]
            ],

            'nisn' => [
                'rules' => 'required|integer',
                'errors' => [
                    'required' => 'NISN wajib diisi !!',
                    'integer' => 'NISN hanya boleh berisi angka !!',
                ]
            ],

            'kewarganegaraan' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Kewarganegaraan wajib diisi !!',
                ]
            ],

            'tgl_lahir' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Tanggal lahir wajib diisi !!',
                ]
            ],


            'tmp_lahir' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Tempat lahir wajib diisi !!',
                ]
            ],


            'no_akte' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'No Akte wajib diisi !!',
                ]
            ],


        ])) {
            $id_hash = base64_encode('ppdb-' . $this->request->getVar('id_daftar'));
            return redirect()->to('user/formulir/' . $id_hash . '?f=1')->withInput();
        }
        $this->SiswaModel->save([
            'id' => $id,
            'nama' => $this->request->getVar('nama'),
            'nik' => $this->request->getVar('nik'),
            'nisn' => $this->request->getVar('nisn'),
            'kewarganegaraan' => $this->request->getVar('kewarganegaraan'),
            'agama' => $this->request->getVar('agama'),
            'jk' => $this->request->getVar('jk'),
            'tmp_lahir' => $this->request->getVar('tmp_lahir'),
            'tgl_lahir' => $this->request->getVar('tgl_lahir'),
            'no_akte' => $this->request->getVar('no_akte'),
            'status_siswa' => $this->request->getVar('status_siswa'),
            'status' => '1',
        ]);
        $id_hash = base64_encode('ppdb-' . $this->request->getVar('id_daftar'));
        session()->setFlashdata('pesan1', 'Data berhasil disimpan !');
        return redirect()->to('user/formulir/' . $id_hash . '?f=1');
    }
    public function editSaudara($id)
    {
        if (!$this->validate([
            'ank_ke' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Anak Ke- wajib diisi !!',

                ]
            ],
            'jml_sdr_kdg' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Jumlah saudara kandung wajib diisi !!',
                ]
            ],

            'jml_sdr_akt' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Jumlah saudara angkat wajib diisi !!',
                ]
            ],

            'jml_sdr_tri' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Jumlah saudara tiri wajib diisi !!',
                ]
            ],


        ])) {
            $id_hash = base64_encode('ppdb-' . $this->request->getVar('id_daftar'));
            return redirect()->to('user/formulir/' . $id_hash . '?f=2')->withInput();
        }
        $this->SaudaraModel->save([
            'id' => $id,
            'ank_ke' => $this->request->getVar('ank_ke'),
            'jml_sdr_kdg' => $this->request->getVar('jml_sdr_kdg'),
            'jml_sdr_akt' => $this->request->getVar('jml_sdr_akt'),
            'jml_sdr_tri' => $this->request->getVar('jml_sdr_tri'),
            'nm_sdr_avc_1' => $this->request->getVar('nm_sdr_avc_1'),
            'skl_sdr_avc_1' => $this->request->getVar('skl_sdr_avc_1'),
            'nm_sdr_avc_2' => $this->request->getVar('nm_sdr_avc_2'),
            'skl_sdr_avc_2' => $this->request->getVar('skl_sdr_avc_2'),
            'status' => '1',
        ]);
        $id_hash = base64_encode('ppdb-' . $this->request->getVar('id_daftar'));
        session()->setFlashdata('pesan2', 'Data berhasil disimpan !');
        return redirect()->to('user/formulir/' . $id_hash . '?f=2');
    }
    public function editTempattinggal($id)
    {
        if (!$this->validate([
            'daerah' => [
                'rules' => 'required',
                'errors' => [
                    'required' => ' Nama Daerah/Perumahan Wajib Diisi !!',
                ]
            ],
            'jl' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Nama Jalan Wajib Diisi !!',
                ]
            ],

            'desa_kel' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Nama Desa/Kelurahan Wajib Diisi !!',
                ]
            ],

            'kecamatan' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Nama Kecamatan Wajib Diisi !!',
                ]
            ],
            'rt' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'RT Wajib Diisi !!',
                ]
            ],
            'rw' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'RW Wajib Diisi !!',
                ]
            ],
            'no_rmh' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Nomor Rumah Wajib Diisi !!',
                ]
            ],
            'kab_kota' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Nama Kabupaten/Kota Wajib Diisi !!',
                ]
            ],
            'kd_pos' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Kode Pos Wajib Diisi !!',
                ]
            ],
            'jrk' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Jarak Wajib Diisi !!',
                ]
            ],
            'tigl_bersama' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Tinggal Bersama Wajib Diisi !!',
                ]
            ],
            'transportasi' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Transportasi Wajib Diisi !!',
                ]
            ],


        ])) {
            $id_hash = base64_encode('ppdb-' . $this->request->getVar('id_daftar'));
            return redirect()->to('user/formulir/' . $id_hash . '?f=3')->withInput();
        }
        $this->TmpttglModel->save([
            'id' => $id,
            'sesuai_kk' => $this->request->getVar('sesuai_kk'),
            'daerah' => $this->request->getVar('daerah'),
            'jl' => $this->request->getVar('jl'),
            'desa_kel' => $this->request->getVar('desa_kel'),
            'kecamatan' => $this->request->getVar('kecamatan'),
            'rt' => $this->request->getVar('rt'),
            'rw' => $this->request->getVar('rw'),
            'no_rmh' => $this->request->getVar('no_rmh'),
            'kab_kota' => $this->request->getVar('kab_kota'),
            'kd_pos' => $this->request->getVar('kd_pos'),
            'jrk' => $this->request->getVar('jrk'),
            'tigl_bersama' => $this->request->getVar('tigl_bersama'),
            'transportasi' => $this->request->getVar('transportasi'),
            'status' => '1',
        ]);
        $id_hash = base64_encode('ppdb-' . $this->request->getVar('id_daftar'));
        session()->setFlashdata('pesan3', 'Data berhasil disimpan !');
        return redirect()->to('user/formulir/' . $id_hash . '?f=3');
    }
    public function editJamsos($id)
    {
        // if (!$this->validate([
        //     'kks' => [
        //         'rules' => 'integer',
        //         'errors' => [
        //             'integer' => 'No KKS harus berisi anka !!',

        //         ]
        //     ],
        //     'kps' => [
        //         'rules' => 'integer',
        //         'errors' => [
        //             'integer' => 'No KPS harus berisi anka !!',

        //         ]
        //     ],
        //     'kip' => [
        //         'rules' => 'integer',
        //         'errors' => [
        //             'integer' => 'No KIP harus berisi anka !!',

        //         ]
        //     ],

        // ])) {
        //     return redirect()->back()->withInput();
        // }
        $this->JamsosModel->save([
            'id' => $id,
            'kks' => $this->request->getVar('kks'),
            'kps' => $this->request->getVar('kps'),
            'kip' => $this->request->getVar('kip'),
            'dtks' => $this->request->getVar('dtks'),
            'status' => '1',
        ]);
        $id_hash = base64_encode('ppdb-' . $this->request->getVar('id_daftar'));
        session()->setFlashdata('pesan4', 'Data berhasil disimpan !');
        return redirect()->to('user/formulir/' . $id_hash . '?f=4');
    }
    public function editKesehatan($id)
    {
        if (!$this->validate([
            'gol_dar' => [
                'rules' => 'required',
                'errors' => [
                    'required' => ' golongan darah Wajib Diisi !!',
                ]
            ],
            'tb' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Tinggi Badan  Wajib Diisi !!',
                ]
            ],

            'bb' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Berat Badan Wajib Diisi !!',
                ]
            ],

            'vaksin' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Vaksin Wajib Diisi !!',
                ]
            ],
            'covid' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Covid Wajib Diisi !!',
                ]
            ],


        ])) {
            $id_hash = base64_encode('ppdb-' . $this->request->getVar('id_daftar'));
            return redirect()->to('user/formulir/' . $id_hash . '?f=5')->withInput();
        }
        $this->kesehatanModel->save([
            'id' => $id,
            'gol_dar' => $this->request->getVar('gol_dar'),
            'th_penyakit_1' => $this->request->getVar('th_penyakit_1'),
            'nm_penyakit_1' => $this->request->getVar('nm_penyakit_1'),
            'kt_penyakit_1' => $this->request->getVar('kt_penyakit_1'),
            'th_penyakit_2' => $this->request->getVar('th_penyakit_2'),
            'nm_penyakit_2' => $this->request->getVar('nm_penyakit_2'),
            'kt_penyakit_2' => $this->request->getVar('kt_penyakit_2'),
            'kl_jasmani' => $this->request->getVar('kl_jasmani'),
            'kl_jasmani' => $this->request->getVar('kl_jasmani'),
            'tb' => $this->request->getVar('tb'),
            'bb' => $this->request->getVar('bb'),
            'vaksin' => $this->request->getVar('vaksin'),
            'covid' => $this->request->getVar('covid'),
            'status' => '1',
        ]);
        $id_hash = base64_encode('ppdb-' . $this->request->getVar('id_daftar'));
        session()->setFlashdata('pesan5', 'Data berhasil disimpan !');
        return redirect()->to('user/formulir/' . $id_hash . '?f=5');
    }
    public function editAsalskl($id)
    {
        if (!$this->validate([
            'nama_skl' => [
                'rules' => 'required',
                'errors' => [
                    'required' => ' Nama SD / MI Wajib Diisi !!',
                ]
            ],
            'st_sekolah' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Status Sekolah  Wajib Diisi !!',
                ]
            ],

            'kecamatan_skl' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Kecamatan Wajib Diisi !!',
                ]
            ],

            'kotkab_skl' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Kota / Kabupaten Wajib Diisi !!',
                ]
            ],
            'prov_skl' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Provinsi Wajib Diisi !!',
                ]
            ],


        ])) {
            $id_hash = base64_encode('ppdb-' . $this->request->getVar('id_daftar'));
            return redirect()->to('user/formulir/' . $id_hash . '?f=6')->withInput();
        }
        $this->AsalsklModel->save([
            'id' => $id,
            'nama_skl' => $this->request->getVar('nama_skl'),
            'st_sekolah' => $this->request->getVar('st_sekolah'),
            'kecamatan_skl' => $this->request->getVar('kecamatan_skl'),
            'kotkab_skl' => $this->request->getVar('kotkab_skl'),
            'prov_skl' => $this->request->getVar('prov_skl'),
            'status' => '1',
        ]);
        $id_hash = base64_encode('ppdb-' . $this->request->getVar('id_daftar'));
        session()->setFlashdata('pesan6', 'Data berhasil disimpan !');
        return redirect()->to('user/formulir/' . $id_hash . '?f=6');
    }
}
