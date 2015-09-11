<?php
//echo getcwd();
$xml=simplexml_load_file("../../thfl-admin/config.xml");

if($xml===FALSE)
	$xml=simplexml_load_file("config.xml");

if($xml===FALSE)
	$xml=simplexml_load_file("../../../thfl-admin/config.xml");

if($xml===FALSE)
	$xml=simplexml_load_file("thfl-admin/config.xml");

if($xml===FALSE)
	$xml=simplexml_load_file("../../../config.xml");

include_once("../../thfl-admin/db_info.php");
include_once("db_info.php");
include_once("../../../thfl-admin/db_info.php");
include_once("thfl-admin/db_info.php");
include_once("../../../db_info.php");

define("LOGINEMAIL","admin@thinkersforlife.com");
define("PASSWORD","3dd4be5ac5274d25a04509fae11448f8");
define("PLAIN_TEXT_PASSWORD","admin-thfl@#01");
define("METHOD","AES-128-CBC");

//pr($xml);
define("DB_HOST","localhost");
/*define("DB_USERNAME",$xml->Configuration->DatabaseUser);
define("DB_PASSWORD",$xml->Configuration->DatabasePassword);
define("DB_NAME",$xml->Configuration->DatabaseName);*/

define("DB_USERNAME",$dbuser);
define("DB_PASSWORD",$dbpass);
define("DB_NAME",$dbname);

define("DEMO_GAMES_PAGE_CONFIG","demo_games_page_config");
define("RESULT_TABLE",$dbtable);
//define("RESULT_TABLE",$xml->Configuration->DatabaseTable);
//define("RESULT_TABLE",$xml->Configuration->RatingsTable);
define("RATINGS_TABLE","ratings");

