<?php

namespace App\Controllers;

use App\Models\BlogModel;
use App\Models\SambutModel;
use App\Models\FotoModel;
use App\Models\BannerModel;
use App\Models\PesanModel;
use App\Models\PpdbModel;

class Web extends BaseController
{

    protected $BlogModel, $SambutModel, $FotoModel, $BannerModel, $PesanModel, $PpdbModel;
    protected $helpers = ['form'];

    public function __construct()
    {
        $this->BlogModel = new BlogModel();
        $this->SambutModel = new SambutModel();
        $this->FotoModel = new FotoModel();
        $this->BannerModel = new BannerModel();
        $this->PesanModel = new PesanModel();
        $this->PpdbModel = new PpdbModel();
    }
    public function home()
    {
        $data = [
            'title' => "Home | SMPIT AVICENNA",
            'blog' => $this->BlogModel->blogLimit(),
            'banner' => $this->BannerModel->find(),
            'pengumuman' => $this->BlogModel->pengumumanLimit()
        ];
        return view('web/home_v', $data);
    }
    public function profile()
    {
        $data = [
            'title' => "Profile Singkat | SMPIT AVICENNA",
            'blog' => $this->BlogModel->blogLimit(),
            'banner' => $this->BannerModel->find(),
            'sambut' => $this->SambutModel->sambutan()
        ];
        return view('web/profile_v', $data);
    }
    public function sambutan()
    {
        $data = [
            'title' => "Sambutan Kepala sekolah | SMPIT AVICENNA",
            'blog' => $this->BlogModel->blogLimit(),
            'banner' => $this->BannerModel->find(),
            'sambut' => $this->SambutModel->sambutan()
        ];
        return view('web/sambutan_v', $data);
    }
    public function visimisi()
    {
        $data = [
            'title' => "Visi Misi | SMPIT AVICENNA",
            'blog' => $this->BlogModel->blogLimit(),
            'banner' => $this->BannerModel->find(),
            'sambut' => $this->SambutModel->sambutan()

        ];
        return view('web/visimisi_v', $data);
    }
    public function fasilitas()
    {
        $data = [
            'title' => "Fasilitas | SMPIT AVICENNA",
            'blog' => $this->BlogModel->blogLimit(),
            'banner' => $this->BannerModel->find(),
            'sambut' => $this->SambutModel->sambutan()

        ];
        return view('web/fasilitas_v', $data);
    }
    public function ekstrakulikuler()
    {
        $data = [
            'title' => "Ekstrakulikuler | SMPIT AVICENNA",
            'blog' => $this->BlogModel->blogLimit(),
            'banner' => $this->BannerModel->find(),
            'sambut' => $this->SambutModel->sambutan()

        ];
        return view('web/ekstra_v', $data);
    }
    public function news()
    {
        // $currenPage = $this->request->getVar('page_blog') ? $this->request->getVar('page_blog') : 1;
        $keyword = $this->request->getVar('keyword');
        if ($keyword) {
            $blog = $this->BlogModel->search($keyword);
        } else {
            $blog = $this->BlogModel;
        }
        $data = [
            'title' => "News | SMPIT AVICENNA",
            'heading' => "News",
            'blog' => $blog->orderBy('created_at', 'DESC')->paginate(7, 'blog'),
            'pager' => $this->BlogModel->pager,

        ];
        return view('web/news_v', $data);
    }
    public function Pengumuman()
    {
        $keyword = $this->request->getVar('keyword');
        if ($keyword) {
            $blog = $this->BlogModel->search($keyword);
        } else {
            $blog = $this->BlogModel;
        }
        $data = [
            'title' => "Pengumuman | SMPIT AVICENNA",
            'heading' => "Pengumuman",
            'blog' => $blog->where('kategori', 'pengumuman')->orderBy('created_at', 'DESC')->paginate(7, 'blog'),
            'pager' => $this->BlogModel->pager


        ];
        return view('web/news_v', $data);
    }
    public function prestasi()
    {
        $keyword = $this->request->getVar('keyword');
        if ($keyword) {
            $blog = $this->BlogModel->search($keyword);
        } else {
            $blog = $this->BlogModel;
        }
        $data = [
            'title' => "Prestasi | SMPIT AVICENNA",
            'heading' => "Prestasi",
            'blog' => $blog->where('kategori', 'prestasi')->orderBy('created_at', 'DESC')->paginate(7, 'blog'),
            'pager' => $this->BlogModel->pager

        ];
        return view('web/news_v', $data);
    }
    public function contact()
    {
        $data = [
            'title' => "Contact | SMPIT AVICENNA"

        ];
        return view('web/contact_v', $data);
    }
    public function newsdetail($slug)
    {
        $data = [
            'title' => "Detail | SMPIT AVICENNA",
            'blog' => $this->BlogModel->blogLimit(),
            'banner' => $this->BannerModel->find(),
            'sambut' => $this->SambutModel->sambutan(),
            'detail' => $this->BlogModel->where(['slug' => $slug])->first()

        ];
        return view('web/detail_v', $data);
    }
    public function Foto()
    {
        $data = [
            'title' => "Gallery Foto | SMPIT AVICENNA",
            'foto' => $this->FotoModel->paginate(20, 'foto'),
            'pager' => $this->FotoModel->pager
        ];
        return view('web/foto_v', $data);
    }
    public function vidio()
    {
        $data = [
            'title' => "Gallery Vidio | SMPIT AVICENNA",
        ];
        return view('web/vidio_v', $data);
    }
    public function gtk()
    {
        $data = [
            'title' => "GTK | SMPIT AVICENNA"
        ];
        return view('web/gtk_v', $data);
    }
    public function kirimPesan()
    {

        if (!$this->validate([
            'nama' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Name cannot be empty !!'
                ],
            ],
            'email' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Email cannot be empty !!'
                ],
            ],

            'pesan' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Message cannot be empty !!'
                ],
            ],

        ])) {
            return redirect()->back()->withInput();
        }
        $this->PesanModel->save([
            'nama' => $this->request->getVar('nama'),
            'email' => $this->request->getVar('email'),
            'pesan' => $this->request->getVar('pesan'),
            'status' => '1',
        ]);
        session()->setFlashdata('pesan', 'Message successfully sent');
        return redirect()->to('/contact');
    }
    public function ppdb()
    {
        $data = [
            'title' => "PPDB | SMPIT AVICENNA",
            'ppdb' => $this->PpdbModel->findAll()
        ];
        // dd($this->PpdbModel->findAll());
        return view('web/ppdb_v', $data);
    }
}
