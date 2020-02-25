<div class="modal-dialog">
  <div class="modal-content">
    <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">x</button>
        <h4 class="modal-title" id="myModalLabel">DETAIL DATA ADMINISTRATOR</h4>
    </div>
    <div class="modal-body">
      <?php 
        foreach ($data_admin as $hasil): 
          $nama = $hasil->nama;
          $tempat = $hasil->tempat;
          $tgl_lahir = date("d M Y",strtotime($hasil->tgl_lahir));
          $jk = $hasil->jk;
          $agama = $hasil->agama;
          $email = $hasil->email;
          $telp = $hasil->telp;
          $alamat = $hasil->alamat;
          $gambar = $hasil->gambar;
          $username = $hasil->username;
          $password = $hasil->password;
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
    </div>
  </div>
</div>