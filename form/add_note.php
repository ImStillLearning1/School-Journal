<form id="notes" action="insert_values\insert_note.php" method="post">
    <h2>Dodaj Uwagę</h2> 
        <select id="id_class" name="class" onchange="checkValue(this)">
            <option disabled selected >Wybierz klasę...</option>
              <?php
                require '..\db_connect\db_connect.php';
				$sql = "SELECT id_klasy,nazwa_klasy FROM klasa";
				$result = mysqli_query($connect,$sql);
				if(!$result)
				{
					echo "Mamy błędzik ".mysqli_error($connect);
				}
				else
				{
					while($row = mysqli_fetch_assoc($result))
					{
						echo '<option value="'.$row['id_klasy'].'">'.$row['nazwa_klasy'].'</option>';
					}
				}
			?>
        </select>
        <select name="student">
            <option selected disabled>Wybierz ucznia...</option>
        </select>
        <select name="teacher">
            <option disabled selected>Wybierz nauczyciela...</option>
			<?php
				require DIR_MAIN.'\db_connect\db_connect.php';
				$sql = "SELECT id_nauczyciele,imie,nazwisko FROM nauczyciele";
				$result = mysqli_query($connect,$sql);
				if(!$result)
				{
					echo "Mamy błędzik ".mysqli_error($connect);
				}
				else
				{
					while($row = mysqli_fetch_assoc($result))
					{
						echo '<option value="'.$row['id_nauczyciele'].'">'.$row['imie'].' '.$row['nazwisko'].'</option>';
					}
				}
                mysqli_close($connect);
			?>
        </select>
        <input type="textarea" name="content_note" placeholder="Treść uwagi"/>
        <input type="submit" value="Dodaj Uwagę" />
    <div id="test"></div>
</form>