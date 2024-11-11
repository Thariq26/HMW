<div class="header">
  <div class="header-left">
    <a href="<?= base_url() ?>/dashboard/dashboard" class="logo"> <img src="<?= base_url() ?>/assets/img/profiles/Universitas_Mercu_Buana.png" width="50" height="70" alt="logo"> <span class="logoclass"></span> </a>
    <a href="<?= base_url() ?>/dashboard/dashboard" class="logo logo-small"> <img src="<?= base_url() ?>/assets/img/profiles/N02RMSfG_400x400.png" alt="Logo" width="30" height="30"> </a>
  </div>
  <a href="javascript:void(0);" id="toggle_btn"> <i class="fe fe-text-align-left"></i> </a>
  <a class="mobile_btn" id="mobile_btn"> <i class="fas fa-bars"></i> </a>
  <ul class="nav user-menu">  
    <li class="nav-item dropdown has-arrow">
      <a href="#" class="dropdown-toggle nav-link" data-toggle="dropdown"> <span class="user-img"><img class="rounded-circle" src="<?= base_url() ?>/assets/img/profiles/Universitas_Mercu_Buana.png" width="31" alt="<?= session()->get('user_name') ?>"></span> </a>
      <div class="dropdown-menu">
        <div class="user-header">
          <div class="avatar avatar-sm"> <img src="<?= base_url() ?>/assets/img/profiles/Universitas_Mercu_Buana.png" alt="User Image" class="avatar-img rounded-circle"> </div>
          <div class="user-text">
            <h6><?= session()->get('user_name') ?></h6>
            <p class="text-muted mb-0">Administrator</p>
          </div>
        </div>
        <a class="dropdown-item" href="<?= base_url() ?>/profile">My Profile</a>
        <a class="dropdown-item" href="<?= base_url() ?>/settings">Account Settings</a>
        <a class="dropdown-item" href="<?= base_url() ?>/auth/logout">Logout</a>
      </div>
    </li>
  </ul>
</div>