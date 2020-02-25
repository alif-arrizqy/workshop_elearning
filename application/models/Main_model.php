<?php
class Main_model extends CI_Model{
  //Dashboard Admin
    function update_profiltampildata_admin($kirimdata, $id_admin){
      $this->db->where('id_admin', $id_admin);
      $query = $this->db->update('tbl_biodata_admin', $kirimdata);
      if($query){
          return true;
      }else{
          return false;
      }
    }

    function update_administrator_dashboard($kirimdata, $id_admin){
      $this->db->where('id_admin', $id_admin);
      $query = $this->db->update('tbl_admin', $kirimdata);
      if($query){
          return true;
      }else{
          return false;
      }
    }

    function update_Ladministrator_dashboard($kirimdata2, $id_admin){
      $this->db->where('id_admin', $id_admin);
      $query = $this->db->update('tbl_biodata_admin', $kirimdata2);
      if($query){
          return true;
      }else{
          return false;
      }
    }

    //Data Kelas Matkul
      //ganjil
      function get_matkul_elektronika(){
        $query=$this->db->query("SELECT a.*, b.* FROM tbl_matkul AS a INNER JOIN tbl_kelas_matkul AS b ON a.id_matkul=b.id_matkul WHERE b.id_matkul='3' ORDER BY b.kelas ASC");
        return $query;
      }
      
      function get_matkul_sigit1(){
        $query=$this->db->query("SELECT a.*, b.* FROM tbl_matkul AS a INNER JOIN tbl_kelas_matkul AS b ON a.id_matkul=b.id_matkul WHERE b.id_matkul='4' ORDER BY b.kelas ASC");
        return $query;
      }

      function get_matkul_sismik(){
        $query=$this->db->query("SELECT a.*, b.* FROM tbl_matkul AS a INNER JOIN tbl_kelas_matkul AS b ON a.id_matkul=b.id_matkul WHERE b.id_matkul='9' ORDER BY b.kelas ASC");
        return $query;
      }

      function get_matkul_iot(){
        $query=$this->db->query("SELECT a.*, b.* FROM tbl_matkul AS a INNER JOIN tbl_kelas_matkul AS b ON a.id_matkul=b.id_matkul WHERE b.id_matkul='7' ORDER BY b.kelas ASC");
        return $query;
      }

      function get_matkul_adminjar(){
        $query=$this->db->query("SELECT a.*, b.* FROM tbl_matkul AS a INNER JOIN tbl_kelas_matkul AS b ON a.id_matkul=b.id_matkul WHERE b.id_matkul='8' ORDER BY b.kelas ASC");
        return $query;
      }

      function get_matkul_sim(){
        $query=$this->db->query("SELECT a.*, b.* FROM tbl_matkul AS a INNER JOIN tbl_kelas_matkul AS b ON a.id_matkul=b.id_matkul WHERE b.id_matkul='14' ORDER BY b.kelas ASC");
        return $query;
      }

      function get_matkul_robotik(){
        $query=$this->db->query("SELECT a.*, b.* FROM tbl_matkul AS a INNER JOIN tbl_kelas_matkul AS b ON a.id_matkul=b.id_matkul WHERE b.id_matkul='15' ORDER BY b.kelas ASC");
        return $query;
      }

      //genap
      function get_matkul_si($sistem_instrumentasi){
        $query=$this->db->query("SELECT a.*, b.* FROM tbl_matkul AS a INNER JOIN tbl_kelas_matkul AS b ON a.id_matkul=b.id_matkul WHERE b.id_matkul='1' && b.kode!='$sistem_instrumentasi' ORDER BY b.kelas ASC");
        return $query;
      }

      function get_matkul_orkom($organisasi_komputer){
        $query=$this->db->query("SELECT a.*, b.* FROM tbl_matkul AS a INNER JOIN tbl_kelas_matkul AS b ON a.id_matkul=b.id_matkul WHERE b.id_matkul='2' && b.kode!='$organisasi_komputer' ORDER BY b.kelas ASC");
        return $query;
      }

