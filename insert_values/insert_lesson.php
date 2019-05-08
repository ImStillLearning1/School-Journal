<?php
session_start();
define ('DIR_MAIN','E:\xampp\htdocs\dziennik');
require DIR_MAIN.'\db_connect\db_connect.php';

if(isset($_POST['subject']) && isset($_POST['teacherDyn']) && isset($_POST['class']) && isset($_POST['new_lesson']) && isset($_POST['description']) && isset($_POST['date_lesson']))
{
    $checkSql = "SELECT nauczyciel,przedmiot,klasa,nazwa_lekcji,opis_lekcji,data_lekcji FROM lekcje WHERE przedmiot='".$_POST['subject']."' AND nauczyciel='".$_POST['teacherDyn']."' AND klasa='".$_POST['class']."' AND nazwa_lekcji='".$_POST['new_lesson']."' AND opis_lekcji='".$_POST['description']."' AND data_lekcji='".$_POST['date_lesson']."';";
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
            $sql = "INSERT INTO lekcje(nauczyciel,przedmiot,klasa,nazwa_lekcji,opis_lekcji,data_lekcji) VALUES('".$_POST['teacherDyn']."','".$_POST['subject']."','".$_POST['class']."','".$_POST['new_lesson']."','".$_POST['description']."','".$_POST['date_lesson']."');";
            $result = mysqli_query($connect,$sql);
            if(!$result)
            {
                echo "Błędzik w zapytaniu ".mysqli_error($connect);
                exit();
            }
            else
            {
                $_SESSION['add_timesheet'] = true;
                $_SESSION['date_lesson'] = $_POST['date_lesson'];
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

