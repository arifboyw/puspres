<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Dashboard_model extends CI_Model
{
    public function daftar_informasi()
    {
        $this->db->select('*');
        $this->db->from('informasi');
        $this->db->order_by('tgl_posting', 'DSC');
        $data = $this->db->get();
        return $data->result();
    }
    public function detail_informasi($id_info)
    {
        $this->db->select('*');
        $query = $this->db->get_where('informasi', array('id_info' => $id_info))->row();
        return $query;
    }
}