      function get_matkul_jarkom(){
        $query=$this->db->query("SELECT a.*, b.* FROM tbl_matkul AS a INNER JOIN tbl_kelas_matkul AS b ON a.id_matkul=b.id_matkul WHERE b.id_matkul='5' ORDER BY b.kelas ASC");
        return $query;
      }

      function get_matkul_sigit2(){
        $query=$this->db->query("SELECT a.*, b.* FROM tbl_matkul AS a INNER JOIN tbl_kelas_matkul AS b ON a.id_matkul=b.id_matkul WHERE b.id_matkul='6' ORDER BY b.kelas ASC");
        return $query;
      }

      function get_matkul_spm(){
        $query=$this->db->query("SELECT a.*, b.* FROM tbl_matkul AS a INNER JOIN tbl_kelas_matkul AS b ON a.id_matkul=b.id_matkul WHERE b.id_matkul='10' ORDER BY b.kelas ASC");
        return $query;
      }

      function get_matkul_mobile(){
        $query=$this->db->query("SELECT a.*, b.* FROM tbl_matkul AS a INNER JOIN tbl_kelas_matkul AS b ON a.id_matkul=b.id_matkul WHERE b.id_matkul='11' ORDER BY b.kelas ASC");
        return $query;
      }

      function get_matkul_python(){
        $query=$this->db->query("SELECT a.*, b.* FROM tbl_matkul AS a INNER JOIN tbl_kelas_matkul AS b ON a.id_matkul=b.id_matkul WHERE b.id_matkul='12' ORDER BY b.kelas ASC");
        return $query;
      }

      function get_matkul_kejar(){
        $query=$this->db->query("SELECT a.*, b.* FROM tbl_matkul AS a INNER JOIN tbl_kelas_matkul AS b ON a.id_matkul=b.id_matkul WHERE b.id_matkul='13' ORDER BY b.kelas ASC");
        return $query;
      }

    //Master Data
    	//Administrator
    	function get_all_admin(){
        return $this->db->get('vw_admin');
      }

      function insert_administrator($kirimdata){
        $query = $this->db->insert('tbl_admin', $kirimdata);
        if($query){
            return true;
        }else{
            return false;
        }
      }

      function insert_Ladministrator($kirimdata){
        $query = $this->db->insert('tbl_biodata_admin', $kirimdata);
        if($query){
            return true;
        }else{
            return false;
        }
      }

      function ubah_administrator($id_admin){
        $query=$this->db->query("SELECT a.*, b.* FROM tbl_admin AS a INNER JOIN tbl_biodata_admin AS b ON a.id_admin=b.id_admin WHERE a.id_admin='$id_admin'");
        return $query;      
      }

      function update_administrator($kirimdata, $id_admin){
        $this->db->where('id_admin', $id_admin);
        $query = $this->db->update('tbl_admin', $kirimdata);
        if($query){
            return true;
        }else{
            return false;
        }
      }

      function update_Ladministrator($kirimdata2, $id_admin){
        $this->db->where('id_admin', $id_admin);
        $query = $this->db->update('tbl_biodata_admin', $kirimdata2);
        if($query){
            return true;
        }else{
            return false;
        }
      }

      function detail_administrator($id_admin){
        $query=$this->db->query("SELECT a.*, b.* FROM tbl_admin AS a INNER JOIN tbl_biodata_admin AS b ON a.id_admin=b.id_admin WHERE a.id_admin='$id_admin'");
        return $query;      
      }      

      function hapus_administrator($id_admin){
        $this->db->where('id_admin', $id_admin);
        $this->db->delete('tbl_admin');
        
        $this->db->where('id_admin', $id_admin);
        $this->db->delete('tbl_biodata_admin');
      }

      //Mahasiswa
      function get_all_mahasiswa(){
        $query=$this->db->query("SELECT a.*, b.* FROM tbl_user AS a INNER JOIN tbl_biodata_user AS b ON a.id_user=b.id_user WHERE a.akses='1' OR a.akses='3' ORDER BY a.npm ASC");
        return $query;
      }

      function insert_mahasiswa($kirimdata){
        $query = $this->db->insert('tbl_user', $kirimdata);
        if($query){
            return true;
        }else{
            return false;
        }
      }

