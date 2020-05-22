<?php date_default_timezone_set("Asia/Jakarta");
$tahun = date("Y"); ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <!-- Meta, title, CSS, favicons, etc. -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- <title>LUPA KATA SANDI || WORKSHOP ELEARNING</title> -->
</head>

<body>
    <div>
        <!-- <img src="assets/images/Logowrk.png" width="200px" height="80px"> -->
        <!-- <img src="poloslogo.png" width="20%"> -->
        <br /><br />
        <p>
            Hallo <?= $this->session->userdata('ses_name'); ?>,
            <br /><br />
            Jika kamu menerima email ini, maka kamu telah meminta untuk mereset Password akun <b>Workshop Elearning.</b>
            <br />
            Akun Anda memiliki Username: <b><?= $this->session->userdata('ses_username'); ?></b>
            <br /><br />
            Silahkan ikuti tautan pada link dibawah untuk mereset Password Anda:
            <br />
            <a href="workshop_elearning/ubah_pass" target="_blank">Reset Password</a>
            <p>
                Hormat Kami,
                <br />
                Admin Workshop Elearning.
            </p>
        </p>
        <hr>
        <p>
            &copy; <?= $tahun ?> All Rights Reserved. Workshop Elearning.
        </p>
    </div>
</body>

</html>