<?php
    session_start();
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
    <link rel="shortcut icon" href="../sakyre2.0/img/favicon/favicon-01.png" >
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
    <div class="container">
        <div class="container-fluid">
            <h4>Book List</h4>
            <p><a class="btn btn-primary" href="../sakyre2.0/tambah.buku.php">Add new book</a></p>
            <table border="1" cellspacing="0" class="table">

                <thead>
                    <tr >
                        <th width="50px">No</throw>
                        <th>Kategori</th>
                        <th width="120px">Judul Buku</th>
                        <th>Harga</th>
                        <th>Deskripsi</th>
                        <th>Gambar</th>
                        <th>Status</th>

                        <th width="150px">Aksi</th>

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
                        <td><?php echo $row['category_name']?></td>
                        <td><?php echo $row['product_name']?> </td>
                        <td>Rp. <?php echo number_format($row['product_price']) ?></td>
                        <td><?php echo $row['product_description']?></td>
                        <td><img src="../sakyre2.0/img/cover-book/<?php echo $row['product_image']?>" alt=""
                                width="120px"></td>
                        <td><?php echo ($row['product_status']=="0")? 'Tidak Aktif':'Aktif'?></td>
                        <td> <a class="btn btn-success " href="edit.buku.php?id=<?php echo $row['product_id']  ?>">Edit</a>
                            
                            <a class="btn btn-danger" href="proses.hapus.php?idp=<?php echo $row['product_id'] ?>"
                                onclick="return confirm('Are you sure to delete this ?')">Delete</a>
                        </td>
                    </tr>
                    <?php } }else{?>
                    <tr>
                        <td colspan="8">Tidak ada data</td>
                    </tr>
                    <?php } ?>
                </tbody>
            </table>

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