<?php /* Smarty version 3.1.24, created on 2015-06-18 08:59:13
         compiled from "/var/www/Build/DEV/ShellRedefinedWithFB/thfl-admin/view/demo_games_configuration.tpl" */ ?>
<?php
/*%%SmartyHeaderCode:66331375755823b091fd147_68255633%%*/
if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '774e8a6c1ee9433f291f7771f9564c0ff0168ce7' => 
    array (
      0 => '/var/www/Build/DEV/ShellRedefinedWithFB/thfl-admin/view/demo_games_configuration.tpl',
      1 => 1433832300,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '66331375755823b091fd147_68255633',
  'variables' => 
  array (
    'demo_games_configuration' => 0,
    'item' => 0,
  ),
  'has_nocache_code' => false,
  'version' => '3.1.24',
  'unifunc' => 'content_55823b09316222_60979241',
),false);
/*/%%SmartyHeaderCode%%*/
if ($_valid && !is_callable('content_55823b09316222_60979241')) {
function content_55823b09316222_60979241 ($_smarty_tpl) {

$_smarty_tpl->properties['nocache_hash'] = '66331375755823b091fd147_68255633';
?>
<div id="demoGamesConfigurationInner"> 
	<!--<h4>Demo Games Page Settings &nbsp; <span class="glyphicon glyphicon-info-sign" aria-hidden="true"></span></h4>
	<hr>-->
	<?php
$_from = $_smarty_tpl->tpl_vars['demo_games_configuration']->value;
if (!is_array($_from) && !is_object($_from)) {
settype($_from, 'array');
}
$_smarty_tpl->tpl_vars['item'] = new Smarty_Variable;
$_smarty_tpl->tpl_vars['item']->_loop = false;
foreach ($_from as $_smarty_tpl->tpl_vars['item']->value) {
$_smarty_tpl->tpl_vars['item']->_loop = true;
$foreach_item_Sav = $_smarty_tpl->tpl_vars['item'];
?>
	<div id="accordion">
 	 	<h3><span class="glyphicon glyphicon-home" aria-hidden="true"></span>&nbsp;&nbsp;Home Page Settings</h3>
		<div>
			<p>
	<table id="tblDemoGamesConfiguration" data-toggle="table">
						
					<tr><th><?php echo '<?php ';?>echo "<br /><b><font color='#094AB1'>Current Theme: <i><u> Minimal-theme </u></i></b></font></th></tr>
					<tr>
						<td>Home Page Title : </td>
						<td><input type="text" name="home_title" value="<?php echo $_smarty_tpl->tpl_vars['item']->value->HomePageTitle;?>
" id="home_title" placeholder="Please enter your Home Page title" class="form-control" /></td>	
					</tr>

					<tr>				
						<td>Home Background Image: </td>
						<td><input type="file" name="home-image" id="home-image"/></td>
					</tr>

					<tr>
						<td>Home Page Description/Tagline: </td>
						<td><!--<textarea id="home_tagline" name="home_tagline" class="form-control" ><?php echo '<?php ';?>echo $demo_games_configuration["home_tagline"]}</textarea>--><div id='home_tagline' name="home_tagline" style="margin-top: 30px;"><?php echo $_smarty_tpl->tpl_vars['item']->value->HomePageDescription;?>
</div></td>	
					</tr>
					
					<tr>				
						<td>Header Image: </td>
						<td><input type="file" name="header-image" id="header-image"/></td>
					</tr>

				</table>
			</p>
		</div>
 	 	<h3><span class="glyphicon glyphicon-expand" aria-hidden="true"></span>&nbsp;&nbsp;Games Page Settings</h3>
		<div>
			<p>
	<table id="tblDemoGamesConfiguration" data-toggle="table">
						
						<tr>
							<td>Games Page Title : </td>
							<td><input type="text" name="games_title" value="<?php echo $_smarty_tpl->tpl_vars['item']->value->GamesPageTitle;?>
" id="games_title" placeholder="Please enter your Games Page title" class="form-control" /></td>	
						</tr>
						
						<tr>
							<td>Games Page Description: </td>
							<td><!--<textarea id="games_description" name="games_description" class="form-control" ><?php echo '<?php ';?>echo $demo_games_configuration["games_description"]}</textarea>--><div id='games_description' name="games_description" style="margin-top: 30px;"><?php echo $_smarty_tpl->tpl_vars['item']->value->GamesPageDescription;?>
</div></td>	
						</tr>
						
						<tr>
							<td>Games Page Button Text : </td>
							<td><input type="text" name="game_page_button_text" value="<?php echo $_smarty_tpl->tpl_vars['item']->value->GamesPageButtonText;?>
" id="game_page_button_text" placeholder="Please enter your Games Page Button text" class="form-control" /></td>	
						</tr>
						<tr>
							<td>Games Page Button Link: </td>
							<td><input type="text" name="game_page_button_link" value="<?php echo $_smarty_tpl->tpl_vars['item']->value->GamesPageButtonLink;?>
" id="game_page_button_link" placeholder="Please enter your Games Page Button link" class="form-control" /></td>	
						</tr>
						
					</table>
			</p>
		</div>
 	 	<h3><span class="glyphicon glyphicon-stats" aria-hidden="true"></span>&nbsp;&nbsp;Result Page Settings</h3>
		<div>
			<p>
	<table id="tblDemoGamesConfiguration" data-toggle="table">
						
						<tr>
							<td>Result Page Title : </td>
							<td><input type="text" name="result_title" value="<?php echo $_smarty_tpl->tpl_vars['item']->value->ResultPageTitle;?>
" id="result_title" placeholder="Please enter your Result Page title" class="form-control" /></td>	
						</tr>
				</table>
			</p>
		</div>
 	 	<h3><span class="glyphicon glyphicon-info-sign" aria-hidden="true"></span>&nbsp;&nbsp;Footer Settings</h3>
		<div>
			<p>
				<table id="tblDemoGamesConfiguration" data-toggle="table">

					<tr>
						<td>Footer Title : </td>
						<td><input type="text" name="footer_title" value="<?php echo $_smarty_tpl->tpl_vars['item']->value->FooterTitle;?>
" id="footer_title" placeholder="Please enter your Footer title" class="form-control" /></td>	
					</tr>
					<tr>
						<td>Footer Description: </td>
						<td><div id='footer_description' name="footer_description" style="margin-top: 30px;"><?php echo $_smarty_tpl->tpl_vars['item']->value->FooterDescription;?>
</div></td>	
					</tr>

				</table>
			</p>
		</div>
	</div>
	<input type="button" value="Save" name="submit" id="submit" class="form-control" onclick='updateDemoGamesConfiguration();'/>	
	<?php
$_smarty_tpl->tpl_vars['item'] = $foreach_item_Sav;
}
?>
</div>
<?php }
}
?>