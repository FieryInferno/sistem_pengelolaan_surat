<div class="container-fluid">
  <div class="d-sm-flex align-items-center justify-contetnt-between mb-4">
    <h1 class="h3 mb-0 text-gray-800"><?php echo $title ?></h1>
  </div>
  <div class="card" style="width: 60%;">
    <div class="card-body">
      <form method="POST" action="<?php echo base_url('admin/surat_masuk/edit/' . $id_surat_masuk) ?>" enctype="multipart/form-data">
        <div class="form-group">
          <label>Nomor Surat</label>
          <input type="text" name="no_surat" class="form-control" value="<?= $no_surat; ?>">
          <?php echo form_error('Nomor_Surat','<div class="text-small text-danger"></div') ?>
        </div>
        <div class="form-group">
          <label>Tanggal Surat</label>
          <input type="date" name="tanggal" class="form-control" value="<?= $tanggal; ?>">
          <?php echo form_error('Tanggal_Surat','<div class="text-small text-danger"></div') ?>
        </div>
        <div class="form-group">
          <label>Pengirim</label>
          <input type="text" name="pengirim" class="form-control" value="<?= $pengirim; ?>">
          <?php echo form_error('Surat_Dari','<div class="text-small text-danger"></div') ?>
        </div>
        <div class="form-group">
          <label>Perihal</label>
          <input type="text" name="perihal" class="form-control" value="<?= $perihal; ?>">
          <?php echo form_error('Perihal','<div class="text-small text-danger"></div') ?>
        </div>
        <div class="form-group">
          <label>Tujuan</label>
          <input type="text" name="tujuan" class="form-control" value="<?= $tujuan; ?>">
          <?php echo form_error('Perihal','<div class="text-small text-danger"></div') ?>
        </div>
        <div class="form-group">
          <label>File Surat (pdf)</label>
          <input type="file" name="file" class="form-control">
          <input type="hidden" name="file_old" value="<?= $file; ?>">
        </div>
        <button type="submit" class="btn btn-success">Submit</button>
      </form>
    </div>
  </div>
</div>