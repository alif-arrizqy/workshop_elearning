<div class="right_col" role="main">
  <div style="float: right;"><h2><?php $this->load->view('admin/kelengkapan/jam_aktif');?></h2></div>
  <!-- <div class="clearfix"></div> -->
  <form action="<?= base_url('delete_session_akun_all')?>" method="post">
    <div class="row">
      <div class="col-md-12 col-sm-12 col-xs-12">
        <div class="x_panel">
          <div class="x_title">
            <h2>Data Session Akun</h2>
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
                  <th>IP Address</th>
                  <th>Nama Pengguna</th>
                  <th>Tanggal Login</th>
                  <th>Akses</th>
                </tr>
              </thead>
              <tbody>
                <?php 
                  $no = 1;
                  foreach ($data_session_akun as $hasil) {
                ?>
                  <tr>
                    <td width="3%" align="center"><input type="checkbox" id="pilih[]" name="pilih[]" value="<?= $hasil->ip_address;?>"></td>
                    <td width="3%" align="center"><?= $no++;?></td>
                    <td><?= $hasil->ip_address;?></td>
                    <td><?= $hasil->username;?></td>
                    <td><?= $hasil->waktu;?></td>
                    <td><?php if($hasil->level == 1){echo"Mahasiswa";}else if($hasil->level == 2){echo"Asisten Praktikum";}else if($hasil->level == 3){echo"Asisten Praktikum / Mahasiswa";}else if($hasil->level == 4){echo"Alumni / Umum";} ?></td>
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
<div class="modal fade" id="modal_add_qrcode" tabindex="-1" role="dialog" aria-labelledby="largeModal" aria-hidden="true">
  <?php $this->load->view('admin/master_data/qrcode/add_qrcode');?>
</div>

<div class="modal fade" id="modal_detail_qrcode" tabindex="-1" role="dialog" aria-labelledby="largeModal3" aria-hidden="true"></div>