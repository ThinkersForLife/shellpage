$(function(){

					$('#home-page-heading').addClass('animated bounce');

					$("#input-21b").on("rating.change", function(event, value, caption) {

							console.log(value);
							console.log(caption);
							$('.rating-active').fadeOut(1000);
			
							setTimeout(function(){

										$("#rate-activity").fadeIn(1000).html("Thank you for the ratings :)");				

										$.ajax({
														type: "POST",
														url: "themes/assets/GameLoaders/getResult.php",
														data: "logRatings="+value,
														success: function(data){
															//alert(data);
															setTimeout(function(){
																$("#rate-activity").fadeOut(1000);			
															},2000);
														}
										});			
								
							},1000);
					});	



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
	function getResult(){

					$.ajax({
									type: "POST",
									url: "themes/assets/GameLoaders/getResult.php",
									data: "stluserteg=eurt&ngr=tr",
									success: function(data){
										var htmlData='<div class="row centered">';
											htmlData+='<div class="col-md-6 col-md-offset-3 col-xs-10 col-xs-offset-1 centered scores-header center-table">';
												htmlData+='<div class="row centered">';
													htmlData+='<div class="col-md-4 col-xs-4">Name</div>';
													htmlData+='<div class="col-md-4 col-xs-4">Company</div>';
													htmlData+='<div class="col-md-4 col-xs-4">Score</div>';
												htmlData+='</div>';
											htmlData+='</div>';
										htmlData+='<div class="row centered">';
										htmlData+='<div class="col-md-6 col-md-offset-3 centered score-body center-table">';
										/*htmlData+='<table class="scoresDiv center-table"><tr><th>Name</th><th>Company</th><th>Total Score</th></tr>';*/
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
																	$("#game-score-bar").css("display","inline");
																	rank=counter;
																	document.getElementById("user-rank").innerHTML=rank;
																	$("#game-score-bar").fadeIn(500);
																	$("#logout").fadeIn(500);																		
																		htmlData+='<div class="row user-result">';
																		htmlData+='<div class="col-md-4 col-xs-4 centered">'+obj.name+'</div>';
																		htmlData+='<div class="col-md-4 col-xs-4 centered">'+obj.companyName+'</div>';
																		htmlData+='<div class="col-md-4 col-xs-4 centered">'+obj.totalScr+'</div>';
																		htmlData+="</div>";
																	/*htmlData+='<tr><td><span class="userResult" id="userResult">'+obj.name+'</span></td><td><span class="userResult" id="userResult">'+obj.companyName+'</span></td><td><span class="userResult">'+obj.totalScr+'</span></td></tr>';		*/
													}else{		
																	if(email!=""){$("#game-score-bar").fadeIn(500);}
																	if(counter<= 10){																	
																		htmlData+='<div class="row">';
																		htmlData+='<div class="col-md-4 col-xs-4 centered">'+obj.name+'</div>';
																		htmlData+='<div class="col-md-4 col-xs-4 centered">'+obj.companyName+'</div>';
																		htmlData+='<div class="col-md-4 col-xs-4 centered">'+obj.totalScr+'</div>';
																		htmlData+="</div>";
																		/*htmlData+='<tr><td><span class="scores">'+obj.name+'</span></td><td>'+obj.companyName+'</td><td><span class="scores">'+obj.totalScr+'</span></td></tr>';		*/
																	}	
													}
										});			
										/*if(document.getElementById("user-high-score").innerHTML=="" || document.getElementById("user-high-score").innerHTML==" " || document.getElementById("user-high-score").innerHTML==null){
												document.getElementById("user-high-score").innerHTML="Not available";
										}*/
										if(document.getElementById("user-rank").innerHTML=="" || document.getElementById("user-rank").innerHTML==" " || document.getElementById("user-rank").innerHTML==null){
												document.getElementById("user-rank").innerHTML="Not available";
										}
										htmlData+='<br><br></div></div><!-- col-lg-8 --></div><!-- row -->';
										$("#resultBoard").html(htmlData);
									}
					});
	}
	function getUserScores(){

					$.ajax({
									type: "POST",
									url: "themes/assets/GameLoaders/getResult.php",
									data: "getuserscores=eurt",
									success: function(data){
										//$("#user-high-score").html(data);
									}
					});

	}
	function fixedScripts(){
					getResult();
					getUserScores();
					/*
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
					*/
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
								var form_token=$("#form_token").val();

								var subdomain=$("#subdomain").val();

								if(visitor_name==null || visitor_name==""){
									alert("Please enter your name....");
									return false;
								}

								var email_domain=$("#email_domain").val();
								var isEmailValid;
								isEmailValid=validateEmail(visitor_email);

								if(isEmailValid==0)
									return false;

								$.ajax({

												type: "POST",
												url: "themes/assets/inc/login.php",
												data: "action=login&submit=Login&visitor_name="+visitor_name+"&visitor_email="+visitor_email+"&company_name="+company_name+"&visitor_location="+visitor_location+"&Letters="+user_answer+"&form_token="+form_token,

												success: function(data){
														if(data=="Login Successful"){

																$("#loginForm").fadeOut(500);
																$("#loginDiv").replaceWith("");

																$("#contentwrapper").fadeIn(1000);		
																//alert("Invalid email id");return false;
																$("#stopwatch").fadeIn(1000);
																(subdomain!=0)?setVal(visitor_email):"";
																$("#logout").fadeIn(500);
																includeTimerScripts();
																Example1.resetStopwatch();
																Example1.Timer.toggle();
																$("#game-score-bar").fadeIn(500);
																$("#contentwrapper").load("themes/assets/GameLoaders/flash_game.php",function(){

																			fixedScripts();

																});
														}else{
																//alert("Something went wrong! Please refresh the page and try again.");
																alert(data);
																return false;
														}
												},error: function(error){
															alert(data);return false;
												}
			
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
																		$("#loginDiv").replaceWith("");
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

