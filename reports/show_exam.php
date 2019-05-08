<?php
    define ('DIR_MAIN','E:\xampp\htdocs\dziennik');
    require DIR_MAIN.'\db_connect\db_connect.php';
    
    $sql = "SELECT nazwa_spr, opis_spr,data_spr,nazwa_przedmiotu,nauczyciele.imie,nauczyciele.nazwisko FROM sprawdziany,nauczyciele,przedmioty WHERE sprawdziany.przedmiot=przedmioty.id_przedmiotu AND sprawdziany.nauczyciel=nauczyciele.id_nauczyciele ORDER BY data_spr;";
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
            $name_exam[$i] = $row[0];
            $description_exam[$i] = $row[1];
            $date_exam[$i] = $row[2];
            $name_subject[$i] = $row[3];
            $name_teacher[$i] = $row[4];
            $surname_teacher[$i] = $row[5];
            $i++;
        }
        echo '<table> 
                <tr>
                    <th>Sprawdzian</th>
                    <th>Opis Sprawdzianu</th>
                    <th>Data Sprawdzianu</th>
                    <th>Przedmiot</th>
                    <th>Imię nauczyciela</th>
                    <th>Nazwisko nauczyciela</th>
                </tr>
                <tr>';
                for($x=0; $x < mysqli_num_rows($result);$x++)
                {
                        
                        echo "<td>".$name_exam[$x]."</td>";
                        echo "<td>".$description_exam[$x]."</td>";
                        echo "<td>".$date_exam[$x]."</td>";
                        echo "<td>".$name_subject[$x]."</td>";
                        echo "<td>".$name_teacher[$x]."</td>";
                        echo "<td>".$surname_teacher[$x]."</td></tr>";
                }
            echo '</table>';
    }
mysqli_close($connect);
?>