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
    <link rel="shortcut icon" href="../sakyre2.0/img/favicon/favicon-01.png">
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
            <h4>My Wishlist</h4>
            <p>Hai <?php echo $d->nama ?> ,ini adalah keranjang belanjaanmu, selesaikan transaksi dan baca bukumu! </p>
            <hr><br>

            <table border="1" cellspacing="0" class="table">
                <thead>
                    <tr class="text-center">
                        <th width="50px">No</throw>
                        <th width="100">Gambar</th>
                        <!-- <th>Kategori</th> -->
                        <th width="200px">Judul Buku</th>
                        <th>Harga</th>
                        <!-- <th>Deskripsi</th> -->

                        <th>Jumlah</th>
                        <th>Total Harga</th>

                        <th width="180">Aksi</th>

                        </th>
                    </tr>
                </thead>
                <tbody>
                    <?php 


    $no=1;
    $buku = mysqli_query($conn, "SELECT * FROM db_wishlist JOIN db_user on db_user.id=db_wishlist.id JOIN db_product on db_product.product_id=db_wishlist.product_id JOIN db_category ON db_category.category_id = db_wishlist.category_id  WHERE db_user.id=$d->id AND wishlist_status='in progres' ORDER BY wishlist_id DESC");
    if(mysqli_num_rows($buku)>0){
    while($row = mysqli_fetch_array($buku)){

?>
                    <tr class="text-center">
                        <td><?php echo $no++ ?></td>
                        <td><img src="../sakyre2.0/img/cover-book/<?php echo $row['product_image']?>" alt=""
                                width="120px"></td>
                        <!-- <td><//?php echo $row['category_name']?></td> -->
                        <td><?php echo $row['product_name']?> </td>
                        <div class="totalharga">

                        <td id="hargaBuku">Rp. <?php echo number_format($row['product_price']) ?></td>

                        <td>  <?php echo $row['wishlist_qty']?></td>

                        <td id="totalHarga" >Rp. <?php echo number_format($row['product_price']*$row['wishlist_qty'])?></td>
                       
                        </div>
                        
                        <td> <a class="btn btn-primary px-4"   href="../sakyre2.0/beli.php?idb=<?php echo $row['wishlist_id'] ?>">Buy</a>
                            <a class="btn btn-danger" href="proses.hapus.php?idw=<?php echo $row['wishlist_id']  ?>"
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

                <thead class="text-center">
                    <tr>
                        <th width="50px">No</throw>
                        <th width="100">Gambar</th>
                        <!-- <th>Kategori</th> -->
                        <th >Judul Buku</th>
                        <th >Nama pembeli</th>
                        <th width="150">Harga</th>
                        <!-- <th>Deskripsi</th> -->

                        <th width="200">Waktu transaksi</th>

                        <th width="100">Aksi</th>

                        </th>
                    </tr>
                </thead>
                <tbody class="text-center">
                    <?php 
    $no=1;
    $transaction = mysqli_query($conn, "SELECT * FROM `db_transaction` JOIN db_wishlist ON db_wishlist.wishlist_id = db_transaction.wishlist_id JOIN db_user on db_user.id=db_wishlist.id JOIN db_product on db_product.product_id=db_wishlist.product_id JOIN db_category ON db_category.category_id = db_wishlist.category_id WHERE db_user.id=$d->id ORDER BY tr_id DESC");

    if(mysqli_num_rows($transaction)>0){
    while($row = mysqli_fetch_array($transaction)){

?>
                    <tr >
                        <td><?php echo $no++ ?></td>
                        <td><img src="../sakyre2.0/img/cover-book/<?php echo $row['product_image']?>" alt=""
                                width="120px"></td>
                        <!-- <td><//?php echo $row['category_name']?></td> -->
                        <td><?php echo $row['product_name']?> </td>
                        <td><?php echo $row['tr_name']?> </td>
                        <td>Rp. <?php echo number_format($row['product_price']) ?></td>
                        <!-- <td><//?php echo $row['product_description']?></td> -->

                        <td><?php echo ($row['tr_date'])?></td>
                        <td>
                            <a class="btn btn-danger" href="proses.hapus.php?idt=<?php echo $row['db_transaction.tr_id']  ?>"
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


            <!-- <div class="whatsapp">
                    <a class="icons" target="_blank" href="https://api.whatsapp.com/send?phone=NomorTelephon&text=Caption"><svg viewBox="0 0 800 800">
                            <path d="M519 454c4 2 7 10-1 31-6 16-33 29-49 29-96 0-189-113-189-167 0-26 9-39 18-48 8-9 14-10 18-10h12c4 0 9 0 13 10l19 44c5 11-9 25-15 31-3 3-6 7-2 13 25 39 41 51 81 71 6 3 10 1 13-2l19-24c5-6 9-4 13-2zM401 200c-110 0-199 90-199 199 0 68 35 113 35 113l-20 74 76-20s42 32 108 32c110 0 199-89 199-199 0-111-89-199-199-199zm0-40c133 0 239 108 239 239 0 132-108 239-239 239-67 0-114-29-114-29l-127 33 34-124s-32-49-32-119c0-131 108-239 239-239z" />
                        </svg><span>Konfirmasi Via WhatsApp</span></a>
                </div> -->

        </div>

    </div>


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-gtEjrD/SeCtmISkJkNUaaKMoLD0//ElJ19smozuHV6z3Iehds+3Ulb9Bn9Plx0x4" crossorigin="anonymous">
    </script>
    <script type="text/javascript">
    $(".totalharga").keyup(function(){
        var hargaBuku   = parseInt($("#hargaBuku").val())
        var jumlahBuku  = parseInt($("#jumlahBuku").val())
        var totalHarga  = hargaBuku * jumlahBuku;
        $("#totalHarga").attr("value",totalHarga)

    });
    </script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

    <?php
    require 'footer.php';
?>
</body>

</html>