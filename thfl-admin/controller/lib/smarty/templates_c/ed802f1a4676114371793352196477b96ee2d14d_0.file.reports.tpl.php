<?php /* Smarty version 3.1.24, created on 2015-06-18 15:40:40
         compiled from "/var/www/Build/DEV/ShellRedefinedWithFB/thfl-admin/view/reports.tpl" */ ?>
<?php
/*%%SmartyHeaderCode:65437927955829920cc08a9_36216147%%*/
if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'ed802f1a4676114371793352196477b96ee2d14d' => 
    array (
      0 => '/var/www/Build/DEV/ShellRedefinedWithFB/thfl-admin/view/reports.tpl',
      1 => 1433832300,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '65437927955829920cc08a9_36216147',
  'variables' => 
  array (
    'results' => 0,
    'activity_name' => 0,
  ),
  'has_nocache_code' => false,
  'version' => '3.1.24',
  'unifunc' => 'content_55829920d0c545_75477267',
),false);
/*/%%SmartyHeaderCode%%*/
if ($_valid && !is_callable('content_55829920d0c545_75477267')) {
function content_55829920d0c545_75477267 ($_smarty_tpl) {

$_smarty_tpl->properties['nocache_hash'] = '65437927955829920cc08a9_36216147';
?>
<div id="reportsConfigurationInner"> 
<!--	<h4>Manage Activities &nbsp; <span class="glyphicon glyphicon glyphicon-edit" aria-hidden="true"></span></h4>
	<hr>-->
	<div id="reports_tab">
	  <ul>
	    <li><a href="#tabs-2"><span class="glyphicon glyphicon-stats" aria-hidden="true"></span>&nbsp;&nbsp;All Results</a></li>
	  </ul>
	  <div id="tabs-1">			
		<br />
		<a href="export.php" style='float:right;color:blue;'>Export to Excel</a><br /><br />
		<div id="home">	
			<table class="table table-striped table-hover table-bordered display" id="result-table" cellspacing="0" width="100%">
				<thead>
					<tr>
					  <th>#</th>
					  <th>Name</th>
					  <th>Email</th>
					  <th>Location</th>
					  <th>Quiz Name</th>
					  <th>Max Score</th>
					  <th>Min Score</th>
					  <th>Total Score</th>
					  <th>Total Game Time</th>
					</tr>
				</thead>	
				<tbody>
				<?php if (isset($_smarty_tpl->tpl_vars['smarty']->value['section']['reports'])) unset($_smarty_tpl->tpl_vars['smarty']->value['section']['reports']);
$_smarty_tpl->tpl_vars['smarty']->value['section']['reports']['name'] = 'reports';
$_smarty_tpl->tpl_vars['smarty']->value['section']['reports']['loop'] = is_array($_loop=$_smarty_tpl->tpl_vars['results']->value) ? count($_loop) : max(0, (int) $_loop); unset($_loop);
$_smarty_tpl->tpl_vars['smarty']->value['section']['reports']['show'] = true;
$_smarty_tpl->tpl_vars['smarty']->value['section']['reports']['max'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['reports']['loop'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['reports']['step'] = 1;
$_smarty_tpl->tpl_vars['smarty']->value['section']['reports']['start'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['reports']['step'] > 0 ? 0 : $_smarty_tpl->tpl_vars['smarty']->value['section']['reports']['loop']-1;
if ($_smarty_tpl->tpl_vars['smarty']->value['section']['reports']['show']) {
    $_smarty_tpl->tpl_vars['smarty']->value['section']['reports']['total'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['reports']['loop'];
    if ($_smarty_tpl->tpl_vars['smarty']->value['section']['reports']['total'] == 0)
        $_smarty_tpl->tpl_vars['smarty']->value['section']['reports']['show'] = false;
} else
    $_smarty_tpl->tpl_vars['smarty']->value['section']['reports']['total'] = 0;
if ($_smarty_tpl->tpl_vars['smarty']->value['section']['reports']['show']):

            for ($_smarty_tpl->tpl_vars['smarty']->value['section']['reports']['index'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['reports']['start'], $_smarty_tpl->tpl_vars['smarty']->value['section']['reports']['iteration'] = 1;
                 $_smarty_tpl->tpl_vars['smarty']->value['section']['reports']['iteration'] <= $_smarty_tpl->tpl_vars['smarty']->value['section']['reports']['total'];
                 $_smarty_tpl->tpl_vars['smarty']->value['section']['reports']['index'] += $_smarty_tpl->tpl_vars['smarty']->value['section']['reports']['step'], $_smarty_tpl->tpl_vars['smarty']->value['section']['reports']['iteration']++):
$_smarty_tpl->tpl_vars['smarty']->value['section']['reports']['rownum'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['reports']['iteration'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['reports']['index_prev'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['reports']['index'] - $_smarty_tpl->tpl_vars['smarty']->value['section']['reports']['step'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['reports']['index_next'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['reports']['index'] + $_smarty_tpl->tpl_vars['smarty']->value['section']['reports']['step'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['reports']['first']      = ($_smarty_tpl->tpl_vars['smarty']->value['section']['reports']['iteration'] == 1);
$_smarty_tpl->tpl_vars['smarty']->value['section']['reports']['last']       = ($_smarty_tpl->tpl_vars['smarty']->value['section']['reports']['iteration'] == $_smarty_tpl->tpl_vars['smarty']->value['section']['reports']['total']);
?>
				<tr>
					<td><?php echo $_smarty_tpl->getVariable('smarty')->value['section']['reports']['index'];?>
</td>
					<td><?php echo $_smarty_tpl->tpl_vars['results']->value[$_smarty_tpl->getVariable('smarty')->value['section']['reports']['index']]['name'];?>
</td>
					<td><?php echo $_smarty_tpl->tpl_vars['results']->value[$_smarty_tpl->getVariable('smarty')->value['section']['reports']['index']]['email'];?>
</td>
					<td><?php echo $_smarty_tpl->tpl_vars['results']->value[$_smarty_tpl->getVariable('smarty')->value['section']['reports']['index']]['location'];?>
</td>
					<td><?php echo $_smarty_tpl->tpl_vars['activity_name']->value;?>
</td>
					<td><?php echo $_smarty_tpl->tpl_vars['results']->value[$_smarty_tpl->getVariable('smarty')->value['section']['reports']['index']]['maxScr'];?>
</td>
					<td><?php echo $_smarty_tpl->tpl_vars['results']->value[$_smarty_tpl->getVariable('smarty')->value['section']['reports']['index']]['minScr'] == '' ? 0 : $_smarty_tpl->tpl_vars['results']->value[$_smarty_tpl->getVariable('smarty')->value['section']['reports']['index']]['minScr'];?>
</td>
					<td><?php echo $_smarty_tpl->tpl_vars['results']->value[$_smarty_tpl->getVariable('smarty')->value['section']['reports']['index']]['totalGameTime'];?>
</td>
					<td><?php echo $_smarty_tpl->tpl_vars['results']->value[$_smarty_tpl->getVariable('smarty')->value['section']['reports']['index']]['totalScr'];?>
</td>
				</tr>
				<?php endfor; endif; ?>
				<?php echo '<?php ';?>$count=0;foreach($results as $item){ $count++;<?php echo '?>';?>
					<tr>
						<th scope="row"><?php echo '<?=';?> $count <?php echo '?>';?></th>
						<td><?php echo '<?=';?> $item['name'] <?php echo '?>';?></td>
						<td><?php echo '<?=';?> $item['email'] <?php echo '?>';?></td>
						<td><?php echo '<?=';?> $item['location'] <?php echo '?>';?></td>
						<td><?php echo '<?=';?> ($item['quizName']=="")?"Word It":$item['quizName'] <?php echo '?>';?></td>
						<td><?php echo '<?=';?> $item['maxScr'] <?php echo '?>';?></td>
						<td><?php echo '<?=';?> ($item['minScr']=="")?0:$item['minScr'] <?php echo '?>';?></td>
						<td><?php echo '<?=';?> $item['totalGameTime'] <?php echo '?>';?></td>
						<td><?php echo '<?=';?> $item['totalScr'] <?php echo '?>';?></td>
					</tr>
				<?php echo '<?php ';?>} <?php echo '?>';?>
				</tbody>
			</table>
		</div>
	  </div>
	</div>

	</div>
</div>
<?php }
}
?>