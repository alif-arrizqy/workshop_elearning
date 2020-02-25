<script src="<?= base_url('assets/')?>myscript.js"></script>
<div class="modal-dialog">
  <div class="modal-content">    
    <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">x</button>
        <h4 class="modal-title" id="myModalLabel">UBAH DATA PERSENTASE NILAI</h4>
    </div>
    <form action="<?= base_url('update_persentase_nilai');?>" method="post" name="form" enctype="multipart/form-data" class="form-horizontal form-label-left">
      <div class="modal-body">
        <?php 
          foreach ($data_persentase_nilai as $hasil): 
            $id_persentase = $hasil->id_persentase;
            $id_matkul = $hasil->id_matkul;
            $matkul = $hasil->matkul;
            $absen = $hasil->absen*100;
            $kuis = $hasil->kuis*100;
            $tugas = $hasil->tugas*100;
            $uap = $hasil->uap*100;
            $tugasakhir = $hasil->tugasakhir*100;
          endforeach; 
        ?>
        <input type="hidden" id="persentase_id" name="persentase_id" value="<?= $id_persentase;?>">
        <input type="hidden" id="matkul_id" name="matkul_id" value="<?= $id_matkul;?>">
        <div class="item form-group">
          <label class="control-label col-md-4 col-sm-3 col-xs-12" for="inputMatkul">Mata Kuliah <span class="required">*</span></label>
          <div class="col-md-8 col-sm-6 col-xs-12">  
            <input id="inputMatkul" class="form-control col-md-7 col-xs-12" name="inputMatkul" placeholder="input Mata Kuliah" required="required" type="text" value="<?= $matkul;?>" onfocus="(this.value=='<?= $matkul;?>') && (this.value='')" onblur="(this.value=='') && (this.value='<?= $matkul;?>')" autocomplete="off">
          </div>
        </div>
        <div class="item form-group">
          <label class="control-label col-md-4 col-sm-3 col-xs-12" for="inputAbsen">Persentase Absen <span class="required">*</span></label>
          <div class="col-md-8 col-sm-6 col-xs-12">  
            <input id="inputAbsen" class="form-control col-md-7 col-xs-12" name="inputAbsen" placeholder="input Persentase Absen" required="required" type="text" value="<?= $absen;?>" maxLength="3" onkeyup="validAngkatelp(this)" autocomplete="off">
          </div>
        </div>
        <div class="item form-group">
          <label class="control-label col-md-4 col-sm-3 col-xs-12" for="inputKuis">Persentase Kuis <span class="required">*</span></label>
          <div class="col-md-8 col-sm-6 col-xs-12">  
            <input id="inputKuis" class="form-control col-md-7 col-xs-12" name="inputKuis" placeholder="input Persentase Kuis" required="required" type="text" value="<?= $kuis;?>" maxLength="3" onkeyup="validAngkatelp(this)" autocomplete="off">
          </div>
        </div>
        <div class="item form-group">
          <label class="control-label col-md-4 col-sm-3 col-xs-12" for="inputTugas">Persentase Tugas <span class="required">*</span></label>
          <div class="col-md-8 col-sm-6 col-xs-12">  
            <input id="inputTugas" class="form-control col-md-7 col-xs-12" name="inputTugas" placeholder="input Persentase Tugas" required="required" type="text" value="<?= $tugas;?>" maxLength="3" onkeyup="validAngkatelp(this)" autocomplete="off">
          </div>
        </div>
        <div class="item form-group">
          <label class="control-label col-md-4 col-sm-3 col-xs-12" for="inputUAP">Persentase UAP <span class="required">*</span></label>
          <div class="col-md-8 col-sm-6 col-xs-12">  
            <input id="inputUAP" class="form-control col-md-7 col-xs-12" name="inputUAP" placeholder="input Persentase UAP" required="required" type="text" value="<?= $uap;?>" maxLength="3" onkeyup="validAngkatelp(this)" autocomplete="off">
          </div>
        </div>
        <div class="item form-group">
          <label class="control-label col-md-4 col-sm-3 col-xs-12" for="inputTugasakhir">Persentase Tugasakhir <span class="required">*</span></label>
          <div class="col-md-8 col-sm-6 col-xs-12">  
            <input id="inputTugasakhir" class="form-control col-md-7 col-xs-12" name="inputTugasakhir" placeholder="input Persentase Tugasakhir" required="required" type="text" value="<?= $tugasakhir;?>" maxLength="3" onkeyup="validAngkatelp(this)" autocomplete="off">
          </div>
        </div>
        <b>* Required (Harus di isi)</b>
      </div>
      <div class="modal-footer">
        <button class="btn" data-dismiss="modal" aria-hidden="true">Tutup</button>
        <button class="btn btn-primary">Ubah</button>
      </div>
    </form>
  </div>
</div>