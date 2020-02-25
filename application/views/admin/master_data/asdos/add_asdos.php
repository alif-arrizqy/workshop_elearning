<script src="<?= base_url('assets/')?>myscript.js"></script>
<div class="modal-dialog">
  <div class="modal-content">
    <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">x</button>
        <h4 class="modal-title" id="myModalLabel">TAMBAH DATA ASISTEN DOSEN</h4>
    </div>
    <form action="<?= base_url('save_asdos');?>" method="post" name="form" enctype="multipart/form-data" class="form-horizontal form-label-left">
      <div class="modal-body">
        <div class="item form-group">
          <label class="control-label col-md-3 col-sm-3 col-xs-12" for="akses">Akses <span class="required">*</span></label>
          <div class="col-md-9 col-sm-6 col-xs-12">  
            <select name="akses" id="akses" class="form-control col-md-7 col-xs-12" onchange="myFunction()">
              <option value="0" disabled selected>--- Akses ---</option>
              <option value="2">Asisten Dosen</option>
              <option value="4">Alumni/Umum</option>
            </select>
          </div>
        </div>
        <div id="asdos" style="display: none;">
          <div class="item form-group">
            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="inputTahun">Tahun Masuk <span class="required">*</span></label>
            <div class="col-md-9 col-sm-6 col-xs-12">  
              <select name="inputTahun" id="inputTahun" class="form-control col-md-7 col-xs-12">
                <option disabled selected>-- Pilih Tahun Masuk --</option>
                <?php
                    $now=date('Y');
                    $awal = $now - 4;
                    $batas = $now + 1;
                    for ($a=$awal;$a<=$batas;$a++)
                    {
                        echo "<option value='".$a."'>".$a."</option>";
                    }
                ?>
              </select>
            </div>
          </div>
          <div class="item form-group">
            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="inputNpm">NPM <span class="required">*</span></label>
            <div class="col-md-9 col-sm-6 col-xs-12">
              <input id="inputNpm" class="form-control col-md-7 col-xs-12" name="inputNpm" placeholder="input Nomor Induk Mahasiswa (3 digit dibelakang)" type="text maxLength="3" onkeyup="validAngkatelp(this)" autocomplete="off">
            </div>
          </div>
        </div>
        <div class="item form-group" id="alumni" style="display: none;">
          <label class="control-label col-md-3 col-sm-3 col-xs-12" for="inputNomorinduk">Nomor Induk <span class="required">*</span></label>
          <div class="col-md-9 col-sm-6 col-xs-12">
            <input id="inputNomorinduk" class="form-control col-md-7 col-xs-12" name="inputNomorinduk" placeholder="input Nomor Induk" type="text" maxLength="20" onkeyup="validAngkatelp(this)" autocomplete="off">
          </div>
        </div>
        <div class="item form-group">
          <label class="control-label col-md-3 col-sm-3 col-xs-12" for="inputNama">Nama <span class="required">*</span></label>
          <div class="col-md-9 col-sm-6 col-xs-12">  
            <input id="inputNama" class="form-control col-md-7 col-xs-12" name="inputNama" placeholder="input Nama Lengkap" required="required" type="text" autocomplete="off">
          </div>
        </div>
        <div class="item form-group">
          <label class="control-label col-md-3 col-sm-3 col-xs-12" for="inputEmail">Email <span class="required">*</span></label>
          <div class="col-md-9 col-sm-6 col-xs-12">
            <input id="inputEmail" class="form-control col-md-7 col-xs-12" name="inputEmail" placeholder="input Email" required="required" type="email" autocomplete="off">
          </div>
        </div>
        <div class="item form-group">
          <label class="control-label col-md-3 col-sm-3 col-xs-12" for="inputUsername">Username <span class="required">*</span></label>
          <div class="col-md-9 col-sm-6 col-xs-12">
            <input id="inputUsername" class="form-control col-md-7 col-xs-12" name="inputUsername" placeholder="input Username" required="required" type="text" autocomplete="off">
          </div>
        </div>
        <div class="item form-group">
          <label class="control-label col-md-3 col-sm-3 col-xs-12" for="inputPassword">Kata Sandi <span class="required">*</span></label>
          <div class="col-md-6 col-sm-3 col-xs-12">
            <input id="inputPassword" class="form-control col-md-7 col-xs-12" name="inputPassword" placeholder="input Kata Sandi" required="required" type="password" onkeyup="passwordStrength(this.value)" autocomplete="off">
            <a href="#" onclick="passToggle()" id="show">Lihat Password</a>
          </div>
          <div class="col-md-3 col-sm-6 col-xs-12">
            <div style="margin-top: 10px; font-weight: bold;" id="status"></div>
          </div>
        </div>
        <div class="item form-group">
          <label class="control-label col-md-3 col-sm-3 col-xs-12" for="inputTempat">Tempat, Tgl Lahir</label>
          <div class="col-md-5 col-sm-3 col-xs-12">
            <input id="inputTempat" class="form-control col-md-7 col-xs-12" name="inputTempat" placeholder="input Tempat" type="text" autocomplete="off">
          </div>
          <div class="col-md-4 col-sm-3 col-xs-12">
            <input id="inputTgl" class="form-control col-md-7 col-xs-12 inputTgl" name="inputTgl" placeholder="input Tanggal Lahir" type="text" autocomplete="off">
          </div>
        </div>
        <div class="item form-group">
          <label class="control-label col-md-3 col-sm-3 col-xs-12">Jenis Kelamin</label>
          <div class="col-md-0 col-sm-0 col-xs-6">
            <div class="radio">
              <label><input type="radio" name="jk" class="flat" value="1" checked> Laki-Laki</label>
              <label><input type="radio" name="jk" class="flat" value="0"> Perempuan</label>
            </div>
          </div>
        </div>
        <div class="item form-group">
          <label class="control-label col-md-3 col-sm-3 col-xs-12" for="agama">Agama</label>
          <div class="col-md-9 col-sm-6 col-xs-12">
            <select name="agama" id="agama" class="form-control col-md-7 col-xs-12">
              <option value="pilih" disabled selected>=== Agama ===</option>
              <option value="Islam">Islam</option>
              <option value="Kristen Katholik">Kristen Katholik</option>
              <option value="Kristen Protestan">Kristen Protestan</option>
              <option value="Hindu">Hindu</option>
              <option value="Budha">Budha</option>
              <option value="Konghucu">Konghucu</option>
            </select>
          </div>
        </div>
        <div class="item form-group">
          <label class="control-label col-md-3 col-sm-3 col-xs-12" for="inputTelepon">Telepon <span class="required">*</span></label>
          <div class="col-md-9 col-sm-6 col-xs-12">
            <input id="inputTelepon" class="form-control col-md-7 col-xs-12" name="inputTelepon" placeholder="input Telepon" type="text" required="required" maxLength="15" onkeyup="validAngkatelp(this)" autocomplete="off">
          </div>
        </div>
        <div class="item form-group">
          <label class="control-label col-md-3 col-sm-3 col-xs-12" for="inputAlamat">Alamat</span></label>
          <div class="col-md-9 col-sm-6 col-xs-12">
            <textarea id="inputAlamat" name="inputAlamat" class="form-control col-md-7 col-xs-12" placeholder="input alamat"></textarea>
          </div>
        </div>
        <div class="item form-group">
          <label class="control-label col-md-3 col-sm-3 col-xs-12" for="file">Foto</label>
          <div class="col-md-9 col-sm-6 col-xs-12">
            <input id="foto" name="foto" placeholder="input Foto" class="form-control col-md-7 col-xs-12" type="file">
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