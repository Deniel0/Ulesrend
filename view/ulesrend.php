<table>
	<tr>
		<th colspan="3">
			<h2>Ülésrend</h2>
		</th>
		<th colspan="3">
	<?php
				
		if(!empty($_SESSION["id"])) {
			if(in_array($_SESSION["id"], $adminok)) {
	?>
		<form action="ulesrend.php" method="post">
			Hiányzó: 	<select name="hianyzo_id">
	<?php
        $result = tanLista($conn);
            if ($result->num_rows > 0) {
				while($row = $result->fetch_assoc()) {
					if($row['nev'] and !in_array($row['id'], $hianyzok)) echo '<option value="'.$row['id'].'">'.$row['nev'].'</option>';
					}
					}
	?>
										
		</select><br>
		<input type="submit">
	    </form>						
	<?php
		}
		}
	?>
	    </th>
	</tr>

	<?php

	if ($tanuloIdk) {
		$sor = 0;
			foreach($tanuloIdk as $row) {
				$tanulo->set_user($row, $conn);
					if($tanulo->get_sor() != $sor) {
						if($sor != 0) echo '</tr>';
							echo '<tr>';
							$sor = $tanulo->get_sor();
						}
					if(!$tanulo->get_nev()) echo '<td class="empty"></td>';
						else {
							$plusz = '';
							if(in_array($row, $hianyzok)) $plusz .=  ' class="missing"';
							if($row == $en) $plusz .=  ' id="me"';
							if($row == $tanar) $plusz .=  ' colspan="2"';
							echo "<td".$plusz.">" . $tanulo->get_nev();
							if(!empty($_SESSION["id"])) {
								if(in_array($_SESSION["id"], $adminok)) {
									if(in_array($row, $hianyzok)) echo '<br><a href="ulesrend.php?nem_hianyzo='.$row.'">Nem hiányzó</a>';
								}
							}
							echo "</td>";
						}
					}
				} 
				else {
					echo "0 results";
				}
				$conn->close();

				?>
</table>