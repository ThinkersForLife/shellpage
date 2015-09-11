<div id="themeConfigurationMain">

	<form method="post" action="#">
	
	<?php
	include("../view/theme_configuration.php");
	?>
	    
	</form>
	
</div>

<script>

$(document).ready(function(){
	$("#dvLoading").show();
	$("#settingsDiv").hide();
	$("#settingDiv#home").show();
	
	$("#registration").addClass("current");
	
	$("#mainData").show();
	$("#locationData").hide();
	
    $("#registration").click(function(){

			$("#dvLoading").show();
	    	$.ajax({
				url: "functions.php",
				type: "POST",	
				data: "report=user",
				success: function(data){					
					$(".container").html(data);
					$(".the_table").dataTable({'pageLength' : 25,"sDom": '<"top"flp>rt<"bottom"flp><"clear">'});
					$("#dvLoading").hide();
				}
			});
			
			$("#registration").addClass("current");
			$("#location").removeClass();
			
			$("#mainData").show();
			$("#locationData").hide();
	
  });
    
});
  
</script>
