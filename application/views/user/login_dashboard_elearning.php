<?php if($this->session->flashdata('sukses')){ ?>
  <div class="flash-data-success" data-sukses="<?= $this->session->flashdata('sukses');?>"></div>
<?php }elseif($this->session->flashdata('gagal')){ ?>
  <div class="flash-data-failed" data-gagal="<?= $this->session->flashdata('gagal');?>"></div>
<?php } ?>
<?php date_default_timezone_set("Asia/Jakarta"); $tahun = date("Y"); ?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <!-- Meta, title, CSS, favicons, etc. -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>LOGIN PANEL USER || WORKSHOP ELEARNING</title>
    <link rel="icon" href="<?= base_url('assets/')?>images/Logowrk.png" type="image/png">
    <!-- Bootstrap -->
    <link href="<?= base_url('assets/')?>vendors/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome -->
    <link href="<?= base_url('assets/')?>vendors/font-awesome/css/font-awesome.min.css" rel="stylesheet">
    <!-- NProgress -->
    <link href="<?= base_url('assets/')?>vendors/nprogress/nprogress.css" rel="stylesheet">
    <!-- Animate.css -->
    <link href="<?= base_url('assets/')?>vendors/animate.css/animate.min.css" rel="stylesheet">
    <link rel="stylesheet" href="<?= base_url('assets/')?>dist/sweetalert2.min.css">

    <!-- Custom Theme Style -->
    <link href="<?= base_url('assets/')?>build/css/custom.min.css" rel="stylesheet">
    <style type="text/css">
      .lihat-icon {
        float: right;
        margin-right: 10px;
        margin-top: -42px;
        position: relative;
        z-index: 20;
      }
    </style>
  </head>

  <body class="login">
    <div>
      <a class="hiddenanchor" id="signup"></a>
      <a class="hiddenanchor" id="signin"></a>

      <div class="login_wrapper">
        <div class="animate form login_form">
          <section class="login_content">
            <?= form_open('auth_user_elearning'); ?>
              <h1>Login Mahasiswa</h1>
              <div class="flash-data" data-flashdata="<?= $this->session->flashdata('msg');?>"></div>
              <div>
                <input type="text" class="form-control" name="inputUsername" id="inputUsername" placeholder="Username" required="" autocomplete="off"/>
              </div>
              <div>
                <input type="password" class="form-control" id="inputPassword" name="inputPassword" placeholder="Kata Sandi" required="" autocomplete="off"/>
                <span toggle="#inputPassword" class="fa fa-fw fa-eye lihat-icon toggle-password"></span>
              </div>
              <div style="text-align: left; margin-left: 10px; margin-bottom: 5px;">
                <!-- <input type="checkbox" id="show" name="show" onclick="myFunction()"> Tampilkan kata sandi -->
                <!-- <br> -->
                Tidak punya akun ?<a href="#signup" class="to_register"> <b>Silahkan daftar akun ..</b></a><br>
                <a href="<?= base_url('lupapass')?>"><b>Lupa Kata Sandi ?</b></a>
              </div>
              <div style="margin-left: 80px;">
                <input type="submit" name="submit" id="submit" value="Masuk Panel" class="btn btn-default submit">
              </div>

              <div class="clearfix"></div>

              <div class="separator">
                <?= constant("SARAN");?>
                <div class="clearfix"></div>
                <br />

                <div>
                  <img src="<?= base_url('assets/')?>images/Logowrk.png" width="200px" height="80px">
                  <br><br>
                  <p>©<?= $tahun?> All Rights Reserved. <br> <?= constant("FOOTER"); ?></p>
                </div>
              </div>
            <?= form_close();?>
          </section>
        </div>

        <div id="register" class="animate form registration_form">
          <section class="login_content">
            <?= form_open('save_user_akun'); ?>
              <h1>Daftar Akun</h1>
              <div style="margin-bottom: 20px;">
                <select name="inputTahun" id="inputTahun" class="form-control">
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
              <div>
                <input type="text" class="form-control" name="inputNpm" placeholder="Nomor Induk Mahasiswa (3 digit dibelakang)" maxLength="3" onkeyup="validAngkatelp(this)" required="" />
              </div>
              <div>
                <input type="text" class="form-control" name="inputNama" placeholder="Nama Lengkap" required="" autocomplete="off"/>
              </div>
              <div>
                <input type="email" class="form-control" name="inputEmail" placeholder="Email" required="" autocomplete="off"/>
              </div>
              <div>
                <input type="text" class="form-control" name="inputUsername" placeholder="Username" required="" autocomplete="off"/>
              </div>
              <div>
                <input type="password" class="form-control" id="inputPassword2" name="inputPassword" placeholder="Kata Sandi" required="" autocomplete="off"/>
                <span toggle="#inputPassword2" class="fa fa-fw fa-eye lihat-icon toggle-password"></span>
              </div>
              <div>
                <label style="margin-top: 10px;" class="control-label col-md-5 col-sm-3 col-xs-12">Jenis Kelas <span class="required">*</span></label>
                <div class="col-md-0 col-sm-0 col-xs-6">
                  <div class="radio">
                    <label><input type="radio" name="jenis" class="flat" value="1" checked> Reguler</label>
                    <label><input type="radio" name="jenis" class="flat" value="2"> Ekstensi</label>
                  </div>
                </div>
                <br><br><br>
              </div>
              <div>
                <button type="submit" class="btn btn-primary">Daftar Akun</button>
              </div>

              <div class="clearfix"></div>

              <div class="separator">
                <p class="change_link">Sudah punya akun ?
                  <a href="#signin" class="to_register"> <b>Masuk</b></a>
                </p>

                <div class="clearfix"></div>
                <br />

                <div>
                  <img src="<?= base_url('assets/')?>images/Logowrk.png" width="200px" height="80px">
                  <br><br>
                  <p>©<?= $tahun?> All Rights Reserved. <br> <?= constant("FOOTER"); ?></p>
                </div>
              </div>
            <?= form_close();?>
          </section>
        </div>
      </div>
    </div>
  </body>
  <script src="<?= base_url('assets/')?>jquery-1.11.1.min.js"></script>
  <script src="<?= base_url('assets/')?>dist/sweetalert2.min.js"></script>
  <script src="<?= base_url('assets/')?>alert.js"></script>
  <script type="text/javascript">
    $(document).ready(function () {
      $(".toggle-password").click(function() {
        $(this).toggleClass("fa-eye fa-eye-slash");
        var input = $($(this).attr("toggle"));
        if (input.attr("type") == "password") {
          input.attr("type", "text");
        } else {
          input.attr("type", "password");
        }
      });
    });

    function myFunction() {
      var x = document.getElementById("inputPassword");
      if (x.type === "password") {
          x.type = "text";
      } else {
          x.type = "password";
      }
    }

    function validAngkatelp(a)
    {
      if(!/^[0-9.]+$/.test(a.value))
      {
      a.value = a.value.substring(0,a.value.length-1000);
      }
    }

    const flashData2 = $('.flash-data').data('flashdata');
    // console.log(flashData);
    if(flashData2){
      Swal.fire({
        title : 'Pemberitahuan',
        text : flashData2,
        type : 'error'
      });
    }
  </script>
</html>
