<?php
    $host = "localhost";
    $user = "root";
    $password = "";
    $database = "arkademy";

    $db = mysqli_connect($host, $user, $password, $database);
    if($db->connect_error){
        die("connection failed");
    }

    if(isset($_GET['idDelete'])) {
        $id = $_GET['idDelete'];
        $delete = "DELETE FROM produk WHERE ID = $id";
        mysqli_query($db, $delete);
        header("Location: index.php");
    }

    $query = "SELECT * FROM produk";

    $view = mysqli_query($db, $query);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Arkademy</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
</head>
<body>
    <div class="container my-5">
    <a href="add.php" class="btn btn-primary">Add Product</a>
    <table class="table">
        <thead>
            <tr>
                <th>No</th>
                <th>Nama Produk</th>
                <th>Keterangan</th>
                <th>Harga</th>
                <th>Jumlah</th>
                <th>#</th>
                <th>#</th>
            </tr>
        </thead>
        <tbody>
            <?php 
                $counter = 1;
                while($product = mysqli_fetch_assoc(($view))):
            ?>
            <tr>
                <td><?= $counter; ?></td>
                <td><?= $product['NAMA_PRODUK']; ?></td>
                <td><?= $product['KETERANGAN']; ?></td>
                <td><?= $product['HARGA']; ?></td>
                <td><?= $product['JUMLAH']; ?></td>
                <td><a href="edit.php<?= "?id={$product['ID']}" ?>" class="btn btn-success">Edit</a></td>
                <td><a href="index.php<?= "?idDelete={$product['ID']}" ?>" class="btn btn-danger">Delete</a></td>
            </tr>
            <?php 
                $counter++;
                endwhile;
            ?>
        </tbody>
    </table>
    </div>
</body>
</html>