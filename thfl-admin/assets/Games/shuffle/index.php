<?php
session_start();
//error_reporting(-1);
//ini_set('display_errors', 'On');
$_SESSION['time']=time();
if(!isset($_SESSION['isLoggedIn']) && $_SESSION['isLoggedIn']!=true) {  
	echo "You are not allowed to view this page!";exit();
}
$card1="";$card2="";$sl="";
//echo getcwd();
$xml=simplexml_load_file("../../thfl-admin/config.xml");

if($xml===FALSE)
	$xml=simplexml_load_file("config.xml");

if($xml===FALSE)
	$xml=simplexml_load_file("../../../thfl-admin/config.xml");

if($xml===FALSE)
	$xml=simplexml_load_file("thfl-admin/config.xml");

$dir 				=  	dirname($_SERVER['PHP_SELF']);
$dirs 			= 	explode('/', $dir);
$base_path	=		"/".$dirs[1]."/".$dirs[2]."/".$dirs[3]."/thfl-admin/assets/Games/".$xml->Configuration->Activity."/";
//ini_set("include_path","thfl-admin/assets/Games/".$xml->Configuration->Activity."/");

//echo getcwd();

include_once "include/config.php";
include_once "include/dbIN.php";
 
  $table = "mg2";	
?>



					<!--<script type="text/javascript" src="thfl-admin/assets/Games/<?php echo $xml->Configuration->Activity; ?>/js/jquery-1.10.2.min.js"></script>-->
	        <link rel="stylesheet" type="text/css" href="thfl-admin/assets/Games/<?php echo $xml->Configuration->Activity; ?>/css/style-new.css">
	        <link rel="stylesheet" type="text/css" href="thfl-admin/assets/Games/<?php echo $xml->Configuration->Activity; ?>/css/game-new.css">
	        <script type="text/javascript" >
					var today=new Date();
					var h=0
					var m=0
					var s=0;
					var formObject = document.forms['theForm'];
					function startTime() {
						// add a zero in front of numbers<10
						m=0;
						s=s+1;
						$('#time').html("Time:" +s);
						t=setTimeout('startTime()',1000);
						if ( s > 1000 ) {
						//
							  //alert("msg2");
							  //post_to_url('thanks.php', {'q': s , 'w': count });
							  //location="thanks.php";
							//alert(msg2);
							return true;
						}

					}

					function SetValue()
					{
						document.getElementById('Hidden1').value = s;
						alert(document.getElementById('Hidden1').value);
					}
	
				function post_to_url(path, params, method) {
				    method = method || "post"; // Set method to post by default, if not specified.

				    // The rest of this code assumes you are not using a library.
				    // It can be made less wordy if you use one.
				    var form = document.createElement("form");
				    form.setAttribute("method", method);
				    form.setAttribute("action", path);

				    for(var key in params) {
					if(params.hasOwnProperty(key)) {
					    var hiddenField = document.createElement("input");
					    hiddenField.setAttribute("type", "hidden");
					    hiddenField.setAttribute("name", key);
					    hiddenField.setAttribute("value", params[key]);

					    form.appendChild(hiddenField);
					 }
				    }

				    document.body.appendChild(form);
				    form.submit();
				}
			
	        startTime();

        var boxopened = "";
        var imgopened = "";
        var count = 0;
        var found =  0;

        function randomFromTo(from, to){
            return Math.floor(Math.random() * (to - from + 1) + from);
        }

       function shuffle() {
            var children = $("#boxcard").children();
            var child = $("#boxcard div:first-child");

            var array_img = new Array();
            var array_alt = new Array();

            for (i=0; i<children.length; i++) {
                array_img[i] = $("#"+child.attr("id")+" img").attr("src");
                array_alt[i] = $("#"+child.attr("id")+" img").attr("alt");
                child = child.next();
            }

            var child = $("#boxcard div:first-child");

            for (z=0; z<children.length; z++) {
                randIndex = randomFromTo(0, array_img.length - 1);

                // set new image
                $("#"+child.attr("id")+" img").attr("src", array_img[randIndex]);
                $("#"+child.attr("id")+" img").attr("alt", array_alt[randIndex]);
                array_img.splice(randIndex, 1);
		 array_alt.splice(randIndex, 1);
                child = child.next();
            }
        }


        function resetGame() {
            /*shuffle();
            $("#boxcard img").hide();
            $("img").removeClass("opacity");
            count = 0;
            $("#msg").remove();
            $("#count").html("" + count);
            boxopened = "";
            imgopened = "";
            found = 0;
            s=0;*/
            location.reload(); 
            return false;
        }

         
     function send_it(  ) {

				 var tim = s ;
				 var clk = count ;
				 var score = Math.round(10000*(1/(tim + clk)));

			$.ajax({
					type:"POST",
					url:'thfl-admin/assets/Games/<?php echo $xml->Configuration->Activity; ?>/game-result.php',
					data:"time="+tim+"&clicks="+clk+"&score="+score,
					success:function(data){
						
					}
				});
				 setTimeout(function() {
		
					    $("#content").show(2000).html("<div id='main-result-div' class='box effect8'><h3>Stats</h3><div class='result-content'> Time: " + tim +"</div><div class='result-content'> Clicks: " + clk + "</div><div class='result-content'> And the Score is " + score + "</div> <div class='result-content'>Well done! You did it!</div></div><a href='javascript:' class='link' onclick='resetGame();'>Restart</a>");
				   		
					} , 5000);
       
     }
         
         


        $(document).ready(function() {
						
            $("#boxcard img").hide();
            $("#boxcard div").click(openCard);

            shuffle();

            function openCard() {

                id = $(this).attr("id");

                if ($("#"+id+" img").is(":hidden")) {
                    $("#boxcard div").unbind("click", openCard);

                    $("#"+id+" img").slideDown('fast');

                    if (imgopened == "") {
                        boxopened = id;
                        imgopened = $("#"+id+" img").attr("alt");
                        
                        setTimeout(function() {
                            $("#boxcard div").bind("click", openCard)
                        }, 300);
                    } else {
                        currentopened = $("#"+id+" img").attr("alt");
                        
                        if (imgopened != currentopened) {
                            // close again
                            setTimeout(function() {
                               // $("#"+id+" img").slideUp('fast');
                                //$("#"+boxopened+" img").slideUp('fast');
                                $("#"+id+" img").slideUp('fast');
                                $("#"+boxopened+" img").slideUp('fast');
                                boxopened = "";
                                imgopened = "";
                            }, 400);
                        } else {
                            // found
                            $("#"+id+" img").addClass("opacity");
                            $("#"+boxopened+" img").addClass("opacity");
                            found++;
                            boxopened = "";
                            imgopened = "";
                        }
                        
                        setTimeout(function() {
                            $("#boxcard div").bind("click", openCard)
                        }, 400);
                    }


                    count++;
                    $("#count").html("Clicks: " + count);

                    if (found == 6) {
                       
                       send_it();
                        
                    }
                }
            }
        });
         
	        </script>
	
		
		<!--<script type="text/javascript" src="thfl-admin/assets/Games/<?php echo $xml->Configuration->Activity; ?>/js/script2e-new.js"></script>-->

			<div id="content">
			
					<div id="boxbutton">

						<div id='center'>
								<span id="time" class='link' ></span>&nbsp;
								<span id="count" class="link" >0</span>
								<a href="javascript:" class="link" onclick="resetGame();">Reset</a>			        
						 </div>
				    	    		
					</div>

