<?= $this->extend('template/admin') ?>

<?= $this->section('content') ?>

<div class="row">
    <?= view_cell('\App\Controllers\Admin\menu::option') ?>
</div>

<h1> UPLOUD IMAGE </h1>

<form action="<?= base_url('/admin/menu/insert')?>" method="post" enctype="multipart/form-data">
    Gambar : <input type="file" name="gambar" id="" required>
    
    <br>
    <input type="submit" value="SIMPAN" name="simpan">


</form>

<?= $this->endSection() ?>