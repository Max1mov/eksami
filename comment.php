<?php
	require_once("functions.php");
	
	if(!isset($_SESSION["id_from_db"])){
		header("Location: login.php");
	}
	
	if(isset($_GET["logout"])){
		session_destroy();
		
		header("Location: login.php");
	}
	
	
	
	$send_tekst = "";
	$send_email = "";
	$send_tekst_error = "";
	$send_email_error = "";


// *********************
    if(isset($_POST["salvesta"])){

			if ( empty($_POST["send_email"]) ) {
				$send_email_error = "See v�li on kohustuslik";
			}else{
				$send_email = cleanInput($_POST["send_email"]);
			}

			if ( empty($_POST["send_tekst"]) ) {
				$send_tekst_error = "See v�li on kohustuslik";
				}else{
					$send_tekst = cleanInput($_POST["send_tekst"]);
				}
			

			if(	$send_tekst_error == "" && $send_email_error == ""){
				echo "andmed! ".$send_email." ja parool on ".$send_tekst;
				
				// functions.php failis k�ivina funktsiooni
				// msq on message funktsioonist mis tagasi saadame
				$msg = updateComment( $send_tekst, $send_email);
			
				if($msg != ""){
				//salvestamine �nnestus
				// teen t�hjaks input value'd
				$post_tech = "";
								
				echo $msg;
			}

    } // create if end
}
	
// funktsioon, mis eemaldab k�ikv�imaliku �leliigse tekstist
  function cleanInput($data) {
  	$data = trim($data);
  	$data = stripslashes($data);
  	$data = htmlspecialchars($data);
  return $data;
  }


	
?>




<p>
	Tere, <?=$_SESSION["user_email"];?>
	<a href="?logout=1"> Logi v�lja</a>
</p>
<?php require_once("menu.php"); ?>



<!DOCTYPE html>
<html>
<body style="background-color:lightgrey;">


   
   <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="post" >
  	<input name="send_email" type="email" placeholder="send_email" value="<?php echo $send_email; ?>"> <?php echo $send_email; ?><br><br>
  	<input name="send_tekst" type="text" placeholder="send_tekst" value="<?php echo $send_tekst; ?>"> <?php echo $send_tekst_error; ?><br><br>
  	<input type="submit" name="salvesta" value="Log in">
  </form>
  
  
  </form>
</body>
</html>