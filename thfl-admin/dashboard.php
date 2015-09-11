<?php
session_start();
$xml=simplexml_load_file("config.xml") or die("Error: Cannot load configuration file");
if(!isset($_SESSION['isAdminLoggedIn']) && $_SESSION['isAdminLoggedIn']!=true ){
	header("location: index.php");
	exit();
}
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>ThFL - Shell Activity Admin</title>

	<!-- Bootstrap core CSS -->
	<link href="css/bootstrap.min.css" rel="stylesheet">


	<!-- FROALA EDITOR CSS -->

	<link href="css/froala-css/font-awesome.min.css" rel="stylesheet" type="text/css">
	<link href="css/froala-css/froala_editor.min.css" rel="stylesheet" type="text/css">
	<link href="css/froala-css/froala_style.min.css" rel="stylesheet" type="text/css">
	

	<!-- Custom styles for this template -->
	<link href="css/dashboard.css" rel="stylesheet">
	<link href="css/grid.css" rel="stylesheet">
    
    
	<link href="css/styles.css" rel="stylesheet">
	<link rel="stylesheet" type="text/css" href="lib//data-tables/media/css/jquery.dataTables.min.css ">    

	<link rel="stylesheet" href="css/jquery-ui.css">
	
	<script src="js/ie-emulation-modes-warning.js"></script>

