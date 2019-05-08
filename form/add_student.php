 
<form id="students" action="insert_values\insert_student.php" method="post">
    <h2>Dodaj Ucznia</h2>   
        <input type="text" name="name_student" placeholder="Imię ucznia"/>
        <input type="text" name="surname_student" placeholder="Nazwisko ucznia" />
        <input type="date" name="dateBorn_student" placeholder="Data urodzin ucznia" onmouseover="pop_up(event)" onfocus="pop_up(event)" onmouseout="pop_upOut(this)"/>
        <label><input type="radio" name="sex_student" value="M"/>Mężczyzna</label>
        <label><input type="radio" name="sex_student" value="K"/>Kobieta</label>
        <select name="class_student">
            <option disabled selected>Dodaj ucznia do klasy...</option>
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
        <input type="submit" value="Dodaj Ucznia" />   
</form>

