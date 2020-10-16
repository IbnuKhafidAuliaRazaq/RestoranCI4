<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Coba</title>
</head>
<body>
    <?php 
    
        foreach ($kategori as $key) {
            echo $key->kategori;
            echo '<br>';
        }
    
    ?>
</body>
</html>