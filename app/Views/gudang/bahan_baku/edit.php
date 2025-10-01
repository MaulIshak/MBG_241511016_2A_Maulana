<?= $this->extend('layout/page_template'); ?>
<?= $this->section('main-content'); ?>
<?php $validation = session()->getFlashdata('validation') ?? \Config\Services::validation(); ?>
<h2 class="my-3 mb-4 fw-bold">Edit Bahan Baku</h2>
<p class="text-secondary my-3 pb-3"> Ubah informasi bahan baku pada form di bawah.</p>
<div class="card">
    <div class="card-body">
        <h2>Edit Bahan Baku:<?= $bahan_baku['nama'] ?> </h2>
        <form action="/bahan-baku/edit/<?= $bahan_baku['id'] ?>" method="post">
                <!-- Jumlah -->
                <div class="mb-3">
                    <label for="jumlah" class="form-label">Jumlah</label>
                    <input type="number" class="form-control <?= $validation->hasError('jumlah') ? 'is-invalid' : '' ?>" id="jumlah" name="jumlah" value="<?= old('jumlah', $bahan_baku['jumlah']) ?>" required>
                    <div class="invalid-feedback">
                    <?php if ($validation->hasError('jumlah')): ?>
                            <?= $validation->getError('jumlah') ?>
                            <?php endif; ?>
                    </div>
                </div>
            <div class="d-flex justify-content-end">
                <a href="/bahan-baku/" class="btn btn-secondary me-2">Batal</a>
                <button type="submit" class="btn btn-primary" id="btnSubmit">Simpan</button>
            </div>
        </form>
    </div>

</div>
<?= $this->endSection(); ?>