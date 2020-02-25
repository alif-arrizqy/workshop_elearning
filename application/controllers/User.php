<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User extends CI_Controller {

	function __construct(){
		parent::__construct();
		$this->load->model('main_model');
    $this->load->library('upload');
    if($this->session->userdata('masuk') != TRUE){
			$url=base_url();
			$this->session->set_flashdata('msg', 'Anda tidak boleh masuk Dashboard, silahkan login terlebih dahulu !!');
			redirect('loginelearningUser');
		}
	}

	function index(){
		$id_user = $this->session->userdata('ses_idlogin');
		$data = array(
			'data_user' => $this->main_model->detail_user($id_user)->result(),
			'data_kelas_mhs' => $this->main_model->get_kelas_mhs($id_user)->result(),
  	  'data_kelas_matkul' => $this->main_model->get_kelas_matkulBy($id_user),
	  );
		$this->load->view('user/kelengkapan/header');
		$this->load->view('user/profile', $data);
		$this->load->view('user/kelengkapan/footer');
	}

	function tampildata_user($kondisi_data,$id_user){
    $kirimdata['kondisi_data'] = $kondisi_data;
		$this->main_model->update_profiltampildata_user($kirimdata, $id_user);
    redirect('dashboard_user');
	}

	function ubah_profil_user($id_user){
		$data = array(
  	  'data_user' => $this->main_model->ubah_user($id_user)->result(),
    );
		$this->load->view('user/ubah_profil', $data);
	}

	function update_user_dahsboard(){
		$this->form_validation->set_rules('inputNama','Input Nama Lengkap', 'required');
		$this->form_validation->set_rules('inputEmail','Input Email', 'required|valid_email');
		$this->form_validation->set_rules('inputUsername','Input Username', 'required|min_length[1]|max_length[25]');
		$this->form_validation->set_rules('inputTelepon','Input Telepon', 'required|max_length[15]');
 		
    if ($this->form_validation->run() == FALSE) { 
    	$this->session->set_flashdata('gagal', 'Coba cek lagi data input anda, kemungkinan terdapat kesalahan !!! Terimakasih ..');
  		redirect('dashboard_user');
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
    		$akses = $this->input->post('akses');
    		if($akses == 1 || $akses == 2 || $akses == 3){
    			$inputTahun = $this->input->post('inputTahun');
    			$inputNpm = $this->input->post('inputNpm');
    			$npm = "0651".substr($inputTahun,2,4).$inputNpm;
    			$kirimdata['tahun'] = $inputTahun;
    			$kirimdata['npm'] = $npm;
        }elseif($akses == 4){
    			$inputNomorinduk = $this->input->post('inputNomorinduk');
    			$kirimdata['npm'] = $inputNomorinduk;
        }
    		$inputUsername = $this->input->post('inputUsername', true);
    		$inputNama = $this->input->post('inputNama');
    		if(!empty($this->input->post('inputPassword'))){
    			$inputPassword = md5($this->input->post('inputPassword', true)); 
					$kirimdata['password'] = $inputPassword;
    		}
				$lihat = $this->input->post('lihat');
				$jenis = $this->input->post('jenis');
				if($lihat != 1){
					$kirimdata['gambar'] = $gambar;
				}
				$kirimdata['nama'] = $inputNama;
    		$kirimdata['username'] = $inputUsername;
    		$kirimdata['jenis'] = $jenis;
				$this->main_model->update_user($kirimdata, $user_id);

    		$inputEmail = $this->input->post('inputEmail');
    		$inputTempat = $this->input->post('inputTempat');
    		$inputTgl = date("Y-m-d",strtotime($this->input->post('inputTgl')));
    		$jk = $this->input->post('jk');
    		$agama = $this->input->post('agama');
    		$inputTelepon = $this->input->post('inputTelepon');
    		$inputNamaayah = $this->input->post('inputNamaayah');
      	$inputNamaibu = $this->input->post('inputNamaibu');
    		$inputAlamat = $this->input->post('inputAlamat');
		
    		if($inputTgl == "1970-01-01"){
    			$tanggal = "0000-00-00";
    		}else{
    			$tanggal = $inputTgl;
    		}

				$kirimdata2['tempat'] = $inputTempat;
				$kirimdata2['tgl_lahir'] = $tanggal;
				$kirimdata2['jk'] = $jk;
				$kirimdata2['agama'] = $agama;
				$kirimdata2['email'] = $inputEmail;
				$kirimdata2['telp'] = $npmlepon;
				$kirimdata2['nama_ayah'] = $inputNamaayah;
				$kirimdata2['nama_ibu'] = $inputNamaibu;
				$kirimdata2['alamat'] = $inputAlamat;
				$success = $this->main_model->update_Luser($kirimdata2, $user_id);
    		$this->session->set_userdata('masuk',TRUE);
        $this->session->set_userdata('ses_idlogin',$user_id);
		    $this->session->set_userdata('ses_name',$inputNama);
        $this->session->set_userdata('ses_username',$inputUsername);
        $this->session->set_userdata('ses_email',$inputEmail);
        $this->session->set_userdata('ses_foto',$gambar);
				
	 			if($success){
	 				$this->session->set_flashdata('sukses', 'Data berhasil diubah !!! Terimakasih ..');
	    		redirect('dashboard_user');
	 			}else{
	 				$this->session->set_flashdata('gagal', 'Data gagal diubah !!! Terimakasih ..');
	    			redirect('dashboard_user');
	 			}
    	}else{
    		$user_id = $this->input->post('user_id');
    		$akses = $this->input->post('akses');
    		if($akses == 1 || $akses == 2 || $akses == 3){
    			$inputTahun = $this->input->post('inputTahun');
    			$inputNpm = $this->input->post('inputNpm');
    			$npm = "0651".substr($inputTahun,2,4).$inputNpm;
    			$kirimdata['tahun'] = $inputTahun;
    			$kirimdata['npm'] = $npm;
        }elseif($akses == 4){
    			$inputNomorinduk = $this->input->post('inputNomorinduk');
    			$kirimdata['npm'] = $inputNomorinduk;
        }
    		$inputUsername = $this->input->post('inputUsername', true);
    		$inputNama = $this->input->post('inputNama');
    		if(!empty($this->input->post('inputPassword'))){
    			$inputPassword = md5($this->input->post('inputPassword', true)); 
					$kirimdata['password'] = $inputPassword;
    		}
				$lihat = $this->input->post('lihat');
				$jenis = $this->input->post('jenis');
				if($lihat != 1){
					$kirimdata['gambar'] = '';
				}
				$kirimdata['nama'] = $inputNama;
    		$kirimdata['username'] = $inputUsername;
    		$kirimdata['jenis'] = $jenis;
				$this->main_model->update_user($kirimdata, $user_id);

    		$inputEmail = $this->input->post('inputEmail');
    		$inputTempat = $this->input->post('inputTempat');
    		$inputTgl = date("Y-m-d",strtotime($this->input->post('inputTgl')));
    		$jk = $this->input->post('jk');
    		$agama = $this->input->post('agama');
    		$inputTelepon = $this->input->post('inputTelepon');
    		$inputNamaayah = $this->input->post('inputNamaayah');
      	$inputNamaibu = $this->input->post('inputNamaibu');
    		$inputAlamat = $this->input->post('inputAlamat');
		
    		if($inputTgl == "1970-01-01"){
    			$tanggal = "0000-00-00";
    		}else{
    			$tanggal = $inputTgl;
    		}

				$kirimdata2['tempat'] = $inputTempat;
				$kirimdata2['tgl_lahir'] = $tanggal;
				$kirimdata2['jk'] = $jk;
				$kirimdata2['agama'] = $agama;
				$kirimdata2['email'] = $inputEmail;
				$kirimdata2['telp'] = $inputTelepon;
				$kirimdata2['nama_ayah'] = $inputNamaayah;
				$kirimdata2['nama_ibu'] = $inputNamaibu;
				$kirimdata2['alamat'] = $inputAlamat;
				$success = $this->main_model->update_Luser($kirimdata2, $user_id);
    		$this->session->set_userdata('masuk',TRUE);
        $this->session->set_userdata('ses_idlogin',$user_id);
		    $this->session->set_userdata('ses_name',$inputNama);
        $this->session->set_userdata('ses_username',$inputUsername);
        $this->session->set_userdata('ses_email',$inputEmail);
        $this->session->set_userdata('ses_foto',$gambar);
				
	 			if($success){
	 				$this->session->set_flashdata('sukses', 'Data berhasil diubah !!! Terimakasih ..');
	    		redirect('dashboard_user');
	 			}else{
	 				$this->session->set_flashdata('gagal', 'Data gagal diubah !!! Terimakasih ..');
	    			redirect('dashboard_user');
	 			}
    	}
		}
	}

	function lihat_nilai_matkul($id_kelas_matkul,$id_user){
		$data = array(
  	  'data_absensi' => $this->main_model->get_all_absen_mhsBY($id_kelas_matkul,$id_user)->result_array(),
  	  'data_nilai' => $this->main_model->get_all_nilai_mhsBY($id_kelas_matkul,$id_user)->result_array(),
    );
		$this->load->view('user/kelengkapan/header');
		$this->load->view('user/lihatnilai', $data);
		$this->load->view('user/kelengkapan/footer');
	}

	function lihat_ajar($id_kelas_matkul,$kode){
		$data = array(
      'data_absensi' => $this->main_model->get_all_absen_mhs($id_kelas_matkul,$kode),
      'data_nilai' => $this->main_model->get_all_nilai_mhs($id_kelas_matkul,$kode),
    );
		$this->load->view('user/kelengkapan/header');
		$this->load->view('user/v_absennilai', $data);
		$this->load->view('user/kelengkapan/footer');
	}

	function edit_absen_user($id_user,$id_kelas_matkul){
		$data = array(
      'data_absensi' => $this->main_model->ubah_absen_mhs($id_user,$id_kelas_matkul)->result(),
    );
		$this->load->view('user/edit_absen', $data);
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
		redirect('lihat_ajar/'.$kelas_matkul_id."/".$kode);
		}else{
			$this->session->set_flashdata('gagal', 'Data gagal disimpan !!! Terimakasih ..');
		redirect('lihat_ajar/'.$kelas_matkul_id."/".$kode);
		}
	}

	function edit_nilai_user($id_user,$id_kelas_matkul){
		$data = array(
      'data_nilai' => $this->main_model->ubah_nilai_mhs($id_user,$id_kelas_matkul)->result(),
    );
		$this->load->view('user/edit_nilai', $data);
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
		redirect('lihat_ajar/'.$kelas_matkul_id."/".$kode);
		}else{
			$this->session->set_flashdata('gagal', 'Data gagal disimpan !!! Terimakasih ..');
		redirect('lihat_ajar/'.$kelas_matkul_id."/".$kode);
		}
	}

	function ambil_matkul_mahasiswa_user($id_user){
		$data = array(
     	'data_mahasiswa' => $this->main_model->detail_mahasiswa($id_user)->result(),
     	'data_kelas_mhs' => $this->main_model->get_kelas_mhs($id_user)->result(),
    );
    $this->load->view('user/ambil_matkul', $data);
	}

	function save_ambil_matkul_user(){
		$this->form_validation->set_rules('inputNpm','Input Npm', 'required');
	 		
    if ($this->form_validation->run() == FALSE) { 
    	$this->session->set_flashdata('gagal', 'Coba cek lagi data input anda, kemungkinan terdapat kesalahan !!! Terimakasih ..');
  		redirect('dashboard_user');
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
  		$total = $tambah1+$tambah2+$tambah3+$tambah4+$tambah5+$tambah6+$tambah7+$tambah8+$tambah9+$tambah10+$tambah11+$tambah12+$tambah13+$tambah14+$tambah15;

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
    		redirect('dashboard_user');
 			}else{
 				$this->session->set_flashdata('gagal', 'Data gagal disimpan !!! Terimakasih ..');
    		redirect('dashboard_user');
 			}
		}
	}

	function hapusgambar_user($id_user){
    $kirimdata['gambar'] = '';
		$this->main_model->update_mahasiswa($kirimdata, $id_user);
    $this->session->set_userdata('ses_foto','');
    redirect('dashboard_user');
	}

	function v_asdos_user(){
		$data = array(
      'data_asdos' => $this->main_model->get_all_asdos()->result(),
    );
		$this->load->view('user/kelengkapan/header');
		$this->load->view('user/v_asdos', $data);
		$this->load->view('user/kelengkapan/footer');
	}
}