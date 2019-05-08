<?php 
    session_start();
    if(isset($_SESSION['signed_up']))
    {
        header('Location:index.php');
    }

?>
<!DOCTYPE HTML>
<html>
    <head>
        <link rel="stylesheet" href="css/sign_up.css"/>
        <meta charset="utf-8">
    </head>

    <body>
        <div class="container-fluid">
            <div class="top">
                <h1>Dziennik Elektroniczny Zespół Szkół Nr 3 W Łukowie</h1>
            </div>
            <div class="content">
                <div class="sign_up">
                    <h2>Zaloguj się!</h2>
                    <p>Proszę wprowadzić nazwę użytkownika i hasło</p>
                    <form action="sign_up/sign_up.php" method="post">
                        <label class="sign_up--label">Nazwa użytkownika<input type="text" name="username" placeholder="Wprowadź nazwę użytkownika"/></label>
                        <label class="sign-up--label">Hasło<input type="password" name="user_password" placeholder="Wprowadź hasło"/></label>
                        <input type="submit" value="Zaloguj"/>
                                          <?php   if(isset($_SESSION['checkSignUp'])){
                                if($_SESSION['checkSignUp']){ 
                                    echo "<p style='color:red;'> Wpisz poprawną nazwę użytkownika lub hasła!</p>";
                                    unset($_SESSION['checkSignUp']);
                                }} ?>
                    </form>
                    <a href="registration/registration.php">Nie masz jeszcze konta? Zarejestruj się!</a>
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