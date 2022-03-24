<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Pendataan_model extends CI_Model
{
    public function jadwal()
    {
        $hasil = $this->db->query("SELECT *
        FROM jadwal
        JOIN triwulan ON jadwal.kode_triwulan=triwulan.kode_triwulan
        JOIN semester ON jadwal.kode_semester=semester.kode_semester
        ");
        return $hasil->result();
    }
    public function jadwal_bebas_ukt()
    {
        $hasil = $this->db->query("SELECT *
        FROM jadwal_bebas_ukt
        JOIN semester ON jadwal_bebas_ukt.kode_semester=semester.kode_semester
        ");
        return $hasil->result();
    }

    public function jadwal_check($id_jadwal)
    {
        $this->db->select('*');
        $query = $this->db->get_where('jadwal', array('jadwal.id_jadwal' => $id_jadwal))->row();
        return $query;
    }

    public function jadwal_check_bebas_ukt($id_jadwal_bebas_ukt)
    {
        $this->db->select('*');
        $query = $this->db->get_where('jadwal_bebas_ukt', array('jadwal_bebas_ukt.id_jadwal_bebas_ukt' => $id_jadwal_bebas_ukt))->row();
        return $query;
    }

    public function hapus_jadwal($id_jadwal)
    {
        $this->db->delete('jadwal', array('id_jadwal' => $id_jadwal));
        return ($this->db->affected_rows() > 0) ? TRUE : FALSE;
    }

    public function hapus_jadwal_bebas_ukt($id_jadwal_bebas_ukt)
    {
        $this->db->delete('jadwal_bebas_ukt', array('id_jadwal_bebas_ukt' => $id_jadwal_bebas_ukt));
        return ($this->db->affected_rows() > 0) ? TRUE : FALSE;
    }

    public function tampil_semester()
    {
        $hasil = $this->db->query("SELECT *
        FROM semester
        WHERE status_semester='1'
        ");
        return $hasil->result();
    }

    public function tampil_triwulan()
    {
        $hasil = $this->db->query("SELECT *
        FROM triwulan
        WHERE status_triwulan='1'
        ");
        return $hasil->result();
    }

    public function semester()
    {
        $this->db->select('*');
        $this->db->from('semester');
        $this->db->order_by('status_semester', 'DESC');
        $data = $this->db->get();
        return $data->result();
    }
    public function semester_check($id)
    {
        $this->db->select('*');
        $query = $this->db->get_where('semester', array('semester.id' => $id))->row();
        return $query;
    }
    public function semester_edit($kode_semester, $nama_semester, $alias, $status_semester, $id)
    {
        $hasil = $this->db->query("UPDATE semester SET 
        kode_semester='$kode_semester', 
        nama_semester='$nama_semester',
        alias='$alias',
        status_semester='$status_semester'
        WHERE id='$id'");
        return $hasil;
    }
    public function hapus_semester($id)
    {
        $this->db->delete('semester', array('id' => $id));
        return ($this->db->affected_rows() > 0) ? TRUE : FALSE;
    }
    public function triwulan()
    {
        $this->db->select('*');
        $this->db->from('triwulan');
        $this->db->order_by('status_triwulan', 'DESC');
        $data = $this->db->get();
        return $data->result();
    }
    public function triwulan_check($id_triwulan)
    {
        $this->db->select('*');
        $query = $this->db->get_where('triwulan', array('triwulan.id_triwulan' => $id_triwulan))->row();
        return $query;
    }
    public function hapus_triwulan($id_triwulan)
    {
        $this->db->delete('triwulan', array('id_triwulan' => $id_triwulan));
        return ($this->db->affected_rows() > 0) ? TRUE : FALSE;
    }

    public function daftar_prestasi_mandiri()
    {
        $this->db->select('*');
        $this->db->from('mhs_kompetisi');
        $this->db->join('data_mahasiswa', 'mhs_kompetisi.nim = data_mahasiswa.nim', 'nim');
        $this->db->join('prodi', 'prodi.kode_prodi = data_mahasiswa.kode_prodi', 'left');
        $this->db->join('fakultas', 'fakultas.kode_fak = data_mahasiswa.kode_fak', 'left');
        $this->db->join('capaian_prestasi', 'mhs_kompetisi.id_capaian = capaian_prestasi.id_capaian', 'left');
        $this->db->join('upload_bukti_kompetisi', 'mhs_kompetisi.id_mhs_kompetisi = upload_bukti_kompetisi.id_mhs_kompetisi', 'left');
        $this->db->join('bukti_kompetisi', 'upload_bukti_kompetisi.id_bukti = bukti_kompetisi.id_bukti', 'left');
        $this->db->where('status_upload', '1');
        $this->db->where('konfirmasi', '1');
        $this->db->where('mhs_kompetisi.status_validasi', '1');
        $this->db->order_by('nama_fak', 'asc');
        $this->db->group_by('upload_bukti_kompetisi.id_mhs_kompetisi', 'asc');
        $data = $this->db->get();
        return $data;
        return $data->result();
    }
    public function tampil_prestasi($tahun_kegiatan, $kode_fak, $kode_prodi, $nim)
    {
        $this->db->select('*');
        $this->db->from('mhs_kompetisi');
        $this->db->join('data_mahasiswa', 'mhs_kompetisi.nim = data_mahasiswa.nim', 'nim');
        $this->db->join('prodi', 'prodi.kode_prodi = data_mahasiswa.kode_prodi', 'left');
        $this->db->join('fakultas', 'fakultas.kode_fak = data_mahasiswa.kode_fak', 'left');
        $this->db->join('capaian_prestasi', 'mhs_kompetisi.id_capaian = capaian_prestasi.id_capaian', 'left');
        $this->db->join('upload_bukti_kompetisi', 'mhs_kompetisi.id_mhs_kompetisi = upload_bukti_kompetisi.id_mhs_kompetisi', 'left');
        $this->db->join('bukti_kompetisi', 'upload_bukti_kompetisi.id_bukti = bukti_kompetisi.id_bukti', 'left');
        $this->db->like('mhs_kompetisi.tahun_kegiatan', $tahun_kegiatan);
        $this->db->like('fakultas.kode_fak', $kode_fak);
        $this->db->like('prodi.kode_prodi', $kode_prodi);
        $this->db->like('mhs_kompetisi.nim', $nim);
        $this->db->order_by('nama_fak', 'asc');
        $this->db->group_by('upload_bukti_kompetisi.id_mhs_kompetisi', 'asc');
        $data = $this->db->get();
        return $data;
        return $data->result();
    }
    public function tampil_fakultas()
    {
        $hasil = $this->db->query("SELECT *
        FROM fakultas
        ");
        return $hasil->result();
    }
    public function tampil_prodi()
    {
        $hasil = $this->db->query("SELECT *
        FROM prodi
        ");
        return $hasil->result();
    }
    public function level()
    {
        $hasil = $this->db->query("SELECT * FROM level_kegiatan");
        return $hasil->result();
    }
    public function per_tingkat($tahun_kegiatan)
    {
        $this->db->select('tahun_kegiatan,nama_level,sum(status_validasi=1) as jumlah');
        $this->db->from('mhs_kompetisi');
        $this->db->join('level_kegiatan', 'mhs_kompetisi.id_level = level_kegiatan.id_level', 'left');
        $this->db->like('tahun_kegiatan', $tahun_kegiatan);
        $this->db->group_by('nama_level');
        $this->db->order_by('tahun_kegiatan', 'ASC');
        $data = $this->db->get();
        return $data->result();
    }
    public function total($tahun_kegiatan)
    {
        $this->db->select('sum(status_validasi=1) as total');
        $this->db->from('mhs_kompetisi');
        $this->db->like('tahun_kegiatan', $tahun_kegiatan);
        $data = $this->db->get();
        return $data->result();
    }
    public function total_universitas($tahun_kegiatan)
    {
        $this->db->where('id_level', 1);
        $this->db->where('status_validasi', 1);
        $this->db->like('tahun_kegiatan', $tahun_kegiatan);
        $query = $this->db->get('mhs_kompetisi');
        if ($query->num_rows() > 0) {
            return $query->num_rows();
        } else {
            return 0;
        }
    }
    public function total_provinsi($tahun_kegiatan)
    {
        $this->db->where('id_level', 2);
        $this->db->where('status_validasi', 1);
        $this->db->like('tahun_kegiatan', $tahun_kegiatan);
        $query = $this->db->get('mhs_kompetisi');
        if ($query->num_rows() > 0) {
            return $query->num_rows();
        } else {
            return 0;
        }
    }
    public function total_regional($tahun_kegiatan)
    {
        $this->db->where('id_level', 3);
        $this->db->where('status_validasi', 1);
        $this->db->like('tahun_kegiatan', $tahun_kegiatan);
        $query = $this->db->get('mhs_kompetisi');
        if ($query->num_rows() > 0) {
            return $query->num_rows();
        } else {
            return 0;
        }
    }
    public function total_nasional($tahun_kegiatan)
    {
        $this->db->where('id_level', 4);
        $this->db->where('status_validasi', 1);
        $this->db->like('tahun_kegiatan', $tahun_kegiatan);
        $query = $this->db->get('mhs_kompetisi');
        if ($query->num_rows() > 0) {
            return $query->num_rows();
        } else {
            return 0;
        }
    }
    public function total_internasional($tahun_kegiatan)
    {
        $this->db->where('id_level', 5);
        $this->db->where('status_validasi', 1);
        $this->db->like('tahun_kegiatan', $tahun_kegiatan);
        $query = $this->db->get('mhs_kompetisi');
        if ($query->num_rows() > 0) {
            return $query->num_rows();
        } else {
            return 0;
        }
    }
    public function rekap($tahun_kegiatan)
    {
        $this->db->select('mhs_kompetisi.nim,fakultas.kode_fak, level_kegiatan.id_level, tahun_kegiatan');
        $this->db->join('data_mahasiswa', 'mhs_kompetisi.nim=data_mahasiswa.nim', 'left');
        $this->db->join('fakultas', 'data_mahasiswa.kode_fak=fakultas.kode_fak', 'left');
        $this->db->join('level_kegiatan', 'mhs_kompetisi.id_level=level_kegiatan.id_level');
        $this->db->where('status_validasi', '1');
        $this->db->like('tahun_kegiatan', $tahun_kegiatan);
        $this->db->group_by('fakultas.kode_fak,id_level');
        $query = $this->db->get('mhs_kompetisi');
        $temp = $query->result();
        $result['data'] = array();
        foreach ($temp as $data) {
            $data->jlh = $this->jumlah_per_fakultas($data->kode_fak, $data->id_level);
            $result['data'][] = $data;
        }
        return $result;
    }

    public function jumlah_per_fakultas($kode_fak, $id_level)
    {
        $this->db->select('fakultas.kode_fak, id_level,count(data_mahasiswa.kode_fak) as jumlah_per_fakultas');
        $this->db->join('data_mahasiswa', 'mhs_kompetisi.nim=data_mahasiswa.nim');
        $this->db->join('fakultas', 'data_mahasiswa.kode_fak=fakultas.kode_fak');
        $this->db->group_by('kode_fak,id_level');
        $this->db->order_by('id_level', 'ASC');
        $query = $this->db->get_where('mhs_kompetisi', array('fakultas.kode_fak' => $kode_fak, 'id_level' => $id_level));
        $result = $query->result();
        return $result;
    }

    public function fakultas_rekap()
    {
        $this->db->select('*');
        $query = $this->db->get('fakultas');
        $result = $query->result();
        return $result;
    }
}
