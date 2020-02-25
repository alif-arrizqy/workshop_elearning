<div class="modal-dialog">
  <div class="modal-content">
    <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">x</button>
        <h4 class="modal-title" id="myModalLabel">DETAIL DATA MAHASISWA</h4>
    </div>
    <div class="modal-body">
      <?php 
        foreach ($data_mahasiswa as $hasil): 
          $akses = $hasil->akses;
          $jenis = $hasil->jenis;
          $tahun = $hasil->tahun;
          $npm = $hasil->npm;
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
        endforeach; 
        foreach ($data_kelas_mhs as $hasil_kelas): 
          $sistem_instrumentasi = $hasil_kelas->sistem_instrumentasi;
          $organisasi_komputer = $hasil_kelas->organisasi_komputer;
          $elektronika = $hasil_kelas->elektronika;
          $sistem_digital_1 = $hasil_kelas->sistem_digital_1;
          $jaringan_komputer = $hasil_kelas->jaringan_komputer;
          $sistem_digital_2 = $hasil_kelas->sistem_digital_2;
          $sistem_mikroprosesor = $hasil_kelas->sistem_mikroprosesor;
          $otomasi = $hasil_kelas->otomasi;
          $administrasi_jaringan = $hasil_kelas->administrasi_jaringan;
          $sistem_pemrograman_mikroprosesor = $hasil_kelas->sistem_pemrograman_mikroprosesor;
          $mobile_programing = $hasil_kelas->mobile_programing;
          $keamanan_jaringan = $hasil_kelas->keamanan_jaringan;
          $pemrograman_python = $hasil_kelas->pemrograman_python;
          $sistem_interface_mikrokontroler = $hasil_kelas->sistem_interface_mikrokontroler;
          $robotik = $hasil_kelas->robotik;
        endforeach;
      ?>
      <div align="center">
        <?php if(!empty($gambar)){ ?>
          <img src="<?= base_url('assets/images/gambar_user/').$gambar;?>" width="25%" title="<?= $nama?>">
        <?php }else{ ?>
          <img src="<?= base_url('assets/images/user.png');?>" width="25%" title="Tidak ada Foto">
        <?php } ?>
      </div>
      <table width="100%">
        <tr>
          <td width="30%">Tahun Masuk</td>
          <td>: <?= $tahun?></td>
        </tr>
        <tr>
          <td width="30%">Nomor Induk Mahasiswa</td>
          <td>: <?= $npm?></td>
        </tr>
        <tr>
          <td width="30%">Nama Lengkap</td>
          <td>: <?= $nama?></td>
        </tr>
        <tr>
          <td width="30%">Email</td>
          <td>: <?= $email?></td>
        </tr>
        <tr>
          <td width="30%">Username</td>
          <td>: <?= $username?></td>
        </tr>
        <tr>
          <td width="30%">Kata Sandi</td>
          <td>: <?= $password?></td>
        </tr>
        <tr>
          <td width="30%">Tempat, Tanggal Lahir</td>
          <td>: <?php if(empty($tempat)){echo"-";}else{echo $tempat;} ?>, <?php if($hasil->tgl_lahir == "0000-00-00"){echo"-";}else{echo $tgl_lahir;} ?></td>
        </tr>
        <tr>
          <td width="30%">Jenis Kelamin</td>
          <td>: <?php if($jk == 1){echo "Laki-Laki";}else{echo "Perempuan";} ?></td>
        </tr>
        <tr>
          <td width="30%">Agama</td>
          <td>: <?php if($agama == "pilih" || $agama == "0"){echo "-";}else{echo $agama;} ?></td>
        </tr>
        <tr>
          <td width="30%">Telepon</td>
          <td>: <?= $telp?></td>
        </tr>
        <tr>
          <td width="30%">Nama Ayah</td>
          <td>: <?php if(!empty($nama_ayah)){echo $nama_ayah;}else{echo "-";} ?></td>
        </tr>
        <tr>
          <td width="30%">Nama Ibu</td>
          <td>: <?php if(!empty($nama_ibu)){echo $nama_ibu;}else{echo "-";} ?></td>
        </tr>
        <tr>
          <td width="30%">Alamat</td>
          <td>: <?php if(!empty($alamat)){echo $alamat;}else{echo "-";} ?></td>
        </tr>
        <tr>
          <td width="30%">Jenis Kelas</td>
          <td>: <?php if($jenis == 1){echo "Kelas Reguler";}else{echo "Kelas Ekstensi";} ?></td>
        </tr>
      </table>
      <?php if($akses == 3){ ?>
        <hr>
        <table width="100%">
          <tr>
            <?php if(count($data_kelas_matkul)<0){ ?>
              <td colspan="2"><h2>Tidak ada <b>Kelas</b> yang di ajar</h2></td>
            <?php }else{ ?>
              <td colspan="2"><h2><b>Kelas</b> yang di ajar</h2></td>
            <?php } ?>
          </tr>
          <?php foreach ($data_kelas_matkul as $hasil_matkul): ?>
            <tr>
              <td><?= $hasil_matkul->kelas." (".$hasil_matkul->hari." - ".$hasil_matkul->mulai_praktikum." s/d ".$hasil_matkul->selesai_praktikum.")";?></td>
            </tr>
          <?php endforeach; ?>
        </table>
      <?php } ?>
      <hr>
      <table width="100%">
        <tr>
          <?php 
            if(empty($sistem_instrumentasi) && empty($organisasi_komputer) && empty($elektronika) && empty($sistem_digital_1) && empty($jaringan_komputer) && empty($sistem_digital_2) && empty($sistem_mikroprosesor) && empty($otomasi) && empty($administrasi_jaringan) && empty($sistem_pemrograman_mikroprosesor) && empty($mobile_programing) && empty($keamanan_jaringan) && empty($pemrograman_python) && empty($sistem_interface_mikrokontroler) && empty($robotik)){
          ?>
            <td colspan="2"><h2>Tidak ada <b>Mata Kuliah</b> yang di ambil</h2></td>
          <?php }else{ ?>
            <td colspan="2"><h2><b>Mata Kuliah</b> yang di ambil</h2></td>
          <?php } ?>
        </tr>
        <?php if(!empty($sistem_instrumentasi)){ $matkul = $this->main_model->get_kelas_matkul($sistem_instrumentasi)->result_array(); ?>
          <tr>
            <td>Sistem Instrumentasi</td>
            <td>: <?= $matkul[0]['kelas']?></td>
          </tr>
        <?php } ?>
        <?php if(!empty($organisasi_komputer)){ $matkul = $this->main_model->get_kelas_matkul($organisasi_komputer)->result_array(); ?>
          <tr>
            <td>Organisasi Komputer</td>
            <td>: <?= $matkul[0]['kelas']?></td>
          </tr>
        <?php } ?>
        <?php if(!empty($elektronika)){ $matkul = $this->main_model->get_kelas_matkul($elektronika)->result_array(); ?>
          <tr>
            <td>Elektronika</td>
            <td>: <?= $matkul[0]['kelas']?></td>
          </tr>
        <?php } ?>
        <?php if(!empty($sistem_digital_1)){ $matkul = $this->main_model->get_kelas_matkul($sistem_digital_1)->result_array(); ?>
          <tr>
            <td>Sistem Digital 1</td>
            <td>: <?= $matkul[0]['kelas']?></td>
          </tr>
        <?php } ?>
        <?php if(!empty($jaringan_komputer)){ $matkul = $this->main_model->get_kelas_matkul($jaringan_komputer)->result_array(); ?>
          <tr>
            <td>Jaringan Komputer</td>
            <td>: <?= $matkul[0]['kelas']?></td>
          </tr>
        <?php } ?>
        <?php if(!empty($sistem_digital_2)){ $matkul = $this->main_model->get_kelas_matkul($sistem_digital_2)->result_array(); ?>
          <tr>
            <td>Sistem Digital 2</td>
            <td>: <?= $matkul[0]['kelas']?></td>
          </tr>
        <?php } ?>
        <?php if(!empty($sistem_mikroprosesor)){ $matkul = $this->main_model->get_kelas_matkul($sistem_mikroprosesor)->result_array(); ?>
          <tr>
            <td>Sistem Mikroprosesor</td>
            <td>: <?= $matkul[0]['kelas']?></td>
          </tr>
        <?php } ?>
        <?php if(!empty($otomasi)){ $matkul = $this->main_model->get_kelas_matkul($otomasi)->result_array(); ?>
          <tr>
            <td>Sistem Otomasi dan IOT</td>
            <td>: <?= $matkul[0]['kelas']?></td>
          </tr>
        <?php } ?>
        <?php if(!empty($administrasi_jaringan)){ $matkul = $this->main_model->get_kelas_matkul($administrasi_jaringan)->result_array(); ?>
          <tr>
            <td>Administrasi Jaringan</td>
            <td>: <?= $matkul[0]['kelas']?></td>
          </tr>
        <?php } ?>
        <?php if(!empty($sistem_pemrograman_mikroprosesor)){ $matkul = $this->main_model->get_kelas_matkul($sistem_pemrograman_mikroprosesor)->result_array(); ?>
          <tr>
            <td>Sistem Pemrograman Mikroprosesor</td>
            <td>: <?= $matkul[0]['kelas']?></td>
          </tr>
        <?php } ?>
        <?php if(!empty($mobile_programing)){ $matkul = $this->main_model->get_kelas_matkul($mobile_programing)->result_array(); ?>
          <tr>
            <td>Mobile Programing</td>
            <td>: <?= $matkul[0]['kelas']?></td>
          </tr>
        <?php } ?>
        <?php if(!empty($keamanan_jaringan)){ $matkul = $this->main_model->get_kelas_matkul($keamanan_jaringan)->result_array(); ?>
          <tr>
            <td>Keamanan Jaringan</td>
            <td>: <?= $matkul[0]['kelas']?></td>
          </tr>
        <?php } ?>
        <?php if(!empty($pemrograman_python)){ $matkul = $this->main_model->get_kelas_matkul($pemrograman_python)->result_array(); ?>
          <tr>
            <td>Pemrograman Python</td>
            <td>: <?= $matkul[0]['kelas']?></td>
          </tr>
        <?php } ?>
        <?php if(!empty($sistem_interface_mikrokontroler)){ $matkul = $this->main_model->get_kelas_matkul($sistem_interface_mikrokontroler)->result_array(); ?>
          <tr>
            <td>Sistem Interface Mikrokontroler</td>
            <td>: <?= $matkul[0]['kelas']?></td>
          </tr>
        <?php } ?>
        <?php if(!empty($robotik)){ $matkul = $this->main_model->get_kelas_matkul($robotik)->result_array(); ?>
          <tr>
            <td>Robotik</td>
            <td>: <?= $matkul[0]['kelas']?></td>
          </tr>
        <?php } ?>
      </table>
    </div>
  </div>
</div>