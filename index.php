<?php
    session_start();
    if(!isset($_SESSION['signed_up']))
    {
        header("Location:logowanie.php");
    }
?>
<!DOCTYPE html>
<html lang="pl-Pl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="css/formularze.css">
    <link rel="stylesheet" href="css/fontello/css/fontello.css">
    <link href="https://fonts.googleapis.com/css?family=Playfair+Display" rel="stylesheet">
    <title>Dziennik Lekcyjny</title>
    <script src="ajax/ajax_javascript.js"></script>
    <script src="ajax/ajax_content.js"></script>
    <script src="ajax/ajax_menu.js"></script>
</head>
<body>
    <div class="container">
        <div class="top">
            <div class="header">
                <h1>Dziennik Elektroniczny</h1>            
            </div>
            
        </div>
        <div class="menu">
            <ul>
                <li class="menu_headers"><h2>Formularze</h2></li>
                <li><i class="icon-pencil"></i><button class="button" value="add_exam" onclick="showForm(this)">Sprawdziany</button></li>
                <li><i class="icon-ok-squared"></i><button class="button" value="add_mark" onclick="showForm(this)">Oceny</button></li>
                <li><i class="icon-pencil"></i><button class="button" value="add_subject" onclick="showForm(this)">Przedmioty</button></li>
                <li><i class="icon-chat"></i><button class="button" value="add_note" onclick="showForm(this)">Uwagi</button></li>
                <li><i class="icon-pencil"></i><button class="button" value="add_lesson" onclick="showForm(this)">Lekcja</button></li>
                <li><i class="icon-plus-circled"></i><button class="button" value="add_student" onclick="showForm(this)">Dodaj ucznia</button></li>
                <li><i class="icon-plus-squared"></i><button class="button" value="add_teacher" onclick="showForm(this)">Dodaj nauczyciela</button></li>
                <li class="menu_headers"><h2>Raporty</h2></li>
                <li><i class="icon-pencil"></i><button class="button2" value="show_exam" onclick="showReport(this)">Sprawdziany</button></li>
                <li><i class="icon-ok-squared"></i><button class="button2" value="show_mark" onclick="showReport(this)">Oceny</button></li>
                <li><i class="icon-ok-squared"></i><button class="button2" value="show_subject" onclick="showReport(this)">Przedmioty</button></li>
                <li><i class="icon-attention"></i><button class="button2" value="show_note" onclick="showReport(this)">Uwagi</button></li>
                <li><i class="icon-pencil"></i><button class="button2" value="show_lesson" onclick="showReport(this)">Lekcja</button></li>
                <li>
                    <i class="icon-user"></i>
                    <button class="button2" value="show_student" onclick="showReport(this)">Uczniów</button>
                    <div class="dropdown dropdown_student">
                        <ul class="dropdown__menu">
                            <li><i class="icon-user"></i><button class="button3">Pokaż frekwencję ucznia</button></li>
                            <li><i class="icon-users"></i><button class="button3">Pokaż średnią ocen ucznia</button></li>
                        </ul>
                    </div>    
                </li>
                <li><i class="icon-users"></i><button class="button2" value="show_teacher" onclick="showReport(this)">Nauczycieli</button></li>
                <li>
                    <i class="icon-users"></i>
                    <button class="button2" value="show_class" onclick="showReport(this)">Klasy</button>
                    <div class="dropdown dropdown__class">
                        <ul class="dropdown__menu">
                            <li><i class="icon-user"></i><button class="button3">Pokaż frekwencję klasy</button></li>
                            <li><i class="icon-users"></i><button class="button3">Pokaż średnią ocen klasy</button></li>
                        </ul>
                    </div>                
                </li>
                <li><i class="icon-power"></i><button class="button2" onclick="window.location.href='logout/logout.php';">Wyloguj się</button></li>
                
            </ul>
            <div class="hamburger-menu">
                <div class="bar"></div>
                <div class="bar"></div>
                <div class="bar"></div>
            </div>
            <div class="user">
                Zalogowany jako: <span><?php echo $_SESSION['user']?></span>    
            </div>
        </div>
        <div class="content">
            <div class="inputs">
            <?php                
                if(isset($_SESSION['checkAdd']))
                {
                      if($_SESSION['checkAdd'] == true)
                        {
                          if(!isset($_SESSION['add_timesheet']))
                          {
                           echo $_SESSION['value']." został/a dodany/a";
                            $_SESSION['checkAdd'] = false;
                          }
                        }
                }
                if(isset($_SESSION['add_timesheet']))
                {
                    if($_SESSION['add_timesheet'] == true)
                    {
                        require "form/add_timesheet.php";
                        unset($_SESSION['add_timesheet']);
                    }
                }
              
            ?>
            </div>
        </div>
        <div class="pop-up">Wprowadź datę</div>
        <div class="footer"></div>
    </div>
    
    <script src="javascript/javascript.js"></script>
    <script>includeHTML();</script>
</body>
</html>