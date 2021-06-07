<div class="container-fluid">
  <div class="d-sm-flex align-items-center justify-contetnt-between mb-4">
    <h1 class="h3 mb-0 text-gray-800"><?php echo $title ?></h1>
  </div>
  <div class="card" style="width: 60%;">
    <div class="card-body">
      <form method="POST" action="<?php echo base_url('admin/user/tambah') ?>">
        <div class="form-group">
          <label>NIK</label>
          <input type="text" name="nik" class="form-control">
        </div>
        <div class="form-group">
          <label>Nama</label>
          <input type="text" name="nama" class="form-control">
        </div>
        <div class="form-group">
          <label>Email</label>
          <input type="text" name="email" class="form-control">
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
          <select name="seksi" class="form-control">
            <option>Pilih Seksi</option>
            <option value="3">Tata Usaha</option>
            <option value="1">Penerimaan dan Pendataan</option>
            <option value="2">Pendataan Penetapan</option>
            <option value="4">Pengelola Keuangan</option>
            <option value="5">Perencanaan dan Program</option>
            <option value="6">Pengadministrasian Sarana dan Prasarana</option>
            <option value="7">Pengolah Data Aplikasi dan Pengolahan Data Sistem Keuangan</option>
            <option value="8">Pengadministrasian Umum</option>
            <option value="9">Verifikator Pajak</option>
            <option value="10">Pengolah Data dan Potensi Pajak</option>
            <option value="11">Pengolah Data Pemeriksa Pajak</option>
            <option value="12">Pengolah Data Penagihan Pajak</option>
            <option value="13">Pranata Kearsipan</option>
            <option value="14">Pengelola Pelaporan dan Penerimaan</option>
          </select>
          <?php echo form_error('role','<div class="text-small text-danger"></div') ?>
        </div>
        <button type="submit" class="btn btn-success">Submit</button>
      </form>
    </div>
  </div>
</div>