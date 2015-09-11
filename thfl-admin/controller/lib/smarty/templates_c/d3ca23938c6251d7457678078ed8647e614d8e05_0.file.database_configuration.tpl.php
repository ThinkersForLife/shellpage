<?php /* Smarty version 3.1.24, created on 2015-06-18 08:59:15
         compiled from "/var/www/Build/DEV/ShellRedefinedWithFB/thfl-admin/view/database_configuration.tpl" */ ?>
<?php
/*%%SmartyHeaderCode:14795173955823b0bbc6e98_60739764%%*/
if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'd3ca23938c6251d7457678078ed8647e614d8e05' => 
    array (
      0 => '/var/www/Build/DEV/ShellRedefinedWithFB/thfl-admin/view/database_configuration.tpl',
      1 => 1433832300,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '14795173955823b0bbc6e98_60739764',
  'variables' => 
  array (
    'activity_details' => 0,
    'item' => 0,
  ),
  'has_nocache_code' => false,
  'version' => '3.1.24',
  'unifunc' => 'content_55823b0bbf14b9_07416129',
),false);
/*/%%SmartyHeaderCode%%*/
if ($_valid && !is_callable('content_55823b0bbf14b9_07416129')) {
function content_55823b0bbf14b9_07416129 ($_smarty_tpl) {

$_smarty_tpl->properties['nocache_hash'] = '14795173955823b0bbc6e98_60739764';
?>
<div id="databaseConfigurationInner"> 
<!--	<h4>Database Settings &nbsp; <span class="glyphicon glyphicon-info-sign" aria-hidden="true"></span></h4>
	<hr>-->
	<?php
$_from = $_smarty_tpl->tpl_vars['activity_details']->value;
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
 	 	<h3><span class="glyphicon glyphicon-edit" aria-hidden="true"></span>&nbsp;&nbsp;Change Database Configuration</h3>
		<div>
			<p>
				<table id="tblDemoGamesConfiguration" data-toggle="table">
						
					<tr>
						<td>Name of Activity : </td>
						<td><input type="text" name="name_of_activity" value="<?php echo $_smarty_tpl->tpl_vars['item']->value->NameofActivity;?>
" id="name_of_activity" placeholder="Please enter your Name of Activity" class="form-control" /></td>	
					</tr>
					<tr>
						<td>Database Name : </td>
						<td><input type="text" name="database_name" value="<?php echo $_smarty_tpl->tpl_vars['item']->value->DatabaseName;?>
" id="database_name" placeholder="Please enter your Database Name " class="form-control" /></td>	
					</tr>
					<tr>
						<td>Database User : </td>
						<td><input type="text" name="database_user" value="<?php echo $_smarty_tpl->tpl_vars['item']->value->DatabaseUser;?>
" id="database_user" placeholder="Please enter your Database User" class="form-control" /></td>	
					</tr>
					<tr>
						<td>Database Password : </td>
						<td><input type="password" name="database_password" value="<?php echo $_smarty_tpl->tpl_vars['item']->value->DatabasePassword;?>
" id="database_password" placeholder="Please enter your Database Password" class="form-control" /></td>	
					</tr>
					<tr>
						<td>Database Table : </td>
						<td><input type="text" name="database_table" value="<?php echo $_smarty_tpl->tpl_vars['item']->value->DatabaseTable;?>
" id="database_table" placeholder="Please enter your Database Table" class="form-control" /></td>	
					</tr><!--
					<tr>
						<td>Domain : </td>
						<td><input type="text" name="domain" value="<?php echo $_smarty_tpl->tpl_vars['item']->value->Domain;?>
" id="domain" placeholder="Please enter your Domain Name" class="form-control" /></td>	
					</tr>-->
					<tr>
						<td>Email Domain Restriction : </td>
						<td><input type="text" name="email_domain" value="<?php echo $_smarty_tpl->tpl_vars['item']->value->EmailDomain;?>
" id="email_domain" placeholder="Please enter your Email Domain " class="form-control" /></td>	
					</tr>

					<tr>
						<td>Location: </td>
						<td><textarea id="location" name="location" class="form-control" ><?php echo $_smarty_tpl->tpl_vars['item']->value->Location;?>
</textarea></td>	
					</tr>
					
				</table></p>
		</div>	
	<?php
$_smarty_tpl->tpl_vars['item'] = $foreach_item_Sav;
}
?>
	<input type="button" value="Save" name="submit" id="submit" class="form-control" onclick='updateDatabaseConfiguration();'/>	
</div>
<?php }
}
?>