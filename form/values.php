<?php
define ('DIR_MAIN','E:\xampp\htdocs\dziennik');

require DIR_MAIN.'\db_connect\db_connect.php';
if(isset($_REQUEST['q']))
{
    $valueNote = $_REQUEST['q'];
    
    $sql = "SELECT id_studenci,imie,nazwisko FROM studenci WHERE klasa=".$valueNote.";";
    $query = mysqli_query($connect,$sql);
    if(!$query)
    {
        echo "Jest błędzik";
    }
    else
    {
        echo "<option disabled selected>Wybierz ucznia...</option>";   
        while($row = mysqli_fetch_assoc($query))
        {
            echo "<option value=".$row['id_studenci'].">".$row['imie']." ".$row['nazwisko']."</option>";
        }
    }
}

if(isset($_REQUEST['subjectValue']))
{
    $valueSubject = $_REQUEST['subjectValue'];
    
    $sql = "SELECT id_nauczyciele,imie,nazwisko FROM nauczyciele WHERE przedmiot=".$valueSubject.";";
    $query = mysqli_query($connect,$sql);
    if(!$query)
    {
        echo "Jest błędzik";
    }
    else
    {
        echo "<option disabled selected>Wybierz nauczyciela...</option>";   
        while($row = mysqli_fetch_assoc($query))
        {
            echo "<option value=".$row['id_nauczyciele'].">".$row['imie']." ".$row['nazwisko']."</option>";
        }
    }
}
mysqli_close($connect);
?>