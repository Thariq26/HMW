<div class="sidebar" id="sidebar">
  <div class="sidebar-inner slimscroll">
    <div id="sidebar-menu" class="sidebar-menu">
      <ul>
        <li class="<?php if (url_is('dashboard')) : ?>active<?php endif ?>"> <a href="<?= base_url() ?>dashboard"><i class="fas fa-tachometer-alt"></i> <span>Dashboard</span></a> </li>
        <li class="list-divider"></li>
        <li class="submenu"> <a href="<?= base_url() ?>/bookings"><i class="fas fa-suitcase"></i> <span> Daftar Booking </span> <span class="menu-arrow"></span></a>
          <ul class="submenu_class" style="display: none;">
            <li><a class="<?php if (url_is('/bookings')) : ?>active<?php endif ?>" href="<?= base_url() ?>/bookings"> Semua Data Booking </a></li>
            <li><a class="<?php if (url_is('/bookings/add')) : ?>active<?php endif ?>" href="<?= base_url() ?>/bookings/add"> Tambah Data Booking </a></li>
          </ul>
        </li>
        <li class="submenu"> <a href="<?= base_url() ?>/customers"><i class="fas fa-user"></i> <span> Tamu </span> <span class="menu-arrow"></span></a>
          <ul class="submenu_class" style="display: none;">
            <li><a class="<?php if (url_is('/customers')) : ?>active<?php endif ?>" href="<?= base_url() ?>/customers"> Semua Data Tamu </a></li>
            <li><a class="<?php if (url_is('/customers/add')) : ?>active<?php endif ?>" href="<?= base_url() ?>/customers/add"> Tambah Data Tamu </a></li>
          </ul>
        </li>
        <li class="<?php if (url_is('roompricings')) : ?>active<?php endif ?>"> <a href="<?= base_url() ?>roompricings"><i class="far fa-money-bill-alt"></i> <span>Room pricings</span></a> </li>
        <li class="submenu"> <a href="<?= base_url() ?>roomcategory"><i class="fas fa fa-bars"></i> <span> Facilitas </span> <span class="menu-arrow"></span></a>
          <ul class="submenu_class" style="display: none;">
            <li><a class="<?php if (url_is('roomcategory')) : ?>active<?php endif ?>" href="<?= base_url() ?>roomcategory">Rooms Category</a></li>
            <li><a class="<?php if (url_is('food')) : ?>active<?php endif ?>" href="<?= base_url() ?>food">Foods Category </a></li>
            <li><a class="<?php if (url_is('cancelcategory')) : ?>active<?php endif ?>" href="<?= base_url() ?>cancelcategory">Cancelations Category </a></li>
          </ul>
        </li>
        <li class="submenu"> <a href="<?= base_url() ?>Ruangan"><i class="fas fa fa-ellipsis-h"></i> <span>Daftar Ruang </span> <span class="menu-arrow"></span></a>
          <ul class="submenu_class" style="display: none;">
            <li><a class="<?php if (url_is('Ruangan')) : ?>active<?php endif ?>" href="<?= base_url() ?>Ruangan">Semua Daftar Ruangan </a></li>
          </ul>
        </li>
        <li class="submenu"> <a href="<?= base_url() ?>/employees"><i class="fas fa-user"></i> <span> User </span> <span class="menu-arrow"></span></a>
          <ul class="submenu_class" style="display: none;">
            <li><a class="<?php if (url_is('/employees') || url_is('/employees/add') || url_is('/employees/edit')) : ?>active<?php endif ?>" href="<?= base_url() ?>/employees">Employees List </a></li>
            <li><a class="<?php if (url_is('/employees/leaves/*')) : ?>active<?php endif ?>" href="<?= base_url() ?>/employees/leaves">Leaves </a></li>
            <li><a class="<?php if (url_is('/employees/holidays/*')) : ?>active<?php endif ?>" href="<?= base_url() ?>/employees/holidays">Holidays </a></li>
            <li><a class="<?php if (url_is('/employees/attendance/*')) : ?>active<?php endif ?>" href="<?= base_url() ?>/employees/attendance">Attendance </a></li>
          </ul>
        </li>
        <li class="submenu"> <a href="<?= base_url() ?>/accounts"><i class="far fa-money-bill-alt"></i> <span> Accounts </span> <span class="menu-arrow"></span></a>
          <ul class="submenu_class" style="display: none;">
            <li><a class="<?php if (url_is('/accounts/invoices/*')) : ?>active<?php endif ?>" href="<?= base_url() ?>/accounts/invoices">Invoices </a></li>
            <li><a class="<?php if (url_is('/accounts/payments/*')) : ?>active<?php endif ?>" href="<?= base_url() ?>/accounts/payments">Payments </a></li>
            <li><a class="<?php if (url_is('/accounts/expenses/*')) : ?>active<?php endif ?>" href="<?= base_url() ?>/accounts/expenses">Expenses </a></li>
            <li><a class="<?php if (url_is('/accounts/taxes/*')) : ?>active<?php endif ?>" href="<?= base_url() ?>/accounts/taxes">Taxes </a></li>
            <li><a class="<?php if (url_is('/accounts/provident_funds/*')) : ?>active<?php endif ?>" href="<?= base_url() ?>/accounts/provident_funds">Provident Fund </a></li>
          </ul>
        </li>
      </ul>
    </div>
  </div>
</div>