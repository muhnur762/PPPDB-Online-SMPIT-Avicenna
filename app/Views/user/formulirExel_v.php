<!DOCTYPE html>
<html lang="en">

<head>
    <style>
        .kop tr td {
            text-align: center;
        }

        .isi tr td {
            vertical-align: top;
        }

        h3 {
            color: red;
        }

        h2 {
            color: blue;

        }

        .verif {
            color: green;
            border: 1px solid green;
            text-align: center;
            padding: 10px;
            margin: 20px 50px;
            transform: rotate(-10deg) translateX(-1%);
        }
    </style>
</head>

<body>
    <table class="kop" align="center">
        <tr>
            <td rowspan="">
                <img src="/var/www/avc/public/other/logoavc.png" width="100px" height="100px" alt="">
                <!-- <img src="{{asset('other/logoavc.png')}}" alt="Logo" height="75px"> -->
            </td>
            <td>
                <h1 style="line-height:0%;">FORMULIR PENDAFTARAN</h1>
                <p style="color:green; line-height:0%; letter-spacing: 5px;">PENERIMAAN PESERTA DIDIK BARU</p>
                <p style=" line-height:0%; letter-spacing: 5px; ">TAHUN PELAJARAN 2023 / 2024</p>
                <p style=" line-height:0%; font-weight:bold; color:darkblue">SMP ISLAM TERPADU AVICENNA</p>
            </td>
        </tr>
        <tr>
            <td colspan="2">
                <p style=" line-height:0%;">Perumahan Vila Indah Permai Blok G.26, Kel. Teluk Pucung, Kec. Bekasi Utara, Kota Bekasi.</p>
                <p style=" line-height:0%;">No. Tlp : 021-88878646</p>
                <hr>
            </td>

        </tr>
    </table>
    <h2>ID #227<?= date('ymd', strtotime($tb_daftar['created_at'])) . $tb_daftar['id_daftar'] ?></h2>
    <table class="isi">
        <tr>
            <td colspan="3">
                <h3>A. KETERANGAN TENTANG DIRI CALON PESERTA DIDIK</h3>
            </td>
        </tr>
        <tr>
            <td width="270px"> <b>Nama</b></td>
            <td width="200px"><b>: <?= $tb_daftar['nama']; ?></b></td>
            <td width="200px"></td>
        </tr>
        <tr>
            <td>
                <b>Nomor Induk Kependudukan (NIK)</b>
            </td>
            <td>
                <b>: </b><?= $tb_daftar['nik']; ?>
            </td>
            <td>

            </td>
        </tr>
        <tr>
            <td>
                <b>Nomor Induk Siswa Nasional (NISN)</b>
            </td>
            <td>
                <b>: </b><?= $tb_daftar['nisn']; ?>
            </td>
            <td></td>
        </tr>
        <tr>
            <td>
                <b>Kewarganegaraan</b>
            </td>
            <td>
                <b>: </b><?= $tb_daftar['kewarganegaraan']; ?>
            </td>
            <td></td>
        </tr>
        <tr>
            <td>
                <b>Jenis Kelamin</b>
            </td>
            <td>
                <b>: </b><?= $tb_daftar['jk']; ?>
            </td>
            <td></td>
        </tr>
        <tr>
            <td>
                <b>Tempat & Tanggal Lahir</b>
            </td>
            <td>
                <b>: </b><?= $tb_daftar['tmp_lahir'] . ' , ' . date('d M Y', strtotime($tb_daftar['tgl_lahir'])); ?>
            </td>
            <td></td>
        </tr>
        <tr>
            <td>
                <b>Nomor Akte</b>
            </td>
            <td>
                <b>: </b><?= $tb_daftar['no_akte']; ?>
            </td>
            <td></td>
        </tr>
        <tr>
            <td>
                <b>Agama</b>
            </td>
            <td>
                <b>: </b><?= $tb_daftar['agama']; ?>
            </td>
            <td></td>
        </tr>
        <tr>
            <td>
                <b>Status Dalam Keluarga</b>
            </td>
            <td>
                <b>: </b><?= $tb_daftar['status_siswa']; ?>
            </td>
            <td></td>
        </tr>
        <tr>
            <td colspan="3">
                <h3>B. KETERANGAN JUMLAH SAUDARA DARI CALON PESERTA DIDIK</h3>
            </td>
        </tr>
        <tr>
            <td>
                <b>Anak Keberapa</b>
            </td>
            <td>
                <b>: </b><?= $tb_daftar['ank_ke']; ?>
            </td>
            <td></td>
        </tr>
        <tr>
            <td>
                <b>Jumlah Saudara Kandung</b>
            </td>
            <td>
                <b>: </b><?= $tb_daftar['jml_sdr_kdg']; ?>
            </td>
            <td></td>
        </tr>
        <tr>
            <td>
                <b>Jumlah Saudara Angkat</b>
            </td>
            <td>
                <b>: </b><?= $tb_daftar['jml_sdr_akt']; ?>
            </td>
            <td></td>
        </tr>
        <tr>
            <td>
                <b>Jumlah saudara Tiri</b>
            </td>
            <td>
                <b>: </b><?= $tb_daftar['jml_sdr_tri']; ?>
            </td>
            <td></td>
        </tr>
        <tr>
            <td>
                <b>Saudara Yang Bersekolah di Avicenna</b>
            </td>
            <td colspan="2">
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
            </td>
        </tr>
        <tr>
            <td colspan="3">
                <h3>C. KETERANGAN TEMPAT TINGGAL CALON PESERTA DIDIK</h3>
            </td>
        </tr>
        <tr>
            <td>
                <b>Tempat Tinggal Sesuai KK</b>
            </td>
            <td>
                <b>: </b><?= ucfirst($tb_daftar['sesuai_kk']); ?>
            </td>
            <td></td>
        </tr>
        <tr>
            <td>
                <b>Daerah / Perumahan</b>
            </td>
            <td>
                <b>: </b><?= $tb_daftar['daerah']; ?>
            </td>
            <td></td>
        </tr>
        <tr>
            <td>
                <b>Nama Jalan</b>
            </td>
            <td>
                <b>: </b><?= $tb_daftar['jl']; ?>
            </td>
            <td></td>
        </tr>
        <tr>
            <td>
                <b>Desa / Kelurahan</b>
            </td>
            <td>
                <b>: </b><?= $tb_daftar['desa_kel']; ?>
            </td>
            <td></td>
        </tr>
        <tr>
            <td>
                <b>Kecamatan</b>
            </td>
            <td>
                <b>: </b><?= $tb_daftar['kecamatan']; ?>
            </td>
            <td></td>
        </tr>
        <tr>
            <td>
                <b>RT / RW</b>
            </td>
            <td>
                <b>: </b><?= $tb_daftar['rt'] . ' / ' . $tb_daftar['rw']; ?>
            </td>
            <td></td>
        </tr>
        <tr>
            <td>
                <b>Nomor Rumah</b>
            </td>
            <td>
                <b>: </b><?= $tb_daftar['no_rmh']; ?>
            </td>
            <td></td>
        </tr>
        <tr>
            <td>
                <b>Kota / Kabupaten</b>
            </td>
            <td>
                <b>: </b><?= $tb_daftar['kab_kota']; ?>
            </td>
            <td></td>
        </tr>
        <tr>
            <td>
                <b>Kode Pos</b>
            </td>
            <td>
                <b>: </b><?= $tb_daftar['kd_pos']; ?>
            </td>
            <td></td>
        </tr>
        <tr>
            <td>
                <b>Jarak Rumah Dengan Avicenna</b>
            </td>
            <td>
                <b>: </b><?= $tb_daftar['jrk'] . " Kilometer" ?>
            </td>
            <td></td>
        </tr>
        <tr>
            <td>
                <b>Tinggal Bersama</b>
            </td>
            <td>
                <b>: </b><?= $tb_daftar['tigl_bersama']; ?>
            </td>
            <td></td>
        </tr>
        <tr>
            <td>
                <b>Transportasi Ke Avicenna</b>
            </td>
            <td>
                <b>: </b><?= $tb_daftar['transportasi']; ?>
            </td>
            <td></td>
        </tr>
        <tr>
            <td colspan="3">
                <h3>D. KETERANGAN JAMINAN SOSIAL PEMERINTAH</h3>
            </td>
        </tr>
        <tr>
            <td>
                <b>Kartu Keluarga Sejahtera (KKS)</b>
            </td>
            <td>
                <b>: </b><?= (empty($tb_daftar['kks'])) ? '-' : $tb_daftar['kks'] ?>
            </td>
            <td></td>
        </tr>
        <tr>
            <td>
                <b>Kartu Perlindungan Sosial (KPS)</b>
            </td>
            <td>
                <b>: </b><?= (empty($tb_daftar['kps'])) ? '-' : $tb_daftar['kps'] ?>
            </td>
            <td></td>
        </tr>
        <tr>
            <td>
                <b>Kartu Indonesia Pintar (KIP)</b>
            </td>
            <td>
                <b>: </b><?= (empty($tb_daftar['kip'])) ? '-' : $tb_daftar['kip'] ?>
            </td>
            <td></td>
        </tr>
        <tr>
            <td>
                <b>Terdaftar pada DTKS (Data Terpadu Kesejahteraan Sosial (DTKS) Kemensos)</b>
            </td>
            <td>
                <b>: </b><?= (empty($tb_daftar['dtks'])) ? 'Tidak' : ucfirst($tb_daftar['dtks']) ?>
            </td>
            <td></td>
        </tr>
        <tr>
            <td colspan="3">
                <h3>E. KETERANGAN KESEHATAN CALON PESERTA DIDIK</h3>
            </td>
        </tr>
        <tr>
            <td>
                <b>Golongan Darah</b>
            </td>
            <td>
                <b>: </b><?= $tb_daftar['gol_dar']; ?>
            </td>
            <td></td>
        </tr>
        <tr>
            <td>
                <b>Penyakit Berat Yang Pernah Diderita</b>
            </td>
            <td colspan="2">
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
            </td>

        </tr>
        <tr>
            <td>
                <b>Kelainan jasmani</b>
            </td>
            <td>
                <b>: </b><?= ($tb_daftar['kl_jasmani']) ? $tb_daftar['kl_jasmani'] : '-'; ?>
            </td>
            <td></td>
        </tr>
        <tr>
            <td>

                <b>Kelainan Jasmani Lain</b>
            </td>
            <td>
                <b>: </b><?= ($tb_daftar['kl_jasmani_lain']) ? $tb_daftar['kl_jasmani_lain'] : '-'; ?>
            </td>
            <td></td>
        </tr>
        <tr>
            <td>

                <b>Tinggi Badan</b>
            </td>
            <td>
                <b>: </b><?= $tb_daftar['tb'] . ' Cm'; ?>
            </td>
            <td></td>
        </tr>
        <tr>
            <td>

                <b>Berat Badan</b>
            </td>
            <td>
                <b>: </b><?= $tb_daftar['bb'] . ' Kg'; ?>
            </td>
            <td></td>
        </tr>
        <tr>
            <td>

                <b>Status Vaksin Covid-19</b>
            </td>
            <td>
                <b>: </b><?= $tb_daftar['vaksin']; ?>

            </td>
            <td></td>
        </tr>
        <tr>
            <td>

                <b>Pernah Terpapar Covid-19</b>
            </td>
            <td>
                <b>: </b><?= $tb_daftar['covid']; ?>

            </td>
            <td></td>
        </tr>
        <tr>
            <td colspan="3">
                <h3>F. KETERANGAN PENDIDIKAN SEBELUMNYA</h3>
            </td>
        </tr>
        <tr>
            <td>

                <b>Nama SD / MI</b>
            </td>
            <td>
                <b>: </b><?= $tb_daftar['nama_skl']; ?>

            </td>
            <td></td>
        </tr>
        <tr>
            <td>

                <b>Status Sekolah</b>
            </td>
            <td>
                <b>: </b><?= $tb_daftar['st_sekolah']; ?>

            </td>
            <td></td>
        </tr>
        <tr>
            <td rowspan="3">


                <b>Alamat sekolah</b>
            </td>
            <td>
                <b>: Kecamatan</b>

            </td>
            <td>
                <b>: </b> <?= $tb_daftar['kecamatan_skl']; ?>
            </td>
        </tr>
        <tr>

            <td>
                <b>: Kota / Kabupaten</b>

            </td>
            <td>
                <b>: </b> <?= $tb_daftar['kotkab_skl']; ?>
            </td>
        </tr>
        <tr>

            <td>
                <b>: Provinsi</b>


            </td>
            <td>
                <b>: </b> <?= $tb_daftar['prov_skl']; ?>
            </td>
        </tr>
        <tr>
            <td colspan="3">
                <h3>G. KETERANGAN TENTANG AYAH</h3>
            </td>
        </tr>
        <tr>
            <td>
                <b>Nama</b>
            </td>
            <td>
                <b>: </b><?= $tb_daftar['nm_ay']; ?>
            </td>
            <td></td>
        </tr>
        <tr>
            <td>
                <b>Nomor Induk Kependudukan (NIK)</b>
            </td>
            <td>
                <b>: </b><?= $tb_daftar['nik_ay'] ?>
            </td>
            <td></td>

        </tr>
        <tr>
            <td>
                <b>Tempat & Tanggal Lahir</b>
            </td>
            <td>
                <b>: </b><?= $tb_daftar['tmplhr_ay'] . ' , ' . date('d M Y', strtotime($tb_daftar['tgllhr_ay'])); ?>
            </td>
            <td></td>

        </tr>
        <tr>
            <td>
                <b>Agama</b>
            </td>
            <td>
                <b>: </b><?= $tb_daftar['agama_ay'] ?>
            </td>
            <td></td>

        </tr>
        <tr>
            <td>
                <b>Kewarganegaraan</b>
            </td>
            <td>
                <b>: </b><?= $tb_daftar['wrg_ay']; ?>
            </td>
            <td></td>

        </tr>
        <tr>
            <td>
                <b>Pendidikan</b>
            </td>
            <td>
                <b>: </b><?= $tb_daftar['pend_ay']; ?>
            </td>
            <td></td>
        </tr>
        <tr>
            <td>
                <b>Penghasilan</b>
            </td>
            <td>
                <b>: </b><?= $tb_daftar['penghs_ay']; ?>
            </td>
            <td></td>

        </tr>
        <tr>
            <td>
                <b>Alamat</b>
            </td>
            <td>
                <b>: </b><?= $tb_daftar['alamat_ay']; ?>
            </td>
            <td></td>

        </tr>
        <tr>
            <td>
                <b>No. Telp Rumah</b>
            </td>
            <td>
                <b>: </b><?= $tb_daftar['tlprmh_ay']; ?>
            </td>
            <td></td>

        </tr>
        <tr>
            <td>
                <b>No. Handphone</b>
            </td>
            <td>
                <b>: </b><?= $tb_daftar['hp_ay']; ?>
            </td>
            <td></td>

        </tr>
        <tr>
            <td>
                <b>No. Telp Kantor</b>
            </td>
            <td>
                <b>: </b><?= $tb_daftar['tlpkntr_ay']; ?>
            </td>
            <td></td>

        </tr>
        <tr>
            <td>
                <b>Keterangan</b>
            </td>
            <td>
                <b>: </b><?= $tb_daftar['ket_ay']; ?>
            </td>
            <td></td>

        </tr>
        <tr>
            <td colspan="3">
                <h3>G. KETERANGAN TENTANG IBU</h3>
            </td>
        </tr>
        <tr>
            <td>
                <b>Nama</b>
            </td>
            <td>
                <b>: </b><?= $tb_daftar['nm_ib']; ?>
            </td>
            <td></td>

        </tr>
        <tr>
            <td>
                <b>Nomor Induk Kependudukan (NIK)</b>
            </td>
            <td>
                <b>: </b><?= $tb_daftar['nik_ib'] ?>
            </td>
            <td></td>

        </tr>
        <tr>
            <td>
                <b>Tempat & Tanggal Lahir</b>
            </td>
            <td>
                <b>: </b><?= $tb_daftar['tmplhr_ib'] . ' , ' . date('d M Y', strtotime($tb_daftar['tgllhr_ib'])); ?>
            </td>
            <td></td>

        </tr>
        <tr>
            <td>
                <b>Agama</b>
            </td>
            <td>
                <b>: </b><?= $tb_daftar['agama_ib'] ?>
            </td>
            <td></td>

        </tr>
        <tr>
            <td>
                <b>Kewarganegaraan</b>
            </td>
            <td>
                <b>: </b><?= $tb_daftar['wrg_ib']; ?>
            </td>
            <td></td>

        </tr>
        <tr>
            <td>
                <b>Pendidikan</b>
            </td>
            <td>
                <b>: </b><?= $tb_daftar['pend_ib']; ?>
            </td>
            <td></td>

        </tr>
        <tr>
            <td>
                <b>Penghasilan</b>
            </td>
            <td>
                <b>: </b><?= $tb_daftar['penghs_ib']; ?>
            </td>
            <td></td>

        </tr>
        <tr>
            <td>
                <b>Alamat</b>
            </td>
            <td>
                <b>: </b><?= $tb_daftar['alamat_ib']; ?>
            </td>
            <td></td>

        </tr>
        <tr>
            <td>
                <b>No. Telp Rumah</b>
            </td>
            <td>
                <b>: </b><?= $tb_daftar['tlprmh_ib']; ?>
            </td>
            <td></td>

        </tr>
        <tr>
            <td>
                <b>No. Handphone</b>
            </td>
            <td>
                <b>: </b><?= $tb_daftar['hp_ib']; ?>
            </td>
            <td></td>

        </tr>
        <tr>
            <td>
                <b>No. Telp Kantor</b>
            </td>
            <td>
                <b>: </b><?= $tb_daftar['tlpkntr_ib']; ?>
            </td>
            <td></td>

        </tr>
        <tr>
            <td>
                <b>Keterangan</b>
            </td>
            <td>
                <b>: </b><?= $tb_daftar['ket_ib']; ?>
            </td>
            <td></td>

        </tr>
        <tr>
            <td colspan="3">
                <h3>G. KETERANGAN TENTANG WALI</h3>
            </td>
        </tr>
        <tr>
            <td>
                <b>Nama</b>
            </td>
            <td>
                <b>: </b><?= $tb_daftar['nm_wl']; ?>
            </td>
            <td></td>

        </tr>
        <tr>
            <td>
                <b>Nomor Induk Kependudukan (NIK)</b>
            </td>
            <td>
                <b>: </b><?= $tb_daftar['nik_wl'] ?>
            </td>
            <td></td>

        </tr>
        <tr>
            <td>
                <b>Tempat & Tanggal Lahir</b>
            </td>
            <td>
                <b>: </b><?= $tb_daftar['tmplhr_wl'] . ' , ' . date('d M Y', strtotime($tb_daftar['tgllhr_wl'])); ?>
            </td>
            <td></td>

        </tr>
        <tr>
            <td>
                <b>Agama</b>
            </td>
            <td>
                <b>: </b><?= $tb_daftar['agama_wl'] ?>
            </td>
            <td></td>

        </tr>
        <tr>
            <td>
                <b>Kewarganegaraan</b>
            </td>
            <td>
                <b>: </b><?= $tb_daftar['wrg_wl']; ?>
            </td>
            <td></td>

        </tr>
        <tr>
            <td>
                <b>Pendidikan</b>
            </td>
            <td>
                <b>: </b><?= $tb_daftar['pend_wl']; ?>
            </td>
            <td></td>

        </tr>
        <tr>
            <td>
                <b>Penghasilan</b>
            </td>
            <td>
                <b>: </b><?= $tb_daftar['penghs_wl']; ?>
            </td>
            <td></td>

        </tr>
        <tr>
            <td>
                <b>Alamat</b>
            </td>
            <td>
                <b>: </b><?= $tb_daftar['alamat_wl']; ?>
            </td>
            <td></td>

        </tr>
        <tr>
            <td>
                <b>No. Telp Rumah</b>
            </td>
            <td>
                <b>: </b><?= $tb_daftar['tlprmh_wl']; ?>
            </td>
            <td></td>

        </tr>
        <tr>
            <td>
                <b>No. Handphone</b>
            </td>
            <td>
                <b>: </b><?= $tb_daftar['hp_wl']; ?>
            </td>
            <td></td>

        </tr>
        <tr>
            <td>
                <b>No. Telp Kantor</b>
            </td>
            <td>
                <b>: </b><?= $tb_daftar['tlpkntr_wl']; ?>
            </td>
            <td></td>

        </tr>
        <tr>
            <td>
                <b>Keterangan</b>
            </td>
            <td>
                <b>: </b><?= $tb_daftar['ket_wl']; ?>
            </td>
            <td></td>

        </tr>
        <tr>
            <td colspan="3">
                <h3>J. KETERANGAN PRESTASI TERAKHIR YANG PERNAH DIMILIKI SISWA</h3>
            </td>
        </tr>
        <tr>
            <td rowspan="5">
                <b>Akademik</b>
            </td>
            <td>
                <b>: Jenis Lomba</b>
            </td>

            <td>
                <b>: </b> <?= $tb_daftar['jns_lmak']; ?>
            </td>
        </tr>
        <tr>

            <td>
                <b>: Penyelenggara</b>
            </td>

            <td>
                <b>: </b> <?= $tb_daftar['pny_lmak']; ?>
            </td>
        </tr>
        <tr>

            <td>
                <b>: Tingkat</b>
            </td>

            <td>
                <b>: </b> <?= $tb_daftar['ting_lmak']; ?>
            </td>
        </tr>
        <tr>

            <td>
                <b>: Juara</b>
            </td>

            <td>
                <b>: </b> <?= $tb_daftar['jra_lmak']; ?>
            </td>
        </tr>
        <tr>

            <td>
                <b>: Sertivikat</b>
            </td>

            <td>
                <b>: </b> <?= $tb_daftar['serti_lmak']; ?>
            </td>
        </tr>
        <tr>
            <td rowspan="5">
                <b>Non Akademik</b>
            </td>
            <td>
                <b>: Jenis Lomba</b>
            </td>

            <td>
                <b>: </b> <?= $tb_daftar['jns_lmnak']; ?>
            </td>
        </tr>
        <tr>

            <td>
                <b>: Penyelenggara</b>
            </td>

            <td>
                <b>: </b> <?= $tb_daftar['pny_lmnak']; ?>
            </td>
        </tr>
        <tr>

            <td>
                <b>: Tingkat</b>
            </td>

            <td>
                <b>: </b> <?= $tb_daftar['ting_lmnak']; ?>
            </td>
        </tr>
        <tr>

            <td>
                <b>: Juara</b>
            </td>

            <td>
                <b>: </b> <?= $tb_daftar['jra_lmnak']; ?>
            </td>
        </tr>
        <tr>

            <td>
                <b>: Sertivikat</b>
            </td>

            <td>
                <b>: </b> <?= $tb_daftar['serti_lmnak']; ?>
            </td>
        </tr>

    </table>
    <table width="50%" style="margin-top: 30px;" align="center" border="1" cellspacing="0">
        <tr>
            <th colspan="3" align="center">STATUS</th>
        </tr>
        <tr>

            <td colspan="3">
                <h4 class="verif">TERVERIFIKASI</h4>
            </td>

        </tr>
        <tr>
            <td>Verifikator</td>
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



</body>

</html>