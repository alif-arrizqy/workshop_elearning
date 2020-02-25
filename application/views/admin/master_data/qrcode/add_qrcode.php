<script src="<?= base_url('assets/')?>myscript.js"></script>
<div class="modal-dialog">
  <div class="modal-content">
    <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">x</button>
        <h4 class="modal-title" id="myModalLabel">TAMBAH DATA QRCODE ABSEN</h4>
    </div>
    <form action="<?= base_url('save_qrcode');?>" method="post" name="form" enctype="multipart/form-data" class="form-horizontal form-label-left">
      <div class="modal-body">
        <div class="item form-group">
          <label class="control-label col-md-3 col-sm-3 col-xs-12" for="inputMatkul">Mata Kuliah <span class="required">*</span></label>
          <div class="col-md-9 col-sm-6 col-xs-12">
            <select name="inputMatkul" id="inputMatkul" class="form-control col-md-7 col-xs-12" required>
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
        <!-- <div class="item form-group">
          <label class="control-label col-md-3 col-sm-3 col-xs-12" for="inputKelas">Kelas <span class="required">*</span></label>
          <div class="col-md-9 col-sm-6 col-xs-12">
            <select name="inputKelas" id="inputKelas" class="form-control col-md-7 col-xs-12" required>
              <option value="pilih" disabled selected>=== Kelas ===</option>
            </select>

          </div>
        </div> -->
        <div class="item form-group">
          <label class="control-label col-md-3 col-sm-3 col-xs-12">Pertemuan <span class="required">*</span></label>
          <div class="col-md-9 col-sm-6 col-xs-12">  
            <input id="inputPertemuan" class="form-control col-md-7 col-xs-12" name="inputPertemuan" placeholder="input Pertemuan" maxlength="2" required="required" type="text" onkeyup="validAngkatelp(this)" autocomplete="off">
          </div>
        </div>
        <b>* Required (Harus di isi)</b>
      </div>
      <div class="modal-footer">
          <button class="btn" data-dismiss="modal" aria-hidden="true">Tutup</button>
          <button type="submit" class="btn btn-primary" onclick="this.form.submit()">Simpan</button>
      </div>
    </form>
  </div>
</div>