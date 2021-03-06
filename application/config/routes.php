<?php
defined('BASEPATH') OR exit('No direct script access allowed');

$route['default_controller']    = 'login';
$route['404_override']          = '';
$route['translate_uri_dashes']  = FALSE;

$route['admin/surat_keluar']              = 'admin/SuratKeluar';
$route['admin/surat_keluar/(:any)']       = 'admin/SuratKeluar/tambahData/$1';
$route['admin/surat_keluar/ubah/(:any)']  = 'admin/SuratKeluar/edit/$1';
$route['admin/surat_keluar/kirim/(:any)'] = 'admin/SuratKeluar/kirim/$1';
$route['admin/surat_keluar/hapus/(:any)'] = 'admin/SuratKeluar/hapus/$1';
$route['admin/surat_masuk']               = 'admin/SuratMasuk';
$route['admin/surat_masuk/upload']        = 'admin/SuratMasuk/tambahData';
$route['admin/surat_masuk/ubah/(:any)']   = 'admin/SuratMasuk/edit/$1';
$route['admin/surat_masuk/hapus/(:any)']  = 'admin/SuratMasuk/hapus/$1';
$route['admin/tracking_surat']            = 'admin/SuratMasuk/tracking';
$route['admin/user/tambah']               = 'admin/user/tambahData';
$route['admin/kelola_staff']              = 'admin/Staff';
$route['admin/kelola_staff/tambah']       = 'admin/Staff/tambah';
$route['admin/kelola_staff/hapus/(:any)'] = 'admin/Staff/hapus/$1';
$route['admin/kelola_staff/ubah/(:any)']  = 'admin/Staff/edit/$1';
$route['admin/pilih_subseksi']            = 'admin/user/pilihSubseksi';
$route['admin/buat_surat_keluar']         = 'admin/SuratKeluar/buatSurat';
$route['admin/nomor_surat']               = 'admin/SuratKeluar/nomorSurat';
$route['admin/cek_nomor_surat']           = 'admin/SuratKeluar/cekNomorSurat';

$route['kepala_p3d']                              = 'kepala_p3d/Dashboard';
$route['kepala_p3d/surat']                        = 'kepala_p3d/Surat';
$route['kepala_p3d/disposisi']                    = 'kepala_p3d/Surat/disposisi';
$route['kepala_p3d/pengajuan_surat']              = 'kepala_p3d/Surat/pengajuan';
$route['kepala_p3d/pengajuan_surat/tambah']       = 'kepala_p3d/Surat/tambahPengajuan';
$route['kepala_p3d/pengajuan_surat/hapus/(:any)'] = 'staff/Surat/hapus/$1';

$route['kepala_seksi']                              = 'kepala_seksi/Dashboard';
$route['kepala_seksi/disposisi']                    = 'kepala_seksi/Surat/disposisi';
$route['kepala_seksi/pengajuan_surat']              = 'kepala_seksi/Surat/pengajuan';
$route['kepala_seksi/pengajuan_surat/tambah']       = 'kepala_seksi/Surat/tambahPengajuan';
$route['kepala_seksi/pengajuan_surat/hapus/(:any)'] = 'kepala_seksi/Surat/hapus/$1';

$route['staff']                               = 'staff/Dashboard';
$route['staff/surat']                         = 'staff/Surat';
$route['staff/surat/tindaklanjuti']           = 'staff/Surat/tindaklanjuti';
$route['staff/pengajuan_surat']               = 'staff/Surat/pengajuan';
$route['staff/pengajuan_surat/tambah']        = 'staff/Surat/tambahPengajuan';
$route['staff/pengajuan_surat/hapus/(:any)']  = 'staff/Surat/hapus/$1';