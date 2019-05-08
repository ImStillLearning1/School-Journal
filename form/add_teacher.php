
<form id="teachers" action="insert_values\insert_teacher.php" method="post">
    <h2>Dodaj Nauczyciela</h2>
        <input type="text" name="name_teacher" placeholder="Imię nauczyciela"/>
        <input type="text" name="surname_teacher" placeholder="Nazwisko nauczyciela"/>
        <input type="date" name="dateBorn_teacher" placeholder="Data urodzin nauczyciela" onmouseover="pop_up(event)" onfocus="pop_up(event)" onmouseout="pop_upOut(this)"/>
        <label><input type="radio" name="sex_teacher" value="M"/>Mężczyzna</label>
        <label><input type="radio" name="sex_teacher" value="K"/>Kobieta</label>
        <select name="subject_teacher">
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
			?>
        </select>
        <input type="submit" value="Dodaj Nauczyciela" />
</form>