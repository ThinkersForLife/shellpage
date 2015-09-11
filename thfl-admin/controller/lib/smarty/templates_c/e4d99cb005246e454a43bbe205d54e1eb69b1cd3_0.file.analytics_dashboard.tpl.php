<?php /* Smarty version 3.1.24, created on 2015-07-22 16:25:44
         compiled from "/var/www/Build/DEV/ShellRedefined/thfl-admin/view/analytics_dashboard.tpl" */ ?>
<?php
/*%%SmartyHeaderCode:89267678755af76b0c71118_37825870%%*/
if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'e4d99cb005246e454a43bbe205d54e1eb69b1cd3' => 
    array (
      0 => '/var/www/Build/DEV/ShellRedefined/thfl-admin/view/analytics_dashboard.tpl',
      1 => 1437562540,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '89267678755af76b0c71118_37825870',
  'variables' => 
  array (
    'site_id' => 0,
  ),
  'has_nocache_code' => false,
  'version' => '3.1.24',
  'unifunc' => 'content_55af76b0cb7ce4_67273660',
),false);
/*/%%SmartyHeaderCode%%*/
if ($_valid && !is_callable('content_55af76b0cb7ce4_67273660')) {
function content_55af76b0cb7ce4_67273660 ($_smarty_tpl) {

$_smarty_tpl->properties['nocache_hash'] = '89267678755af76b0c71118_37825870';
?>
<h2>Analytics Dashboard</h2><hr />
<div class="row text-center">
	<div class="col-md-6">
		<div id="widgetIframe"><span>Visits Over Time</span><iframe width="100%" height="350" src="http://analytics.connectedforlife.in/index.php?module=Widgetize&action=iframe&columns[]=nb_visits&widget=1&moduleToWidgetize=VisitsSummary&actionToWidgetize=getEvolutionGraph&idSite=<?php echo $_smarty_tpl->tpl_vars['site_id']->value;?>
&period=day&date=yesterday&disableLink=1&widget=1" scrolling="no" frameborder="0" marginheight="0" marginwidth="0"></iframe></div>
	</div>
	<div class="col-md-3">
<div id="widgetIframe"><span>Real Time Visitor Count</span><iframe width="100%" height="350" src="http://analytics.connectedforlife.in/index.php?module=Widgetize&action=iframe&widget=1&moduleToWidgetize=Live&actionToWidgetize=getSimpleLastVisitCount&idSite=<?php echo $_smarty_tpl->tpl_vars['site_id']->value;?>
&period=day&date=yesterday&disableLink=1&widget=1" scrolling="no" frameborder="0" marginheight="0" marginwidth="0"></iframe></div>
	</div>
	<div class="col-md-3">
		<div id="widgetIframe"><span>Visitors in Real-time</span><iframe width="100%" height="350" src="http://analytics.connectedforlife.in/index.php?module=Widgetize&action=iframe&widget=1&moduleToWidgetize=Live&actionToWidgetize=widget&idSite=<?php echo $_smarty_tpl->tpl_vars['site_id']->value;?>
&period=day&date=yesterday&disableLink=1&widget=1&token_auth=4b4c0d7e07b301deb4b467472c09e1cf" scrolling="no" frameborder="0" marginheight="0" marginwidth="0"></iframe></div>
	</div>
</div>

<div class="row text-center">
	<div class="col-md-4">
		<div id="widgetIframe"><span>Length of Visits</span><iframe width="100%" height="350" src="http://analytics.connectedforlife.in/index.php?module=Widgetize&action=iframe&widget=1&moduleToWidgetize=VisitorInterest&actionToWidgetize=getNumberOfVisitsPerVisitDuration&idSite=<?php echo $_smarty_tpl->tpl_vars['site_id']->value;?>
&period=day&date=yesterday&disableLink=1&widget=1&token_auth=4b4c0d7e07b301deb4b467472c09e1cf" scrolling="no" frameborder="0" marginheight="0" marginwidth="0"></iframe></div>
	</div>
	<div class="col-md-4">
		<div id="widgetIframe"><span>Visitor Browser</span><iframe width="100%" height="350" src="http://analytics.connectedforlife.in/index.php?module=Widgetize&action=iframe&widget=1&moduleToWidgetize=UserSettings&actionToWidgetize=getBrowser&idSite=<?php echo $_smarty_tpl->tpl_vars['site_id']->value;?>
&period=day&date=yesterday&disableLink=1&widget=1&token_auth=4b4c0d7e07b301deb4b467472c09e1cf" scrolling="no" frameborder="0" marginheight="0" marginwidth="0"></iframe></div>
	</div>
	<div class="col-md-4">
		<div id="widgetIframe"><span>Visits by Local Time</span><iframe width="100%" height="350" src="http://analytics.connectedforlife.in/index.php?module=Widgetize&action=iframe&widget=1&moduleToWidgetize=VisitTime&actionToWidgetize=getVisitInformationPerLocalTime&idSite=<?php echo $_smarty_tpl->tpl_vars['site_id']->value;?>
&period=day&date=yesterday&disableLink=1&widget=1&token_auth=4b4c0d7e07b301deb4b467472c09e1cf" scrolling="no" frameborder="0" marginheight="0" marginwidth="0"></iframe></div>
	</div>
</div>
<?php }
}
?>