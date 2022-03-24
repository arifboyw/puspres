<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Ukt_model extends CI_Model
{
    public function usulan_bebas_ukt()
    {
        $this->db->select('*');
        $this->db->from('bebas_ukt');
        $this->db->join('mhs_kompetisi', 'bebas_ukt.id_mhs_kompetisi = mhs_kompetisi.id_mhs_kompetisi', 'left');
        $this->db->join('data_mahasiswa', 'bebas_ukt.nim = data_mahasiswa.nim', 'left');
        $this->db->join('prodi', 'data_mahasiswa.kode_prodi=prodi.kode_prodi', 'left');
        $this->db->join('fakultas', 'data_mahasiswa.kode_fak=fakultas.kode_fak', 'left');
        $this->db->join('kategori_peserta', 'mhs_kompetisi.id_kategori_peserta=kategori_peserta.id_kategori', 'left');
        $this->db->join('level_kegiatan', 'mhs_kompetisi.id_level = level_kegiatan.id_level', 'left');
        $this->db->join('capaian_prestasi', 'mhs_kompetisi.id_capaian = capaian_prestasi.id_capaian', 'left');
        $this->db->join('provinsi', 'mhs_kompetisi.prov_id=provinsi.prov_id', 'left');
        $this->db->where('bebas_ukt.usul_bebas_ukt', '1');
        $data = $this->db->get();
        return $data->result();
    }

    public function sk()
    {
        $this->db->select('*');
        $this->db->from('sk_bebas_ukt');
        $this->db->join('jadwal_bebas_ukt', 'sk_bebas_ukt.id_jadwal_bebas_ukt = jadwal_bebas_ukt.id_jadwal_bebas_ukt', 'left');
        $this->db->join('semester', 'jadwal_bebas_ukt.kode_semester = semester.kode_semester', 'left');
        $this->db->where('sk_bebas_ukt.status_sk', '0');
        $data = $this->db->get();
        return $data->result();
    }

    public function sk_valid()
    {
        $this->db->select('*');
        $this->db->from('sk_bebas_ukt');
        $this->db->join('jadwal_bebas_ukt', 'sk_bebas_ukt.id_jadwal_bebas_ukt = jadwal_bebas_ukt.id_jadwal_bebas_ukt', 'left');
        $this->db->join('semester', 'jadwal_bebas_ukt.kode_semester = semester.kode_semester', 'left');
        $this->db->where('sk_bebas_ukt.status_sk', '1');
        $data = $this->db->get();
        return $data->result();
    }

    public function usulan_disetujui($id_jadwal_bebas_ukt, $kode_fak, $kode_prodi, $nim)
    {
        $this->db->select('*');
        $this->db->from('bebas_ukt');
        $this->db->join('mhs_kompetisi', 'bebas_ukt.id_mhs_kompetisi = mhs_kompetisi.id_mhs_kompetisi', 'left');
        $this->db->join('data_mahasiswa', 'bebas_ukt.nim = data_mahasiswa.nim', 'left');
        $this->db->join('prodi', 'data_mahasiswa.kode_prodi=prodi.kode_prodi', 'left');
        $this->db->join('fakultas', 'data_mahasiswa.kode_fak=fakultas.kode_fak', 'left');
        $this->db->join('kategori_peserta', 'mhs_kompetisi.id_kategori_peserta=kategori_peserta.id_kategori', 'left');
        $this->db->join('level_kegiatan', 'mhs_kompetisi.id_level = level_kegiatan.id_level', 'left');
        $this->db->join('capaian_prestasi', 'mhs_kompetisi.id_capaian = capaian_prestasi.id_capaian', 'left');
        $this->db->join('provinsi', 'mhs_kompetisi.prov_id=provinsi.prov_id', 'left');
        $this->db->where('bebas_ukt.usul_bebas_ukt', '2');
        $this->db->like('id_jadwal_bebas_ukt', $id_jadwal_bebas_ukt);
        $this->db->like('fakultas.kode_fak', $kode_fak);
        $this->db->like('prodi.kode_prodi', $kode_prodi);
        $this->db->like('bebas_ukt.nim', $nim);
        $data = $this->db->get();
        return $data->result();
    }

    public function usulan_ditolak($id_jadwal_bebas_ukt, $kode_fak, $kode_prodi, $nim)
    {
        $this->db->select('*');
        $this->db->from('bebas_ukt');
        $this->db->join('mhs_kompetisi', 'bebas_ukt.id_mhs_kompetisi = mhs_kompetisi.id_mhs_kompetisi', 'left');
        $this->db->join('data_mahasiswa', 'bebas_ukt.nim = data_mahasiswa.nim', 'left');
        $this->db->join('prodi', 'data_mahasiswa.kode_prodi=prodi.kode_prodi', 'left');
        $this->db->join('fakultas', 'data_mahasiswa.kode_fak=fakultas.kode_fak', 'left');
        $this->db->join('kategori_peserta', 'mhs_kompetisi.id_kategori_peserta=kategori_peserta.id_kategori', 'left');
        $this->db->join('level_kegiatan', 'mhs_kompetisi.id_level = level_kegiatan.id_level', 'left');
        $this->db->join('capaian_prestasi', 'mhs_kompetisi.id_capaian = capaian_prestasi.id_capaian', 'left');
        $this->db->join('provinsi', 'mhs_kompetisi.prov_id=provinsi.prov_id', 'left');
        $this->db->where('bebas_ukt.usul_bebas_ukt', '3');
        $this->db->like('id_jadwal_bebas_ukt', $id_jadwal_bebas_ukt);
        $this->db->like('fakultas.kode_fak', $kode_fak);
        $this->db->like('prodi.kode_prodi', $kode_prodi);
        $this->db->like('bebas_ukt.nim', $nim);
        $data = $this->db->get();
        return $data->result();
    }
    public function detail_mahasiswa($id_bebas_ukt)
    {
        $this->db->select('*');
        $this->db->join('mhs_kompetisi', 'bebas_ukt.id_mhs_kompetisi = mhs_kompetisi.id_mhs_kompetisi', 'left');
        $this->db->join('pemberi_bantuan', 'mhs_kompetisi.id_pemberi_bantuan = pemberi_bantuan.id_pemberi_bantuan', 'left');
        $this->db->join('data_mahasiswa', 'bebas_ukt.nim = data_mahasiswa.nim', 'left');
        $this->db->join('prodi', 'data_mahasiswa.kode_prodi=prodi.kode_prodi', 'left');
        $this->db->join('fakultas', 'data_mahasiswa.kode_fak=fakultas.kode_fak', 'left');
        $this->db->join('level_kegiatan', 'mhs_kompetisi.id_level = level_kegiatan.id_level', 'left');
        $this->db->join('kategori_peserta', 'mhs_kompetisi.id_kategori_peserta=kategori_peserta.id_kategori', 'left');
        $this->db->join('provinsi', 'mhs_kompetisi.prov_id=provinsi.prov_id', 'left');
        $this->db->join('kategori_penyelenggara', 'mhs_kompetisi.id_penyelenggara=kategori_penyelenggara.id_penyelenggara', 'left');
        $this->db->join('capaian_prestasi', 'mhs_kompetisi.id_capaian = capaian_prestasi.id_capaian', 'left');
        $query = $this->db->get_where('bebas_ukt', array('bebas_ukt.id_bebas_ukt' => $id_bebas_ukt))->row();
        return $query;
    }
    public function detail($id_bebas_ukt)
    {
        $this->db->select('*');
        $this->db->join('mhs_kompetisi', 'bebas_ukt.id_mhs_kompetisi = mhs_kompetisi.id_mhs_kompetisi', 'left');
        $this->db->join('level_kegiatan', 'mhs_kompetisi.id_level = level_kegiatan.id_level', 'left');
        $this->db->join('capaian_prestasi', 'mhs_kompetisi.id_capaian = capaian_prestasi.id_capaian', 'left');
        $this->db->join('upload_bukti_kompetisi', 'mhs_kompetisi.id_mhs_kompetisi = upload_bukti_kompetisi.id_mhs_kompetisi', 'left');
        $this->db->join('bukti_kompetisi', 'upload_bukti_kompetisi.id_bukti = bukti_kompetisi.id_bukti', 'left');
        $query = $this->db->get_where('bebas_ukt', array('bebas_ukt.id_bebas_ukt' => $id_bebas_ukt))->result();
        return $query;
    }
    public function preview_dokumen($id_upload = NULL)
    {
        $this->db->select('*');
        $query = $this->db->get_where('upload_bukti_kompetisi', array('id_upload' => $id_upload))->row();
        return $query;
    }
    function status_validasi(
        $semester,
        $jumlah_semester,
        $usul_bebas_ukt,
        $ket_bebas_ukt,
        $validasi_bebas_ukt,
        $user_bebas_ukt,
        $tgl_validasi,
        $id_bebas_ukt
    ) {
        $hasil = $this->db->query("UPDATE bebas_ukt SET 
        jumlah_semester='$jumlah_semester',
        usul_bebas_ukt='$usul_bebas_ukt',
        ket_bebas_ukt='$ket_bebas_ukt',
        validasi_bebas_ukt='$validasi_bebas_ukt',
        user_bebas_ukt='$user_bebas_ukt',
        tgl_validasi='$tgl_validasi',
        nama_semester_bu='$semester'
        WHERE id_bebas_ukt='$id_bebas_ukt'");
        return $hasil;
    }

    function tambah_penerima(
        $nim,
        $status_sk,
        $id_jadwal_bebas_ukt
    ) {
        $hasil = $this->db->query("UPDATE bebas_ukt SET 
        status_sk='$status_sk'
        WHERE id_jadwal_bebas_ukt='$id_jadwal_bebas_ukt' AND nim='$nim'
        ");
        return $hasil;
    }

    function finalisasi_penetapan(
        $status_sk,
        $id_sk
    ) {
        $hasil = $this->db->query("UPDATE sk_bebas_ukt SET 
        status_sk='$status_sk'
        WHERE id_sk='$id_sk'
        ");
        return $hasil;
    }

    function status_validasi_2(
        $usul_bebas_ukt,
        $ket_bebas_ukt,
        $validasi_bebas_ukt,
        $user_bebas_ukt,
        $tgl_validasi,
        $id_bebas_ukt
    ) {
        $hasil = $this->db->query("UPDATE bebas_ukt SET 
        usul_bebas_ukt='$usul_bebas_ukt',
        ket_bebas_ukt='$ket_bebas_ukt',
        validasi_bebas_ukt='$validasi_bebas_ukt',
        user_bebas_ukt='$user_bebas_ukt',
        tgl_validasi='$tgl_validasi'
        WHERE id_bebas_ukt='$id_bebas_ukt'");
        return $hasil;
    }

    public function tampil_semester()
    {
        $hasil = $this->db->query("SELECT *
        FROM semester
        WHERE status_semester='1'
        ");
        return $hasil->result();
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

    public function jadwal_bebas_ukt()
    {
        $hasil = $this->db->query("SELECT *
        FROM jadwal_bebas_ukt
        join semester on jadwal_bebas_ukt.kode_semester=semester.kode_semester
        ");
        return $hasil->result();
    }

    public function jumlah_pengusul($id_sk)
    {
        $this->db->join('bebas_ukt', 'sk_bebas_ukt.id_jadwal_bebas_ukt=bebas_ukt.id_jadwal_bebas_ukt', 'left');
        $this->db->where('usul_bebas_ukt', 2);
        $query = $this->db->get_where('sk_bebas_ukt', array('id_sk' => $id_sk));
        if ($query->num_rows() > 0) {
            return $query->num_rows();
        } else {
            return 0;
        }
    }
    public function jumlah_ditetapkan($id_sk)
    {
        $this->db->join('bebas_ukt', 'sk_bebas_ukt.id_jadwal_bebas_ukt=bebas_ukt.id_jadwal_bebas_ukt', 'left');
        $this->db->where('bebas_ukt.status_sk', 1);
        $query = $this->db->get_where('sk_bebas_ukt', array('id_sk' => $id_sk));
        if ($query->num_rows() > 0) {
            return $query->num_rows();
        } else {
            return 0;
        }
    }
    public function jumlah_diterima($id_sk)
    {
        $this->db->join('bebas_ukt', 'sk_bebas_ukt.id_jadwal_bebas_ukt=bebas_ukt.id_jadwal_bebas_ukt', 'left');
        $this->db->where('usul_bebas_ukt', 2);
        $this->db->where('bebas_ukt.status_sk', 1);
        $query = $this->db->get_where('sk_bebas_ukt', array('id_sk' => $id_sk));
        if ($query->num_rows() > 0) {
            return $query->num_rows();
        } else {
            return 0;
        }
    }
    public function detail_sk($id_sk)
    {
        $this->db->select('*');
        $this->db->join('bebas_ukt', 'sk_bebas_ukt.id_jadwal_bebas_ukt=bebas_ukt.id_jadwal_bebas_ukt', 'left');
        $this->db->join('jadwal_bebas_ukt', 'sk_bebas_ukt.id_jadwal_bebas_ukt=jadwal_bebas_ukt.id_jadwal_bebas_ukt', 'left');
        $this->db->join('semester', 'jadwal_bebas_ukt.kode_semester=semester.kode_semester', 'left');
        $this->db->join('mhs_kompetisi', 'bebas_ukt.id_mhs_kompetisi = mhs_kompetisi.id_mhs_kompetisi', 'left');
        $this->db->join('data_mahasiswa', 'bebas_ukt.nim = data_mahasiswa.nim', 'left');
        $this->db->join('prodi', 'data_mahasiswa.kode_prodi=prodi.kode_prodi', 'left');
        $this->db->join('fakultas', 'data_mahasiswa.kode_fak=fakultas.kode_fak', 'left');
        $this->db->join('level_kegiatan', 'mhs_kompetisi.id_level = level_kegiatan.id_level', 'left');
        $this->db->join('kategori_peserta', 'mhs_kompetisi.id_kategori_peserta=kategori_peserta.id_kategori', 'left');
        $this->db->join('provinsi', 'mhs_kompetisi.prov_id=provinsi.prov_id', 'left');
        $this->db->join('kategori_penyelenggara', 'mhs_kompetisi.id_penyelenggara=kategori_penyelenggara.id_penyelenggara', 'left');
        $this->db->join('capaian_prestasi', 'mhs_kompetisi.id_capaian = capaian_prestasi.id_capaian', 'left');
        $query = $this->db->get_where('sk_bebas_ukt', array('sk_bebas_ukt.id_sk' => $id_sk))->row();
        return $query;
    }
    public function detail_mahasiswa2($id_mhs_kompetisi)
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
    public function detail2($id_mhs_kompetisi)
    {
        $this->db->select('*');
        $this->db->join('level_kegiatan', 'mhs_kompetisi.id_level = level_kegiatan.id_level', 'left');
        $this->db->join('capaian_prestasi', 'mhs_kompetisi.id_capaian = capaian_prestasi.id_capaian', 'left');
        $this->db->join('upload_bukti_kompetisi', 'mhs_kompetisi.id_mhs_kompetisi = upload_bukti_kompetisi.id_mhs_kompetisi', 'left');
        $this->db->join('bukti_kompetisi', 'upload_bukti_kompetisi.id_bukti = bukti_kompetisi.id_bukti', 'left');
        $query = $this->db->get_where('mhs_kompetisi', array('mhs_kompetisi.id_mhs_kompetisi' => $id_mhs_kompetisi))->result();
        return $query;
    }
    public function daftar_diterima($id_sk)
    {
        $this->db->select('*');
        $this->db->from('sk_bebas_ukt');
        $this->db->join('bebas_ukt', 'sk_bebas_ukt.id_jadwal_bebas_ukt = bebas_ukt.id_jadwal_bebas_ukt', 'left');
        $this->db->join('jadwal_bebas_ukt', 'bebas_ukt.id_jadwal_bebas_ukt = jadwal_bebas_ukt.id_jadwal_bebas_ukt', 'left');
        $this->db->join('mhs_kompetisi', 'bebas_ukt.id_mhs_kompetisi = mhs_kompetisi.id_mhs_kompetisi', 'left');
        $this->db->join('data_mahasiswa', 'bebas_ukt.nim = data_mahasiswa.nim', 'left');
        $this->db->join('prodi', 'data_mahasiswa.kode_prodi=prodi.kode_prodi', 'left');
        $this->db->join('fakultas', 'data_mahasiswa.kode_fak=fakultas.kode_fak', 'left');
        $this->db->join('kategori_peserta', 'mhs_kompetisi.id_kategori_peserta=kategori_peserta.id_kategori', 'left');
        $this->db->join('level_kegiatan', 'mhs_kompetisi.id_level = level_kegiatan.id_level', 'left');
        $this->db->join('capaian_prestasi', 'mhs_kompetisi.id_capaian = capaian_prestasi.id_capaian', 'left');
        $this->db->join('provinsi', 'mhs_kompetisi.prov_id=provinsi.prov_id', 'left');
        $this->db->where('sk_bebas_ukt.id_sk', $id_sk);
        $data = $this->db->get();
        return $data->result();
    }
    public function fakultas_rekap()
    {
        $this->db->select('*');
        $query = $this->db->get('fakultas');
        $result = $query->result();
        return $result;
    }
    public function level()
    {
        $hasil = $this->db->query("SELECT * FROM level_kegiatan");
        return $hasil->result();
    }
    public function rekap($id_jadwal_bebas_ukt)
    {
        $this->db->select('bebas_ukt.nim,fakultas.kode_fak, level_kegiatan.id_level');
        $this->db->join('data_mahasiswa', 'bebas_ukt.nim=data_mahasiswa.nim', 'left');
        $this->db->join('fakultas', 'data_mahasiswa.kode_fak=fakultas.kode_fak', 'left');
        $this->db->join('mhs_kompetisi', 'bebas_ukt.id_mhs_kompetisi=mhs_kompetisi.id_mhs_kompetisi', 'left');
        $this->db->join('level_kegiatan', 'mhs_kompetisi.id_level=level_kegiatan.id_level');
        $this->db->where('usul_bebas_ukt', '2');
        $this->db->where('validasi_bebas_ukt', '1');
        $this->db->where('status_sk', '1');
        $this->db->like('id_jadwal_bebas_ukt', $id_jadwal_bebas_ukt);
        $this->db->group_by('fakultas.kode_fak,id_level');
        $query = $this->db->get('bebas_ukt');
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
        $this->db->select('fakultas.kode_fak, level_kegiatan.id_level,count(data_mahasiswa.kode_fak) as jumlah_per_fakultas');
        $this->db->join('mhs_kompetisi', 'bebas_ukt.id_mhs_kompetisi=mhs_kompetisi.id_mhs_kompetisi');
        $this->db->join('level_kegiatan', 'mhs_kompetisi.id_level=level_kegiatan.id_level');
        $this->db->join('data_mahasiswa', 'bebas_ukt.nim=data_mahasiswa.nim');
        $this->db->join('fakultas', 'data_mahasiswa.kode_fak=fakultas.kode_fak');
        $this->db->group_by('kode_fak,level_kegiatan.id_level');
        $this->db->order_by('level_kegiatan.id_level', 'ASC');
        $query = $this->db->get_where('bebas_ukt', array('fakultas.kode_fak' => $kode_fak, 'level_kegiatan.id_level' => $id_level));
        $result = $query->result();
        return $result;
    }
    public function total_universitas($id_jadwal_bebas_ukt)
    {
        $this->db->join('mhs_kompetisi', 'bebas_ukt.id_mhs_kompetisi=mhs_kompetisi.id_mhs_kompetisi');
        $this->db->join('level_kegiatan', 'mhs_kompetisi.id_level=level_kegiatan.id_level');
        $this->db->where('level_kegiatan.id_level', 1);
        $this->db->where('usul_bebas_ukt', '2');
        $this->db->where('validasi_bebas_ukt', '1');
        $this->db->where('status_sk', '1');
        $this->db->like('id_jadwal_bebas_ukt', $id_jadwal_bebas_ukt);
        $query = $this->db->get('bebas_ukt');
        if ($query->num_rows() > 0) {
            return $query->num_rows();
        } else {
            return 0;
        }
    }
    public function total_provinsi($id_jadwal_bebas_ukt)
    {
        $this->db->join('mhs_kompetisi', 'bebas_ukt.id_mhs_kompetisi=mhs_kompetisi.id_mhs_kompetisi');
        $this->db->join('level_kegiatan', 'mhs_kompetisi.id_level=level_kegiatan.id_level');
        $this->db->where('level_kegiatan.id_level', 2);
        $this->db->where('usul_bebas_ukt', '2');
        $this->db->where('validasi_bebas_ukt', '1');
        $this->db->where('status_sk', '1');
        $this->db->like('id_jadwal_bebas_ukt', $id_jadwal_bebas_ukt);
        $query = $this->db->get('bebas_ukt');
        if ($query->num_rows() > 0) {
            return $query->num_rows();
        } else {
            return 0;
        }
    }
    public function total_regional($id_jadwal_bebas_ukt)
    {
        $this->db->join('mhs_kompetisi', 'bebas_ukt.id_mhs_kompetisi=mhs_kompetisi.id_mhs_kompetisi');
        $this->db->join('level_kegiatan', 'mhs_kompetisi.id_level=level_kegiatan.id_level');
        $this->db->where('level_kegiatan.id_level', 3);
        $this->db->where('usul_bebas_ukt', '2');
        $this->db->where('validasi_bebas_ukt', '1');
        $this->db->where('status_sk', '1');
        $this->db->like('id_jadwal_bebas_ukt', $id_jadwal_bebas_ukt);
        $query = $this->db->get('bebas_ukt');
        if ($query->num_rows() > 0) {
            return $query->num_rows();
        } else {
            return 0;
        }
    }
    public function total_nasional($id_jadwal_bebas_ukt)
    {
        $this->db->join('mhs_kompetisi', 'bebas_ukt.id_mhs_kompetisi=mhs_kompetisi.id_mhs_kompetisi');
        $this->db->join('level_kegiatan', 'mhs_kompetisi.id_level=level_kegiatan.id_level');
        $this->db->where('level_kegiatan.id_level', 4);
        $this->db->where('usul_bebas_ukt', '2');
        $this->db->where('validasi_bebas_ukt', '1');
        $this->db->where('status_sk', '1');
        $this->db->like('id_jadwal_bebas_ukt', $id_jadwal_bebas_ukt);
        $query = $this->db->get('bebas_ukt');
        if ($query->num_rows() > 0) {
            return $query->num_rows();
        } else {
            return 0;
        }
    }
    public function total_internasional($id_jadwal_bebas_ukt)
    {
        $this->db->join('mhs_kompetisi', 'bebas_ukt.id_mhs_kompetisi=mhs_kompetisi.id_mhs_kompetisi');
        $this->db->join('level_kegiatan', 'mhs_kompetisi.id_level=level_kegiatan.id_level');
        $this->db->where('level_kegiatan.id_level', 5);
        $this->db->where('usul_bebas_ukt', '2');
        $this->db->where('validasi_bebas_ukt', '1');
        $this->db->where('status_sk', '1');
        $this->db->like('id_jadwal_bebas_ukt', $id_jadwal_bebas_ukt);
        $query = $this->db->get('bebas_ukt');
        if ($query->num_rows() > 0) {
            return $query->num_rows();
        } else {
            return 0;
        }
    }
    public function rekap_pembayaran($id_jadwal_bebas_ukt)
    {
        $this->db->select('*');
        $this->db->from('bebas_ukt');
        $this->db->join('sk_bebas_ukt', 'bebas_ukt.id_jadwal_bebas_ukt = sk_bebas_ukt.id_jadwal_bebas_ukt', 'left');
        $this->db->join('mhs_kompetisi', 'bebas_ukt.id_mhs_kompetisi = mhs_kompetisi.id_mhs_kompetisi', 'left');
        $this->db->join('data_mahasiswa', 'bebas_ukt.nim = data_mahasiswa.nim', 'left');
        $this->db->join('prodi', 'data_mahasiswa.kode_prodi=prodi.kode_prodi', 'left');
        $this->db->join('fakultas', 'data_mahasiswa.kode_fak=fakultas.kode_fak', 'left');
        $this->db->join('kategori_peserta', 'mhs_kompetisi.id_kategori_peserta=kategori_peserta.id_kategori', 'left');
        $this->db->join('level_kegiatan', 'mhs_kompetisi.id_level = level_kegiatan.id_level', 'left');
        $this->db->join('capaian_prestasi', 'mhs_kompetisi.id_capaian = capaian_prestasi.id_capaian', 'left');
        $this->db->join('provinsi', 'mhs_kompetisi.prov_id=provinsi.prov_id', 'left');
        $this->db->where('sk_bebas_ukt.status_sk', 1);
        $this->db->like('bebas_ukt.id_jadwal_bebas_ukt', $id_jadwal_bebas_ukt);
        $data = $this->db->get();
        return $data->result();
    }
    public function totalbantuan($id_jadwal_bebas_ukt)
    {
        $this->db->select('id_bebas_ukt, sum(jumlah_semester*jumlah_ukt) as jumlah');
        $this->db->from('bebas_ukt');
        $this->db->where('usul_bebas_ukt', 2);
        $this->db->where('validasi_bebas_ukt', 1);
        $this->db->where('status_sk', 1);
        $this->db->like('id_jadwal_bebas_ukt', $id_jadwal_bebas_ukt);
        $data = $this->db->get();
        return $data->result();
    }
}
