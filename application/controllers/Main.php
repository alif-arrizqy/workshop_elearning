<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Main extends CI_Controller {

	function __construct(){
		parent::__construct();
		$this->load->model('main_model');
    $this->load->library('upload');
    if($this->session->userdata('masuk') != TRUE){
			$url=base_url();
			$this->session->set_flashdata('msg', 'Anda tidak boleh masuk Dashboard, silahkan login terlebih dahulu !!');
			redirect('loginelearning');
		}
	}

	function index(){
		$this->load->view('admin/kelengkapan/header');
		$this->load->view('admin/dashboard');
		$this->load->view('admin/kelengkapan/footer');
	}

	function profile_admin(){
		$id_admin = $this->session->userdata('ses_idlogin');
		$data = array(
			'data_admin' => $this->main_model->detail_administrator($id_admin)->result(),
	  );
		$this->load->view('admin/kelengkapan/header');
		$this->load->view('admin/profile', $data);
		$this->load->view('admin/kelengkapan/footer');
	}

	function tampildata_admin($kondisi_data,$id_admin){
    $kirimdata['kondisi_data'] = $kondisi_data;
		$this->main_model->update_profiltampildata_admin($kirimdata, $id_admin);
    redirect('profile_admin');
	}

	function ubah_profil($id_admin){
		$data = array(
  	  'data_admin' => $this->main_model->ubah_administrator($id_admin)->result(),
    );
		$this->load->view('admin/ubah_profil', $data);
	}

	function update_administrator_dahsboard(){
		$this->form_validation->set_rules('inputNama','Input Nama Lengkap', 'required');
		$this->form_validation->set_rules('inputEmail','Input Email', 'required|valid_email');
		$this->form_validation->set_rules('inputUsername','Input Username', 'required|min_length[1]|max_length[25]');
		$this->form_validation->set_rules('inputTelepon','Input Telepon', 'required|max_length[15]');
 		
    if ($this->form_validation->run() == FALSE) { 
    	$this->session->set_flashdata('gagal', 'Coba cek lagi data input anda, kemungkinan terdapat kesalahan !!! Terimakasih ..');
  		redirect('profile_admin');
		}else{
			$config['upload_path'] = './assets/images/gambar_user/'; //path folder
	    $config['allowed_types'] = 'jpg|png|jpeg|bmp'; //type yang dapat diakses bisa anda sesuaikan
	    $config['encrypt_name'] = FALSE; //Enkripsi nama yang terupload

	    $this->upload->initialize($config);
    	if(!empty($_FILES['foto']['name'])){

	    	if ($this->upload->do_upload('foto')){
        	$gbr = $this->upload->data();
        	$file_gbr = str_replace(" ", "_", $gbr['file_name']);
          $config['image_library']='gd2';
          $config['source_image']='./assets/images/gambar_user/'.$file_gbr;
          $config['create_thumb']= FALSE;
          $config['maintain_ratio']= FALSE;
          $config['quality']= '50%';
          $config['width']= 200;
          $config['height']= 200;
          $config['new_image']= './assets/images/gambar_user/'.$file_gbr;
          $this->load->library('image_lib', $config);
          $this->image_lib->resize();
          $gambar = $file_gbr;
        }
    		$admin_id = $this->input->post('admin_id');
    		$inputUsername = $this->input->post('inputUsername', true);
    		if(!empty($this->input->post('inputPassword'))){
    			$inputPassword = md5($this->input->post('inputPassword', true)); 
					$kirimdata['password'] = $inputPassword;
    		}
    		$kirimdata['username'] = $inputUsername;
				$this->main_model->update_administrator($kirimdata, $admin_id);

    		$inputNama = $this->input->post('inputNama');
    		$inputEmail = $this->input->post('inputEmail');
    		$inputTempat = $this->input->post('inputTempat');
    		$inputTgl = date("Y-m-d",strtotime($this->input->post('inputTgl')));
    		$jk = $this->input->post('jk');
    		$agama = $this->input->post('agama');
    		$inputTelepon = $this->input->post('inputTelepon');
    		$inputAlamat = $this->input->post('inputAlamat');
		
    		if($inputTgl == "1970-01-01"){
    			$tanggal = "0000-00-00";
    		}else{
    			$tanggal = $inputTgl;
    		}

				$kirimdata2['nama'] = $inputNama;
				$kirimdata2['tempat'] = $inputTempat;
				$kirimdata2['tgl_lahir'] = $tanggal;
				$kirimdata2['jk'] = $jk;
				$kirimdata2['agama'] = $agama;
				$kirimdata2['email'] = $inputEmail;
				$kirimdata2['telp'] = $inputTelepon;
				$kirimdata2['alamat'] = $inputAlamat;
				$lihat = $this->input->post('lihat');
				if($lihat != 1){
					$kirimdata2['gambar'] = $gambar;
				}
				$success = $this->main_model->update_Ladministrator($kirimdata2, $admin_id);
    		$this->session->set_userdata('masuk',TRUE);
        $this->session->set_userdata('ses_idlogin',$admin_id);
		    $this->session->set_userdata('ses_name',$inputNama);
        $this->session->set_userdata('ses_username',$inputUsername);
        $this->session->set_userdata('ses_email',$inputEmail);
        $this->session->set_userdata('ses_foto',$gambar);
				
	 			if($success){
	 				$this->session->set_flashdata('sukses', 'Data berhasil diubah !!! Terimakasih ..');
	    		redirect('profile_admin');
	 			}else{
	 				$this->session->set_flashdata('gagal', 'Data gagal diubah !!! Terimakasih ..');
	    			redirect('profile_admin');
	 			}
    	}else{
    		$admin_id = $this->input->post('admin_id');
    		$inputUsername = $this->input->post('inputUsername', true);
    		if(empty($this->input->post('inputPassword'))){
    			$inputPassword = $this->input->post('inputPassword1', true);
    		}else{
    			$inputPassword = md5($this->input->post('inputPassword', true)); 
    		}
				$kirimdata['username'] = $inputUsername;
				$kirimdata['password'] = $inputPassword;
				$this->main_model->update_administrator($kirimdata, $admin_id);

        $inputNama = $this->input->post('inputNama');
    		$inputEmail = $this->input->post('inputEmail');
    		$inputTempat = $this->input->post('inputTempat');
    		$inputTgl = date("Y-m-d",strtotime($this->input->post('inputTgl')));
    		$jk = $this->input->post('jk');
    		$agama = $this->input->post('agama');
    		$inputTelepon = $this->input->post('inputTelepon');
    		$inputAlamat = $this->input->post('inputAlamat');
		
    		if($inputTgl == "1970-01-01"){
    			$tanggal = "0000-00-00";
    		}else{
    			$tanggal = $inputTgl;
    		}

				$kirimdata2['nama'] = $inputNama;
				$kirimdata2['tempat'] = $inputTempat;
				$kirimdata2['tgl_lahir'] = $tanggal;
				$kirimdata2['jk'] = $jk;
				$kirimdata2['agama'] = $agama;
				$kirimdata2['email'] = $inputEmail;
				$kirimdata2['telp'] = $inputTelepon;
				$kirimdata2['alamat'] = $inputAlamat;
				$lihat = $this->input->post('lihat');
				if($lihat != 1){
					$kirimdata2['gambar'] = '';
				}
				$success = $this->main_model->update_Ladministrator($kirimdata2, $admin_id);
				$this->session->set_userdata('masuk',TRUE);
		    $this->session->set_userdata('ses_idlogin',$admin_id);
		    $this->session->set_userdata('ses_name',$inputNama);
		    $this->session->set_userdata('ses_username',$inputUsername);
		    $this->session->set_userdata('ses_email',$inputEmail);
	 			if($success){
	 				$this->session->set_flashdata('sukses', 'Data berhasil diubah !!! Terimakasih ..');
	    		redirect('profile_admin');
	 			}else{
	 				$this->session->set_flashdata('gagal', 'Data gagal diubah !!! Terimakasih ..');
	    		redirect('profile_admin');
	 			}
    	}
		}
	}

	function hapusgambar($id_admin){
    $kirimdata['gambar'] = '';
		$this->main_model->update_Ladministrator($kirimdata, $id_admin);
    $this->session->set_userdata('ses_foto','');
    redirect('profile_admin');
	}

	//Master Data
		//Administrator
		function v_administrator(){
			$data = array(
	      'data_admin' => $this->main_model->get_all_admin()->result(),
	    );
			$this->load->view('admin/kelengkapan/header');
			$this->load->view('admin/master_data/administrator/v_administrator', $data);
			$this->load->view('admin/kelengkapan/footer');
		}

		function save_administrator(){
			$this->form_validation->set_rules('inputNama','Input Nama Lengkap', 'required');
			$this->form_validation->set_rules('inputEmail','Input Email', 'required|valid_email');
			$this->form_validation->set_rules('inputUsername','Input Username', 'required|min_length[1]|max_length[25]');
			$this->form_validation->set_rules('inputPassword','Input Password', 'required|min_length[6]|max_length[15]');
			$this->form_validation->set_rules('inputTelepon','Input Telepon', 'required|max_length[15]');
			$this->form_validation->set_rules('level','Pilih Level', 'required');
	 		
      if ($this->form_validation->run() == FALSE) { 
      	$this->session->set_flashdata('gagal', 'Coba cek lagi data input anda, kemungkinan terdapat kesalahan !!! Terimakasih ..');
    		redirect('v_administrator');
			}else{
				$config['upload_path'] = './assets/images/gambar_user/'; //path folder
       	$config['allowed_types'] = 'jpg|png|jpeg|bmp'; //type yang dapat diakses bisa anda sesuaikan
       	$config['encrypt_name'] = FALSE; //Enkripsi nama yang terupload

		    $this->upload->initialize($config);
        if(!empty($_FILES['foto']['name'])){

		    	if ($this->upload->do_upload('foto')){
          	$gbr = $this->upload->data();
          	$file_gbr = str_replace(" ", "_", $gbr['file_name']);
            $config['image_library']='gd2';
            $config['source_image']='./assets/images/gambar_user/'.$file_gbr;
            $config['create_thumb']= FALSE;
            $config['maintain_ratio']= FALSE;
            $config['quality']= '50%';
            $config['width']= 200;
            $config['height']= 200;
            $config['new_image']= './assets/images/gambar_user/'.$file_gbr;
            $this->load->library('image_lib', $config);
            $this->image_lib->resize();
            $gambar = $file_gbr;
          }
                    
          $set = '123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
					$code = substr(str_shuffle($set), 0, 15);
      		$inputUsername = $this->input->post('inputUsername', true);
      		$inputPassword = md5($this->input->post('inputPassword', true));
      		$inputCode = $code;
      		$level = $this->input->post('level');
					$kirimdata['username'] = $inputUsername;
					$kirimdata['password'] = $inputPassword;
					$kirimdata['code'] = $code;
					$kirimdata['level'] = $level;
					$kirimdata['status'] = "1";
					$this->main_model->insert_administrator($kirimdata);

					$cek_admin = $this->db->query("SELECT * FROM tbl_admin ORDER BY id_admin DESC LIMIT 1")->result();			
					foreach($cek_admin as $hasil){
					 	$id_admin = $hasil->id_admin;
		      }
      		$inputNama = $this->input->post('inputNama');
      		$inputEmail = $this->input->post('inputEmail');
      		$inputTempat = $this->input->post('inputTempat');
      		$inputTgl = date("Y-m-d",strtotime($this->input->post('inputTgl')));
      		$jk = $this->input->post('jk');
      		$agama = $this->input->post('agama');
      		$inputTelepon = $this->input->post('inputTelepon');
      		$inputAlamat = $this->input->post('inputAlamat');
		
      		if($inputTgl == "1970-01-01"){
      			$tanggal = "0000-00-00";
      		}else{
      			$tanggal = $inputTgl;
      		}

					$kirimdata2['id_admin'] = $id_admin;
					$kirimdata2['nama'] = $inputNama;
					$kirimdata2['tempat'] = $inputTempat;
					$kirimdata2['tgl_lahir'] = $tanggal;
					$kirimdata2['jk'] = $jk;
					$kirimdata2['agama'] = $agama;
					$kirimdata2['email'] = $inputEmail;
					$kirimdata2['telp'] = $inputTelepon;
					$kirimdata2['alamat'] = $inputAlamat;
					$kirimdata2['gambar'] = $gambar;
					$success = $this->main_model->insert_Ladministrator($kirimdata2);
					
		 			if($success){
		 				$this->session->set_flashdata('sukses', 'Data berhasil disimpan !!! Terimakasih ..');
		    		redirect('v_administrator');
		 			}else{
		 				$this->session->set_flashdata('gagal', 'Data gagal disimpan !!! Terimakasih ..');
		    		redirect('v_administrator');
		 			}
       	}else{
        	$set = '123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
					$code = substr(str_shuffle($set), 0, 15);
      		$inputUsername = $this->input->post('inputUsername', true);
      		$inputPassword = md5($this->input->post('inputPassword', true));
      		$inputCode = $code;
      		$level = $this->input->post('level');
					$kirimdata['username'] = $inputUsername;
					$kirimdata['password'] = $inputPassword;
					$kirimdata['code'] = $code;
					$kirimdata['level'] = $level;
					$kirimdata['status'] = "1";
					$this->main_model->insert_administrator($kirimdata);

					$cek_admin = $this->db->query("SELECT * FROM tbl_admin ORDER BY id_admin DESC LIMIT 1")->result();			
					foreach($cek_admin as $hasil){
					  $id_admin = $hasil->id_admin;
		      }
          $inputNama = $this->input->post('inputNama');
      		$inputEmail = $this->input->post('inputEmail');
      		$inputTempat = $this->input->post('inputTempat');
      		$inputTgl = date("Y-m-d",strtotime($this->input->post('inputTgl')));
      		$jk = $this->input->post('jk');
      		$agama = $this->input->post('agama');
      		$inputTelepon = $this->input->post('inputTelepon');
      		$inputAlamat = $this->input->post('inputAlamat');
		
      		if($inputTgl == "1970-01-01"){
      			$tanggal = "0000-00-00";
      		}else{
      			$tanggal = $inputTgl;
      		}

					$kirimdata2['id_admin'] = $id_admin;
					$kirimdata2['nama'] = $inputNama;
					$kirimdata2['tempat'] = $inputTempat;
					$kirimdata2['tgl_lahir'] = $tanggal;
					$kirimdata2['jk'] = $jk;
					$kirimdata2['agama'] = $agama;
					$kirimdata2['email'] = $inputEmail;
					$kirimdata2['telp'] = $inputTelepon;
					$kirimdata2['alamat'] = $inputAlamat;
					$kirimdata2['gambar'] = '';
					$success = $this->main_model->insert_Ladministrator($kirimdata2);
					
		 			if($success){
		 				$this->session->set_flashdata('sukses', 'Data berhasil disimpan !!! Terimakasih ..');
		    		redirect('v_administrator');
		 			}else{
		 				$this->session->set_flashdata('gagal', 'Data gagal disimpan !!! Terimakasih ..');
		    		redirect('v_administrator');
		 			}
       	}
			}
		}

		function edit_administrator($id_admin){
			$data = array(
	      'data_admin' => $this->main_model->ubah_administrator($id_admin)->result(),
	    );
			$this->load->view('admin/master_data/administrator/edit_administrator', $data);
		}

		function update_administrator(){
			$this->form_validation->set_rules('inputNama','Input Nama Lengkap', 'required');
			$this->form_validation->set_rules('inputEmail','Input Email', 'required|valid_email');
			$this->form_validation->set_rules('inputUsername','Input Username', 'required|min_length[1]|max_length[25]');
			$this->form_validation->set_rules('inputTelepon','Input Telepon', 'required|max_length[15]');
			$this->form_validation->set_rules('level','Pilih Level', 'required');
	 		
      if ($this->form_validation->run() == FALSE) { 
      	$this->session->set_flashdata('gagal', 'Coba cek lagi data input anda, kemungkinan terdapat kesalahan !!! Terimakasih ..');
    		redirect('v_administrator');
			}else{
				$config['upload_path'] = './assets/images/gambar_user/'; //path folder
       	$config['allowed_types'] = 'jpg|png|jpeg|bmp'; //type yang dapat diakses bisa anda sesuaikan
       	$config['encrypt_name'] = FALSE; //Enkripsi nama yang terupload

	     	$this->upload->initialize($config);
	  		if(!empty($_FILES['foto']['name'])){

          if ($this->upload->do_upload('foto')){
          	$gbr = $this->upload->data();
          	$file_gbr = str_replace(" ", "_", $gbr['file_name']);
            $config['image_library']='gd2';
            $config['source_image']='./assets/images/gambar_user/'.$file_gbr;
            $config['create_thumb']= FALSE;
            $config['maintain_ratio']= FALSE;
            $config['quality']= '50%';
            $config['width']= 200;
            $config['height']= 200;
            $config['new_image']= './assets/images/gambar_user/'.$file_gbr;
            $this->load->library('image_lib', $config);
            $this->image_lib->resize();
            $gambar = $file_gbr;
      		}

      		$admin_id = $this->input->post('admin_id');
      		$inputUsername = $this->input->post('inputUsername', true);
      		if(empty($this->input->post('inputPassword1'))){
      			$inputPassword = $this->input->post('inputPassword', true);
      		}else{
      			$inputPassword = md5($this->input->post('inputPassword1', true)); 
      		}
      		$level = $this->input->post('level');
      		$status = $this->input->post('kondisi');
					$kirimdata['username'] = $inputUsername;
					$kirimdata['password'] = $inputPassword;
					$kirimdata['level'] = $level;
					$kirimdata['status'] = $status;
					$this->main_model->update_administrator($kirimdata, $admin_id);

      		$inputNama = $this->input->post('inputNama');
      		$inputEmail = $this->input->post('inputEmail');
      		$inputTempat = $this->input->post('inputTempat');
      		$inputTgl = date("Y-m-d",strtotime($this->input->post('inputTgl')));
      		$jk = $this->input->post('jk');
      		$agama = $this->input->post('agama');
      		$inputTelepon = $this->input->post('inputTelepon');
      		$inputAlamat = $this->input->post('inputAlamat');
		
      		if($inputTgl == "1970-01-01"){
      			$tanggal = "0000-00-00";
      		}else{
      			$tanggal = $inputTgl;
      		}

					$kirimdata2['nama'] = $inputNama;
					$kirimdata2['tempat'] = $inputTempat;
					$kirimdata2['tgl_lahir'] = $tanggal;
					$kirimdata2['jk'] = $jk;
					$kirimdata2['agama'] = $agama;
					$kirimdata2['email'] = $inputEmail;
					$kirimdata2['telp'] = $inputTelepon;
					$kirimdata2['alamat'] = $inputAlamat;
					$lihat = $this->input->post('lihat');
					if($lihat != 1){
						$kirimdata2['gambar'] = $gambar;
					}
					$success = $this->main_model->update_Ladministrator($kirimdata2, $admin_id);
					
		 			if($success){
		 				$this->session->set_flashdata('sukses', 'Data berhasil diubah !!! Terimakasih ..');
		    		redirect('v_administrator');
		 			}else{
		 				$this->session->set_flashdata('gagal', 'Data gagal diubah !!! Terimakasih ..');
		    		redirect('v_administrator');
		 			}
        }else{
      		$admin_id = $this->input->post('admin_id');
      		$inputUsername = $this->input->post('inputUsername', true);
      		if(empty($this->input->post('inputPassword1'))){
      			$inputPassword = $this->input->post('inputPassword', true);
      		}else{
      			$inputPassword = md5($this->input->post('inputPassword1', true)); 
      		}
      		$level = $this->input->post('level');
      		$status = $this->input->post('kondisi');
					$kirimdata['username'] = $inputUsername;
					$kirimdata['password'] = $inputPassword;
					$kirimdata['level'] = $level;
					$kirimdata['status'] = $status;
					$this->main_model->update_administrator($kirimdata, $admin_id);

          $inputNama = $this->input->post('inputNama');
      		$inputEmail = $this->input->post('inputEmail');
      		$inputTempat = $this->input->post('inputTempat');
      		$inputTgl = date("Y-m-d",strtotime($this->input->post('inputTgl')));
      		$jk = $this->input->post('jk');
      		$agama = $this->input->post('agama');
      		$inputTelepon = $this->input->post('inputTelepon');
      		$inputAlamat = $this->input->post('inputAlamat');
		
      		if($inputTgl == "1970-01-01"){
      			$tanggal = "0000-00-00";
      		}else{
      			$tanggal = $inputTgl;
      		}

					$kirimdata2['nama'] = $inputNama;
					$kirimdata2['tempat'] = $inputTempat;
					$kirimdata2['tgl_lahir'] = $tanggal;
					$kirimdata2['jk'] = $jk;
					$kirimdata2['agama'] = $agama;
					$kirimdata2['email'] = $inputEmail;
					$kirimdata2['telp'] = $inputTelepon;
					$kirimdata2['alamat'] = $inputAlamat;
					$lihat = $this->input->post('lihat');
					if($lihat != 1){
						$kirimdata2['gambar'] = '';
					}
					$success = $this->main_model->update_Ladministrator($kirimdata2, $admin_id);
					
		 			if($success){
		 				$this->session->set_flashdata('sukses', 'Data berhasil diubah !!! Terimakasih ..');
		    		redirect('v_administrator');
		 			}else{
		 				$this->session->set_flashdata('gagal', 'Data gagal diubah !!! Terimakasih ..');
		    		redirect('v_administrator');
		 			}
        }
			}
		}

		function detail_administrator($id_admin){
			$data = array(
	      'data_admin' => $this->main_model->detail_administrator($id_admin)->result(),
	    );
			$this->load->view('admin/master_data/administrator/detail_administrator', $data);
		}

		function delete_administrator($id_admin){
      $this->main_model->hapus_administrator($id_admin);
	    redirect('v_administrator');
  	}

  	function delete_administrator_all(){
      $id_admin = $this->input->post('pilih');
      $jumlah_dipilih = count($id_admin);
      for($x=0;$x<$jumlah_dipilih;$x++){
      	$this->main_model->hapus_administrator($id_admin[$x]);
      }
      $this->session->set_flashdata('sukses', 'Data yang di pilih berhasil dihapus !!! Terimakasih ..');
	    redirect('v_administrator');
  	}

    //Mahasiswa
		function v_mahasiswa(){
			$data = array(
	    	'data_mahasiswa' => $this->main_model->get_all_mahasiswa()->result(),
	    );
			$this->load->view('admin/kelengkapan/header');
			$this->load->view('admin/master_data/mahasiswa/v_mahasiswa', $data);
			$this->load->view('admin/kelengkapan/footer');
		}

		function save_mahasiswa(){
			$this->form_validation->set_rules('inputTahun','Input Tahun', 'required');
			$this->form_validation->set_rules('inputNpm','Input Npm', 'required');
			$this->form_validation->set_rules('inputNama','Input Nama Lengkap', 'required');
			$this->form_validation->set_rules('inputEmail','Input Email', 'required|valid_email');
			$this->form_validation->set_rules('inputUsername','Input Username', 'required|min_length[1]|max_length[25]');
			$this->form_validation->set_rules('inputPassword','Input Password', 'required|min_length[6]|max_length[15]');
			$this->form_validation->set_rules('inputTelepon','Input Telepon', 'required|max_length[15]');
			$this->form_validation->set_rules('akses','Pilih Akses', 'required');
			$this->form_validation->set_rules('jenis','Pilih Jenis', 'required');
	 		
      if ($this->form_validation->run() == FALSE) { 
      	$this->session->set_flashdata('gagal', 'Coba cek lagi data input anda, kemungkinan terdapat kesalahan !!! Terimakasih ..');
	    	redirect('v_mahasiswa');
			}else{
				$config['upload_path'] = './assets/images/gambar_user/'; //path folder
			 	$config['allowed_types'] = 'jpg|png|jpeg|bmp'; //type yang dapat diakses bisa anda sesuaikan
			 	$config['encrypt_name'] = FALSE; //Enkripsi nama yang terupload

			 	$this->upload->initialize($config);
				if(!empty($_FILES['foto']['name'])){

		      if ($this->upload->do_upload('foto')){
	        	$gbr = $this->upload->data();
	        	$file_gbr = str_replace(" ", "_", $gbr['file_name']);
	          $config['image_library']='gd2';
	          $config['source_image']='./assets/images/gambar_user/'.$file_gbr;
	          $config['create_thumb']= FALSE;
	          $config['maintain_ratio']= FALSE;
	          $config['quality']= '50%';
	          $config['width']= 200;
	          $config['height']= 200;
	          $config['new_image']= './assets/images/gambar_user/'.$file_gbr;
	          $this->load->library('image_lib', $config);
	          $this->image_lib->resize();
	          $gambar = $file_gbr;
		  		}
          
          $set = '123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
					$code = substr(str_shuffle($set), 0, 15);
	    		$inputNama = $this->input->post('inputNama', true);
	    		$inputUsername = $this->input->post('inputUsername', true);
	    		$inputPassword = md5($this->input->post('inputPassword', true));
	    		$inputCode = $code;
	    		$akses = $this->input->post('akses');
	    		$jenis = $this->input->post('jenis');
	    		$inputNpm = $this->input->post('inputNpm', true);
	    		$inputTahun = $this->input->post('inputTahun');
	    		$npm = "0651".substr($inputTahun,2,4).$inputNpm;
					$kirimdata['nama'] = $inputNama;
					$kirimdata['npm'] = $npm;
					$kirimdata['tahun'] = $inputTahun;
					$kirimdata['username'] = $inputUsername;
					$kirimdata['password'] = $inputPassword;
					$kirimdata['code'] = $code;
					$kirimdata['akses'] = $akses;
					$kirimdata['jenis'] = $jenis;
					$kirimdata['gambar'] = $gambar;
					$kirimdata['status'] = "1";
					$this->main_model->insert_mahasiswa($kirimdata);

					$cek_user = $this->db->query("SELECT * FROM tbl_user ORDER BY id_user DESC LIMIT 1")->result();			
					foreach($cek_user as $hasil){
					  $id_user = $hasil->id_user;
		      }
      		$inputTempat = $this->input->post('inputTempat');
      		$inputTgl = date("Y-m-d",strtotime($this->input->post('inputTgl')));
      		$jk = $this->input->post('jk');
      		$agama = $this->input->post('agama');
      		if(empty($agama)){$agama = "0";}
      		$inputEmail = $this->input->post('inputEmail');
      		$inputNamaayah = $this->input->post('inputNamaayah');
      		$inputNamaibu = $this->input->post('inputNamaibu');
      		$inputTelepon = $this->input->post('inputTelepon');
      		$inputAlamat = $this->input->post('inputAlamat');
		
      		if($inputTgl == "1970-01-01"){
      			$tanggal = "0000-00-00";
      		}else{
      			$tanggal = $inputTgl;
      		}

					$kirimdata2['id_user'] = $id_user;
					$kirimdata2['tempat'] = $inputTempat;
					$kirimdata2['tgl_lahir'] = $tanggal;
					$kirimdata2['jk'] = $jk;
					$kirimdata2['agama'] = $agama;
					$kirimdata2['email'] = $inputEmail;
					$kirimdata2['nama_ayah'] = $inputNamaayah;
					$kirimdata2['nama_ibu'] = $inputNamaibu;
					$kirimdata2['telp'] = $inputTelepon;
					$kirimdata2['alamat'] = $inputAlamat;
					$success = $this->main_model->insert_Lmahasiswa($kirimdata2);
					
		 			if($success){
		 				$this->session->set_flashdata('sukses', 'Data berhasil disimpan !!! Terimakasih ..');
		    		redirect('v_mahasiswa');
		 			}else{
		 				$this->session->set_flashdata('gagal', 'Data gagal disimpan !!! Terimakasih ..');
		    		redirect('v_mahasiswa');
		 			}
       	}else{
        	$set = '123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
					$code = substr(str_shuffle($set), 0, 15);
      		$inputNama = $this->input->post('inputNama', true);
      		$inputUsername = $this->input->post('inputUsername', true);
      		$inputPassword = md5($this->input->post('inputPassword', true));
      		$inputCode = $code;
      		$akses = $this->input->post('akses');
      		$jenis = $this->input->post('jenis');
      		$inputNpm = $this->input->post('inputNpm', true);
      		$inputTahun = $this->input->post('inputTahun');
      		$npm = "0651".substr($inputTahun,2,4).$inputNpm;
					$kirimdata['nama'] = $inputNama;
					$kirimdata['npm'] = $npm;
					$kirimdata['tahun'] = $inputTahun;
					$kirimdata['username'] = $inputUsername;
					$kirimdata['password'] = $inputPassword;
					$kirimdata['code'] = $code;
					$kirimdata['akses'] = $akses;
					$kirimdata['jenis'] = $jenis;
					$kirimdata['gambar'] = '';
					$kirimdata['status'] = "1";
					$this->main_model->insert_mahasiswa($kirimdata);

					$cek_user = $this->db->query("SELECT * FROM tbl_user ORDER BY id_user DESC LIMIT 1")->result();			
					foreach($cek_user as $hasil){
					  $id_user = $hasil->id_user;
		      }
      		$inputTempat = $this->input->post('inputTempat');
      		$inputTgl = date("Y-m-d",strtotime($this->input->post('inputTgl')));
      		$jk = $this->input->post('jk');
      		$agama = $this->input->post('agama');
      		if(empty($agama)){$agama = "0";}
      		$inputEmail = $this->input->post('inputEmail');
      		$inputNamaayah = $this->input->post('inputNamaayah');
      		$inputNamaibu = $this->input->post('inputNamaibu');
      		$inputTelepon = $this->input->post('inputTelepon');
      		$inputAlamat = $this->input->post('inputAlamat');
		
      		if($inputTgl == "1970-01-01"){
      			$tanggal = "0000-00-00";
      		}else{
      			$tanggal = $inputTgl;
      		}

					$kirimdata2['id_user'] = $id_user;
					$kirimdata2['tempat'] = $inputTempat;
					$kirimdata2['tgl_lahir'] = $tanggal;
					$kirimdata2['jk'] = $jk;
					$kirimdata2['agama'] = $agama;
					$kirimdata2['email'] = $inputEmail;
					$kirimdata2['nama_ayah'] = $inputNamaayah;
					$kirimdata2['nama_ibu'] = $inputNamaibu;
					$kirimdata2['telp'] = $inputTelepon;
					$kirimdata2['alamat'] = $inputAlamat;
					$success = $this->main_model->insert_Lmahasiswa($kirimdata2);
					
		 			if($success){
		 				$this->session->set_flashdata('sukses', 'Data berhasil disimpan !!! Terimakasih ..');
		    		redirect('v_mahasiswa');
		 			}else{
		 				$this->session->set_flashdata('gagal', 'Data gagal disimpan !!! Terimakasih ..');
		    		redirect('v_mahasiswa');
		 			}
        }
			}
		}

		function edit_mahasiswa($id_user){
			$data = array(
	     	'data_mahasiswa' => $this->main_model->ubah_mahasiswa($id_user)->result(),
	    );
			$this->load->view('admin/master_data/mahasiswa/edit_mahasiswa', $data);
		}

		function update_mahasiswa(){
			$this->form_validation->set_rules('inputTahun','Input Tahun', 'required');
			$this->form_validation->set_rules('inputNpm','Input Npm', 'required');
			$this->form_validation->set_rules('inputNama','Input Nama Lengkap', 'required');
			$this->form_validation->set_rules('inputEmail','Input Email', 'required|valid_email');
			$this->form_validation->set_rules('inputUsername','Input Username', 'required|min_length[1]|max_length[25]');
			$this->form_validation->set_rules('inputTelepon','Input Telepon', 'required|max_length[15]');
			$this->form_validation->set_rules('akses','Pilih Akses', 'required');
	 		
	    if ($this->form_validation->run() == FALSE) { 
	    	$this->session->set_flashdata('gagal', 'Coba cek lagi data input anda, kemungkinan terdapat kesalahan !!! Terimakasih ..');
		    redirect('v_mahasiswa');
			}else{
				$config['upload_path'] = './assets/images/gambar_user/'; //path folder
       	$config['allowed_types'] = 'jpg|png|jpeg|bmp'; //type yang dapat diakses bisa anda sesuaikan
       	$config['encrypt_name'] = FALSE; //Enkripsi nama yang terupload

       	$this->upload->initialize($config);
    		if(!empty($_FILES['foto']['name'])){

          if ($this->upload->do_upload('foto')){
          	$gbr = $this->upload->data();
          	$file_gbr = str_replace(" ", "_", $gbr['file_name']);
            $config['image_library']='gd2';
            $config['source_image']='./assets/images/gambar_user/'.$file_gbr;
            $config['create_thumb']= FALSE;
            $config['maintain_ratio']= FALSE;
            $config['quality']= '50%';
            $config['width']= 200;
            $config['height']= 200;
            $config['new_image']= './assets/images/gambar_user/'.$file_gbr;
            $this->load->library('image_lib', $config);
            $this->image_lib->resize();
            $gambar = $file_gbr;
      		}

      		$user_id = $this->input->post('user_id');
      		$inputNama = $this->input->post('inputNama', true);
      		$inputUsername = $this->input->post('inputUsername', true);
      		if(empty($this->input->post('inputPassword1'))){
      			$inputPassword = $this->input->post('inputPassword', true);
      		}else{
      			$inputPassword = md5($this->input->post('inputPassword1', true)); 
      		}
      		$akses = $this->input->post('akses');
      		$jenis = $this->input->post('jenis');
      		$status = $this->input->post('kondisi');
      		$inputNpm = $this->input->post('inputNpm', true);
      		$inputTahun = $this->input->post('inputTahun');
      		$npm = "0651".substr($inputTahun,2,4).$inputNpm;
					$kirimdata['nama'] = $inputNama;
					$kirimdata['npm'] = $npm;
					$kirimdata['tahun'] = $inputTahun;
					$kirimdata['username'] = $inputUsername;
					$kirimdata['password'] = $inputPassword;
					$kirimdata['akses'] = $akses;
					$kirimdata['jenis'] = $jenis;
					$lihat = $this->input->post('lihat');
					if($lihat != 1){
						$kirimdata['gambar'] = $gambar;
					}
					$kirimdata['status'] = $status;
					$this->main_model->update_mahasiswa($kirimdata, $user_id);

      		$inputTempat = $this->input->post('inputTempat');
      		$inputTgl = date("Y-m-d",strtotime($this->input->post('inputTgl')));
      		$jk = $this->input->post('jk');
      		$agama = $this->input->post('agama');
      		$inputEmail = $this->input->post('inputEmail');
      		$inputNamaayah = $this->input->post('inputNamaayah');
      		$inputNamaibu = $this->input->post('inputNamaibu');
      		$inputTelepon = $this->input->post('inputTelepon');
      		$inputAlamat = $this->input->post('inputAlamat');
		
      		if($inputTgl == "1970-01-01"){
      			$tanggal = "0000-00-00";
      		}else{
      			$tanggal = $inputTgl;
      		}

					$kirimdata2['id_user'] = $user_id;
					$kirimdata2['tempat'] = $inputTempat;
					$kirimdata2['tgl_lahir'] = $tanggal;
					$kirimdata2['jk'] = $jk;
					$kirimdata2['agama'] = $agama;
					$kirimdata2['email'] = $inputEmail;
					$kirimdata2['nama_ayah'] = $inputNamaayah;
					$kirimdata2['nama_ibu'] = $inputNamaibu;
					$kirimdata2['telp'] = $inputTelepon;
					$kirimdata2['alamat'] = $inputAlamat;
					$success = $this->main_model->update_Lmahasiswa($kirimdata2, $user_id);
					
		 			if($success){
		 				$this->session->set_flashdata('sukses', 'Data berhasil diubah !!! Terimakasih ..');
		    		redirect('v_mahasiswa');
		 			}else{
		 				$this->session->set_flashdata('gagal', 'Data gagal diubah !!! Terimakasih ..');
		    		redirect('v_mahasiswa');
		 			}
       	}else{
      		$user_id = $this->input->post('user_id');
      		$inputNama = $this->input->post('inputNama', true);
      		$inputUsername = $this->input->post('inputUsername', true);
      		if(empty($this->input->post('inputPassword1'))){
      			$inputPassword = $this->input->post('inputPassword', true);
      		}else{
      			$inputPassword = md5($this->input->post('inputPassword1', true)); 
      		}
      		$akses = $this->input->post('akses');
      		$jenis = $this->input->post('jenis');
      		$status = $this->input->post('kondisi');
      		$inputNpm = $this->input->post('inputNpm', true);
      		$inputTahun = $this->input->post('inputTahun');
      		$npm = "0651".substr($inputTahun,2,4).$inputNpm;
					$kirimdata['nama'] = $inputNama;
					$kirimdata['npm'] = $npm;
					$kirimdata['tahun'] = $inputTahun;
					$kirimdata['username'] = $inputUsername;
					$kirimdata['password'] = $inputPassword;
					$kirimdata['akses'] = $akses;
					$kirimdata['jenis'] = $jenis;
					$lihat = $this->input->post('lihat');
					if($lihat != 1){
						$kirimdata['gambar'] = '';
					}
					$kirimdata['status'] = $status;
					$this->main_model->update_mahasiswa($kirimdata, $user_id);

      		$inputTempat = $this->input->post('inputTempat');
      		$inputTgl = date("Y-m-d",strtotime($this->input->post('inputTgl')));
      		$jk = $this->input->post('jk');
      		$agama = $this->input->post('agama');
      		$inputEmail = $this->input->post('inputEmail');
      		$inputNamaayah = $this->input->post('inputNamaayah');
      		$inputNamaibu = $this->input->post('inputNamaibu');
      		$inputTelepon = $this->input->post('inputTelepon');
      		$inputAlamat = $this->input->post('inputAlamat');
		
      		if($inputTgl == "1970-01-01"){
      			$tanggal = "0000-00-00";
      		}else{
      			$tanggal = $inputTgl;
      		}

					$kirimdata2['id_user'] = $user_id;
					$kirimdata2['tempat'] = $inputTempat;
					$kirimdata2['tgl_lahir'] = $tanggal;
					$kirimdata2['jk'] = $jk;
					$kirimdata2['agama'] = $agama;
					$kirimdata2['email'] = $inputEmail;
					$kirimdata2['nama_ayah'] = $inputNamaayah;
					$kirimdata2['nama_ibu'] = $inputNamaibu;
					$kirimdata2['telp'] = $inputTelepon;
					$kirimdata2['alamat'] = $inputAlamat;
					$success = $this->main_model->update_Lmahasiswa($kirimdata2, $user_id);
					
		 			if($success){
		 				$this->session->set_flashdata('sukses', 'Data berhasil diubah !!! Terimakasih ..');
		    		redirect('v_mahasiswa');
		 			}else{
		 				$this->session->set_flashdata('gagal', 'Data gagal diubah !!! Terimakasih ..');
		    		redirect('v_mahasiswa');
		 			}
       	}
			}
		}

		function detail_mahasiswa($id_user){
			$data = array(
	      'data_mahasiswa' => $this->main_model->detail_mahasiswa($id_user)->result(),
	      'data_kelas_mhs' => $this->main_model->get_kelas_mhs($id_user)->result(),
	      'data_kelas_matkul' => $this->main_model->get_kelas_matkulBy($id_user)->result(),
	    );
			$this->load->view('admin/master_data/mahasiswa/detail_mahasiswa', $data);
		}

		function delete_mahasiswa($id_user){
      $this->main_model->hapus_mahasiswa($id_user);
	    redirect('v_mahasiswa');
  	}

  	function delete_mahasiswa_all(){
      $id_user = $this->input->post('pilih');
      $jumlah_dipilih = count($id_user);
      for($x=0;$x<$jumlah_dipilih;$x++){
      	$this->main_model->hapus_mahasiswa($id_user[$x]);
      }
      $this->session->set_flashdata('sukses', 'Data yang di pilih berhasil dihapus !!! Terimakasih ..');
	    redirect('v_mahasiswa');
  	}

  	//Asisten Dosen
		function v_asdos(){
			$data = array(
	      'data_asdos' => $this->main_model->get_all_asdos()->result(),
	    );
			$this->load->view('admin/kelengkapan/header');
			$this->load->view('admin/master_data/asdos/v_asdos', $data);
			$this->load->view('admin/kelengkapan/footer');
		}

		function save_asdos(){
			$this->form_validation->set_rules('inputNama','Input Nama Lengkap', 'required');
			$this->form_validation->set_rules('inputEmail','Input Email', 'required|valid_email');
			$this->form_validation->set_rules('inputUsername','Input Username', 'required|min_length[1]|max_length[25]');
			$this->form_validation->set_rules('inputPassword','Input Password', 'required|min_length[6]|max_length[15]');
			$this->form_validation->set_rules('inputTelepon','Input Telepon', 'required|max_length[15]');
			$this->form_validation->set_rules('akses','Pilih Akses', 'required');
	 		
	    if ($this->form_validation->run() == FALSE) { 
	      $this->session->set_flashdata('gagal', 'Coba cek lagi data input anda, kemungkinan terdapat kesalahan !!! Terimakasih ..');
		    redirect('v_asdos');
			}else{
				$config['upload_path'] = './assets/images/gambar_user/'; //path folder
     		$config['allowed_types'] = 'jpg|png|jpeg|bmp'; //type yang dapat diakses bisa anda sesuaikan
     		$config['encrypt_name'] = FALSE; //Enkripsi nama yang terupload

     		$this->upload->initialize($config);
  			if(!empty($_FILES['foto']['name'])){

          if ($this->upload->do_upload('foto')){
          	$gbr = $this->upload->data();
          	$file_gbr = str_replace(" ", "_", $gbr['file_name']);
            $config['image_library']='gd2';
            $config['source_image']='./assets/images/gambar_user/'.$file_gbr;
            $config['create_thumb']= FALSE;
            $config['maintain_ratio']= FALSE;
            $config['quality']= '50%';
            $config['width']= 200;
            $config['height']= 200;
            $config['new_image']= './assets/images/gambar_user/'.$file_gbr;
            $this->load->library('image_lib', $config);
            $this->image_lib->resize();
            $gambar = $file_gbr;
      		}
              
          $set = '123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
					$code = substr(str_shuffle($set), 0, 15);
      		$inputNama = $this->input->post('inputNama', true);
      		$inputUsername = $this->input->post('inputUsername', true);
      		$inputPassword = md5($this->input->post('inputPassword', true));
      		$inputCode = $code;
      		$akses = $this->input->post('akses');
      		if($akses == 2){
      			$inputTahun = $this->input->post('inputTahun');
      			$inputNpm = "0651".substr($inputTahun,2,4).$this->input->post('inputNpm', true);
						$kirimdata['tahun'] = $inputTahun;
      		}else if($akses == 4){
      			$inputNpm = $this->input->post('inputNomorinduk', true);
      		}
					$kirimdata['nama'] = $inputNama;
					$kirimdata['npm'] = $inputNpm;
					$kirimdata['username'] = $inputUsername;
					$kirimdata['password'] = $inputPassword;
					$kirimdata['code'] = $code;
					$kirimdata['akses'] = $akses;
					$kirimdata['gambar'] = $gambar;
					$kirimdata['status'] = "1";
					$this->main_model->insert_asdos($kirimdata);

					$cek_user = $this->db->query("SELECT * FROM tbl_user ORDER BY id_user DESC LIMIT 1")->result();			
					foreach($cek_user as $hasil){
					  $id_user = $hasil->id_user;
		      }
      		$inputTempat = $this->input->post('inputTempat');
      		$inputTgl = date("Y-m-d",strtotime($this->input->post('inputTgl')));
      		$jk = $this->input->post('jk');
      		$agama = $this->input->post('agama');
      		$inputEmail = $this->input->post('inputEmail');
      		$inputTelepon = $this->input->post('inputTelepon');
      		$inputAlamat = $this->input->post('inputAlamat');
		
      		if($inputTgl == "1970-01-01"){
      			$tanggal = "0000-00-00";
      		}else{
      			$tanggal = $inputTgl;
      		}

					$kirimdata2['id_user'] = $id_user;
					$kirimdata2['tempat'] = $inputTempat;
					$kirimdata2['tgl_lahir'] = $tanggal;
					$kirimdata2['jk'] = $jk;
					$kirimdata2['agama'] = $agama;
					$kirimdata2['email'] = $inputEmail;
					$kirimdata2['nama_ayah'] = "-";
					$kirimdata2['nama_ibu'] = "-";
					$kirimdata2['telp'] = $inputTelepon;
					$kirimdata2['alamat'] = $inputAlamat;
					$success = $this->main_model->insert_Lasdos($kirimdata2);
					
		 			if($success){
		 				$this->session->set_flashdata('sukses', 'Data berhasil disimpan !!! Terimakasih ..');
		    		redirect('v_asdos');
		 			}else{
		 				$this->session->set_flashdata('gagal', 'Data gagal disimpan !!! Terimakasih ..');
		    		redirect('v_asdos');
		 			}
       	}else{
        	$set = '123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
					$code = substr(str_shuffle($set), 0, 15);
      		$inputNama = $this->input->post('inputNama', true);
      		$inputUsername = $this->input->post('inputUsername', true);
      		$inputPassword = md5($this->input->post('inputPassword', true));
      		$inputCode = $code;
      		$akses = $this->input->post('akses');
      		if($akses == 2){
      			$inputTahun = $this->input->post('inputTahun');
      			$inputNpm = "0651".substr($inputTahun,2,4).$this->input->post('inputNpm', true);
						$kirimdata['tahun'] = $inputTahun;
      		}else if($akses == 4){
      			$inputNpm = $this->input->post('inputNomorinduk', true);
      		}
					$kirimdata['nama'] = $inputNama;
					$kirimdata['npm'] = $inputNpm;
					$kirimdata['username'] = $inputUsername;
					$kirimdata['password'] = $inputPassword;
					$kirimdata['code'] = $code;
					$kirimdata['akses'] = $akses;
					$kirimdata['status'] = "1";
					$this->main_model->insert_asdos($kirimdata);

					$cek_user = $this->db->query("SELECT * FROM tbl_user ORDER BY id_user DESC LIMIT 1")->result();			
					foreach($cek_user as $hasil){
					  $id_user = $hasil->id_user;
		      }
      		$inputTempat = $this->input->post('inputTempat');
      		$inputTgl = date("Y-m-d",strtotime($this->input->post('inputTgl')));
      		$jk = $this->input->post('jk');
      		$agama = $this->input->post('agama');
      		$inputEmail = $this->input->post('inputEmail');
      		$inputTelepon = $this->input->post('inputTelepon');
      		$inputAlamat = $this->input->post('inputAlamat');
		
      		if($inputTgl == "1970-01-01"){
      			$tanggal = "0000-00-00";
      		}else{
      			$tanggal = $inputTgl;
      		}

					$kirimdata2['id_user'] = $id_user;
					$kirimdata2['tempat'] = $inputTempat;
					$kirimdata2['tgl_lahir'] = $tanggal;
					$kirimdata2['jk'] = $jk;
					$kirimdata2['agama'] = $agama;
					$kirimdata2['email'] = $inputEmail;
					$kirimdata2['nama_ayah'] = "-";
					$kirimdata2['nama_ibu'] = "-";
					$kirimdata2['telp'] = $inputTelepon;
					$kirimdata2['alamat'] = $inputAlamat;
					$success = $this->main_model->insert_Lasdos($kirimdata2);
					
		 			if($success){
		 				$this->session->set_flashdata('sukses', 'Data berhasil disimpan !!! Terimakasih ..');
		    		redirect('v_asdos');
		 			}else{
		 				$this->session->set_flashdata('gagal', 'Data gagal disimpan !!! Terimakasih ..');
		    		redirect('v_asdos');
		 			}
       	}
			}
		}

		function edit_asdos($id_user){
			$data = array(
	      'data_asdos' => $this->main_model->ubah_asdos($id_user)->result(),
	    );
			$this->load->view('admin/master_data/asdos/edit_asdos', $data);
		}

		function update_asdos(){
			$this->form_validation->set_rules('inputNama','Input Nama Lengkap', 'required');
			$this->form_validation->set_rules('inputEmail','Input Email', 'required|valid_email');
			$this->form_validation->set_rules('inputUsername','Input Username', 'required|min_length[1]|max_length[25]');
			$this->form_validation->set_rules('inputTelepon','Input Telepon', 'required|max_length[15]');
			$this->form_validation->set_rules('level','Pilih Akses', 'required');
	 		
	    if ($this->form_validation->run() == FALSE) { 
	    	$this->session->set_flashdata('gagal', 'Coba cek lagi data input anda, kemungkinan terdapat kesalahan !!! Terimakasih ..');
		    redirect('v_asdos');
			}else{
				$config['upload_path'] = './assets/images/gambar_user/'; //path folder
       	$config['allowed_types'] = 'jpg|png|jpeg|bmp'; //type yang dapat diakses bisa anda sesuaikan
       	$config['encrypt_name'] = FALSE; //Enkripsi nama yang terupload

       	$this->upload->initialize($config);
    		if(!empty($_FILES['foto']['name'])){

          if ($this->upload->do_upload('foto')){
          	$gbr = $this->upload->data();
          	$file_gbr = str_replace(" ", "_", $gbr['file_name']);
            $config['image_library']='gd2';
            $config['source_image']='./assets/images/gambar_user/'.$file_gbr;
            $config['create_thumb']= FALSE;
            $config['maintain_ratio']= FALSE;
            $config['quality']= '50%';
            $config['width']= 200;
            $config['height']= 200;
            $config['new_image']= './assets/images/gambar_user/'.$file_gbr;
            $this->load->library('image_lib', $config);
            $this->image_lib->resize();
            $gambar = $file_gbr;
      		}

      		$user_id = $this->input->post('user_id');
      		$inputNama = $this->input->post('inputNama', true);
      		$inputUsername = $this->input->post('inputUsername', true);
      		if(empty($this->input->post('inputPassword1'))){
      			$inputPassword = $this->input->post('inputPassword', true);
      		}else{
      			$inputPassword = md5($this->input->post('inputPassword1', true)); 
      		}
      		$akses = $this->input->post('level');
      		$status = $this->input->post('kondisi');
      		if($akses == 2 || $akses == 3){
      			$inputTahun = $this->input->post('inputTahun');
      			$inputNpm = $this->input->post('inputNpm', true);
      			$npm = "0651".substr($inputTahun,2,4).$inputNpm;
						$kirimdata['npm'] = $npm;
						$kirimdata['tahun'] = $inputTahun;
      		}elseif($akses == 4){
      			$inputNomorinduk = $this->input->post('inputNomorinduk', true);
						$kirimdata['npm'] = $inputNomorinduk;
      		}
					$kirimdata['nama'] = $inputNama;
					$kirimdata['username'] = $inputUsername;
					$kirimdata['password'] = $inputPassword;
					$kirimdata['akses'] = $akses;
					$lihat = $this->input->post('lihat');
					if($lihat != 1){
						$kirimdata['gambar'] = $gambar;
					}
					$kirimdata['status'] = $status;
					$this->main_model->update_asdos($kirimdata, $user_id);

      		$inputTempat = $this->input->post('inputTempat');
      		$inputTgl = date("Y-m-d",strtotime($this->input->post('inputTgl')));
      		$jk = $this->input->post('jk');
      		$agama = $this->input->post('agama');
      		$inputEmail = $this->input->post('inputEmail');
      		$inputNamaayah = $this->input->post('inputNamaayah');
      		$inputNamaibu = $this->input->post('inputNamaibu');
      		$inputTelepon = $this->input->post('inputTelepon');
      		$inputAlamat = $this->input->post('inputAlamat');
		
      		if($inputTgl == "1970-01-01"){
      			$tanggal = "0000-00-00";
      		}else{
      			$tanggal = $inputTgl;
      		}

					$kirimdata2['id_user'] = $user_id;
					$kirimdata2['tempat'] = $inputTempat;
					$kirimdata2['tgl_lahir'] = $tanggal;
					$kirimdata2['jk'] = $jk;
					$kirimdata2['agama'] = $agama;
					$kirimdata2['email'] = $inputEmail;
					$kirimdata2['nama_ayah'] = $inputNamaayah;
					$kirimdata2['nama_ibu'] = $inputNamaibu;
					$kirimdata2['telp'] = $inputTelepon;
					$kirimdata2['alamat'] = $inputAlamat;
					$success = $this->main_model->update_Lasdos($kirimdata2, $user_id);
					
		 			if($success){
		 				$this->session->set_flashdata('sukses', 'Data berhasil diubah !!! Terimakasih ..');
		    		redirect('v_asdos');
		 			}else{
		 				$this->session->set_flashdata('gagal', 'Data gagal diubah !!! Terimakasih ..');
		    		redirect('v_asdos');
		 			}
        }else{
      		$user_id = $this->input->post('user_id');
      		$inputNama = $this->input->post('inputNama', true);
      		$inputUsername = $this->input->post('inputUsername', true);
      		if(empty($this->input->post('inputPassword1'))){
      			$inputPassword = $this->input->post('inputPassword', true);
      		}else{
      			$inputPassword = md5($this->input->post('inputPassword1', true)); 
      		}
      		$akses = $this->input->post('level');
      		$status = $this->input->post('kondisi');
      		if($akses == 2){
      			$inputTahun = $this->input->post('inputTahun');
      			$inputNpm = $this->input->post('inputNpm', true);
      			$npm = "0651".substr($inputTahun,2,4).$inputNpm;
						$kirimdata['npm'] = $npm;
						$kirimdata['tahun'] = $inputTahun;
      		}elseif($akses == 4){
      			$inputNomorinduk = $this->input->post('inputNomorinduk', true);
						$kirimdata['npm'] = $inputNomorinduk;
      		}
					$kirimdata['nama'] = $inputNama;
					$kirimdata['username'] = $inputUsername;
					$kirimdata['password'] = $inputPassword;
					$kirimdata['akses'] = $akses;
					$lihat = $this->input->post('lihat');
					if($lihat != 1){
						$kirimdata['gambar'] = '';
					}
					$kirimdata['status'] = $status;
					$this->main_model->update_asdos($kirimdata, $user_id);

      		$inputTempat = $this->input->post('inputTempat');
      		$inputTgl = date("Y-m-d",strtotime($this->input->post('inputTgl')));
      		$jk = $this->input->post('jk');
      		$agama = $this->input->post('agama');
      		$inputEmail = $this->input->post('inputEmail');
      		$inputNamaayah = $this->input->post('inputNamaayah');
      		$inputNamaibu = $this->input->post('inputNamaibu');
      		$inputTelepon = $this->input->post('inputTelepon');
      		$inputAlamat = $this->input->post('inputAlamat');
		
      		if($inputTgl == "1970-01-01"){
      			$tanggal = "0000-00-00";
      		}else{
      			$tanggal = $inputTgl;
      		}

					$kirimdata2['id_user'] = $user_id;
					$kirimdata2['tempat'] = $inputTempat;
					$kirimdata2['tgl_lahir'] = $tanggal;
					$kirimdata2['jk'] = $jk;
					$kirimdata2['agama'] = $agama;
					$kirimdata2['email'] = $inputEmail;
					$kirimdata2['nama_ayah'] = $inputNamaayah;
					$kirimdata2['nama_ibu'] = $inputNamaibu;
					$kirimdata2['telp'] = $inputTelepon;
					$kirimdata2['alamat'] = $inputAlamat;
					$success = $this->main_model->update_Lasdos($kirimdata2, $user_id);
					
		 			if($success){
		 				$this->session->set_flashdata('sukses', 'Data berhasil diubah !!! Terimakasih ..');
		    		redirect('v_asdos');
		 			}else{
		 				$this->session->set_flashdata('gagal', 'Data gagal diubah !!! Terimakasih ..');
		    		redirect('v_asdos');
		 			}
        }
			}
		}

		function detail_asdos($id_user){
			$data = array(
	      'data_asdos' => $this->main_model->detail_asdos($id_user)->result(),
	      'data_kelas_matkul' => $this->main_model->get_kelas_matkulBy($id_user)->result(),
	    );
			$this->load->view('admin/master_data/asdos/detail_asdos', $data);
		}

		function delete_asdos($id_user){
      $this->main_model->hapus_asdos($id_user);
	    redirect('v_asdos');
    }

  	function delete_asdos_all(){
      $id_user = $this->input->post('pilih');
      $jumlah_dipilih = count($id_user);
      for($x=0;$x<$jumlah_dipilih;$x++){
      	$this->main_model->hapus_asdos($id_user[$x]);
      }
      $this->session->set_flashdata('sukses', 'Data yang di pilih berhasil dihapus !!! Terimakasih ..');
  	  redirect('v_asdos');
  	}

  	//Mata Kuliah
		function v_matkul(){
			$data = array(
	      'data_matkul' => $this->main_model->get_all_matkul()->result(),
	    );
			$this->load->view('admin/kelengkapan/header');
			$this->load->view('admin/master_data/matkul/v_matkul', $data);
			$this->load->view('admin/kelengkapan/footer');
		}

		function save_matkul(){
			$this->form_validation->set_rules('inputMatkul','Input Mata Kuliah', 'required');
			$this->form_validation->set_rules('semester','Pilih semester', 'required');
	 		
      if ($this->form_validation->run() == FALSE) { 
      	$this->session->set_flashdata('gagal', 'Coba cek lagi data input anda, kemungkinan terdapat kesalahan !!! Terimakasih ..');
    		redirect('v_matkul');
			}else{
        if(!empty($_FILES['modulfile']['name'])){
        	$fileasli = str_replace(" ", "_", $_FILES['modulfile']['name']);
        	$config['upload_path'] 		= './assets/images/file_modul/'; //path folder
			   	$config['allowed_types'] 	= 'pdf|doc|docx'; //type yang dapat diakses bisa anda sesuaikan
			   	$config['max_size']      	= 1024;  
          $config['file_name']      = $fileasli;
	        $this->load->library('upload', $config); 
        	$this->upload->initialize($config);
		    	if($this->upload->do_upload('modulfile')){
	      		$inputMatkul = $this->input->post('inputMatkul', true);
	      		$semester = $this->input->post('semester', true);
	      		$kirimdata['matkul'] = $inputMatkul;
						$kirimdata['semester'] = $semester;
						$kirimdata['file'] = $fileasli;
						$kirimdata['status'] = "1";
						$success = $this->main_model->insert_matkul($kirimdata);
						
			 			if($success){
			 				$this->session->set_flashdata('sukses', 'Data berhasil disimpan !!! Terimakasih ..');
			    		redirect('v_matkul');
			 			}else{
			 				$this->session->set_flashdata('gagal', 'Data gagal disimpan !!! Terimakasih ..');
			    		redirect('v_matkul');
			 			}
          }else{
			 			$this->session->set_flashdata('gagal', 'Modul gagal diupload !!! Terimakasih ..');
			    	redirect('v_matkul');
          }
       	}else{
        	$inputMatkul = $this->input->post('inputMatkul', true);
      		$semester = $this->input->post('semester', true);
      		$kirimdata['matkul'] = $inputMatkul;
					$kirimdata['semester'] = $semester;
					$kirimdata['file'] = '';
					$kirimdata['status'] = "1";
					$success = $this->main_model->insert_matkul($kirimdata);
					
		 			if($success){
		 				$this->session->set_flashdata('sukses', 'Data berhasil disimpan !!! Terimakasih ..');
		    		redirect('v_matkul');
		 			}else{
		 				$this->session->set_flashdata('gagal', 'Data gagal disimpan !!! Terimakasih ..');
		    		redirect('v_matkul');
		 			}
       	}
			}
		}

		function edit_matkul($id_matkul){
			$data = array(
	      'data_matkul' => $this->main_model->ubah_matkul($id_matkul)->result(),
	    );
			$this->load->view('admin/master_data/matkul/edit_matkul', $data);
		}

		function update_matkul(){
			$this->form_validation->set_rules('inputMatkul','Input Mata Kuliah', 'required');
			$this->form_validation->set_rules('semester','Pilih semester', 'required');
	 		
	    if ($this->form_validation->run() == FALSE) { 
	    	$this->session->set_flashdata('gagal', 'Coba cek lagi data input anda, kemungkinan terdapat kesalahan !!! Terimakasih ..');
		    redirect('v_matkul');
			}else{
				if(!empty($_FILES['modulfile']['name'])){
        	$fileasli = str_replace(" ", "_", $_FILES['modulfile']['name']);
        	$config['upload_path'] 		= './assets/images/file_modul/'; //path folder
			   	$config['allowed_types'] 	= 'pdf|doc|docx'; //type yang dapat diakses bisa anda sesuaikan
			   	$config['max_size']      	= 1024;  
          $config['file_name']      = $fileasli;
	        $this->load->library('upload', $config); 
        	$this->upload->initialize($config);
		    	if($this->upload->do_upload('modulfile')){
	      		$matkul_id = $this->input->post('matkul_id');
	      		$inputMatkul = $this->input->post('inputMatkul', true);
	      		$inputMatkul = $this->input->post('inputMatkul', true);
	      		$semester = $this->input->post('semester', true);
						$status = $this->input->post('kondisi');
	      		$kirimdata['matkul'] = $inputMatkul;
						$kirimdata['semester'] = $semester;
						$lihat = $this->input->post('lihat');
						if($lihat != 1){
							$kirimdata['file'] = $fileasli;
						}
						$kirimdata['status'] = $status;
						$success = $this->main_model->update_matkul($kirimdata, $matkul_id);
						
			 			if($success){
			 				$this->session->set_flashdata('sukses', 'Data berhasil disimpan !!! Terimakasih ..');
			    		redirect('v_matkul');
			 			}else{
			 				$this->session->set_flashdata('gagal', 'Data gagal disimpan !!! Terimakasih ..');
			    		redirect('v_matkul');
			 			}
          }else{
			 			$this->session->set_flashdata('gagal', 'Modul gagal diupload !!! Terimakasih ..');
			    	redirect('v_matkul');
          }
        }else{
      		$matkul_id = $this->input->post('matkul_id');
      		$inputMatkul = $this->input->post('inputMatkul', true);
      		$inputMatkul = $this->input->post('inputMatkul', true);
      		$semester = $this->input->post('semester', true);
					$status = $this->input->post('kondisi');
      		$kirimdata['matkul'] = $inputMatkul;
					$kirimdata['semester'] = $semester;
					$lihat = $this->input->post('lihat');
					if($lihat != 1){
						$kirimdata['file'] = '';
					}
					$kirimdata['status'] = $status;
					$success = $this->main_model->update_matkul($kirimdata, $matkul_id);
					
		 			if($success){
		 				$this->session->set_flashdata('sukses', 'Data berhasil disimpan !!! Terimakasih ..');
		    		redirect('v_matkul');
		 			}else{
		 				$this->session->set_flashdata('gagal', 'Data gagal disimpan !!! Terimakasih ..');
		    		redirect('v_matkul');
		 			}
        }
			}
		}

		function detail_matkul($id_matkul){
			$data = array(
	      'data_matkul' => $this->main_model->detail_matkul($id_matkul)->result(),
	    );
			$this->load->view('admin/master_data/matkul/detail_matkul', $data);
		}

		function delete_matkul($id_matkul){
      $this->main_model->hapus_matkul($id_matkul);
	    redirect('v_matkul');
    }

  	function delete_matkul_all(){
      $id_matkul = $this->input->post('pilih');
      $jumlah_dipilih = count($id_matkul);
      for($x=0;$x<$jumlah_dipilih;$x++){
      	$this->main_model->hapus_matkul($id_matkul[$x]);
      }
      $this->session->set_flashdata('sukses', 'Data yang di pilih berhasil dihapus !!! Terimakasih ..');
  	  redirect('v_matkul');
  	}

  	function ambil_matkul_mahasiswa($id_user){
			$data = array(
	     	'data_mahasiswa' => $this->main_model->detail_mahasiswa($id_user)->result(),
	     	'data_kelas_mhs' => $this->main_model->get_kelas_mhs($id_user)->result(),
	    );
	    $this->load->view('admin/master_data/matkul/ambil_matkul', $data);
		}

		function save_ambil_matkul(){
			$this->form_validation->set_rules('inputNpm','Input Npm', 'required');
	 		
      if ($this->form_validation->run() == FALSE) { 
      	$this->session->set_flashdata('gagal', 'Coba cek lagi data input anda, kemungkinan terdapat kesalahan !!! Terimakasih ..');
    		redirect('v_mahasiswa');
			}else{
    		$inputNpm = $this->input->post('inputNpm', true);
    		$user_id = $this->input->post('user_id', true);
    		$semester = $this->input->post('semester', true);
    		//genap
    		$pambagisi = explode(" ",$this->input->post('si', true));
    		$pambagiorkom = explode(" ",$this->input->post('orkom', true));
    		$pambagisigit2 = explode(" ",$this->input->post('sigit2', true));
    		$pambagijarkom = explode(" ",$this->input->post('jarkom', true));
    		$pambagispm = explode(" ",$this->input->post('spm', true));
    		$pambagimobile = explode(" ",$this->input->post('mobile', true));
    		$pambagipython = explode(" ",$this->input->post('python', true));
    		$pambagikejar = explode(" ",$this->input->post('kejar', true));

    		$si = $pambagisi[0];
    		// $id_kelas_matkul_si = $pambagisi[1];
    		$orkom = $pambagiorkom[0];
    		// $id_kelas_matkul_orkom = $pambagiorkom[1];
    		$sigit2 = $pambagisigit2[0];
    		// $id_kelas_matkul_sigit2 = $pambagisigit2[1];
    		$jarkom = $pambagijarkom[0];
    		// $id_kelas_matkul_jarkom = $pambagijarkom[1];
    		$spm = $pambagispm[0];
    		// $id_kelas_matkul_spm = $pambagispm[1];
    		$mobile = $pambagimobile[0];
    		// $id_kelas_matkul_mobile = $pambagimobile[1];
    		$python = $pambagipython[0];
    		// $id_kelas_matkul_python = $pambagipython[1];
    		$kejar = $pambagikejar[0];
    		// $id_kelas_matkul_kejar = $pambagikejar[1];

    		//ganjil
    		$pambagielektronika = explode(" ",$this->input->post('elektronika', true));
    		$pambagisigit1 = explode(" ",$this->input->post('sigit1', true));
    		$pambagisismik = explode(" ",$this->input->post('sismik', true));
    		$pambagiiot = explode(" ",$this->input->post('iot', true));
    		$pambagiadminjar = explode(" ",$this->input->post('adminjar', true));
    		$pambagisim = explode(" ",$this->input->post('sim', true));
    		$pambagirobotik = explode(" ",$this->input->post('robotik', true));
    		
    		$elektronika = $pambagielektronika[0];
    		// $id_kelas_matkul_elektronika = $pambagielektronika[1];
    		$sigit1 = $pambagisigit1[0];
    		// $id_kelas_matkul_sigit1 = $pambagisigit1[1];
    		$sismik = $pambagisismik[0];
    		// $id_kelas_matkul_sismik = $pambagisismik[1];
    		$iot = $pambagiiot[0];
    		// $id_kelas_matkul_iot = $pambagiiot[1];
    		$adminjar = $pambagiadminjar[0];
    		// $id_kelas_matkul_adminjar = $pambagiadminjar[1];
    		$sim = $pambagisim[0];
    		// $id_kelas_matkul_sim = $pambagisim[1];
    		$robotik = $pambagirobotik[0];
    		// $id_kelas_matkul_robotik = $pambagirobotik[1];

    		if(empty($pambagisi[0])){$tambah1 = 0;}else{$tambah1 = 1;}
    		if(empty($pambagiorkom[0])){$tambah2 = 0;}else{$tambah2 = 1;}
    		if(empty($pambagielektronika[0])){$tambah3 = 0;}else{$tambah3 = 1;}
    		if(empty($pambagisigit1[0])){$tambah4 = 0;}else{$tambah4 = 1;}
    		if(empty($pambagijarkom[0])){$tambah5 = 0;}else{$tambah5 = 1;}
    		if(empty($pambagisigit2[0])){$tambah6 = 0;}else{$tambah6 = 1;}
    		if(empty($pambagisismik[0])){$tambah7 = 0;}else{$tambah7 = 1;}
    		if(empty($pambagiiot[0])){$tambah8 = 0;}else{$tambah8 = 1;}
    		if(empty($pambagiadminjar[0])){$tambah9 = 0;}else{$tambah9 = 1;}
    		if(empty($pambagispm[0])){$tambah10 = 0;}else{$tambah10 = 1;}
    		if(empty($pambagimobile[0])){$tambah11 = 0;}else{$tambah11 = 1;}
    		if(empty($pambagipython[0])){$tambah12 = 0;}else{$tambah12 = 1;}
    		if(empty($pambagikejar[0])){$tambah13 = 0;}else{$tambah13 = 1;}
    		if(empty($pambagisim[0])){$tambah14 = 0;}else{$tambah14 = 1;}
    		if(empty($pambagirobotik[0])){$tambah15 = 0;}else{$tambah15 = 1;}

    		if(empty($pambagisi[1])){$id_kelas_matkul_si = '';}else{$id_kelas_matkul_si = $pambagisi[1];}
    		if(empty($pambagiorkom[1])){$id_kelas_matkul_orkom = '';}else{$id_kelas_matkul_orkom = $pambagiorkom[1];}
    		if(empty($pambagielektronika[1])){$id_kelas_matkul_elektronika = '';}else{$id_kelas_matkul_elektronika = $pambagielektronika[1];}
    		if(empty($pambagisigit1[1])){$id_kelas_matkul_sigit1 = '';}else{$id_kelas_matkul_sigit1 = $pambagisigit1[1];}
    		if(empty($pambagijarkom[1])){$id_kelas_matkul_jarkom = '';}else{$id_kelas_matkul_jarkom = $pambagijarkom[1];}
    		if(empty($pambagisigit2[1])){$id_kelas_matkul_sigit2 = '';}else{$id_kelas_matkul_sigit2 = $pambagisigit2[1];}
    		if(empty($pambagisismik[1])){$id_kelas_matkul_sismik = '';}else{$id_kelas_matkul_sismik = $pambagisismik[1];}
    		if(empty($pambagiiot[1])){$id_kelas_matkul_iot = '';}else{$id_kelas_matkul_iot = $pambagiiot[1];}
    		if(empty($pambagiadminjar[1])){$id_kelas_matkul_adminjar = '';}else{$id_kelas_matkul_adminjar = $pambagiadminjar[1];}
    		if(empty($pambagispm[1])){$id_kelas_matkul_spm = '';}else{$id_kelas_matkul_spm = $pambagispm[1];}
    		if(empty($pambagimobile[1])){$id_kelas_matkul_mobile = '';}else{$id_kelas_matkul_mobile = $pambagimobile[1];}
    		if(empty($pambagipython[1])){$id_kelas_matkul_python = '';}else{$id_kelas_matkul_python = $pambagipython[1];}
    		if(empty($pambagikejar[1])){$id_kelas_matkul_kejar = '';}else{$id_kelas_matkul_kejar = $pambagikejar[1];}
    		if(empty($pambagisim[1])){$id_kelas_matkul_sim = '';}else{$id_kelas_matkul_sim = $pambagisim[1];}
    		if(empty($pambagirobotik[1])){$id_kelas_matkul_robotik = '';}else{$id_kelas_matkul_robotik = $pambagirobotik[1];}
    		// $total = $tambah1+$tambah2+$tambah3+$tambah4+$tambah5+$tambah6+$tambah7+$tambah8+$tambah9+$tambah10+$tambah11+$tambah12+$tambah13+$tambah14+$tambah15;

    		$kirimdata['id_user'] = $user_id;
				$kirimdata['sistem_instrumentasi'] = $si;
				$kirimdata['Organisasi_komputer'] = $orkom;
				$kirimdata['elektronika'] = $elektronika;
				$kirimdata['sistem_digital_1'] = $sigit1;
				$kirimdata['jaringan_komputer'] = $jarkom;
				$kirimdata['sistem_digital_2'] = $sigit2;
				$kirimdata['sistem_mikroprosesor'] = $sismik;
				$kirimdata['otomasi'] = $iot;
				$kirimdata['administrasi_jaringan'] = $adminjar;
				$kirimdata['sistem_pemrograman_mikroprosesor'] = $spm;
				$kirimdata['mobile_programing'] = $mobile;
				$kirimdata['keamanan_jaringan'] = $kejar;
				$kirimdata['pemrograman_python'] = $python;
				$kirimdata['sistem_interface_mikrokontroler'] = $sim;
				$kirimdata['robotik'] = $robotik;
				$this->main_model->hapus_absensi_mhs($user_id);
	 			$this->main_model->hapus_nilai_mhs($user_id);
				if($semester == 2){
					$total = 8;
					$data_array = array($id_kelas_matkul_si,$id_kelas_matkul_orkom,$id_kelas_matkul_sigit2,$id_kelas_matkul_jarkom,$id_kelas_matkul_spm,$id_kelas_matkul_mobile,$id_kelas_matkul_python,$id_kelas_matkul_kejar);
				}elseif($semester == 1){
					$total = 7;
					$data_array = array($id_kelas_matkul_elektronika,$id_kelas_matkul_sigit1,$id_kelas_matkul_sismik,$id_kelas_matkul_iot,$id_kelas_matkul_adminjar,$id_kelas_matkul_sim,$id_kelas_matkul_robotik);
				}
				$cek_user = $this->db->query("SELECT * FROM tbl_kelas_mhs WHERE id_user='$user_id'")->num_rows();		
				if($cek_user>0){
					for($i=0;$i<$total;$i++){
	    			$kirimdata2['id_kelas_matkul'] = $data_array[$i];
	    			$kirimdata2['id_user'] = $user_id;
	    			if($data_array[$i] != 0){
			 				$this->main_model->insert_absensi_mhs($kirimdata2);
			 				$this->main_model->insert_nilai_mhs($kirimdata2);
			 			}
		 			}
					$success = $this->main_model->update_kelas_mhs($kirimdata, $user_id);
				}else{
					for($i=0;$i<$total;$i++){
	    			$kirimdata2['id_kelas_matkul'] = $data_array[$i];
	    			$kirimdata2['id_user'] = $user_id;
	    			if($data_array[$i] != 0){
			 				$this->main_model->insert_absensi_mhs($kirimdata2);
			 				$this->main_model->insert_nilai_mhs($kirimdata2);
			 			}
		 			}
					$success = $this->main_model->insert_kelas_mhs($kirimdata);
				}
				
	 			if($success){
	 				$this->session->set_flashdata('sukses', 'Data berhasil disimpan !!! Terimakasih ..');
	    		redirect('v_mahasiswa');
	 			}else{
	 				$this->session->set_flashdata('gagal', 'Data gagal disimpan !!! Terimakasih ..');
	    		redirect('v_mahasiswa');
	 			}
			}
		}

  	//Kelas Mata Kuliah
		function v_kelas_matkul(){
			$data = array(
	      'data_kelas_matkul' => $this->main_model->get_all_kelas_matkul()->result(),
	    );
			$this->load->view('admin/kelengkapan/header');
			$this->load->view('admin/master_data/kelas_matkul/v_kelas_matkul', $data);
			$this->load->view('admin/kelengkapan/footer');
		}

		function save_kelas_matkul(){
			$this->form_validation->set_rules('inputMatkul','Input Mata Kuliah', 'required');
			$this->form_validation->set_rules('inputKelas','Input Kelas', 'required');
			$this->form_validation->set_rules('lab','Pilih Laboratorium', 'required');
			$this->form_validation->set_rules('inputMaksmhs','Input Maksimal Mahasiswa', 'required');
			$this->form_validation->set_rules('inputHari','Input Hari', 'required');
			$this->form_validation->set_rules('inputMulai','Input Mulai Praktikum', 'required');
			$this->form_validation->set_rules('inputSelesai','Input Selesai Praktikum', 'required');
	 		
      if ($this->form_validation->run() == FALSE) { 
      	$this->session->set_flashdata('gagal', 'Coba cek lagi data input anda, kemungkinan terdapat kesalahan !!! Terimakasih ..');
    		redirect('v_kelas_matkul');
			}else{
    		$inputMatkul = $this->input->post('inputMatkul', true);
    		$inputKelas = $this->input->post('inputKelas', true);
    		$kodematkul = $this->input->post('kodematkul', true);
    		$data_explode = explode(" ", $kodematkul);
				foreach ($data_explode as $key => $value) {
					$sub_kalimat = substr($value,0,3);
					$hasil[$key] = $sub_kalimat;
				}
				$data_implode = implode("", $hasil);
				$kodekelas = $data_implode."-".$inputKelas;
    		$kelas = $kodematkul." ".$inputKelas;
    		$lab = $this->input->post('lab', true);
    		$inputMaksmhs = $this->input->post('inputMaksmhs', true);
    		$inputAsdos_1 = $this->input->post('inputAsdos_1', true);
    		$inputAsdos_2 = $this->input->post('inputAsdos_2', true);
    		if(empty($inputAsdos_2)){
    			$inputAsdos_2 = "0";
    		}
    		$inputHari = $this->input->post('inputHari', true);
    		$inputMulai = $this->input->post('inputMulai', true);
    		$inputSelesai = $this->input->post('inputSelesai', true);
    		$kirimdata['id_matkul'] = $inputMatkul;
				$kirimdata['kode'] = $kodekelas;
				$kirimdata['kelas'] = $kelas;
				$kirimdata['lab'] = $lab;
				$kirimdata['maks_mhs'] = $inputMaksmhs;
				$kirimdata['asdos_1'] = $inputAsdos_1;
				$kirimdata['asdos_2'] = $inputAsdos_2;
				$kirimdata['hari'] = $inputHari;
				$kirimdata['mulai_praktikum'] = $inputMulai.":00";
				$kirimdata['selesai_praktikum'] = $inputSelesai.":00";
				$kirimdata['status'] = "1";
				$success = $this->main_model->insert_kelas_matkul($kirimdata);
				
	 			if($success){
	 				$this->session->set_flashdata('sukses', 'Data berhasil disimpan !!! Terimakasih ..');
	    		redirect('v_kelas_matkul');
	 			}else{
	 				$this->session->set_flashdata('gagal', 'Data gagal disimpan !!! Terimakasih ..');
	    		redirect('v_kelas_matkul');
	 			}
			}
		}

		function edit_kelas_matkul($id_kelas_matkul){
			$data = array(
	      'data_kelas_matkul' => $this->main_model->ubah_kelas_matkul($id_kelas_matkul)->result(),
	    );
			$this->load->view('admin/master_data/kelas_matkul/edit_kelas_matkul', $data);
		}

		function update_kelas_matkul(){
			$this->form_validation->set_rules('inputMatkul','Input Mata Kuliah', 'required');
			$this->form_validation->set_rules('inputKelas','Input Kelas', 'required');
			$this->form_validation->set_rules('lab','Pilih Laboratorium', 'required');
			$this->form_validation->set_rules('inputMaksmhs','Input Maksimal Mahasiswa', 'required');
			$this->form_validation->set_rules('inputHari','Input Hari', 'required');
			$this->form_validation->set_rules('inputMulai','Input Mulai Praktikum', 'required');
			$this->form_validation->set_rules('inputSelesai','Input Selesai Praktikum', 'required');
	 		
	    if ($this->form_validation->run() == FALSE) { 
	    	$this->session->set_flashdata('gagal', 'Coba cek lagi data input anda, kemungkinan terdapat kesalahan !!! Terimakasih ..');
		    redirect('v_kelas_matkul');
			}else{
      	$kelas_matkul_id = $this->input->post('kelas_matkul_id');
      	$inputMatkul = $this->input->post('inputMatkul', true);
    		$inputKelas = $this->input->post('inputKelas', true);
    		$kodematkul = $this->input->post('kodematkul', true);
    		$data_explode = explode(" ", $kodematkul);
				foreach ($data_explode as $key => $value) {
					$sub_kalimat = substr($value,0,3);
					$hasil[$key] = $sub_kalimat;
				}
				$data_implode = implode("", $hasil);
				$kodekelas = $data_implode."-".$inputKelas;
    		$kelas = $kodematkul." ".$inputKelas;
    		$lab = $this->input->post('lab', true);
    		$inputMaksmhs = $this->input->post('inputMaksmhs', true);
    		$inputAsdos_1 = $this->input->post('inputAsdos_1', true);
    		$inputAsdos_2 = $this->input->post('inputAsdos_2', true);
    		if(empty($inputAsdos_2)){
    			$inputAsdos_2 = "0";
    		}
    		$inputHari = $this->input->post('inputHari', true);
    		$inputMulai = $this->input->post('inputMulai', true);
    		$inputSelesai = $this->input->post('inputSelesai', true);
    		$status = $this->input->post('kondisi', true);
    		$kirimdata['id_matkul'] = $inputMatkul;
				$kirimdata['kode'] = $kodekelas;
				$kirimdata['kelas'] = $kelas;
				$kirimdata['lab'] = $lab;
				$kirimdata['maks_mhs'] = $inputMaksmhs;
				$kirimdata['asdos_1'] = $inputAsdos_1;
				$kirimdata['asdos_2'] = $inputAsdos_2;
				$kirimdata['hari'] = $inputHari;
				$kirimdata['mulai_praktikum'] = $inputMulai.":00";
				$kirimdata['selesai_praktikum'] = $inputSelesai.":00";
				$kirimdata['status'] = $status;
				$success = $this->main_model->update_kelas_matkul($kirimdata, $kelas_matkul_id);
					
	 			if($success){
	 				$this->session->set_flashdata('sukses', 'Data berhasil disimpan !!! Terimakasih ..');
	    		redirect('v_kelas_matkul');
	 			}else{
	 				$this->session->set_flashdata('gagal', 'Data gagal disimpan !!! Terimakasih ..');
	    		redirect('v_kelas_matkul');
	 			}
			}
		}

		function delete_kelas_matkul($id_kelas_matkul){
      $this->main_model->hapus_kelas_matkul($id_kelas_matkul);
	    redirect('v_kelas_matkul');
    }

    function detail_kelas_matkul($id_kelas_matkul){
			$data = array(
	      'data_kelas_matkul' => $this->main_model->detail_kelas_matkul($id_kelas_matkul)->result(),
	    );
			$this->load->view('admin/master_data/kelas_matkul/detail_kelas_matkul', $data);
		}

  	function delete_kelas_matkul_all($id_kelas_matkul){
      $jumlah_dipilih = count($id_kelas_matkul);
      for($x=0;$x<$jumlah_dipilih;$x++){
      	$this->main_model->hapus_kelas_matkul($id_kelas_matkul[$x]);
      }
      $this->session->set_flashdata('sukses', 'Data yang di pilih berhasil dihapus !!! Terimakasih ..');
  	  redirect('v_kelas_matkul');
  	}

  	//Kelas Mahasiswa
		function v_kelas_mhs(){
			$data = array(
	      'data_kelas_mhs_reguler' => $this->main_model->get_all_kelas_mhs_reguler()->result(),
	      'data_kelas_mhs_malam' => $this->main_model->get_all_kelas_mhs_malam()->result(),
	    );
			$this->load->view('admin/kelengkapan/header');
			$this->load->view('admin/master_data/kelas_mhs/v_kelas_mhs', $data);
			$this->load->view('admin/kelengkapan/footer');
		}

		//Persentase Nilai
		function v_persentase_nilai(){
			$data = array(
	      'data_persentase_nilai' => $this->main_model->get_all_persentase_nilai()->result(),
	    );
			$this->load->view('admin/kelengkapan/header');
			$this->load->view('admin/master_data/persentase_nilai/v_persentase_nilai', $data);
			$this->load->view('admin/kelengkapan/footer');
		}

		function edit_persentase_nilai($id_persentase){
			$data = array(
	      'data_persentase_nilai' => $this->main_model->ubah_persentase_nilai($id_persentase)->result(),
	    );
			$this->load->view('admin/master_data/persentase_nilai/edit_persentase_nilai', $data);
		}

		function update_persentase_nilai(){
    	$persentase_id = $this->input->post('persentase_id');
    	$matkul_id = $this->input->post('matkul_id');
    	$inputAbsen = $this->input->post('inputAbsen')/100;
    	$inputKuis = $this->input->post('inputKuis')/100;
    	$inputTugas = $this->input->post('inputTugas')/100;
    	$inputUAP = $this->input->post('inputUAP')/100;
    	$inputTugasakhir = $this->input->post('inputTugasakhir')/100;
    	$jml = $inputAbsen + $inputKuis + $inputTugas + $inputUAP + $inputTugasakhir;
    	if($jml == 1){
	  		$kirimdata['id_matkul'] = $matkul_id;
				$kirimdata['absen'] = $inputAbsen;
				$kirimdata['kuis'] = $inputKuis;
				$kirimdata['tugas'] = $inputTugas;
				$kirimdata['uap'] = $inputUAP;
				$kirimdata['tugasakhir'] = $inputTugasakhir;
				$success = $this->main_model->update_persentase_nilai($kirimdata, $persentase_id);
				
	 			if($success){
	 				$this->session->set_flashdata('sukses', 'Data berhasil disimpan !!! Terimakasih ..');
	    		redirect('v_persentase_nilai');
	 			}else{
	 				$this->session->set_flashdata('gagal', 'Data gagal disimpan !!! Terimakasih ..');
	    		redirect('v_persentase_nilai');
	 			}
	 		}elseif($jml < 1){
	 			$this->session->set_flashdata('gagal', 'Total Persentase Nilai kurang dari 100%');
	    	redirect('v_persentase_nilai');
	 		}elseif($jml > 1){
	 			$this->session->set_flashdata('gagal', 'Total Persentase Nilai lebih dari 100%');
	    	redirect('v_persentase_nilai');
	 		}
		}

		//Qrcode
		function GetKelas(){
			$getkelas = $this->main_model->get_kelas_matkulBY2($_GET['id_matkul'])->result();
			foreach ($getkelas as $value) {
				$data[] = array(
					"id_kelas_matkul" => $value->id_kelas_matkul,
					"kelas" => $value->kelas,
				);
			}
			echo json_encode($data);
		}

		function v_qrcode(){
			$data = array(
	      'data_qrcode' => $this->main_model->get_all_qrcode()->result(),
	    );
			$this->load->view('admin/kelengkapan/header');
			$this->load->view('admin/master_data/qrcode/v_qrcode', $data);
			$this->load->view('admin/kelengkapan/footer');
		}

		function save_qrcode(){
			$this->load->library('ciqrcode');
    	$inputMatkul = $this->input->post('inputMatkul');			
    	$getkelas = $this->main_model->get_kelas_matkulBY2($inputMatkul)->result();
			foreach ($getkelas as $value) {
				$qrcode = $this->main_model->get_all_qrcodeBY($value->kode)->num_rows();
				if($qrcode > 0) {
					$this->session->set_flashdata('gagal', 'Qrcode sudah di buat !!! Terimakasih ..');
    			redirect('v_qrcode');
				}else{
	    		$inputPertemuan = $this->input->post('inputPertemuan');		
					$kode = $value->kode;
					$nama_qrcode = $kode."-".$inputPertemuan;
					$qrcode_gbr = $nama_qrcode.".png";
					$data = array(
						"kode" => $kode,
						"pertemuan" => $inputPertemuan,
					);
					$result = json_encode($data);
					$config['cacheable']    = true;
	        $config['cachedir']     = './assets/';
	        $config['errorlog']     = './assets/';
	        $config['imagedir']     = './assets/images/imgqrcode/absen/';
	        $config['quality']      = true;
	        $config['size']         = '1024';
	        $config['black']        = array(224,255,255);
	        $config['white']        = array(70,130,180);
	        $this->ciqrcode->initialize($config);
	 
	        $params['data'] = $result;
	        $params['level'] = 'H';
	        $params['size'] = 10;
	        $params['savename'] = FCPATH.$config['imagedir'].$qrcode_gbr;
	        $this->ciqrcode->generate($params);

	        $kirimdata['kode'] = $kode;
	        $kirimdata['pertemuan'] = $inputPertemuan;
	        $kirimdata['nama_qrcode'] = $nama_qrcode;
	        $kirimdata['qrcode'] = $qrcode_gbr;
	        $kirimdata['id_kelas_matkul'] = $value->id_kelas_matkul;
	        $kirimdata['status'] = "1";
					$success = $this->main_model->insert_qrcode($kirimdata);
				}
			}
			if($success){
 				$this->session->set_flashdata('sukses', 'Data berhasil disimpan !!! Terimakasih ..');
    		redirect('v_qrcode');
 			}else{
 				$this->session->set_flashdata('gagal', 'Data gagal disimpan !!! Terimakasih ..');
    		redirect('v_qrcode');
 			}
		}

		function detail_qrcode($kode){
			$data = array(
	      'data_qrcode' => $this->main_model->get_all_qrcodeBY($kode)->result(),
	    );
			$this->load->view('admin/master_data/qrcode/detail_qrcode', $data);
		}

		function delete_qrcode_all(){
      $id_qrcode = $this->input->post('pilih');
      $jumlah_dipilih = count($id_qrcode);
      for($x=0;$x<$jumlah_dipilih;$x++){
      	$qrcode = $this->main_model->get_all_qrcodeBY2($id_qrcode[$x])->result_array();
      	unlink("assets/images/imgqrcode/absen/".$qrcode[0]['qrcode']);
      	$this->main_model->hapus_qrcode($id_qrcode[$x]);
      }
      $this->session->set_flashdata('sukses', 'Data yang di pilih berhasil dihapus !!! Terimakasih ..');
  	  redirect('v_qrcode');
  	}

  	//Session Akun
  	function v_session_akun(){
			$data = array(
	      'data_session_akun' => $this->main_model->get_all_session_akun()->result(),
	    );
			$this->load->view('admin/kelengkapan/header');
			$this->load->view('admin/master_data/session_akun/v_session_akun', $data);
			$this->load->view('admin/kelengkapan/footer');
		}

		function delete_session_akun_all(){
      $ip_address = $this->input->post('pilih');
      $jumlah_dipilih = count($ip_address);
      for($x=0;$x<$jumlah_dipilih;$x++){
      	$this->main_model->hapus_session_akun($ip_address[$x]);
      }
      $this->session->set_flashdata('sukses', 'Data yang di pilih berhasil dihapus !!! Terimakasih ..');
  	  redirect('v_qrcode');
  	}

  	//Absensi
  	function v_absensi(){
			$data = array(
	      'data_absensi' => $this->main_model->get_all_matkul()->result(),
	    );
			$this->load->view('admin/kelengkapan/header');
			$this->load->view('admin/proses_data/absensi/v_absensi', $data);
			$this->load->view('admin/kelengkapan/footer');
		}

  	function absen_kelas_matkul($id_matkul){
  		$data = array(
	      'data_absensi_kelas' => $this->main_model->get_kelas_matkulBY2($id_matkul),
	    );
			$this->load->view('admin/kelengkapan/header');
			$this->load->view('admin/proses_data/absensi/v_absensi_kelas', $data);
			$this->load->view('admin/kelengkapan/footer');	
  	}

  	function absen_kelas($id_kelas_matkul,$kode){
			$data = array(
	      'data_absensi' => $this->main_model->get_all_absen_mhs($id_kelas_matkul,$kode),
	    );
			$this->load->view('admin/kelengkapan/header');
			$this->load->view('admin/proses_data/absensi/v_absen', $data);
			$this->load->view('admin/kelengkapan/footer');
		}

		function edit_absen($id_user,$id_kelas_matkul){
			$data = array(
	      'data_absensi' => $this->main_model->ubah_absen_mhs($id_user,$id_kelas_matkul)->result(),
	    );
			$this->load->view('admin/proses_data/absensi/edit_absen', $data);
		}

		function update_absensi(){
    	$kelas_matkul_id = $this->input->post('kelas_matkul_id');
    	$user_id = $this->input->post('user_id');
    	$kode = $this->input->post('kode');
    	$inputAbsen1 = $this->input->post('inputAbsen1');
    	$inputAbsen2 = $this->input->post('inputAbsen2');
    	$inputAbsen3 = $this->input->post('inputAbsen3');
    	$inputAbsen4 = $this->input->post('inputAbsen4');
    	$inputAbsen5 = $this->input->post('inputAbsen5');
    	$inputAbsen6 = $this->input->post('inputAbsen6');
    	$inputAbsen7 = $this->input->post('inputAbsen7');
    	$inputAbsen8 = $this->input->post('inputAbsen8');
    	$inputAbsen9 = $this->input->post('inputAbsen9');
    	$inputAbsen10 = $this->input->post('inputAbsen10');
  		$kirimdata['a_1'] = $inputAbsen1;
  		$kirimdata['a_2'] = $inputAbsen2;
  		$kirimdata['a_3'] = $inputAbsen3;
  		$kirimdata['a_4'] = $inputAbsen4;
  		$kirimdata['a_5'] = $inputAbsen5;
  		$kirimdata['a_6'] = $inputAbsen6;
  		$kirimdata['a_7'] = $inputAbsen7;
  		$kirimdata['a_8'] = $inputAbsen8;
  		$kirimdata['a_9'] = $inputAbsen9;
  		$kirimdata['a_10'] = $inputAbsen10;
			$success = $this->main_model->update_absensi($kirimdata,$kelas_matkul_id,$user_id);
			
 			if($success){
 				$this->session->set_flashdata('sukses', 'Data berhasil disimpan !!! Terimakasih ..');
    		redirect('absen_kelas/'.$kelas_matkul_id."/".$kode);
 			}else{
 				$this->session->set_flashdata('gagal', 'Data gagal disimpan !!! Terimakasih ..');
    		redirect('absen_kelas/'.$kelas_matkul_id."/".$kode);
 			}
		}

		//Nilai
  	function v_penilaian(){
			$data = array(
	      'data_nilai' => $this->main_model->get_all_matkul()->result(),
	    );
			$this->load->view('admin/kelengkapan/header');
			$this->load->view('admin/proses_data/nilai/v_penilaian', $data);
			$this->load->view('admin/kelengkapan/footer');
		}

		function nilai_kelas_matkul($id_matkul){
  		$data = array(
	      'data_nilai_kelas' => $this->main_model->get_kelas_matkulBY2($id_matkul),
	    );
			$this->load->view('admin/kelengkapan/header');
			$this->load->view('admin/proses_data/nilai/v_nilai_kelas', $data);
			$this->load->view('admin/kelengkapan/footer');	
  	}

  	function nilai_kelas($id_kelas_matkul,$kode){
			$data = array(
	      'data_nilai' => $this->main_model->get_all_nilai_mhs($id_kelas_matkul,$kode),
	    );
			$this->load->view('admin/kelengkapan/header');
			$this->load->view('admin/proses_data/nilai/v_nilai', $data);
			$this->load->view('admin/kelengkapan/footer');
		}

		function edit_nilai($id_user,$id_kelas_matkul){
			$data = array(
	      'data_nilai' => $this->main_model->ubah_nilai_mhs($id_user,$id_kelas_matkul)->result(),
	    );
			$this->load->view('admin/proses_data/nilai/edit_nilai', $data);
		}

		function update_penilaian(){
    	$kelas_matkul_id = $this->input->post('kelas_matkul_id');
    	$user_id = $this->input->post('user_id');
    	$kode = $this->input->post('kode');
    	$inputTugas1 = $this->input->post('inputTugas1');
    	$inputTugas2 = $this->input->post('inputTugas2');
    	$inputTugas3 = $this->input->post('inputTugas3');
    	$inputTugas4 = $this->input->post('inputTugas4');
    	$inputTugas5 = $this->input->post('inputTugas5');
    	$inputKuis = $this->input->post('inputKuis');
    	$inputUAP = $this->input->post('inputUAP');
    	$inputTugasAkhir = $this->input->post('inputTugasAkhir');
  		$kirimdata['tugas1'] = $inputTugas1;
  		$kirimdata['tugas2'] = $inputTugas2;
  		$kirimdata['tugas3'] = $inputTugas3;
  		$kirimdata['tugas4'] = $inputTugas4;
  		$kirimdata['tugas5'] = $inputTugas5;
  		$kirimdata['kuis'] = $inputKuis;
  		$kirimdata['uap'] = $inputUAP;
  		$kirimdata['tugasakhir'] = $inputTugasAkhir;
			$success = $this->main_model->update_nilai($kirimdata,$kelas_matkul_id,$user_id);
			
 			if($success){
 				$this->session->set_flashdata('sukses', 'Data berhasil disimpan !!! Terimakasih ..');
    		redirect('nilai_kelas/'.$kelas_matkul_id."/".$kode);
 			}else{
 				$this->session->set_flashdata('gagal', 'Data gagal disimpan !!! Terimakasih ..');
    		redirect('nilai_kelas/'.$kelas_matkul_id."/".$kode);
 			}
		}
}