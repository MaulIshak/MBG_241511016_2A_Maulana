<?= $this->extend('layout/page_template') ?>

<?= $this->section('main-content') ?>

<?php $validation = session()->getFlashdata('validation') ?? \Config\Services::validation();
    // d($validation->listErrors());
?>

<h2 class="my-3 mb-4 fw-bold">Tambah User Baru</h2>
<p class="text-secondary my-3 pb-3"> Isi form di bawah untuk menambahkan data user baru.</p>

<div class="card">
    <div class="card-body">

        <form action="/users/create" method="post">
             <?= csrf_field() ?>
             <div class="mb-3">
                <label for="username" class="form-label">Username</label>
                <input type="text" class="form-control <?= $validation->hasError('username') ? 'is-invalid' : '' ?>" id="username" name="username" value="<?= old('username') ?>" required>
                <div class="invalid-feedback">
                <?php if ($validation->hasError('username')): ?>
                        <?= $validation->getError('username') ?>
                        <?php endif; ?>
                  </div>
            </div>
            <div class="mb-3">
                <label for="password" class="form-label">Password Default</label>
                <div class="input-group">
                    <input type="password" class="form-control <?= $validation->hasError('password') ? 'is-invalid' : '' ?>" id="password" name="password" required>
                    <div class="invalid-feedback">
                    <?php if ($validation->hasError('password')): ?>
                            <?= $validation->getError('password') ?>
                            <?php endif; ?>
                        </div>
                </div>
            </div>
              <div class="d-flex justify-content-end">
                <a href="/users/" class="btn btn-secondary me-2">Batal</a>
                <button type="submit" class="btn btn-primary" id="btnSubmit" disabled>Simpan</button>
            </div>
        </form>
    </div>
</div>
<?= $this->endSection() ?>
