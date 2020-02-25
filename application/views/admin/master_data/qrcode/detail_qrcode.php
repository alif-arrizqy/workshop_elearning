<div class="modal-dialog">
  <div class="modal-content">
    <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">x</button>
        <h4 class="modal-title" id="myModalLabel">DETAIL DATA QRCODE ABSEN</h4>
    </div>
    <div class="modal-body">
      <?php 
        foreach ($data_qrcode as $hasil): 
          $nama_qrcode = $hasil->nama_qrcode;
          $qrcode = $hasil->qrcode;
          $kelas = $hasil->kelas;
        endforeach; 
      ?>
      <div align="center">
        <img src="<?= base_url('assets/images/imgqrcode/absen/').$qrcode;?>" width="50%" title="<?= $qrcode?>">
      </div>
      <table width="100%">
        <tr>
          <td width="30%">Kelas</td>
          <td>: <?= $kelas?></td>
        </tr>
        <tr>
          <td width="30%">Nama Qrcode</td>
          <td>: <?= $nama_qrcode?></td>
        </tr>
      </table>
    </div>
  </div>
</div>