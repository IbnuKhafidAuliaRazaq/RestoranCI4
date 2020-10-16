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
    <div class="col" style="text-align:center;">
        <h1><?php echo $judul; ?></h1>
    </div>
</div>

<div class="row mt-3">
    <div class="col">
        <table class="table">
            <tr>
                <th>No</th>
                <th>Pelanggan</th>
                <th>Alamat</th>
                <th>Telp</th>
                <th>Email</th>
                <th>Aksi</th>
                <th>Status</th>
            </tr>

            <?php foreach ($pelanggan as $key => $value) : ?>

                <tr>
                    <td><?php echo $no++; ?></td>
                    <td><?php echo $value['pelanggan']; ?></td>
                    <td><?php echo $value['alamat']; ?></td>
                    <td><?php echo $value['telp']; ?></td>
                    <td><?php echo $value['email']; ?></td>
                    <td><a href="<?= base_url() ?>/admin/pelanggan/delete/<?php echo $value['idpelanggan']; ?>"><img src="<?= base_url('icon/trash.svg') ?>" alt=""></a></td>

                    <?php 
                    
                    if ($value['aktif']==1) {
                        $aktif = "AKTIF";
                    } else {
                        $aktif = "NON AKTIF";
                    }
                    
                    
                    ?>
                    <td><a href="<?= base_url() ?>/admin/pelanggan/update/<?php echo $value['idpelanggan']; ?>/<?php echo $value['aktif']; ?>"><?= $aktif ?></a></td>
                </tr>
            <?php endforeach; ?>

        </table>

        <?= $pager->links('page', 'template') ?>
    </div>
</div>


<?= $this->endSection() ?>