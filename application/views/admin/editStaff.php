<div class="container-fluid">
  <div class="d-sm-flex align-items-center justify-contetnt-between mb-4">
    <h1 class="h3 mb-0 text-gray-800"><?php echo $title ?></h1>
  </div>
  <div class="card" style="width: 60%;">
    <div class="card-body">
      <form method="POST" action="<?php echo base_url('admin/kelola_staff/ubah/' . $id_user) ?>">
        <div class="form-group">
          <label>NIP</label>
          <input type="text" name="nip" class="form-control" value="<?= $nip; ?>">
        </div>
        <div class="form-group">
          <label>Nama</label>
          <input type="text" name="nama" class="form-control" value="<?= $nama; ?>">
        </div>
        <div class="form-group">
          <label>Username</label>
          <input type="text" name="username" class="form-control" value="<?= $username; ?>">
          <?php echo form_error('username','<div class="text-small text-danger"></div') ?>
        </div>
        <div class="form-group">
          <label>Password</label>
          <input type="password" name="password" class="form-control" value="<?= $password; ?>">
          <?php echo form_error('password','<div class="text-small text-danger"></div') ?>
        </div>
        <div class="form-group">
          <label>Role</label>
          <select name="role" class="form-control">
            <option>Pilih Role</option>
            <option value="admin" <?= $level == 'admin' ? 'selected' : '' ; ?>>Admin</option>
            <option value="kepala_p3d" <?= $level == 'kepala_p3d' ? 'selected' : '' ; ?>>Kepala P3D</option>
            <option value="kepala_seksi" <?= $level == 'kepala_seksi' ? 'selected' : '' ; ?>>Kepala Seksi</option>
            <option value="staff" <?= $level == 'staff' ? 'selected' : '' ; ?>>Staff</option>
          </select>
          <?php echo form_error('role','<div class="text-small text-danger"></div') ?>
        </div>
        <div class="form-group">
          <label>Seksi</label>
          <select name="id_seksi" class="form-control">
            <option>Pilih Seksi</option>
            <?php
              foreach ($seksi as $key) { ?>
                <option value="<?= $key['id_seksi']; ?>" <?= $id_seksi == $key['id_seksi'] ? 'selected' : '' ; ?>><?= $key['nama_seksi']; ?></option>
              <?php }
            ?>
          </select>
          <?php echo form_error('role','<div class="text-small text-danger"></div') ?>
        </div>
        <div class="form-group">
          <label>Sub Seksi</label>
          <select name="subseksi" class="form-control">
            <option value="NULL">Pilih Sub Seksi</option>
            <?php
              foreach ($id_subseksi as $key) { ?>
                <option value="<?= $key['id_subseksi']; ?>" <?= $subseksi == $key['id_subseksi'] ? 'selected' : '' ; ?>><?= $key['nama_subseksi']; ?></option>
              <?php }
            ?>
          </select>
          <?php echo form_error('role','<div class="text-small text-danger"></div') ?>
        </div>
        <button type="submit" class="btn btn-success">Submit</button>
      </form>
    </div>
  </div>
</div>