<?= $this->extend('template/admin') ?>

<?= $this->section('content') ?>

<div class="col">
    <?php
    if (!empty(session()->getFlashdata('info'))) {
        echo '<div class="alert alert-danger" role="alert">';
        $error = session()->getFlashdata('info');

        foreach ($error as $key => $value) {
            echo $key.' => '.$value.'<br>';
            
        }
   
        echo '</div>';
    }
    
    ?>
</div>




<div class="col">
    <h1> UPDATE DATA </h1>
</div>


<div class="col-7">
    <form action="<?= base_url('/admin/menu/update') ?>" method="post" enctype="multipart/form-data">
        <div class="form-group">
        <label for="kategori">Kategori</label>
            <select class="form-control"  name="idkategori" id="idkategori">
                <?php  foreach ($kategori as $key => $value) : ?>
                    <option <?php if ($value['idkategori'] == $menu['idkategori']) echo 'selected';?> 
                    value="<?php echo $value['idkategori']; ?>"><?php echo $value['kategori']; ?></option>
                <?php endforeach; ?>
            </select>
        </div>
        <div class="form-group">
            <label for="menu">Menu</label>
            <input type="text" class="form-control"  value="<?= $menu['menu'] ?>" name="menu" id="" required>
        </div>
        <div class="form-group">
            <label for="harga">Harga</label>
            <input type="text" class="form-control"  value="<?= $menu['harga'] ?>" name="harga" id="" required>
        </div>
        <div class="form-group">
            <label for="gambar">Gambar</label>
            <input type="file" name="gambar" id=""  >
        </div>
        <input type="hidden"  name="gambar"value="<?= $menu['gambar'] ?>" id="" required> 
        <input type="hidden" value="<?= $menu['idmenu'] ?>" name="idmenu" id="" required>
        <input type="submit"  name="simpan"value="SIMPAN" style="margin-top:15px;" class="btn btn-primary"></input>
    </form>
</div>
<?= $this->endSection() ?>