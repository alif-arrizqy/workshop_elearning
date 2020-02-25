<script src="<?= base_url('assets/')?>myscript.js"></script>
<div class="item form-group">
  <label class="control-label col-md-3 col-sm-3 col-xs-12" for="inputMatkul">Mata Kuliah <span class="required">*</span></label>
  <div class="col-md-9 col-sm-6 col-xs-12">  
    <input id="inputMatkul" class="form-control col-md-7 col-xs-12" name="inputMatkul" placeholder="input Mata Kuliah" required="required" type="text" autocomplete="off">
  </div>
</div>
<div class="item form-group">
  <label class="control-label col-md-3 col-sm-3 col-xs-12">Semester <span class="required">*</span></label>
  <div class="col-md-0 col-sm-0 col-xs-6">
    <div class="radio">
      <label><input type="radio" name="semester" class="flat" value="1" checked> Ganjil</label>
      <label><input type="radio" name="semester" class="flat" value="0"> Genap</label>
    </div>
  </div>
</div>
<div class="item form-group">
  <label class="control-label col-md-3 col-sm-3 col-xs-12" for="modulfile">File Modul</label>
  <div class="col-md-9 col-sm-6 col-xs-12">
    <input id="modulfile" name="modulfile" placeholder="input Modul" class="form-control col-md-7 col-xs-12" type="file">
  </div>
</div>
<b>* Required (Harus di isi)</b>