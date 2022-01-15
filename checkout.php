<?php
    session_start();
    include 'db.php';
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
                        
                    </tr>
                    <?php   $totalbelanja+=$product_price; ?>
                    <?php } }else{?>
                    <tr>
                        <td colspan="8">Tidak ada data</td>
                    </tr>
                    <?php } ?>
                </tbody>
                <tfoot>
                    <tr>
                        <th>Total Belanja</th>
                        <th>Rp. <?php echo number_format($totalbelanja)?></th>
                    </tr>
                </tfoot>
            </table>

            <form method="post">
                <div class="row">
                    <div class="col-md-4"> 
                        <div class="form-group">
                            <input type="text" readonly value="<?php echo $d->username?>">
                        </div>
                    </div>
                    <div class="col-md-4"> 
                        <div class="form-group">
                            <input type="text" readonly value="<?php echo $d->hp?>">
                        </div>
                    </div>
                        <div class="col-md-4"> 
                            <select name="id_ongkir" id="" class="form-control">
                                <option value="">Pilih Ongkos Kirim</option>
                                <?php
                                $ambil = $conn->query("SELECT * FROM ongkir");
                                while($perongkir = $ambil->fetch_assoc()){
                                 ?>
                                <option value="<?php echo $perongkir["id_ongkir"]?>">
                                    <?php echo $perongkir['nama_kota']?> -
                                    Rp. <?php echo number_format($perongkir['tarif'] )?>
                                </option>
                                <?php } ?>
                                <option value="">Jepara 12.000</option>
                            </select>    
                        </div>
                </div>
                <button class="btn btn-primary" name="checkout">checkout</button>
            </form>                

        <?php 
        // if (isset($_POST["checkout"]))
        // {
        //     echo d->id
        //     $id_ongkir = $_POST["id_ongkir"];
        //     $tanggalpembeliaan = date("Y-m-d")

        //     $conn->query("SELECT * FROM ongkir WHERE id_ongkir='id_ongkir'");
        //     $arrayongkir = $ambil->fetch_assoc(); 
        //     $tarif = $arrayongkir['tarif']     

        //     $totalpembelian =   $totalbelanja + $tarif;
        // }
    
        ?>                                

        </div>

    <pre><?php print_r($_SESSION['pelanggan']) ?></pre>

    </div>


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-gtEjrD/SeCtmISkJkNUaaKMoLD0//ElJ19smozuHV6z3Iehds+3Ulb9Bn9Plx0x4" crossorigin="anonymous">
    </script>

    <?php
    require 'footer.php';
?>
</body>

</html>