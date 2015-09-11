<div id="demoGamesConfigurationInner"> 
	<!--<h4>Demo Games Page Settings &nbsp; <span class="glyphicon glyphicon-info-sign" aria-hidden="true"></span></h4>
	<hr>-->
	{foreach from=$demo_games_configuration item=item}
	<div id="accordion">
 	 	<h3><span class="glyphicon glyphicon-home" aria-hidden="true"></span>&nbsp;&nbsp;Home Page Settings</h3>
		<div>
			<p>
	<table id="tblDemoGamesConfiguration" data-toggle="table">
						
					<tr><th><?php echo "<br /><b><font color='#094AB1'>Current Theme: <i><u> Minimal-theme </u></i></b></font></th></tr>
					<tr>
						<td>Home Page Title : </td>
						<td><input type="text" name="home_title" value="{$item->HomePageTitle}" id="home_title" placeholder="Please enter your Home Page title" class="form-control" /></td>	
					</tr>

					<tr>				
						<td>Home Background Image: </td>
						<td><input type="file" name="home-image" id="home-image"/></td>
					</tr>

					<tr>
						<td>Home Page Description/Tagline: </td>
						<td><!--<textarea id="home_tagline" name="home_tagline" class="form-control" ><?php echo $demo_games_configuration["home_tagline"]}</textarea>--><div id='home_tagline' name="home_tagline" style="margin-top: 30px;">{$item->HomePageDescription}</div></td>	
					</tr>
					
					<tr>				
						<td>Header Image: </td>
						<td><input type="file" name="header-image" id="header-image"/></td>
					</tr>

				</table>
			</p>
		</div>
 	 	<h3><span class="glyphicon glyphicon-expand" aria-hidden="true"></span>&nbsp;&nbsp;Games Page Settings</h3>
		<div>
			<p>
	<table id="tblDemoGamesConfiguration" data-toggle="table">
						
						<tr>
							<td>Games Page Title : </td>
							<td><input type="text" name="games_title" value="{$item->GamesPageTitle}" id="games_title" placeholder="Please enter your Games Page title" class="form-control" /></td>	
						</tr>
						
						<tr>
							<td>Games Page Description: </td>
							<td><!--<textarea id="games_description" name="games_description" class="form-control" ><?php echo $demo_games_configuration["games_description"]}</textarea>--><div id='games_description' name="games_description" style="margin-top: 30px;">{$item->GamesPageDescription}</div></td>	
						</tr>
						
						<tr>
							<td>Games Page Button Text : </td>
							<td><input type="text" name="game_page_button_text" value="{$item->GamesPageButtonText}" id="game_page_button_text" placeholder="Please enter your Games Page Button text" class="form-control" /></td>	
						</tr>
						<tr>
							<td>Games Page Button Link: </td>
							<td><input type="text" name="game_page_button_link" value="{$item->GamesPageButtonLink}" id="game_page_button_link" placeholder="Please enter your Games Page Button link" class="form-control" /></td>	
						</tr>
						
					</table>
			</p>
		</div>
 	 	<h3><span class="glyphicon glyphicon-stats" aria-hidden="true"></span>&nbsp;&nbsp;Result Page Settings</h3>
		<div>
			<p>
	<table id="tblDemoGamesConfiguration" data-toggle="table">
						
						<tr>
							<td>Visible : </td>
							<td>

								<input type="radio" name="result_page_visible" id="result_page_visible_yes" value="yes" {if $item->ResultPageVisible == "yes"}checked{/if} />&nbsp;&nbsp;Yes&nbsp;&nbsp;
								<input type="radio" name="result_page_visible" id="result_page_visible_no" value="no" {if $item->ResultPageVisible == "no"}checked{/if} />&nbsp;&nbsp;No

							</td>	
						</tr>
						<tr>
							<td>Result Page Title : </td>
							<td><input type="text" name="result_title" value="{$item->ResultPageTitle}" id="result_title" placeholder="Please enter your Result Page title" class="form-control" /></td>	
						</tr>
				</table>
			</p>
		</div>
 	 	<h3><span class="glyphicon glyphicon-info-sign" aria-hidden="true"></span>&nbsp;&nbsp;Footer Settings</h3>
		<div>
			<p>
				<table id="tblDemoGamesConfiguration" data-toggle="table">

					<tr>
						<td>Footer Title : </td>
						<td><input type="text" name="footer_title" value="{$item->FooterTitle}" id="footer_title" placeholder="Please enter your Footer title" class="form-control" /></td>	
					</tr>
					<tr>
						<td>Footer Description: </td>
						<td><div id='footer_description' name="footer_description" style="margin-top: 30px;">{$item->FooterDescription}</div></td>	
					</tr>

				</table>
			</p>
		</div>
	</div>
	<input type="button" value="Save" name="submit" id="submit" class="form-control" onclick='updateDemoGamesConfiguration();'/>	
	{/foreach}
</div>
