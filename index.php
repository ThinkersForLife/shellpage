<?php
$xml=simplexml_load_file("thfl-admin/config.xml") or die("Error: Cannot load configuration file");
include("themes/".$xml->Configuration->ThemeName."/flash_index.php");
