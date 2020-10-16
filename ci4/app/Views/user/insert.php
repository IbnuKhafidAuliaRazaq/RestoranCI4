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
    <h1> INSERT DATA </h1>
</div>


<div class="col-7">
    <form action="<?= base_url('/admin/user/insert') ?>" method="post">
        <div class="form-group">
            <label for="user">User</label>
            <input type="text" class="form-control" name="user" id="" required>
        </div>
        <div class="form-group">
            <label for="email">Email</label>
            <input type="email" class="form-control" name="email" id="" required>
        </div>
        <div class="form-group">
            <label for="user">Password</label>
            <input type="password" class="form-control" name="password" id="" required>
        </div>
        <div class="form-group">
        <label for="level">Posisi</label>
            <select class="form-control" name="level" id="level">
                <?php foreach ($level as $key ) : ?>
                    <option value="<?php echo $key ?>"><?php echo $key ?></option>
                <?php endforeach; ?>
            </select>
        </div>
        <button type="submit" value="SIMPAN" name="simpan" class="btn btn-primary">Simpan</button>
    </form>
</div>
<?= $this->endSection() ?>