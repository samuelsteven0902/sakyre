<?php
    session_start();
    if(!isset($_SESSION["login"])){
       header("Location: ../sakyre2.0/login.php");
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
    <title>Sakyre</title>
</head>

<body>

    <?php
      require 'navbar.index.php';
      // $user = mysqli_query($conn, "SELECT * FROM db_user WHERE id='".$_GET['id']."'");
      // $p = mysqli_fetch_object($user);

    //   $produk = mysqli_query($conn, "SELECT * FROM db_product WHERE product_id='".$_GET['idb']."'");
    //   $p = mysqli_fetch_object($produk);

    //   $kategori = mysqli_query($conn, "SELECT * FROM db_category WHERE category_id='".$_GET['idb']."'");
    //   $r = mysqli_fetch_array($kategori);

    //   $buku = mysqli_query($conn, "SELECT * FROM db_product LEFT JOIN db_category USING (category_id) ORDER BY product_id DESC");
    //   $row = mysqli_fetch_array($buku);

      $beli = mysqli_query($conn, "SELECT * FROM db_transaction JOIN db_ongkir ON db_ongkir.ongkir_id = db_transaction.ongkir_id JOIN db_bank ON db_bank.bank_id = db_transaction.bank_id JOIN db_wishlist ON db_wishlist.wishlist_id = db_transaction.wishlist_id JOIN db_user on db_user.id=db_wishlist.id JOIN db_product on db_product.product_id=db_wishlist.product_id JOIN db_category ON db_category.category_id = db_wishlist.category_id WHERE db_wishlist.wishlist_id= '".$_GET["idb"]."' ORDER BY tr_id DESC");
      $buy = mysqli_fetch_object($beli);

    ?>

    <!-- profile -->
    <div class="container">
        <div class="main-body">
            <h4>Konfirmasi Pembelian Buku</h4>

            <form action="" method="POST">
                <div class="row gutters-sm">
                    <div class="col-md-4 mb-3">
                        <div class="card">
                            <div class="card-body">
                                <div class="d-flex flex-column align-items-center text-center">
                                    <!-- foto profile -->
                                    <img src="../sakyre2.0/img/cover-book/<?php echo $buy->product_image?>" alt=""
                                        class="" width="250">

                                    <div class="mt-2">
                                        <p class="text-secondary mb-2">
                                            <?php echo $buy->product_name?></p>
                                        <!-- Deskripsi profile -->
                                        <p class="text-secondary mb-1">
                                            <?php echo ($buy->product_status==0)? 'Tidak Tersedia':'Tersedia'?>
                                        </p>
                                        <p class="text-white font-size-sm btn btn-success rounded-pill">Rp.
                                            <?php echo number_format($buy->product_price)?></p><br>
                                        <button type="submit" name="checkout"
                                            class="btn btn-primary rounded-pill px-4" data-bs-target="#produk1" data-bs-toggle="modal">Checkout</button>



                                        <!-- nama -->

                                    </div>
                                </div>
                            </div>
                        </div>


                    </div>

                    <div class="col-md-8">
                        <div class="card mb-3">
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-sm-3">
                                        <h6 class="mb-0">Nama</h6>
                                    </div>
                                    <div class="col-sm-9 text-secondary">
                                        <input class="border-0 form-control text-dark" required type="text" name="nama"
                                            value="<?php echo $buy->tr_name ?>">
                                    </div>
                                </div>
                                <hr>
                                <div class="row">
                                    <div class="col-sm-3">
                                        <h6 class="mb-0">Alamat</h6>
                                    </div>
                                    <div class="col-sm-9 text-secondary">
                                        <input class="border-0 form-control bg-white" required type="text" name="alamat"
                                            value="<?php echo $buy->tr_address?>">
                                    </div>
                                </div>
                                <hr>
                                <div class="row">
                                    <div class="col-sm-3">
                                        <h6 class="mb-0">Kode Pos</h6>
                                    </div>
                                    <div class="col-sm-9 text-secondary">
                                        <input class="border-0 form-control" required type="text" name="kodepos"
                                            value="<?php echo $buy->tr_codepos?>">

                                    </div>
                                </div>
                                <hr>
                                <div class="row">
                                    <div class="col-sm-3">
                                        <h6 class="mb-0">No HandPhone</h6>
                                    </div>
                                    <div class="col-sm-9 text-secondary">
                                        <input class="border-0 form-control" required type="text" name="hp"
                                            value="<?php echo $buy->tr_hp ?>">

                                    </div>
                                </div>
                                <hr>
                                <div class="row">
                                    <div class="col-sm-3">
                                        <h6 class="mb-0">Bank</h6>
                                    </div>
                                    <div class="col-sm-9 text-secondary">
                                    <td>
                                            <select class="form-control border-0 " required name="bank" value=""
                                                id="">
                                                <option value="">Pilih Metode pembayaran</option>
                                                <option value="1">BCA</option>
                                                <option value="2">BRI</option>
                                                <option value="3">BNI</option>
                                                <option value="4">Mandiri</option>
                                            </select>
                                        </td>

                                    </div>
                                </div>
                                <hr>
                                <div class="row">
                                    <div class="col-sm-3">
                                        <h6 class="mb-0">Ongkir</h6>
                                    </div>
                                    <div class="col-sm-9 text-secondary">
                                        <td>
                                            <select class="form-control border-0 " required name="ongkir" value=""
                                                id="">
                                                <option value="">Pilih Kotamu</option>
                                                <option value="1">Jakarta - Rp 20.000</option>
                                                <option value="2">Yogyakarta - Rp 5.000</option>
                                                <option value="3">Malang - Rp 6.000</option>
                                                <option value="4">Kartasura - Rp 5.000</option>
                                                <option value="5">Surabaya - Rp 15.000</option>
                                                <option value="6">Bandung - Rp 22.000</option>
                                            </select>
                                        </td>


                                    </div>
                                </div>
                                <!-- <hr>
                                <div class="row">
                                    <div class="col-sm-3">
                                        <h6 class="mb-0">Total Harga</h6>
                                    </div>
                                    <div class="col-sm-9 text-secondary">
                                        <input readonly class="border-0 form-control bg-white" type="text" name="totalharga"
                                            value="Rp. <//?php echo number_format($buy->product_price +$buy->ongkir_harga)?>">
                                    </div>
                                </div> -->
                            </div>
                        </div>
                     </div>

                    <div class="col-md-4 mb-3"></div>
                </div>
                <div class="row gutters-sm"></div>
            </form>

            <!-- <//?php
                                    if(isset($_POST['wishlist'])){
                                        $userid     = $d->id;
                                        $productid  = $p->product_id;
                                        $categoryid = $row['category_id'];

                                        #query masukkan data
                                        $insert = mysqli_query($conn, "INSERT INTO db_wishlist VALUES(
                                            null,
                                            '".$userid."',
                                            '".$productid ."',
                                            '".$categoryid."',
                                            '1',
                                            'in progres'
                                            
                                        )");
                                        if($insert){
                                            echo '<script>alert("Buku telah ditambahkan ke dalam wishlist anda")</script>';
                                            echo '<script>window.location="../sakyre2.0/wishlist.php"</script>';
                                        }else{
                                            echo 'gagal '.mysqli_error($conn);
                                        }

                                    }
                                    ?> -->
                                    

<!-- modal -->
<div class="modal fade" id="produk1" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="staticBackdropLabel"><?php echo $buy->product_name?></h5>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body">
                                        <div class="row">
                                            <div class="col-md-4 mb-3">
                                                <img src="menu/p1.jpg">
                                            </div>
                                            <div class="mb-3">
                                                <h6>Deskripsi</h6>
                                                <a>Kopi belgium yang dipadukan dengan susu alami dan dicampur dengan es batu menambah rasa nikmat.</a>
                                                <h6>Price</h6>
                                                <a>Rp. 20.000</a>
                                            </div>

                                            <div class="mb-3">
                                                <label for="exampleFormControlTextarea1" class="form-label">Notes</label>
                                                <textarea class="form-control" id="exampleFormControlTextarea1" rows="3"></textarea>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal">Batal</button>
                                        <a href="transaksi_menu.php" class="btn btn-outline-success" role="button" aria-pressed="true">Beli</a>
                                    </div>
                                </div>
                            </div>
                        </div>

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