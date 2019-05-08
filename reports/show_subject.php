<?php
    define ('DIR_MAIN','E:\xampp\htdocs\dziennik');
    require DIR_MAIN.'\db_connect\db_connect.php';
    
    $sql = "SELECT nazwa_przedmiotu,opis_przedmiotu FROM przedmioty ORDER BY nazwa_przedmiotu;";
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
            $name_subject[$i] = $row['nazwa_przedmiotu'];
            $description[$i] = $row['opis_przedmiotu'];
            $i++;
        }
        echo '<table> 
                <tr>
                    <th>Nazwa przedmiotu</th>
                    <th>Opis</th>
                <tr>';
                for($x=0; $x < mysqli_num_rows($result);$x++)
                {
                        
                        echo "<td>".$name_subject[$x]."</td>";
                        echo "<td>".$description[$x]."</td></tr>";
                }
            echo '</table>';
    }
mysqli_close($connect);
?>  