<?= $this->extend('layout/page_template'); ?>
<?= $this->section('main-content'); ?>
<!-- Lihat permintaan -->
<h2 class=" my-3 mb-4 fw-bold">Daftar Permintaan Bahan Baku</h2>
<p class="text-secondary my-3 pb-3"> Berikut adalah daftar permintaan bahan baku dari dapur.</p>
<div class="d-flex my-3 row">
  <table class="table table-bordered table-striped">
    <thead>
      <tr>
        <th scope="col">ID</th>
        <th scope="col">Tanggal Masak</th>
        <th scope="col">Menu Makan</th>
        <th scope="col">Jumlah Porsi</th>
        <th scope="col">Pemohon</th>
        <th scope="col">Status</th>
        <th scope="col w-25">Aksi</th>
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
          <td><?=$pm['status']?></td>
          <td class="w-25">
            <div class="d-flex justify-content-evenly">
              <a href="/permintaan/detail/<?=$pm['id']?>" class="btn btn-primary btn-sm">
                <i class="bi bi-info-circle"></i> Detail</a>
              <!-- <a href="/permintaan/edit/<?=$pm['id']?>" class="btn btn-warning btn-sm">
                <i class="bi bi-pencil-square"></i> Edit</a> -->

                <form data-id="<?= $pm['id'] ?>" data-name="<?=$pm['id']?>" class="delete-form" onsubmit="return false;">
                  <!-- <input type="hidden" name="_method" value="DELETE"> -->
                  <button type="submit"  class="btn btn-danger btn-sm" <?= $pm['status'] != 'pending' ? 'disabled':'';?> >
                    <i class="bi bi-trash"></i> Delete
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