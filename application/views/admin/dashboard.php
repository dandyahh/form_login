<<<<<<< HEAD
<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Admin Dashboard</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>

  <!-- Navbar -->
  <nav class="navbar navbar-expand-lg" style="background-color: rgb(67, 33, 148);">
    <div class="container">
      <a class="navbar-brand text-white fw-bold" href="#">Admin Panel</a>
      <div class="navbar-nav ms-auto">
        <a href="<?= site_url('admin/logout') ?>" class="nav-link text-white">Logout</a>
      </div>
    </div>
  </nav>

  <!-- Toast Notification -->
  <div class="position-fixed bottom-0 end-0 p-3" style="z-index: 1055;">
    <?php if ($this->session->flashdata('success')): ?>
      <div class="toast align-items-center text-bg-success border-0" role="alert" aria-live="assertive" aria-atomic="true"
           data-bs-delay="5000" data-bs-autohide="true">
        <div class="d-flex">
          <div class="toast-body">
            <?= $this->session->flashdata('success') ?>
          </div>
          <button type="button" class="btn-close btn-close-white me-2 m-auto" data-bs-dismiss="toast" aria-label="Close"></button>
        </div>
      </div>
    <?php endif; ?>

    <?php if ($this->session->flashdata('error')): ?>
      <div class="toast align-items-center text-bg-danger border-0" role="alert" aria-live="assertive" aria-atomic="true"
           data-bs-delay="5000" data-bs-autohide="true">
        <div class="d-flex">
          <div class="toast-body">
            <?= $this->session->flashdata('error') ?>
          </div>
          <button type="button" class="btn-close btn-close-white me-2 m-auto" data-bs-dismiss="toast" aria-label="Close"></button>
        </div>
      </div>
    <?php endif; ?>
  </div>

  <!-- Main Content -->
  <div class="container mt-4">
    <h2 class="mb-4">Manajemen Pengguna</h2>

    <?php if (empty($all_users)): ?>
      <div class="alert alert-info">Tidak ada data pengguna.</div>
    <?php else: ?>
      <div class="table-responsive">
        <table class="table table-hover table-bordered shadow-sm bg-white">
          <thead class="table-primary text-center">
            <tr>
              <th>Username</th>
              <th>Email</th>
              <th>Tanggal Registrasi</th>
              <th>Status</th>
              <th>Aksi</th>
            </tr>
          </thead>
          <tbody>
            <?php foreach ($all_users as $user): ?>
              <tr class="align-middle text-center">
                <td><?= htmlspecialchars($user->username) ?></td>
                <td><?= htmlspecialchars($user->email) ?></td>
                <td><?= date('d M Y H:i', strtotime($user->created_at)) ?></td>
                <td>
                  <?php if ($user->status == 'approved'): ?>
                    <span class="badge bg-success px-3 py-2">Approved</span>
                  <?php elseif ($user->status == 'rejected'): ?>
                    <span class="badge bg-danger px-3 py-2">Rejected</span>
                  <?php else: ?>
                    <span class="badge bg-warning text-dark px-3 py-2">Pending</span>
                  <?php endif; ?>
                </td>
                <td>
                  <div class="d-flex justify-content-center gap-2">
                    <a href="<?= site_url('admin/approve_user/' . $user->id) ?>"
                      class="btn btn-outline-success btn-sm rounded-pill px-3 <?= $user->status == 'approved' ? 'disabled' : '' ?>">
                      Approve
                    </a>
                    <a href="<?= site_url('admin/reject_user/' . $user->id) ?>"
                      class="btn btn-outline-danger btn-sm rounded-pill px-3 <?= $user->status == 'rejected' ? 'disabled' : '' ?>">
                      Reject
                    </a>
                  </div>
                </td>
              </tr>
            <?php endforeach; ?>
          </tbody>
        </table>
      </div>
    <?php endif; ?>
  </div>

  <!-- Bootstrap JS (for Toast) -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
  <script>
    // Tampilkan semua toast saat halaman dimuat
    document.querySelectorAll('.toast').forEach(toast => {
      new bootstrap.Toast(toast).show();
    });
  </script>
</body>
</html>
=======
>>>>>>> 6dda10cceb3bcd7f1d4e85535d7145f46b7a1765
