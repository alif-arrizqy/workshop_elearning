<?php if($this->session->flashdata('sukses')){ ?>
  <div class="flash-data-success" data-sukses="<?= $this->session->flashdata('sukses');?>"></div>
<?php }elseif($this->session->flashdata('gagal')){ ?>
  <div class="flash-data-failed" data-gagal="<?= $this->session->flashdata('gagal');?>"></div>
<?php } ?>
<div class="right_col" role="main">
  <div style="float: right;"><h2><?php $this->load->view('admin/kelengkapan/jam_aktif');?></h2></div>
  <!-- <div class="clearfix"></div> -->
  <div class="row">
    <div class="col-md-12 col-sm-12 col-xs-12">
      <div class="x_panel">
        <div class="x_title">
          <h2>Profile Administrator</h2>
          <div class="clearfix"></div>
        </div>
        <div class="x_content">
          <?php 
            foreach ($data_admin as $hasil): 
              $nama = $hasil->nama;
              $id_admin = $hasil->id_admin;
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
              $kondisi_data = $hasil->kondisi_data;
            endforeach; 
          ?>
          <div class="col-md-3 col-sm-3 col-xs-12">
            <div align="center">
              <?php if(!empty($gambar)){ ?>
                <img src="<?= base_url('assets/images/gambar_user/').$gambar;?>" style="border-radius: 20px;" width="80%" title="<?= $nama?>">
              <?php }else{ ?>
                <img src="<?= base_url('assets/images/user.png');?>" width="80%" style="border-radius: 20px;" title="Tidak ada Foto">
              <?php } ?>
            </div>
          </div>
          <div class="col-md-9 col-sm-3 col-xs-12">
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
            <br>
            <a href="<?= base_url('ubah_profil/').$id_admin;?>" id="adminprofile" data-toggle="modal" data-target="#modal_admin" class="btn btn-primary btn-xs"><span class="fa fa-pencil"></span> Ubah Profile</a>
            <?php if($kondisi_data == 1){ ?>
              <a href="<?= base_url('tampildata_admin/0/').$id_admin;?>" class="btn btn-primary btn-xs"><span class="fa fa-user"></span> Sembunyikan Profile</a>
            <?php }else{ ?>
              <a href="<?= base_url('tampildata_admin/1/').$id_admin;?>" class="btn btn-primary btn-xs"><span class="fa fa-user"></span> Tampilkan Profile</a>
            <?php } ?>
            <?php if(!empty($gambar)){ ?>
              <a href="<?= base_url('hapusgambar/').$id_admin;?>" class="btn btn-primary btn-xs"><span class="fa fa-trash"></span> Hapus Gambar</a>
            <?php } ?>
          </div>
        </div>
      </div>
    </div>
  </div>
</div> 
<div class="modal fade" id="modal_admin" tabindex="-1" role="dialog" aria-labelledby="largeModal2" aria-hidden="true"></div>