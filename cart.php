<?php
    session_start();
    if(!isset($_SESSION["login"])){
       header("Location: ../sakyre2.0/index.html");
       exit;
    } 
    // include 'functions.php';
?>



<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous">
    <link rel="stylesheet" href="../css/style.css">
    <style>
    @import url('https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,400;0,500;0,600;0,700;1,300&display=swap');
    </style>
    <title>Sakyre</title>
</head>

<body>


    <?php
      require 'navbar.index.php';
    //   require 'slider.php';  
    ?>
    <div class="container mt-4">
        <div class="container-fluid">
            <h4>My Cart</h4>
            <p>Hai <?php echo $d->nama ?> ,ini adalah keranjang belanjaanmu, selesaikan transaksi dan baca bukumu! </p>
            <hr><br>

            <table border="1" cellspacing="0" class="table">
            <thead>
                    <tr class="text-center">
                        <th width="50px">No</throw>
                        <th>Gambar</th>
                        <!-- <th>Kategori</th> -->
                        <th width="200px">Judul Buku</th>
                        <th>Harga</th>
                        <!-- <th>Deskripsi</th> -->

                        <th >Waktu rilis</th>

                        <th width="180">Aksi</th>

                        </th>
                    </tr>
                </thead>
                <tbody>
                    <?php 
    $no=1;
    $buku = mysqli_query($conn, "SELECT * FROM db_product LEFT JOIN db_category USING (category_id) ORDER BY product_id DESC");
    if(mysqli_num_rows($buku)>0){
    while($row = mysqli_fetch_array($buku)){

?>
                    <tr>
                        <td><?php echo $no++ ?></td>
                        <td><img src="../sakyre2.0/img/cover-book/<?php echo $row['product_image']?>" alt=""
                                width="120px"></td>
                        <!-- <td><//?php echo $row['category_name']?></td> -->
                        <td><?php echo $row['product_name']?> </td>
                        <td>Rp. <?php echo number_format($row['product_price']) ?></td>
                        <!-- <td><//?php echo $row['product_description']?></td> -->

                        <td><?php echo ($row['date_created'])?></td>
                        <td> <a class="btn btn-primary px-4" href="../sakyre2.0/beli.php">Buy</a>
                            <a class="btn btn-danger" href="proses.hapus.php?idp=<?php echo $row['product_id']  ?>"
                                onclick="return confirm('Are you sure to delete this ?')">Delete</a>
                        </td>
                    </tr>
                    <?php } }else{?>
                    <tr>
                        <td colspan="8">Tidak ada data</td>
                    </tr>
                    <?php } ?>
                </tbody>
            </table>

            <br><br>
            <!-- riwayat transaksi -->
            <h4>Riwayat transaksi</h4>
            <!-- <p>Hai <//?php echo $d->nama ?> ,ini adalah keranjang belanjaanmu, selesaikan transaksi dan baca bukumu! </p> -->
            <hr><br>
            <table border="1" cellspacing="0" class="table">

                <thead  class="text-center">
                    <tr>
                        <th width="50px">No</throw>
                        <th>Gambar</th>
                        <!-- <th>Kategori</th> -->
                        <th width="200px">Judul Buku</th>
                        <th>Harga</th>
                        <!-- <th>Deskripsi</th> -->

                        <th>Waktu rilis</th>

                        <th width="100">Aksi</th>

                        </th>
                    </tr>
                </thead>
                <tbody>
                    <?php 
    $no=1;
    $buku = mysqli_query($conn, "SELECT * FROM db_product LEFT JOIN db_category USING (category_id) ORDER BY product_id DESC");
    if(mysqli_num_rows($buku)>0){
    while($row = mysqli_fetch_array($buku)){

?>
                    <tr>
                        <td><?php echo $no++ ?></td>
                        <td><img src="../sakyre2.0/img/cover-book/<?php echo $row['product_image']?>" alt=""
                                width="120px"></td>
                        <!-- <td><//?php echo $row['category_name']?></td> -->
                        <td><?php echo $row['product_name']?> </td>
                        <td>Rp. <?php echo number_format($row['product_price']) ?></td>
                        <!-- <td><//?php echo $row['product_description']?></td> -->

                        <td><?php echo ($row['date_created'])?></td>
                        <td> 
                            <a class="btn btn-danger" href="proses.hapus.php?idp=<?php echo $row['product_id']  ?>"
                                onclick="return confirm('Are you sure to delete this ?')">Delete</a>
                        </td>
                    </tr>
                    <?php } }else{?>
                    <tr>
                        <td colspan="8">Tidak ada data</td>
                    </tr>
                    <?php } ?>
                </tbody>
            </table>

            
            <a href="index.php" class="btn btn-default">Lanjut Belanja</a>
            <a href="checkout.php" class="btn btn-primary">checkout</a>


        </div>

    </div>


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-gtEjrD/SeCtmISkJkNUaaKMoLD0//ElJ19smozuHV6z3Iehds+3Ulb9Bn9Plx0x4" crossorigin="anonymous">
    </script>

    <?php
    require 'footer.php';
?>
</body>

</html>