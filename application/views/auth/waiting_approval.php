<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Waiting Approval</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <div class="card">
                    <div class="card-header">
                        <h3 class="text-center">Menunggu Persetujuan</h3>
                    </div>
                    <div class="card-body text-center">
                        <div class="alert alert-info">
                            <?= $this->session->flashdata('message') ?: 'Akun Anda sedang menunggu persetujuan admin.' ?>
                        </div>
                        <a href="<?= site_url('auth/login') ?>" class="btn btn-primary">Kembali ke Login</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>