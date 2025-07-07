<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <title>Register</title>

  <!-- Bootstrap 5 CDN -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600&display=swap" rel="stylesheet">

  <style>
    body {
      font-family: 'Poppins', sans-serif;
    }
  </style>
</head>
<body class="bg-light bg-gradient text-light">

<div class="container min-vh-100 d-flex justify-content-center align-items-center">
  <div class="row w-100 shadow-lg rounded-4 overflow-hidden" style="max-width: 1000px; background-color: #1d4745;">
    
    <!-- Left: Image -->
    <div class="col-md-6 d-none d-md-flex bg-white justify-content-center align-items-center">
      <img src="<?= base_url('image/register.jpg') ?>" class="img-fluid p-4" alt="Register Illustration">
    </div>

    <!-- Right: Register Form -->
    <div class="col-md-6 p-5">
      <h3 class="mb-4 text-center text-light">Register</h3>

      <?php if ($this->session->flashdata('success')): ?>
        <div class="alert alert-success"><?= $this->session->flashdata('success') ?></div>
      <?php endif; ?>
      <?php if ($this->session->flashdata('error')): ?>
        <div class="alert alert-danger"><?= $this->session->flashdata('error') ?></div>
      <?php endif; ?>

      <form action="<?= site_url('auth/register') ?>" method="post">
        <div class="mb-3">
          <label for="username" class="form-label">Username</label>
          <input type="text" class="form-control bg-light text-dark border-0 rounded-pill px-4" id="username" name="username" required>
          <?= form_error('username', '<div class="text-danger small ps-3">', '</div>') ?>
        </div>
        
        <div class="mb-3">
          <label for="email" class="form-label">Email</label>
          <input type="email" class="form-control bg-light text-dark border-0 rounded-pill px-4" id="email" name="email" required>
          <?= form_error('email', '<div class="text-danger small ps-3">', '</div>') ?>
        </div>
        
        <div class="mb-3">
          <label for="password" class="form-label">Password</label>
          <input type="password" class="form-control bg-light text-dark border-0 rounded-pill px-4" id="password" name="password" required>
          <?= form_error('password', '<div class="text-danger small ps-3">', '</div>') ?>
        </div>
        
        <div class="mb-3">
          <label for="password_confirmation" class="form-label">Confirm Password</label>
          <input type="password" class="form-control bg-light text-dark border-0 rounded-pill px-4" id="password_confirmation" name="password_confirmation" required>
          <?= form_error('password_confirmation', '<div class="text-danger small ps-3">', '</div>') ?>
        </div>

        <div class="d-grid mb-3">
          <button type="submit" class="btn btn-info text-dark fw-bold rounded-pill">Register</button>
        </div>

        <div class="text-center text-light small">
          <p>Sudah punya akun? <a href="<?= site_url('auth/login') ?>" class="link-info fw-semibold">Login disini</a></p>
        </div>
      </form>
    </div>
  </div>
</div>

<!-- Bootstrap JS -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
