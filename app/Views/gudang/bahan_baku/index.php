<?= $this->extend('layout/page_template'); ?>
<?= $this->section('main-content'); ?>

<h2 class=" my-3 mb-4 fw-bold">Daftar User</h2>
<p class="text-secondary my-3 pb-3"> Berikut adalah daftar user yang terdaftar dalam sistem.</p>
<div class="d-flex my-3 row">

  <div class="my-3">
      <a href="/bahan-baku/create" class="btn btn-success">+ Tambah Bahan Baku</a>
  <div>

  </div>
</div>
  <table class="table table-bordered table-striped">
    <thead>
      <tr>
        <th scope="col">ID</th>
        <th scope="col">Nama</th>
        <th scope="col">Kategori</th>
        <th scope="col">Jumlah</th>
        <th scope="col">Tanggal Masuk</th>
        <th scope="col">Tanggal Masuk</th>
        <th scope="col">Status</th>
        <th scope="col w-25">Aksi</th>
      </tr>
   </thead>
    <tbody id="tbody-data">
      <?php
        if(isset($bahan_baku)): 
          if(!empty($bahan_baku)):
            foreach($bahan_baku as $bb):
      ?>
        <tr>
          <td><?=$bb['id']?></td>
          <td><?=$bb['nama']?></td>
          <td><?=$bb['kategori']?></td>
          <td><?=$bb['jumlah']?></td>
          <td><?=$bb['tanggal_masuk']?></td>
          <td><?=$bb['tanggal_kadaluarsa']?></td>
          <td><?=$bb['status']?></td>
          <td class="w-25">
            <div class="d-flex justify-content-evenly">
              <a href="/bahan-baku/detail/<?=$bb['id']?>" class="btn btn-primary btn-sm">
                <i class="bi bi-info-circle"></i> Detail</a>
              <a href="/bahan-baku/edit/<?=$bb['id']?>" class="btn btn-warning btn-sm">
                <i class="bi bi-pencil-square"></i> Edit</a>

                <form data-id="<?= $bb['id'] ?>" data-name="<?=$bb['nama']?>" class="delete-form" onsubmit="return false;">
                  <!-- <input type="hidden" name="_method" value="DELETE"> -->
                  <button type="submit"  class="btn btn-danger btn-sm" <?=( $bb['jumlah']>0) || $bb['status'] ? 'disabled':'';?> >
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


<?= $this->endSection(); ?>