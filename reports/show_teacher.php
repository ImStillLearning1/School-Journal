<?php
    define ('DIR_MAIN','E:\xampp\htdocs\dziennik');
    require DIR_MAIN.'\db_connect\db_connect.php';
    
    $sql = "SELECT nazwa_przedmiotu,imie,nazwisko,data_urodzenia FROM przedmioty,nauczyciele WHERE przedmiot=id_przedmiotu;";
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
            $subject_name[$i] = $row['nazwa_przedmiotu'];
            $name_teacher[$i] = $row['imie'];
            $surname_teacher[$i] = $row['nazwisko'];
            $birthday[$i] = $row['data_urodzenia'];
            $i++;
        }
        echo '<table> 
                <tr>
                    <th>Przedmiot</th>
                    <th>Imię nauczyciela</th>
                    <th>Nazwisko nauczyciela</th>
                    <th>Data urodzenia</th>
                <tr>';
                for($x=0; $x < mysqli_num_rows($result);$x++)
                {
                        
                        echo "<td>".$subject_name[$x]."</td>";
                        echo "<td>".$name_teacher[$x]."</td>";
                        echo "<td>".$surname_teacher[$x]."</td>";
                        echo "<td>".$birthday[$x]."</td></tr>";
                }
            echo '</table>';
    }
mysqli_close($connect);
?>