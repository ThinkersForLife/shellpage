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
				{section name=activities loop=$activities}
						<option value="{$activities[$smarty.section.activities.index]}" {($activities[$smarty.section.activities.index]==$activity_name)?'selected':''} >
										{$activities[$smarty.section.activities.index]}
						</option>
				{/section}
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
