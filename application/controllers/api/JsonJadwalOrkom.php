<?php error_reporting(0) ?>
<?php

use Restserver\Libraries\REST_Controller;

defined('BASEPATH') or exit('No Direct script allowed');

require APPPATH . '/libraries/REST_Controller.php';
require APPPATH . '/libraries/Format.php';

class JsonJadwalOrkom extends REST_Controller
{

    function __construct()
    {
        parent::__construct();
        $this->load->model('main_model');
    }

    function index_get()
    {
        date_default_timezone_set('Asia/Jakarta');
        $day = date('l');
        if ($day == "Sunday") {
            $hari = "Minggu";
        } elseif ($day == "Monday") {
            $hari = "Senin";
        } elseif ($day == "Tuesday") {
            $hari = "Selasa";
        } elseif ($day == "Wednesday") {
            $hari = "Rabu";
        } elseif ($day == "Thursday") {
            $hari = "Kamis";
        } elseif ($day == "Friday") {
            $hari = "Jum'at";
        } elseif ($day == "Saturday") {
            $hari = "Sabtu";
        }
        $jadwalorkom = $this->main_model->lab_orkom($hari)->result();
        if (empty($jadwalorkom)) {
            $this->response([
                'status' => FALSE,
                'message' => 'Tidak Ada Jadwal Praktikum'
            ], REST_Controller::HTTP_NOT_FOUND);
        } else {
            $this->response([
                'status' => TRUE,
                'data' => $jadwalorkom
            ], REST_Controller::HTTP_OK);
        }
    }
}
