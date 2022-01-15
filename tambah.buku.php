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
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous">
    <link rel="stylesheet" href="../css/style.css">
    <link rel="shortcut icon" href="../sakyre2.0/img/favicon/favicon-01.png" >
    <script src="https://cdn.ckeditor.com/4.14.0/standard/ckeditor.js"></script>
    <title>Sakyre</title>
  </head>
  <!-- <body> -->

<body>

    <?php
      require 'navbar.index.php';
    ?>
    <div class="container">
        <div class="container-fluid">
    <h5>Add new Book</h5>
    <form action="" method="POST" enctype="multipart/form-data">
        <select class="form-select" name="kategori" id="" required>
            <option value="">--Kategori--</option>
            <?php
                $kategori = mysqli_query($conn, "SELECT * FROM db_category ORDER BY category_id DESC");
                while($r = mysqli_fetch_array($kategori)){
            ?>
            <option value="<?php echo $r['category_id']?>"><?php echo $r['category_name']?></option>
            <?php }?>
        </select>

        <br><input class="form-control" type="text" name="nama" placeholder="Judul Buku" required>
        <br><input class="form-control" type="text" name="harga" placeholder="Harga buku" required>
        <br><input class="form-control" type="file" name="gambar"  required>
        <br><textarea class="form-control" name="deskripsi" placeholder="Deskripsi" required></textarea>

        <br><select class="form-select" name="status" id="">
                <option value="">--Status--</option>
                <option value="1">Aktif</option>
                <option value="0">Tidak Aktif</option>
        </select>
        
         <br><input type="submit" name="submit" value="submit"></input>

    </form>

        <?php
            if(isset($_POST['submit'])){
                // print_r($_FILES['gambar']);
               //menampung inputan form
               $kategori    = $_POST['kategori'];
               $nama        = $_POST['nama'];
               $harga       = $_POST['harga'];
               $gambar      = $_POST["gambar"];
               $deskripsi   = $_POST['deskripsi'];
               $status      = $_POST['status'];
               $date        = date("Y-m-d");
               
               //menampung data file upload
               $filename = $_FILES['gambar']['name'];
               $tmp_name = $_FILES['gambar']['tmp_name'];

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
                   //format file sesuai
                    move_uploaded_file($tmp_name, '../sakyre2.0/img/cover-book/' .$newname);

                    $insert = mysqli_query($conn, "INSERT INTO db_product VALUES(
                        null,
                        '".$kategori."',
                        '".$nama."',
                        '".$harga."',
                        '".$deskripsi."',
                        '".$deskripsi."',
                        '".$newname."',
                        '".$status."'
                    )");
               }
                    if($insert){
                        echo '<script>alert("Buku telah ditambahkan")</script>';
                        echo '<script>window.location="../sakyre2.0/buku.php"</script>';
                    }else{
                        echo 'gagal '.mysqli_error($conn);
                    }

               }
            

               // proses upload file & insert database
        ?>
       </div>
    </div>


    <?php
    require 'footer.php';
?>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-gtEjrD/SeCtmISkJkNUaaKMoLD0//ElJ19smozuHV6z3Iehds+3Ulb9Bn9Plx0x4" crossorigin="anonymous">
    </script>
    <script>
        CKEDITOR.replace ('deskripsi');
    </script>

</body>

</html>
