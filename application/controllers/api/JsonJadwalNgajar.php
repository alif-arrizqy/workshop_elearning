<?php error_reporting(0) ?>
<?php

use Restserver\Libraries\REST_Controller;

defined('BASEPATH') or exit('No Direct script allowed');

require APPPATH . '/libraries/REST_Controller.php';
require APPPATH . '/libraries/Format.php';

class JsonJadwalNgajar extends REST_Controller
{

    function __construct()
    {
        parent::__construct();
        $this->load->model('login_model');
        $this->load->model('main_model');
    }

    function index_get()
    {
        $id_user = $this->get('id_user');
        $password = $this->get('password');
        $cekauth = $this->main_model->auth_api_user($id_user, $password);
        $responsistem["jadwal_ngajar"] = array();
        $responsistem["status"] = "success";
        if ($cekauth->num_rows() > 0) {
            $data = $cekauth->row_array();
            $data_kelas_matkul = $this->main_model->get_jadwal_ngajar($data['id_user']);
            foreach ($data_kelas_matkul->result() as $row) {
                $val['kode'] = $row->kode;
                $val['kelas'] = $row->kelas;
                $val['hari'] = $row->hari;
                $val['mulai_praktikum'] = $row->mulai_praktikum;
                $val['selesai_praktikum'] = $row->selesai_praktikum;
                $kode = $row->kode;
                $asd1 = $row->asdos_1;
                $asd2 = $row->asdos_2;
                $asdos1 = $this->main_model->get_asdos1_iduser($asd1)->row_array();
                $asdos2 = $this->main_model->get_asdos1_iduser($asd2)->row_array();
                $val['asdos_1'] = $asdos1['nama'];
                $val['asdos_2'] = $asdos2['nama'];
                $gbr = $this->main_model->get_qrcode($kode)->row_array();
                $val['qrcode'] = $gbr['nama_qrcode'];
                if (empty($gbr['qrcode'])) {
                    $val['image'] = null;
                } else {
                    $val['image'] = "http://workshopelearning.com/assets/images/imgqrcode/absen/" . $gbr['qrcode'];
                }
                array_push($responsistem["jadwal_ngajar"], $val);
                $this->response($responsistem);
            }
        } else {
            $this->response([
                'status' => FALSE,
                'message' => 'ID user or Password is not found!'
            ], REST_Controller::HTTP_NOT_FOUND);
        }
    }
}
