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
    <div class="col">
         <h3 style="text-align: center;">
        <?= $judul ?>
    </h3>
    </div>
   
</div>
<div class="row">
    <div class="col">
        <table class="table">
            <tr>
                <th>No</th>
                <th>Id Order</th>
                <th>Pelanggan</th>
                <th>Tanggal</th>
                <th>Total</th>
                <th>Bayar</th>
                <th>Kembali</th>
            </tr>
            <?php foreach ($order as $value) : ?>

                <tr>
                    <td><?php echo $no++; ?></td>
                    <td><?php echo $value['idorder']; ?></td>
                    <td><?php echo $value['pelanggan']; ?></td>
                    <td><?php echo $value['tglorder']; ?></td>
                    <td><?php echo $value['total']; ?></td>
                    <td><?php echo $value['bayar']; ?></td>
                    <td><?php echo $value['kembali']; ?></td>

                    <?php 
                    if ( $value['status']) {
                       $status = "LUNAS";
                    } else {
                        $status = "<a href='".base_url('/admin/order/find').'/'.$value['idorder']."'>BAYAR</a>";
                    }
                    
                    ?>
                    <td><?php echo $status; ?></td>

                </tr>
            <?php endforeach; ?>
        </table>
        <?= $pager->makeLinks(1, $perPage, $total, 'template') ?>
    </div>
</div>

<?= $this->endSection() ?>