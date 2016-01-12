<?php
	require_once("functions.php");
	
	if(!isset($_SESSION["id_from_db"])){
		header("Location: login.php");
	}
	
	if(isset($_GET["logout"])){
		session_destroy();
		
		header("Location: login.php");
	}
	
	
	
	$send_answ = "";
	$send_answ_error = "";


// *********************
    if(isset($_POST["salvesta2"])){

			if ( empty($_POST["send_answ"]) ) {
				$send_answ_error = "See v�li on kohustuslik";
				}else{
					$send_answ = cleanInput($_POST["send_answ"]);
				}
			

			if(	$send_answ_error == "" ){
				echo $send_answ;
				
				// functions.php failis k�ivina funktsiooni
				// msq on message funktsioonist mis tagasi saadame
				$msg = updateComment($send_answ);
			
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
  	<input name="send_answ" type="text" placeholder="send_answ" value="<?php echo $send_answ; ?>"> <?php echo $send_answ_error; ?><br><br>
  	<input type="submit" name="salvesta2" value="Log in">
  </form>
  
  
  </form>
</body>
</html>