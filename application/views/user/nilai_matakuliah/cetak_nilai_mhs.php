<?php $thn_sekarang = date('Y') ?>
<?php
$matkul_id = $data_nilai[0]['id_matkul'];
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
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Nilai <?= $data_nilai[0]['nama']; ?> - Mata Kuliah <?= $data_nilai[0]['kelas']; ?></title>
    <link rel="icon" href="<?= base_url('assets/') ?>images/Logowrk.png" type="image/png">
</head>

<body>
    <table width="100%">
        <tr>
            <td style="margin-right: 20px;"><img src="../../assets/images/wrk.png" width="140px"></td>
            <td style="font-size: 15px; text-align: center; font-weight: bold;">
                LABORATORIUM WORKSHOP<br>PROGRAM STUDI ILMU KOMPUTER<br>FAKULTAS MATEMATIKA ILMU DAN PENGETAHUAN ALAM<br>UNIVERSITAS PAKUAN<br>
                <?php echo $thn_sekarang; ?>
            </td>
            <td style="margin-left: 20px;"><img src="../../assets/images/FMIPA.jpg" width="100px"></td>
        </tr>
    </table>
    <table width="100%">
        <tr>
            <td style="font-size: 15px; text-align: center; font-weight: bold;">
                Hasil Nilai Praktikum Semester
                <?php $semester = $this->main_model->get_semester_dan_kelas($matkul_id)->result_array();
                if ($semester[0]['semester'] == 0) {
                    echo "Genap";
                } else {
                    echo "Ganjil";
                } ?>
            </td>
        </tr>
    </table>
    <table width="500px">
        <thead>
            <hr />
            <tr>
                <td>Asisten Praktikum
                <td>
                <td>: </td>
                <td>
                    <?php
                    $asdos1 = $this->main_model->get_asdos1_iduser($data_nilai[0]['asdos_1'])->result_array();
                    echo $asdos1[0]['nama'] . " / ";
                    if ($data_nilai[0]['asdos_2'] != 0) {
                        $asdos2 = $this->main_model->get_asdos2_iduser($data_nilai[0]['asdos_2'])->result_array();
                        echo $asdos2[0]['nama'];
                    } else {
                        echo "-";
                    }
                    ?>
                </td>
            </tr>
            <tr>
                <td>Mata Kuliah
                <td>
                <td>: </td>
                <td> <?php $matkul = $this->main_model->get_semester_dan_kelas($matkul_id)->result_array();
                        echo $matkul[0]['matkul'] ?>
                </td>
            </tr>
            <tr>
                <td>Kelas Praktikum
                <td>
                <td>: </td>
                <td><?= $data_nilai[0]['kelas']; ?></td>
            </tr>
        </thead>
    </table>
    <br>
    <table cellpadding="0" cellspacing="0" width="100%" border="1" id="example" class="table table-striped jambo_table dataTable">
        <thead>
            <tr>
                <td align="center" style="vertical-align: middle; font-weight: bold;">Npm</td>
                <td align="center" style="vertical-align: middle; font-weight: bold;">Nama</td>
                <td align="center" style="vertical-align: middle; font-weight: bold;">Total Nilai</td>
                <td align="center" style="vertical-align: middle; font-weight: bold;">Huruf Nilai</td>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td width="2%" align="center"><?= $data_nilai[0]['npm']; ?></td>
                <td width="11%"><?= $data_nilai[0]['nama']; ?></td>
                <td width="2%" align="center"><?= round($total_seluruh) ?></td>
                <td width="2%" align="center">
                    <?php if ($total_seluruh >= 85) {
                        echo "A";
                    } elseif ($total_seluruh >= 75) {
                        echo "B";
                    } elseif ($total_seluruh >= 60) {
                        echo "C";
                    } elseif ($total_seluruh >= 50) {
                        echo "D";
                    } else {
                        echo "E";
                    } ?>
                </td>
            </tr>
        </tbody>
    </table>
    <br>
    <table width="40%" align="right">
        <tr>
            <td colspan="20" align="center" style="font-size: 16px; font-weight: bold;">Bogor,
                <script type='text/javascript'>
                    var months = ['Januari', 'Februari', 'Maret', 'April', 'Mei', 'Juni', 'Juli', 'Agustus', 'September', 'Oktober', 'November', 'Desember'];
                    var date = new Date();
                    var day = date.getDate();
                    var month = date.getMonth();
                    var yy = date.getYear();
                    var year = (yy < 1000) ? yy + 1900 : yy;
                    document.write(day + " " + months[month] + " " + year);
                </script>
            </td>
        </tr>
        <tr>
            <td colspan="20" align="center" style="font-size: 16px; font-weight: bold;">Disetujui Oleh:</td>
        </tr>
        <tr>
            <td colspan="20" align="center"><br><br><br><br></td>
        </tr>

        <tr>
            <td colspan="20" align="center" style="font-size: 16px; font-weight: bold;"><u>Dr. Andi Chairunnas, M.Kom., M.Pd.</u></td>
        </tr>
        <tr>
            <td colspan="20" align="center" style="font-size: 16px; font-weight: bold;">Kepala Laboratorium Workshop</td>
        </tr>
    </table>
</body>

</html>
<script type="text/javascript">
    window.print();
</script>