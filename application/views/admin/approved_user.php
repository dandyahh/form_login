<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?> 
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Approved User</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Bootstrap Icons -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css" rel="stylesheet">
</head>
<body>
    <nav class="navbar navbar-expand-lg navbar-dark shadow-sm" style="background-color: rgb(67, 33, 148);">
        <div class="container">
            <a class="navbar-brand fw-bold" href="#">Admin Panel</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarAdmin" aria-controls="navbarAdmin" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarAdmin">
                <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
                    <li class="nav-item">
                        <a class="nav-link <?= uri_string() == 'admin/approved_user' ? 'active' : '' ?>" href="<?= site_url('admin/approved_user') ?>">
                            <i class="bi bi-check-circle-fill me-1"></i> Approved User
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link <?= uri_string() == 'admin/manage_user' ? 'active' : '' ?>" href="<?= site_url('admin/manage_user') ?>">
                            <i class="bi bi-gear-fill me-1"></i> Manage User
                        </a>
                    </li>
                </ul>

                <!-- Tombol Logout di luar navbar-nav agar sejajar sempurna -->
                <a class="btn btn-outline-light btn-sm ms-lg-3" href="<?= site_url('admin/logout') ?>">
                    <i class="bi bi-box-arrow-right me-1"></i> Logout
                </a>
            </div>
        </div>
    </nav>

    <div class="container mt-4">
        <?php if ($this->session->flashdata('success')): ?>
            <div class="alert alert-success"><?= $this->session->flashdata('success') ?></div>
        <?php endif; ?>
        <?php if ($this->session->flashdata('error')): ?>
            <div class="alert alert-danger"><?= $this->session->flashdata('error') ?></div>
        <?php endif; ?>

        <h3 class="mb-4">Daftar User Menunggu Persetujuan</h3>
        
        <?php if (empty($pending_users)): ?>
            <div class="alert alert-info">Tidak ada user yang menunggu persetujuan.</div>
        <?php else: ?>
            <div class="table-responsive">
                <table class="table table-hover align-middle">
                    <thead class="table-dark">
                        <tr>
                            <th>Username</th>
                            <th>Email</th>
                            <th>Tanggal Registrasi</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($pending_users as $user): ?>
                            <tr>
                                <td><?= htmlspecialchars($user->username) ?></td>
                                <td><?= htmlspecialchars($user->email) ?></td>
                                <td><?= date('d M Y H:i', strtotime($user->created_at)) ?></td>
                                <td>
                                    <a href="<?= site_url('admin/approve_user/' . $user->id) ?>" class="btn btn-success btn-sm">Setujui</a>
                                    <a href="<?= site_url('admin/reject_user/' . $user->id) ?>" class="btn btn-danger btn-sm">Tolak</a>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
        <?php endif; ?>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
