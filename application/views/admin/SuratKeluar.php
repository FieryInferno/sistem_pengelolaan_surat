<div class="container-fluid">
  <div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800"><?php echo $title ?></h1>
  </div>
  <a class="btn btn-sm btn-primary mb-3" href="<?= base_url(); ?>admin/SuratKeluar/print" target="_blank">Cetak Laporan</a>
  <?php echo $this->session->flashdata('pesan') ?>
  <table class="table table-bordered table-striped mt-2" id="myTable">
    <thead>
      <tr>
        <th class ="text-center">No</th>
        <th class ="text-center">Nomor Surat</th>
        <th class ="text-center">Tanggal Surat</th>
        <th class ="text-center">Perihal</th>
        <th class ="text-center">Tujuan</th>
        <th class ="text-center">Aksi</th>
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
            <td>
              <?php
                switch ($m['status']) {
                  case '0': ?>
                    <a href="<?= base_url('admin/surat_keluar/' . $m['id_pengajuan_surat_keluar']); ?>" class="btn btn-primary">Buat Surat</a>
                    <?php break;
                  case '1': ?>
                    <a href="<?= base_url('assets/' . $m['file']); ?>" class="btn btn-primary" target="_blank"><i class="fas fa-eye"></i></a>
                    <?php break;
                  
                  default: ?>
                    <button type="button" class="btn btn-primary" disabled>Sudah Ditindaklanjuti</button>
                    <?php break;
                }
              ?>
            </td>
          </tr>
        <?php endforeach; 
      ?>
    </tbody>
  </table>
</div>