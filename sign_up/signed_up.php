<?php
    session_start();
    if(!isset($_SESSION['signed_up']))
    {
        header("Location:../logowanie.php");
    }
?>