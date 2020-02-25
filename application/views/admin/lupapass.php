<?php date_default_timezone_set("Asia/Jakarta"); $tahun = date("Y"); ?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <!-- Meta, title, CSS, favicons, etc. -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>LUPA KATA SANDI || WORKSHOP ELEARNING</title>
    <link rel="icon" href="<?= base_url('assets/')?>images/Logowrk.png" type="image/png">
    <!-- Bootstrap -->
    <link href="<?= base_url('assets/')?>vendors/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome -->
    <link href="<?= base_url('assets/')?>vendors/font-awesome/css/font-awesome.min.css" rel="stylesheet">
    <!-- NProgress -->
    <link href="<?= base_url('assets/')?>vendors/nprogress/nprogress.css" rel="stylesheet">
    <!-- Animate.css -->
    <link href="<?= base_url('assets/')?>vendors/animate.css/animate.min.css" rel="stylesheet">

    <!-- Custom Theme Style -->
    <link href="<?= base_url('assets/')?>build/css/custom.min.css" rel="stylesheet">
  </head>

  <body class="login">
    <div>
      <a class="hiddenanchor" id="signup"></a>
      <a class="hiddenanchor" id="signin"></a>

      <div class="login_wrapper">
        <div class="animate form login_form">
          <section class="login_content">
            <form>
              <h1>Ubah Kata Sandi</h1>
              <div>
                <input type="email" class="form-control" name="inputEmail" id="inputEmail" placeholder="Email" required="" />
              </div>
              <div style="margin-left: 80px;">
                <input type="submit" name="submit" id="submit" value="Ubah Kata Sandi" class="btn btn-default submit">
              </div>

              <div class="clearfix"></div>

              <div class="separator">
                <a href="<?= base_url('loginelearning')?>"><< kembali ke panel login</a><br><br>
                Disaran kan menggunakan browser Google Chrome, Mozila Firefox atau Internet Explorer untuk perfoma yang stabil
                <div class="clearfix"></div>
                <br />

                <div>
                  <img src="<?= base_url('assets/')?>images/Logowrk.png" width="200px" height="80px">
                  <br><br>
                  <p>©<?= $tahun?> All Rights Reserved. <br> WorkshopElearning | Develop Web Triyoga Ginanjar Pamungkas,S.Kom | Develop MobileAPP Joe Fachrizal,S.Kom | RumahCendekia | CandiStudio | Universitas Pakuan</p>
                </div>
              </div>
            </form>
          </section>
        </div>
      </div>
    </div>
  </body>
  <script src="<?= base_url('assets/')?>jquery.min.js"></script>
  <script type="text/javascript">
    function myFunction() {
        var x = document.getElementById("password");
        if (x.type === "password") {
            x.type = "text";
        } else {
            x.type = "password";
        }
    }
  </script>
</html>
