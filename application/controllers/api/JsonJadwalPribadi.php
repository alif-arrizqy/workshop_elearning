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
        $id_user = $this->get('id_user');
        $password = $this->get('password');
        $cekauth = $this->main_model->auth_api_user($id_user, $password);
        $responsistem["jadwal_pribadi"] = array();
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

            #################################################### Sistem Instrumentasi ####################################################
            // if (!empty($sistem_instrumentasi)) {
                $matkul_si = $this->main_model->get_kelas_matkulBYKODE($sistem_instrumentasi)->result_array();
                $asdos1_si = $this->main_model->get_asdos1_iduser($matkul_si[0]['asdos_1'])->result();
                $asdos2_si = $this->main_model->get_asdos1_iduser($matkul_si[0]['asdos_2'])->result();
                foreach ($asdos1_si as $asd1_si) {
                }
                foreach ($asdos2_si as $asd2_si) {
                }
                // $data_si = array(
                    $data1['kelas'] = $matkul_si[0]['kelas'];
                    $data1['hari'] = $matkul_si[0]['hari'];
                    $data1['jam_mulai'] = $matkul_si[0]['mulai_praktikum'];
                    $data1['jam_selesai'] = $matkul_si[0]['selesai_praktikum'];
                    $data1['asd1'] = $asd1_si->nama;
                    $data1['asd2'] = $asd2_si->nama;
                // );
                // if ($matkul_si[0]['lab'] == 1) {
                //     $data1['lab'] = "Lab. Organisasi Komputer";
                // } else if ($matkul_si[0]['lab'] == 0) {
                //     $data1['lab'] = "Lab. Dasar-Dasar Instrumentasi";
            // }

            #################################################### Organisasi Komputer ####################################################
            // if (!empty($organisasi_komputer)) {
                $matkul_ork = $this->main_model->get_kelas_matkulBYKODE($organisasi_komputer)->result_array();
                $asdos1_ork = $this->main_model->get_asdos1_iduser($matkul_ork[0]['asdos_1'])->result();
                $asdos2_ork = $this->main_model->get_asdos1_iduser($matkul_ork[0]['asdos_2'])->result();
                foreach ($asdos1_ork as $asd1_ork) {
                }
                foreach ($asdos2_ork as $asd2_ork) {
                }
                // $data_orkom = array(
                    $data2['kelas'] = $matkul_ork[0]['kelas'];
                    $data2['hari'] = $matkul_ork[0]['hari'];
                    $data2['jam_mulai'] = $matkul_ork[0]['mulai_praktikum'];
                    $data2['jam_selesai'] = $matkul_ork[0]['selesai_praktikum'];
                    $data2['asd1'] = $asd1_ork->nama;
                    $data2['asd2'] = $asd2_ork->nama;
                // );
                // if ($matkul_ork[0]['lab'] == 1) {
                //     $data2['lab'] = "Lab. Organisasi Komputer";
                // }
                // if ($matkul_ork[0]['lab'] == 0) {
                //     $data2['lab'] = "Lab. Dasar-Dasar Instrumentasi";
            // }

            #################################################### Elektronika ####################################################
            $matkul_elek = $this->main_model->get_kelas_matkulBYKODE($elektronika)->result_array();
            $asdos1_elek = $this->main_model->get_asdos1_iduser($matkul_elek[0]['asdos_1'])->result();
            $asdos2_elek = $this->main_model->get_asdos1_iduser($matkul_elek[0]['asdos_2'])->result();
            foreach ($asdos1_elek as $asd1_elek) {
            }
            foreach ($asdos2_elek as $asd2_elek) {
            }

            $data3['kelas'] = $matkul_elek[0]['kelas'];
            $data3['hari'] = $matkul_elek[0]['hari'];
            $data3['jam_mulai'] = $matkul_elek[0]['mulai_praktikum'];
            $data3['jam_selesai'] = $matkul_elek[0]['selesai_praktikum'];
            $data3['asd1'] = $asd1_elek->nama;
            $data3['asd2'] = $asd2_elek->nama;
            // if ($matkul_elek[0]['lab'] == 1) {
            //     $data3['lab'] = "Lab. Organisasi Komputer";
            // }
            // if ($matkul_elek[0]['lab'] == 0) {
            //     $data3['lab'] = "Lab. Dasar-Dasar Instrumentasi";
            // }

            #################################################### Sistem Dgital 1 ####################################################
            $matkul_sd1 = $this->main_model->get_kelas_matkulBYKODE($sistem_digital_1)->result_array();
            $asdos1_sd1 = $this->main_model->get_asdos1_iduser($matkul_sd1[0]['asdos_1'])->result();
            $asdos2_sd1 = $this->main_model->get_asdos1_iduser($matkul_sd1[0]['asdos_2'])->result();
            foreach ($asdos1_sd1 as $asd1_sd1) {
            }
            foreach ($asdos2_sd1 as $asd2_sd1) {
            }

            $data4['kelas'] = $matkul_sd1[0]['kelas'];
            $data4['hari'] = $matkul_sd1[0]['hari'];
            $data4['jam_mulai'] = $matkul_sd1[0]['mulai_praktikum'];
            $data4['jam_selesai'] = $matkul_sd1[0]['selesai_praktikum'];
            $data4['asd1'] = $asd1_sd1->nama;
            $data4['asd2'] = $asd2_sd1->nama;
            // if ($matkul_sd1[0]['lab'] == 1) {
            //     $data4['lab'] = "Lab. Organisasi Komputer";
            // }
            // if ($matkul_sd1[0]['lab'] == 0) {
            //     $data4['lab'] = "Lab. Dasar-Dasar Instrumentasi";
            // }

            #################################################### Jaringan Komputer ####################################################
            $matkul_jrk = $this->main_model->get_kelas_matkulBYKODE($jaringan_komputer)->result_array();
            $asdos1_jrk = $this->main_model->get_asdos1_iduser($matkul_jrk[0]['asdos_1'])->result();
            $asdos2_jrk = $this->main_model->get_asdos1_iduser($matkul_jrk[0]['asdos_2'])->result();
            foreach ($asdos1_jrk as $asd1_jrk) {
            }
            foreach ($asdos2_jrk as $asd2_jrk) {
            }

            $data5['kelas'] = $matkul_jrk[0]['kelas'];
            $data5['hari'] = $matkul_jrk[0]['hari'];
            $data5['jam_mulai'] = $matkul_jrk[0]['mulai_praktikum'];
            $data5['jam_selesai'] = $matkul_jrk[0]['selesai_praktikum'];
            $data5['asd1'] = $asd1_jrk->nama;
            $data5['asd2'] = $asd2_jrk->nama;
            // if ($matkul_jrk[0]['lab'] == 1) {
            //     $data5['lab'] = "Lab. Organisasi Komputer";
            // }
            // if ($matkul_jrk[0]['lab'] == 0) {
            //     $data5['lab'] = "Lab. Dasar-Dasar Instrumentasi";
            // }

            #################################################### Sistem Digital 2 ####################################################
            $matkul_sd2 = $this->main_model->get_kelas_matkulBYKODE($sistem_digital_2)->result_array();
            $asdos1_sd2 = $this->main_model->get_asdos1_iduser($matkul_sd2[0]['asdos_1'])->result();
            $asdos2_sd2 = $this->main_model->get_asdos1_iduser($matkul_sd2[0]['asdos_2'])->result();
            foreach ($asdos1_sd2 as $asd1_sd2) {
            }
            foreach ($asdos2_sd2 as $asd2_sd2) {
            }

            $data6['kelas'] = $matkul_sd2[0]['kelas'];
            $data6['hari'] = $matkul_sd2[0]['hari'];
            $data6['jam_mulai'] = $matkul_sd2[0]['mulai_praktikum'];
            $data6['jam_selesai'] = $matkul_sd2[0]['selesai_praktikum'];
            $data6['asd1'] = $asd1_sd2->nama;
            $data6['asd2'] = $asd2_sd2->nama;
            // if ($matkul_sd2[0]['lab'] == 1) {
            //     $data6['lab'] = "Lab. Organisasi Komputer";
            // }
            // if ($matkul_sd2[0]['lab'] == 0) {
            //     $data6['lab'] = "Lab. Dasar-Dasar Instrumentasi";
            // }

            #################################################### Sistem Mikroprosesor ####################################################
            $matkul_sismik = $this->main_model->get_kelas_matkulBYKODE($sistem_mikroprosesor)->result_array();
            $asdos1_sismik = $this->main_model->get_asdos1_iduser($matkul_sismik[0]['asdos_1'])->result();
            $asdos2_sismik = $this->main_model->get_asdos1_iduser($matkul_sismik[0]['asdos_2'])->result();
            foreach ($asdos1_sismik as $asd1_sismik) {
            }
            foreach ($asdos2_sismik as $asd2_sismik) {
            }

            $data7['kelas'] = $matkul_sismik[0]['kelas'];
            $data7['hari'] = $matkul_sismik[0]['hari'];
            $data7['jam_mulai'] = $matkul_sismik[0]['mulai_praktikum'];
            $data7['jam_selesai'] = $matkul_sismik[0]['selesai_praktikum'];
            $data7['asd1'] = $asd1_sismik->nama;
            $data7['asd2'] = $asd2_sismik->nama;
            // if ($matkul_sismik[0]['lab'] == 1) {
            //     $data7['lab'] = "Lab. Organisasi Komputer";
            // }
            // if ($matkul_sismik[0]['lab'] == 0) {
            //     $data7['lab'] = "Lab. Dasar-Dasar Instrumentasi";
            // }

            #################################################### Otomasi a.k.a IOT ####################################################
            $matkul_oto = $this->main_model->get_kelas_matkulBYKODE($otomasi)->result_array();
            $asdos1_oto = $this->main_model->get_asdos1_iduser($matkul_oto[0]['asdos_1'])->result();
            $asdos2_oto = $this->main_model->get_asdos1_iduser($matkul_oto[0]['asdos_2'])->result();
            foreach ($asdos1_oto as $asd1_oto) {
            }
            foreach ($asdos2_oto as $asd2_oto) {
            }

            $data8['kelas'] = $matkul_oto[0]['kelas'];
            $data8['hari'] = $matkul_oto[0]['hari'];
            $data8['jam_mulai'] = $matkul_oto[0]['mulai_praktikum'];
            $data8['jam_selesai'] = $matkul_oto[0]['selesai_praktikum'];
            $data8['asd1'] = $asd1_oto->nama;
            $data8['asd2'] = $asd2_oto->nama;
            // if ($matkul_oto[0]['lab'] == 1) {
            //     $data8['lab'] = "Lab. Organisasi Komputer";
            // }
            // if ($matkul_oto[0]['lab'] == 0) {
            //     $data8['lab'] = "Lab. Dasar-Dasar Instrumentasi";
            // }

            #################################################### Administrasi Jaringan ####################################################
            $matkul_adm = $this->main_model->get_kelas_matkulBYKODE($administrasi_jaringan)->result_array();
            $asdos1_adm = $this->main_model->get_asdos1_iduser($matkul_adm[0]['asdos_1'])->result();
            $asdos2_adm = $this->main_model->get_asdos1_iduser($matkul_adm[0]['asdos_2'])->result();
            foreach ($asdos1_adm as $asd1_adm) {
            }
            foreach ($asdos2_adm as $asd2_adm) {
            }

            $data9['kelas'] = $matkul_adm[0]['kelas'];
            $data9['hari'] = $matkul_adm[0]['hari'];
            $data9['jam_mulai'] = $matkul_adm[0]['mulai_praktikum'];
            $data9['jam_selesai'] = $matkul_adm[0]['selesai_praktikum'];
            $data9['asd1'] = $asd1_adm->nama;
            $data9['asd2'] = $asd2_adm->nama;
            // if ($matkul_adm[0]['lab'] == 1) {
            //     $data9['lab'] = "Lab. Organisasi Komputer";
            // }
            // if ($matkul_adm[0]['lab'] == 0) {
            //     $data9['lab'] = "Lab. Dasar-Dasar Instrumentasi";
            // }

            #################################################### SISPEMIK ####################################################
            $matkul_sispemik = $this->main_model->get_kelas_matkulBYKODE($sistem_pemrograman_mikroprosesor)->result_array();
            $asdos1_sispemik = $this->main_model->get_asdos1_iduser($matkul_sispemik[0]['asdos_1'])->result();
            $asdos2_sispemik = $this->main_model->get_asdos1_iduser($matkul_sispemik[0]['asdos_2'])->result();
            foreach ($asdos1_sispemik as $asd1_sispemik) {
            }
            foreach ($asdos2_sispemik as $asd2_sispemik) {
            }

            $data10['kelas'] = $matkul_sispemik[0]['kelas'];
            $data10['hari'] = $matkul_sispemik[0]['hari'];
            $data10['jam_mulai'] = $matkul_sispemik[0]['mulai_praktikum'];
            $data10['jam_selesai'] = $matkul_sispemik[0]['selesai_praktikum'];
            $data10['asd1'] = $asd1_sispemik->nama;
            $data10['asd2'] = $asd2_sispemik->nama;
            // if ($matkul_sispemik[0]['lab'] == 1) {
            //     $data10['lab'] = "Lab. Organisasi Komputer";
            // }
            // if ($matkul_sispemik[0]['lab'] == 0) {
            //     $data10['lab'] = "Lab. Dasar-Dasar Instrumentasi";
            // }

            #################################################### Mobile Programming ####################################################
            $matkul_mopro = $this->main_model->get_kelas_matkulBYKODE($mobile_programing)->result_array();
            $asdos1_mopro = $this->main_model->get_asdos1_iduser($matkul_mopro[0]['asdos_1'])->result();
            $asdos2_mopro = $this->main_model->get_asdos1_iduser($matkul_mopro[0]['asdos_2'])->result();
            foreach ($asdos1_mopro as $asd1_mopro) {
            }
            foreach ($asdos2_mopro as $asd2_mopro) {
            }

            $data11['kelas'] = $matkul_mopro[0]['kelas'];
            $data11['hari'] = $matkul_mopro[0]['hari'];
            $data11['jam_mulai'] = $matkul_mopro[0]['mulai_praktikum'];
            $data11['jam_selesai'] = $matkul_mopro[0]['selesai_praktikum'];
            $data11['asd1'] = $asd1_mopro->nama;
            $data11['asd2'] = $asd2_mopro->nama;
            // if ($matkul_mopro[0]['lab'] == 1) {
            //     $data11['lab'] = "Lab. Organisasi Komputer";
            // }
            // if ($matkul_mopro[0]['lab'] == 0) {
            //     $data11['lab'] = "Lab. Dasar-Dasar Instrumentasi";
            // }

            #################################################### Pemrograman Python ####################################################
            
            $matkul_python = $this->main_model->get_kelas_matkulBYKODE($pemrograman_python)->result_array();
            $asdos1_python = $this->main_model->get_asdos1_iduser($matkul_python[0]['asdos_1'])->result();
            $asdos2_python = $this->main_model->get_asdos1_iduser($matkul_python[0]['asdos_2'])->result();
            foreach ($asdos1_python as $asd1_python) {
            }
            foreach ($asdos2_python as $asd2_python) {
            }
            $data12['kelas'] = $matkul_python[0]['kelas'];
            $data12['hari'] = $matkul_python[0]['hari'];
            $data12['jam_mulai'] = $matkul_python[0]['mulai_praktikum'];
            $data12['jam_selesai'] = $matkul_python[0]['selesai_praktikum'];
            $data12['asd1'] = $asd1_python->nama;
            $data12['asd2'] = $asd2_python->nama;
            // if ($matkul_python[0]['lab'] == 1) {
            //     $data12['lab'] = "Lab. Organisasi Komputer";
            // }
            // if ($matkul_python[0]['lab'] == 0) {
            //     $data12['lab'] = "Lab. Dasar-Dasar Instrumentasi";
            // }

            #################################################### Keamanan Jaringan ####################################################
            if(!empty($keamanan_jaringan)){
            $matkul_kejar = $this->main_model->get_kelas_matkulBYKODE($keamanan_jaringan)->result_array();
            $asdos1_kejar = $this->main_model->get_asdos1_iduser($matkul_kejar[0]['asdos_1'])->result();
            $asdos2_kejar = $this->main_model->get_asdos1_iduser($matkul_kejar[0]['asdos_2'])->result();
            foreach ($asdos1_kejar as $asd1_kejar) {
            }
            foreach ($asdos2_kejar as $asd2_kejar) {
            }
            $data_kejar = array(
            $data13['kelas'] = $matkul_kejar[0]['kelas'],
            $data13['hari'] = $matkul_kejar[0]['hari'],
            $data13['jam_mulai'] = $matkul_kejar[0]['mulai_praktikum'],
            $data13['jam_selesai'] = $matkul_kejar[0]['selesai_praktikum'],
            $data13['asd1'] = $asd1_kejar->nama,
            $data13['asd2'] = $asd2_kejar->nama,
        );
            // if ($matkul_kejar[0]['lab'] == 1) {
            //     $data13['lab'] = "Lab. Organisasi Komputer";
            // }
            // if ($matkul_kejar[0]['lab'] == 0) {
            //     $data13['lab'] = "Lab. Dasar-Dasar Instrumentasi";
            }

            #################################################### Sistem Interface Mikrokontroler ####################################################
            if(!empty($sistem_interface_mikrokontroler)){
            $matkul_sim = $this->main_model->get_kelas_matkulBYKODE($sistem_interface_mikrokontroler)->result_array();
            $asdos1_sim = $this->main_model->get_asdos1_iduser($matkul_sim[0]['asdos_1'])->result();
            $asdos2_sim = $this->main_model->get_asdos1_iduser($matkul_sim[0]['asdos_2'])->result();
            foreach ($asdos1_sim as $asd1_sim) {
            }
            foreach ($asdos2_sim as $asd2_sim) {
            }
            // $data_sim = array(
            $data14['kelas'] = $matkul_sim[0]['kelas'];
            $data14['hari'] = $matkul_sim[0]['hari'];
            $data14['jam_mulai'] = $matkul_sim[0]['mulai_praktikum'];
            $data14['jam_selesai'] = $matkul_sim[0]['selesai_praktikum'];
            $data14['asd1'] = $asd1_sim->nama;
            $data14['asd2'] = $asd2_sim->nama;
        // );
            // if ($matkul_sim[0]['lab'] == 1) {
            //     $data14['lab'] = "Lab. Organisasi Komputer";
            // }
            // if ($matkul_sim[0]['lab'] == 0) {
            //     $data14['lab'] = "Lab. Dasar-Dasar Instrumentasi";
            } else {
                $responsistem["jadwal_pribadi"];
            }

            #################################################### Robotik ####################################################
            if(!empty($robotik)){
            $matkul_robot = $this->main_model->get_kelas_matkulBYKODE($robotik)->result_array();
            $asdos1_robot = $this->main_model->get_asdos1_iduser($matkul_robot[0]['asdos_1'])->result();
            $asdos2_robot = $this->main_model->get_asdos1_iduser($matkul_robot[0]['asdos_2'])->result();
            foreach ($asdos1_robot as $asd1_robot) {
            }
            foreach ($asdos2_robot as $asd2_robot) {
            }
            // $data_robotik = array(
            $data15['kelas'] = $matkul_robot[0]['kelas'];
            $data15['hari'] = $matkul_robot[0]['hari'];
            $data15['jam_mulai'] = $matkul_robot[0]['mulai_praktikum'];
            $data15['jam_selesai'] = $matkul_robot[0]['selesai_praktikum'];
            $data15['asd1'] = $asd1_robot->nama;
            $data15['asd2'] = $asd2_robot->nama;
            // );
            // if ($matkul_robot[0]['lab'] == 1) {
            //     $data15['lab'] = "Lab. Organisasi Komputer";
            // }
            // if ($matkul_robot[0]['lab'] == 0) {
            //     $data15['lab'] = "Lab. Dasar-Dasar Instrumentasi";
            } else if (empty($robotik)){
                $responsistem["jadwal_pribadi"];
            }

            // if($data1 || $data2 || $data3 || $data4 || $data5 || $data6 || $data7 || 
            // $data8 || $data9 || $data10 || $data11 || $data12 || $keamanan_jaringan || $sistem_interface_mikrokontroler || $robotik )
            // {
            $hasil1 = (object) array_filter((array) $data1);
            $hasil2 = (object) array_filter((array) $data2);
            $hasil3 = (object) array_filter((array) $data3);
            $hasil4 = (object) array_filter((array) $data4);
            $hasil5 = (object) array_filter((array) $data5);
            $hasil6 = (object) array_filter((array) $data6);
            $hasil7 = (object) array_filter((array) $data7);
            $hasil8 = (object) array_filter((array) $data8);
            $hasil9 = (object) array_filter((array) $data9);
            $hasil10 = (object) array_filter((array) $data10);
            $hasil11 = (object) array_filter((array) $data11);
            $hasil12 = (object) array_filter((array) $data12);
            $hasil13 = (object) array_filter((array) $data13);
            $hasil14 = (object) array_filter((array) $data14);
            $hasil15 = (object) array_filter((array) $data15);
            
            array_push($responsistem["jadwal_pribadi"], $hasil1);
            array_push($responsistem["jadwal_pribadi"], $hasil2);
            array_push($responsistem["jadwal_pribadi"], $hasil3);
            array_push($responsistem["jadwal_pribadi"], $hasil4);
            array_push($responsistem["jadwal_pribadi"], $hasil5);
            array_push($responsistem["jadwal_pribadi"], $hasil6);
            array_push($responsistem["jadwal_pribadi"], $hasil7);
            array_push($responsistem["jadwal_pribadi"], $hasil8);
            array_push($responsistem["jadwal_pribadi"], $hasil9);
            array_push($responsistem["jadwal_pribadi"], $hasil10);
            array_push($responsistem["jadwal_pribadi"], $hasil11);
            array_push($responsistem["jadwal_pribadi"], $hasil12);
            array_push($responsistem["jadwal_pribadi"], $hasil13);
            array_push($responsistem["jadwal_pribadi"], $hasil14);
            array_push($responsistem["jadwal_pribadi"], $hasil15);
            // $hsl = array($data1, $data2,$data3,$data4,$data5,$data6,$data7,
            // $data8,$data9,$data10,$data11,$data12,$data13,$data14,$data15,);
            // $responsistem = (object)array_filter((array) $hsl);
            // $responsistem = $hsl;
            if(!empty($responsistem)){
            $this->response([
                'status' => TRUE,
                'data' => $responsistem
            ], REST_Controller::HTTP_NOT_FOUND);
            } 
            // else {
            //     $this->response([
            //         'status' => FALSE,
            //         'message' => 'Tidak ada jadwal'
            //     ], REST_Controller::HTTP_NOT_FOUND);
            // }
        } else {
            $this->response([
                'status' => false,
                'message' => 'ID or Password is Not Found'
            ], REST_Controller::HTTP_NOT_FOUND);
        }
    }
}

