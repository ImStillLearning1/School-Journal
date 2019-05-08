<?php
    define ('DIR_MAIN','E:\xampp\htdocs\dziennik');
    require DIR_MAIN.'\db_connect\db_connect.php';
    
    $sql = "SELECT nazwa_klasy,wychowawca FROM klasa,nauczyciele WHERE wychowawca=id_nauczyciele ORDER BY nazwa_klasy;";
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
            $educator[$i] = $row['wychowawca'];
            $i++;
        }
        echo '<table> 
                <tr>
                    <th>Nazwa klasy</th>
                    <th>Wychowawca</th>
                <tr>';
                for($x=0; $x < mysqli_num_rows($result);$x++)
                {
                        
                        echo "<td>".$class[$x]."</td>";
                        echo "<td>".$educator[$x]."</td></tr>";
                }
            echo '</table>';
    }
mysqli_close($connect);
?>  