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
        // $id_user = $this->session->userdata('ses_idlogin');
        $username = $_GET['username'];
        $password = $_GET['password'];

        $cekauth = $this->login_model->auth_user($username, $password);
        if ($cekauth->num_rows() > 0) {
            // $hasil_data = array();
            // $hasil_data["hasil"] = array();
            // $hasil_data["status"] = "true";
            $data = $cekauth->row_array();
            $biodatalengkapuser = $this->login_model->select_biodata_user($data['id_user']);
            foreach ($biodatalengkapuser as $hasil) {
                $email = $hasil->email;
            }
            $this->session->set_userdata('ses_idlogin', $data['id_user']);
            $this->session->set_userdata('ses_name', $data['nama']);
            $this->session->set_userdata('ses_username', $data['username']);
            $this->session->set_userdata('ses_email', $email);
            $this->session->set_userdata('ses_foto', $data['gambar']);
            $this->session->set_userdata('ses_level', $data['akses']);

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
            $hasil_data["hasil login"] = $hsl;
            // hide output null
            $hasil_get_login = (object) array_filter((array) $hasil_data);
            header('Content-Type: application/Json');
            echo json_encode($hasil_get_login, TRUE);
        } else {
            $responsistem["status"] = "404 User Not Found";
            echo json_encode($responsistem);
        }
    }

    function get_user()
    {
        $url = "localhost/workshopelearning/";
        // $id_user = $this->session->userdata('ses_idlogin');
        $id_user = $_GET['id_user'];
        if (empty($id_user)) {
            $responsistem["status"] = "404 User Not Found";
            echo json_encode($responsistem);
        } else {
            $value = $this->main_model->get_detail_user($id_user)->row_array();
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
        }
    }

    function get_JadwalPribadi()
    {
        $id_user = $this->session->userdata('ses_idlogin');
        // $id_user = $this->get('id_user');
        $data_kelas_mhs = $this->main_model->get_kelas_mhs($id_user)->result();

        if ($id_user === NULL) {
            $responsistem["status"] = "404 Data Not Found";
            echo json_encode($responsistem);
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
                if ($matkul[0]['lab'] == 1) {
                    $orkom = "Lab. Organisasi Komputer";
                }
                if ($matkul[0]['lab'] == 0) {
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
            $hasil_get_jadwalpribadi["hasil jadwal pribadi"] = $hasil_null_array;
            header('Content-Type: application/Json');
            echo json_encode($hasil_get_jadwalpribadi, TRUE);
        } else {
            $responsistem["status"] = "404 Data Not Found";
            echo json_encode($responsistem);
        }
    }

    function get_JadwalNgajar()
    {
        $url = "workshopelearning.com/";
        $id_user = $this->session->userdata('ses_idlogin');
        // $id_user = $_GET['id_user'];

        if (empty($id_user)) {
            $responsistem["status"] = "404 User Not Found";
            echo json_encode($responsistem);
        } else {
            $hsl = $this->main_model->get_jadwal_ngajar($id_user);
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

                $hasil["hasil jadwal ngajar"] = $val;
                $hasil_get_jadwalngajar = (object) array_filter((array) $hasil);
                header('Content-Type: application/Json');
                echo json_encode($hasil_get_jadwalngajar, TRUE);
            }
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
}
