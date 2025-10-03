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
          <td class="text-center"><button class="btn btn-primary btn-sm lihat-detail" data-id="<?=$pm['id']?>" data-detail='<?=json_encode($pm["details"])?>' data-bs-toggle="modal" data-bs-target="#bahanModal">Lihat Detail</button></td>
          <td class="text-center"><div class="badge rounded-pill <?=
            ($pm['status'] == 'disetujui') ? 'text-bg-success': (($pm['status'] == 'ditolak') ? 'text-bg-danger' : 'text-bg-warning') ?>"><?=$pm['status']?></div></td>
          <td>
            <?php 
              if($pm['status'] != 'menunggu') continue;
            ?>
            <div class="d-flex justify-content-evenly">
              <form data-id="<?= $pm['id'] ?>" data-name="<?=$pm['id']?>" class="" onsubmit="return false;">
              <button type="submit"  class="btn btn-success btn-sm rounded-pill">
                <i class="bi bi-check-lg"></i> Terima
              </button>
              </form>
              <form data-id="<?= $pm['id'] ?>" data-name="<?=$pm['id']?>" class="delete-form" onsubmit="return false;">
                <button type="submit"  class="btn btn-danger btn-sm rounded-pill" >
                  <i class="bi bi-x-lg"></i> Tolak
                </button>
              </form>
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

<script>
  document.addEventListener("DOMContentLoaded", () => {
  const detailBtn = document.querySelectorAll(".lihat-detail");
  const tableBody = document.querySelector("#bahan-diminta tbody");
  const label = document.querySelector("#bahanModalLabel");
  
  let count = 1;

  detailBtn.forEach((btn) => {
    btn.addEventListener("click", ()=>{
      const detail =JSON.parse(btn.getAttribute('data-detail'));
      label.innerHTML = 'Daftar Bahan Diminta (ID : ' + btn.getAttribute('data-id') + ')';
      for (let i = 0; i < detail.length; i++) {
        const row = document.createElement('tr');
        row.innerHTML = "";
        const bahanNama = detail[i].nama;
        const bahanJumlah = detail[i].jumlah_diminta;
        const bahanSatuan = detail[i].satuan;
        row.innerHTML += `
          <td>${count++}</td>
          <td>${bahanNama}</td>
          <td>${bahanJumlah}</td>
          <td>${bahanSatuan}</td>
        `
        tableBody.appendChild(row);
      } 
      
    });
  });
});

</script>

<?=$this->endSection();?>