      function insert_Lmahasiswa($kirimdata){
        $query = $this->db->insert('tbl_biodata_user', $kirimdata);
        if($query){
            return true;
        }else{
            return false;
        }
      }

      function ubah_mahasiswa($id_user){
        $query=$this->db->query("SELECT a.*, b.* FROM tbl_user AS a INNER JOIN tbl_biodata_user AS b ON a.id_user=b.id_user WHERE a.id_user='$id_user'");
        return $query;      
      }

      function update_mahasiswa($kirimdata, $id_user){
        $this->db->where('id_user', $id_user);
        $query = $this->db->update('tbl_user', $kirimdata);
        if($query){
            return true;
        }else{
            return false;
        }
      }

      function update_Lmahasiswa($kirimdata2, $id_user){
        $this->db->where('id_user', $id_user);
        $query = $this->db->update('tbl_biodata_user', $kirimdata2);
        if($query){
            return true;
        }else{
            return false;
        }
      }

      function detail_mahasiswa($id_user){
        $query=$this->db->query("SELECT a.*, b.* FROM tbl_user AS a INNER JOIN tbl_biodata_user AS b ON a.id_user=b.id_user WHERE a.id_user='$id_user'");
        return $query;      
      }

      function hapus_mahasiswa($id_user){
        $this->db->where('id_user', $id_user);
        $this->db->delete('tbl_user');
        
        $this->db->where('id_user', $id_user);
        $this->db->delete('tbl_biodata_user');
      }

      function get_kelas_matkulBy($id_user){
        $query=$this->db->query("SELECT * FROM tbl_kelas_matkul WHERE asdos_1='$id_user' or asdos_2='$id_user'");
        return $query;      
      }

      //Asisten Dosen
      function get_all_asdos(){
        $query=$this->db->query("SELECT a.*, b.* FROM tbl_user AS a INNER JOIN tbl_biodata_user AS b ON a.id_user=b.id_user WHERE a.akses!='1' ORDER BY a.npm ASC");
        return $query;
      }

      function get_asdos(){
        $query=$this->db->query("SELECT * FROM tbl_user WHERE status='1' && akses!='1' ORDER BY npm ASC");
        return $query;
      }

      function get_asdos1_iduser($id_user){
        $query=$this->db->query("SELECT * FROM tbl_user WHERE id_user='$id_user'");
        return $query;
      }

      function get_asdos2_iduser($id_user){
        $query=$this->db->query("SELECT * FROM tbl_user WHERE id_user='$id_user'");
        return $query;
      }

      function insert_asdos($kirimdata){
        $query = $this->db->insert('tbl_user', $kirimdata);
        if($query){
            return true;
        }else{
            return false;
        }
      }

      function insert_Lasdos($kirimdata){
        $query = $this->db->insert('tbl_biodata_user', $kirimdata);
        if($query){
            return true;
        }else{
            return false;
        }
      }

      function ubah_asdos($id_user){
        $query=$this->db->query("SELECT a.*, b.* FROM tbl_user AS a INNER JOIN tbl_biodata_user AS b ON a.id_user=b.id_user WHERE a.id_user='$id_user'");
        return $query;      
      }

      function update_asdos($kirimdata, $id_user){
        $this->db->where('id_user', $id_user);
        $query = $this->db->update('tbl_user', $kirimdata);
        if($query){
            return true;
        }else{
            return false;
        }
      }

      function update_Lasdos($kirimdata2, $id_user){
        $this->db->where('id_user', $id_user);
        $query = $this->db->update('tbl_biodata_user', $kirimdata2);
        if($query){
            return true;
        }else{
            return false;
        }
      }

      function detail_asdos($id_user){
        $query=$this->db->query("SELECT a.*, b.* FROM tbl_user AS a INNER JOIN tbl_biodata_user AS b ON a.id_user=b.id_user WHERE a.id_user='$id_user'");
        return $query;      
      }

      function hapus_asdos($id_user){
        $this->db->where('id_user', $id_user);
        $this->db->delete('tbl_user');
        
        $this->db->where('id_user', $id_user);
        $this->db->delete('tbl_biodata_user');
      }

