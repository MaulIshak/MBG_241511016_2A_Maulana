<?= $this->extend('layout/page_template'); ?>
<?= $this->section('main-content'); ?>
<!-- Lihat permintaan -->
<h2 class=" my-3 mb-4 fw-bold">Daftar Permintaan Bahan Baku</h2>
<p class="text-secondary my-3 pb-3"> Berikut adalah daftar permintaan bahan baku dari dapur.</p>
<div class="d-flex my-3 row">
  <table class="table table-bordered table-striped">
    <thead>
      <tr class="text-center">
        <th scope="col">ID</th>
        <th scope="col">Tanggal Masak</th>
        <th scope="col">Menu Makan</th>
        <th scope="col">Jumlah Porsi</th>
        <th scope="col">Nama Pemohon</th>
        <th scope="col">Bahan Diminta</th>
        <th scope="col">Status</th>
        <th scope="col">Aksi</th>
      </tr>
   </thead>
    <tbody id="tbody-data">
      <?php
        if(isset($permintaan)): 
          if(!empty($permintaan)):
            foreach($permintaan as $pm):
      ?>
        <tr>
          <td><?=$pm['id']?></td>
          <td><?=$pm['tgl_masak']?></td>
          <td><?=$pm['menu_makan']?></td>
          <td><?=$pm['jumlah_porsi']?></td>
          <td><?=$pm['pemohon_name']?></td>
          <td class="text-center"><button class="btn btn-primary btn-sm rounded-pill lihat-detail" data-id="<?=$pm['id']?>" data-detail='<?=json_encode($pm["details"])?>' data-bs-toggle="modal" data-bs-target="#bahanModal">Lihat Detail</button></td>
          <td class="text-center"><div class="badge rounded-pill <?=
            ($pm['status'] == 'disetujui') ? 'text-bg-success': (($pm['status'] == 'ditolak') ? 'text-bg-danger' : 'text-bg-warning') ?>"><?=$pm['status']?></div></td>
          <td>
            <?php 
              if($pm['status'] != 'menunggu') continue;
            ?>
            <div class="d-flex justify-content-evenly">
              <!-- <form action="permintaan/terima/<?=$pm['id']?>" method="post" onsubmit="return confirm('Yakin menyetujui permintaan?')"> -->
                <!-- <input type="hidden" name="_method" value="PUT"> -->
                <button type="submit"  class="btn btn-success btn-sm rounded-pill" data-id="<?=$pm['id']?>" data-bs-toggle="modal" data-bs-target="#setujuModal">
                  <i class="bi bi-check-lg"></i> Setuju
                </button>
              <!-- </form> -->
              <!-- <form action="permintaan/tolak/<?=$pm['id']?>" method="post" onsubmit="return confirm('Yakin menolak permintaan?')"> -->
                <!-- <input type="hidden" name="_method" value="PUT"> -->
                <button type="submit"  class="btn btn-danger btn-sm rounded-pill" data-id="<?=$pm['id']?>" data-bs-toggle="modal" data-bs-target="#setujuModal">
                  <i class="bi bi-x-lg"></i> Tolak
                </button>
              <!-- </form> -->
            </div>
          </td>
        </tr>
      <?php
            endforeach;
          endif;
        endif;
      ?>
  </tbody>

  </table>
</div>

<!-- Modal -->
 <!-- Daftar bahan baku modal -->
<div class="modal fade" id="bahanModal" tabindex="-1" aria-labelledby="bahanModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-scrollable modal-dialog-centered">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="bahanModalLabel">Daftar Bahan Diminta</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <table class="table table-bordered table-striped" id="bahan-diminta">
          <thead>
            <tr>
              <th scope="col">No.</th>
              <th scope="col">Nama</th>
              <th scope="col">Jumlah</th>
              <th scope="col">Satuan</th>
            </tr>
          </thead>
          <tbody>
          </tbody>
        </table>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>

<!-- Modal konfirmasi tolak -->
 <div class="modal fade" id="setujuModal" tabindex="-1" aria-labelledby="setujuModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="setujuModalLabel">Konfirmasi Setuju</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        Yakin menyetujui permintaan?
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        <form action="" method="post">
          <input type="hidden" name="_method" value="PUT">
          <button type="submit" class="btn btn-success">Yakin</button>
        </form>
      </div>
    </div>
  </div>
</div>

<script>
  document.addEventListener("DOMContentLoaded", () => {
  const detailBtn = document.querySelectorAll(".lihat-detail");
  const tableBody = document.querySelector("#bahan-diminta tbody");
  const label = document.querySelector("#bahanModalLabel");
  


  detailBtn.forEach((btn) => {
    btn.addEventListener("click", ()=>{
      tableBody.innerHTML = "";
      const detail =JSON.parse(btn.getAttribute('data-detail'));
      label.innerHTML = 'Daftar Bahan Diminta (ID : ' + btn.getAttribute('data-id') + ')';
      let count = 1;
      for (let i = 0; i < detail.length; i++) {
        const row = document.createElement('tr');
        const bahanNama = detail[i].nama;
        const bahanJumlah = detail[i].jumlah_diminta;
        const bahanSatuan = detail[i].satuan;
        row.innerHTML = `
        <td>${count++}</td>
        <td>${bahanNama}</td>
        <td>${bahanJumlah}</td>
        <td>${bahanSatuan}</td>
        `

        tableBody.appendChild(row);
      } 
      
    });
  });

  // Setujui modal
  const setujuModal = document.getElementById('setujuModal');
  setujuModal.addEventListener('show.bs.modal', function (event) {
    const button = event.relatedTarget;
    if(!button.classList.contains('btn-success')) return;
    console.log('setuju');
    const permintaanId = button.getAttribute('data-id');
    const form = setujuModal.querySelector('form');

    const submitBtn = tolakModal.querySelector('button[type="submit"]');
    const modalTitle = tolakModal.querySelector('.modal-title');
    const modalBody = tolakModal.querySelector('.modal-body');

    modalTitle.textContent = 'Konfirmasi Setuju';
    modalBody.textContent = 'Yakin menyetujui permintaan?';
    submitBtn.classList.remove('btn-danger');
    submitBtn.classList.add('btn-success');

    form.action = `/bahan-baku/permintaan/terima/${permintaanId}`;
  });

  // tolak modal
  const tolakModal = document.getElementById('setujuModal');

  tolakModal.addEventListener('show.bs.modal', function (event) {
    const button = event.relatedTarget;
    if(!button.classList.contains('btn-danger')) return;
    const permintaanId = button.getAttribute('data-id');
    const form = tolakModal.querySelector('form');
    const submitBtn = tolakModal.querySelector('button[type="submit"]');
    const modalTitle = tolakModal.querySelector('.modal-title');
    const modalBody = tolakModal.querySelector('.modal-body');

    modalTitle.textContent = 'Konfirmasi Tolak';
    modalBody.textContent = 'Yakin menolak permintaan?';
    submitBtn.classList.remove('btn-success');
    submitBtn.classList.add('btn-danger');
    form.action = `/bahan-baku/permintaan/tolak/${permintaanId}`;
  });

});




</script>

<?=$this->endSection();?>