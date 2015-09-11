<?php
session_start();
$_SESSION['time']=time();
if(!isset($_SESSION['isLoggedIn']) && $_SESSION['isLoggedIn']!=true) {  
	echo "You are not allowed to view this page!";exit();
}

//echo getcwd();
$xml=simplexml_load_file("../../thfl-admin/config.xml");

if($xml===FALSE)
	$xml=simplexml_load_file("config.xml");

if($xml===FALSE)
	$xml=simplexml_load_file("../../../thfl-admin/config.xml");

if($xml===FALSE)
	$xml=simplexml_load_file("thfl-admin/config.xml");

$dir 				=  	dirname($_SERVER['PHP_SELF']);
$dirs 			= 	explode('/', $dir);
$base_path	=		"/".$dirs[1]."/".$dirs[2]."/".$dirs[3]."/thfl-admin/assets/Games/".$xml->Configuration->Activity."/";
//ini_set("include_path","thfl-admin/assets/Games/".$xml->Configuration->Activity."/");

//echo getcwd();
?>
<!DOCTYPE html>
<html>
<head>
			<meta charset="utf-8">
			<title>Morpheus - ThFL</title>
<!--			<base href="<?php echo $base_path; ?>" target="_self"/>	-->

			<!-- Bootstrap Core CSS -->
			<link href="thfl-admin/assets/Games/<?php echo $xml->Configuration->Activity; ?>/style/bootstrap.min.css" rel="stylesheet">


			<link rel="stylesheet" href="thfl-admin/assets/Games/<?php echo $xml->Configuration->Activity; ?>/style/jquery-ui.css">
			<link href="thfl-admin/assets/Games/<?php echo $xml->Configuration->Activity; ?>/style/main.css" rel="stylesheet" type="text/css">

			<link href="thfl-admin/assets/Games/<?php echo $xml->Configuration->Activity; ?>/style/animate.css" rel="stylesheet" type="text/css">
			<link rel="shortcut icon" href="favicon.ico">
			<link rel="apple-touch-icon" href="meta/apple-touch-icon.png">
			<meta name="apple-mobile-web-app-capable" content="yes">

			<meta name="HandheldFriendly" content="True">
			<meta name="MobileOptimized" content="320">
			<meta name="viewport" content="width=device-width, target-densitydpi=160dpi, initial-scale=1.0, maximum-scale=1, user-scalable=no, minimal-ui">

			<script src="thfl-admin/assets/Games/<?php echo $xml->Configuration->Activity; ?>/js/jquery-1.10.2.min.js"></script>

			<link rel="apple-touch-icon" sizes="57x57" href="img/favicon/apple-icon-57x57.png">
			<link rel="apple-touch-icon" sizes="60x60" href="img/favicon/apple-icon-60x60.png">
			<link rel="apple-touch-icon" sizes="72x72" href="img/favicon/apple-icon-72x72.png">
			<link rel="apple-touch-icon" sizes="76x76" href="img/favicon/apple-icon-76x76.png">
			<link rel="apple-touch-icon" sizes="114x114" href="img/favicon/apple-icon-114x114.png">
			<link rel="apple-touch-icon" sizes="120x120" href="img/favicon/apple-icon-120x120.png">
			<link rel="apple-touch-icon" sizes="144x144" href="img/favicon/apple-icon-144x144.png">
			<link rel="apple-touch-icon" sizes="152x152" href="img/favicon/apple-icon-152x152.png">
			<link rel="apple-touch-icon" sizes="180x180" href="img/favicon/apple-icon-180x180.png">
			<link rel="icon" type="image/png" sizes="192x192"  href="img/favicon/android-icon-192x192.png">
			<link rel="icon" type="image/png" sizes="32x32" href="img/favicon/favicon-32x32.png">
			<link rel="icon" type="image/png" sizes="96x96" href="img/favicon/favicon-96x96.png">
			<link rel="icon" type="image/png" sizes="16x16" href="img/favicon/favicon-16x16.png">
			<link rel="manifest" href="img/favicon/manifest.json">
			<meta name="msapplication-TileColor" content="#ffffff">
			<meta name="msapplication-TileImage" content="img/favicon/ms-icon-144x144.png">
			<meta name="theme-color" content="#ffffff">

			</head>
