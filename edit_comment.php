<?php

	function updateComment($send_tekst, $send_email){
		
		$mysqli = new mysqli($GLOBALS["servername"], $GLOBALS["server_username"], $GLOBALS["server_password"], $GLOBALS["database"]);
		echo $mysqli->error;
		$stmt = $mysqli->prepare("INSERT INTO eksam_comment (user_id, text, send_email) VALUES (?,?,?)");
		$stmt->bind_param("iss", $_SESSION["id_from_db"], $send_tekst, $send_email);
		
		// kas ơnnestus salvestada
		if($stmt->execute()){
			// ơnnestus
			echo "jeeee";
		}
		
		
		$stmt->close();
		$mysqli->close();
		
		
	}
	
	
?>