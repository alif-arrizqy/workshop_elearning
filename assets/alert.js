const flashData = $('.flash-data').data('flashdata');
if(flashData){
	Swal.fire({
		title : 'Pemberitahuan',
		text : flashData,
		type : 'success'
	});
}

const SUKSES = $('.flash-data-success').data('sukses');
console.log(SUKSES);
if(SUKSES){
	Swal.fire({
		title : 'Pemberitahuan',
		text : SUKSES,
		type : 'success'
	});
}

const GAGAL = $('.flash-data-failed').data('gagal');
console.log(GAGAL);
if(GAGAL){
	Swal.fire({
		title : 'Pemberitahuan',
		text : GAGAL,
		type : 'error'
	});
}