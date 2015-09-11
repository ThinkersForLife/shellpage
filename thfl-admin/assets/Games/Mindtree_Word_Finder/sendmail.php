<?php
session_start();/**/

 //$hashtag=$_SESSION["hashtag"];
 //$email = $_REQUEST['email']; 
 $QuizResults = $_REQUEST['QuizResults'];

 $Replace = "\\\""; 
 $QuizResults = str_replace($Replace, "", $QuizResults); 
 //mail( "naveen@thefullerlife.com", "Quiz Name", $QuizResults, "From:  Quiz Name" );
 $myFile = "miniData.csv";
 $fh = fopen($myFile, 'a') or die("can't open file");
 $stringData = $QuizResults;
 fwrite($fh, $stringData);
 $stringData = "\n";
 fwrite($fh, $stringData);
 fclose($fh);

 $latestFile = "latest.txt";
 $fh2 = fopen($latestFile, 'w') or die("can't open file");
 $quizData = $QuizResults;
 fwrite($fh2, $quizData);
 fclose($fh2);



     $lines = file('latest.txt');
     $tin = $lines[3];
//     echo "$tin<br /><br />";
	$headress = explode (",",$lines[1]);
     $ress = explode(",",$tin);

//Status, Raw Score, Passing Score, Max Score, Min Score, Time
//$query = "UPDATE birthdays SET $ohgod WHERE slno = '$id' LIMIT 1";

 //    $query = "UPDATE $table SET status = '$ress[0]' , rawScr = '$ress[1]' , passScr = '$ress[2]', maxScr = '$ress[3]' , minScr = '$ress[4]' , time= '$ress[5]', jic = '$tin' WHERE hashtag='$hashtag' LIMIT 1" ;




$hashtag=$_SESSION["hashtag"];

$Score = $ress[1];
$secs = time() - $_SESSION["time"];
$secs = $ress[5] ;


$_SESSION["rawScr"] = $Score;
$_SESSION["time"] = $secs;

//header("Location: ../../../model/log_result.php");
//exit();

?>
<script type="text/javascript">
parent.location = '../../../model/log_result.php';
</script>
