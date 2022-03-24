<?php
defined('BASEPATH') or exit('No direct script access allowed');

class User_model extends CI_Model
{
    public function hapususer($id)
    {
        $this->db->delete('user', array('id' => $id));
        return ($this->db->affected_rows() > 0) ? TRUE : FALSE;
    }

    public function openuser($id)
    {
        $this->db->select('*');
        $this->db->from('user');
        $this->db->where('id', $id);
        $query = $this->db->get();
        $result = $query->result();
        return $result;
    }
}
