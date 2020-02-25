var base_url = "http://localhost/WRK_ELEARNING/";

//Sweet Alert
$('.logout').on('click', function(e){
  e.preventDefault();
  const href = $(this).attr('href');

  Swal.fire({
    title: 'Apakah anda yakin ingin keluar ?',
    text: 'Keluar Dari Dashboard',
    type: 'warning',
    showCancelButton: true,
    confirmButtonColor: '#3085d6',
    cancelButtonColor: '#d33',
    confirmButtonText: 'Keluar',
    cancelButtonText: 'Tidak'
  }).then((result) => {
    if (result.value) {
      Swal.fire(
        'Keluar',
        'Selamat Tinggal',
        'success'
      )
      document.location.href = href;
    }
  });
});

$('a#hapus').on('click', function(e){
  e.preventDefault();
  const href = $(this).attr('href');

  Swal.fire({
    title: 'Apakah anda yakin ingin menghapus data ini ?',
    text: '',
    type: 'warning',
    showCancelButton: true,
    confirmButtonColor: '#3085d6',
    cancelButtonColor: '#d33',
    confirmButtonText: 'Hapus',
    cancelButtonText: 'Tidak'
  }).then((result) => {
    if (result.value) {
      Swal.fire(
        'Pemberitahuan',
        'Data Berhasil DiHapus !!! Terimakasih ..',
        'success'
      )
      document.location.href = href;
    }
  });
});

//----------------------------------------------------------------------------------------------//

//Modal 
$(document).ready(function(){
  $('#adminprofile').click(function(){
    var url = $(this).attr('href');
    $.ajax({
      url : url,
      success:function(response){
        $('#modal_admin').html(response);
      }
    });
  });
});

$(document).ready(function(){
  $('#userprofile').click(function(){
    var url = $(this).attr('href');
    $.ajax({
      url : url,
      success:function(response){
        $('#modal_user').html(response);
      }
    });
  });
});
//----------------------------------------------------------------------------------------------//

  //Administrator
  $(document).ready(function(){
    $('a#ubah_admin').click(function(){
      var url = $(this).attr('href');
      $.ajax({
        url : url,
        success:function(response){
          $('#modal_edit_admin').html(response);
        }
      });
    });
  });

  $(document).ready(function(){
    $('a#detail_admin').click(function(){
      var url = $(this).attr('href');
      $.ajax({
        url : url,
        success:function(response){
          $('#modal_detail_admin').html(response);
        }
      });
    });
  });
//----------------------------------------------------------------------------------------------//

  //Mahasiswa
  $(document).ready(function(){
    $('a#ubah_mahasiswa').click(function(){
      var url = $(this).attr('href');
      $.ajax({
        url : url,
        success:function(response){
          $('#modal_edit_mahasiswa').html(response);
        }
      });
    });
  });

  $(document).ready(function(){
    $('a#detail_mahasiswa').click(function(){
      var url = $(this).attr('href');
      $.ajax({
        url : url,
        success:function(response){
          $('#modal_detail_mahasiswa').html(response);
        }
      });
    });
  });

  $(document).ready(function(){
    $('a#ambil_matkul').click(function(){
      var url = $(this).attr('href');
      $.ajax({
        url : url,
        success:function(response){
          $('#modal_ambil_matkul').html(response);
        }
      });
    });
  });
//----------------------------------------------------------------------------------------------//

  //Asisten Dosen
  $(document).ready(function(){
    $('a#ubah_asdos').click(function(){
      var url = $(this).attr('href');
      $.ajax({
        url : url,
        success:function(response){
          $('#modal_edit_asdos').html(response);
        }
      });
    });
  });

  $(document).ready(function(){
    $('a#detail_asdos').click(function(){
      var url = $(this).attr('href');
      $.ajax({
        url : url,
        success:function(response){
          $('#modal_detail_asdos').html(response);
        }
      });
    });
  });
//----------------------------------------------------------------------------------------------//

  //Mata Kuliah
  $(document).ready(function(){
    $('a#ubah_matakul').click(function(){
      var url = $(this).attr('href');
      $.ajax({
        url : url,
        success:function(response){
          $('#modal_edit_matakul').html(response);
        }
      });
    });
  });

  $(document).ready(function(){
    $('a#detail_matakul').click(function(){
      var url = $(this).attr('href');
      $.ajax({
        url : url,
        success:function(response){
          $('#modal_detail_matakul').html(response);
        }
      });
    });
  });
