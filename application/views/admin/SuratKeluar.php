<div class="container-fluid">
  <div class="card mb-4">
    <div class="card-body">
      <div class="d-sm-flex align-items-center justify-content-between">
        <h1 class="h3 mb-0 text-gray-800"><?php echo $title ?></h1>
      </div>
    </div>
  </div>
  <div class="card">
    <div class="card-header">
      <a class="btn btn-sm btn-success mb-3" href="<?php echo base_url('admin/buat_surat_keluar') ?>">
        <i class="fas fa-plus"> Buat Surat</i>
      </a>
      <a class="btn btn-sm btn-primary mb-3" href="<?= base_url(); ?>admin/SuratKeluar/print" target="_blank">Cetak Laporan</a>
    </div>
    <div class="card-body">
      <?php echo $this->session->flashdata('pesan') ?>
      <form action="<?= base_url(); ?>admin/surat_keluar" method="get" class="mb-4">
        <div class="row">
          <div class="col-4">
            <select name="bulan" id="bulan" class="form-control">
              <option>Pilih Bulan</option>
              <option value="01">Januari</option>
              <option value="02">Februari</option>
              <option value="03">Maret</option>
              <option value="04">April</option>
              <option value="05">Mei</option>
              <option value="06">Juni</option>
              <option value="07">Juli</option>
              <option value="08">Agustus</option>
              <option value="09">September</option>
              <option value="10">Oktober</option>
              <option value="11">November</option>
              <option value="12">Desember</option>
            </select>
          </div>
          <div class="col-2">
            <button type="submit" class="btn btn-primary"><i class="fas fa-filter"></i> Filter</button>
          </div>
        </div>
      </form>
      <table class="table table-bordered table-striped mt-2" id="myTable">
        <thead>
          <tr>
            <th class ="text-center">No</th>
            <th class ="text-center">Nomor Surat</th>
            <th class ="text-center">Tanggal Surat</th>
            <th class ="text-center">Perihal</th>
            <th class ="text-center">Tujuan</th>
            <th class ="text-center">Isi</th>
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
                <td><?php echo $m['isi'] ?></td>
                <td>
                  <?php
                    switch ($m['status']) {
                      case '0': ?>
                        <a href="<?= base_url('admin/surat_keluar/' . $m['id_pengajuan_surat_keluar']); ?>" class="btn btn-primary">Buat Surat</a>
                        <?php break;
                      case '1': ?>
                        <a href="<?= base_url('admin/surat_keluar/edit/' . $m['id_pengajuan_surat_keluar']); ?>" class="btn btn-primary">Edit</a>
                        <a href="<?= base_url('assets/' . $m['file']); ?>" class="btn btn-primary" target="_blank"><i class="fas fa-eye"></i></a>
                        <a href="<?= base_url('admin/surat_keluar/kirim/' . $m['id_pengajuan_surat_keluar']); ?>" class="btn btn-primary">Kirim</a>
                        <?php break;

                      case '2': ?>
                        <a href="<?= base_url('assets/' . $m['file']); ?>" class="btn btn-primary" target="_blank"><i class="fas fa-eye"></i></a>
                        <?php break;
                      
                      default: ?>
                        <button type="button" class="btn btn-primary" disabled>Sudah Ditindaklanjuti</button>
                        <?php break;
                    }
                    if ($m['id_staff'] == NULL && $m['kepala_p3d'] == NULL && $m['kepala_seksi'] == NULL) { ?>
                      <a href="<?= base_url('admin/surat_keluar/hapus/' . $m['id_pengajuan_surat_keluar']); ?>" class="btn btn-danger">Hapus</a>
                    <?php }
                  ?>
                </td>
              </tr>
            <?php endforeach; 
          ?>
        </tbody>
      </table>
    </div>
  </div>
</div>