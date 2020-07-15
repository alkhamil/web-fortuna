<?php $auth = $this->session->userdata('auth'); ?>
<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">

    <title>HOTEL RAKACIA</title>
  </head>
  <body>
  <nav class="navbar navbar-expand-lg navbar-dark bg-primary">
    <div class="container">
      <a class="navbar-brand" href="<?= base_url('/') ?>">Rakacia Hotel</a>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
  
      <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav ml-auto">
          <li class="nav-item">
            <a class="nav-link text-white" href="<?= base_url('/') ?>">Home</a>
          </li>
          <?php if (empty($auth)) { ?>
            <li class="nav-item">
              <a class="nav-link text-white" href="<?= base_url('form-registration') ?>">Registrasi</a>
            </li>
            <li class="nav-item">
              <a class="nav-link text-white" href="<?= base_url('login') ?>">Login</a>
            </li>
          <?php } else { ?>
            <li class="nav-item">
              <a class="nav-link text-white" href="<?= base_url('my-reservation') ?>">Pesanan Saya</a>
            </li>
            <li class="nav-item">
              <a class="nav-link text-white" href="<?= base_url('logout') ?>">Logout</a>
            </li>
          <?php } ?>
        </ul>
      </div>
    </div>
  </nav>
    