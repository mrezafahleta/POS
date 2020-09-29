  <!-- Main Sidebar Container -->
  <aside class="main-sidebar sidebar-dark-primary elevation-4">
      <!-- Brand Logo -->
      <div class="text-center">
          <a href="../../index3.html" class="brand-link">
              <h3>POS</h3>
          </a>
      </div>

      <!-- Sidebar -->
      <div class="sidebar">

          <!-- Sidebar Menu -->
          <nav class="mt-2">
              <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                  <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->

                  <li class="nav-item">
                      <a href="<?= base_url('admin/dashboard') ?>" class="nav-link">
                          <i class="nav-icon fas fa-home"></i>
                          <p>
                              Dashboard

                          </p>
                      </a>
                  </li>
                  <li class="nav-item">
                      <a href="<?= base_url('admin/kategori') ?>" class="nav-link">
                          <i class="nav-icon fas fa-bookmark"></i>
                          <p>
                              Kategori

                          </p>
                      </a>
                  </li>
                  <li class="nav-item">
                      <a href="<?= base_url('admin/stok') ?>" class="nav-link">
                          <i class="nav-icon fas fa-box"></i>
                          <p>
                              Stok

                          </p>
                      </a>
                  </li>
                  <li class="nav-item">
                      <a href="<?= base_url('admin/penjualan') ?>" class="nav-link">
                          <i class="nav-icon fas fa-cash-register"></i>
                          <p>
                              Penjualan

                          </p>
                      </a>
                  </li>


                  <li class="nav-item has-treeview">
                      <a href="#" class="nav-link">
                          <i class="nav-icon fas fa-newspaper"></i>
                          <p>
                              Laporan
                              <i class="fas fa-angle-left right"></i>
                          </p>
                      </a>
                      <ul class="nav nav-treeview">
                          <li class="nav-item">
                              <a href="<?= base_url('admin/laporan/laporan_stok') ?>" class="nav-link">
                                  <i class="far fa-circle nav-icon"></i>
                                  <p> Laporan Stok</p>
                              </a>
                          </li>
                          <li class="nav-item">
                              <a href="<?= base_url('admin/laporan/laporan_penjualan') ?>" class="nav-link">
                                  <i class="far fa-circle nav-icon"></i>
                                  <p>Laporan Penjualan</p>
                              </a>
                          </li>

                      </ul>
                  </li>
              </ul>
          </nav>
          <!-- /.sidebar-menu -->
      </div>
      <!-- /.sidebar -->
  </aside>