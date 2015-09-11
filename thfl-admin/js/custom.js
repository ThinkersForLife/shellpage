function capitaliseFirstLetter(string)
{
    return string.charAt(0).toUpperCase() + string.slice(1);
}
function reloadFroala(){
	$("div.loading").css("display","inline");
	$('#home_tagline').editable({
	
		inlineMode: false,

		// Set the file upload URL.
	        imageUploadURL: '../froala-upload-handler.php',

		  // Additional upload params.
	        imageUploadParams: {id: 'home_tagline'}	

	});	

	$('#games_description').editable({
	
		inlineMode: false,

		// Set the file upload URL.
	        imageUploadURL: '../froala-upload-handler.php',

		  // Additional upload params.
	        imageUploadParams: {id: 'games_description'}	

	});	

	$('#footer_description').editable({
	
		inlineMode: false,

		// Set the file upload URL.
	        imageUploadURL: '../froala-upload-handler.php',

		  // Additional upload params.
	        imageUploadParams: {id: 'footer_description'}	

	});

	/*$('#result_description').editable({
	
		inlineMode: false,

		// Set the file upload URL.
	        imageUploadURL: '../froala-upload-handler.php',

		  // Additional upload params.
	        imageUploadParams: {id: 'result_description'}	

	});*/
	$("div.loading").css("display","none");	

}
function updateVariables(){	
	var result = confirm("Are you sure you want to change the THEME CONFIGURATION ?");
	if (!result) {
	    return false;
	}
	$("div.loading").css("display","inline");
	var body_color=encodeURIComponent($("#body_color").val());
	var header_h1_color=encodeURIComponent($("#header_h1_color").val());
	var header_tagline_color=encodeURIComponent($("#header_tagline_color").val());
	var games_background_color=encodeURIComponent($("#games_background_color").val());
	var login_div_text_color=encodeURIComponent($("#login_div_text_color").val());
	var input_border_color=encodeURIComponent($("#input_border_color").val());
	var input_background_color=encodeURIComponent($("#input_background_color").val());
	var input_text_color=encodeURIComponent($("#input_text_color").val());
	var result_background_color=encodeURIComponent($("#result_background_color").val());
	var result_title_color=encodeURIComponent($("#result_title_color").val());
	var user_result_color=encodeURIComponent($("#user_result_color").val());
	var scores_div_text_color=encodeURIComponent($("#scores_div_text_color").val());
	var footer_text_color=encodeURIComponent($("#footer_text_color").val());
	var footer_background_color=encodeURIComponent($("#footer_background_color").val());
	var user_score_div_text_color=encodeURIComponent($("#user_score_div_text_color").val());
	var user_welcome_text_color=encodeURIComponent($("#user_welcome_text_color").val());
	var user_rank_text_color=encodeURIComponent($("#user_rank_text_color").val());

	$.ajax({	
		url: "model/functions.php",
		type: "POST",
		data: "change_theme_configuration=true&body_color="+body_color+"&header_h1_color="+header_h1_color+"&header_tagline_color="+header_tagline_color+"&games_background_color="+games_background_color+"&login_div_text_color="+login_div_text_color+"&input_border_color="+input_border_color+"&input_background_color="+input_background_color+"&input_text_color="+input_text_color+"&result_background_color="+result_background_color+"&result_title_color="+result_title_color+"&user_result_color="+user_result_color+"&scores_div_text_color="+scores_div_text_color+"&footer_text_color="+footer_text_color+"&footer_background_color="+footer_background_color+"&user_score_div_text_color="+user_score_div_text_color+"&user_welcome_text_color="+user_welcome_text_color+"&user_rank_text_color="+user_rank_text_color,
		success:function(data){
					$("div.loading").css("display","none");
					alert(data);
					$("#nav_theme_configuration").trigger("click");
		},
		error: function(data){
					$("div.loading").css("display","none");
					alert(data);
					$("#nav_theme_configuration").trigger("click");	
		},
	});	
}
function updateDatabaseConfiguration(){	
	var result = confirm("Are you sure you want to change the DATABASE CONFIGURATION ?");
	if (!result) {
	    return false;
	}
	$("div.loading").css("display","inline");
	var name_of_activity=encodeURIComponent($("#name_of_activity").val());
	var database_name=encodeURIComponent($("#database_name").val());
	var database_user=encodeURIComponent($("#database_user").val());
	var database_password=encodeURIComponent($("#database_password").val());
	var database_table=encodeURIComponent($("#database_table").val());
	var domain=encodeURIComponent($("#domain").val());
	var email_domain=encodeURIComponent($("#email_domain").val());
	var location=encodeURIComponent($("#location").val());
	$.ajax({	
		url: "model/functions.php",
		type: "POST",
		data: "updateXML=true&name_of_activity="+name_of_activity+"&database_name="+database_name+"&database_user="+database_user+"&database_password="+database_password+"&database_table="+database_table+"&domain="+domain+"&location="+location+"&email_domain="+email_domain,
		success:function(data){
					$("div.loading").css("display","none");
					alert(data);
					$("#nav_database_settings").trigger("click");
		},
		error: function(data){
					$("div.loading").css("display","none");
					alert(data);
					$("#nav_database_settings").trigger("click");	
		},
	});	
}


