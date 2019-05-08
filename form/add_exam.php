
<form id="exams" action="insert_values/insert_exam.php" method="post">
    <h2>Dodaj Sprawdzian</h2>
        <input type="text" name="new_exam" placeholder="Nazwa sprawdzianu" />
        <input type="textarea" name="description" placeholder="Opis sprawdzianu" />
        <input type="date" name="date_exam" onmouseover="pop_up(event)" onfocus="pop_up(event)" onmouseout="pop_upOut(this)"  />
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
        <input type="submit" value="wyslij"/>
</form>

