<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Optfakultas_model extends CI_Model
{
    public function opt_fakultas($index_data = NULL)
    {
        $this->db->select('*');
        $this->db->join('user_role', 'user.role_id=user_role.id');
        $this->db->join('fakultas', 'user.akses_fakultas=fakultas.kode_fak');
        $query = $this->db->get_where('user', array('role_id' => $index_data))->row();
        return $query;
    }
}
