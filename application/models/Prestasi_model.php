<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Prestasi_model extends CI_Model
{
    public function opt_fakultas($index_data = NULL)
    {
        $this->db->select('*');
        $this->db->from('mhs_kompetisi');
        $this->db->join('data_mahasiswa', 'mhs_kompetisi.nim = data_mahasiswa.nim', 'left');
        $this->db->join('prodi', 'prodi.kode_prodi = data_mahasiswa.kode_prodi', 'left');
        $this->db->join('fakultas', 'fakultas.kode_fak = data_mahasiswa.kode_fak', 'left');
        if ($index_data != NULL) {
            $this->db->where('data_mahasiswa.kode_fak', $index_data);
            $this->db->where('status_upload', '1');
            $this->db->where('konfirmasi', '1');
            $this->db->where('status_validasi', '0');
        }

        $data = $this->db->get();
        return $data->result();
    }
    public function daftar_prestasi_mandiri($index_data = NULL)
    {
        $this->db->select('*');
        $this->db->from('mhs_kompetisi');
        $this->db->join('data_mahasiswa', 'mhs_kompetisi.nim = data_mahasiswa.nim', 'nim');
        $this->db->join('prodi', 'prodi.kode_prodi = data_mahasiswa.kode_prodi', 'left');
        $this->db->join('fakultas', 'fakultas.kode_fak = data_mahasiswa.kode_fak', 'left');
        $this->db->join('capaian_prestasi', 'mhs_kompetisi.id_capaian = capaian_prestasi.id_capaian', 'left');
        if ($index_data != NULL) {
            $this->db->where('data_mahasiswa.kode_fak', $index_data);
            $this->db->where('status_upload', '1');
            $this->db->where('konfirmasi', '1');
            $this->db->where('status_validasi', '1');
            $this->db->order_by('nama_prodi', 'asc');
        }

        $data = $this->db->get();
        return $data->result();
    }
    public function detail_mahasiswa($id_mhs_kompetisi)
    {
        $this->db->select('*');
        $this->db->join('pemberi_bantuan', 'mhs_kompetisi.id_pemberi_bantuan = pemberi_bantuan.id_pemberi_bantuan', 'left');
        $this->db->join('data_mahasiswa', 'mhs_kompetisi.nim = data_mahasiswa.nim', 'left');
        $this->db->join('prodi', 'data_mahasiswa.kode_prodi=prodi.kode_prodi', 'left');
        $this->db->join('fakultas', 'data_mahasiswa.kode_fak=fakultas.kode_fak', 'left');
        $this->db->join('level_kegiatan', 'mhs_kompetisi.id_level = level_kegiatan.id_level', 'left');
        $this->db->join('kategori_peserta', 'mhs_kompetisi.id_kategori_peserta=kategori_peserta.id_kategori', 'left');
        $this->db->join('provinsi', 'mhs_kompetisi.prov_id=provinsi.prov_id', 'left');
        $this->db->join('kategori_penyelenggara', 'mhs_kompetisi.id_penyelenggara=kategori_penyelenggara.id_penyelenggara', 'left');
        $this->db->join('capaian_prestasi', 'mhs_kompetisi.id_capaian = capaian_prestasi.id_capaian', 'left');
        $query = $this->db->get_where('mhs_kompetisi', array('mhs_kompetisi.id_mhs_kompetisi' => $id_mhs_kompetisi))->row();
        return $query;
    }
    public function detail($id_mhs_kompetisi)
    {
        $this->db->select('*');
        $this->db->join('level_kegiatan', 'mhs_kompetisi.id_level = level_kegiatan.id_level', 'left');
        $this->db->join('capaian_prestasi', 'mhs_kompetisi.id_capaian = capaian_prestasi.id_capaian', 'left');
        $this->db->join('upload_bukti_kompetisi', 'mhs_kompetisi.id_mhs_kompetisi = upload_bukti_kompetisi.id_mhs_kompetisi', 'left');
        $this->db->join('bukti_kompetisi', 'upload_bukti_kompetisi.id_bukti = bukti_kompetisi.id_bukti', 'left');
        $query = $this->db->get_where('mhs_kompetisi', array('mhs_kompetisi.id_mhs_kompetisi' => $id_mhs_kompetisi))->result();
        return $query;
    }
    public function preview_dokumen($id_upload = NULL)
    {
        $this->db->select('*');
        $query = $this->db->get_where('upload_bukti_kompetisi', array('id_upload' => $id_upload))->row();
        return $query;
    }
    function status_validasi($poin_kompetisi, $user_validasi, $ket_validasi, $status_validasi, $id_mhs_kompetisi)
    {
        $hasil = $this->db->query("UPDATE mhs_kompetisi SET status_validasi='$status_validasi',
        ket_validasi='$ket_validasi', user_validasi='$user_validasi', poin_kompetisi='$poin_kompetisi'
         WHERE id_mhs_kompetisi='$id_mhs_kompetisi'");
        return $hasil;
    }
    function entri_konfirmasi($user_validasi, $ket_validasi, $konfirmasi, $id_mhs_kompetisi)
    {
        $hasil = $this->db->query("UPDATE mhs_kompetisi SET konfirmasi='$konfirmasi',
        ket_validasi='$ket_validasi', user_validasi='$user_validasi'
         WHERE id_mhs_kompetisi='$id_mhs_kompetisi'");
        return $hasil;
    }
    public function prodi_rekap($index_data)
    {
        $this->db->select('*');
        $this->db->from('prodi');
        $this->db->join('fakultas', 'prodi.kode_fak=fakultas.kode_fak');
        $this->db->where('prodi.kode_fak', $index_data);
        $data = $this->db->get();
        return $data->result();
    }
    public function level()
    {
        $hasil = $this->db->query("SELECT * FROM level_kegiatan");
        return $hasil->result();
    }
    public function rekap($tahun_kegiatan, $index_data)
    {
        $this->db->select('mhs_kompetisi.nim,prodi.kode_prodi, level_kegiatan.id_level, tahun_kegiatan');
        $this->db->join('data_mahasiswa', 'mhs_kompetisi.nim=data_mahasiswa.nim', 'left');
        $this->db->join('prodi', 'data_mahasiswa.kode_prodi=prodi.kode_prodi', 'left');
        $this->db->join('fakultas', 'prodi.kode_fak=fakultas.kode_fak', 'left');
        $this->db->join('level_kegiatan', 'mhs_kompetisi.id_level=level_kegiatan.id_level');
        $this->db->where('prodi.kode_fak', $index_data);
        $this->db->where('status_validasi', '1');
        $this->db->like('tahun_kegiatan', $tahun_kegiatan);
        $this->db->group_by('prodi.kode_prodi,id_level');
        $query = $this->db->get('mhs_kompetisi');
        $temp = $query->result();
        $result['data'] = array();
        foreach ($temp as $data) {
            $data->jlh = $this->jumlah_per_fakultas($data->kode_prodi, $data->id_level);
            $result['data'][] = $data;
        }
        return $result;
    }

    public function jumlah_per_fakultas($kode_prodi, $id_level)
    {
        $this->db->select('prodi.kode_prodi, id_level,count(data_mahasiswa.kode_prodi) as jumlah_per_fakultas');
        $this->db->join('data_mahasiswa', 'mhs_kompetisi.nim=data_mahasiswa.nim');
        $this->db->join('prodi', 'data_mahasiswa.kode_prodi=prodi.kode_prodi');
        $this->db->join('fakultas', 'prodi.kode_fak=fakultas.kode_fak');
        $this->db->group_by('kode_prodi,id_level');
        $this->db->order_by('id_level', 'ASC');
        $query = $this->db->get_where('mhs_kompetisi', array('prodi.kode_prodi' => $kode_prodi, 'id_level' => $id_level));
        $result = $query->result();
        return $result;
    }
}
