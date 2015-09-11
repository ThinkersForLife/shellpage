<div id="databaseConfigurationInner"> 
<!--	<h4>Database Settings &nbsp; <span class="glyphicon glyphicon-info-sign" aria-hidden="true"></span></h4>
	<hr>-->
	{foreach from=$activity_details item=item}
	<div id="accordion">
 	 	<h3><span class="glyphicon glyphicon-edit" aria-hidden="true"></span>&nbsp;&nbsp;Change Database Configuration</h3>
		<div>
			<p>
				<table id="tblDemoGamesConfiguration" data-toggle="table">
						
					<tr>
						<td>Name of Activity : </td>
						<td><input type="text" name="name_of_activity" value="{$item->NameofActivity}" id="name_of_activity" placeholder="Please enter your Name of Activity" class="form-control" /></td>	
					</tr>
					<tr>
						<td>Database Name : </td>
						<td><input type="text" name="database_name" value="{$dbname}" id="database_name" placeholder="Please enter your Database Name " class="form-control" /></td>	
					</tr>
					<tr>
						<td>Database User : </td>
						<td><input type="text" name="database_user" value="{$dbuser}" id="database_user" placeholder="Please enter your Database User" class="form-control" /></td>	
					</tr>
					<tr>
						<td>Database Password : </td>
						<td><input type="password" name="database_password" value="{$dbpass}" id="database_password" placeholder="Please enter your Database Password" class="form-control" /></td>	
					</tr>
					<tr>
						<td>Database Table : </td>
						<td><input type="text" name="database_table" value="{$dbtable}" id="database_table" placeholder="Please enter your Database Table" class="form-control" /></td>	
					</tr><!--
					<tr>
						<td>Domain : </td>
						<td><input type="text" name="domain" value="{$item->Domain}" id="domain" placeholder="Please enter your Domain Name" class="form-control" /></td>	
					</tr>-->
					<tr>
						<td>Email Domain Restriction : </td>
						<td><input type="text" name="email_domain" value="{$item->EmailDomain}" id="email_domain" placeholder="Please enter your Email Domain " class="form-control" /></td>	
					</tr>

					<tr>
						<td>Location: </td>
						<td><textarea id="location" name="location" class="form-control" >{$item->Location}</textarea></td>	
					</tr>
					
				</table></p>
		</div>	
	{/foreach}
	<input type="button" value="Save" name="submit" id="submit" class="form-control" onclick='updateDatabaseConfiguration();'/>	
</div>
