<?php 
//error_reporting(-1);
//ini_set('display_errors', 'On');
session_start();
if(isset($_GET['logout'])){
    session_unset();
    session_destroy();	
		header("Location: ".$_SERVER["HTTP_REFERER"]);exit();
}
include_once("thfl-admin/model/functions.php");
$xml=simplexml_load_file("thfl-admin/config.xml") or die("Error: Cannot load configuration file");

$demo_games_configuration['home_title']=$xml->Configuration->HomePageTitle;
$demo_games_configuration['home_page_image']=$xml->Configuration->HomeBackgroundImage;
$demo_games_configuration['home_tagline']=$xml->Configuration->HomePageDescription;
$demo_games_configuration['games_title']=$xml->Configuration->GamesPageTitle;
$demo_games_configuration['games_description']=$xml->Configuration->GamesPageDescription;
$demo_games_configuration['game_page_button_text']=$xml->Configuration->GamesPageButtonText;
$demo_games_configuration['game_page_button_link']=$xml->Configuration->GamesPageButtonLink;
$demo_games_configuration['result_title']=$xml->Configuration->ResultPageTitle;
$demo_games_configuration['result_description']=$xml->Configuration->ResultPageDescription;
$demo_games_configuration['result_page_button_text']=$xml->Configuration->ResultPageButtonText;
$demo_games_configuration['result_page_button_link']=$xml->Configuration->ResultPageButtonLink;
$demo_games_configuration['contact_title']=$xml->Configuration->ContactPageTitle;
$demo_games_configuration['address_line_1']=$xml->Configuration->AddressLine1;
$demo_games_configuration['address_line_2']=$xml->Configuration->AddressLine2;
$demo_games_configuration['city_state']=$xml->Configuration->CityState;
$demo_games_configuration['phone']=$xml->Configuration->Phone;
$demo_games_configuration['email']=$xml->Configuration->Email;
$demo_games_configuration['email_domain']=$xml->Configuration->EmailDomain;
$demo_games_configuration['location']=$xml->Configuration->Location;
$demo_games_configuration['activity']=$xml->Configuration->Activity;
$demo_games_configuration['domain']=$xml->Configuration->Domain;
$demo_games_configuration['tracking_code']=$xml->Configuration->TrackingCode;
$demo_games_configuration['header_logo']=$xml->Configuration->HeaderLogo;
$demo_games_configuration['footer_description']=$xml->Configuration->FooterDescription;
$demo_games_configuration['footer_title']=$xml->Configuration->FooterTitle;
//require_once "themes/assets/inc/start2.php";
//echo "<pre>";
//print_r($demo_games_configuration);
//exit();
?>
<!DOCTYPE html>
<html lang="en">
  <head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta name="description" content="">
	<meta name="author" content="nissim" >
	<link rel="shortcut icon" href="themes/assets/ico/favicon.png">

	<title><?php echo $demo_games_configuration["home_title"]; ?></title>


		<link href="themes/assets/css/animate.css" rel="stylesheet">

	<!-- Bootstrap core CSS -->
	<link href="themes/assets/css/bootstrap.css" rel="stylesheet">

	<!--  Zebra Form CUSTOM CSS	-->
	<link href="themes/assets/css/zebra_form.css" rel="stylesheet">

	<!-- load Zebra_Form's stylesheet file -->
	<link rel="stylesheet" href="themes/assets/lib/Zebra_Form-master/public/css/zebra_form.css">

	<!-- Custom styles for this template -->
	<link href="themes/assets/css/main.css" rel="stylesheet">

	<link rel="stylesheet" href="themes/assets/css/font-awesome.min.css">

	<script src="themes/assets/js/modernizr.custom.js"></script>

	<link href='http://fonts.googleapis.com/css?family=Oswald:400,300,700' rel='stylesheet' type='text/css'>
	<link href='http://fonts.googleapis.com/css?family=EB+Garamond' rel='stylesheet' type='text/css'>

	<link href='http://fonts.googleapis.com/css?family=Lora:700|Roboto:400,700' rel='stylesheet' type='text/css'>
	<link rel="stylesheet" type="text/css" href="themes/minimal-theme/style.css">
	<link rel="stylesheet" type="text/css" href="themes/assets/jQuery/jquery-ui-1.css">

	<script src="themes/assets/jQuery/jquery.min.js"></script>	
	<script src="themes/assets/jQuery/jquery-ui.min.js"></script>	
	<script src="themes/assets/js/jquery.bpopup.min.js"></script>	
	<!--[if lt IE 7] -->
	<script src="http://ie7-js.googlecode.com/svn/version/2.1(beta4)/IE7.js"></script>
	<!--[endif]-->

	<!--[if lt IE 8]>	-->
	<link href="themes/assets/css/bootstrap-ie7.css" rel="stylesheet">
	<!-- [endif]-->

	<!-- END QUADNATION SCRIPT -->

	<?php echo $demo_games_configuration['tracking_code']; ?>
  </head>

  <body data-spy="scroll" data-offset="0" data-target="#theMenu">

	<!-- Menu 
	<nav class="menu" id="theMenu">
		<div class="menu-wrap">
			<h1 class="logo"><a target="_blank" href="#">Embassy</a></h1>
			<i class="icon-remove menu-close"></i>
			<a href="#home" class="smoothScroll">Home</a>
			<a href="#games" class="smoothScroll">Game</a>
			<a href="#result" class="smoothScroll">Result</a>
			<a href="?logout=true" class="smoothScroll" id="logout" style="display:none;">Logout</a>	-->