//----------------------------------------------------------------------------------------------//

  //Kelas Mata Kuliah
  $(document).ready(function(){
    $('a#ubah_kelas_matkul').click(function(){
      var url = $(this).attr('href');
      $.ajax({
        url : url,
        success:function(response){
          $('#modal_edit_kelas_matkul').html(response);
        }
      });
    });
  });

  $(document).ready(function(){
    $('a#detail_kelas_matkul').click(function(){
      var url = $(this).attr('href');
      $.ajax({
        url : url,
        success:function(response){
          $('#modal_detail_kelas_matkul').html(response);
        }
      });
    });
  });
//----------------------------------------------------------------------------------------------//
  
  //Persentase Nilai
  $(document).ready(function(){
    $('a#ubah_persentase').click(function(){
      var url = $(this).attr('href');
      $.ajax({
        url : url,
        success:function(response){
          $('#modal_edit_persentase').html(response);
        }
      });
    });
  });
//----------------------------------------------------------------------------------------------//

  //Persentase Nilai
  $(document).ready(function(){
    $('a#detail_qrcode').click(function(){
      var url = $(this).attr('href');
      $.ajax({
        url : url,
        success:function(response){
          $('#modal_detail_qrcode').html(response);
        }
      });
    });
  });
//----------------------------------------------------------------------------------------------//

  //Absensi
  $(document).ready(function(){
    $('a#ubah_absen').click(function(){
      var url = $(this).attr('href');
      $.ajax({
        url : url,
        success:function(response){
          $('#modal_edit_absen').html(response);
        }
      });
    });
  });
//----------------------------------------------------------------------------------------------//

  //Nilai
  $(document).ready(function(){
    $('a#ubah_nilai').click(function(){
      var url = $(this).attr('href');
      $.ajax({
        url : url,
        success:function(response){
          $('#modal_edit_nilai').html(response);
        }
      });
    });
  });
//----------------------------------------------------------------------------------------------//

  //Absensi & Nilai User
  $(document).ready(function(){
    $('a#ubah_absen_user').click(function(){
      var url = $(this).attr('href');
      $.ajax({
        url : url,
        success:function(response){
          $('#modal_edit_absen_user').html(response);
        }
      });
    });
  });

  $(document).ready(function(){
    $('a#ubah_nilai_user').click(function(){
      var url = $(this).attr('href');
      $.ajax({
        url : url,
        success:function(response){
          $('#modal_edit_nilai_user').html(response);
        }
      });
    });
  });

  $(document).ready(function(){
    $('a#ambilmatkuluser').click(function(){
      var url = $(this).attr('href');
      $.ajax({
        url : url,
        success:function(response){
          $('#modal_ambil_matkul_user').html(response);
        }
      });
    });
  });
//----------------------------------------------------------------------------------------------//

