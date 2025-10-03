<?= $this->extend('layout/page_template'); ?>
<?= $this->section('main-content'); ?>

<h2 class=" my-3 mb-4 fw-bold">Daftar Bahan Baku</h2>
<p class="text-secondary my-3 pb-3"> Berikut adalah daftar bahan baku yang terdaftar dalam sistem.</p>
<div class="d-flex my-3 row">
  <!-- Tambahkan catatn di-atas table bahan yang bisa dihapus hanya yang kadaluarsa -->
  <div class="alert alert-info" role="alert">
    <h4 class="alert-heading">Catatan:</h4>
    <p>Hanya bahan baku dengan status <strong>"kadaluarsa"</strong> yang dapat dihapus. Pastikan untuk memeriksa status bahan baku sebelum melakukan penghapusan.</p>

  </div>
  <div class="my-2">
      <a href="/bahan-baku/create" class="btn btn-success">+ Tambah Bahan Baku</a>
  </div>

</div>
  <table class="table table-bordered table-striped">
    <thead>
      <tr>
        <th scope="col">ID</th>
        <th scope="col">Nama</th>
        <th scope="col">Kategori</th>
        <th scope="col">Jumlah</th>
        <th scope="col">Satuan</th>
        <th scope="col">Tanggal Masuk</th>
        <th scope="col">Tanggal Kadaluarsa</th>
        <th scope="col">Status</th>
        <th scope="col">Aksi</th>
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
          <td><?=$bb['satuan']?></td>
          <td><?=$bb['tanggal_masuk']?></td>
          <td><?=$bb['tanggal_kadaluarsa']?></td>
          <td><div class=" fw-bold <?=
            ($bb['status'] == 'tersedia') ? 'text-success': (($bb['status'] == 'kadaluarsa') ? 'text-danger' : (($bb['status'] == 'habis') ? 'text-dark' : 'text-warning')) ?>"><?=$bb['status']?></div></td>
          <td>
            <div class="d-flex justify-content-evenly">
              <!-- <a href="/bahan-baku/detail/<?=$bb['id']?>" class="btn btn-primary btn-sm">
                <i class="bi bi-info-circle"></i> Detail</a> -->

                <form data-id="<?= $bb['id'] ?>" data-name="<?=$bb['nama']?>" class="delete-form" onsubmit="return false;">
                  <!-- <input type="hidden" name="_method" value="DELETE"> -->
                  <div class="input-group">
                    <a href="/bahan-baku/edit/<?=$bb['id']?>" class="btn btn-warning btn-sm">
                      <i class="bi bi-pencil-square"></i> Edit
                    </a>
                    <button type="submit"  class="btn btn-danger btn-sm" <?=( $bb['status'] != "kadaluarsa")  ? 'disabled':'';?> >
                      <i class="bi bi-trash"></i> Delete
                    </button>
                  </div>
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