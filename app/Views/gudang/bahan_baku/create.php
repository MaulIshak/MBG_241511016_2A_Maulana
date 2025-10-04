<?= $this->extend('layout/page_template') ?>

<?= $this->section('main-content') ?>

<?php $validation = session()->getFlashdata('validation') ?? \Config\Services::validation();
    // d($validation->listErrors());
?>
<div class="container">
<div class="row">
<div class="col-md-8 offset-md-2">
    
<h2 class="my-3 mb-4 fw-bold">Tambah Bahan Baku Baru</h2>
<p class="text-secondary my-3 pb-3"> Isi form di bawah untuk menambahkan data bahan baku baru.</p>

<div class="card">
    <div class="card-body">
        <form action="/bahan-baku/create" method="post" id="bahanBakuForm">
             <div class="mb-3">
                <label for="nama" class="form-label">Nama</label>
                <input type="text" class="form-control <?= $validation->hasError('nama') ? 'is-invalid' : '' ?>" id="nama" name="nama" value="<?= old('nama') ?>" required>
                <div class="invalid-feedback">
                <?php if ($validation->hasError('nama')): ?>
                        <?= $validation->getError('nama') ?>
                        <?php endif; ?>
                  </div>
            </div>
             <div class="mb-3">
                <label for="kategori" class="form-label">Kategori</label>
                <input type="text" class="form-control <?= $validation->hasError('kategori') ? 'is-invalid' : '' ?>" id="kategori" name="kategori" value="<?= old('kategori') ?>" required>
                <div class="invalid-feedback">
                <?php if ($validation->hasError('kategori')): ?>
                        <?= $validation->getError('kategori') ?>
                        <?php endif; ?>
                  </div>
            </div>
            <!-- Satuan -->
            <div class="mb-3">
                <label for="satuan" class="form-label">Satuan</label>
                <input type="text" class="form-control <?= $validation->hasError('satuan') ? 'is-invalid' : '' ?>" id="satuan" name="satuan" value="<?= old('satuan') ?>" required>
                <div class="invalid-feedback">
                <?php if ($validation->hasError('satuan')): ?>
                        <?= $validation->getError('satuan') ?>
                        <?php endif; ?>
                  </div>
            </div>
            <!-- Jumlah -->
            <div class="mb-3">
                <label for="jumlah" class="form-label">Jumlah</label>
                <input type="number" class="form-control <?= $validation->hasError('jumlah') ? 'is-invalid' : '' ?>" id="jumlah" name="jumlah" value="<?= old('jumlah') ?>" required>
                <div class="invalid-feedback">
                <?php if ($validation->hasError('jumlah')): ?>
                        <?= $validation->getError('jumlah') ?>
                        <?php endif; ?>
                  </div>
            </div>
            <!-- Tanggal Masuk -->
            <div class="mb-3">
                <label for="tanggal_masuk" class="form-label">Tanggal Masuk</label>
                <input type="date" class="form-control <?= $validation->hasError('tanggal_masuk') ? 'is-invalid' : '' ?>" id="tanggal_masuk" name="tanggal_masuk" value="<?= old('tanggal_masuk') ?>" required>
                <div class="invalid-feedback">
                <?php if ($validation->hasError('tanggal_masuk')): ?>
                        <?= $validation->getError('tanggal_masuk') ?>
                        <?php endif; ?>
                  </div>
            </div>
            <!-- Tanggal kadaularsa -->
            <div class="mb-3">
                <label for="tanggal_kadaluarsa" class="form-label">Tanggal Kadaluarsa</label>
                <input type="date" class="form-control <?= $validation->hasError('tanggal_kadaluarsa') ? 'is-invalid' : '' ?>" id="tanggal_kadaluarsa" name="tanggal_kadaluarsa" value="<?= old('tanggal_kadaluarsa') ?>" required>
                <div class="invalid-feedback">
                <?php if ($validation->hasError('tanggal_kadaluarsa')): ?>
                        <?= $validation->getError('tanggal_kadaluarsa') ?>
                        <?php endif; ?>
                  </div>
            </div>
              <div class="d-flex justify-content-end">
                <a href="/bahan-baku" class="btn btn-secondary me-2">Batal</a>
                <button type="submit" class="btn btn-primary" id="btnSubmit" disabled>Simpan</button>
            </div>
        </form>
    </div>
</div>
</div>
</div>
</div>

<?= $this->endSection() ?>
