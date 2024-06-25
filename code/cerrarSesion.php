<?php

    session_start();
    unset($_SESSION['user']);

    if(isset($_SESSION['rec'])){
        unset($_SESSION['rec']);
    }

    header("Location: ../index.php");
?>