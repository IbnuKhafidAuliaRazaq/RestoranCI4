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
    <div class="col">
        <form action="<?= base_url('/admin/orderdetail/cari') ?>" method="post">
            <div class="form-group col-6 float-left">
                <label for="Tglawal">Tgl Awal</label>
                <input type="date" class="form-control" name="awal" id="" required>
            </div>
            <div class="form-group col-6 float-left">
                <label for="Tglakhir">Tgl Akhir</label>
                <input type="date" class="form-control" name="akhir" id="" required>
            </div>
            <button type="submit" value="CARI" name="cari" class="btn btn-primary ml-3">Simpan</button>
        </form>
    </div>
</div>
<div class="row">
    <div class="col " style="text-align: center;">
        <h1><?php echo $judul; ?></h1>
    </div>
</div>

<div class="row mt-3">
    <div class="col">
        <table class="table">
            <tr>
                <th>No</th>
                <th>Menu</th>
                <th>Tgl Order</th>
                <th>Harga</th>
                <th>Jumlah</th>
                <th>Total</th>
            </tr>

            <?php foreach ($orderdetail as $key => $value) : ?>

                <tr>
                    <td><?php echo $no++; ?></td>
                    <td><?php echo $value['menu']; ?></td>
                    <td><?php echo $value['tglorder']; ?></td>
                    <td><?php echo $value['harga']; ?></td>
                    <td><?php echo $value['jumlah']; ?></td>
                    <td><?php echo $value['jumlah'] * $value['harga']; ?></td>
                </tr>
            <?php endforeach; ?>

        </table>

        <?= $pager->links('page', 'template') ?>
    </div>
</div>


<?= $this->endSection() ?>