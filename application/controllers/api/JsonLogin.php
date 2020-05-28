<?php
use Restserver\Libraries\REST_Controller;

defined('BASEPATH') or exit('No Direct script allowed');

require APPPATH . '/libraries/REST_Controller.php';
require APPPATH . '/libraries/Format.php';

class JsonLogin extends REST_Controller
{

    function __construct()
    {
        parent::__construct();
        $this->load->model('login_model');
        $this->load->model('main_model');
    }


    function index_get(){
        // $id_user = $this->session->userdata('ses_idlogin');
        $username = $this->get('username');
        $password = $this->get('password');
        
        $cekauth = $this->login_model->auth_user($username, $password);
        if ($cekauth->num_rows() > 0){
            $data = $cekauth->row_array();
            $biodatalengkapuser = $this->login_model->select_biodata_user($data['id_user']);
				foreach ($biodatalengkapuser as $hasil) {
					$email = $hasil->email;
                }
                $this->session->set_userdata('ses_idlogin', $data['id_user']);
				$this->session->set_userdata('ses_name', $data['nama']);
				$this->session->set_userdata('ses_username', $data['username']);
				$this->session->set_userdata('ses_email', $email);
				$this->session->set_userdata('ses_foto', $data['gambar']);
				$this->session->set_userdata('ses_level', $data['akses']);
        } else {
            $this->response([
                'status' => FALSE,
                'message' => 'No users were found'
            ], REST_Controller::HTTP_NOT_FOUND);
        }

        if ($data = $cekauth->row_array()){
            $hasil = array(
                $user = $this->main_model->detail_user($data['id_user'])->result(),
                $kelas = $this->main_model->get_kelas_mhs($data['id_user'])->result(),
                $kelasmatkul = $this->main_model->get_kelas_matkulBy($data['id_user']),
            );
            // hide output null
            $hasil = (object) array_filter((array) $hasil);
            $this->response([
                'status' => TRUE,
                'data' => $hasil
                // 'message' => 'Login Success'
            ], REST_Controller::HTTP_OK);
        } else {
            $this->response([
                'status' => FALSE,
                'message' => 'No users were found'
            ], REST_Controller::HTTP_NOT_FOUND);
        }
    }
}
