<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Pendataan extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        is_logged_in();
        $this->load->helper('url');
        $this->load->model('Pendataan_model');
        $this->load->helper('form');
    }
    public function jadwal()
    {
        $data['title'] = 'Penjadwalan';
        $data['user'] = $this->db->get_where('user', ['username' =>
        $this->session->userdata('username')])->row_array();

        $data['jadwal'] = $this->Pendataan_model->jadwal();
        $data['semester'] = $this->Pendataan_model->tampil_semester();
        $data['triwulan'] = $this->Pendataan_model->tampil_triwulan();

        $this->load->view('templates/header', $data);
        $this->load->view('templates/topbar_admin', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('pendataan/jadwal', $data);
        $this->load->view('templates/footer', $data);
    }
    public function bebas_ukt()
    {
        $data['title'] = 'Penjadwalan Bebas UKT';
        $data['user'] = $this->db->get_where('user', ['username' =>
        $this->session->userdata('username')])->row_array();

        $data['jadwal_bebas_ukt'] = $this->Pendataan_model->jadwal_bebas_ukt();
        $data['semester'] = $this->Pendataan_model->tampil_semester();

        $this->load->view('templates/header', $data);
        $this->load->view('templates/topbar_admin', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('pendataan/bebas_ukt', $data);
        $this->load->view('templates/footer', $data);
    }
    public function tambah_jadwal_bebas_ukt()
    {
        $data['title'] = 'Penjadwalan Bebas UKT';
        $data['user'] = $this->db->get_where('user', ['username' =>
        $this->session->userdata('username')])->row_array();

        $data = [
            'nama_jadwal' => htmlspecialchars($this->input->post('nama_jadwal', true)),
            'kode_semester' => htmlspecialchars($this->input->post('kode_semester', true)),
            'mulai_jadwal' => htmlspecialchars($this->input->post('mulai_jadwal', true)),
            'deadline_jadwal' => htmlspecialchars($this->input->post('deadline_jadwal', true)),
            'status_jadwal' => htmlspecialchars($this->input->post('status_jadwal', true))
        ];
        $this->db->insert('jadwal_bebas_ukt', $data);
        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
        <i class="icon fas fa-check"></i>
        Jadwal pengajuan bebas UKT/SPP berhasil ditambahkan!</div>');
        redirect('pendataan/bebas_ukt');
    }
    public function tambah_jadwal()
    {
        $data['title'] = 'Penjadwalan';
        $data['user'] = $this->db->get_where('user', ['username' =>
        $this->session->userdata('username')])->row_array();

        $data = [
            'nama_jadwal' => htmlspecialchars($this->input->post('nama_jadwal', true)),
            'kode_triwulan' => htmlspecialchars($this->input->post('kode_triwulan', true)),
            'kode_semester' => htmlspecialchars($this->input->post('kode_semester', true)),
            'deadline_jadwal' => htmlspecialchars($this->input->post('deadline_jadwal', true)),
            'status_jadwal' => htmlspecialchars($this->input->post('status_jadwal', true))
        ];
        $this->db->insert('jadwal', $data);
        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
        <i class="icon fas fa-check"></i>
        Jadwal pengisian prestasi mandiri berhasil dientrikan!</div>');
        redirect('pendataan/jadwal');
    }
    public function edit_jadwal($id_jadwal)
    {
        $data['title'] = 'Penjadwalan';
        $data['user'] = $this->db->get_where('user', ['username' =>
        $this->session->userdata('username')])->row_array();

        $id_jadwal = decrypt_url($id_jadwal);

        $jadwal = $this->Pendataan_model->jadwal_check($id_jadwal);
        $data['tampil_jadwal'] = $jadwal;

        $this->load->view('templates/header', $data);
        $this->load->view('templates/topbar_admin', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('pendataan/edit_jadwal', $data);
        $this->load->view('templates/footer', $data);
    }
    public function edit_jadwal_bebas_ukt($id_jadwal_bebas_ukt)
    {
        $data['title'] = 'Penjadwalan Bebas UKT';
        $data['user'] = $this->db->get_where('user', ['username' =>
        $this->session->userdata('username')])->row_array();

        $id_jadwal_bebas_ukt = decrypt_url($id_jadwal_bebas_ukt);

        $id_jadwal_bebas_ukt = $this->Pendataan_model->jadwal_check_bebas_ukt($id_jadwal_bebas_ukt);
        $data['tampil_jadwal'] = $id_jadwal_bebas_ukt;

        $this->load->view('templates/header', $data);
        $this->load->view('templates/topbar_admin', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('pendataan/edit_jadwal_bebas_ukt', $data);
        $this->load->view('templates/footer', $data);
    }

    public function edit_bu_konfirmasi($id_jadwal_bebas_ukt)
    {
        $data['title'] = 'Penjadwalan Bebas UKT';
        $data['user'] = $this->db->get_where('user', ['username' =>
        $this->session->userdata('username')])->row_array();

        $id_jadwal_bebas_ukt = decrypt_url($id_jadwal_bebas_ukt);

        $nama_jadwal = $this->input->post('nama_jadwal');
        $mulai_jadwal = $this->input->post('mulai_jadwal');
        $deadline_jadwal = $this->input->post('deadline_jadwal');
        $status_jadwal = $this->input->post('status_jadwal');

        $this->db->set('nama_jadwal', $nama_jadwal);
        $this->db->set('mulai_jadwal', $mulai_jadwal);
        $this->db->set('deadline_jadwal', $deadline_jadwal);
        $this->db->set('status_jadwal', $status_jadwal);
        $this->db->where('id_jadwal_bebas_ukt', $id_jadwal_bebas_ukt);
        $this->db->update('jadwal_bebas_ukt');

        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
        <i class="icon fas fa-check"></i>
        Data jadwal telah diperbaruhi.</div>');
        redirect('pendataan/bebas_ukt');
    }
    public function edit_jadwal_konfirmasi($id_jadwal)
    {
        $data['title'] = 'Penjadwalan';
        $data['user'] = $this->db->get_where('user', ['username' =>
        $this->session->userdata('username')])->row_array();

        $id_jadwal = decrypt_url($id_jadwal);

        $nama_jadwal = $this->input->post('nama_jadwal');
        $deadline_jadwal = $this->input->post('deadline_jadwal');
        $status_jadwal = $this->input->post('status_jadwal');

        $this->db->set('nama_jadwal', $nama_jadwal);
        $this->db->set('deadline_jadwal', $deadline_jadwal);
        $this->db->set('status_jadwal', $status_jadwal);
        $this->db->where('id_jadwal', $id_jadwal);
        $this->db->update('jadwal');

        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
        <i class="icon fas fa-check"></i>
        Data jadwal telah diperbaruhi.</div>');
        redirect('pendataan/jadwal');
    }
    public function hapus_jadwal($id_jadwal)
    {
        $id_jadwal = decrypt_url($id_jadwal);

        $this->load->model('Pendataan_model', 'hapus_jadwal');

        if ($this->hapus_jadwal->hapus_jadwal($id_jadwal) == TRUE) {
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
            <i class="icon fas fa-check"></i>
            Jadwal pengisian prestasi mandiri telah berhasil dihapus, data yang terhapus tidak bisa dikembalikan.</div>');
        } else {
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
            <i class="fas fa-times"></i>
            Jadwal pengisian prestasi mandiri gagal dihapus!</div>');
        }
        redirect('pendataan/jadwal');
    }
    public function hapus_jadwal_bebas_ukt($id_jadwal_bebas_ukt)
    {
        $id_jadwal_bebas_ukt = decrypt_url($id_jadwal_bebas_ukt);

        $this->load->model('Pendataan_model', 'hapus_jadwal_bebas_ukt');

        if ($this->hapus_jadwal_bebas_ukt->hapus_jadwal_bebas_ukt($id_jadwal_bebas_ukt) == TRUE) {
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
            <i class="icon fas fa-check"></i>
            Jadwal pengajuan bebas UKT/SPP berhasil dihapus, data yang terhapus tidak bisa dikembalikan.</div>');
        } else {
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
            <i class="fas fa-times"></i>
            Jadwal pengajuan bebas UKT/SPP dihapus!</div>');
        }
        redirect('pendataan/bebas_ukt');
    }
    public function semester()
    {
        $data['title'] = 'Penjadwalan';
        $data['user'] = $this->db->get_where('user', ['username' =>
        $this->session->userdata('username')])->row_array();

        $data['semester'] = $this->Pendataan_model->semester();

        $this->load->view('templates/header', $data);
        $this->load->view('templates/topbar_admin', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('pendataan/semester', $data);
        $this->load->view('templates/footer', $data);
    }
    public function edit_semester($id)
    {
        $data['title'] = 'Penjadwalan';
        $data['user'] = $this->db->get_where('user', ['username' =>
        $this->session->userdata('username')])->row_array();

        $id = decrypt_url($id);

        $semester = $this->Pendataan_model->semester_check($id);
        $data['tampil_semester'] = $semester;

        $this->load->view('templates/header', $data);
        $this->load->view('templates/topbar_admin', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('pendataan/edit_semester', $data);
        $this->load->view('templates/footer', $data);
    }
    public function edit_semester_konfirmasi($id)
    {
        $data['title'] = 'Penjadwalan';
        $data['user'] = $this->db->get_where('user', ['username' =>
        $this->session->userdata('username')])->row_array();

        $id = decrypt_url($id);

        $kode_semester = $this->input->post('kode_semester');
        $nama_semester = $this->input->post('nama_semester');
        $tahun_semester = $this->input->post('tahun_semester');
        $alias = $this->input->post('alias');
        $status_semester = $this->input->post('status_semester');

        $this->db->set('kode_semester', $kode_semester);
        $this->db->set('nama_semester', $nama_semester);
        $this->db->set('tahun_semester', $tahun_semester);
        $this->db->set('alias', $alias);
        $this->db->set('status_semester', $status_semester);
        $this->db->where('id', $id);
        $this->db->update('semester');

        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
        <i class="icon fas fa-check"></i>
        Data semester telah diperbaruhi.</div>');
        redirect('pendataan/semester');
    }
    public function hapus_semester($id)
    {
        $id = decrypt_url($id);

        $this->load->model('Pendataan_model', 'hapus_semester');

        if ($this->hapus_semester->hapus_semester($id) == TRUE) {
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
            <i class="icon fas fa-check"></i>
            Data semester telah berhasil dihapus, data yang terhapus tidak bisa dikembalikan.</div>');
        } else {
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
            <i class="fas fa-times"></i>
            Data semester gagal dihapus!</div>');
        }
        redirect('pendataan/semester');
    }
    public function tambah_semester()
    {
        $data['title'] = 'Penjadwalan';
        $data['user'] = $this->db->get_where('user', ['username' =>
        $this->session->userdata('username')])->row_array();

        $data = [
            'kode_semester' => htmlspecialchars($this->input->post('kode_semester', true)),
            'nama_semester' => htmlspecialchars($this->input->post('nama_semester', true)),
            'tahun_semester' => htmlspecialchars($this->input->post('tahun_semester', true)),
            'alias' => htmlspecialchars($this->input->post('alias', true)),
            'status_semester' => htmlspecialchars($this->input->post('status_semester', true))
        ];
        $this->db->insert('semester', $data);
        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
        <i class="icon fas fa-check"></i>
        Data Semester berhasil dientrikan!</div>');
        redirect('pendataan/semester');

        $this->load->view('templates/header', $data);
        $this->load->view('templates/topbar_admin', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('pendataan/semester', $data);
        $this->load->view('templates/footer', $data);
    }
    public function triwulan()
    {
        $data['title'] = 'Penjadwalan';
        $data['user'] = $this->db->get_where('user', ['username' =>
        $this->session->userdata('username')])->row_array();

        $data['triwulan'] = $this->Pendataan_model->triwulan();

        $this->load->view('templates/header', $data);
        $this->load->view('templates/topbar_admin', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('pendataan/triwulan', $data);
        $this->load->view('templates/footer', $data);
    }
    public function tambah_triwulan()
    {
        $data['title'] = 'Penjadwalan';
        $data['user'] = $this->db->get_where('user', ['username' =>
        $this->session->userdata('username')])->row_array();

        $data = [
            'kode_triwulan' => htmlspecialchars($this->input->post('kode_triwulan', true)),
            'nama_triwulan' => htmlspecialchars($this->input->post('nama_triwulan', true)),
            'tahun_triwulan' => htmlspecialchars($this->input->post('tahun_triwulan', true)),
            'status_triwulan' => htmlspecialchars($this->input->post('status_triwulan', true))
        ];
        $this->db->insert('triwulan', $data);
        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
        <i class="icon fas fa-check"></i>
        Data Triwulan berhasil dientrikan!</div>');
        redirect('pendataan/triwulan');

        $this->load->view('templates/header', $data);
        $this->load->view('templates/topbar_admin', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('pendataan/triwulan', $data);
        $this->load->view('templates/footer', $data);
    }
    public function edit_triwulan($id_triwulan)
    {
        $data['title'] = 'Penjadwalan';
        $data['user'] = $this->db->get_where('user', ['username' =>
        $this->session->userdata('username')])->row_array();

        $id = decrypt_url($id_triwulan);

        $triwulan = $this->Pendataan_model->triwulan_check($id);
        $data['tampil_triwulan'] = $triwulan;

        $this->load->view('templates/header', $data);
        $this->load->view('templates/topbar_admin', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('pendataan/edit_triwulan', $data);
        $this->load->view('templates/footer', $data);
    }
    public function edit_triwulan_konfirmasi($id_triwulan)
    {
        $data['title'] = 'Penjadwalan';
        $data['user'] = $this->db->get_where('user', ['username' =>
        $this->session->userdata('username')])->row_array();

        $id_triwulan = decrypt_url($id_triwulan);

        $kode_triwulan = $this->input->post('kode_triwulan');
        $nama_triwulan = $this->input->post('nama_triwulan');
        $tahun_triwulan = $this->input->post('tahun_triwulan');
        $status_triwulan = $this->input->post('status_triwulan');

        $this->db->set('kode_triwulan', $kode_triwulan);
        $this->db->set('nama_triwulan', $nama_triwulan);
        $this->db->set('tahun_triwulan', $tahun_triwulan);
        $this->db->set('status_triwulan', $status_triwulan);
        $this->db->where('id_triwulan', $id_triwulan);
        $this->db->update('triwulan');

        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
        <i class="icon fas fa-check"></i>
        Data triwulan telah diperbaruhi!</div>');
        redirect('pendataan/triwulan');
    }
    public function hapus_triwulan($id_triwulan)
    {
        $id_triwulan = decrypt_url($id_triwulan);

        $this->load->model('Pendataan_model', 'hapus_triwulan');

        if ($this->hapus_triwulan->hapus_triwulan($id_triwulan) == TRUE) {
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
            <i class="icon fas fa-check"></i>
            Data triwulan telah berhasil dihapus, data yang terhapus tidak bisa dikembalikan.</div>');
        } else {
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
            <i class="fas fa-times"></i>
            Data triwulan gagal dihapus!</div>');
        }
        redirect('pendataan/triwulan');
    }
    public function daftar_prestasi()
    {
        $data['title'] = 'Daftar Prestasi';
        $data['user'] = $this->db->get_where('user', ['username' =>
        $this->session->userdata('username')])->row_array();

        $data['fakultas'] = $this->Pendataan_model->tampil_fakultas();
        $data['prodi'] = $this->Pendataan_model->tampil_prodi();
        $data['prestasi'] = $this->Pendataan_model->daftar_prestasi_mandiri()->result();

        $this->load->view('templates/header', $data);
        $this->load->view('templates/topbar_admin', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('pendataan/daftar_prestasi', $data);
        $this->load->view('templates/footer', $data);
    }

    public function tampil_prestasi()
    {
        $data['title'] = 'Daftar Prestasi';
        $data['user'] = $this->db->get_where('user', ['username' =>
        $this->session->userdata('username')])->row_array();

        $tahun_kegiatan = $this->input->get('tahun_kegiatan');
        $kode_fak = $this->input->get('kode_fak');
        $kode_prodi = $this->input->get('kode_prodi');
        $nim = $this->input->get('nim');
        $data['fakultas'] = $this->Pendataan_model->tampil_fakultas();
        $data['prodi'] = $this->Pendataan_model->tampil_prodi();
        $data['tampil_prestasi'] = $this->Pendataan_model->tampil_prestasi($tahun_kegiatan, $kode_fak, $kode_prodi, $nim)->result();

        $this->load->view('templates/header', $data);
        $this->load->view('templates/topbar_admin', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('pendataan/tampil_prestasi', $data);
        $this->load->view('templates/footer', $data);
    }
    public function rekapitulasi()
    {
        $data['title'] = 'Rekapitulasi';
        $data['user'] = $this->db->get_where('user', ['username' =>
        $this->session->userdata('username')])->row_array();

        $this->load->view('templates/header', $data);
        $this->load->view('templates/topbar_admin', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('pendataan/rekapitulasi', $data);
        $this->load->view('templates/footer', $data);
    }
    public function tampil_per_kegiatan()
    {
        $data['title'] = 'Rekapitulasi';
        $data['user'] = $this->db->get_where('user', ['username' =>
        $this->session->userdata('username')])->row_array();

        $tahun_kegiatan = $this->input->get('tahun_kegiatan');
        $data['per_tingkat'] = $this->Pendataan_model->per_tingkat($tahun_kegiatan);
        $data['total'] = $this->Pendataan_model->total($tahun_kegiatan);

        $this->load->view('templates/header', $data);
        $this->load->view('templates/topbar_admin', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('pendataan/tampil_per_kegiatan', $data);
        $this->load->view('templates/footer', $data);
    }
    public function tampil_menurut_fakultas()
    {
        $data['title'] = 'Rekapitulasi';
        $data['user'] = $this->db->get_where('user', ['username' =>
        $this->session->userdata('username')])->row_array();

        $tahun_kegiatan = $this->input->get('tahun_kegiatan');
        $data['fakultas_rekap'] = $this->Pendataan_model->fakultas_rekap();
        $data['level'] = $this->Pendataan_model->level();
        $hasil = $this->Pendataan_model->rekap($tahun_kegiatan);
        $data['rekap'] = $hasil['data'];
        $data['tahun_kegiatan'] = $tahun_kegiatan;

        $data['total_universitas'] = $this->Pendataan_model->total_universitas($tahun_kegiatan);
        $data['total_provinsi'] = $this->Pendataan_model->total_provinsi($tahun_kegiatan);
        $data['total_regional'] = $this->Pendataan_model->total_regional($tahun_kegiatan);
        $data['total_nasional'] = $this->Pendataan_model->total_nasional($tahun_kegiatan);
        $data['total_internasional'] = $this->Pendataan_model->total_internasional($tahun_kegiatan);

        $this->load->view('templates/header', $data);
        $this->load->view('templates/topbar_admin', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('pendataan/tampil_menurut_fakultas', $data);
        $this->load->view('templates/footer', $data);
    }
}
