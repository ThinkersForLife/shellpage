<?php
define("ROOTDIR", str_replace( "/thfl-admin/config.php" , "" , __FILE__));

define("SERVERADD", "http://" .  $_SERVER[HTTP_HOST] );
define("CONFIGFILE", ROOTDIR . "/thfl-admin/config.xml");
//echo dirname(__FILE__) ;
//echo str_replace( "/thfl-admin" , "" , getcwd());
//echo "http://" .  $_SERVER[HTTP_HOST]  ;
//echo getcwd() . "/config.xml";
