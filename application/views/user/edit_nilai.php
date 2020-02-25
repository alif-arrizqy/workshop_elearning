<script src="<?= base_url('assets/')?>myscript.js"></script>
<div class="modal-dialog">
  <div class="modal-content">    
    <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">x</button>
        <h4 class="modal-title" id="myModalLabel">UBAH DATA NILAI</h4>
    </div>
    <form action="<?= base_url('update_penilaian_user');?>" method="post" name="form" enctype="multipart/form-data" class="form-horizontal form-label-left">
      <div class="modal-body">
        <?php 
          foreach ($data_nilai as $hasil): 
            $id_nilai = $hasil->id_nilai;
            $id_user = $hasil->id_user;
            $id_kelas_matkul = $hasil->id_kelas_matkul;
            $kode = $hasil->kode;
            $npm = $hasil->npm;
            $tugas1 = $hasil->tugas1;
            $tugas2 = $hasil->tugas2;
            $tugas3 = $hasil->tugas3;
            $tugas4 = $hasil->tugas4;
            $tugas5 = $hasil->tugas5;
            $kuis = $hasil->kuis;
            $uap = $hasil->uap;
            $tugasakhir = $hasil->tugasakhir;
          endforeach; 
        ?>
        <input type="hidden" id="nilai_id" name="nilai_id" value="<?= $id_nilai;?>">
        <input type="hidden" id="user_id" name="user_id" value="<?= $id_user;?>">
        <input type="hidden" id="kelas_matkul_id" name="kelas_matkul_id" value="<?= $id_kelas_matkul;?>">
        <input type="hidden" id="kode" name="kode" value="<?= $kode;?>">
        <div class="item form-group">
          <label class="control-label col-md-3 col-sm-3 col-xs-12" for="inputNpm">Nomor Induk</label>
          <div class="col-md-9 col-sm-6 col-xs-12">  
            <input type="text" name="inputNpm" id="inputNpm" value="<?=$npm?>" class="form-control col-md-7 col-xs-12" readonly >
          </div>
        </div>
        <div class="item form-group">
          <label class="control-label col-md-3 col-sm-3 col-xs-12" for="inputTugas1">Tugas 1</label>
          <div class="col-md-9 col-sm-6 col-xs-12">  
            <input id="inputTugas1" class="form-control col-md-7 col-xs-12" name="inputTugas1" placeholder="input Tugas 1" type="text maxLength="3" onkeyup="validAngkatelp(this)" value="<?= $tugas1;?>" onfocus="(this.value=='<?= $tugas1;?>') && (this.value='')" onblur="(this.value=='') && (this.value='<?= $tugas1;?>')" autocomplete="off">
          </div>
        </div>
        <div class="item form-group">
          <label class="control-label col-md-3 col-sm-3 col-xs-12" for="inputTugas2">Tugas 2</label>
          <div class="col-md-9 col-sm-6 col-xs-12">  
            <input id="inputTugas2" class="form-control col-md-7 col-xs-12" name="inputTugas2" placeholder="input Tugas 2" type="text" maxLength="3" onkeyup="validAngkatelp(this)" value="<?= $tugas2;?>" onfocus="(this.value=='<?= $tugas2;?>') && (this.value='')" onblur="(this.value=='') && (this.value='<?= $tugas2;?>')" autocomplete="off">
          </div>
        </div>
        <div class="item form-group">
          <label class="control-label col-md-3 col-sm-3 col-xs-12" for="inputTugas3">Tugas 3</label>
          <div class="col-md-9 col-sm-6 col-xs-12">  
            <input id="inputTugas3" class="form-control col-md-7 col-xs-12" name="inputTugas3" placeholder="input Tugas 3" type="text" maxLength="3" onkeyup="validAngkatelp(this)" value="<?= $tugas3;?>" onfocus="(this.value=='<?= $tugas3;?>') && (this.value='')" onblur="(this.value=='') && (this.value='<?= $tugas3;?>')" autocomplete="off">
          </div>
        </div>
        <div class="item form-group">
          <label class="control-label col-md-3 col-sm-3 col-xs-12" for="inputTugas4">Tugas 4</label>
          <div class="col-md-9 col-sm-6 col-xs-12">  
            <input id="inputTugas4" class="form-control col-md-7 col-xs-12" name="inputTugas4" placeholder="input Tugas 4" type="text" maxLength="3" onkeyup="validAngkatelp(this)" value="<?= $tugas4;?>" onfocus="(this.value=='<?= $tugas4;?>') && (this.value='')" onblur="(this.value=='') && (this.value='<?= $tugas4;?>')" autocomplete="off">
          </div>
        </div>
        <div class="item form-group">
          <label class="control-label col-md-3 col-sm-3 col-xs-12" for="inputTugas2">Tugas 5</label>
          <div class="col-md-9 col-sm-6 col-xs-12">  
            <input id="inputTugas5" class="form-control col-md-7 col-xs-12" name="inputTugas5" placeholder="input Tugas 5" type="text" maxLength="3" onkeyup="validAngkatelp(this)" value="<?= $tugas5;?>" onfocus="(this.value=='<?= $tugas5;?>') && (this.value='')" onblur="(this.value=='') && (this.value='<?= $tugas5;?>')" autocomplete="off">
          </div>
        </div>
        <div class="item form-group">
          <label class="control-label col-md-3 col-sm-3 col-xs-12" for="inputKuis">Kuis</label>
          <div class="col-md-9 col-sm-6 col-xs-12">  
            <input id="inputKuis" class="form-control col-md-7 col-xs-12" name="inputKuis" placeholder="input Kuis" type="text" maxLength="3" onkeyup="validAngkatelp(this)" value="<?= $kuis;?>" onfocus="(this.value=='<?= $kuis;?>') && (this.value='')" onblur="(this.value=='') && (this.value='<?= $kuis;?>')" autocomplete="off">
          </div>
        </div>
        <div class="item form-group">
          <label class="control-label col-md-3 col-sm-3 col-xs-12" for="inputUAP">UAP</label>
          <div class="col-md-9 col-sm-6 col-xs-12">  
            <input id="inputUAP" class="form-control col-md-7 col-xs-12" name="inputUAP" placeholder="input UAP" type="text" maxLength="3" onkeyup="validAngkatelp(this)" value="<?= $uap;?>" onfocus="(this.value=='<?= $uap;?>') && (this.value='')" onblur="(this.value=='') && (this.value='<?= $uap;?>')" autocomplete="off">
          </div>
        </div>
        <div class="item form-group">
          <label class="control-label col-md-3 col-sm-3 col-xs-12" for="inputTugasAkhir">Tugas Akhir</label>
          <div class="col-md-9 col-sm-6 col-xs-12">  
            <input id="inputTugasAkhir" class="form-control col-md-7 col-xs-12" name="inputTugasAkhir" placeholder="input TugasAkhir" type="text" maxLength="3" onkeyup="validAngkatelp(this)" value="<?= $tugasakhir;?>" onfocus="(this.value=='<?= $tugasakhir;?>') && (this.value='')" onblur="(this.value=='') && (this.value='<?= $tugasakhir;?>')" autocomplete="off">
          </div>
        </div>
      </div>  
      <div class="modal-footer">
        <button class="btn" data-dismiss="modal" aria-hidden="true">Tutup</button>
        <button class="btn btn-primary">Ubah</button>
      </div>
    </form>
  </div>
</div>