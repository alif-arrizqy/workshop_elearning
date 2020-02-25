<div class="right_col" role="main">
  <div style="float: right;"><h2><?php $this->load->view('admin/kelengkapan/jam_aktif');?></h2></div>
  <div class="row">
    <div class="col-md-12 col-sm-12 col-xs-12">
      <div class="x_panel">
        <div class="x_title">
          <h2>Data Kelas Mahasiswa</h2>
          <!-- <ul class="nav navbar-right panel_toolbox">
            <li class="dropdown navbar-right">
              <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false" title="menu"><i class="fa fa-wrench"></i></a>
              <ul class="dropdown-menu" role="menu">
                <li><a data-toggle="modal" data-target="#modal_add_kelas_mhs"><span class="fa fa-plus"></span>&nbsp;Tambah Data</a></li>
                <li><a href="#"><span class="fa fa-print"></span>&nbsp;Cetak Data</a></li>
              </ul>
            </li>
          </ul> -->
          <div class="clearfix"></div>
        </div>
        <div class="x_content">
          <?php if($this->session->flashdata('sukses')){ ?>
            <div class="flash-data-success" data-sukses="<?= $this->session->flashdata('sukses');?>"></div>
          <?php }elseif($this->session->flashdata('gagal')){ ?>
            <div class="flash-data-failed" data-gagal="<?= $this->session->flashdata('gagal');?>"></div>
          <?php } ?>
          <div class="" role="tabpanel" data-example-id="togglable-tabs">
            <ul id="myTab1" class="nav nav-tabs bar_tabs left" role="tablist">
              <li role="presentation" class="active"><a href="#genap" id="genap-tabb" role="tab" data-toggle="tab" aria-controls="genapreguler" aria-expanded="true">Semester Genap (Reguler)</a>
              </li>
              <li role="presentation" class=""><a href="#ganjil" role="tab" id="ganjil-tabb" data-toggle="tab" aria-controls="ganjilreguler" aria-expanded="false">Semester Ganjil (Reguler)</a>
              </li>
              <li role="presentation" class=""><a href="#genapmalam" role="tab" id="genapmalam-tabb" data-toggle="tab" aria-controls="genapmalam" aria-expanded="false">Semester Genap (Malam)</a>
              </li>
              <li role="presentation" class=""><a href="#ganjilmalam" role="tab" id="ganjilmalam-tabb" data-toggle="tab" aria-controls="ganjilmalam" aria-expanded="false">Semester Ganjil (Malam)</a>
              </li>
            </ul>
            <div id="myTabContent2" class="tab-content">
              <div role="tabpanel" class="tab-pane fade active in" id="genap" aria-labelledby="genap-tabb">
                <table id="datatable-responsive-genap" class="table table-striped table-bordered dt-responsive nowrap" width="100%">
                  <thead>
                    <tr>
                      <th align="center">No</th>
                      <th align="center">NPM</th>
                      <th align="center">SI</th>
                      <th align="center">Orkom</th>
                      <th align="center">Sigit 2</th>
                      <th align="center">Jarkom</th>
                      <th align="center">Sispemik</th>
                      <th align="center">Mobro</th>
                      <th align="center">Kejar</th>
                      <th align="center">Python</th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php 
                      $no = 1;
                      foreach ($data_kelas_mhs_reguler as $hasil) {
                    ?>
                      <tr>
                        <td width="3%" align="center"><?= $no++;?></td>
                        <td align="center"><?= $hasil->npm;?></td>
                        <td align="center"><?= $hasil->sistem_instrumentasi;?></td>
                        <td align="center"><?= $hasil->organisasi_komputer;?></td>
                        <td align="center"><?= $hasil->sistem_digital_2;?></td>
                        <td align="center"><?= $hasil->jaringan_komputer;?></td>
                        <td align="center"><?= $hasil->sistem_pemrograman_mikroprosesor;?></td>
                        <td align="center"><?= $hasil->mobile_programing;?></td>
                        <td align="center"><?= $hasil->keamanan_jaringan;?></td>
                        <td align="center"><?= $hasil->pemrograman_python;?></td>
                      </tr>
                    <?php } ?>
                  </tbody>
                </table>
              </div>
              <div role="tabpanel" class="tab-pane fade" id="ganjil" aria-labelledby="ganjil-tab">
                <table id="datatable-responsive-ganjil" class="table table-striped table-bordered dt-responsive nowrap" width="100%">
                  <thead>
                    <tr>
                      <th align="center">No</th>
                      <th align="center">NPM</th>
                      <th align="center">Elektro</th>
                      <th align="center">Sigit 1</th>
                      <th align="center">Sismik</th>
                      <th align="center">Otomasi</th>
                      <th align="center">Adminjar</th>
                      <th align="center">SIM</th>
                      <th align="center">Robotik</th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php 
                      $no = 1;
                      foreach ($data_kelas_mhs_reguler as $hasil) {
                    ?>
                      <tr>
                        <td width="3%" align="center"><?= $no++;?></td>
                        <td align="center"><?= $hasil->npm;?></td>
                        <td align="center"><?= $hasil->elektronika;?></td>
                        <td align="center"><?= $hasil->sistem_digital_1;?></td>
                        <td align="center"><?= $hasil->sistem_mikroprosesor;?></td>
                        <td align="center"><?= $hasil->otomasi;?></td>
                        <td align="center"><?= $hasil->administrasi_jaringan;?></td>
                        <td align="center"><?= $hasil->sistem_interface_mikrokontroler;?></td>
                        <td align="center"><?= $hasil->robotik;?></td>
                      </tr>
                    <?php } ?>
                  </tbody>
                </table>
              </div>
              <div role="tabpanel" class="tab-pane fade" id="genapmalam" aria-labelledby="genapmalam-tabb">
                <table id="datatable-responsive-genap-malam" class="table table-striped table-bordered dt-responsive nowrap" width="100%">
                  <thead>
                    <tr>
                      <th align="center">No</th>
                      <th align="center">NPM</th>
                      <th align="center">SI</th>
                      <th align="center">Orkom</th>
                      <th align="center">Sigit 2</th>
                      <th align="center">Jarkom</th>
                      <th align="center">Sispemik</th>
                      <th align="center">Mobro</th>
                      <th align="center">Kejar</th>
                      <th align="center">Python</th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php 
                      $no = 1;
                      foreach ($data_kelas_mhs_malam as $hasil) {
                    ?>
                      <tr>
                        <td width="3%" align="center"><?= $no++;?></td>
                        <td align="center"><?= $hasil->npm;?></td>
                        <td align="center"><?= $hasil->sistem_instrumentasi;?></td>
                        <td align="center"><?= $hasil->organisasi_komputer;?></td>
                        <td align="center"><?= $hasil->sistem_digital_2;?></td>
                        <td align="center"><?= $hasil->jaringan_komputer;?></td>
                        <td align="center"><?= $hasil->sistem_pemrograman_mikroprosesor;?></td>
                        <td align="center"><?= $hasil->mobile_programing;?></td>
                        <td align="center"><?= $hasil->keamanan_jaringan;?></td>
                        <td align="center"><?= $hasil->pemrograman_python;?></td>
                      </tr>
                    <?php } ?>
                  </tbody>
                </table>
              </div>
              <div role="tabpanel" class="tab-pane fade" id="ganjilmalam" aria-labelledby="ganjilmalam-tabb">
                <table id="datatable-responsive-ganjil-malam" class="table table-striped table-bordered dt-responsive nowrap" width="100%">
                  <thead>
                    <tr>
                      <th align="center">No</th>
                      <th align="center">NPM</th>
                      <th align="center">Elektro</th>
                      <th align="center">Sigit 1</th>
                      <th align="center">Sismik</th>
                      <th align="center">Otomasi</th>
                      <th align="center">Adminjar</th>
                      <th align="center">SIM</th>
                      <th align="center">Robotik</th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php 
                      $no = 1;
                      foreach ($data_kelas_mhs_malam as $hasil) {
                    ?>
                      <tr>
                        <td width="3%" align="center"><?= $no++;?></td>
                        <td align="center"><?= $hasil->npm;?></td>
                        <td align="center"><?= $hasil->elektronika;?></td>
                        <td align="center"><?= $hasil->sistem_digital_1;?></td>
                        <td align="center"><?= $hasil->sistem_mikroprosesor;?></td>
                        <td align="center"><?= $hasil->otomasi;?></td>
                        <td align="center"><?= $hasil->administrasi_jaringan;?></td>
                        <td align="center"><?= $hasil->sistem_interface_mikrokontroler;?></td>
                        <td align="center"><?= $hasil->robotik;?></td>
                      </tr>
                    <?php } ?>
                  </tbody>
                </table>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div> 
<div class="modal fade" id="modal_add_kelas_mhs" tabindex="-1" role="dialog" aria-labelledby="largeModal" aria-hidden="true">
  <div class="modal-dialog">
  <div class="modal-content">
    <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">x</button>
        <h4 class="modal-title" id="myModalLabel">TAMBAH DATA KELAS MAHASISWA</h4>
    </div>
    <form action="<?= base_url('save_kelas_mhs');?>" method="post" name="form" enctype="multipart/form-data" class="form-horizontal form-label-left">
      <div class="modal-body">
        <?php $this->load->view('admin/master_data/kelas_matkul/add_kelas_matkul');?>
      </div>
      <div class="modal-footer">
          <button class="btn" data-dismiss="modal" aria-hidden="true">Tutup</button>
          <button type="submit" class="btn btn-primary">Simpan</button>
      </div>
    </form>
  </div>
</div>
</div>

<div class="modal fade" id="modal_edit_kelas_matkul" tabindex="-1" role="dialog" aria-labelledby="largeModal2" aria-hidden="true"></div>

<div class="modal fade" id="modal_detail_kelas_matkul" tabindex="-1" role="dialog" aria-labelledby="largeModal3" aria-hidden="true"></div>