<?=$this->extend('layout/page_template');?>


<?=$this->section('main-content');?>


<h1>Selamat Datang <?=session()->get('name')?>!</h1>

<?=$this->endSection();?>