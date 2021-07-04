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
  <div class="container-fluid">
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
      <h1 class="h3 mb-0 text-gray-800 text-center">Laporan Surat Keluar</h1>
    </div>
    <table class="table table-bordered table-striped mt-2" id="myTable">
      <thead>
        <tr>
          <th class ="text-center">No</th>
          <th class ="text-center">Nomor Surat</th>
          <th class ="text-center">Tanggal Surat</th>
          <th class ="text-center">Perihal</th>
          <th class ="text-center">Tujuan</th>
        </tr>
      </thead>
      <tbody>
        <?php 
          $no=1; 
          foreach ($keluar as $m) : ?>
            <tr>
              <td><?php echo $no++ ?></td>
              <td><?php echo $m['no_surat'] ?></td>
              <td><?php echo $m['tanggal'] ?></td>
              <td><?php echo $m['perihal'] ?></td>
              <td><?php echo $m['tujuan'] ?></td>
            </tr>
          <?php endforeach; 
        ?>
      </tbody>
    </table>
  </div>
</body>
</html>