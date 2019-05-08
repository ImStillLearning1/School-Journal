<?php session_start(); ?>
<!DOCTYPE HTML>
<html>
    <head>
        <link rel="stylesheet" href="../css/sign_up.css"/>
        <meta charset="utf-8">
    </head>

    <body>
        <div class="container-fluid">
            <div class="top">
                <h1>Dziennik Elektroniczny Zespół Szkół Nr 3 W Łukowie</h1>
            </div>
            <div class="content">
                <div class="sign_up sign_up--registration">
                    <h2>Zarejestruj się!</h2>
                    <p>Proszę wprowadzić dane do logowania</p>
                    <form action="add_user.php" method="post">
                        <label>Nazwa użytkownika<input type="text" name="username" placeholder="Wprowadź nazwę użytkownika"/></label>
                        <label>Hasło<input type="password" name="user_password" placeholder="Wprowadź hasło"/></label>
                        <label>Powtórz Hasło<input type="password" name="user_passwordRepeat" placeholder="Powtórz hasło"/></label>
                        <label>Adres e-mail<input type="text" name="user_email" placeholder="Powtórz hasło"/></label>
                        <input type="submit" class="registration" value="Zaloguj"/>
                        <?php
                            if(isset($_SESSION['FV_passwords']))
                            {
                                echo "<p style='color:red;font-weight:700;'>Hasła są różne!</p>";
                                unset($_SESSION['FV_passwords']);
                            }
                            if(isset($_SESSION['FV_nickEmail']))
                            {
                                echo "<p style='color:red;font-weight:700;'>Nick lub adres email już jest zajęty!</p>";
                                unset($_SESSION['FV_nickEmail']);
                            }
                            if(isset($_SESSION['TV_addUser']))
                            {
                                echo "<p style='color:green;width:100%;font-weight:700;'>Rejestracja zakończona sukcesem, możesz się zalogować.</p>";
                                unset($_SESSION['TV_addUser']);
                            }
                        ?>
                    </form>
                    <a class="registration--a" href="../logowanie.php">Powrót do ekranu logowania</a>
                </div>
            </div>
            <div class="footer">
                <div class="column-1">
                    <p>Projekt i realizacja: Mateusz Czwarno</p>
                </div>
               
            </div>
        </div>
        
    </body>
</html>