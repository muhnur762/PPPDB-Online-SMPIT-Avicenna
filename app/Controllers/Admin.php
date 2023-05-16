<?php

namespace App\Controllers;

use App\Models\BlogModel;
use App\Models\SambutModel;
use App\Models\FotoModel;
use App\Models\BannerModel;
use App\Models\PesanModel;
use App\Models\PpdbModel;
use App\Models\UsersModel;
use App\Models\PendaftaranModel;
use App\Models\SaudaraModel;
use App\Models\SiswaModel;
use App\Models\TmpttglModel;
use Myth\Auth\Models\UserModel;
use Myth\Auth\Password;

class Admin extends BaseController
{
    protected $BlogModel;
    protected $SambutModel;
    protected $FotoModel;
    protected $BannerModel;
    protected $PesanModel;
    protected $UsersModel;
    protected $PpdbModel;
    protected $SiswaModel, $SaudaraModel, $TmpttglModel;
    protected $PendaftaranModel;

    protected $helpers = ['form'];
    public function __construct()
    {
        $this->BlogModel = new BlogModel();
        $this->SambutModel = new SambutModel();
        $this->FotoModel = new FotoModel();
        $this->BannerModel = new BannerModel();
        $this->PesanModel = new PesanModel();
        $this->UsersModel = new UsersModel();
        $this->PpdbModel = new PpdbModel();
        $this->SiswaModel = new SiswaModel();
        $this->SaudaraModel = new SaudaraModel();
        $this->PendaftaranModel = new PendaftaranModel();
        $this->TmpttglModel = new TmpttglModel();
    }

