<?php
    session_start();
    unset($_SESSION['signed_up']);
    header("Location: ../logowanie.php");
?>