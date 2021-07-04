<div class="container-fluid">
  <div class="d-sm-flex align-items-center justify-contetnt-between mb-4">
    <h1 class="h3 mb-0 text-gray-800"><?php echo $title ?></h1>
  </div>
  <div class="card" style="width: 60%;">
    <div class="card-body">
      <form method="POST" action="<?php echo base_url('admin/kelola_staff/tambah') ?>">
        <div class="form-group">
          <label>NIP</label>
          <input type="text" name="nip" class="form-control">
        </div>
        <div class="form-group">
          <label>Nama</label>
          <input type="text" name="nama" class="form-control">
        </div>
        <div class="form-group">
          <label>Username</label>
          <input type="text" name="username" class="form-control">
          <?php echo form_error('username','<div class="text-small text-danger"></div') ?>
        </div>
        <div class="form-group">
          <label>Password</label>
          <input type="password" name="password" class="form-control">
          <?php echo form_error('password','<div class="text-small text-danger"></div') ?>
        </div>
        <div class="form-group">
          <label>Role</label>
          <select name="role" class="form-control">
            <option>Pilih Role</option>
            <option value="admin">Admin</option>
            <option value="kepala_p3d">Kepala P3D</option>
            <option value="kepala_seksi">Kepala Seksi</option>
            <option value="staff">Staff</option>
          </select>
          <?php echo form_error('role','<div class="text-small text-danger"></div') ?>
        </div>
        <div class="form-group">
          <label>Seksi</label>
          <select name="id_seksi" class="form-control" onchange="pilihSubseksi(this)">
            <option>Pilih Seksi</option>
            <?php
              foreach ($seksi as $key) { ?>
                <option value="<?= $key['id_seksi']; ?>"><?= $key['nama_seksi']; ?></option>
              <?php }
            ?>
          </select>
          <?php echo form_error('role','<div class="text-small text-danger"></div') ?>
        </div>
        <div class="form-group">
          <label>Sub Seksi</label>
          <select name="subseksi" class="form-control" id="subseksi"></select>
          <?php echo form_error('role','<div class="text-small text-danger"></div') ?>
        </div>
        <button type="submit" class="btn btn-success">Submit</button>
      </form>
    </div>
  </div>
</div>