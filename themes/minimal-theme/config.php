<?php
/**
 * DB Configuration
 */
define('DB_HOST', 'localhost');
define('DB_NAME', 'thinker6_testGames');
define('DB_USER', 'thinker6_testGam');
define('DB_PASS', 'testGames@#01');
/**
 * Connect and select MySQL DB
 */
$link = mysql_connect(DB_HOST, DB_USER, DB_PASS) or die('Could not connect to MySQL server! ') . mysql_error();
$db = mysql_select_db(DB_NAME) or die('Fail to select MySQL DB ') . mysql_error();
?>
