<?= $this->extend('template/admin') ?>

<?= $this->section('content') ?>

<?php

if (isset($_GET['page'])) {
    $page = $_GET['page'];
    $jumlahisi = 4;
    $no = ($jumlahisi * $page) - $jumlahisi + 1;
} else {
    $no = 1;
}


?>
<div class="row">
    <div class="col-4 mt-2">
        <a href="<?= base_url('/admin/menu/create') ?>" class="btn btn-primary" role="button">Tambah Data</a>
    </div>
    <div class="col">
        <h1><?php echo $judul; ?></h1>
    </div>
</div>

<div class="row mt-1">
    <div class="col-3">
        <form action="<?= base_url('/admin/menu/read') ?>" method="get">
        <?= view_cell('\App\Controllers\Admin\Menu::option') ?>
        </form>
    </div>
</div>



<div class="row mt-3">
    <div class="col">
        <table class="table">
            <tr>
                <th>No</th>
                <th>Menu</th>
                <th>Gambar</th>
                <th>Harga</th>
                <th colspan="2">Aksi</th>
            </tr>

            <?php foreach ($menu as $key => $value) : ?>

                <tr>
                    <td><?php echo $no++; ?></td>
                    <td><?php echo $value['menu']; ?></td>
                    <td><img style="width:70px" src="<?= base_url('/uploud/'.$value['gambar'].'') ?>" alt=""></td>
                    <td>Rp. <?php echo number_format($value['harga'] ); ?></td>
                    <td><a href="<?= base_url() ?>/admin/menu/delete/<?php echo $value['idmenu']; ?>"><img src="" alt=""></a></td>
                    <td><a href="<?= base_url() ?>/admin/menu/delete/<?php echo $value['idmenu']; ?>"><img src="<?= base_url('icon/trash.svg') ?>" alt=""></a>
                    <a href="<?= base_url() ?>/admin/menu/find/<?php echo $value['idmenu']; ?>"><img src="<?= base_url('icon/pencil.svg') ?>" alt=""></a></td>
                </tr>
            <?php endforeach; ?>

        </table>

  
        <?= $pager->makeLinks(1,$tampil,$total,'template') ?>
    </div>
</div>


<?= $this->endSection() ?>