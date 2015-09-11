<div id="reportsConfigurationInner"> 
<!--	<h4>Manage Activities &nbsp; <span class="glyphicon glyphicon glyphicon-edit" aria-hidden="true"></span></h4>
	<hr>-->
	<div id="reports_tab">
	  <ul>
	    <li><a href="#tabs-2"><span class="glyphicon glyphicon-stats" aria-hidden="true"></span>&nbsp;&nbsp;All Results</a></li>
	  </ul>
	  <div id="tabs-1">			
		<br />
		<a href="export.php?only=users" style='float:right;color:blue;'>Export to Excel Unique Users</a>  <a href="export.php?total=gamedata" style='float:right;color:blue;'>Export to Excel Total Game Data ||&nbsp;</a><br /><br />
		<div id="home">	
			<table class="table table-striped table-hover table-bordered display" id="result-table" cellspacing="0" width="100%">
				<thead>
					<tr>
					  <th>#</th>
					  <th>Name</th>
					  <th>Email</th>
					  <th>Location</th>
					  <th>Quiz Name</th>
					 <!-- <th>Max Score</th>
					  <th>Min Score</th>
					  <th>Games Played</th>
					  <th>Total Game Time</th>-->
					  <th>Total Score</th>
					</tr>
				</thead>	
				<tbody>

				{section name=reports loop=$results}
				<tr>
					<td>{($smarty.section.reports.index+1)}</td>
					<td>{$results[$smarty.section.reports.index].name}</td>
					<td>{$results[$smarty.section.reports.index].email}</td>
					<td>{$results[$smarty.section.reports.index].location}</td>
					<td>{$activity_name}</td>
					<!--<td>{($results[$smarty.section.reports.index].maxScr=='')?0:$results[$smarty.section.reports.index].maxScr}</td>
					<td>{($results[$smarty.section.reports.index].minScr=='')?0:$results[$smarty.section.reports.index].minScr}</td>
					<td>{($results[$smarty.section.reports.index].totalRows=='')?1:$results[$smarty.section.reports.index].totalRows}  Times</td>
					<td>{($results[$smarty.section.reports.index].totalGameTime=='')?1:$results[$smarty.section.reports.index].totalGameTime}</td>-->
					<td>{($results[$smarty.section.reports.index].totalScr=='')?0:$results[$smarty.section.reports.index].totalScr}</td>
				</tr>
				{/section}
				</tbody>
			</table>
		</div>
	  </div>
	</div>

	</div>
</div>