<!--			<a href="#contact" class="smoothScroll">Contact</a>-->
<!--			<a href="#" target="_blank"><i class="icon-facebook"></i></a>
			<a href="#" target="_blank"><i class="icon-twitter"></i></a>
			<a href="#" target="_blank"><i class="icon-envelope"></i></a>
		</div>
		-->
		<!-- Menu button 
		<div id="menuToggle"><i class="icon-reorder"></i></div>
	</nav>
-->

	
	<!-- ========== HEADER SECTION ========== -->
	
		
            <!-- Element to pop up -->
		
	<section id="home" name="home"></section>
	<div id="headerwrap" style="background-image: url('themes/assets/uploads/<?php echo $demo_games_configuration['home_page_image']; ?>');">
		<div class="container">
			<div class="logo">
				<!--<img src="http://thinkersforlife.com/thfl_live/images/logo.png">-->
				<img src="themes/assets/uploads/<?php echo $demo_games_configuration['header_logo']; ?>" id="home-page-company-logo">
			</div>
			
			<div class="row">
						<h1><span id="home-page-heading"><?php echo $demo_games_configuration["home_title"]; ?></span></h1> <br />
					<h3>
						<a href="#games" class="smoothScroll" id="tagline">Give it a Try!<br />
						<span class="glyphicon glyphicon-chevron-down" aria-hidden="true"></span></a>
					</h3>
					
							<br /><br />
					<p>
						<input type="button" id="how-to-play-button" name="how-to-play-button" value="How to play" onclick="popup();"/>
						<div id="popup" style="left: 425.5px; position: absolute; top: 265px; z-index: 9999; opacity: 1; display: none;">
								<span class="button b-close"><span>X</span></span>
								<?php echo $demo_games_configuration["home_tagline"]; ?></p>
						</div>

				<div class="col-lg-3" style='width:100%;margin:0 auto;'>
					
				</div>
			</div>
		</div><!-- /container -->
	</div><!-- /headerwrap -->
	
	
	
	<!-- ========== GAME SECTION ========== -->
	
	<!--	NEW CODE by JAY		-->

	<section id="games" name="games">

		<div class="col-lg-8 col-md-8 col-lg-offset-2 centered" >
			<div id="game-score-bar" class="row"> 
			
				<div class="col-md-3" id="user-welcome">Welcome <span id="user-name" ></span>&nbsp;&nbsp;<a style="display:none;" href="?logout=true" id="logout"  title="Logout"><span class="glyphicon glyphicon-log-out"></span></a></div>
				<div class="col-md-3" id="user-serial" > </div>
				<div class="col-md-3" id="user-score-div">Score :<span id="user-high-score" >  </span> <br />Rank: <span id="user-rank"></span></div>
				<div class="col-md-3" >  &nbsp; <span id="stopwatch" >00:00:00</span></div>

			</div>
		</div>	

   	<div id="processingDiv" style='width:100%;display:table-cells;vertical-align:center;text-align:center;color:yellow;'>Processing...</div>

	<?php if(isset($_SESSION['isLoggedIn']) && $_SESSION['isLoggedIn']==true) {  
//	print_r($_SESSION);
	?>	

					<div id="contentwrapper" class="col-lg-8 col-lg-offset-2 centered" style='display:none;'>
					</div>
	
	<?php }else{ ?>

				<div id="contentwrapper" style='display:none;' class="col-lg-6 col-lg-offset-3 centered" >
		
        </div>
				<div id="loginDiv" style='display:none;'>
					<div class="row">
						<div class="col-md-3">
									<div id="loginMessage" style=''>
										<center>
										<form id="loginForm">
											<h2 style='color:white;font-weight:bold;'>Login</h2>
											<h3>Name</h3>
											<input type="text" name="visitor_name" id="visitor_name" class="" required="required" tabindex="1"/>
											<h3>Email ID</h3>
											<input type="email" name="visitor_email" id="visitor_email" class="" required="required" tabindex="2"/>
											<br />
											<h3>Company Name</h3>
											<input type="text" name="company_name" id="company_name" class="" required="required" tabindex="2"/>
											<br />
											<h3>Location </h3>
											<select data-placeholder="Choose your location..." class="chzn-select" style="width:250px;font-size:20px;" tabindex="4" id="visitor_location" name="visitor_location" required="required" tabindex="3">						
												<option value=""></option>

												<?php $location=explode("|",$demo_games_configuration['location']);
													for($i=0;$i<count($location);$i++){					
												 ?>
													<option value="<?= $location[$i] ?>"><?= $location[$i] ?></option>
												<?php } ?>
											</select> 
											<br /><br />
											<!--<a href="#games" class="smoothScroll"><button name="submit" id="submit" />Play Now!</button></a>-->
											<input type="submit" name="submit" id="submit" value="Play NOW !" tabindex="4"/>
										</form>
										</center>
									</div>
						</div>	
						<div class="col-md-3">
									Login with facebook
						</div>
					</div>
				</div><!-- loginDiv -->
	<?php } ?>

	<!--	END NEW CODE	-->

	</section>
	<!-- ========== RESULT SECTION ========== -->
	
	<section id="result" name="result" class="">
	
	<h3 class="result_title" align="center" style=''>
