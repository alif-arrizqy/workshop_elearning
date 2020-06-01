<?php error_reporting(0) ?>
<?php
use Restserver\Libraries\REST_Controller;

defined('BASEPATH') or exit('No Direct script allowed');

require APPPATH . '/libraries/REST_Controller.php';
require APPPATH . '/libraries/Format.php';

class JsonUser extends REST_Controller
{

    function __construct()
    {
        parent::__construct();
        $this->load->model('login_model');
        $this->load->model('main_model');
    }

    function index_get() {
        // $id_user = $this->session->userdata('ses_idlogin');
        $id_user = $this->get('id_user');        
        if ($id_user === NULL) {
            $this->response([
                'status' => FALSE,
                'message' => 'No users were found'
            ], REST_Controller::HTTP_NOT_FOUND);
        } else {
            $data = array(
                $user = $this->main_model->get_detail_user($id_user)->result(),
            );
        }
        // hide output null
        $hasil = (object) array_filter((array) $data);
        if ($data) {
            $this->response([
                'status' => TRUE,
                'data' => $hasil
                // 'message' => 'id found'
            ], REST_Controller::HTTP_OK);
        } else {
            $this->response([
                'status' => FALSE,
                'message' => 'No users were found'
            ], REST_Controller::HTTP_NOT_FOUND);
        }
    }
}
