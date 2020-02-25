<div class="right_col" role="main">
  <div style="float: right;"><h2><?php $this->load->view('admin/kelengkapan/jam_aktif');?></h2></div>
  <!-- <div class="clearfix"></div> -->
  <!-- <form action="<?= base_url('delete_asdos_all')?>" method="post"> -->
    <div class="row">
      <div class="col-md-12 col-sm-12 col-xs-12">
        <div class="x_panel">
          <div class="x_title">
            <h2>Data Persentase Nilai<small><b>(ubah)</b></small></h2>
            <!-- <ul class="nav navbar-right panel_toolbox">
              <li class="dropdown navbar-right">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false" title="menu"><i class="fa fa-wrench"></i></a>
                <ul class="dropdown-menu" role="menu">
                  <li><a data-toggle="modal" data-target="#modal_add_asdos"><span class="fa fa-plus"></span>&nbsp;Tambah Data</a></li>
                  <li><a href="#"><span class="fa fa-print"></span>&nbsp;Cetak Data</a></li>
                </ul>
              </li>
            </ul> -->
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
                  <!-- <th><input type="checkbox" id="cek" onClick="toggle(this)"/></th> -->
                  <th>No</th>
                  <th>Semester</th>
                  <th>Mata Kuliah</th>
                  <th align="center">Absen</th>
                  <th align="center">Kuis</th>
                  <th align="center">Tugas</th>
                  <th align="center">UAP</th>
                  <th align="center">Tugas Akhir</th>
                  <th align="center">Aksi</th>
                </tr>
              </thead>
              <tbody>
                <?php 
                  $no = 1;
                  foreach ($data_persentase_nilai as $hasil) {
                ?>
                  <tr>
                    <!-- <td width="3%" align="center"><input type="checkbox" id="pilih[]" name="pilih[]" value="<?= $hasil->id_persentase;?>"></td> -->
                    <td width="3%" align="center"><?= $no++;?></td>
                    <td align="center"><?php if($hasil->semester == 1){echo"Ganjil";}else{echo"Genap";}?></td>
                    <td><?= $hasil->matkul;?></td>
                    <td align="center"><?= $hasil->absen;?></td>
                    <td align="center"><?= $hasil->kuis;?></td>
                    <td align="center"><?= $hasil->tugas;?></td>
                    <td align="center"><?= $hasil->uap;?></td>
                    <td align="center"><?= $hasil->tugasakhir;?></td>
                    <td width="5%" align="center">
                      <a href="<?= base_url('edit_persentase_nilai/').$hasil->id_persentase;?>" id="ubah_persentase" data-toggle="modal" data-target="#modal_edit_persentase" class="btn btn-success btn-xs" title="ubah"><span class="fa fa-pencil"></span></a>
                    </td>
                  </tr>
                <?php } ?>
              </tbody>
            </table>
            <!-- <button class="btn btn-success btn-xs"><span class="fa fa-trash"></span>&nbsp;Hapus Data Pilihan</button> -->
          </div>
        </div>
      </div>
    </div>
  <!-- </form> -->
</div> 

<div class="modal fade" id="modal_edit_persentase" tabindex="-1" role="dialog" aria-labelledby="largeModal2" aria-hidden="true"></div>