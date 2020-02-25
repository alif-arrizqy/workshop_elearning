<div class="modal-dialog">
  <div class="modal-content">
    <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">x</button>
        <h4 class="modal-title" id="myModalLabel">DETAIL DATA ASISTEN DOSEN</h4>
    </div>
    <div class="modal-body">
      <?php 
        foreach ($data_asdos as $hasil): 
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
          $email = $hasil->email;
          $telp = $hasil->telp;
          $alamat = $hasil->alamat;
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
          <td>: <?php if($agama == "pilih"){echo "-";}else{echo $agama;} ?></td>
        </tr>
        <tr>
          <td width="30%">Telepon</td>
          <td>: <?= $telp?></td>
        </tr>
        <tr>
          <td width="30%">Alamat</td>
          <td>: <?php if(!empty($alamat)){echo $alamat;}else{echo "-";} ?></td>
        </tr>
      </table>
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
    </div>
  </div>
</div>