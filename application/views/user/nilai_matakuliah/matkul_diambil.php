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
            <div class="x_panel">
          <div class="x_title">
            <h2>Mata Kuliah Yang di Ambil</h2>
            <div class="clearfix"></div>
          </div>
          <div class="x_content">
            <?php 
              foreach ($data_kelas_mhs as $hasil_kelas): 
                $sistem_instrumentasi = $hasil_kelas->sistem_instrumentasi;
                $organisasi_komputer = $hasil_kelas->organisasi_komputer;
                $elektronika = $hasil_kelas->elektronika;
                $sistem_digital_1 = $hasil_kelas->sistem_digital_1;
                $jaringan_komputer = $hasil_kelas->jaringan_komputer;
                $sistem_digital_2 = $hasil_kelas->sistem_digital_2;
                $sistem_mikroprosesor = $hasil_kelas->sistem_mikroprosesor;
                $otomasi = $hasil_kelas->otomasi;
                $administrasi_jaringan = $hasil_kelas->administrasi_jaringan;
                $sistem_pemrograman_mikroprosesor = $hasil_kelas->sistem_pemrograman_mikroprosesor;
                $mobile_programing = $hasil_kelas->mobile_programing;
                $keamanan_jaringan = $hasil_kelas->keamanan_jaringan;
                $pemrograman_python = $hasil_kelas->pemrograman_python;
                $sistem_interface_mikrokontroler = $hasil_kelas->sistem_interface_mikrokontroler;
                $robotik = $hasil_kelas->robotik;
              endforeach;
            ?>
            <?php 
              if(empty($sistem_instrumentasi) && empty($organisasi_komputer) && empty($elektronika) && empty($sistem_digital_1) && empty($jaringan_komputer) && empty($sistem_digital_2) && empty($sistem_mikroprosesor) && empty($otomasi) && empty($administrasi_jaringan) && empty($sistem_pemrograman_mikroprosesor) && empty($mobile_programing) && empty($keamanan_jaringan) && empty($pemrograman_python) && empty($sistem_interface_mikrokontroler) && empty($robotik)){
                echo "<h1 align='center'>Tidak Ada Kelas Yang Di Ambil</h1>";
              }
            ?>
            <?php if(!empty($sistem_instrumentasi)){ $matkul = $this->main_model->get_kelas_matkulBYKODE($sistem_instrumentasi)->result_array(); $extensi = pathinfo($matkul[0]['file'], PATHINFO_EXTENSION); ?>
              <a href="<?=base_url('lihat_nilai_matkul/'.$matkul[0]['id_kelas_matkul']."/".$this->session->userdata('ses_idlogin'))?>">
                <div class="animated flipInY col-lg-6 col-md-3 col-sm-6 col-xs-12">
                  <div class="tile-stats">
                    <div class="icon"><i class="fa fa-folder"></i>
                    </div>
                    <h4 style="color: black;margin-left: 10px;font-weight: bold;margin-top: 75px;"><?= $matkul[0]['kelas']?></h4>
                    <h4 style="color: black;margin-left: 10px;"><?= $matkul[0]['hari']." - ".$matkul[0]['mulai_praktikum']." s/d ".$matkul[0]['selesai_praktikum'];?></h4>
                      <?php 
                        $asdos1 = $this->main_model->get_asdos1_iduser($matkul[0]['asdos_1'])->result();
                        foreach ($asdos1 as $asd1) {}
                        if($matkul[0]['asdos_2'] != 0){
                          $asdos2 = $this->main_model->get_asdos2_iduser($matkul[0]['asdos_2'])->result();
                          foreach ($asdos2 as $asd2) {}
                        }
                      ?>
                    <h4 style="color: black;margin-left: 10px;"><?= $asd1->nama." dan ";?><?php if($matkul[0]['asdos_2'] != 0){echo $asd2->nama;}else{echo"-";} ?></h4>
                    <h5 style="color: black;margin-left: 10px;">
                      <a href="<?= base_url('assets/images/file_modul/').$matkul[0]['file'];?>">
                        <?php if($extensi == 'pdf'){ ?>
                          <img src="<?= base_url('assets/images/pdf.png');?>" width="8%" title="<?= $matkul[0]['file'];?>">
                        <?php }else if($extensi == 'doc' || $extensi == 'docx'){ ?>
                          <img src="<?= base_url('assets/images/doc.png');?>" width="8%" title="<?= $matkul[0]['file'];?>">
                        <?php } ?><?= $matkul[0]['file'];?>
                      </a>
                    </h5>
                  </div>
                </div>
              </a>
            <?php } ?>
            <?php if(!empty($organisasi_komputer)){ $matkul = $this->main_model->get_kelas_matkulBYKODE($organisasi_komputer)->result_array(); $extensi = pathinfo($matkul[0]['file'], PATHINFO_EXTENSION); ?>
              <a href="<?=base_url('lihat_nilai_matkul/'.$matkul[0]['id_kelas_matkul']."/".$this->session->userdata('ses_idlogin'))?>">
                <div class="animated flipInY col-lg-6 col-md-3 col-sm-6 col-xs-12">
                  <div class="tile-stats">
                    <div class="icon"><i class="fa fa-folder"></i>
                    </div>
                    <h4 style="color: black;margin-left: 10px;font-weight: bold;margin-top: 75px;"><?= $matkul[0]['kelas']?></h4>
                    <h4 style="color: black;margin-left: 10px;"><?= $matkul[0]['hari']." - ".$matkul[0]['mulai_praktikum']." s/d ".$matkul[0]['selesai_praktikum'];?></h4>
                      <?php 
                        $asdos1 = $this->main_model->get_asdos1_iduser($matkul[0]['asdos_1'])->result();
                        foreach ($asdos1 as $asd1) {}
                        if($matkul[0]['asdos_2'] != 0){
                          $asdos2 = $this->main_model->get_asdos2_iduser($matkul[0]['asdos_2'])->result();
                          foreach ($asdos2 as $asd2) {}
                        }
                      ?>
                    <h4 style="color: black;margin-left: 10px;"><?= $asd1->nama." dan ";?><?php if($matkul[0]['asdos_2'] != 0){echo $asd2->nama;}else{echo"-";} ?></h4>
                    <h5 style="color: black;margin-left: 10px;">
                      <a href="<?= base_url('assets/images/file_modul/').$matkul[0]['file'];?>">
                        <?php if($extensi == 'pdf'){ ?>
                          <img src="<?= base_url('assets/images/pdf.png');?>" width="8%" title="<?= $matkul[0]['file'];?>">
                        <?php }else if($extensi == 'doc' || $extensi == 'docx'){ ?>
                          <img src="<?= base_url('assets/images/doc.png');?>" width="8%" title="<?= $matkul[0]['file'];?>">
                        <?php } ?><?= $matkul[0]['file'];?>
                      </a>
                    </h5>
                  </div>
                </div>
              </a>
            <?php } ?>
            <?php if(!empty($elektronika)){ $matkul = $this->main_model->get_kelas_matkulBYKODE($elektronika)->result_array(); $extensi = pathinfo($matkul[0]['file'], PATHINFO_EXTENSION); ?>
              <a href="<?=base_url('lihat_nilai_matkul/'.$matkul[0]['id_kelas_matkul']."/".$this->session->userdata('ses_idlogin'))?>">
                <div class="animated flipInY col-lg-6 col-md-3 col-sm-6 col-xs-12">
                  <div class="tile-stats">
                    <div class="icon"><i class="fa fa-folder"></i>
                    </div>
                    <h4 style="color: black;margin-left: 10px;font-weight: bold;margin-top: 75px;"><?= $matkul[0]['kelas']?></h4>
                    <h4 style="color: black;margin-left: 10px;"><?= $matkul[0]['hari']." - ".$matkul[0]['mulai_praktikum']." s/d ".$matkul[0]['selesai_praktikum'];?></h4>
                      <?php 
                        $asdos1 = $this->main_model->get_asdos1_iduser($matkul[0]['asdos_1'])->result();
                        foreach ($asdos1 as $asd1) {}
                        if($matkul[0]['asdos_2'] != 0){
                          $asdos2 = $this->main_model->get_asdos2_iduser($matkul[0]['asdos_2'])->result();
                          foreach ($asdos2 as $asd2) {}
                        }
                      ?>
                    <h4 style="color: black;margin-left: 10px;"><?= $asd1->nama." dan ";?><?php if($matkul[0]['asdos_2'] != 0){echo $asd2->nama;}else{echo"-";} ?></h4>
                    <h5 style="color: black;margin-left: 10px;">
                      <a href="<?= base_url('assets/images/file_modul/').$matkul[0]['file'];?>">
                        <?php if($extensi == 'pdf'){ ?>
                          <img src="<?= base_url('assets/images/pdf.png');?>" width="8%" title="<?= $matkul[0]['file'];?>">
                        <?php }else if($extensi == 'doc' || $extensi == 'docx'){ ?>
                          <img src="<?= base_url('assets/images/doc.png');?>" width="8%" title="<?= $matkul[0]['file'];?>">
                        <?php } ?><?= $matkul[0]['file'];?>
                      </a>
                    </h5>
                  </div>
                </div>
              </a>
            <?php } ?>
            <?php if(!empty($sistem_digital_1)){ $matkul = $this->main_model->get_kelas_matkulBYKODE($sistem_digital_1)->result_array(); $extensi = pathinfo($matkul[0]['file'], PATHINFO_EXTENSION); ?>
              <a href="<?=base_url('lihat_nilai_matkul/'.$matkul[0]['id_kelas_matkul']."/".$this->session->userdata('ses_idlogin'))?>">
                <div class="animated flipInY col-lg-6 col-md-3 col-sm-6 col-xs-12">
                  <div class="tile-stats">
                    <div class="icon"><i class="fa fa-folder"></i>
                    </div>
                    <h4 style="color: black;margin-left: 10px;font-weight: bold;margin-top: 75px;"><?= $matkul[0]['kelas']?></h4>
                    <h4 style="color: black;margin-left: 10px;"><?= $matkul[0]['hari']." - ".$matkul[0]['mulai_praktikum']." s/d ".$matkul[0]['selesai_praktikum'];?></h4>
                      <?php 
                        $asdos1 = $this->main_model->get_asdos1_iduser($matkul[0]['asdos_1'])->result();
                        foreach ($asdos1 as $asd1) {}
                        if($matkul[0]['asdos_2'] != 0){
                          $asdos2 = $this->main_model->get_asdos2_iduser($matkul[0]['asdos_2'])->result();
                          foreach ($asdos2 as $asd2) {}
                        }
                      ?>
                    <h4 style="color: black;margin-left: 10px;"><?= $asd1->nama." dan ";?><?php if($matkul[0]['asdos_2'] != 0){echo $asd2->nama;}else{echo"-";} ?></h4>
                    <h5 style="color: black;margin-left: 10px;">
                      <a href="<?= base_url('assets/images/file_modul/').$matkul[0]['file'];?>">
                        <?php if($extensi == 'pdf'){ ?>
                          <img src="<?= base_url('assets/images/pdf.png');?>" width="8%" title="<?= $matkul[0]['file'];?>">
                        <?php }else if($extensi == 'doc' || $extensi == 'docx'){ ?>
                          <img src="<?= base_url('assets/images/doc.png');?>" width="8%" title="<?= $matkul[0]['file'];?>">
                        <?php } ?><?= $matkul[0]['file'];?>
                      </a>
                    </h5>
                  </div>
                </div>
              </a>
            <?php } ?>
            <?php if(!empty($jaringan_komputer)){ $matkul = $this->main_model->get_kelas_matkulBYKODE($jaringan_komputer)->result_array(); $extensi = pathinfo($matkul[0]['file'], PATHINFO_EXTENSION); ?>
              <a href="<?=base_url('lihat_nilai_matkul/'.$matkul[0]['id_kelas_matkul']."/".$this->session->userdata('ses_idlogin'))?>">
                <div class="animated flipInY col-lg-6 col-md-3 col-sm-6 col-xs-12">
                  <div class="tile-stats">
                    <div class="icon"><i class="fa fa-folder"></i>
                    </div>
                    <h4 style="color: black;margin-left: 10px;font-weight: bold;margin-top: 75px;"><?= $matkul[0]['kelas']?></h4>
                    <h4 style="color: black;margin-left: 10px;"><?= $matkul[0]['hari']." - ".$matkul[0]['mulai_praktikum']." s/d ".$matkul[0]['selesai_praktikum'];?></h4>
                      <?php 
                        $asdos1 = $this->main_model->get_asdos1_iduser($matkul[0]['asdos_1'])->result();
                        foreach ($asdos1 as $asd1) {}
                        if($matkul[0]['asdos_2'] != 0){
                          $asdos2 = $this->main_model->get_asdos2_iduser($matkul[0]['asdos_2'])->result();
                          foreach ($asdos2 as $asd2) {}
                        }
                      ?>
                    <h4 style="color: black;margin-left: 10px;"><?= $asd1->nama." dan ";?><?php if($matkul[0]['asdos_2'] != 0){echo $asd2->nama;}else{echo"-";} ?></h4>
                    <h5 style="color: black;margin-left: 10px;">
                      <a href="<?= base_url('assets/images/file_modul/').$matkul[0]['file'];?>">
                        <?php if($extensi == 'pdf'){ ?>
                          <img src="<?= base_url('assets/images/pdf.png');?>" width="8%" title="<?= $matkul[0]['file'];?>">
                        <?php }else if($extensi == 'doc' || $extensi == 'docx'){ ?>
                          <img src="<?= base_url('assets/images/doc.png');?>" width="8%" title="<?= $matkul[0]['file'];?>">
                        <?php } ?><?= $matkul[0]['file'];?>
                      </a>
                    </h5>
                  </div>
                </div>
              </a>
            <?php } ?>
            <?php if(!empty($sistem_digital_2)){ $matkul = $this->main_model->get_kelas_matkulBYKODE($sistem_digital_2)->result_array(); $extensi = pathinfo($matkul[0]['file'], PATHINFO_EXTENSION); ?>
              <a href="<?=base_url('lihat_nilai_matkul/'.$matkul[0]['id_kelas_matkul']."/".$this->session->userdata('ses_idlogin'))?>">
                <div class="animated flipInY col-lg-6 col-md-3 col-sm-6 col-xs-12">
                  <div class="tile-stats">
                    <div class="icon"><i class="fa fa-folder"></i>
                    </div>
                    <h4 style="color: black;margin-left: 10px;font-weight: bold;margin-top: 75px;"><?= $matkul[0]['kelas']?></h4>
                    <h4 style="color: black;margin-left: 10px;"><?= $matkul[0]['hari']." - ".$matkul[0]['mulai_praktikum']." s/d ".$matkul[0]['selesai_praktikum'];?></h4>
                      <?php 
                        $asdos1 = $this->main_model->get_asdos1_iduser($matkul[0]['asdos_1'])->result();
                        foreach ($asdos1 as $asd1) {}
                        if($matkul[0]['asdos_2'] != 0){
                          $asdos2 = $this->main_model->get_asdos2_iduser($matkul[0]['asdos_2'])->result();
                          foreach ($asdos2 as $asd2) {}
                        }
                      ?>
                    <h4 style="color: black;margin-left: 10px;"><?= $asd1->nama." dan ";?><?php if($matkul[0]['asdos_2'] != 0){echo $asd2->nama;}else{echo"-";} ?></h4>
                    <h5 style="color: black;margin-left: 10px;">
                      <a href="<?= base_url('assets/images/file_modul/').$matkul[0]['file'];?>">
                        <?php if($extensi == 'pdf'){ ?>
                          <img src="<?= base_url('assets/images/pdf.png');?>" width="8%" title="<?= $matkul[0]['file'];?>">
                        <?php }else if($extensi == 'doc' || $extensi == 'docx'){ ?>
                          <img src="<?= base_url('assets/images/doc.png');?>" width="8%" title="<?= $matkul[0]['file'];?>">
                        <?php } ?><?= $matkul[0]['file'];?>
                      </a>
                    </h5>
                  </div>
                </div>
              </a>
            <?php } ?>
            <?php if(!empty($sistem_mikroprosesor)){ $matkul = $this->main_model->get_kelas_matkulBYKODE($sistem_mikroprosesor)->result_array(); $extensi = pathinfo($matkul[0]['file'], PATHINFO_EXTENSION); ?>
              <a href="<?=base_url('lihat_nilai_matkul/'.$matkul[0]['id_kelas_matkul']."/".$this->session->userdata('ses_idlogin'))?>">
                <div class="animated flipInY col-lg-6 col-md-3 col-sm-6 col-xs-12">
                  <div class="tile-stats">
                    <div class="icon"><i class="fa fa-folder"></i>
                    </div>
                    <h4 style="color: black;margin-left: 10px;font-weight: bold;margin-top: 75px;"><?= $matkul[0]['kelas']?></h4>
                    <h4 style="color: black;margin-left: 10px;"><?= $matkul[0]['hari']." - ".$matkul[0]['mulai_praktikum']." s/d ".$matkul[0]['selesai_praktikum'];?></h4>
                      <?php 
                        $asdos1 = $this->main_model->get_asdos1_iduser($matkul[0]['asdos_1'])->result();
                        foreach ($asdos1 as $asd1) {}
                        if($matkul[0]['asdos_2'] != 0){
                          $asdos2 = $this->main_model->get_asdos2_iduser($matkul[0]['asdos_2'])->result();
                          foreach ($asdos2 as $asd2) {}
                        }
                      ?>
                    <h4 style="color: black;margin-left: 10px;"><?= $asd1->nama." dan ";?><?php if($matkul[0]['asdos_2'] != 0){echo $asd2->nama;}else{echo"-";} ?></h4>
                    <h5 style="color: black;margin-left: 10px;">
                      <a href="<?= base_url('assets/images/file_modul/').$matkul[0]['file'];?>">
                        <?php if($extensi == 'pdf'){ ?>
                          <img src="<?= base_url('assets/images/pdf.png');?>" width="8%" title="<?= $matkul[0]['file'];?>">
                        <?php }else if($extensi == 'doc' || $extensi == 'docx'){ ?>
                          <img src="<?= base_url('assets/images/doc.png');?>" width="8%" title="<?= $matkul[0]['file'];?>">
                        <?php } ?><?= $matkul[0]['file'];?>
                      </a>
                    </h5>
                  </div>
                </div>
              </a>
            <?php } ?>
            <?php if(!empty($otomasi)){ $matkul = $this->main_model->get_kelas_matkulBYKODE($otomasi)->result_array(); $extensi = pathinfo($matkul[0]['file'], PATHINFO_EXTENSION); ?>
              <a href="<?=base_url('lihat_nilai_matkul/'.$matkul[0]['id_kelas_matkul']."/".$this->session->userdata('ses_idlogin'))?>">
                <div class="animated flipInY col-lg-6 col-md-3 col-sm-6 col-xs-12">
                  <div class="tile-stats">
                    <div class="icon"><i class="fa fa-folder"></i>
                    </div>
                    <h4 style="color: black;margin-left: 10px;font-weight: bold;margin-top: 75px;"><?= $matkul[0]['kelas']?></h4>
                    <h4 style="color: black;margin-left: 10px;"><?= $matkul[0]['hari']." - ".$matkul[0]['mulai_praktikum']." s/d ".$matkul[0]['selesai_praktikum'];?></h4>
                      <?php 
                        $asdos1 = $this->main_model->get_asdos1_iduser($matkul[0]['asdos_1'])->result();
                        foreach ($asdos1 as $asd1) {}
                        if($matkul[0]['asdos_2'] != 0){
                          $asdos2 = $this->main_model->get_asdos2_iduser($matkul[0]['asdos_2'])->result();
                          foreach ($asdos2 as $asd2) {}
                        }
                      ?>
                    <h4 style="color: black;margin-left: 10px;"><?= $asd1->nama." dan ";?><?php if($matkul[0]['asdos_2'] != 0){echo $asd2->nama;}else{echo"-";} ?></h4>
                    <h5 style="color: black;margin-left: 10px;">
                      <a href="<?= base_url('assets/images/file_modul/').$matkul[0]['file'];?>">
                        <?php if($extensi == 'pdf'){ ?>
                          <img src="<?= base_url('assets/images/pdf.png');?>" width="8%" title="<?= $matkul[0]['file'];?>">
                        <?php }else if($extensi == 'doc' || $extensi == 'docx'){ ?>
                          <img src="<?= base_url('assets/images/doc.png');?>" width="8%" title="<?= $matkul[0]['file'];?>">
                        <?php } ?><?= $matkul[0]['file'];?>
                      </a>
                    </h5>
                  </div>
                </div>
              </a>
            <?php } ?>
            <?php if(!empty($administrasi_jaringan)){ $matkul = $this->main_model->get_kelas_matkulBYKODE($administrasi_jaringan)->result_array(); $extensi = pathinfo($matkul[0]['file'], PATHINFO_EXTENSION); ?>
              <a href="<?=base_url('lihat_nilai_matkul/'.$matkul[0]['id_kelas_matkul']."/".$this->session->userdata('ses_idlogin'))?>">
                <div class="animated flipInY col-lg-6 col-md-3 col-sm-6 col-xs-12">
                  <div class="tile-stats">
                    <div class="icon"><i class="fa fa-folder"></i>
                    </div>
                    <h4 style="color: black;margin-left: 10px;font-weight: bold;margin-top: 75px;"><?= $matkul[0]['kelas']?></h4>
                    <h4 style="color: black;margin-left: 10px;"><?= $matkul[0]['hari']." - ".$matkul[0]['mulai_praktikum']." s/d ".$matkul[0]['selesai_praktikum'];?></h4>
                      <?php 
                        $asdos1 = $this->main_model->get_asdos1_iduser($matkul[0]['asdos_1'])->result();
                        foreach ($asdos1 as $asd1) {}
                        if($matkul[0]['asdos_2'] != 0){
                          $asdos2 = $this->main_model->get_asdos2_iduser($matkul[0]['asdos_2'])->result();
                          foreach ($asdos2 as $asd2) {}
                        }
                      ?>
                    <h4 style="color: black;margin-left: 10px;"><?= $asd1->nama." dan ";?><?php if($matkul[0]['asdos_2'] != 0){echo $asd2->nama;}else{echo"-";} ?></h4>
                    <h5 style="color: black;margin-left: 10px;">
                      <a href="<?= base_url('assets/images/file_modul/').$matkul[0]['file'];?>">
                        <?php if($extensi == 'pdf'){ ?>
                          <img src="<?= base_url('assets/images/pdf.png');?>" width="8%" title="<?= $matkul[0]['file'];?>">
                        <?php }else if($extensi == 'doc' || $extensi == 'docx'){ ?>
                          <img src="<?= base_url('assets/images/doc.png');?>" width="8%" title="<?= $matkul[0]['file'];?>">
                        <?php } ?><?= $matkul[0]['file'];?>
                      </a>
                    </h5>
                  </div>
                </div>
              </a>
            <?php } ?>
            <?php if(!empty($sistem_pemrograman_mikroprosesor)){ $matkul = $this->main_model->get_kelas_matkulBYKODE($sistem_pemrograman_mikroprosesor)->result_array(); $extensi = pathinfo($matkul[0]['file'], PATHINFO_EXTENSION); ?>
              <a href="<?=base_url('lihat_nilai_matkul/'.$matkul[0]['id_kelas_matkul']."/".$this->session->userdata('ses_idlogin'))?>">
                <div class="animated flipInY col-lg-6 col-md-3 col-sm-6 col-xs-12">
                  <div class="tile-stats">
                    <div class="icon"><i class="fa fa-folder"></i>
                    </div>
                    <h4 style="color: black;margin-left: 10px;font-weight: bold;margin-top: 75px;"><?= $matkul[0]['kelas']?></h4>
                    <h4 style="color: black;margin-left: 10px;"><?= $matkul[0]['hari']." - ".$matkul[0]['mulai_praktikum']." s/d ".$matkul[0]['selesai_praktikum'];?></h4>
                      <?php 
                        $asdos1 = $this->main_model->get_asdos1_iduser($matkul[0]['asdos_1'])->result();
                        foreach ($asdos1 as $asd1) {}
                        if($matkul[0]['asdos_2'] != 0){
                          $asdos2 = $this->main_model->get_asdos2_iduser($matkul[0]['asdos_2'])->result();
                          foreach ($asdos2 as $asd2) {}
                        }
                      ?>
                    <h4 style="color: black;margin-left: 10px;"><?= $asd1->nama." dan ";?><?php if($matkul[0]['asdos_2'] != 0){echo $asd2->nama;}else{echo"-";} ?></h4>
                    <h5 style="color: black;margin-left: 10px;">
                      <a href="<?= base_url('assets/images/file_modul/').$matkul[0]['file'];?>">
                        <?php if($extensi == 'pdf'){ ?>
                          <img src="<?= base_url('assets/images/pdf.png');?>" width="8%" title="<?= $matkul[0]['file'];?>">
                        <?php }else if($extensi == 'doc' || $extensi == 'docx'){ ?>
                          <img src="<?= base_url('assets/images/doc.png');?>" width="8%" title="<?= $matkul[0]['file'];?>">
                        <?php } ?><?= $matkul[0]['file'];?>
                      </a>
                    </h5>
                  </div>
                </div>
              </a>
            <?php } ?>
            <?php if(!empty($mobile_programing)){ $matkul = $this->main_model->get_kelas_matkulBYKODE($mobile_programing)->result_array(); $extensi = pathinfo($matkul[0]['file'], PATHINFO_EXTENSION); ?>
              <a href="<?=base_url('lihat_nilai_matkul/'.$matkul[0]['id_kelas_matkul']."/".$this->session->userdata('ses_idlogin'))?>">
                <div class="animated flipInY col-lg-6 col-md-3 col-sm-6 col-xs-12">
                  <div class="tile-stats">
                    <div class="icon"><i class="fa fa-folder"></i>
                    </div>
                    <h4 style="color: black;margin-left: 10px;font-weight: bold;margin-top: 75px;"><?= $matkul[0]['kelas']?></h4>
                    <h4 style="color: black;margin-left: 10px;"><?= $matkul[0]['hari']." - ".$matkul[0]['mulai_praktikum']." s/d ".$matkul[0]['selesai_praktikum'];?></h4>
                      <?php 
                        $asdos1 = $this->main_model->get_asdos1_iduser($matkul[0]['asdos_1'])->result();
                        foreach ($asdos1 as $asd1) {}
                        if($matkul[0]['asdos_2'] != 0){
                          $asdos2 = $this->main_model->get_asdos2_iduser($matkul[0]['asdos_2'])->result();
                          foreach ($asdos2 as $asd2) {}
                        }
                      ?>
                    <h4 style="color: black;margin-left: 10px;"><?= $asd1->nama." dan ";?><?php if($matkul[0]['asdos_2'] != 0){echo $asd2->nama;}else{echo"-";} ?></h4>
                    <h5 style="color: black;margin-left: 10px;">
                      <a href="<?= base_url('assets/images/file_modul/').$matkul[0]['file'];?>">
                        <?php if($extensi == 'pdf'){ ?>
                          <img src="<?= base_url('assets/images/pdf.png');?>" width="8%" title="<?= $matkul[0]['file'];?>">
                        <?php }else if($extensi == 'doc' || $extensi == 'docx'){ ?>
                          <img src="<?= base_url('assets/images/doc.png');?>" width="8%" title="<?= $matkul[0]['file'];?>">
                        <?php } ?><?= $matkul[0]['file'];?>
                      </a>
                    </h5>
                  </div>
                </div>
              </a>
            <?php } ?>
            <?php if(!empty($keamanan_jaringan)){ $matkul = $this->main_model->get_kelas_matkulBYKODE($keamanan_jaringan)->result_array(); $extensi = pathinfo($matkul[0]['file'], PATHINFO_EXTENSION); ?>
              <a href="<?=base_url('lihat_nilai_matkul/'.$matkul[0]['id_kelas_matkul']."/".$this->session->userdata('ses_idlogin'))?>">
                <div class="animated flipInY col-lg-6 col-md-3 col-sm-6 col-xs-12">
                  <div class="tile-stats">
                    <div class="icon"><i class="fa fa-folder"></i>
                    </div>
                    <h4 style="color: black;margin-left: 10px;font-weight: bold;margin-top: 75px;"><?= $matkul[0]['kelas']?></h4>
                    <h4 style="color: black;margin-left: 10px;"><?= $matkul[0]['hari']." - ".$matkul[0]['mulai_praktikum']." s/d ".$matkul[0]['selesai_praktikum'];?></h4>
                      <?php 
                        $asdos1 = $this->main_model->get_asdos1_iduser($matkul[0]['asdos_1'])->result();
                        foreach ($asdos1 as $asd1) {}
                        if($matkul[0]['asdos_2'] != 0){
                          $asdos2 = $this->main_model->get_asdos2_iduser($matkul[0]['asdos_2'])->result();
                          foreach ($asdos2 as $asd2) {}
                        }
                      ?>
                    <h4 style="color: black;margin-left: 10px;"><?= $asd1->nama." dan ";?><?php if($matkul[0]['asdos_2'] != 0){echo $asd2->nama;}else{echo"-";} ?></h4>
                    <h5 style="color: black;margin-left: 10px;">
                      <a href="<?= base_url('assets/images/file_modul/').$matkul[0]['file'];?>">
                        <?php if($extensi == 'pdf'){ ?>
                          <img src="<?= base_url('assets/images/pdf.png');?>" width="8%" title="<?= $matkul[0]['file'];?>">
                        <?php }else if($extensi == 'doc' || $extensi == 'docx'){ ?>
                          <img src="<?= base_url('assets/images/doc.png');?>" width="8%" title="<?= $matkul[0]['file'];?>">
                        <?php } ?><?= $matkul[0]['file'];?>
                      </a>
                    </h5>
                  </div>
                </div>
              </a>
            <?php } ?>
            <?php if(!empty($pemrograman_python)){ $matkul = $this->main_model->get_kelas_matkulBYKODE($pemrograman_python)->result_array(); $extensi = pathinfo($matkul[0]['file'], PATHINFO_EXTENSION); ?>
              <a href="<?=base_url('lihat_nilai_matkul/'.$matkul[0]['id_kelas_matkul']."/".$this->session->userdata('ses_idlogin'))?>">
                <div class="animated flipInY col-lg-6 col-md-3 col-sm-6 col-xs-12">
                  <div class="tile-stats">
                    <div class="icon"><i class="fa fa-folder"></i>
                    </div>
                    <h4 style="color: black;margin-left: 10px;font-weight: bold;margin-top: 75px;"><?= $matkul[0]['kelas']?></h4>
                    <h4 style="color: black;margin-left: 10px;"><?= $matkul[0]['hari']." - ".$matkul[0]['mulai_praktikum']." s/d ".$matkul[0]['selesai_praktikum'];?></h4>
                      <?php 
                        $asdos1 = $this->main_model->get_asdos1_iduser($matkul[0]['asdos_1'])->result();
                        foreach ($asdos1 as $asd1) {}
                        if($matkul[0]['asdos_2'] != 0){
                          $asdos2 = $this->main_model->get_asdos2_iduser($matkul[0]['asdos_2'])->result();
                          foreach ($asdos2 as $asd2) {}
                        }
                      ?>
                    <h4 style="color: black;margin-left: 10px;"><?= $asd1->nama." dan ";?><?php if($matkul[0]['asdos_2'] != 0){echo $asd2->nama;}else{echo"-";} ?></h4>
                    <h5 style="color: black;margin-left: 10px;">
                      <a href="<?= base_url('assets/images/file_modul/').$matkul[0]['file'];?>">
                        <?php if($extensi == 'pdf'){ ?>
                          <img src="<?= base_url('assets/images/pdf.png');?>" width="8%" title="<?= $matkul[0]['file'];?>">
                        <?php }else if($extensi == 'doc' || $extensi == 'docx'){ ?>
                          <img src="<?= base_url('assets/images/doc.png');?>" width="8%" title="<?= $matkul[0]['file'];?>">
                        <?php } ?><?= $matkul[0]['file'];?>
                      </a>
                    </h5>
                  </div>
                </div>
              </a>
            <?php } ?>
            <?php if(!empty($sistem_interface_mikrokontroler)){ $matkul = $this->main_model->get_kelas_matkulBYKODE($sistem_interface_mikrokontroler)->result_array(); $extensi = pathinfo($matkul[0]['file'], PATHINFO_EXTENSION); ?>
              <a href="<?=base_url('lihat_nilai_matkul/'.$matkul[0]['id_kelas_matkul']."/".$this->session->userdata('ses_idlogin'))?>">
                <div class="animated flipInY col-lg-6 col-md-3 col-sm-6 col-xs-12">
                  <div class="tile-stats">
                    <div class="icon"><i class="fa fa-folder"></i>
                    </div>
                    <h4 style="color: black;margin-left: 10px;font-weight: bold;margin-top: 75px;"><?= $matkul[0]['kelas']?></h4>
                    <h4 style="color: black;margin-left: 10px;"><?= $matkul[0]['hari']." - ".$matkul[0]['mulai_praktikum']." s/d ".$matkul[0]['selesai_praktikum'];?></h4>
                      <?php 
                        $asdos1 = $this->main_model->get_asdos1_iduser($matkul[0]['asdos_1'])->result();
                        foreach ($asdos1 as $asd1) {}
                        if($matkul[0]['asdos_2'] != 0){
                          $asdos2 = $this->main_model->get_asdos2_iduser($matkul[0]['asdos_2'])->result();
                          foreach ($asdos2 as $asd2) {}
                        }
                      ?>
                    <h4 style="color: black;margin-left: 10px;"><?= $asd1->nama." dan ";?><?php if($matkul[0]['asdos_2'] != 0){echo $asd2->nama;}else{echo"-";} ?></h4>
                    <h5 style="color: black;margin-left: 10px;">
                      <a href="<?= base_url('assets/images/file_modul/').$matkul[0]['file'];?>">
                        <?php if($extensi == 'pdf'){ ?>
                          <img src="<?= base_url('assets/images/pdf.png');?>" width="8%" title="<?= $matkul[0]['file'];?>">
                        <?php }else if($extensi == 'doc' || $extensi == 'docx'){ ?>
                          <img src="<?= base_url('assets/images/doc.png');?>" width="8%" title="<?= $matkul[0]['file'];?>">
                        <?php } ?><?= $matkul[0]['file'];?>
                      </a>
                    </h5>
                  </div>
                </div>
              </a>
            <?php } ?>
            <?php if(!empty($robotik)){ $matkul = $this->main_model->get_kelas_matkulBYKODE($robotik)->result_array(); $extensi = pathinfo($matkul[0]['file'], PATHINFO_EXTENSION); ?>
              <a href="<?=base_url('lihat_nilai_matkul/'.$matkul[0]['id_kelas_matkul']."/".$this->session->userdata('ses_idlogin'))?>">
                <div class="animated flipInY col-lg-6 col-md-3 col-sm-6 col-xs-12">
                  <div class="tile-stats">
                    <div class="icon"><i class="fa fa-folder"></i>
                    </div>
                    <h4 style="color: black;margin-left: 10px;font-weight: bold;margin-top: 75px;"><?= $matkul[0]['kelas']?></h4>
                    <h4 style="color: black;margin-left: 10px;"><?= $matkul[0]['hari']." - ".$matkul[0]['mulai_praktikum']." s/d ".$matkul[0]['selesai_praktikum'];?></h4>
                      <?php 
                        $asdos1 = $this->main_model->get_asdos1_iduser($matkul[0]['asdos_1'])->result();
                        foreach ($asdos1 as $asd1) {}
                        if($matkul[0]['asdos_2'] != 0){
                          $asdos2 = $this->main_model->get_asdos2_iduser($matkul[0]['asdos_2'])->result();
                          foreach ($asdos2 as $asd2) {}
                        }
                      ?>
                    <h4 style="color: black;margin-left: 10px;"><?= $asd1->nama." dan ";?><?php if($matkul[0]['asdos_2'] != 0){echo $asd2->nama;}else{echo"-";} ?></h4>
                    <h5 style="color: black;margin-left: 10px;">
                      <a href="<?= base_url('assets/images/file_modul/').$matkul[0]['file'];?>">
                        <?php if($extensi == 'pdf'){ ?>
                          <img src="<?= base_url('assets/images/pdf.png');?>" width="8%" title="<?= $matkul[0]['file'];?>">
                        <?php }else if($extensi == 'doc' || $extensi == 'docx'){ ?>
                          <img src="<?= base_url('assets/images/doc.png');?>" width="8%" title="<?= $matkul[0]['file'];?>">
                        <?php } ?><?= $matkul[0]['file'];?>
                      </a>
                    </h5>
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
  </div>
</div>