function addPictures(){

			var word=encodeURIComponent($("#word").val());
			var category=encodeURIComponent($("#category").val());
			var tags=encodeURIComponent($("#tags").val());

			if(word==null || word==""){
				alert("Please enter word name");return false;
			}

			var pictures=document.getElementById("pictures");
			// Get the selected files from the input.
			var files = pictures.files;		
	
			if(files.length!=4){
				alert("Please upload exactly 4 files");return false;
			}				

			var uploadedfilename = $('input[type=file]').val().split('\\').pop();

			//alert(file.name);	
			//return false;
	
			// Create a new FormData object.
			var formData = new FormData();	
	
			formData.append("beforeimageupload",word);

			// Loop through each of the selected files.
			for (var i = 0; i < files.length; i++) {

							var file = files[i];

							// Check the file type.
							if (!file.type.match('image.*')) {
					//		alert("Please select an image file...");
					//		return false;
							}

							// Add the file to the request.
							formData.append('photos[]', file, file.name);


			}
			// Set up the request.
			var xhr = new XMLHttpRequest();
			//alert(filename);
			// Open the connection.
			xhr.open('POST', 'model/quad-image-handler.php', true);
			// Set up a handler for when the request finishes.
			xhr.onload = function (e) {			  	  	  			 
			
					if (xhr.status === 200) {
									//alert(xhr.responseText);
									$.ajax({
											url: "model/functions.php",
											type: "POST",	
											data: "updateWords=1&word="+word+"&category="+category+"&tags="+tags+"&loc="+xhr.responseText,
											success: function(data){	
														$("div.loading").css("display","none");
														alert(data);
														$("#nav_add_pictures").trigger("click");	
											}
										});

						return false;
					}

			};
			
			xhr.send(formData);
/*
			// Send the Data.
			if(uploadedfilename!=null || uploadedfilename!=''){
				
			}else{
				$("div.loading").css("display","none");
			}*/

}


