<?php

//echo getcwd();
//preg_replace($pattern, $replacement, $string);
//echo "<h3>". str_replace( basename ($_SERVER['SCRIPT_FILENAME']) , "" , $_SERVER[HTTP_HOST] . $_SERVER[REQUEST_URI] ) ."</h3>";
//echo basename ($_SERVER['SCRIPT_FILENAME']);


    // Allowed extentions.
    $allowedExts = array("jpeg", "jpg", "png", "gif");

    // Get filename.
    $temp = explode(".", $_FILES["file"]["name"]);

    // Get extension.
    $extension = end($temp);

    // Validate uploaded files.
    // Do not use $_FILES["file"]["type"] as it can be easily forged.
    $finfo = finfo_open(FILEINFO_MIME_TYPE);
    $mime = finfo_file($finfo, $_FILES["file"]["tmp_name"]);

    if ((($mime == "image/gif")
    || ($mime == "image/jpeg")
    || ($mime == "image/png")
    || ($mime == "image/jpg"))
    && in_array($extension, $allowedExts)) {
        // Generate new random name.
        $name = sha1(microtime()) . "." . $extension;

        // Save file in the uploads folder.
        move_uploaded_file($_FILES["file"]["tmp_name"], getcwd() . "/themes/assets/uploads/" . $name);

        // Generate response.
        $response = new StdClass;
        $response->link = "http://". str_replace( basename ($_SERVER['SCRIPT_FILENAME']) , "" , $_SERVER[HTTP_HOST] . $_SERVER[REQUEST_URI] ) ."/themes/assets/uploads/" . $name;
        echo stripslashes(json_encode($response));

   }
   
?>
