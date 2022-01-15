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

      $produk = mysqli_query($conn, "SELECT * FROM db_product WHERE product_id='".$_GET['id']."'");
      $p = mysqli_fetch_object($produk);

      $kategori = mysqli_query($conn, "SELECT * FROM db_category WHERE category_id='".$_GET['id']."'");
      $r = mysqli_fetch_array($kategori);

      $buku = mysqli_query($conn, "SELECT * FROM db_product LEFT JOIN db_category USING (category_id) ORDER BY product_id DESC");
      $row = mysqli_fetch_array($buku);
    ?>

    <!-- profile -->
    <div class="container">
        <div class="main-body">
            <h4>Detail buku</h4>

            <form action="" method="POST">
                <div class="row gutters-sm">
                    <div class="col-md-4 mb-3">
                        <div class="card">
                            <div class="card-body">
                                <div class="d-flex flex-column align-items-center text-center">
                                    <!-- foto profile -->
                                    <img src="../sakyre2.0/img/cover-book/<?php echo $p->product_image?>" alt=""
                                        class="" width="250">

                                    <div class="mt-2">
                                        <p class="text-secondary mb-2">
                                            <?php echo $p->product_name?></p>
                                        <!-- Deskripsi profile -->
                                        <p class="text-secondary mb-1">
                                            <?php echo ($p->product_status==0)? 'Tidak Tersedia':'Tersedia'?>
                                        </p>
                                        <p class="text-white font-size-sm btn btn-success rounded-pill">Rp.
                                            <?php echo number_format($p->product_price)?></p><br>
                                        <button type="submit" name="wishlist"
                                            class="btn btn-primary rounded-pill px-4">Add to wishlist</button>



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
                                        <h6 class="mb-0">Judul</h6>
                                    </div>
                                    <div class="col-sm-9 text-secondary">
                                        <td class="border-0 form-control text-dark" type="text" name=""
                                            value="nama_buku"><?php echo $p->product_name ?></td>
                                    </div>
                                </div>
                                <hr>
                                <div class="row">
                                    <div class="col-sm-3">
                                        <h6 class="mb-0">Kategori</h6>
                                    </div>
                                    <div class="col-sm-9 text-secondary">
                                        <td class="border-0 form-control" type="text" name="kategori_buku" value="">
                                            <?php echo $row['category_name']?></td>
                                    </div>
                                </div>
                                <hr>
                                <div class="row">
                                    <div class="col-sm-3">
                                        <h6 class="mb-0">Harga</h6>
                                    </div>
                                    <div class="col-sm-9 text-secondary">
                                        <td class="border-0 form-control" type="text" name="harga_buku" value="">Rp.
                                            <?php echo number_format( $p->product_price )?></td>
                                    </div>
                                </div>
                                <hr>
                                <div class="row">
                                    <div class="col-sm-3">
                                        <h6 class="mb-0">Status</h6>
                                    </div>
                                    <div class="col-sm-9 text-secondary">
                                        <td class="border-0 form-control" type="text" name="status_buku" value="">
                                            <?php echo ($p->product_status==0)? 'Tidak Tersedia':'Tersedia'?></td>
                                    </div>
                                </div>
                                <hr>
                                <div class="row">
                                    <div class="col-sm-3">
                                        <h6 class="mb-0">Deskripsi</h6>
                                    </div>
                                    <div class="col-sm-9 text-secondary">
                                        <td type="text" class="border-0" type="text" name="status" value="">
                                            <?php echo ( $p->product_description ) ?></td>

                                    </div>
                                </div>

                            </div>
                        </div>




                    </div>

                    <div class="col-md-4 mb-3">



                    </div>
                </div>



                <div class="row gutters-sm">

                </div>




            </form>

                                    <?php
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
                                    ?>



        </div>
    </div>
    <?php
        // require 'functions.php';
        // if(isset($_POST["submit"])){

        //     $nama       = $_POST['nama'];
        //     $username   = $_POST['username'];
        //     $email      = $_POST['email'];
        //     $hp         = $_POST['hp'];
        //     $alamat     = $_POST['alamat'];
        //     $role       = $_POST['role'];

        //     $updateprofile = mysqli_query ($conn,"UPDATE db_user SET 
        //                             nama = '".$nama."' ,
        //                             username = '".$username."' ,
        //                             email = '".$email."' ,
        //                             hp = '".$hp."' ,
        //                             alamat = '".$alamat."' ,
        //                             role = '".$role."' 
        //                             WHERE id = '".$d->id."' ");
         
           
        //  if($updateprofile){
        //     echo'<script>alert("Profile has changed")</script>';
        //     echo'<script>window.location="../sakyre2.0/profile.php"</script>';
        
        // }else {
        //     echo 'gagal '.mysqli_error($conn);
        // }
        // }
       
   ?>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-gtEjrD/SeCtmISkJkNUaaKMoLD0//ElJ19smozuHV6z3Iehds+3Ulb9Bn9Plx0x4" crossorigin="anonymous">
    </script>

    <?php
    require 'footer.php';
?>
</body>

</html>