<body>
		<!--		Information Dialog		-->
		<div id="dialog" title="How to play?">
			<h3><b>How do i play it? :</b></h3>
			<ul id="arrow-key">
				<li>Use the arrow keys to move the blocks around.</li>
				<li>Combine similar blocks to unlock a new block.</li>
			</ul>
			<h3><b>Aim of the game :</b></h3>
			<p>
				Find out the final item by unlocking all the other blocks in your way.
			</p>			
		</div>

		<!--		Leaderboard Dialog		-->
		<div id="leaderboard-dialog" title="Leaderboard">

		</div>

		<!--	Information Icon		-->
		<div id="game-info">
			<a id="opener">
				<span class="glyphicon glyphicon-info-sign"></span>
			</a>&nbsp;&nbsp;
			<a id="leaderboard-opener">
				<span class="glyphicon glyphicon-stats"></span>
			</a>
		</div>

  <div class="container">

	
    <div class="header">

		    <div class="heading">
		      <!--<h1 class="title">Morpheus</h1>-->
		      <div class="scores-container">
		        <div class="score-container">0</div>
		        <div class="best-container">0</div>
		      </div>

		    </div>

	      <p class="game-intro">Find the next  <strong>iPhone X</strong></p>

    </div>
		

		<!---	 Message Space	--->
		<div id="tile-info" class="alert-box success"><span id="tile-message">Interesting Facts about iPhone 1:  </span><br /><span id="tile-facts"> When the iPhone was first released in markets on 29 June, 2007, it sold 1 million pieces in a mere 74 days.
</span></div>

<div id="progressbar">
<div></div>
</div>

<!--
    <p class="game-explanation">

			<img src="img/iPhone/Iphone-1.jpg" width="64px" height="64px" id="2" class="current-game-image"/>	
			<img src="img/iPhone/iphone-3g.jpg" width="64px" height="64px" id="4"/>	
			<img src="img/iPhone/Iphone-3gs.jpg" width="64px" height="64px" id="8"/>	
			<img src="img/iPhone/Iphone-4.jpg" width="64px" height="64px" id="16"/>	
			<img src="img/iPhone/Iphone-4s.jpg" width="64px" height="64px" id="32"/>	
			<img src="img/iPhone/Iphone-5.jpg" width="64px" height="64px" id="64"/>
			<img src="img/iPhone/Iphone-5c.jpg" width="64px" height="64px" id="128"/>		
			<img src="img/iPhone/Iphone-5s.jpg" width="64px" height="64px" id="256"/>		
			<img src="img/iPhone/Iphone-6.jpg" width="64px" height="64px" id="512"/>		
			<img src="img/iPhone/8izKy5kbT.png" width="64px" height="64px" id="1024"/>		
    </p>
-->

    <div class="game-container">
      <div id="vegeta-scouter">
