<?=$this->extend('layout/page_template');?>

<?=$this->section('main-content');?>

<div>
  <h2 class="my-3 mb-4 fw-bold">Dashboard</h2>
  <h4 class="text-secondary">Selamat Datang, <?=esc(session()->get('name'))?>!</h4>
</div>

<?php if(session()->get('role') == 'gudang'): ?>
  <!-- ========================= -->
<!-- TIPS & INSIGHT SECTION -->
<!-- ========================= -->
<div class="mt-3">
  <div class="card border-0 shadow-sm rounded-3">
    <div class="card-body">
      <h5 class="fw-bold text-primary mb-3"><i class="bi bi-lightbulb-fill me-2"></i>Tips & Insight Gudang</h5>
      <ul class="list-unstyled">
        <li class="mb-2">
          <i class="bi bi-check-circle text-success me-2"></i>
          <strong>Pastikan rotasi stok dilakukan secara rutin (FIFO):</strong>
          Gunakan bahan yang lebih lama terlebih dahulu agar tidak menumpuk dan kadaluarsa.
        </li>
        <li class="mb-2">
          <i class="bi bi-check-circle text-success me-2"></i>
          <strong>Perhatikan bahan dengan label “segera kadaluarsa”:</strong>
          Jika jumlahnya meningkat, pertimbangkan redistribusi atau pemakaian lebih cepat.
        </li>
        <li class="mb-2">
          <i class="bi bi-check-circle text-success me-2"></i>
          <strong>Validasi permintaan dengan teliti:</strong>
          Pastikan status permintaan sesuai dengan ketersediaan bahan di gudang untuk menghindari over-request.
        </li>
        <li class="mb-2">
          <i class="bi bi-check-circle text-success me-2"></i>
          <strong>Gunakan momen pagi untuk pengecekan cepat:</strong>
          Dashboard ini menampilkan data ringkas untuk membantu kamu mengambil keputusan lebih cepat setiap hari.
        </li>
      </ul>
    </div>
  </div>
</div>
<div class="container mt-4">
    <div class="row g-4">
    <!-- Card 1 -->
    <div class="col-md-6">
      <div class="card shadow-sm border-0 rounded-3">
        <div class="card-body d-flex align-items-center">
          <div class="me-3 text-info">
            <i class="bi bi-egg-fill fs-1"></i>
          </div>
          <div>
            <h5 class="fw-bold mb-1 fs-4"><?=$jumlah_bahan_baku;?></h5>
            <p class="text-secondary mb-0 fs-6">Jumlah Bahan Baku</p>
          </div>
           <a href="/bahan-baku" class="btn btn-outline-primary btn-sm ms-auto">Detail</a>
        </div>
      </div>
    </div>

    <!-- Card 2 -->
    <div class="col-md-6">
      <div class="card shadow-sm border-0 rounded-3">
        <div class="card-body d-flex align-items-center">
          <div class="me-3 text-warning">
            <i class="bi bi-exclamation-circle-fill fs-1"></i>
          </div>
          <div class="flex-grow-1">
            <h5 class="fw-bold mb-1 fs-4"><?=$jumlah_permintaan;?></h5>
            <p class="text-secondary mb-0 fs-6">Jumlah Permintaan</p>
          </div>
          <a href="/bahan-baku/permintaan" class="btn btn-outline-primary btn-sm ms-auto">Detail</a>
        </div>
      </div>
    </div>
  </div>
  </div>

  <!-- ========================= -->
  <!-- CHART SECTION -->
  <!-- ========================= -->
  <div class="row mt-5">
    <div class="col-lg-6 mb-4">
      <div class="card shadow-sm border-0 rounded-3">
        <div class="card-header bg-info text-white fw-semibold">Status Bahan Baku</div>
        <div class="card-body">
          <div class="chart-container">
            <canvas id="chartBahanBaku" height="150" width="150"></canvas>
          </div>
        </div>
      </div>
    </div>

    <div class="col-lg-6 mb-4">
      <div class="card shadow-sm border-0 rounded-3">
        <div class="card-header bg-warning text-dark fw-semibold">Status Permintaan</div>
        <div class="card-body">
          <div class="chart-container">
            <canvas id="chartPermintaan" height="250"></canvas>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
<?php endif; ?>


<!-- ========================= -->
<!-- CHART.JS SCRIPT -->
<!-- ========================= -->
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script>
  // Data untuk chart bahan baku
  const dataBahanBaku = {
    labels: ['Tersedia', 'Segera Kadaluarsa', 'Kadaluarsa'],
    datasets: [{
      label: 'Jumlah Bahan Baku',
      data: [
        <?=$jumlah_bahan_tersedia?>,
        <?=$jumlah_bahan_segera_kadaluarsa?>,
        <?=$jumlah_bahan_kadaluarsa?>
      ],
      backgroundColor: [
        'rgba(54, 162, 235, 0.7)',
        'rgba(255, 206, 86, 0.7)',
        'rgba(255, 99, 132, 0.7)'
      ],
      borderColor: [
        'rgba(54, 162, 235, 1)',
        'rgba(255, 206, 86, 1)',
        'rgba(255, 99, 132, 1)'
      ],
      borderWidth: 1
    }]
  };

  // Chart bahan baku
  new Chart(document.getElementById('chartBahanBaku'), {
    type: 'doughnut',
    data: dataBahanBaku,
    options: {
      responsive: true,
      plugins: {
        legend: { position: 'bottom' },
        title: { display: false }
      }
    }
  });

  // Data untuk chart permintaan
  const dataPermintaan = {
    labels: ['Menunggu', 'Disetujui', 'Ditolak'],
    datasets: [{
      label: 'Jumlah Permintaan',
      data: [
        <?=$jumlah_permintaan_menunggu?>,
        <?=$jumlah_permintaan_disetujui?>,
        <?=$jumlah_permintaan_ditolak?>
      ],
      backgroundColor: [
        'rgba(255, 206, 86, 0.7)',
        'rgba(75, 192, 192, 0.7)',
        'rgba(255, 99, 132, 0.7)'
      ],
      borderColor: [
        'rgba(255, 206, 86, 1)',
        'rgba(75, 192, 192, 1)',
        'rgba(255, 99, 132, 1)'
      ],
      borderWidth: 1
    }]
  };

  // Chart permintaan
  new Chart(document.getElementById('chartPermintaan'), {
    type: 'bar',
    data: dataPermintaan,
    options: {
      responsive: true,
      scales: {
        y: { beginAtZero: true }
      },
      plugins: {
        legend: { display: false },
        title: { display: false }
      }
    }
  });
</script>

<?=$this->endSection();?>
