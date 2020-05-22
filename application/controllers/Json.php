<?php
defined('BASEPATH') or exit('No Direct script allowed');

class Json extends CI_Controller
{

    function __construct()
    {
        parent::__construct();
        $this->load->model('login_model');
        $this->load->model('main_model');
    }

    function json_login()
    {
        // $query = $this->db->get('tbl_biodata_admin');
        // $result = $query->result_array();
        // foreach($result as $rs){
        //     $json[] = $rs;
        // }
        // echo json_encode($json);

        $id_user = $this->session->userdata('ses_idlogin');
        $data = array(
            $user = $this->main_model->detail_user($id_user)->result(),
		    $kelas = $this->main_model->get_kelas_mhs($id_user)->result(),
            $kelasmatkul = $this->main_model->get_kelas_matkulBy($id_user),
        );
        foreach($data as $result){
            $json[] = $result;
        }
        echo json_encode($json);
    }
}
