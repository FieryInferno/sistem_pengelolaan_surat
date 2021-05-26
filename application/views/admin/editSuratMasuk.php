<div class="container-fluid">

          <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800"><?php echo $title ?></h1>
          </div>


<div class="card" style="width: 60%; margin-bottom: 100px">
  <div class="card-body">

    <?php foreach ($masuk as $m): ?>
    <form method="POST" action="<?php echo base_url('admin/SuratMasuk/updateDataAksi/' . $m->Nomor_Surat) ?>">

    <div class="form-group">
      <label>Nomor Surat</label>
      <input type="hidden" name="Nomor_Surat" class="form-control" value="<?php echo $m->Nomor_Surat?>">
      <input type="number" name="Nomor_Surat" class="form-control" value="<?php echo $m->Nomor_Surat ?>">
      <?php echo form_error('Nomor_Surat','<div class="text-small  text-danger"></div>') ?>

    </div>

    <div class="form-group">
      <label>Tanggal Surat</label>
      <input type="date" name="Tanggal_Surat" class="form-control" value="<?php echo $m->Tanggal_Surat ?>">
      <?php echo form_error('Tanggal_Surat','<div class="text-small text-danger"></div>') ?>

    </div>

    <div class="form-group">
      <label>Surat Dari</label>
      <input type="text" name="Surat_Dari" class="form-control" value="<?php echo $m->Surat_Dari ?>">
      <?php echo form_error('Surat_Dari','<div class="text-small text-danger"></div>') ?>

    </div>

    <div class="form-group">
      <label>Tanggal Diterima</label>
      <input type="date" name="Tanggal_Diterima" class="form-control" value="<?php echo $m->Tanggal_Diterima ?>">
      <?php echo form_error('Tanggal_Diterima','<div class="text-small text-danger"></div>') ?>

    </div>

    <div class="form-group">
      <label>Perihal</label>
      <input type="text" name="Perihal" class="form-control" value="<?php echo $m->Perihal ?>">
      <?php echo form_error('Perihal','<div class="text-small text-danger"></div>') ?>

    </div>

    <button type="submit" class="btn btn-success">Update</button>
          
      </form>
    <?php endforeach; ?>
  </div>
</div>

</div>