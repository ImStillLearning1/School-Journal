<?php
require DIR_MAIN.'\db_connect\db_connect.php';
$sql = "SELECT id_studenci,imie,nazwisko FROM studenci WHERE klasa=".$_SESSION['class'].";";
$result = mysqli_query($connect,$sql);
$i=0;
if(!$result)
{
    echo "Błędzik: ".mysqli_error($connect);
}
else
{
    while($row = mysqli_fetch_assoc($result))
    {
        $imie[$i] = $row['imie'];
        $nazwisko[$i] = $row['nazwisko'];
        $value[$i] = $row['id_studenci'];
        $i++;
    }
}
mysqli_close($connect);
?>
<form <?php if($_SESSION['add_timesheet']==true){?> class="visibility_form" <?php } ?> id="timesheet" action="insert_values\insert_timesheet.php" method="post">
    <h2>Frekwencja</h2>
        <?php
        $i=0;
            while($i < mysqli_num_rows($result))
            {
                echo '<label for="'.$value[$i].'">'.$imie[$i].' '.$nazwisko[$i].'<input type="radio" name="'.$value[$i].'" value="1"/>Obecny<input type="radio" name="'.$value[$i].'" value="0"/>Nieobecny</label>';
                $i++;
            }
   
        $_SESSION['count_students'] = $i;  //Ilość wyświetlonych uczniów do sprawdzenia frekwencji
    
        ?>
        <input type="submit" value="Zapisz" />
</form>