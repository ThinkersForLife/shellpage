<div id="maincolumn" class="col-lg-8 col-md-8 col-lg-offset-2 centered">
<?php
//error_reporting(-1);
//ini_set('display_errors', 'On');
session_start();
include_once("../../../thfl-admin/model/functions.php");

$table = "4pics1";

//Getting the serial number of last inserted pic.
//				 NEW CODE by Jay: 2 May 2015, 10:01 AM
$mslno=getLastWordDetails($table);

//Mechanism to reset of increment the current word
if(!isset($_SESSION['serial'])){		
		$_SESSION['serial'] = 1 ;
		$_SESSION['score'] = 0 ;
}elseif($_SESSION['serial'] >= $mslno ){
		//$_SESSION['hash']		=	time();
		$_SESSION['replay']	=	true;
		unset($_SESSION['serial']);
}
elseif(isset($_POST["submit"])) {
//		echo $_SESSION['serial'];exit(); 
}
else {
			$_SESSION['serial']  =	$_SESSION['serial']+1 ;
}

$serial = $_SESSION['serial'];


if($_GET['num']) {
		$serial = $_GET['num'];
}

//echo "<font color='white'>serial after get:".$serial."</font>";

//Get word details from serial no
// 									NEW CODE BY Jay: 2 May,2015 10:09 AM
$get_word_details=getWordDetails($serial,$table);
$word=$get_word_details[0]['word'];
$folder=$get_word_details[0]['slno']."/";


		// check if submit is set
		if($_POST["submit"] == "Send Answer") {

			
		}
		else {
			// generation of the shuffled letter and the word
			$alphas = range('A', 'Z');
			$_SESSION['time1'] = time();
			shuffle($alphas);

			$lc = strlen($word);
			$dif = 14 - $lc;
			$warry = str_split($word);
			$letters = array_slice($alphas, 0, $dif);
			$result = array_merge($warry,$letters);
	
			shuffle($result);

			// Display the letter boxes in a list
			if(isset($_SESSION['replay']) && $_SESSION['replay']==true){ ?>

							<div id="final-screen">	
								<script>	
											jQuery("#game-score-bar").css("display","none");
											document.getElementById("game-score-bar").style.display="none";
								</script>
								Score: <?php echo $_SESSION['maxScr']==0?"0":$_SESSION['maxScr']; ?><br />
								Time: <?php echo $_SESSION['gameTime']==0?"0":$_SESSION['gameTime']; ?> Seconds<br />
								<a onclick="window.location.reload();" href="">Click here to REPLAY the game</a><br />
							</div>

			<?php

							$_SESSION['hash']=hash("md5",time());
							$sql_query="INSERT INTO ".RESULT_TABLE." SET name='".$_SESSION['visitor_name']."', email='".$_SESSION['visitor_email']."', companyName='".$_SESSION['company_name']."', location='".$_SESSION['visitor_location']."',quizName='Word It',hashtag='".$_SESSION['hash']."'";
							runQuery($sql_query);
							unset($_SESSION['maxScr']);
							unset($_SESSION['replay']);
							unset($_SESSION['score']);
							unset($_SESSION['gameTime']);

			}else{
			echo '<div id="finish-message"></div>
							<div style="width:100%;"> 
									<p id="instruction-text">
										<u id="instruction-word">Instructions:</u>  Just click on a letter to select.
									</p>
							</div> 
						<div id="pics">
							<div id="wrapper">
								<img src="themes/assets/pics/'. $folder.'1.jpg" alt="1" id="image1" />
							</div>
							<div id="wrapper">
								<img src="themes/assets/pics/'. $folder.'2.jpg" alt="2" id="image2" />
							</div> 
							<div id="wrapper">
								<img src="themes/assets/pics/'. $folder.'3.jpg" alt="3" id="image3" />
							</div> 
							<div id="wrapper">
								<img src="themes/assets/pics/'. $folder.'4.jpg" alt="4" id="image4" />
							</div>
						</div>  
				
						<div class="text">
							<div class="listBlock">
							   <ul style="-moz-user-select: none; min-height: 30px;" unselectable="on" id="sortable1" class="droptrue ui-sortable">';
								//echo each letter in the jumbled list
								foreach($result as $let){
									echo '<li style="opacity: 1;" class="ui-state-default" id="'.$let.'">'.$let.'</li>';
									}

								echo '	</ul>
							</div>
						
							<br>
					
							<div class="listBlock2">		
						
								<ul unselectable="on" id="sortable2" class="droptrue ui-sortable">
						
								</ul>
							</div>
					
							<div style="clear:both;"></div>
							

							<div style="float:left;"> 

										<h3>	
												
		 										<span style="" class="hint" style="font-size:8px;"> Hint: ' . $lc . ' letters</span>&nbsp;&nbsp;
												<font class="otherText">Your Word: <span id="disWord"></span></font>
										</h3>

							</div> 
							
							<div style="">
					
								<p>
						
									<form action="#" method="post" enctype="" id="quadnationForm" style="float:right;" >
										<input id="postOrder" name="Letters" size="30" type="hidden">
										<input type="submit" name="submit" value="Send Answer" />
										<!-- <button class="butt playAgain">SKIP IT!</button> -->
						    	</form>
						
								</p>
				
							</div>
					
							<div style="clear:both;"></div>


							<br /><br />




						<div style="clear:both;"></div>
				
					</div>
				  


		'; } } ?>
		    </div>
