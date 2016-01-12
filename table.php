<?php
	
	// table.php
	require_once("functions.php");
	require_once("edit_comment.php");
	
	
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
	
	
	
	$user_list = getUserData();
	//var_dump($car_list);

?>
<table border=1 >
	<tr>
		<th>kasut id</th>
		<th>kasut email</th>
		<th>saada sõnum</th>
	</tr>
	
	<?php
	
		// iga massiivis olema elemendi kohta
		// count($car_list) - massiivi pikkus
		for($i = 0; $i < count($user_list); $i++){
			// $i = $i +1; sama mis $i += 1; sama mis $i++;
			
				// tavaline rida
				echo "<tr>";
			
				echo "<td>".$user_list[$i]->id."</td>";
				echo "<td>".$user_list[$i]->email."</td>";
				echo "<td><a href='comment.php?edit=".$user_list[$i]->id."'>comment.php</a></td>";
			
				echo "</tr>";
			}
			
			
		
	
	?>

</table>
