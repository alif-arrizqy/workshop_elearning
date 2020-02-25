<div class="right_col" role="main">
  <div style="float: right;"><h2><?php $this->load->view('admin/kelengkapan/jam_aktif');?></h2></div>
  <!-- <div class="clearfix"></div> -->
  <?php if($data_nilai->num_rows() > 0){ ?>
    <?php 
      foreach ($data_nilai->result() as $hasil1){
        $matkul_id = $hasil1->id_matkul;
        if($matkul_id == 1){ $tugaspembagi = '5';
        }elseif($matkul_id == 2){ $tugaspembagi = '5';
        }elseif($matkul_id == 3){ $tugaspembagi = '5';
        }elseif($matkul_id == 4){ $tugaspembagi = '5';
        }elseif($matkul_id == 5){ $tugaspembagi = '5';
        }elseif($matkul_id == 6){ $tugaspembagi = '5';
        }elseif($matkul_id == 7){ $tugaspembagi = '5';
        }elseif($matkul_id == 8){ $tugaspembagi = '5';
        }elseif($matkul_id == 9){ $tugaspembagi = '5';
        }elseif($matkul_id == 10){ $tugaspembagi = '5';
        }elseif($matkul_id == 11){ $tugaspembagi = '5';
        }elseif($matkul_id == 12){ $tugaspembagi = '5';
        }elseif($matkul_id == 13){ $tugaspembagi = '5';
        }elseif($matkul_id == 14){ $tugaspembagi = '5';
        }elseif($matkul_id == 15){ $tugaspembagi = '5';
        }
      } 
    ?>
    <div class="row">
      <div class="col-md-12 col-sm-12 col-xs-12">
        <div class="x_panel">
          <div class="x_title">
            <h2>Data Penilaian & Absensi (<?=$hasil1->kelas?>)<small><b>(ubah)</b></small></h2>
            <ul class="nav navbar-right panel_toolbox">
              <a href="<?=base_url('dashboard_user')?>" class="btn btn-info btn-md"><i class="fa fa-reply"></i> Kembali</a>
              <li class="dropdown navbar-right">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false" title="menu"><i class="fa fa-wrench"></i></a>
                <ul class="dropdown-menu" role="menu">
                  <li><a href="#"><span class="fa fa-print"></span>&nbsp;Cetak Data</a></li>
                </ul>
              </li>
            </ul>
            <div class="clearfix"></div>
          </div>
          <div class="x_content">
            <?php if($this->session->flashdata('sukses')){ ?>
              <div class="flash-data-success" data-sukses="<?= $this->session->flashdata('sukses');?>"></div>
            <?php }elseif($this->session->flashdata('gagal')){ ?>
              <div class="flash-data-failed" data-gagal="<?= $this->session->flashdata('gagal');?>"></div>
            <?php } ?>
            <table id="datatable-responsive-absen" class="table table-striped table-bordered bulk_action">
              <thead>
                  <tr>
                    <th rowspan="2">No</th>
                    <th rowspan="2">NPM</th>
                    <th colspan="10">Absensi</th>
                    <th rowspan="2">Aksi</th>
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
                    foreach ($data_absensi->result() as $hasil) {
                  ?>
                    <tr>
                      <td width="3%" align="center"><?= $no++;?></td>
                      <td width="8%" align="center"><?= $hasil->npm;?></td>
                      <td width="4%" align="center"><?php if($hasil->a_1 == 0){echo"<i class='fa fa-times'></i>";}else{echo"<i class='fa fa-check'></i>";}?></td>
                      <td width="4%" align="center"><?php if($hasil->a_2 == 0){echo"<i class='fa fa-times'></i>";}else{echo"<i class='fa fa-check'></i>";}?></td>
                      <td width="4%" align="center"><?php if($hasil->a_3 == 0){echo"<i class='fa fa-times'></i>";}else{echo"<i class='fa fa-check'></i>";}?></td>
                      <td width="4%" align="center"><?php if($hasil->a_4 == 0){echo"<i class='fa fa-times'></i>";}else{echo"<i class='fa fa-check'></i>";}?></td>
                      <td width="4%" align="center"><?php if($hasil->a_5 == 0){echo"<i class='fa fa-times'></i>";}else{echo"<i class='fa fa-check'></i>";}?></td>
                      <td width="4%" align="center"><?php if($hasil->a_6 == 0){echo"<i class='fa fa-times'></i>";}else{echo"<i class='fa fa-check'></i>";}?></td>
                      <td width="4%" align="center"><?php if($hasil->a_7 == 0){echo"<i class='fa fa-times'></i>";}else{echo"<i class='fa fa-check'></i>";}?></td>
                      <td width="4%" align="center"><?php if($hasil->a_8 == 0){echo"<i class='fa fa-times'></i>";}else{echo"<i class='fa fa-check'></i>";}?></td>
                      <td width="4%" align="center"><?php if($hasil->a_9 == 0){echo"<i class='fa fa-times'></i>";}else{echo"<i class='fa fa-check'></i>";}?></td>
                      <td width="4%" align="center"><?php if($hasil->a_10 == 0){echo"<i class='fa fa-times'></i>";}else{echo"<i class='fa fa-check'></i>";}?></td>
                      <td width="4%" align="center">
                        <a href="<?= base_url('edit_absen_user/').$hasil->id_user."/".$hasil->id_kelas_matkul;?>" id="ubah_absen_user" data-toggle="modal" data-target="#modal_edit_absen_user" class="btn btn-success btn-xs" title="ubah"><span class="fa fa-pencil"></span></a>
                      </td>
                    </tr>
                  <?php } ?>
                </tbody>
            </table>
            <hr>
            <table id="datatable-responsive-nilai" class="table table-striped table-bordered bulk_action">
              <thead>
                <tr>
                  <th rowspan="2">No</th>
                  <th rowspan="2">NPM</th>
                  <th colspan="9">Nilai</th>
                  <th rowspan="2">Aksi</th>
                </tr>
                <?php 
                  $data_presentase_nilai = $this->main_model->get_persentase_nilaiBY($matkul_id)->result_array(); 
                  $absen = $data_presentase_nilai[0]['absen']*100;
                  $kuis = $data_presentase_nilai[0]['kuis']*100;
                  $tugas = $data_presentase_nilai[0]['tugas']*100;
                  $uap = $data_presentase_nilai[0]['uap']*100;
                  $tugasakhir = $data_presentase_nilai[0]['tugasakhir']*100;
                ?>
                <tr align="center" style="font-weight: bold;" >
                  <td>Total Absen</td>
                  <td>Absen (<?=$absen."%";?>)</td>
                  <td>Total Tugas</td>
                  <td>Tugas (<?=$tugas."%";?>)</td>
                  <td>Kuis (<?=$kuis."%";?>)</td>
                  <td>UAP (<?=$uap."%";?>)</td>
                  <td>Tugas Akhir (<?=$tugasakhir."%";?>)</td>
                  <td>Nilai Akhir</td>
                  <td>Grade</td>
                </tr>
              </thead>
              <tbody>
                <?php 
                  $no = 1;
                  foreach ($data_nilai->result() as $hasil) {
                    $data_absensi = $this->main_model->get_all_absen_mhsBY($hasil->id_kelas_matkul,$hasil->id_user)->result();
                    foreach ($data_absensi as $hasilabsen) {
                      $totalabsen = $hasilabsen->a_1 + $hasilabsen->a_2 + $hasilabsen->a_3 + $hasilabsen->a_4 + $hasilabsen->a_5 + $hasilabsen->a_6 + $hasilabsen->a_7 + $hasilabsen->a_8 + $hasilabsen->a_9 + $hasilabsen->a_10;
                    }
                    $hasiltugas = $hasil->tugas1 + $hasil->tugas2 + $hasil->tugas3 + $hasil->tugas4 + $hasil->tugas5;
                    $totaltugas = $hasiltugas/$tugaspembagi;
                    $total_absen = ($totalabsen*10*$data_presentase_nilai[0]['absen']);
                    $total_tugas = $totaltugas*$data_presentase_nilai[0]['tugas'];
                    $total_kuis = $hasil->kuis*$data_presentase_nilai[0]['kuis'];
                    $total_uap = $hasil->uap*$data_presentase_nilai[0]['uap'];
                    $total_tugas_akhir = $hasil->tugasakhir*$data_presentase_nilai[0]['tugasakhir'];
                    $total_seluruh = $total_absen + $total_tugas + $total_kuis + $total_uap + $total_tugas_akhir;
                ?>
                  <tr>
                    <td width="3%" align="center"><?= $no++;?></td>
                    <td width="8%" align="center"><?= $hasil->npm;?></td>
                    <td width="4%" align="center"><?=$totalabsen?></td>
                    <td width="4%" align="center"><?=round($total_absen)?></td>
                    <td width="4%" align="center"><?=$hasiltugas." (".round($totaltugas).")";?></td>
                    <td width="4%" align="center"><?=round($total_tugas)?></td>
                    <td width="4%" align="center"><?=round($total_kuis)?></td>
                    <td width="4%" align="center"><?=round($total_uap)?></td>
                    <td width="4%" align="center"><?=round($total_tugas_akhir)?></td>
                    <td width="4%" align="center"><?=round($total_seluruh)?></td>
                    <td width="4%" align="center"><?php if($total_seluruh >= 85) { echo"A"; } elseif($total_seluruh >= 75) { echo"B"; } elseif($total_seluruh >= 60) { echo"C"; } elseif($total_seluruh >= 50) { echo"D"; } else{ echo"E"; } ?></td>
                    <td width="4%" align="center">
                      <a href="<?= base_url('edit_nilai_user/').$hasil->id_user."/".$hasil->id_kelas_matkul;?>" id="ubah_nilai_user" data-toggle="modal" data-target="#modal_edit_nilai_user" class="btn btn-success btn-xs" title="ubah"><span class="fa fa-pencil"></span></a>
                    </td>
                  </tr>
                <?php } ?>
              </tbody>
            </table>
          </div>
        </div>
      </div>
    </div>
  <?php }else{$this->session->set_flashdata('gagal', 'Tidak ada mahasiswa di kelas ini !!!');redirect('dashboard_user');} ?>
</div> 

<div class="modal fade" id="modal_edit_nilai_user" tabindex="-1" role="dialog" aria-labelledby="largeModal2" aria-hidden="true"></div>
<div class="modal fade" id="modal_edit_absen_user" tabindex="-1" role="dialog" aria-labelledby="largeModal2" aria-hidden="true"></div>