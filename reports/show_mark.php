<?php
    define ('DIR_MAIN','E:\xampp\htdocs\dziennik');
    require DIR_MAIN.'\db_connect\db_connect.php';
    
    $sql = "SELECT nazwa_klasy, studenci.imie,studenci.nazwisko,ocena,nazwa_przedmiotu,nauczyciele.imie,nauczyciele.nazwisko FROM oceny,klasa,przedmioty,studenci,nauczyciele WHERE oceny.klasa=id_klasy AND uczen=id_studenci AND oceny.przedmiot=id_przedmiotu AND oceny.nauczyciel=id_nauczyciele ORDER BY oceny.klasa ASC, oceny.uczen ASC;";
    $result = mysqli_query($connect,$sql);
    if(!$result)
    {
        echo "Błąd w zapytaniu ".mysqli_error($connect);
    }
    else
    {
        $i=0;
        while($row = mysqli_fetch_array($result))
        {
            $class[$i] = $row['nazwa_klasy'];
            $name_student[$i] = $row[1];
            $surname_student[$i] = $row[2];
            $mark[$i] = $row['ocena'];
            $name_subject[$i] = $row['nazwa_przedmiotu'];
            $name_teacher[$i] = $row['imie'];
            $surname_teacher[$i] = $row['nazwisko'];
            $i++;
        }
        echo '<table> 
                <tr>
                    <th>Klasa</th>
                    <th>Imię ucznia</th>
                    <th>Nazwisko ucznia</th>
                    <th>Ocena</th>
                    <th>Przedmiot</th>
                    <th>Imię nauczyciela</th>
                    <th>Nazwisko nauczyciela</th>
                </tr>
                <tr>';
                for($x=0; $x < mysqli_num_rows($result);$x++)
                {
                        
                        echo "<td>".$class[$x]."</td>";
                        echo "<td>".$name_student[$x]."</td>";
                        echo "<td>".$surname_student[$x]."</td>";
                        echo "<td>".$mark[$x]."</td>";
                        echo "<td>".$name_subject[$x]."</td>";
                        echo "<td>".$name_teacher[$x]."</td>";
                        echo "<td>".$surname_teacher[$x]."</td></tr>";
                }
            echo '</table>';
    }
mysqli_close($connect);
?>