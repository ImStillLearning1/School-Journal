<?php
session_start();
define ('DIR_MAIN','E:\xampp\htdocs\dziennik');
require DIR_MAIN.'\db_connect\db_connect.php';

if(isset($_POST['new_subject']) && isset($_POST['description']))
{
    $checkSql = "SELECT nazwa_przedmiotu FROM przedmioty WHERE nazwa_przedmiotu='".$_POST['new_subject']."'";
    $result = mysqli_query($connect,$checkSql);
        if(!$result)
        {
            echo "Błędzik w zapytaniu ".mysqli_error($connect);
        }
        else
        {
            if(mysqli_num_rows($result) > 0)
            {
               mysqli_close($connect);  
            }
            else
            {
                $sql = "INSERT INTO przedmioty(nazwa_przedmiotu,opis_przedmiotu) VALUES('".$_POST['new_subject']."','".$_POST['description']."')";
	            $result = mysqli_query($connect,$sql);
                if(!$result)
                {
                    echo "Błędzik w zapytaniu ".mysqli_error($connect);
                }
                else
                {
                $_SESSION['value'] = "Przedmiot";
                $_SESSION['checkAdd'] = true;
                    mysqli_close($connect);
                }
            }
        }
}
else
{
    mysqli_close($connect);
    header("Location:../index.php");
}
?>    