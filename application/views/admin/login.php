<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <title>Login Admin</title>

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
  <div class="row w-100 shadow-lg rounded-4 overflow-hidden" style="max-width: 1000px; background-color:rgb(67, 33, 148);">
    
    <!-- Left: Image -->
    <div class="col-md-6 d-none d-md-flex bg-white justify-content-center align-items-center">
      <img src="<?= base_url('image/admin.jpg') ?>" class="img-fluid p-4" alt="Login Illustration">
    </div>

    <!-- Right: Login Admin Form -->
    <div class="col-md-6 p-5">
      <h3 class="mb-4 text-center text-light">Login Admin</h3>

      <?php if ($this->session->flashdata('error')): ?>
        <div class="alert alert-danger"><?= $this->session->flashdata('error') ?></div>
      <?php endif; ?>

      <form action="<?= site_url('admin/login') ?>" method="post">
        <div class="mb-3">
          <label for="username" class="form-label">Username</label>
          <input type="text" class="form-control bg-light text-dark border-0 rounded-pill px-4" id="username" name="username" required>
        </div>

        <div class="mb-3">
          <label for="password" class="form-label">Password</label>
          <input type="password" class="form-control bg-light text-dark border-0 rounded-pill px-4" id="password" name="password" required>
        </div>

        <div class="d-grid mb-3">
          <button type="submit" class="btn btn-warning text-dark fw-bold rounded-pill">Login</button>
        </div>

        <div class="text-center text-light small">
          <a href="<?= site_url('auth') ?>" class="link-light fw-semibold">Login User</a>
        </div>
      </form>
    </div>
  </div>
</div>

<!-- Bootstrap JS -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
