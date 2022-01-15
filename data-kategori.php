<?php
    session_start();
    include 'db.php';
    if(!isset($_SESSION["login"])){
       header("Location:sakyre2.0/index.html");
       exit;
    } 
?>



<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous">
    <link rel="stylesheet" href="css/style.css">
    <style>
    @import url('https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,400;0,500;0,600;0,700;1,300&display=swap');
    </style>
    <title>Sakyre</title>
</head>

<body>
    <?php
      require 'navbar.index.php';
    ?>

    <!-- content -->
 <div class="section">
     <div class="container">
         <h3> Data kategori</h3>
         <div class="box">
             <p><a href="tambah-kategori.php">Tambah Data</a></p>
             <table border="1" cellspacing="0" class="table ">
                 <thead>
                     <tr>
                         <th width="60px">No</th>
                         <th>Kategori</th>
                         <th width = "150px">Aksi</th>
                     </tr>
                 </thead>
                 <tbody>
                     <?php
                        $no = 1;
                        $kategori = mysqli_query($conn, "SELECT * FROM db_category ORDER BY category_id DESC");
                        while($row = mysqli_fetch_array($kategori)){
                     ?>
                     <tr>
                         <td><?php echo $no++?></td>
                         <td><?php echo $row['category_name']?></td>
                         <td>
                             <a href="edit-kategori.php?id=<?php echo $row['category_id']?>">Edit</a> || <a href="proses-hapus.php?idk=<?php echo $row['category_id']?>" onclick="return confirm('Yakin ingin Hapus ?')">Hapus</a>
                         </td>
                     </tr>
                     <?php } ?>
                 </tbody>
             </table>
         </div>
    </div>
 </div>

 <?php
      require 'footer.php';
    ?>

</body>

</html>