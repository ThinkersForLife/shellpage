<?php
    header("Content-type: text/javascript; charset: UTF-8");
	$filename = "../oneliners2.txt";
	$line_i_am_looking_for =  mt_rand(0,85);
	$lines = file( $filename , FILE_IGNORE_NEW_LINES );
	$theline = $lines[$line_i_am_looking_for] ;

?>
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
            shuffle();
            $("#boxcard img").hide();
            $("img").removeClass("opacity");
            count = 0;
            $("#msg").remove();
            $("#count").html("" + count);
            boxopened = "";
            imgopened = "";
            found = 0;
            s=0;
            return false;
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
                    $("#count").html("" + count);

                    if (found == 10) {
                        msg2 = 'Well played. The force is clearly strong with you.*Darth Vader breathing*';
			msg3 = 'Well played: \n <?php echo $theline ; ?>';
                        $("span.link").prepend(msg3);
                        alert(msg3);
                       send();
                        
                    }
                }
            }
        });
         
         
     function send() {
       
       setTimeout( post_to_url('thanks.php', {'q': s , 'w': count }) , 5000);
       
       
     }
         
         
    
