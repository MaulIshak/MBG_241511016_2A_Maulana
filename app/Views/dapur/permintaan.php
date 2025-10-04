
<?=$this->extend('layout/page_template')?>
<?=$this->section('main-content')?>
<div class="container">
    <div class="row">
        <div class="col-md-8 offset-md-2">
            <h2 class="mt-4 mb-4">Form Permintaan Bahan Baku Dapur</h2>
            <form action="/dapur/permintaan" method="post" id="permintaanForm">
                <?= csrf_field() ?>
                <div class="mb-3">
                    <label for="tanggal_masak" class="form-label">Tanggal Masak</label>
                    <input type="date" class="form-control" id="tanggal_masak" name="tanggal_masak" required>
                    <div class="invalid-feedback"> </div>
                </div>
                <div class="mb-3">
                    <label for="menu" class="form-label">Menu yang akan dibuat</label>
                    <input type="text" class="form-control" id="menu" name="menu" required>
                    <div class="invalid-feedback"> </div>
                </div>
                <div class="mb-3">
                    <label for="jumlah_porsi" class="form-label">Jumlah Porsi yang dibuat</label>
                    <input type="number" class="form-control" id="jumlah_porsi" name="jumlah_porsi" required>
                    <div class="invalid-feedback"> </div>
                </div>
                <div class="mb-3">
                    <label class="form-label">Daftar Bahan Baku yang diminta</label>
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Nama Bahan Baku</th>
                                <th>Jumlah</th>
                            </tr>
                        </thead>
                        <tbody id="bahanBakuList">
                            <tr>
                                <td>1</td>
                                <td>
                                    <select class="form-select" name="bahan_baku[]" required>
                                        <option value="" disabled selected>Pilih Bahan Baku</option>
                                        <?php if (isset($bahan_baku) && !empty($bahan_baku)): ?>
                                            <?php foreach ($bahan_baku as $bb): ?>
                                                <option value="<?= $bb['id'] ?>"> <?= $bb['nama'] ?> (<b>Stok: <?= $bb['jumlah'] ?></b> <?= $bb['satuan'] ?>)</option>
                                            <?php endforeach; ?>
                                        <?php endif; ?>
                                    </select>
                                    <div class="invalid-feedback"> </div>
                                </td>
                                <td>
                                    <input type="number" class="form-control" name="jumlah_bahan[]" min="1" required>
                                    <div class="invalid-feedback"> </div>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                    <button type="button" class="btn btn-secondary" id="addBahanBakuRow">+ Tambah Bahan Baku</button>
                </div>
                <button type="submit" class="btn btn-primary" id="btnSubmit" disabled>Submit</button>
            </form>
        </div>
    </div>
</div>
<script>
    document.getElementById('addBahanBakuRow').addEventListener('click', function() {
        const tableBody = document.getElementById('bahanBakuList');
        const rowCount = tableBody.rows.length;
        const newRow = tableBody.insertRow();

        const cell1 = newRow.insertCell(0);
        const cell2 = newRow.insertCell(1);
        const cell3 = newRow.insertCell(2);

        const invalidFb= document.createElement('div');
        invalidFb.classList.add('invalid-feedback');

        cell1.textContent = rowCount + 1;

        const bahanSelect = document.createElement('select');
        bahanSelect.className = 'form-select';
        bahanSelect.name = 'bahan_baku[]';
        bahanSelect.required = true;

        const defaultOption = document.createElement('option');
        defaultOption.value = '';
        defaultOption.disabled = true;
        defaultOption.selected = true;
        defaultOption.textContent = 'Pilih Bahan Baku';
        bahanSelect.appendChild(defaultOption);

        <?php if (isset($bahan_baku) && !empty($bahan_baku)): ?>
            <?php foreach ($bahan_baku as $bb): ?>
                const option<?= $bb['id'] ?> = document.createElement('option');
                option<?= $bb['id'] ?>.value = '<?= $bb['id'] ?>';
                option<?= $bb['id'] ?>.textContent = '<?= $bb['nama'] ?> (Stok: <?= $bb['jumlah'] ?> <?= $bb['satuan'] ?>)';
                bahanSelect.appendChild(option<?= $bb['id'] ?>);
            <?php endforeach; ?>
        <?php endif; ?>

        cell2.appendChild(bahanSelect);
        cell2.appendChild(invalidFb);


        const jumlahInput = document.createElement('input');
        jumlahInput.type = 'number';
        jumlahInput.className = 'form-control';
        jumlahInput.name = 'jumlah_bahan[]';
        jumlahInput.min = '1';
        jumlahInput.required = true;

        cell3.appendChild(jumlahInput);
        cell3.appendChild(invalidFb);
    });
</script>
<?=$this->endSection()?>

