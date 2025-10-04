<?=$this->extend('layout/page_template');?>


<?=$this->section('main-content');?>

<h2 class="my-3 mb-4 fw-bold">Dashboard</h2>
<h1>Selamat Datang <?=session()->get('name')?>!</h1>

<?=$this->endSection();?>