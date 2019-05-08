<?php
session_start();
    require_once "../db_connect/db_connect.php";
    if(isset($_POST['username']) && isset($_POST['user_password']))
    {
        $nick = htmlentities($_POST['username'], ENT_QUOTES, "UTF-8");
        $password = htmlentities($_POST['user_password'], ENT_QUOTES, "UTF-8");
        unset($_POST['username']);
        unset($_POST['user_password']);
        
        
        $result = mysqli_query($connect,sprintf("SELECT * FROM uzytkownicy WHERE nazwa_uzytkownika='%s' AND haslo='%s';",
		mysqli_real_escape_string($connect,$nick),
		mysqli_real_escape_string($connect,$password)));
        if(!$result)
        {
            echo "Błąd z zapytaniem: ".mysqli_error($connect);
        }
        else
        {
            $row = mysqli_num_rows($result);
            if($row == 0)
            {
                
                
                $_SESSION['checkSignUp'] = true;
                header("Location:../logowanie.php");
            }
            else
            {
                
                $_SESSION['signed_up'] = true;
                $_SESSION['user'] = $nick;
                header("Location:../index.php");
            }
            
        }
    }
    else
    {
        $_SESSION['checkSignUp'] = true;
        header("Location:../logowanie.php");
    }
?>