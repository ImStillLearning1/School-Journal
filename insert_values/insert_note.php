<?php
session_start();
define ('DIR_MAIN','E:\xampp\htdocs\dziennik');
require DIR_MAIN.'\db_connect\db_connect.php';

if(isset($_POST['class']) && isset($_POST['student']) && isset($_POST['teacher']) && isset($_POST['content_note']))
{
    $checkSql = "SELECT klasa,uczen,nauczyciel,tresc FROM uwagi WHERE klasa=".$_POST['class']." AND uczen=".$_POST['student']." AND nauczyciel=".$_POST['teacher']." AND tresc='".$_POST['content_note']."';";
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
            $sql = "INSERT INTO uwagi(klasa,uczen,nauczyciel,tresc) VALUES('".$_POST['class']."','".$_POST['student']."','".$_POST['teacher']."','".$_POST['content_note']."');";
            $result = mysqli_query($connect,$sql);
            if(!$result)
            {
                echo "Błędzik w zapytaniu ".mysqli_error($connect);
            }
            else
            {
                $_SESSION['value'] = "Uwaga";
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