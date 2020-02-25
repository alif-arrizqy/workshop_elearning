<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class LoginDashboard extends CI_Controller {

	function __construct(){
		parent::__construct();
		$this->load->model('login_model');
        $this->load->model('main_model');
	}

	function index()
	{
		$this->load->view('admin/awal');
	}

	function loginelearning()
	{
        if($this->session->userdata('masuk') != TRUE){
			$this->load->view('admin/login_dashboard_elearning');
		}else{
			redirect('dashboard_admin');
		}
	}

	function loginelearningUser()
	{
        if($this->session->userdata('masuk') != TRUE){
			$this->load->view('user/login_dashboard_elearning');
		}else{
			redirect('dashboard_user');
		}
	}

	function logininventaris()
	{
		$this->load->view('admin/login_dashboard_inventaris');
	}

	function lupapass()
    {
        $this->load->view('admin/lupapass');
    }

    function auth_admin_elearning(){
		//panel elearning
		// getHostByName(php_uname('n'));
	    $inputEmailUsername=htmlspecialchars($this->input->post('inputUsername',TRUE),ENT_QUOTES);
	    $inputPassword=htmlspecialchars($this->input->post('inputPassword',TRUE),ENT_QUOTES);
	    $ceksession1=$this->login_model->select_session1($inputEmailUsername);
		if($ceksession1->num_rows() <= 0){
		    $cekauth=$this->login_model->auth_admin($inputEmailUsername,$inputPassword);
		    if($cekauth->num_rows() > 0){
		    	$data=$cekauth->row_array();
		    	$biodatalengkapadmin=$this->login_model->select_biodata_admin($data['id_admin']);
		        foreach ($biodatalengkapadmin as $hasil){$nama = $hasil->nama;$email = $hasil->email;$gambar = $hasil->gambar;}
		    	$this->session->set_userdata('masuk',TRUE);
		        $this->session->set_userdata('ses_idlogin',$data['id_admin']);
		    	$this->session->set_userdata('ses_name',$nama);
		        $this->session->set_userdata('ses_username',$data['username']);
		        $this->session->set_userdata('ses_email',$email);
		        $this->session->set_userdata('ses_foto',$gambar);
		        $this->session->set_userdata('ses_level',$data['level']);
		        $ceksession=$this->login_model->select_session($data['username'],$data['level']);
		    	if($ceksession->num_rows() <= 0){
		    		date_default_timezone_set("Asia/Jakarta");
		    		$tgl = date("Y-m-d H:i:s");
			        $kirimdata['ip_address'] = getHostByName(php_uname('n'));
					$kirimdata['username'] = $data['username'];
					$kirimdata['level'] = $data['level'];
					$kirimdata['waktu'] = $tgl;
					$this->login_model->insert_session($kirimdata);
				}
		        $level = $this->session->userdata('ses_level'); if($level == 1){$sbg = "Super Admin";}else if($level == 2){$sbg = "Operator";}else if($level == 3){$sbg = "Tamu";}
		        $this->session->set_flashdata('msg', 'Selamat Datang '.$nama.' di Panel Elearning Workshop sebagai '.$sbg.' !!!');
		        redirect('dashboard_admin');
		    }else{
		    	$this->session->set_flashdata('msg', 'Tidak bisa masuk panel dasboard, mungkin ada kesalahan saat menginput data !!!');
		        redirect('loginelearning');
		    }
		}else{
	    	$this->session->set_flashdata('msg', 'Tidak bisa masuk panel dasboard, Username masih di gunakan di tempat lain !!!');
	        redirect('loginelearning');
	    }
    }

    function save_user_akun(){
		$this->form_validation->set_rules('inputTahun','Input Tahun', 'required');
		$this->form_validation->set_rules('inputNpm','Input Npm', 'required');
		$this->form_validation->set_rules('inputNama','Input Nama Lengkap', 'required');
		$this->form_validation->set_rules('inputEmail','Input Email', 'required|valid_email');
		$this->form_validation->set_rules('inputUsername','Input Username', 'required|min_length[1]|max_length[25]');
		$this->form_validation->set_rules('inputPassword','Input Password', 'required|min_length[6]|max_length[15]');
		$this->form_validation->set_rules('jenis','Pilih Jenis', 'required');
	 		
      	if ($this->form_validation->run() == FALSE) { 
      		$this->session->set_flashdata('gagal', 'Coba cek lagi data input anda, kemungkinan terdapat kesalahan !!! Terimakasih ..');
	    	redirect('loginelearningUser');
		}else{      
    		$inputNpm = $this->input->post('inputNpm', true);
    		$inputTahun = $this->input->post('inputTahun');
    		$npm = "0651".substr($inputTahun,2,4).$inputNpm;
	    	$inputUsername = $this->input->post('inputUsername', true);
			$inputEmail = $this->input->post('inputEmail');
			$cek_user = $this->db->query("SELECT * FROM tbl_user WHERE npm='$npm' && tahun='$inputTahun'")->num_rows();
			if($cek_user > 0){
				$this->session->set_flashdata('gagal', 'NPM sudah terdaftar, Silahkan Daftar Ulang Lagi !!! Terimakasih ..');
		    	redirect('loginelearningUser#signup');  
			}else{
				$cek_user = $this->db->query("SELECT * FROM tbl_user WHERE username='$inputUsername'")->num_rows();
				if($cek_user > 0){
					$this->session->set_flashdata('gagal', 'Username sudah terdaftar, Silahkan Daftar Ulang Lagi !!! Terimakasih ..');
		    		redirect('loginelearningUser#signup');
				}else{
					$cek_user = $this->db->query("SELECT * FROM tbl_biodata_user WHERE email='$inputEmail'")->num_rows();
					if($cek_user > 0){
						$this->session->set_flashdata('gagal', 'Email sudah terdaftar, Silahkan Daftar Ulang Lagi !!! Terimakasih ..');
			    		redirect('loginelearningUser#signup');
					}else{
			        	$set = '123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
						$code = substr(str_shuffle($set), 0, 15);
			    		$inputNama = $this->input->post('inputNama', true);
			    		$inputPassword = md5($this->input->post('inputPassword', true));
			    		$inputCode = $code;
			    		$akses = $this->input->post('akses');
			    		$jenis = $this->input->post('jenis');
						$kirimdata['nama'] = $inputNama;
						$kirimdata['npm'] = $npm;
						$kirimdata['tahun'] = $inputTahun;
						$kirimdata['username'] = $inputUsername;
						$kirimdata['password'] = $inputPassword;
						$kirimdata['code'] = $code;
						$kirimdata['jenis'] = $jenis;
						$kirimdata['status'] = "1";
						$kirimdata['akses'] = "1";
						$this->main_model->insert_mahasiswa($kirimdata);

						$cek_user = $this->db->query("SELECT * FROM tbl_user ORDER BY id_user DESC LIMIT 1")->result();			
						foreach($cek_user as $hasil){
						  	$id_user = $hasil->id_user;
				     	}
						$kirimdata2['id_user'] = $id_user;
						$kirimdata2['email'] = $inputEmail;
						$success = $this->main_model->insert_Lmahasiswa($kirimdata2);
						
			 			if($success){
			 				$this->session->set_flashdata('sukses', 'Data berhasil disimpan !!! Terimakasih ..');
			    			redirect('loginelearningUser');
			 			}else{
			 				$this->session->set_flashdata('gagal', 'Data gagal disimpan !!! Terimakasih ..');
			    			redirect('loginelearningUser#signup');
			 			}
			 		}
		 		}
		 	}
		}
	}

    function auth_user_elearning(){
		//panel elearning
		// getHostByName(php_uname('n'));
	    $inputEmailUsername=htmlspecialchars($this->input->post('inputUsername',TRUE),ENT_QUOTES);
	    $inputPassword=htmlspecialchars($this->input->post('inputPassword',TRUE),ENT_QUOTES);
	    $ceksession1=$this->login_model->select_session1($inputEmailUsername);
		if($ceksession1->num_rows() <= 0){
		    $cekauth=$this->login_model->auth_user($inputEmailUsername,$inputPassword);
		    if($cekauth->num_rows() > 0){
		    	$data=$cekauth->row_array();
		    	$biodatalengkapuser=$this->login_model->select_biodata_user($data['id_user']);
		        foreach ($biodatalengkapuser as $hasil){$email = $hasil->email;}
		    	$this->session->set_userdata('masuk',TRUE);
		        $this->session->set_userdata('ses_idlogin',$data['id_user']);
		    	$this->session->set_userdata('ses_name',$data['nama']);
		        $this->session->set_userdata('ses_username',$data['username']);
		        $this->session->set_userdata('ses_email',$email);
		        $this->session->set_userdata('ses_foto',$data['gambar']);
		        $this->session->set_userdata('ses_level',$data['akses']);
		        $ceksession=$this->login_model->select_session($data['username'],$data['level']);
		    	if($ceksession->num_rows() <= 0){
		    		date_default_timezone_set("Asia/Jakarta");
		    		$tgl = date("Y-m-d H:i:s");
			        $kirimdata['ip_address'] = getHostByName(php_uname('n'));
					$kirimdata['username'] = $data['username'];
					$kirimdata['level'] = $data['akses'];
					$kirimdata['waktu'] = $tgl;
					$this->login_model->insert_session($kirimdata);
				}
		        $level = $this->session->userdata('ses_level'); if($level == 1){$sbg = "Mahasiswa";}else if($level == 2){$sbg = "Asisten Praktikum";}else if($level == 3){$sbg = "Asisten Praktikum / Mahasiswa";}else if($level == 4){$sbg = "Alumin / Umum";}
		        $this->session->set_flashdata('msg', 'Selamat Datang '.$data['nama'].' di Panel Elearning Workshop sebagai '.$sbg.' !!!');
		        redirect('dashboard_user');
		    }else{
		    	$this->session->set_flashdata('msg', 'Tidak bisa masuk panel dasboard, mungkin ada kesalahan saat menginput data !!!');
		        redirect('loginelearningUser');
		    }
		}else{
	    	$this->session->set_flashdata('msg', 'Tidak bisa masuk panel dasboard, Username masih di gunakan di tempat lain !!!');
	        redirect('loginelearningUser');
	    }
    }

    function logout_admin_elearning(){
    	$username = $this->session->userdata('ses_username');
    	$this->login_model->hapus_session($username);
        $this->session->sess_destroy();
		redirect('loginelearning');
    }

    function logout_user_elearning(){
    	$username = $this->session->userdata('ses_username');
    	$this->login_model->hapus_session($username);
        $this->session->sess_destroy();
		redirect('loginelearningUser');
    }
}
