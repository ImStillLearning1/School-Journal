<?php
    $connect = mysqli_connect("localhost", "root", "","dziennik");
        if(!$connect)
        {
            echo "Nie udało nawiązać się połączenia: ".mysqli_connect_error();
        }
	$connect -> query("SET NAMES 'utf-8' COLLATE 'utf8_polish_ci'");
	$connect -> query("SET CHARSET utf8");
?>