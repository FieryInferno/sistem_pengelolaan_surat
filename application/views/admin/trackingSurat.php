<div class="container-fluid">
  <div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800"><?php echo $title ?></h1>
  </div>
  <div class="card">
    <div class="card-header"></div>
    <div class="card-body">
      <form action="<?= base_url(); ?>admin/tracking_surat" method="get">
        <div class="form-group">
          <label>No. Surat</label>
          <div class="row">
            <div class="col-4">
              <input type="text" name="no_surat" class="form-control">
            </div>
            <div class="col-2">
              <button type="submit" class="btn btn-primary">Lacak</button>
            </div>
          </div>
        </div>
      </form>
      <?php
        if (isset($status)) {
          echo $status;
        }
      ?>
    </div>
    <div class="card-footer"></div>
  </div>
</div>