<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Informasi_model extends CI_Model
{
    public function daftar_informasi()
    {
        $this->db->select('*');
        $this->db->from('informasi');
        $data = $this->db->get();
        return $data->result();
    }
    public function detail_informasi($id_info)
    {
        $this->db->select('*');
        $query = $this->db->get_where('informasi', array('id_info' => $id_info))->row();
        return $query;
    }
    public function hapus_informasi($id_info)
    {
        $row = $this->db->where('id_info', $id_info)->get('informasi')->row();
        unlink('assets/upload/info/' . $row->nama_berkas);
        $this->db->delete('informasi', array('id_info' => $id_info));
        return true;
    }
    public function getDataByID($id_info)
    {
        return $this->db->get_where('informasi', array('id_info' => $id_info));
    }
    public function updateFile($id_info, $data)
    {
        $this->db->where('id_info', $id_info);
        return $this->db->update('informasi', $data);
    }
}
