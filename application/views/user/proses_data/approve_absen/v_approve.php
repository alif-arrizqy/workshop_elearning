<div class="right_col" role="main">
  <div style="float: right;">
    <h2><?php $this->load->view('admin/kelengkapan/jam_aktif'); ?></h2>
  </div>
  <form action="<?= base_url('all_approve_absen_pilihan') ?>" method="post">
    <?php foreach ($data_approve_absen->result() as $hasil1) {
      $matkul_id = $hasil1->id_matkul;
    } ?>
    <?php if ($data_approve_absen->num_rows() > 0) { ?>
      <div class="row">
        <div class="col-md-12 col-sm-12 col-xs-12">
          <div class="x_panel">
            <div class="x_title">
              <h2>Approve Absensi (<?= $hasil1->kelas ?>) </h2>
              <ul class="nav navbar-right panel_toolbox">
                <a href="<?= base_url('user/v_approve_absen/' . $matkul_id) ?>" class="btn btn-info btn-md"><i class="fa fa-reply"></i> Kembali</a>
              </ul>
              <div class="clearfix"></div>
            </div>
            <div class="x_content">
              <?php if ($this->session->flashdata('sukses')) { ?>
                <div class="flash-data-success" data-sukses="<?= $this->session->flashdata('sukses'); ?>"></div>
              <?php } elseif ($this->session->flashdata('gagal')) { ?>
                <div class="flash-data-failed" data-gagal="<?= $this->session->flashdata('gagal'); ?>"></div>
              <?php } ?>
              <table id="datatableALL" class="table table-striped table-bordered bulk_action">
                <thead>
                  <tr>
                    <th><input type="checkbox" id="cek" onClick="toggle(this)" /></th>
                    <th>No</th>
                    <th>NPM</th>
                    <th>Nama</th>
                    <th>Jam Masuk</th>
                    <th>Terlambat</th>
                    <th>Status</th>
                  </tr>
                </thead>
                <tbody>
                  <?php
                  $no = 1;
                  foreach ($data_approve_absen->result() as $hasil) {
                  ?>
                    <tr>
                      <td width="3%" align="center"><input type="checkbox" id="pilih[]" name="pilih[]" value="<?= $hasil->id_user; ?>"></td>
                      <td width="3%" align="center"><?= $no++; ?></td>
                      <td width="8%" align="center"><?= $hasil->npm; ?></td>
                      <td width="10%" align="center"><?= $hasil->nama; ?></td>
                      <td width="8%" align="center"><?= $hasil->jam_scan; ?></td>
                      <td width="8%" align="center"><?= $hasil->telat; ?></td>
                      <td width="8%" align="center">
                        <?php if ($hasil->status == 0) {
                          echo "Pending";
                        }
                        if ($hasil->status == 1) {
                          echo "Hadir";
                        } ?>
                      </td>
                    </tr>
                  <?php } ?>
                </tbody>
              </table>
              <b>***Absen Ulang Sebelum Melakukan Approve***</b>
              <br>
              <button class="btn btn-success btn-xs"><span class="fa fa-check"></span>&nbsp;Approve Pilihan</button>
              </br>
            </div>
          </div>
        </div>
      </div>
    <?php } else {
      $this->session->set_flashdata('gagal', 'Tidak ada mahasiswa yang absen di kelas ini !!!');
      redirect('user/v_approve_absen');
    } ?>
  </form>
</div>
<div class="modal fade" id="modal_edit_absen" tabindex="-1" role="dialog" aria-labelledby="largeModal2" aria-hidden="true"></div>