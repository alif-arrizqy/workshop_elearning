<?php error_reporting(0) ?>
<?php

use Restserver\Libraries\REST_Controller;

defined('BASEPATH') or exit('No Direct script allowed');

require APPPATH . '/libraries/REST_Controller.php';
require APPPATH . '/libraries/Format.php';

class JsonAbsen extends REST_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('main_model');
    }

    function index_get()
    {
        $id_user = $_GET['id_user'];
        $password = $_GET['password'];
        $cekauth = $this->main_model->auth_api_user($id_user, $password);
        $responsistem["absen"] = array();
        $responsistem["status"] = "success";
        if ($cekauth->num_rows() > 0) {
            $data = $cekauth->row_array();
            $data_kelas_mhs = $this->main_model->get_kelas_mhs($data['id_user'])->result();
            foreach ($data_kelas_mhs as $hasil_kelas) :
                $sistem_instrumentasi = $hasil_kelas->sistem_instrumentasi;
                $organisasi_komputer = $hasil_kelas->organisasi_komputer;
                $elektronika = $hasil_kelas->elektronika;
                $sistem_digital_1 = $hasil_kelas->sistem_digital_1;
                $jaringan_komputer = $hasil_kelas->jaringan_komputer;
                $sistem_digital_2 = $hasil_kelas->sistem_digital_2;
                $sistem_mikroprosesor = $hasil_kelas->sistem_mikroprosesor;
                $otomasi = $hasil_kelas->otomasi;
                $administrasi_jaringan = $hasil_kelas->administrasi_jaringan;
                $sistem_pemrograman_mikroprosesor = $hasil_kelas->sistem_pemrograman_mikroprosesor;
                $mobile_programing = $hasil_kelas->mobile_programing;
                $keamanan_jaringan = $hasil_kelas->keamanan_jaringan;
                $pemrograman_python = $hasil_kelas->pemrograman_python;
                $sistem_interface_mikrokontroler = $hasil_kelas->sistem_interface_mikrokontroler;
                $robotik = $hasil_kelas->robotik;
            endforeach;
            if ($sistem_instrumentasi) {
                $matkul = $this->main_model->get_kelas_matkulBYKODE($sistem_instrumentasi)->result_array();
                $id_kelas_matkul = $matkul[0]['id_kelas_matkul'];
                $data_absensi = $this->main_model->get_all_absen_mhsBY($id_kelas_matkul, $id_user)->result_array();
                $hadir1['kelas'] = $matkul[0]['kelas'];
                if ($data_absensi[0]['a_1'] == 0) {
                    $hadir1['absen 1'] = "Tidak Hadir";
                } else {
                    $hadir1['absen 1'] = "Hadir";
                }
                if ($data_absensi[0]['a_2'] == 0) {
                    $hadir1['absen 2'] = "Tidak Hadir";
                } else {
                    $hadir1['absen 2'] = "Hadir";
                }
                if ($data_absensi[0]['a_3'] == 0) {
                    $hadir1['absen 3'] = "Tidak Hadir";
                } else {
                    $hadir1['absen 3'] = "Hadir";
                }
                if ($data_absensi[0]['a_4'] == 0) {
                    $hadir1['absen 4'] = "Tidak Hadir";
                } else {
                    $hadir1['absen 4'] = "Hadir";
                }
                if ($data_absensi[0]['a_5'] == 0) {
                    $hadir1['absen 5'] = "Tidak Hadir";
                } else {
                    $hadir1['absen 5'] = "Hadir";
                }
                if ($data_absensi[0]['a_6'] == 0) {
                    $hadir1['absen 6'] = "Tidak Hadir";
                } else {
                    $hadir1['absen 6'] = "Hadir";
                }
                if ($data_absensi[0]['a_7'] == 0) {
                    $hadir1['absen 7'] = "Tidak Hadir";
                } else {
                    $hadir1['absen 7'] = "Hadir";
                }
                if ($data_absensi[0]['a_8'] == 0) {
                    $hadir1['absen 8'] = "Tidak Hadir";
                } else {
                    $hadir1['absen 8'] = "Hadir";
                }
                if ($data_absensi[0]['a_9'] == 0) {
                    $hadir1['absen 9'] = "Tidak Hadir";
                } else {
                    $hadir1['absen 9'] = "Hadir";
                }
                if ($data_absensi[0]['a_10'] == 0) {
                    $hadir1['absen 10'] = "Tidak Hadir";
                } else {
                    $hadir1['absen 10'] = "Hadir";
                }
                // $data_sistem_instrumentasi = array(
                //     $hadir
                // );
            }
            if ($organisasi_komputer) {
                $matkul = $this->main_model->get_kelas_matkulBYKODE($organisasi_komputer)->result_array();
                $id_kelas_matkul = $matkul[0]['id_kelas_matkul'];
                $data_absensi = $this->main_model->get_all_absen_mhsBY($id_kelas_matkul, $id_user)->result_array();
                $hadir2['kelas'] = $matkul[0]['kelas'];
                if ($data_absensi[0]['a_1'] == 0) {
                    $hadir2['absen 1'] = "Tidak Hadir";
                } else {
                    $hadir2['absen 1'] = "Hadir";
                }
                if ($data_absensi[0]['a_2'] == 0) {
                    $hadir2['absen 2'] = "Tidak Hadir";
                } else {
                    $hadir2['absen 2'] = "Hadir";
                }
                if ($data_absensi[0]['a_3'] == 0) {
                    $hadir2['absen 3'] = "Tidak Hadir";
                } else {
                    $hadir2['absen 3'] = "Hadir";
                }
                if ($data_absensi[0]['a_4'] == 0) {
                    $hadir2['absen 4'] = "Tidak Hadir";
                } else {
                    $hadir2['absen 4'] = "Hadir";
                }
                if ($data_absensi[0]['a_5'] == 0) {
                    $hadir2['absen 5'] = "Tidak Hadir";
                } else {
                    $hadir2['absen 5'] = "Hadir";
                }
                if ($data_absensi[0]['a_6'] == 0) {
                    $hadir2['absen 6'] = "Tidak Hadir";
                } else {
                    $hadir2['absen 6'] = "Hadir";
                }
                if ($data_absensi[0]['a_7'] == 0) {
                    $hadir2['absen 7'] = "Tidak Hadir";
                } else {
                    $hadir2['absen 7'] = "Hadir";
                }
                if ($data_absensi[0]['a_8'] == 0) {
                    $hadir2['absen 8'] = "Tidak Hadir";
                } else {
                    $hadir2['absen 8'] = "Hadir";
                }
                if ($data_absensi[0]['a_9'] == 0) {
                    $hadir2['absen 9'] = "Tidak Hadir";
                } else {
                    $hadir2['absen 9'] = "Hadir";
                }
                if ($data_absensi[0]['a_10'] == 0) {
                    $hadir2['absen 10'] = "Tidak Hadir";
                } else {
                    $hadir2['absen 10'] = "Hadir";
                }
                //     $data_organisasi_komputer = array(
                //         $hadir
                //     );
            }
            if ($elektronika) {
                $matkul = $this->main_model->get_kelas_matkulBYKODE($elektronika)->result_array();
                $id_kelas_matkul = $matkul[0]['id_kelas_matkul'];
                $data_absensi = $this->main_model->get_all_absen_mhsBY($id_kelas_matkul, $id_user)->result_array();
                $hadir3['kelas'] = $matkul[0]['kelas'];
                if ($data_absensi[0]['a_1'] == 0) {
                    $hadir3['absen 1'] = "Tidak Hadir";
                } else {
                    $hadir3['absen 1'] = "Hadir";
                }
                if ($data_absensi[0]['a_2'] == 0) {
                    $hadir3['absen 2'] = "Tidak Hadir";
                } else {
                    $hadir3['absen 2'] = "Hadir";
                }
                if ($data_absensi[0]['a_3'] == 0) {
                    $hadir3['absen 3'] = "Tidak Hadir";
                } else {
                    $hadir3['absen 3'] = "Hadir";
                }
                if ($data_absensi[0]['a_4'] == 0) {
                    $hadir3['absen 4'] = "Tidak Hadir";
                } else {
                    $hadir3['absen 4'] = "Hadir";
                }
                if ($data_absensi[0]['a_5'] == 0) {
                    $hadir3['absen 5'] = "Tidak Hadir";
                } else {
                    $hadir3['absen 5'] = "Hadir";
                }
                if ($data_absensi[0]['a_6'] == 0) {
                    $hadir3['absen 6'] = "Tidak Hadir";
                } else {
                    $hadir3['absen 6'] = "Hadir";
                }
                if ($data_absensi[0]['a_7'] == 0) {
                    $hadir3['absen 7'] = "Tidak Hadir";
                } else {
                    $hadir3['absen 7'] = "Hadir";
                }
                if ($data_absensi[0]['a_8'] == 0) {
                    $hadir3['absen 8'] = "Tidak Hadir";
                } else {
                    $hadir3['absen 8'] = "Hadir";
                }
                if ($data_absensi[0]['a_9'] == 0) {
                    $hadir3['absen 9'] = "Tidak Hadir";
                } else {
                    $hadir3['absen 9'] = "Hadir";
                }
                if ($data_absensi[0]['a_10'] == 0) {
                    $hadir3['absen 10'] = "Tidak Hadir";
                } else {
                    $hadir3['absen 10'] = "Hadir";
                }
                //     $data_elektronika = array(
                //         $hadir
                //     );
            }
            if ($sistem_digital_1) {
                $matkul = $this->main_model->get_kelas_matkulBYKODE($sistem_digital_1)->result_array();
                $id_kelas_matkul = $matkul[0]['id_kelas_matkul'];
                $data_absensi = $this->main_model->get_all_absen_mhsBY($id_kelas_matkul, $id_user)->result_array();
                $hadir4['kelas'] = $matkul[0]['kelas'];
                if ($data_absensi[0]['a_1'] == 0) {
                    $hadir4['absen 1'] = "Tidak Hadir";
                } else {
                    $hadir4['absen 1'] = "Hadir";
                }
                if ($data_absensi[0]['a_2'] == 0) {
                    $hadir4['absen 2'] = "Tidak Hadir";
                } else {
                    $hadir4['absen 2'] = "Hadir";
                }
                if ($data_absensi[0]['a_3'] == 0) {
                    $hadir4['absen 3'] = "Tidak Hadir";
                } else {
                    $hadir4['absen 3'] = "Hadir";
                }
                if ($data_absensi[0]['a_4'] == 0) {
                    $hadir4['absen 4'] = "Tidak Hadir";
                } else {
                    $hadir4['absen 4'] = "Hadir";
                }
                if ($data_absensi[0]['a_5'] == 0) {
                    $hadir4['absen 5'] = "Tidak Hadir";
                } else {
                    $hadir4['absen 5'] = "Hadir";
                }
                if ($data_absensi[0]['a_6'] == 0) {
                    $hadir4['absen 6'] = "Tidak Hadir";
                } else {
                    $hadir4['absen 6'] = "Hadir";
                }
                if ($data_absensi[0]['a_7'] == 0) {
                    $hadir4['absen 7'] = "Tidak Hadir";
                } else {
                    $hadir4['absen 7'] = "Hadir";
                }
                if ($data_absensi[0]['a_8'] == 0) {
                    $hadir4['absen 8'] = "Tidak Hadir";
                } else {
                    $hadir4['absen 8'] = "Hadir";
                }
                if ($data_absensi[0]['a_9'] == 0) {
                    $hadir4['absen 9'] = "Tidak Hadir";
                } else {
                    $hadir4['absen 9'] = "Hadir";
                }
                if ($data_absensi[0]['a_10'] == 0) {
                    $hadir4['absen 10'] = "Tidak Hadir";
                } else {
                    $hadir4['absen 10'] = "Hadir";
                }
                //     $data_sistem_digital_1 = array(
                //         $hadir
                //     );
            }
            if ($jaringan_komputer) {
                $matkul = $this->main_model->get_kelas_matkulBYKODE($jaringan_komputer)->result_array();
                $id_kelas_matkul = $matkul[0]['id_kelas_matkul'];
                $data_absensi = $this->main_model->get_all_absen_mhsBY($id_kelas_matkul, $id_user)->result_array();
                $hadir5['kelas'] = $matkul[0]['kelas'];
                if ($data_absensi[0]['a_1'] == 0) {
                    $hadir5['absen 1'] = "Tidak Hadir";
                } else {
                    $hadir5['absen 1'] = "Hadir";
                }
                if ($data_absensi[0]['a_2'] == 0) {
                    $hadir5['absen 2'] = "Tidak Hadir";
                } else {
                    $hadir5['absen 2'] = "Hadir";
                }
                if ($data_absensi[0]['a_3'] == 0) {
                    $hadir5['absen 3'] = "Tidak Hadir";
                } else {
                    $hadir5['absen 3'] = "Hadir";
                }
                if ($data_absensi[0]['a_4'] == 0) {
                    $hadir5['absen 4'] = "Tidak Hadir";
                } else {
                    $hadir5['absen 4'] = "Hadir";
                }
                if ($data_absensi[0]['a_5'] == 0) {
                    $hadir5['absen 5'] = "Tidak Hadir";
                } else {
                    $hadir5['absen 5'] = "Hadir";
                }
                if ($data_absensi[0]['a_6'] == 0) {
                    $hadir5['absen 6'] = "Tidak Hadir";
                } else {
                    $hadir5['absen 6'] = "Hadir";
                }
                if ($data_absensi[0]['a_7'] == 0) {
                    $hadir5['absen 7'] = "Tidak Hadir";
                } else {
                    $hadir5['absen 7'] = "Hadir";
                }
                if ($data_absensi[0]['a_8'] == 0) {
                    $hadir5['absen 8'] = "Tidak Hadir";
                } else {
                    $hadir5['absen 8'] = "Hadir";
                }
                if ($data_absensi[0]['a_9'] == 0) {
                    $hadir5['absen 9'] = "Tidak Hadir";
                } else {
                    $hadir5['absen 9'] = "Hadir";
                }
                if ($data_absensi[0]['a_10'] == 0) {
                    $hadir5['absen 10'] = "Tidak Hadir";
                } else {
                    $hadir5['absen 10'] = "Hadir";
                }
                //     $data_jaringan_komputer = array(
                //         $hadir
                //     );
            }
            if ($sistem_digital_2) {
                $matkul = $this->main_model->get_kelas_matkulBYKODE($sistem_digital_2)->result_array();
                $id_kelas_matkul = $matkul[0]['id_kelas_matkul'];
                $data_absensi = $this->main_model->get_all_absen_mhsBY($id_kelas_matkul, $id_user)->result_array();
                $hadir6['kelas'] = $matkul[0]['kelas'];
                if ($data_absensi[0]['a_1'] == 0) {
                    $hadir6['absen 1'] = "Tidak Hadir";
                } else {
                    $hadir6['absen 1'] = "Hadir";
                }
                if ($data_absensi[0]['a_2'] == 0) {
                    $hadir6['absen 2'] = "Tidak Hadir";
                } else {
                    $hadir6['absen 2'] = "Hadir";
                }
                if ($data_absensi[0]['a_3'] == 0) {
                    $hadir6['absen 3'] = "Tidak Hadir";
                } else {
                    $hadir6['absen 3'] = "Hadir";
                }
                if ($data_absensi[0]['a_4'] == 0) {
                    $hadir6['absen 4'] = "Tidak Hadir";
                } else {
                    $hadir6['absen 4'] = "Hadir";
                }
                if ($data_absensi[0]['a_5'] == 0) {
                    $hadir6['absen 5'] = "Tidak Hadir";
                } else {
                    $hadir6['absen 5'] = "Hadir";
                }
                if ($data_absensi[0]['a_6'] == 0) {
                    $hadir6['absen 6'] = "Tidak Hadir";
                } else {
                    $hadir6['absen 6'] = "Hadir";
                }
                if ($data_absensi[0]['a_7'] == 0) {
                    $hadir6['absen 7'] = "Tidak Hadir";
                } else {
                    $hadir6['absen 7'] = "Hadir";
                }
                if ($data_absensi[0]['a_8'] == 0) {
                    $hadir6['absen 8'] = "Tidak Hadir";
                } else {
                    $hadir6['absen 8'] = "Hadir";
                }
                if ($data_absensi[0]['a_9'] == 0) {
                    $hadir6['absen 9'] = "Tidak Hadir";
                } else {
                    $hadir6['absen 9'] = "Hadir";
                }
                if ($data_absensi[0]['a_10'] == 0) {
                    $hadir6['absen 10'] = "Tidak Hadir";
                } else {
                    $hadir6['absen 10'] = "Hadir";
                }
                //     $data_sistem_digital_2 = array(
                //         $hadir
                //     );
            }
            if ($sistem_mikroprosesor) {
                $matkul = $this->main_model->get_kelas_matkulBYKODE($sistem_mikroprosesor)->result_array();
                $id_kelas_matkul = $matkul[0]['id_kelas_matkul'];
                $data_absensi = $this->main_model->get_all_absen_mhsBY($id_kelas_matkul, $id_user)->result_array();
                $hadir7['kelas'] = $matkul[0]['kelas'];
                if ($data_absensi[0]['a_1'] == 0) {
                    $hadir7['absen 1'] = "Tidak Hadir";
                } else {
                    $hadir7['absen 1'] = "Hadir";
                }
                if ($data_absensi[0]['a_2'] == 0) {
                    $hadir7['absen 2'] = "Tidak Hadir";
                } else {
                    $hadir7['absen 2'] = "Hadir";
                }
                if ($data_absensi[0]['a_3'] == 0) {
                    $hadir7['absen 3'] = "Tidak Hadir";
                } else {
                    $hadir7['absen 3'] = "Hadir";
                }
                if ($data_absensi[0]['a_4'] == 0) {
                    $hadir7['absen 4'] = "Tidak Hadir";
                } else {
                    $hadir7['absen 4'] = "Hadir";
                }
                if ($data_absensi[0]['a_5'] == 0) {
                    $hadir7['absen 5'] = "Tidak Hadir";
                } else {
                    $hadir7['absen 5'] = "Hadir";
                }
                if ($data_absensi[0]['a_6'] == 0) {
                    $hadir7['absen 6'] = "Tidak Hadir";
                } else {
                    $hadir7['absen 6'] = "Hadir";
                }
                if ($data_absensi[0]['a_7'] == 0) {
                    $hadir7['absen 7'] = "Tidak Hadir";
                } else {
                    $hadir7['absen 7'] = "Hadir";
                }
                if ($data_absensi[0]['a_8'] == 0) {
                    $hadir7['absen 8'] = "Tidak Hadir";
                } else {
                    $hadir7['absen 8'] = "Hadir";
                }
                if ($data_absensi[0]['a_9'] == 0) {
                    $hadir7['absen 9'] = "Tidak Hadir";
                } else {
                    $hadir7['absen 9'] = "Hadir";
                }
                if ($data_absensi[0]['a_10'] == 0) {
                    $hadir7['absen 10'] = "Tidak Hadir";
                } else {
                    $hadir7['absen 10'] = "Hadir";
                }
                //     $data_sistem_mikroprosesor = array(
                //         $hadir
                //     );
            }
            if ($otomasi) {
                $matkul = $this->main_model->get_kelas_matkulBYKODE($otomasi)->result_array();
                $id_kelas_matkul = $matkul[0]['id_kelas_matkul'];
                $data_absensi = $this->main_model->get_all_absen_mhsBY($id_kelas_matkul, $id_user)->result_array();
                $hadir8['kelas'] = $matkul[0]['kelas'];
                if ($data_absensi[0]['a_1'] == 0) {
                    $hadir8['absen 1'] = "Tidak Hadir";
                } else {
                    $hadir8['absen 1'] = "Hadir";
                }
                if ($data_absensi[0]['a_2'] == 0) {
                    $hadir8['absen 2'] = "Tidak Hadir";
                } else {
                    $hadir8['absen 2'] = "Hadir";
                }
                if ($data_absensi[0]['a_3'] == 0) {
                    $hadir8['absen 3'] = "Tidak Hadir";
                } else {
                    $hadir8['absen 3'] = "Hadir";
                }
                if ($data_absensi[0]['a_4'] == 0) {
                    $hadir8['absen 4'] = "Tidak Hadir";
                } else {
                    $hadir8['absen 4'] = "Hadir";
                }
                if ($data_absensi[0]['a_5'] == 0) {
                    $hadir8['absen 5'] = "Tidak Hadir";
                } else {
                    $hadir8['absen 5'] = "Hadir";
                }
                if ($data_absensi[0]['a_6'] == 0) {
                    $hadir8['absen 6'] = "Tidak Hadir";
                } else {
                    $hadir8['absen 6'] = "Hadir";
                }
                if ($data_absensi[0]['a_7'] == 0) {
                    $hadir8['absen 7'] = "Tidak Hadir";
                } else {
                    $hadir8['absen 7'] = "Hadir";
                }
                if ($data_absensi[0]['a_8'] == 0) {
                    $hadir8['absen 8'] = "Tidak Hadir";
                } else {
                    $hadir8['absen 8'] = "Hadir";
                }
                if ($data_absensi[0]['a_9'] == 0) {
                    $hadir8['absen 9'] = "Tidak Hadir";
                } else {
                    $hadir8['absen 9'] = "Hadir";
                }
                if ($data_absensi[0]['a_10'] == 0) {
                    $hadir8['absen 10'] = "Tidak Hadir";
                } else {
                    $hadir8['absen 10'] = "Hadir";
                }
                //     $data_otomasi = array(
                //         $hadir
                //     );
            }
            if ($administrasi_jaringan) {
                $matkul = $this->main_model->get_kelas_matkulBYKODE($administrasi_jaringan)->result_array();
                $id_kelas_matkul = $matkul[0]['id_kelas_matkul'];
                $data_absensi = $this->main_model->get_all_absen_mhsBY($id_kelas_matkul, $id_user)->result_array();
                $hadir9['kelas'] = $matkul[0]['kelas'];
                if ($data_absensi[0]['a_1'] == 0) {
                    $hadir9['absen 1'] = "Tidak Hadir";
                } else {
                    $hadir9['absen 1'] = "Hadir";
                }
                if ($data_absensi[0]['a_2'] == 0) {
                    $hadir9['absen 2'] = "Tidak Hadir";
                } else {
                    $hadir9['absen 2'] = "Hadir";
                }
                if ($data_absensi[0]['a_3'] == 0) {
                    $hadir9['absen 3'] = "Tidak Hadir";
                } else {
                    $hadir9['absen 3'] = "Hadir";
                }
                if ($data_absensi[0]['a_4'] == 0) {
                    $hadir9['absen 4'] = "Tidak Hadir";
                } else {
                    $hadir9['absen 4'] = "Hadir";
                }
                if ($data_absensi[0]['a_5'] == 0) {
                    $hadir9['absen 5'] = "Tidak Hadir";
                } else {
                    $hadir9['absen 5'] = "Hadir";
                }
                if ($data_absensi[0]['a_6'] == 0) {
                    $hadir9['absen 6'] = "Tidak Hadir";
                } else {
                    $hadir9['absen 6'] = "Hadir";
                }
                if ($data_absensi[0]['a_7'] == 0) {
                    $hadir9['absen 7'] = "Tidak Hadir";
                } else {
                    $hadir9['absen 7'] = "Hadir";
                }
                if ($data_absensi[0]['a_8'] == 0) {
                    $hadir9['absen 8'] = "Tidak Hadir";
                } else {
                    $hadir9['absen 8'] = "Hadir";
                }
                if ($data_absensi[0]['a_9'] == 0) {
                    $hadir9['absen 9'] = "Tidak Hadir";
                } else {
                    $hadir9['absen 9'] = "Hadir";
                }
                if ($data_absensi[0]['a_10'] == 0) {
                    $hadir9['absen 10'] = "Tidak Hadir";
                } else {
                    $hadir9['absen 10'] = "Hadir";
                }
                //     $data_administrasi_jaringan = array(
                //         $hadir
                //     );
            }
            if ($sistem_pemrograman_mikroprosesor) {
                $matkul = $this->main_model->get_kelas_matkulBYKODE($sistem_pemrograman_mikroprosesor)->result_array();
                $id_kelas_matkul = $matkul[0]['id_kelas_matkul'];
                $data_absensi = $this->main_model->get_all_absen_mhsBY($id_kelas_matkul, $id_user)->result_array();
                $hadir10['kelas'] = $matkul[0]['kelas'];
                if ($data_absensi[0]['a_1'] == 0) {
                    $hadir10['absen 1'] = "Tidak Hadir";
                } else {
                    $hadir10['absen 1'] = "Hadir";
                }
                if ($data_absensi[0]['a_2'] == 0) {
                    $hadir10['absen 2'] = "Tidak Hadir";
                } else {
                    $hadir10['absen 2'] = "Hadir";
                }
                if ($data_absensi[0]['a_3'] == 0) {
                    $hadir10['absen 3'] = "Tidak Hadir";
                } else {
                    $hadir10['absen 3'] = "Hadir";
                }
                if ($data_absensi[0]['a_4'] == 0) {
                    $hadir10['absen 4'] = "Tidak Hadir";
                } else {
                    $hadir10['absen 4'] = "Hadir";
                }
                if ($data_absensi[0]['a_5'] == 0) {
                    $hadir10['absen 5'] = "Tidak Hadir";
                } else {
                    $hadir10['absen 5'] = "Hadir";
                }
                if ($data_absensi[0]['a_6'] == 0) {
                    $hadir10['absen 6'] = "Tidak Hadir";
                } else {
                    $hadir10['absen 6'] = "Hadir";
                }
                if ($data_absensi[0]['a_7'] == 0) {
                    $hadir10['absen 7'] = "Tidak Hadir";
                } else {
                    $hadir10['absen 7'] = "Hadir";
                }
                if ($data_absensi[0]['a_8'] == 0) {
                    $hadir10['absen 8'] = "Tidak Hadir";
                } else {
                    $hadir10['absen 8'] = "Hadir";
                }
                if ($data_absensi[0]['a_9'] == 0) {
                    $hadir10['absen 9'] = "Tidak Hadir";
                } else {
                    $hadir10['absen 9'] = "Hadir";
                }
                if ($data_absensi[0]['a_10'] == 0) {
                    $hadir10['absen 10'] = "Tidak Hadir";
                } else {
                    $hadir10['absen 10'] = "Hadir";
                }
                //     $data_sistem_pemrograman_mikroprosesor = array(
                //         $hadir
                //     );
            }
            if ($mobile_programing) {
                $matkul = $this->main_model->get_kelas_matkulBYKODE($mobile_programing)->result_array();
                $id_kelas_matkul = $matkul[0]['id_kelas_matkul'];
                $data_absensi = $this->main_model->get_all_absen_mhsBY($id_kelas_matkul, $id_user)->result_array();
                $hadir11['kelas'] = $matkul[0]['kelas'];
                if ($data_absensi[0]['a_1'] == 0) {
                    $hadir11['absen 1'] = "Tidak Hadir";
                } else {
                    $hadir11['absen 1'] = "Hadir";
                }
                if ($data_absensi[0]['a_2'] == 0) {
                    $hadir11['absen 2'] = "Tidak Hadir";
                } else {
                    $hadir11['absen 2'] = "Hadir";
                }
                if ($data_absensi[0]['a_3'] == 0) {
                    $hadir11['absen 3'] = "Tidak Hadir";
                } else {
                    $hadir11['absen 3'] = "Hadir";
                }
                if ($data_absensi[0]['a_4'] == 0) {
                    $hadir11['absen 4'] = "Tidak Hadir";
                } else {
                    $hadir11['absen 4'] = "Hadir";
                }
                if ($data_absensi[0]['a_5'] == 0) {
                    $hadir11['absen 5'] = "Tidak Hadir";
                } else {
                    $hadir11['absen 5'] = "Hadir";
                }
                if ($data_absensi[0]['a_6'] == 0) {
                    $hadir11['absen 6'] = "Tidak Hadir";
                } else {
                    $hadir11['absen 6'] = "Hadir";
                }
                if ($data_absensi[0]['a_7'] == 0) {
                    $hadir11['absen 7'] = "Tidak Hadir";
                } else {
                    $hadir11['absen 7'] = "Hadir";
                }
                if ($data_absensi[0]['a_8'] == 0) {
                    $hadir11['absen 8'] = "Tidak Hadir";
                } else {
                    $hadir11['absen 8'] = "Hadir";
                }
                if ($data_absensi[0]['a_9'] == 0) {
                    $hadir11['absen 9'] = "Tidak Hadir";
                } else {
                    $hadir11['absen 9'] = "Hadir";
                }
                if ($data_absensi[0]['a_10'] == 0) {
                    $hadir11['absen 10'] = "Tidak Hadir";
                } else {
                    $hadir11['absen 10'] = "Hadir";
                }
                //     $data_mobile_programing = array(
                //         $hadir
                //     );
            }
            if ($keamanan_jaringan) {
                $matkul = $this->main_model->get_kelas_matkulBYKODE($keamanan_jaringan)->result_array();
                $id_kelas_matkul = $matkul[0]['id_kelas_matkul'];
                $data_absensi = $this->main_model->get_all_absen_mhsBY($id_kelas_matkul, $id_user)->result_array();
                $hadir12['kelas'] = $matkul[0]['kelas'];
                if ($data_absensi[0]['a_1'] == 0) {
                    $hadir12['absen 1'] = "Tidak Hadir";
                } else {
                    $hadir12['absen 1'] = "Hadir";
                }
                if ($data_absensi[0]['a_2'] == 0) {
                    $hadir12['absen 2'] = "Tidak Hadir";
                } else {
                    $hadir12['absen 2'] = "Hadir";
                }
                if ($data_absensi[0]['a_3'] == 0) {
                    $hadir12['absen 3'] = "Tidak Hadir";
                } else {
                    $hadir12['absen 3'] = "Hadir";
                }
                if ($data_absensi[0]['a_4'] == 0) {
                    $hadir12['absen 4'] = "Tidak Hadir";
                } else {
                    $hadir12['absen 4'] = "Hadir";
                }
                if ($data_absensi[0]['a_5'] == 0) {
                    $hadir12['absen 5'] = "Tidak Hadir";
                } else {
                    $hadir12['absen 5'] = "Hadir";
                }
                if ($data_absensi[0]['a_6'] == 0) {
                    $hadir12['absen 6'] = "Tidak Hadir";
                } else {
                    $hadir12['absen 6'] = "Hadir";
                }
                if ($data_absensi[0]['a_7'] == 0) {
                    $hadir12['absen 7'] = "Tidak Hadir";
                } else {
                    $hadir12['absen 7'] = "Hadir";
                }
                if ($data_absensi[0]['a_8'] == 0) {
                    $hadir12['absen 8'] = "Tidak Hadir";
                } else {
                    $hadir12['absen 8'] = "Hadir";
                }
                if ($data_absensi[0]['a_9'] == 0) {
                    $hadir12['absen 9'] = "Tidak Hadir";
                } else {
                    $hadir12['absen 9'] = "Hadir";
                }
                if ($data_absensi[0]['a_10'] == 0) {
                    $hadir12['absen 10'] = "Tidak Hadir";
                } else {
                    $hadir12['absen 10'] = "Hadir";
                }
                //     $data_keamanan_jaringan = array(
                //         $hadir
                //     );
            }
            if ($pemrograman_python) {
                $matkul = $this->main_model->get_kelas_matkulBYKODE($pemrograman_python)->result_array();
                $id_kelas_matkul = $matkul[0]['id_kelas_matkul'];
                $data_absensi = $this->main_model->get_all_absen_mhsBY($id_kelas_matkul, $id_user)->result_array();
                $hadir13['kelas'] = $matkul[0]['kelas'];
                if ($data_absensi[0]['a_1'] == 0) {
                    $hadir13['absen 1'] = "Tidak Hadir";
                } else {
                    $hadir13['absen 1'] = "Hadir";
                }
                if ($data_absensi[0]['a_2'] == 0) {
                    $hadir13['absen 2'] = "Tidak Hadir";
                } else {
                    $hadir13['absen 2'] = "Hadir";
                }
                if ($data_absensi[0]['a_3'] == 0) {
                    $hadir13['absen 3'] = "Tidak Hadir";
                } else {
                    $hadir13['absen 3'] = "Hadir";
                }
                if ($data_absensi[0]['a_4'] == 0) {
                    $hadir13['absen 4'] = "Tidak Hadir";
                } else {
                    $hadir13['absen 4'] = "Hadir";
                }
                if ($data_absensi[0]['a_5'] == 0) {
                    $hadir13['absen 5'] = "Tidak Hadir";
                } else {
                    $hadir13['absen 5'] = "Hadir";
                }
                if ($data_absensi[0]['a_6'] == 0) {
                    $hadir13['absen 6'] = "Tidak Hadir";
                } else {
                    $hadir13['absen 6'] = "Hadir";
                }
                if ($data_absensi[0]['a_7'] == 0) {
                    $hadir13['absen 7'] = "Tidak Hadir";
                } else {
                    $hadir13['absen 7'] = "Hadir";
                }
                if ($data_absensi[0]['a_8'] == 0) {
                    $hadir13['absen 8'] = "Tidak Hadir";
                } else {
                    $hadir13['absen 8'] = "Hadir";
                }
                if ($data_absensi[0]['a_9'] == 0) {
                    $hadir13['absen 9'] = "Tidak Hadir";
                } else {
                    $hadir13['absen 9'] = "Hadir";
                }
                if ($data_absensi[0]['a_10'] == 0) {
                    $hadir13['absen 10'] = "Tidak Hadir";
                } else {
                    $hadir13['absen 10'] = "Hadir";
                }
                // $data_pemrograman_python = array(
                //     $hadir
                // );
            }
            if ($sistem_interface_mikrokontroler) {
                $matkul = $this->main_model->get_kelas_matkulBYKODE($sistem_interface_mikrokontroler)->result_array();
                $id_kelas_matkul = $matkul[0]['id_kelas_matkul'];
                $data_absensi = $this->main_model->get_all_absen_mhsBY($id_kelas_matkul, $id_user)->result_array();
                $hadir14['kelas'] = $matkul[0]['kelas'];
                if ($data_absensi[0]['a_1'] == 0) {
                    $hadir14['absen 1'] = "Tidak Hadir";
                } else {
                    $hadir14['absen 1'] = "Hadir";
                }
                if ($data_absensi[0]['a_2'] == 0) {
                    $hadir14['absen 2'] = "Tidak Hadir";
                } else {
                    $hadir14['absen 2'] = "Hadir";
                }
                if ($data_absensi[0]['a_3'] == 0) {
                    $hadir14['absen 3'] = "Tidak Hadir";
                } else {
                    $hadir14['absen 3'] = "Hadir";
                }
                if ($data_absensi[0]['a_4'] == 0) {
                    $hadir14['absen 4'] = "Tidak Hadir";
                } else {
                    $hadir14['absen 4'] = "Hadir";
                }
                if ($data_absensi[0]['a_5'] == 0) {
                    $hadir14['absen 5'] = "Tidak Hadir";
                } else {
                    $hadir14['absen 5'] = "Hadir";
                }
                if ($data_absensi[0]['a_6'] == 0) {
                    $hadir14['absen 6'] = "Tidak Hadir";
                } else {
                    $hadir14['absen 6'] = "Hadir";
                }
                if ($data_absensi[0]['a_7'] == 0) {
                    $hadir14['absen 7'] = "Tidak Hadir";
                } else {
                    $hadir14['absen 7'] = "Hadir";
                }
                if ($data_absensi[0]['a_8'] == 0) {
                    $hadir14['absen 8'] = "Tidak Hadir";
                } else {
                    $hadir14['absen 8'] = "Hadir";
                }
                if ($data_absensi[0]['a_9'] == 0) {
                    $hadir14['absen 9'] = "Tidak Hadir";
                } else {
                    $hadir14['absen 9'] = "Hadir";
                }
                if ($data_absensi[0]['a_10'] == 0) {
                    $hadir14['absen 10'] = "Tidak Hadir";
                } else {
                    $hadir14['absen 10'] = "Hadir";
                }
                // $data_sistem_interface_mikrokontroler = array(
                // $hadir
                // );
            }
            if ($robotik) {
                $matkul = $this->main_model->get_kelas_matkulBYKODE($robotik)->result_array();
                $id_kelas_matkul = $matkul[0]['id_kelas_matkul'];
                $data_absensi = $this->main_model->get_all_absen_mhsBY($id_kelas_matkul, $id_user)->result_array();
                $hadir15['kelas'] = $matkul[0]['kelas'];
                if ($data_absensi[0]['a_1'] == 0) {
                    $hadir15['absen 1'] = "Tidak Hadir";
                } else {
                    $hadir15['absen 1'] = "Hadir";
                }
                if ($data_absensi[0]['a_2'] == 0) {
                    $hadir15['absen 2'] = "Tidak Hadir";
                } else {
                    $hadir15['absen 2'] = "Hadir";
                }
                if ($data_absensi[0]['a_3'] == 0) {
                    $hadir15['absen 3'] = "Tidak Hadir";
                } else {
                    $hadir15['absen 3'] = "Hadir";
                }
                if ($data_absensi[0]['a_4'] == 0) {
                    $hadir15['absen 4'] = "Tidak Hadir";
                } else {
                    $hadir15['absen 4'] = "Hadir";
                }
                if ($data_absensi[0]['a_5'] == 0) {
                    $hadir15['absen 5'] = "Tidak Hadir";
                } else {
                    $hadir15['absen 5'] = "Hadir";
                }
                if ($data_absensi[0]['a_6'] == 0) {
                    $hadir15['absen 6'] = "Tidak Hadir";
                } else {
                    $hadir15['absen 6'] = "Hadir";
                }
                if ($data_absensi[0]['a_7'] == 0) {
                    $hadir15['absen 7'] = "Tidak Hadir";
                } else {
                    $hadir15['absen 7'] = "Hadir";
                }
                if ($data_absensi[0]['a_8'] == 0) {
                    $hadir15['absen 8'] = "Tidak Hadir";
                } else {
                    $hadir15['absen 8'] = "Hadir";
                }
                if ($data_absensi[0]['a_9'] == 0) {
                    $hadir15['absen 9'] = "Tidak Hadir";
                } else {
                    $hadir15['absen 9'] = "Hadir";
                }
                if ($data_absensi[0]['a_10'] == 0) {
                    $hadir15['absen 10'] = "Tidak Hadir";
                } else {
                    $hadir15['absen 10'] = "Hadir";
                }
                //     $data_robotik = array(
                //         $hadir
                //     );
            }

            $hasil1 = (object) array_filter((array) $hadir1);
            $hasil2 = (object) array_filter((array) $hadir2);
            $hasil3 = (object) array_filter((array) $hadir3);
            $hasil4 = (object) array_filter((array) $hadir4);
            $hasil5 = (object) array_filter((array) $hadir5);
            $hasil6 = (object) array_filter((array) $hadir6);
            $hasil7 = (object) array_filter((array) $hadir7);
            $hasil8 = (object) array_filter((array) $hadir8);
            $hasil9 = (object) array_filter((array) $hadir9);
            $hasil10 = (object) array_filter((array) $hadir10);
            $hasil11 = (object) array_filter((array) $hadir11);
            $hasil12 = (object) array_filter((array) $hadir12);
            $hasil13 = (object) array_filter((array) $hadir13);
            $hasil14 = (object) array_filter((array) $hadir14);
            $hasil15 = (object) array_filter((array) $hadir15);

            array_push($responsistem["absen"], $hasil1);
            array_push($responsistem["absen"], $hasil2);
            array_push($responsistem["absen"], $hasil3);
            array_push($responsistem["absen"], $hasil4);
            array_push($responsistem["absen"], $hasil5);
            array_push($responsistem["absen"], $hasil6);
            array_push($responsistem["absen"], $hasil7);
            array_push($responsistem["absen"], $hasil8);
            array_push($responsistem["absen"], $hasil9);
            array_push($responsistem["absen"], $hasil10);
            array_push($responsistem["absen"], $hasil11);
            array_push($responsistem["absen"], $hasil12);
            array_push($responsistem["absen"], $hasil13);
            array_push($responsistem["absen"], $hasil14);
            array_push($responsistem["absen"], $hasil15);
            $this->response($responsistem, 200);
        } else {
            $this->response([
                'status' => FALSE,
                'messagge' => "404 Data Not Found, Please Check Your ID and Password"
            ], REST_Controller::HTTP_NOT_FOUND);
        }
    }
}
