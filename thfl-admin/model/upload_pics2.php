<?php
/**
 * (C) Resalat Haque 2013
 * @link http://www.w3bees.com
 *
 */
 $table = "quadnation";
 $pwd1 = getcwd ();
 $aok = 0;
 	include_once('config.php');
 //$errors = "";
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
	include_once('config.php');
	
	if (!empty($_POST['word'])) {
		# prevent sql injection
		$word = mysql_real_escape_string($_POST['word']);
		# word between 3-16
		if (strlen($word) >= 3) {
			# query users table
			$query = mysql_query("SELECT slno FROM $table WHERE word = '{$word}'");
			if (mysql_num_rows($query) < 1) {
				echo 200; # word not exist in db
				$aok = 1;
			} else {
			
			if(isset($_POST['submit'])) {
		  			$errors .= "The word <u>" . $_POST['word'] . "</u> already exists <br>";
		  			$aok = 0;
		  	}
			else {
				echo 201; # word already exist
				}
			}
		} else {
			if(isset($_POST['submit'])) {
		  			$errors .= "The word is less than 3 chars<br>";
		  			$aok = 0;
		  		}
			else {
				echo 201;
			}
    }
	}
	mysql_close($link); 
	if(!isset($_POST['submit'])) {
	return; # stop execution
	}
}

?>


<html>
<head>
	<title>Upload 4 pics one word</title>
<link rel="stylesheet" href="css/style2.css" />
	<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
	<script>
	$(document).ready(function(){
		var wordCheck = $('#wordCheck');
		$('#word').on('keyup', function(){
			var word = $('#word').val();
			if (word.length >= 3) {
				$.ajax({
					type: 'POST',
					cache: 'false',
					data: {word: word}, // form data
					beforeSend: function() {
						// show loading image
						wordCheck.attr('class', 'wordLoading');
					},
					success: function(d) {
						console.log(d)
						if (d == 200) {
							// show ok image
							wordCheck.attr('class', 'wordPassed');
						}
						else if (d == 201) {
							// show fail image
							wordCheck.attr('class', 'wordFail');

						}
					}
				});
			};
		});
	});
	</script>	
	
	
	<style>
	body{text-align:center}
	
	</style>
</head>
<body>
<div id="wrap">	
	<?php
if(isset($_POST['submit'])) {
	
	$con=mysqli_connect(DB_HOST, DB_USER, DB_PASS,DB_NAME);

// Check connection
if (mysqli_connect_errno())
  {
  echo "Failed to connect to MySQL: " . mysqli_connect_error();
  }

$result = mysqli_query($con,"SELECT max(slno) as mslno FROM $table");
$row = mysqli_fetch_array($result);
$maxp = $row['mslno'] + 1;
//	echo $maxp;
	
$allowedExts = array("gif", "jpeg", "jpg", "png");
$all_pics = "";
$arrFiles = array("file1","file2","file3","file4",);
$_POST["word"] = trim(strtoupper($_POST["word"]));
$tags = $_POST["tags"];

  if($_POST["word"] !=""){
		  //$aok = 1;
		  if (!preg_match("/^[a-zA-Z]+$/", $_POST["word"])) {
		   $aok = 0;
		   $errors .= "Only letter, one word only<br>";		  
	  }
	  else {$word = $_POST["word"];}
		  }
	  else{
			  $aok = 0;
			  $errors .= "You did not type a word associated with the images <br>";
			} 
		
	
  

  foreach($arrFiles as $fl){
	  if($_POST[$fl] != ""){
		  //$aok = 1;
		  }
	  else{
		  $errors .= "A File is missing; must upload all 4 images<br>";
			  $aok = 0;
			  break;
			}  
	  
  }
 if ($aok ==1){	  
}
  //echo $_POST["word"];
  
 
if ($aok ==1){
function uploadFile($file) {
global $all_pics ;
$url = $file;
//$dir = "$pwd1//upload/";
$bname = basename($url);
if(copy($url, "./upload/" . $bname)) {
	echo "<h3>The files was coppied to disk</h3>";
	};
$all_pics .= " upload/" . $bname ;
}
 
 $pic = array();
 $i =1;
  foreach($arrFiles as $fl){
  	uploadFile($_POST["$fl"]);
  	$pic[$i] = $_POST["$fl"];
  	$i++;
  	//$all_pics .= " upload/" . $_FILES[$fl]["name"] ;
  }
  
  
   $output = shell_exec("$pwd1/reformat.xx  " . $all_pics );
      	echo "<pre>$output</pre> $all_pics";
      	if($output){
			$dirc = md5($maxp);
			if (!is_dir("$pwd1/pics/$dirc")){
				mkdir("$pwd1/pics/$dirc",0755);
			}
      	for ($i = 1; $i <= 4; $i++) {
			copy("./edit/".$i.".jpg","./pics/$dirc/".$i.".jpg");
			unlink("./edit/".$i.".jpg");
       	
		}
	
      	$sql="INSERT INTO $table (slno,word,pic1,pic2,pic3,pic4,folder,tags)
		VALUES
		('$maxp','$word','$pic[1]','$pic[2]','$pic[3]','$pic[4]','$dirc/','$tags')";

if (!mysqli_query($con,$sql))
  {
  die('Error: ' . mysqli_error($con));
  }
echo "<h3 style='color:green'>1 record added</h3>"; /**/
 }  
}
  print "<h2 style='color:red'>$errors</h2>";
  
  mysqli_close($con);
}
?>
<br>
<br>
	
<form action="#" method="post" enctype="multipart/form-data">
<div id="wordCheck"></div><?php //echo $pwd1 ;?>
		<div>
			<label><span>The Word:</span>
				<input type="text" maxlenght="16" id="word" type="text" name="word" value="<?php echo htmlspecialchars($_POST['word']) ;?>">
			</label>
		</div><br>
<label for="file">Tags:</label>
<input type="text" name="tags" value="<?php echo htmlspecialchars($_POST['tags']) ;?>"><br>
<label for="text">Filename1:</label>
<input type="text" name="file1" id="file1" value="<?php echo htmlspecialchars($_POST['file1']) ;?>"><br>
<label for="text">Filename2:</label>
<input type="text" name="file2" id="file2" value="<?php echo htmlspecialchars($_POST['file2']) ;?>"><br>
<label for="text">Filename3:</label>
<input type="text" name="file3" id="file3" value="<?php echo htmlspecialchars($_POST['file3']) ;?>"><br>
<label for="text">Filename4:</label>
<input type="text" name="file4" id="file4" value="<?php echo htmlspecialchars($_POST['file4']) ;?>"><br>
<br><br>
<input type="submit" name="submit" value="Submit">
<br>
<br>
</form>
</div>
</body>
</html>
