<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\AsalsklModel;
use App\Models\AyahModel;
use App\Models\FileModel;
use App\Models\IbuModel;
use App\Models\JamsosModel;
use App\Models\KesehatanModel;
use App\Models\PendaftaranModel;
use App\Models\PengumumanModel;
use App\Models\PrestasiModel;
use App\Models\SaudaraModel;
use App\Models\SiswaModel;
use App\Models\TmpttglModel;
use App\Models\UsersModel;
use App\Models\WaliModel;
use Myth\Auth\Models\UserModel;
use Myth\Auth\Password;
use Dompdf\Dompdf;
use Dompdf\Options;

class User extends BaseController
{

    protected $UsersModel, $SiswaModel, $PendaftaranModel, $SaudaraModel, $TmpttglModel, $JamsosModel, $kesehatanModel, $AsalsklModel, $AyahModel, $IbuModel, $WaliModel, $PrestasiModel, $FileModel, $PengumumanModel;
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
        $this->AyahModel = new AyahModel();
        $this->IbuModel = new IbuModel();
        $this->WaliModel = new WaliModel();
        $this->PrestasiModel = new PrestasiModel();
        $this->FileModel = new FileModel();
        $this->PengumumanModel = new PengumumanModel();
    }
    public function index()
    {
        $data = [
            'title' => 'User Home | SMPIT AVICENNA',
            'pengumuman' => $this->PengumumanModel->first(),
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
                    'required' => 'Email harus diisi !!',
                    'is_unique' => 'Email sudah digunakan !!'

                ]
            ],
            'fullname' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Nama harus diisi !!',
                ]
            ],
            'username' => [
                'rules' => $rulesUsername,
                'errors' => [
                    'required' => 'Username harus diiisi !!',
                    'is_unique' => 'Username sudah digunakan !!'
                ]
            ],

        ])) {
            return redirect()->back()->withInput();
        }
        $username =  $this->request->getVar('username');
        $username_hash = base64_encode($username);

        $this->UsersModel->save([
            'id' => $id_user,
            'email' => $this->request->getVar('email'),
            'username' => $username,
            'fullname' => $this->request->getVar('fullname'),
        ]);

        session()->setFlashdata('pesan', 'Profile berhasil dirubah!!');
        return redirect()->to('user/myProfile/' . $username_hash);
    }
    public function gantiPassword($id_user)
    {
        // validasi input



        if (!$this->validate([

            'password' => [
                'rules' => 'required|alpha_numeric|is_unique[users.password_hash]strong_password|min_length[8]|max_length[24]',
                'errors' => [
                    'required' => 'Password baru wajib diisi !!',
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
                    'required' => 'Konfirmasi password wajib diisi !!',
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
        $username_hash = base64_encode($username);


        // dd($password);
        $userMyth = new UserModel();
        $userMyth->save([
            'id' => $id_user,
            'password_hash' => Password::hash($password),

        ]);

        session()->setFlashdata('pesan2', 'Password berhasil dirubah !!');
        return redirect()->to('user/myProfile/' . $username_hash);
    }

    public function formulir($id)
    {
        $decode = base64_decode($id);
        $id_user = substr($decode, 5);
        $tb_daftar = $this->PendaftaranModel->where(['user_id' => $id_user])->first();
        $id_daftar = $tb_daftar['id'];
        $page = ($this->request->getVar('f')) ? $this->request->getVar('f') : '0';
        // dd($this->FileModel->where(['id_daftar' => $id_daftar])->first());
        $data = [
            'title' => 'Formulir PPDB | SMPIT AVICENNA',
            'page' => $page,
            'user_hash' => $id,
            'tb_daftar' => $tb_daftar,
            'tb_siswa' => $this->SiswaModel->where(['id_daftar' => $id_daftar])->first(),
            'tb_saudara' => $this->SaudaraModel->where(['id_daftar' => $id_daftar])->first(),
            'tb_tmpttgl' => $this->TmpttglModel->where(['id_daftar' => $id_daftar])->first(),
            'tb_jamsos' => $this->JamsosModel->where(['id_daftar' => $id_daftar])->first(),
            'tb_kesehatan' => $this->kesehatanModel->where(['id_daftar' => $id_daftar])->first(),
            'tb_asalskl' => $this->AsalsklModel->where(['id_daftar' => $id_daftar])->first(),
            'tb_ayah' => $this->AyahModel->where(['id_daftar' => $id_daftar])->first(),
            'tb_ibu' => $this->IbuModel->where(['id_daftar' => $id_daftar])->first(),
            'tb_wali' => $this->WaliModel->where(['id_daftar' => $id_daftar])->first(),
            'tb_prestasi' => $this->PrestasiModel->where(['id_daftar' => $id_daftar])->first(),
            'tb_file' => $this->FileModel->where(['id_daftar' => $id_daftar])->first(),
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
            'kl_jasmani_lain' => $this->request->getVar('kl_jasmani_lain'),
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
    public function editAyah($id)
    {
        if (!$this->validate([
            'nm_ay' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Nama Wajib Diisi !!',
                ]
            ],
            'nik_ay' => [
                'rules' => 'required|integer',
                'errors' => [
                    'required' => 'NIK Wajib Diisi !!',
                    'integer' => 'Hanya Diizinkan Angka !!'
                ]
            ],

            'tmplhr_ay' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Tempat lahir Wajib Diisi !!',
                ]
            ],

            'tgllhr_ay' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Tanggal Lahir Wajib Diisi !!',
                ]
            ],
            'agama_ay' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Agama Wajib Diisi !!',
                ]
            ],
            'wrg_ay' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Warganegara Wajib Diisi !!',
                ]
            ],
            'pend_ay' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Pendidikan Wajib Diisi !!',
                ]
            ],
            'peker_ay' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Pekerjaan Wajib Diisi !!',
                ]
            ],
            'penghs_ay' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Penghasilan Wajib Diisi !!',
                ]
            ],
            'alamat_ay' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Alamat Wajib Diisi !!',
                ]
            ],
            'tlprmh_ay' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'No. Telp Rumah Wajib Diisi !!',
                ]
            ],
            'hp_ay' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'No. Hp Wajib Diisi !!',
                ]
            ],
            'tlpkntr_ay' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'No. Telp Kantor Wajib Diisi !!',
                ]
            ],
            'ket_ay' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Ketrangan Wajib Diisi !!',
                ]
            ],


        ])) {
            $id_hash = base64_encode('ppdb-' . $this->request->getVar('id_daftar'));
            return redirect()->to('user/formulir/' . $id_hash . '?f=7')->withInput();
        }
        $this->AyahModel->save([
            'id' => $id,
            'nm_ay' => $this->request->getVar('nm_ay'),
            'nik_ay' => $this->request->getVar('nik_ay'),
            'tmplhr_ay' => $this->request->getVar('tmplhr_ay'),
            'tgllhr_ay' => $this->request->getVar('tgllhr_ay'),
            'agama_ay' => $this->request->getVar('agama_ay'),
            'wrg_ay' => $this->request->getVar('wrg_ay'),
            'pend_ay' => $this->request->getVar('pend_ay'),
            'peker_ay' => $this->request->getVar('peker_ay'),
            'penghs_ay' => $this->request->getVar('penghs_ay'),
            'alamat_ay' => $this->request->getVar('alamat_ay'),
            'tlprmh_ay' => $this->request->getVar('tlprmh_ay'),
            'hp_ay' => $this->request->getVar('hp_ay'),
            'tlpkntr_ay' => $this->request->getVar('tlpkntr_ay'),
            'ket_ay' => $this->request->getVar('ket_ay'),
            'status' => '1',
        ]);
        $id_hash = base64_encode('ppdb-' . $this->request->getVar('id_daftar'));
        session()->setFlashdata('pesan7', 'Data berhasil disimpan !');
        return redirect()->to('user/formulir/' . $id_hash . '?f=7');
    }
    public function editIbu($id)
    {
        if (!$this->validate([
            'nm_ib' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Nama Wajib Diisi !!',
                ]
            ],
            'nik_ib' => [
                'rules' => 'required|integer',
                'errors' => [
                    'required' => 'NIK Wajib Diisi !!',
                    'integer' => 'Hanya Diizinkan Angka !!'
                ]
            ],

            'tmplhr_ib' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Tempat lahir Wajib Diisi !!',
                ]
            ],

            'tgllhr_ib' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Tanggal Lahir Wajib Diisi !!',
                ]
            ],
            'agama_ib' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Agama Wajib Diisi !!',
                ]
            ],
            'wrg_ib' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Warganegara Wajib Diisi !!',
                ]
            ],
            'pend_ib' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Pendidikan Wajib Diisi !!',
                ]
            ],
            'peker_ib' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Pekerjaan Wajib Diisi !!',
                ]
            ],
            'penghs_ib' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Penghasilan Wajib Diisi !!',
                ]
            ],
            'alamat_ib' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Alamat Wajib Diisi !!',
                ]
            ],
            'tlprmh_ib' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'No. Telp Rumah Wajib Diisi !!',
                ]
            ],
            'hp_ib' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'No. Hp Wajib Diisi !!',
                ]
            ],
            'tlpkntr_ib' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'No. Telp Kantor Wajib Diisi !!',
                ]
            ],
            'ket_ib' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Ketrangan Wajib Diisi !!',
                ]
            ],


        ])) {
            $id_hash = base64_encode('ppdb-' . $this->request->getVar('id_daftar'));
            return redirect()->to('user/formulir/' . $id_hash . '?f=8')->withInput();
        }
        $this->IbuModel->save([
            'id' => $id,
            'nm_ib' => $this->request->getVar('nm_ib'),
            'nik_ib' => $this->request->getVar('nik_ib'),
            'tmplhr_ib' => $this->request->getVar('tmplhr_ib'),
            'tgllhr_ib' => $this->request->getVar('tgllhr_ib'),
            'agama_ib' => $this->request->getVar('agama_ib'),
            'wrg_ib' => $this->request->getVar('wrg_ib'),
            'pend_ib' => $this->request->getVar('pend_ib'),
            'peker_ib' => $this->request->getVar('peker_ib'),
            'penghs_ib' => $this->request->getVar('penghs_ib'),
            'alamat_ib' => $this->request->getVar('alamat_ib'),
            'tlprmh_ib' => $this->request->getVar('tlprmh_ib'),
            'hp_ib' => $this->request->getVar('hp_ib'),
            'tlpkntr_ib' => $this->request->getVar('tlpkntr_ib'),
            'ket_ib' => $this->request->getVar('ket_ib'),
            'status' => '1',
        ]);
        $id_hash = base64_encode('ppdb-' . $this->request->getVar('id_daftar'));
        session()->setFlashdata('pesan8', 'Data berhasil disimpan !');
        return redirect()->to('user/formulir/' . $id_hash . '?f=8');
    }
    public function editWali($id)
    {
        // if (!$this->validate([
        //     'nm_wl' => [
        //         'rules' => 'required',
        //         'errors' => [
        //             'required' => 'Nama Wajib Diisi !!',
        //         ]
        //     ],
        //     'nik_wl' => [
        //         'rules' => 'required|integer',
        //         'errors' => [
        //             'required' => 'NIK Wajib Diisi !!',
        //             'integer' => 'Hanya Diizinkan Angka !!'
        //         ]
        //     ],

        //     'tmplhr_wl' => [
        //         'rules' => 'required',
        //         'errors' => [
        //             'required' => 'Tempat lahir Wajib Diisi !!',
        //         ]
        //     ],

        //     'tgllhr_wl' => [
        //         'rules' => 'required',
        //         'errors' => [
        //             'required' => 'Tanggal Lahir Wajib Diisi !!',
        //         ]
        //     ],
        //     'agama_wl' => [
        //         'rules' => 'required',
        //         'errors' => [
        //             'required' => 'Agama Wajib Diisi !!',
        //         ]
        //     ],
        //     'wrg_wl' => [
        //         'rules' => 'required',
        //         'errors' => [
        //             'required' => 'Warganegara Wajib Diisi !!',
        //         ]
        //     ],
        //     'pend_wl' => [
        //         'rules' => 'required',
        //         'errors' => [
        //             'required' => 'Pendidikan Wajib Diisi !!',
        //         ]
        //     ],
        //     'peker_wl' => [
        //         'rules' => 'required',
        //         'errors' => [
        //             'required' => 'Pekerjaan Wajib Diisi !!',
        //         ]
        //     ],
        //     'penghs_wl' => [
        //         'rules' => 'required',
        //         'errors' => [
        //             'required' => 'Penghasilan Wajib Diisi !!',
        //         ]
        //     ],
        //     'alamat_wl' => [
        //         'rules' => 'required',
        //         'errors' => [
        //             'required' => 'Alamat Wajib Diisi !!',
        //         ]
        //     ],
        //     'tlprmh_wl' => [
        //         'rules' => 'required',
        //         'errors' => [
        //             'required' => 'No. Telp Rumah Wajib Diisi !!',
        //         ]
        //     ],
        //     'hp_wl' => [
        //         'rules' => 'required',
        //         'errors' => [
        //             'required' => 'No. Hp Wajib Diisi !!',
        //         ]
        //     ],
        //     'tlpkntr_wl' => [
        //         'rules' => 'required',
        //         'errors' => [
        //             'required' => 'No. Telp Kantor Wajib Diisi !!',
        //         ]
        //     ],
        //     'ket_wl' => [
        //         'rules' => 'required',
        //         'errors' => [
        //             'required' => 'Ketrangan Wajib Diisi !!',
        //         ]
        //     ],


        // ])) {
        //     $id_hash = base64_encode('ppdb-' . $this->request->getVar('id_daftar'));
        //     return redirect()->to('user/formulir/' . $id_hash . '?f=9')->withInput();
        // }
        $this->WaliModel->save([
            'id' => $id,
            'nm_wl' => $this->request->getVar('nm_wl'),
            'nik_wl' => $this->request->getVar('nik_wl'),
            'tmplhr_wl' => $this->request->getVar('tmplhr_wl'),
            'tgllhr_wl' => $this->request->getVar('tgllhr_wl'),
            'agama_wl' => $this->request->getVar('agama_wl'),
            'wrg_wl' => $this->request->getVar('wrg_wl'),
            'pend_wl' => $this->request->getVar('pend_wl'),
            'peker_wl' => $this->request->getVar('peker_wl'),
            'penghs_wl' => $this->request->getVar('penghs_wl'),
            'alamat_wl' => $this->request->getVar('alamat_wl'),
            'tlprmh_wl' => $this->request->getVar('tlprmh_wl'),
            'hp_wl' => $this->request->getVar('hp_wl'),
            'tlpkntr_wl' => $this->request->getVar('tlpkntr_wl'),
            'ket_wl' => $this->request->getVar('ket_wl'),
            'status' => '1',
        ]);
        $id_hash = base64_encode('ppdb-' . $this->request->getVar('id_daftar'));
        session()->setFlashdata('pesan9', 'Data berhasil disimpan !');
        return redirect()->to('user/formulir/' . $id_hash . '?f=9');
    }
    public function editPrestasi($id)
    {

        $this->PrestasiModel->save([
            'id' => $id,
            'jns_lmak' => $this->request->getVar('jns_lmak'),
            'pny_lmak' => $this->request->getVar('pny_lmak'),
            'ting_lmak' => $this->request->getVar('ting_lmak'),
            'jra_lmak' => $this->request->getVar('jra_lmak'),
            'serti_lmak' => $this->request->getVar('serti_lmak'),
            'jns_lmnak' => $this->request->getVar('jns_lmnak'),
            'pny_lmnak' => $this->request->getVar('pny_lmnak'),
            'ting_lmnak' => $this->request->getVar('ting_lmnak'),
            'jra_lmnak' => $this->request->getVar('jra_lmnak'),
            'serti_lmnak' => $this->request->getVar('serti_lmnak'),
            'status' => '1',
        ]);
        $id_hash = base64_encode('ppdb-' . $this->request->getVar('id_daftar'));
        session()->setFlashdata('pesan10', 'Data berhasil disimpan !');
        return redirect()->to('user/formulir/' . $id_hash . '?f=10');
    }
    public function editFile($id)
    {
        $tabelFile = $this->FileModel->where(['id' => $id])->first();
        if ($tabelFile['status'] == '0') {
            $role_kk = 'uploaded[file_kk]|max_size[file_kk,1024]|is_image[file_kk]|mime_in[file_kk,image/png,image/jpg,image/jpeg]';
            $role_akte = 'uploaded[file_akte]|max_size[file_akte,1024]|is_image[file_akte]|mime_in[file_akte,image/png,image/jpg,image/jpeg]';
            $role_foto =  'uploaded[file_foto]|max_size[file_foto,1024]|is_image[file_foto]|mime_in[file_foto,image/png,image/jpg,image/jpeg]';
        } else {
            $role_kk = 'max_size[file_kk,1024]|is_image[file_kk]|mime_in[file_kk,image/png,image/jpg,image/jpeg]';
            $role_akte = 'max_size[file_akte,1024]|is_image[file_akte]|mime_in[file_akte,image/png,image/jpg,image/jpeg]';
            $role_foto =  'max_size[file_foto,1024]|is_image[file_foto]|mime_in[file_foto,image/png,image/jpg,image/jpeg]';
        }


        if (!$this->validate([

            'file_kk' => [
                'rules' => $role_kk,
                'errors' => [
                    'uploaded' => 'Wajib Diisi !!',
                    'max_size' => 'Ukuran maksimal 1 MB !!',
                    'is_image' => 'Bukan image !!',
                    'mime_in' => 'Bukan image !!',
                ],
            ],
            'file_akte' => [
                'rules' => $role_akte,
                'errors' => [
                    'uploaded' => 'Wajib Diisi !!',
                    'max_size' => 'Ukuran maksimal 1 MB !!',
                    'is_image' => 'Bukan image !!',
                    'mime_in' => 'Bukan image !!',
                ],
            ],
            'file_foto' => [
                'rules' => $role_foto,
                'errors' => [
                    'uploaded' => 'Wajib Diisi !!',
                    'max_size' => 'Ukuran maksimal 1 MB !!',
                    'is_image' => 'Bukan image !!',
                    'mime_in' => 'Bukan image !!',
                ],
            ],
            'file_nisn' => [
                'rules' => 'max_size[file_nisn,1024]|is_image[file_nisn]|mime_in[file_nisn,image/png,image/jpg,image/jpeg]',
                'errors' => [
                    'max_size' => 'Ukuran maksimal 1 MB !!',
                    'is_image' => 'Bukan image !!',
                    'mime_in' => 'Bukan image !!',
                ],
            ],
            'file_serti1' => [
                'rules' => 'max_size[file_serti1,1024]|is_image[file_serti1]|mime_in[file_serti1,image/png,image/jpg,image/jpeg]',
                'errors' => [
                    'max_size' => 'Ukuran maksimal 1 MB !!',
                    'is_image' => 'Bukan image !!',
                    'mime_in' => 'Bukan image !!',
                ],
            ],
            'file_serti2' => [
                'rules' => 'max_size[file_serti2,1024]|is_image[file_serti2]|mime_in[file_serti2,image/png,image/jpg,image/jpeg]',
                'errors' => [
                    'max_size' => 'Ukuran maksimal 1 MB !!',
                    'is_image' => 'Bukan image !!',
                    'mime_in' => 'Bukan image !!',
                ],
            ],



        ])) {
            $id_hash = base64_encode('ppdb-' . $this->request->getVar('id_daftar'));
            return redirect()->to('user/formulir/' . $id_hash . '?f=11')->withInput();
        }

        // ambil file 
        $nama = url_title($this->request->getVar('fullname'), '-', true);
        $id_pendaftaran = $this->request->getVar('id_pendaftaran');

        $foto = $this->request->getFile('file_foto');
        $kk = $this->request->getFile('file_kk');
        $akte = $this->request->getFile('file_akte');
        $nisn = $this->request->getFile('file_nisn');
        $serti1 = $this->request->getFile('file_serti1');
        $serti2 = $this->request->getFile('file_serti2');
        // dd($this->request->getVar());
        if ($foto->getError() == 4) {
            $namaFoto = $this->request->getVar('foto_lama');
        } else {
            if ($this->request->getVar('foto_lama') != NULL) {
                unlink('assets/foto/' . $this->request->getVar('foto_lama'));
            }
            $namaFoto = 'foto-' . $nama . '-' . $id_pendaftaran . '.png';
            $foto->move('assets/foto', $namaFoto);
        }

        if ($kk->getError() == 4) {
            $namaKK = $this->request->getVar('kk_lama');
        } else {
            if ($this->request->getVar('kk_lama') != NULL) {
                unlink('assets/kk/' . $this->request->getVar('kk_lama'));
            }

            $namaKK = 'kk-' . $nama . '-' . $id_pendaftaran . '.png';
            $kk->move('assets/kk', $namaKK);
        }
        if ($akte->getError() == 4) {
            $namaAkte = $this->request->getVar('akte_lama');
        } else {
            if ($this->request->getVar('akte_lama') != NULL) {
                unlink('assets/akte/' . $this->request->getVar('akte_lama'));
            }
            $namaAkte = 'akte-' . $nama . '-' . $id_pendaftaran . '.png';
            $akte->move('assets/akte', $namaAkte);
        }
        if ($nisn->getError() == 4) {
            $namaNisn = $this->request->getVar('nisn_lama');
        } else {
            if ($this->request->getVar('nisn_lama') != NULL) {
                unlink('assets/nisn/' . $this->request->getVar('nisn_lama'));
            }
            $namaNisn = 'nisn-' . $nama . '-' . $id_pendaftaran . '.png';
            $nisn->move('assets/nisn', $namaNisn);
        }
        if ($serti1->getError() == 4) {
            $namaSerti1 = $this->request->getVar('serti1_lama');
        } else {
            if ($this->request->getVar('serti1_lama') != NULL) {
                unlink('assets/sertifikat/' . $this->request->getVar('serti1_lama'));
            }
            $namaSerti1 = 'sertifikat1-' . $nama . '-' . $id_pendaftaran . '.png';
            $serti1->move('assets/sertifikat', $namaSerti1);
        }
        if ($serti2->getError() == 4) {
            $namaSerti2 = $this->request->getVar('serti2_lama');
        } else {
            if ($this->request->getVar('serti2_lama') != NULL) {
                unlink('assets/sertifikat/' . $this->request->getVar('serti2_lama'));
            }
            $namaSerti2 = 'sertifikat2-' . $nama . '-' . $id_pendaftaran . '.png';
            $serti2->move('assets/sertifikat', $namaSerti2);
        }
        $this->FileModel->save([
            'id' => $id,
            'foto_file' => $namaFoto,
            'kk_file' => $namaKK,
            'akte_file' => $namaAkte,
            'nisn_file' => $namaNisn,
            'serti1_file' => $namaSerti1,
            'serti2_file' => $namaSerti2,
            'status' => '1',
        ]);
        $id_hash = base64_encode('ppdb-' . $this->request->getVar('id_daftar'));
        session()->setFlashdata('pesan11', 'Data berhasil disimpan !');
        return redirect()->to('user/formulir/' . $id_hash . '?f=11');
    }
    public function serahkan($id)
    {
        $this->PendaftaranModel->save([
            'id' => $id,
            'status' => '1'
        ]);
        $id_hash = base64_encode('ppdb-' . $this->request->getVar('id_daftar'));
        return redirect()->to('user/formulir/' . $id_hash . '?f=0');
    }
    public function formulirPdf($id)
    {
        $options = new Options();
        $options->set('chroot', realpath(''));
        $dompdf = new Dompdf();

        $decode = base64_decode($id);
        $id_daftar = substr($decode, 5);
        $tb_daftar = $this->PendaftaranModel->detaildaftar($id_daftar);
        $dt_user = $this->PendaftaranModel->dataverifikator($id_daftar);


        // dd($tb_daftar);


        $data = [
            'title' => 'Detail PPDB | Admin SMPIT AVICENNA',
            'tb_daftar' => $tb_daftar,
            'dt_user' => $dt_user

        ];
        // return view('user/formulirExel_v', $data);
        $html = view('user/formulirExel_v', $data);
        // $html2pdf->writeHTML($html);
        // $html2pdf->output();
        $dompdf->getOptions()->setChroot(['/var/www/avc/public']);
        $dompdf->loadHtml($html);
        $dompdf->setPaper('F4', 'potrait');
        $dompdf->render();
        $dompdf->stream();
        // $dompdf->stream('Formulir Pendaftaran.pdf', array(
        //     "Attachment" => false
        // ));
    }
    public function pengumuman($user_id)
    {
        // dd($this->PendaftaranModel->ketlolos($user_id));
        $id = base64_decode($user_id);
        $data = [
            'title' => 'Pengumuman | SMPIT AVICENNA',
            'pengumuman' => $this->PendaftaranModel->ketlolos($id),
        ];
        return view('user/pengumuman_v', $data);
    }
}
