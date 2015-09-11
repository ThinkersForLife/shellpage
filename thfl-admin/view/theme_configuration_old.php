<?php 
include_once("../model/functions.php");
$xml=simplexml_load_file("../config.xml") or die("Error: Cannot load configuration file");
//pr($xml);
//print_r($demo_games_configuration);
?>
<div id="themeConfigurationInner"> 
<!--	<h4>Manage Activities &nbsp; <span class="glyphicon glyphicon glyphicon-edit" aria-hidden="true"></span></h4>
	<hr>-->
	<div id="theme_tab">
	  <ul>
	    <li><a href="#tabs-1"><span class="glyphicon glyphicon-pencil" aria-hidden="true"></span>&nbsp;&nbsp;Change Theme</a></li>
	  </ul>
	  <div id="tabs-1">
		<br />
		<div id="home">
			Change Theme : &nbsp;&nbsp;<select id="theme" name="theme">
			<?php $themes=scandir("../../themes/",1);
				for($i=0;$i<count($themes)-2;$i++){	if($themes[$i]!='assets'){
			 ?>				
				<option value="<?= $themes[$i] ?>"<?php echo strcmp($themes[$i],(string)$xml->Configuration->ThemeName)==0?' selected':''; ?>><?= $themes[$i] ?></option>
			<?php }} ?>
			</select><br /><br />
			<input type="button" value="Change Theme" name="submit" id="submit" class="form-control" onclick='changeTheme();'/>	
		</div>
	  </div>
	</div>

	</div>
</div>
