

<?php // Starting the session to track the latest word
session_start();

include_once("../../../thfl-admin/model/functions.php");

$table = "4pics1";

//Getting the serial number of last inserted pic.
//				 NEW CODE by Jay: 2 May 2015, 10:01 AM
$mslno=getLastWordDetails($table);

$serial = $_SESSION['serial'];
if($_GET['num']) {
		$serial = $_GET['num'];
}

//Get word details from serial no
// NEW CODE BY Jay: 2 May,2015 10:09 AM
$get_word_details=getWordDetails($serial,$table);
$word=$get_word_details[0]['word'];
$folder=$get_word_details[0]['slno']."/";
// scoring if right or wrong

if(isset($_SESSION['replay']) && $_SESSION['replay']==true){
	echo "Game over";
}
else if($_POST["submit"] == "Send Answer") {
				
				$_SESSION['isLoggedIn']=true;

				if(isset($_POST['visitor_email']) && strcmp($_POST['visitor_email'],"")!=0 && strcmp($_POST['visitor_email'],"underfined")!=0){
					$_SESSION['visitor_email']=$_POST['visitor_email'];	
				}
				if(isset($_POST['visitor_name']) && strcmp($_POST['visitor_name'],"")!=0  && strcmp($_POST['visitor_name'],"underfined")!=0){
					$_SESSION['visitor_name']=$_POST['visitor_name'];	
				}
				if(isset($_POST['visitor_location']) && strcmp($_POST['visitor_location'],"")!=0  && strcmp($_POST['visitor_location'],"underfined")!=0 ){
					$_SESSION['visitor_location']=$_POST['visitor_location'];	
				}

				$_SESSION['time1'] = time() - $_SESSION['time1'];

				if($_POST["Letters"] == $word ){		
							
									$_SESSION['score'] =	0;
	
									if($_SESSION['time1'] < 20){
													$_SESSION['score'] = $_SESSION['score'] + 10 ;	
									}
									elseif($_SESSION['time1'] > 20 && $_SESSION['time1'] < 40){
													$_SESSION['score'] = $_SESSION['score'] + 8	;
									}
									elseif($_SESSION['time1'] > 40 && $_SESSION['time1'] < 60){
													$_SESSION['score'] = $_SESSION['score'] + 6	;
									}
									elseif($_SESSION['time1'] > 60 && $_SESSION['time1'] < 90){
													$_SESSION['score'] = $_SESSION['score'] + 4	;
									}	
									elseif($_SESSION['time1'] > 90 && $_SESSION['time1'] < 120){
													$_SESSION['score'] = $_SESSION['score'] + 2	;
									}

									$_SESSION['word'] = $word ;
									$_SESSION['score'] = $_SESSION['score'] + 10;	
									$_SESSION['maxScr']+=$_SESSION['score'];

									$result= " <br /><br /><h4><strong style='color:#72BB45;font-size:20px;'>Woot woot! Right answer!: $word got you ".$_SESSION['score'] ." points in  ".$_SESSION['time1']." seconds</strong></h4><div style='clear:both;'></div><br />";

									$result.='<div id="pics" >
									<div class="imgbox"><img src="themes/assets/pics/'. $folder.'1.jpg" alt="1" /> <img src="themes/assets/pics/'. $folder.'2.jpg" alt="2" /> <img src="themes/assets/pics/'. $folder.'3.jpg" alt="3" /> <img src="themes/assets/pics/'. $folder.'4.jpg" alt="4" /></div>
									</div><br /><br /><div style="float:center;" ><button class="butt playAgain" >Next...!</button></div>
																	
									';

									$status='passed';
				
				}else{
		
									$_SESSION['score']=0;		
						
									$result= "<br /><br /><h4><strong style='color:red;'>Whoops! Wrong answer!  : (</strong></h4> 
									<h4 style='color:#71a420'> The answer: $word</h4>									
									<div style='clear:both;'></div>";
									$result.='<div id="pics" >
									<img src="themes/assets/pics/'. $folder.'1.jpg" alt="1" /> <img src="themes/assets/pics/'. $folder.'2.jpg" alt="2" /> <img src="themes/assets/pics/'. $folder.'3.jpg" alt="3" /> <img src="themes/assets/pics/'. $folder.'4.jpg" alt="4" />
									</div><br /><br /><div style="float:center;"><button class="butt playAgain">Next...!</button></div>
																	
									';

									$status='failed';		

				}

				$edate=time();	
				$hashtag=$_SESSION['hash'];
				$name=$_SESSION['visitor_name'];
				$email=$_SESSION['visitor_email'];
				$location=$_SESSION['visitor_location'];
				$quizName='Quadnation';
				$userAns=$_POST['Letters'];
				$correctAns=$word;
				$rawScr=$_SESSION['score'];
				$gameTime=$_SESSION['time1'];
				$passScr=0;
				$maxScr=0;
				$minScr=0;
				$totalGameTime="";
				$totalScr="";
				$jic="jic";

				$user_result=getResult("getResultforSubmit",$_SESSION['visitor_email']);	
				
				$user_result=$user_result[0];

				$user_scores=explode(",",$user_result['rawScr']);
				$user_scores[]=$_POST['rawScr'];
				$maxScr=max($user_scores);
				$minScr=min($user_scores);

				$totalGameTime=array_sum(explode(",",$user_result['gameTime']));
				$totalScr=array_sum(explode(",",$user_result['rawScr']));

				$totalGameTime	+=		$gameTime;
				$totalScr				+=		$rawScr;

				//Saves the result in the database
				//					NEW CODE BY Jay : 2 May, 2015 11:00 AM
//				$add_result=addResult($edate,$name,$email,$location,$quizName,$userAns,$correctAns,$status,$rawScr,$gameTime,$passScr,$maxScr,$minScr,$time,$jic,$hashtag);
		
				//Updates the row in the RESULT_TABLE
				//					NEW CODE BY Jay : 19 May, 2015 7:20 AM
				$update_result=updateResult($edate,$name,$email,$location,$quizName,$userAns,$correctAns,$status,$rawScr,$gameTime,$passScr,$maxScr,$minScr,$totalGameTime,$totalScr,$jic,$hashtag);	
			
				$_SESSION['time1']=time();
				//Mechanism to reset of increment the current word
				if(!isset($_SESSION['serial'])){		
						$_SESSION['serial'] = 1 ;
						$_SESSION['score'] = 0 ;
				}elseif($_SESSION['serial'] >= $mslno ){
						$_SESSION['replay']	=	true;
				}
				else {
						$_SESSION['gameTime']=	$_SESSION['gameTime']	+	$gameTime;
				}

}
echo '<div id="maincolumn" class="col-lg-8 col-md-8 col-lg-offset-2 centered">';
echo $result;
echo '<br /><br /><br /></div> ';
?>


