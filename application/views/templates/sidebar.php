<div class="app-sidebar sidebar-shadow bg-night-fade sidebar-text-white">
  <div class="app-header__logo">
    <div class="logo-src"></div>
    <div class="header__pane ml-auto">
      <div>
        <button type="button" class="hamburger close-sidebar-btn hamburger--elastic" data-class="closed-sidebar">
          <span class="hamburger-box">
            <span class="hamburger-inner"></span>
          </span>
        </button>
      </div>
    </div>
  </div>
  <div class="app-header__mobile-menu">
    <div>
      <button type="button" class="hamburger hamburger--elastic mobile-toggle-nav">
        <span class="hamburger-box">
          <span class="hamburger-inner"></span>
        </span>
      </button>
    </div>
  </div>
  <div class="app-header__menu">
    <span>
      <button type="button" class="btn-icon btn-icon-only btn btn-primary btn-sm mobile-toggle-header-nav">
        <span class="btn-icon-wrapper">
          <i class="fa fa-ellipsis-v fa-w-6"></i>
        </span>
      </button>
    </span>
  </div>
  <div class="scrollbar-sidebar">
    <div class="app-sidebar__inner">
      <ul class="vertical-nav-menu">
        <li class="app-sidebar__heading">Menu</li>
        <li>
          <a href="<?= base_url('dashboard'); ?>" class="<?= $this->uri->segment(1) == 'dashboard' ? 'mm-active' : null ?>">
            <i class="metismenu-icon pe-7s-home"></i>
            Dashboard
          </a>
        </li>
        <li>
          <a href="<?= base_url('balita'); ?>" class="<?= $this->uri->segment(1) == 'balita' ? 'mm-active' : null ?>">
            <i class="metismenu-icon pe-7s-smile"></i>
            Data Balita
          </a>
        </li>
        <li class="<?= $this->uri->segment(1) == 'deviasi' ? 'mm-active' : null ?>">
          <a href="#">
            <i class="metismenu-icon pe-7s-graph1"></i>
            Std. Deviasi
            <i class="metismenu-state-icon pe-7s-angle-down caret-left"></i>
          </a>
          <ul>
            <li>
              <a href="<?= base_url('deviasi/male'); ?>" class="<?= $this->uri->segment(2) == 'male' ? 'mm-active' : null ?>">
                <i class="metismenu-icon"></i>
                Laki-Laki
              </a>
            </li>
            <li>
              <a href="<?= base_url('deviasi/female'); ?>" class="<?= $this->uri->segment(2) == 'female' ? 'mm-active' : null ?>">
                <i class="metismenu-icon">
                </i>
                Perempuan
              </a>
            </li>
          </ul>
        </li>
        <li>
          <a href="<?= base_url('diagnose'); ?>" class="<?= $this->uri->segment(1) == 'diagnose' ? 'mm-active' : null ?>">
            <i class="metismenu-icon pe-7s-calculator"></i>
            Diagnosis
          </a>
        </li>
        <li>
          <a href="<?= base_url('grafik'); ?>" class="<?= $this->uri->segment(1) == 'grafik' ? 'mm-active' : null ?>">
            <i class="metismenu-icon pe-7s-note2"></i>
            Laporan
          </a>
        </li>
        <li>
          <a href="<?= base_url('user_data'); ?>" class="<?= $this->uri->segment(1) == 'user_data' ? 'mm-active' : null ?>">
            <i class="metismenu-icon pe-7s-users"></i>
            Data Pengguna
          </a>
        </li>
        <li>
          <a href="<?= base_url('user'); ?>" class="<?= $this->uri->segment(1) == 'user' ? 'mm-active' : null ?>">
            <i class="metismenu-icon pe-7s-user"></i>
            Profil
          </a>
        </li>
      </ul>
    </div>
  </div>
</div>
<div class="app-main__outer">

  <!-- Main Content -->
  <div class="app-main__inner pb-4">