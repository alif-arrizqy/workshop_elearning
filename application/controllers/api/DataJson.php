<?php error_reporting(0) ?>
<?php
defined('BASEPATH') or exit('No Direct script allowed');

class DataJson extends CI_Controller
{

    function __construct()
    {
        parent::__construct();
        $this->load->model('login_model');
        $this->load->model('main_model');
    }

    function get_login()
    {
        $url = "workshopelearning.com/";
        $username = $_GET['username'];
        $password = $_GET['password'];

        $cekauth = $this->login_model->auth_user($username, $password);
        if ($cekauth->num_rows() > 0) {
            $hasil_data = array();
            $hasil_data["hasil"] = array();
            $hasil_data["status"] = "true";
            $data = $cekauth->row_array();
            $biodatalengkapuser = $this->login_model->select_biodata_user($data['id_user']);
            foreach ($biodatalengkapuser as $hasil) {
                $email = $hasil->email;
            }

            $value = $this->main_model->get_detail_user($data['id_user'])->row_array();
            $hsl['id_user'] = $value["id_user"];
            $hsl['npm'] = $value['npm'];
            $hsl['nama'] = $value['nama'];
            $hsl['username'] = $value['username'];
            $hsl['password'] = $value['password'];
            if (empty($value['gambar'])) {
                $hsl['gambar'] = "no_image";
            } else {
                $hsl['gambar'] = $url . "images/gambar_user/" . $value['gambar'];
            }
            if (empty($value['tempat'])) {
                $hsl['tempat'] = "-";
            } else {
                $hsl['tempat'] = $value['tempat'];
            }
            if ($value['tgl_lahir'] == 0000 - 00 - 00) {
                $hsl['tgl_lahir'] = "-";
            } else {
                $hsl['tgl_lahir'] = $value['tgl_lahir'];
            }
            if (empty($value['agama'])) {
                $hsl['agama'] = "-";
            } else {
                $hsl['agama'] = $value['agama'];
            }
            if (empty($value['email'])) {
                $hsl['email'] = "-";
            } else {
                $hsl['email'] = $value['email'];
            }
            if (empty($value['telp'])) {
                $hsl['telp'] = "-";
            } else {
                $hsl['telp'] = $value['telp'];
            }
            if (empty($value['alamat'])) {
                $hsl['alamat'] = "-";
            } else {
                $hsl['alamat'] = $value['alamat'];
            }
            $hasil_data["hasil"] []= $hsl;
            // hide output null
            // $hasil_get_login = (object) array_filter((array) $hasil_data);
            header('Content-Type: application/Json');
            echo json_encode($hasil_data, TRUE);
        } else {
            $hasil_data["status"] = "404 User Not Found";
            echo json_encode($hasil_data);
        }
    }

    function get_user()
    {
        $url = "localhost/workshopelearning/";
        // $id_user = $this->session->userdata('ses_idlogin');
        $id_user = $_GET['id_user'];
        $password = $_GET['password'];
        $cekauth = $this->main_model->auth_api_user($id_user, $password);
        if ($cekauth->num_rows() > 0) {
            $data = $cekauth->row_array();

            $value = $this->main_model->get_detail_user($data['id_user'])->row_array();
            $hsl['id_user'] = $value["id_user"];
            $hsl['npm'] = $value['npm'];
            $hsl['nama'] = $value['nama'];
            $hsl['username'] = $value['username'];
            $hsl['password'] = $value['password'];
            if (empty($value['gambar'])) {
                $hsl['gambar'] = "no_image";
            } else {
                $hsl['gambar'] = $url . "images/gambar_user/" . $value['gambar'];
            }
            if (empty($value['tempat'])) {
                $hsl['tempat'] = "-";
            } else {
                $hsl['tempat'] = $value['tempat'];
            }
            if ($value['tgl_lahir'] == 0000 - 00 - 00) {
                $hsl['tgl_lahir'] = "-";
            } else {
                $hsl['tgl_lahir'] = $value['tgl_lahir'];
            }
            if (empty($value['agama'])) {
                $hsl['agama'] = "-";
            } else {
                $hsl['agama'] = $value['agama'];
            }
            if (empty($value['email'])) {
                $hsl['email'] = "-";
            } else {
                $hsl['email'] = $value['email'];
            }
            if (empty($value['telp'])) {
                $hsl['telp'] = "-";
            } else {
                $hsl['telp'] = $value['telp'];
            }
            if (empty($value['alamat'])) {
                $hsl['alamat'] = "-";
            } else {
                $hsl['alamat'] = $value['alamat'];
            }
            $hasil_data["hasil user"] = $hsl;
            // hide output null
            $hasil_get_login = (object) array_filter((array) $hasil_data);
            header('Content-Type: application/Json');
            echo json_encode($hasil_get_login, TRUE);
        } else {
            $responsistem["status"] = "404 Data Not Found, Please Check Your ID and Password";
            echo json_encode($responsistem);
        }
    }

