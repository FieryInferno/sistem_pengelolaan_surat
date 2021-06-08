<?php
defined('BASEPATH') OR exit('No direct script access allowed');

$route['default_controller']    = 'welcome';
$route['404_override']          = '';
$route['translate_uri_dashes']  = FALSE;

$route['admin/surat_keluar']              = 'admin/SuratKeluar';
$route['admin/surat_keluar/(:any)']       = 'admin/SuratKeluar/tambahData/$1';
$route['admin/surat_keluar/edit/(:any)']  = 'admin/SuratKeluar/edit/$1';
$route['admin/surat_masuk']               = 'admin/SuratMasuk';
$route['admin/surat_masuk/upload']        = 'admin/SuratMasuk/tambahData';
$route['admin/surat_masuk/edit/(:any)']   = 'admin/SuratMasuk/edit/$1';
$route['admin/surat_masuk/hapus/(:any)']  = 'admin/SuratMasuk/hapus/$1';
$route['admin/tracking_surat']            = 'admin/SuratMasuk/tracking';
$route['admin/user/tambah']               = 'admin/user/tambahData';

$route['kepala_p3d']            = 'kepala_p3d/Dashboard';
$route['kepala_p3d/surat']      = 'kepala_p3d/Surat';
$route['kepala_p3d/disposisi']  = 'kepala_p3d/Surat/disposisi';

$route['kepala_seksi']            = 'kepala_seksi/Dashboard';
$route['kepala_seksi/disposisi']  = 'kepala_seksi/Surat/disposisi';

$route['staff']                               = 'staff/Dashboard';
$route['staff/surat']                         = 'staff/Surat';
$route['staff/surat/tindaklanjuti']           = 'staff/Surat/tindaklanjuti';
$route['staff/pengajuan_surat']               = 'staff/Surat/pengajuan';
$route['staff/pengajuan_surat/tambah']        = 'staff/Surat/tambahPengajuan';
$route['staff/pengajuan_surat/hapus/(:any)']  = 'staff/Surat/hapus/$1';