      //Mata Kuliah
      function get_all_matkul(){
        $query=$this->db->query("SELECT * FROM tbl_matkul ORDER BY semester,id_matkul ASC");
        return $query;
      }

      function get_matkul(){
        $query=$this->db->query("SELECT * FROM tbl_matkul WHERE status='1' ORDER BY matkul ASC");
        return $query;
      }

      function insert_matkul($kirimdata){
        $query = $this->db->insert('tbl_matkul', $kirimdata);
        if($query){
            return true;
        }else{
            return false;
        }
      }

      function ubah_matkul($id_matkul){
        $query=$this->db->query("SELECT * FROM tbl_matkul WHERE id_matkul='$id_matkul'");
        return $query;      
      }

      function update_matkul($kirimdata, $id_matkul){
        $this->db->where('id_matkul', $id_matkul);
        $query = $this->db->update('tbl_matkul', $kirimdata);
        if($query){
            return true;
        }else{
            return false;
        }
      }

      function detail_matkul($id_matkul){
        $query=$this->db->query("SELECT * FROM tbl_matkul WHERE id_matkul='$id_matkul'");
        return $query;      
      }

      function hapus_matkul($id_matkul){
        $this->db->where('id_matkul', $id_matkul);
        $this->db->delete('tbl_matkul');
      }

      function insert_kelas_mhs($kirimdata){
        $query = $this->db->insert('tbl_kelas_mhs', $kirimdata);
        if($query){
            return true;
        }else{
            return false;
        }
      }

      function update_kelas_mhs($kirimdata, $id_user){
        $this->db->where('id_user', $id_user);
        $query = $this->db->update('tbl_kelas_mhs', $kirimdata);
        if($query){
            return true;
        }else{
            return false;
        }
      }

      function hapus_absensi_mhs($id_user){
        $this->db->where('id_user', $id_user);
        $this->db->delete('tbl_absensi_mhs');
      }

      function hapus_nilai_mhs($id_user){
        $this->db->where('id_user', $id_user);
        $this->db->delete('tbl_nilai_mhs');
      }

      function get_kelas_mhs($id_user){
        $query=$this->db->query("SELECT a.*, b.* FROM tbl_user AS a INNER JOIN tbl_kelas_mhs AS b ON a.id_user=b.id_user WHERE a.id_user='$id_user'");
        return $query;      
      }

      //Kelas Mata Kuliah
      function get_kelas_matkul($kode){
        $query=$this->db->query("SELECT * FROM tbl_kelas_matkul WHERE kode='$kode'");
        return $query;
      }

      function get_kelas_matkulBYKODE($kode){
        $query=$this->db->query("SELECT a.*,b.* FROM tbl_kelas_matkul AS a INNER JOIN tbl_matkul AS b ON a.id_matkul=b.id_matkul WHERE a.kode='$kode'");
        return $query;
      }

      function get_all_kelas_matkul(){
        $query=$this->db->query("SELECT * FROM tbl_kelas_matkul ORDER BY kelas ASC");
        return $query;
      }

      function insert_kelas_matkul($kirimdata){
        $query = $this->db->insert('tbl_kelas_matkul', $kirimdata);
        if($query){
            return true;
        }else{
            return false;
        }
      }

      function ubah_kelas_matkul($id_kelas_matkul){
        $query=$this->db->query("SELECT * FROM tbl_kelas_matkul WHERE id_kelas_matkul='$id_kelas_matkul'");
        return $query;      
      }

      function update_kelas_matkul($kirimdata, $id_kelas_matkul){
        $this->db->where('id_kelas_matkul', $id_kelas_matkul);
        $query = $this->db->update('tbl_kelas_matkul', $kirimdata);
        if($query){
            return true;
        }else{
            return false;
        }
      }

      function detail_kelas_matkul($id_kelas_matkul){
        $query=$this->db->query("SELECT * FROM tbl_kelas_matkul WHERE id_kelas_matkul='$id_kelas_matkul'");
        return $query;      
      }
      
      function hapus_kelas_matkul($id_kelas_matkul){
        $this->db->where('id_kelas_matkul', $id_kelas_matkul);
        $this->db->delete('tbl_kelas_matkul');
      }

