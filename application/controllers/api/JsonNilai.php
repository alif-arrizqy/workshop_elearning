<?php error_reporting(0) ?>
<?php

use Restserver\Libraries\REST_Controller;

defined('BASEPATH') or exit('No Direct script allowed');

require APPPATH . '/libraries/REST_Controller.php';
require APPPATH . '/libraries/Format.php';

class JsonNilai extends REST_Controller
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
        $responsistem["nilai"] = array();
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
                $matkul_si = $this->main_model->get_kelas_matkulBYKODE($sistem_instrumentasi)->result_array();
                $id_kelas_matkul = $matkul_si[0]['id_kelas_matkul'];
                $data_absensi = $this->main_model->get_all_absen_mhsBY($id_kelas_matkul, $id_user)->result_array();
                $data_nilai = $this->main_model->get_all_nilai_mhsBY($id_kelas_matkul, $id_user)->result_array();
                $matkul_id = $data_nilai[0]['id_matkul'];
                // panggil matkul sesuai dengan id
                if ($matkul_id == 1) {
                    $tugaspembagi = '5';
                } elseif ($matkul_id == 2) {
                    $tugaspembagi = '5';
                } elseif ($matkul_id == 3) {
                    $tugaspembagi = '5';
                } elseif ($matkul_id == 4) {
                    $tugaspembagi = '5';
                } elseif ($matkul_id == 5) {
                    $tugaspembagi = '5';
                } elseif ($matkul_id == 6) {
                    $tugaspembagi = '5';
                } elseif ($matkul_id == 7) {
                    $tugaspembagi = '5';
                } elseif ($matkul_id == 8) {
                    $tugaspembagi = '5';
                } elseif ($matkul_id == 9) {
                    $tugaspembagi = '5';
                } elseif ($matkul_id == 10) {
                    $tugaspembagi = '5';
                } elseif ($matkul_id == 11) {
                    $tugaspembagi = '5';
                } elseif ($matkul_id == 12) {
                    $tugaspembagi = '5';
                } elseif ($matkul_id == 13) {
                    $tugaspembagi = '5';
                } elseif ($matkul_id == 14) {
                    $tugaspembagi = '5';
                } elseif ($matkul_id == 15) {
                    $tugaspembagi = '5';
                }

                // ############################## Kalkulasi Nilai #######################################
                $data_presentase_nilai = $this->main_model->get_persentase_nilaiBY($matkul_id)->result_array();
                $absen = $data_presentase_nilai[0]['absen'] * 100;
                $kuis = $data_presentase_nilai[0]['kuis'] * 100;
                $tugas = $data_presentase_nilai[0]['tugas'] * 100;
                $uap = $data_presentase_nilai[0]['uap'] * 100;
                $tugasakhir = $data_presentase_nilai[0]['tugasakhir'] * 100;

                $totalabsen = $data_absensi[0]['a_1'] + $data_absensi[0]['a_2'] + $data_absensi[0]['a_3'] + $data_absensi[0]['a_4'] + $data_absensi[0]['a_5'] + $data_absensi[0]['a_6'] + $data_absensi[0]['a_7'] + $data_absensi[0]['a_8'] + $data_absensi[0]['a_9'] + $data_absensi[0]['a_10'];
                $hasiltugas = $data_nilai[0]['tugas1'] + $data_nilai[0]['tugas2'] + $data_nilai[0]['tugas3'] + $data_nilai[0]['tugas4'] + $data_nilai[0]['tugas5'];

                $totaltugas = $hasiltugas / $tugaspembagi;
                $total_absen = ($totalabsen * 10 * $data_presentase_nilai[0]['absen']);
                $total_tugas = $totaltugas * $data_presentase_nilai[0]['tugas'];
                $total_kuis = $data_nilai[0]['kuis'] * $data_presentase_nilai[0]['kuis'];
                $total_uap = $data_nilai[0]['uap'] * $data_presentase_nilai[0]['uap'];
                $total_tugas_akhir = $data_nilai[0]['tugasakhir'] * $data_presentase_nilai[0]['tugasakhir'];
                $total_seluruh = $total_absen + $total_tugas + $total_kuis + $total_uap + $total_tugas_akhir;

                // ################################# Tampil di JSON #####################################
                $tampil_si['kelas'] = $matkul_si[0]['kelas'];
                $tampil_si['Tugas 1'] = $data_nilai[0]['tugas1'];
                $tampil_si['Tugas 2'] = $data_nilai[0]['tugas2'];
                $tampil_si['Tugas 3'] = $data_nilai[0]['tugas3'];
                $tampil_si['Tugas 4'] = $data_nilai[0]['tugas4'];
                $tampil_si['Tugas 5'] = $data_nilai[0]['tugas5'];
                $tampil_si['Total Absen'] = $total_absen . " dari 10 Pertemuan";
                $tampil_si['Total Tugas'] = $hasiltugas;
                $tampil_si['Total Kuis'] = $data_nilai[0]['kuis'];
                $tampil_si['Total UAP'] = $data_nilai[0]['uap'];
                $tampil_si['Total Tugas Akhir'] = $data_nilai[0]['tugasakhir'];
                $tampil_si['Persentase Absen'] = $absen . "% : " . round($total_absen);
                $tampil_si['Persentase Tugas'] = $tugas . "% : " . round($total_tugas);
                $tampil_si['Persentase Kuis'] = $kuis . "% : " . round($total_kuis);
                $tampil_si['Persentase UAP'] = $uap . "% : " . round($total_uap);
                $tampil_si['Persentase Tugas Akhir'] = $tugasakhir . "% : " . round($total_tugas_akhir);
                $tampil_si['Total Nilai Akhir'] = round($total_seluruh);
                if ($total_seluruh >= 85) {
                    $tampil_si['Grade'] =  "A";
                } elseif ($total_seluruh >= 75) {
                    $tampil_si['Grade'] =  "B";
                } elseif ($total_seluruh >= 60) {
                    $tampil_si['Grade'] =  "C";
                } elseif ($total_seluruh >= 50) {
                    $tampil_si['Grade'] =  "D";
                } else {
                    $tampil_si['Grade'] =  "E";
                }
            }
            if ($organisasi_komputer) {
                $matkul_ork = $this->main_model->get_kelas_matkulBYKODE($organisasi_komputer)->result_array();
                $id_kelas_matkul = $matkul_ork[0]['id_kelas_matkul'];
                $data_absensi = $this->main_model->get_all_absen_mhsBY($id_kelas_matkul, $id_user)->result_array();
                $data_nilai = $this->main_model->get_all_nilai_mhsBY($id_kelas_matkul, $id_user)->result_array();
                $matkul_id = $data_nilai[0]['id_matkul'];
                // panggil matkul sesuai dengan id
                if ($matkul_id == 1) {
                    $tugaspembagi = '5';
                } elseif ($matkul_id == 2) {
                    $tugaspembagi = '5';
                } elseif ($matkul_id == 3) {
                    $tugaspembagi = '5';
                } elseif ($matkul_id == 4) {
                    $tugaspembagi = '5';
                } elseif ($matkul_id == 5) {
                    $tugaspembagi = '5';
                } elseif ($matkul_id == 6) {
                    $tugaspembagi = '5';
                } elseif ($matkul_id == 7) {
                    $tugaspembagi = '5';
                } elseif ($matkul_id == 8) {
                    $tugaspembagi = '5';
                } elseif ($matkul_id == 9) {
                    $tugaspembagi = '5';
                } elseif ($matkul_id == 10) {
                    $tugaspembagi = '5';
                } elseif ($matkul_id == 11) {
                    $tugaspembagi = '5';
                } elseif ($matkul_id == 12) {
                    $tugaspembagi = '5';
                } elseif ($matkul_id == 13) {
                    $tugaspembagi = '5';
                } elseif ($matkul_id == 14) {
                    $tugaspembagi = '5';
                } elseif ($matkul_id == 15) {
                    $tugaspembagi = '5';
                }

                // ############################## Kalkulasi Nilai #######################################
                $data_presentase_nilai = $this->main_model->get_persentase_nilaiBY($matkul_id)->result_array();
                $absen = $data_presentase_nilai[0]['absen'] * 100;
                $kuis = $data_presentase_nilai[0]['kuis'] * 100;
                $tugas = $data_presentase_nilai[0]['tugas'] * 100;
                $uap = $data_presentase_nilai[0]['uap'] * 100;
                $tugasakhir = $data_presentase_nilai[0]['tugasakhir'] * 100;

                $totalabsen = $data_absensi[0]['a_1'] + $data_absensi[0]['a_2'] + $data_absensi[0]['a_3'] + $data_absensi[0]['a_4'] + $data_absensi[0]['a_5'] + $data_absensi[0]['a_6'] + $data_absensi[0]['a_7'] + $data_absensi[0]['a_8'] + $data_absensi[0]['a_9'] + $data_absensi[0]['a_10'];
                $hasiltugas = $data_nilai[0]['tugas1'] + $data_nilai[0]['tugas2'] + $data_nilai[0]['tugas3'] + $data_nilai[0]['tugas4'] + $data_nilai[0]['tugas5'];

                $totaltugas = $hasiltugas / $tugaspembagi;
                $total_absen = ($totalabsen * 10 * $data_presentase_nilai[0]['absen']);
                $total_tugas = $totaltugas * $data_presentase_nilai[0]['tugas'];
                $total_kuis = $data_nilai[0]['kuis'] * $data_presentase_nilai[0]['kuis'];
                $total_uap = $data_nilai[0]['uap'] * $data_presentase_nilai[0]['uap'];
                $total_tugas_akhir = $data_nilai[0]['tugasakhir'] * $data_presentase_nilai[0]['tugasakhir'];
                $total_seluruh = $total_absen + $total_tugas + $total_kuis + $total_uap + $total_tugas_akhir;

                // ################################# Tampil di JSON #####################################
                $tampil_ork['kelas'] = $matkul_ork[0]['kelas'];
                $tampil_ork['Tugas 1'] = $data_nilai[0]['tugas1'];
                $tampil_ork['Tugas 2'] = $data_nilai[0]['tugas2'];
                $tampil_ork['Tugas 3'] = $data_nilai[0]['tugas3'];
                $tampil_ork['Tugas 4'] = $data_nilai[0]['tugas4'];
                $tampil_ork['Tugas 5'] = $data_nilai[0]['tugas5'];
                $tampil_ork['Total Absen'] = $total_absen . " dari 10 Pertemuan";
                $tampil_ork['Total Tugas'] = $hasiltugas;
                $tampil_ork['Total Kuis'] = $data_nilai[0]['kuis'];
                $tampil_ork['Total UAP'] = $data_nilai[0]['uap'];
                $tampil_ork['Total Tugas Akhir'] = $data_nilai[0]['tugasakhir'];
                $tampil_ork['Persentase Absen'] = $absen . "% : " . round($total_absen);
                $tampil_ork['Persentase Tugas'] = $tugas . "% : " . round($total_tugas);
                $tampil_ork['Persentase Kuis'] = $kuis . "% : " . round($total_kuis);
                $tampil_ork['Persentase UAP'] = $uap . "% : " . round($total_uap);
                $tampil_ork['Persentase Tugas Akhir'] = $tugasakhir . "% : " . round($total_tugas_akhir);
                $tampil_ork['Total Nilai Akhir'] = round($total_seluruh);
                if ($total_seluruh >= 85) {
                    $tampil_ork['Grade'] =  "A";
                } elseif ($total_seluruh >= 75) {
                    $tampil_ork['Grade'] =  "B";
                } elseif ($total_seluruh >= 60) {
                    $tampil_ork['Grade'] =  "C";
                } elseif ($total_seluruh >= 50) {
                    $tampil_ork['Grade'] =  "D";
                } else {
                    $tampil_ork['Grade'] =  "E";
                }
            }
            if ($elektronika) {
                $matkul = $this->main_model->get_kelas_matkulBYKODE($elektronika)->result_array();
                $id_kelas_matkul = $matkul[0]['id_kelas_matkul'];
                $data_absensi = $this->main_model->get_all_absen_mhsBY($id_kelas_matkul, $id_user)->result_array();
                $data_nilai = $this->main_model->get_all_nilai_mhsBY($id_kelas_matkul, $id_user)->result_array();
                $matkul_id = $data_nilai[0]['id_matkul'];
                // panggil matkul sesuai dengan id
                if ($matkul_id == 1) {
                    $tugaspembagi = '5';
                } elseif ($matkul_id == 2) {
                    $tugaspembagi = '5';
                } elseif ($matkul_id == 3) {
                    $tugaspembagi = '5';
                } elseif ($matkul_id == 4) {
                    $tugaspembagi = '5';
                } elseif ($matkul_id == 5) {
                    $tugaspembagi = '5';
                } elseif ($matkul_id == 6) {
                    $tugaspembagi = '5';
                } elseif ($matkul_id == 7) {
                    $tugaspembagi = '5';
                } elseif ($matkul_id == 8) {
                    $tugaspembagi = '5';
                } elseif ($matkul_id == 9) {
                    $tugaspembagi = '5';
                } elseif ($matkul_id == 10) {
                    $tugaspembagi = '5';
                } elseif ($matkul_id == 11) {
                    $tugaspembagi = '5';
                } elseif ($matkul_id == 12) {
                    $tugaspembagi = '5';
                } elseif ($matkul_id == 13) {
                    $tugaspembagi = '5';
                } elseif ($matkul_id == 14) {
                    $tugaspembagi = '5';
                } elseif ($matkul_id == 15) {
                    $tugaspembagi = '5';
                }

                // ############################## Kalkulasi Nilai #######################################
                $data_presentase_nilai = $this->main_model->get_persentase_nilaiBY($matkul_id)->result_array();
                $absen = $data_presentase_nilai[0]['absen'] * 100;
                $kuis = $data_presentase_nilai[0]['kuis'] * 100;
                $tugas = $data_presentase_nilai[0]['tugas'] * 100;
                $uap = $data_presentase_nilai[0]['uap'] * 100;
                $tugasakhir = $data_presentase_nilai[0]['tugasakhir'] * 100;

                $totalabsen = $data_absensi[0]['a_1'] + $data_absensi[0]['a_2'] + $data_absensi[0]['a_3'] + $data_absensi[0]['a_4'] + $data_absensi[0]['a_5'] + $data_absensi[0]['a_6'] + $data_absensi[0]['a_7'] + $data_absensi[0]['a_8'] + $data_absensi[0]['a_9'] + $data_absensi[0]['a_10'];
                $hasiltugas = $data_nilai[0]['tugas1'] + $data_nilai[0]['tugas2'] + $data_nilai[0]['tugas3'] + $data_nilai[0]['tugas4'] + $data_nilai[0]['tugas5'];

                $totaltugas = $hasiltugas / $tugaspembagi;
                $total_absen = ($totalabsen * 10 * $data_presentase_nilai[0]['absen']);
                $total_tugas = $totaltugas * $data_presentase_nilai[0]['tugas'];
                $total_kuis = $data_nilai[0]['kuis'] * $data_presentase_nilai[0]['kuis'];
                $total_uap = $data_nilai[0]['uap'] * $data_presentase_nilai[0]['uap'];
                $total_tugas_akhir = $data_nilai[0]['tugasakhir'] * $data_presentase_nilai[0]['tugasakhir'];
                $total_seluruh = $total_absen + $total_tugas + $total_kuis + $total_uap + $total_tugas_akhir;

                // ################################# Tampil di JSON #####################################
                $tampil_elek['kelas'] = $matkul[0]['kelas'];
                $tampil_elek['Tugas 1'] = $data_nilai[0]['tugas1'];
                $tampil_elek['Tugas 2'] = $data_nilai[0]['tugas2'];
                $tampil_elek['Tugas 3'] = $data_nilai[0]['tugas3'];
                $tampil_elek['Tugas 4'] = $data_nilai[0]['tugas4'];
                $tampil_elek['Tugas 5'] = $data_nilai[0]['tugas5'];
                $tampil_elek['Total Absen'] = $total_absen . " dari 10 Pertemuan";
                $tampil_elek['Total Tugas'] = $hasiltugas;
                $tampil_elek['Total Kuis'] = $data_nilai[0]['kuis'];
                $tampil_elek['Total UAP'] = $data_nilai[0]['uap'];
                $tampil_elek['Total Tugas Akhir'] = $data_nilai[0]['tugasakhir'];
                $tampil_elek['Persentase Absen'] = $absen . "% : " . round($total_absen);
                $tampil_elek['Persentase Tugas'] = $tugas . "% : " . round($total_tugas);
                $tampil_elek['Persentase Kuis'] = $kuis . "% : " . round($total_kuis);
                $tampil_elek['Persentase UAP'] = $uap . "% : " . round($total_uap);
                $tampil_elek['Persentase Tugas Akhir'] = $tugasakhir . "% : " . round($total_tugas_akhir);
                $tampil_elek['Total Nilai Akhir'] = round($total_seluruh);
                if ($total_seluruh >= 85) {
                    $tampil_elek['Grade'] =  "A";
                } elseif ($total_seluruh >= 75) {
                    $tampil_elek['Grade'] =  "B";
                } elseif ($total_seluruh >= 60) {
                    $tampil_elek['Grade'] =  "C";
                } elseif ($total_seluruh >= 50) {
                    $tampil_elek['Grade'] =  "D";
                } else {
                    $tampil_elek['Grade'] =  "E";
                }
            }
            if ($sistem_digital_1) {
                $matkul = $this->main_model->get_kelas_matkulBYKODE($sistem_digital_1)->result_array();
                $id_kelas_matkul = $matkul[0]['id_kelas_matkul'];
                $data_absensi = $this->main_model->get_all_absen_mhsBY($id_kelas_matkul, $id_user)->result_array();
                $data_nilai = $this->main_model->get_all_nilai_mhsBY($id_kelas_matkul, $id_user)->result_array();
                $matkul_id = $data_nilai[0]['id_matkul'];
                // panggil matkul sesuai dengan id
                if ($matkul_id == 1) {
                    $tugaspembagi = '5';
                } elseif ($matkul_id == 2) {
                    $tugaspembagi = '5';
                } elseif ($matkul_id == 3) {
                    $tugaspembagi = '5';
                } elseif ($matkul_id == 4) {
                    $tugaspembagi = '5';
                } elseif ($matkul_id == 5) {
                    $tugaspembagi = '5';
                } elseif ($matkul_id == 6) {
                    $tugaspembagi = '5';
                } elseif ($matkul_id == 7) {
                    $tugaspembagi = '5';
                } elseif ($matkul_id == 8) {
                    $tugaspembagi = '5';
                } elseif ($matkul_id == 9) {
                    $tugaspembagi = '5';
                } elseif ($matkul_id == 10) {
                    $tugaspembagi = '5';
                } elseif ($matkul_id == 11) {
                    $tugaspembagi = '5';
                } elseif ($matkul_id == 12) {
                    $tugaspembagi = '5';
                } elseif ($matkul_id == 13) {
                    $tugaspembagi = '5';
                } elseif ($matkul_id == 14) {
                    $tugaspembagi = '5';
                } elseif ($matkul_id == 15) {
                    $tugaspembagi = '5';
                }

                // ############################## Kalkulasi Nilai #######################################
                $data_presentase_nilai = $this->main_model->get_persentase_nilaiBY($matkul_id)->result_array();
                $absen = $data_presentase_nilai[0]['absen'] * 100;
                $kuis = $data_presentase_nilai[0]['kuis'] * 100;
                $tugas = $data_presentase_nilai[0]['tugas'] * 100;
                $uap = $data_presentase_nilai[0]['uap'] * 100;
                $tugasakhir = $data_presentase_nilai[0]['tugasakhir'] * 100;

                $totalabsen = $data_absensi[0]['a_1'] + $data_absensi[0]['a_2'] + $data_absensi[0]['a_3'] + $data_absensi[0]['a_4'] + $data_absensi[0]['a_5'] + $data_absensi[0]['a_6'] + $data_absensi[0]['a_7'] + $data_absensi[0]['a_8'] + $data_absensi[0]['a_9'] + $data_absensi[0]['a_10'];
                $hasiltugas = $data_nilai[0]['tugas1'] + $data_nilai[0]['tugas2'] + $data_nilai[0]['tugas3'] + $data_nilai[0]['tugas4'] + $data_nilai[0]['tugas5'];

                $totaltugas = $hasiltugas / $tugaspembagi;
                $total_absen = ($totalabsen * 10 * $data_presentase_nilai[0]['absen']);
                $total_tugas = $totaltugas * $data_presentase_nilai[0]['tugas'];
                $total_kuis = $data_nilai[0]['kuis'] * $data_presentase_nilai[0]['kuis'];
                $total_uap = $data_nilai[0]['uap'] * $data_presentase_nilai[0]['uap'];
                $total_tugas_akhir = $data_nilai[0]['tugasakhir'] * $data_presentase_nilai[0]['tugasakhir'];
                $total_seluruh = $total_absen + $total_tugas + $total_kuis + $total_uap + $total_tugas_akhir;

                // ################################# Tampil di JSON #####################################
                $tampil_sdg['kelas'] = $matkul[0]['kelas'];
                $tampil_sdg['Tugas 1'] = $data_nilai[0]['tugas1'];
                $tampil_sdg['Tugas 2'] = $data_nilai[0]['tugas2'];
                $tampil_sdg['Tugas 3'] = $data_nilai[0]['tugas3'];
                $tampil_sdg['Tugas 4'] = $data_nilai[0]['tugas4'];
                $tampil_sdg['Tugas 5'] = $data_nilai[0]['tugas5'];
                $tampil_sdg['Total Absen'] = $total_absen . " dari 10 Pertemuan";
                $tampil_sdg['Total Tugas'] = $hasiltugas;
                $tampil_sdg['Total Kuis'] = $data_nilai[0]['kuis'];
                $tampil_sdg['Total UAP'] = $data_nilai[0]['uap'];
                $tampil_sdg['Total Tugas Akhir'] = $data_nilai[0]['tugasakhir'];
                $tampil_sdg['Persentase Absen'] = $absen . "% : " . round($total_absen);
                $tampil_sdg['Persentase Tugas'] = $tugas . "% : " . round($total_tugas);
                $tampil_sdg['Persentase Kuis'] = $kuis . "% : " . round($total_kuis);
                $tampil_sdg['Persentase UAP'] = $uap . "% : " . round($total_uap);
                $tampil_sdg['Persentase Tugas Akhir'] = $tugasakhir . "% : " . round($total_tugas_akhir);
                $tampil_sdg['Total Nilai Akhir'] = round($total_seluruh);
                if ($total_seluruh >= 85) {
                    $tampil_sdg['Grade'] =  "A";
                } elseif ($total_seluruh >= 75) {
                    $tampil_sdg['Grade'] =  "B";
                } elseif ($total_seluruh >= 60) {
                    $tampil_sdg['Grade'] =  "C";
                } elseif ($total_seluruh >= 50) {
                    $tampil_sdg['Grade'] =  "D";
                } else {
                    $tampil_sdg['Grade'] =  "E";
                }
            }
            if ($jaringan_komputer) {
                $matkul = $this->main_model->get_kelas_matkulBYKODE($jaringan_komputer)->result_array();
                $id_kelas_matkul = $matkul[0]['id_kelas_matkul'];
                $data_absensi = $this->main_model->get_all_absen_mhsBY($id_kelas_matkul, $id_user)->result_array();
                $data_nilai = $this->main_model->get_all_nilai_mhsBY($id_kelas_matkul, $id_user)->result_array();
                $matkul_id = $data_nilai[0]['id_matkul'];
                // panggil matkul sesuai dengan id
                if ($matkul_id == 1) {
                    $tugaspembagi = '5';
                } elseif ($matkul_id == 2) {
                    $tugaspembagi = '5';
                } elseif ($matkul_id == 3) {
                    $tugaspembagi = '5';
                } elseif ($matkul_id == 4) {
                    $tugaspembagi = '5';
                } elseif ($matkul_id == 5) {
                    $tugaspembagi = '5';
                } elseif ($matkul_id == 6) {
                    $tugaspembagi = '5';
                } elseif ($matkul_id == 7) {
                    $tugaspembagi = '5';
                } elseif ($matkul_id == 8) {
                    $tugaspembagi = '5';
                } elseif ($matkul_id == 9) {
                    $tugaspembagi = '5';
                } elseif ($matkul_id == 10) {
                    $tugaspembagi = '5';
                } elseif ($matkul_id == 11) {
                    $tugaspembagi = '5';
                } elseif ($matkul_id == 12) {
                    $tugaspembagi = '5';
                } elseif ($matkul_id == 13) {
                    $tugaspembagi = '5';
                } elseif ($matkul_id == 14) {
                    $tugaspembagi = '5';
                } elseif ($matkul_id == 15) {
                    $tugaspembagi = '5';
                }

                // ############################## Kalkulasi Nilai #######################################
                $data_presentase_nilai = $this->main_model->get_persentase_nilaiBY($matkul_id)->result_array();
                $absen = $data_presentase_nilai[0]['absen'] * 100;
                $kuis = $data_presentase_nilai[0]['kuis'] * 100;
                $tugas = $data_presentase_nilai[0]['tugas'] * 100;
                $uap = $data_presentase_nilai[0]['uap'] * 100;
                $tugasakhir = $data_presentase_nilai[0]['tugasakhir'] * 100;

                $totalabsen = $data_absensi[0]['a_1'] + $data_absensi[0]['a_2'] + $data_absensi[0]['a_3'] + $data_absensi[0]['a_4'] + $data_absensi[0]['a_5'] + $data_absensi[0]['a_6'] + $data_absensi[0]['a_7'] + $data_absensi[0]['a_8'] + $data_absensi[0]['a_9'] + $data_absensi[0]['a_10'];
                $hasiltugas = $data_nilai[0]['tugas1'] + $data_nilai[0]['tugas2'] + $data_nilai[0]['tugas3'] + $data_nilai[0]['tugas4'] + $data_nilai[0]['tugas5'];

                $totaltugas = $hasiltugas / $tugaspembagi;
                $total_absen = ($totalabsen * 10 * $data_presentase_nilai[0]['absen']);
                $total_tugas = $totaltugas * $data_presentase_nilai[0]['tugas'];
                $total_kuis = $data_nilai[0]['kuis'] * $data_presentase_nilai[0]['kuis'];
                $total_uap = $data_nilai[0]['uap'] * $data_presentase_nilai[0]['uap'];
                $total_tugas_akhir = $data_nilai[0]['tugasakhir'] * $data_presentase_nilai[0]['tugasakhir'];
                $total_seluruh = $total_absen + $total_tugas + $total_kuis + $total_uap + $total_tugas_akhir;

                // ################################# Tampil di JSON #####################################
                $tampil_jrk['kelas'] = $matkul[0]['kelas'];
                $tampil_jrk['Tugas 1'] = $data_nilai[0]['tugas1'];
                $tampil_jrk['Tugas 2'] = $data_nilai[0]['tugas2'];
                $tampil_jrk['Tugas 3'] = $data_nilai[0]['tugas3'];
                $tampil_jrk['Tugas 4'] = $data_nilai[0]['tugas4'];
                $tampil_jrk['Tugas 5'] = $data_nilai[0]['tugas5'];
                $tampil_jrk['Total Absen'] = $total_absen . " dari 10 Pertemuan";
                $tampil_jrk['Total Tugas'] = $hasiltugas;
                $tampil_jrk['Total Kuis'] = $data_nilai[0]['kuis'];
                $tampil_jrk['Total UAP'] = $data_nilai[0]['uap'];
                $tampil_jrk['Total Tugas Akhir'] = $data_nilai[0]['tugasakhir'];
                $tampil_jrk['Persentase Absen'] = $absen . "% : " . round($total_absen);
                $tampil_jrk['Persentase Tugas'] = $tugas . "% : " . round($total_tugas);
                $tampil_jrk['Persentase Kuis'] = $kuis . "% : " . round($total_kuis);
                $tampil_jrk['Persentase UAP'] = $uap . "% : " . round($total_uap);
                $tampil_jrk['Persentase Tugas Akhir'] = $tugasakhir . "% : " . round($total_tugas_akhir);
                $tampil_jrk['Total Nilai Akhir'] = round($total_seluruh);
                if ($total_seluruh >= 85) {
                    $tampil_jrk['Grade'] =  "A";
                } elseif ($total_seluruh >= 75) {
                    $tampil_jrk['Grade'] =  "B";
                } elseif ($total_seluruh >= 60) {
                    $tampil_jrk['Grade'] =  "C";
                } elseif ($total_seluruh >= 50) {
                    $tampil_jrk['Grade'] =  "D";
                } else {
                    $tampil_jrk['Grade'] =  "E";
                }
            }
            if ($sistem_digital_2) {
                $matkul = $this->main_model->get_kelas_matkulBYKODE($sistem_digital_2)->result_array();
                $id_kelas_matkul = $matkul[0]['id_kelas_matkul'];
                $data_absensi = $this->main_model->get_all_absen_mhsBY($id_kelas_matkul, $id_user)->result_array();
                $data_nilai = $this->main_model->get_all_nilai_mhsBY($id_kelas_matkul, $id_user)->result_array();
                $matkul_id = $data_nilai[0]['id_matkul'];
                // panggil matkul sesuai dengan id
                if ($matkul_id == 1) {
                    $tugaspembagi = '5';
                } elseif ($matkul_id == 2) {
                    $tugaspembagi = '5';
                } elseif ($matkul_id == 3) {
                    $tugaspembagi = '5';
                } elseif ($matkul_id == 4) {
                    $tugaspembagi = '5';
                } elseif ($matkul_id == 5) {
                    $tugaspembagi = '5';
                } elseif ($matkul_id == 6) {
                    $tugaspembagi = '5';
                } elseif ($matkul_id == 7) {
                    $tugaspembagi = '5';
                } elseif ($matkul_id == 8) {
                    $tugaspembagi = '5';
                } elseif ($matkul_id == 9) {
                    $tugaspembagi = '5';
                } elseif ($matkul_id == 10) {
                    $tugaspembagi = '5';
                } elseif ($matkul_id == 11) {
                    $tugaspembagi = '5';
                } elseif ($matkul_id == 12) {
                    $tugaspembagi = '5';
                } elseif ($matkul_id == 13) {
                    $tugaspembagi = '5';
                } elseif ($matkul_id == 14) {
                    $tugaspembagi = '5';
                } elseif ($matkul_id == 15) {
                    $tugaspembagi = '5';
                }

                // ############################## Kalkulasi Nilai #######################################
                $data_presentase_nilai = $this->main_model->get_persentase_nilaiBY($matkul_id)->result_array();
                $absen = $data_presentase_nilai[0]['absen'] * 100;
                $kuis = $data_presentase_nilai[0]['kuis'] * 100;
                $tugas = $data_presentase_nilai[0]['tugas'] * 100;
                $uap = $data_presentase_nilai[0]['uap'] * 100;
                $tugasakhir = $data_presentase_nilai[0]['tugasakhir'] * 100;

                $totalabsen = $data_absensi[0]['a_1'] + $data_absensi[0]['a_2'] + $data_absensi[0]['a_3'] + $data_absensi[0]['a_4'] + $data_absensi[0]['a_5'] + $data_absensi[0]['a_6'] + $data_absensi[0]['a_7'] + $data_absensi[0]['a_8'] + $data_absensi[0]['a_9'] + $data_absensi[0]['a_10'];
                $hasiltugas = $data_nilai[0]['tugas1'] + $data_nilai[0]['tugas2'] + $data_nilai[0]['tugas3'] + $data_nilai[0]['tugas4'] + $data_nilai[0]['tugas5'];

                $totaltugas = $hasiltugas / $tugaspembagi;
                $total_absen = ($totalabsen * 10 * $data_presentase_nilai[0]['absen']);
                $total_tugas = $totaltugas * $data_presentase_nilai[0]['tugas'];
                $total_kuis = $data_nilai[0]['kuis'] * $data_presentase_nilai[0]['kuis'];
                $total_uap = $data_nilai[0]['uap'] * $data_presentase_nilai[0]['uap'];
                $total_tugas_akhir = $data_nilai[0]['tugasakhir'] * $data_presentase_nilai[0]['tugasakhir'];
                $total_seluruh = $total_absen + $total_tugas + $total_kuis + $total_uap + $total_tugas_akhir;

                // ################################# Tampil di JSON #####################################
                $tampil_sdg2['kelas'] = $matkul[0]['kelas'];
                $tampil_sdg2['Tugas 1'] = $data_nilai[0]['tugas1'];
                $tampil_sdg2['Tugas 2'] = $data_nilai[0]['tugas2'];
                $tampil_sdg2['Tugas 3'] = $data_nilai[0]['tugas3'];
                $tampil_sdg2['Tugas 4'] = $data_nilai[0]['tugas4'];
                $tampil_sdg2['Tugas 5'] = $data_nilai[0]['tugas5'];
                $tampil_sdg2['Total Absen'] = $total_absen . " dari 10 Pertemuan";
                $tampil_sdg2['Total Tugas'] = $hasiltugas;
                $tampil_sdg2['Total Kuis'] = $data_nilai[0]['kuis'];
                $tampil_sdg2['Total UAP'] = $data_nilai[0]['uap'];
                $tampil_sdg2['Total Tugas Akhir'] = $data_nilai[0]['tugasakhir'];
                $tampil_sdg2['Persentase Absen'] = $absen . "% : " . round($total_absen);
                $tampil_sdg2['Persentase Tugas'] = $tugas . "% : " . round($total_tugas);
                $tampil_sdg2['Persentase Kuis'] = $kuis . "% : " . round($total_kuis);
                $tampil_sdg2['Persentase UAP'] = $uap . "% : " . round($total_uap);
                $tampil_sdg2['Persentase Tugas Akhir'] = $tugasakhir . "% : " . round($total_tugas_akhir);
                $tampil_sdg2['Total Nilai Akhir'] = round($total_seluruh);
                if ($total_seluruh >= 85) {
                    $tampil_sdg2['Grade'] =  "A";
                } elseif ($total_seluruh >= 75) {
                    $tampil_sdg2['Grade'] =  "B";
                } elseif ($total_seluruh >= 60) {
                    $tampil_sdg2['Grade'] =  "C";
                } elseif ($total_seluruh >= 50) {
                    $tampil_sdg2['Grade'] =  "D";
                } else {
                    $tampil_sdg2['Grade'] =  "E";
                }
            }
            if ($sistem_mikroprosesor) {
                $matkul = $this->main_model->get_kelas_matkulBYKODE($sistem_mikroprosesor)->result_array();
                $id_kelas_matkul = $matkul[0]['id_kelas_matkul'];
                $data_absensi = $this->main_model->get_all_absen_mhsBY($id_kelas_matkul, $id_user)->result_array();
                $data_nilai = $this->main_model->get_all_nilai_mhsBY($id_kelas_matkul, $id_user)->result_array();
                $matkul_id = $data_nilai[0]['id_matkul'];
                // panggil matkul sesuai dengan id
                if ($matkul_id == 1) {
                    $tugaspembagi = '5';
                } elseif ($matkul_id == 2) {
                    $tugaspembagi = '5';
                } elseif ($matkul_id == 3) {
                    $tugaspembagi = '5';
                } elseif ($matkul_id == 4) {
                    $tugaspembagi = '5';
                } elseif ($matkul_id == 5) {
                    $tugaspembagi = '5';
                } elseif ($matkul_id == 6) {
                    $tugaspembagi = '5';
                } elseif ($matkul_id == 7) {
                    $tugaspembagi = '5';
                } elseif ($matkul_id == 8) {
                    $tugaspembagi = '5';
                } elseif ($matkul_id == 9) {
                    $tugaspembagi = '5';
                } elseif ($matkul_id == 10) {
                    $tugaspembagi = '5';
                } elseif ($matkul_id == 11) {
                    $tugaspembagi = '5';
                } elseif ($matkul_id == 12) {
                    $tugaspembagi = '5';
                } elseif ($matkul_id == 13) {
                    $tugaspembagi = '5';
                } elseif ($matkul_id == 14) {
                    $tugaspembagi = '5';
                } elseif ($matkul_id == 15) {
                    $tugaspembagi = '5';
                }

                // ############################## Kalkulasi Nilai #######################################
                $data_presentase_nilai = $this->main_model->get_persentase_nilaiBY($matkul_id)->result_array();
                $absen = $data_presentase_nilai[0]['absen'] * 100;
                $kuis = $data_presentase_nilai[0]['kuis'] * 100;
                $tugas = $data_presentase_nilai[0]['tugas'] * 100;
                $uap = $data_presentase_nilai[0]['uap'] * 100;
                $tugasakhir = $data_presentase_nilai[0]['tugasakhir'] * 100;

                $totalabsen = $data_absensi[0]['a_1'] + $data_absensi[0]['a_2'] + $data_absensi[0]['a_3'] + $data_absensi[0]['a_4'] + $data_absensi[0]['a_5'] + $data_absensi[0]['a_6'] + $data_absensi[0]['a_7'] + $data_absensi[0]['a_8'] + $data_absensi[0]['a_9'] + $data_absensi[0]['a_10'];
                $hasiltugas = $data_nilai[0]['tugas1'] + $data_nilai[0]['tugas2'] + $data_nilai[0]['tugas3'] + $data_nilai[0]['tugas4'] + $data_nilai[0]['tugas5'];

                $totaltugas = $hasiltugas / $tugaspembagi;
                $total_absen = ($totalabsen * 10 * $data_presentase_nilai[0]['absen']);
                $total_tugas = $totaltugas * $data_presentase_nilai[0]['tugas'];
                $total_kuis = $data_nilai[0]['kuis'] * $data_presentase_nilai[0]['kuis'];
                $total_uap = $data_nilai[0]['uap'] * $data_presentase_nilai[0]['uap'];
                $total_tugas_akhir = $data_nilai[0]['tugasakhir'] * $data_presentase_nilai[0]['tugasakhir'];
                $total_seluruh = $total_absen + $total_tugas + $total_kuis + $total_uap + $total_tugas_akhir;

                // ################################# Tampil di JSON #####################################
                $tampil_smk['kelas'] = $matkul[0]['kelas'];
                $tampil_smk['Tugas 1'] = $data_nilai[0]['tugas1'];
                $tampil_smk['Tugas 2'] = $data_nilai[0]['tugas2'];
                $tampil_smk['Tugas 3'] = $data_nilai[0]['tugas3'];
                $tampil_smk['Tugas 4'] = $data_nilai[0]['tugas4'];
                $tampil_smk['Tugas 5'] = $data_nilai[0]['tugas5'];
                $tampil_smk['Total Absen'] = $total_absen . " dari 10 Pertemuan";
                $tampil_smk['Total Tugas'] = $hasiltugas;
                $tampil_smk['Total Kuis'] = $data_nilai[0]['kuis'];
                $tampil_smk['Total UAP'] = $data_nilai[0]['uap'];
                $tampil_smk['Total Tugas Akhir'] = $data_nilai[0]['tugasakhir'];
                $tampil_smk['Persentase Absen'] = $absen . "% : " . round($total_absen);
                $tampil_smk['Persentase Tugas'] = $tugas . "% : " . round($total_tugas);
                $tampil_smk['Persentase Kuis'] = $kuis . "% : " . round($total_kuis);
                $tampil_smk['Persentase UAP'] = $uap . "% : " . round($total_uap);
                $tampil_smk['Persentase Tugas Akhir'] = $tugasakhir . "% : " . round($total_tugas_akhir);
                $tampil_smk['Total Nilai Akhir'] = round($total_seluruh);
                if ($total_seluruh >= 85) {
                    $tampil_smk['Grade'] =  "A";
                } elseif ($total_seluruh >= 75) {
                    $tampil_smk['Grade'] =  "B";
                } elseif ($total_seluruh >= 60) {
                    $tampil_smk['Grade'] =  "C";
                } elseif ($total_seluruh >= 50) {
                    $tampil_smk['Grade'] =  "D";
                } else {
                    $tampil_smk['Grade'] =  "E";
                }
            }
            if ($otomasi) {
                $matkul = $this->main_model->get_kelas_matkulBYKODE($otomasi)->result_array();
                $id_kelas_matkul = $matkul[0]['id_kelas_matkul'];
                $data_absensi = $this->main_model->get_all_absen_mhsBY($id_kelas_matkul, $id_user)->result_array();
                $data_nilai = $this->main_model->get_all_nilai_mhsBY($id_kelas_matkul, $id_user)->result_array();
                $matkul_id = $data_nilai[0]['id_matkul'];
                // panggil matkul sesuai dengan id
                if ($matkul_id == 1) {
                    $tugaspembagi = '5';
                } elseif ($matkul_id == 2) {
                    $tugaspembagi = '5';
                } elseif ($matkul_id == 3) {
                    $tugaspembagi = '5';
                } elseif ($matkul_id == 4) {
                    $tugaspembagi = '5';
                } elseif ($matkul_id == 5) {
                    $tugaspembagi = '5';
                } elseif ($matkul_id == 6) {
                    $tugaspembagi = '5';
                } elseif ($matkul_id == 7) {
                    $tugaspembagi = '5';
                } elseif ($matkul_id == 8) {
                    $tugaspembagi = '5';
                } elseif ($matkul_id == 9) {
                    $tugaspembagi = '5';
                } elseif ($matkul_id == 10) {
                    $tugaspembagi = '5';
                } elseif ($matkul_id == 11) {
                    $tugaspembagi = '5';
                } elseif ($matkul_id == 12) {
                    $tugaspembagi = '5';
                } elseif ($matkul_id == 13) {
                    $tugaspembagi = '5';
                } elseif ($matkul_id == 14) {
                    $tugaspembagi = '5';
                } elseif ($matkul_id == 15) {
                    $tugaspembagi = '5';
                }

                // ############################## Kalkulasi Nilai #######################################
                $data_presentase_nilai = $this->main_model->get_persentase_nilaiBY($matkul_id)->result_array();
                $absen = $data_presentase_nilai[0]['absen'] * 100;
                $kuis = $data_presentase_nilai[0]['kuis'] * 100;
                $tugas = $data_presentase_nilai[0]['tugas'] * 100;
                $uap = $data_presentase_nilai[0]['uap'] * 100;
                $tugasakhir = $data_presentase_nilai[0]['tugasakhir'] * 100;

                $totalabsen = $data_absensi[0]['a_1'] + $data_absensi[0]['a_2'] + $data_absensi[0]['a_3'] + $data_absensi[0]['a_4'] + $data_absensi[0]['a_5'] + $data_absensi[0]['a_6'] + $data_absensi[0]['a_7'] + $data_absensi[0]['a_8'] + $data_absensi[0]['a_9'] + $data_absensi[0]['a_10'];
                $hasiltugas = $data_nilai[0]['tugas1'] + $data_nilai[0]['tugas2'] + $data_nilai[0]['tugas3'] + $data_nilai[0]['tugas4'] + $data_nilai[0]['tugas5'];

                $totaltugas = $hasiltugas / $tugaspembagi;
                $total_absen = ($totalabsen * 10 * $data_presentase_nilai[0]['absen']);
                $total_tugas = $totaltugas * $data_presentase_nilai[0]['tugas'];
                $total_kuis = $data_nilai[0]['kuis'] * $data_presentase_nilai[0]['kuis'];
                $total_uap = $data_nilai[0]['uap'] * $data_presentase_nilai[0]['uap'];
                $total_tugas_akhir = $data_nilai[0]['tugasakhir'] * $data_presentase_nilai[0]['tugasakhir'];
                $total_seluruh = $total_absen + $total_tugas + $total_kuis + $total_uap + $total_tugas_akhir;

                // ################################# Tampil di JSON #####################################
                $tampil_iot['kelas'] = $matkul[0]['kelas'];
                $tampil_iot['Tugas 1'] = $data_nilai[0]['tugas1'];
                $tampil_iot['Tugas 2'] = $data_nilai[0]['tugas2'];
                $tampil_iot['Tugas 3'] = $data_nilai[0]['tugas3'];
                $tampil_iot['Tugas 4'] = $data_nilai[0]['tugas4'];
                $tampil_iot['Tugas 5'] = $data_nilai[0]['tugas5'];
                $tampil_iot['Total Absen'] = $total_absen . " dari 10 Pertemuan";
                $tampil_iot['Total Tugas'] = $hasiltugas;
                $tampil_iot['Total Kuis'] = $data_nilai[0]['kuis'];
                $tampil_iot['Total UAP'] = $data_nilai[0]['uap'];
                $tampil_iot['Total Tugas Akhir'] = $data_nilai[0]['tugasakhir'];
                $tampil_iot['Persentase Absen'] = $absen . "% : " . round($total_absen);
                $tampil_iot['Persentase Tugas'] = $tugas . "% : " . round($total_tugas);
                $tampil_iot['Persentase Kuis'] = $kuis . "% : " . round($total_kuis);
                $tampil_iot['Persentase UAP'] = $uap . "% : " . round($total_uap);
                $tampil_iot['Persentase Tugas Akhir'] = $tugasakhir . "% : " . round($total_tugas_akhir);
                $tampil_iot['Total Nilai Akhir'] = round($total_seluruh);
                if ($total_seluruh >= 85) {
                    $tampil_iot['Grade'] =  "A";
                } elseif ($total_seluruh >= 75) {
                    $tampil_iot['Grade'] =  "B";
                } elseif ($total_seluruh >= 60) {
                    $tampil_iot['Grade'] =  "C";
                } elseif ($total_seluruh >= 50) {
                    $tampil_iot['Grade'] =  "D";
                } else {
                    $tampil_iot['Grade'] =  "E";
                }
            }
            if ($administrasi_jaringan) {
                $matkul = $this->main_model->get_kelas_matkulBYKODE($administrasi_jaringan)->result_array();
                $id_kelas_matkul = $matkul[0]['id_kelas_matkul'];
                $data_absensi = $this->main_model->get_all_absen_mhsBY($id_kelas_matkul, $id_user)->result_array();
                $data_nilai = $this->main_model->get_all_nilai_mhsBY($id_kelas_matkul, $id_user)->result_array();
                $matkul_id = $data_nilai[0]['id_matkul'];
                // panggil matkul sesuai dengan id
                if ($matkul_id == 1) {
                    $tugaspembagi = '5';
                } elseif ($matkul_id == 2) {
                    $tugaspembagi = '5';
                } elseif ($matkul_id == 3) {
                    $tugaspembagi = '5';
                } elseif ($matkul_id == 4) {
                    $tugaspembagi = '5';
                } elseif ($matkul_id == 5) {
                    $tugaspembagi = '5';
                } elseif ($matkul_id == 6) {
                    $tugaspembagi = '5';
                } elseif ($matkul_id == 7) {
                    $tugaspembagi = '5';
                } elseif ($matkul_id == 8) {
                    $tugaspembagi = '5';
                } elseif ($matkul_id == 9) {
                    $tugaspembagi = '5';
                } elseif ($matkul_id == 10) {
                    $tugaspembagi = '5';
                } elseif ($matkul_id == 11) {
                    $tugaspembagi = '5';
                } elseif ($matkul_id == 12) {
                    $tugaspembagi = '5';
                } elseif ($matkul_id == 13) {
                    $tugaspembagi = '5';
                } elseif ($matkul_id == 14) {
                    $tugaspembagi = '5';
                } elseif ($matkul_id == 15) {
                    $tugaspembagi = '5';
                }

                // ############################## Kalkulasi Nilai #######################################
                $data_presentase_nilai = $this->main_model->get_persentase_nilaiBY($matkul_id)->result_array();
                $absen = $data_presentase_nilai[0]['absen'] * 100;
                $kuis = $data_presentase_nilai[0]['kuis'] * 100;
                $tugas = $data_presentase_nilai[0]['tugas'] * 100;
                $uap = $data_presentase_nilai[0]['uap'] * 100;
                $tugasakhir = $data_presentase_nilai[0]['tugasakhir'] * 100;

                $totalabsen = $data_absensi[0]['a_1'] + $data_absensi[0]['a_2'] + $data_absensi[0]['a_3'] + $data_absensi[0]['a_4'] + $data_absensi[0]['a_5'] + $data_absensi[0]['a_6'] + $data_absensi[0]['a_7'] + $data_absensi[0]['a_8'] + $data_absensi[0]['a_9'] + $data_absensi[0]['a_10'];
                $hasiltugas = $data_nilai[0]['tugas1'] + $data_nilai[0]['tugas2'] + $data_nilai[0]['tugas3'] + $data_nilai[0]['tugas4'] + $data_nilai[0]['tugas5'];

                $totaltugas = $hasiltugas / $tugaspembagi;
                $total_absen = ($totalabsen * 10 * $data_presentase_nilai[0]['absen']);
                $total_tugas = $totaltugas * $data_presentase_nilai[0]['tugas'];
                $total_kuis = $data_nilai[0]['kuis'] * $data_presentase_nilai[0]['kuis'];
                $total_uap = $data_nilai[0]['uap'] * $data_presentase_nilai[0]['uap'];
                $total_tugas_akhir = $data_nilai[0]['tugasakhir'] * $data_presentase_nilai[0]['tugasakhir'];
                $total_seluruh = $total_absen + $total_tugas + $total_kuis + $total_uap + $total_tugas_akhir;

                // ################################# Tampil di JSON #####################################
                $tampil_adm['kelas'] = $matkul[0]['kelas'];
                $tampil_adm['Tugas 1'] = $data_nilai[0]['tugas1'];
                $tampil_adm['Tugas 2'] = $data_nilai[0]['tugas2'];
                $tampil_adm['Tugas 3'] = $data_nilai[0]['tugas3'];
                $tampil_adm['Tugas 4'] = $data_nilai[0]['tugas4'];
                $tampil_adm['Tugas 5'] = $data_nilai[0]['tugas5'];
                $tampil_adm['Total Absen'] = $total_absen . " dari 10 Pertemuan";
                $tampil_adm['Total Tugas'] = $hasiltugas;
                $tampil_adm['Total Kuis'] = $data_nilai[0]['kuis'];
                $tampil_adm['Total UAP'] = $data_nilai[0]['uap'];
                $tampil_adm['Total Tugas Akhir'] = $data_nilai[0]['tugasakhir'];
                $tampil_adm['Persentase Absen'] = $absen . "% : " . round($total_absen);
                $tampil_adm['Persentase Tugas'] = $tugas . "% : " . round($total_tugas);
                $tampil_adm['Persentase Kuis'] = $kuis . "% : " . round($total_kuis);
                $tampil_adm['Persentase UAP'] = $uap . "% : " . round($total_uap);
                $tampil_adm['Persentase Tugas Akhir'] = $tugasakhir . "% : " . round($total_tugas_akhir);
                $tampil_adm['Total Nilai Akhir'] = round($total_seluruh);
                if ($total_seluruh >= 85) {
                    $tampil_adm['Grade'] =  "A";
                } elseif ($total_seluruh >= 75) {
                    $tampil_adm['Grade'] =  "B";
                } elseif ($total_seluruh >= 60) {
                    $tampil_adm['Grade'] =  "C";
                } elseif ($total_seluruh >= 50) {
                    $tampil_adm['Grade'] =  "D";
                } else {
                    $tampil_adm['Grade'] =  "E";
                }
            }
            if ($sistem_pemrograman_mikroprosesor) {
                $matkul = $this->main_model->get_kelas_matkulBYKODE($sistem_pemrograman_mikroprosesor)->result_array();
                $id_kelas_matkul = $matkul[0]['id_kelas_matkul'];
                $data_absensi = $this->main_model->get_all_absen_mhsBY($id_kelas_matkul, $id_user)->result_array();
                $data_nilai = $this->main_model->get_all_nilai_mhsBY($id_kelas_matkul, $id_user)->result_array();
                $matkul_id = $data_nilai[0]['id_matkul'];
                // panggil matkul sesuai dengan id
                if ($matkul_id == 1) {
                    $tugaspembagi = '5';
                } elseif ($matkul_id == 2) {
                    $tugaspembagi = '5';
                } elseif ($matkul_id == 3) {
                    $tugaspembagi = '5';
                } elseif ($matkul_id == 4) {
                    $tugaspembagi = '5';
                } elseif ($matkul_id == 5) {
                    $tugaspembagi = '5';
                } elseif ($matkul_id == 6) {
                    $tugaspembagi = '5';
                } elseif ($matkul_id == 7) {
                    $tugaspembagi = '5';
                } elseif ($matkul_id == 8) {
                    $tugaspembagi = '5';
                } elseif ($matkul_id == 9) {
                    $tugaspembagi = '5';
                } elseif ($matkul_id == 10) {
                    $tugaspembagi = '5';
                } elseif ($matkul_id == 11) {
                    $tugaspembagi = '5';
                } elseif ($matkul_id == 12) {
                    $tugaspembagi = '5';
                } elseif ($matkul_id == 13) {
                    $tugaspembagi = '5';
                } elseif ($matkul_id == 14) {
                    $tugaspembagi = '5';
                } elseif ($matkul_id == 15) {
                    $tugaspembagi = '5';
                }

                // ############################## Kalkulasi Nilai #######################################
                $data_presentase_nilai = $this->main_model->get_persentase_nilaiBY($matkul_id)->result_array();
                $absen = $data_presentase_nilai[0]['absen'] * 100;
                $kuis = $data_presentase_nilai[0]['kuis'] * 100;
                $tugas = $data_presentase_nilai[0]['tugas'] * 100;
                $uap = $data_presentase_nilai[0]['uap'] * 100;
                $tugasakhir = $data_presentase_nilai[0]['tugasakhir'] * 100;

                $totalabsen = $data_absensi[0]['a_1'] + $data_absensi[0]['a_2'] + $data_absensi[0]['a_3'] + $data_absensi[0]['a_4'] + $data_absensi[0]['a_5'] + $data_absensi[0]['a_6'] + $data_absensi[0]['a_7'] + $data_absensi[0]['a_8'] + $data_absensi[0]['a_9'] + $data_absensi[0]['a_10'];
                $hasiltugas = $data_nilai[0]['tugas1'] + $data_nilai[0]['tugas2'] + $data_nilai[0]['tugas3'] + $data_nilai[0]['tugas4'] + $data_nilai[0]['tugas5'];

                $totaltugas = $hasiltugas / $tugaspembagi;
                $total_absen = ($totalabsen * 10 * $data_presentase_nilai[0]['absen']);
                $total_tugas = $totaltugas * $data_presentase_nilai[0]['tugas'];
                $total_kuis = $data_nilai[0]['kuis'] * $data_presentase_nilai[0]['kuis'];
                $total_uap = $data_nilai[0]['uap'] * $data_presentase_nilai[0]['uap'];
                $total_tugas_akhir = $data_nilai[0]['tugasakhir'] * $data_presentase_nilai[0]['tugasakhir'];
                $total_seluruh = $total_absen + $total_tugas + $total_kuis + $total_uap + $total_tugas_akhir;

                // ################################# Tampil di JSON #####################################
                $tampil_spm['kelas'] = $matkul[0]['kelas'];
                $tampil_spm['Tugas 1'] = $data_nilai[0]['tugas1'];
                $tampil_spm['Tugas 2'] = $data_nilai[0]['tugas2'];
                $tampil_spm['Tugas 3'] = $data_nilai[0]['tugas3'];
                $tampil_spm['Tugas 4'] = $data_nilai[0]['tugas4'];
                $tampil_spm['Tugas 5'] = $data_nilai[0]['tugas5'];
                $tampil_spm['Total Absen'] = $total_absen . " dari 10 Pertemuan";
                $tampil_spm['Total Tugas'] = $hasiltugas;
                $tampil_spm['Total Kuis'] = $data_nilai[0]['kuis'];
                $tampil_spm['Total UAP'] = $data_nilai[0]['uap'];
                $tampil_spm['Total Tugas Akhir'] = $data_nilai[0]['tugasakhir'];
                $tampil_spm['Persentase Absen'] = $absen . "% : " . round($total_absen);
                $tampil_spm['Persentase Tugas'] = $tugas . "% : " . round($total_tugas);
                $tampil_spm['Persentase Kuis'] = $kuis . "% : " . round($total_kuis);
                $tampil_spm['Persentase UAP'] = $uap . "% : " . round($total_uap);
                $tampil_spm['Persentase Tugas Akhir'] = $tugasakhir . "% : " . round($total_tugas_akhir);
                $tampil_spm['Total Nilai Akhir'] = round($total_seluruh);
                if ($total_seluruh >= 85) {
                    $tampil_spm['Grade'] =  "A";
                } elseif ($total_seluruh >= 75) {
                    $tampil_spm['Grade'] =  "B";
                } elseif ($total_seluruh >= 60) {
                    $tampil_spm['Grade'] =  "C";
                } elseif ($total_seluruh >= 50) {
                    $tampil_spm['Grade'] =  "D";
                } else {
                    $tampil_spm['Grade'] =  "E";
                }
            }
            if ($mobile_programing) {
                $matkul_mob = $this->main_model->get_kelas_matkulBYKODE($mobile_programing)->result_array();
                $id_kelas_matkul = $matkul_mob[0]['id_kelas_matkul'];
                $data_absensi = $this->main_model->get_all_absen_mhsBY($id_kelas_matkul, $id_user)->result_array();
                $data_nilai = $this->main_model->get_all_nilai_mhsBY($id_kelas_matkul, $id_user)->result_array();
                $matkul_id = $data_nilai[0]['id_matkul'];
                // panggil matkul sesuai dengan id
                if ($matkul_id == 1) {
                    $tugaspembagi = '5';
                } elseif ($matkul_id == 2) {
                    $tugaspembagi = '5';
                } elseif ($matkul_id == 3) {
                    $tugaspembagi = '5';
                } elseif ($matkul_id == 4) {
                    $tugaspembagi = '5';
                } elseif ($matkul_id == 5) {
                    $tugaspembagi = '5';
                } elseif ($matkul_id == 6) {
                    $tugaspembagi = '5';
                } elseif ($matkul_id == 7) {
                    $tugaspembagi = '5';
                } elseif ($matkul_id == 8) {
                    $tugaspembagi = '5';
                } elseif ($matkul_id == 9) {
                    $tugaspembagi = '5';
                } elseif ($matkul_id == 10) {
                    $tugaspembagi = '5';
                } elseif ($matkul_id == 11) {
                    $tugaspembagi = '5';
                } elseif ($matkul_id == 12) {
                    $tugaspembagi = '5';
                } elseif ($matkul_id == 13) {
                    $tugaspembagi = '5';
                } elseif ($matkul_id == 14) {
                    $tugaspembagi = '5';
                } elseif ($matkul_id == 15) {
                    $tugaspembagi = '5';
                }

                // ############################## Kalkulasi Nilai #######################################
                $data_presentase_nilai = $this->main_model->get_persentase_nilaiBY($matkul_id)->result_array();
                $absen = $data_presentase_nilai[0]['absen'] * 100;
                $kuis = $data_presentase_nilai[0]['kuis'] * 100;
                $tugas = $data_presentase_nilai[0]['tugas'] * 100;
                $uap = $data_presentase_nilai[0]['uap'] * 100;
                $tugasakhir = $data_presentase_nilai[0]['tugasakhir'] * 100;

                $totalabsen = $data_absensi[0]['a_1'] + $data_absensi[0]['a_2'] + $data_absensi[0]['a_3'] + $data_absensi[0]['a_4'] + $data_absensi[0]['a_5'] + $data_absensi[0]['a_6'] + $data_absensi[0]['a_7'] + $data_absensi[0]['a_8'] + $data_absensi[0]['a_9'] + $data_absensi[0]['a_10'];
                $hasiltugas = $data_nilai[0]['tugas1'] + $data_nilai[0]['tugas2'] + $data_nilai[0]['tugas3'] + $data_nilai[0]['tugas4'] + $data_nilai[0]['tugas5'];

                $totaltugas = $hasiltugas / $tugaspembagi;
                $total_absen = ($totalabsen * 10 * $data_presentase_nilai[0]['absen']);
                $total_tugas = $totaltugas * $data_presentase_nilai[0]['tugas'];
                $total_kuis = $data_nilai[0]['kuis'] * $data_presentase_nilai[0]['kuis'];
                $total_uap = $data_nilai[0]['uap'] * $data_presentase_nilai[0]['uap'];
                $total_tugas_akhir = $data_nilai[0]['tugasakhir'] * $data_presentase_nilai[0]['tugasakhir'];
                $total_seluruh = $total_absen + $total_tugas + $total_kuis + $total_uap + $total_tugas_akhir;

                // ################################# Tampil di JSON #####################################
                $tampil_mob['kelas'] = $matkul_mob[0]['kelas'];
                $tampil_mob['Tugas 1'] = $data_nilai[0]['tugas1'];
                $tampil_mob['Tugas 2'] = $data_nilai[0]['tugas2'];
                $tampil_mob['Tugas 3'] = $data_nilai[0]['tugas3'];
                $tampil_mob['Tugas 4'] = $data_nilai[0]['tugas4'];
                $tampil_mob['Tugas 5'] = $data_nilai[0]['tugas5'];
                $tampil_mob['Total Absen'] = $total_absen . " dari 10 Pertemuan";
                $tampil_mob['Total Tugas'] = $hasiltugas;
                $tampil_mob['Total Kuis'] = $data_nilai[0]['kuis'];
                $tampil_mob['Total UAP'] = $data_nilai[0]['uap'];
                $tampil_mob['Total Tugas Akhir'] = $data_nilai[0]['tugasakhir'];
                $tampil_mob['Persentase Absen'] = $absen . "% : " . round($total_absen);
                $tampil_mob['Persentase Tugas'] = $tugas . "% : " . round($total_tugas);
                $tampil_mob['Persentase Kuis'] = $kuis . "% : " . round($total_kuis);
                $tampil_mob['Persentase UAP'] = $uap . "% : " . round($total_uap);
                $tampil_mob['Persentase Tugas Akhir'] = $tugasakhir . "% : " . round($total_tugas_akhir);
                $tampil_mob['Total Nilai Akhir'] = round($total_seluruh);
                if ($total_seluruh >= 85) {
                    $tampil_mob['Grade'] =  "A";
                } elseif ($total_seluruh >= 75) {
                    $tampil_mob['Grade'] =  "B";
                } elseif ($total_seluruh >= 60) {
                    $tampil_mob['Grade'] =  "C";
                } elseif ($total_seluruh >= 50) {
                    $tampil_mob['Grade'] =  "D";
                } else {
                    $tampil_mob['Grade'] =  "E";
                }
            }
            if ($keamanan_jaringan) {
                $matkul = $this->main_model->get_kelas_matkulBYKODE($keamanan_jaringan)->result_array();
                $id_kelas_matkul = $matkul[0]['id_kelas_matkul'];
                $data_absensi = $this->main_model->get_all_absen_mhsBY($id_kelas_matkul, $id_user)->result_array();
                $data_nilai = $this->main_model->get_all_nilai_mhsBY($id_kelas_matkul, $id_user)->result_array();
                $matkul_id = $data_nilai[0]['id_matkul'];
                // panggil matkul sesuai dengan id
                if ($matkul_id == 1) {
                    $tugaspembagi = '5';
                } elseif ($matkul_id == 2) {
                    $tugaspembagi = '5';
                } elseif ($matkul_id == 3) {
                    $tugaspembagi = '5';
                } elseif ($matkul_id == 4) {
                    $tugaspembagi = '5';
                } elseif ($matkul_id == 5) {
                    $tugaspembagi = '5';
                } elseif ($matkul_id == 6) {
                    $tugaspembagi = '5';
                } elseif ($matkul_id == 7) {
                    $tugaspembagi = '5';
                } elseif ($matkul_id == 8) {
                    $tugaspembagi = '5';
                } elseif ($matkul_id == 9) {
                    $tugaspembagi = '5';
                } elseif ($matkul_id == 10) {
                    $tugaspembagi = '5';
                } elseif ($matkul_id == 11) {
                    $tugaspembagi = '5';
                } elseif ($matkul_id == 12) {
                    $tugaspembagi = '5';
                } elseif ($matkul_id == 13) {
                    $tugaspembagi = '5';
                } elseif ($matkul_id == 14) {
                    $tugaspembagi = '5';
                } elseif ($matkul_id == 15) {
                    $tugaspembagi = '5';
                }

                // ############################## Kalkulasi Nilai #######################################
                $data_presentase_nilai = $this->main_model->get_persentase_nilaiBY($matkul_id)->result_array();
                $absen = $data_presentase_nilai[0]['absen'] * 100;
                $kuis = $data_presentase_nilai[0]['kuis'] * 100;
                $tugas = $data_presentase_nilai[0]['tugas'] * 100;
                $uap = $data_presentase_nilai[0]['uap'] * 100;
                $tugasakhir = $data_presentase_nilai[0]['tugasakhir'] * 100;

                $totalabsen = $data_absensi[0]['a_1'] + $data_absensi[0]['a_2'] + $data_absensi[0]['a_3'] + $data_absensi[0]['a_4'] + $data_absensi[0]['a_5'] + $data_absensi[0]['a_6'] + $data_absensi[0]['a_7'] + $data_absensi[0]['a_8'] + $data_absensi[0]['a_9'] + $data_absensi[0]['a_10'];
                $hasiltugas = $data_nilai[0]['tugas1'] + $data_nilai[0]['tugas2'] + $data_nilai[0]['tugas3'] + $data_nilai[0]['tugas4'] + $data_nilai[0]['tugas5'];

                $totaltugas = $hasiltugas / $tugaspembagi;
                $total_absen = ($totalabsen * 10 * $data_presentase_nilai[0]['absen']);
                $total_tugas = $totaltugas * $data_presentase_nilai[0]['tugas'];
                $total_kuis = $data_nilai[0]['kuis'] * $data_presentase_nilai[0]['kuis'];
                $total_uap = $data_nilai[0]['uap'] * $data_presentase_nilai[0]['uap'];
                $total_tugas_akhir = $data_nilai[0]['tugasakhir'] * $data_presentase_nilai[0]['tugasakhir'];
                $total_seluruh = $total_absen + $total_tugas + $total_kuis + $total_uap + $total_tugas_akhir;

                // ################################# Tampil di JSON #####################################
                $tampil_kjr['kelas'] = $matkul[0]['kelas'];
                $tampil_kjr['Tugas 1'] = $data_nilai[0]['tugas1'];
                $tampil_kjr['Tugas 2'] = $data_nilai[0]['tugas2'];
                $tampil_kjr['Tugas 3'] = $data_nilai[0]['tugas3'];
                $tampil_kjr['Tugas 4'] = $data_nilai[0]['tugas4'];
                $tampil_kjr['Tugas 5'] = $data_nilai[0]['tugas5'];
                $tampil_kjr['Total Absen'] = $total_absen . " dari 10 Pertemuan";
                $tampil_kjr['Total Tugas'] = $hasiltugas;
                $tampil_kjr['Total Kuis'] = $data_nilai[0]['kuis'];
                $tampil_kjr['Total UAP'] = $data_nilai[0]['uap'];
                $tampil_kjr['Total Tugas Akhir'] = $data_nilai[0]['tugasakhir'];
                $tampil_kjr['Persentase Absen'] = $absen . "% : " . round($total_absen);
                $tampil_kjr['Persentase Tugas'] = $tugas . "% : " . round($total_tugas);
                $tampil_kjr['Persentase Kuis'] = $kuis . "% : " . round($total_kuis);
                $tampil_kjr['Persentase UAP'] = $uap . "% : " . round($total_uap);
                $tampil_kjr['Persentase Tugas Akhir'] = $tugasakhir . "% : " . round($total_tugas_akhir);
                $tampil_kjr['Total Nilai Akhir'] = round($total_seluruh);
                if ($total_seluruh >= 85) {
                    $tampil_kjr['Grade'] =  "A";
                } elseif ($total_seluruh >= 75) {
                    $tampil_kjr['Grade'] =  "B";
                } elseif ($total_seluruh >= 60) {
                    $tampil_kjr['Grade'] =  "C";
                } elseif ($total_seluruh >= 50) {
                    $tampil_kjr['Grade'] =  "D";
                } else {
                    $tampil_kjr['Grade'] =  "E";
                }
            }
            if ($pemrograman_python) {
                $matkul = $this->main_model->get_kelas_matkulBYKODE($pemrograman_python)->result_array();
                $id_kelas_matkul = $matkul[0]['id_kelas_matkul'];
                $data_absensi = $this->main_model->get_all_absen_mhsBY($id_kelas_matkul, $id_user)->result_array();
                $data_nilai = $this->main_model->get_all_nilai_mhsBY($id_kelas_matkul, $id_user)->result_array();
                $matkul_id = $data_nilai[0]['id_matkul'];
                // panggil matkul sesuai dengan id
                if ($matkul_id == 1) {
                    $tugaspembagi = '5';
                } elseif ($matkul_id == 2) {
                    $tugaspembagi = '5';
                } elseif ($matkul_id == 3) {
                    $tugaspembagi = '5';
                } elseif ($matkul_id == 4) {
                    $tugaspembagi = '5';
                } elseif ($matkul_id == 5) {
                    $tugaspembagi = '5';
                } elseif ($matkul_id == 6) {
                    $tugaspembagi = '5';
                } elseif ($matkul_id == 7) {
                    $tugaspembagi = '5';
                } elseif ($matkul_id == 8) {
                    $tugaspembagi = '5';
                } elseif ($matkul_id == 9) {
                    $tugaspembagi = '5';
                } elseif ($matkul_id == 10) {
                    $tugaspembagi = '5';
                } elseif ($matkul_id == 11) {
                    $tugaspembagi = '5';
                } elseif ($matkul_id == 12) {
                    $tugaspembagi = '5';
                } elseif ($matkul_id == 13) {
                    $tugaspembagi = '5';
                } elseif ($matkul_id == 14) {
                    $tugaspembagi = '5';
                } elseif ($matkul_id == 15) {
                    $tugaspembagi = '5';
                }

                // ############################## Kalkulasi Nilai #######################################
                $data_presentase_nilai = $this->main_model->get_persentase_nilaiBY($matkul_id)->result_array();
                $absen = $data_presentase_nilai[0]['absen'] * 100;
                $kuis = $data_presentase_nilai[0]['kuis'] * 100;
                $tugas = $data_presentase_nilai[0]['tugas'] * 100;
                $uap = $data_presentase_nilai[0]['uap'] * 100;
                $tugasakhir = $data_presentase_nilai[0]['tugasakhir'] * 100;

                $totalabsen = $data_absensi[0]['a_1'] + $data_absensi[0]['a_2'] + $data_absensi[0]['a_3'] + $data_absensi[0]['a_4'] + $data_absensi[0]['a_5'] + $data_absensi[0]['a_6'] + $data_absensi[0]['a_7'] + $data_absensi[0]['a_8'] + $data_absensi[0]['a_9'] + $data_absensi[0]['a_10'];
                $hasiltugas = $data_nilai[0]['tugas1'] + $data_nilai[0]['tugas2'] + $data_nilai[0]['tugas3'] + $data_nilai[0]['tugas4'] + $data_nilai[0]['tugas5'];

                $totaltugas = $hasiltugas / $tugaspembagi;
                $total_absen = ($totalabsen * 10 * $data_presentase_nilai[0]['absen']);
                $total_tugas = $totaltugas * $data_presentase_nilai[0]['tugas'];
                $total_kuis = $data_nilai[0]['kuis'] * $data_presentase_nilai[0]['kuis'];
                $total_uap = $data_nilai[0]['uap'] * $data_presentase_nilai[0]['uap'];
                $total_tugas_akhir = $data_nilai[0]['tugasakhir'] * $data_presentase_nilai[0]['tugasakhir'];
                $total_seluruh = $total_absen + $total_tugas + $total_kuis + $total_uap + $total_tugas_akhir;

                // ################################# Tampil di JSON #####################################
                $tampil_pda['kelas'] = $matkul[0]['kelas'];
                $tampil_pda['Tugas 1'] = $data_nilai[0]['tugas1'];
                $tampil_pda['Tugas 2'] = $data_nilai[0]['tugas2'];
                $tampil_pda['Tugas 3'] = $data_nilai[0]['tugas3'];
                $tampil_pda['Tugas 4'] = $data_nilai[0]['tugas4'];
                $tampil_pda['Tugas 5'] = $data_nilai[0]['tugas5'];
                $tampil_pda['Total Absen'] = $total_absen . " dari 10 Pertemuan";
                $tampil_pda['Total Tugas'] = $hasiltugas;
                $tampil_pda['Total Kuis'] = $data_nilai[0]['kuis'];
                $tampil_pda['Total UAP'] = $data_nilai[0]['uap'];
                $tampil_pda['Total Tugas Akhir'] = $data_nilai[0]['tugasakhir'];
                $tampil_pda['Persentase Absen'] = $absen . "% : " . round($total_absen);
                $tampil_pda['Persentase Tugas'] = $tugas . "% : " . round($total_tugas);
                $tampil_pda['Persentase Kuis'] = $kuis . "% : " . round($total_kuis);
                $tampil_pda['Persentase UAP'] = $uap . "% : " . round($total_uap);
                $tampil_pda['Persentase Tugas Akhir'] = $tugasakhir . "% : " . round($total_tugas_akhir);
                $tampil_pda['Total Nilai Akhir'] = round($total_seluruh);
                if ($total_seluruh >= 85) {
                    $tampil_pda['Grade'] =  "A";
                } elseif ($total_seluruh >= 75) {
                    $tampil_pda['Grade'] =  "B";
                } elseif ($total_seluruh >= 60) {
                    $tampil_pda['Grade'] =  "C";
                } elseif ($total_seluruh >= 50) {
                    $tampil_pda['Grade'] =  "D";
                } else {
                    $tampil_pda['Grade'] =  "E";
                }
            }
            if ($sistem_interface_mikrokontroler) {
                $matkul = $this->main_model->get_kelas_matkulBYKODE($sistem_interface_mikrokontroler)->result_array();
                $id_kelas_matkul = $matkul[0]['id_kelas_matkul'];
                $data_absensi = $this->main_model->get_all_absen_mhsBY($id_kelas_matkul, $id_user)->result_array();
                $data_nilai = $this->main_model->get_all_nilai_mhsBY($id_kelas_matkul, $id_user)->result_array();
                $matkul_id = $data_nilai[0]['id_matkul'];
                // panggil matkul sesuai dengan id
                if ($matkul_id == 1) {
                    $tugaspembagi = '5';
                } elseif ($matkul_id == 2) {
                    $tugaspembagi = '5';
                } elseif ($matkul_id == 3) {
                    $tugaspembagi = '5';
                } elseif ($matkul_id == 4) {
                    $tugaspembagi = '5';
                } elseif ($matkul_id == 5) {
                    $tugaspembagi = '5';
                } elseif ($matkul_id == 6) {
                    $tugaspembagi = '5';
                } elseif ($matkul_id == 7) {
                    $tugaspembagi = '5';
                } elseif ($matkul_id == 8) {
                    $tugaspembagi = '5';
                } elseif ($matkul_id == 9) {
                    $tugaspembagi = '5';
                } elseif ($matkul_id == 10) {
                    $tugaspembagi = '5';
                } elseif ($matkul_id == 11) {
                    $tugaspembagi = '5';
                } elseif ($matkul_id == 12) {
                    $tugaspembagi = '5';
                } elseif ($matkul_id == 13) {
                    $tugaspembagi = '5';
                } elseif ($matkul_id == 14) {
                    $tugaspembagi = '5';
                } elseif ($matkul_id == 15) {
                    $tugaspembagi = '5';
                }

                // ############################## Kalkulasi Nilai #######################################
                $data_presentase_nilai = $this->main_model->get_persentase_nilaiBY($matkul_id)->result_array();
                $absen = $data_presentase_nilai[0]['absen'] * 100;
                $kuis = $data_presentase_nilai[0]['kuis'] * 100;
                $tugas = $data_presentase_nilai[0]['tugas'] * 100;
                $uap = $data_presentase_nilai[0]['uap'] * 100;
                $tugasakhir = $data_presentase_nilai[0]['tugasakhir'] * 100;

                $totalabsen = $data_absensi[0]['a_1'] + $data_absensi[0]['a_2'] + $data_absensi[0]['a_3'] + $data_absensi[0]['a_4'] + $data_absensi[0]['a_5'] + $data_absensi[0]['a_6'] + $data_absensi[0]['a_7'] + $data_absensi[0]['a_8'] + $data_absensi[0]['a_9'] + $data_absensi[0]['a_10'];
                $hasiltugas = $data_nilai[0]['tugas1'] + $data_nilai[0]['tugas2'] + $data_nilai[0]['tugas3'] + $data_nilai[0]['tugas4'] + $data_nilai[0]['tugas5'];

                $totaltugas = $hasiltugas / $tugaspembagi;
                $total_absen = ($totalabsen * 10 * $data_presentase_nilai[0]['absen']);
                $total_tugas = $totaltugas * $data_presentase_nilai[0]['tugas'];
                $total_kuis = $data_nilai[0]['kuis'] * $data_presentase_nilai[0]['kuis'];
                $total_uap = $data_nilai[0]['uap'] * $data_presentase_nilai[0]['uap'];
                $total_tugas_akhir = $data_nilai[0]['tugasakhir'] * $data_presentase_nilai[0]['tugasakhir'];
                $total_seluruh = $total_absen + $total_tugas + $total_kuis + $total_uap + $total_tugas_akhir;

                // ################################# Tampil di JSON #####################################
                $tampil_sim['kelas'] = $matkul[0]['kelas'];
                $tampil_sim['Tugas 1'] = $data_nilai[0]['tugas1'];
                $tampil_sim['Tugas 2'] = $data_nilai[0]['tugas2'];
                $tampil_sim['Tugas 3'] = $data_nilai[0]['tugas3'];
                $tampil_sim['Tugas 4'] = $data_nilai[0]['tugas4'];
                $tampil_sim['Tugas 5'] = $data_nilai[0]['tugas5'];
                $tampil_sim['Total Absen'] = $total_absen . " dari 10 Pertemuan";
                $tampil_sim['Total Tugas'] = $hasiltugas;
                $tampil_sim['Total Kuis'] = $data_nilai[0]['kuis'];
                $tampil_sim['Total UAP'] = $data_nilai[0]['uap'];
                $tampil_sim['Total Tugas Akhir'] = $data_nilai[0]['tugasakhir'];
                $tampil_sim['Persentase Absen'] = $absen . "% : " . round($total_absen);
                $tampil_sim['Persentase Tugas'] = $tugas . "% : " . round($total_tugas);
                $tampil_sim['Persentase Kuis'] = $kuis . "% : " . round($total_kuis);
                $tampil_sim['Persentase UAP'] = $uap . "% : " . round($total_uap);
                $tampil_sim['Persentase Tugas Akhir'] = $tugasakhir . "% : " . round($total_tugas_akhir);
                $tampil_sim['Total Nilai Akhir'] = round($total_seluruh);
                if ($total_seluruh >= 85) {
                    $tampil_sim['Grade'] =  "A";
                } elseif ($total_seluruh >= 75) {
                    $tampil_sim['Grade'] =  "B";
                } elseif ($total_seluruh >= 60) {
                    $tampil_sim['Grade'] =  "C";
                } elseif ($total_seluruh >= 50) {
                    $tampil_sim['Grade'] =  "D";
                } else {
                    $tampil_sim['Grade'] =  "E";
                }
            }
            if ($robotik) {
                $matkul = $this->main_model->get_kelas_matkulBYKODE($robotik)->result_array();
                $id_kelas_matkul = $matkul[0]['id_kelas_matkul'];
                $data_absensi = $this->main_model->get_all_absen_mhsBY($id_kelas_matkul, $id_user)->result_array();
                $data_nilai = $this->main_model->get_all_nilai_mhsBY($id_kelas_matkul, $id_user)->result_array();
                $matkul_id = $data_nilai[0]['id_matkul'];
                // panggil matkul sesuai dengan id
                if ($matkul_id == 1) {
                    $tugaspembagi = '5';
                } elseif ($matkul_id == 2) {
                    $tugaspembagi = '5';
                } elseif ($matkul_id == 3) {
                    $tugaspembagi = '5';
                } elseif ($matkul_id == 4) {
                    $tugaspembagi = '5';
                } elseif ($matkul_id == 5) {
                    $tugaspembagi = '5';
                } elseif ($matkul_id == 6) {
                    $tugaspembagi = '5';
                } elseif ($matkul_id == 7) {
                    $tugaspembagi = '5';
                } elseif ($matkul_id == 8) {
                    $tugaspembagi = '5';
                } elseif ($matkul_id == 9) {
                    $tugaspembagi = '5';
                } elseif ($matkul_id == 10) {
                    $tugaspembagi = '5';
                } elseif ($matkul_id == 11) {
                    $tugaspembagi = '5';
                } elseif ($matkul_id == 12) {
                    $tugaspembagi = '5';
                } elseif ($matkul_id == 13) {
                    $tugaspembagi = '5';
                } elseif ($matkul_id == 14) {
                    $tugaspembagi = '5';
                } elseif ($matkul_id == 15) {
                    $tugaspembagi = '5';
                }

                // ############################## Kalkulasi Nilai #######################################
                $data_presentase_nilai = $this->main_model->get_persentase_nilaiBY($matkul_id)->result_array();
                $absen = $data_presentase_nilai[0]['absen'] * 100;
                $kuis = $data_presentase_nilai[0]['kuis'] * 100;
                $tugas = $data_presentase_nilai[0]['tugas'] * 100;
                $uap = $data_presentase_nilai[0]['uap'] * 100;
                $tugasakhir = $data_presentase_nilai[0]['tugasakhir'] * 100;

                $totalabsen = $data_absensi[0]['a_1'] + $data_absensi[0]['a_2'] + $data_absensi[0]['a_3'] + $data_absensi[0]['a_4'] + $data_absensi[0]['a_5'] + $data_absensi[0]['a_6'] + $data_absensi[0]['a_7'] + $data_absensi[0]['a_8'] + $data_absensi[0]['a_9'] + $data_absensi[0]['a_10'];
                $hasiltugas = $data_nilai[0]['tugas1'] + $data_nilai[0]['tugas2'] + $data_nilai[0]['tugas3'] + $data_nilai[0]['tugas4'] + $data_nilai[0]['tugas5'];

                $totaltugas = $hasiltugas / $tugaspembagi;
                $total_absen = ($totalabsen * 10 * $data_presentase_nilai[0]['absen']);
                $total_tugas = $totaltugas * $data_presentase_nilai[0]['tugas'];
                $total_kuis = $data_nilai[0]['kuis'] * $data_presentase_nilai[0]['kuis'];
                $total_uap = $data_nilai[0]['uap'] * $data_presentase_nilai[0]['uap'];
                $total_tugas_akhir = $data_nilai[0]['tugasakhir'] * $data_presentase_nilai[0]['tugasakhir'];
                $total_seluruh = $total_absen + $total_tugas + $total_kuis + $total_uap + $total_tugas_akhir;

                // ################################# Tampil di JSON #####################################
                $tampil_rob['kelas'] = $matkul[0]['kelas'];
                $tampil_rob['Tugas 1'] = $data_nilai[0]['tugas1'];
                $tampil_rob['Tugas 2'] = $data_nilai[0]['tugas2'];
                $tampil_rob['Tugas 3'] = $data_nilai[0]['tugas3'];
                $tampil_rob['Tugas 4'] = $data_nilai[0]['tugas4'];
                $tampil_rob['Tugas 5'] = $data_nilai[0]['tugas5'];
                $tampil_rob['Total Absen'] = $total_absen . " dari 10 Pertemuan";
                $tampil_rob['Total Tugas'] = $hasiltugas;
                $tampil_rob['Total Kuis'] = $data_nilai[0]['kuis'];
                $tampil_rob['Total UAP'] = $data_nilai[0]['uap'];
                $tampil_rob['Total Tugas Akhir'] = $data_nilai[0]['tugasakhir'];
                $tampil_rob['Persentase Absen'] = $absen . "% : " . round($total_absen);
                $tampil_rob['Persentase Tugas'] = $tugas . "% : " . round($total_tugas);
                $tampil_rob['Persentase Kuis'] = $kuis . "% : " . round($total_kuis);
                $tampil_rob['Persentase UAP'] = $uap . "% : " . round($total_uap);
                $tampil_rob['Persentase Tugas Akhir'] = $tugasakhir . "% : " . round($total_tugas_akhir);
                $tampil_rob['Total Nilai Akhir'] = round($total_seluruh);
                if ($total_seluruh >= 85) {
                    $tampil_rob['Grade'] =  "A";
                } elseif ($total_seluruh >= 75) {
                    $tampil_rob['Grade'] =  "B";
                } elseif ($total_seluruh >= 60) {
                    $tampil_rob['Grade'] =  "C";
                } elseif ($total_seluruh >= 50) {
                    $tampil_rob['Grade'] =  "D";
                } else {
                    $tampil_rob['Grade'] =  "E";
                }
            }

            $hasil1 = (object) array_filter((array) $tampil_si);
            $hasil2 = (object) array_filter((array) $tampil_ork);
            $hasil3 = (object) array_filter((array) $tampil_mob);
            $hasil4 = (object) array_filter((array) $tampil_rob);
            $hasil5 = (object) array_filter((array) $tampil_sim);
            $hasil6 = (object) array_filter((array) $tampil_pda);
            $hasil7 = (object) array_filter((array) $tampil_kjr);
            $hasil8 = (object) array_filter((array) $tampil_spm);
            $hasil9 = (object) array_filter((array) $tampil_adm);
            $hasil10 = (object) array_filter((array) $tampil_iot);
            $hasil11 = (object) array_filter((array) $tampil_smk);
            $hasil12 = (object) array_filter((array) $tampil_sdg2);
            $hasil13 = (object) array_filter((array) $tampil_jrk);
            $hasil14 = (object) array_filter((array) $tampil_sdg);
            $hasil15 = (object) array_filter((array) $tampil_elek);

            array_push($responsistem["nilai"], $hasil1);
            array_push($responsistem["nilai"], $hasil2);
            array_push($responsistem["nilai"], $hasil3);
            array_push($responsistem["nilai"], $hasil4);
            array_push($responsistem["nilai"], $hasil5);
            array_push($responsistem["nilai"], $hasil6);
            array_push($responsistem["nilai"], $hasil7);
            array_push($responsistem["nilai"], $hasil8);
            array_push($responsistem["nilai"], $hasil9);
            array_push($responsistem["nilai"], $hasil10);
            array_push($responsistem["nilai"], $hasil11);
            array_push($responsistem["nilai"], $hasil12);
            array_push($responsistem["nilai"], $hasil13);
            array_push($responsistem["nilai"], $hasil14);
            array_push($responsistem["nilai"], $hasil15);
            $this->response($responsistem, 200);
        } else {
            $this->response([
                'status' => FALSE,
                'message' => '404 Data not found!'
            ], REST_Controller::HTTP_NOT_FOUND);
        }
    }
}
