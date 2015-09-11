<?php 
include_once("../model/functions.php");
$theme_config=get_theme_configuration_file('../../themes/assets/css/less_files/variables.less');
$body_color=explode(":",$theme_config[0]);$body_color=explode(";",$body_color[1]);
$body_color=trim($body_color[0]);

$header_h1_color=explode(":",$theme_config[1]);$header_h1_color=explode(";",$header_h1_color[1]);
$header_h1_color=trim($header_h1_color[0]);

$header_tagline_color=explode(":",$theme_config[2]);$header_tagline_color=explode(";",$header_tagline_color[1]);
$header_tagline_color=trim($header_tagline_color[0]);

$games_background_color=explode(":",$theme_config[4]);$games_background_color=explode(";",$games_background_color[1]);
$games_background_color=trim($games_background_color[0]);

$login_div_text_color=explode(":",$theme_config[5]);$login_div_text_color=explode(";",$login_div_text_color[1]);
$login_div_text_color=trim($login_div_text_color[0]);

$input_border_color=explode(":",$theme_config[6]);$input_border_color=explode(";",$input_border_color[1]);
$input_border_color=trim($input_border_color[0]);

$input_background_color=explode(":",$theme_config[7]);$input_background_color=explode(";",$input_background_color[1]);
$input_background_color=trim($input_background_color[0]);

$input_text_color=explode(":",$theme_config[8]);$input_text_color=explode(";",$input_text_color[1]);
$input_text_color=trim($input_text_color[0]);

$result_background_color=explode(":",$theme_config[9]);$result_background_color=explode(";",$result_background_color[1]);
$result_background_color=trim($result_background_color[0]);

$result_title_color=explode(":",$theme_config[10]);$result_title_color=explode(";",$result_title_color[1]);
$result_title_color=trim($result_title_color[0]);

$user_result_color=explode(":",$theme_config[11]);$user_result_color=explode(";",$user_result_color[1]);
$user_result_color=trim($user_result_color[0]);

$scores_div_text_color=explode(":",$theme_config[12]);$scores_div_text_color=explode(";",$scores_div_text_color[1]);
$scores_div_text_color=trim($scores_div_text_color[0]);

$footer_text_color=explode(":",$theme_config[13]);$footer_text_color=explode(";",$footer_text_color[1]);
$footer_text_color=trim($footer_text_color[0]);

$footer_background_color=explode(":",$theme_config[14]);$footer_background_color=explode(";",$footer_background_color[1]);
$footer_background_color=trim($footer_background_color[0]);

$user_score_div_text_color=explode(":",$theme_config[15]);$user_score_div_text_color=explode(";",$user_score_div_text_color[1]);
$user_score_div_text_color=trim($user_score_div_text_color[0]);

$user_welcome_text_color=explode(":",$theme_config[16]);$user_welcome_text_color=explode(";",$user_welcome_text_color[1]);
$user_welcome_text_color=trim($user_welcome_text_color[0]);

$user_rank_text_color=explode(":",$theme_config[17]);$user_rank_text_color=explode(";",$user_rank_text_color[1]);
$user_rank_text_color=trim($user_rank_text_color[0]);

$xml=simplexml_load_file("../config.xml") or die("Error: Cannot load configuration file");