    public function adminList()
    {
        $data = [
            'title' => "Admin Manager | Admin SMPIT AVICENNA",
            'text' => "Admin Management",
            'admin' =>  $this->UsersModel->getAdmin(),
        ];
        // dd($this->UsersModel->getAdmin());
        return view('admin/adminList_v', $data);
    }
    public function userList()
    {
        $data = [
            'title' => "User Manager | Admin SMPIT AVICENNA",
            'text' => "User Management",
            'admin' =>  $this->UsersModel->getUser(),
        ];
        // dd($this->UsersModel->getAdmin());
        return view('admin/adminList_v', $data);
    }
    public function addAdmin()
    {
        $data = [
            'title' => "Add | Admin SMPIT AVICENNA",

        ];
        // dd($this->UsersModel->getAdmin());
        return view('admin/addAdmin_v', $data);
    }
    public function saveAdmin()
    {
        // validasi input

        if (!$this->validate([
            'email' => [
                'rules' => 'required|is_unique[users.email]',
                'errors' => [
                    'required' => 'Email cannot be empty !!',
                    'is_unique' => 'Email already registered !!'
                ]
            ],
            'name' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Name cannot be empty !!',
                ]
            ],
            'username' => [
                'rules' => 'required|is_unique[users.username]',
                'errors' => [
                    'required' => 'Username cannot be empty !!',
                    'is_unique' => 'Username already registered !!'
                ]
            ],

        ])) {
            return redirect()->back()->withInput();
        }
        // dd($this->request->getVar('role'));
        $userMyth = new UserModel();
        $userMyth->withGroup($this->request->getVar('role'))->save([
            'email' => $this->request->getVar('email'),
            'username' => $this->request->getVar('username'),
            'fullname' => $this->request->getVar('name'),
            'password_hash' => Password::hash("avicenna123"),
            'active' => 1
        ]);


        if ($this->request->getVar('role') == 'user') {
            $data = $this->UsersModel->getProfile($this->request->getVar('username'));
            $user_id = $data[0]['id_user'];

            $this->PendaftaranModel->save([
                'user_id' => $user_id,
            ]);

            $data = $this->PendaftaranModel->where(['user_id' => $user_id])->first();
            $id_pendaftran = $data['id'];
            // tabel baru tabel siswa
            $this->SiswaModel->save([
                'id_daftar' =>  $id_pendaftran,
            ]);
            // tabel baru tabel saudara
            $this->SaudaraModel->save([
                'id_daftar' =>  $id_pendaftran,
            ]);
            // tabel baru tabel tempat tinggal
            $this->TmpttglModel->save([
                'id_daftar' =>  $id_pendaftran,
            ]);
        }

        session()->setFlashdata('pesan', 'Admin/User successfully added');
        return redirect()->to('/admin/userList');
    }
    public function deleteAdmin($id_user)
    {
        $this->UsersModel->delete($id_user);
        session()->setFlashdata('pesan', 'Admin/User successfully deleted');
        return redirect()->to('/admin/userList');
    }
    public function editAdmin($id_user)
    {
        $id_decode = base64_decode($id_user);
        $data = [
            'title' => "Edit | Admin SMPIT AVICENNA",
            'admin' => $this->UsersModel->getAllrole($id_decode)

        ];
        // dd($this->UsersModel->getAllrole($id_user));
        return view('admin/editAdmin_v', $data);
    }
    public function updateAdmin()
    {
        // validasi input
        $dataLama = $this->UsersModel->where(['users.id' => $this->request->getVar('id_user')])->first();
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

        $userMyth = new UserModel();
        $userMyth->withGroup($this->request->getVar('role'))->save([
            'id' => $this->request->getVar('id_user'),
            'email' => $this->request->getVar('email'),
            'username' => $this->request->getVar('username'),
            'fullname' => $this->request->getVar('fullname'),
            'password_hash' => $this->request->getVar('password'),

        ]);

        session()->setFlashdata('pesan', 'Admin/User successfully edited');
        return redirect()->to('/admin/userList');
    }


    public function resetPassword()
    {
        $userMyth = new UserModel();
        $userMyth->save([
            'id' => $this->request->getVar('id_user'),
            'password_hash' => Password::hash("avicenna123"),

        ]);
        session()->setFlashdata('pesan', 'password reset successfully');
        return redirect()->to('/admin/userList');
    }
    public function home()
    {
        $data = [
            'title' => "Home | Admin SMPIT AVICENNA",
        ];
        return view('admin/home_v', $data);
        // return view('auth/login.php', $data);
    }

    // ------------------------------NEWS----------------------------------------

    public function news()
    {

        $data = [
            'title' => "News | Admin SMPIT AVICENNA",
            'blog' => $this->BlogModel->orderBy('created_at', 'DESC')->findAll(),
        ];
        return view('admin/news_v', $data);
    }
    public function detailNews($slug)
    {
        $data = [
            'title' => "Detail | Admin SMPIT AVICeNNA",
            'detail' => $this->BlogModel->where(['slug' => $slug])->first()

        ];
        return view('admin/detailNews_v', $data);
    }
    public function addNews()
    {

        $data = [
            'title' => "Add News | Admin SMPIT AVICENNA",
        ];
        return view('admin/addNews_v', $data);
    }
    public function saveNews()
    {
        // validasi input

        if (!$this->validate([
            'judul' => [
                'rules' => 'required|is_unique[blog.judul]',
                'errors' => [
                    'required' => 'Title cannot be empty !!',
                    'is_unique' => 'Title already registered !!'
                ]
            ],
            'penulis' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Author cannot be empty !!'
                ],
            ],
            'kategori' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Category cannot be empty !!'
                ],
            ],
            'cover' => [
                'rules' => 'uploaded[cover]|max_size[cover,1024]|is_image[cover]|mime_in[cover,image/png,image/jpg,image/jpeg]',
                'errors' => [
                    'uploaded' => 'Image cannot be empty !!',
                    'max_size' => 'Maximum image size is 10 MB !!',
                    'is_image' => 'What you input is not an image !!',
                    'mime_in' => 'What you input is not an image 2 !!',
                ],
            ],
            'file' => [
                'rules' => 'max_size[cover,5024]|mime_in[file,application/pdf]',
                'errors' => [
                    'max_size' => 'Maximum image size is 5 MB !!',
                    'mime_in' => 'What you input is not an PDF !!'
                ],
            ],
            'isi' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Content cannot be empty !!'
                ],
            ],
        ])) {
            return redirect()->back()->withInput();
        }


        // ambil file 
        $cover = $this->request->getFile('cover');
        // ubah nama 
        $nameCover = $cover->getRandomName();
        // pindahkan cover
        $cover->move('assets/cover', $nameCover);



        $slug = url_title($this->request->getVar('judul'), '-', true);

        $pdf = $this->request->getFile('file');

        if ($pdf->getError() == 0) {

            // ubah nama 
            $nameFile = $pdf->getRandomName();
            // pindahkan cover
            $pdf->move('assets/file', $nameFile);



            $this->BlogModel->save([
                'judul' => $this->request->getVar('judul'),
                'slug' => $slug,
                'penulis' => $this->request->getVar('penulis'),
                'isi' => $this->request->getVar('isi'),
                'kategori' => $this->request->getVar('kategori'),
                'cover' => $nameCover,
                'file' => $nameFile
            ]);
        } else {
            $this->BlogModel->save([
                'judul' => $this->request->getVar('judul'),
                'slug' => $slug,
                'penulis' => $this->request->getVar('penulis'),
                'isi' => $this->request->getVar('isi'),
                'kategori' => $this->request->getVar('kategori'),
                'cover' => $nameCover,
            ]);
        }
        session()->setFlashdata('pesan', 'News successfully added');
        return redirect()->to('/admin/news');
    }
    public function deleteNews($id)
    {
        // ambil blog berdasar id
        $news = $this->BlogModel->find($id);
        // hapus file 
        if ($news['cover'] != "defauld.jpg") {
            unlink('assets/cover/' . $news['cover']);
        }
        if (!empty($news['file'])) {
            unlink('assets/file/' . $news['file']);
        }

        $this->BlogModel->delete($id);
        session()->setFlashdata('pesan', 'News successfully deleted');
        return redirect()->to('/admin/news');
    }
    public function editNews($slug)
    {
        $data = [
            'title' => "Edit News | Admin SMPIT AVICENNA",
            'news' => $this->BlogModel->where(['slug' => $slug])->first()
        ];
        return view('admin/editNews_v', $data);
    }
    public function updateNews($id)
    {
        $newsLama = $this->BlogModel->where(['slug' => $this->request->getVar('slug')])->first();
        if ($newsLama['judul'] == $this->request->getVar('judul')) {
            $rulesJudul = 'required';
        } else {
            $rulesJudul = 'required|is_unique[blog.judul]';
        }

        if (!$this->validate([
            'judul' => [
                'rules' => $rulesJudul,
                'errors' => [
                    'required' => 'Title cannot be empty !!',
                    'is_unique' => 'Title already registered !!'
                ]
            ],
            'penulis' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Author cannot be empty !!'
                ],
            ],
            'kategori' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Category cannot be empty !!'
                ],
            ],
            'cover' => [
                'rules' => 'max_size[cover,1024]|is_image[cover]|mime_in[cover,image/png,image/jpg,image/jpeg]',
                'errors' => [
                    'max_size' => 'Maximum image size is 10 MB !!',
                    'is_image' => 'What you input is not an image !!',
                    'mime_in' => 'What you input is not an image 2 !!',
                ],
            ],
            'file' => [
                'rules' => 'max_size[cover,5024]|mime_in[file,application/pdf]',
                'errors' => [
                    'max_size' => 'Maximum image size is 5 MB !!',
                    'mime_in' => 'What you input is not an PDF !!'
                ],
            ],
            'isi' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Content cannot be empty !!'
                ],
            ],
        ])) {
            return redirect()->back()->withInput();
        }

        $slug = url_title($this->request->getVar('judul'), '-', true);

        $formCover = $this->request->getfile('cover');
        if ($formCover->getError() == 4) {
            $cover = $this->request->getVar('coverLama');
        } else {
            // ambil file 
            $coverBaru = $this->request->getFile('cover');
            // ubah nama 
            $cover = $coverBaru->getRandomName();
            // pindahkan cover
            $coverBaru->move('assets/cover', $cover);
            // hapus cover lama 
            if ($this->request->getVar('coverLama') != 'defauld.jpg') {
                unlink('assets/cover/' . $this->request->getVar('coverLama'));
            }
        }

        $formPdf = $this->request->getfile('file');
        if ($formPdf->getError() == 4) {
            $pdf = $this->request->getVar('fileLama');
        } else {
            // ambil file 
            $fileBaru = $this->request->getFile('file');
            // ubah nama 
            $pdf = $fileBaru->getRandomName();
            // pindahkan cover
            $fileBaru->move('assets/file/', $pdf);
            // hapus cover lama 
            if ($this->request->getVar('fileLama') != "") {
                unlink('assets/file/' . $this->request->getVar('fileLama'));
            }
        }


        $this->BlogModel->save([
            'id' => $id,
            'judul' => $this->request->getVar('judul'),
            'slug' => $slug,
            'penulis' => $this->request->getVar('penulis'),
            'isi' => $this->request->getVar('isi'),
            'kategori' => $this->request->getVar('kategori'),
            'cover' => $cover,
            'file' => $pdf,
        ]);
        session()->setFlashdata('pesan', 'News successfully updated');
        return redirect()->to('/admin/news');
    }







    public function foto()
    {


        $data = [
            'title' => "Foto | Admin SMPIT AVICENNA",
            'foto' => $this->FotoModel->orderBy('created_at', 'DESC')->findAll(),
        ];
        return view('admin/foto_v', $data);
    }
    public function addFoto()
    {

        $data = [
            'title' => "Add Images | Admin SMPIT AVICENNA",
        ];
        return view('admin/addFoto_v', $data);
    }
    public function saveFoto()
    {
        // validasi input

        if (!$this->validate([
            'penulis' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Author cannot be empty !!'
                ],
            ],
            'caption' => [
                'rules' => 'required|max_length[200]',
                'errors' => [
                    'required' => 'Caption cannot be empty !!',
                    'max_length' => 'Maximum 200 characters !!'
                ],
            ],
            'cover' => [
                'rules' => 'uploaded[cover]|max_size[cover,1024]|is_image[cover]|mime_in[cover,image/png,image/jpg,image/jpeg]',
                'errors' => [
                    'uploaded' => 'Image cannot be empty !!',
                    'max_size' => 'Maximum image size is 10 MB !!',
                    'is_image' => 'What you input is not an image !!',
                    'mime_in' => 'What you input is not an image !!',
                ],
            ],
        ])) {
            return redirect()->back()->withInput();
        }


        // ambil file 
        $cover = $this->request->getFile('cover');
        // ubah nama 
        $nameCover = $cover->getRandomName();
        // pindahkan cover
        $cover->move('assets/img', $nameCover);



        $this->FotoModel->save([
            'penulis' => $this->request->getVar('penulis'),
            'caption' => $this->request->getVar('caption'),
            'cover' => $nameCover,
        ]);
        session()->setFlashdata('pesan', 'Images successfully added');
        return redirect()->to('/admin/foto');
    }
    public function editFoto($id)
    {
        $id_decode = base64_decode($id);
        $data = [
            'title' => "Edit Images | Admin SMPIT AVICENNA",
            'foto' => $this->FotoModel->where(['id' => $id_decode])->first()
        ];
        return view('admin/editFoto_v', $data);
    }
    public function deleteFoto($id)
    {
        // ambil foto berdasar id
        $foto = $this->FotoModel->find($id);
        // hapus file 
        unlink('assets/img/' . $foto['cover']);

        $this->FotoModel->delete($id);
        session()->setFlashdata('pesan', 'Images successfully deleted');
        return redirect()->to('/admin/foto');
    }
    public function updateFoto($id)
    {

        if (!$this->validate([
            'penulis' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Author cannot be empty !!'
                ],
            ],
            'caption' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Caption cannot be empty !!'
                ],
            ],
            'cover' => [
                'rules' => 'max_size[cover,1024]|is_image[cover]|mime_in[cover,image/png,image/jpg,image/jpeg]',
                'errors' => [
                    'max_size' => 'Maximum image size is 10 MB !!',
                    'is_image' => 'What you input is not an image !!',
                    'mime_in' => 'What you input is not an image 2 !!',
                ],
            ],
        ])) {
            return redirect()->back()->withInput();
        }


        $formCover = $this->request->getfile('cover');
        if ($formCover->getError() == 4) {
            $cover = $this->request->getVar('coverLama');
        } else {
            // ambil file 
            $coverBaru = $this->request->getFile('cover');
            // ubah nama 
            $cover = $coverBaru->getRandomName();
            // pindahkan cover
            $coverBaru->move('assets/img', $cover);
            // hapus cover lama 
            unlink('assets/img/' . $this->request->getVar('coverLama'));
        }


        $this->FotoModel->save([
            'id' => $id,
            'penulis' => $this->request->getVar('penulis'),
            'caption' => $this->request->getVar('caption'),
            'cover' => $cover,
        ]);
        session()->setFlashdata('pesan', 'Images successfully updated');
        return redirect()->to('/admin/foto');
    }

    public function banner()
    {
        $data = [
            'title' => "Banners | Admin SMPIT AVICENNA",
            'banner' => $this->BannerModel->where(['id' => '1'])->first()
        ];
        return view('admin/banner_v', $data);
    }
    public function updateBanner($id)
    {
        if (!$this->validate([
            'image' => [
                'rules' => 'uploaded[image]|max_size[image,2024]|is_image[image]|mime_in[image,image/png,image/jpg,image/jpeg]',
                'errors' => [
                    'uploaded' => 'Image cannot be empty !!',
                    'max_size' => 'Maximum image size is 2 MB !!',
                    'is_image' => 'What you input is not an image !!',
                    'mime_in' => 'What you input is not an image 2 !!',
                ],
            ],

        ])) {
            return redirect()->back()->withInput();
        }

        // ambil file 
        $imageBaru = $this->request->getFile('image');
        // ubah nama 
        $nameImage = $imageBaru->getRandomName();
        // pindahkan cover
        $imageBaru->move('assets/other', $nameImage);

        unlink('assets/other/' . $this->request->getVar('imageLama'));

        $author = $this->request->getVar('author');



        $this->BannerModel->save([
            'id' => $id,
            'image' => $nameImage,
            'author' => $author
        ]);
        session()->setFlashdata('pesan', 'Banners successfully updated');
        return redirect()->to('/admin/banner');
    }


    public function pesan()
    {
        // dd($this->PesanModel->orderBy('created_at', 'DESC')->findAll());
        $data = [
            'title' => "Message | Admin SMPIT AVICENNA",
            'pesan' => $this->PesanModel->orderBy('created_at', 'DESC')->findAll(),
        ];
        return view('admin/pesan_v', $data);
    }
    public function editPesan($id)
    {
        $data = [
            'title' => "Message | Admin SMPIT AVICENNA",
            'pesan' => $this->PesanModel->where(['id' => $id])->first()
        ];
        return view('admin/editpesan_v', $data);
    }


    public function timeLine()
    {
        $data = [
            'title' => 'Time Line PPDB | Admin SMPIT AVICENNA',
            'ppdb' => $this->PpdbModel->findAll(),
        ];
        return view('admin/infoPpdb_v', $data);
    }
    public function addtimeLine()
    {
        $this->PpdbModel->save([
            'judul' => NULL,
            'isi' => NULL,
        ]);
        return redirect()->to('/admin/timeLine');
    }

    public function deleteTimeine($id)
    {
        $this->PpdbModel->delete($id);
        return redirect()->to('/admin/timeLine');
    }
    public function updateTimeline($id)
    {
        if (!$this->validate([
            'judul' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Title cannot be empty !!'
                ],
            ],
            'isi' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Content cannot be empty !!',
                ],
            ],

        ])) {
            return redirect()->back()->withInput();
        }


        $this->PpdbModel->save([
            'id' => $id,
            'judul' => $this->request->getVar('judul'),
            'isi' => $this->request->getVar('isi'),
        ]);
        return redirect()->to('/admin/timeLine');
    }
}
