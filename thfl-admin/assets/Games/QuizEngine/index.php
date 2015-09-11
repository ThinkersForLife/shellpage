<?php
//error_reporting(-1);
//ini_set("display_errors","On");
$base_url="http://192.168.1.54/Build/DEV/ShellRedefined/thfl-admin/assets/Games/QuizEngine/";
?>
    <link href='http://fonts.googleapis.com/css?family=Roboto+Condensed' rel='stylesheet' type='text/css'>
    
     <!-- Bootstrap core CSS 
    <link href="<?php echo $base_url.'/';?>lib/css/bootstrap.min.css" rel="stylesheet">-->

    <link href="<?php echo $base_url.'/';?>lib/css/brand.css" rel="stylesheet">

    <div id="container" style="position:absolute;width:100%;height:100%;"></div>
    
    <!--<script src="<?php echo $base_url.'/';?>lib/js/jquery.js"></script>-->
    <script src="<?php echo $base_url.'/';?>lib/js/jquery.easing.1.3.js"></script>
    <script src="<?php echo $base_url.'/';?>lib/js/jquery.transit.min.js"></script>
    <script src="<?php echo $base_url.'/';?>lib/js/essemble_core.min.js"></script>
    <script src="<?php echo $base_url.'/';?>lib/js/mcq.js"></script>
    <script src="<?php echo $base_url.'/';?>lib/js/quiz.js"></script>
    <script src="<?php echo $base_url.'/';?>lib/js/custom.js"></script>
    
    <script>
    var quiz;

    function init(){
        
        //create the screen object which loads the xml and creates all screen elements
        quiz = new Screen({id:"myQuiz", xmlPath:'<?php echo $base_url.'/';?>lib/xml/brands.xml'});
        
        //choose a target div
        var targetDiv = get("container");
        
        //load it
        quiz.load(targetDiv,false);
    }
    
    //kick off
    $(document).ready(function() {
        init();
    });
    
    </script>
