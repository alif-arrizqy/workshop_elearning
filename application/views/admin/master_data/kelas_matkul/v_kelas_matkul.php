<div class="right_col" role="main">
  <div style="float: right;"><h2><?php $this->load->view('admin/kelengkapan/jam_aktif');?></h2></div>
  <!-- <div class="clearfix"></div> -->
  <form action="<?= base_url('delete_kelas_matkul_all')?>" method="post">
    <div class="row">
      <div class="col-md-12 col-sm-12 col-xs-12">
        <div class="x_panel">
          <div class="x_title">
            <h2>Data Kelas Mata Kuliah<small><b>(tambah, ubah, hapus)</b></small></h2>
            <ul class="nav navbar-right panel_toolbox">
              <li class="dropdown navbar-right">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false" title="menu"><i class="fa fa-wrench"></i></a>
                <ul class="dropdown-menu" role="menu">
                  <li><a data-toggle="modal" data-target="#modal_add_kelas_matkul"><span class="fa fa-plus"></span>&nbsp;Tambah Data</a></li>
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
                  <th><input type="checkbox" id="cek" onClick="toggle(this)"/></th>
                  <th>No</th>
                  <th>Kode Kelas</th>
                  <th>Kelas</th>
                  <th>Asisten Dosen</th>
                  <th>Laboratorium</th>
                  <th>Jam Praktikum</th>
                  <th>Status</th>
                  <th>Aksi</th>
                </tr>
              </thead>
              <tbody>
                <?php 
                  $no = 1;
                  foreach ($data_kelas_matkul as $hasil) {
                ?>
                  <tr align="center">
                    <td width="3%" align="center"><input type="checkbox" id="pilih[]" name="pilih[]" value="<?= $hasil->id_kelas_matkul;?>"></td>
                    <td width="3%" align="center"><?= $no++;?></td>
                    <td><?= $hasil->kode;?></td>
                    <td><?= $hasil->kelas;?></td>
                    <td>
                      <?php 
                        $asdos1 = $this->main_model->get_asdos1_iduser($hasil->asdos_1)->result_array();
                        echo $asdos1[0]['nama']."<br>";
                        if($hasil->asdos_2 != 0){
                          $asdos2 = $this->main_model->get_asdos2_iduser($hasil->asdos_2)->result_array();
                          echo $asdos2[0]['nama'];}else{echo"-";
                        }
                      ?>
                    </td>
                    <td><?php if($hasil->lab == 1){echo"Laboratorium Organisasi Komputer";}else{echo"Laboratorium Mikrokontroler";}?></td>
                    <td><?= $hasil->hari."<br>".$hasil->mulai_praktikum."<br>s/d<br>".$hasil->selesai_praktikum;?></td>
                    <td width="10%" align="center"><?php if($hasil->status == 1){echo "aktif";}else{echo "tidak aktif";} ?></td>
                    <td width="15%" align="center">
                      <a href="<?= base_url('edit_kelas_matkul/').$hasil->id_kelas_matkul;?>" id="ubah_kelas_matkul" data-toggle="modal" data-target="#modal_edit_kelas_matkul" class="btn btn-success btn-xs" title="ubah"><span class="fa fa-pencil"></span></a>
                      <a href="<?= base_url('delete_kelas_matkul/').$hasil->id_kelas_matkul;?>" id="hapus" class="btn btn-danger btn-xs" title="hapus"><span class="fa fa-trash"></span></a>
                      <a href="<?= base_url('detail_kelas_matkul/').$hasil->id_kelas_matkul;?>" id="detail_kelas_matkul" data-toggle="modal" data-target="#modal_detail_kelas_matkul" class="btn btn-info btn-xs" title="detail"><span class="fa fa-search"></span></a>
                    </td>
                  </tr>
                <?php } ?>
              </tbody>
            </table>
            <button class="btn btn-success btn-xs"><span class="fa fa-trash"></span>&nbsp;Hapus Data Pilihan</button>
          </div>
        </div>
      </div>
    </div>
  </form>
</div> 
<div class="modal fade" id="modal_add_kelas_matkul" tabindex="-1" role="dialog" aria-labelledby="largeModal" aria-hidden="true">
  <div class="modal-dialog">
  <div class="modal-content">
    <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">x</button>
        <h4 class="modal-title" id="myModalLabel">TAMBAH DATA KELAS MATA KULIAH</h4>
    </div>
    <form action="<?= base_url('save_kelas_matkul');?>" method="post" name="form" enctype="multipart/form-data" class="form-horizontal form-label-left">
      <div class="modal-body">
        <?php $this->load->view('admin/master_data/kelas_matkul/add_kelas_matkul');?>
      </div>
      <div class="modal-footer">
          <button class="btn" data-dismiss="modal" aria-hidden="true">Tutup</button>
          <button type="submit" class="btn btn-primary">Simpan</button>
      </div>
    </form>
  </div>
</div>
</div>

<div class="modal fade" id="modal_edit_kelas_matkul" tabindex="-1" role="dialog" aria-labelledby="largeModal2" aria-hidden="true"></div>

<div class="modal fade" id="modal_detail_kelas_matkul" tabindex="-1" role="dialog" aria-labelledby="largeModal3" aria-hidden="true"></div>