?>
<div id="themeConfigurationInner"> 
<!--	<h4>Database Settings &nbsp; <span class="glyphicon glyphicon-info-sign" aria-hidden="true"></span></h4>
	<hr>-->

	<div id="accordion">
 	 	<h3><span class="glyphicon glyphicon-edit" aria-hidden="true"></span>&nbsp;&nbsp;Change Theme Configuration</h3>
		<div>
			<p>
				<table id="tblDemoGamesConfiguration" data-toggle="table">
						
					<tr>
						<td>Body Color : </td>
						<td><input type="text" name="body_color" value="<?php echo $body_color; ?>" id="body_color" placeholder="Please fill in the details" class="form-control colorPicker" /></td>
						<td class="theme-color-display-div" style="background-color:<?php echo $body_color; ?>;"></td>
					</tr>			
					<tr>
						<td>Header H1 Color : </td>
						<td><input type="text" name="header_h1_color" value="<?php echo $header_h1_color; ?>" id="header_h1_color" placeholder="Please fill in the details" class="form-control colorPicker" /></td>							
						<td class="theme-color-display-div" style="background-color:<?php echo $header_h1_color; ?>;"></td>
					</tr>					
					<tr>
						<td>Header Tagline Color : </td>
						<td><input type="text" name="header_tagline_color" value="<?php echo $header_tagline_color; ?>" id="header_tagline_color" placeholder="Please fill in the details" class="form-control colorPicker" /></td>								
						<td class="theme-color-display-div" style="background-color:<?php echo $header_tagline_color; ?>;"></td>
					</tr>			
					<tr>
						<td>Games Background Color : </td>
						<td><input type="text" name="games_background_color" value="<?php echo $games_background_color; ?>" id="games_background_color" placeholder="Please fill in the details" class="form-control colorPicker" /></td>								
						<td class="theme-color-display-div" style="background-color:<?php echo $games_background_color; ?>;"></td>
					</tr>					
					<tr>
						<td>Login Div Text Color : </td>
						<td><input type="text" name="login_div_text_color" value="<?php echo $login_div_text_color; ?>" id="login_div_text_color" placeholder="Please fill in the details" class="form-control colorPicker" /></td>								
						<td class="theme-color-display-div" style="background-color:<?php echo $login_div_text_color; ?>;"></td>
					</tr>				
					<tr>
						<td>Input Border Color : </td>
						<td><input type="text" name="input_border_color" value="<?php echo $input_border_color; ?>" id="input_border_color" placeholder="Please fill in the details" class="form-control colorPicker" /></td>								
						<td class="theme-color-display-div" style="background-color:<?php echo $input_border_color; ?>;"></td>
					</tr>			
					<tr>
						<td>Input Background Color : </td>
						<td><input type="text" name="input_background_color" value="<?php echo $input_background_color; ?>" id="input_background_color" placeholder="Please fill in the details" class="form-control colorPicker" /></td>								
						<td class="theme-color-display-div" style="background-color:<?php echo $input_background_color; ?>;"></td>
					</tr>			
					<tr>
						<td>Input Text Color : </td>
						<td><input type="text" name="input_text_color" value="<?php echo $input_text_color; ?>" id="input_text_color" placeholder="Please fill in the details" class="form-control colorPicker" /></td>								
						<td class="theme-color-display-div" style="background-color:<?php echo $input_text_color; ?>;"></td>
					</tr>		
					<tr>
						<td>Result Background Color : </td>
						<td><input type="text" name="result_background_color" value="<?php echo $result_background_color; ?>" id="result_background_color" placeholder="Please fill in the details" class="form-control colorPicker" /></td>								
						<td class="theme-color-display-div" style="background-color:<?php echo $result_background_color; ?>;"></td>
					</tr>		
					<tr>
						<td>Result Title Color : </td>
						<td><input type="text" name="result_title_color" value="<?php echo $result_title_color; ?>" id="result_title_color" placeholder="Please fill in the details" class="form-control colorPicker" /></td>								
						<td class="theme-color-display-div" style="background-color:<?php echo $result_title_color; ?>;"></td>
					</tr>			
					<tr>
						<td>User Result Color : </td>
						<td><input type="text" name="user_result_color" value="<?php echo $user_result_color; ?>" id="user_result_color" placeholder="Please fill in the details" class="form-control colorPicker" /></td>								
						<td class="theme-color-display-div" style="background-color:<?php echo $user_result_color; ?>;"></td>
					</tr>		
					<tr>
						<td>User Score Div Text Color : </td>
						<td><input type="text" name="user_score_div_text_color" value="<?php echo $user_score_div_text_color; ?>" id="user_score_div_text_color" placeholder="Please fill in the details" class="form-control colorPicker" /></td>								
						<td class="theme-color-display-div" style="background-color:<?php echo $user_score_div_text_color; ?>;"></td>
					</tr>
					<tr>
						<td>User Welcome Text Color : </td>
						<td><input type="text" name="user_welcome_text_color" value="<?php echo $user_welcome_text_color; ?>" id="user_welcome_text_color" placeholder="Please fill in the details" class="form-control colorPicker" /></td>								
						<td class="theme-color-display-div" style="background-color:<?php echo $user_welcome_text_color; ?>;"></td>
					</tr>
					<tr>
						<td>User Rank Text Color : </td>
						<td><input type="text" name="user_rank_text_color" value="<?php echo $user_rank_text_color; ?>" id="user_rank_text_color" placeholder="Please fill in the details" class="form-control colorPicker" /></td>								
						<td class="theme-color-display-div" style="background-color:<?php echo $user_rank_text_color; ?>;"></td>
					</tr>
					<tr>
						<td>Scores Div Text Color : </td>
						<td><input type="text" name="scores_div_text_color" value="<?php echo $scores_div_text_color; ?>" id="scores_div_text_color" placeholder="Please fill in the details" class="form-control colorPicker" /></td>	
						<td class="theme-color-display-div" style="background-color:<?php echo $scores_div_text_color; ?>;"></td>
					</tr>											
					<tr>
						<td>Footer Text Color : </td>
						<td><input type="text" name="footer_text_color" value="<?php echo $footer_text_color; ?>" id="footer_text_color" placeholder="Please fill in the details" class="form-control colorPicker" /></td>								
						<td class="theme-color-display-div" style="background-color:<?php echo $footer_text_color; ?>;"></td>
					</tr>			
					<tr>
						<td>Footer Background Color : </td>
						<td><input type="text" name="footer_background_color" value="<?php echo $footer_background_color; ?>" id="footer_background_color" placeholder="Please fill in the details" class="form-control colorPicker" /></td>								
						<td class="theme-color-display-div" style="background-color:<?php echo $footer_background_color; ?>;"></td>
					</tr>							
				</table></p>
		</div>
	</div>

	</div>
	<input type="button" value="Save" name="submit" id="submit" class="form-control" onclick='updateVariables();'/>	

<script>
</script>
