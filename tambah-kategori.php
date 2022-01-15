<?php
session_start();
if (!isset($_SESSION["login"])) {
    header("Location:sakyre2.0/login.php");
    exit;
}
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
            <h3> Tambah kategori</h3>
            <div class="box">

                <form action="" method="POST">
                    <input type="text" name="nama" placeholder="Nama Kategori"><br>
                    <input type="submit" name="submit" value="tambahkan kategori"></input>
                </form>
                <?php
                if (isset($_POST['submit'])) {

                    $nama = ucwords($_POST['nama']);

                    $insert = mysqli_query($conn, "INSERT INTO db_category VALUE (
                null,
                '" . $nama . "') ");
                    if ($insert) {
                        echo '<script>alert("Tambah data Berhasil")</script>';
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