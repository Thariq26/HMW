<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0">
  <title>Dashboard Hotel Mercubuana 4</title>
  <link rel="shortcut icon" type="image/x-icon" href="<?= base_url() ?>/assets/img/profiles/Universitas_Mercu_Buana.png">

  <!-- Header assets (external libraries) -->
  <?= $this->include('template/header') ?>

  <!-- Styles -->
  <?= $this->renderSection('styles') ?>

</head>

<body>
  <div class="main-wrapper">
    <!-- Navbar -->
    <?= $this->include('template/navbar') ?>

    <!-- Sidebar -->
    <?= $this->include('template/sidebar') ?>

    <div class="page-wrapper">

      <!-- Main content -->
      <?= $this->renderSection('content') ?>
    </div>
  </div>
  <!-- Footer assets (external libraries) -->
  <?= $this->include('template/footer') ?>

  <!-- Scripts -->
  <script>
    $(function() {

      $('#datetimepicker3').datetimepicker({
        format: 'LT'
      });
    });
  </script>
  <?= $this->renderSection('scripts') ?>
</body>

</html>