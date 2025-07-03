<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Dashboard</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <nav class="navbar navbar-expand-lg navbar-dark bg-primary">
        <div class="container">
            <a class="navbar-brand" href="#">User Dashboard</a>
            <div class="navbar-nav ms-auto">
                <a href="<?= site_url('auth/logout') ?>" class="nav-link">Logout</a>
            </div>
        </div>
    </nav>

    <div class="container mt-4">
        <div class="alert alert-success">
            <h4>Selamat datang, <?= $this->session->userdata('username') ?>!</h4>
            <p>Status login Anda: 
                <?php if ($login_status->status == 'approved'): ?>
                    <span class="badge bg-success">Disetujui</span>
                <?php elseif ($login_status->status == 'rejected'): ?>
                    <span class="badge bg-danger">Ditolak</span>
                <?php else: ?>
                    <span class="badge bg-warning">Menunggu</span>
                <?php endif; ?>
            </p>
            <p>Terakhir login: <?= date('d M Y H:i', strtotime($login_status->created_at)) ?></p>
        </div>
        
        <div class="card">
            <div class="card-body">
                <h5 class="card-title">Informasi Akun</h5>
                <p class="card-text">Anda telah berhasil login ke sistem dengan akses sebagai user.</p>
            </div>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>