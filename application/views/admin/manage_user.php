<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Manage User</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container mt-5">
        <h3 class="mb-4">Daftar User yang Telah Disetujui</h3>

        <?php if ($this->session->flashdata('success')): ?>
            <div class="alert alert-success"><?= $this->session->flashdata('success') ?></div>
        <?php endif; ?>
        <?php if ($this->session->flashdata('error')): ?>
            <div class="alert alert-danger"><?= $this->session->flashdata('error') ?></div>
        <?php endif; ?>

        <?php if (empty($approved_users)): ?>
            <div class="alert alert-info">Belum ada user yang disetujui.</div>
        <?php else: ?>
            <div class="table-responsive">
                <table class="table table-striped align-middle">
                    <thead class="table-dark">
                        <tr>
                            <th>Username</th>
                            <th>Email</th>
                            <th>Tanggal Registrasi</th>
                            <th>Status</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($approved_users as $user): ?>
                            <tr>
                                <td><?= htmlspecialchars($user->username) ?></td>
                                <td><?= htmlspecialchars($user->email) ?></td>
                                <td><?= date('d M Y H:i', strtotime($user->created_at)) ?></td>
                                <td><span class="badge bg-success">Approved</span></td>
                                <td>
                                    <a href="<?= site_url('admin/set_pending/' . $user->id) ?>" class="btn btn-warning btn-sm">Batalkan</a>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
        <?php endif; ?>
    </div>
</body>
</html>
