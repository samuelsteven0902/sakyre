<form action="" method="POST">
<div class="container pt-5">
    <div class="container overflow-hidden">
      
         <div class="row gx-5">
       
            <div class="container mb-3">
                <h3>Buku terbaru kami!</h3>
                <?php $recent = mysqli_query($conn, "SELECT * FROM db_product LEFT JOIN db_category USING (category_id) ORDER BY product_id DESC");
                $row1 = mysqli_fetch_assoc($recent);
                ?>

                <img src="../sakyre2.0/img/cover-book/<?php echo $row1['product_image']?>" class="card-img-top p-0"
                    alt="" width="70%">
                <div class="card-body bg-light pb-3">
                    <h5 class="card-title"><?php echo $row1['product_name']?></h5>
                    <i class="fas fa-star"></i>
                    <p class="card-text" height="100%"><?php echo $row1['category_name']?></p>
                    <p class="card-text"><?php echo $row1['product_description']?></p>


                </div>
                <div class="card-footer bg-light border-0">
                    <a href="../sakyre2.0/detail.buku.php?id=<?php echo $row1['product_id'] ?>"
                        class="btn btn-primary rounded-pill px-4">Detail</a>
                        <a href="../sakyre2.0/detail.buku.php?id=<?php echo $row1['product_id'] ?>"
                    class="btn btn-success rounded-pill">Rp. <?php echo number_format($row1['product_price'])?></a>
                   
                    </div>
            </div>
      
<!-- buku kotakan -->

            <?php
            
                     $buku = mysqli_query($conn, "SELECT * FROM db_product LEFT JOIN db_category USING (category_id) ORDER BY product_id DESC");
                     if(mysqli_num_rows($buku)>0){
                     while($row = mysqli_fetch_array($buku)){
                ?>
            <!-- h-100 -->
           
            <div class="card col-md-3  pt-3 z-index">

                <img src="../sakyre2.0/img/cover-book/<?php echo $row['product_image']?>" class="card-img-top pb-1"
                    alt="..." width="70%">
                    <!-- div card body -->
                <div class="card-body bg-light pb-0">
                    <h5 class="card-title"><?php echo $row['product_name']?></h5>
                    <i class="fas fa-star"></i>
                    <p class="card-text" height="100%"><?php echo $row['category_name']?></p>
                    <p class="card-text"><?php echo $row['desc']?></p>

                </div>
                        <!-- div card footer -->
                <div class="card-footer bg-light border-0 pb-3">
                    <a href="../sakyre2.0/detail.buku.php?id=<?php echo $row['product_id'] ?>"
                        class="btn btn-primary rounded-pill">Detail</a>
                    <a href="../sakyre2.0/detail.buku.php?id=<?php echo $row['product_id'] ?>"
                    class="btn btn-success rounded-pill">Rp. <?php echo number_format($row['product_price'])?></a>
                   
                </div>
            </div>
            <?php } }else{?>
            <table>
                <tr>
                    <td colspan="8">Tidak ada data</td>
                </tr>
            </table>

            <?php } ?>

           
        </div>

        
        <?php 
        if(isset($_POST['wishlist'])){
           
          

            $userid     = $d->id;
            $productid  = $row['product_id'];
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
</form>

<!-- <//?php
 if(isset($_POST['wishlist'])){

    $produk = mysqli_query($conn, "SELECT * FROM db_product where product_id = '".$row['product_id']."' ");
    $p = mysqli_fetch_object($produk);

    $kategori = mysqli_query($conn, "SELECT * FROM db_category WHERE category_id='".$_GET['id']."'");
    $r = mysqli_fetch_array($kategori);

    $buku = mysqli_query($conn, "SELECT * FROM db_product LEFT JOIN db_category USING (category_id) ORDER BY product_id DESC");
    $row = mysqli_fetch_array($buku);

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
        echo '<//script>alert("Buku telah ditambahkan ke dalam wishlist anda")<//script>';
        echo '<//script>window.location="../sakyre2.0/wishlist.php"<//script>';
    }else{
        echo 'gagal '.mysqli_error($conn);
    }

}
?> -->