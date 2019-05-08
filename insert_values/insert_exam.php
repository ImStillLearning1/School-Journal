<?php
session_start();
define ('DIR_MAIN','E:\xampp\htdocs\dziennik');
require DIR_MAIN.'\db_connect\db_connect.php';

if(isset($_POST['new_exam']) && isset($_POST['description']) && isset($_POST['date_exam']) && isset($_POST['subject']) && isset($_POST['teacherDyn']))
{
    $checkSql = "SELECT nazwa_spr,opis_spr,data_spr,przedmiot,nauczyciel FROM sprawdziany WHERE nazwa_spr='".$_POST['new_exam']."' AND opis_spr='".$_POST['description']."' AND data_spr='".$_POST['date_exam']."' AND przedmiot=".$_POST['subject']." AND nauczyciel=".$_POST['teacherDyn'].";";
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
            $sql = "INSERT INTO sprawdziany(nazwa_spr,opis_spr,data_spr,przedmiot,nauczyciel) VALUES('".$_POST['new_exam']."','".$_POST['description']."','".$_POST['date_exam']."','".$_POST['subject']."','".$_POST['teacherDyn']."');";
            $result = mysqli_query($connect,$sql);
            if(!$result)
            {
                echo "Błędzik w zapytaniu ".mysqli_error($connect);
            }
            else
            {
                $_SESSION['value'] = "Sprawdzian";
                $_SESSION['checkAdd'] = true;
            }
	       mysqli_close($connect);
        }
    }
}
else
{
    mysqli_close($connect);
}
header("Location:../index.php");
?>

