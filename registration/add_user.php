<?php
    session_start();
    require_once "../db_connect/db_connect.php";
    if(isset($_POST['username']) && isset($_POST['user_password']) && isset($_POST['user_passwordRepeat']) && isset($_POST['user_email']))
    {
        $nick = htmlentities($_POST['username'], ENT_QUOTES, "UTF-8");
        $password = htmlentities($_POST['user_password'], ENT_QUOTES, "UTF-8");
        $passwordR = htmlentities($_POST['user_passwordRepeat'], ENT_QUOTES, "UTF-8");
        $email = htmlentities($_POST['user_email'], ENT_QUOTES, "UTF-8");
        
        if($password != $passwordR)
        {
            $_SESSION['FV_passwords'] = true;
            header("Location: registration.php");
            exit();
        }
        $result = mysqli_query($connect,sprintf("SELECT * FROM uzytkownicy WHERE nazwa_uzytkownika='%s' OR email='%s';",
		mysqli_real_escape_string($connect,$nick),
		mysqli_real_escape_string($connect,$email)));
        if(!$result)
        {
            echo "Błąd z zapytaniem: ".mysqli_error($connect);
        }
        else
        {
            $row = mysqli_num_rows($result);
            if($row > 0)
            {
                $_SESSION['FV_nickEmail'] = true;
                header("Location:registration.php");
                exit();
            }
            else
            {
                $sql = "INSERT INTO uzytkownicy(nazwa_uzytkownika,haslo,email) VALUES('".$nick."','".$password."','".$email."')";
                $result = mysqli_query($connect,sprintf("INSERT INTO uzytkownicy(nazwa_uzytkownika,haslo,email) VALUES('%s','%s','%s')",
                mysqli_real_escape_string($connect,$nick),
		        mysqli_real_escape_string($connect,$password),
		        mysqli_real_escape_string($connect,$email)));
                if(!$result)
                {
                    echo "Błąd z zapytaniem: ".mysqli_error($connect);
                }
                else
                {
                    $_SESSION['TV_addUser'] = true;
                    header("Location:registration.php");
                }
            }
        }
    }
?>