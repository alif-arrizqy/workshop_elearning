<br>
<?php
	$kalimat = "Sistem Pemrograman Mikroprosessor Malam A";
	$data_explode = explode(" ", $kalimat);
	foreach ($data_explode as $key => $value) {
		$sub_kalimat = substr($value,0,3);
		$hasil[$key] = $sub_kalimat;
	}
	$data_implode = implode("", $hasil);
	echo $data_implode;

	echo strlen($kalimat);
	echo substr($kalimat,-1);
?>