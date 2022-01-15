<?php
session_start();
include 'db.php';
if (!isset($_SESSION["login"])) {
    header("Location:sakyre2.0/login.php");
    exit;
}

    $kategori = mysqli_query($conn, "SELECT * FROM db_category WHERE category_id = '".$_GET['id']."' ");
    if(mysqli_num_rows($kategori) == 0 ){
        echo '<script>window.location="data-kategori.php"</script>';
    }
    $k = mysqli_fetch_object($kategori);
?>



<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous">
    <link rel="stylesheet" href="css/style.css">
    <title>Sakyre</title>
</head>

<body>

    <?php
    require 'navbar.index.php';
    ?>
    <div class="section">
        <div class="container">
            <h3>Edit Data Kategori</h3>
            <div class="box">

                <form action="" method="POST">
                    <input type="text" name="nama" placeholder="Nama Kategori" value=<?php echo $k->category_name ?>><br>
                    <input type="submit" name="submit" value="Edit kategori"></input>
                </form>
                <?php
                if (isset($_POST['submit'])) {

                    $nama = ucwords($_POST['nama']);

                    $update = mysqli_query($conn, "UPDATE db_category SET
                                            category_name = '".$nama."'
                                            WHERE category_id = '".$k->category_id."' ");
                    if ($update) {
                        echo '<script>alert("Edit Data Berhasil")</script>';
                        echo '<script>window.location="data-kategori.php"</script>';
                    } else {
                        echo 'gagal' . mysqli_error($conn);
                    }
                }
                ?>

                <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-gtEjrD/SeCtmISkJkNUaaKMoLD0//ElJ19smozuHV6z3Iehds+3Ulb9Bn9Plx0x4" crossorigin="anonymous">
                </script>

            </div>
        </div>
    </div>
</body>

</html>