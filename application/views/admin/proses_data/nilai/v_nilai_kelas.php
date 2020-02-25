<div class="right_col" role="main">
  <div style="float: right;"><h2><?php $this->load->view('admin/kelengkapan/jam_aktif');?></h2></div>
  <a href="<?=base_url('v_penilaian')?>" class="btn btn-info btn-md"><i class="fa fa-reply"></i> Kembali</a>
  <?php if($data_nilai_kelas->num_rows()>0){?>
    <div class="row">
      <div class="col-md-12">
        <div class="">
          <div class="x_content">
            <div class="row">
              <?php foreach ($data_nilai_kelas->result() as $value) { ?>
                <?php 
                  if($value->id_matkul == 1){ 
                    $data_mhs = $this->main_model->get_all_data_mhs_si($value->kode);
                  }elseif($value->id_matkul == 2){ 
                    $data_mhs = $this->main_model->get_all_data_mhs_orkom($value->kode);
                  }elseif($value->id_matkul == 3){ 
                    $data_mhs = $this->main_model->get_all_data_mhs_elektronika($value->kode);
                  }elseif($value->id_matkul == 4){ 
                    $data_mhs = $this->main_model->get_all_data_mhs_sigit1($value->kode);
                  }elseif($value->id_matkul == 5){ 
                    $data_mhs = $this->main_model->get_all_data_mhs_jarkom($value->kode);
                  }elseif($value->id_matkul == 6){ 
                    $data_mhs = $this->main_model->get_all_data_mhs_sigit2($value->kode);
                  }elseif($value->id_matkul == 7){ 
                    $data_mhs = $this->main_model->get_all_data_mhs_iot($value->kode);
                  }elseif($value->id_matkul == 8){ 
                    $data_mhs = $this->main_model->get_all_data_mhs_adminjar($value->kode);
                  }elseif($value->id_matkul == 9){ 
                    $data_mhs = $this->main_model->get_all_data_mhs_sismik($value->kode);
                  }elseif($value->id_matkul == 10){ 
                    $data_mhs = $this->main_model->get_all_data_mhs_spm($value->kode);
                  }elseif($value->id_matkul == 11){ 
                    $data_mhs = $this->main_model->get_all_data_mhs_mobile($value->kode);
                  }elseif($value->id_matkul == 12){ 
                    $data_mhs = $this->main_model->get_all_data_mhs_python($value->kode);
                  }elseif($value->id_matkul == 13){ 
                    $data_mhs = $this->main_model->get_all_data_mhs_kejar($value->kode);
                  }elseif($value->id_matkul == 14){ 
                    $data_mhs = $this->main_model->get_all_data_mhs_sim($value->kode);
                  }elseif($value->id_matkul == 15){ 
                    $data_mhs = $this->main_model->get_all_data_mhs_robotik($value->kode);
                  }
                ?>
                <a href="<?=base_url('nilai_kelas/').$value->id_kelas_matkul."/".$value->kode?>">
                  <div class="animated flipInY col-lg-4 col-md-3 col-sm-6 col-xs-12">
                    <div class="tile-stats">
                      <div class="icon"><i class="fa fa-users"></i>
                      </div>
                      <div class="count"><?=$data_mhs->num_rows()?></div>
                      <h4 style="color: black;margin-left: 10px;font-weight: bold;"><?=$value->kelas;?></h4>
                      <h5 style="color: black;margin-left: 10px;">Laboratorium <?php if($value->lab == 0){echo"Dasar-Dasar Instrumentasi";}else{echo"Organisasi Komputer";}?></h5>
                      <h5 style="color: black;margin-left: 10px;">
                        <?php 
                          $asdos1 = $this->main_model->get_asdos1_iduser($value->asdos_1)->result_array();
                          echo $asdos1[0]['nama']." / ";
                          if($value->asdos_2 != 0){
                            $asdos2 = $this->main_model->get_asdos2_iduser($value->asdos_2)->result_array();
                            echo $asdos2[0]['nama'];}else{echo"-";
                          }
                        ?>
                      </h5>
                      <h5 style="color: black;margin-left: 10px;"><?=$value->hari.", ".$value->mulai_praktikum." s/d ".$value->selesai_praktikum?></h5>
                    </div>
                  </div>
                </a>
              <?php } ?>
            </div>
          </div>
        </div>
      </div>
    </div>
  <?php 
    }else{
      $this->session->set_flashdata('gagal', 'Kelas di matakuliah ini kosong !!!');
      redirect('v_absensi');
    } 
  ?>
</div>