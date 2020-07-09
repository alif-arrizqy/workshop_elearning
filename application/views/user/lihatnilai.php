    <div class="right_col" role="main">
      <div style="float: right;">
        <h2><?php $this->load->view('admin/kelengkapan/jam_aktif'); ?></h2>
      </div>
      <div class="row">
        <div class="col-md-12 col-sm-12 col-xs-12">
          <div class="x_panel">
            <div class="x_title">
              <h2>Detail Absensi & Nilai</h2>
              <ul class="nav navbar-right panel_toolbox">
                <a href="<?= base_url('matkul_diambil') ?>" class="btn btn-info btn-md"><i class="fa fa-reply"></i> Kembali</a>
              </ul>
              <div class="clearfix"></div>
            </div>
            <div class="col-md-6 col-sm-12 col-xs-12">
              <div class="x_content">
                <div class="tile-stats" style="padding: 3%">
                  <h4><u><b>ABSENSI <?= $data_absensi[0]['kelas'] ?></b></u></h4>
                  <table width="70%">
                    <tr>
                      <td width="30%">Minggu 1</td>
                      <td>: <?php if ($data_absensi[0]['a_1'] == 0) {
                              echo "Tidak Hadir";
                            } else {
                              echo "Hadir";
                            } ?></td>
                    </tr>
                    <tr>
                      <td width="30%">Minggu 2</td>
                      <td>: <?php if ($data_absensi[0]['a_2'] == 0) {
                              echo "Tidak Hadir";
                            } else {
                              echo "Hadir";
                            } ?></td>
                    </tr>
                    <tr>
                      <td width="30%">Minggu 3</td>
                      <td>: <?php if ($data_absensi[0]['a_3'] == 0) {
                              echo "Tidak Hadir";
                            } else {
                              echo "Hadir";
                            } ?></td>
                    </tr>
                    <tr>
                      <td width="30%">Minggu 4</td>
                      <td>: <?php if ($data_absensi[0]['a_4'] == 0) {
                              echo "Tidak Hadir";
                            } else {
                              echo "Hadir";
                            } ?></td>
                    </tr>
                    <tr>
                      <td width="30%">Minggu 5</td>
                      <td>: <?php if ($data_absensi[0]['a_5'] == 0) {
                              echo "Tidak Hadir";
                            } else {
                              echo "Hadir";
                            } ?></td>
                    </tr>
                    <tr>
                      <td width="30%">Minggu 6</td>
                      <td>: <?php if ($data_absensi[0]['a_6'] == 0) {
                              echo "Tidak Hadir";
                            } else {
                              echo "Hadir";
                            } ?></td>
                    </tr>
                    <tr>
                      <td width="30%">Minggu 7</td>
                      <td>: <?php if ($data_absensi[0]['a_7'] == 0) {
                              echo "Tidak Hadir";
                            } else {
                              echo "Hadir";
                            } ?></td>
                    </tr>
                    <tr>
                      <td width="30%">Minggu 8</td>
                      <td>: <?php if ($data_absensi[0]['a_8'] == 0) {
                              echo "Tidak Hadir";
                            } else {
                              echo "Hadir";
                            } ?></td>
                    </tr>
                    <tr>
                      <td width="30%">Minggu 9</td>
                      <td>: <?php if ($data_absensi[0]['a_9'] == 0) {
                              echo "Tidak Hadir";
                            } else {
                              echo "Hadir";
                            } ?></td>
                    </tr>
                    <tr>
                      <td width="30%">Minggu 10</td>
                      <td>: <?php if ($data_absensi[0]['a_10'] == 0) {
                              echo "Tidak Hadir";
                            } else {
                              echo "Hadir";
                            } ?></td>
                    </tr>
                  </table>
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
                </div>
              </div>
            <a href="<?= base_url('cetak_nilai_mhs/').$data_nilai[0]['id_kelas_matkul']."/".$data_absensi[0]['id_user'] ?>" target="_blank" class="btn btn-success btn-md pull-right" ><i class="fa fa-print"></i> Cetak Nilai Saya</a>
            </div>
            <div class="col-md-6 col-sm-12 col-xs-12">
              <div class="x_content">
                <div class="tile-stats" style="padding: 3%">
                  <h4><u><b>Nilai <?= $data_absensi[0]['kelas'] ?></b></u></h4>
                  <table width="70%">
                    <tr>
                      <td width="60%">Tugas 1</td>
                      <td>: <?= $data_nilai[0]['tugas1'] ?></td>
                    </tr>
                    <tr>
                      <td width="60%">Tugas 2</td>
                      <td>: <?= $data_nilai[0]['tugas2'] ?></td>
                    </tr>
                    <tr>
                      <td width="60%">Tugas 3</td>
                      <td>: <?= $data_nilai[0]['tugas3'] ?></td>
                    </tr>
                    <tr>
                      <td width="60%">Tugas 4</td>
                      <td>: <?= $data_nilai[0]['tugas4'] ?></td>
                    </tr>
                    <tr>
                      <td width="60%">Tugas 5</td>
                      <td>: <?= $data_nilai[0]['tugas5'] ?></td>
                    </tr>
                    <tr>
                      <td width="60%">Total Absen</td>
                      <td>: <?= $totalabsen . " dari 10 Kehadiran" ?></td>
                    </tr>
                    <tr>
                      <td width="60%">Total Tugas</td>
                      <td>: <?= $hasiltugas ?></td>
                    </tr>
                    <tr>
                      <td width="60%">Total Kuis</td>
                      <td>: <?= $data_nilai[0]['kuis'] ?></td>
                    </tr>
                    <tr>
                      <td width="60%">Total UAP</td>
                      <td>: <?= $data_nilai[0]['uap'] ?></td>
                    </tr>
                    <tr>
                      <td width="60%">Total Tugas Akhir</td>
                      <td>: <?= $data_nilai[0]['tugasakhir'] ?></td>
                    </tr>
                    <tr>
                      <td width="60%">Persentase Absen (<?= $absen ?>%)</td>
                      <td>: <?= round($total_absen) ?></td>
                    </tr>
                    <tr>
                      <td width="60%">Persentase Tugas (<?= $tugas ?>%)</td>
                      <td>: <?= round($total_tugas) ?></td>
                    </tr>
                    <tr>
                      <td width="60%">Persentase Kuis (<?= $kuis ?>%)</td>
                      <td>: <?= round($total_kuis) ?></td>
                    </tr>
                    <tr>
                      <td width="60%">Persentase UAP (<?= $uap ?>%)</td>
                      <td>: <?= round($total_uap) ?></td>
                    </tr>
                    <tr>
                      <td width="60%">Persentase Tugas Akhir (<?= $tugasakhir ?>%)</td>
                      <td>: <?= round($total_tugas_akhir) ?></td>
                    </tr>
                    <tr>
                      <td width="60%">Total Nilai Akhir</td>
                      <td>: <?= round($total_seluruh) ?></td>
                    </tr>
                    <tr>
                      <td width="60%">Grade</td>
                      <td>: <?php if ($total_seluruh >= 85) {
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
                  </table>
                </div>
              </div>
            </div>
          </div>
          <div class="x_panel">
            <div class="x_title">
              <!-- mahasiswa kelas namakelasnya -->
              <h2>Mahasiswa Kelas Ini</h2>
              <div class="clearfix"></div>
            </div>
            <div class="col-md-12 col-sm-12 col-xs-12">
              <div class="x_content">
                <table id="datatableALL" class="table table-striped table-bordered">
                  <thead>
                    <tr>
                      <th>No</th>
                      <th>NPM</th>
                      <th>Nama</th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php
                    $no = 1;
                    $kode = $data_nilai[0]['kode'];
                    $data_teman = $this->main_model->get_lihat_teman($kode);
                    foreach ($data_teman->result() as $hasil) {
                    ?>
                      <tr>
                        <td width="1%"><?= $no++; ?></td>
                        <td width="3%"><?= $hasil->npm; ?></td>
                        <td width="3%"><?= $hasil->nama; ?></td>
                      </tr>
                    <?php } ?>
                  </tbody>
                </table>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>