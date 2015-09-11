<?php /* Smarty version 3.1.24, created on 2015-07-21 13:54:56
         compiled from "/var/www/Build/DEV/ShellRedefined/thfl-admin/view/database_configuration.tpl" */ ?>
<?php
/*%%SmartyHeaderCode:125106577155ae01d8ea6830_83153803%%*/
if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '6ad50ebbce352b1e6ae643145e47cef8a8b2af9d' => 
    array (
      0 => '/var/www/Build/DEV/ShellRedefined/thfl-admin/view/database_configuration.tpl',
      1 => 1437467070,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '125106577155ae01d8ea6830_83153803',
  'variables' => 
  array (
    'activity_details' => 0,
    'item' => 0,
    'dbname' => 0,
    'dbuser' => 0,
    'dbpass' => 0,
    'dbtable' => 0,
  ),
  'has_nocache_code' => false,
  'version' => '3.1.24',
  'unifunc' => 'content_55ae01d8ef98c3_47680030',
),false);
/*/%%SmartyHeaderCode%%*/
if ($_valid && !is_callable('content_55ae01d8ef98c3_47680030')) {
function content_55ae01d8ef98c3_47680030 ($_smarty_tpl) {

$_smarty_tpl->properties['nocache_hash'] = '125106577155ae01d8ea6830_83153803';
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
						<td><input type="text" name="database_name" value="<?php echo $_smarty_tpl->tpl_vars['dbname']->value;?>
" id="database_name" placeholder="Please enter your Database Name " class="form-control" /></td>	
					</tr>
					<tr>
						<td>Database User : </td>
						<td><input type="text" name="database_user" value="<?php echo $_smarty_tpl->tpl_vars['dbuser']->value;?>
" id="database_user" placeholder="Please enter your Database User" class="form-control" /></td>	
					</tr>
					<tr>
						<td>Database Password : </td>
						<td><input type="password" name="database_password" value="<?php echo $_smarty_tpl->tpl_vars['dbpass']->value;?>
" id="database_password" placeholder="Please enter your Database Password" class="form-control" /></td>	
					</tr>
					<tr>
						<td>Database Table : </td>
						<td><input type="text" name="database_table" value="<?php echo $_smarty_tpl->tpl_vars['dbtable']->value;?>
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