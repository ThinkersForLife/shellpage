$(function(){

	function validateEmail(email) {
		  var re = /^([\w-]+(?:\.[\w-]+)*)@((?:[\w-]+\.)*\w[\w-]{0,66})\.([a-z]{2,6}(?:\.[a-z]{2})?)$/i;
		  return re.test(email);
	}
	function validateEmailwithDomain(email,domain) {

	    var re = /^\s*[\w\-\+_]+(\.[\w\-\+_]+)*\@[\w\-\+_]+\.[\w\-\+_]+(\.[\w\-\+_]+)*\s*$/;

	    if (re.test(email)) {

						if (email.indexOf('@'+domain, email.length - '@'+domain.length) !== -1) {
								return 1;
						} else {
								alert('Email must be a '+domain+' e-mail address (your.name@'+domain+').');
								return 0;
						}

	    } else {

						alert('Not a valid e-mail address.');
						return 0;

	    }

	}

	function updatePostOrder() { 		
			var arr = [];
		  $("#sortable2 li").each(function(){
		    arr.push($(this).attr('id'));
		  });
		  $(this).removeClass( "droptrue" );
		  $('#postOrder').val(arr.join(''));
		  $('#disWord').text(arr.join(''));
	}
	function includeTimerScripts(){
	}
	function fixedScripts(){
					$.ajax({
									type: "POST",
									url: "themes/assets/GameLoaders/getResult.php",
									data: "stluserteg=eurt&ngr=tr",
									success: function(data){
										var htmlData='<div class="row centered"><p class="centered"><i class="icon icon-circle"></i><i class="icon icon-circle"></i><i class="icon icon-circle"></i></p><div class="col-lg-4 col-lg-offset-4 centered"><table class="scoresDiv center-table" ><tr><!--<th>Rank</th>--><th>Name</th><th>Company</th><th>Total Score</th></tr>';
										var decodedArr=JSON.parse(data);
										var email=$("#subdomain").val();
										var counter=0;
										var rank=0;
										$.each(JSON.parse(data), function(idx, obj) {			
													counter++;							
													if(obj.totalScr === undefined || obj.totalScr === null || obj === null)
														obj.totalScr=0;

													if(obj.rawScr === undefined || obj === null)
														obj.rawScr=0;
													else{
														obj.rawScr	=	JSON.parse("["+obj.rawScr+"]");
														obj.rawScr = Math.max.apply(Math, obj.rawScr); 
													}
													if(obj.email==email  && email!=""){
																	rank=counter;
																	document.getElementById("user-rank").innerHTML=rank;
																	$("#game-score-bar").fadeIn(500);
																	$("#logout").fadeIn(500);				
																	htmlData+='<tr><!--<td>'+rank+'</td>--><td><span class="userResult" id="userResult">'+obj.name+'</span></td><td><span class="userResult" id="userResult">'+obj.companyName+'</span></td><td><span class="userResult">'+obj.totalScr+'</span></td></tr>';		
													}else{											
																	if(counter<= 10){
																	htmlData+='<tr><!--<td>'+rank+'</td>--><td><span class="scores">'+obj.name+'</span></td><td>'+obj.companyName+'</td><td><span class="scores">'+obj.totalScr+'</span></td></tr>';		
																	}	
													}
										});	
										if(document.getElementById("user-high-score").innerHTML=="" || document.getElementById("user-high-score").innerHTML==" " || document.getElementById("user-high-score").innerHTML==null){
												document.getElementById("user-high-score").innerHTML="Not available";
										}
										if(document.getElementById("user-rank").innerHTML=="" || document.getElementById("user-rank").innerHTML==" " || document.getElementById("user-rank").innerHTML==null){
												document.getElementById("user-rank").innerHTML="Not available";
										}		
										htmlData+='<br><br></div></div><!-- col-lg-8 --></div><!-- row -->';
										$("#resultBoard").html(htmlData);
									}
					});
					$.ajax({
									type: "POST",
									url: "themes/assets/GameLoaders/getResult.php",
									data: "getuserscores=eurt",
									success: function(data){
										$("#user-high-score").html(data);
									}
					});
					
					$.ajax({
									type: "POST",
									url: "themes/assets/GameLoaders/getResult.php",
									data: "getuserserial=eurt",
									success: function(data){

										if(data==0){
											jQuery("#game-score-bar").fadeOut(500);	
										}else{									
											$("#user-serial").html(data + " / 10");
										}

									}
					});
					
					$.ajax({
									type: "POST",
									url: "themes/assets/GameLoaders/getResult.php",
									data: "getusername=eurt",
									success: function(data){
										$("#user-name").html(data);
									}
					});

					$("#loginDiv").css("display","inline");

					$("#processingDiv").hide();

					var gameDivClone=$("#maincolumn").clone();

					/**					Login form code starts				**/

					$("#loginForm").submit(function(e){

								var visitor_name=$("#visitor_name").val();
								var visitor_email=$("#visitor_email").val();
								var visitor_location=$("#visitor_location").val();
								var company_name=$("#company_name").val();
								var user_answer=$("#postOrder").val();

								if(visitor_name==null || visitor_name==""){
									alert("Please enter your name....");
									return false;
								}

								var email_domain=$("#email_domain").val();
								var isEmailValid;
								isEmailValid=validateEmail(visitor_email);

								if(isEmailValid==0)
									return false;

								$("#loginForm").fadeOut(500);

								$("#contentwrapper").fadeIn(1000);		

								$.ajax({

												type: "POST",
												url: "themes/assets/inc/login.php",
												data: "action=login&submit=Login&visitor_name="+visitor_name+"&visitor_email="+visitor_email+"&company_name="+company_name+"&visitor_location="+visitor_location+"&Letters="+user_answer,

												success: function(data){
														$("#game-score-bar").fadeIn(500);
														$("#logout").fadeIn(500);
														includeTimerScripts();
														Example1.resetStopwatch();
														Example1.Timer.toggle();
														$("#subdomain").setVal(visitor_email);
												}
			
								});

								$("#contentwrapper").load("themes/assets/GameLoaders/flash_game.php",function(){

											fixedScripts();

								});

								e.preventDefault();
					});
					/**					Login form code ends				**/

					/**					Play again or continue button code starts				**/
					$(".playAgain").click(function(e){

								Example1.resetStopwatch();
			
								$("#contentwrapper").fadeOut(500);

								setTimeout(function(){

									$("#contentwrapper").load("themes/assets/GameLoaders/flash_game.php",function(){

												fixedScripts();
												Example1.Timer.toggle();								

									}).fadeIn(500);

								},500);

								e.preventDefault();

					});
					/**					Play again or continue button code ends				**/

					/**					Quadnation game javascript starts				**/
					$("ul.droptrue").sortable({
						connectWith: 'ul',
						opacity: 0.6,
						placeholder: "ui-state-highlight",
						update : updatePostOrder
					});

					$("#sortable1").delegate("li", "click", function() {

								$("#sortable2").append(this);
									updatePostOrder();

					});

					$("#sortable2").delegate("li", "click", function() {

						$("#sortable1").append(this);
						updatePostOrder();

					});

					$("#sortable1, #sortable2").disableSelection();

					updatePostOrder();
					/**					Quadnation game javascript ends				**/
		
					/**					Quadnation form submit button code starts				**/
					$("#quadnationForm").submit(function(e){
								e.preventDefault();
						    e.stopImmediatePropagation();
								includeTimerScripts();
								Example1.resetStopwatch();
								$("#stopwatch").fadeOut(500);
					
								var visitor_name=$("#visitor_name").val();
								var visitor_email=$("#visitor_email").val();
								var visitor_location=$("#visitor_location").val();
								var user_answer=$("#postOrder").val();

								$.ajax({
									type: "POST",
									url: "themes/assets/inc/submit.php",
									data: "test=true&submit=Send Answer&Letters="+user_answer,
									success: function(data){
					
										$("#contentwrapper").fadeOut(200);
										$("#processingDiv").fadeIn(200);
					
										setTimeout(function(){

															$("#contentwrapper").fadeIn(500).html(data);	
															$(".playAgain").bind("click",function(){
	
																		includeTimerScripts();
																		$("#stopwatch").fadeIn(1000);
																		$("#loginForm").hide();
																		$("#contentwrapper").fadeOut(1000);
																		setTimeout(function(){

																			$("#contentwrapper").load("themes/assets/GameLoaders/flash_game.php",function(){

																						includeTimerScripts();
																						fixedScripts();
																						Example1.Timer.toggle();


																			}).fadeIn(1000);

																		},600);

															});

														$("#processingDiv").fadeOut(200);

										},500);			
									}//Success ends

								});//Ajax call ends
						return false;
					});//quadnation form ends
					/**					Quadnation form submit button code ends				**/

	}
	//fixedScripts ends here

	fixedScripts();

});



  function resizeIframe(obj) {
    obj.style.height = (obj.contentWindow.document.body.scrollHeight+100) + 'px';
  }

