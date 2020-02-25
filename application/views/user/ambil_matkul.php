<script src="<?= base_url('assets/')?>myscript.js"></script>
<?php 
  foreach ($data_mahasiswa as $hasil): 
    $id_user = $hasil->id_user;
    $npm = $hasil->npm;
  endforeach;
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
<div class="modal-dialog">
  <div class="modal-content">
    <div class="modal-header">
      <button type="button" class="close" data-dismiss="modal" aria-hidden="true">x</button>
      <h4 class="modal-title" id="myModalLabel">AMBIL MATA KULIAH</h4>
    </div>
    <form action="<?= base_url('save_ambil_matkul_user');?>" method="post" name="form" enctype="multipart/form-data" class="form-horizontal form-label-left">
      <input type="hidden" name="npm" id="npm" value="<?=$npm?>">
      <input type="hidden" name="user_id" id="user_id" value="<?=$id_user?>">
      <div class="modal-body">
        <div class="item form-group">
          <label class="control-label col-md-3 col-sm-3 col-xs-12" for="inputNpm">NPM <span class="required">*</span></label>
          <div class="col-md-9 col-sm-6 col-xs-12">
            <input id="inputNpm" class="form-control col-md-7 col-xs-12" name="inputNpm" placeholder="input Username" required="required" type="text" autocomplete="off" value="<?= $npm?>" readonly>
          </div>
        </div>
        <div class="item form-group">
          <label class="control-label col-md-3 col-sm-3 col-xs-12" for="semester">Semester <span class="required">*</span></label>
          <div class="col-md-9 col-sm-6 col-xs-12">  
            <select name="semester" id="semester" class="form-control col-md-7 col-xs-12" onchange="MySemester()">
              <option value="0" disabled selected>--- Semester ---</option>
              <option value="1">Ganjil</option>
              <option value="2">Genap</option>
            </select>
          </div>
        </div>
        <div id="ganjil" style="display: none;">
          <label class="control-label col-md-3 col-sm-3 col-xs-12" for="akses">Mata Kuliah Wajib</label><br><br>
          <div class="item form-group">
            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="akses">Elektronika</label>
            <div class="col-md-9 col-sm-6 col-xs-12">  
              <select name="elektronika" id="elektronika" class="form-control col-md-7 col-xs-12">
                <?php if(empty($elektronika)){ ?>
                  <option value="0" disabled selected>--- Kelas Elektronika ---</option>
                <?php }else{ ?>
                  <?php 
                    $elektronika = $this->main_model->get_kelas_matkul($elektronika)->result_array();
                    $data_mhs_elektronika = $this->main_model->get_all_data_mhs_elektronika($elektronika[0]['kode'])->num_rows();
                    $total_mhs_elektronika = $elektronika[0]['maks_mhs'] - $data_mhs_elektronika;
                  ?>
                  <option value="">--- Kelas Elektronika ---</option>
                  <?php if($total_mhs_elektronika < 5){ ?>
                    <option value="<?= $elektronika[0]['kode']?> <?= $elektronika[0]['id_kelas_matkul']?>" style="color: #F00;" disabled selected><?= $elektronika[0]['kelas']." (".$total_mhs_elektronika." dari ".$elektronika[0]['maks_mhs']." orang)";?></option>
                  <?php }else{ ?>
                    <option value="<?= $elektronika[0]['kode']?> <?= $elektronika[0]['id_kelas_matkul']?>" selected><?= $elektronika[0]['kelas']." (".$total_mhs_elektronika." dari ".$elektronika[0]['maks_mhs']." orang)";?></option>
                  <?php } ?>
                <?php } ?>
                <?php 
                  $elektronika = $this->main_model->get_matkul_elektronika($elektronika)->result();
                  foreach ($elektronika as $matkul) {
                    $data_mhs_elektronika = $this->main_model->get_all_data_mhs_elektronika($matkul->kode)->num_rows();
                    $total_mhs_elektronika = $matkul->maks_mhs - $data_mhs_elektronika;
                ?>
                  <?php if($total_mhs_elektronika < 5){ ?>
                    <option value="<?= $matkul->kode?> <?= $matkul->id_kelas_matkul?>" style="color: #F00;" disabled><?= $matkul->kelas." (".$total_mhs_elektronika." dari ".$matkul->maks_mhs." orang)"?></option>
                  <?php }else{ ?>
                    <option value="<?= $matkul->kode?> <?= $matkul->id_kelas_matkul?>"><?= $matkul->kelas." (".$total_mhs_elektronika." dari ".$matkul->maks_mhs." orang)"?></option>
                  <?php } ?>
                <?php } ?>  
              </select>
            </div>
          </div>
          <div class="item form-group">
            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="akses">Sistem Digital 1</label>
            <div class="col-md-9 col-sm-6 col-xs-12">  
              <select name="sigit1" id="sigit1" class="form-control col-md-7 col-xs-12">
                <?php if(empty($sistem_digital_1)){ ?>
                  <option value="0" disabled selected>--- Kelas Sistem Digital 1 ---</option>
                <?php }else{ ?>
                  <?php 
                    $sigit1 = $this->main_model->get_kelas_matkul($sistem_digital_1)->result_array();
                    $data_mhs_sigit1 = $this->main_model->get_all_data_mhs_sigit1($sigit1[0]['kode'])->num_rows();
                    $total_mhs_sigit1 = $sigit1[0]['maks_mhs'] - $data_mhs_sigit1;
                  ?>
                  <option value="">--- Kelas Sistem Digital 1 ---</option>
                  <?php if($total_mhs_sigit1 < 5){ ?>
                    <option value="<?= $sigit1[0]['kode']?> <?= $sigit1[0]['id_kelas_matkul']?>" style="color: #F00;" disabled selected><?= $sigit1[0]['kelas']." (".$total_mhs_sigit1." dari ".$sigit1[0]['maks_mhs']." orang)";?></option>
                  <?php }else{ ?>
                    <option value="<?= $sigit1[0]['kode']?> <?= $sigit1[0]['id_kelas_matkul']?>" selected><?= $sigit1[0]['kelas']." (".$total_mhs_sigit1." dari ".$sigit1[0]['maks_mhs']." orang)";?></option>
                  <?php } ?>
                <?php } ?>
                <?php 
                  $sigit1 = $this->main_model->get_matkul_sigit1($sistem_digital_1)->result();
                  foreach ($sigit1 as $matkul) {
                    $data_mhs_sigit1 = $this->main_model->get_all_data_mhs_sigit1($matkul->kode)->num_rows();
                    $total_mhs_sigit1 = $matkul->maks_mhs - $data_mhs_sigit1;
                ?>
                  <?php if($total_mhs_sigit1 < 5){ ?>
                    <option value="<?= $matkul->kode?> <?= $matkul->id_kelas_matkul?>" style="color: #F00;" disabled><?= $matkul->kelas." (".$total_mhs_sigit1." dari ".$matkul->maks_mhs." orang)"?></option>
                  <?php }else{ ?>
                    <option value="<?= $matkul->kode?> <?= $matkul->id_kelas_matkul?>"><?= $matkul->kelas." (".$total_mhs_sigit1." dari ".$matkul->maks_mhs." orang)"?></option>
                  <?php } ?>
                <?php } ?>  
              </select>
            </div>
          </div>
          <div class="item form-group">
            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="akses">Sistem Mikroprosesor</label>
            <div class="col-md-9 col-sm-6 col-xs-12">  
              <select name="sismik" id="sismik" class="form-control col-md-7 col-xs-12">
                <?php if(empty($sistem_mikroprosesor)){ ?>
                  <option value="0" disabled selected>--- Kelas Sistem Mikroprosesor ---</option>
                <?php }else{ ?>
                  <?php 
                    $sismik = $this->main_model->get_kelas_matkul($sistem_mikroprosesor)->result_array();
                    $data_mhs_sismik = $this->main_model->get_all_data_mhs_sismik($sismik[0]['kode'])->num_rows();
                    $total_mhs_sismik = $sismik[0]['maks_mhs'] - $data_mhs_sismik;
                  ?>
                  <option value="">--- Kelas Sistem Mikroprosesor ---</option>
                  <?php if($total_mhs_sismik < 5){ ?>
                    <option value="<?= $sismik[0]['kode']?> <?= $sismik[0]['id_kelas_matkul']?>" style="color: #F00;" disabled selected><?= $sismik[0]['kelas']." (".$total_mhs_sismik." dari ".$sismik[0]['maks_mhs']." orang)";?></option>
                  <?php }else{ ?>
                    <option value="<?= $sismik[0]['kode']?> <?= $sismik[0]['id_kelas_matkul']?>" selected><?= $sismik[0]['kelas']." (".$total_mhs_sismik." dari ".$sismik[0]['maks_mhs']." orang)";?></option>
                  <?php } ?>
                <?php } ?>
                <?php 
                  $sismik = $this->main_model->get_matkul_sismik($sistem_mikroprosesor)->result();
                  foreach ($sismik as $matkul) {
                    $data_mhs_sismik = $this->main_model->get_all_data_mhs_sismik($matkul->kode)->num_rows();
                    $total_mhs_sismik = $matkul->maks_mhs - $data_mhs_sismik;
                ?>
                  <?php if($total_mhs_sismik < 5){ ?>
                    <option value="<?= $matkul->kode?> <?= $matkul->id_kelas_matkul?>" style="color: #F00;" disabled><?= $matkul->kelas." (".$total_mhs_sismik." dari ".$matkul->maks_mhs." orang)"?></option>
                  <?php }else{ ?>
                    <option value="<?= $matkul->kode?> <?= $matkul->id_kelas_matkul?>"><?= $matkul->kelas." (".$total_mhs_sismik." dari ".$matkul->maks_mhs." orang)"?></option>
                  <?php } ?>
                <?php } ?>  
              </select>
            </div>
          </div>
          <hr>
          <label class="control-label col-md-3 col-sm-3 col-xs-12" for="akses">Mata Kuliah Pilihan</label><br><br>
          <div class="item form-group">
            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="akses">Sistem Otomasi & IOT</label>
            <div class="col-md-9 col-sm-6 col-xs-12">  
              <select name="iot" id="iot" class="form-control col-md-7 col-xs-12">
                <?php if(empty($otomasi)){ ?>
                  <option value="0" disabled selected>--- Kelas Sistem Otomasi & IOT ---</option>
                <?php }else{ ?>
                  <?php 
                    $iot = $this->main_model->get_kelas_matkul($otomasi)->result_array();
                    $data_mhs_iot = $this->main_model->get_all_data_mhs_iot($iot[0]['kode'])->num_rows();
                    $total_mhs_iot = $iot[0]['maks_mhs'] - $data_mhs_iot;
                  ?>
                  <option value="">--- Kelas Sistem Otomasi & IOT ---</option>
                  <?php if($total_mhs_iot < 5){ ?>
                    <option value="<?= $iot[0]['kode']?> <?= $iot[0]['id_kelas_matkul']?>" style="color: #F00;" disabled selected><?= $iot[0]['kelas']." (".$total_mhs_iot." dari ".$iot[0]['maks_mhs']." orang)";?></option>
                  <?php }else{ ?>
                    <option value="<?= $iot[0]['kode']?> <?= $iot[0]['id_kelas_matkul']?>" selected><?= $iot[0]['kelas']." (".$total_mhs_iot." dari ".$iot[0]['maks_mhs']." orang)";?></option>
                  <?php } ?>
                <?php } ?>
                <?php 
                  $iot = $this->main_model->get_matkul_iot($otomasi)->result();
                  foreach ($iot as $matkul) {
                    $data_mhs_iot = $this->main_model->get_all_data_mhs_iot($matkul->kode)->num_rows();
                    $total_mhs_iot = $matkul->maks_mhs - $data_mhs_iot;
                ?>
                  <?php if($total_mhs_iot < 5){ ?>
                    <option value="<?= $matkul->kode?> <?= $matkul->id_kelas_matkul?>" style="color: #F00;" disabled><?= $matkul->kelas." (".$total_mhs_iot." dari ".$matkul->maks_mhs." orang)"?></option>
                  <?php }else{ ?>
                    <option value="<?= $matkul->kode?> <?= $matkul->id_kelas_matkul?>"><?= $matkul->kelas." (".$total_mhs_iot." dari ".$matkul->maks_mhs." orang)"?></option>
                  <?php } ?>
                <?php } ?>  
              </select>
            </div>
          </div>
          <div class="item form-group">
            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="akses">Administrasi Jaringan</label>
            <div class="col-md-9 col-sm-6 col-xs-12">  
              <select name="adminjar" id="adminjar" class="form-control col-md-7 col-xs-12">
                <?php if(empty($administrasi_jaringan)){ ?>
                  <option value="0" disabled selected>--- Kelas Administrasi Jaringan ---</option>
                <?php }else{ ?>
                  <?php 
                    $adminjar = $this->main_model->get_kelas_matkul($administrasi_jaringan)->result_array();
                    $data_mhs_adminjar = $this->main_model->get_all_data_mhs_adminjar($adminjar[0]['kode'])->num_rows();
                    $total_mhs_adminjar = $adminjar[0]['maks_mhs'] - $data_mhs_adminjar;
                  ?>
                  <option value="">--- Kelas Administrasi Jaringan ---</option>
                  <?php if($total_mhs_adminjar < 5){ ?>
                    <option value="<?= $adminjar[0]['kode']?> <?= $adminjar[0]['id_kelas_matkul']?>" style="color: #F00;" disabled selected><?= $adminjar[0]['kelas']." (".$total_mhs_adminjar." dari ".$adminjar[0]['maks_mhs']." orang)";?></option>
                  <?php }else{ ?>
                    <option value="<?= $adminjar[0]['kode']?> <?= $adminjar[0]['id_kelas_matkul']?>" selected><?= $adminjar[0]['kelas']." (".$total_mhs_adminjar." dari ".$adminjar[0]['maks_mhs']." orang)";?></option>
                  <?php } ?>
                <?php } ?>
                <?php 
                  $adminjar = $this->main_model->get_matkul_adminjar($administrasi_jaringan);
                  foreach ($adminjar as $matkul) {
                    $data_mhs_adminjar = $this->main_model->get_all_data_mhs_adminjar($matkul->kode)->num_rows();
                    $total_mhs_adminjar = $matkul->maks_mhs - $data_mhs_adminjar;
                ?>
                  <?php if($total_mhs_adminjar < 5){ ?>
                    <option value="<?= $matkul->kode?> <?= $matkul->id_kelas_matkul?>" style="color: #F00;" disabled><?= $matkul->kelas." (".$total_mhs_adminjar." dari ".$matkul->maks_mhs." orang)"?></option>
                  <?php }else{ ?>
                    <option value="<?= $matkul->kode?> <?= $matkul->id_kelas_matkul?>"><?= $matkul->kelas." (".$total_mhs_adminjar." dari ".$matkul->maks_mhs." orang)"?></option>
                  <?php } ?>
                <?php } ?>  
              </select>
            </div>
          </div>
          <div class="item form-group">
            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="akses">Sistem Interface Mikrokontroler</label>
            <div class="col-md-9 col-sm-6 col-xs-12">  
              <select name="sim" id="sim" class="form-control col-md-7 col-xs-12">
                <?php if(empty($sistem_interface_mikrokontroler)){ ?>
                  <option value="0" disabled selected>--- Kelas Sistem Interface Mikrokontroler ---</option>
                <?php }else{ ?>
                  <?php 
                    $sim = $this->main_model->get_kelas_matkul($sistem_interface_mikrokontroler)->result_array();
                    $data_mhs_sim = $this->main_model->get_all_data_mhs_sim($sim[0]['kode'])->num_rows();
                    $total_mhs_sim = $sim[0]['maks_mhs'] - $data_mhs_sim;
                  ?>
                  <option value="">--- Kelas Sistem Interface Mikrokontroler ---</option>
                  <?php if($total_mhs_sim < 5){ ?>
                    <option value="<?= $sim[0]['kode']?> <?= $sim[0]['id_kelas_matkul']?>" style="color: #F00;" disabled selected><?= $sim[0]['kelas']." (".$total_mhs_sim." dari ".$sim[0]['maks_mhs']." orang)";?></option>
                  <?php }else{ ?>
                    <option value="<?= $sim[0]['kode']?> <?= $sim[0]['id_kelas_matkul']?>" selected><?= $sim[0]['kelas']." (".$total_mhs_sim." dari ".$sim[0]['maks_mhs']." orang)";?></option>
                  <?php } ?>
                <?php } ?>
                <?php 
                  $sim = $this->main_model->get_matkul_sim($sistem_interface_mikrokontroler)->result();
                  foreach ($sim as $matkul) {
                    $data_mhs_sim = $this->main_model->get_all_data_mhs_sim($matkul->kode)->num_rows();
                    $total_mhs_sim = $matkul->maks_mhs - $data_mhs_sim;
                ?>
                  <?php if($total_mhs_sim < 5){ ?>
                    <option value="<?= $matkul->kode?> <?= $matkul->id_kelas_matkul?>" style="color: #F00;" disabled><?= $matkul->kelas." (".$total_mhs_sim." dari ".$matkul->maks_mhs." orang)"?></option>
                  <?php }else{ ?>
                    <option value="<?= $matkul->kode?> <?= $matkul->id_kelas_matkul?>"><?= $matkul->kelas." (".$total_mhs_sim." dari ".$matkul->maks_mhs." orang)"?></option>
                  <?php } ?>
                <?php } ?>  
              </select>
            </div>
          </div>
          <div class="item form-group">
            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="akses">Robotik</label>
            <div class="col-md-9 col-sm-6 col-xs-12">  
              <select name="robotik" id="robotik" class="form-control col-md-7 col-xs-12">
                <?php if(empty($robotik)){ ?>
                  <option value="0" disabled selected>--- Kelas Robotik ---</option>
                <?php }else{ ?>
                  <?php 
                    $robotik = $this->main_model->get_kelas_matkul($robotik)->result_array();
                    $data_mhs_robotik = $this->main_model->get_all_data_mhs_robotik($robotik[0]['kode'])->num_rows();
                    $total_mhs_robotik = $robotik[0]['maks_mhs'] - $data_mhs_robotik;
                  ?>
                  <option value="">--- Kelas Robotik ---</option>
                  <?php if($total_mhs_robotik < 5){ ?>
                    <option value="<?= $robotik[0]['kode']?> <?= $robotik[0]['id_kelas_matkul']?>" style="color: #F00;" disabled selected><?= $robotik[0]['kelas']." (".$total_mhs_robotik." dari ".$robotik[0]['maks_mhs']." orang)";?></option>
                  <?php }else{ ?>
                    <option value="<?= $robotik[0]['kode']?> <?= $robotik[0]['id_kelas_matkul']?>" selected><?= $robotik[0]['kelas']." (".$total_mhs_robotik." dari ".$robotik[0]['maks_mhs']." orang)";?></option>
                  <?php } ?>
                <?php } ?>
                <?php 
                  $robotik = $this->main_model->get_matkul_robotik($robotik)->result();
                  foreach ($robotik as $matkul) {
                    $data_mhs_robotik = $this->main_model->get_all_data_mhs_robotik($matkul->kode)->num_rows();
                    $total_mhs_robotik = $matkul->maks_mhs - $data_mhs_robotik;
                ?>
                  <?php if($total_mhs_robotik < 5){ ?>
                    <option value="<?= $matkul->kode?> <?= $matkul->id_kelas_matkul?>" style="color: #F00;" disabled><?= $matkul->kelas." (".$total_mhs_robotik." dari ".$matkul->maks_mhs." orang)"?></option>
                  <?php }else{ ?>
                    <option value="<?= $matkul->kode?> <?= $matkul->id_kelas_matkul?>"><?= $matkul->kelas." (".$total_mhs_robotik." dari ".$matkul->maks_mhs." orang)"?></option>
                  <?php } ?>
                <?php } ?>  
              </select>
            </div>
          </div>
        </div>
        <div id="genap" style="display: none;">
          <label class="control-label col-md-3 col-sm-3 col-xs-12" for="akses">Mata Kuliah Wajib</label><br><br>
          <div class="item form-group">
            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="akses">Sistem Instrumentasi</label>
            <div class="col-md-9 col-sm-6 col-xs-12">  
              <select name="si" id="si" class="form-control col-md-7 col-xs-12">
                <?php if(empty($sistem_instrumentasi)){ ?>
                  <option value="0" disabled selected>--- Kelas Sistem Instrumentasi ---</option>
                <?php }else{ ?>
                  <?php 
                    $si = $this->main_model->get_kelas_matkul($sistem_instrumentasi)->result_array();
                    $data_mhs_si = $this->main_model->get_all_data_mhs_si($si[0]['kode'])->num_rows();
                    $total_mhs_si = $si[0]['maks_mhs'] - $data_mhs_si;
                  ?>
                  <option value="">--- Kelas Sistem Instrumentasi ---</option>
                  <?php if($total_mhs_si < 5){ ?>
                    <option value="<?= $si[0]['kode']?> <?= $si[0]['id_kelas_matkul']?>" style="color: #F00;" disabled selected><?= $si[0]['kelas']." (".$total_mhs_si." dari ".$si[0]['maks_mhs']." orang)";?></option>
                  <?php }else{ ?>
                    <option value="<?= $si[0]['kode']?> <?= $si[0]['id_kelas_matkul']?>" selected><?= $si[0]['kelas']." (".$total_mhs_si." dari ".$si[0]['maks_mhs']." orang)";?></option>
                  <?php } ?>
                <?php } ?>
                <?php 
                  $si = $this->main_model->get_matkul_si($sistem_instrumentasi)->result();
                  foreach ($si as $matkul) {
                    $data_mhs_si = $this->main_model->get_all_data_mhs_si($matkul->kode)->num_rows();
                    $total_mhs_si = $matkul->maks_mhs - $data_mhs_si;
                ?>
                  <?php if($total_mhs_si < 5){ ?>
                    <option value="<?= $matkul->kode?> <?= $matkul->id_kelas_matkul?>" style="color: #F00;" disabled><?= $matkul->kelas." (".$total_mhs_si." dari ".$matkul->maks_mhs." orang)"?></option>
                  <?php }else{ ?>
                    <option value="<?= $matkul->kode?> <?= $matkul->id_kelas_matkul?>"><?= $matkul->kelas." (".$total_mhs_si." dari ".$matkul->maks_mhs." orang)"?></option>
                  <?php } ?>  
                <?php } ?>  
              </select>
            </div>
          </div>
          <div class="item form-group">
            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="akses">Organisasi Komputer</label>
            <div class="col-md-9 col-sm-6 col-xs-12">  
              <select name="orkom" id="orkom" class="form-control col-md-7 col-xs-12">
                <?php if(empty($organisasi_komputer)){ ?>
                  <option value="0" disabled selected>--- Kelas Organisasi Komputer ---</option>
                <?php }else{ ?>
                  <?php 
                    $orkom = $this->main_model->get_kelas_matkul($organisasi_komputer)->result_array();
                    $data_mhs_orkom = $this->main_model->get_all_data_mhs_orkom($orkom[0]['kode'])->num_rows();
                    $total_mhs_orkom = $orkom[0]['maks_mhs'] - $data_mhs_orkom;
                  ?>
                  <option value="">--- Kelas Organisasi Komputer ---</option>
                  <?php if($total_mhs_orkom < 5){ ?>
                    <option value="<?= $orkom[0]['kode']?> <?= $orkom[0]['id_kelas_matkul']?>" style="color: #F00;" disabled selected><?= $orkom[0]['kelas']." (".$total_mhs_orkom." dari ".$orkom[0]['maks_mhs']." orang)";?></option>
                  <?php }else{ ?>
                    <option value="<?= $orkom[0]['kode']?> <?= $orkom[0]['id_kelas_matkul']?>" selected><?= $orkom[0]['kelas']." (".$total_mhs_orkom." dari ".$orkom[0]['maks_mhs']." orang)";?></option>
                  <?php } ?>
                <?php } ?>
                <?php 
                  $orkom = $this->main_model->get_matkul_orkom($organisasi_komputer)->result();
                  foreach ($orkom as $matkul) {
                    $data_mhs_orkom = $this->main_model->get_all_data_mhs_orkom($matkul->kode)->num_rows();
                    $total_mhs_orkom = $matkul->maks_mhs - $data_mhs_orkom;
                ?>
                  <?php if($total_mhs_orkom < 5){ ?>
                    <option value="<?= $matkul->kode?> <?= $matkul->id_kelas_matkul?>" style="color: #F00;" disabled><?= $matkul->kelas." (".$total_mhs_orkom." dari ".$matkul->maks_mhs." orang)"?></option>
                  <?php }else{ ?>
                    <option value="<?= $matkul->kode?> <?= $matkul->id_kelas_matkul?>"><?= $matkul->kelas." (".$total_mhs_orkom." dari ".$matkul->maks_mhs." orang)"?></option>
                  <?php } ?> 
                <?php } ?>  
              </select>
            </div>
          </div>
          <div class="item form-group">
            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="akses">Sistem Digital 2</label>
            <div class="col-md-9 col-sm-6 col-xs-12">  
              <select name="sigit2" id="sigit2" class="form-control col-md-7 col-xs-12">
                <?php if(empty($sistem_digital_2)){ ?>
                  <option value="0" disabled selected>--- Kelas Sistem Digital 2 ---</option>
                <?php }else{ ?>
                  <?php 
                    $sigit2 = $this->main_model->get_kelas_matkul($sistem_digital_2)->result_array();
                    $data_mhs_sigit2 = $this->main_model->get_all_data_mhs_sigit2($sigit2[0]['kode'])->num_rows();
                    $total_mhs_sigit2 = $sigit2[0]['maks_mhs'] - $data_mhs_sigit2;
                  ?>
                  <option value="">--- Kelas Sistem Digital 2 ---</option>
                  <?php if($total_mhs_sigit2 < 5){ ?>
                    <option value="<?= $sigit2[0]['kode']?> <?= $sigit2[0]['id_kelas_matkul']?>" style="color: #F00;" disabled selected><?= $sigit2[0]['kelas']." (".$total_mhs_sigit2." dari ".$sigit2[0]['maks_mhs']." orang)";?></option>
                  <?php }else{ ?>
                    <option value="<?= $sigit2[0]['kode']?> <?= $sigit2[0]['id_kelas_matkul']?>" selected><?= $sigit2[0]['kelas']." (".$total_mhs_sigit2." dari ".$sigit2[0]['maks_mhs']." orang)";?></option>
                  <?php } ?>
                <?php } ?>
                <?php 
                  $sigit2 = $this->main_model->get_matkul_sigit2($sistem_digital_2)->result();
                  foreach ($sigit2 as $matkul) {
                    $data_mhs_sigit2 = $this->main_model->get_all_data_mhs_sigit2($matkul->kode)->num_rows();
                    $total_mhs_sigit2 = $matkul->maks_mhs - $data_mhs_sigit2;
                ?>
                  <?php if($total_mhs_sigit2 < 5){ ?>
                    <option value="<?= $matkul->kode?> <?= $matkul->id_kelas_matkul?>" style="color: #F00;" disabled><?= $matkul->kelas." (".$total_mhs_sigit2." dari ".$matkul->maks_mhs." orang)"?></option>
                  <?php }else{ ?>
                    <option value="<?= $matkul->kode?> <?= $matkul->id_kelas_matkul?>"><?= $matkul->kelas." (".$total_mhs_sigit2." dari ".$matkul->maks_mhs." orang)"?></option>
                  <?php } ?>
                <?php } ?>  
              </select>
            </div>
          </div>
          <div class="item form-group">
            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="akses">Jaringan Komputer</label>
            <div class="col-md-9 col-sm-6 col-xs-12">  
              <select name="jarkom" id="jarkom" class="form-control col-md-7 col-xs-12">
                <?php if(empty($jaringan_komputer)){ ?>
                  <option value="0" disabled selected>--- Kelas Jaringan Komputer ---</option>
                <?php }else{ ?>
                  <?php 
                    $jarkom = $this->main_model->get_kelas_matkul($jaringan_komputer)->result_array();
                    $data_mhs_jarkom = $this->main_model->get_all_data_mhs_jarkom($jarkom[0]['kode'])->num_rows();
                    $total_mhs_jarkom = $jarkom[0]['maks_mhs'] - $data_mhs_jarkom;
                  ?>
                  <option value="">--- Kelas Jaringan Komputer ---</option>
                  <?php if($total_mhs_jarkom < 5){ ?>
                    <option value="<?= $jarkom[0]['kode']?> <?= $jarkom[0]['id_kelas_matkul']?>" style="color: #F00;" disabled selected><?= $jarkom[0]['kelas']." (".$total_mhs_jarkom." dari ".$jarkom[0]['maks_mhs']." orang)";?></option>
                  <?php }else{ ?>
                    <option value="<?= $jarkom[0]['kode']?> <?= $jarkom[0]['id_kelas_matkul']?>" selected><?= $jarkom[0]['kelas']." (".$total_mhs_jarkom." dari ".$jarkom[0]['maks_mhs']." orang)";?></option>
                  <?php } ?>
                <?php } ?>
                <?php 
                  $jarkom = $this->main_model->get_matkul_jarkom($jaringan_komputer)->result();
                  foreach ($jarkom as $matkul) {
                    $data_mhs_jarkom = $this->main_model->get_all_data_mhs_jarkom($matkul->kode)->num_rows();
                    $total_mhs_jarkom = $matkul->maks_mhs - $data_mhs_jarkom;
                ?>
                  <?php if($total_mhs_jarkom < 5){ ?>
                    <option value="<?= $matkul->kode?> <?= $matkul->id_kelas_matkul?>" style="color: #F00;" disabled><?= $matkul->kelas." (".$total_mhs_jarkom." dari ".$matkul->maks_mhs." orang)"?></option>
                  <?php }else{ ?>
                    <option value="<?= $matkul->kode?> <?= $matkul->id_kelas_matkul?>"><?= $matkul->kelas." (".$total_mhs_jarkom." dari ".$matkul->maks_mhs." orang)"?></option>
                  <?php } ?>
                <?php } ?>  
              </select>
            </div>
          </div>
          <hr>
          <label class="control-label col-md-3 col-sm-3 col-xs-12" for="akses">Mata Kuliah Pilihan</label><br><br>
          <div class="item form-group">
            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="akses">Sistem Pemrograman Mikroprosesor</label>
            <div class="col-md-9 col-sm-6 col-xs-12">  
              <select name="spm" id="spm" class="form-control col-md-7 col-xs-12">
                <?php if(empty($sistem_pemrograman_mikroprosesor)){ ?>
                  <option value="0" disabled selected>--- Kelas Sistem Pemrograman Mikroprosesor ---</option>
                <?php }else{ ?>
                  <?php 
                    $spm = $this->main_model->get_kelas_matkul($sistem_pemrograman_mikroprosesor)->result_array();
                    $data_mhs_spm = $this->main_model->get_all_data_mhs_spm($spm[0]['kode'])->num_rows();
                    $total_mhs_spm = $spm[0]['maks_mhs'] - $data_mhs_spm;
                  ?>
                  <option value="">--- Kelas Sistem Pemrograman Mikroprosesor ---</option>
                  <?php if($total_mhs_spm < 5){ ?>
                    <option value="<?= $spm[0]['kode']?> <?= $spm[0]['id_kelas_matkul']?>" style="color: #F00;" disabled selected><?= $spm[0]['kelas']." (".$total_mhs_spm." dari ".$spm[0]['maks_mhs']." orang)";?></option>
                  <?php }else{ ?>
                    <option value="<?= $spm[0]['kode']?> <?= $spm[0]['id_kelas_matkul']?>" selected><?= $spm[0]['kelas']." (".$total_mhs_spm." dari ".$spm[0]['maks_mhs']." orang)";?></option>
                  <?php } ?>
                <?php } ?>
                <?php 
                  $spm = $this->main_model->get_matkul_spm($sistem_pemrograman_mikroprosesor)->result();
                  foreach ($spm as $matkul) {
                    $data_mhs_spm = $this->main_model->get_all_data_mhs_spm($matkul->kode)->num_rows();
                    $total_mhs_spm = $matkul->maks_mhs - $data_mhs_spm;
                ?>
                  <?php if($total_mhs_spm < 5){ ?>
                    <option value="<?= $matkul->kode?> <?= $matkul->id_kelas_matkul?>" style="color: #F00;" disabled><?= $matkul->kelas." (".$total_mhs_spm." dari ".$matkul->maks_mhs." orang)"?></option>
                  <?php }else{ ?>
                    <option value="<?= $matkul->kode?> <?= $matkul->id_kelas_matkul?>"><?= $matkul->kelas." (".$total_mhs_spm." dari ".$matkul->maks_mhs." orang)"?></option>
                  <?php } ?> 
                <?php } ?>  
              </select>
            </div>
          </div>
          <div class="item form-group">
            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="akses">Mobile Programming</label>
            <div class="col-md-9 col-sm-6 col-xs-12">  
              <select name="mobile" id="mobile" class="form-control col-md-7 col-xs-12">
                <?php if(empty($mobile_programing)){ ?>
                  <option value="0" disabled selected>--- Kelas Mobile Programming ---</option>
                <?php }else{ ?>
                  <?php 
                    $mobile = $this->main_model->get_kelas_matkul($mobile_programing)->result_array();
                    $data_mhs_mobile = $this->main_model->get_all_data_mhs_mobile($mobile[0]['kode'])->num_rows();
                    $total_mhs_mobile = $mobile[0]['maks_mhs'] - $data_mhs_mobile;
                  ?>
                  <option value="">--- Kelas Mobile Programming ---</option>
                  <?php if($total_mhs_mobile < 5){ ?>
                    <option value="<?= $mobile[0]['kode']?> <?= $mobile[0]['id_kelas_matkul']?>" style="color: #F00;" disabled selected><?= $mobile[0]['kelas']." (".$total_mhs_mobile." dari ".$mobile[0]['maks_mhs']." orang)";?></option>
                  <?php }else{ ?>
                    <option value="<?= $mobile[0]['kode']?> <?= $mobile[0]['id_kelas_matkul']?>" selected><?= $mobile[0]['kelas']." (".$total_mhs_mobile." dari ".$mobile[0]['maks_mhs']." orang)";?></option>
                  <?php } ?>
                <?php } ?>
                <?php 
                  $mobile = $this->main_model->get_matkul_mobile($mobile_programing)->result();
                  foreach ($mobile as $matkul) {
                    $data_mhs_mobile = $this->main_model->get_all_data_mhs_mobile($matkul->kode)->num_rows();
                    $total_mhs_mobile = $matkul->maks_mhs - $data_mhs_mobile;
                ?>
                  <?php if($total_mhs_mobile < 5){ ?>
                    <option value="<?= $matkul->kode?> <?= $matkul->id_kelas_matkul?>" style="color: #F00;" disabled><?= $matkul->kelas." (".$total_mhs_mobile." dari ".$matkul->maks_mhs." orang)"?></option>
                  <?php }else{ ?>
                    <option value="<?= $matkul->kode?> <?= $matkul->id_kelas_matkul?>"><?= $matkul->kelas." (".$total_mhs_mobile." dari ".$matkul->maks_mhs." orang)"?></option>
                  <?php } ?>
                <?php } ?>  
              </select>
            </div>
          </div>
          <div class="item form-group">
            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="akses">Pemrograman Python</label>
            <div class="col-md-9 col-sm-6 col-xs-12">  
              <select name="python" id="python" class="form-control col-md-7 col-xs-12">
                <?php if(empty($pemrograman_python)){ ?>
                  <option value="0" disabled selected>--- Kelas Pemrograman Python ---</option>
                <?php }else{ ?>
                  <?php 
                    $python = $this->main_model->get_kelas_matkul($pemrograman_python)->result_array();
                    $data_mhs_python = $this->main_model->get_all_data_mhs_python($python[0]['kode'])->num_rows();
                    $total_mhs_python = $python[0]['maks_mhs'] - $data_mhs_python;
                  ?>
                  <option value="">--- Kelas Pemrograman Python ---</option>
                  <?php if($total_mhs_python < 5){ ?>
                    <option value="<?= $python[0]['kode']?> <?= $python[0]['id_kelas_matkul']?>" style="color: #F00;" disabled selected><?= $python[0]['kelas']." (".$total_mhs_python." dari ".$python[0]['maks_mhs']." orang)";?></option>
                  <?php }else{ ?>
                    <option value="<?= $python[0]['kode']?> <?= $python[0]['id_kelas_matkul']?>" selected><?= $python[0]['kelas']." (".$total_mhs_python." dari ".$python[0]['maks_mhs']." orang)";?></option>
                  <?php } ?>
                <?php } ?>
                <?php 
                  $python = $this->main_model->get_matkul_python($pemrograman_python)->result();
                  foreach ($python as $matkul) {
                    $data_mhs_python = $this->main_model->get_all_data_mhs_python($matkul->kode)->num_rows();
                    $total_mhs_python = $matkul->maks_mhs - $data_mhs_python;
                ?>
                  <?php if($total_mhs_python < 5){ ?>
                    <option value="<?= $matkul->kode?> <?= $matkul->id_kelas_matkul?>" style="color: #F00;" disabled><?= $matkul->kelas." (".$total_mhs_python." dari ".$matkul->maks_mhs." orang)"?></option>
                  <?php }else{ ?>
                    <option value="<?= $matkul->kode?> <?= $matkul->id_kelas_matkul?>"><?= $matkul->kelas." (".$total_mhs_python." dari ".$matkul->maks_mhs." orang)"?></option>
                  <?php } ?>
                <?php } ?>  
              </select>
            </div>
          </div>
          <div class="item form-group">
            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="akses">Keamanan Jaringan</label>
            <div class="col-md-9 col-sm-6 col-xs-12">  
              <select name="kejar" id="kejar" class="form-control col-md-7 col-xs-12">
                <?php if(empty($keamanan_jaringan)){ ?>
                  <option value="0" disabled selected>--- Kelas Keamanan Jaringan ---</option>
                <?php }else{ ?>
                  <?php 
                    $kejar = $this->main_model->get_kelas_matkul($keamanan_jaringan)->result_array();
                    $data_mhs_kejar = $this->main_model->get_all_data_mhs_kejar($kejar[0]['kode'])->num_rows();
                    $total_mhs_kejar = $kejar[0]['maks_mhs'] - $data_mhs_kejar;
                  ?>
                  <option value="">--- Kelas Keamanan Jaringan ---</option>
                  <?php if($total_mhs_kejar < 5){ ?>
                    <option value="<?= $kejar[0]['kode']?> <?= $kejar[0]['id_kelas_matkul']?>" style="color: #F00;" disabled selected><?= $kejar[0]['kelas']." (".$total_mhs_kejar." dari ".$kejar[0]['maks_mhs']." orang)";?></option>
                  <?php }else{ ?>
                    <option value="<?= $kejar[0]['kode']?> <?= $kejar[0]['id_kelas_matkul']?>" selected><?= $kejar[0]['kelas']." (".$total_mhs_kejar." dari ".$kejar[0]['maks_mhs']." orang)";?></option>
                  <?php } ?>
                <?php } ?>
                <?php 
                  $kejar = $this->main_model->get_matkul_kejar($keamanan_jaringan)->result();
                  foreach ($kejar as $matkul) {
                    $data_mhs_kejar = $this->main_model->get_all_data_mhs_kejar($matkul->kode)->num_rows();
                    $total_mhs_kejar = $matkul->maks_mhs - $data_mhs_kejar;
                ?>
                  <?php if($total_mhs_kejar < 5){ ?>
                    <option value="<?= $matkul->kode?> <?= $matkul->id_kelas_matkul?>" style="color: #F00;" disabled><?= $matkul->kelas." (".$total_mhs_kejar." dari ".$matkul->maks_mhs." orang)"?></option>
                  <?php }else{ ?>
                    <option value="<?= $matkul->kode?> <?= $matkul->id_kelas_matkul?>"><?= $matkul->kelas." (".$total_mhs_kejar." dari ".$matkul->maks_mhs." orang)"?></option>
                  <?php } ?>
                <?php } ?>  
              </select>
            </div>
          </div>
        </div>
        <b>* Required (Harus di isi)</b>
      </div> 
      <div class="modal-footer">
        <button class="btn" data-dismiss="modal" aria-hidden="true">Tutup</button>
        <button class="btn btn-primary" id="ambil-kelas" disabled="true">Ambil Kelas</button>
      </div>
    </form>
  </div>
</div>