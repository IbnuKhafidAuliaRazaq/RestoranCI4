<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="<?= base_url('bootstrap/css/bootstrap.min.css') ?>">
    <title>Admin Page</title>
</head>

<body>


    <div class="container">
        <nav class="navbar navbar-expand-lg navbar-light mt-5" style="background-color: #e3f2fd;">
            <a class="navbar-brand" href="<?= base_url('/admin') ?>">Dashboard</a>
           
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a class="nav-link disabled text-dark" href="#">
                            User : 
                            <?php
                            if (!empty(session()->get('user'))) {
                                echo session()->get('user');
                            }
                            ?> </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link disabled text-dark" href="#">
                            Email : 
                            <?php
                            if (!empty(session()->get('email'))) {
                                echo session()->get('email');
                            }
                            ?></a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link disabled text-dark" href="#">
                            Level : 
                            <?php
                            if (!empty(session()->get('level'))) {
                                echo session()->get('level');
                                $level = session()->get('level');
                            }
                            ?></a>
                    </li>
                    <li class="nav-item ">
                        <a class="nav-link " href="<?= base_url('admin/login/logout')?>">Logout</a>
                    </li>
                </ul>
            </div>
        </nav>

        <div class="row mt-3">
            <div class="col-4">
                <div class="card" style="width: 18rem;">
                    <ul class="list-group list-group-flush">
                    <?php if($level === "Admin") : ?>
                        <li class="list-group-item"><a href="<?= base_url('/admin/kategori') ?>">Kategori</a></li>
                        <li class="list-group-item"><a href="<?= base_url('/admin/menu') ?>">Menu</a></li>
                        <li class="list-group-item"><a href="<?= base_url('/admin/pelanggan') ?>">Pelanggan</a></li>
                        <li class="list-group-item"><a href="<?= base_url('/admin/order') ?>">Order</a></li>
                        <li class="list-group-item"><a href="<?= base_url('/admin/orderdetail') ?>">Order Detail</a></li>
                        <li class="list-group-item"><a href="<?= base_url('/admin/user') ?>">User</a></li>
                    <?php endif; ?>
                    <?php if($level === "Kasir") : ?>
                        <li class="list-group-item"><a href="<?= base_url('/admin/order') ?>">Order</a></li>
                        <li class="list-group-item"><a href="<?= base_url('/admin/orderdetail') ?>">Order Detail</a></li>
                    <?php endif; ?>
                    <?php if($level === "Koki") : ?>                      
                        <li class="list-group-item"><a href="<?= base_url('/admin/orderdetail') ?>">Order Detail</a></li>                     
                    <?php endif; ?>
                    <?php if($level === "Gudang") : ?>                
                        <li class="list-group-item"><a href="<?= base_url('/admin/menu') ?>">Menu</a></li>
                    <?php endif; ?>
                    </ul>
                </div>
            </div>
            <div class="col-8">


                <?= $this->renderSection('content') ?>
            </div>
        </div>
    </div>



</body>

</html>