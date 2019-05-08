<?php
session_start();
define ('DIR_MAIN','E:\xampp\htdocs\dziennik');
require DIR_MAIN.'\db_connect\db_connect.php';

if(isset($_POST['name_teacher']) && isset($_POST['surname_teacher']) && isset($_POST['dateBorn_teacher']) && isset($_POST['sex_teacher']) && isset($_POST['subject_teacher']))
{
    $checkSql = "SELECT imie,nazwisko,data_urodzenia FROM nauczyciele WHERE imie='".$_POST['name_teacher']."' AND nazwisko='".$_POST['surname_teacher']."' AND data_urodzenia='".$_POST['dateBorn_teacher']."';";
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
            $sql = "INSERT INTO studenci(imie,nazwisko,data_urodzenia,plec,klasa) VALUES('".$_POST['name_teacher']."','".$_POST['surname_teacher']."','".$_POST['dateBorn_teacher']."','".$_POST['sex_teacher']."','".$_POST['subject_teacher']."');";
            $result = mysqli_query($connect,$sql);
            if(!$result)
            {
                echo "Błędzik w zapytaniu ".mysqli_error($connect);
            }
            else
            {
                $_SESSION['value'] = "Nauczyciel";
                $_SESSION['checkAdd'] = true;
            }
	       mysqli_close($connect);
        }
    }
}
else
{
    mysqli_close($connect);
    header("Location:../index.php");
}
?>  