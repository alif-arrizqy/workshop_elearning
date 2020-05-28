<?php error_reporting(0) ?>
<?php
use Restserver\Libraries\REST_Controller;

defined('BASEPATH') or exit('No Direct script allowed');

require APPPATH . '/libraries/REST_Controller.php';
require APPPATH . '/libraries/Format.php';

class JsonJadwalPribadi extends REST_Controller
{

    function __construct()
    {
        parent::__construct();
        $this->load->model('login_model');
        $this->load->model('main_model');
    }


    function index_get()
    {
        $id_user = $this->session->userdata('ses_idlogin');
        // $id_user = $this->get('id_user');
        $data_kelas_mhs = $this->main_model->get_kelas_mhs($id_user)->result();

        if ($id_user === NULL) {
            $this->response([
                'status' => FALSE,
                'message' => 'No users were found'
            ], REST_Controller::HTTP_NOT_FOUND);
        } else {
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

            if (!empty($sistem_instrumentasi)) {
                $matkul = $this->main_model->get_kelas_matkulBYKODE($sistem_instrumentasi)->result_array();
                $asdos1 = $this->main_model->get_asdos1_iduser($matkul[0]['asdos_1'])->result();
                $asdos2 = $this->main_model->get_asdos1_iduser($matkul[0]['asdos_2'])->result();
                foreach ($asdos1 as $asd1) {
                }
                foreach ($asdos2 as $asd2) {
                }
                if ($matkul[0]['lab'] == 1){
                    $orkom = "Lab. Organisasi Komputer";
                } 
                if ($matkul[0]['lab'] == 0){
                   $ddi = "Lab. Dasar-Dasar Instrumentasi";
                }

                $data_sistem_instrumentasi = array(
                    $kelas = $matkul[0]['kelas'],
                    $jadwal = $matkul[0]['hari'] . " - " . $matkul[0]['mulai_praktikum'] . " s/d " . $matkul[0]['selesai_praktikum'],
                    $asd1->nama,
                    $asd2->nama,
                    $ddi
                );
            }

            if (!empty($organisasi_komputer)) {
                $matkul = $this->main_model->get_kelas_matkulBYKODE($organisasi_komputer)->result_array();
                $asdos1 = $this->main_model->get_asdos1_iduser($matkul[0]['asdos_1'])->result();
                $asdos2 = $this->main_model->get_asdos1_iduser($matkul[0]['asdos_2'])->result();
                foreach ($asdos1 as $asd1) {
                }
                foreach ($asdos2 as $asd2) {
                }
                if ($matkul[0]['lab'] == 1){
                    $orkom = "Lab. Organisasi Komputer";
                } 
                if ($matkul[0]['lab'] == 0){
                   $ddi = "Lab. Dasar-Dasar Instrumentasi";
                }

                $data_organisasi_komputer = array(
                    $kelas = $matkul[0]['kelas'],
                    $jadwal = $matkul[0]['hari'] . " - " . $matkul[0]['mulai_praktikum'] . " s/d " . $matkul[0]['selesai_praktikum'],
                    $asd1->nama,
                    $asd2->nama,
                    $ddi
                );
            }

            if (!empty($elektronika)) {
                $matkul = $this->main_model->get_kelas_matkulBYKODE($elektronika)->result_array();
                $asdos1 = $this->main_model->get_asdos1_iduser($matkul[0]['asdos_1'])->result();
                $asdos2 = $this->main_model->get_asdos1_iduser($matkul[0]['asdos_2'])->result();
                foreach ($asdos1 as $asd1) {
                }
                foreach ($asdos2 as $asd2) {
                }
                if ($matkul[0]['lab'] == 1){
                    $orkom = "Lab. Organisasi Komputer";
                } 
                if ($matkul[0]['lab'] == 0){
                   $ddi = "Lab. Dasar-Dasar Instrumentasi";
                }

                $data_elektronika = array(
                    $kelas = $matkul[0]['kelas'],
                    $jadwal = $matkul[0]['hari'] . " - " . $matkul[0]['mulai_praktikum'] . " s/d " . $matkul[0]['selesai_praktikum'],
                    $asd1->nama,
                    $asd2->nama,
                    $ddi
                );
            }

            if (!empty($sistem_digital_1)) {
                $matkul = $this->main_model->get_kelas_matkulBYKODE($sistem_digital_1)->result_array();
                $asdos1 = $this->main_model->get_asdos1_iduser($matkul[0]['asdos_1'])->result();
                $asdos2 = $this->main_model->get_asdos1_iduser($matkul[0]['asdos_2'])->result();
                foreach ($asdos1 as $asd1) {
                }
                foreach ($asdos2 as $asd2) {
                }
                if ($matkul[0]['lab'] == 1){
                    $orkom = "Lab. Organisasi Komputer";
                } 
                if ($matkul[0]['lab'] == 0){
                   $ddi = "Lab. Dasar-Dasar Instrumentasi";
                }

                $data_sistem_digital_1 = array(
                    $kelas = $matkul[0]['kelas'],
                    $jadwal = $matkul[0]['hari'] . " - " . $matkul[0]['mulai_praktikum'] . " s/d " . $matkul[0]['selesai_praktikum'],
                    $asd1->nama,
                    $asd2->nama,
                    $ddi
                );
            }

            if (!empty($jaringan_komputer)) {
                $matkul = $this->main_model->get_kelas_matkulBYKODE($jaringan_komputer)->result_array();
                $asdos1 = $this->main_model->get_asdos1_iduser($matkul[0]['asdos_1'])->result();
                $asdos2 = $this->main_model->get_asdos1_iduser($matkul[0]['asdos_2'])->result();
                foreach ($asdos1 as $asd1) {
                }
                foreach ($asdos2 as $asd2) {
                }
                if ($matkul[0]['lab'] == 1){
                    $orkom = "Lab. Organisasi Komputer";
                } 
                if ($matkul[0]['lab'] == 0){
                   $ddi = "Lab. Dasar-Dasar Instrumentasi";
                }

                $data_jaringan_komputer = array(
                    $kelas = $matkul[0]['kelas'],
                    $jadwal = $matkul[0]['hari'] . " - " . $matkul[0]['mulai_praktikum'] . " s/d " . $matkul[0]['selesai_praktikum'],
                    $asd1->nama,
                    $asd2->nama,
                    $orkom
                );
            }

            if (!empty($sistem_digital_2)) {
                $matkul = $this->main_model->get_kelas_matkulBYKODE($sistem_digital_2)->result_array();
                $asdos1 = $this->main_model->get_asdos1_iduser($matkul[0]['asdos_1'])->result();
                $asdos2 = $this->main_model->get_asdos1_iduser($matkul[0]['asdos_2'])->result();
                foreach ($asdos1 as $asd1) {
                }
                foreach ($asdos2 as $asd2) {
                }
                if ($matkul[0]['lab'] == 1){
                    $orkom = "Lab. Organisasi Komputer";
                } 
                if ($matkul[0]['lab'] == 0){
                   $ddi = "Lab. Dasar-Dasar Instrumentasi";
                }

                $data_sistem_digital_2 = array(
                    $kelas = $matkul[0]['kelas'],
                    $jadwal = $matkul[0]['hari'] . " - " . $matkul[0]['mulai_praktikum'] . " s/d " . $matkul[0]['selesai_praktikum'],
                    $asd1->nama,
                    $asd2->nama,
                    $ddi
                );
            }

            if (!empty($sistem_mikroprosesor)) {
                $matkul = $this->main_model->get_kelas_matkulBYKODE($sistem_mikroprosesor)->result_array();
                $asdos1 = $this->main_model->get_asdos1_iduser($matkul[0]['asdos_1'])->result();
                $asdos2 = $this->main_model->get_asdos1_iduser($matkul[0]['asdos_2'])->result();
                foreach ($asdos1 as $asd1) {
                }
                foreach ($asdos2 as $asd2) {
                }
                if ($matkul[0]['lab'] == 1){
                    $orkom = "Lab. Organisasi Komputer";
                } 
                if ($matkul[0]['lab'] == 0){
                   $ddi = "Lab. Dasar-Dasar Instrumentasi";
                }

                $data_sistem_mikroprosesor = array(
                    $kelas = $matkul[0]['kelas'],
                    $jadwal = $matkul[0]['hari'] . " - " . $matkul[0]['mulai_praktikum'] . " s/d " . $matkul[0]['selesai_praktikum'],
                    $asd1->nama,
                    $asd2->nama,
                    $orkom
                );
            }

            if (!empty($otomasi)) {
                $matkul = $this->main_model->get_kelas_matkulBYKODE($otomasi)->result_array();
                $asdos1 = $this->main_model->get_asdos1_iduser($matkul[0]['asdos_1'])->result();
                $asdos2 = $this->main_model->get_asdos1_iduser($matkul[0]['asdos_2'])->result();
                foreach ($asdos1 as $asd1) {
                }
                foreach ($asdos2 as $asd2) {
                }
                if ($matkul[0]['lab'] == 1){
                    $orkom = "Lab. Organisasi Komputer";
                } 
                if ($matkul[0]['lab'] == 0){
                   $ddi = "Lab. Dasar-Dasar Instrumentasi";
                }

                $data_otomasi = array(
                    $kelas = $matkul[0]['kelas'],
                    $jadwal = $matkul[0]['hari'] . " - " . $matkul[0]['mulai_praktikum'] . " s/d " . $matkul[0]['selesai_praktikum'],
                    $asd1->nama,
                    $asd2->nama,
                    $ddi
                );
            }

            if (!empty($administrasi_jaringan)) {
                $matkul = $this->main_model->get_kelas_matkulBYKODE($administrasi_jaringan)->result_array();
                $asdos1 = $this->main_model->get_asdos1_iduser($matkul[0]['asdos_1'])->result();
                $asdos2 = $this->main_model->get_asdos1_iduser($matkul[0]['asdos_2'])->result();
                foreach ($asdos1 as $asd1) {
                }
                foreach ($asdos2 as $asd2) {
                }
                if ($matkul[0]['lab'] == 1){
                    $orkom = "Lab. Organisasi Komputer";
                } 
                if ($matkul[0]['lab'] == 0){
                   $ddi = "Lab. Dasar-Dasar Instrumentasi";
                }

                $data_administrasi_jaringan = array(
                    $kelas = $matkul[0]['kelas'],
                    $jadwal = $matkul[0]['hari'] . " - " . $matkul[0]['mulai_praktikum'] . " s/d " . $matkul[0]['selesai_praktikum'],
                    $asd1->nama,
                    $asd2->nama,
                    $orkom
                );
            }

            if (!empty($sistem_pemrograman_mikroprosesor)) {
                $matkul = $this->main_model->get_kelas_matkulBYKODE($sistem_pemrograman_mikroprosesor)->result_array();
                $asdos1 = $this->main_model->get_asdos1_iduser($matkul[0]['asdos_1'])->result();
                $asdos2 = $this->main_model->get_asdos1_iduser($matkul[0]['asdos_2'])->result();
                foreach ($asdos1 as $asd1) {
                }
                foreach ($asdos2 as $asd2) {
                }
                if ($matkul[0]['lab'] == 1){
                    $orkom = "Lab. Organisasi Komputer";
                } 
                if ($matkul[0]['lab'] == 0){
                   $ddi = "Lab. Dasar-Dasar Instrumentasi";
                }

                $data_sistem_pemrograman_mikroprosesor = array(
                    $kelas = $matkul[0]['kelas'],
                    $jadwal = $matkul[0]['hari'] . " - " . $matkul[0]['mulai_praktikum'] . " s/d " . $matkul[0]['selesai_praktikum'],
                    $asd1->nama,
                    $asd2->nama,
                    $ddi
                );
            }

            if (!empty($mobile_programing)) {
                $matkul = $this->main_model->get_kelas_matkulBYKODE($mobile_programing)->result_array();
                $asdos1 = $this->main_model->get_asdos1_iduser($matkul[0]['asdos_1'])->result();
                $asdos2 = $this->main_model->get_asdos1_iduser($matkul[0]['asdos_2'])->result();
                foreach ($asdos1 as $asd1) {
                }
                foreach ($asdos2 as $asd2) {
                }
                if ($matkul[0]['lab'] == 1){
                    $orkom = "Lab. Organisasi Komputer";
                } 
                if ($matkul[0]['lab'] == 0){
                   $ddi = "Lab. Dasar-Dasar Instrumentasi";
                }

                $data_mobile_programing = array(
                    $kelas = $matkul[0]['kelas'],
                    $jadwal = $matkul[0]['hari'] . " - " . $matkul[0]['mulai_praktikum'] . " s/d " . $matkul[0]['selesai_praktikum'],
                    $asd1->nama,
                    $asd2->nama,
                    $ddi
                );
            }
            if (!empty($keamanan_jaringan)) {
                $matkul = $this->main_model->get_kelas_matkulBYKODE($keamanan_jaringan)->result_array();
                $asdos1 = $this->main_model->get_asdos1_iduser($matkul[0]['asdos_1'])->result();
                $asdos2 = $this->main_model->get_asdos1_iduser($matkul[0]['asdos_2'])->result();
                foreach ($asdos1 as $asd1) {
                }
                foreach ($asdos2 as $asd2) {
                }
                if ($matkul[0]['lab'] == 1){
                    $orkom = "Lab. Organisasi Komputer";
                } 
                if ($matkul[0]['lab'] == 0){
                   $ddi = "Lab. Dasar-Dasar Instrumentasi";
                }

                $data_keamanan_jaringan = array(
                    $kelas = $matkul[0]['kelas'],
                    $jadwal = $matkul[0]['hari'] . " - " . $matkul[0]['mulai_praktikum'] . " s/d " . $matkul[0]['selesai_praktikum'],
                    $asd1->nama,
                    $asd2->nama,
                    $orkom
                );
            }

            if (!empty($pemrograman_python)) {
                $matkul = $this->main_model->get_kelas_matkulBYKODE($pemrograman_python)->result_array();
                $asdos1 = $this->main_model->get_asdos1_iduser($matkul[0]['asdos_1'])->result();
                $asdos2 = $this->main_model->get_asdos1_iduser($matkul[0]['asdos_2'])->result();
                foreach ($asdos1 as $asd1) {
                }
                foreach ($asdos2 as $asd2) {
                }

                if ($matkul[0]['lab'] == 1){
                    $orkom = "Lab. Organisasi Komputer";
                } 
                if ($matkul[0]['lab'] == 0){
                   $ddi = "Lab. Dasar-Dasar Instrumentasi";
                }

                $data_pemrograman_python = array(
                    $kelas = $matkul[0]['kelas'],
                    $jadwal = $matkul[0]['hari'] . " - " . $matkul[0]['mulai_praktikum'] . " s/d " . $matkul[0]['selesai_praktikum'],
                    $asd1->nama,
                    $asd2->nama,
                    $orkom
                );
            }
            if (!empty($sistem_interface_mikrokontroler)) {
                $matkul = $this->main_model->get_kelas_matkulBYKODE($sistem_interface_mikrokontroler)->result_array();
                $asdos1 = $this->main_model->get_asdos1_iduser($matkul[0]['asdos_1'])->result();
                $asdos2 = $this->main_model->get_asdos1_iduser($matkul[0]['asdos_2'])->result();
                foreach ($asdos1 as $asd1) {
                }
                foreach ($asdos2 as $asd2) {
                }
                if ($matkul[0]['lab'] == 1){
                    $orkom = "Lab. Organisasi Komputer";
                } 
                if ($matkul[0]['lab'] == 0){
                   $ddi = "Lab. Dasar-Dasar Instrumentasi";
                }

                $data_sistem_interface_mikrokontroler = array(
                    $kelas = $matkul[0]['kelas'],
                    $jadwal = $matkul[0]['hari'] . " - " . $matkul[0]['mulai_praktikum'] . " s/d " . $matkul[0]['selesai_praktikum'],
                    $asd1->nama,
                    $asd2->nama,
                    $ddi
                );
            }
            if (!empty($robotik)) {
                $matkul = $this->main_model->get_kelas_matkulBYKODE($robotik)->result_array();
                $asdos1 = $this->main_model->get_asdos1_iduser($matkul[0]['asdos_1'])->result();
                $asdos2 = $this->main_model->get_asdos1_iduser($matkul[0]['asdos_2'])->result();
                foreach ($asdos1 as $asd1) {
                }
                foreach ($asdos2 as $asd2) {
                }
                if ($matkul[0]['lab'] == 1){
                    $orkom = "Lab. Organisasi Komputer";
                } 
                if ($matkul[0]['lab'] == 0){
                   $ddi = "Lab. Dasar-Dasar Instrumentasi";
                }

                $data_robotik = array(
                    $kelas = $matkul[0]['kelas'],
                    $jadwal = $matkul[0]['hari'] . " - " . $matkul[0]['mulai_praktikum'] . " s/d " . $matkul[0]['selesai_praktikum'],
                    $asd1->nama,
                    $asd2->nama,
                    $ddi
                );
            }
        }

        if(($sistem_instrumentasi) || ($organisasi_komputer) ||  ($elektronika) ||  ($sistem_digital_1) ||  ($jaringan_komputer) ||  ($sistem_digital_2) ||  ($sistem_mikroprosesor) ||  ($otomasi) ||  ($administrasi_jaringan) ||  ($sistem_pemrograman_mikroprosesor) ||  ($mobile_programing) ||  ($keamanan_jaringan) ||  ($pemrograman_python) ||  ($sistem_interface_mikrokontroler) ||  ($robotik)){
            $hasil = array(
                $data_sistem_instrumentasi, $data_organisasi_komputer,
                $data_elektronika, $data_administrasi_jaringan, $data_jaringan_komputer,
                $data_keamanan_jaringan, $data_mobile_programing, $data_otomasi,
                $data_pemrograman_python, $data_sistem_digital_1, $data_sistem_digital_2,
                $data_sistem_interface_mikrokontroler, $data_sistem_mikroprosesor, 
                $data_sistem_pemrograman_mikroprosesor, $data_robotik
                
            );
            // hide output null
            $hasil = (object) array_filter((array) $hasil); 
            $this->response([
                'status' => TRUE,
                'data' => $hasil
                
            ], REST_Controller::HTTP_OK);
        } else {
            $this->response([
                'status' => false,
                'message' => 'Your Class is Not Found'
            ], REST_Controller::HTTP_NOT_FOUND);
        }
    }
}
