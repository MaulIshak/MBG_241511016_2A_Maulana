<?= $this->extend('layout/page_template'); ?>
<?= $this->section('main-content'); ?>
<?php $validation = session()->getFlashdata('validation') ?? \Config\Services::validation(); ?>

<div class="container">
<div class="row">
<div class="col-md-8 offset-md-2">

<h2 class="my-3 mb-4 fw-bold">Edit Bahan Baku</h2>
<p class="text-secondary my-3 pb-3"> Ubah informasi bahan baku pada form di bawah.</p>
<div class="card">
    <div class="card-body">
        <h2>ID: <?= $bahan_baku['id'] ?> </h2>
        <form action="/bahan-baku/edit/<?= $bahan_baku['id'] ?>" method="post" id="bahanBakuForm">
             <input type="hidden" name="_method" value="PUT">
             <!-- Form fields -->
            <!-- Nama -->
             <div class="mb-3">
                <label for="nama" class="form-label">Nama</label>
                <input type="text" class="form-control is-valid <?=  $validation->hasError('nama') ? 'is-invalid' : '' ?>" id="nama" name="nama" value="<?= old('nama', $bahan_baku['nama']) ?>" required>
                <div class="invalid-feedback">
                    <?php if ($validation->hasError('nama')): ?>
                            <?= $validation->getError('nama') ?>
                            <?php endif; ?>
                </div>
            </div>
            <!-- Jumlah -->
            <div class="mb-3">
                <label for="jumlah" class="form-label">Jumlah</label>
                <input type="number" class="form-control is-valid <?= $validation->hasError('jumlah') ? 'is-invalid' : '' ?>" id="jumlah" name="jumlah" value="<?= old('jumlah', $bahan_baku['jumlah']) ?>" required>
                <div class="invalid-feedback">
                    <?php if ($validation->hasError('jumlah')): ?>
                        <?= $validation->getError('jumlah') ?>
                        <?php endif; ?>
                    </div>
                </div>
            <!-- Satuan -->
                <div class="mb-3">
                    <label for="satuan" class="form-label">Satuan</label>
                    <input type="text" class="form-control is-valid <?=  $validation->hasError('satuan') ? 'is-invalid' : '' ?>" id="satuan" name="satuan" value="<?= old('satuan', $bahan_baku['satuan']) ?>" required>
                    <div class="invalid-feedback">
                        <?php if ($validation->hasError('satuan')): ?>
                            <?= $validation->getError('satuan') ?>
                            <?php endif; ?>
                        </div>
                    </div>
            <!-- Kategori -->
                <div class="mb-3">
                    <label for="kategori" class="form-label">Kategori</label>
                    <input type="text" class="form-control is-valid <?=  $validation->hasError('kategori') ? 'is-invalid' : '' ?>" id="kategori" name="kategori" value="<?= old('kategori', $bahan_baku['kategori']) ?>" required>
                    <div class="invalid-feedback">
                        <?php if ($validation->hasError('kategori')): ?>
                                <?= $validation->getError('kategori') ?>
                                <?php endif; ?>
                    </div>
                </div>
                <!-- Tanggal Masuk -->
                <div class="mb-3">
                    <label for="tanggal_masuk" class="form-label">Tanggal Masuk</label>
                    <input type="date" class="form-control is-valid <?= $validation->hasError('tanggal_masuk') ? 'is-invalid' : '' ?>" id="tanggal_masuk" name="tanggal_masuk" value="<?= old('tanggal_masuk', $bahan_baku['tanggal_masuk']) ?>" required>
                    <div class="invalid-feedback">
                <?php if ($validation->hasError('tanggal_masuk')): ?>
                        <?= $validation->getError('tanggal_masuk') ?>
                        <?php endif; ?>
                </div>
            </div>
            <!-- Tanggal Kadaluarsa -->
            <div class="mb-3">
                <label for="tanggal_kadaluarsa" class="form-label">Tanggal Kadaluarsa</label>
                <input type="date" class="form-control is-valid <?= $validation->hasError('tanggal_kadaluarsa') ? 'is-invalid' : '' ?>" id="tanggal_kadaluarsa" name="tanggal_kadaluarsa" value="<?= old('tanggal_kadaluarsa', $bahan_baku['tanggal_kadaluarsa']) ?>" required>
                <div class="invalid-feedback">
                <?php if ($validation->hasError('tanggal_kadaluarsa')): ?>
                        <?= $validation->getError('tanggal_kadaluarsa') ?>
                        <?php endif; ?>
                </div>
            </div>
            <div class="d-flex justify-content-end">
                <a href="/bahan-baku" class="btn btn-secondary me-2">Batal</a>
                <button type="submit" class="btn btn-primary" id="btnSubmit">Simpan</button>
            </div>
        </form>
    </div>

</div>
</div>
</div>
</div>
<?= $this->endSection(); ?>