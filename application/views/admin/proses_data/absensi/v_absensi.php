<div class="right_col" role="main">
  <div style="float: right;"><h2><?php $this->load->view('admin/kelengkapan/jam_aktif');?></h2></div>
  <?php if($this->session->flashdata('sukses')){ ?>
    <div class="flash-data-success" data-sukses="<?= $this->session->flashdata('sukses');?>"></div>
  <?php }elseif($this->session->flashdata('gagal')){ ?>
    <div class="flash-data-failed" data-gagal="<?= $this->session->flashdata('gagal');?>"></div>
  <?php } ?>
  <div class="row">
    <div class="col-md-12">
      <div class="">
        <div class="x_content">
          <div class="row">
            <?php foreach ($data_absensi as $value) { ?>
              <a href="<?=base_url('absen_kelas_matkul/').$value->id_matkul?>">
                <div class="animated flipInY col-lg-4 col-md-3 col-sm-6 col-xs-12">
                  <div class="tile-stats">
                    <div class="icon"><i class="fa fa-folder"></i>
                    </div>
                    <div class="count"><?=$this->main_model->get_kelas_matkulBY2($value->id_matkul)->num_rows()?></div>
                    <h4 style="color: black;margin-left: 5px;font-weight: bold;"><?=$value->matkul;?></h4>
                    <h4 style="color: black;margin-left: 5px;">Semester <?php if($value->semester == 0){echo"Genap";}else{echo"Ganjil";}?></h4>
                  </div>
                </div>
              </a>
            <?php } ?>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>