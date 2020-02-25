<script src="<?= base_url('assets/')?>myscript.js"></script>
<style type="text/css">
  .field-icon {
    float: right;
    margin-right: 10px;
    margin-top: -23px;
    position: relative;
    z-index: 20;
  }
</style>
<div class="modal-dialog">
  <div class="modal-content">    
    <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">x</button>
        <h4 class="modal-title" id="myModalLabel">UBAH DATA ADMINISTRATOR</h4>
    </div>
    <form action="<?= base_url('update_administrator');?>" method="post" name="form" enctype="multipart/form-data" class="form-horizontal form-label-left">
      <div class="modal-body">
        <?php 
          foreach ($data_admin as $hasil): 
            $id_admin = $hasil->id_admin;
            $nama = $hasil->nama;
            $tempat = $hasil->tempat;
            $tgl_lahir = date("d-m-Y",strtotime($hasil->tgl_lahir));
            $jk = $hasil->jk;
            $agama = $hasil->agama;
            $email = $hasil->email;
            $telp = $hasil->telp;
            $alamat = $hasil->alamat;
            $gambar = $hasil->gambar;
            $username = $hasil->username;
            $password = $hasil->password;
            $level = $hasil->level;
            $status = $hasil->status;
          endforeach; 
        ?>
        <input type="hidden" id="admin_id" name="admin_id" value="<?= $id_admin;?>">
        <div class="item form-group">
          <label class="control-label col-md-3 col-sm-3 col-xs-12" for="inputNama">Nama <span class="required">*</span></label>
          <div class="col-md-9 col-sm-6 col-xs-12">  
            <input id="inputNama" class="form-control col-md-7 col-xs-12" name="inputNama" placeholder="input Nama Lengkap" required="required" type="text" value="<?= $nama;?>" onfocus="(this.value=='<?= $nama;?>') && (this.value='')" onblur="(this.value=='') && (this.value='<?= $nama;?>')" autocomplete="off">
          </div>
        </div>
        <div class="item form-group">
          <label class="control-label col-md-3 col-sm-3 col-xs-12" for="inputEmail">Email <span class="required">*</span></label>
          <div class="col-md-9 col-sm-6 col-xs-12">
            <input id="inputEmail" class="form-control col-md-7 col-xs-12" name="inputEmail" placeholder="input Email" required="required" type="email" value="<?= $email;?>" onfocus="(this.value=='<? $email;?>') && (this.value='')" onblur="(this.value=='') && (this.value='<?= $email;?>')" autocomplete="off">
          </div>
        </div>
        <div class="item form-group">
          <label class="control-label col-md-3 col-sm-3 col-xs-12" for="inputUsername">Username <span class="required">*</span></label>
          <div class="col-md-9 col-sm-6 col-xs-12">
            <input id="inputUsername" class="form-control col-md-7 col-xs-12" name="inputUsername" placeholder="input Username" required="required" type="text" value="<?= $username;?>" onfocus="(this.value=='<?= $username;?>') && (this.value='')" onblur="(this.value=='') && (this.value='<?= $username;?>')" autocomplete="off">
          </div>
        </div>
        <div class="item form-group">
          <label class="control-label col-md-3 col-sm-3 col-xs-12" for="inputPassword">Kata Sandi <span class="required">*</span></label>
          <div class="col-md-6 col-sm-3 col-xs-12">
            <input id="inputPassword" class="form-control col-md-7 col-xs-12" name="inputPassword" placeholder="input Kata Sandi" type="password" onkeyup="passwordStrength(this.value)" autocomplete="off">
            <!-- <input id="inputPassword" class="form-control col-md-7 col-xs-12" name="inputPassword" placeholder="input Kata Sandi" type="hidden" value="<?= $password;?>" > -->
            <!-- <a href="#" onclick="passToggle()" id="show1">Lihat Password</a> -->
            <span toggle="#inputPassword" class="fa fa-fw fa-eye field-icon toggle-password-admin"></span>
          </div>
          <div class="col-md-3 col-sm-6 col-xs-12">
            <div style="margin-top: 10px; font-weight: bold;" id="status1"></div>
          </div>
        </div>
        <div class="item form-group">
          <label class="control-label col-md-3 col-sm-3 col-xs-12" for="inputTempat">Tempat, Tgl Lahir</label>
          <div class="col-md-5 col-sm-3 col-xs-12">
            <input id="inputTempat" class="form-control col-md-7 col-xs-12" name="inputTempat" placeholder="input Tempat" type="text" value="<?= $tempat;?>" onfocus="(this.value=='<?= $tempat;?>') && (this.value='')" onblur="(this.value=='') && (this.value='<?= $tempat;?>')" autocomplete="off">
          </div>
          <div class="col-md-4 col-sm-3 col-xs-12">
          <?php if($hasil->tgl_lahir == "0000-00-00"){ ?>
              <input id="inputTgl" class="form-control col-md-7 col-xs-12 inputTgl" name="inputTgl" placeholder="input Tanggal Lahir" type="text" autocomplete="off">
          <?php }else{ ?>
              <input id="inputTgl" class="form-control col-md-7 col-xs-12 inputTgl" name="inputTgl" placeholder="input Tanggal Lahir" type="text" value="<?= $tgl_lahir;?>" onfocus="(this.value=='<?= $tgl_lahir;?>') && (this.value='')" onblur="(this.value=='') && (this.value='<?= $tgl_lahir;?>')" autocomplete="off">
          <?php } ?>
          </div>
        </div>
        <div class="item form-group">
          <label class="control-label col-md-3 col-sm-3 col-xs-12">Jenis Kelamin</label>
          <div class="col-md-0 col-sm-0 col-xs-6">
            <div class="radio">
              <label><input type="radio" name="jk" class="flat" value="1" <?php if($jk == 1){echo "checked";}else{echo "unchecked";} ?>> Laki-Laki</label>
              <label><input type="radio" name="jk" class="flat" value="0" <?php if($jk == 0){echo "checked";}else{echo "unchecked";} ?>> Perempuan</label>
            </div>
          </div>
        </div>
        <div class="item form-group">
          <label class="control-label col-md-3 col-sm-3 col-xs-12" for="agama">Agama</label>
          <div class="col-md-9 col-sm-6 col-xs-12">
            <select name="agama" id="agama" class="form-control col-md-7 col-xs-12">
              <option value="pilih" disabled>=== Agama ===</option>
              <option value="<?= $agama?>" selected><?= $agama?></option>
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
            <input id="inputTelepon" class="form-control col-md-7 col-xs-12" name="inputTelepon" placeholder="input Telepon" type="text" required="required" maxLength="15" onkeyup="validAngkatelp(this)" value="<?= $telp;?>" onfocus="(this.value=='<?= $telp;?>') && (this.value='')" onblur="(this.value=='') && (this.value='<?= $telp;?>')" autocomplete="off">
          </div>
        </div>
        <div class="item form-group">
          <label class="control-label col-md-3 col-sm-3 col-xs-12" for="inputAlamat">Alamat</span></label>
          <div class="col-md-9 col-sm-6 col-xs-12">
            <textarea id="inputAlamat" name="inputAlamat" class="form-control col-md-7 col-xs-12" placeholder="input alamat" onfocus="(this.value=='<?= $alamat;?>') && (this.value='')" onblur="(this.value=='') && (this.value='<?= $alamat;?>')"><?= $alamat;?></textarea>
          </div>
        </div>
        <div class="item form-group">
          <label class="control-label col-md-3 col-sm-3 col-xs-12" for="foto">Foto</label>
          <div class="col-md-9 col-sm-6 col-xs-12">
            <input type="file" id="myfoto" name="foto" placeholder="input Foto" class="form-control col-md-7 col-xs-12">
            <input type="checkbox" id="lihat" name="lihat" value="1" onclick="tampil(this.checked);"> <span id="text"> Sembunyi</span>
            <br>
            <?php if(empty($gambar)){echo"<b>tidak ada foto</b>";}else{ ?>
              <img src="<?= base_url('assets/images/gambar_user/').$gambar;?>" width="5%" title="<?= $nama?>">
            <?php } ?>
          </div>
        </div>
        <div class="item form-group">
          <label class="control-label col-md-3 col-sm-3 col-xs-12">Level</label>
          <div class="col-md-0 col-sm-0 col-xs-6">
            <div class="radio">
              <label><input type="radio" name="level" class="flat" value="1" <?php if($level == 1){echo "checked";}else{echo "unchecked";} ?>> Administrator</label>
              <label><input type="radio" name="level" class="flat" value="2" <?php if($level == 2){echo "checked";}else{echo "unchecked";} ?>> Operator</label>
            </div>
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