<?php

    require 'functions.php';

    if(isset($_POST["daftarpembeli"])){

        if(registrasi($_POST)>0){
            echo "
            <script>
                alert('Registrasi berhasil');
            </script>
             ";
             echo '<script>window.location="../sakyre2.0/login.php"</script>';
        }
        else {
            echo mysqli_error($conn);
        }
    }

?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous">
    <link rel="stylesheet" href="style.css">
    <link rel="shortcut icon" href="../sakyre2.0/img/favicon/favicon-01.png">
    <title>Sakyre</title>
</head>

<body>
    <div class="container text-center">
        <?php
    require 'navbar.php';
    ?>
        <!-- <div class="container"> -->
        <div class="row align-items-center">
            <div class="col-4">

            </div>
            <div class="col-3 md center" height="50%">
                <main class="form-signin">
                    <div class="container-fluid">
                        <h4>Signup</h4>
                        <form  action="" method="post">
                            <table class="form-center">
                                <tr class="form-floating">
                                    <!-- <td>Username</td> -->
                                    <td><input type="text" name="username" id="username" required placeholder="Username">
                                    </td>
                                </tr>
                                <tr class="form-floating">
                                    <!-- <td>Email</td> -->
                                    <td><input type="text" name="email" id="email" required placeholder="Email"></td>
                                </tr>
                                <tr class="form-floating">
                                    <!-- <td>Password</td> -->
                                    <td><input type="password" name="password" id="password" required placeholder="Password">
                                    </td>
                                </tr>
                                <tr class="form-floating">
                                    <!-- <td>Konfirmasi Password</td> -->
                                    <td><input type="password" name="password2" required id="password2"
                                            placeholder="Konfirmasi Password"></td>
                                </tr>
                                <tr class="form-floating">
                                    <!-- <td>nama</td> -->
                                    <td><input type="text" name="nama" id="nama" required placeholder="Nama anda"></td>
                                </tr>
                                <tr class="form-floating">
                                    <!-- <td>no hp</td> -->
                                    <td><input type="text" name="hp" id="hp" required placeholder="Nomor seluler"></td>
                                </tr>
                                <tr class="form-floating">
                                    <!-- <td>alamat</td> -->
                                    <td><input type="text" name="alamat" id="alamat" required placeholder="Alamat"></td>
                                </tr>
                                <tr class="form-floating">
                                    <!-- <td>role</td> -->
                                    <td>
                                        <select class="form-control" required name="role" id="">
                                            <!-- <option value="">--role--</option>
                                            <option value="admin">Admin</option> -->
                                            <option value="member">Member</option>
                                        </select>
                                    </td>
                                </tr>
                                <tr class="form-floating">
                                    <!-- <td></td> -->
                                    <td>
                                        <button type="submit" name="daftarpembeli">Signup</button>
                                    </td>
                                </tr>
                            </table>
                            <p>Have already an account ? <a href="../sakyre2.0/login.php">Click Here.</a></p>
                        </form>
                    </div>
                </main>
            </div>
        </div>
    </div>

   
    <div class="col-lg ms"></div>
    </div>



</body>

</html>