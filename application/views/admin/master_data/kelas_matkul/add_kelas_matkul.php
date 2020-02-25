<script src="<?= base_url('assets/')?>myscript.js"></script>
<div class="item form-group">
  <label class="control-label col-md-3 col-sm-3 col-xs-12" for="inputMatkul">Mata Kuliah</label>
  <div class="col-md-9 col-sm-6 col-xs-12">
    <select name="inputMatkul" id="inputMatkul" class="form-control col-md-7 col-xs-12" onchange="munculMatkuladd(this);">
      <option value="pilih" disabled selected>=== Mata Kuliah ===</option>
      <?php
        $matkul = $this->main_model->get_matkul()->result();
        foreach ($matkul as $hasil) {
      ?>
        <option value="<?=$hasil->id_matkul?>"><?=$hasil->matkul?></option>
      <?php } ?>
    </select>
  </div>
</div>
<div class="item form-group">
  <label class="control-label col-md-3 col-sm-3 col-xs-12" for="inputKelas">Kelas <span class="required">*</span></label>
  <div class="col-md-6 col-sm-6 col-xs-12">  
    <p style="font-weight: bold;font-size: 11px;padding-top: 10px;" id="matkulcode">Mata Kuliah</p>
    <input type="hidden" name="kodematkul" id="kodematkul">
  </div>
  <div class="col-md-3 col-sm-6 col-xs-12">  
    <input id="inputKelas" class="form-control col-md-7 col-xs-12" name="inputKelas" placeholder="input Kelas" maxlength="1" required="required" type="text" autocomplete="off">
  </div>
</div>
<div class="item form-group">
  <label class="control-label col-md-3 col-sm-3 col-xs-12">Laboratorium <span class="required">*</span></label>
  <div class="col-md-0 col-sm-0 col-xs-6">
    <div class="radio">
      <label><input type="radio" name="lab" class="flat" value="1" checked> Laboratorium Organisasi Komputer</label>
      <label><input type="radio" name="lab" class="flat" value="0"> Laboratorium Mikrokontroler</label>
    </div>
  </div>
</div>
<div class="item form-group">
  <label class="control-label col-md-3 col-sm-3 col-xs-12">Max Mahasiswa <span class="required">*</span></label>
  <div class="col-md-9 col-sm-6 col-xs-12">  
    <input id="inputMaksmhs" class="form-control col-md-7 col-xs-12" name="inputMaksmhs" placeholder="input Maksimal Mahasiswa" maxlength="2" required="required" type="text" onkeyup="validAngkatelp(this)" autocomplete="off">
  </div>
</div>
<div class="item form-group">
  <label class="control-label col-md-3 col-sm-3 col-xs-12">Asisten Dosen <span class="required">*</span></label>
  <div class="col-md-4 col-sm-6 col-xs-12">
    <select name="inputAsdos_1" id="inputAsdos_1" class="form-control col-md-7 col-xs-12">
      <option value="pilih" disabled selected>=== Asdos 1 ===</option>
      <?php
        $asdos = $this->main_model->get_asdos()->result();
        foreach ($asdos as $hasil) {
      ?>
        <option value="<?=$hasil->id_user?>"><?=$hasil->nama?></option>
      <?php } ?>
    </select>
  </div>
  <div class="col-md-1 col-sm-6 col-xs-12">
    <p style="font-weight: bold;font-size: 15px;padding-top: 5px;">Dan</p>
  </div>
  <div class="col-md-4 col-sm-6 col-xs-12">
    <select name="inputAsdos_2" id="inputAsdos_2" class="form-control col-md-7 col-xs-12">
      <option value="pilih" disabled selected>=== Asdos 2 ===</option>
      <?php
        $asdos = $this->main_model->get_asdos()->result();
        foreach ($asdos as $hasil) {
      ?>
        <option value="<?=$hasil->id_user?>"><?=$hasil->nama?></option>
      <?php } ?>
    </select>
  </div>
</div>
<div class="item form-group">
  <label class="control-label col-md-3 col-sm-3 col-xs-12" for="inputHari">Jadwal Pratikum <span class="required">*</span></label>
  <div class="col-md-3 col-sm-6 col-xs-12">  
    <select name="inputHari" id="inputHari" class="form-control col-md-7 col-xs-12">
      <option value="pilih" disabled selected>=== Hari ===</option>
      <?php
        $hari=array("Senin","Selasa","Rabu","Kamis","Jumat","Sabtu");
        $jlh_hari=count($hari);
        for($c=0; $c<$jlh_hari; $c+=1){
      ?>
        <option value="<?php echo $hari[$c];?>"><?php echo"$hari[$c]";?></option>
      <?php } ?>
    </select>
  </div>
  <div class="col-md-3 col-sm-6 col-xs-12">  
    <input id="inputMulai" class="form-control col-md-7 col-xs-12 inputMulai" name="inputMulai" title="input Mulai Praktikum" placeholder="Mulai" required="required" type="text" autocomplete="off">
  </div>
  <div class="col-md-3 col-sm-6 col-xs-12">  
    <input id="inputSelesai" class="form-control col-md-7 col-xs-12 inputSelesai" name="inputSelesai" title="input Selesai Praktikum" placeholder="Selesai" required="required" type="text" autocomplete="off">
  </div>
</div>
<b>* Required (Harus di isi)</b>
<script type="text/javascript">
  function munculMatkuladd(selTag) {
    var x = selTag.options[selTag.selectedIndex].text;
    if(x != "=== Mata Kuliah ==="){
      document.getElementById("kodematkul").value = x;
      document.getElementById("matkulcode").innerHTML = x + " -";
    }else{
      document.getElementById("matkulcode").innerHTML = "Mata Kuliah";
    }
    console.log(x);
  }
</script> 