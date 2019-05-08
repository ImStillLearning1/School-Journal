<form id="lessons" action="insert_values\insert_lesson.php" method="post">
    <h2>Dodaj lekcję</h2> 
        <select name="subject" onchange="checkValueTeachers(this)">
            <option disabled selected >Wybierz przedmiot...</option>
			<?php
				require DIR_MAIN.'\db_connect\db_connect.php';
				$sql = "SELECT id_przedmiotu,nazwa_przedmiotu FROM przedmioty";
				$result = mysqli_query($connect,$sql);
				if(!$result)
				{
					echo "Mamy błędzik ".mysqli_error($connect);
				}
				else
				{
					while($row = mysqli_fetch_assoc($result))
					{
						echo '<option value="'.$row['id_przedmiotu'].'">'.$row['nazwa_przedmiotu'].'</option>';
					}
				}
			?>
        </select>
        <select name="teacherDyn">
            <option disabled selected>Wybierz nauczyciela...</option>
        </select>
        <select name="class">
            <option disabled selected>Wybierz klasę...</option>
            <?php
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
                mysqli_close($connect);
			?>
        </select>
        <input type="text" name="new_lesson" placeholder="Nazwa lekcji" />
        <input type="textarea" name="description" placeholder="Opis lekcji"/>
        <input type="date" name="date_lesson" />
        <input type="submit" value="wyslij"/>
</form>