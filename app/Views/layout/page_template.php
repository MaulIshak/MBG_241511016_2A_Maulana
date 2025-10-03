<?=$this->extend('layout/template');?>
<?=$this->section('content');?>
<nav class="navbar navbar-expand-lg bg-body-tertiary">
  <div class="container-fluid">
    <a class="navbar-brand" href="/">
      <img src="<?=base_url('img/Logo_Badan_Gizi_Nasional.png')?>" alt="logo bfg" width="30" class="d-inline-block align-text-top">
      <span class="fw-bold">
        Pantau<span class="text-success">MBG</span> 
      </span>
    </a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNav">
      <?php
        if(session()->get('role') == 'gudang'):
      ?>
      <ul class="navbar-nav">
        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="/">Home</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="/bahan-baku">Bahan Baku</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="/bahan-baku/permintaan">Permintaan</a>
        </li>
      </ul>

      <?php
        elseif(session()->get('role') == 'dapur'):
      ?>
      <ul class="navbar-nav">
        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="/">Home</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="/dapur/permintaan">Form Permintaan</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="/dapur/permintaan-saya">Permintaan Saya</a>
        </li>
      </ul>

      <?php endif; ?>
      <button type="button" class="btn btn-danger ms-auto" data-bs-toggle="modal" data-bs-target="#staticBackdrop">
      Logout </button>
    </div>
  </div>
</nav>

<!-- Modal -->
<div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="staticBackdropLabel">Konfirmasi Logout</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        Yakin ingin keluar dari sistem?
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        <form action="/auth/logout">
          <button type="submit" class="btn btn-danger">Keluar</button>

        </form>
      </div>
    </div>
  </div>
</div>


<main class="container my-5">
  <!-- Notifikasi -->
  <?php if(session()->getFlashdata('success')): ?>
    <div class="alert alert-success alert-dismissible fade show" role="alert">
          <?= session()->getFlashdata('success') ?>
          <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
      </div>
  <?php endif; ?>
  <?php if(session()->getFlashdata('error')): ?>
      <div class="alert alert-danger alert-dismissible fade show" role="alert">
          <?= session()->getFlashdata('error') ?>
          <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
      </div>
  <?php endif; ?>
  <?= $this->renderSection('main-content') ?>
</main>

<footer class="d-flex flex-wrap justify-content-between align-items-center py-3 my-4 border-top"> <p class="col-md-4 mb-0 text-body-secondary">© 2025 Maulana Ishak</p> </footer>
<?=$this->endSection();?>