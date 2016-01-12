<?php

	function updateComment($send_tekst, $send_email){
		
		$mysqli = new mysqli($GLOBALS["servername"], $GLOBALS["server_username"], $GLOBALS["server_password"], $GLOBALS["database"]);
		echo $mysqli->error;
		$stmt = $mysqli->prepare("INSERT INTO eksam_comment (user_id, text, send_email) VALUES (?,?,?)");
		$stmt->bind_param("iss", $_SESSION["id_from_db"], $send_tekst, $send_email);
		
		// kas õnnestus salvestada
		if($stmt->execute()){
			// õnnestus
			echo "jeeee";
		}
		
		
		$stmt->close();
		$mysqli->close();
		
		
	}
	
	function answComment(){
		
			$mysqli = new mysqli($GLOBALS["servername"], $GLOBALS["server_username"], $GLOBALS["server_password"], $GLOBALS["database"]);
			
			$stmt = $mysqli->prepare("SELECT comment_id, user_id, text FROM eksam_comment WHERE send_email = ?");
			$stmt->bind_param("s", $_SESSION["user_email"]);
			$stmt->bind_result($comment_id, $id_mail, $text);
			$stmt->execute();

			
			// tühi massiiv kus hoiame objekte (1 rida andmeid)
			$array = array();
			
			// tee tsüklit nii mitu korda, kui saad 
			// ab'ist ühe rea andmeid
			while($stmt->fetch()){
				
				// loon objekti iga while tsükli kord
				$mail = new StdClass();
				$mail->comment_id = $comment_id;
				$mail->id_mail = $id_mail;
				$mail->text = $text;
				
				// lisame selle massiivi
				array_push($array, $mail);
				//echo "<pre>";
				//var_dump($array);
				//echo "</pre>";
				
			}
			
			$stmt->close();
			$mysqli->close();
			
			return $array;
	}
	
		
	
?>