<!--	<script type="text/javascript" language="javascript" src="js/jquery-1.10.2.min.js"></script>-->
	<script type="text/javascript" language="javascript" src="js/jquery-1.11.3.js"></script>
	<script src="js/jquery-ui.js"></script>


	
	
	<!-- 	DATA TABLEs		 
    ================================================== -->
	
	<script type="text/javascript" language="javascript" src="lib//data-tables/media/js/jquery.dataTables.js"></script>
	<link rel="stylesheet" type="text/css" href="lib//data-tables/media/css/jquery.dataTables.css">
	
	<!-- 			END DATA TABLES 
    ================================================== -->


	<script type="text/javascript" charset="utf-8">
		$(document).ready(function() {
			$('#result-table').dataTable();
			$( "#activity_tab" ).tabs();
			$( "#reports_tab" ).tabs();

		} );
	</script>

		
	<script src="js/modernizr.custom.js"></script>

  </head>

  <body>


    <nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
      <div class="container-fluid">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a class="navbar-brand" href="#">ThFL - Shell Activity Admin Panel</a>
        </div>
       <!-- <div id="navbar" class="navbar-collapse collapse">
          <ul class="nav navbar-nav navbar-right">
            <li><a href="#">Dashboard</a></li>
            <li><a href="#">Settings</a></li>
            <li><a href="#">Profile</a></li>
            <li><a href="#">Help</a></li>
          </ul>
          <form class="navbar-form navbar-right">
            <input type="text" class="form-control" placeholder="Search...">
          </form>
        </div>-->
      </div>
    </nav>

    <div class="container-fluid">
      <div class="row">
        <div class="col-sm-3 col-md-2 sidebar">
         <ul class="nav nav-sidebar">
            <li><a href="controller/demo_games_configuration.php #demoGamesConfigurationMain" id="nav_demo_games_settings">
		<span class="glyphicon glyphicon-tasks" aria-hidden="true"></span>&nbsp; Change Shell Activity Configuration</a>
   	   </li>
            <li><a href="controller/database_configuration.php #databaseConfigurationMain" id="nav_database_settings">
		<span class="glyphicon glyphicon-align-justify" aria-hidden="true"></span>&nbsp; Change Database Configuration</a>
   	   </li>
      <!-- <li><a href="controller/pictures.php #picturesConfigurationMain" id="nav_add_pictures">
		<span class="glyphicon glyphicon-plus" aria-hidden="true"></span>&nbsp;Add Picture</a>
   	   </li>-->
       <li><a href="controller/activity_configuration.php #activityConfigurationMain" id="nav_activity_settings">
		<span class="glyphicon glyphicon-screenshot" aria-hidden="true"></span>&nbsp; Manage Activity</a>
   	   </li>
            <li><a href="../" id="nav_theme_configuration" target="_blank">
		<span class="glyphicon glyphicon-film" aria-hidden="true"></span>&nbsp; Theme Configuration</a>
   	   </li>
            <!--<li><a href="controller/theme_configuration.php #themeConfigurationMain" id="nav_theme_settings">
		<span class="glyphicon glyphicon-picture" aria-hidden="true"></span>&nbsp; Change Theme</a>
   	   </li>-->
            <li><a href="controller/reports.php #reportsConfigurationMain" id="nav_reports_settings">
		<span class="glyphicon glyphicon-stats" aria-hidden="true"></span>&nbsp; Reports</a>
   	   </li>
            <li><a href="controller/analytics_dashboard.php" id="nav_analytics_dashboard_settings">
		<span class="glyphicon glyphicon-dashboard" aria-hidden="true"></span>&nbsp; Analytics Dashboard</a>
   	   </li>
            <li><a href="controller/issue_tracker.php" id="nav_issue_tracker_settings">
		<span class="glyphicon glyphicon-warning-sign" aria-hidden="true"></span>&nbsp; Issue Tracker</a>
   	   </li>
            <li><a href="../" id="nav_view_activity" target="_blank" style='color:#FF0784;font-weight:bolder;'>
		<span class="glyphicon glyphicon-export" aria-hidden="true"></span>&nbsp; View Activity</a>
   	   </li>
            <li><a href="logout.php" id="nav_logout_activity" style='color:red;font-weight:bolder;'>
		<span class="glyphicon glyphicon-off" aria-hidden="true"></span>&nbsp; LOGOUT</a>
   	   </li>
          </ul>
          
        </div>
        
        
        
        <!--         START	Main Container         -->
         
        		<div class="loading"></div>

        <div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main" id="container">

        </div>
        <!--  		END Main Container		-->
        
        
      </div>
    </div>
    
	
	
	
	
	
    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <!-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script> -->
    <script src="js/bootstrap.min.js"></script>
    <script src="js/docs.min.js"></script>
    <!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
    <script src="js/ie10-viewport-bug-workaround.js"></script>
    <script src="js/ie-emulation-modes-warning.js"></script>
    <script src="js/ie8-responsive-file-warning.js"></script>
    <!-- 	END Hand Coded JAVASCRIPT FILES		 
    ================================================== -->
   
   
   
   
   
   <!-- Hand Coded JAVASCRIPT FILES 
    ================================================== -->
	<script type="text/javascript" src="js/custom.js"></script>
	<script type="text/javascript" src="js/loader.js"></script>
   <!-- 	END Hand Coded JAVASCRIPT FILES		 
    ================================================== -->     

	<!-- 	DATA TABLEs		 
    ================================================== -->
	
	<script type="text/javascript" language="javascript" src="lib/data-tables/media/js/jquery.dataTables.js"></script>
	<link rel="stylesheet" type="text/css" href="lib/data-tables/media/css/jquery.dataTables.css">
	
	<!-- 			END DATA TABLES 
    ================================================== -->
	

	<!-- 	FROALA EDITOR		 
    ================================================== -->

	 <script src="js/froala-js/froala_editor.min.js"></script>
	  <script src="js/froala-js/plugins/tables.min.js"></script>
	  <script src="js/froala-js/plugins/lists.min.js"></script>
	  <script src="js/froala-js/plugins/colors.min.js"></script>
	  <script src="js/froala-js/plugins/media_manager.min.js"></script>
	  <script src="js/froala-js/plugins/font_family.min.js"></script>
	  <script src="js/froala-js/plugins/font_size.min.js"></script>
	  <script src="js/froala-js/plugins/block_styles.min.js"></script>
	  <script src="js/froala-js/plugins/video.min.js"></script>

	<!-- 			END FROALA EDITOR 
    ================================================== -->



	<!-- 			COLORPICKER 
    ================================================== -->
	<script type="text/javascript" language="javascript" src="lib/colorpicker/js/colorpicker.js"></script>
	<!--<script type="text/javascript" language="javascript" src="lib/colorpicker/js/eye.js"></script>
	<script type="text/javascript" language="javascript" src="lib/colorpicker/js/layout.js"></script>
	<script type="text/javascript" language="javascript" src="lib/colorpicker/js/utils.js"></script>-->
	<link rel="stylesheet" type="text/css" href="lib/colorpicker/css/colorpicker.css">
	<!--<link rel="stylesheet" type="text/css" href="lib/colorpicker/css/layout.css">-->

	
	<!-- 			END COLORPICKER 
    ================================================== -->

	
    <script>
    	$( document ).ready(function() {

		$("div.loading").css("display","inline");

			$("#nav_demo_games_settings").click(function(e){
				
				$("div.loading").css("display","inline");

				$("div#container").load("controller/demo_games_configuration.php #demoGamesConfigurationMain",function(e){
					
					reloadFroala();	$( "#accordion" ).accordion({
									        heightStyle: "content",
										autoHeight: false,
										clearStyle: true, 
									    });

					$("div.loading").css("display","none");

					e.preventDefault();
						
				});	
				$("div.loading").css("display","none");		
				e.preventDefault();
				
			});
			$("#nav_database_settings").click(function(e){

				$("div.loading").css("display","inline");

				$("div#container").load("controller/database_configuration.php #databaseConfigurationMain",function(e){
					
					$( "#accordion" ).accordion({
							        heightStyle: "content",
								autoHeight: false,
								clearStyle: true, 
						    });

					$("div.loading").css("display","none");

					e.preventDefault();
						
				});	
				$("div.loading").css("display","none");		
				e.preventDefault();
				
			});
			$("#nav_theme_configuration").click(function(e){

				$("div.loading").css("display","inline");

				$("div#container").load("controller/theme_configuration.php #themeConfigurationMain",function(e){
					
					$( "#accordion" ).accordion({
							        heightStyle: "content",
								autoHeight: false,
								clearStyle: true, 
						    });

					$('.colorPicker').ColorPicker({
						onSubmit: function(hsb, hex, rgb, el) {
							$(el).val("#"+hex);
							$(el).ColorPickerHide();
						},
						onBeforeShow: function () {
							$(this).ColorPickerSetColor(this.value);
						}
					})
					.bind('keyup', function(){
						$(this).ColorPickerSetColor(this.value);
					});

					$("div.loading").css("display","none");

					e.preventDefault();
						
				});	
				e.preventDefault();
				
			});
			$("#nav_activity_settings").click(function(e){

				$("div.loading").css("display","inline");

				$("div#container").load("controller/activity_configuration.php #activityConfigurationMain",function(e){
					
					reloadFroala();	
					$( "#activity_tab" ).tabs();
					$("div.loading").css("display","none");
					e.preventDefault();
						
				});
				$("div.loading").css("display","none");			
				e.preventDefault();
				
			});

			$("#nav_add_pictures").click(function(e){

				$("div.loading").css("display","inline");
				
				$("div#container").load("controller/pictures.php #picturesConfigurationMain",function(e){
					
//					reloadFroala();		
					$( "#accordion" ).accordion({
							        heightStyle: "content",
								autoHeight: false,
								clearStyle: true, 
						    });
					$( "#pictures_grid" ).tabs();
					$('#result-table').dataTable();
					$("div.loading").css("display","none");
					e.preventDefault();
						
				});
				$("div.loading").css("display","none");				
				e.preventDefault();
				
			});


			$("#nav_theme_settings").click(function(e){

				$("div.loading").css("display","inline");
				
				$("div#container").load("controller/theme_configuration.php #themeConfigurationMain",function(e){
					
					reloadFroala();	
					$( "#theme_tab" ).tabs();
					$("div.loading").css("display","none");
					e.preventDefault();
						
				});
				$("div.loading").css("display","none");			
				e.preventDefault();
				
			});

			$("#nav_reports_settings").click(function(e){

				$("div.loading").css("display","inline");
				
				$("div#container").load("controller/reports.php #reportsConfigurationMain",function(e){
					
					reloadFroala();	
					$( "#reports_tab" ).tabs();
					$('#result-table').dataTable();
					$("div.loading").css("display","none");
					e.preventDefault();
						
				});
				$("div.loading").css("display","none");				
				e.preventDefault();
				
			});

			$("#nav_issue_tracker_settings").click(function(e){

				$("div.loading").css("display","inline");
				
				$("div#container").load("controller/issue_tracker.php",function(e){
					
						
				});
				$("div.loading").css("display","none");				
				e.preventDefault();
				
			});

			$("#nav_analytics_dashboard_settings").click(function(e){

				$("div.loading").css("display","inline");
				
				$("div#container").load("controller/analytics_dashboard.php",function(e){
					
						
				});
				$("div.loading").css("display","none");				
				e.preventDefault();
				
			});

			$("div#container").load("controller/demo_games_configuration.php #demoGamesConfigurationMain",function(e){
	
				$("div.loading").css("display","inline");

				$( "#accordion" ).accordion({
							        heightStyle: "content",
								autoHeight: false,
								clearStyle: true, 
						    });
				reloadFroala();

				$("div.loading").css("display","none");
				
			});						
			
			reloadFroala();

			return false;

//			$("div.loading").css("display","none");

		});
    </script>
  </body>
</html>
