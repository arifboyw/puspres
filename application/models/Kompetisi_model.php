<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Kompetisi_model extends CI_Model
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

    public function prestasi($index_data = NULL)
    {
        $this->db->select('*');
        $this->db->from('mhs_kompetisi');
        $this->db->join('level_kegiatan', 'mhs_kompetisi.id_level = level_kegiatan.id_level', 'left');
        $this->db->join('capaian_prestasi', 'mhs_kompetisi.id_capaian = capaian_prestasi.id_capaian', 'left');
        if ($index_data != NULL) {
            $this->db->where('mhs_kompetisi.nim', $index_data);
            $this->db->where('mhs_kompetisi.status_validasi', '1');
        }
        $data = $this->db->get();
        return $data->result();
    }

    public function jadwal()
    {
        $hasil = $this->db->query("SELECT *
        FROM jadwal
        JOIN triwulan ON jadwal.kode_triwulan=triwulan.kode_triwulan
        JOIN semester ON jadwal.kode_semester=semester.kode_semester
        WHERE status_jadwal='1'
        ");
        return $hasil->result();
    }

    public function jadwal_bebas_ukt()
    {
        $hasil = $this->db->query("SELECT *
        FROM jadwal_bebas_ukt
        JOIN semester ON jadwal_bebas_ukt.kode_semester=semester.kode_semester
        WHERE status_jadwal='1'
        ");
        return $hasil->result();
    }

    function status_upload($status_upload, $id_mhs_kompetisi)
    {
        $hasil = $this->db->query("UPDATE mhs_kompetisi SET status_upload='$status_upload' WHERE id_mhs_kompetisi='$id_mhs_kompetisi'");
        return $hasil;
    }

    function edit(
        $tgl_pengajuan,
        $nama_kegiatan2,
        $id_level,
        $id_kategori,
        $jadwal_kegiatan,
        $tempat_kegiatan,
        $prov_id,
        $penyelenggara,
        $id_penyelenggara,
        $id_capaian,
        $no_sertifikat,
        $tgl_sertifikat,
        $ttd_sertifikat,
        $no_surat_tugas,
        $tgl_surat_tugas,
        $ttd_surat_tugas,
        $no_undangan,
        $tgl_surat_undangan,
        $pengundang,
        $url,
        $jumlah_bantuan,
        $terbilang,
        $id_pemberi_bantuan,
        $ket_pemberi,
        $id_mhs_kompetisi
    ) {
        $hasil = $this->db->query("UPDATE mhs_kompetisi SET 
        tgl_pengajuan='$tgl_pengajuan', 
        nama_kegiatan='$nama_kegiatan2', 
        id_level='$id_level',
        id_kategori_peserta='$id_kategori',
        jadwal_kegiatan='$jadwal_kegiatan',
        tempat_kegiatan='$tempat_kegiatan', 
        prov_id='$prov_id', 
        penyelenggara='$penyelenggara', 
        id_penyelenggara='$id_penyelenggara', 
        id_capaian='$id_capaian', 
        no_sertifikat='$no_sertifikat', 
        tgl_sertifikat='$tgl_sertifikat', 
        ttd_sertifikat='$ttd_sertifikat', 
        no_surat_tugas='$no_surat_tugas', 
        tgl_surat_tugas='$tgl_surat_tugas', 
        ttd_surat_tugas='$ttd_surat_tugas', 
        no_undangan='$no_undangan', 
        tgl_surat_undangan='$tgl_surat_undangan', 
        pengundang='$pengundang',
        url='$url', 
        jumlah_bantuan='$jumlah_bantuan', 
        terbilang='$terbilang', 
        id_pemberi_bantuan='$id_pemberi_bantuan', 
        ket_pemberi='$ket_pemberi'
        WHERE id_mhs_kompetisi='$id_mhs_kompetisi'");
        return $hasil;
    }

    function konfirmasi_usulan_2(
        $ket_bebas_ukt,
        $tgl_usulan,
        $usul_bebas_ukt,
        $jumlah_ukt,
        $id_mhs_kompetisi
    ) {
        $hasil = $this->db->query("UPDATE mhs_kompetisi SET 
        ket_bebas_ukt='$ket_bebas_ukt', 
        tgl_usulan='$tgl_usulan', 
        usul_bebas_ukt='$usul_bebas_ukt', 
        jumlah_ukt='$jumlah_ukt'
        WHERE id_mhs_kompetisi='$id_mhs_kompetisi'");
        return $hasil;
    }


    function konfirmasi($konfirmasi, $id_mhs_kompetisi)
    {
        $hasil = $this->db->query("UPDATE mhs_kompetisi SET konfirmasi='$konfirmasi' WHERE id_mhs_kompetisi='$id_mhs_kompetisi'");
        return $hasil;
    }

    function status_draft($konfirmasi, $id_mhs_kompetisi)
    {
        $hasil = $this->db->query("UPDATE mhs_kompetisi SET konfirmasi='$konfirmasi' WHERE id_mhs_kompetisi='$id_mhs_kompetisi'");
        return $hasil;
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

    public function draf($index_data = NULL)
    {
        $this->db->select('*');
        $this->db->from('mhs_kompetisi');
        $this->db->join('level_kegiatan', 'mhs_kompetisi.id_level = level_kegiatan.id_level', 'left');
        $this->db->join('capaian_prestasi', 'mhs_kompetisi.id_capaian = capaian_prestasi.id_capaian', 'left');
        if ($index_data != NULL) {
            $this->db->where('mhs_kompetisi.nim', $index_data);
            $this->db->where('mhs_kompetisi.konfirmasi', '0');
        }
        $data = $this->db->get();
        return $data->result();
    }

    public function valid($index_data = NULL)
    {
        $this->db->select('*');
        $this->db->from('mhs_kompetisi');
        $this->db->join('level_kegiatan', 'mhs_kompetisi.id_level = level_kegiatan.id_level', 'left');
        $this->db->join('capaian_prestasi', 'mhs_kompetisi.id_capaian = capaian_prestasi.id_capaian', 'left');
        if ($index_data != NULL) {
            $this->db->where('mhs_kompetisi.nim', $index_data);
            $this->db->where('mhs_kompetisi.konfirmasi', '1');
            $this->db->where_in('mhs_kompetisi.status_validasi', array('0', '1', '2'));
        }
        $data = $this->db->get();
        return $data->result();
    }

    public function daftar_prestasi($index_data = NULL)
    {
        $this->db->select('*');
        $this->db->from('mhs_kompetisi');
        $this->db->join('level_kegiatan', 'mhs_kompetisi.id_level = level_kegiatan.id_level', 'left');
        $this->db->join('capaian_prestasi', 'mhs_kompetisi.id_capaian = capaian_prestasi.id_capaian', 'left');
        $this->db->join('provinsi', 'mhs_kompetisi.prov_id = provinsi.prov_id', 'left');
        if ($index_data != NULL) {
            $this->db->where('mhs_kompetisi.nim', $index_data);
            $this->db->where('mhs_kompetisi.konfirmasi', '1');
            $this->db->where('mhs_kompetisi.status_validasi', '1');
        }
        $data = $this->db->get();
        return $data->result();
    }

    public function usulan_bebas_ukt($index_data = NULL)
    {
        $this->db->select('*');
        $this->db->from('bebas_ukt');
        $this->db->join('mhs_kompetisi', 'mhs_kompetisi.id_mhs_kompetisi = bebas_ukt.id_mhs_kompetisi', 'left');
        $this->db->join('level_kegiatan', 'mhs_kompetisi.id_level = level_kegiatan.id_level', 'left');
        $this->db->join('capaian_prestasi', 'mhs_kompetisi.id_capaian = capaian_prestasi.id_capaian', 'left');
        $this->db->join('provinsi', 'mhs_kompetisi.prov_id = provinsi.prov_id', 'left');
        if ($index_data != NULL) {
            $this->db->where('bebas_ukt.nim', $index_data);
            // $this->db->where('mhs_kompetisi.konfirmasi', '1');
            // $this->db->where('mhs_kompetisi.status_validasi', '1');
            // $this->db->where_in('mhs_kompetisi.id_level', array('3', '4', '5'));
            // $this->db->where_in('mhs_kompetisi.id_level', array('3', '4', '5'));
        }
        $data = $this->db->get();
        return $data->result();
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

    public function upload_1($id_mhs_kompetisi = NULL)
    {
        $this->db->select('*');
        $this->db->join('data_mahasiswa', 'mhs_kompetisi.nim=data_mahasiswa.nim', 'left');
        $this->db->join('prodi', 'data_mahasiswa.kode_prodi=prodi.kode_prodi', 'left');
        $this->db->join('fakultas', 'data_mahasiswa.kode_fak=fakultas.kode_fak', 'left');
        $this->db->join('level_kegiatan', 'mhs_kompetisi.id_level=level_kegiatan.id_level', 'left');
        $this->db->join('kategori_peserta', 'mhs_kompetisi.id_kategori_peserta=kategori_peserta.id_kategori', 'left');
        $this->db->join('provinsi', 'mhs_kompetisi.prov_id=provinsi.prov_id', 'left');
        $this->db->join('capaian_prestasi', 'mhs_kompetisi.id_capaian=capaian_prestasi.id_capaian', 'left');
        $this->db->join('kategori_penyelenggara', 'mhs_kompetisi.id_penyelenggara=kategori_penyelenggara.id_penyelenggara', 'left');
        $query = $this->db->get_where('mhs_kompetisi', array('id_mhs_kompetisi' => $id_mhs_kompetisi))->row();
        return $query;
    }

    public function upload_2($id_mhs_kompetisi = NULL)
    {
        $this->db->select('*');
        $this->db->join('data_mahasiswa', 'mhs_kompetisi.nim=data_mahasiswa.nim', 'left');
        $this->db->join('prodi', 'data_mahasiswa.kode_prodi=prodi.kode_prodi', 'left');
        $this->db->join('fakultas', 'data_mahasiswa.kode_fak=fakultas.kode_fak', 'left');
        $this->db->join('level_kegiatan', 'mhs_kompetisi.id_level=level_kegiatan.id_level', 'left');
        $this->db->join('kategori_peserta', 'mhs_kompetisi.id_kategori_peserta=kategori_peserta.id_kategori', 'left');
        $this->db->join('provinsi', 'mhs_kompetisi.prov_id=provinsi.prov_id', 'left');
        $this->db->join('upload_bukti_kompetisi', 'mhs_kompetisi.id_mhs_kompetisi=upload_bukti_kompetisi.id_mhs_kompetisi', 'left');
        $this->db->join('capaian_prestasi', 'mhs_kompetisi.id_capaian=capaian_prestasi.id_capaian', 'left');
        $this->db->join('kategori_penyelenggara', 'mhs_kompetisi.id_penyelenggara=kategori_penyelenggara.id_penyelenggara', 'left');
        $query = $this->db->get_where('mhs_kompetisi', array('mhs_kompetisi.id_mhs_kompetisi' => $id_mhs_kompetisi))->row();
        return $query;
    }
    public function upload_3($id_mhs_kompetisi = NULL)
    {
        $this->db->select('*');
        $this->db->join('data_mahasiswa', 'mhs_kompetisi.nim=data_mahasiswa.nim', 'left');
        $this->db->join('prodi', 'data_mahasiswa.kode_prodi=prodi.kode_prodi', 'left');
        $this->db->join('fakultas', 'data_mahasiswa.kode_fak=fakultas.kode_fak', 'left');
        $this->db->join('level_kegiatan', 'mhs_kompetisi.id_level=level_kegiatan.id_level', 'left');
        $this->db->join('kategori_peserta', 'mhs_kompetisi.id_kategori_peserta=kategori_peserta.id_kategori', 'left');
        $this->db->join('provinsi', 'mhs_kompetisi.prov_id=provinsi.prov_id', 'left');
        $this->db->join('upload_bukti_kompetisi', 'mhs_kompetisi.id_mhs_kompetisi=upload_bukti_kompetisi.id_mhs_kompetisi', 'left');
        $this->db->join('capaian_prestasi', 'mhs_kompetisi.id_capaian=capaian_prestasi.id_capaian', 'left');
        $this->db->join('kategori_penyelenggara', 'mhs_kompetisi.id_penyelenggara=kategori_penyelenggara.id_penyelenggara', 'left');
        $query = $this->db->get_where('mhs_kompetisi', array('mhs_kompetisi.id_mhs_kompetisi' => $id_mhs_kompetisi))->row();
        return $query;
    }

    public function create_code()
    {
        $this->db->select('RIGHT(mhs_kompetisi.kode_kompetisi,5) as kode_kompetisi', FALSE);
        $this->db->order_by('kode_kompetisi', 'DESC');
        $this->db->limit(1);
        $query = $this->db->get('mhs_kompetisi');
        if ($query->num_rows() <> 0) {
            $data = $query->row();
            $kode = intval($data->kode_kompetisi) + 1;
        } else {
            $kode = 1;
        }
        $batas = str_pad($kode, 5, "0", STR_PAD_LEFT);
        $kodetampil = "KMPTS21" . $batas;
        return $kodetampil;
    }

    public function tampil_level()
    {
        $query = $this->db->get('level_kegiatan')->result();
        return $query;
    }
    public function tampil_peserta()
    {
        $query = $this->db->get('kategori_peserta')->result();
        return $query;
    }
    public function tampil_provinsi()
    {
        $query = $this->db->get('provinsi')->result();
        return $query;
    }
    public function tampil_penyelenggara()
    {
        $query = $this->db->get('kategori_penyelenggara')->result();
        return $query;
    }
    public function tampil_capaian()
    {
        $query = $this->db->get('capaian_prestasi')->result();
        return $query;
    }
    public function tampil_pemberi()
    {
        $query = $this->db->get('pemberi_bantuan')->result();
        return $query;
    }
    public function hapususulan($id_mhs_kompetisi)
    {
        $this->db->delete('mhs_kompetisi', array('id_mhs_kompetisi' => $id_mhs_kompetisi));
        return ($this->db->affected_rows() > 0) ? TRUE : FALSE;
    }
}