function updateDemoGamesConfiguration(){	
	$("div.loading").css("display","inline");
	var home_title=encodeURIComponent($("#home_title").val());
	var home_tagline=encodeURIComponent($("#home_tagline").editable("getHTML", true, true));
	var games_title=encodeURIComponent($("#games_title").val());
	var games_description=encodeURIComponent($("#games_description").editable("getHTML", true, true));
	var game_page_button_text=encodeURIComponent($("#game_page_button_text").val());
	var game_page_button_link=encodeURIComponent($("#game_page_button_link").val());
	var radios = document.getElementsByName('result_page_visible');

	for (var i = 0, length = radios.length; i < length; i++) {
		  if (radios[i].checked) {
		      // do whatever you want with the checked radio

					var result_page_visible=radios[i].value;

		      // only one radio can be logically checked, don't check the rest
		      break;
		  }
	}
	//console.log(result_page_visible);
	var result_title=encodeURIComponent($("#result_title").val());
	/*var result_description=encodeURIComponent($("#result_description").editable("getHTML", true, true));
	var result_page_button_text=encodeURIComponent($("#result_page_button_text").val());
	var result_page_button_link=encodeURIComponent($("#result_page_button_link").val());*/
	var contact_title=encodeURIComponent($("#contact_title").val());
	var address_line_1=encodeURIComponent($("#address_line_1").val());
	var address_line_2=encodeURIComponent($("#address_line_2").val());
	var city_state=encodeURIComponent($("#city_state").val());
	var phone=encodeURIComponent($("#phone").val());
	var email=encodeURIComponent($("#email").val());
	var homeImage=document.getElementById("home-image");
	var headerImage=document.getElementById("header-image");
	var footer_title=encodeURIComponent($("#footer_title").val());
	var footer_description=encodeURIComponent($("#footer_description").editable("getHTML", true, true));

	// Get the selected files from the input.
	var files = homeImage.files;	
	var file = files[0];
	var uploadedfilename = $('input[type=file]').val().split('\\').pop();

	//alert(file.name);	
	//return false;
	
	// Create a new FormData object.
	var formData = new FormData();
	
	// Loop through each of the selected files.
	for (var i = 0; i < files.length; i++) {
	  var file = files[i];

	  // Check the file type.
	  if (!file.type.match('image.*')) {
//		alert("Please select an image file...");
//		return false;
	  }

	  // Add the file to the request.
	  formData.append('photos[]', file, file.name);
	}

	if(headerImage.files.length>0){
		formData.append('header-image[]', headerImage.files[0], headerImage.files[0].name);
		headerImageName=headerImage.files[0].name;
	}else
		headerImageName=null;

	// Set up the request.
	var xhr = new XMLHttpRequest();
	//alert(filename);
	// Open the connection.
	xhr.open('POST', 'model/header-image-handler.php', true);
	
	var fileName="";
	// Set up a handler for when the request finishes.
	xhr.onload = function (e) {			  	  	  			 
	  
	  if (xhr.status === 200) {

		$.ajax({
			url: "model/functions.php",
			type: "POST",	
			data: "updateDemoGames=1&home_title="+home_title+"&home_tagline="+home_tagline+"&games_title="+games_title+"&games_description="+games_description+"&game_page_button_text="+game_page_button_text+"&game_page_button_link="+game_page_button_link+"&result_title="+result_title+"&result_page_visible="+result_page_visible+"&contact_title="+contact_title+"&address_line_1="+address_line_1+"&address_line_2="+address_line_2+"&city_state="+city_state+"&phone="+phone+"&email="+email+"&theme_name=minimal-theme"+"&home_page_image="+encodeURIComponent(uploadedfilename)+"&header_logo="+encodeURIComponent(headerImageName)+"&footer_title="+footer_title+"&footer_description="+footer_description,
			success: function(data){	
				$("div.loading").css("display","none");
				alert(data);
				$("#nav_demo_games_settings").trigger("click");	
			}
		});
		
	  } else {
		$("div.loading").css("display","none");
		alert('An error occurred!');
		return false;
	  }
	};
	
	// Send the Data.
	if(uploadedfilename!=null || uploadedfilename!=''){
		xhr.send(formData);
	}else{
		$("div.loading").css("display","none");
	}

	
}
function enableActivity(){
	$("div.loading").css("display","inline");
	var activity_name=$('#activity').find(":selected").text();
	$.ajax({
		url: "model/functions.php",
		type: "POST",	
		data: "activity="+activity_name,
		success: function(data){	
					$("div.loading").css("display","none");
					alert(data);
					$("#nav_activity_settings").trigger("click");	
		}
	});
	$("div.loading").css("display","none");
}
function addActivity(){

	$("div.loading").css("display","inline");

	var uploadedfilename = $('input[type=file]').val().split('\\').pop();

	var formData=new FormData();
	formData.append('activity-file',$('input[id="activity-file"]')[0].files[0],uploadedfilename); 

	// Set up the request.
	var xhr = new XMLHttpRequest();
	//alert(filename);
	// Open the connection.
	xhr.open('POST', 'model/functions.php', true);
	
	var fileName="";
	// Set up a handler for when the request finishes.
	xhr.onload = function (e) {			  	  	  			 
	  if (xhr.readyState==4) {
		  if (xhr.status === 200) {

			$("div.loading").css("display","none");
			alert(xhr.responseText);
		
		  } else {
			$("div.loading").css("display","none");
			alert('An error occurred!');
			return false;
		  }
	  }
	};
	
	// Send the Data.
	if(uploadedfilename!=null || uploadedfilename!=''){
		xhr.send(formData);
	}else{
		$("div.loading").css("display","none");
	}
	$("div.loading").css("display","none");
	$("#nav_activity_settings").trigger("click");	
}

function changeTheme(){
	$("div.loading").css("display","inline");
	var theme_name=$('#theme').find(":selected").text();
	$.ajax({
		url: "model/functions.php",
		type: "POST",	
		data: "theme="+theme_name,
		success: function(data){
			$("div.loading").css("display","none");
			alert(data);
			$("#nav_theme_settings").trigger("click");	
			location.reload();
		}
	});
	$("div.loading").css("display","none");
}

function deletePicture(slno){
	var result=confirm('Are you sure you want to DELETE this word with ALL THE PICTURES?');
	if(result){
		$.ajax({
				url: "model/functions.php",
				type: "POST",	
				data: "deletePicture="+slno,
				success: function(data){	
							$("div.loading").css("display","none");
							alert(data);
							$("#nav_add_pictures").trigger("click");	
				}
			});
	}else{
				$("#nav_add_pictures").trigger("click");	
	}
//this.preventDefault();
	return false;
}
