<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Informasi extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        is_logged_in();
        $this->load->helper('url');
        $this->load->model('Informasi_model');
        $this->load->helper('form');
        $this->load->helper('file');
        $this->load->library('encrypt');
    }
    public function tambah_informasi()
    {
        $data['title'] = 'Tambah Informasi';
        $data['user'] = $this->db->get_where('user', ['username' =>
        $this->session->userdata('username')])->row_array();

        $this->form_validation->set_rules('tgl_posting', 'Tanggal Posting', 'required|trim');
        $this->form_validation->set_rules('judul', 'Judul Info', 'required|trim');
        $this->form_validation->set_rules('info_singkat', 'Info Singkat', 'required|trim');
        $this->form_validation->set_rules('status_posting', 'Status Posting', 'required|trim');

        $config['upload_path']          = './assets/upload/info/';
        $config['allowed_types']        = 'pdf';
        $config['max_size']             = 2000;
        $config['max_width']            = 1024;
        $config['max_height']           = 768;
        $config['encrypt_name']            = TRUE;
        $this->load->library('upload', $config);
        if ($this->form_validation->run() == false) {
            $this->load->view('templates/header', $data);
            $this->load->view('templates/topbar_admin', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('informasi/tambah_informasi', $data);
            $this->load->view('templates/footer', $data);
        } elseif (!$this->upload->do_upload('fileinfo')) {
            $error = array('error' => $this->upload->display_errors());
            $this->session->set_flashdata('message', '<div class="alert alert-warning" role="alert">
        Format file salah!, format file yang diperbolehkan adalah PDF.</div>');
            redirect('informasi/tambah_informasi');
        } else {
            $data = [
                'tgl_posting' => htmlspecialchars($this->input->post('tgl_posting', true)),
                'judul' => htmlspecialchars($this->input->post('judul', true)),
                'info_singkat' => htmlspecialchars($this->input->post('info_singkat', true)),
                'status_posting' => htmlspecialchars($this->input->post('status_posting', true)),
            ];
            $data['nama_berkas'] = $this->upload->data("file_name");
            $data['tipe_berkas'] = $this->upload->data('file_ext');
            $data['ukuran_berkas'] = $this->upload->data('file_size');
            $this->db->insert('informasi', $data);
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
        SK Penetapan telah tersimpan!</div>');
            redirect('informasi/daftar_informasi');
        }
    }
    public function daftar_informasi()
    {
        $data['title'] = 'Daftar Informasi';
        $data['user'] = $this->db->get_where('user', ['username' =>
        $this->session->userdata('username')])->row_array();

        $data['daftar_informasi'] = $this->Informasi_model->daftar_informasi();

        $this->load->view('templates/header', $data);
        $this->load->view('templates/topbar_admin', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('informasi/daftar_informasi', $data);
        $this->load->view('templates/footer', $data);
    }
    function download_file_info($id_info)
    {
        $data = $this->db->get_where('informasi', ['id_info' => $id_info])->row();
        force_download('assets/upload/info/' . $data->nama_berkas, NULL);
    }
    public function detail_informasi($id_info)
    {
        $data['title'] = 'Detail Informasi';
        $data['user'] = $this->db->get_where('user', ['username' =>
        $this->session->userdata('username')])->row_array();

        $id_info = decrypt_url($id_info);

        $data['detail_informasi'] = $this->Informasi_model->detail_informasi($id_info);

        $this->load->view('templates/header', $data);
        $this->load->view('templates/topbar_admin', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('informasi/detail_informasi', $data);
        $this->load->view('templates/footer', $data);
    }
    public function update_informasi($id_info)
    {
        $data['title'] = 'Update Informasi';
        $data['user'] = $this->db->get_where('user', ['username' =>
        $this->session->userdata('username')])->row_array();

        $id_info = decrypt_url($id_info);

        $data['detail_informasi'] = $this->Informasi_model->detail_informasi($id_info);

        $this->load->view('templates/header', $data);
        $this->load->view('templates/topbar_admin', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('informasi/update_informasi', $data);
        $this->load->view('templates/footer', $data);
    }
    public function update_konfirmasi($id_info)
    {
        $data['user'] = $this->db->get_where('user', ['username' =>
        $this->session->userdata('username')])->row_array();

        $id_info = decrypt_url($id_info);

        $data = $this->Informasi_model->getDataByID($id_info)->row();

        $this->form_validation->set_rules('tgl_posting', 'Tanggal Posting', 'required|trim');
        $this->form_validation->set_rules('id_info', 'ID Info', 'required|trim');
        $this->form_validation->set_rules('judul', 'Judul', 'required|trim');
        $this->form_validation->set_rules('status_posting', 'Status Posting', 'required|trim');
        $this->form_validation->set_rules('info_singkat', 'Info Singkat', 'required|trim');

        if ($this->form_validation->run() == false) {
            $this->load->view('templates/header', $data);
            $this->load->view('templates/topbar_admin', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('informasi/update_informasi', $data);
            $this->load->view('templates/footer', $data);
        } else {
            $tgl_posting = $this->input->post('tgl_posting');
            $id_info = $this->input->post('id_info');
            $judul = $this->input->post('judul');
            $status_posting = $this->input->post('status_posting');
            $info_singkat = $this->input->post('info_singkat');

            $this->db->set('tgl_posting', $tgl_posting);
            $this->db->set('judul', $judul);
            $this->db->set('status_posting', $status_posting);
            $this->db->set('info_singkat', $info_singkat);
            $this->db->where('id_info', $id_info);
            $this->db->update('informasi');

            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
            <i class="icon fas fa-check"></i>
            Update Informasi berhasil!</div>');
            redirect('informasi/daftar_informasi');
        }
    }
    public function hapus_informasi($id_info)
    {
        $id_info = decrypt_url($id_info);

        $this->load->model('Informasi_model', 'hapus_informasi');

        if ($this->hapus_informasi->hapus_informasi($id_info) == TRUE) {
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
            <i class="icon fas fa-check"></i>
            Informasi telah berhasil dihapus, data yang terhapus tidak bisa dikembalikan.</div>');
        } else {
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
            <i class="fas fa-times"></i>
            Informasi gagal dihapus!</div>');
        }
        redirect('informasi/daftar_informasi');
    }
    public function update_file()
    {
        $data['user'] = $this->db->get_where('user', ['username' =>
        $this->session->userdata('username')])->row_array();

        $id_info = $this->input->post('id_info');

        $data = $this->Informasi_model->getDataByID($id_info)->row();
        $nama = './assets/upload/info/' . $data->nama_berkas;

        if (is_readable($nama) && unlink($nama)) {
            $config['upload_path']          = './assets/upload/info/';
            $config['allowed_types']        = 'pdf';
            $config['max_size']             = 2048;
            $config['encrypt_name']            = TRUE;
            $this->load->library('upload', $config);

            if (!$this->upload->do_upload('fileinfo')) {
                $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                <i class="icon fas fa-check"></i>
                File Informasi gagal diupload.</div>');
                redirect(base_url('informasi/update_informasi/' . encrypt_url($id_info)));
            } else {
                $upload_data = $this->upload->data();
                $nama_berkas = $upload_data['file_name'];
                $tipe_berkas = $this->upload->data('file_ext');
                $ukuran_berkas = $this->upload->data('file_size');

                $data = array(
                    'nama_berkas'    => $nama_berkas,
                    'tipe_berkas'    => $tipe_berkas,
                    'ukuran_berkas'    => $ukuran_berkas
                );
                $update = $this->Informasi_model->updateFile($id_info, $data);

                if ($update) {
                    $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                    <i class="icon fas fa-check"></i>
                    File Informasi berhasil diupdate.</div>');
                    redirect(base_url('informasi/update_informasi/' . encrypt_url($id_info)));
                } else {
                    $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                    <i class="icon fas fa-check"></i>
                    File Informasi gagal diupload. Sesuaikan tipe file dan ukuran file.</div>');
                    redirect(base_url('informasi/update_informasi/' . encrypt_url($id_info)));
                }
            }
        } else {
            $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
            <i class="icon fas fa-check"></i>
            File Informasi gagal diupload. File tidak terbaca!</div>');
            redirect(base_url('informasi/update_informasi/' . encrypt_url($id_info)));
        }
    }
}
