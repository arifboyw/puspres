<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Dashboard extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        is_logged_in();
        $this->load->helper('url');
        $this->load->model('Dashboard_model');
        $this->load->helper('form');
    }
    public function index()
    {
        $data['title'] = 'Home';
        $data['user'] = $this->db->get_where('user', ['username' =>
        $this->session->userdata('username')])->row_array();

        $data['daftar_informasi'] = $this->Dashboard_model->daftar_informasi();

        $this->load->view('templates/header', $data);
        $this->load->view('templates/topbar_admin', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('dashboard/index', $data);
        $this->load->view('templates/footer', $data);
    }
    public function user()
    {
        $data['title'] = 'Home';
        $data['user'] = $this->db->get_where('user', ['username' =>
        $this->session->userdata('username')])->row_array();

        $data['daftar_informasi'] = $this->Dashboard_model->daftar_informasi();

        $this->load->view('templates/header', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('templates/sidebar_user', $data);
        $this->load->view('dashboard/user', $data);
        $this->load->view('templates/footer', $data);
    }
    public function detail_informasi($id_info)
    {
        $data['title'] = 'Detail Informasi';
        $data['user'] = $this->db->get_where('user', ['username' =>
        $this->session->userdata('username')])->row_array();

        $id_info = decrypt_url($id_info);

        $data['detail_informasi'] = $this->Dashboard_model->detail_informasi($id_info);

        $this->load->view('templates/header', $data);
        $this->load->view('templates/topbar_admin', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('dashboard/detail_informasi', $data);
        $this->load->view('templates/footer', $data);
    }
    public function detail_info($id_info)
    {
        $data['title'] = 'Detail Informasi';
        $data['user'] = $this->db->get_where('user', ['username' =>
        $this->session->userdata('username')])->row_array();

        $id_info = decrypt_url($id_info);

        $data['detail_informasi'] = $this->Dashboard_model->detail_informasi($id_info);

        $this->load->view('templates/header', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('dashboard/detail_info', $data);
        $this->load->view('templates/footer', $data);
    }
}
