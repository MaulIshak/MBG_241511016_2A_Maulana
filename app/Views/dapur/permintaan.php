<!-- form input

Tanggal Masak : [date]
Menu yang akan dibuat : [teks]
Jumlah Porsi yang dibuat: [numeric]
Daftar Bahan Baku yang diminta :

No Nama Bahan Baku Jumlah
1 [teks] [numerik]
2 [teks] [numerik]

3 [teks] [numerik] -->
<?=$this->extend('layout/page_template')?>
<?=$this->section('main-content')?>
<div class="container">
    <div class="row">
        <div class="col-md-8 offset-md-2">
            <h2 class="mt-4 mb-4">Form Permintaan Bahan Baku Dapur</h2>
            <form action="/dapur/permintaan" method="post">
                <?= csrf_field() ?>
                <div class="mb-3">
                    <label for="tanggal_masak" class="form-label">Tanggal Masak</label>
                    <input type="date" class="form-control" id="tanggal_masak" name="tanggal_masak" required>
                </div>
                <div class="mb-3">
                    <label for="menu" class="form-label">Menu yang akan dibuat</label>
                    <input type="text" class="form-control" id="menu" name="menu" required>
                </div>
                <div class="mb-3">
                    <label for="jumlah_porsi" class="form-label">Jumlah Porsi yang dibuat</label>
                    <input type="number" class="form-control" id="jumlah_porsi" name="jumlah_porsi" required>
                </div>
                <button type="submit" class="btn btn-primary">Submit</button>
            </form>
        </div>
    </div>
</div>
<?=$this->endSection()?>

