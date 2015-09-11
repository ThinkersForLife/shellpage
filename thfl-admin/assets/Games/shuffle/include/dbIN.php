<?php
# Customize with your webhost information.
# Your host technicians can furnish the needed info
 include_once "config.php";
  
$mysql = mysql_connect($hostName, $userName, $passWord);
if(!$mysql)
{
echo "Cannot connect to database server.";
exit;
}
// select the database
$selected = mysql_select_db("$databaseName");
if(!$selected)
{
echo "Cannot select database.";
exit;
}

?>
