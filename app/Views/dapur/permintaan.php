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
                <h4 class="mt-4">Daftar Bahan Baku yang diminta</h4>
                <div id="bahan-baku-list">
                    <div class="mb-3 bahan-baku-item">
                        <div class="row">
                            <div class="col-md-6">
                                <label for="nama_bahan_1" class="form-label">Nama Bahan Baku</label>
                                <input type="text" class="form-control" id="nama_bahan_1" name="nama_bahan[]" required>
                            </div>
                            <div class="col-md-4">
                                <label for="jumlah_bahan_1" class="form-label">Jumlah</label>
                                <input type="number" class="form-control" id="jumlah_bahan_1" name="jumlah_bahan[]" required>
                            </div>
                            <div class="col-md-2 d-flex align-items-end">
                                <button type="button" class="btn btn-danger remove-bahan-baku">Hapus</button>
                            </div>
                        </div>
                    </div>
                </div>
                <button type="button" class="btn btn-secondary mb-3" id="tambah-bahan-baku">Tambah Bahan Baku</button>
                <br>
                <button type="submit" class="btn btn-primary">Submit</button>
            </form>
        </div>
    </div>
</div>
<script>
    document.getElementById('tambah-bahan-baku').addEventListener('click', function() {
        const bahanBakuList = document.getElementById('bahan-baku-list');
        const index = bahanBakuList.children.length + 1;
        const newItem = document.createElement('div');
        newItem.classList.add('mb-3', 'bahan-baku-item');
        newItem.innerHTML = `
            <div class="row">
                <div class="col-md-6">
                    <label for="nama_bahan_${index}" class="form-label">Nama Bahan Baku</label>
                    <input type="text" class="form-control" id="nama_bahan_${index}" name="nama_bahan[]" required>
                </div>
                <div class="col-md-4">
                    <label for="jumlah_bahan_${index}" class="form-label">Jumlah</label>
                    <input type="number" class="form-control" id="jumlah_bahan_${index}" name="jumlah_bahan[]" required>
                </div>
                <div class="col-md-2 d-flex align-items-end">
                    <button type="button" class="btn btn-danger remove-bahan-baku">Hapus</button>
                </div>
            </div>
        `;
        bahanBakuList.appendChild(newItem);
    });

    document.getElementById('bahan-baku-list').addEventListener('click', function(e) {
        if (e.target && e.target.classList.contains('remove-bahan-baku')) {
            e.target.closest('.bahan-baku-item').remove();
        }
    });
</script>
<?=$this->endSection()?>