      //Kelas Mata Kuliah Mahasiswa
      function get_all_kelas_mhs_reguler(){
        $query=$this->db->query("SELECT a.*,b.* FROM tbl_kelas_mhs AS a INNER JOIN tbl_user AS b ON a.id_user=b.id_user WHERE b.jenis='1' ORDER BY b.npm ASC");
        return $query;
      }

      function get_all_kelas_mhs_malam(){
        $query=$this->db->query("SELECT a.*,b.* FROM tbl_kelas_mhs AS a INNER JOIN tbl_user AS b ON a.id_user=b.id_user WHERE b.jenis='2' ORDER BY b.npm ASC");
        return $query;
      }

      //Persentase Nilai
      function get_all_persentase_nilai(){
        $query=$this->db->query("SELECT a.*,b.* FROM tbl_persentase_nilai AS a INNER JOIN tbl_matkul AS b ON a.id_matkul=b.id_matkul ORDER BY a.id_matkul ASC");
        return $query;
      }

      function ubah_persentase_nilai($id_persentase){
        $query=$this->db->query("SELECT a.*,b.* FROM tbl_persentase_nilai AS a INNER JOIN tbl_matkul AS b ON a.id_matkul=b.id_matkul WHERE a.id_persentase='$id_persentase'");
        return $query;
      }

      function get_persentase_nilaiBY($id_matkul){
        $query=$this->db->query("SELECT * FROM tbl_persentase_nilai WHERE id_matkul='$id_matkul'");
        return $query;
      }

      function update_persentase_nilai($kirimdata, $id_persentase){
        $this->db->where('id_persentase', $id_persentase);
        $query = $this->db->update('tbl_persentase_nilai', $kirimdata);
        if($query){
            return true;
        }else{
            return false;
        }
      }

      //Qrcode
      function get_all_qrcode(){
        $query=$this->db->query("SELECT a.*,b.* FROM tbl_qrcode AS a INNER JOIN tbl_kelas_matkul AS b ON a.id_kelas_matkul=b.id_kelas_matkul ORDER BY a.id_kelas_matkul ASC");
        return $query;
      }

      function get_all_qrcodeBY($kode){
        $query=$this->db->query("SELECT a.*,b.* FROM tbl_qrcode AS a INNER JOIN tbl_kelas_matkul AS b ON a.id_kelas_matkul=b.id_kelas_matkul WHERE a.kode='$kode'");
        return $query;
      }

      function get_all_qrcodeBY2($id_qrcode){
        $query=$this->db->query("SELECT a.*,b.* FROM tbl_qrcode AS a INNER JOIN tbl_kelas_matkul AS b ON a.id_kelas_matkul=b.id_kelas_matkul WHERE a.id_qrcode='$id_qrcode'");
        return $query;
      }

      function get_kelas_matkulBY2($id_matkul){
        $query=$this->db->query("SELECT * FROM tbl_kelas_matkul WHERE id_matkul='$id_matkul' ORDER BY kelas ASC");
        return $query;      
      }

      function insert_qrcode($kirimdata){
        $query = $this->db->insert('tbl_qrcode', $kirimdata);
        if($query){
            return true;
        }else{
            return false;
        }
      }

      function hapus_qrcode($id_qrcode){
        $this->db->where('id_qrcode', $id_qrcode);
        $this->db->delete('tbl_qrcode');
      }

      //Qrcode
      function get_all_session_akun(){
        $query=$this->db->query("SELECT * FROM tbl_session ORDER BY Waktu DESC");
        return $query;
      }

      function hapus_session_akun($ip_address){
        $this->db->where('ip_address', $ip_address);
        $this->db->delete('tbl_session');
      }

      //Absen
      function get_all_data_mhs_si($kode){
        $query=$this->db->query("SELECT a.*,b.* FROM tbl_kelas_mhs AS a INNER JOIN tbl_user AS b ON a.id_user=b.id_user WHERE a.sistem_instrumentasi='$kode' ORDER BY b.npm ASC");
        return $query;
      }

      function get_all_data_mhs_orkom($kode){
        $query=$this->db->query("SELECT a.*,b.* FROM tbl_kelas_mhs AS a INNER JOIN tbl_user AS b ON a.id_user=b.id_user WHERE a.organisasi_komputer='$kode' ORDER BY b.npm ASC");
        return $query;
      }

