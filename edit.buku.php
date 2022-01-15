<?php
    session_start();
    if(!isset($_SESSION["login"])){
       header("Location: ../sakyre2.0/login.php");
       exit;
    } 

    // include 'functions.php';
    // $query = mysqli_query($conn, "SELECT * FROM db_user WHERE id = '".$_SESSION['id']."'");
    // $d = mysqli_fetch_object($query);
?>




<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous">
    <link rel="stylesheet" href="../css/style.css">
    <link rel="shortcut icon" href="../sakyre2.0/img/favicon/favicon-01.png" >
    <script src="https://cdn.ckeditor.com/4.14.0/standard/ckeditor.js"></script>
    <title>Sakyre</title>
</head>
<!-- <body> -->

<body>
    <?php
      require 'navbar.index.php';
      
      $produk = mysqli_query($conn, "SELECT * FROM db_product WHERE product_id = '".$_GET['id']."' ");
      $p = mysqli_fetch_object($produk);
      
    ?>


    <div class="container">
        <div class="container-fluid">
            <h5>Edit Book</h5>
            <form action="" method="POST" enctype="multipart/form-data">
                <select class="form-select" name="kategori" id="">
                    <option value="">--Kategori--</option>
                    <?php
                $kategori = mysqli_query($conn, "SELECT * FROM db_category ORDER BY category_id DESC");
                while($r = mysqli_fetch_array($kategori)){
            ?>
                    <option value="<?php echo $r['category_id']?>"
                        <?php echo($r['category_id']==$p->category_id)?'selected':''; ?>>
                        <?php echo $r['category_name']?></option>

                    <?php }?>
                </select>

                <br><input class="form-control" type="text" name="nama" value="<?php echo $p->product_name ?>"
                    placeholder="Judul Buku">
                <br><input class="form-control" type="text" name="harga" placeholder="Harga buku"
                    value="<?php echo ($p->product_price) ?>">
                <br>
                <img src="../sakyre2.0/img/cover-book/<?php echo $p->product_image?>" width="450px">
                <br><input class="form-control" type="file" name="foto">
                <br>
                <textarea class="form-control" name="deskripsi" placeholder="Deskripsi"><?php echo $p->product_description?></textarea>

                <br><select class="form-select" name="status" id="">
                    <option value="">--Status--</option>
                    <option value="1" <?php echo ($p->product_status ==1)?'selected':'';?>>Tersedia</option>
                    <option value="0" <?php echo ($p->product_status ==0)?'selected':'';?>>Tidak Tersedia</option>
                </select>

                <br><input type="submit" class="btn btn-dark" name="submit" value="submit">
            </form>


            <!-- php -->
            <?php
            
           
        
            if(isset($_POST['submit'])){
                $harga       = $_POST['harga'];
                $filename = $_FILES['foto']['name'];
                $tmp_name = $_FILES['foto']['tmp_name'];
                $date = date("Y-m-d");
                

                

                if(!empty($tmp_name)){
                    $type1 = explode('.', $filename);
                    $type2 = $type1[1];
                $newname = 'sakyre'.time().'.'.$type2;
               // menampung data format file yg diizinkan
               $tipe_diizinkan = array('jpg', 'jpeg', 'png');
               // validasi format file
               if(!in_array($type2, $tipe_diizinkan)){
                //format file tidak sesuai
                echo '<script>alert="format file tidak diizinkan"</script>';
            }else{
                move_uploaded_file($tmp_name,"../sakyre2.0/img/cover-book/$newname");

                $updatebuku = mysqli_query($conn, "UPDATE db_product SET
                        product_name ='$_POST[nama]',
                        category_id ='$_POST[kategori]',
                        product_price ='$_POST[harga]',
                        product_description ='$_POST[deskripsi]',
                        `desc` ='$_POST[deskripsi]',
                        product_status ='$_POST[status]',
                        product_image ='$newname' WHERE product_id = '".$_GET['id']."' ");
            }
                    

                }
                else{
                    $updatebuku = mysqli_query($conn,"UPDATE db_product SET
                    product_name ='$_POST[nama]',
                    category_id ='$_POST[kategori]',
                    product_price ='$harga',
                    product_description ='$_POST[deskripsi]',
                    product_status ='$_POST[status]' WHERE product_id = '".$_GET['id']."' ");
                
                }
                  
                if($updatebuku){
                    echo '<script>alert("Book edited succesfully")</script>';
                    echo '<script>window.location="../sakyre2.0/buku.php"</script>';
                
                }else{
                    echo "gagal ".mysqli_error($conn);
                }
                   
               
            }
           
                
            
        ?>
            <!-- end php -->
        </div>
    </div>


    <?php
    require 'footer.php';
    ?>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-gtEjrD/SeCtmISkJkNUaaKMoLD0//ElJ19smozuHV6z3Iehds+3Ulb9Bn9Plx0x4" crossorigin="anonymous">
    </script>
    <script>
    CKEDITOR.replace('deskripsi');
    </script>

</body>

</html>