<!--        <img src="img/scouter.png" >-->
<!--        <div id="scouter-deco"><div id="scouter-deco-arrow-left" class="blink">◀</div><div id="scouter-deco-arrow-right" class="blink">▶</div><div id="scouter-deco-arrow-down" class="blink">▼</div><div id="scouter-deco-circle">○</div></div>-->
				<div id="scouter-score">0</div>
      </div>

      <div class="game-message">
        <p></p><br />
        <div class="lower">
          <!--<a class="keep-playing-button">Keep Playing</a>-->
          <a class="retry-button">Restart</a><br />
        </div>
      </div>

      <div class="grid-container">
        <div class="grid-row">
          <div class="grid-cell"></div>
          <div class="grid-cell"></div>
          <div class="grid-cell"></div>
          <div class="grid-cell"></div>
        </div>
        <div class="grid-row">
          <div class="grid-cell"></div>
          <div class="grid-cell"></div>
          <div class="grid-cell"></div>
          <div class="grid-cell"></div>
        </div>
        <div class="grid-row">
          <div class="grid-cell"></div>
          <div class="grid-cell"></div>
          <div class="grid-cell"></div>
          <div class="grid-cell"></div>
        </div>
        <div class="grid-row">
          <div class="grid-cell"></div>
          <div class="grid-cell"></div>
          <div class="grid-cell"></div>
          <div class="grid-cell"></div>
        </div>
      </div>

      <div class="tile-container">

      </div>

    </div>

  </div>

	<input type="hidden" id="activity_name" value="<?php echo $xml->Configuration->Activity; ?>" />

	<script src="thfl-admin/assets/Games/<?php echo $xml->Configuration->Activity; ?>/js/jquery-1.10.2.min.js"></script>
  <script src="thfl-admin/assets/Games/<?php echo $xml->Configuration->Activity; ?>/js/jquery.cookie.js"></script>
  <script src="thfl-admin/assets/Games/<?php echo $xml->Configuration->Activity; ?>/js/jquery-ui.js"></script>
  <script src="thfl-admin/assets/Games/<?php echo $xml->Configuration->Activity; ?>/js/classlist_polyfill.js"></script>
  <script src="thfl-admin/assets/Games/<?php echo $xml->Configuration->Activity; ?>/js/animframe_polyfill.js"></script>
  <script src="thfl-admin/assets/Games/<?php echo $xml->Configuration->Activity; ?>/js/keyboard_input_manager.js"></script>
  <script src="thfl-admin/assets/Games/<?php echo $xml->Configuration->Activity; ?>/js/html_actuator.js"></script>
  <script src="thfl-admin/assets/Games/<?php echo $xml->Configuration->Activity; ?>/js/grid.js"></script>
  <script src="thfl-admin/assets/Games/<?php echo $xml->Configuration->Activity; ?>/js/tile.js"></script>
  <script src="thfl-admin/assets/Games/<?php echo $xml->Configuration->Activity; ?>/js/local_score_manager.js"></script>
  <script src="thfl-admin/assets/Games/<?php echo $xml->Configuration->Activity; ?>/js/game_manager.js"></script>
  <script src="thfl-admin/assets/Games/<?php echo $xml->Configuration->Activity; ?>/js/application.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="thfl-admin/assets/Games/<?php echo $xml->Configuration->Activity; ?>/js/bootstrap.js"></script>

    <!-- Bootstrap Notify -->
    <script src="thfl-admin/assets/Games/<?php echo $xml->Configuration->Activity; ?>/js/bootstrap-notify.js"></script>

	 <script>
  $(function() {

	$("body").click(function(e){	

			if(e.target.tagName!="SPAN"){	
					$( "#dialog" ).dialog( "close" );
					$( "#leaderboard-dialog" ).dialog( "close" );
			}

	});

	var xmlhttp		=	new XMLHttpRequest();
	xmlhttp.open("POST","thfl-admin/assets/Games/"+document.getElementById("activity_name").value+"/log_result.php",false);
	xmlhttp.setRequestHeader("Content-type","application/x-www-form-urlencoded");
	xmlhttp.send("getResult=true");

	var response	=	xmlhttp.responseXML;	//console.log("xmlhttp.responseXML  "+xmlhttp.responseXML); RETURNS NULL
	response	=	xmlhttp.responseText;	//console.log("xmlhttp.responseText  "+xmlhttp.responseText); WORKS PERFACTLY

	document.getElementById("leaderboard-dialog").innerHTML=response;
					
					$( "#dialog" ).dialog({
									autoOpen: false,
									show: {
										effect: "bounce",
										duration: 1000
									},
									hide: {
										effect: "clip",
										duration: 1000
									}
					});

					$( "#leaderboard-dialog" ).dialog({
									autoOpen: false,width:300,
									show: {
										effect: "bounce",
										duration: 1000
									},
									hide: {
										effect: "clip",
										duration: 1000
									}
					});
			 		
					$( "#opener" ).click(function() {
									$( "#dialog" ).dialog( "open" );
					});
			 		
					$( "#leaderboard-opener" ).click(function() {
									$( "#leaderboard-dialog" ).dialog( "open" );
					});

					$.cookie("maxTileValue",2);

					$.notify({
											// options
											message: "Congratulations! You've just unlocked iPhone 1"
										},{
											// settings
											type: 'info',
											newest_on_top: true,delay:1000,
											animate: 
											{
												enter: 'animated bounceInDown',
												exit: 'animated bounceOut'
											},										
											template: '<div id="wrapper"><div data-notify="container" class="col-xs-11 col-sm-3 alert alert-{0}" role="alert" id="notify-container">' +
														'<img data-notify="icon" class="img-circle pull-left">' +
														'<span data-notify="title">{1}</span>' +
														'<span data-notify="message">{2}</span>' +
													'</div></div>'
						});

					$( "#progressbar" ).progressbar({
								value: 10,
								max: 90
					});
  });
  </script>

</body>
</html>