      function get_all_data_mhs_elektronika($kode){
        $query=$this->db->query("SELECT a.*,b.* FROM tbl_kelas_mhs AS a INNER JOIN tbl_user AS b ON a.id_user=b.id_user WHERE a.elektronika='$kode' ORDER BY b.npm ASC");
        return $query;
      }

      function get_all_data_mhs_sigit1($kode){
        $query=$this->db->query("SELECT a.*,b.* FROM tbl_kelas_mhs AS a INNER JOIN tbl_user AS b ON a.id_user=b.id_user WHERE a.sistem_digital_1='$kode' ORDER BY b.npm ASC");
        return $query;
      }

      function get_all_data_mhs_jarkom($kode){
        $query=$this->db->query("SELECT a.*,b.* FROM tbl_kelas_mhs AS a INNER JOIN tbl_user AS b ON a.id_user=b.id_user WHERE a.jaringan_komputer='$kode' ORDER BY b.npm ASC");
        return $query;
      }

      function get_all_data_mhs_sigit2($kode){
        $query=$this->db->query("SELECT a.*,b.* FROM tbl_kelas_mhs AS a INNER JOIN tbl_user AS b ON a.id_user=b.id_user WHERE a.sistem_digital_2='$kode' ORDER BY b.npm ASC");
        return $query;
      }

      function get_all_data_mhs_iot($kode){
        $query=$this->db->query("SELECT a.*,b.* FROM tbl_kelas_mhs AS a INNER JOIN tbl_user AS b ON a.id_user=b.id_user WHERE a.otomasi='$kode' ORDER BY b.npm ASC");
        return $query;
      }

      function get_all_data_mhs_adminjar($kode){
        $query=$this->db->query("SELECT a.*,b.* FROM tbl_kelas_mhs AS a INNER JOIN tbl_user AS b ON a.id_user=b.id_user WHERE a.administrasi_jaringan='$kode' ORDER BY b.npm ASC");
        return $query;
      }

      function get_all_data_mhs_sismik($kode){
        $query=$this->db->query("SELECT a.*,b.* FROM tbl_kelas_mhs AS a INNER JOIN tbl_user AS b ON a.id_user=b.id_user WHERE a.sistem_mikroprosesor='$kode' ORDER BY b.npm ASC");
        return $query;
      }

      function get_all_data_mhs_spm($kode){
        $query=$this->db->query("SELECT a.*,b.* FROM tbl_kelas_mhs AS a INNER JOIN tbl_user AS b ON a.id_user=b.id_user WHERE a.sistem_pemrograman_mikroprosesor='$kode' ORDER BY b.npm ASC");
        return $query;
      }

      function get_all_data_mhs_mobile($kode){
        $query=$this->db->query("SELECT a.*,b.* FROM tbl_kelas_mhs AS a INNER JOIN tbl_user AS b ON a.id_user=b.id_user WHERE a.mobile_programing='$kode' ORDER BY b.npm ASC");
        return $query;
      }

      function get_all_data_mhs_python($kode){
        $query=$this->db->query("SELECT a.*,b.* FROM tbl_kelas_mhs AS a INNER JOIN tbl_user AS b ON a.id_user=b.id_user WHERE a.pemrograman_python='$kode' ORDER BY b.npm ASC");
        return $query;
      }

      function get_all_data_mhs_kejar($kode){
        $query=$this->db->query("SELECT a.*,b.* FROM tbl_kelas_mhs AS a INNER JOIN tbl_user AS b ON a.id_user=b.id_user WHERE a.keamanan_jaringan='$kode' ORDER BY b.npm ASC");
        return $query;
      }

      function get_all_data_mhs_sim($kode){
        $query=$this->db->query("SELECT a.*,b.* FROM tbl_kelas_mhs AS a INNER JOIN tbl_user AS b ON a.id_user=b.id_user WHERE a.sistem_interface_mikrokontroler='$kode' ORDER BY b.npm ASC");
        return $query;
      }

