<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Prestasi extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        is_logged_in();
        $this->load->helper('url');
        $this->load->model('Prestasi_model');
        $this->load->helper('form');
    }

    public function index()
    {
        $data['title'] = 'Daftar Usulan';
        $data['user'] = $this->db->get_where('user', ['username' =>
        $this->session->userdata('username')])->row_array();

        $data['mhspenerima'] = $this->Prestasi_model->opt_fakultas($data['user']['akses_fakultas']);

        $this->load->view('templates/header', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('templates/sidebar_user', $data);
        $this->load->view('prestasi/index', $data);
        $this->load->view('templates/footer', $data);
    }

    public function rekapitulasi()
    {
        $data['title'] = 'Rekapitulasi';
        $data['user'] = $this->db->get_where('user', ['username' =>
        $this->session->userdata('username')])->row_array();

        $tahun_kegiatan = $this->input->get('tahun_kegiatan');
        $data['tahun_kegiatan'] = $tahun_kegiatan;
        $data['prodi_rekap'] = $this->Prestasi_model->prodi_rekap($data['user']['akses_fakultas']);
        $data['level'] = $this->Prestasi_model->level();
        $hasil = $this->Prestasi_model->rekap($tahun_kegiatan, $data['user']['akses_fakultas']);
        $data['rekap'] = $hasil['data'];

        $this->load->view('templates/header', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('templates/sidebar_user', $data);
        $this->load->view('prestasi/rekapitulasi', $data);
        $this->load->view('templates/footer', $data);
    }
    public function daftar_prestasi_mandiri()
    {
        $data['title'] = 'Prestasi Mandiri Disetujui';
        $data['user'] = $this->db->get_where('user', ['username' =>
        $this->session->userdata('username')])->row_array();

        $data['mhs'] = $this->Prestasi_model->daftar_prestasi_mandiri($data['user']['akses_fakultas']);

        $this->load->view('templates/header', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('templates/sidebar_user', $data);
        $this->load->view('prestasi/daftar_prestasi_mandiri', $data);
        $this->load->view('templates/footer', $data);
    }

    public function validasi($id_mhs_kompetisi)
    {
        $data['title'] = 'Validasi Usulan Prestasi Mandiri';
        $data['user'] = $this->db->get_where('user', ['username' =>
        $this->session->userdata('username')])->row_array();

        $id_mhs_kompetisi = decrypt_url($id_mhs_kompetisi);

        $mhs = $this->Prestasi_model->detail_mahasiswa($id_mhs_kompetisi);
        $data['mhs'] = $mhs;

        $detail_mhs = $this->Prestasi_model->detail($id_mhs_kompetisi);
        $data['mhs2'] = $detail_mhs;

        $this->load->view('templates/header', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('templates/sidebar_user', $data);
        $this->load->view('prestasi/validasi', $data);
        $this->load->view('templates/footer', $data);
    }

    public function entri_validasi($id_mhs_kompetisi)
    {
        $id_mhs_kompetisi = decrypt_url($id_mhs_kompetisi);

        $poin_kompetisi = $this->input->post('poin_kompetisi');
        $ket_validasi = $this->input->post('ket_validasi');
        $status_validasi = $this->input->post('status_validasi');
        $user_validasi = $this->input->post('user_validasi');
        $this->Prestasi_model->status_validasi($poin_kompetisi, $user_validasi, $ket_validasi, $status_validasi, $id_mhs_kompetisi);

        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
        <i class="icon fas fa-check"></i>
        Pengajuan prestasi mandiri telah divalidasi, selanjutnya data mahasiswa ini akan ditampilkan di <b>Daftar Prestasi</b>.</div>');

        redirect('prestasi');
    }
    public function entri_konfirmasi($id_mhs_kompetisi)
    {
        $id_mhs_kompetisi = decrypt_url($id_mhs_kompetisi);

        $konfirmasi = $this->input->post('konfirmasi');
        $ket_validasi = $this->input->post('ket_validasi');
        $user_validasi = $this->input->post('user_validasi');
        $this->Prestasi_model->entri_konfirmasi($user_validasi, $ket_validasi,  $konfirmasi, $id_mhs_kompetisi);

        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
        <i class="icon fas fa-check"></i>
        Status pengajuan telah diturunkan ke draft!</div>');

        redirect('prestasi');
    }
    function download_dokumen($id_upload)
    {
        $data = $this->db->get_where('upload_bukti_kompetisi', ['id_upload' => $id_upload])->row();
        force_download('assets/upload/kompetisi/' . $data->nama_berkas, NULL);
    }

    function preview_dokumen($id_upload)
    {
        $dokumen = $this->Prestasi_model->preview_dokumen($id_upload);
        $data['dokumen'] = $dokumen;

        $this->load->view('templates/header', $data);
        $this->load->view('mahasiswa/preview_dokumen', $data);
    }
}
