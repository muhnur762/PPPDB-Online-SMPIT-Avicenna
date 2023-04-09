<?php

namespace App\Controllers;

use App\Models\blogModel;
use App\Models\sambutModel;

class Web extends BaseController
{
    protected $blogModel;
    protected $sambutModel;
    public function __construct()
    {
        $this->blogModel = new blogModel();
        $this->sambutModel = new sambutModel();
    }
    public function home()
    {
        $data = [
            'title' => "Home | SMPIT AVICENNA",
            'blog' => $this->blogModel->blogLimit(),
            'pengumuman' => $this->blogModel->pengumumanLimit()
        ];
        return view('web/home_v', $data);
    }
    public function profile()
    {
        $data = [
            'title' => "Profile Singkat | SMPIT AVICENNA",
            'blog' => $this->blogModel->blogLimit(),
            'sambut' => $this->sambutModel->sambutan()
        ];
        return view('web/profile_v', $data);
    }
    public function sambutan()
    {
        $data = [
            'title' => "Sambutan Kepala sekolah | SMPIT AVICENNA",
            'blog' => $this->blogModel->blogLimit(),
            'sambut' => $this->sambutModel->sambutan()
        ];
        return view('web/sambutan_v', $data);
    }
    public function visimisi()
    {
        $data = [
            'title' => "Visi Misi | SMPIT AVICENNA",
            'blog' => $this->blogModel->blogLimit(),
            'sambut' => $this->sambutModel->sambutan()

        ];
        return view('web/visimisi_v', $data);
    }
    public function fasilitas()
    {
        $data = [
            'title' => "Fasilitas | SMPIT AVICENNA",
            'blog' => $this->blogModel->blogLimit(),
            'sambut' => $this->sambutModel->sambutan()

        ];
        return view('web/fasilitas_v', $data);
    }
    public function ekstrakulikuler()
    {
        $data = [
            'title' => "Ekstrakulikuler | SMPIT AVICENNA",
            'blog' => $this->blogModel->blogLimit(),
            'sambut' => $this->sambutModel->sambutan()

        ];
        return view('web/ekstra_v', $data);
    }
    public function news()
    {
        $data = [
            'title' => "News | SMPIT AVICENNA",
            'heading' => "News",
            'blog' => $this->blogModel->orderBy('created_at', 'DESC')->findAll(),

        ];
        return view('web/news_v', $data);
    }
    public function Pengumuman()
    {
        $data = [
            'title' => "Pengumuman | SMPIT AVICENNA",
            'heading' => "Pengumuman",
            'blog' => $this->blogModel->where('kategori', 'pengumuman')->orderBy('created_at', 'DESC')->findAll(),


        ];
        return view('web/news_v', $data);
    }
    public function prestasi()
    {
        $data = [
            'title' => "Prestasi | SMPIT AVICENNA",
            'heading' => "Prestasi",
            'blog' => $this->blogModel->where('kategori', 'prestasi')->orderBy('created_at', 'DESC')->findAll(),

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
            'title' => "Derail | SMPIT AVICENNA",
            'blog' => $this->blogModel->blogLimit(),
            'sambut' => $this->sambutModel->sambutan(),
            'detail' => $this->blogModel->where(['slug' => $slug])->first()

        ];
        return view('web/detail_v', $data);
    }
}
