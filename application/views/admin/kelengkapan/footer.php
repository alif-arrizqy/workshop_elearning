<?php date_default_timezone_set("Asia/Jakarta"); $tahun = date("Y"); ?>
        <!-- footer content -->
        <footer>
          <div class="pull-right">
            ©<?= $tahun?> All Rights Reserved. <?=constant("FOOTERDASHBOARD")?>
            <br>
            <span class="pull-right">Gentelella - Bootstrap Admin Template by <a href="https://colorlib.com">Colorlib</a></span>
          </div>
          <div class="clearfix"></div>
        </footer>
        <!-- /footer content -->
      </div>
    </div>
    <?php $this->load->view('admin/kelengkapan/js');?>
  </body>
</html>