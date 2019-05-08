<?php
session_start();s
define ('DIR_MAIN','E:\xampp\htdocs\dziennik');
require DIR_MAIN.'\db_connect\db_connect.php';

if(isset($_POST['name_student']) && isset($_POST['surname_student']) && isset($_POST['dateBorn_student']) && isset($_POST['sex_student']) && isset($_POST['class_student']))
{
    $checkSql = "SELECT imie,nazwisko,data_urodzenia FROM studenci WHERE imie='".$_POST['name_student']."' AND nazwisko='".$_POST['surname_student']."' AND data_urodzenia='".$_POST['dateBorn_student']."';";
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
            $sql = "INSERT INTO studenci(imie,nazwisko,data_urodzenia,plec,klasa) VALUES('".$_POST['name_student']."','".$_POST['surname_student']."','".$_POST['dateBorn_student']."','".$_POST['sex_student']."','".$_POST['class_student']."');";
            $result = mysqli_query($connect,$sql);
            if(!$result)
            {
                echo "Błędzik w zapytaniu ".mysqli_error($connect);
            }
            else
            {
                $_SESSION['value'] = "Uczeń";
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

