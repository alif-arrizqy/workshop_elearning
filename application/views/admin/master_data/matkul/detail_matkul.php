<div class="modal-dialog">
  <div class="modal-content">       
    <div class="modal-header">
      <button type="button" class="close" data-dismiss="modal" aria-hidden="true">x</button>
      <h4 class="modal-title" id="myModalLabel">DETAIL DATA MATA KULIAH</h4>
    </div>
    <div class="modal-body">
      <?php 
        foreach ($data_matkul as $hasil): 
          $semester = $hasil->semester;
          $matkul = $hasil->matkul;
          $file = $hasil->file;
          $extensi = pathinfo($file, PATHINFO_EXTENSION);
        endforeach; 
      ?>
      <table width="100%">
        <tr>
          <td width="30%">Mata kuliah</td>
          <td>: <?= $matkul?></td>
        </tr>
        <tr>
          <td width="30%">Semester</td>
          <td>: <?php if($semester == 1){echo"Ganjil";}else{echo"Genap";}?></td>
        </tr>
        <tr>
          <td width="30%">Nama File Modul</td>
          <td>: 
            <a href="<?= base_url('assets/images/file_modul/').$file;?>">
              <?php if($extensi == 'pdf'){ ?>
                <img src="<?= base_url('assets/images/pdf.png');?>" width="8%" title="<?= $file;?>">
              <?php }else if($extensi == 'doc' || $extensi == 'docx'){ ?>
                <img src="<?= base_url('assets/images/doc.png');?>" width="8%" title="<?= $file;?>">
              <?php } ?><?= $file;?>
            </a>
          </td>
        </tr>
      </table>
    </div>    
  </div> 
</div>