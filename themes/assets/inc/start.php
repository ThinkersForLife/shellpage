<?php // Starting the session to track the latest word
session_start();
// connect to MyQL db for the content
$mysql_id = mysql_connect('localhost', 'test', 'test');
mysql_select_db('test', $mysql_id);
$table = "4pics1";
// checking max serial number
    $sql0="SELECT max(slno) as mslno FROM $table LIMIT 1";
    $result0=mysql_query($sql0);
    $row0 = mysql_fetch_array($result0);
	 $mslno=$row0['mslno'];
//Mechanism to reset of increment the current word
if(!isset($_SESSION['serial']) || $_SESSION['serial'] > $mslno-1  ){
	$_SESSION['serial'] = 1 ;
	$_SESSION['score'] = 0 ;
}
elseif($_SESSION['serial'] == $mslno) {
	$_SESSION['serial'] = 1 ;
	$_SESSION['score'] = 0 ;
}
elseif(isset($_POST["submit"])) {
}
else {
$_SESSION['serial']=	$_SESSION['serial']+1 ;
}


$serial = $_SESSION['serial'];

if($_GET['num']) {
	$serial = $_GET['num'];
	}

//selecting the word using slno

 $sql="SELECT * FROM $table WHERE slno = $serial LIMIT 1";
    $resultx=mysql_query($sql);
// if not present create table    
    if (!$resultx)
    {
    //echo "No table exists";
    // Create a MySQL table
    //$tblname=$_SESSION['ID'];
    mysql_query("CREATE TABLE IF NOT EXISTS `$table` (
  `slno` int(5) NOT NULL auto_increment COMMENT 'unique serial number pk',
  `edate` timestamp NOT NULL default CURRENT_TIMESTAMP COMMENT 'timestamp of entry',
  `word` varchar(64) default NULL COMMENT 'The good word',
  `folder` varchar(64) default NULL COMMENT 'Name of the folder',
  `hashtag` varchar(64) default NULL,
  PRIMARY KEY  (`slno`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COMMENT='This table has content that stores information of the quiz r' AUTO_INCREMENT=1")
    or die(mysql_error());
    //echo " so I created one!";
    }
$row = mysql_fetch_array($resultx);
// saving the word and the folder in a variable
$word=$row['word'];

$folder=$row['folder'];
// scoring if right or wrong
if($_POST["submit"] == "Send Answer") {
	if($_POST["Letters"] == $word && $_SESSION['word'] != $word){
				$_SESSION['word'] = $word ;
				$_SESSION['score'] = $_SESSION['score'] + 10 ;	
				$time1 = time() - $_SESSION['time1'];
	}
}

/*
$sql="SELECT * FROM $table WHERE slno = $serial - 1 LIMIT 1";
 $resulty=mysql_query($sql);
 $row = mysql_fetch_array($resulty);

$word_old=$row['word'];

$folder_old=$row['folder'];*/

?>
