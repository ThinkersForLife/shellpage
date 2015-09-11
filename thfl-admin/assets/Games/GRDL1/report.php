<?php
session_start();/**/

?>




<center><div id='msg'>
		
		</div></center>
		<?php
	$status = $_SESSION["status"];
	$raw = $_SESSION["rawScr"];
	$pass = $_SESSION["passScr"];
	$max = $_SESSION["maxScr"];
	$min = $_SESSION["minScr"];
	$timex = $_SESSION["time"];

echo "<h1>Hi " .$_SESSION["user"] . ",</h1><h2><br /> Your score: $raw </h2><br />" ;
		
		?>
	<h2><? echo $endMsg ; ?></h2>	
		
<br /><br />
<center><a href=<? echo $reURL; ?> ><img src="media/<? echo $teaser; ?>" /></a></center>

</div>
</body>
</html>

<?php

// if the user is logged in, unset the session
/* */
if (isset($_SESSION['ur_logged'])) {
	unset($_SESSION['ur_logged']);
	unset($_SESSION["hashtag"]);
	unset($_SESSION["user"]);
	unset($_SESSION["email"]);
	$_SESSION = array();
}

?>
