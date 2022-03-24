<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Kompetisi extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        is_logged_in();
        $this->load->helper('url');
        $this->load->model('Kompetisi_model');
        $this->load->helper('form');
        $this->load->library('encrypt');
    }

    public function index()
    {
        $data['title'] = 'Usulan Prestasi Mandiri';
        $data['user'] = $this->db->get_where('user', ['username' =>
        $this->session->userdata('username')])->row_array();

        $mhs = $this->Kompetisi_model->mahasiswa($data['user']['username']);
        $data['detail'] = $mhs;
        $data['jadwal'] = $this->Kompetisi_model->jadwal();
        $data['draft'] = $this->Kompetisi_model->draf($data['user']['username']);
        $data['valid'] = $this->Kompetisi_model->valid($data['user']['username']);

        $this->load->view('templates/header', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('templates/sidebar_user', $data);
        $this->load->view('mahasiswa/input_data_prestasi', $data);
        $this->load->view('templates/footer', $data);
    }

    public function daftar_prestasi()
    {
        $data['title'] = 'Daftar Prestasi';
        $data['user'] = $this->db->get_where('user', ['username' =>
        $this->session->userdata('username')])->row_array();

        $mhs = $this->Kompetisi_model->mahasiswa($data['user']['username']);
        $data['detail'] = $mhs;
        $data['valid'] = $this->Kompetisi_model->daftar_prestasi($data['user']['username']);

        $this->load->view('templates/header', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('templates/sidebar_user', $data);
        $this->load->view('mahasiswa/daftar_prestasi', $data);
        $this->load->view('templates/footer', $data);
    }

    public function usulan_bebas_ukt()
    {
        $data['title'] = 'Usulan Bebas UKT';
        $data['user'] = $this->db->get_where('user', ['username' =>
        $this->session->userdata('username')])->row_array();

        $mhs = $this->Kompetisi_model->mahasiswa($data['user']['username']);
        $data['jadwal_bebas_ukt'] = $this->Kompetisi_model->jadwal_bebas_ukt();
        $data['detail'] = $mhs;
        $data['valid'] = $this->Kompetisi_model->usulan_bebas_ukt($data['user']['username']);

        $this->load->view('templates/header', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('templates/sidebar_user', $data);
        $this->load->view('mahasiswa/usulan_bebas_ukt', $data);
        $this->load->view('templates/footer', $data);
    }

    public function konfirmasi_usulan()
    {
        $data['title'] = 'Usulan Bebas UKT';
        $data['user'] = $this->db->get_where('user', ['username' =>
        $this->session->userdata('username')])->row_array();

        $id_jadwal_bebas_ukt = $this->input->post('id_jadwal_bebas_ukt');
        $data['id_jadwal_bebas_ukt'] = $id_jadwal_bebas_ukt;

        $mhs = $this->Kompetisi_model->mahasiswa($data['user']['username']);
        $data['mhs'] = $mhs;

        $data['prestasi'] = $this->Kompetisi_model->prestasi($data['user']['username']);

        $this->load->view('templates/header', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('templates/sidebar_user', $data);
        $this->load->view('mahasiswa/konfirmasi_usulan', $data);
        $this->load->view('templates/footer', $data);
    }

    public function konfirmasi_usulan_2()
    {
        $data['title'] = 'Usulan Bebas UKT';
        $data['user'] = $this->db->get_where('user', ['username' =>
        $this->session->userdata('username')])->row_array();

        $id_jadwal_bebas_ukt = $this->input->post('id_jadwal_bebas_ukt');
        $data['id_jadwal_bebas_ukt'] = $id_jadwal_bebas_ukt;

        $mhs = $this->Kompetisi_model->mahasiswa($data['user']['username']);
        $data['mhs'] = $mhs;

        $data['prestasi'] = $this->Kompetisi_model->prestasi($data['user']['username']);

        $data['kode_unik'] = $this->db->get('bebas_ukt')->result_array();

        $this->form_validation->set_rules('kode_unik', 'Kode Unik', 'required|trim|is_unique[bebas_ukt.kode_unik]', [
            'is_unique' => 'Anda telah mengajukan permohonan bebas UKT/SPP pada periode ini, pengajuan hanya bisa dilakukan satu kali pada satu periode.'
        ]);

        $this->form_validation->set_rules('nim', 'NIM', 'required|trim');
        $this->form_validation->set_rules('id_jadwal_bebas_ukt', 'ID Jadwal Bebas UKT', 'required|trim');
        $this->form_validation->set_rules('tgl_usulan', 'Tanggal Usulan', 'required|trim');
        $this->form_validation->set_rules('usul_bebas_ukt', 'IUsul Bebas UKT', 'required|trim');
        $this->form_validation->set_rules('ket_bebas_ukt', 'Keterangan Bebas UKT', 'required|trim');
        $this->form_validation->set_rules(
            'id_mhs_kompetisi',
            'ID Kompetisi Mahasiswa',
            'required|trim|is_unique[bebas_ukt.id_mhs_kompetisi]',
            ['is_unique' => 'Prestasi ini telah Anda ajukan!']
        );
        $this->form_validation->set_rules('jumlah_ukt', 'Jumlah UKT', 'required|trim');

        if ($this->form_validation->run() == false) {
            $this->load->view('templates/header', $data);
            $this->load->view('templates/topbar', $data);
            $this->load->view('templates/sidebar_user', $data);
            $this->load->view('mahasiswa/konfirmasi_usulan', $data);
            $this->load->view('templates/footer', $data);
        } else {
            $data = [
                'kode_unik' => htmlspecialchars($this->input->post('kode_unik', true)),
                'nim' => htmlspecialchars($this->input->post('nim', true)),
                'id_jadwal_bebas_ukt' => htmlspecialchars($this->input->post('id_jadwal_bebas_ukt', true)),
                'tgl_usulan' => htmlspecialchars($this->input->post('tgl_usulan', true)),
                'usul_bebas_ukt' => htmlspecialchars($this->input->post('usul_bebas_ukt', true)),
                'ket_bebas_ukt' => htmlspecialchars($this->input->post('ket_bebas_ukt', true)),
                'id_mhs_kompetisi' => htmlspecialchars($this->input->post('id_mhs_kompetisi', true)),
                'jumlah_ukt' => htmlspecialchars($this->input->post('jumlah_ukt', true))
            ];
            $this->db->insert('bebas_ukt', $data);
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
            <i class="icon fas fa-check"></i>
            Pengajuan pembebasan UKT berhasil ditambahkan</div>');
            redirect('kompetisi/usulan_bebas_ukt');
        }
    }

    public function input_data_prestasi()
    {
        $data['title'] = 'Usulan Prestasi Mandiri';
        $data['user'] = $this->db->get_where('user', ['username' =>
        $this->session->userdata('username')])->row_array();

        $id_jadwal = $this->input->post('id_jadwal');
        $data['id_jadwal'] = $id_jadwal;

        $mhs = $this->Kompetisi_model->mahasiswa($data['user']['username']);
        $data['detail'] = $mhs;

        // $data['kode'] = $this->Kompetisi_model->create_code();
        $data['level'] = $this->Kompetisi_model->tampil_level();
        $data['peserta'] = $this->Kompetisi_model->tampil_peserta();
        $data['provinsi'] = $this->Kompetisi_model->tampil_provinsi();
        $data['penyelenggara'] = $this->Kompetisi_model->tampil_penyelenggara();
        $data['capaian'] = $this->Kompetisi_model->tampil_capaian();
        $data['pemberi'] = $this->Kompetisi_model->tampil_pemberi();

        $this->load->view('templates/header', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('templates/sidebar_user', $data);
        $this->load->view('mahasiswa/input_data_prestasi2', $data);
        $this->load->view('templates/footer', $data);
    }

    public function tambah_prestasi()
    {
        $data['title'] = 'Usulan Prestasi Mandiri';
        $data['user'] = $this->db->get_where('user', ['username' =>
        $this->session->userdata('username')])->row_array();

        $mhs = $this->Kompetisi_model->mahasiswa($data['user']['username']);
        $data['detail'] = $mhs;

        $data['level'] = $this->Kompetisi_model->tampil_level();
        $data['peserta'] = $this->Kompetisi_model->tampil_peserta();
        $data['provinsi'] = $this->Kompetisi_model->tampil_provinsi();
        $data['penyelenggara'] = $this->Kompetisi_model->tampil_penyelenggara();
        $data['capaian'] = $this->Kompetisi_model->tampil_capaian();
        $data['pemberi'] = $this->Kompetisi_model->tampil_pemberi();

        $this->form_validation->set_rules('nim', 'Nomor Induk Mahasiswa', 'required|trim');
        $this->form_validation->set_rules('id_level', 'Level Kompetisi', 'required|trim');
        $this->form_validation->set_rules('id_kegiatan', 'ID Kegiatan', 'required|trim');
        $this->form_validation->set_rules('id_kategori_peserta', 'Kategori Peserta', 'required|trim');
        $this->form_validation->set_rules('nama_kegiatan', 'Nama Kegiatan', 'required|trim');
        $this->form_validation->set_rules('tahun_kegiatan', 'Tahun Kegiatan', 'required|trim');
        $this->form_validation->set_rules('jadwal_kegiatan', 'Jadwal Kegiatan', 'required|trim');
        $this->form_validation->set_rules('tempat_kegiatan', 'Tempat Kegiatan', 'required|trim');
        $this->form_validation->set_rules('prov_id', 'Nama Provinsi', 'required|trim');
        $this->form_validation->set_rules('negara', 'Nama Negara', 'required|trim');
        $this->form_validation->set_rules('penyelenggara', 'Penyelenggaara', 'required|trim');
        $this->form_validation->set_rules('id_penyelenggara', 'Kategori Penyelenggara', 'required|trim');
        $this->form_validation->set_rules('id_capaian', 'Capaian', 'required|trim');
        $this->form_validation->set_rules('bantuan', 'Bantuan', 'required|trim');

        $this->form_validation->set_rules('no_sertifikat', 'Nomor Sertifikat', 'required|trim');
        $this->form_validation->set_rules('tgl_sertifikat', 'Tanggal Sertifikat', 'required|trim');
        $this->form_validation->set_rules('ttd_sertifikat', 'Penandatangan Sertifikat', 'required|trim');

        $this->form_validation->set_rules('url', 'URL', 'required|trim');

        $this->form_validation->set_rules('no_surat_tugas', 'Nomor Surat Tugas', 'required|trim');
        $this->form_validation->set_rules('tgl_surat_tugas', 'Tanggal Surat Tugas', 'required|trim');
        $this->form_validation->set_rules('ttd_surat_tugas', 'Penandatangan Surat Tugas', 'required|trim');

        $this->form_validation->set_rules('no_undangan', 'Nomor Surat Undangan', 'required|trim');
        $this->form_validation->set_rules('tgl_surat_undangan', 'Tanggal Surat Undangan', 'required|trim');
        $this->form_validation->set_rules('pengundang', 'Pengundang Kegiatan', 'required|trim');

        if ($this->form_validation->run() == false) {
            $this->load->view('templates/header', $data);
            $this->load->view('templates/topbar', $data);
            $this->load->view('templates/sidebar_user', $data);
            $this->load->view('mahasiswa/input_data_prestasi2', $data);
            $this->load->view('templates/footer', $data);
        } else {
            $data = [
                'id_jadwal' => htmlspecialchars($this->input->post('id_jadwal', true)),
                'tgl_pengajuan' => htmlspecialchars($this->input->post('tgl_pengajuan', true)),
                'nim' => htmlspecialchars($this->input->post('nim', true)),
                'id_level' => htmlspecialchars($this->input->post('id_level', true)),
                'id_kegiatan' => htmlspecialchars($this->input->post('id_kegiatan', true)),
                'id_kategori_peserta' => htmlspecialchars($this->input->post('id_kategori_peserta', true)),
                'nama_kegiatan' => htmlspecialchars($this->input->post('nama_kegiatan', true)),
                'tahun_kegiatan' => htmlspecialchars($this->input->post('tahun_kegiatan', true)),
                'jadwal_kegiatan' => htmlspecialchars($this->input->post('jadwal_kegiatan', true)),
                'tempat_kegiatan' => htmlspecialchars($this->input->post('tempat_kegiatan', true)),
                'prov_id' => htmlspecialchars($this->input->post('prov_id', true)),
                'negara' => htmlspecialchars($this->input->post('negara', true)),
                'penyelenggara' => htmlspecialchars($this->input->post('penyelenggara', true)),
                'id_penyelenggara' => htmlspecialchars($this->input->post('id_penyelenggara', true)),
                'id_capaian' => htmlspecialchars($this->input->post('id_capaian', true)),
                'bantuan' => htmlspecialchars($this->input->post('bantuan', true)),
                'jumlah_bantuan' => htmlspecialchars($this->input->post('jumlah_bantuan', true)),
                'terbilang' => htmlspecialchars($this->input->post('terbilang', true)),
                'id_pemberi_bantuan' => htmlspecialchars($this->input->post('id_pemberi_bantuan', true)),
                'ket_pemberi' => htmlspecialchars($this->input->post('ket_pemberi', true)),

                'no_sertifikat' => htmlspecialchars($this->input->post('no_sertifikat', true)),
                'tgl_sertifikat' => htmlspecialchars($this->input->post('tgl_sertifikat', true)),
                'ttd_sertifikat' => htmlspecialchars($this->input->post('ttd_sertifikat', true)),

                'url' => htmlspecialchars($this->input->post('url', true)),

                'no_surat_tugas' => htmlspecialchars($this->input->post('no_surat_tugas', true)),
                'tgl_surat_tugas' => htmlspecialchars($this->input->post('tgl_surat_tugas', true)),
                'ttd_surat_tugas' => htmlspecialchars($this->input->post('ttd_surat_tugas', true)),

                'no_undangan' => htmlspecialchars($this->input->post('no_undangan', true)),
                'tgl_surat_undangan' => htmlspecialchars($this->input->post('tgl_surat_undangan', true)),
                'pengundang' => htmlspecialchars($this->input->post('pengundang', true))
            ];
            $this->db->insert('mhs_kompetisi', $data);
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
            <i class="icon fas fa-check"></i>
            Data prestasi berhasil dientrikan, silahkan mengupload bukti kegiatan.</div>');
            redirect('kompetisi');
        }
    }
    public function tambah_prestasi2($id_mhs_kompetisi)
    {
        $data['title'] = 'Usulan Prestasi Mandiri';
        $data['user'] = $this->db->get_where('user', ['username' =>
        $this->session->userdata('username')])->row_array();

        $id_mhs_kompetisi = decrypt_url($id_mhs_kompetisi);

        $mhs = $this->Kompetisi_model->mahasiswa($data['user']['username']);
        $data['mhs2'] = $mhs;

        $id_mhs_kompetisi = $this->Kompetisi_model->upload_1($id_mhs_kompetisi);
        $data['mhs'] = $id_mhs_kompetisi;

        $this->load->view('templates/header', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('templates/sidebar_user', $data);
        $this->load->view('mahasiswa/input_data_prestasi3', $data);
        $this->load->view('templates/footer', $data);
    }
    public function tambah_prestasi3($id_mhs_kompetisi)
    {
        $id_mhs_kompetisi = decrypt_url($id_mhs_kompetisi);

        $status_upload = $this->input->post('status_upload');
        $this->Kompetisi_model->status_upload($status_upload, $id_mhs_kompetisi);

        $config['upload_path']          = './assets/upload/kompetisi/';
        $config['allowed_types']        = 'pdf';
        $config['max_size']             = 1000;
        $config['max_width']            = 2048;
        $config['max_height']           = 1000;
        $config['encrypt_name']         = true;
        $this->load->library('upload', $config);
        $nim = $this->input->post('nim');
        $id_mhs_kompetisi = $this->input->post('id_mhs_kompetisi');
        $id_bukti = $this->input->post('id_bukti');
        $jumlah_berkas = count($_FILES['upload_dokumen']['name']);
        for ($i = 0; $i < $jumlah_berkas; $i++) {
            if (!empty($_FILES['upload_dokumen']['name'][$i])) {
                $_FILES['file']['name'] = $_FILES['upload_dokumen']['name'][$i];
                $_FILES['file']['type'] = $_FILES['upload_dokumen']['type'][$i];
                $_FILES['file']['tmp_name'] = $_FILES['upload_dokumen']['tmp_name'][$i];
                $_FILES['file']['error'] = $_FILES['upload_dokumen']['error'][$i];
                $_FILES['file']['size'] = $_FILES['upload_dokumen']['size'][$i];

                if ($this->upload->do_upload('file')) {
                    $uploadData = $this->upload->data();
                    $data['nama_berkas'] = $uploadData['file_name'];
                    $data['nim'] = $nim[$i];
                    $data['id_mhs_kompetisi'] = $id_mhs_kompetisi[$i];
                    $data['id_bukti'] = $id_bukti[$i];
                    $data['tipe_berkas'] = $uploadData['file_ext'];
                    $data['ukuran_berkas'] = $uploadData['file_size'];
                    $this->db->insert('upload_bukti_kompetisi', $data);
                }
            }
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
            <i class="icon fas fa-check"></i>
            Dokumen prestasi mandiri berhasil diupload, silahkan menunggu validasi dari fakultas masing-masing.</div>');
        }
        redirect('kompetisi');
    }
    public function tambah_prestasi4($id_mhs_kompetisi)
    {
        $data['title'] = 'Usulan Prestasi Mandiri';
        $data['user'] = $this->db->get_where('user', ['username' =>
        $this->session->userdata('username')])->row_array();

        $id_mhs_kompetisi = decrypt_url($id_mhs_kompetisi);

        $id_mhs_kompetisi = $this->Kompetisi_model->upload_2($id_mhs_kompetisi);
        $data['mhs'] = $id_mhs_kompetisi;

        $this->load->view('templates/header', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('templates/sidebar_user', $data);
        $this->load->view('mahasiswa/input_data_prestasi4', $data);
        $this->load->view('templates/footer', $data);
    }
    public function tambah_prestasi5($id_mhs_kompetisi)
    {
        $data['title'] = 'Usulan Prestasi Mandiri';
        $data['user'] = $this->db->get_where('user', ['username' =>
        $this->session->userdata('username')])->row_array();

        $id_mhs_kompetisi = decrypt_url($id_mhs_kompetisi);

        $mhs = $this->Kompetisi_model->mahasiswa($data['user']['username']);
        $data['detail'] = $mhs;

        $id_mhs_kompetisi = $this->Kompetisi_model->upload_2($id_mhs_kompetisi);
        $data['mhs'] = $id_mhs_kompetisi;

        $id_mhs_kompetisi = $this->input->post('id_mhs_kompetisi');
        $konfirmasi = $this->input->post('konfirmasi');

        $this->db->set('konfirmasi', $konfirmasi);
        $this->db->where('id_mhs_kompetisi', $id_mhs_kompetisi);
        $this->db->update('mhs_kompetisi');

        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
        <i class="icon fas fa-check"></i>

            Data prestasi Saudara telah dikonfirmasi, silahkan <b>UPLOAD</b> berkas pendukung!</div>');
        redirect('kompetisi/tambah_prestasi2/' . encrypt_url($id_mhs_kompetisi));
    }

    public function detail_prestasi($id_mhs_kompetisi)
    {
        $data['title'] = 'Usulan Prestasi Mandiri';
        $data['user'] = $this->db->get_where('user', ['username' =>
        $this->session->userdata('username')])->row_array();

        $id_mhs_kompetisi = decrypt_url($id_mhs_kompetisi);

        $mhs = $this->Kompetisi_model->detail_mahasiswa($id_mhs_kompetisi);
        $data['mhs'] = $mhs;

        $detail_mhs = $this->Kompetisi_model->detail($id_mhs_kompetisi);
        $data['mhs2'] = $detail_mhs;

        $data['level'] = $this->Kompetisi_model->tampil_level();
        $data['peserta'] = $this->Kompetisi_model->tampil_peserta();
        $data['provinsi'] = $this->Kompetisi_model->tampil_provinsi();
        $data['penyelenggara'] = $this->Kompetisi_model->tampil_penyelenggara();
        $data['capaian'] = $this->Kompetisi_model->tampil_capaian();
        $data['pemberi'] = $this->Kompetisi_model->tampil_pemberi();

        $this->load->view('templates/header', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('templates/sidebar_user', $data);
        $this->load->view('mahasiswa/detail_prestasi', $data);
        $this->load->view('templates/footer', $data);
    }

    public function draft($id_mhs_kompetisi)
    {
        $data['title'] = 'Usulan Prestasi Mandiri';
        $data['user'] = $this->db->get_where('user', ['username' =>
        $this->session->userdata('username')])->row_array();

        $id_mhs_kompetisi = decrypt_url($id_mhs_kompetisi);

        $id_mhs_kompetisi = $this->input->post('id_mhs_kompetisi');
        $konfirmasi = $this->input->post('konfirmasi');
        $this->Kompetisi_model->status_draft($konfirmasi, $id_mhs_kompetisi);

        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
        <i class="icon fas fa-check"></i>
        Status Anda telah diturunkan menjadi draft, silahkan konfirmasi dan upload kembali dokumen usulan prestasi mandiri Saudara.</div>');
        redirect('kompetisi');
    }

    public function vdetail_prestasi($id_mhs_kompetisi)
    {
        $data['title'] = 'Usulan Prestasi Mandiri';
        $data['user'] = $this->db->get_where('user', ['username' =>
        $this->session->userdata('username')])->row_array();

        $id_mhs_kompetisi = decrypt_url($id_mhs_kompetisi);

        $mhs = $this->Kompetisi_model->detail_mahasiswa($id_mhs_kompetisi);
        $data['mhs'] = $mhs;

        $detail_mhs = $this->Kompetisi_model->detail($id_mhs_kompetisi);
        $data['mhs2'] = $detail_mhs;

        $this->load->view('templates/header', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('templates/sidebar_user', $data);
        $this->load->view('mahasiswa/vdetail_prestasi', $data);
        $this->load->view('templates/footer', $data);
    }

    public function cdetail_prestasi($id_mhs_kompetisi)
    {
        $data['title'] = 'Detail Prestasi';
        $data['user'] = $this->db->get_where('user', ['username' =>
        $this->session->userdata('username')])->row_array();

        $id_mhs_kompetisi = decrypt_url($id_mhs_kompetisi);

        $mhs = $this->Kompetisi_model->detail_mahasiswa($id_mhs_kompetisi);
        $data['mhs'] = $mhs;

        $detail_mhs = $this->Kompetisi_model->detail($id_mhs_kompetisi);
        $data['mhs2'] = $detail_mhs;

        $this->load->view('templates/header', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('templates/sidebar_user', $data);
        $this->load->view('mahasiswa/cdetail_prestasi', $data);
        $this->load->view('templates/footer', $data);
    }

    function download_dokumen($id_upload)
    {
        $data = $this->db->get_where('upload_bukti_kompetisi', ['id_upload' => $id_upload])->row();
        force_download('assets/upload/kompetisi/' . $data->nama_berkas, NULL);
    }

    function preview_dokumen($id_upload)
    {
        $dokumen = $this->Kompetisi_model->preview_dokumen($id_upload);
        $data['dokumen'] = $dokumen;

        $this->load->view('templates/header', $data);
        $this->load->view('mahasiswa/preview_dokumen', $data);
    }

    public function konfirmasi($id_mhs_kompetisi)
    {
        $id_mhs_kompetisi = decrypt_url($id_mhs_kompetisi);

        $konfirmasi = $this->input->post('konfirmasi');
        $this->Kompetisi_model->konfirmasi($konfirmasi, $id_mhs_kompetisi);

        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
            <i class="icon fas fa-check"></i>
            Pengajuan prestasi mandiri telah dikonfirmasi, silahkan menunggu validasi dari fakultas masing-masing.</div>');

        redirect('kompetisi');
    }
    public function edit($id_mhs_kompetisi)
    {
        $id_mhs_kompetisi = decrypt_url($id_mhs_kompetisi);

        $tgl_pengajuan = $this->input->post('tgl_pengajuan');
        $nama_kegiatan = $this->input->post('nama_kegiatan');
        $nama_kegiatan2 = addslashes($nama_kegiatan);

        $id_level = $this->input->post('id_level');
        $id_kategori = $this->input->post('id_kategori');
        $jadwal_kegiatan = $this->input->post('jadwal_kegiatan');
        $tempat_kegiatan = $this->input->post('tempat_kegiatan');
        $prov_id = $this->input->post('prov_id');
        $penyelenggara = $this->input->post('penyelenggara');
        $id_penyelenggara = $this->input->post('id_penyelenggara');
        $id_capaian = $this->input->post('id_capaian');
        $no_sertifikat = $this->input->post('no_sertifikat');
        $tgl_sertifikat = $this->input->post('tgl_sertifikat');
        $ttd_sertifikat = $this->input->post('ttd_sertifikat');
        $no_surat_tugas = $this->input->post('no_surat_tugas');
        $tgl_surat_tugas = $this->input->post('tgl_surat_tugas');
        $ttd_surat_tugas = $this->input->post('ttd_surat_tugas');
        $no_undangan = $this->input->post('no_undangan');
        $tgl_surat_undangan = $this->input->post('tgl_surat_undangan');
        $pengundang = $this->input->post('pengundang');
        $url = $this->input->post('url');
        $jumlah_bantuan = $this->input->post('jumlah_bantuan');
        $terbilang = $this->input->post('terbilang');
        $id_pemberi_bantuan = $this->input->post('id_pemberi_bantuan');
        $ket_pemberi = $this->input->post('ket_pemberi');

        $this->Kompetisi_model->edit(
            $tgl_pengajuan,
            $nama_kegiatan2,
            $id_level,
            $id_kategori,
            $jadwal_kegiatan,
            $tempat_kegiatan,
            $prov_id,
            $penyelenggara,
            $id_penyelenggara,
            $id_capaian,
            $no_sertifikat,
            $tgl_sertifikat,
            $ttd_sertifikat,
            $no_surat_tugas,
            $tgl_surat_tugas,
            $ttd_surat_tugas,
            $no_undangan,
            $tgl_surat_undangan,
            $pengundang,
            $url,
            $jumlah_bantuan,
            $terbilang,
            $id_pemberi_bantuan,
            $ket_pemberi,
            $id_mhs_kompetisi
        );
        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
        <i class="icon fas fa-check"></i>
        Pengajuan prestasi mandiri telah diperbaruhi, selanjutnya silahkan <strong>KONFIRMASI</strong>.</div>');
        redirect('kompetisi/detail_prestasi/' . encrypt_url($id_mhs_kompetisi));
    }
    public function delete($id_mhs_kompetisi)
    {
        $id_mhs_kompetisi = decrypt_url($id_mhs_kompetisi);

        $this->load->model('Kompetisi_model', 'kompetisi');

        if ($this->kompetisi->hapususulan($id_mhs_kompetisi) == TRUE) {
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
            <i class="icon fas fa-check"></i>
            Usulan prestasi mandiri telah berhasil dihapus, data yang terhapus tidak bisa dikembalikan.</div>');
        } else {
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
            <i class="fas fa-times"></i>
            Usulan prestasi mandiri telah gagal dihapus!</div>');
        }

        redirect('kompetisi');
    }
}
