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
    <link rel="shortcut icon" href="../sakyre2.0/img/favicon/favicon-01.png" >
    <link rel="stylesheet" href="../css/style.css">
    <title>Sakyre</title>
  </head>
  <body>

<body>

    <?php
      require 'navbar.index.php';
    ?>
    <div class="container">
        <div class="container-fluid">
    <h5>Add Category</h5>
    <form action="" method="POST">
        
         <input class="form-control" type="text" name="nama"  require placeholder="category name"><br>
        
         <input type="submit" name="submit" value="submit"></input>

    </form>
        <?php
            if(isset($_POST['submit'])){
                $nama=ucwords($_POST['nama']);
                $insert=mysqli_query($conn, "INSERT INTO db_category VALUES (
                    null, '".$nama."' ) ");

            if($insert){
                echo '<script>alert("Category added succesfully")</script>';
                echo '<script>window.location="../sakyre2.0/kategori.php"</script>';
            }else{
                echo 'gagal '.mysqli_error($conn);
            }
        }
        ?>
       </div>
    </div>

    <?php
    require 'footer.php';
?>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-gtEjrD/SeCtmISkJkNUaaKMoLD0//ElJ19smozuHV6z3Iehds+3Ulb9Bn9Plx0x4" crossorigin="anonymous">
    </script>


</body>

</html>
