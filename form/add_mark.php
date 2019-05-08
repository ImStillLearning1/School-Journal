    
<form id="marks" action="insert_values\insert_mark.php" method="post">
    <h2>Dodaj Ocenę</h2>
    <select name="subject" onchange="checkValueTeachers(this)">
            <option disabled selected>Wybierz przedmiot...</option>
            <?php
                require '..\db_connect\db_connect.php';
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
                mysqli_close($connect);
			?>
    </select>
    <select name="teacherDyn">
            <option disabled selected>Wybierz nauczyciela...</option>
    </select>
    <select name="class" onchange="checkValue(this)">
            <option disabled selected>Wybierz klasę...</option>
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
                mysqli_close($connect);
			?>
    </select>
    <select name="student">
            <option disabled selected>Wybierz ucznia...</option>
    </select>
        <select name="marks">
            <option disabled selected>Ocena ucznia...</option>
            <option value="1">1</option>
            <option value="2">2</option>
            <option value="3">3</option>
            <option value="4">4</option>
            <option value="5">5</option>
            <option value="6">6</option>
        </select>
        <input type="submit" value="Wyślij"/>
</form>