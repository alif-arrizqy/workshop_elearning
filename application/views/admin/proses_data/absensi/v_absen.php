  <div class="right_col" role="main">
    <div style="float: right;"><h2><?php $this->load->view('admin/kelengkapan/jam_aktif');?></h2></div>
    <!-- <div class="clearfix"></div> -->
    <?php foreach ($data_absensi->result() as $hasil1){$matkul_id = $hasil1->id_matkul;} ?>
    <?php if($data_absensi->num_rows() > 0){ ?>
      <div class="row">
        <div class="col-md-12 col-sm-12 col-xs-12">
          <div class="x_panel">
            <div class="x_title">
              <h2>Data Absensi (<?=$hasil1->kelas?>)<small><b>(ubah)</b></small></h2>
              <ul class="nav navbar-right panel_toolbox">
                <a href="<?=base_url('absen_kelas_matkul/'.$matkul_id)?>" class="btn btn-info btn-md"><i class="fa fa-reply"></i> Kembali</a>
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
              <table id="datatableALL" class="table table-striped table-bordered bulk_action">
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
                        <a href="<?= base_url('edit_absen/').$hasil->id_user."/".$hasil->id_kelas_matkul;?>" id="ubah_absen" data-toggle="modal" data-target="#modal_edit_absen" class="btn btn-success btn-xs" title="ubah"><span class="fa fa-pencil"></span></a>
                      </td>
                    </tr>
                  <?php } ?>
                </tbody>
              </table>
            </div>
          </div>
        </div>
      </div>
    <?php }else{$this->session->set_flashdata('gagal', 'Tidak ada mahasiswa di kelas ini !!!');redirect('v_absensi');} ?>
  </div> 
  <div class="modal fade" id="modal_edit_absen" tabindex="-1" role="dialog" aria-labelledby="largeModal2" aria-hidden="true"></div>