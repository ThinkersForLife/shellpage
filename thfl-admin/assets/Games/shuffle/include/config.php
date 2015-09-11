<?php
 ob_start();
## Database Details Username Password dB Name
  $hostName = "localhost";
  $databaseName = "thinker6_shuffle";
  $userName = "thinker6_shuffle";
  $passWord = "shuffle@#01";
  $table = "mg2";
  $actname = "Shuffle";

// Form Fields to capture

  $fields = array (
		
		'name' => "Name:",
		'email' => "Email ID:",
		
		
		);

  $formMsg = "";


// Information to capture Index page
  
  $introtext = "<h3>Welcome to 'The Shuffle',</h3>
<p>What is shuffle you ask?</p>
<p>Shuffle [<i>shuhf-uhl</i>]: <br />
1. <i>v.</i> A memory game on popular culture.<br /></p>
<p>Sentence usage:<br />
'I played the <u>shuffle</u> and now I am the top scorer!'
</p>
<p><b>How Shuffle works:</b>
A stack of 20 closed culture cards are placed on your screen. Open them one at a time and find the 10 hidden pairs. The number of clicks and 

time you take determines your awesomeness level.</p>
Example: 
  <img src='media/Box.jpg' style=\"border:2px solid #F7921E; margin:5px;vertical-align:middle; width:120px;height:120px;\" />  <img 

src='media/X.jpg' style=\"border:2px solid #F7921E;margin:5px;vertical-align:middle;width:120px; height:120px;\"/>
  <br />
 
<p> All the best.<br />
</p>";
  //$addr = "";
  


// Game Info and Msgs
  $gamename = " Shuffle | Pop Vulture  | Defining Indian Pop Culture Since 1411";
  $gameMsg = "<br /> Please hit the 'I'm done! Send me my score' button at the end of the quiz!";
  $gwidth = "720";
  $gheight = "480";
  

//Result Page

  $endMsg = "Thanks for participating yaar! We'll let you know if you've won :)";
  $reURL = "http://www.facebook.com/p0pvulture";


//  $table = "miniData";
?>
