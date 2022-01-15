<?php
    session_start();
    if(!isset($_SESSION["login"])){
       header("Location: ../sakyre2.0/login.php");
       exit;
    } 
   
?>



<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous">
    <link rel="stylesheet" href="../css/style.css">
    <link rel="shortcut icon" href="../sakyre2.0/img/favicon/favicon-01.png" >
    <title>Sakyre</title>
  </head>
  <body>

<body>

    <?php
      require 'navbar.index.php';
      $kategori = mysqli_query($conn, "SELECT * FROM db_category WHERE category_id = '".$_GET['id']."' ");
      if(mysqli_num_rows($kategori)==0){
          echo '<script>window.location="../sakyre2.0/kategori.php"</script>';
      }
      $k = mysqli_fetch_object($kategori);
    ?>
    <div class="container">
        <div class="container-fluid">
    <h5>Edit Category</h5>
    <form action="" method="POST">
         <input type="text" name="nama"  require placeholder="category name" value="<?php echo $k->category_name ?>"><br>
        
         <input type="submit" name="submit" value="submit"></input>

    </form>
        <?php
            if(isset($_POST['submit'])){
                $nama=ucwords($_POST['nama']);
               $updatek = mysqli_query($conn, "UPDATE db_category SET 
               
                category_name ='".$nama."' WHERE category_id ='".$k->category_id."' ");
            if($updatek){
                echo '<script>alert("Category edited succesfully")</script>';
                echo '<script>window.location="../sakyre2.0/kategori.php"</script>';
            }else{
                echo 'gagal '.mysqli_error($conn);
            }
        }
        ?>
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
