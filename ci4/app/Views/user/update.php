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
    <h1> <?php echo $judul ?> </h1>
</div>


<div class="col-7">
    <form action="<?= base_url('/admin/user/ubah') ?>" method="post">
        <div class="form-group">       
            <input type="hidden" value="<?= $user['iduser']?>" class="form-control" name="iduser" id="" required>
        </div>
        <div class="form-group">
            <label for="email">Email</label>
            <input type="email" value="<?= $user['email']?>" class="form-control" name="email" id="" required>
        </div>
        
        <div class="form-group">
        <label for="level">Posisi</label>
            <select class="form-control" name="level" id="level">
                <?php foreach ($level as $key ) : ?>
                    <option <?php if ($user['level']==$key) {
                        echo 'selected';
                    }?> value="<?php echo $key ?>"><?php echo $key ?></option>
                <?php endforeach; ?>
            </select>
        </div>
        <button type="submit" value="SIMPAN" name="simpan" class="btn btn-primary">Simpan</button>
    </form>
</div>
<?= $this->endSection() ?>