      function get_all_data_mhs_robotik($kode){
        $query=$this->db->query("SELECT a.*,b.* FROM tbl_kelas_mhs AS a INNER JOIN tbl_user AS b ON a.id_user=b.id_user WHERE a.robotik='$kode' ORDER BY b.npm ASC");
        return $query;
      }

      function get_all_data_mhs($kode){
        $query=$this->db->query("SELECT a.*,b.* FROM tbl_kelas_mhs AS a INNER JOIN tbl_user AS b ON a.id_user=b.id_user WHERE a.sistem_instrumentasi='$kode' OR a.organisasi_komputer='$kode' OR a.elektronika='$kode' OR a.sistem_digital_1='$kode' OR a.jaringan_komputer='$kode' OR a.sistem_digital_2='$kode' OR a.sistem_mikroprosesor='$kode' OR a.otomasi='$kode' OR a.administrasi_jaringan='$kode' OR a.sistem_pemrograman_mikroprosesor='$kode' OR a.mobile_programing='$kode' OR a.keamanan_jaringan='$kode' OR a.pemrograman_python='$kode' OR a.sistem_interface_mikrokontroler='$kode' OR a.robotik='$kode' ORDER BY b.npm ASC");
        return $query;
      }

      function insert_absensi_mhs($kirimdata){
        $query = $this->db->insert('tbl_absensi_mhs', $kirimdata);
        if($query){
            return true;
        }else{
            return false;
        }
      }

      function insert_nilai_mhs($kirimdata){
        $query = $this->db->insert('tbl_nilai_mhs', $kirimdata);
        if($query){
            return true;
        }else{
            return false;
        }
      }

      function get_all_absen_mhs($id_kelas_matkul,$kode){
        $query=$this->db->query("SELECT a.*,b.*,c.*,d.* FROM tbl_kelas_matkul AS a INNER JOIN tbl_absensi_mhs AS b ON a.id_kelas_matkul=b.id_kelas_matkul INNER JOIN tbl_user AS c ON c.id_user=b.id_user INNER JOIN tbl_kelas_mhs AS d ON d.id_user=b.id_user WHERE a.id_kelas_matkul='$id_kelas_matkul' AND (d.sistem_instrumentasi='$kode' OR d.organisasi_komputer='$kode' OR d.elektronika='$kode' OR d.sistem_digital_1='$kode' OR d.jaringan_komputer='$kode' OR d.sistem_digital_2='$kode' OR d.sistem_mikroprosesor='$kode' OR d.otomasi='$kode' OR d.administrasi_jaringan='$kode' OR d.sistem_pemrograman_mikroprosesor='$kode' OR d.mobile_programing='$kode' OR d.keamanan_jaringan='$kode' OR d.pemrograman_python='$kode' OR d.sistem_interface_mikrokontroler='$kode' OR d.robotik='$kode') ORDER BY c.npm ASC");
        return $query;
      }

      function get_all_absen_mhsBY($id_kelas_matkul,$id_user){
        $query=$this->db->query("SELECT a.*,b.*,c.* FROM tbl_kelas_matkul AS a INNER JOIN tbl_absensi_mhs AS b ON a.id_kelas_matkul=b.id_kelas_matkul INNER JOIN tbl_user AS c ON c.id_user=b.id_user WHERE a.id_kelas_matkul='$id_kelas_matkul' && b.id_user='$id_user' ORDER BY c.npm ASC");
        return $query;
      }

      function get_all_nilai_mhs($id_kelas_matkul,$kode){
        $query=$this->db->query("SELECT a.*,b.*,c.*,d.* FROM tbl_kelas_matkul AS a INNER JOIN tbl_nilai_mhs AS b ON a.id_kelas_matkul=b.id_kelas_matkul INNER JOIN tbl_user AS c ON c.id_user=b.id_user INNER JOIN tbl_kelas_mhs AS d ON d.id_user=b.id_user WHERE a.id_kelas_matkul='$id_kelas_matkul' AND (d.sistem_instrumentasi='$kode' OR d.organisasi_komputer='$kode' OR d.elektronika='$kode' OR d.sistem_digital_1='$kode' OR d.jaringan_komputer='$kode' OR d.sistem_digital_2='$kode' OR d.sistem_mikroprosesor='$kode' OR d.otomasi='$kode' OR d.administrasi_jaringan='$kode' OR d.sistem_pemrograman_mikroprosesor='$kode' OR d.mobile_programing='$kode' OR d.keamanan_jaringan='$kode' OR d.pemrograman_python='$kode' OR d.sistem_interface_mikrokontroler='$kode' OR d.robotik='$kode') ORDER BY c.npm ASC");
        return $query;
      }

