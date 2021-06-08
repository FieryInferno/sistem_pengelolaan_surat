<div class="container-fluid">
  <div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800"><?php echo $title ?></h1>
  </div>
  <a class="btn btn-sm btn-success mb-3" href="<?php echo base_url('admin/surat_masuk/upload') ?>">
    <i class="fas fa-plus"> Upload Surat</i>
  </a>
  <a class="btn btn-sm btn-primary mb-3" href="<?= base_url(); ?>admin/SuratKeluar/print">Cetak Laporan</a>
  <?php
    if ($this->session->pesan) {
      echo $this->session->pesan;
    }
  ?>
  <table class="table table-bordered table-striped mt-2" id="myTable">
    <thead>
      <tr>
        <th class ="text-center">No</th>
        <th class ="text-center">Nomor Surat</th>
        <th class ="text-center">Pengirim</th>
        <th class ="text-center">Tanggal Surat</th>
        <th class ="text-center">Perihal</th>
        <th class ="text-center">Aksi</th>
      </tr>
    </thead>
    <tbody>
      <?php 
        $no=1; 
        foreach ($surat as $m) : ?>
        <tr>
          <td><?php echo $no++ ?></td>
          <td><?php echo $m['no_surat'] ?></td>
          <td><?php echo $m['pengirim'] ?></td>
          <td><?php echo $m['tanggal'] ?></td>
          <td><?php echo $m['perihal'] ?></td>
          <td>
            <a href="<?= base_url('assets/' . $m['file']); ?>" class="btn btn-primary"><i class="fas fa-eye"></i></a>
            <a href="<?= base_url('admin/surat_masuk/edit/' . $m['id_surat_masuk']); ?>" class="btn btn-primary"><i class="fas fa-pencil-alt"></i></a>
            <a href="<?= base_url('admin/surat_masuk/hapus/' . $m['id_surat_masuk']); ?>" class="btn btn-danger"><i class="fas fa-trash-alt"></i></a>
          </td>
        </tr>
      <?php endforeach; ?>
    </tbody>
  </table>
</div>