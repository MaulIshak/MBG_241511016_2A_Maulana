<?= $this->extend('layout/page_template'); ?>
<?= $this->section('main-content'); ?>

<h2 class=" my-3 mb-4 fw-bold">Daftar User</h2>
<p class="text-secondary my-3 pb-3"> Berikut adalah daftar user yang terdaftar dalam sistem.</p>
<div class="d-flex my-3 row">

  <div class="my-3">
      <a href="/users/create" class="btn btn-success">+ Tambah User</a>
  <div>

  </div>
</div>
  <table class="table table-bordered table-striped">
    <thead>
      <tr>
        <th scope="col">id</th>
        <th scope="col">Username</th>
        <th scope="col">Role</th>
        <th scope="col w-25">Aksi</th>
      </tr>
   </thead>
    <tbody id="tbody-data">
      <?php
        if(isset($users)): 
          if(!empty($users)):
            foreach($users as $usr):
      ?>
        <tr>
          <td><?=$usr['user_id']?></td>
          <td><?=$usr['username']?></td>
          <td><?=$usr['role']?></td>
          <td class="w-25">
            <div class="d-flex justify-content-evenly">
              <a href="/users/detail/<?=$usr['user_id']?>" class="btn btn-primary btn-sm">
                <i class="bi bi-info-circle"></i> Detail</a>
              <a href="/users/edit/<?=$usr['user_id']?>" class="btn btn-warning btn-sm">
                <i class="bi bi-pencil-square"></i> Edit</a>

                <form data-id="<?= $usr['user_id'] ?>" data-name="<?=$usr['username']?>" class="delete-form" onsubmit="return false;">
                  <!-- <input type="hidden" name="_method" value="DELETE"> -->
                  <button type="submit"  class="btn btn-danger btn-sm">
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