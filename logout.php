<?php
    session_start();
    session_unset();
    session_destroy();

    header("location: ../sakyre2.0/index.html");
    exit;

?>