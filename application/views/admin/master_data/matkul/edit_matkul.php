<script src="<?= base_url('assets/')?>myscript.js"></script>
<div class="modal-dialog">
  <div class="modal-content">       
    <div class="modal-header">
      <button type="button" class="close" data-dismiss="modal" aria-hidden="true">x</button>
      <h4 class="modal-title" id="myModalLabel">UBAH DATA MATA KULIAH</h4>
    </div>
    <form action="<?= base_url('update_matkul');?>" method="post" name="form" enctype="multipart/form-data" class="form-horizontal form-label-left">
      <div class="modal-body">
        <?php 
          foreach ($data_matkul as $hasil): 
            $id_matkul = $hasil->id_matkul;
            $semester = $hasil->semester;
            $matkul = $hasil->matkul;
            $file = $hasil->file;
            $extensi = pathinfo($file, PATHINFO_EXTENSION);
            $status = $hasil->status;
          endforeach; 
        ?>
        <input type="hidden" id="matkul_id" name="matkul_id" value="<?= $id_matkul;?>">
        <div class="item form-group">
          <label class="control-label col-md-3 col-sm-3 col-xs-12" for="inputMatkul">Mata Kuliah <span class="required">*</span></label>
          <div class="col-md-9 col-sm-6 col-xs-12">  
            <input id="inputMatkul" class="form-control col-md-7 col-xs-12" name="inputMatkul" placeholder="input Mata Kuliah" required="required" type="text" value="<?= $matkul;?>" onfocus="(this.value=='<?= $matkul;?>') && (this.value='')" onblur="(this.value=='') && (this.value='<?= $matkul;?>')" autocomplete="off">
          </div>
        </div>
        <div class="item form-group">
          <label class="control-label col-md-3 col-sm-3 col-xs-12">Semester</label>
          <div class="col-md-0 col-sm-0 col-xs-6">
            <div class="radio">
              <label><input type="radio" name="semester" class="flat" value="1" <?php if($semester == 1){echo "checked";}else{echo "unchecked";} ?>> Ganjil</label>
              <label><input type="radio" name="semester" class="flat" value="0" <?php if($semester == 0){echo "checked";}else{echo "unchecked";} ?>> Genap</label>
            </div>
          </div>
        </div>
        <div class="item form-group">
          <label class="control-label col-md-3 col-sm-3 col-xs-12" for="modulfile">File Modul</label>
          <div class="col-md-9 col-sm-6 col-xs-12">
            <input id="myfoto" name="modulfile" placeholder="input Modul" class="form-control col-md-7 col-xs-12" type="file">
            <input type="checkbox" id="lihat" name="lihat" value="1" onclick="tampil(this.checked);"> <span id="text"> Sembunyi</span>
            <br>
            <?php if(empty($file)){echo"file modul tidak ada";}else{ ?>
              <?php if($extensi == 'pdf'){ ?>
                <img src="<?= base_url('assets/images/pdf.png');?>" width="8%" title="<?= $file;?>">
              <?php }else if($extensi == 'doc' || $extensi == 'docx'){ ?>
                <img src="<?= base_url('assets/images/doc.png');?>" width="8%" title="<?= $file;?>">
              <?php } ?><?= $file;?>
            <?php } ?>
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