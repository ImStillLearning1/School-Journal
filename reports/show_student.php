<?php
    define ('DIR_MAIN','E:\xampp\htdocs\dziennik');
    require DIR_MAIN.'\db_connect\db_connect.php';
    
    $sql = "SELECT nazwa_klasy,imie,nazwisko,data_urodzenia FROM klasa,studenci WHERE klasa=id_klasy;";
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
            $name_student[$i] = $row['imie'];
            $surname_student[$i] = $row['nazwisko'];
            $birthday[$i] = $row['data_urodzenia'];
            $i++;
        }
        echo '<table> 
                <tr>
                    <th>Klasa</th>
                    <th>Imię ucznia</th>
                    <th>Nazwisko ucznia</th>
                    <th>Data urodzenia</th>
                <tr>';
                for($x=0; $x < mysqli_num_rows($result);$x++)
                {
                        
                        echo "<td>".$class[$x]."</td>";
                        echo "<td>".$name_student[$x]."</td>";
                        echo "<td>".$surname_student[$x]."</td>";
                        echo "<td>".$birthday[$x]."</td></tr>";
                }
            echo '</table>';
    }
mysqli_close($connect);
?>