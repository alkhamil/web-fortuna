<!DOCTYPE html>
<html lang="en">
<?php  
    $uri = $this->uri->segment(1);
    $auth = $this->session->userdata('auth');
    if (empty($auth)) {
        redirect(base_url('login'),'refresh');
    }else {
        if ($auth['level'] == "customer") {
            redirect(base_url('/'),'refresh');
        }
    }
?>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Panel Admin</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- Main CSS-->
    <link rel="stylesheet" type="text/css" href="<?= base_url() ?>assets/admin/css/main.css">
    <!-- Font-icon css-->
    <link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
</head>

<body class="app sidebar-mini">
    <!-- Navbar-->
    <header class="app-header">
        <a class="app-header__logo" style="font-size:20px" href="index.html">HOTEL RAKACIA</a>
        <!-- Sidebar toggle button-->
        <a class="app-sidebar__toggle" href="#" data-toggle="sidebar" aria-label="Hide Sidebar"></a>
        <!-- Navbar Right Menu-->
        <ul class="app-nav">
            <!-- User Menu-->
            <li class="dropdown"><a class="app-nav__item" href="#" data-toggle="dropdown" aria-label="Open Profile Menu"><i class="fa fa-user fa-lg"></i></a>
                <ul class="dropdown-menu settings-menu dropdown-menu-right">
                    <li><a class="dropdown-item" href="<?= base_url('/logout') ?>"><i class="fa fa-sign-out fa-lg"></i> Logout</a></li>
                </ul>
            </li>
        </ul>
    </header>
    <!-- Sidebar menu-->
    <div class="app-sidebar__overlay" data-toggle="sidebar"></div>
    <aside class="app-sidebar">
        <ul class="app-menu">
            <li>
                <a <?php if ($uri=="dashboard") { ?> class="app-menu__item active" <?php } else { ?> class="app-menu__item" <?php } ?> href="<?= base_url('dashboard') ?>">
                    <i class="app-menu__icon fa fa-dashboard"></i>
                    <span class="app-menu__label">Beranda</span>
                </a>
            </li>
            <!-- <li>
                <a <?php if ($uri=="tipekamar") { ?> class="app-menu__item active" <?php } else { ?> class="app-menu__item" <?php } ?> href="<?= base_url('tipekamar') ?>">
                    <i class="app-menu__icon fa fa-tag"></i>
                    <span class="app-menu__label">Data Tipe Kamar</span>
                </a>
            </li> -->
            <li>
                <a <?php if ($uri=="kamar") { ?> class="app-menu__item active" <?php } else { ?> class="app-menu__item" <?php } ?> href="<?= base_url('kamar') ?>">
                    <i class="app-menu__icon fa fa-book"></i>
                    <span class="app-menu__label">Data Kamar</span>
                </a>
            </li>
            <li>
                <a <?php if ($uri=="transaksi") { ?> class="app-menu__item active" <?php } else { ?> class="app-menu__item" <?php } ?> href="<?= base_url('transaksi') ?>">
                    <i class="app-menu__icon fa fa-file-o"></i>
                    <span class="app-menu__label">Data Transaksi</span>
                </a>
            </li>
            <li>
                <a <?php if ($uri=="pemesanan") { ?> class="app-menu__item active" <?php } else { ?> class="app-menu__item" <?php } ?> href="<?= base_url('pemesanan') ?>">
                    <i class="app-menu__icon fa fa-file"></i>
                    <span class="app-menu__label">Data Pemesanan</span>
                </a>
            </li>
            <li>
                <a <?php if ($uri=="laporan") { ?> class="app-menu__item active" <?php } else { ?> class="app-menu__item" <?php } ?> href="<?= base_url('laporan') ?>">
                    <i class="app-menu__icon fa fa-file-pdf-o"></i>
                    <span class="app-menu__label">Laporan Transaksi</span>
                </a>
            </li>
            <li>
                <a <?php if ($uri=="admin") { ?> class="app-menu__item active" <?php } else { ?> class="app-menu__item" <?php } ?> href="<?= base_url('admin') ?>">
                    <i class="app-menu__icon fa fa-user-circle-o"></i>
                    <span class="app-menu__label">Data Admin</span>
                </a>
            </li>
        </ul>
    </aside>