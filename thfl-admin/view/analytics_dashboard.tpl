<h2>Analytics Dashboard</h2><hr />
<div class="row text-center">
	<div class="col-md-6">
		<div id="widgetIframe"><span>Visits Over Time</span><iframe width="100%" height="350" src="http://analytics.connectedforlife.in/index.php?module=Widgetize&action=iframe&columns[]=nb_visits&widget=1&moduleToWidgetize=VisitsSummary&actionToWidgetize=getEvolutionGraph&idSite={$site_id}&period=day&date=yesterday&disableLink=1&widget=1" scrolling="no" frameborder="0" marginheight="0" marginwidth="0"></iframe></div>
	</div>
	<div class="col-md-3">
<div id="widgetIframe"><span>Real Time Visitor Count</span><iframe width="100%" height="350" src="http://analytics.connectedforlife.in/index.php?module=Widgetize&action=iframe&widget=1&moduleToWidgetize=Live&actionToWidgetize=getSimpleLastVisitCount&idSite={$site_id}&period=day&date=yesterday&disableLink=1&widget=1" scrolling="no" frameborder="0" marginheight="0" marginwidth="0"></iframe></div>
	</div>
	<div class="col-md-3">
		<div id="widgetIframe"><span>Visitors in Real-time</span><iframe width="100%" height="350" src="http://analytics.connectedforlife.in/index.php?module=Widgetize&action=iframe&widget=1&moduleToWidgetize=Live&actionToWidgetize=widget&idSite={$site_id}&period=day&date=yesterday&disableLink=1&widget=1&token_auth=4b4c0d7e07b301deb4b467472c09e1cf" scrolling="no" frameborder="0" marginheight="0" marginwidth="0"></iframe></div>
	</div>
</div>

<div class="row text-center">
	<div class="col-md-4">
		<div id="widgetIframe"><span>Length of Visits</span><iframe width="100%" height="350" src="http://analytics.connectedforlife.in/index.php?module=Widgetize&action=iframe&widget=1&moduleToWidgetize=VisitorInterest&actionToWidgetize=getNumberOfVisitsPerVisitDuration&idSite={$site_id}&period=day&date=yesterday&disableLink=1&widget=1&token_auth=4b4c0d7e07b301deb4b467472c09e1cf" scrolling="no" frameborder="0" marginheight="0" marginwidth="0"></iframe></div>
	</div>
	<div class="col-md-4">
		<div id="widgetIframe"><span>Visitor Browser</span><iframe width="100%" height="350" src="http://analytics.connectedforlife.in/index.php?module=Widgetize&action=iframe&widget=1&moduleToWidgetize=UserSettings&actionToWidgetize=getBrowser&idSite={$site_id}&period=day&date=yesterday&disableLink=1&widget=1&token_auth=4b4c0d7e07b301deb4b467472c09e1cf" scrolling="no" frameborder="0" marginheight="0" marginwidth="0"></iframe></div>
	</div>
	<div class="col-md-4">
		<div id="widgetIframe"><span>Visits by Local Time</span><iframe width="100%" height="350" src="http://analytics.connectedforlife.in/index.php?module=Widgetize&action=iframe&widget=1&moduleToWidgetize=VisitTime&actionToWidgetize=getVisitInformationPerLocalTime&idSite={$site_id}&period=day&date=yesterday&disableLink=1&widget=1&token_auth=4b4c0d7e07b301deb4b467472c09e1cf" scrolling="no" frameborder="0" marginheight="0" marginwidth="0"></iframe></div>
	</div>
</div>
