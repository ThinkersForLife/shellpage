<?php 
include_once("../model/functions.php");
$xml=simplexml_load_file("../config.xml") or die("Error: Cannot load configuration file");
$results=getWordDetails();
//pr($results);exit();
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
					</tr><!--
					<tr>				
						<td>2nd Picture <span class="required-asterisk">*</span> : </td>
						<td><input type="file" name="pictures[]" id="pictures" required="required"/></td>
					</tr>
					<tr>				
						<td>3rd Picture <span class="required-asterisk">*</span> : </td>
						<td><input type="file" name="pictures[]" id="pictures" required="required"/></td>
					</tr>
					<tr>				
						<td>4th Picture <span class="required-asterisk">*</span> : </td>
						<td><input type="file" name="pictures[]" id="pictures" required="required"/></td>
					</tr>-->
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
				<?php $count=0;foreach($results as $item){ $files=scandir("../../themes/assets/pics/".$item['slno']."/",1); $count++;?>
					<tr>
						<th scope="row"><?= $item['slno'] ?></th>
						<td><?= $item['word'] ?></td>
						<td><img src="../themes/assets/pics/<?php echo $item['slno'].'/'.$files[3]; ?>" class="pictures-thumbnails" alt="Pic1"/></td>
						<td><img src="../themes/assets/pics/<?php echo $item['slno'].'/'.$files[2]; ?>" class="pictures-thumbnails" alt="Pic2"/></td>
						<td><img src="../themes/assets/pics/<?php echo $item['slno'].'/'.$files[1]; ?>" class="pictures-thumbnails" alt="Pic3"/></td>
						<td><img src="../themes/assets/pics/<?php echo $item['slno'].'/'.$files[0]; ?>" class="pictures-thumbnails" alt="Pic4"/></td>
						<td><?= $item['category'] ?></td>
						<td><?= $item['tags'] ?></td>
						<td><?= $item['edate'] ?></td>
						<th scope="row"><a href="" onclick="deletePicture(<?= $item['slno'] ?>);">Delete</a></th>
					</tr>
				<?php } ?>
				</tbody>
			</table>
		</div>
	  </div>
	</div>

	</div>
</div>
