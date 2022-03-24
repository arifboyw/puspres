<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Ukt extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        is_logged_in();
        $this->load->helper('url');
        $this->load->model('Ukt_model');
        $this->load->helper('form');
    }
    public function index()
    {
        $data['title'] = 'Data Usulan Bebas UKT';
        $data['user'] = $this->db->get_where('user', ['username' =>
        $this->session->userdata('username')])->row_array();

        $data['usulan'] = $this->Ukt_model->usulan_bebas_ukt();

        $this->load->view('templates/header', $data);
        $this->load->view('templates/topbar_admin', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('ukt/index', $data);
        $this->load->view('templates/footer', $data);
    }

    public function rekapitulasi()
    {
        $data['title'] = 'Rekapitulasi Bebas UKT';
        $data['user'] = $this->db->get_where('user', ['username' =>
        $this->session->userdata('username')])->row_array();

        $data['jadwal_bebas_ukt'] = $this->Ukt_model->jadwal_bebas_ukt();

        $this->load->view('templates/header', $data);
        $this->load->view('templates/topbar_admin', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('ukt/rekapitulasi', $data);
        $this->load->view('templates/footer', $data);
    }

    public function rekap_fakultas()
    {
        $data['title'] = 'Rekapitulasi Bebas UKT';
        $data['user'] = $this->db->get_where('user', ['username' =>
        $this->session->userdata('username')])->row_array();

        $id_jadwal_bebas_ukt = $this->input->get('id_jadwal_bebas_ukt');

        $data['fakultas_rekap'] = $this->Ukt_model->fakultas_rekap();
        $data['level'] = $this->Ukt_model->level();
        $hasil = $this->Ukt_model->rekap($id_jadwal_bebas_ukt);
        $data['rekap'] = $hasil['data'];

        $data['total_universitas'] = $this->Ukt_model->total_universitas($id_jadwal_bebas_ukt);
        $data['total_provinsi'] = $this->Ukt_model->total_provinsi($id_jadwal_bebas_ukt);
        $data['total_regional'] = $this->Ukt_model->total_regional($id_jadwal_bebas_ukt);
        $data['total_nasional'] = $this->Ukt_model->total_nasional($id_jadwal_bebas_ukt);
        $data['total_internasional'] = $this->Ukt_model->total_internasional($id_jadwal_bebas_ukt);

        $this->load->view('templates/header', $data);
        $this->load->view('templates/topbar_admin', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('ukt/rekap_fakultas', $data);
        $this->load->view('templates/footer', $data);
    }
    public function rekap_pembayaran()
    {
        $data['title'] = 'Rekapitulasi Bebas UKT';
        $data['user'] = $this->db->get_where('user', ['username' =>
        $this->session->userdata('username')])->row_array();

        $id_jadwal_bebas_ukt = $this->input->get('id_jadwal_bebas_ukt');
        $data['rekap_pembayaran'] = $this->Ukt_model->rekap_pembayaran($id_jadwal_bebas_ukt);
        $data['totalbantuan'] = $this->Ukt_model->totalbantuan($id_jadwal_bebas_ukt);

        $this->load->view('templates/header', $data);
        $this->load->view('templates/topbar_admin', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('ukt/rekap_pembayaran', $data);
        $this->load->view('templates/footer', $data);
    }

    public function usulan_disetujui()
    {
        $data['title'] = 'Usulan Disetujui';
        $data['user'] = $this->db->get_where('user', ['username' =>
        $this->session->userdata('username')])->row_array();

        $data['jadwal_bebas_ukt'] = $this->Ukt_model->jadwal_bebas_ukt();
        $data['fakultas'] = $this->Ukt_model->tampil_fakultas();
        $data['prodi'] = $this->Ukt_model->tampil_prodi();


        $this->load->view('templates/header', $data);
        $this->load->view('templates/topbar_admin', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('ukt/usulan_disetujui', $data);
        $this->load->view('templates/footer', $data);
    }

    public function tampil_usulan_disetujui()
    {
        $data['title'] = 'Usulan Disetujui';
        $data['user'] = $this->db->get_where('user', ['username' =>
        $this->session->userdata('username')])->row_array();

        $id_jadwal_bebas_ukt = $this->input->get('id_jadwal_bebas_ukt');
        $kode_fak = $this->input->get('kode_fak');
        $kode_prodi = $this->input->get('kode_prodi');
        $nim = $this->input->get('nim');

        $data['usulan'] = $this->Ukt_model->usulan_disetujui($id_jadwal_bebas_ukt, $kode_fak, $kode_prodi, $nim);
        $data['jadwal_bebas_ukt'] = $this->Ukt_model->jadwal_bebas_ukt();
        $data['fakultas'] = $this->Ukt_model->tampil_fakultas();
        $data['prodi'] = $this->Ukt_model->tampil_prodi();

        $this->load->view('templates/header', $data);
        $this->load->view('templates/topbar_admin', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('ukt/tampil_usulan_disetujui', $data);
        $this->load->view('templates/footer', $data);
    }

    public function usulan_ditolak()
    {
        $data['title'] = 'Usulan Ditolak';
        $data['user'] = $this->db->get_where('user', ['username' =>
        $this->session->userdata('username')])->row_array();

        $data['jadwal_bebas_ukt'] = $this->Ukt_model->jadwal_bebas_ukt();
        $data['fakultas'] = $this->Ukt_model->tampil_fakultas();
        $data['prodi'] = $this->Ukt_model->tampil_prodi();

        $this->load->view('templates/header', $data);
        $this->load->view('templates/topbar_admin', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('ukt/usulan_ditolak', $data);
        $this->load->view('templates/footer', $data);
    }

    public function tampil_usulan_ditolak()
    {
        $data['title'] = 'Usulan Ditolak';
        $data['user'] = $this->db->get_where('user', ['username' =>
        $this->session->userdata('username')])->row_array();

        $id_jadwal_bebas_ukt = $this->input->get('id_jadwal_bebas_ukt');
        $kode_fak = $this->input->get('kode_fak');
        $kode_prodi = $this->input->get('kode_prodi');
        $nim = $this->input->get('nim');

        $data['usulan'] = $this->Ukt_model->usulan_ditolak($id_jadwal_bebas_ukt, $kode_fak, $kode_prodi, $nim);
        $data['jadwal_bebas_ukt'] = $this->Ukt_model->jadwal_bebas_ukt();

        $this->load->view('templates/header', $data);
        $this->load->view('templates/topbar_admin', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('ukt/tampil_usulan_ditolak', $data);
        $this->load->view('templates/footer', $data);
    }
    public function penetapan()
    {
        $data['title'] = 'Penetapan Bebas UKT';
        $data['user'] = $this->db->get_where('user', ['username' =>
        $this->session->userdata('username')])->row_array();

        $data['sk'] = $this->Ukt_model->sk();
        $data['sk_valid'] = $this->Ukt_model->sk_valid();

        $this->load->view('templates/header', $data);
        $this->load->view('templates/topbar_admin', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('ukt/penetapan', $data);
        $this->load->view('templates/footer', $data);
    }

    public function detail_sk($id_sk)
    {
        $data['title'] = 'Detail SK';
        $data['user'] = $this->db->get_where('user', ['username' =>
        $this->session->userdata('username')])->row_array();

        $id_sk = decrypt_url($id_sk);

        $sk = $this->Ukt_model->detail_sk($id_sk);
        $data['detail_sk'] = $sk;
        $data['jumlah_diterima'] = $this->Ukt_model->jumlah_diterima($id_sk);
        $data['daftar_diterima'] = $this->Ukt_model->daftar_diterima($id_sk);


        $this->load->view('templates/header', $data);
        $this->load->view('templates/topbar_admin', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('ukt/detail_sk', $data);
        $this->load->view('templates/footer', $data);
    }
    public function detail_prestasi($id_mhs_kompetisi)
    {
        $data['title'] = 'Detail Prestasi';
        $data['user'] = $this->db->get_where('user', ['username' =>
        $this->session->userdata('username')])->row_array();

        $id_mhs_kompetisi = decrypt_url($id_mhs_kompetisi);

        $mhs = $this->Ukt_model->detail_mahasiswa2($id_mhs_kompetisi);
        $data['mhs'] = $mhs;

        $detail_mhs = $this->Ukt_model->detail2($id_mhs_kompetisi);
        $data['mhs2'] = $detail_mhs;


        $this->load->view('templates/header', $data);
        $this->load->view('ukt/detail_prestasi', $data);
    }
    public function tambah_penetapan()
    {
        $data['title'] = 'Penetapan Bebas UKT';
        $data['user'] = $this->db->get_where('user', ['username' =>
        $this->session->userdata('username')])->row_array();

        $data['jadwal_bebas_ukt'] = $this->Ukt_model->jadwal_bebas_ukt();

        $this->load->view('templates/header', $data);
        $this->load->view('templates/topbar_admin', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('ukt/tambah_penetapan', $data);
        $this->load->view('templates/footer', $data);
    }

    public function tambah_penetapan_2()
    {
        $data['title'] = 'Penetapan Bebas UKT';
        $data['user'] = $this->db->get_where('user', ['username' =>
        $this->session->userdata('username')])->row_array();

        $this->form_validation->set_rules('no_sk', 'Nomor SK', 'required|trim|is_unique[sk_bebas_ukt.no_sk]', [
            'is_unique' => 'No. SK ini telah terdaftar',
        ]);

        $this->form_validation->set_rules('id_jadwal_bebas_ukt', 'ID Jadwal Bebas UKT', 'required|trim');
        $this->form_validation->set_rules('judul_sk', 'Judul SK', 'required|trim');
        $this->form_validation->set_rules('tgl_sk', 'Tanggal SK', 'required|trim');
        $this->form_validation->set_rules('ttd', 'Penandatangan', 'required|trim');

        $config['upload_path']          = './assets/upload/sk/';
        $config['allowed_types']        = 'pdf';
        $config['max_size']             = 100000;
        $config['max_width']            = 1024;
        $config['max_height']           = 768;
        $config['encrypt_name']            = TRUE;
        $this->load->library('upload', $config);

        if ($this->form_validation->run() == false) {
            $this->load->view('templates/header', $data);
            $this->load->view('templates/topbar_admin', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('ukt/tambah_penetapan', $data);
            $this->load->view('templates/footer', $data);
        } elseif (!$this->upload->do_upload('filesk')) {
            $error = array('error' => $this->upload->display_errors());
            $this->session->set_flashdata('message', '<div class="alert alert-warning" role="alert">
        Format file salah!, format file yang diperbolehkan adalah PDF.</div>');
            redirect('ukt/tambah_penetapan');
        } else {
            $data = [
                'id_jadwal_bebas_ukt' => htmlspecialchars($this->input->post('id_jadwal_bebas_ukt', true)),
                'no_sk' => htmlspecialchars($this->input->post('no_sk', true)),
                'judul_sk' => htmlspecialchars($this->input->post('judul_sk', true)),
                'tgl_sk' => htmlspecialchars($this->input->post('tgl_sk', true)),
                'ttd' => htmlspecialchars($this->input->post('ttd', true)),
            ];
            $data['nama_berkas'] = $this->upload->data("file_name");
            $data['tipe_berkas'] = $this->upload->data('file_ext');
            $data['ukuran_berkas'] = $this->upload->data('file_size');
            $this->db->insert('sk_bebas_ukt', $data);
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
        SK Penetapan telah tersimpan!</div>');
            redirect('ukt/penetapan');
        }
    }

    public function tambah_penetapan_3($id_sk)
    {
        $data['title'] = 'Penetapan Bebas UKT';
        $data['user'] = $this->db->get_where('user', ['username' =>
        $this->session->userdata('username')])->row_array();

        $id_sk = decrypt_url($id_sk);

        $data['penerima'] = $this->db->get_where('sk_bebas_ukt', ['id_sk' => $id_sk])->row_array();
        $data['penerima_ok'] = $this->db->get_where('sk_bebas_ukt', ['id_sk' => $id_sk])->row_array();
        $data['jumlah_pengusul'] = $this->Ukt_model->jumlah_pengusul($id_sk);
        $data['jumlah_ditetapkan'] = $this->Ukt_model->jumlah_ditetapkan($id_sk);

        $this->load->view('templates/header', $data);
        $this->load->view('templates/topbar_admin', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('ukt/tambah_penetapan_3', $data);
        $this->load->view('templates/footer', $data);
    }

    public function tambah_penetapan_4($id_sk)
    {
        $data['user'] = $this->db->get_where('user', ['username' =>
        $this->session->userdata('username')])->row_array();

        $id_sk = decrypt_url($id_sk);

        $id_sk = $this->input->post('id_sk');
        $nim = $this->input->post('nim');
        $status_sk = $this->input->post('status_sk');
        $id_jadwal_bebas_ukt = $this->input->post('id_jadwal_bebas_ukt');

        $data['jadwal_bebas_ukt'] = $this->Ukt_model->jadwal_bebas_ukt();

        $this->Ukt_model->tambah_penerima($nim, $status_sk, $id_jadwal_bebas_ukt);

        $data['penerima'] = $this->db->get_where('sk_bebas_ukt', ['id_sk' => $id_sk])->row_array();

        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
        <i class="icon fas fa-check"></i>
        Berhasil menambahkan penerima.</div>');
        redirect('ukt/tambah_penetapan_3/' . encrypt_url($id_sk));
    }

    public function finalisasi_penetapan($id_sk)
    {
        $data['user'] = $this->db->get_where('user', ['username' =>
        $this->session->userdata('username')])->row_array();

        $id_sk = decrypt_url($id_sk);

        $id_sk = $this->input->post('id_sk');
        $status_sk = $this->input->post('status_sk');

        $data['jadwal_bebas_ukt'] = $this->Ukt_model->jadwal_bebas_ukt();

        $this->Ukt_model->finalisasi_penetapan($status_sk, $id_sk);


        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
        <i class="icon fas fa-check"></i>
        Data terkirim, silahkan akses menu Arsip untuk mengakses historis penetapan.</div>');
        redirect('ukt/penetapan');
    }


    public function validasi($id_bebas_ukt)
    {
        $data['title'] = 'Validasi Usulan Bebas UKT';
        $data['user'] = $this->db->get_where('user', ['username' =>
        $this->session->userdata('username')])->row_array();

        $id_bebas_ukt = decrypt_url($id_bebas_ukt);

        $mhs = $this->Ukt_model->detail_mahasiswa($id_bebas_ukt);
        $data['mhs'] = $mhs;

        $detail_mhs = $this->Ukt_model->detail($id_bebas_ukt);
        $data['mhs2'] = $detail_mhs;

        $data['semester'] = $this->Ukt_model->tampil_semester();

        $this->load->view('templates/header', $data);
        $this->load->view('templates/topbar_admin', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('ukt/validasi', $data);
        $this->load->view('templates/footer', $data);
    }
    function download_dokumen($id_upload)
    {
        $data = $this->db->get_where('upload_bukti_kompetisi', ['id_upload' => $id_upload])->row();
        force_download('assets/upload/kompetisi/' . $data->nama_berkas, NULL);
    }

    function preview_dokumen($id_upload)
    {
        $dokumen = $this->Ukt_model->preview_dokumen($id_upload);
        $data['dokumen'] = $dokumen;

        $this->load->view('templates/header', $data);
        $this->load->view('ukt/preview_dokumen', $data);
    }
    public function entri_validasi($id_bebas_ukt)
    {
        $id_bebas_ukt = decrypt_url($id_bebas_ukt);

        $nama_semester = $this->input->post('nama_semester');
        $semester = implode(", ", $nama_semester);

        $jumlah_semester = $this->input->post('jumlah_semester');
        $usul_bebas_ukt = $this->input->post('usul_bebas_ukt');
        $ket_bebas_ukt = $this->input->post('ket_bebas_ukt');
        $validasi_bebas_ukt = $this->input->post('validasi_bebas_ukt');
        $user_bebas_ukt = $this->input->post('user_bebas_ukt');
        $tgl_validasi = $this->input->post('tgl_validasi');

        $this->Ukt_model->status_validasi(
            $semester,
            $jumlah_semester,
            $usul_bebas_ukt,
            $ket_bebas_ukt,
            $validasi_bebas_ukt,
            $user_bebas_ukt,
            $tgl_validasi,
            $id_bebas_ukt
        );

        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
        <i class="icon fas fa-check"></i>
        Data usulan bebas UKT/SPP telah divalidasi.</div>');

        redirect('ukt');
    }
    public function entri_validasi_2($id_bebas_ukt)
    {
        $id_bebas_ukt = decrypt_url($id_bebas_ukt);

        $usul_bebas_ukt = $this->input->post('usul_bebas_ukt');
        $ket_bebas_ukt = $this->input->post('ket_bebas_ukt');
        $validasi_bebas_ukt = $this->input->post('validasi_bebas_ukt');
        $user_bebas_ukt = $this->input->post('user_bebas_ukt');
        $tgl_validasi = $this->input->post('tgl_validasi');

        $this->Ukt_model->status_validasi_2(
            $usul_bebas_ukt,
            $ket_bebas_ukt,
            $validasi_bebas_ukt,
            $user_bebas_ukt,
            $tgl_validasi,
            $id_bebas_ukt
        );

        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
        <i class="icon fas fa-check"></i>
        Data usulan bebas UKT/SPP telah divalidasi.</div>');

        redirect('ukt');
    }
}