    function get_JadwalPribadi()
    {
        $id_user = $_GET['id_user'];
        $password = $_GET['password'];
        $cekauth = $this->main_model->auth_api_user($id_user, $password);
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

            if (!empty($sistem_instrumentasi)) {
                $matkul = $this->main_model->get_kelas_matkulBYKODE($sistem_instrumentasi)->result_array();
                $asdos1 = $this->main_model->get_asdos1_iduser($matkul[0]['asdos_1'])->result();
                $asdos2 = $this->main_model->get_asdos2_iduser($matkul[0]['asdos_2'])->result();
                foreach ($asdos1 as $asd1) {
                }
                foreach ($asdos2 as $asd2) {
                }
                if ($matkul[0]['lab'] == 1) {
                    $orkom = "Lab. Organisasi Komputer";
                }
                if ($matkul[0]['lab'] == 0) {
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
                if ($matkul[0]['lab'] == 1) {
                    $orkom = "Lab. Organisasi Komputer";
                }
                if ($matkul[0]['lab'] == 0) {
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
                if ($matkul[0]['lab'] == 1) {
                    $orkom = "Lab. Organisasi Komputer";
                }
                if ($matkul[0]['lab'] == 0) {
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
                if ($matkul[0]['lab'] == 1) {
                    $orkom = "Lab. Organisasi Komputer";
                }
                if ($matkul[0]['lab'] == 0) {
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
                if ($matkul[0]['lab'] == 1) {
                    $orkom = "Lab. Organisasi Komputer";
                }
                if ($matkul[0]['lab'] == 0) {
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
                if ($matkul[0]['lab'] == 1) {
                    $orkom = "Lab. Organisasi Komputer";
                }
                if ($matkul[0]['lab'] == 0) {
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
                if ($matkul[0]['lab'] == 1) {
                    $orkom = "Lab. Organisasi Komputer";
                }
                if ($matkul[0]['lab'] == 0) {
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
                if ($matkul[0]['lab'] == 1) {
                    $orkom = "Lab. Organisasi Komputer";
                }
                if ($matkul[0]['lab'] == 0) {
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
                if ($matkul[0]['lab'] == 1) {
                    $orkom = "Lab. Organisasi Komputer";
                }
                if ($matkul[0]['lab'] == 0) {
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
                if ($matkul[0]['lab'] == 1) {
                    $orkom = "Lab. Organisasi Komputer";
                }
                if ($matkul[0]['lab'] == 0) {
                    $ddi = "Lab. Dasar-Dasar Instrumentasi";
                }

                $data_array = array(
                    $kelas = $matkul[0]['kelas'],
                    $jadwal = $matkul[0]['hari'] . " - " . $matkul[0]['mulai_praktikum'] . " s/d " . $matkul[0]['selesai_praktikum'],
                    $asd1->nama,
                    $asd2->nama,
                    $ddi
                );

                $data_sistem_pemrograman_mikroprosesor = (object) $data_array;
            }

            if (!empty($mobile_programing)) {
                $matkul = $this->main_model->get_kelas_matkulBYKODE($mobile_programing)->result_array();
                $asdos1 = $this->main_model->get_asdos1_iduser($matkul[0]['asdos_1'])->result();
                $asdos2 = $this->main_model->get_asdos1_iduser($matkul[0]['asdos_2'])->result();
                foreach ($asdos1 as $asd1) {
                }
                foreach ($asdos2 as $asd2) {
                }
                if ($matkul[0]['lab'] == 1) {
                    $orkom = "Lab. Organisasi Komputer";
                }
                if ($matkul[0]['lab'] == 0) {
                    $ddi = "Lab. Dasar-Dasar Instrumentasi";
                }

                $data_array = array(
                    $kelas = $matkul[0]['kelas'],
                    $jadwal = $matkul[0]['hari'] . " - " . $matkul[0]['mulai_praktikum'] . " s/d " . $matkul[0]['selesai_praktikum'],
                    $asd1->nama,
                    $asd2->nama,
                    $ddi
                );
                $data_mobile_programing = (object) $data_array;
            }
            if (!empty($keamanan_jaringan)) {
                $matkul = $this->main_model->get_kelas_matkulBYKODE($keamanan_jaringan)->result_array();
                $asdos1 = $this->main_model->get_asdos1_iduser($matkul[0]['asdos_1'])->result();
                $asdos2 = $this->main_model->get_asdos1_iduser($matkul[0]['asdos_2'])->result();
                foreach ($asdos1 as $asd1) {
                }
                foreach ($asdos2 as $asd2) {
                }
                if ($matkul[0]['lab'] == 1) {
                    $orkom = "Lab. Organisasi Komputer";
                }
                if ($matkul[0]['lab'] == 0) {
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

                if ($matkul[0]['lab'] == 1) {
                    $orkom = "Lab. Organisasi Komputer";
                }
                if ($matkul[0]['lab'] == 0) {
                    $ddi = "Lab. Dasar-Dasar Instrumentasi";
                }

                $data_array = array(
                    $kelas = $matkul[0]['kelas'],
                    $jadwal = $matkul[0]['hari'] . " - " . $matkul[0]['mulai_praktikum'] . " s/d " . $matkul[0]['selesai_praktikum'],
                    $asd1->nama,
                    $asd2->nama,
                    $orkom
                );
                $data_pemrograman_python = (object) $data_array;
            }
            if (!empty($sistem_interface_mikrokontroler)) {
                $matkul = $this->main_model->get_kelas_matkulBYKODE($sistem_interface_mikrokontroler)->result_array();
                $asdos1 = $this->main_model->get_asdos1_iduser($matkul[0]['asdos_1'])->result();
                $asdos2 = $this->main_model->get_asdos1_iduser($matkul[0]['asdos_2'])->result();
                foreach ($asdos1 as $asd1) {
                }
                foreach ($asdos2 as $asd2) {
                }
                if ($matkul[0]['lab'] == 1) {
                    $orkom = "Lab. Organisasi Komputer";
                }
                if ($matkul[0]['lab'] == 0) {
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
                if ($matkul[0]['lab'] == 1) {
                    $orkom = "Lab. Organisasi Komputer";
                }
                if ($matkul[0]['lab'] == 0) {
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
            if (($sistem_instrumentasi) || ($organisasi_komputer) ||  ($elektronika) ||  ($sistem_digital_1) ||  ($jaringan_komputer) ||  ($sistem_digital_2) ||  ($sistem_mikroprosesor) ||  ($otomasi) ||  ($administrasi_jaringan) ||  ($sistem_pemrograman_mikroprosesor) ||  ($mobile_programing) ||  ($keamanan_jaringan) ||  ($pemrograman_python) ||  ($sistem_interface_mikrokontroler) ||  ($robotik)) {
                $hasil = array();
                $hasil["hasil jadwal pribadi"] = array();
                $hsl = array(
                    $data_sistem_instrumentasi, $data_organisasi_komputer,
                    $data_elektronika, $data_administrasi_jaringan, $data_jaringan_komputer,
                    $data_keamanan_jaringan, $data_mobile_programing, $data_otomasi,
                    $data_pemrograman_python, $data_sistem_digital_1, $data_sistem_digital_2,
                    $data_sistem_interface_mikrokontroler, $data_sistem_mikroprosesor,
                    $data_sistem_pemrograman_mikroprosesor, $data_robotik
                );
                // hide output null
                $hasil = array_filter((array) $hsl);
                $hasil_jadwal["hasil_jadwal_pribadi"] []= $hasil;
                header('Content-Type: application/Json');
                echo json_encode($hasil_jadwal, TRUE);
            } else {
                $hasil_jadwal["status"] = "404 Data Not Found";
                echo json_encode($hasil_jadwal);
            }
        } else {
            $responsistem["status"] = "404 Data Not Found, Please Check Your ID and Password";
            echo json_encode($responsistem);
        }
    }

    function get_JadwalNgajar()
    {
        $id_user = $_GET['id_user'];
        $password = $_GET['password'];
        $cekauth = $this->main_model->auth_api_user($id_user, $password);
        if ($cekauth->num_rows() > 0) {
            
            $data = $cekauth->row_array();
            $hsl = $this->main_model->get_jadwal_ngajar($data['id_user']);
            foreach ($hsl->result() as $row) {
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

                $hsl = array($val);
                // $hasil = array_filter((array) $hsl);
                array_push($hasil_data["hasil_jadwal_ngajar"]= $hsl);
                echo json_encode($hasil_data, TRUE);
                header('Content-Type: application/Json');
            }
            
        } else {
            $responsistem["status"] = "404 Data Not Found, Please Check Your ID and Password";
            echo json_encode($responsistem);
        }
    }

    function get_JadwalOrkom()
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
        // $hari = $this->get('hari');
        $jadwalorkom = $this->main_model->lab_orkom($hari)->result();
        if (empty($jadwalorkom)) {
            $responsistem["status"] = "404 Jadwal Orkom Not Found";
            echo json_encode($responsistem);
        } else {
            $hasil = (object) array_filter((array) $jadwalorkom);
            $hasil_get_jadwalorkom["hasil jadwal orkom"] = $hasil;
            header('Content-Type: application/Json');
            echo json_encode($hasil_get_jadwalorkom, TRUE);
        }
    }

    function get_JadwalDDI()
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
        // $hari = $this->get('hari');
        $jadwalddi = $this->main_model->lab_ddi($hari)->result();
        if (empty($jadwalddi)) {
            $responsistem["status"] = "404 Jadwal Orkom Not Found";
            echo json_encode($responsistem);
        } else {
            $hasil = (object) array_filter((array) $jadwalddi);
            $hasil_get_jadwalddi["hasil jadwal orkom"] = $hasil;
            header('Content-Type: application/Json');
            echo json_encode($hasil_get_jadwalddi, TRUE);
        }
    }

    function get_Absen()
    {
        // $id_user = $this->session->userdata('ses_idlogin');
        $id_user = $_GET['id_user'];
        $password = $_GET['password'];
        $cekauth = $this->main_model->auth_api_user($id_user, $password);
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
            if (!empty($sistem_instrumentasi)) {
                $matkul = $this->main_model->get_kelas_matkulBYKODE($sistem_instrumentasi)->result_array();
                $id_kelas_matkul = $matkul[0]['id_kelas_matkul'];
                $data_absensi = $this->main_model->get_all_absen_mhsBY($id_kelas_matkul, $id_user)->result_array();
                $hadir['kelas'] = $matkul[0]['kelas'];
                if ($data_absensi[0]['a_1'] == 0) {
                    $hadir['absen 1'] = "Tidak Hadir";
                } else {
                    $hadir['absen 1'] = "Hadir";
                }
                if ($data_absensi[0]['a_2'] == 0) {
                    $hadir['absen 2'] = "Tidak Hadir";
                } else {
                    $hadir['absen 2'] = "Hadir";
                }
                if ($data_absensi[0]['a_3'] == 0) {
                    $hadir['absen 3'] = "Tidak Hadir";
                } else {
                    $hadir['absen 3'] = "Hadir";
                }
                if ($data_absensi[0]['a_4'] == 0) {
                    $hadir['absen 4'] = "Tidak Hadir";
                } else {
                    $hadir['absen 4'] = "Hadir";
                }
                if ($data_absensi[0]['a_5'] == 0) {
                    $hadir['absen 5'] = "Tidak Hadir";
                } else {
                    $hadir['absen 5'] = "Hadir";
                }
                if ($data_absensi[0]['a_6'] == 0) {
                    $hadir['absen 6'] = "Tidak Hadir";
                } else {
                    $hadir['absen 6'] = "Hadir";
                }
                if ($data_absensi[0]['a_7'] == 0) {
                    $hadir['absen 7'] = "Tidak Hadir";
                } else {
                    $hadir['absen 7'] = "Hadir";
                }
                if ($data_absensi[0]['a_8'] == 0) {
                    $hadir['absen 8'] = "Tidak Hadir";
                } else {
                    $hadir['absen 8'] = "Hadir";
                }
                if ($data_absensi[0]['a_9'] == 0) {
                    $hadir['absen 9'] = "Tidak Hadir";
                } else {
                    $hadir['absen 9'] = "Hadir";
                }
                if ($data_absensi[0]['a_10'] == 0) {
                    $hadir['absen 10'] = "Tidak Hadir";
                } else {
                    $hadir['absen 10'] = "Hadir";
                }
                $data_sistem_instrumentasi = array(
                    $hadir
                );
            }
            if (!empty($organisasi_komputer)) {
                $matkul = $this->main_model->get_kelas_matkulBYKODE($organisasi_komputer)->result_array();
                $id_kelas_matkul = $matkul[0]['id_kelas_matkul'];
                $data_absensi = $this->main_model->get_all_absen_mhsBY($id_kelas_matkul, $id_user)->result_array();
                $hadir['kelas'] = $matkul[0]['kelas'];
                if ($data_absensi[0]['a_1'] == 0) {
                    $hadir['absen 1'] = "Tidak Hadir";
                } else {
                    $hadir['absen 1'] = "Hadir";
                }
                if ($data_absensi[0]['a_2'] == 0) {
                    $hadir['absen 2'] = "Tidak Hadir";
                } else {
                    $hadir['absen 2'] = "Hadir";
                }
                if ($data_absensi[0]['a_3'] == 0) {
                    $hadir['absen 3'] = "Tidak Hadir";
                } else {
                    $hadir['absen 3'] = "Hadir";
                }
                if ($data_absensi[0]['a_4'] == 0) {
                    $hadir['absen 4'] = "Tidak Hadir";
                } else {
                    $hadir['absen 4'] = "Hadir";
                }
                if ($data_absensi[0]['a_5'] == 0) {
                    $hadir['absen 5'] = "Tidak Hadir";
                } else {
                    $hadir['absen 5'] = "Hadir";
                }
                if ($data_absensi[0]['a_6'] == 0) {
                    $hadir['absen 6'] = "Tidak Hadir";
                } else {
                    $hadir['absen 6'] = "Hadir";
                }
                if ($data_absensi[0]['a_7'] == 0) {
                    $hadir['absen 7'] = "Tidak Hadir";
                } else {
                    $hadir['absen 7'] = "Hadir";
                }
                if ($data_absensi[0]['a_8'] == 0) {
                    $hadir['absen 8'] = "Tidak Hadir";
                } else {
                    $hadir['absen 8'] = "Hadir";
                }
                if ($data_absensi[0]['a_9'] == 0) {
                    $hadir['absen 9'] = "Tidak Hadir";
                } else {
                    $hadir['absen 9'] = "Hadir";
                }
                if ($data_absensi[0]['a_10'] == 0) {
                    $hadir['absen 10'] = "Tidak Hadir";
                } else {
                    $hadir['absen 10'] = "Hadir";
                }
                $data_organisasi_komputer = array(
                    $hadir
                );
            }
            if (!empty($elektronika)) {
                $matkul = $this->main_model->get_kelas_matkulBYKODE($elektronika)->result_array();
                $id_kelas_matkul = $matkul[0]['id_kelas_matkul'];
                $data_absensi = $this->main_model->get_all_absen_mhsBY($id_kelas_matkul, $id_user)->result_array();
                $hadir['kelas'] = $matkul[0]['kelas'];
                if ($data_absensi[0]['a_1'] == 0) {
                    $hadir['absen 1'] = "Tidak Hadir";
                } else {
                    $hadir['absen 1'] = "Hadir";
                }
                if ($data_absensi[0]['a_2'] == 0) {
                    $hadir['absen 2'] = "Tidak Hadir";
                } else {
                    $hadir['absen 2'] = "Hadir";
                }
                if ($data_absensi[0]['a_3'] == 0) {
                    $hadir['absen 3'] = "Tidak Hadir";
                } else {
                    $hadir['absen 3'] = "Hadir";
                }
                if ($data_absensi[0]['a_4'] == 0) {
                    $hadir['absen 4'] = "Tidak Hadir";
                } else {
                    $hadir['absen 4'] = "Hadir";
                }
                if ($data_absensi[0]['a_5'] == 0) {
                    $hadir['absen 5'] = "Tidak Hadir";
                } else {
                    $hadir['absen 5'] = "Hadir";
                }
                if ($data_absensi[0]['a_6'] == 0) {
                    $hadir['absen 6'] = "Tidak Hadir";
                } else {
                    $hadir['absen 6'] = "Hadir";
                }
                if ($data_absensi[0]['a_7'] == 0) {
                    $hadir['absen 7'] = "Tidak Hadir";
                } else {
                    $hadir['absen 7'] = "Hadir";
                }
                if ($data_absensi[0]['a_8'] == 0) {
                    $hadir['absen 8'] = "Tidak Hadir";
                } else {
                    $hadir['absen 8'] = "Hadir";
                }
                if ($data_absensi[0]['a_9'] == 0) {
                    $hadir['absen 9'] = "Tidak Hadir";
                } else {
                    $hadir['absen 9'] = "Hadir";
                }
                if ($data_absensi[0]['a_10'] == 0) {
                    $hadir['absen 10'] = "Tidak Hadir";
                } else {
                    $hadir['absen 10'] = "Hadir";
                }
                $data_elektronika = array(
                    $hadir
                );
            }
            if (!empty($sistem_digital_1)) {
                $matkul = $this->main_model->get_kelas_matkulBYKODE($sistem_digital_1)->result_array();
                $id_kelas_matkul = $matkul[0]['id_kelas_matkul'];
                $data_absensi = $this->main_model->get_all_absen_mhsBY($id_kelas_matkul, $id_user)->result_array();
                $hadir['kelas'] = $matkul[0]['kelas'];
                if ($data_absensi[0]['a_1'] == 0) {
                    $hadir['absen 1'] = "Tidak Hadir";
                } else {
                    $hadir['absen 1'] = "Hadir";
                }
                if ($data_absensi[0]['a_2'] == 0) {
                    $hadir['absen 2'] = "Tidak Hadir";
                } else {
                    $hadir['absen 2'] = "Hadir";
                }
                if ($data_absensi[0]['a_3'] == 0) {
                    $hadir['absen 3'] = "Tidak Hadir";
                } else {
                    $hadir['absen 3'] = "Hadir";
                }
                if ($data_absensi[0]['a_4'] == 0) {
                    $hadir['absen 4'] = "Tidak Hadir";
                } else {
                    $hadir['absen 4'] = "Hadir";
                }
                if ($data_absensi[0]['a_5'] == 0) {
                    $hadir['absen 5'] = "Tidak Hadir";
                } else {
                    $hadir['absen 5'] = "Hadir";
                }
                if ($data_absensi[0]['a_6'] == 0) {
                    $hadir['absen 6'] = "Tidak Hadir";
                } else {
                    $hadir['absen 6'] = "Hadir";
                }
                if ($data_absensi[0]['a_7'] == 0) {
                    $hadir['absen 7'] = "Tidak Hadir";
                } else {
                    $hadir['absen 7'] = "Hadir";
                }
                if ($data_absensi[0]['a_8'] == 0) {
                    $hadir['absen 8'] = "Tidak Hadir";
                } else {
                    $hadir['absen 8'] = "Hadir";
                }
                if ($data_absensi[0]['a_9'] == 0) {
                    $hadir['absen 9'] = "Tidak Hadir";
                } else {
                    $hadir['absen 9'] = "Hadir";
                }
                if ($data_absensi[0]['a_10'] == 0) {
                    $hadir['absen 10'] = "Tidak Hadir";
                } else {
                    $hadir['absen 10'] = "Hadir";
                }
                $data_sistem_digital_1 = array(
                    $hadir
                );
            }
            if (!empty($jaringan_komputer)) {
                $matkul = $this->main_model->get_kelas_matkulBYKODE($jaringan_komputer)->result_array();
                $id_kelas_matkul = $matkul[0]['id_kelas_matkul'];
                $data_absensi = $this->main_model->get_all_absen_mhsBY($id_kelas_matkul, $id_user)->result_array();
                $hadir['kelas'] = $matkul[0]['kelas'];
                if ($data_absensi[0]['a_1'] == 0) {
                    $hadir['absen 1'] = "Tidak Hadir";
                } else {
                    $hadir['absen 1'] = "Hadir";
                }
                if ($data_absensi[0]['a_2'] == 0) {
                    $hadir['absen 2'] = "Tidak Hadir";
                } else {
                    $hadir['absen 2'] = "Hadir";
                }
                if ($data_absensi[0]['a_3'] == 0) {
                    $hadir['absen 3'] = "Tidak Hadir";
                } else {
                    $hadir['absen 3'] = "Hadir";
                }
                if ($data_absensi[0]['a_4'] == 0) {
                    $hadir['absen 4'] = "Tidak Hadir";
                } else {
                    $hadir['absen 4'] = "Hadir";
                }
                if ($data_absensi[0]['a_5'] == 0) {
                    $hadir['absen 5'] = "Tidak Hadir";
                } else {
                    $hadir['absen 5'] = "Hadir";
                }
                if ($data_absensi[0]['a_6'] == 0) {
                    $hadir['absen 6'] = "Tidak Hadir";
                } else {
                    $hadir['absen 6'] = "Hadir";
                }
                if ($data_absensi[0]['a_7'] == 0) {
                    $hadir['absen 7'] = "Tidak Hadir";
                } else {
                    $hadir['absen 7'] = "Hadir";
                }
                if ($data_absensi[0]['a_8'] == 0) {
                    $hadir['absen 8'] = "Tidak Hadir";
                } else {
                    $hadir['absen 8'] = "Hadir";
                }
                if ($data_absensi[0]['a_9'] == 0) {
                    $hadir['absen 9'] = "Tidak Hadir";
                } else {
                    $hadir['absen 9'] = "Hadir";
                }
                if ($data_absensi[0]['a_10'] == 0) {
                    $hadir['absen 10'] = "Tidak Hadir";
                } else {
                    $hadir['absen 10'] = "Hadir";
                }
                $data_jaringan_komputer = array(
                    $hadir
                );
            }
            if (!empty($sistem_digital_2)) {
                $matkul = $this->main_model->get_kelas_matkulBYKODE($sistem_digital_2)->result_array();
                $id_kelas_matkul = $matkul[0]['id_kelas_matkul'];
                $data_absensi = $this->main_model->get_all_absen_mhsBY($id_kelas_matkul, $id_user)->result_array();
                $hadir['kelas'] = $matkul[0]['kelas'];
                if ($data_absensi[0]['a_1'] == 0) {
                    $hadir['absen 1'] = "Tidak Hadir";
                } else {
                    $hadir['absen 1'] = "Hadir";
                }
                if ($data_absensi[0]['a_2'] == 0) {
                    $hadir['absen 2'] = "Tidak Hadir";
                } else {
                    $hadir['absen 2'] = "Hadir";
                }
                if ($data_absensi[0]['a_3'] == 0) {
                    $hadir['absen 3'] = "Tidak Hadir";
                } else {
                    $hadir['absen 3'] = "Hadir";
                }
                if ($data_absensi[0]['a_4'] == 0) {
                    $hadir['absen 4'] = "Tidak Hadir";
                } else {
                    $hadir['absen 4'] = "Hadir";
                }
                if ($data_absensi[0]['a_5'] == 0) {
                    $hadir['absen 5'] = "Tidak Hadir";
                } else {
                    $hadir['absen 5'] = "Hadir";
                }
                if ($data_absensi[0]['a_6'] == 0) {
                    $hadir['absen 6'] = "Tidak Hadir";
                } else {
                    $hadir['absen 6'] = "Hadir";
                }
                if ($data_absensi[0]['a_7'] == 0) {
                    $hadir['absen 7'] = "Tidak Hadir";
                } else {
                    $hadir['absen 7'] = "Hadir";
                }
                if ($data_absensi[0]['a_8'] == 0) {
                    $hadir['absen 8'] = "Tidak Hadir";
                } else {
                    $hadir['absen 8'] = "Hadir";
                }
                if ($data_absensi[0]['a_9'] == 0) {
                    $hadir['absen 9'] = "Tidak Hadir";
                } else {
                    $hadir['absen 9'] = "Hadir";
                }
                if ($data_absensi[0]['a_10'] == 0) {
                    $hadir['absen 10'] = "Tidak Hadir";
                } else {
                    $hadir['absen 10'] = "Hadir";
                }
                $data_sistem_digital_2 = array(
                    $hadir
                );
            }
            if (!empty($sistem_mikroprosesor)) {
                $matkul = $this->main_model->get_kelas_matkulBYKODE($sistem_mikroprosesor)->result_array();
                $id_kelas_matkul = $matkul[0]['id_kelas_matkul'];
                $data_absensi = $this->main_model->get_all_absen_mhsBY($id_kelas_matkul, $id_user)->result_array();
                $hadir['kelas'] = $matkul[0]['kelas'];
                if ($data_absensi[0]['a_1'] == 0) {
                    $hadir['absen 1'] = "Tidak Hadir";
                } else {
                    $hadir['absen 1'] = "Hadir";
                }
                if ($data_absensi[0]['a_2'] == 0) {
                    $hadir['absen 2'] = "Tidak Hadir";
                } else {
                    $hadir['absen 2'] = "Hadir";
                }
                if ($data_absensi[0]['a_3'] == 0) {
                    $hadir['absen 3'] = "Tidak Hadir";
                } else {
                    $hadir['absen 3'] = "Hadir";
                }
                if ($data_absensi[0]['a_4'] == 0) {
                    $hadir['absen 4'] = "Tidak Hadir";
                } else {
                    $hadir['absen 4'] = "Hadir";
                }
                if ($data_absensi[0]['a_5'] == 0) {
                    $hadir['absen 5'] = "Tidak Hadir";
                } else {
                    $hadir['absen 5'] = "Hadir";
                }
                if ($data_absensi[0]['a_6'] == 0) {
                    $hadir['absen 6'] = "Tidak Hadir";
                } else {
                    $hadir['absen 6'] = "Hadir";
                }
                if ($data_absensi[0]['a_7'] == 0) {
                    $hadir['absen 7'] = "Tidak Hadir";
                } else {
                    $hadir['absen 7'] = "Hadir";
                }
                if ($data_absensi[0]['a_8'] == 0) {
                    $hadir['absen 8'] = "Tidak Hadir";
                } else {
                    $hadir['absen 8'] = "Hadir";
                }
                if ($data_absensi[0]['a_9'] == 0) {
                    $hadir['absen 9'] = "Tidak Hadir";
                } else {
                    $hadir['absen 9'] = "Hadir";
                }
                if ($data_absensi[0]['a_10'] == 0) {
                    $hadir['absen 10'] = "Tidak Hadir";
                } else {
                    $hadir['absen 10'] = "Hadir";
                }
                $data_sistem_mikroprosesor = array(
                    $hadir
                );
            }
            if (!empty($otomasi)) {
                $matkul = $this->main_model->get_kelas_matkulBYKODE($otomasi)->result_array();
                $id_kelas_matkul = $matkul[0]['id_kelas_matkul'];
                $data_absensi = $this->main_model->get_all_absen_mhsBY($id_kelas_matkul, $id_user)->result_array();
                $hadir['kelas'] = $matkul[0]['kelas'];
                if ($data_absensi[0]['a_1'] == 0) {
                    $hadir['absen 1'] = "Tidak Hadir";
                } else {
                    $hadir['absen 1'] = "Hadir";
                }
                if ($data_absensi[0]['a_2'] == 0) {
                    $hadir['absen 2'] = "Tidak Hadir";
                } else {
                    $hadir['absen 2'] = "Hadir";
                }
                if ($data_absensi[0]['a_3'] == 0) {
                    $hadir['absen 3'] = "Tidak Hadir";
                } else {
                    $hadir['absen 3'] = "Hadir";
                }
                if ($data_absensi[0]['a_4'] == 0) {
                    $hadir['absen 4'] = "Tidak Hadir";
                } else {
                    $hadir['absen 4'] = "Hadir";
                }
                if ($data_absensi[0]['a_5'] == 0) {
                    $hadir['absen 5'] = "Tidak Hadir";
                } else {
                    $hadir['absen 5'] = "Hadir";
                }
                if ($data_absensi[0]['a_6'] == 0) {
                    $hadir['absen 6'] = "Tidak Hadir";
                } else {
                    $hadir['absen 6'] = "Hadir";
                }
                if ($data_absensi[0]['a_7'] == 0) {
                    $hadir['absen 7'] = "Tidak Hadir";
                } else {
                    $hadir['absen 7'] = "Hadir";
                }
                if ($data_absensi[0]['a_8'] == 0) {
                    $hadir['absen 8'] = "Tidak Hadir";
                } else {
                    $hadir['absen 8'] = "Hadir";
                }
                if ($data_absensi[0]['a_9'] == 0) {
                    $hadir['absen 9'] = "Tidak Hadir";
                } else {
                    $hadir['absen 9'] = "Hadir";
                }
                if ($data_absensi[0]['a_10'] == 0) {
                    $hadir['absen 10'] = "Tidak Hadir";
                } else {
                    $hadir['absen 10'] = "Hadir";
                }
                $data_otomasi = array(
                    $hadir
                );
            }
            if (!empty($administrasi_jaringan)) {
                $matkul = $this->main_model->get_kelas_matkulBYKODE($administrasi_jaringan)->result_array();
                $id_kelas_matkul = $matkul[0]['id_kelas_matkul'];
                $data_absensi = $this->main_model->get_all_absen_mhsBY($id_kelas_matkul, $id_user)->result_array();
                $hadir['kelas'] = $matkul[0]['kelas'];
                if ($data_absensi[0]['a_1'] == 0) {
                    $hadir['absen 1'] = "Tidak Hadir";
                } else {
                    $hadir['absen 1'] = "Hadir";
                }
                if ($data_absensi[0]['a_2'] == 0) {
                    $hadir['absen 2'] = "Tidak Hadir";
                } else {
                    $hadir['absen 2'] = "Hadir";
                }
                if ($data_absensi[0]['a_3'] == 0) {
                    $hadir['absen 3'] = "Tidak Hadir";
                } else {
                    $hadir['absen 3'] = "Hadir";
                }
                if ($data_absensi[0]['a_4'] == 0) {
                    $hadir['absen 4'] = "Tidak Hadir";
                } else {
                    $hadir['absen 4'] = "Hadir";
                }
                if ($data_absensi[0]['a_5'] == 0) {
                    $hadir['absen 5'] = "Tidak Hadir";
                } else {
                    $hadir['absen 5'] = "Hadir";
                }
                if ($data_absensi[0]['a_6'] == 0) {
                    $hadir['absen 6'] = "Tidak Hadir";
                } else {
                    $hadir['absen 6'] = "Hadir";
                }
                if ($data_absensi[0]['a_7'] == 0) {
                    $hadir['absen 7'] = "Tidak Hadir";
                } else {
                    $hadir['absen 7'] = "Hadir";
                }
                if ($data_absensi[0]['a_8'] == 0) {
                    $hadir['absen 8'] = "Tidak Hadir";
                } else {
                    $hadir['absen 8'] = "Hadir";
                }
                if ($data_absensi[0]['a_9'] == 0) {
                    $hadir['absen 9'] = "Tidak Hadir";
                } else {
                    $hadir['absen 9'] = "Hadir";
                }
                if ($data_absensi[0]['a_10'] == 0) {
                    $hadir['absen 10'] = "Tidak Hadir";
                } else {
                    $hadir['absen 10'] = "Hadir";
                }
                $data_administrasi_jaringan = array(
                    $hadir
                );
            }
            if (!empty($sistem_pemrograman_mikroprosesor)) {
                $matkul = $this->main_model->get_kelas_matkulBYKODE($sistem_pemrograman_mikroprosesor)->result_array();
                $id_kelas_matkul = $matkul[0]['id_kelas_matkul'];
                $data_absensi = $this->main_model->get_all_absen_mhsBY($id_kelas_matkul, $id_user)->result_array();
                $hadir['kelas'] = $matkul[0]['kelas'];
                if ($data_absensi[0]['a_1'] == 0) {
                    $hadir['absen 1'] = "Tidak Hadir";
                } else {
                    $hadir['absen 1'] = "Hadir";
                }
                if ($data_absensi[0]['a_2'] == 0) {
                    $hadir['absen 2'] = "Tidak Hadir";
                } else {
                    $hadir['absen 2'] = "Hadir";
                }
                if ($data_absensi[0]['a_3'] == 0) {
                    $hadir['absen 3'] = "Tidak Hadir";
                } else {
                    $hadir['absen 3'] = "Hadir";
                }
                if ($data_absensi[0]['a_4'] == 0) {
                    $hadir['absen 4'] = "Tidak Hadir";
                } else {
                    $hadir['absen 4'] = "Hadir";
                }
                if ($data_absensi[0]['a_5'] == 0) {
                    $hadir['absen 5'] = "Tidak Hadir";
                } else {
                    $hadir['absen 5'] = "Hadir";
                }
                if ($data_absensi[0]['a_6'] == 0) {
                    $hadir['absen 6'] = "Tidak Hadir";
                } else {
                    $hadir['absen 6'] = "Hadir";
                }
                if ($data_absensi[0]['a_7'] == 0) {
                    $hadir['absen 7'] = "Tidak Hadir";
                } else {
                    $hadir['absen 7'] = "Hadir";
                }
                if ($data_absensi[0]['a_8'] == 0) {
                    $hadir['absen 8'] = "Tidak Hadir";
                } else {
                    $hadir['absen 8'] = "Hadir";
                }
                if ($data_absensi[0]['a_9'] == 0) {
                    $hadir['absen 9'] = "Tidak Hadir";
                } else {
                    $hadir['absen 9'] = "Hadir";
                }
                if ($data_absensi[0]['a_10'] == 0) {
                    $hadir['absen 10'] = "Tidak Hadir";
                } else {
                    $hadir['absen 10'] = "Hadir";
                }
                $data_sistem_pemrograman_mikroprosesor = array(
                    $hadir
                );
            }
            if (!empty($mobile_programing)) {
                $matkul = $this->main_model->get_kelas_matkulBYKODE($mobile_programing)->result_array();
                $id_kelas_matkul = $matkul[0]['id_kelas_matkul'];
                $data_absensi = $this->main_model->get_all_absen_mhsBY($id_kelas_matkul, $id_user)->result_array();
                $hadir['kelas'] = $matkul[0]['kelas'];
                if ($data_absensi[0]['a_1'] == 0) {
                    $hadir['absen 1'] = "Tidak Hadir";
                } else {
                    $hadir['absen 1'] = "Hadir";
                }
                if ($data_absensi[0]['a_2'] == 0) {
                    $hadir['absen 2'] = "Tidak Hadir";
                } else {
                    $hadir['absen 2'] = "Hadir";
                }
                if ($data_absensi[0]['a_3'] == 0) {
                    $hadir['absen 3'] = "Tidak Hadir";
                } else {
                    $hadir['absen 3'] = "Hadir";
                }
                if ($data_absensi[0]['a_4'] == 0) {
                    $hadir['absen 4'] = "Tidak Hadir";
                } else {
                    $hadir['absen 4'] = "Hadir";
                }
                if ($data_absensi[0]['a_5'] == 0) {
                    $hadir['absen 5'] = "Tidak Hadir";
                } else {
                    $hadir['absen 5'] = "Hadir";
                }
                if ($data_absensi[0]['a_6'] == 0) {
                    $hadir['absen 6'] = "Tidak Hadir";
                } else {
                    $hadir['absen 6'] = "Hadir";
                }
                if ($data_absensi[0]['a_7'] == 0) {
                    $hadir['absen 7'] = "Tidak Hadir";
                } else {
                    $hadir['absen 7'] = "Hadir";
                }
                if ($data_absensi[0]['a_8'] == 0) {
                    $hadir['absen 8'] = "Tidak Hadir";
                } else {
                    $hadir['absen 8'] = "Hadir";
                }
                if ($data_absensi[0]['a_9'] == 0) {
                    $hadir['absen 9'] = "Tidak Hadir";
                } else {
                    $hadir['absen 9'] = "Hadir";
                }
                if ($data_absensi[0]['a_10'] == 0) {
                    $hadir['absen 10'] = "Tidak Hadir";
                } else {
                    $hadir['absen 10'] = "Hadir";
                }
                $data_mobile_programing = array(
                    $hadir
                );
            }
            if (!empty($keamanan_jaringan)) {
                $matkul = $this->main_model->get_kelas_matkulBYKODE($keamanan_jaringan)->result_array();
                $id_kelas_matkul = $matkul[0]['id_kelas_matkul'];
                $data_absensi = $this->main_model->get_all_absen_mhsBY($id_kelas_matkul, $id_user)->result_array();
                $hadir['kelas'] = $matkul[0]['kelas'];
                if ($data_absensi[0]['a_1'] == 0) {
                    $hadir['absen 1'] = "Tidak Hadir";
                } else {
                    $hadir['absen 1'] = "Hadir";
                }
                if ($data_absensi[0]['a_2'] == 0) {
                    $hadir['absen 2'] = "Tidak Hadir";
                } else {
                    $hadir['absen 2'] = "Hadir";
                }
                if ($data_absensi[0]['a_3'] == 0) {
                    $hadir['absen 3'] = "Tidak Hadir";
                } else {
                    $hadir['absen 3'] = "Hadir";
                }
                if ($data_absensi[0]['a_4'] == 0) {
                    $hadir['absen 4'] = "Tidak Hadir";
                } else {
                    $hadir['absen 4'] = "Hadir";
                }
                if ($data_absensi[0]['a_5'] == 0) {
                    $hadir['absen 5'] = "Tidak Hadir";
                } else {
                    $hadir['absen 5'] = "Hadir";
                }
                if ($data_absensi[0]['a_6'] == 0) {
                    $hadir['absen 6'] = "Tidak Hadir";
                } else {
                    $hadir['absen 6'] = "Hadir";
                }
                if ($data_absensi[0]['a_7'] == 0) {
                    $hadir['absen 7'] = "Tidak Hadir";
                } else {
                    $hadir['absen 7'] = "Hadir";
                }
                if ($data_absensi[0]['a_8'] == 0) {
                    $hadir['absen 8'] = "Tidak Hadir";
                } else {
                    $hadir['absen 8'] = "Hadir";
                }
                if ($data_absensi[0]['a_9'] == 0) {
                    $hadir['absen 9'] = "Tidak Hadir";
                } else {
                    $hadir['absen 9'] = "Hadir";
                }
                if ($data_absensi[0]['a_10'] == 0) {
                    $hadir['absen 10'] = "Tidak Hadir";
                } else {
                    $hadir['absen 10'] = "Hadir";
                }
                $data_keamanan_jaringan = array(
                    $hadir
                );
            }
            if (!empty($pemrograman_python)) {
                $matkul = $this->main_model->get_kelas_matkulBYKODE($pemrograman_python)->result_array();
                $id_kelas_matkul = $matkul[0]['id_kelas_matkul'];
                $data_absensi = $this->main_model->get_all_absen_mhsBY($id_kelas_matkul, $id_user)->result_array();
                $hadir['kelas'] = $matkul[0]['kelas'];
                if ($data_absensi[0]['a_1'] == 0) {
                    $hadir['absen 1'] = "Tidak Hadir";
                } else {
                    $hadir['absen 1'] = "Hadir";
                }
                if ($data_absensi[0]['a_2'] == 0) {
                    $hadir['absen 2'] = "Tidak Hadir";
                } else {
                    $hadir['absen 2'] = "Hadir";
                }
                if ($data_absensi[0]['a_3'] == 0) {
                    $hadir['absen 3'] = "Tidak Hadir";
                } else {
                    $hadir['absen 3'] = "Hadir";
                }
                if ($data_absensi[0]['a_4'] == 0) {
                    $hadir['absen 4'] = "Tidak Hadir";
                } else {
                    $hadir['absen 4'] = "Hadir";
                }
                if ($data_absensi[0]['a_5'] == 0) {
                    $hadir['absen 5'] = "Tidak Hadir";
                } else {
                    $hadir['absen 5'] = "Hadir";
                }
                if ($data_absensi[0]['a_6'] == 0) {
                    $hadir['absen 6'] = "Tidak Hadir";
                } else {
                    $hadir['absen 6'] = "Hadir";
                }
                if ($data_absensi[0]['a_7'] == 0) {
                    $hadir['absen 7'] = "Tidak Hadir";
                } else {
                    $hadir['absen 7'] = "Hadir";
                }
                if ($data_absensi[0]['a_8'] == 0) {
                    $hadir['absen 8'] = "Tidak Hadir";
                } else {
                    $hadir['absen 8'] = "Hadir";
                }
                if ($data_absensi[0]['a_9'] == 0) {
                    $hadir['absen 9'] = "Tidak Hadir";
                } else {
                    $hadir['absen 9'] = "Hadir";
                }
                if ($data_absensi[0]['a_10'] == 0) {
                    $hadir['absen 10'] = "Tidak Hadir";
                } else {
                    $hadir['absen 10'] = "Hadir";
                }
                $data_pemrograman_python = array(
                    $hadir
                );
            }
            if (!empty($sistem_interface_mikrokontroler)) {
                $matkul = $this->main_model->get_kelas_matkulBYKODE($sistem_interface_mikrokontroler)->result_array();
                $id_kelas_matkul = $matkul[0]['id_kelas_matkul'];
                $data_absensi = $this->main_model->get_all_absen_mhsBY($id_kelas_matkul, $id_user)->result_array();
                $hadir['kelas'] = $matkul[0]['kelas'];
                if ($data_absensi[0]['a_1'] == 0) {
                    $hadir['absen 1'] = "Tidak Hadir";
                } else {
                    $hadir['absen 1'] = "Hadir";
                }
                if ($data_absensi[0]['a_2'] == 0) {
                    $hadir['absen 2'] = "Tidak Hadir";
                } else {
                    $hadir['absen 2'] = "Hadir";
                }
                if ($data_absensi[0]['a_3'] == 0) {
                    $hadir['absen 3'] = "Tidak Hadir";
                } else {
                    $hadir['absen 3'] = "Hadir";
                }
                if ($data_absensi[0]['a_4'] == 0) {
                    $hadir['absen 4'] = "Tidak Hadir";
                } else {
                    $hadir['absen 4'] = "Hadir";
                }
                if ($data_absensi[0]['a_5'] == 0) {
                    $hadir['absen 5'] = "Tidak Hadir";
                } else {
                    $hadir['absen 5'] = "Hadir";
                }
                if ($data_absensi[0]['a_6'] == 0) {
                    $hadir['absen 6'] = "Tidak Hadir";
                } else {
                    $hadir['absen 6'] = "Hadir";
                }
                if ($data_absensi[0]['a_7'] == 0) {
                    $hadir['absen 7'] = "Tidak Hadir";
                } else {
                    $hadir['absen 7'] = "Hadir";
                }
                if ($data_absensi[0]['a_8'] == 0) {
                    $hadir['absen 8'] = "Tidak Hadir";
                } else {
                    $hadir['absen 8'] = "Hadir";
                }
                if ($data_absensi[0]['a_9'] == 0) {
                    $hadir['absen 9'] = "Tidak Hadir";
                } else {
                    $hadir['absen 9'] = "Hadir";
                }
                if ($data_absensi[0]['a_10'] == 0) {
                    $hadir['absen 10'] = "Tidak Hadir";
                } else {
                    $hadir['absen 10'] = "Hadir";
                }
                $data_sistem_interface_mikrokontroler = array(
                    $hadir
                );
            }
            if (!empty($robotik)) {
                $matkul = $this->main_model->get_kelas_matkulBYKODE($robotik)->result_array();
                $id_kelas_matkul = $matkul[0]['id_kelas_matkul'];
                $data_absensi = $this->main_model->get_all_absen_mhsBY($id_kelas_matkul, $id_user)->result_array();
                $hadir['kelas'] = $matkul[0]['kelas'];
                if ($data_absensi[0]['a_1'] == 0) {
                    $hadir['absen 1'] = "Tidak Hadir";
                } else {
                    $hadir['absen 1'] = "Hadir";
                }
                if ($data_absensi[0]['a_2'] == 0) {
                    $hadir['absen 2'] = "Tidak Hadir";
                } else {
                    $hadir['absen 2'] = "Hadir";
                }
                if ($data_absensi[0]['a_3'] == 0) {
                    $hadir['absen 3'] = "Tidak Hadir";
                } else {
                    $hadir['absen 3'] = "Hadir";
                }
                if ($data_absensi[0]['a_4'] == 0) {
                    $hadir['absen 4'] = "Tidak Hadir";
                } else {
                    $hadir['absen 4'] = "Hadir";
                }
                if ($data_absensi[0]['a_5'] == 0) {
                    $hadir['absen 5'] = "Tidak Hadir";
                } else {
                    $hadir['absen 5'] = "Hadir";
                }
                if ($data_absensi[0]['a_6'] == 0) {
                    $hadir['absen 6'] = "Tidak Hadir";
                } else {
                    $hadir['absen 6'] = "Hadir";
                }
                if ($data_absensi[0]['a_7'] == 0) {
                    $hadir['absen 7'] = "Tidak Hadir";
                } else {
                    $hadir['absen 7'] = "Hadir";
                }
                if ($data_absensi[0]['a_8'] == 0) {
                    $hadir['absen 8'] = "Tidak Hadir";
                } else {
                    $hadir['absen 8'] = "Hadir";
                }
                if ($data_absensi[0]['a_9'] == 0) {
                    $hadir['absen 9'] = "Tidak Hadir";
                } else {
                    $hadir['absen 9'] = "Hadir";
                }
                if ($data_absensi[0]['a_10'] == 0) {
                    $hadir['absen 10'] = "Tidak Hadir";
                } else {
                    $hadir['absen 10'] = "Hadir";
                }
                $data_robotik = array(
                    $hadir
                );
            }

            if (($sistem_instrumentasi) || ($organisasi_komputer) ||  ($elektronika) ||  ($sistem_digital_1) ||  ($jaringan_komputer) ||  ($sistem_digital_2) ||  ($sistem_mikroprosesor) ||  ($otomasi) ||  ($administrasi_jaringan) ||  ($sistem_pemrograman_mikroprosesor) ||  ($mobile_programing) ||  ($keamanan_jaringan) ||  ($pemrograman_python) ||  ($sistem_interface_mikrokontroler) ||  ($robotik)) {
                $hasil = array(
                    $data_sistem_instrumentasi, $data_organisasi_komputer,
                    $data_elektronika, $data_administrasi_jaringan, $data_jaringan_komputer,
                    $data_keamanan_jaringan, $data_mobile_programing, $data_otomasi,
                    $data_pemrograman_python, $data_sistem_digital_1, $data_sistem_digital_2,
                    $data_sistem_interface_mikrokontroler, $data_sistem_mikroprosesor,
                    $data_sistem_pemrograman_mikroprosesor, $data_robotik
                );
                // hide output null
                $hasil_null_array = (object) array_filter((array) $hasil);
                $hasil_get_status_absen["Absensi Mata Kuliah"] = $hasil_null_array;
                header('Content-Type: application/Json');
                echo json_encode($hasil_get_status_absen, TRUE);
            } else {
                $responsistem["status"] = "404 Data Not Found";
                echo json_encode($responsistem);
            }
        } else {
            $responsistem["status"] = "404 Data Not Found, Please Check Your ID and Password";
            echo json_encode($responsistem);
        }
    }

    function get_Nilai()
    {
        // $id_user = $this->session->userdata('ses_idlogin');
        $id_user = $_GET['id_user'];
        $password = $_GET['password'];
        $cekauth = $this->main_model->auth_api_user($id_user, $password);
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

            if (!empty($sistem_instrumentasi)) {
                $matkul = $this->main_model->get_kelas_matkulBYKODE($sistem_instrumentasi)->result_array();
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
                $tampil['kelas'] = $matkul[0]['kelas'];
                $tampil['Tugas 1'] = $data_nilai[0]['tugas1'];
                $tampil['Tugas 2'] = $data_nilai[0]['tugas2'];
                $tampil['Tugas 3'] = $data_nilai[0]['tugas3'];
                $tampil['Tugas 4'] = $data_nilai[0]['tugas4'];
                $tampil['Tugas 5'] = $data_nilai[0]['tugas5'];
                $tampil['Total Absen'] = $total_absen . " dari 10 Pertemuan";
                $tampil['Total Tugas'] = $hasiltugas;
                $tampil['Total Kuis'] = $data_nilai[0]['kuis'];
                $tampil['Total UAP'] = $data_nilai[0]['uap'];
                $tampil['Total Tugas Akhir'] = $data_nilai[0]['tugasakhir'];
                $tampil['Persentase Absen'] = $absen . "% : " . round($total_absen);
                $tampil['Persentase Tugas'] = $tugas . "% : " . round($total_tugas);
                $tampil['Persentase Kuis'] = $kuis . "% : " . round($total_kuis);
                $tampil['Persentase UAP'] = $uap . "% : " . round($total_uap);
                $tampil['Persentase Tugas Akhir'] = $tugasakhir . "% : " . round($total_tugas_akhir);
                $tampil['Total Nilai Akhir'] = round($total_seluruh);
                if ($total_seluruh >= 85) {
                    $tampil['Grade'] =  "A";
                } elseif ($total_seluruh >= 75) {
                    $tampil['Grade'] =  "B";
                } elseif ($total_seluruh >= 60) {
                    $tampil['Grade'] =  "C";
                } elseif ($total_seluruh >= 50) {
                    $tampil['Grade'] =  "D";
                } else {
                    $tampil['Grade'] =  "E";
                }
                $data_sistem_instrumentasi = array(
                    $tampil
                );
            }
            if (!empty($organisasi_komputer)) {
                $matkul = $this->main_model->get_kelas_matkulBYKODE($organisasi_komputer)->result_array();
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
                $tampil['kelas'] = $matkul[0]['kelas'];
                $tampil['Tugas 1'] = $data_nilai[0]['tugas1'];
                $tampil['Tugas 2'] = $data_nilai[0]['tugas2'];
                $tampil['Tugas 3'] = $data_nilai[0]['tugas3'];
                $tampil['Tugas 4'] = $data_nilai[0]['tugas4'];
                $tampil['Tugas 5'] = $data_nilai[0]['tugas5'];
                $tampil['Total Absen'] = $total_absen . " dari 10 Pertemuan";
                $tampil['Total Tugas'] = $hasiltugas;
                $tampil['Total Kuis'] = $data_nilai[0]['kuis'];
                $tampil['Total UAP'] = $data_nilai[0]['uap'];
                $tampil['Total Tugas Akhir'] = $data_nilai[0]['tugasakhir'];
                $tampil['Persentase Absen'] = $absen . "% : " . round($total_absen);
                $tampil['Persentase Tugas'] = $tugas . "% : " . round($total_tugas);
                $tampil['Persentase Kuis'] = $kuis . "% : " . round($total_kuis);
                $tampil['Persentase UAP'] = $uap . "% : " . round($total_uap);
                $tampil['Persentase Tugas Akhir'] = $tugasakhir . "% : " . round($total_tugas_akhir);
                $tampil['Total Nilai Akhir'] = round($total_seluruh);
                if ($total_seluruh >= 85) {
                    $tampil['Grade'] =  "A";
                } elseif ($total_seluruh >= 75) {
                    $tampil['Grade'] =  "B";
                } elseif ($total_seluruh >= 60) {
                    $tampil['Grade'] =  "C";
                } elseif ($total_seluruh >= 50) {
                    $tampil['Grade'] =  "D";
                } else {
                    $tampil['Grade'] =  "E";
                }
                $data_organisasi_komputer = array(
                    $tampil
                );
            }
            if (!empty($elektronika)) {
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
                $tampil['kelas'] = $matkul[0]['kelas'];
                $tampil['Tugas 1'] = $data_nilai[0]['tugas1'];
                $tampil['Tugas 2'] = $data_nilai[0]['tugas2'];
                $tampil['Tugas 3'] = $data_nilai[0]['tugas3'];
                $tampil['Tugas 4'] = $data_nilai[0]['tugas4'];
                $tampil['Tugas 5'] = $data_nilai[0]['tugas5'];
                $tampil['Total Absen'] = $total_absen . " dari 10 Pertemuan";
                $tampil['Total Tugas'] = $hasiltugas;
                $tampil['Total Kuis'] = $data_nilai[0]['kuis'];
                $tampil['Total UAP'] = $data_nilai[0]['uap'];
                $tampil['Total Tugas Akhir'] = $data_nilai[0]['tugasakhir'];
                $tampil['Persentase Absen'] = $absen . "% : " . round($total_absen);
                $tampil['Persentase Tugas'] = $tugas . "% : " . round($total_tugas);
                $tampil['Persentase Kuis'] = $kuis . "% : " . round($total_kuis);
                $tampil['Persentase UAP'] = $uap . "% : " . round($total_uap);
                $tampil['Persentase Tugas Akhir'] = $tugasakhir . "% : " . round($total_tugas_akhir);
                $tampil['Total Nilai Akhir'] = round($total_seluruh);
                if ($total_seluruh >= 85) {
                    $tampil['Grade'] =  "A";
                } elseif ($total_seluruh >= 75) {
                    $tampil['Grade'] =  "B";
                } elseif ($total_seluruh >= 60) {
                    $tampil['Grade'] =  "C";
                } elseif ($total_seluruh >= 50) {
                    $tampil['Grade'] =  "D";
                } else {
                    $tampil['Grade'] =  "E";
                }
                $data_elektronika = array(
                    $tampil
                );
            }
            if (!empty($sistem_digital_1)) {
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
                $tampil['kelas'] = $matkul[0]['kelas'];
                $tampil['Tugas 1'] = $data_nilai[0]['tugas1'];
                $tampil['Tugas 2'] = $data_nilai[0]['tugas2'];
                $tampil['Tugas 3'] = $data_nilai[0]['tugas3'];
                $tampil['Tugas 4'] = $data_nilai[0]['tugas4'];
                $tampil['Tugas 5'] = $data_nilai[0]['tugas5'];
                $tampil['Total Absen'] = $total_absen . " dari 10 Pertemuan";
                $tampil['Total Tugas'] = $hasiltugas;
                $tampil['Total Kuis'] = $data_nilai[0]['kuis'];
                $tampil['Total UAP'] = $data_nilai[0]['uap'];
                $tampil['Total Tugas Akhir'] = $data_nilai[0]['tugasakhir'];
                $tampil['Persentase Absen'] = $absen . "% : " . round($total_absen);
                $tampil['Persentase Tugas'] = $tugas . "% : " . round($total_tugas);
                $tampil['Persentase Kuis'] = $kuis . "% : " . round($total_kuis);
                $tampil['Persentase UAP'] = $uap . "% : " . round($total_uap);
                $tampil['Persentase Tugas Akhir'] = $tugasakhir . "% : " . round($total_tugas_akhir);
                $tampil['Total Nilai Akhir'] = round($total_seluruh);
                if ($total_seluruh >= 85) {
                    $tampil['Grade'] =  "A";
                } elseif ($total_seluruh >= 75) {
                    $tampil['Grade'] =  "B";
                } elseif ($total_seluruh >= 60) {
                    $tampil['Grade'] =  "C";
                } elseif ($total_seluruh >= 50) {
                    $tampil['Grade'] =  "D";
                } else {
                    $tampil['Grade'] =  "E";
                }
                $data_sistem_digital_1 = array(
                    $tampil
                );
            }
            if (!empty($jaringan_komputer)) {
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
                $tampil['kelas'] = $matkul[0]['kelas'];
                $tampil['Tugas 1'] = $data_nilai[0]['tugas1'];
                $tampil['Tugas 2'] = $data_nilai[0]['tugas2'];
                $tampil['Tugas 3'] = $data_nilai[0]['tugas3'];
                $tampil['Tugas 4'] = $data_nilai[0]['tugas4'];
                $tampil['Tugas 5'] = $data_nilai[0]['tugas5'];
                $tampil['Total Absen'] = $total_absen . " dari 10 Pertemuan";
                $tampil['Total Tugas'] = $hasiltugas;
                $tampil['Total Kuis'] = $data_nilai[0]['kuis'];
                $tampil['Total UAP'] = $data_nilai[0]['uap'];
                $tampil['Total Tugas Akhir'] = $data_nilai[0]['tugasakhir'];
                $tampil['Persentase Absen'] = $absen . "% : " . round($total_absen);
                $tampil['Persentase Tugas'] = $tugas . "% : " . round($total_tugas);
                $tampil['Persentase Kuis'] = $kuis . "% : " . round($total_kuis);
                $tampil['Persentase UAP'] = $uap . "% : " . round($total_uap);
                $tampil['Persentase Tugas Akhir'] = $tugasakhir . "% : " . round($total_tugas_akhir);
                $tampil['Total Nilai Akhir'] = round($total_seluruh);
                if ($total_seluruh >= 85) {
                    $tampil['Grade'] =  "A";
                } elseif ($total_seluruh >= 75) {
                    $tampil['Grade'] =  "B";
                } elseif ($total_seluruh >= 60) {
                    $tampil['Grade'] =  "C";
                } elseif ($total_seluruh >= 50) {
                    $tampil['Grade'] =  "D";
                } else {
                    $tampil['Grade'] =  "E";
                }
                $data_jaringan_komputer = array(
                    $tampil
                );
            }
            if (!empty($sistem_digital_2)) {
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
                $tampil['kelas'] = $matkul[0]['kelas'];
                $tampil['Tugas 1'] = $data_nilai[0]['tugas1'];
                $tampil['Tugas 2'] = $data_nilai[0]['tugas2'];
                $tampil['Tugas 3'] = $data_nilai[0]['tugas3'];
                $tampil['Tugas 4'] = $data_nilai[0]['tugas4'];
                $tampil['Tugas 5'] = $data_nilai[0]['tugas5'];
                $tampil['Total Absen'] = $total_absen . " dari 10 Pertemuan";
                $tampil['Total Tugas'] = $hasiltugas;
                $tampil['Total Kuis'] = $data_nilai[0]['kuis'];
                $tampil['Total UAP'] = $data_nilai[0]['uap'];
                $tampil['Total Tugas Akhir'] = $data_nilai[0]['tugasakhir'];
                $tampil['Persentase Absen'] = $absen . "% : " . round($total_absen);
                $tampil['Persentase Tugas'] = $tugas . "% : " . round($total_tugas);
                $tampil['Persentase Kuis'] = $kuis . "% : " . round($total_kuis);
                $tampil['Persentase UAP'] = $uap . "% : " . round($total_uap);
                $tampil['Persentase Tugas Akhir'] = $tugasakhir . "% : " . round($total_tugas_akhir);
                $tampil['Total Nilai Akhir'] = round($total_seluruh);
                if ($total_seluruh >= 85) {
                    $tampil['Grade'] =  "A";
                } elseif ($total_seluruh >= 75) {
                    $tampil['Grade'] =  "B";
                } elseif ($total_seluruh >= 60) {
                    $tampil['Grade'] =  "C";
                } elseif ($total_seluruh >= 50) {
                    $tampil['Grade'] =  "D";
                } else {
                    $tampil['Grade'] =  "E";
                }
                $data_sistem_digital_2 = array(
                    $tampil
                );
            }
            if (!empty($sistem_mikroprosesor)) {
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
                $tampil['kelas'] = $matkul[0]['kelas'];
                $tampil['Tugas 1'] = $data_nilai[0]['tugas1'];
                $tampil['Tugas 2'] = $data_nilai[0]['tugas2'];
                $tampil['Tugas 3'] = $data_nilai[0]['tugas3'];
                $tampil['Tugas 4'] = $data_nilai[0]['tugas4'];
                $tampil['Tugas 5'] = $data_nilai[0]['tugas5'];
                $tampil['Total Absen'] = $total_absen . " dari 10 Pertemuan";
                $tampil['Total Tugas'] = $hasiltugas;
                $tampil['Total Kuis'] = $data_nilai[0]['kuis'];
                $tampil['Total UAP'] = $data_nilai[0]['uap'];
                $tampil['Total Tugas Akhir'] = $data_nilai[0]['tugasakhir'];
                $tampil['Persentase Absen'] = $absen . "% : " . round($total_absen);
                $tampil['Persentase Tugas'] = $tugas . "% : " . round($total_tugas);
                $tampil['Persentase Kuis'] = $kuis . "% : " . round($total_kuis);
                $tampil['Persentase UAP'] = $uap . "% : " . round($total_uap);
                $tampil['Persentase Tugas Akhir'] = $tugasakhir . "% : " . round($total_tugas_akhir);
                $tampil['Total Nilai Akhir'] = round($total_seluruh);
                if ($total_seluruh >= 85) {
                    $tampil['Grade'] =  "A";
                } elseif ($total_seluruh >= 75) {
                    $tampil['Grade'] =  "B";
                } elseif ($total_seluruh >= 60) {
                    $tampil['Grade'] =  "C";
                } elseif ($total_seluruh >= 50) {
                    $tampil['Grade'] =  "D";
                } else {
                    $tampil['Grade'] =  "E";
                }
                $data_sistem_mikroprosesor = array(
                    $tampil
                );
            }
            if (!empty($otomasi)) {
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
                $tampil['kelas'] = $matkul[0]['kelas'];
                $tampil['Tugas 1'] = $data_nilai[0]['tugas1'];
                $tampil['Tugas 2'] = $data_nilai[0]['tugas2'];
                $tampil['Tugas 3'] = $data_nilai[0]['tugas3'];
                $tampil['Tugas 4'] = $data_nilai[0]['tugas4'];
                $tampil['Tugas 5'] = $data_nilai[0]['tugas5'];
                $tampil['Total Absen'] = $total_absen . " dari 10 Pertemuan";
                $tampil['Total Tugas'] = $hasiltugas;
                $tampil['Total Kuis'] = $data_nilai[0]['kuis'];
                $tampil['Total UAP'] = $data_nilai[0]['uap'];
                $tampil['Total Tugas Akhir'] = $data_nilai[0]['tugasakhir'];
                $tampil['Persentase Absen'] = $absen . "% : " . round($total_absen);
                $tampil['Persentase Tugas'] = $tugas . "% : " . round($total_tugas);
                $tampil['Persentase Kuis'] = $kuis . "% : " . round($total_kuis);
                $tampil['Persentase UAP'] = $uap . "% : " . round($total_uap);
                $tampil['Persentase Tugas Akhir'] = $tugasakhir . "% : " . round($total_tugas_akhir);
                $tampil['Total Nilai Akhir'] = round($total_seluruh);
                if ($total_seluruh >= 85) {
                    $tampil['Grade'] =  "A";
                } elseif ($total_seluruh >= 75) {
                    $tampil['Grade'] =  "B";
                } elseif ($total_seluruh >= 60) {
                    $tampil['Grade'] =  "C";
                } elseif ($total_seluruh >= 50) {
                    $tampil['Grade'] =  "D";
                } else {
                    $tampil['Grade'] =  "E";
                }
                $data_otomasi = array(
                    $tampil
                );
            }
            if (!empty($administrasi_jaringan)) {
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
                $tampil['kelas'] = $matkul[0]['kelas'];
                $tampil['Tugas 1'] = $data_nilai[0]['tugas1'];
                $tampil['Tugas 2'] = $data_nilai[0]['tugas2'];
                $tampil['Tugas 3'] = $data_nilai[0]['tugas3'];
                $tampil['Tugas 4'] = $data_nilai[0]['tugas4'];
                $tampil['Tugas 5'] = $data_nilai[0]['tugas5'];
                $tampil['Total Absen'] = $total_absen . " dari 10 Pertemuan";
                $tampil['Total Tugas'] = $hasiltugas;
                $tampil['Total Kuis'] = $data_nilai[0]['kuis'];
                $tampil['Total UAP'] = $data_nilai[0]['uap'];
                $tampil['Total Tugas Akhir'] = $data_nilai[0]['tugasakhir'];
                $tampil['Persentase Absen'] = $absen . "% : " . round($total_absen);
                $tampil['Persentase Tugas'] = $tugas . "% : " . round($total_tugas);
                $tampil['Persentase Kuis'] = $kuis . "% : " . round($total_kuis);
                $tampil['Persentase UAP'] = $uap . "% : " . round($total_uap);
                $tampil['Persentase Tugas Akhir'] = $tugasakhir . "% : " . round($total_tugas_akhir);
                $tampil['Total Nilai Akhir'] = round($total_seluruh);
                if ($total_seluruh >= 85) {
                    $tampil['Grade'] =  "A";
                } elseif ($total_seluruh >= 75) {
                    $tampil['Grade'] =  "B";
                } elseif ($total_seluruh >= 60) {
                    $tampil['Grade'] =  "C";
                } elseif ($total_seluruh >= 50) {
                    $tampil['Grade'] =  "D";
                } else {
                    $tampil['Grade'] =  "E";
                }
                $data_administrasi_jaringan = array(
                    $tampil
                );
            }
            if (!empty($sistem_pemrograman_mikroprosesor)) {
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
                $tampil['kelas'] = $matkul[0]['kelas'];
                $tampil['Tugas 1'] = $data_nilai[0]['tugas1'];
                $tampil['Tugas 2'] = $data_nilai[0]['tugas2'];
                $tampil['Tugas 3'] = $data_nilai[0]['tugas3'];
                $tampil['Tugas 4'] = $data_nilai[0]['tugas4'];
                $tampil['Tugas 5'] = $data_nilai[0]['tugas5'];
                $tampil['Total Absen'] = $total_absen . " dari 10 Pertemuan";
                $tampil['Total Tugas'] = $hasiltugas;
                $tampil['Total Kuis'] = $data_nilai[0]['kuis'];
                $tampil['Total UAP'] = $data_nilai[0]['uap'];
                $tampil['Total Tugas Akhir'] = $data_nilai[0]['tugasakhir'];
                $tampil['Persentase Absen'] = $absen . "% : " . round($total_absen);
                $tampil['Persentase Tugas'] = $tugas . "% : " . round($total_tugas);
                $tampil['Persentase Kuis'] = $kuis . "% : " . round($total_kuis);
                $tampil['Persentase UAP'] = $uap . "% : " . round($total_uap);
                $tampil['Persentase Tugas Akhir'] = $tugasakhir . "% : " . round($total_tugas_akhir);
                $tampil['Total Nilai Akhir'] = round($total_seluruh);
                if ($total_seluruh >= 85) {
                    $tampil['Grade'] =  "A";
                } elseif ($total_seluruh >= 75) {
                    $tampil['Grade'] =  "B";
                } elseif ($total_seluruh >= 60) {
                    $tampil['Grade'] =  "C";
                } elseif ($total_seluruh >= 50) {
                    $tampil['Grade'] =  "D";
                } else {
                    $tampil['Grade'] =  "E";
                }
                $data_sistem_pemrograman_mikroprosesor = array(
                    $tampil
                );
            }
            if (!empty($mobile_programing)) {
                $matkul = $this->main_model->get_kelas_matkulBYKODE($mobile_programing)->result_array();
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
                $tampil['kelas'] = $matkul[0]['kelas'];
                $tampil['Tugas 1'] = $data_nilai[0]['tugas1'];
                $tampil['Tugas 2'] = $data_nilai[0]['tugas2'];
                $tampil['Tugas 3'] = $data_nilai[0]['tugas3'];
                $tampil['Tugas 4'] = $data_nilai[0]['tugas4'];
                $tampil['Tugas 5'] = $data_nilai[0]['tugas5'];
                $tampil['Total Absen'] = $total_absen . " dari 10 Pertemuan";
                $tampil['Total Tugas'] = $hasiltugas;
                $tampil['Total Kuis'] = $data_nilai[0]['kuis'];
                $tampil['Total UAP'] = $data_nilai[0]['uap'];
                $tampil['Total Tugas Akhir'] = $data_nilai[0]['tugasakhir'];
                $tampil['Persentase Absen'] = $absen . "% : " . round($total_absen);
                $tampil['Persentase Tugas'] = $tugas . "% : " . round($total_tugas);
                $tampil['Persentase Kuis'] = $kuis . "% : " . round($total_kuis);
                $tampil['Persentase UAP'] = $uap . "% : " . round($total_uap);
                $tampil['Persentase Tugas Akhir'] = $tugasakhir . "% : " . round($total_tugas_akhir);
                $tampil['Total Nilai Akhir'] = round($total_seluruh);
                if ($total_seluruh >= 85) {
                    $tampil['Grade'] =  "A";
                } elseif ($total_seluruh >= 75) {
                    $tampil['Grade'] =  "B";
                } elseif ($total_seluruh >= 60) {
                    $tampil['Grade'] =  "C";
                } elseif ($total_seluruh >= 50) {
                    $tampil['Grade'] =  "D";
                } else {
                    $tampil['Grade'] =  "E";
                }
                $data_mobile_programing = array(
                    $tampil
                );
            }
            if (!empty($keamanan_jaringan)) {
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
                $tampil['kelas'] = $matkul[0]['kelas'];
                $tampil['Tugas 1'] = $data_nilai[0]['tugas1'];
                $tampil['Tugas 2'] = $data_nilai[0]['tugas2'];
                $tampil['Tugas 3'] = $data_nilai[0]['tugas3'];
                $tampil['Tugas 4'] = $data_nilai[0]['tugas4'];
                $tampil['Tugas 5'] = $data_nilai[0]['tugas5'];
                $tampil['Total Absen'] = $total_absen . " dari 10 Pertemuan";
                $tampil['Total Tugas'] = $hasiltugas;
                $tampil['Total Kuis'] = $data_nilai[0]['kuis'];
                $tampil['Total UAP'] = $data_nilai[0]['uap'];
                $tampil['Total Tugas Akhir'] = $data_nilai[0]['tugasakhir'];
                $tampil['Persentase Absen'] = $absen . "% : " . round($total_absen);
                $tampil['Persentase Tugas'] = $tugas . "% : " . round($total_tugas);
                $tampil['Persentase Kuis'] = $kuis . "% : " . round($total_kuis);
                $tampil['Persentase UAP'] = $uap . "% : " . round($total_uap);
                $tampil['Persentase Tugas Akhir'] = $tugasakhir . "% : " . round($total_tugas_akhir);
                $tampil['Total Nilai Akhir'] = round($total_seluruh);
                if ($total_seluruh >= 85) {
                    $tampil['Grade'] =  "A";
                } elseif ($total_seluruh >= 75) {
                    $tampil['Grade'] =  "B";
                } elseif ($total_seluruh >= 60) {
                    $tampil['Grade'] =  "C";
                } elseif ($total_seluruh >= 50) {
                    $tampil['Grade'] =  "D";
                } else {
                    $tampil['Grade'] =  "E";
                }
                $data_keamanan_jaringan = array(
                    $tampil
                );
            }
            if (!empty($pemrograman_python)) {
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
                $tampil['kelas'] = $matkul[0]['kelas'];
                $tampil['Tugas 1'] = $data_nilai[0]['tugas1'];
                $tampil['Tugas 2'] = $data_nilai[0]['tugas2'];
                $tampil['Tugas 3'] = $data_nilai[0]['tugas3'];
                $tampil['Tugas 4'] = $data_nilai[0]['tugas4'];
                $tampil['Tugas 5'] = $data_nilai[0]['tugas5'];
                $tampil['Total Absen'] = $total_absen . " dari 10 Pertemuan";
                $tampil['Total Tugas'] = $hasiltugas;
                $tampil['Total Kuis'] = $data_nilai[0]['kuis'];
                $tampil['Total UAP'] = $data_nilai[0]['uap'];
                $tampil['Total Tugas Akhir'] = $data_nilai[0]['tugasakhir'];
                $tampil['Persentase Absen'] = $absen . "% : " . round($total_absen);
                $tampil['Persentase Tugas'] = $tugas . "% : " . round($total_tugas);
                $tampil['Persentase Kuis'] = $kuis . "% : " . round($total_kuis);
                $tampil['Persentase UAP'] = $uap . "% : " . round($total_uap);
                $tampil['Persentase Tugas Akhir'] = $tugasakhir . "% : " . round($total_tugas_akhir);
                $tampil['Total Nilai Akhir'] = round($total_seluruh);
                if ($total_seluruh >= 85) {
                    $tampil['Grade'] =  "A";
                } elseif ($total_seluruh >= 75) {
                    $tampil['Grade'] =  "B";
                } elseif ($total_seluruh >= 60) {
                    $tampil['Grade'] =  "C";
                } elseif ($total_seluruh >= 50) {
                    $tampil['Grade'] =  "D";
                } else {
                    $tampil['Grade'] =  "E";
                }
                // $data_pemrograman_python = array(
                //     $tampil
                // );
            }
            if (!empty($sistem_interface_mikrokontroler)) {
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
                $tampil['kelas'] = $matkul[0]['kelas'];
                $tampil['Tugas 1'] = $data_nilai[0]['tugas1'];
                $tampil['Tugas 2'] = $data_nilai[0]['tugas2'];
                $tampil['Tugas 3'] = $data_nilai[0]['tugas3'];
                $tampil['Tugas 4'] = $data_nilai[0]['tugas4'];
                $tampil['Tugas 5'] = $data_nilai[0]['tugas5'];
                $tampil['Total Absen'] = $total_absen . " dari 10 Pertemuan";
                $tampil['Total Tugas'] = $hasiltugas;
                $tampil['Total Kuis'] = $data_nilai[0]['kuis'];
                $tampil['Total UAP'] = $data_nilai[0]['uap'];
                $tampil['Total Tugas Akhir'] = $data_nilai[0]['tugasakhir'];
                $tampil['Persentase Absen'] = $absen . "% : " . round($total_absen);
                $tampil['Persentase Tugas'] = $tugas . "% : " . round($total_tugas);
                $tampil['Persentase Kuis'] = $kuis . "% : " . round($total_kuis);
                $tampil['Persentase UAP'] = $uap . "% : " . round($total_uap);
                $tampil['Persentase Tugas Akhir'] = $tugasakhir . "% : " . round($total_tugas_akhir);
                $tampil['Total Nilai Akhir'] = round($total_seluruh);
                if ($total_seluruh >= 85) {
                    $tampil['Grade'] =  "A";
                } elseif ($total_seluruh >= 75) {
                    $tampil['Grade'] =  "B";
                } elseif ($total_seluruh >= 60) {
                    $tampil['Grade'] =  "C";
                } elseif ($total_seluruh >= 50) {
                    $tampil['Grade'] =  "D";
                } else {
                    $tampil['Grade'] =  "E";
                }
                $data_sistem_interface_mikrokontroler = array(
                    $tampil
                );
            }
            if (!empty($robotik)) {
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
                $tampil['kelas'] = $matkul[0]['kelas'];
                $tampil['Tugas 1'] = $data_nilai[0]['tugas1'];
                $tampil['Tugas 2'] = $data_nilai[0]['tugas2'];
                $tampil['Tugas 3'] = $data_nilai[0]['tugas3'];
                $tampil['Tugas 4'] = $data_nilai[0]['tugas4'];
                $tampil['Tugas 5'] = $data_nilai[0]['tugas5'];
                $tampil['Total Absen'] = $total_absen . " dari 10 Pertemuan";
                $tampil['Total Tugas'] = $hasiltugas;
                $tampil['Total Kuis'] = $data_nilai[0]['kuis'];
                $tampil['Total UAP'] = $data_nilai[0]['uap'];
                $tampil['Total Tugas Akhir'] = $data_nilai[0]['tugasakhir'];
                $tampil['Persentase Absen'] = $absen . "% : " . round($total_absen);
                $tampil['Persentase Tugas'] = $tugas . "% : " . round($total_tugas);
                $tampil['Persentase Kuis'] = $kuis . "% : " . round($total_kuis);
                $tampil['Persentase UAP'] = $uap . "% : " . round($total_uap);
                $tampil['Persentase Tugas Akhir'] = $tugasakhir . "% : " . round($total_tugas_akhir);
                $tampil['Total Nilai Akhir'] = round($total_seluruh);
                if ($total_seluruh >= 85) {
                    $tampil['Grade'] =  "A";
                } elseif ($total_seluruh >= 75) {
                    $tampil['Grade'] =  "B";
                } elseif ($total_seluruh >= 60) {
                    $tampil['Grade'] =  "C";
                } elseif ($total_seluruh >= 50) {
                    $tampil['Grade'] =  "D";
                } else {
                    $tampil['Grade'] =  "E";
                }
                $data_robotik = array(
                    $tampil
                );
            }

            if (($sistem_instrumentasi) || ($organisasi_komputer) ||  ($elektronika) ||  ($sistem_digital_1) ||  ($jaringan_komputer) ||  ($sistem_digital_2) ||  ($sistem_mikroprosesor) ||  ($otomasi) ||  ($administrasi_jaringan) ||  ($sistem_pemrograman_mikroprosesor) ||  ($mobile_programing) ||  ($keamanan_jaringan) ||  ($pemrograman_python) ||  ($sistem_interface_mikrokontroler) ||  ($robotik)) {
                $hasil = array(
                    $data_sistem_instrumentasi, $data_organisasi_komputer,
                    $data_elektronika, $data_administrasi_jaringan, $data_jaringan_komputer,
                    $data_keamanan_jaringan, $data_mobile_programing, $data_otomasi,
                    $pemrograman_python, $data_sistem_digital_1, $data_sistem_digital_2,
                    $data_sistem_interface_mikrokontroler, $data_sistem_mikroprosesor,
                    $data_sistem_pemrograman_mikroprosesor, $data_robotik
                );
                // hide output null
                $hasil_null_array = (object) array_filter((array) $hasil);
                $hasil_get_nilai["Nilai Mata Kuliah"] = $hasil_null_array;
                header('Content-Type: application/Json');
                echo json_encode($hasil_get_nilai, TRUE);
            } else if (empty($sistem_instrumentasi) || empty($organisasi_komputer) ||  empty($elektronika) ||  empty($sistem_digital_1) ||  empty($jaringan_komputer) ||  empty($sistem_digital_2) ||  empty($sistem_mikroprosesor) ||  empty($otomasi) ||  empty($administrasi_jaringan) ||  empty($sistem_pemrograman_mikroprosesor) ||  empty($mobile_programing) ||  empty($keamanan_jaringan) ||  empty($pemrograman_python) ||  empty($sistem_interface_mikrokontroler) ||  empty($robotik)) {
                $responsistem["status"] = "404 Data Not Found";
                echo json_encode($responsistem);
            }
        } else {
            $responsistem["status"] = "404 Data Not Found, Please Check Your ID and Password";
            echo json_encode($responsistem);
        }
    }

    function post_Temporary()
    {
        if (isset($_POST['id_user']) && isset($_POST['kode']) && isset($_POST['pertemuan'])) {
            date_default_timezone_get('Asia/Jakarta');
            $date = date("Y-m-d H:i:s");
            $id_user = $_POST['id_user'];
            $kode = $_POST['kode'];
            $pertemuan = $_POST['pertemuan'];
            $sql = $this->main_model->get_kelas_matkul($kode)->result_array();
            $mulai_praktikum = $sql[0]['mulai_praktikum'];
            $awal = strtotime($mulai_praktikum);
            $akhir = strtotime($date);
            $diff = $akhir - $awal;

            $jam = floor($diff / (60 * 60));
            $data_menit = $diff - $jam * (60 * 60);
            $menit = floor($data_menit / 60);
            $detik = $diff % 60;

            $total_waktu = $jam . ":" . $menit . ":" . $detik;
            $cek_temp = $this->main_model->cek_temp($id_user, $kode, $pertemuan);
            if ($cek_temp->num_rows() > 0) {
                $kirimdata["error"] = "true";
                $kirimdata["data"] = "data sudah ada";
                echo json_encode($kirimdata);
                header("Content-Type: Application/Json");
            } else {
                date_default_timezone_get('Asia/Jakarta');
                $kirimdata["id_user"] = $id_user;
                $kirimdata["kode"] = $kode;
                $kirimdata["pertemuan"] = $pertemuan;
                $kirimdata["jam_scan"] = date("Y-m-d H:i:s");
                $kirimdata["telat"] = $total_waktu;
                $kirimdata["status"] = '0';
                $post_temp = $this->main_model->insert_temp($kirimdata);
                echo json_encode($post_temp);
                header("Content-Type: Application/Json");
                if ($post_temp == true) {
                    date_default_timezone_get('Asia/Jakarta');
                    $get_temp = $this->main_model->cek_temp($id_user, $kode, $pertemuan)->row_array();
                    $hsl["id_user"] = $get_temp["id_user"];
                    $hsl["kode"] = $get_temp["kode"];
                    $hsl["pertemuan"] = $get_temp["pertemuan"];
                    $hsl["jam_scan"] = date("H:i:s", strtotime($get_temp["jam_scan"]));
                    $hsl["telat"] = $get_temp["telat"];
                    $hsl["status"] = $get_temp["status"];
                    if ($get_temp["status"] == '0'){
                    $hsl["status"] = "pending";
                    } else {
                    $hsl["status"] = "hadir";
                    }
                    echo json_encode($hsl);
                    header("Content-Type: Application/Json");
                } else {
                    $kirimdata["error"] = "true";
                    echo json_encode($kirimdata);
                    header("Content-Type: Application/Json");
                }
            }
        }
    }
}
