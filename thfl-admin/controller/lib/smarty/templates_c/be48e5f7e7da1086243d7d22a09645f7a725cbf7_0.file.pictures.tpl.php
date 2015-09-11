<?php /* Smarty version 3.1.24, created on 2015-06-26 14:28:01
         compiled from "/var/www/Build/DEV/ShellRedefined/thfl-admin/view/pictures.tpl" */ ?>
<?php
/*%%SmartyHeaderCode:1175779513558d14193a3ac2_57369371%%*/
if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'be48e5f7e7da1086243d7d22a09645f7a725cbf7' => 
    array (
      0 => '/var/www/Build/DEV/ShellRedefined/thfl-admin/view/pictures.tpl',
      1 => 1433832300,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '1175779513558d14193a3ac2_57369371',
  'variables' => 
  array (
    'pictures' => 0,
  ),
  'has_nocache_code' => false,
  'version' => '3.1.24',
  'unifunc' => 'content_558d141947e6f7_14804598',
),false);
/*/%%SmartyHeaderCode%%*/
if ($_valid && !is_callable('content_558d141947e6f7_14804598')) {
function content_558d141947e6f7_14804598 ($_smarty_tpl) {

$_smarty_tpl->properties['nocache_hash'] = '1175779513558d14193a3ac2_57369371';
?>
<div id="picturesConfigurationInner"> 


	<div id="accordion">
 	 	<h3><span class="glyphicon glyphicon-edit" aria-hidden="true"></span>&nbsp;&nbsp;Add Pictures</h3>
		<div>
			<form id="addPictures" method="post"  enctype="multipart/form-data">
				<table id="tblDemoGamesConfiguration" data-toggle="table">
						
					<tr>
						<td>Word : </td>
						<td><input type="text" name="word" value="" id="word" placeholder="Please enter the word" class="form-control" required="required"/></td>	
					</tr>
					<tr>				
						<td>Selct Exactly 4 Picture : </td>
						<td><input type="file" name="pictures[]" id="pictures" required="required" multiple="multiple"/></td>
					</tr>
					<tr>
						<td>Category : </td>
						<td><input type="text" name="category" value="" id="category" placeholder="Please enter the category" class="form-control" /></td>	
					</tr>
					<tr>
						<td>Tags : </td>
						<td><input type="text" name="tags" value="" id="tags" placeholder="Please enter the tags" class="form-control" /></td>	
					</tr>

				</table></p>

						<input type="button" value="Add a new picture" name="submit" id="submit" class="form-control" onclick="addPictures();"/>	
			</form>
		</div>
	</div>
<hr/>
	<div id="pictures_grid">
	  <ul>
	    <li><a href="#tabs-2"><span class="glyphicon glyphicon-stats" aria-hidden="true"></span>&nbsp;&nbsp;All Words</a></li>
	  </ul>
	  <div id="tabs-1">			
		<br />
<!--		<a href="export.php" style='float:right;color:blue;'>Export to Excel</a><br /><br />	-->
		<div id="home">	
			<table class="table table-striped table-hover table-bordered display" id="result-table" cellspacing="0" width="100%">
				<thead>
					<tr>
					  <th>#</th>
					  <th>Word</th>
					  <th>Pic 1</th>
					  <th>Pic 2</th>
					  <th>Pic 3</th>
					  <th>Pic 4</th>
					  <th>Category</th>
					  <th>Tags</th>
					  <th>Upload Date&Time</th>
					  <th>Delete</th>
					</tr>
				</thead>	
				<tbody>
				<?php echo '<?php ';?>$count=0;foreach($results as $item){ $files=scandir("../../themes/assets/pics/".$item['slno']."/",1); $count++;<?php echo '?>';?>
				<?php if (isset($_smarty_tpl->tpl_vars['smarty']->value['section']['pictures'])) unset($_smarty_tpl->tpl_vars['smarty']->value['section']['pictures']);
$_smarty_tpl->tpl_vars['smarty']->value['section']['pictures']['name'] = 'pictures';
$_smarty_tpl->tpl_vars['smarty']->value['section']['pictures']['loop'] = is_array($_loop=$_smarty_tpl->tpl_vars['pictures']->value) ? count($_loop) : max(0, (int) $_loop); unset($_loop);
$_smarty_tpl->tpl_vars['smarty']->value['section']['pictures']['show'] = true;
$_smarty_tpl->tpl_vars['smarty']->value['section']['pictures']['max'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['pictures']['loop'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['pictures']['step'] = 1;
$_smarty_tpl->tpl_vars['smarty']->value['section']['pictures']['start'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['pictures']['step'] > 0 ? 0 : $_smarty_tpl->tpl_vars['smarty']->value['section']['pictures']['loop']-1;
if ($_smarty_tpl->tpl_vars['smarty']->value['section']['pictures']['show']) {
    $_smarty_tpl->tpl_vars['smarty']->value['section']['pictures']['total'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['pictures']['loop'];
    if ($_smarty_tpl->tpl_vars['smarty']->value['section']['pictures']['total'] == 0)
        $_smarty_tpl->tpl_vars['smarty']->value['section']['pictures']['show'] = false;
} else
    $_smarty_tpl->tpl_vars['smarty']->value['section']['pictures']['total'] = 0;
if ($_smarty_tpl->tpl_vars['smarty']->value['section']['pictures']['show']):

            for ($_smarty_tpl->tpl_vars['smarty']->value['section']['pictures']['index'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['pictures']['start'], $_smarty_tpl->tpl_vars['smarty']->value['section']['pictures']['iteration'] = 1;
                 $_smarty_tpl->tpl_vars['smarty']->value['section']['pictures']['iteration'] <= $_smarty_tpl->tpl_vars['smarty']->value['section']['pictures']['total'];
                 $_smarty_tpl->tpl_vars['smarty']->value['section']['pictures']['index'] += $_smarty_tpl->tpl_vars['smarty']->value['section']['pictures']['step'], $_smarty_tpl->tpl_vars['smarty']->value['section']['pictures']['iteration']++):
$_smarty_tpl->tpl_vars['smarty']->value['section']['pictures']['rownum'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['pictures']['iteration'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['pictures']['index_prev'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['pictures']['index'] - $_smarty_tpl->tpl_vars['smarty']->value['section']['pictures']['step'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['pictures']['index_next'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['pictures']['index'] + $_smarty_tpl->tpl_vars['smarty']->value['section']['pictures']['step'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['pictures']['first']      = ($_smarty_tpl->tpl_vars['smarty']->value['section']['pictures']['iteration'] == 1);
$_smarty_tpl->tpl_vars['smarty']->value['section']['pictures']['last']       = ($_smarty_tpl->tpl_vars['smarty']->value['section']['pictures']['iteration'] == $_smarty_tpl->tpl_vars['smarty']->value['section']['pictures']['total']);
?>
					<tr>
						<th scope="row"><?php echo $_smarty_tpl->tpl_vars['pictures']->value[$_smarty_tpl->getVariable('smarty')->value['section']['pictures']['index']]['slno'];?>
</th>
						<td><?php echo $_smarty_tpl->tpl_vars['pictures']->value[$_smarty_tpl->getVariable('smarty')->value['section']['pictures']['index']]['word'];?>
</td>
						<td><img src="../themes/assets/pics/<?php echo $_smarty_tpl->tpl_vars['pictures']->value[$_smarty_tpl->getVariable('smarty')->value['section']['pictures']['index']]['slno'];?>
/<?php echo $_smarty_tpl->tpl_vars['pictures']->value[$_smarty_tpl->getVariable('smarty')->value['section']['pictures']['index']]['picture_list'][0];?>
" class="pictures-thumbnails" alt="Pic1"/></td>
						<td><img src="../themes/assets/pics/<?php echo $_smarty_tpl->tpl_vars['pictures']->value[$_smarty_tpl->getVariable('smarty')->value['section']['pictures']['index']]['slno'];?>
/<?php echo $_smarty_tpl->tpl_vars['pictures']->value[$_smarty_tpl->getVariable('smarty')->value['section']['pictures']['index']]['picture_list'][1];?>
" class="pictures-thumbnails" alt="Pic2"/></td>
						<td><img src="../themes/assets/pics/<?php echo $_smarty_tpl->tpl_vars['pictures']->value[$_smarty_tpl->getVariable('smarty')->value['section']['pictures']['index']]['slno'];?>
/<?php echo $_smarty_tpl->tpl_vars['pictures']->value[$_smarty_tpl->getVariable('smarty')->value['section']['pictures']['index']]['picture_list'][2];?>
" class="pictures-thumbnails" alt="Pic3"/></td>
						<td><img src="../themes/assets/pics/<?php echo $_smarty_tpl->tpl_vars['pictures']->value[$_smarty_tpl->getVariable('smarty')->value['section']['pictures']['index']]['slno'];?>
/<?php echo $_smarty_tpl->tpl_vars['pictures']->value[$_smarty_tpl->getVariable('smarty')->value['section']['pictures']['index']]['picture_list'][3];?>
" class="pictures-thumbnails" alt="Pic4"/></td>
						<td><?php echo $_smarty_tpl->tpl_vars['pictures']->value[$_smarty_tpl->getVariable('smarty')->value['section']['pictures']['index']]['category'];?>
</td>
						<td><?php echo $_smarty_tpl->tpl_vars['pictures']->value[$_smarty_tpl->getVariable('smarty')->value['section']['pictures']['index']]['tags'];?>
</td>
						<td><?php echo $_smarty_tpl->tpl_vars['pictures']->value[$_smarty_tpl->getVariable('smarty')->value['section']['pictures']['index']]['edate'];?>
</td>
						<th scope="row"><a href="" onclick="deletePicture(<?php echo $_smarty_tpl->tpl_vars['pictures']->value[$_smarty_tpl->getVariable('smarty')->value['section']['pictures']['index']]['4th_picture_name'];?>
);">Delete</a></th>
					</tr>
				<?php endfor; endif; ?>
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