<?php /* Smarty version 3.1.24, created on 2015-06-26 14:28:37
         compiled from "/var/www/Build/DEV/ShellRedefined/thfl-admin/view/activity_configuration.tpl" */ ?>
<?php
/*%%SmartyHeaderCode:1109986804558d143d5237c9_85293086%%*/
if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '4d0d26af51de29cba913a9b9f2e894f837831814' => 
    array (
      0 => '/var/www/Build/DEV/ShellRedefined/thfl-admin/view/activity_configuration.tpl',
      1 => 1433761364,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '1109986804558d143d5237c9_85293086',
  'variables' => 
  array (
    'activities' => 0,
    'activity_name' => 0,
  ),
  'has_nocache_code' => false,
  'version' => '3.1.24',
  'unifunc' => 'content_558d143d5813d5_78941946',
),false);
/*/%%SmartyHeaderCode%%*/
if ($_valid && !is_callable('content_558d143d5813d5_78941946')) {
function content_558d143d5813d5_78941946 ($_smarty_tpl) {

$_smarty_tpl->properties['nocache_hash'] = '1109986804558d143d5237c9_85293086';
?>
<div id="activityConfigurationInner"> 
<!--	<h4>Manage Activities &nbsp; <span class="glyphicon glyphicon glyphicon-edit" aria-hidden="true"></span></h4>
	<hr>-->
	<div id="activity_tab">
	  <ul>
	    <li><a href="#tabs-2"><span class="glyphicon glyphicon-plus" aria-hidden="true"></span>&nbsp;&nbsp;Add Activity</a></li>
	    <li><a href="#tabs-1"><span class="glyphicon glyphicon-pencil" aria-hidden="true"></span>&nbsp;&nbsp;Change Activity</a></li>
	  </ul>
	  <div id="tabs-1">
		<br />
		<div id="home">
			Choose an activity and Click Enable Activity to Turn it on: &nbsp;&nbsp;<select id="activity" name="activity">
				<?php if (isset($_smarty_tpl->tpl_vars['smarty']->value['section']['activities'])) unset($_smarty_tpl->tpl_vars['smarty']->value['section']['activities']);
$_smarty_tpl->tpl_vars['smarty']->value['section']['activities']['name'] = 'activities';
$_smarty_tpl->tpl_vars['smarty']->value['section']['activities']['loop'] = is_array($_loop=$_smarty_tpl->tpl_vars['activities']->value) ? count($_loop) : max(0, (int) $_loop); unset($_loop);
$_smarty_tpl->tpl_vars['smarty']->value['section']['activities']['show'] = true;
$_smarty_tpl->tpl_vars['smarty']->value['section']['activities']['max'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['activities']['loop'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['activities']['step'] = 1;
$_smarty_tpl->tpl_vars['smarty']->value['section']['activities']['start'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['activities']['step'] > 0 ? 0 : $_smarty_tpl->tpl_vars['smarty']->value['section']['activities']['loop']-1;
if ($_smarty_tpl->tpl_vars['smarty']->value['section']['activities']['show']) {
    $_smarty_tpl->tpl_vars['smarty']->value['section']['activities']['total'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['activities']['loop'];
    if ($_smarty_tpl->tpl_vars['smarty']->value['section']['activities']['total'] == 0)
        $_smarty_tpl->tpl_vars['smarty']->value['section']['activities']['show'] = false;
} else
    $_smarty_tpl->tpl_vars['smarty']->value['section']['activities']['total'] = 0;
if ($_smarty_tpl->tpl_vars['smarty']->value['section']['activities']['show']):

            for ($_smarty_tpl->tpl_vars['smarty']->value['section']['activities']['index'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['activities']['start'], $_smarty_tpl->tpl_vars['smarty']->value['section']['activities']['iteration'] = 1;
                 $_smarty_tpl->tpl_vars['smarty']->value['section']['activities']['iteration'] <= $_smarty_tpl->tpl_vars['smarty']->value['section']['activities']['total'];
                 $_smarty_tpl->tpl_vars['smarty']->value['section']['activities']['index'] += $_smarty_tpl->tpl_vars['smarty']->value['section']['activities']['step'], $_smarty_tpl->tpl_vars['smarty']->value['section']['activities']['iteration']++):
$_smarty_tpl->tpl_vars['smarty']->value['section']['activities']['rownum'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['activities']['iteration'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['activities']['index_prev'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['activities']['index'] - $_smarty_tpl->tpl_vars['smarty']->value['section']['activities']['step'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['activities']['index_next'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['activities']['index'] + $_smarty_tpl->tpl_vars['smarty']->value['section']['activities']['step'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['activities']['first']      = ($_smarty_tpl->tpl_vars['smarty']->value['section']['activities']['iteration'] == 1);
$_smarty_tpl->tpl_vars['smarty']->value['section']['activities']['last']       = ($_smarty_tpl->tpl_vars['smarty']->value['section']['activities']['iteration'] == $_smarty_tpl->tpl_vars['smarty']->value['section']['activities']['total']);
?>
						<option value="<?php echo $_smarty_tpl->tpl_vars['activities']->value[$_smarty_tpl->getVariable('smarty')->value['section']['activities']['index']];?>
" <?php echo $_smarty_tpl->tpl_vars['activities']->value[$_smarty_tpl->getVariable('smarty')->value['section']['activities']['index']] == $_smarty_tpl->tpl_vars['activity_name']->value ? 'selected' : '';?>
 >
										<?php echo $_smarty_tpl->tpl_vars['activities']->value[$_smarty_tpl->getVariable('smarty')->value['section']['activities']['index']];?>

						</option>
				<?php endfor; endif; ?>
			</select><br /><br />
			<input type="button" value="Enable Activity" name="submit" id="submit" class="form-control" onclick='enableActivity();'/>	
		</div>
	  </div>
	  <div id="tabs-2">
		<div id="home">
			<form id="activity-upload" name="activity-upload">
				Upload a zip file : &nbsp;&nbsp;<br /><br />
				<input type="file" name="activity-file" id="activity-file" class="form-control"/><br /><br />
				<input type="button" value="Add Activity" name="submit" id="submit" class="form-control" onclick='addActivity();'/>	
			</form>
		</div>
	  </div>
	  <div id="tabs-3">
	  </div>
	</div>

	</div>
</div>
<?php }
}
?>