<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Mahasiswa_model extends CI_Model
{
    public function mahasiswa($index_data = NULL)
    {
        $this->db->select('*');
        $this->db->join('user_role', 'user.role_id=user_role.id');
        $this->db->join('data_mahasiswa', 'data_mahasiswa.nim=user.username');
        $this->db->join('prodi', 'data_mahasiswa.kode_prodi=prodi.kode_prodi');
        $this->db->join('fakultas', 'data_mahasiswa.kode_fak=fakultas.kode_fak');
        $query = $this->db->get_where('user', array('username' => $index_data))->row();
        return $query;
    }
    public function universitas($index_data = NULL)
    {
        $this->db->where('id_level', 1);
        $this->db->where('status_validasi', 1);
        $query = $this->db->get_where('mhs_kompetisi', array('nim' => $index_data));
        if ($query->num_rows() > 0) {
            return $query->num_rows();
        } else {
            return 0;
        }
    }
    public function provinsi($index_data = NULL)
    {
        $this->db->where('id_level', 2);
        $this->db->where('status_validasi', 1);
        $query = $this->db->get_where('mhs_kompetisi', array('nim' => $index_data));
        if ($query->num_rows() > 0) {
            return $query->num_rows();
        } else {
            return 0;
        }
    }
    public function regional($index_data = NULL)
    {
        $this->db->where('id_level', 3);
        $this->db->where('status_validasi', 1);
        $query = $this->db->get_where('mhs_kompetisi', array('nim' => $index_data));
        if ($query->num_rows() > 0) {
            return $query->num_rows();
        } else {
            return 0;
        }
    }
    public function nasional($index_data = NULL)
    {
        $this->db->where('id_level', 4);
        $this->db->where('status_validasi', 1);
        $query = $this->db->get_where('mhs_kompetisi', array('nim' => $index_data));
        if ($query->num_rows() > 0) {
            return $query->num_rows();
        } else {
            return 0;
        }
    }
    public function internasional($index_data = NULL)
    {
        $this->db->where('id_level', 5);
        $this->db->where('status_validasi', 1);
        $query = $this->db->get_where('mhs_kompetisi', array('nim' => $index_data));
        if ($query->num_rows() > 0) {
            return $query->num_rows();
        } else {
            return 0;
        }
    }
}