<?php

$result = mysql_query("SELECT  max(slno) as maxx , min(slno) as minn FROM $table") or die(mysql_error());

	while(false !== ($row = mysql_fetch_assoc($result))) { 
		$min = $row['minn'] ;
		$max = $row['maxx'] ; 
	}

	function nonRepeat($min,$max,$count) {

    	//prevent function from hanging 
    	//due to a request of more values than are possible    
    		if($max - $min < $count) {
        	return false;
    		}
    
   		$nonrepeatarray = array();
   		for($i = 0; $i < $count; $i++) {
      		$rand = rand($min,$max);
      //ensure value isn't already in the array
      //if it is, recalculate the rand until we
      //find one that's not in the array
      		while(in_array($rand,$nonrepeatarray)) {
      		  $rand = mt_rand($min,$max);
      		}
      
      //add it to the array
      		$nonrepeatarray[$i] = $rand;
   		}
   		return $nonrepeatarray;
	}

	//give it a test run
	$shuffle = nonRepeat($min,$max,6);

	foreach ($shuffle as $ts ) {
		$sl .= "$ts,";
	}


	$result2 = mysql_query("SELECT slno, img_src, img_src2 FROM $table WHERE slno IN( " . substr($sl, 0,-1) . " )") or die(mysql_error());
	$cnt=1;
	$cnt2=11;
	while(false !== ($row = mysql_fetch_assoc($result2))) { 
			if ($cnt != 11 ) {
			$card1 .="<div id='card$cnt'><img src='thfl-admin/assets/Games/".$xml->Configuration->Activity."/img/MGI/" . $row['img_src'] . "' alt='" . $row['slno'] . "' /></div>\n\r";
			$card2 .="<div id='card$cnt2'><img src='thfl-admin/assets/Games/".$xml->Configuration->Activity."/img/MGI/" . $row['img_src2'] . "' alt='" . $row['slno'] . "' /></div>\n\r";
		}
		$cnt2++;
		$cnt++;
	}


	include_once "include/dbOUT.php";

?>

	<div id="boxcard">
		<?php
			print $card1;
			print $card2;
		?> 
	</div>

</div>


</div>
