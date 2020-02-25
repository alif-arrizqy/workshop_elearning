<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/*
| -------------------------------------------------------------------------
| URI ROUTING
| -------------------------------------------------------------------------
| This file lets you re-map URI requests to specific controller functions.
|
| Typically there is a one-to-one relationship between a URL string
| and its corresponding controller class/method. The segments in a
| URL normally follow this pattern:
|
|	example.com/class/method/id/
|
| In some instances, however, you may want to remap this relationship
| so that a different class/function is called than the one
| corresponding to the URL.
|
| Please see the user guide for complete details:
|
|	https://codeigniter.com/user_guide/general/routing.html
|
| -------------------------------------------------------------------------
| RESERVED ROUTES
| -------------------------------------------------------------------------
|
| There are three reserved routes:
|
|	$route['default_controller'] = 'welcome';
|
| This route indicates which controller class should be loaded if the
| URI contains no data. In the above example, the "welcome" class
| would be loaded.
|
|	$route['404_override'] = 'errors/page_missing';
|
| This route will tell the Router which controller/method to use if those
| provided in the URL cannot be matched to a valid route.
|
|	$route['translate_uri_dashes'] = FALSE;
|
| This is not exactly a route, but allows you to automatically route
| controller and method names that contain dashes. '-' isn't a valid
| class or method name character, so it requires translation.
| When you set this option to TRUE, it will replace ALL dashes in the
| controller and method URI segments.
|
| Examples:	my-controller/index	-> my_controller/index
|		my-controller/my-method	-> my_controller/my_method
*/

//Login Admin
$route['login'] = 'LoginDashboard';
$route['loginelearning'] = 'LoginDashboard/loginelearning';
$route['logininventaris'] = 'LoginDashboard/logininventaris';
$route['lupapass'] = 'LoginDashboard/lupapass';
$route['auth_admin_elearning'] = 'LoginDashboard/auth_admin_elearning';
$route['logout_admin_elearning'] = 'LoginDashboard/logout_admin_elearning';

//Dashboard Admin
$route['dashboard_admin'] = 'Main';
$route['profile_admin'] = 'Main/profile_admin';
$route['tampildata_admin/(:num)/(:num)'] = 'Main/tampildata_admin/$1/$2';
$route['ubah_profil/(:num)'] = 'Main/ubah_profil/$1';
$route['update_administrator_dahsboard'] = 'Main/update_administrator_dahsboard';
$route['hapusgambar/(:num)'] = 'Main/hapusgambar/$1';

//Login User
$route['loginelearningUser'] = 'LoginDashboard/loginelearningUser';
$route['save_user_akun'] = 'LoginDashboard/save_user_akun';
$route['lupapassUser'] = 'LoginDashboard/lupapassUser';
$route['auth_user_elearning'] = 'LoginDashboard/auth_user_elearning';
$route['logout_user_elearning'] = 'LoginDashboard/logout_user_elearning';

