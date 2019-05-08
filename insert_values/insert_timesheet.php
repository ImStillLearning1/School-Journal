<?php
session_start();
define ('DIR_MAIN','E:\xampp\htdocs\dziennik');
require DIR_MAIN.'\db_connect\db_connect.php';
$check = false;

//Sprawdź czy ustawiona została liczba uczniów do sprawdzenia frekwencji oraz czy każdy uczeń ma sprawdzoną obecność
if(isset($_SESSION['count_students']))
{
    for($z=1;$z <= $_SESSION['count_students'];$z++)
    {
        echo "A";
        if(isset($_POST["".$z]))
        {
            if($z == $_SESSION['count_students'])
            {
                echo "AB";
                $check = true;
            }
            else
            {
                echo "ABC";
                continue;
            }
        }
        else
        {
            echo "ABCD";
            echo $z;
            mysqli_close($connect);
        }
    }
}
if($check)
{   
    for($z=1;$z <= $_SESSION['count_students'];$z++)
    {
        $checkSql = "SELECT uczen,data_lekcji FROM frekwencja WHERE uczen='".$_POST["".$z]."' AND data_lekcji='".$_SESSION['date_lesson']."';";
        $result = mysqli_query($connect,$checkSql);
        if(!$result)
        {
            echo "Błędzik w zapytaniu ".mysqli_error($connect);
        }
        else
        {
            echo "1";
            if(mysqli_num_rows($result) > 0)
            {
                echo "12";
                mysqli_close($connect);  
            }
            else
            {
                echo "123";
                $sql = "SELECT * FROM (SELECT id_lekcji FROM lekcje) AS Test ORDER BY id_lekcji DESC LIMIT 1";
                $result = mysqli_query($connect,$sql);
                if(!$result)
                {
                    echo "Blędzik w zapytaniu ".mysqli_error($connect);
                }
                else
                {
                    echo "1234";
                    $row = mysqli_fetch_assoc($result);
                }
                $sql = "INSERT INTO frekwencja(klasa,id_lekcji,uczen,obecny,data_lekcji) VALUES(".$_SESSION['class'].",".$row['id_lekcji'].",".$z.",".$_POST[''.$z.''].",'".$_SESSION['date_lesson']."');";
                $result = mysqli_query($connect,$sql);
                if(!$result)
                {
                    echo "Błędzik w zapytaniu ".mysqli_error($connect);
                }
                else
                {
                    echo "12345";

                    $_SESSION['value'] = "Lekcja";
                    $_SESSION['checkAdd'] = true;
                }
               mysqli_close($connect);
            }
        }
    }  
}

else
{
    mysqli_close($connect);
}
header("Location:../index.php");
?>  