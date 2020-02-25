<div class="right_col" role="main">
  <div style="float: right;"><h2><?php $this->load->view('admin/kelengkapan/jam_aktif');?></h2></div>
  <!-- <div class="clearfix"></div> -->
  <div class="row">
    <div class="col-md-12 col-sm-12 col-xs-12">
      <div class="x_panel">
        <div class="x_title">
          <h2>Daftar Asisten Praktikum</h2>
          <div class="clearfix"></div>
        </div>
        <div class="x_content">
          <?php 
            foreach ($data_asdos as $hasil): 
              $tahun = $hasil->tahun;
              $npm = $hasil->npm;
              $nama = $hasil->nama;
              $id_user = $hasil->id_user;
              $tempat = $hasil->tempat;
              $tgl_lahir = date("d M Y",strtotime($hasil->tgl_lahir));
              $jk = $hasil->jk;
              $agama = $hasil->agama;
              $email = $hasil->email;
              $telp = $hasil->telp;
              $alamat = $hasil->alamat;
              $gambar = $hasil->gambar;
              $akses = $hasil->akses;
              $kondisi_data = $hasil->kondisi_data;
          ?>
            <?php if($kondisi_data == 1){ ?>
              <div class="col-md-3 col-sm-3 col-xs-12">
                <div align="center">
                  <?php if(!empty($gambar)){ ?>
                    <img src="<?= base_url('assets/images/gambar_user/').$gambar;?>" style="border-radius: 20px;" width="80%" title="<?= $nama?>">
                  <?php }else{ ?>
                    <img src="<?= base_url('assets/images/user.png');?>" style="border-radius: 20px;" width="80%" title="Tidak ada Foto">
                  <?php } ?>
                </div>
              </div>
              <div class="col-md-9 col-sm-3 col-xs-12">
                <table width="100%">
                  <?php if($akses != 4){ ?>
                    <tr>
                      <td width="30%">Tahun Masuk</td>
                      <td>: <?= $tahun?></td>
                    </tr>
                  <?php } ?>
                  <tr>
                    <td width="30%">Nomor Induk</td>
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
              <br><br><br><br><br><br><br><br><br><br><hr style="border-width: 2px;border-style: dashed;">
            <?php } ?>
          <?php endforeach; ?>
        </div>
      </div>
    </div>
  </div>
</div>