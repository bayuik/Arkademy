<?php
    $host = "localhost";
    $user = "root";
    $password = "";
    $database = "arkademy";
    $db = mysqli_connect($host, $user, $password, $database);
    if($db->connect_error){
        die("connection failed");
    }

    if(isset($_POST['submit'])){
        $namaProduk = $_POST['namaProduk'];
        $keterangan = $_POST['keterangan'];
        $harga = $_POST['harga'];
        $jumlah = $_POST['jumlah'];

        $query = "INSERT INTO produk (NAMA_PRODUK, KETERANGAN, HARGA, JUMLAH) VALUES ('$namaProduk', '$keterangan', '$harga', '$jumlah')";
        $insertDb = mysqli_query($db, $query);
        if(!$insertDb){
            die("Query error". mysqli_error($db));
        }
        header(("Location: index.php"));
    }
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Arkademy</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
</head>

<body>
    <div class="w-25 mt-5 m-auto">
        <form action="add.php" method="post">
            <div class="mb-3">
                <label for="namaProduk" class="form-label">Nama Produk</label>
                <input type="text" id="namaProduk" name="namaProduk" class="form-control">
            </div>
            <div class="mb-3">
                <label for="keterangan" class="form-label">Keterangan</label>
                <input type="text" id="keterangan" name="keterangan" class="form-control">
            </div>
            <div class="mb-3">
                <label for="harga" class="form-label">Harga</label>
                <input type="text" id="harga" name="harga" class="form-control">
            </div>
            <div class="mb-3">
                <label for="jumlah" class="form-label">Jumlah</label>
                <input type="text" id="jumlah" name="jumlah" class="form-control">
            </div>
        
            <input type="submit" name="submit" class="btn-primary btn w-100">
        </form>
    </div>
</body>

</html>