<?php echo $demo_games_configuration['result_title']; ?></h3>	
	<div id="resultBoard">
	
	</div>
		
	</section>

	<!-- ========== FOOTER SECTION ========== -->
	<section id="footer" name="footer" class="col-lg-8 centered" >
		<?php echo $demo_games_configuration['footer_title']; ?><br />
		<?php echo $demo_games_configuration['footer_description']; ?>
	</section>

	<input type="hidden" name="subdomain" id="subdomain" value="<?= $_SESSION['visitor_email'] ?>" />	
	<input type="hidden" name="domain" id="domain" value="<?= $demo_games_configuration['domain'] ?>" />
	<input type="hidden" name="email_domain" id="email_domain" value="<?= $demo_games_configuration['email_domain'] ?>" />

    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->

	<script src="themes/assets/js/json3.js"></script>	
	<script src="themes/assets/js/classie.js"></script>	
	<script src="themes/assets/js/bootstrap.min.js"></script>
 	<script src="themes/assets/js/smoothscroll.js"></script>	
	<script src="themes/assets/js/main.js"></script>
	<script src="themes/assets/lib/Zebra_Form-master/public/javascript/zebra_form.js"></script>
	<script src="themes/assets/js/custom.js"></script>
	
	<?php 
		if(isset($_SESSION['isLoggedIn']) && $_SESSION['isLoggedIn']==true) {  

			echo '<script> 	
			document.getElementById("game-score-bar").style.display="inline";
			document.getElementById("logout").style.display="inline";
			$(".result_title").val("'.$demo_games_configuration['result_title'].'");
			$("#contentwrapper").fadeIn(2000);
			$("#contentwrapper").load("themes/assets/GameLoaders/quad_game.php",function(){
				
				 $.getScript("themes/assets/js/custom.js"); 

			});</script>';	

		}else{

			echo '<script>		
			jQuery("#game-score-bar").css("display","none");
			document.getElementById("#game-score-bar").style.display="none";
			document.getElementById("game-score-bar").style.display="none";
				document.getElementById("stopwatch").style.display="none";
				$(".result_title").val("'.$demo_games_configuration['result_title'].'");
			     </script>';

		}
	?>	



<!--	<link rel="stylesheet" href="themes/assets/css/thfl.css" type="text/css">-->
	<!-- CUSTOM LESS CSS WHICH WILL OVERRIDE BASIC CSS WHICH ARE THERE IN PREVIOUSLY LINKED CSS FILES -->
	<link rel="stylesheet/less" href="themes/assets/css/embassy.less" type="text/css">
	<script src="themes/assets/lib/less.js-master/dist/less.min.js"></script>	

	<script src="themes/assets/js/jquery.timer.js"></script>
	<script src="themes/assets/js/timer_script.js"></script>
	<script>
					function popup(){
						  $('#popup').bPopup({
									easing: 'easeOutBack', //uses jQuery easing plugin
						      speed: 450,
						      transition: 'slideDown'
						  });
                
					}
	</script>
</body>
</html>
