<?= $this->extend('layout/page_template'); ?>
<?= $this->section('main-content'); ?>

<div class="container my-4">
    <h2 class="my-3 mb-4 fw-bold">Detail User</h2>
    <p class="text-secondary my-3 pb-3"> Berikut adalah detail informasi user.</p>

    <?php if (isset($user)): ?>
                <table class="table table-bordered">
                    <tr>
                        <th>User ID</th>
                        <td><?= esc($user['user_id']) ?></td>
                    </tr>
                    <tr>
                        <th>Username</th>
                        <td><?= esc($user['username']) ?></td>
                    </tr>
                    <tr>
                        <th>Role</th>
                        <td><?= esc($user['role']) ?></td>
                    </tr>
                </table>

    <?php else: ?>
        <div class="alert alert-warning" role="alert">
            User tidak ditemukan.
        </div>
    <?php endif; ?>

    <div class="mt-4">
        <a href="<?= base_url('/users') ?>" class="btn btn-secondary">Kembali</a>
    </div>  
</div>



<?= $this->endSection(); ?>