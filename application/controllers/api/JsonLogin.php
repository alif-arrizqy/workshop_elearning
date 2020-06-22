<?php error_reporting(0) ?>
<?php
defined('BASEPATH') or exit('No Direct script allowed');

use Restserver\Libraries\REST_Controller;

require APPPATH . '/libraries/REST_Controller.php';

class JsonLogin extends REST_Controller
{

    function __construct()
    {
        parent::__construct();
        $this->load->model('login_model');
        $this->load->model('main_model');
    }


    function index_get()
    {
        // $id_user = $this->session->userdata('ses_idlogin');
        $username = $this->get('username');
        $password = $this->get('password');

        $cekauth = $this->login_model->auth_user($username, $password);
        if ($cekauth->num_rows() > 0) {
            $data = $cekauth->row_array();
            $biodatalengkapuser = $this->login_model->select_biodata_user($data['id_user']);
            foreach ($biodatalengkapuser as $hasil) {
                $email = $hasil->email;
            }
        } else {
            $this->response([
                'status' => FALSE,
                'message' => 'No users were found'
            ], REST_Controller::HTTP_NOT_FOUND);
        }

        if ($data = $cekauth->row_array()) {
            $val = $this->main_model->get_detail_user($data['id_user'])->result();
            foreach ($val as $value) {
                $hsl['id_user'] = $value->id_user;
                $hsl['npm'] = $value->npm;
                $hsl['nama'] = $value->nama;
                $hsl['username'] = $value->username;
                $hsl['password'] = $value->password;
                if (empty($value->tempat)) {
                    $hsl['tempat'] = "-";
                } else {
                    $hsl['tempat'] = $value->tempat;
                }
                if ($value->tgl_lahir == 0000 - 00 - 00) {
                    $hsl['tgl_lahir'] = "-";
                } else {
                    $hsl['tgl_lahir'] = $value->tgl_lahir;
                }
                if (empty($value->agama)) {
                    $hsl['agama'] = "-";
                } else {
                    $hsl['agama'] = $value->agama;
                }
                if (empty($value->gambar)) {
                    $hsl['gambar'] = "no_image";
                } else {
                    $hsl['gambar'] =  "http://workshopelearning.com/assets/images/gambar_user/" . $value->gambar;
                }
                if (empty($value->email)) {
                    $hsl['email'] = "-";
                } else {
                    $hsl['email'] = $value->email;
                }
                if (empty($value->telp)) {
                    $hsl['telp'] = "-";
                } else {
                    $hsl['telp'] = $value->telp;
                }
                if (empty($value->alamat)) {
                    $hsl['alamat'] = "-";
                } else {
                    $hsl['alamat'] = $value->alamat;
                }
            }
            // $hasil = array($hsl);

            // hide output null
            $this->response([
                'status' => TRUE,
                'data' => $hsl
            ], REST_Controller::HTTP_OK);
        } else {
            $this->response([
                'status' => FALSE,
                'message' => 'No users were found'
            ], REST_Controller::HTTP_NOT_FOUND);
        }
    }
}
