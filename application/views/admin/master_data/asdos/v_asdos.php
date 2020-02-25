<div class="right_col" role="main">
  <div style="float: right;"><h2><?php $this->load->view('admin/kelengkapan/jam_aktif');?></h2></div>
  <!-- <div class="clearfix"></div> -->
  <form action="<?= base_url('delete_asdos_all')?>" method="post">
    <div class="row">
      <div class="col-md-12 col-sm-12 col-xs-12">
        <div class="x_panel">
          <div class="x_title">
            <h2>Data Asisten Dosen<small><b>(tambah, ubah, hapus)</b></small></h2>
            <ul class="nav navbar-right panel_toolbox">
              <li class="dropdown navbar-right">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false" title="menu"><i class="fa fa-wrench"></i></a>
                <ul class="dropdown-menu" role="menu">
                  <li><a data-toggle="modal" data-target="#modal_add_asdos"><span class="fa fa-plus"></span>&nbsp;Tambah Data</a></li>
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
                  <th>Nomor Induk Asisten Dosen</th>
                  <th>Nama Lengkap</th>
                  <th>Role</th>
                  <th>Status</th>
                  <th>Aksi</th>
                </tr>
              </thead>
              <tbody>
                <?php 
                  $no = 1;
                  foreach ($data_asdos as $hasil) {
                ?>
                  <tr>
                    <td width="3%" align="center"><input type="checkbox" id="pilih[]" name="pilih[]" value="<?= $hasil->id_user;?>"></td>
                    <td width="3%" align="center"><?= $no++;?></td>
                    <td><?= $hasil->npm;?></td>
                    <td><?= $hasil->nama;?></td>
                    <td><?php if($hasil->akses == 2 || $hasil->akses == 3){echo"Asisten Dosen";}elseif($hasil->akses == 4){echo"Umum / Alumni";}?></td>
                    <td width="10%" align="center"><?php if($hasil->status == 1){echo "aktif";}else{echo "tidak aktif";} ?></td>
                    <td width="15%" align="center">
                      <a href="<?= base_url('edit_asdos/').$hasil->id_user;?>" id="ubah_asdos" data-toggle="modal" data-target="#modal_edit_asdos" class="btn btn-success btn-xs" title="ubah"><span class="fa fa-pencil"></span></a>
                      <a href="<?= base_url('delete_asdos/').$hasil->id_user;?>" id="hapus" class="btn btn-danger btn-xs" title="hapus"><span class="fa fa-trash"></span></a>
                      <a href="<?= base_url('detail_asdos/').$hasil->id_user;?>" id="detail_asdos" data-toggle="modal" data-target="#modal_detail_asdos" class="btn btn-info btn-xs" title="detail"><span class="fa fa-search"></span></a>
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
<div class="modal fade" id="modal_add_asdos" tabindex="-1" role="dialog" aria-labelledby="largeModal" aria-hidden="true">
  <?php $this->load->view('admin/master_data/asdos/add_asdos');?>
</div>

<div class="modal fade" id="modal_edit_asdos" tabindex="-1" role="dialog" aria-labelledby="largeModal2" aria-hidden="true"></div>

<div class="modal fade" id="modal_detail_asdos" tabindex="-1" role="dialog" aria-labelledby="largeModal3" aria-hidden="true"></div>