<?php
	
	// table.php
	require_once("User.class.php");
	require_once("functions.php");
	

	
	
	//kasutaja tahab midagi muuta
	if(isset($_POST["update"])){
		
		updateCar($_POST["id"], $_POST["number_plate"], $_POST["color"]);
		
	}
	
	//kas kasutaja tahab kustutada
	// kas aadressireal on ?delete=??!??!?!
	if(isset($_GET["delete"])){
		
		// saadan kaasa id, mida kustutada
		deleteCar($_GET["delete"]);
		
	}
	
	
	
	$mail_list = GetMailData();
	//var_dump($car_list);

	
	
?>







<html><body style="background-color:lightgrey;"></body></html>
<table border=1 >
	<tr>
		<th>comment_id</th>
		<th>user_id</th>
		<th>text</th>
	</tr>
	
	<?php
	
		// iga massiivis olema elemendi kohta
		// count($car_list) - massiivi pikkus
		for($i = 0; $i < count($mail_list); $i++){
			// $i = $i +1; sama mis $i += 1; sama mis $i++;
			
				// tavaline rida
				echo "<tr>";
			
				echo "<td>".$mail_list[$i]->comment_id."</td>";
				echo "<td>".$mail_list[$i]->id_mail."</td>";
				echo "<td>".$mail_list[$i]->text."</td>";
			
				echo "</tr>";
			}
			
			
		
	
	?>

</table>
<html><body style="background-color:lightgrey;"></body></html>