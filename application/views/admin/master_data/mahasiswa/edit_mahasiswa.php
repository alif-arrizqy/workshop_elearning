<script src="<?= base_url('assets/')?>myscript.js"></script>
<div class="modal-dialog">
  <div class="modal-content">    
    <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">x</button>
        <h4 class="modal-title" id="myModalLabel">UBAH DATA MAHASISWA</h4>
    </div>
    <form action="<?= base_url('update_mahasiswa');?>" method="post" name="form" enctype="multipart/form-data" class="form-horizontal form-label-left">
      <div class="modal-body">
        <?php 
          foreach ($data_mahasiswa as $hasil): 
            $id_user = $hasil->id_user;
            $tahun = $hasil->tahun;
            $npm = substr($hasil->npm,6,9);
            $nama = $hasil->nama;
            $username = $hasil->username;
            $password = $hasil->password;
            $gambar = $hasil->gambar;
            $tempat = $hasil->tempat;
            $tgl_lahir = date("d M Y",strtotime($hasil->tgl_lahir));
            $jk = $hasil->jk;
            $agama = $hasil->agama;
            $nama_ayah = $hasil->nama_ayah;
            $nama_ibu = $hasil->nama_ibu;
            $email = $hasil->email;
            $telp = $hasil->telp;
            $alamat = $hasil->alamat;
            $status = $hasil->status;
            $akses = $hasil->akses;
            $jenis = $hasil->jenis;
          endforeach; 
        ?>
        <input type="hidden" id="user_id" name="user_id" value="<?= $id_user;?>">
        <div class="item form-group">
          <label class="control-label col-md-3 col-sm-3 col-xs-12" for="inputTahun">Tahun Masuk <span class="required">*</span></label>
          <div class="col-md-9 col-sm-6 col-xs-12">  
            <select name="inputTahun" id="inputTahun" class="form-control col-md-7 col-xs-12">
              <option disabled>-- Pilih Tahun Masuk --</option>
              <option value="<?= $tahun?>" selected><?= $tahun?></option>
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
            <input id="inputNpm" class="form-control col-md-7 col-xs-12" name="inputNpm" placeholder="input Nomor Induk Mahasiswa (3 digit dibelakang)" type="text" required="required" maxLength="3" onkeyup="validAngkatelp(this)" value="<?= $npm;?>" onfocus="(this.value=='<?= $npm;?>') && (this.value='')" onblur="(this.value=='') && (this.value='<?= $npm;?>')" autocomplete="off">
          </div>
        </div>
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
            <input id="inputPassword1" class="form-control col-md-7 col-xs-12" name="inputPassword1" placeholder="input Kata Sandi" type="password" onkeyup="passwordStrength(this.value)" autocomplete="off">
            <input id="inputPassword" class="form-control col-md-7 col-xs-12" name="inputPassword" placeholder="input Kata Sandi" type="hidden" value="<?= $password;?>" >
            <a href="#" onclick="passToggle()" id="show1">Lihat Password</a>
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
          <label class="control-label col-md-3 col-sm-3 col-xs-12" for="inputNamaayah">Nama Ayah</label>
          <div class="col-md-9 col-sm-6 col-xs-12">  
            <input id="inputNamaayah" class="form-control col-md-7 col-xs-12" name="inputNamaayah" placeholder="input Nama Ayah" type="text" value="<?= $nama_ayah;?>" onfocus="(this.value=='<?= $nama_ayah;?>') && (this.value='')" onblur="(this.value=='') && (this.value='<?= $nama_ayah;?>')" autocomplete="off">
          </div>
        </div>
        <div class="item form-group">
          <label class="control-label col-md-3 col-sm-3 col-xs-12" for="inputNamaibu">Nama Ibu</label>
          <div class="col-md-9 col-sm-6 col-xs-12">  
            <input id="inputNamaibu" class="form-control col-md-7 col-xs-12" name="inputNamaibu" placeholder="input Nama Ibu" type="text" value="<?= $nama_ibu;?>" onfocus="(this.value=='<?= $nama_ibu;?>') && (this.value='')" onblur="(this.value=='') && (this.value='<?= $nama_ibu;?>')" autocomplete="off">
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
          <label class="control-label col-md-3 col-sm-3 col-xs-12">Akses</label>
          <div class="col-md-0 col-sm-0 col-xs-6">
            <div class="radio">
              <label><input type="radio" name="akses" class="flat" value="1" <?php if($akses == 1){echo "checked";}else{echo "unchecked";} ?>> Mahasiswa</label>
              <label><input type="radio" name="akses" class="flat" value="3" <?php if($akses == 3){echo "checked";}else{echo "unchecked";} ?>> Both</label>
            </div>
          </div>
        </div>
        <div class="item form-group">
          <label class="control-label col-md-3 col-sm-3 col-xs-12">Jenis Kelas</label>
          <div class="col-md-0 col-sm-0 col-xs-6">
            <div class="radio">
              <label><input type="radio" name="jenis" class="flat" value="1" <?php if($jenis == 1){echo "checked";}else{echo "unchecked";} ?>> Reguler</label>
              <label><input type="radio" name="jenis" class="flat" value="2" <?php if($jenis == 2){echo "checked";}else{echo "unchecked";} ?>> Ekstensi</label>
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