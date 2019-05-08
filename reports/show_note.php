<?php
    define ('DIR_MAIN','E:\xampp\htdocs\dziennik');
    require DIR_MAIN.'\db_connect\db_connect.php';
    
    $sql = "SELECT nazwa_klasy, studenci.imie,studenci.nazwisko,tresc,nauczyciele.imie,nauczyciele.nazwisko FROM uwagi,klasa,studenci,nauczyciele WHERE uwagi.klasa=id_klasy AND uczen=id_studenci AND uwagi.nauczyciel=id_nauczyciele ORDER BY uwagi.klasa ASC, uwagi.uczen ASC;";
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
            $note_content[$i] = $row['tresc'];
            $name_teacher[$i] = $row['imie'];
            $surname_teacher[$i] = $row['nazwisko'];
            $i++;
        }
        echo '<table> 
                <tr>
                    <th>Klasa</th>
                    <th>Imię ucznia</th>
                    <th>Nazwisko ucznia</th>
                    <th>Treść uwagi</th>
                    <th>Imię nauczyciela</th>
                    <th>Nazwisko nauczyciela</th>
                </tr>
                <tr>';
                for($x=0; $x < mysqli_num_rows($result);$x++)
                {
                        
                        echo "<td>".$class[$x]."</td>";
                        echo "<td>".$name_student[$x]."</td>";
                        echo "<td>".$surname_student[$x]."</td>";
                        echo "<td>".$note_content[$x]."</td>";
                        echo "<td>".$name_teacher[$x]."</td>";
                        echo "<td>".$surname_teacher[$x]."</td></tr>";
                }
            echo '</table>';
    }
mysqli_close($connect);
?>