//Dashboard User
$route['dashboard_user'] = 'User';
$route['tampildata_user/(:num)/(:num)'] = 'User/tampildata_user/$1/$2';
$route['ubah_profil_user/(:num)'] = 'User/ubah_profil_user/$1';
$route['update_user_dahsboard'] = 'User/update_user_dahsboard';
$route['hapusgambar_user/(:num)'] = 'User/hapusgambar_user/$1';
$route['lihat_nilai_matkul/(:num)/(:num)'] = 'User/lihat_nilai_matkul/$1/$2';
$route['lihat_ajar/(:num)/(:any)'] = 'User/lihat_ajar/$1/$2';
$route['edit_absen_user/(:num)/(:num)'] = 'User/edit_absen_user/$1/$2';
$route['edit_nilai_user/(:num)/(:num)'] = 'User/edit_nilai_user/$1/$2';
$route['update_absensi_user'] = 'User/update_absensi';
$route['update_penilaian_user'] = 'User/update_penilaian';
$route['ambil_matkul_user/(:num)'] = 'User/ambil_matkul_mahasiswa_user/$1';
$route['save_ambil_matkul_user'] = 'User/save_ambil_matkul_user';
$route['v_asdos_user'] = 'User/v_asdos_user';

	//tabel administrator
	$route['v_administrator'] = 'Main/v_administrator';
	$route['add_administrator'] = 'Main/add_administrator';
	$route['save_administrator'] = 'Main/save_administrator';
	$route['edit_administrator/(:num)'] = 'Main/edit_administrator/$1';
	$route['update_administrator'] = 'Main/update_administrator';
	$route['detail_administrator/(:num)'] = 'Main/detail_administrator/$1';
	$route['delete_administrator/(:num)'] = 'Main/delete_administrator/$1';
	$route['delete_administrator_all'] = 'Main/delete_administrator_all';
	//tabel mahasiswa
	$route['v_mahasiswa'] = 'Main/v_mahasiswa';
	$route['add_mahasiswa'] = 'Main/add_mahasiswa';
	$route['save_mahasiswa'] = 'Main/save_mahasiswa';
	$route['edit_mahasiswa/(:num)'] = 'Main/edit_mahasiswa/$1';
	$route['update_mahasiswa'] = 'Main/update_mahasiswa';
	$route['detail_mahasiswa/(:num)'] = 'Main/detail_mahasiswa/$1';
	$route['delete_mahasiswa/(:num)'] = 'Main/delete_mahasiswa/$1';
	$route['delete_mahasiswa_all'] = 'Main/delete_mahasiswa_all';
	//tabel asdos
	$route['v_asdos'] = 'Main/v_asdos';
	$route['add_asdos'] = 'Main/add_asdos';
	$route['save_asdos'] = 'Main/save_asdos';
	$route['edit_asdos/(:num)'] = 'Main/edit_asdos/$1';
	$route['update_asdos'] = 'Main/update_asdos';
	$route['detail_asdos/(:num)'] = 'Main/detail_asdos/$1';
	$route['delete_asdos/(:num)'] = 'Main/delete_asdos/$1';
	$route['delete_asdos_all'] = 'Main/delete_asdos_all';
	//tabel matkul
	$route['v_matkul'] = 'Main/v_matkul';
	$route['add_matkul'] = 'Main/add_matkul';
	$route['save_matkul'] = 'Main/save_matkul';
	$route['edit_matkul/(:num)'] = 'Main/edit_matkul/$1';
	$route['update_matkul'] = 'Main/update_matkul';
	$route['detail_matkul/(:num)'] = 'Main/detail_matkul/$1';
	$route['delete_matkul/(:num)'] = 'Main/delete_matkul/$1';
	$route['delete_matkul_all'] = 'Main/delete_matkul_all';
	$route['ambil_matkul_mahasiswa/(:num)'] = 'Main/ambil_matkul_mahasiswa/$1';
	$route['save_ambil_matkul'] = 'Main/save_ambil_matkul';
	//tabel kelas matkul
	$route['v_kelas_matkul'] = 'Main/v_kelas_matkul';
	$route['add_kelas_matkul'] = 'Main/add_kelas_matkul';
	$route['save_kelas_matkul'] = 'Main/save_kelas_matkul';
	$route['edit_kelas_matkul/(:num)'] = 'Main/edit_kelas_matkul/$1';
	$route['update_kelas_matkul'] = 'Main/update_kelas_matkul';
	$route['detail_kelas_matkul/(:num)'] = 'Main/detail_kelas_matkul/$1';
	$route['delete_kelas_matkul/(:num)'] = 'Main/delete_kelas_matkul/$1';
	$route['delete_kelas_matkul_all'] = 'Main/delete_kelas_matkul_all';
	//tabel kelas mhs
	$route['v_kelas_mhs'] = 'Main/v_kelas_mhs';
	$route['add_kelas_mhs'] = 'Main/add_kelas_mhs';
	$route['save_kelas_mhs'] = 'Main/save_kelas_mhs';
	$route['edit_kelas_mhs/(:num)'] = 'Main/edit_kelas_mhs/$1';
	$route['update_kelas_mhs'] = 'Main/update_kelas_mhs';
	$route['detail_kelas_mhs/(:num)'] = 'Main/detail_kelas_mhs/$1';
	$route['delete_kelas_mhs/(:num)'] = 'Main/delete_kelas_mhs/$1';
	$route['delete_kelas_mhs_all'] = 'Main/delete_kelas_mhs_all';
	//tabel persentase
	$route['v_persentase_nilai'] = 'Main/v_persentase_nilai';
	$route['edit_persentase_nilai/(:num)'] = 'Main/edit_persentase_nilai/$1';
	$route['update_persentase_nilai'] = 'Main/update_persentase_nilai';
	//tabel qrcode
	$route['v_qrcode'] = 'Main/v_qrcode';
	$route['add_qrcode'] = 'Main/add_qrcode';
	$route['save_qrcode'] = 'Main/save_qrcode';
	$route['detail_qrcode/(:any)'] = 'Main/detail_qrcode/$1';
	$route['delete_qrcode_all'] = 'Main/delete_qrcode_all';
	//tabel session
	$route['v_session_akun'] = 'Main/v_session_akun';
	$route['delete_session_akun_all'] = 'Main/delete_session_akun_all';

	//tabel proses absen
	$route['v_absensi'] = 'Main/v_absensi';
	$route['absen_kelas_matkul/(:num)'] = 'Main/absen_kelas_matkul/$1';
	$route['absen_kelas/(:num)/(:any)'] = 'Main/absen_kelas/$1/$2';
	$route['edit_absen/(:num)/(:num)'] = 'Main/edit_absen/$1/$2';
	$route['update_absensi'] = 'Main/update_absensi';
	//tabel proses absen
	$route['v_penilaian'] = 'Main/v_penilaian';
	$route['nilai_kelas_matkul/(:num)'] = 'Main/nilai_kelas_matkul/$1';
	$route['nilai_kelas/(:num)/(:any)'] = 'Main/nilai_kelas/$1/$2';
	$route['edit_nilai/(:num)/(:num)'] = 'Main/edit_nilai/$1/$2';
	$route['update_penilaian'] = 'Main/update_penilaian';

$route['default_controller'] = 'LoginDashboard/loginelearningUser';
$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;
