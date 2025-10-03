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
        <th scope="col">Pemohon</th>
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
          <td><?=$pm['pemohon_id']?></td>
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

<?=$this->endSection();?>