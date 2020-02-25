<script src="<?= base_url('assets/')?>myscript.js"></script>
<div class="modal-dialog">
  <div class="modal-content">       
    <div class="modal-header">
      <button type="button" class="close" data-dismiss="modal" aria-hidden="true">x</button>
      <h4 class="modal-title" id="myModalLabel">UBAH DATA KELAS MATA KULIAH</h4>
    </div>
    <form action="<?= base_url('update_kelas_matkul');?>" method="post" name="form" enctype="multipart/form-data" class="form-horizontal form-label-left">
      <div class="modal-body">
        <?php 
          foreach ($data_kelas_matkul as $hasil): 
            $id_matkul = $hasil->id_matkul;
            $id_kelas_matkul = $hasil->id_kelas_matkul;
            $matkul = $this->main_model->detail_matkul($id_matkul)->result();
            foreach ($matkul as $mtkl) {
              $nama_matkul = $mtkl->matkul;
            }
            $kode = $hasil->kode;
            $kelas = $hasil->kelas;
            $kelas_nih = substr($kelas,-1);
            $lab = $hasil->lab;
            $maks_mhs = $hasil->maks_mhs;
            $asdos_1 = $hasil->asdos_1;
            $asdos_2 = $hasil->asdos_2;
            $hari_praktikum = $hasil->hari;
            $mulai_praktikum = $hasil->mulai_praktikum;
            $selesai_praktikum = $hasil->selesai_praktikum;
            $status = $hasil->status;
          endforeach; 
        ?>
        <input type="hidden" id="kelas_matkul_id" name="kelas_matkul_id" value="<?= $id_kelas_matkul;?>">
        <div class="item form-group">
          <label class="control-label col-md-3 col-sm-3 col-xs-12" for="inputMatkul">Mata Kuliah</label>
          <div class="col-md-9 col-sm-6 col-xs-12">
            <select name="inputMatkul" id="inputMatkul" class="form-control col-md-7 col-xs-12" onchange="munculMatkuledit(this);">
              <option value="pilih" disabled>=== Mata Kuliah ===</option>
              <option value="<?=$id_matkul?>" selected><?=$nama_matkul?></option>
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
            <p style="font-weight: bold;font-size: 11px;padding-top: 10px;" id="matkulcode1"><?=$nama_matkul." -";?></p>
            <input type="hidden" name="kodematkul" id="kodematkul1" value="<?=$nama_matkul?>">
          </div>
          <div class="col-md-3 col-sm-6 col-xs-12">  
            <input id="inputKelas" class="form-control col-md-7 col-xs-12" name="inputKelas" placeholder="input Kelas" maxlength="1" required="required" type="text" value="<?= $kelas_nih;?>" onfocus="(this.value=='<?= $kelas_nih;?>') && (this.value='')" onblur="(this.value=='') && (this.value='<?= $kelas_nih;?>')" autocomplete="off">
          </div>
        </div>
        <div class="item form-group">
          <label class="control-label col-md-3 col-sm-3 col-xs-12">Laboratorium <span class="required">*</span></label>
          <div class="col-md-0 col-sm-0 col-xs-6">
            <div class="radio">
              <label><input type="radio" name="lab" class="flat" value="1" <?php if($lab == 1){echo "checked";}else{echo "unchecked";} ?>> Laboratorium Organisasi Komputer</label>
              <label><input type="radio" name="lab" class="flat" value="0" <?php if($lab == 0){echo "checked";}else{echo "unchecked";} ?>> Laboratorium Mikrokontroler</label>
            </div>
          </div>
        </div>
        <div class="item form-group">
          <label class="control-label col-md-3 col-sm-3 col-xs-12">Max Mahasiswa <span class="required">*</span></label>
          <div class="col-md-9 col-sm-6 col-xs-12">  
            <input id="inputMaksmhs" class="form-control col-md-7 col-xs-12" name="inputMaksmhs" placeholder="input Maksimal Mahasiswa" maxlength="2" required="required" type="text" onkeyup="validAngkatelp(this)" value="<?= $maks_mhs;?>" onfocus="(this.value=='<?= $maks_mhs;?>') && (this.value='')" onblur="(this.value=='') && (this.value='<?= $maks_mhs;?>')" autocomplete="off">
          </div>
        </div>
        <div class="item form-group">
          <label class="control-label col-md-3 col-sm-3 col-xs-12">Asisten Dosen <span class="required">*</span></label>
          <div class="col-md-4 col-sm-6 col-xs-12">
            <select name="inputAsdos_1" id="inputAsdos_1" class="form-control col-md-7 col-xs-12">
              <?php $asdos1 = $this->main_model->get_asdos1_iduser($asdos_1)->result(); foreach ($asdos1 as $hasil1) {} ?>
              <option value="pilih" disabled>=== Asdos 1 ===</option>
              <option value="<?=$hasil1->id_user?>" selected><?=$hasil1->nama?></option>
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
              <?php 
                $asdos2 = $this->main_model->get_asdos2_iduser($asdos_2)->result(); foreach ($asdos2 as $hasil2) {} 
                if($asdos_2 == 0){
              ?>
                <option value="pilih" disabled selected>=== Asdos 2 ===</option>
              <?php }else{ ?>
                <option value="pilih">=== Asdos 2 ===</option>
                <option value="<?=$hasil1->id_user?>" selected><?=$hasil2->nama?></option>
              <?php } ?>
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
              <option value="pilih" disabled>=== Hari ===</option>
              <option value="<?=$hari_praktikum?>" selected><?=$hari_praktikum?></option>
              <?php
                $hari=array("Senin","Selasa","Rabu","Kamis","Jumat","Sabtu");
                $jlh_hari=count($hari);
                for($c=0; $c<$jlh_hari; $c+=1){
              ?>
                <?php if($hari[$c] != $hari_praktikum){ ?>
                  <option value="<?php echo $hari[$c];?>"><?php echo"$hari[$c]";?></option>
                <?php } ?>
              <?php } ?>
            </select>
          </div>
          <div class="col-md-3 col-sm-6 col-xs-12">  
            <input id="inputMulai" class="form-control col-md-7 col-xs-12 inputMulai" name="inputMulai" title="input Mulai Praktikum" placeholder="Mulai" required="required" type="text" value="<?= $mulai_praktikum;?>" onfocus="(this.value=='<?= $mulai_praktikum;?>') && (this.value='')" onblur="(this.value=='') && (this.value='<?= $mulai_praktikum;?>')" autocomplete="off">
          </div>
          <div class="col-md-3 col-sm-6 col-xs-12">  
            <input id="inputSelesai" class="form-control col-md-7 col-xs-12 inputSelesai" name="inputSelesai" title="input Selesai Praktikum" placeholder="Selesai" required="required" type="text" value="<?= $selesai_praktikum;?>" onfocus="(this.value=='<?= $selesai_praktikum;?>') && (this.value='')" onblur="(this.value=='') && (this.value='<?= $selesai_praktikum;?>')" autocomplete="off">
          </div>
        </div>
        <div class="item form-group">
          <label class="control-label col-md-3 col-sm-3 col-xs-12">Status</label>
          <div class="col-md-0 col-sm-0 col-xs-6">
            <div class="radio">
              <label><input type="radio" name="kondisi" class="flat" value="1" <?php if($status == 1){echo "checked";}else{echo "unchecked";} ?>> Aktif</label>
              <label><input type="radio" name="kondisi" class="flat" value="0" <?php if($status == 0){echo "checked";}else{echo "unchecked";} ?>> Tidak Aktif</label>
            </div>
          </div>
        </div>
        <b>* Required (Harus di isi kecuali kata sandi, kosongkan jika tidak ingin diubah)</b>
      </div>
      <div class="modal-footer">
        <button class="btn" data-dismiss="modal" aria-hidden="true">Tutup</button>
        <button class="btn btn-primary">Ubah</button>
      </div>
    </form>
  </div> 
</div>    
<script type="text/javascript">
  function munculMatkuledit(selTag) {
    var x = selTag.options[selTag.selectedIndex].text;
    if(x != "=== Mata Kuliah ==="){
      document.getElementById("kodematkul1").value = x;
      document.getElementById("matkulcode1").innerHTML = x + " -";
    }else{
      document.getElementById("matkulcode1").innerHTML = "Mata Kuliah";
    }
    console.log(x);
  }
</script>