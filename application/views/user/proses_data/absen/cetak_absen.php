<?php $thn_sekarang = date('Y') ?>
<?php if ($data_cetak_absensi->num_rows() > 0) { ?>
    <?php
    foreach ($data_cetak_absensi->result() as $hasil1) {
        $matkul_id = $hasil1->id_matkul;
    } ?>

    <!DOCTYPE html>
    <html lang="en">
    <!-- print auto landscape position -->
    <style type="text/css" media="print">
        @page {
            size: landscape;
        }
    </style>

    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <!-- Meta, title, CSS, favicons, etc. -->
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Absen - <?= $hasil1->kelas; ?></title>
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
                    <?php if ($hasil1->semester == 0) {
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
                        $asdos1 = $this->main_model->get_asdos1_iduser($hasil1->asdos_1)->result_array();
                        echo $asdos1[0]['nama'] . " / ";
                        if ($hasil1->asdos_2 != 0) {
                            $asdos2 = $this->main_model->get_asdos2_iduser($hasil1->asdos_2)->result_array();
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
                    <td>
                        <?= $hasil1->matkul; ?>
                    </td>
                </tr>
                <tr>
                    <td>Kelas Praktikum
                    <td>
                    <td>: </td>
                    <td><?= $hasil1->kelas; ?></td>
                </tr>
            </thead>
        </table>
        <br></br>

        <table cellpadding="0" cellspacing="0" width="100%" border="1" id="example" class="table table-striped jambo_table dataTable">
            <thead>
                <tr>
                    <th rowspan="2">No</th>
                    <th rowspan="2">NPM</th>
                    <th rowspan="2">Nama</th>
                    <th colspan="10">Absensi</th>
                </tr>
                <tr align="center" style="font-weight: bold;">
                    <td>A 1</td>
                    <td>A 2</td>
                    <td>A 3</td>
                    <td>A 4</td>
                    <td>A 5</td>
                    <td>A 6</td>
                    <td>A 7</td>
                    <td>A 8</td>
                    <td>A 9</td>
                    <td>A 10</td>
                </tr>
            </thead>
            <tbody>
                <?php
                $no = 1;
                foreach ($data_cetak_absensi->result() as $hasil) {
                ?>
                    <tr>
                        <td width="1%" align="center"><?= $no++; ?></td>
                        <td width="2%" align="center"><?= $hasil->npm; ?></td>
                        <td width="8%" align=""><?= $hasil->nama; ?></td>
                        <td width="3%" align="center">
                            <?php if ($hasil->a_1 == 0) {
                                echo "A";
                            } else {
                                echo "H";
                            } ?></td>
                        <td width="3%" align="center">
                            <?php if ($hasil->a_2 == 0) {
                                echo "A";
                            } else {
                                echo "H";
                            } ?>
                        </td>
                        <td width="3%" align="center">
                            <?php if ($hasil->a_3 == 0) {
                                echo "A";
                            } else {
                                echo "H";
                            } ?>
                        </td>
                        <td width="3%" align="center">
                            <?php if ($hasil->a_4 == 0) {
                                echo "A";
                            } else {
                                echo "H";
                            } ?>
                        </td>
                        <td width="3%" align="center">
                            <?php if ($hasil->a_5 == 0) {
                                echo "A";
                            } else {
                                echo "H";
                            } ?>
                        </td>
                        <td width="3%" align="center">
                            <?php if ($hasil->a_6 == 0) {
                                echo "A";
                            } else {
                                echo "H";
                            } ?>
                        </td>
                        <td width="3%" align="center">
                            <?php if ($hasil->a_7 == 0) {
                                echo "A";
                            } else {
                                echo "H";
                            } ?>
                        </td>
                        <td width="3%" align="center">
                            <?php if ($hasil->a_8 == 0) {
                                echo "A";
                            } else {
                                echo "H";
                            } ?>
                        </td>
                        <td width="3%" align="center">
                            <?php if ($hasil->a_9 == 0) {
                                echo "A";
                            } else {
                                echo "H";
                            } ?>
                        </td>
                        <td width="3%" align="center">
                            <?php if ($hasil->a_10 == 0) {
                                echo "A";
                            } else {
                                echo "H";
                            } ?>
                        </td>
                    </tr>
                <?php } ?>
            </tbody>
        </table>
        <b>Keterangan: A = Alpa, H = Hadir
        </b>
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
    <?php } ?>
    </body>

    </html>
    <script type="text/javascript">
        window.print();
    </script>