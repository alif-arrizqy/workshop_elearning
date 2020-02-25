<script src="<?= base_url('assets/')?>myscript.js"></script>
<div class="modal-dialog">
  <div class="modal-content">    
    <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">x</button>
        <h4 class="modal-title" id="myModalLabel">UBAH DATA ABSENSI</h4>
    </div>
    <form action="<?= base_url('update_absensi');?>" method="post" name="form" enctype="multipart/form-data" class="form-horizontal form-label-left">
      <div class="modal-body">
        <?php 
          foreach ($data_absensi as $hasil): 
            $id_absen = $hasil->id_absen;
            $id_user = $hasil->id_user;
            $id_kelas_matkul = $hasil->id_kelas_matkul;
            $kode = $hasil->kode;
            $npm = $hasil->npm;
            $a_1 = $hasil->a_1;
            $a_2 = $hasil->a_2;
            $a_3 = $hasil->a_3;
            $a_4 = $hasil->a_4;
            $a_5 = $hasil->a_5;
            $a_6 = $hasil->a_6;
            $a_7 = $hasil->a_7;
            $a_8 = $hasil->a_8;
            $a_9 = $hasil->a_9;
            $a_10 = $hasil->a_10;
          endforeach; 
        ?>
        <input type="hidden" id="absen_id" name="absen_id" value="<?= $id_absen;?>">
        <input type="hidden" id="user_id" name="user_id" value="<?= $id_user;?>">
        <input type="hidden" id="kelas_matkul_id" name="kelas_matkul_id" value="<?= $id_kelas_matkul;?>">
        <input type="hidden" id="kode" name="kode" value="<?= $kode;?>">
        <div class="item form-group">
          <label class="control-label col-md-3 col-sm-3 col-xs-12" for="inputNpm">Nomor Induk</label>
          <div class="col-md-9 col-sm-6 col-xs-12">  
            <input type="text" name="inputNpm" id="inputNpm" value="<?=$npm?>" class="form-control col-md-7 col-xs-12" readonly >
          </div>
        </div>
        <div class="item form-group">
          <label class="control-label col-md-3 col-sm-3 col-xs-12" for="inputAbsen1">Minggu 1</label>
          <div class="col-md-9 col-sm-6 col-xs-12">  
            <select name="inputAbsen1" id="inputAbsen1" class="form-control col-md-7 col-xs-12">
              <option value="<?=$a_1?>" selected><?php if($a_1==0){echo"Tidak Hadir";}else{echo"Hadir";} ?></option>
              <?php if($a_1==0){?>
                <option value="1">Hadir</option>
              <?php }else{?>
                <option value="0">Tidak Hadir</option>
              <?php }?>
            </select>
          </div>
        </div>
        <div class="item form-group">
          <label class="control-label col-md-3 col-sm-3 col-xs-12" for="inputAbsen2">Minggu 2</label>
          <div class="col-md-9 col-sm-6 col-xs-12">  
            <select name="inputAbsen2" id="inputAbsen2" class="form-control col-md-7 col-xs-12">
              <option value="<?=$a_2?>" selected><?php if($a_2==0){echo"Tidak Hadir";}else{echo"Hadir";} ?></option>
              <?php if($a_2==0){?>
                <option value="1">Hadir</option>
              <?php }else{?>
                <option value="0">Tidak Hadir</option>
              <?php }?>
            </select>
          </div>
        </div>
        <div class="item form-group">
          <label class="control-label col-md-3 col-sm-3 col-xs-12" for="inputAbsen3">Minggu 3</label>
          <div class="col-md-9 col-sm-6 col-xs-12">  
            <select name="inputAbsen3" id="inputAbsen3" class="form-control col-md-7 col-xs-12">
              <option value="<?=$a_3?>" selected><?php if($a_3==0){echo"Tidak Hadir";}else{echo"Hadir";} ?></option>
              <?php if($a_3==0){?>
                <option value="1">Hadir</option>
              <?php }else{?>
                <option value="0">Tidak Hadir</option>
              <?php }?>
            </select>
          </div>
        </div>
        <div class="item form-group">
          <label class="control-label col-md-3 col-sm-3 col-xs-12" for="inputAbsen4">Minggu 4</label>
          <div class="col-md-9 col-sm-6 col-xs-12">  
            <select name="inputAbsen4" id="inputAbsen4" class="form-control col-md-7 col-xs-12">
              <option value="<?=$a_4?>" selected><?php if($a_4==0){echo"Tidak Hadir";}else{echo"Hadir";} ?></option>
              <?php if($a_4==0){?>
                <option value="1">Hadir</option>
              <?php }else{?>
                <option value="0">Tidak Hadir</option>
              <?php }?>
            </select>
          </div>
        </div>
        <div class="item form-group">
          <label class="control-label col-md-3 col-sm-3 col-xs-12" for="inputAbsen5">Minggu 5</label>
          <div class="col-md-9 col-sm-6 col-xs-12">  
            <select name="inputAbsen5" id="inputAbsen5" class="form-control col-md-7 col-xs-12">
              <option value="<?=$a_5?>" selected><?php if($a_5==0){echo"Tidak Hadir";}else{echo"Hadir";} ?></option>
              <?php if($a_5==0){?>
                <option value="1">Hadir</option>
              <?php }else{?>
                <option value="0">Tidak Hadir</option>
              <?php }?>
            </select>
          </div>
        </div>
        <div class="item form-group">
          <label class="control-label col-md-3 col-sm-3 col-xs-12" for="inputAbsen6">Minggu 6</label>
          <div class="col-md-9 col-sm-6 col-xs-12">  
            <select name="inputAbsen6" id="inputAbsen6" class="form-control col-md-7 col-xs-12">
              <option value="<?=$a_6?>" selected><?php if($a_6==0){echo"Tidak Hadir";}else{echo"Hadir";} ?></option>
              <?php if($a_6==0){?>
                <option value="1">Hadir</option>
              <?php }else{?>
                <option value="0">Tidak Hadir</option>
              <?php }?>
            </select>
          </div>
        </div>
        <div class="item form-group">
          <label class="control-label col-md-3 col-sm-3 col-xs-12" for="inputAbsen7">Minggu 7</label>
          <div class="col-md-9 col-sm-6 col-xs-12">  
            <select name="inputAbsen7" id="inputAbsen7" class="form-control col-md-7 col-xs-12">
              <option value="<?=$a_7?>" selected><?php if($a_7==0){echo"Tidak Hadir";}else{echo"Hadir";} ?></option>
              <?php if($a_7==0){?>
                <option value="1">Hadir</option>
              <?php }else{?>
                <option value="0">Tidak Hadir</option>
              <?php }?>
            </select>
          </div>
        </div>
        <div class="item form-group">
          <label class="control-label col-md-3 col-sm-3 col-xs-12" for="inputAbsen8">Minggu 8</label>
          <div class="col-md-9 col-sm-6 col-xs-12">  
            <select name="inputAbsen8" id="inputAbsen8" class="form-control col-md-7 col-xs-12">
              <option value="<?=$a_8?>" selected><?php if($a_8==0){echo"Tidak Hadir";}else{echo"Hadir";} ?></option>
              <?php if($a_8==0){?>
                <option value="1">Hadir</option>
              <?php }else{?>
                <option value="0">Tidak Hadir</option>
              <?php }?>
            </select>
          </div>
        </div>
        <div class="item form-group">
          <label class="control-label col-md-3 col-sm-3 col-xs-12" for="inputAbsen9">Minggu 9</label>
          <div class="col-md-9 col-sm-6 col-xs-12">  
            <select name="inputAbsen9" id="inputAbsen9" class="form-control col-md-7 col-xs-12">
              <option value="<?=$a_9?>" selected><?php if($a_9==0){echo"Tidak Hadir";}else{echo"Hadir";} ?></option>
              <?php if($a_9==0){?>
                <option value="1">Hadir</option>
              <?php }else{?>
                <option value="0">Tidak Hadir</option>
              <?php }?>
            </select>
          </div>
        </div>
        <div class="item form-group">
          <label class="control-label col-md-3 col-sm-3 col-xs-12" for="inputAbsen2">Minggu 10</label>
          <div class="col-md-9 col-sm-6 col-xs-12">  
            <select name="inputAbsen10" id="inputAbsen10" class="form-control col-md-7 col-xs-12">
              <option value="<?=$a_10?>" selected><?php if($a_10==0){echo"Tidak Hadir";}else{echo"Hadir";} ?></option>
              <?php if($a_10==0){?>
                <option value="1">Hadir</option>
              <?php }else{?>
                <option value="0">Tidak Hadir</option>
              <?php }?>
            </select>
          </div>
        </div>
      </div>
      <div class="modal-footer">
        <button class="btn" data-dismiss="modal" aria-hidden="true">Tutup</button>
        <button class="btn btn-primary">Ubah</button>
      </div>
    </form>
  </div>
</div>