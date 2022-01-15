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
    <link rel="shortcut icon" href="../sakyre2.0/img/favicon/favicon-01.png">
    <title>Sakyre</title>
</head>

<body>

    <?php
      require 'navbar.index.php';
      // $user = mysqli_query($conn, "SELECT * FROM db_user WHERE id='".$_GET['id']."'");
      // $p = mysqli_fetch_object($user);
    ?>

    <!-- profile -->
    <div class="container">
        <div class="main-body">

            <form action="" method="POST">
                <div class="row gutters-sm">
                    <div class="col-md-4 mb-3">
                        <div class="card">
                            <div class="card-body">
                                <div class="d-flex flex-column align-items-center text-center">
                                    <!-- foto profile -->
                                    <img src="../sakyre2.0/img/profile-user/profile.jpg" alt="" class="rounded"
                                        height="150">

                                    <input class="btn btn-white formfile-sm col-auto mt-2" value="Ganti profile"
                                        type="file" name="foto" id="">

                                    <div class="mt-3">
                                        <!-- nama -->
                                        <h4><input class="text-center border-0" type="text" name="nama"
                                                value="<?php echo $d->nama?>"></h4>
                                        <!-- Deskripsi profile -->
                                        <p class="text-secondary mb-1"><?php echo $d->role?></p>
                                        <p class="text-muted font-size-sm"><?php echo $d->alamat?></p>

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
                                        <h6 class="mb-0">Username</h6>
                                    </div>
                                    <div class="col-sm-9 text-secondary">
                                        <input class="border-0 form-control" type="text" name="username"
                                            value="<?php echo $d->username?>">
                                    </div>
                                </div>
                                <hr>
                                <div class="row">
                                    <div class="col-sm-3">
                                        <h6 class="mb-0">Email</h6>
                                    </div>
                                    <div class="col-sm-9 text-secondary">
                                        <input class="border-0 form-control" type="text" name="email"
                                            value="<?php echo $d->email?>">
                                    </div>
                                </div>
                                <hr>
                                <div class="row">
                                    <div class="col-sm-3">
                                        <h6 class="mb-0">no HP</h6>
                                    </div>
                                    <div class="col-sm-9 text-secondary">
                                        <input class="border-0 form-control" type="text" name="hp"
                                            value="<?php echo $d->hp?>">
                                    </div>
                                </div>
                                <hr>
                                <div class="row">
                                    <div class="col-sm-3">
                                        <h6 class="mb-0">Alamat</h6>
                                    </div>
                                    <div class="col-sm-9 text-secondary">
                                        <input class="border-0 form-control" type="text" name="alamat"
                                            value="<?php echo $d->alamat?>">
                                    </div>
                                </div>
                                <hr>
                                <div class="row">
                                    <div class="col-sm-3">
                                        <h6 class="mb-0">Role</h6>
                                    </div>
                                    <div class="col-sm-9 text-secondary">
                                        <!-- <input class="border-0 form-control" type="text" name="role" -->
                                        <!-- value="<?php echo $d->role?>"> -->
                                        <p type="text" class="border-0 form-control mb-0 " type="text" name="role"
                                            value="">
                                            <?php echo ( $d->role ) ?></p>
                                    </div>
                                </div>
                                <hr>
                                <div class="row">
                                    <div class="col-sm-12">
                                        <input class="btn btn-outline-primary" type="submit" name="submit"
                                            value="save profile"
                                            onclick="return confirm('Yakin mengubah profile?')"></input>
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



        </div>
    </div>

    </div>
    </div>
    <style>
    body {
        margin-top: 20px;
        color: #1a202c;
        text-align: left;
        background-color: #fff;
    }

    .main-body {
        padding: 15px;
    }

    .card {
        box-shadow: 0 1px 3px 0 rgba(0, 0, 0, .1), 0 1px 2px 0 rgba(0, 0, 0, .06);
    }

    .card {
        position: relative;
        display: flex;
        flex-direction: column;
        min-width: 0;
        word-wrap: break-word;
        background-color: #fff;
        background-clip: border-box;
        border: 0 solid rgba(0, 0, 0, .125);
        border-radius: .25rem;
    }

    .card-body {
        flex: 1 1 auto;
        min-height: 1px;
        padding: 1rem;
    }

    .gutters-sm {
        margin-right: -8px;
        margin-left: -8px;
    }

    .gutters-sm>.col,
    .gutters-sm>[class*=col-] {
        padding-right: 8px;
        padding-left: 8px;
    }

    .mb-3,
    .my-3 {
        margin-bottom: 1rem !important;
    }

    .bg-gray-300 {
        background-color: #e2e8f0;
    }

    .h-100 {
        height: 100% !important;
    }

    .shadow-none {
        box-shadow: none !important;
    }
    </style>
    <!-- end profile -->

    <!-- <div class="container">
    <h5>Profile</h5>
    <form action="" method="POST">

        <div class="form-label">Nama
        <input class="form-control" type="text" name="nama"  value="<//?php //echo $d->nama?>"><br>
        </div>
        <div class="form-label">Username
        <input class="form-control" type="text" name="username" value="<//?php //echo $d->username?>"><br>
        </div>
        <div class="form-label">Email
        <input class="form-control" type="text" name="email" value="<//?php// echo $d->email?>"><br>
        </div>
        <div class="form-label">No HP
        <input class="form-control" type="text" name="hp" value="<//?php// echo $d->hp?>"><br>
        </div>
        <div class="form-label">Alamat
        <input class="form-control" type="text" name="alamat" value="<//?php// echo $d->alamat?>"><br>
        </div>
         
         
         
         
         <input type="submit" name="submit" value="save profile" onclick="return confirm('Yakin mengubah profile?')"></input>

    </form> -->


    <?php
        // require 'functions.php';
        if(isset($_POST["submit"])){

            $nama       = $_POST['nama'];
            $username   = $_POST['username'];
            $email      = $_POST['email'];
            $hp         = $_POST['hp'];
            $alamat     = $_POST['alamat'];
            $role       = $_POST['role'];

            $updateprofile = mysqli_query ($conn,"UPDATE db_user SET 
                                    nama = '".$nama."' ,
                                    username = '".$username."' ,
                                    email = '".$email."' ,
                                    hp = '".$hp."' ,
                                    alamat = '".$alamat."' 
                                    WHERE id = '".$d->id."' ");
         
           
         if($updateprofile){
            echo'<script>alert("Profile has changed")</script>';
            echo'<script>window.location="../sakyre2.0/profile.php"</script>';
        
        }else {
            echo 'gagal '.mysqli_error($conn);
        }
        }
       
   ?>

    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-gtEjrD/SeCtmISkJkNUaaKMoLD0//ElJ19smozuHV6z3Iehds+3Ulb9Bn9Plx0x4" crossorigin="anonymous">
    </script>

    <?php
    require 'footer.php';
?>
</body>

</html>