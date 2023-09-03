<?php $this->extend('tamplate/admin/index')  ?>
<?php $this->section('content')  ?>

<div class="container-fluid">
    <h1 class="h3 mb-2 text-gray-800">Detail pendaftaran</h1>
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="<?= base_url('admin'); ?>">Home</a></li>
            <li class="breadcrumb-item"><a href="<?= base_url('admin/dataPendaftaran'); ?>">Pendaftaran</a></li>
            <li class="breadcrumb-item active" aria-current="page">Detail</li>
        </ol>
    </nav>
    <?php if (session()->getFlashdata('pesan')) :  ?>
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            <?= session()->getFlashdata('pesan'); ?>
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
    <?php endif;  ?>
    <h3>ID #227<?= date('ymd', strtotime($tb_daftar['created_at'])) . $tb_daftar['id_daftar'] ?></h3>
    <h5 class="my-3 font-weight-bold text-primary">A. KETERANGAN TENTANG DIRI CALON PESERTA DIDIK</h5>
    <div class="row">
        <div class="col-md-4">
            <b>Nama</b>
        </div>
        <div class="col-md-8">
            <b>: <?= $tb_daftar['nama']; ?></b>
        </div>

        <div class="col-md-4">
            <b>Nomor Induk Kependudukan (NIK)</b>
        </div>
        <div class="col-md-8">
            <b>: </b><?= $tb_daftar['nik']; ?>
        </div>

        <div class="col-md-4">
            <b>Nomor Induk Siswa Nasional (NISN)</b>
        </div>
        <div class="col-md-8">
            <b>: </b><?= $tb_daftar['nisn']; ?>
        </div>

        <div class="col-md-4">
            <b>Kewarganegaraan</b>
        </div>
        <div class="col-md-8">
            <b>: </b><?= $tb_daftar['kewarganegaraan']; ?>
        </div>

        <div class="col-md-4">
            <b>Jenis Kelamin</b>
        </div>
        <div class="col-md-8">
            <b>: </b><?= $tb_daftar['jk']; ?>
        </div>

        <div class="col-md-4">
            <b>Tempat & Tanggal Lahir</b>
        </div>
        <div class="col-md-8">
            <b>: </b><?= $tb_daftar['tmp_lahir'] . ' , ' . date('d M Y', strtotime($tb_daftar['tgl_lahir'])); ?>
        </div>

        <div class="col-md-4">
            <b>Nomor Akte</b>
        </div>
        <div class="col-md-8">
            <b>: </b><?= $tb_daftar['no_akte']; ?>
        </div>

        <div class="col-md-4">
            <b>Agama</b>
        </div>
        <div class="col-md-8">
            <b>: </b><?= $tb_daftar['agama']; ?>
        </div>

        <div class="col-md-4">
            <b>Status Dalam Keluarga</b>
        </div>
        <div class="col-md-8">
            <b>: </b><?= $tb_daftar['status_siswa']; ?>
        </div>
    </div>

    <h5 class="my-3 font-weight-bold text-primary">B. KETERANGAN JUMLAH SAUDARA DARI CALON PESERTA DIDIK</h5>
    <div class="row">
        <div class="col-md-4">
            <b>Anak Keberapa</b>
        </div>
        <div class="col-md-8">
            <b>: </b><?= $tb_daftar['ank_ke']; ?>
        </div>

        <div class="col-md-4">
            <b>Jumlah Saudara Kandung</b>
        </div>
        <div class="col-md-8">
            <b>: </b><?= $tb_daftar['jml_sdr_kdg']; ?>
        </div>

        <div class="col-md-4">
            <b>Jumlah Saudara Angkat</b>
        </div>
        <div class="col-md-8">
            <b>: </b><?= $tb_daftar['jml_sdr_akt']; ?>
        </div>

        <div class="col-md-4">
            <b>Jumlah saudara Tiri</b>
        </div>
        <div class="col-md-8">
            <b>: </b><?= $tb_daftar['jml_sdr_tri']; ?>
        </div>

        <div class="col-md-4">
            <b>Saudara Yang Bersekolah di Avicenna</b>
        </div>
        <div class="col-md-8">
            <table border="1">
                <tr>
                    <th width="200px" align="center">Nama</th>
                    <th width="150px" align="center">Instansi</th>
                </tr>
                <tr>
                    <td align="center"><?= ($tb_daftar['nm_sdr_avc_1']) ? $tb_daftar['nm_sdr_avc_1'] : '-'; ?></td>
                    <td align="center"><?= ($tb_daftar['skl_sdr_avc_1']) ? $tb_daftar['skl_sdr_avc_1'] : '-'; ?></td>
                </tr>
                <tr>
                    <td align="center"><?= ($tb_daftar['nm_sdr_avc_2']) ? $tb_daftar['nm_sdr_avc_2'] : '-'; ?></td>
                    <td align="center"><?= ($tb_daftar['skl_sdr_avc_2']) ? $tb_daftar['skl_sdr_avc_2'] : '-'; ?></td>
                </tr>
            </table>
        </div>


    </div>

    <h5 class="my-3 font-weight-bold text-primary">C. KETERANGAN TEMPAT TINGGAL CALON PESERTA DIDIK</h5>
    <div class="row">
        <div class="col-md-4">
            <b>Tempat Tinggal Sesuai KK</b>
        </div>
        <div class="col-md-8">
            <b>: </b><?= ucfirst($tb_daftar['sesuai_kk']); ?>
        </div>

        <div class="col-md-4">
            <b>Daerah / Perumahan</b>
        </div>
        <div class="col-md-8">
            <b>: </b><?= $tb_daftar['daerah']; ?>
        </div>

        <div class="col-md-4">
            <b>Nama Jalan</b>
        </div>
        <div class="col-md-8">
            <b>: </b><?= $tb_daftar['jl']; ?>
        </div>

        <div class="col-md-4">
            <b>Desa / Kelurahan</b>
        </div>
        <div class="col-md-8">
            <b>: </b><?= $tb_daftar['desa_kel']; ?>
        </div>

        <div class="col-md-4">
            <b>Kecamatan</b>
        </div>
        <div class="col-md-8">
            <b>: </b><?= $tb_daftar['kecamatan']; ?>
        </div>

        <div class="col-md-4">
            <b>RT / RW</b>
        </div>
        <div class="col-md-8">
            <b>: </b><?= $tb_daftar['rt'] . ' / ' . $tb_daftar['rw']; ?>
        </div>

        <div class="col-md-4">
            <b>Nomor Rumah</b>
        </div>
        <div class="col-md-8">
            <b>: </b><?= $tb_daftar['no_rmh']; ?>
        </div>

        <div class="col-md-4">
            <b>Kota / Kabupaten</b>
        </div>
        <div class="col-md-8">
            <b>: </b><?= $tb_daftar['kab_kota']; ?>
        </div>

        <div class="col-md-4">
            <b>Kode Pos</b>
        </div>
        <div class="col-md-8">
            <b>: </b><?= $tb_daftar['kd_pos']; ?>
        </div>

        <div class="col-md-4">
            <b>Jarak Rumah Dengan Avicenna</b>
        </div>
        <div class="col-md-8">
            <b>: </b><?= $tb_daftar['jrk'] . " Kilometer" ?>
        </div>

        <div class="col-md-4">
            <b>Tinggal Bersama</b>
        </div>
        <div class="col-md-8">
            <b>: </b><?= $tb_daftar['tigl_bersama']; ?>
        </div>

        <div class="col-md-4">
            <b>Transportasi Ke Avicenna</b>
        </div>
        <div class="col-md-8">
            <b>: </b><?= $tb_daftar['transportasi']; ?>
        </div>

    </div>

    <h5 class="my-3 font-weight-bold text-primary">D. KETERANGAN JAMINAN SOSIAL PEMERINTAH</h5>
    <div class="row">
        <div class="col-md-4">
            <b>Kartu Keluarga Sejahtera (KKS)</b>
        </div>
        <div class="col-md-8">
            <b>: </b><?= (empty($tb_daftar['kks'])) ? '-' : $tb_daftar['kks'] ?>
        </div>

        <div class="col-md-4">
            <b>Kartu Perlindungan Sosial (KPS)</b>
        </div>
        <div class="col-md-8">
            <b>: </b><?= (empty($tb_daftar['kps'])) ? '-' : $tb_daftar['kps'] ?>
        </div>

        <div class="col-md-4">
            <b>Kartu Indonesia Pintar (KIP)</b>
        </div>
        <div class="col-md-8">
            <b>: </b><?= (empty($tb_daftar['kip'])) ? '-' : $tb_daftar['kip'] ?>
        </div>

        <div class="col-md-4">
            <b>Terdaftar pada DTKS (Data Terpadu Kesejahteraan Sosial (DTKS) Kemensos)</b>
        </div>
        <div class="col-md-8">
            <b>: </b><?= (empty($tb_daftar['dtks'])) ? 'Tidak' : ucfirst($tb_daftar['dtks']) ?>
        </div>
    </div>

    <h5 class="my-3 font-weight-bold text-primary">E. KETERANGAN KESEHATAN CALON PESERTA DIDIK</h5>
    <div class="row">
        <div class="col-md-4">
            <b>Golongan Darah</b>
        </div>
        <div class="col-md-8">
            <b>: </b><?= $tb_daftar['gol_dar']; ?>
        </div>

        <div class="col-md-4">
            <b>Penyakit Berat Yang Pernah Diderita</b>
        </div>
        <div class="col-md-8">
            <table border="1">
                <tr>
                    <th width="100px" align="center">Tahun</th>
                    <th width="150px" align="center">Nama Penyakit</th>
                    <th width="150px" align="center">Keterangan</th>
                </tr>
                <tr>
                    <td align="center"><?= ($tb_daftar['th_penyakit_1']) ? $tb_daftar['th_penyakit_1'] : '-'; ?></td>
                    <td align="center"><?= ($tb_daftar['nm_penyakit_1']) ? $tb_daftar['nm_penyakit_1'] : '-'; ?></td>
                    <td align="center"><?= ($tb_daftar['kt_penyakit_1']) ? $tb_daftar['kt_penyakit_1'] : '-'; ?></td>
                </tr>
                <tr>
                    <td align="center"><?= ($tb_daftar['th_penyakit_2']) ? $tb_daftar['th_penyakit_2'] : '-'; ?></td>
                    <td align="center"><?= ($tb_daftar['nm_penyakit_2']) ? $tb_daftar['nm_penyakit_2'] : '-'; ?></td>
                    <td align="center"><?= ($tb_daftar['kt_penyakit_2']) ? $tb_daftar['kt_penyakit_2'] : '-'; ?></td>
                </tr>
            </table>
        </div>

        <div class="col-md-4">
            <b>Kelainan jasmani</b>
        </div>
        <div class="col-md-8">
            <b>: </b><?= ($tb_daftar['kl_jasmani']) ? $tb_daftar['kl_jasmani'] : '-'; ?>
        </div>

        <div class="col-md-4">
            <b>Kelainan Jasmani Lain</b>
        </div>
        <div class="col-md-8">
            <b>: </b><?= ($tb_daftar['kl_jasmani_lain']) ? $tb_daftar['kl_jasmani_lain'] : '-'; ?>
        </div>

        <div class="col-md-4">
            <b>Tinggi Badan</b>
        </div>
        <div class="col-md-8">
            <b>: </b><?= $tb_daftar['tb'] . ' Cm'; ?>
        </div>

        <div class="col-md-4">
            <b>Berat Badan</b>
        </div>
        <div class="col-md-8">
            <b>: </b><?= $tb_daftar['bb'] . ' Kg'; ?>
        </div>

        <div class="col-md-4">
            <b>Status Vaksin Covid-19</b>
        </div>
        <div class="col-md-8">
            <b>: </b><?= $tb_daftar['vaksin']; ?>
        </div>

        <div class="col-md-4">
            <b>Pernah Terpapar Covid-19</b>
        </div>
        <div class="col-md-8">
            <b>: </b><?= $tb_daftar['covid']; ?>
        </div>

    </div>

    <h5 class="my-3 font-weight-bold text-primary">F. KETERANGAN PENDIDIKAN SEBELUMNYA</h5>
    <div class="row">
        <div class="col-md-4">
            <b>Nama SD / MI</b>
        </div>
        <div class="col-md-8">
            <b>: </b><?= $tb_daftar['nama_skl']; ?>
        </div>

        <div class="col-md-4">
            <b>Status Sekolah</b>
        </div>
        <div class="col-md-8">
            <b>: </b><?= $tb_daftar['st_sekolah']; ?>
        </div>

        <div class="col-md-4">
            <b>Alamat sekolah</b>
        </div>
        <div class="col-md-8">
            <div class="row">
                <div class="col-6 col-md-3">
                    <b>: Kecamatan</b>
                </div>
                <div class="col-6 col-md-9">
                    <b>: </b> <?= $tb_daftar['kecamatan_skl']; ?>
                </div>
                <div class="col-6 col-md-3">
                    <b>: Kota / Kabupaten</b>
                </div>
                <div class="col-6 col-md-9">
                    <b>: </b> <?= $tb_daftar['kotkab_skl']; ?>
                </div>
                <div class="col-6 col-md-3">
                    <b>: Provinsi</b>
                </div>
                <div class="col-6 col-md-9">
                    <b>: </b> <?= $tb_daftar['prov_skl']; ?>
                </div>
            </div>
        </div>


    </div>

    <h5 class="my-3 font-weight-bold text-primary">G. KETERANGAN TENTANG AYAH</h5>
    <div class="row">
        <div class="col-md-4">
            <b>Nama</b>
        </div>
        <div class="col-md-8">
            <b>: </b><?= $tb_daftar['nm_ay']; ?>
        </div>

        <div class="col-md-4">
            <b>Nomor Induk Kependudukan (NIK)</b>
        </div>
        <div class="col-md-8">
            <b>: </b><?= $tb_daftar['nik_ay'] ?>
        </div>


        <div class="col-md-4">
            <b>Tempat & Tanggal Lahir</b>
        </div>
        <div class="col-md-8">
            <b>: </b><?= $tb_daftar['tmplhr_ay'] . ' , ' . date('d M Y', strtotime($tb_daftar['tgllhr_ay'])); ?>
        </div>

        <div class="col-md-4">
            <b>Agama</b>
        </div>
        <div class="col-md-8">
            <b>: </b><?= $tb_daftar['agama_ay'] ?>
        </div>

        <div class="col-md-4">
            <b>Kewarganegaraan</b>
        </div>
        <div class="col-md-8">
            <b>: </b><?= $tb_daftar['wrg_ay']; ?>
        </div>

        <div class="col-md-4">
            <b>Pendidikan</b>
        </div>
        <div class="col-md-8">
            <b>: </b><?= $tb_daftar['pend_ay']; ?>
        </div>

        <div class="col-md-4">
            <b>Penghasilan</b>
        </div>
        <div class="col-md-8">
            <b>: </b><?= $tb_daftar['penghs_ay']; ?>
        </div>

        <div class="col-md-4">
            <b>Alamat</b>
        </div>
        <div class="col-md-8">
            <b>: </b><?= $tb_daftar['alamat_ay']; ?>
        </div>

        <div class="col-md-4">
            <b>No. Telp Rumah</b>
        </div>
        <div class="col-md-8">
            <b>: </b><?= $tb_daftar['tlprmh_ay']; ?>
        </div>

        <div class="col-md-4">
            <b>No. Handphone</b>
        </div>
        <div class="col-md-8">
            <b>: </b><?= $tb_daftar['hp_ay']; ?>
        </div>

        <div class="col-md-4">
            <b>No. Telp Kantor</b>
        </div>
        <div class="col-md-8">
            <b>: </b><?= $tb_daftar['tlpkntr_ay']; ?>
        </div>

        <div class="col-md-4">
            <b>Keterangan</b>
        </div>
        <div class="col-md-8">
            <b>: </b><?= $tb_daftar['ket_ay']; ?>
        </div>

    </div>

    <h5 class="my-3 font-weight-bold text-primary">H. KETERANGAN TENTANG IBU</h5>
    <div class="row">
        <div class="col-md-4">
            <b>Nama</b>
        </div>
        <div class="col-md-8">
            <b>: </b><?= $tb_daftar['nm_ib']; ?>
        </div>

        <div class="col-md-4">
            <b>Nomor Induk Kependudukan (NIK)</b>
        </div>
        <div class="col-md-8">
            <b>: </b><?= $tb_daftar['nik_ib'] ?>
        </div>


        <div class="col-md-4">
            <b>Tempat & Tanggal Lahir</b>
        </div>
        <div class="col-md-8">
            <b>: </b><?= $tb_daftar['tmplhr_ib'] . ' , ' . date('d M Y', strtotime($tb_daftar['tgllhr_ib'])); ?>
        </div>

        <div class="col-md-4">
            <b>Agama</b>
        </div>
        <div class="col-md-8">
            <b>: </b><?= $tb_daftar['agama_ib'] ?>
        </div>

        <div class="col-md-4">
            <b>Kewarganegaraan</b>
        </div>
        <div class="col-md-8">
            <b>: </b><?= $tb_daftar['wrg_ib']; ?>
        </div>

        <div class="col-md-4">
            <b>Pendidikan</b>
        </div>
        <div class="col-md-8">
            <b>: </b><?= $tb_daftar['pend_ib']; ?>
        </div>

        <div class="col-md-4">
            <b>Penghasilan</b>
        </div>
        <div class="col-md-8">
            <b>: </b><?= $tb_daftar['penghs_ib']; ?>
        </div>

        <div class="col-md-4">
            <b>Alamat</b>
        </div>
        <div class="col-md-8">
            <b>: </b><?= $tb_daftar['alamat_ib']; ?>
        </div>

        <div class="col-md-4">
            <b>No. Telp Rumah</b>
        </div>
        <div class="col-md-8">
            <b>: </b><?= $tb_daftar['tlprmh_ib']; ?>
        </div>

        <div class="col-md-4">
            <b>No. Handphone</b>
        </div>
        <div class="col-md-8">
            <b>: </b><?= $tb_daftar['hp_ib']; ?>
        </div>

        <div class="col-md-4">
            <b>No. Telp Kantor</b>
        </div>
        <div class="col-md-8">
            <b>: </b><?= $tb_daftar['tlpkntr_ib']; ?>
        </div>

        <div class="col-md-4">
            <b>Keterangan</b>
        </div>
        <div class="col-md-8">
            <b>: </b><?= $tb_daftar['ket_ib']; ?>
        </div>


    </div>

    <h5 class="my-3 font-weight-bold text-primary">I. KETERANGAN TENTANG WALI</h5>
    <div class="row">
        <div class="col-md-4">
            <b>Nama</b>
        </div>
        <div class="col-md-8">
            <b>: </b><?= $tb_daftar['nm_wl']; ?>
        </div>

        <div class="col-md-4">
            <b>Nomor Induk Kependudukan (NIK)</b>
        </div>
        <div class="col-md-8">
            <b>: </b><?= $tb_daftar['nik_wl'] ?>
        </div>


        <div class="col-md-4">
            <b>Tempat & Tanggal Lahir</b>
        </div>
        <div class="col-md-8">
            <b>: </b><?= $tb_daftar['tmplhr_wl'] . ' , ' . date('d M Y', strtotime($tb_daftar['tgllhr_wl'])); ?>
        </div>

        <div class="col-md-4">
            <b>Agama</b>
        </div>
        <div class="col-md-8">
            <b>: </b><?= $tb_daftar['agama_wl'] ?>
        </div>

        <div class="col-md-4">
            <b>Kewarganegaraan</b>
        </div>
        <div class="col-md-8">
            <b>: </b><?= $tb_daftar['wrg_wl']; ?>
        </div>

        <div class="col-md-4">
            <b>Pendidikan</b>
        </div>
        <div class="col-md-8">
            <b>: </b><?= $tb_daftar['pend_wl']; ?>
        </div>

        <div class="col-md-4">
            <b>Penghasilan</b>
        </div>
        <div class="col-md-8">
            <b>: </b><?= $tb_daftar['penghs_wl']; ?>
        </div>

        <div class="col-md-4">
            <b>Alamat</b>
        </div>
        <div class="col-md-8">
            <b>: </b><?= $tb_daftar['alamat_wl']; ?>
        </div>

        <div class="col-md-4">
            <b>No. Telp Rumah</b>
        </div>
        <div class="col-md-8">
            <b>: </b><?= $tb_daftar['tlprmh_wl']; ?>
        </div>

        <div class="col-md-4">
            <b>No. Handphone</b>
        </div>
        <div class="col-md-8">
            <b>: </b><?= $tb_daftar['hp_wl']; ?>
        </div>

        <div class="col-md-4">
            <b>No. Telp Kantor</b>
        </div>
        <div class="col-md-8">
            <b>: </b><?= $tb_daftar['tlpkntr_wl']; ?>
        </div>

        <div class="col-md-4">
            <b>Keterangan</b>
        </div>
        <div class="col-md-8">
            <b>: </b><?= $tb_daftar['ket_wl']; ?>
        </div>

    </div>

    <h5 class="my-3 font-weight-bold text-primary">J. KETERANGAN PRESTASI TERAKHIR YANG PERNAH DIMILIKI SISWA</h5>
    <div class="row">
        <div class="col-md-4">
            <b>Akademik</b>
        </div>
        <div class="col-md-8">
            <div class="row">
                <div class="col-6 col-md-3">
                    <b>: Jenis Lomba</b>
                </div>
                <div class="col-6 col-md-9">
                    <b>: </b> <?= $tb_daftar['jns_lmak']; ?>
                </div>
                <div class="col-6 col-md-3">
                    <b>: Penyelenggara</b>
                </div>
                <div class="col-6 col-md-9">
                    <b>: </b> <?= $tb_daftar['pny_lmak']; ?>
                </div>
                <div class="col-6 col-md-3">
                    <b>: Tingkat</b>
                </div>
                <div class="col-6 col-md-9">
                    <b>: </b> <?= $tb_daftar['ting_lmak']; ?>
                </div>
                <div class="col-6 col-md-3">
                    <b>: Juara</b>
                </div>
                <div class="col-6 col-md-9">
                    <b>: </b> <?= $tb_daftar['jra_lmak']; ?>
                </div>
                <div class="col-6 col-md-3">
                    <b>: Sertivikat</b>
                </div>
                <div class="col-6 col-md-9">
                    <b>: </b> <?= $tb_daftar['serti_lmak']; ?>
                </div>
            </div>
        </div>
        <div class="col-md-4 mt-2">
            <b>Non Akademik</b>
        </div>
        <div class="col-md-8 mt-2">
            <div class="row">
                <div class="col-6 col-md-3">
                    <b>: Jenis Lomba</b>
                </div>
                <div class="col-6 col-md-9">
                    <b>: </b> <?= $tb_daftar['jns_lmnak']; ?>
                </div>
                <div class="col-6 col-md-3">
                    <b>: Penyelenggara</b>
                </div>
                <div class="col-6 col-md-9">
                    <b>: </b> <?= $tb_daftar['pny_lmnak']; ?>
                </div>
                <div class="col-6 col-md-3">
                    <b>: Tingkat</b>
                </div>
                <div class="col-6 col-md-9">
                    <b>: </b> <?= $tb_daftar['ting_lmnak']; ?>
                </div>
                <div class="col-6 col-md-3">
                    <b>: Juara</b>
                </div>
                <div class="col-6 col-md-9">
                    <b>: </b> <?= $tb_daftar['jra_lmnak']; ?>
                </div>
                <div class="col-6 col-md-3">
                    <b>: Sertivikat</b>
                </div>
                <div class="col-6 col-md-9">
                    <b>: </b> <?= $tb_daftar['serti_lmnak']; ?>
                </div>
            </div>
        </div>


    </div>

    <div class="mt-5">
        <a href="<?= base_url('assets/foto/' . $tb_daftar['foto_file']); ?>" target="_blank" class="d-block mb-3">
            <img src="<?= base_url('assets/foto/' . $tb_daftar['foto_file']); ?>" alt="<?= $tb_daftar['foto_file']; ?>" class="w-50 d-block mx-auto">
        </a>
        <a href="<?= base_url('assets/kk/' . $tb_daftar['kk_file']); ?>" target="_blank" class="d-block mb-3">
            <img src="<?= base_url('assets/kk/' . $tb_daftar['kk_file']); ?>" alt="<?= $tb_daftar['kk_file']; ?>" class="w-50 d-block mx-auto">
        </a>
        <a href="<?= base_url('assets/akte/' . $tb_daftar['akte_file']); ?>" target="_blank" class="d-block mb-3">
            <img src="<?= base_url('assets/akte/' . $tb_daftar['akte_file']); ?>" alt="<?= $tb_daftar['akte_file']; ?>" class="w-50 d-block mx-auto">
        </a>
        <a href="<?= base_url('assets/nisn/' . $tb_daftar['nisn_file']); ?>" target="_blank" class="d-block mb-3">
            <img src="<?= base_url('assets/nisn/' . $tb_daftar['nisn_file']); ?>" alt="<?= $tb_daftar['nisn_file']; ?>" class="w-50 d-block mx-auto">
        </a>
        <a href="<?= base_url('assets/sertifikat/' . $tb_daftar['serti1_file']); ?>" target="_blank" class="d-block mb-3">
            <img src="<?= base_url('assets/sertifikat/' . $tb_daftar['serti1_file']); ?>" alt="<?= $tb_daftar['serti1_file']; ?>" class="w-50 d-block mx-auto">
        </a>
        <a href="<?= base_url('assets/sertifikat/' . $tb_daftar['serti2_file']); ?>" target="_blank" class="d-block mb-3">
            <img src="<?= base_url('assets/sertifikat/' . $tb_daftar['serti2_file']); ?>" alt="<?= $tb_daftar['serti2_file']; ?>" class="w-50 d-block mx-auto">
        </a>
    </div>



    <?php
    if ($status == '1') {
    ?>
        <button type="button" class="btn btn-primary mt-5" data-toggle="modal" data-target="#exampleModal">
            Verifikasi
        </button>
        <?php
    } else {
        if (!empty($dt_user)) {
        ?>

            <table class="w-50 mt-5 table table-bordered">
                <tr>
                    <td width="200px">Status</td>
                    <td>:</td>
                    <td>
                        <h4 class="text-success rotate-n-15 border border-success text-center py-3">TERVERIFIKASI</h4>
                    </td>

                </tr>
                <tr>
                    <td width="200px">Verifikator</td>
                    <td>:</td>
                    <td><?= $dt_user['fullname'] ?></td>

                </tr>
                <tr>
                    <td>Tanggal</td>
                    <td>:</td>
                    <td><?= date('d M Y', strtotime($dt_user['tgl_verifikasi'])) ?></td>
                </tr>
                <tr>
                    <td>Jam</td>
                    <td>:</td>
                    <td><?= date('H:i:s', strtotime($dt_user['tgl_verifikasi'])) ?></td>
                </tr>
            </table>
    <?php
        }
    }
    ?>
    <a href="<?= base_url('admin/dataPendaftaran'); ?>" class="btn btn-danger mt-5">Back</a>


    <!-- Modal -->
    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Verifikasi Formulir</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form action="/admin/verifikasi/<?= $tb_daftar['id_daftar'] ?>">
                    <input type="hidden" name="user_id" value="<?= user()->id; ?>">
                    <input type="hidden" name="tgl_verif" value="<?= date("Y-m-d H:i:s") ?>">
                    <input type="hidden" name="id_pendaf" value="227<?= date('ymd', strtotime($tb_daftar['created_at'])) . $tb_daftar['id_daftar'] ?>">
                    <div class="modal-body">
                        <div class="row">
                            <div class="col-5">
                                <b>Verifikator</b>
                            </div>
                            <div class="col-7">
                                <b>: </b><?= user()->fullname; ?>
                            </div>
                            <div class="col-5">
                                <b>Tanggal</b>
                            </div>
                            <div class="col-7">
                                <b>: </b><?= date("d M Y") ?>
                            </div>
                            <div class="col-5">
                                <b>Jam</b>
                            </div>
                            <div class="col-7">
                                <b>: </b><?= date("H:i:s") ?>
                            </div>
                        </div>
                    </div>

                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <input type="submit" class="btn btn-primary" value="verifikasi">
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>


<?php $this->endSection();  ?>