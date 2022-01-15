<?php
 session_start();
 if(isset($_SESSION["Login"])){
    header("Location: ../sakyre2.0/index.php");
    exit;

}
require 'functions.php';
//fetch object
if(isset($_POST["login"])){
    global $conn;
    $username = $_POST["username"];
    $cek = mysqli_query($conn, "SELECT * FROM db_user WHERE username = '".$username."' ");

    if (mysqli_num_rows($cek)){
        $d = mysqli_fetch_object($cek);
        $_SESSION["a_global"]=$d;
        $_SESSION["id"]=$d->id;
    }
}
//fetch array
if (isset($_POST["login"])){
    
    global $conn;
    $username = $_POST["username"];
    $password = $_POST["password"];

    $result = mysqli_query($conn, "SELECT * FROM db_user WHERE username = '$username'");

    if (mysqli_num_rows($result)){
        
        $rows = mysqli_fetch_assoc($result);
       
        if (password_verify($password, $rows["password"])){
            $_SESSION["login"] = true;
          
            header("Location: ../sakyre2.0/index.php");
            exit;
        }
    }

    $error = true;

}
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
    <title>Sakyre</title>
</head>

<body class="text-center">

    <?php
    require 'navbar.php';
?>

    <div class="container">
        <div class="row align-items-center">
            <div class="col-md"></div>
            <div class="col-3 md center" height="50%">
                <main class="form-signin">
                    <form w-300 action="" method="post">
                        <h4 class="h3 mb-3 fw-normal">Login</h4>
                        <!-- <img class="mb-4" src="/docs/5.0/assets/brand/bootstrap-logo.svg" alt="" width="72" height="57"> -->

                        <div class="form-floating">
                            <input class="form-control" type="text" name="username" id="username"
                                placeholder="Username">
                            <label for="floatingInput">Username</label>
                        </div>
                        <div class="form-floating">
                            <input class="form-control" type="password" name="password" id="password"
                                placeholder="Password">
                            <label for="floatingPassword">Password</label>
                        </div><br>
                        <button class="w-100 btn btn-lg btn-dark" type="submit" name="login">Log in</button>
                        <br>
                        <p>Don't have an account ? <a href="../sakyre2.0/signup.php">Click Here.</a></p>

                    </form>
                    <?php if (isset($error)):?>
                    <p style="color:red; font-style: italic">username atau password salah</p>
                    <?php endif ?>
                </main>

            </div>
            <div class="col-lg ms"></div>
        </div>

    </div>






    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-gtEjrD/SeCtmISkJkNUaaKMoLD0//ElJ19smozuHV6z3Iehds+3Ulb9Bn9Plx0x4" crossorigin="anonymous">
    </script>


</body>

</html>