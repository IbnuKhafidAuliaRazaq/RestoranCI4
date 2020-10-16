<?= $this->extend('template/admin') ?>
<?= $this->section('content') ?>

<div class="row">
    <div class="col" style="text-align: center;">
        <h2><?= $judul ?></h2>
    </div>
</div>
<div class="row">
    <div class="col">
        <p>Pelanggan : <?= $order[0]['pelanggan']; ?></p>
    </div>
    <div class="col">
        <p>Tgl Order : <?= date("d-m-Y", strtotime($order[0]['tglorder'])); ?></p>
    </div>
    <div class="col">
        <p>Total : <?= 'Rp. ' . number_format($order[0]['total']); ?></p>
    </div>
</div>
<div class="ro">

    <div class="col">
        <?php
        if (!empty(session()->getFlashdata('info'))) {
            echo '<div class="alert alert-danger" role="alert">';
            echo session()->getFlashdata('info');

            echo '</div>';
        }

        ?>
    </div>
</div>
<div class="row">
    <div class="col-5">
        <form action="<?= base_url() ?>/admin/order/update" method="post">
            <div class="form-group">
                <label for="bayar">Bayar</label>
                <input type="number" class="form-control" name="bayar" id="" required>
            </div>
            <div class="form-group">

                <input type="hidden" class="form-control" name="total" value="<?= $order[0]['total'] ?>" id="" required>
                <input type="hidden" class="form-control" name="idorder" value="<?= $order[0]['idorder'] ?>" id="" required>

            </div>
            <button type="submit" value="SIMPAN" name="simpan" class="btn btn-primary">Simpan</button>
        </form>
    </div>
</div>

<div class="row">
    <div class="col" style="text-align: center;">
        <h2>RINCIAN ORDER</h2>
    </div>
</div>

<div class="row">
    <div class="col">
        <table class="table">
            <tr>
                <th>No.</th>
                <th>Menu</th>
                <th>Harga</th>
                <th>Jumlah</th>
                <th>Total</th>

            </tr>
            <?php
            $no = 1;
            foreach ($detail as $value) : ?>
                <tr>
                    <td><?php echo $no++; ?></td>
                    <td><?php echo $value['menu']; ?></td>
                    <td><?php echo $value['hargajual']; ?></td>
                    <td><?php echo $value['jumlah']; ?></td>
                    <td><?php echo $value['jumlah'] *  $value['hargajual']; ?></td>
                </tr>
            <?php endforeach; ?>
        </table>
    </div>
</div>



<?= $this->endSection() ?>