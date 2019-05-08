<?php
session_start();
define ('DIR_MAIN','E:\xampp\htdocs\dziennik');
require DIR_MAIN.'\db_connect\db_connect.php';

if(isset($_POST['subject']) && isset($_POST['teacherDyn']) && isset($_POST['class']) && isset($_POST['student']) && isset($_POST['marks']))
{
            $sql = "INSERT INTO oceny(ocena,klasa,uczen,przedmiot,nauczyciel) VALUES('".$_POST['marks']."','".$_POST['class']."','".$_POST['student']."','".$_POST['subject']."','".$_POST['teacherDyn']."');";
            $result = mysqli_query($connect,$sql);
            if(!$result)
            {
                echo "Błędzik w zapytaniu ".mysqli_error($connect);
            }
            else
            {
                $_SESSION['value'] = "Ocena";
                $_SESSION['checkAdd'] = true;
                
            }
	       mysqli_close($connect);
}
else
{
    mysqli_close($connect);
}
header("Location:../index.php");
?>