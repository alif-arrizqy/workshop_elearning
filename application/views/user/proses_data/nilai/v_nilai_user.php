<div class="right_col" role="main">
  <div style="float: right;">
    <h2><?php $this->load->view('admin/kelengkapan/jam_aktif'); ?></h2>
  </div>
  <?php if ($this->session->flashdata('sukses')) { ?>
    <div class="flash-data-success" data-sukses="<?= $this->session->flashdata('sukses'); ?>"></div>
  <?php } elseif ($this->session->flashdata('gagal')) { ?>
    <div class="flash-data-failed" data-gagal="<?= $this->session->flashdata('gagal'); ?>"></div>
  <?php } ?>

  <?php $level = $this->session->userdata('ses_level'); ?>
  <div class="row">
    <div class="col-md-12">
      <div class="">
        <?php if ($level == 2 || $level == 3 || $level == 4) { ?>
          <div class="col-md-12 col-sm-12 col-xs-12">
            <div class="x_panel">
              <div class="x_title">

                <h2>Nilai Mata Kuliah Yang di Ajar</h2>
                <div class="clearfix"></div>
              </div>
              <div class="x_content">
                <?php if ($data_kelas_matkul->num_rows() > 0) { ?>
                  <?php foreach ($data_kelas_matkul->result() as $hasil_matkul) {
                    $data_mhs = $this->main_model->get_all_data_mhs($hasil_matkul->kode); ?>
                    <a href="<?= base_url('user/v_nilai/' . $hasil_matkul->id_kelas_matkul . "/" . $hasil_matkul->kode) ?>">
                      <div class="animated flipInY col-lg-4 col-md-4 col-sm-6 col-xs-12">
                        <div class="tile-stats">
                          <div class="icon"><i class="fa fa-folder"></i>
                          </div>
                          <div class="count"><?= $data_mhs->num_rows() ?></div>
                          <h4 style="color: black;margin-left: 10px;font-weight: bold;"><?= $hasil_matkul->kelas; ?></h4>
                          <h4 style="color: black;margin-left: 10px; font-size:14px;"><?= $hasil_matkul->hari . " - " . $hasil_matkul->mulai_praktikum . " s/d " . $hasil_matkul->selesai_praktikum; ?></h4>
                          <?php
                          $asdos1 = $this->main_model->get_asdos1_iduser($hasil_matkul->asdos_1)->result();
                          foreach ($asdos1 as $asd1) {
                          }
                          if ($hasil_matkul->asdos_2 != 0) {
                            $asdos2 = $this->main_model->get_asdos2_iduser($hasil_matkul->asdos_2)->result();
                            foreach ($asdos2 as $asd2) {
                            }
                          }
                          ?>
                          <h4 style="color: black;margin-left: 10px; font-size:13px;"><?= $asd1->nama . " dan "; ?>
                            <?php if ($hasil_matkul->asdos_2 != 0) {
                              echo $asd2->nama;
                            } else {
                              echo "-";
                            } ?></h4>
                        </div>
                      </div>
                    </a>
                  <?php } ?>
                <?php } else { ?>
                  <h1 align="center">Tidak Ada Kelas Yang Di Ajar</h1>
                <?php } ?>
              </div>
            </div>
          </div>
        <?php } ?>
      </div>
    </div>
  </div>
</div>