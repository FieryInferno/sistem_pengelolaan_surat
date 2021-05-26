
<body id="page-top">
  <!-- Page Wrapper -->
  <div id="wrapper">
    <!-- Sidebar -->
    <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar" style="background: #36b9cc;">
      <!-- Sidebar - Brand -->
      <a class="sidebar-brand d-flex align-items-center justify-content-center" href="index.html">
        <div class="sidebar-brand-text mx-3">SIPS</div>
      </a>
      <!-- Divider -->
      <hr class="sidebar-divider my-0">
      <!-- Nav Item - Dashboard -->
      <li class="nav-item">
        <a class="nav-link" href="<?php echo base_url('admin/dashboard') ?>">
          <i class="fas fa-fw fa-tachometer-alt"></i>
          <span>Dashboard</span></a>
      </li>
      <?php
        switch ($this->session->level) {
          case 'admin': ?>
            <!-- Nav Item - Pages Collapse Menu -->
            <li class="nav-item">
              <a class="nav-link" href="<?= base_url(); ?>admin/user">
                <i class="fas fa-fw fa-database"></i>
                <span>Data User</span>
              </a>
            </li>
            <!-- Nav Item - Utilities Collapse Menu -->
            <li class="nav-item">
              <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseUtilities" aria-expanded="true" aria-controls="collapseUtilities">
                <i class="fas fa-fw fa-mail-bulk"></i>
                <span>Transaksi Surat</span>
              </a>
              <div id="collapseUtilities" class="collapse" aria-labelledby="headingUtilities" data-parent="#accordionSidebar">
                <div class="bg-white py-2 collapse-inner rounded">
                  <a class="collapse-item" href="<?php echo base_url('admin/surat_masuk') ?>">Surat Masuk</a>
                  <a class="collapse-item" href="<?php echo base_url('admin/surat_keluar') ?>">Surat Keluar</a>
                </div>
              </div>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="<?= base_url(); ?>admin/tracking_surat">
                <i class="fas fa-fw fa-database"></i>
                <span>Tracking Surat</span>
              </a>
            </li>
            <?php break;
            case 'kepala_p3d': ?>
              <!-- Nav Item - Pages Collapse Menu -->
              <li class="nav-item">
                <a class="nav-link" href="<?= base_url(); ?>kepala_p3d/surat">
                  <i class="fas fa-fw fa-database"></i>
                  <span>Data Surat</span>
                </a>
              </li>
              <?php break;
            case 'kepala_seksi': ?>
              <!-- Nav Item - Pages Collapse Menu -->
              <li class="nav-item">
                <a class="nav-link" href="<?= base_url(); ?>kepala_seksi/surat">
                  <i class="fas fa-fw fa-database"></i>
                  <span>Data Surat</span>
                </a>
              </li>
              <?php break;
            case 'staff': ?>
              <!-- Nav Item - Pages Collapse Menu -->
              <li class="nav-item">
                <a class="nav-link" href="<?= base_url(); ?>staff/surat">
                  <i class="fas fa-fw fa-database"></i>
                  <span>Data Surat</span>
                </a>
              </li>
              <!-- Nav Item - Pages Collapse Menu -->
              <li class="nav-item">
                <a class="nav-link" href="<?= base_url(); ?>staff/pengajuan_surat">
                  <i class="fas fa-fw fa-database"></i>
                  <span>Pengajuan Surat</span>
                </a>
              </li>
              <?php break;
          
          default:
            # code...
            break;
        }
      ?>
      <!-- Nav Item - Tables -->
      <li class="nav-item">
        <a class="nav-link" href="<?php echo base_url('Login/logout') ?>">
          <i class="fas fa-fw fa-sign-out-alt"></i>
          <span>Logout</span></a>
      </li>

      <!-- Sidebar Toggler (Sidebar) -->
      <div class="text-center d-none d-md-inline">
        <button class="rounded-circle border-0" id="sidebarToggle"></button>
      </div>

    </ul>
    <!-- End of Sidebar -->

    <!-- Content Wrapper -->
    <div id="content-wrapper" class="d-flex flex-column">

      <!-- Main Content -->
      <div id="content">

        <!-- Topbar -->
        <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">

          <!-- Sidebar Toggle (Topbar) -->
          <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
            <i class="fa fa-bars"></i>
          </button>

          <!-- Topbar Search -->
          <p class="font-weight-bold">SAMSAT SUBANG </p>

          <!-- Topbar Navbar -->
          <ul class="navbar-nav ml-auto">

            </li>

            <div class="topbar-divider d-none d-sm-block"></div>

          </ul>

        </nav>
        <!-- End of Topbar -->