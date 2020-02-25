<div class="modal-dialog">
  <div class="modal-content">       
    <div class="modal-header">
      <button type="button" class="close" data-dismiss="modal" aria-hidden="true">x</button>
      <h4 class="modal-title" id="myModalLabel">DETAIL DATA KELAS MATA KULIAH</h4>
    </div>
    <div class="modal-body">
      <?php 
        foreach ($data_kelas_matkul as $hasil): 
          $id_matkul = $hasil->id_matkul;
          $matkul = $this->main_model->detail_matkul($id_matkul)->result();
          foreach ($matkul as $mtkl) {
            $nama_matkul = $mtkl->matkul;
            $semester = $mtkl->semester;
          }
          $kode = $hasil->kode;
          $kelas = $hasil->kelas;
          $lab = $hasil->lab;
          $maks_mhs = $hasil->maks_mhs;
          $asdos_1 = $hasil->asdos_1;
          $asdos_2 = $hasil->asdos_2;
          $hari = $hasil->hari;
          $mulai_praktikum = $hasil->mulai_praktikum;
          $selesai_praktikum = $hasil->selesai_praktikum;
        endforeach; 
      ?>
      <table width="100%">
        <tr>
          <td width="30%">Semester</td>
          <td>: <?php if($semester == 1){echo"Ganjil";}else{echo"Genap";}?></td>
        </tr>
        <tr>
          <td width="30%">Mata kuliah</td>
          <td>: <?= $nama_matkul?></td>
        </tr>
        <tr>
          <td width="30%">Kode Kelas</td>
          <td>: <?= $kode?></td>
        </tr>
        <tr>
          <td width="30%">Kelas</td>
          <td>: <?= $kelas?></td>
        </tr>
        <tr>
          <td width="30%">Laboratorium</td>
          <td>: <?php if($lab == 1){echo"Laboratorium Organisasi Komputer";}else{echo"Laboratorium Mikrokontroler";}?></td>
        </tr>
        <tr>
          <td width="30%">Maksimal Mahasiswa</td>
          <td>: <?= $maks_mhs." orang"?></td>
        </tr>
        <tr>
          <td width="30%">Jadwal Praktikum</td>
          <td>: <?= $hari.", ".$mulai_praktikum." s/d ".$selesai_praktikum?></td>
        </tr>
        <tr>
          <td width="30%">Asisten Dosen</td>
          <td>: 
            <?php 
              $asdos1 = $this->main_model->get_asdos1_iduser($asdos_1)->result();
              foreach ($asdos1 as $asd1) {}
              if($hasil->asdos_2 != 0){
                $asdos2 = $this->main_model->get_asdos2_iduser($asdos_2)->result();
                foreach ($asdos2 as $asd2) {}
              }
            ?>
            <?= $asd1->nama." dan ";?>
            <?php if($hasil->asdos_2 != 0){echo $asd2->nama;}else{echo"-";} ?>
          </td>
        </tr>
      </table>
    </div>    
  </div> 
</div>