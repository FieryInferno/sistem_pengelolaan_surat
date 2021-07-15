<!DOCTYPE html>
<html lang="en">
<meta http-equiv="content-type" content="text/html;charset=UTF-8" />
<head>
	<title><?= $this->input->post('no_surat'); ?></title>
  <link rel="stylesheet" href="<?= base_url(); ?>assets/print.min.css">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
  <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
</head>
<body>
  <img src="<?= base_url(); ?>assets/img/kop_surat.png" alt="" width="100%">
  <div class="text-right">Subang, 
    <?php 
      function tgl_indo($tanggal){
        $bulan = array (
          1 =>   'Januari',
          'Februari',
          'Maret',
          'April',
          'Mei',
          'Juni',
          'Juli',
          'Agustus',
          'September',
          'Oktober',
          'November',
          'Desember'
        );
        $pecahkan = explode('-', $tanggal);
        return $pecahkan[2] . ' ' . $bulan[ (int)$pecahkan[1] ] . ' ' . $pecahkan[0];
      }
      echo tgl_indo($this->input->post('tanggal')); ?></div>
  <table width="100%">
    <tr>
      <td width="66%">No. Surat &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;: <?= $this->input->post('no_surat'); ?></td>
      <td class="text-center">Kepada</td>
    </tr>
  </table>
  <table width="100%">
    <tr>
      <td width="68%">Lampiran &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;: - </td>
      <td class="text-center">Yth. <?= $this->input->post('tujuan'); ?></td>
    </tr>
  </table>
  <table width="100%">
    <tr>
      <td width="60%">Perihal &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;: <?= $this->input->post('perihal'); ?></td>
      <td class="text-center">Di</td>
    </tr>
  </table>
  <table width="100%">
    <tr>
      <td width="80%"></td>
      <td class="text-center">Tempat</td>
    </tr>
  </table>
  <br>
  <?= $this->input->post('isi'); ?>
  
  <table>
    <tr>
      <td width="450px"></td>
      <td class="text-center">An.Kepala Pusat Pengelolaan Pendapatan Daerah</td>
    </tr>
    <tr>
      <td></td>
      <td class="text-center">Wilayah Kabupaten Subang</td>
    </tr>
    <tr>
      <td></td>
      <td class="text-center">Kasubbag Tata Usaha</td>
    </tr>
    <tr>
      <td></td>
      <td class="text-center">&nbsp;</td>
    </tr>
    <tr>
      <td></td>
      <td class="text-center">&nbsp;</td>
    </tr>
    <tr>
      <td></td>
      <td class="text-center">&nbsp;</td>
    </tr>
    <tr>
      <td></td>
      <td class="text-center">&nbsp;</td>
    </tr>
    <tr>
      <td></td>
      <td class="text-center"><strong>Drs. YAYA SUDIA, MM</strong></td>
    </tr>
    <tr>
      <td></td>
      <td class="text-center"><strong>Pembina</strong></td>
    </tr>
    <tr>
      <td></td>
      <td class="text-center"><strong>NIP. 19660606 199303 1 012</strong></td>
    </tr>
  </table>
</body>
</html>