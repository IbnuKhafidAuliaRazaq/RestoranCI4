<?= $this->extend('template/admin') ?>

<?= $this->section('content') ?>

<?php

if (isset($_GET['page_page'])) {
    $page = $_GET['page_page'];
    $jumlahisi = 5;
    $no = ($jumlahisi * $page) - $jumlahisi + 1;
} else {
    $no = 1;
}


?>
<div class="row">
    <div class="col-4 mt-2">
        <a href="<?= base_url('/admin/kategori/create') ?>" class="btn btn-primary" role="button">Tambah Data</a>
    </div>
    <div class="col">
        <h1><?php echo $judul; ?></h1>
    </div>
</div>

<div class="row mt-3">
    <div class="col">
        <table class="table">
            <tr>
                <th>No</th>
                <th>Kategori</th>
                <th>Keterangan</th>
                <th colspan="2">Aksi</th>
            </tr>

            <?php foreach ($kategori as $key => $value) : ?>

                <tr>
                    <td><?php echo $no++; ?></td>
                    <td><?php echo $value['kategori']; ?></td>
                    <td><?php echo $value['keterangan']; ?></td>
                    <td><a href="<?= base_url() ?>/admin/kategori/delete/<?php echo $value['idkategori']; ?>"><img src="<?= base_url('icon/trash.svg') ?>" alt=""></a></td>
                    <td><a href="<?= base_url() ?>/admin/kategori/find/<?php echo $value['idkategori']; ?>"><img src="<?= base_url('icon/pencil.svg') ?>" alt=""></a></td>
                </tr>
            <?php endforeach; ?>

        </table>

        <?= $pager->links('page', 'template') ?>
    </div>
</div>


<?= $this->endSection() ?>