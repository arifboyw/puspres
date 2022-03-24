<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Role extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        is_logged_in();
    }
    public function index()
    {
        $data['title'] = 'Pengaturan Role';
        $data['user'] = $this->db->get_where('user', ['username' =>
        $this->session->userdata('username')])->row_array();

        $data['role'] = $this->db->get('user_role')->result_array();

        $this->load->view('templates/header', $data);
        $this->load->view('templates/topbar_admin', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('role/index', $data);
        $this->load->view('templates/footer', $data);
    }
    public function roleAccess($role_id)
    {
        $data['title'] = 'Pengaturan Role';
        $data['user'] = $this->db->get_where('user', ['username' =>
        $this->session->userdata('username')])->row_array();

        $data['role'] = $this->db->get_where('user_role', ['id' => $role_id])->row_array();

        $this->db->where('id!=', 2);
        $data['menu'] = $this->db->get('user_menu')->result_array();

        $this->load->view('templates/header', $data);
        $this->load->view('templates/topbar_admin', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('role/role-access', $data);
        $this->load->view('templates/footer', $data);
    }
    public function changeAccess()
    {
        $menu_id = $this->input->post('menuId');
        $role_id = $this->input->post('roleId');

        $data = [
            'role_id' => $role_id,
            'menu_id' => $menu_id
        ];

        $result = $this->db->get_where('user_access_menu', $data);

        if ($result->num_rows() < 1) {
            $this->db->insert('user_access_menu', $data);
        } else {
            $this->db->delete('user_access_menu', $data);
        }
        $this->session->set_flashdata('message', '
        <div class="alert alert-success alert-dismissible">
                  <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                  <i class="icon fas fa-check"></i>
                  Perubahan aturan akses <b>Berhasil</b> !</div>');
    }
    public function user()
    {
        $data['title'] = 'Pengaturan User';
        $data['user'] = $this->db->get_where('user', ['username' =>
        $this->session->userdata('username')])->row_array();

        $this->db->where('role_id!=', 1);

        $data['username'] = $this->db->get('user')->result_array();


        $this->form_validation->set_rules('username', 'Username', 'required|trim|is_unique[user.username]', [
            'is_unique' => 'This username has already registered',
        ]);

        $this->form_validation->set_rules('name', 'Name', 'required|trim');

        $this->form_validation->set_rules('email', 'Email', 'required|trim|valid_email|is_unique[user.email]', [
            'is_unique' => 'This email has already registered',
        ]);
        $this->form_validation->set_rules('password1', 'Password', 'required|trim|min_length[3]|matches[password2]', [
            'matches' => 'Password dont match!',
            'min_length' => 'Password too short'
        ]);

        $this->form_validation->set_rules('password2', 'Password', 'required|trim|matches[password1]');

        $this->form_validation->set_rules('role_id', 'Role_id', 'required|trim');

        if ($this->form_validation->run() == false) {
            $this->load->view('templates/header', $data);
            $this->load->view('templates/topbar_admin', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('role/user', $data);
            $this->load->view('templates/footer', $data);
        } else {
            $data = [
                'username' => htmlspecialchars($this->input->post('username', true)),
                'name' => htmlspecialchars($this->input->post('name', true)),
                'email' => htmlspecialchars($this->input->post('email', true)),
                'image' => 'default.jpg',
                'password' => password_hash($this->input->post('password1'), PASSWORD_DEFAULT),
                'role_id' => htmlspecialchars($this->input->post('role_id', true)),
                'is_active' => 1,
                'date_created' => time(),
                'jabatan' => htmlspecialchars($this->input->post('jabatan', true)),
                'unit' => htmlspecialchars($this->input->post('unit', true))
            ];
            $this->db->insert('user', $data);
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
            <i class="icon fas fa-check"></i>
            Akun baru berhasil dibuat!</div>');
            redirect('role/user');
        }
    }


    public function editUser($id)
    {
        $data['title'] = 'Edit Pengguna';
        $data['user'] = $this->db->get_where('user', ['id' => $id])->row_array();

        $this->load->view('templates/header', $data);
        $this->load->view('templates/topbar_admin', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('role/edituser', $data);
        $this->load->view('templates/footer', $data);
    }

    public function editUserGo($id)
    {
        $username = $this->input->post('username');
        $name = $this->input->post('name');
        $email = $this->input->post('email');
        $role_id = $this->input->post('role_id');
        $is_active = $this->input->post('is_active');
        $jabatan = $this->input->post('jabatan');
        $unit = $this->input->post('unit');

        //cek jika ada gambar yang akan diupload
        $upload_image = $_FILES['image']['name'];

        $this->db->set('name', $name);
        $this->db->set('email', $email);
        $this->db->set('role_id', $role_id);
        $this->db->set('is_active', $is_active);
        $this->db->set('jabatan', $jabatan);
        $this->db->set('unit', $unit);
        $this->db->where('id', $id);
        $this->db->update('user');

        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
        <i class="icon fas fa-check"></i>
        Profil berhasil diperbaruhi!</div>');
        redirect('role/user');
    }

    public function deleteUser($id)
    {
        $this->load->model('User_model', 'user');

        if ($this->user->hapususer($id) == TRUE) {
            $this->session->set_flashdata('hapus', true);
        } else {
            $this->session->set_flashdata('hapus', false);
        }

        redirect('role/user');
    }
}