//Tambahan Javascript
  function toggle(next) { 
    checkboxes = document.getElementsByName('pilih[]'); 
    for(var i=0, n=checkboxes.length;i<n;i++) { 
        checkboxes[i].checked = next.checked; 
    } 
  }

  $('.inputTgl').datetimepicker({
      format: 'DD-MM-YYYY',
  });

  $('.inputMulai').datetimepicker({
      format: 'HH:mm',
  });

  $('.inputSelesai').datetimepicker({
      format: 'HH:mm',
  });

  function validAngkatelp(a)
  {
    if(!/^[0-9.]+$/.test(a.value))
    {
    a.value = a.value.substring(0,a.value.length-1000);
    }
  }

  $(document).ready(function () {
    $(".toggle-password-admin").click(function() {
      $(this).toggleClass("fa-eye fa-eye-slash");
      var input = $($(this).attr("toggle"));
      if (input.attr("type") == "password") {
        input.attr("type", "text");
      } else {
        input.attr("type", "password");
      }
    });
  });

  function passwordStrength(p){
  	var status = document.getElementById('status');
  	var status1 = document.getElementById('status1');
    var status2 = document.getElementById('status2');
   	var regex = new Array();
   	regex.push("[A-Z]");
   	regex.push("[a-z]");
   	regex.push("[0-9]");
   
   	var passed = 0;
    	for(var x = 0; x < regex.length;x++){
    		if(new RegExp(regex[x]).test(p)){
     			console.log(passed++);
    		}
   		}

   	var strength = null;
   	var color = null;

   	switch(passed){
    	case 0:
    	case 1:
     		strength = "Tidak Aman";
     		color = "#FF3232";
    	break;
    	case 2:
  	   	strength = "Cukup Aman";
  	   	color = "#E1D441";
    	break;
    	case 3:
     		strength = "Sangat Aman";
     		color = "#27D644";
    	break;
    	case 4:
    	break;
   	}
   	status.innerHTML = strength;
   	status.style.color = color;
   	status1.innerHTML = strength;
   	status1.style.color = color;
    status2.innerHTML = strength;
    status2.style.color = color;
  }

  function passToggle(){
    var pass = document.getElementById('inputPassword');
    var showbtn = document.getElementById('show');
    if(pass.type == 'password'){
      pass.type = 'text';
      showbtn.innerHTML = '<span class="fa fa-eye-slash"></span> Sembunyikan';
    }else{
      pass.type = 'password';
      showbtn.innerHTML = '<span class="fa fa-eye"></span> Lihat Password'; 
    }

    var pass1 = document.getElementById('inputPassword1');
    var showbtn1 = document.getElementById('show1');
    if(pass1.type == 'password'){
      pass1.type = 'text';
      showbtn1.innerHTML = '<span class="fa fa-eye-slash"></span> Sembunyikan';
    }else{
      pass1.type = 'password';
      showbtn1.innerHTML = '<span class="fa fa-eye"></span> Lihat Password'; 
    }

    var pass2 = document.getElementById('inputPassword2');
    var showbtn2 = document.getElementById('show2');
    if(pass2.type == 'password'){
      pass2.type = 'text';
      showbtn2.innerHTML = '<span class="fa fa-eye-slash"></span> Sembunyikan';
    }else{
      pass2.type = 'password';
      showbtn2.innerHTML = '<span class="fa fa-eye"></span> Lihat Password'; 
    }
  }

  function myFunction() {
    var data = document.getElementById("akses");
    var x = document.getElementById("asdos");
    var y = document.getElementById("alumni");
    if(data.value == '2'){
      x.style.display = "block";
      y.style.display = "none";
    }else if(data.value == '4'){
      x.style.display = "none";
      y.style.display = "block";
    }else if(data.value == '0'){
      x.style.display = "none";
      y.style.display = "none";
    }
  }

  function myFunction1() {
    var data1 = document.getElementById("level");
    var p = document.getElementById("asd");
    var q = document.getElementById("almn");
    if(data1.value == '2'){
      p.style.display = "block";
      q.style.display = "none";
    }else if(data1.value == '4'){
      p.style.display = "none";
      q.style.display = "block";
    }else if(data1.value == '0'){
      p.style.display = "none";
      q.style.display = "none";
    }
    console.log(data1.value);
  }

  function MySemester() {
    var datasemester = document.getElementById("semester");
    var ganjil = document.getElementById("ganjil");
    var genap = document.getElementById("genap");
    var tombol = document.getElementById("ambil-kelas");
    if(datasemester.value == '1'){
      ganjil.style.display = "block";
      genap.style.display = "none";
      tombol.disabled = false;
    }else if(datasemester.value == '2'){
      ganjil.style.display = "none";
      genap.style.display = "block";
      tombol.disabled = false;
    }else if(datasemester.value == '0'){
      ganjil.style.display = "none";
      genap.style.display = "none";
      tombol.disabled = true;
    }
    console.log(datasemester.value);
  }

  function tampil(status) {
    if(document.getElementById("lihat").checked == true){  
      document.getElementById("myfoto").disabled = status;  
    }else{
      document.getElementById("myfoto").disabled = status;
    }
    // var foto = document.getElementById('foto');
    var text = document.getElementById('text');
    if(status == true){
      text.innerHTML = 'Lihat';
      foto.disabled = true;
    }else{
      text.innerHTML = 'Sembunyi';
      foto.disabled = false;
    }
    console.log(status);
  }

  $("#inputMatkul").change(function(){
    var id_matkul = $("#inputMatkul").val();
    $.ajax({
      url : base_url + "Main/GetKelas",
      method : "GET",
      data : {id_matkul:id_matkul},
      async : false,
      dataType : 'json',
      success: function(data){
          var html = '';
          var i;
          html += '<option value="" selected disabled>=== Kelas ===</option>';
          for(i=0; i<data.length; i++){
              html += '<option value='+data[i].id_kelas_matkul+'>'+data[i].kelas+'</option>';
          }
          $('#inputKelas').html(html);
      }
    });
  });
//----------------------------------------------------------------------------------------------//

  //Datatables
  $(document).ready(function() {
    $('#datatable-responsive-genap').DataTable({
      responsive: {
          details: false
      }
    });
    
    $('#datatable-responsive-ganjil').DataTable({
      responsive: {
          details: false
      }
    });

    $('#datatable-responsive-genap-malam').DataTable({
      responsive: {
          details: false
      }
    });
    
    $('#datatable-responsive-ganjil-malam').DataTable({
      responsive: {
          details: false
      }
    });

    $('#datatable-responsive-absen').DataTable();
    $('#datatable-responsive-nilai').DataTable();
    $('#datatableALL').DataTable();
  });
//----------------------------------------------------------------------------------------------//
