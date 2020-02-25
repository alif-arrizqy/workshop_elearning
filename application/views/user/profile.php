<?php if($this->session->flashdata('sukses')){ ?>
  <div class="flash-data-success" data-sukses="<?= $this->session->flashdata('sukses');?>"></div>
<?php }elseif($this->session->flashdata('gagal')){ ?>
  <div class="flash-data-failed" data-gagal="<?= $this->session->flashdata('gagal');?>"></div>
<?php }elseif($this->session->flashdata('msg')){ ?>
  <div class="flash-data" data-flashdata="<?= $this->session->flashdata('msg');?>"></div>
<?php } ?>
<div class="right_col" role="main">
  <div style="float: right;"><h2><?php $this->load->view('admin/kelengkapan/jam_aktif');?></h2></div>
  <!-- <div class="clearfix"></div> -->
  <div class="row">
    <div class="col-md-12 col-sm-12 col-xs-12">
      <div class="x_panel">
        <div class="x_title">
          <?php $level = $this->session->userdata('ses_level'); if($level == 1){$sbg = "Mahasiswa";}else if($level == 2){$sbg = "Asisten Praktikum";}else if($level == 3){$sbg = "Asisten Praktikum / Mahasiswa";}else if($level == 4){$sbg = "Alumni / Umum";} ?>
          <h2>Profile <?=$sbg." (".$this->session->userdata('ses_name').")"?></h2>
          <div class="clearfix"></div>
        </div>
        <div class="x_content">
          <?php 
            foreach ($data_user as $hasil): 
              $tahun = $hasil->tahun;
              $npm = $hasil->npm;
              $nama = $hasil->nama;
              $id_user = $hasil->id_user;
              $tempat = $hasil->tempat;
              $tgl_lahir = date("d M Y",strtotime($hasil->tgl_lahir));
              $jk = $hasil->jk;
              $agama = $hasil->agama;
              $email = $hasil->email;
              $telp = $hasil->telp;
              $alamat = $hasil->alamat;
              $gambar = $hasil->gambar;
              $username = $hasil->username;
              $password = $hasil->password;
              $kondisi_data = $hasil->kondisi_data;
            endforeach; 
          ?>
          <div class="col-md-3 col-sm-3 col-xs-12">
            <div align="center">
              <?php if(!empty($gambar)){ ?>
                <img src="<?= base_url('assets/images/gambar_user/').$gambar;?>" style="border-radius: 20px;" width="80%" title="<?= $nama?>">
              <?php }else{ ?>
                <img src="<?= base_url('assets/images/user.png');?>" style="border-radius: 20px;" width="80%" title="Tidak ada Foto">
              <?php } ?>
            </div>
          </div>
          <div class="col-md-9 col-sm-3 col-xs-12">
            <table width="100%">
              <?php if($level != 4){ ?>
                <tr>
                  <td width="30%">Tahun Masuk</td>
                  <td>: <?= $tahun?></td>
                </tr>
              <?php } ?>
              <tr>
                <td width="30%">Nomor Induk</td>
                <td>: <?= $npm?></td>
              </tr>
              <tr>
                <td width="30%">Nama Lengkap</td>
                <td>: <?= $nama?></td>
              </tr>
              <tr>
                <td width="30%">Email</td>
                <td>: <?= $email?></td>
              </tr>
              <tr>
                <td width="30%">Username</td>
                <td>: <?= $username?></td>
              </tr>
              <tr>
                <td width="30%">Kata Sandi</td>
                <td>: <?= $password?></td>
              </tr>
              <tr>
                <td width="30%">Tempat, Tanggal Lahir</td>
                <td>: <?php if(empty($tempat)){echo"-";}else{echo $tempat;} ?>, <?php if($hasil->tgl_lahir == "0000-00-00"){echo"-";}else{echo $tgl_lahir;} ?></td>
              </tr>
              <tr>
                <td width="30%">Jenis Kelamin</td>
                <td>: <?php if($jk == 1){echo "Laki-Laki";}else{echo "Perempuan";} ?></td>
              </tr>
              <tr>
                <td width="30%">Agama</td>
                <td>: <?php if($agama == "pilih"){echo "-";}else{echo $agama;} ?></td>
              </tr>
              <tr>
                <td width="30%">Telepon</td>
                <td>: <?= $telp?></td>
              </tr>
              <tr>
                <td width="30%">Alamat</td>
                <td>: <?php if(!empty($alamat)){echo $alamat;}else{echo "-";} ?></td>
              </tr>
            </table>
            <br>
            <a href="<?= base_url('ubah_profil_user/').$id_user;?>" id="userprofile" data-toggle="modal" data-target="#modal_user" class="btn btn-primary btn-xs"><span class="fa fa-pencil"></span> Ubah Profile</a>
            <?php if($level == 1 || $level == 3){ ?>
              <a href="<?= base_url('ambil_matkul_user/').$id_user;?>" id="ambilmatkuluser" data-toggle="modal" data-target="#modal_ambil_matkul_user" class="btn btn-primary btn-xs"><span class="fa fa-pencil"></span> Ambil Kelas Mata Kuliah</a>
            <?php } ?>
            <?php if($kondisi_data == 1){ ?>
              <a href="<?= base_url('tampildata_user/0/').$id_user;?>" class="btn btn-primary btn-xs"><span class="fa fa-user"></span> Sembunyikan Profile</a>
            <?php }else{ ?>
              <a href="<?= base_url('tampildata_user/1/').$id_user;?>" class="btn btn-primary btn-xs"><span class="fa fa-user"></span> Tampilkan Profile</a>
            <?php } ?>
            <?php if(!empty($gambar)){ ?>
              <a href="<?= base_url('hapusgambar_user/').$id_user;?>" class="btn btn-primary btn-xs"><span class="fa fa-trash"></span> Hapus Gambar</a>
            <?php } ?>
          </div>
        </div>
      </div>
    </div>
  </div>
  <div class="row">
    <?php if($level == 1 || $level == 3){ ?>
      <div class="col-md-<?php if($level != 1){echo'6';}else{echo'12';} ?> col-sm-12 col-xs-12">
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
                <div class="animated flipInY col-lg-12 col-md-3 col-sm-6 col-xs-12">
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
                <div class="animated flipInY col-lg-12 col-md-3 col-sm-6 col-xs-12">
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
                <div class="animated flipInY col-lg-12 col-md-3 col-sm-6 col-xs-12">
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
                <div class="animated flipInY col-lg-12 col-md-3 col-sm-6 col-xs-12">
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
                <div class="animated flipInY col-lg-12 col-md-3 col-sm-6 col-xs-12">
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
                <div class="animated flipInY col-lg-12 col-md-3 col-sm-6 col-xs-12">
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
                <div class="animated flipInY col-lg-12 col-md-3 col-sm-6 col-xs-12">
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
                <div class="animated flipInY col-lg-12 col-md-3 col-sm-6 col-xs-12">
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
                <div class="animated flipInY col-lg-12 col-md-3 col-sm-6 col-xs-12">
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
                <div class="animated flipInY col-lg-12 col-md-3 col-sm-6 col-xs-12">
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
                <div class="animated flipInY col-lg-12 col-md-3 col-sm-6 col-xs-12">
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
                <div class="animated flipInY col-lg-12 col-md-3 col-sm-6 col-xs-12">
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
                <div class="animated flipInY col-lg-12 col-md-3 col-sm-6 col-xs-12">
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
                <div class="animated flipInY col-lg-12 col-md-3 col-sm-6 col-xs-12">
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
                <div class="animated flipInY col-lg-12 col-md-3 col-sm-6 col-xs-12">
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
    <?php } ?>
    <?php if($level == 2 || $level == 3 || $level == 4){ ?>
      <div class="col-md-<?php if($level == 2 || $level == 4){echo'12';}else{echo'6';} ?> col-sm-12 col-xs-12">
        <div class="x_panel">
          <div class="x_title">
            <h2>Mata Kuliah Yang di Ajar</h2>
            <div class="clearfix"></div>
          </div>
          <div class="x_content">
            <?php if($data_kelas_matkul->num_rows() > 0) {?>
              <?php foreach ($data_kelas_matkul->result() as $hasil_matkul) { $data_mhs = $this->main_model->get_all_data_mhs($hasil_matkul->kode); ?>
                <a href="<?=base_url('lihat_ajar/'.$hasil_matkul->id_kelas_matkul."/".$hasil_matkul->kode)?>">
                  <div class="animated flipInY col-lg-12 col-md-3 col-sm-6 col-xs-12">
                    <div class="tile-stats">
                      <div class="icon"><i class="fa fa-folder"></i>
                      </div>
                      <div class="count"><?=$data_mhs->num_rows()?></div>
                      <h4 style="color: black;margin-left: 10px;font-weight: bold;"><?= $hasil_matkul->kelas;?></h4>
                      <h4 style="color: black;margin-left: 10px;"><?= $hasil_matkul->hari." - ".$hasil_matkul->mulai_praktikum." s/d ".$hasil_matkul->selesai_praktikum;?></h4>
                      <?php 
                        $asdos1 = $this->main_model->get_asdos1_iduser($hasil_matkul->asdos_1)->result();
                        foreach ($asdos1 as $asd1) {}
                        if($hasil_matkul->asdos_2 != 0){
                          $asdos2 = $this->main_model->get_asdos2_iduser($hasil_matkul->asdos_2)->result();
                          foreach ($asdos2 as $asd2) {}
                        }
                      ?>
                      <h4 style="color: black;margin-left: 10px;"><?= $asd1->nama." dan ";?><?php if($hasil_matkul->  asdos_2 != 0){echo $asd2->nama;}else{echo"-";} ?></h4>
                    </div>
                  </div>
                </a>
              <?php } ?>
            <?php }else{ ?>
              <h1 align="center">Tidak Ada Kelas Yang Di Ajar</h1>
            <?php } ?>
          </div>
        </div>
      </div>
    <?php } ?>
    </div> 
</div> 
<div class="modal fade" id="modal_user" tabindex="-1" role="dialog" aria-labelledby="largeModal2" aria-hidden="true"></div>
<div class="modal fade" id="modal_ambil_matkul_user" tabindex="-1" role="dialog" aria-labelledby="largeModal2" aria-hidden="true"></div>