      function get_all_nilai_mhsBY($id_kelas_matkul,$id_user){
        $query=$this->db->query("SELECT a.*,b.*,c.* FROM tbl_kelas_matkul AS a INNER JOIN tbl_nilai_mhs AS b ON a.id_kelas_matkul=b.id_kelas_matkul INNER JOIN tbl_user AS c ON c.id_user=b.id_user WHERE a.id_kelas_matkul='$id_kelas_matkul' && b.id_user='$id_user' ORDER BY c.npm ASC");
        return $query;
      }

      function ubah_absen_mhs($id_user,$id_kelas_matkul){
        $query=$this->db->query("SELECT a.*,b.*,c.* FROM tbl_kelas_matkul AS a INNER JOIN tbl_absensi_mhs AS b ON a.id_kelas_matkul=b.id_kelas_matkul INNER JOIN tbl_user AS c ON c.id_user=b.id_user WHERE c.id_user='$id_user' && a.id_kelas_matkul='$id_kelas_matkul' ORDER BY c.npm ASC");
        return $query;
      }

      function update_absensi($kirimdata,$id_kelas_matkul,$id_user){
        $this->db->where('id_kelas_matkul', $id_kelas_matkul);
        $this->db->where('id_user', $id_user);
        $query = $this->db->update('tbl_absensi_mhs', $kirimdata);
        if($query){
            return true;
        }else{
            return false;
        }
      }

      function ubah_nilai_mhs($id_user,$id_kelas_matkul){
        $query=$this->db->query("SELECT a.*,b.*,c.* FROM tbl_kelas_matkul AS a INNER JOIN tbl_nilai_mhs AS b ON a.id_kelas_matkul=b.id_kelas_matkul INNER JOIN tbl_user AS c ON c.id_user=b.id_user WHERE c.id_user='$id_user' && a.id_kelas_matkul='$id_kelas_matkul' ORDER BY c.npm ASC");
        return $query;
      }

      function update_nilai($kirimdata,$id_kelas_matkul,$id_user){
        $this->db->where('id_kelas_matkul', $id_kelas_matkul);
        $this->db->where('id_user', $id_user);
        $query = $this->db->update('tbl_nilai_mhs', $kirimdata);
        if($query){
            return true;
        }else{
            return false;
        }
      }

      //User
      function ubah_user($id_user){
        $query=$this->db->query("SELECT a.*, b.* FROM tbl_user AS a INNER JOIN tbl_biodata_user AS b ON a.id_user=b.id_user WHERE a.id_user='$id_user'");
        return $query;      
      }  

      function detail_user($id_user){
        $query=$this->db->query("SELECT a.*, b.* FROM tbl_user AS a INNER JOIN tbl_biodata_user AS b ON a.id_user=b.id_user WHERE a.id_user='$id_user'");
        return $query;      
      }

      function kelas_matkul_userBY($id_user){
        $query=$this->db->query("SELECT * FROM tbl_kelas_mhs WHERE id_user='$id_user'");
        return $query;      
      }

      function update_profiltampildata_user($kirimdata, $id_user){
        $this->db->where('id_user', $id_user);
        $query = $this->db->update('tbl_biodata_user', $kirimdata);
        if($query){
            return true;
        }else{
            return false;
        }
      }

      function update_user($kirimdata, $id_user){
        $this->db->where('id_user', $id_user);
        $query = $this->db->update('tbl_user', $kirimdata);
        if($query){
            return true;
        }else{
            return false;
        }
      }

      function update_Luser($kirimdata2, $id_user){
        $this->db->where('id_user', $id_user);
        $query = $this->db->update('tbl_biodata_user', $kirimdata2);
        if($query){
            return true;
        }else{
            return false;
        }
      }
}