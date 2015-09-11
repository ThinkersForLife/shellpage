<html>
<head>
	<title>Upload 4 pics one word</title>
	<style>
	body{text-align:center}
	
	</style>
</head>
<body>
	
	<?php
if(isset($_POST['submit'])) {
	
	$con=mysqli_connect(DB_HOST, DB_USER, DB_PASS,DB_NAME);

// Check connection
if (mysqli_connect_errno())
  {
  echo "Failed to connect to MySQL: " . mysqli_connect_error();
  }


$result = mysqli_query($con,"SELECT max(slno) as mslno FROM 4pics1");
$row = mysqli_fetch_array($result);
$maxp = $row['mslno'] + 1;
//	echo $maxp;
	
$allowedExts = array("gif", "jpeg", "jpg", "png");
$all_pics = "";
$errors = "";
$arrFiles = array("file1","file2","file3","file4",);
$aok = 0;
$_POST["word"] = trim(strtoupper($_POST["word"]));
$tags = $_POST["tags"];
  if($_POST["word"] !=""){
		  $aok = 1;
		  }
	  else{
			  $aok = 0;
			  $errors .= "You did not type a word associated with the images <br>";
			} 
	if (!preg_match("/^[a-zA-Z]+$/", $_POST["word"])) {
		   $aok = 0;
		   $errors .= "Only letter, one word only<br>";		  
	  }
	  else {$word = $_POST["word"];}
	  

  foreach($arrFiles as $fl){
	  if($_FILES[$fl]["name"]){
		  $aok = 1;
		  }
	  else{
		  $errors .= "A File is missing; must upload all 4 images<br>";
			  $aok = 0;
			  break;
			}  
	  
  }
  //echo $_POST["word"];
  
 
if ($aok ==1){
function uploadFile($file) {
global $all_pics ;
$temp = explode(".", $_FILES[$file]["name"]);
$extension = end($temp);
if ($temp !=  "" ){
if ((($_FILES[$file]["type"] == "image/gif")
|| ($_FILES[$file]["type"] == "image/jpeg")
|| ($_FILES[$file]["type"] == "image/jpg")
|| ($_FILES[$file]["type"] == "image/pjpeg")
|| ($_FILES[$file]["type"] == "image/x-png")
|| ($_FILES[$file]["type"] == "image/png"))
&& ($_FILES[$file]["size"] < 2000000)
)
  {
  if ($_FILES[$file]["error"] > 0)
    {
    echo "Return Code: " . $_FILES[$file]["error"] . "<br>";
    }
  else
    {
    //echo "Upload: " . $_FILES[$file]["name"] . "<br>";
    //echo "Type: " . $_FILES[$file]["type"] . "<br>";
    //echo "Size: " . ($_FILES[$file]["size"] / 1024) . " kB<br>";
    //echo "Temp file: " . $_FILES[$file]["tmp_name"] . "<br>";
    $all_pics .= " upload/" . $_FILES[$file]["name"] ;

    if (file_exists("upload/" . $_FILES[$file]["name"]))
      {
      //echo $_FILES[$file]["name"] . " already exists. ";
      }
    else
      {
      move_uploaded_file($_FILES[$file]["tmp_name"],
      "upload/" . $_FILES[$file]["name"]);
      //echo "Stored in: " . "upload/" . $_FILES[$file]["name"];
      
      }
    }
  }
else
  {
  echo "Invalid file";
  }
}
  }
  foreach($arrFiles as $fl){
  	uploadFile($fl);
  	//$all_pics .= " upload/" . $_FILES[$fl]["name"] ;
  }
  
  
   $output = shell_exec("/var/www/play/jdnd/reformat.xx  " . $all_pics );
      	echo "<pre>$output</pre> $all_pics";
      	mkdir("/var/www/play/jdnd/pics/$maxp",0755);
      	for ($i = 1; $i <= 4; $i++) {
			copy("/var/www/play/jdnd/edit/".$i.".jpg","/var/www/play/jdnd/pics/".$maxp."/".$i.".jpg");
       	
		}
      	$sql="INSERT INTO 4pics1 (slno,word,folder,tags)
		VALUES
		('$maxp','$word','$maxp/','$tags')";

if (!mysqli_query($con,$sql))
  {
  die('Error: ' . mysqli_error($con));
  }
echo "1 record added";
  }
  print $errors;
  
  mysqli_close($con);
}
?>
<br>
<br>
	
<form action="upload_pics.php" method="post" enctype="multipart/form-data">
<label for="file">Word:</label>
<input type="text" name="word" value="<?php echo htmlspecialchars($_POST["word"]) ;?>"><br>
<label for="file">Tags:</label>
<input type="text" name="tags" value="<?php echo htmlspecialchars($_POST["word"]) ;?>"><br>
<label for="file">Filename1:</label>
<input type="file" name="file1" id="file1"><br>
<label for="file">Filename2:</label>
<input type="file" name="file2" id="file2"><br>
<label for="file">Filename3:</label>
<input type="file" name="file3" id="file3"><br>
<label for="file">Filename4:</label>
<input type="file" name="file4" id="file4"><br>
<br><br>
<input type="submit" name="submit" value="Submit">
<br>
<br>
</form>
</body>
</html>
