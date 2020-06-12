<?php if ($this->session->flashdata('sukses')) { ?>
  <div class="flash-data-success" data-sukses="<?= $this->session->flashdata('sukses'); ?>"></div>
<?php } elseif ($this->session->flashdata('gagal')) { ?>
  <div class="flash-data-failed" data-gagal="<?= $this->session->flashdata('gagal'); ?>"></div>
<?php } elseif ($this->session->flashdata('msg')) { ?>
  <div class="flash-data" data-flashdata="<?= $this->session->flashdata('msg'); ?>"></div>
<?php } ?>
<div class="right_col" role="main">
  <div style="float: right;">
    <h2><?php $this->load->view('admin/kelengkapan/jam_aktif'); ?></h2>
  </div>
  <!-- <div class="clearfix"></div> -->
  <div class="row">
    <div class="col-md-12 col-sm-12 col-xs-12">
      <div class="x_panel">
        <div class="x_title">
          <?php $level = $this->session->userdata('ses_level');
          if ($level == 1) {
            $sbg = "Mahasiswa";
          } else if ($level == 2) {
            $sbg = "Asisten Praktikum";
          } else if ($level == 3) {
            $sbg = "Asisten Praktikum / Mahasiswa";
          } else if ($level == 4) {
            $sbg = "Alumni / Umum";
          } ?>
          <h2>Profile <?= $sbg . " (" . $this->session->userdata('ses_name') . ")" ?></h2>
          <div class="clearfix"></div>
        </div>
        <div class="x_content">
          <?php
          foreach ($data_user as $hasil) :
            $tahun = $hasil->tahun;
            $npm = $hasil->npm;
            $nama = $hasil->nama;
            $id_user = $hasil->id_user;
            $tempat = $hasil->tempat;
            $tgl_lahir = date("d M Y", strtotime($hasil->tgl_lahir));
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
          <?php if (empty($email)) {
            $this->load->view('user/modal');
            // $this->session->set_flashdata('msg', 'Jangan Lupa Untuk Menambahkan Email Yang Aktif Anda Gunakan Sekarang !!');
          } else if (!empty($email)) {
            $this->load->view('user/modal');
            // $this->session->set_flashdata('msg', 'Pastikan Email Yang Anda Gunakan Aktif');
          }
          ?>

          <div class="col-md-3 col-sm-3 col-xs-12">
            <div align="center">
              <?php if (!empty($gambar)) { ?>
                <img src="<?= base_url('assets/images/gambar_user/') . $gambar; ?>" style="border-radius: 20px;" width="80%" title="<?= $nama ?>">
                <?php } else { 
                  if ($jk == 1) { ?>
                  <img src="<?= base_url('assets/images/male.png'); ?>" style="border-radius: 20px;" width="80%" title="Tidak ada Foto">
                      <?php } if ($jk == 0) { ?>
                  <img src="<?= base_url('assets/images/female.png'); ?>" style="border-radius: 20px;" width="80%" title="Tidak ada Foto">
                    <?php } ?>
              <?php }?>
            </div>
          </div>
          <div class="col-md-9 col-sm-3 col-xs-12">
            <table width="100%">
              <?php if ($level != 4) { ?>
                <tr>
                  <td width="30%">Tahun Masuk</td>
                  <td>: <?= $tahun ?></td>
                </tr>
              <?php } ?>
              <tr>
                <td width="30%">Nomor Induk</td>
                <td>: <?= $npm ?></td>
              </tr>
              <tr>
                <td width="30%">Nama Lengkap</td>
                <td>: <?= $nama ?></td>
              </tr>
              <tr>
                <td width="30%">Email</td>
                <td>: <?= $email ?></td>
              </tr>
              <tr>
                <td width="30%">Username</td>
                <td>: <?= $username ?></td>
              </tr>
              <tr>
                <td width="30%">Kata Sandi</td>
                <td>: <?= $password ?></td>
              </tr>
              <tr>
                <td width="30%">Tempat, Tanggal Lahir</td>
                <td>: <?php if (empty($tempat)) {
                        echo "-";
                      } else {
                        echo $tempat;
                      } ?>, <?php if ($hasil->tgl_lahir == "0000-00-00") {
                              echo "-";
                            } else {
                              echo $tgl_lahir;
                            } ?></td>
              </tr>
              <tr>
                <td width="30%">Jenis Kelamin</td>
                <td>: <?php if ($jk == 1) {
                        echo "Laki-Laki";
                      } else {
                        echo "Perempuan";
                      } ?></td>
              </tr>
              <tr>
                <td width="30%">Agama</td>
                <td>: <?php if ($agama == "pilih") {
                        echo "-";
                      } else {
                        echo $agama;
                      } ?></td>
              </tr>
              <tr>
                <td width="30%">Telepon</td>
                <td>: <?= $telp ?></td>
              </tr>
              <tr>
                <td width="30%">Alamat</td>
                <td>: <?php if (!empty($alamat)) {
                        echo $alamat;
                      } else {
                        echo "-";
                      } ?></td>
              </tr>
            </table>
            <br>
            <a href="<?= base_url('ubah_profil_user/') . $id_user; ?>" id="userprofile" data-toggle="modal" data-target="#modal_user" class="btn btn-primary btn-xs"><span class="fa fa-pencil"></span> Ubah Profile</a>
            <?php if ($level == 1 || $level == 3) { ?>
              <a href="<?= base_url('ambil_matkul_user/') . $id_user; ?>" id="ambilmatkuluser" data-toggle="modal" data-target="#modal_ambil_matkul_user" class="btn btn-primary btn-xs"><span class="fa fa-pencil"></span> Ambil Kelas Mata Kuliah</a>
            <?php } ?>
            <?php if ($kondisi_data == 1) { ?>
              <a href="<?= base_url('tampildata_user/0/') . $id_user; ?>" class="btn btn-primary btn-xs"><span class="fa fa-user"></span> Sembunyikan Profile</a>
            <?php } else { ?>
              <a href="<?= base_url('tampildata_user/1/') . $id_user; ?>" class="btn btn-primary btn-xs"><span class="fa fa-user"></span> Tampilkan Profile</a>
            <?php } ?>
            <?php if (!empty($gambar)) { ?>
              <a href="<?= base_url('hapusgambar_user/') . $id_user; ?>" class="btn btn-primary btn-xs"><span class="fa fa-trash"></span> Hapus Gambar</a>
            <?php } ?>
          </div>
        </div>
      </div>
    </div>
  </div>

  <?php if ($level == 2 || $level == 3 || $level == 4) { ?>
    <div class="row">
      <div class="col-md-12 col-sm-12 col-xs-12">
        <div class="x_panel">
          <div class="x_title">
            <h2>Mata Kuliah Yang Di Ajar</h2>
            <div class="clearfix"></div>
          </div>
          <div class="x_content">
            <?php
            foreach ($qrcode_matkul_ajar->result() as $hasil) : ?>
              <?php
              $kode = $hasil->kode;
              $gbr = $this->main_model->get_qrcode($kode)->row_array();
              ?>
              <div class="col-md-3 col-sm-3 col-xs-12">
                <div align="center">
                  <?php if(!empty($gbr['kode'])) { ?>
                    <a href="<?= base_url('detail_qrcode/') . $gbr['kode']; ?>" id="detail_qrcode" data-toggle="modal" data-target="#modal_detail_qrcode" title="detail <?= $gbr['qrcode']; ?>">
                  <?php } else if (empty($gbr['kode'])) { echo ""; }?>
                  <?php if(!empty($gbr['qrcode'])) { ?>
                    <img src="<?= base_url('assets/images/imgqrcode/absen/') . $gbr['qrcode']; ?>" width="80%" height="80%">
                  <?php } else if (empty($gbr['qrcode'])) { echo "no image"; } ?>
                  </a>
                </div>
              </div>
              <div class="col-md-9 col-sm-3 col-xs-12">
                <table width="100%" style="margin-top:2%; margin-bottom: 10%;font-size: 14px;">
                  <tr>
                    <td width="30%">Kelas</td>
                    <td>: <?= $hasil->kelas ?></td>
                  </tr>
                  <tr>
                    <td width="30%">Pertemuan</td>
                    <td>: <?php
                          if (empty($gbr['pertemuan'])) {
                            echo "-";
                          } else if (!empty($gbr['pertemuan'])) {
                            echo $gbr['pertemuan'];
                          } ?>
                    </td>
                  </tr>
                  <tr>
                    <td width="30%">Asisten Praktikum</td>
                    <td>: <?php
                          $asdos1 = $this->main_model->get_asdos1_iduser($hasil->asdos_1)->result_array();
                          echo $asdos1[0]['nama'] . " / ";
                          if ($hasil->asdos_2 != 0) {
                            $asdos2 = $this->main_model->get_asdos2_iduser($hasil->asdos_2)->result_array();
                            echo $asdos2[0]['nama'];
                          } else {
                            echo "-";
                          }
                          ?>
                    </td>
                  </tr>
                  <tr>
                    <td width="30%">Jam</td>
                    <td>: <?= $hasil->hari . ", " . $hasil->mulai_praktikum . " s/d " . $hasil->selesai_praktikum ?></td>
                  </tr>
                  <tr>
                    <td width="30%">Lab</td>
                    <td>: <?php
                          if ($hasil->lab == 1) {
                            echo "Lab. Organisasi Komputer";
                          }
                          if ($hasil->lab == 0) {
                            echo "Lab. Dasar-Dasar Instrumentasi";
                          }
                          ?>
                    </td>
                  </tr>
                </table>
              </div>
              <br><br><br><br><br><br><br><br><br><br>
              <hr style="border-width: 2px;border-style: dashed;">
            <?php endforeach; ?>
          <?php } ?>
          </div>
        </div>
      </div>
    </div>
    <div class="modal fade" id="modal_user" tabindex="-1" role="dialog" aria-labelledby="largeModal2" aria-hidden="true"></div>
    <div class="modal fade" id="modal_ambil_matkul_user" tabindex="-1" role="dialog" aria-labelledby="largeModal2" aria-hidden="true"></div>
    <div class="modal fade" id="modal_detail_qrcode" tabindex="-1" role="dialog" aria-labelledby="largeModal3" aria-hidden="true"></div>