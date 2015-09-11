function saveScore(score){
	$.ajax({
		url: 'http://192.168.1.54/Build/DEV/ShellRedefined/thfl-admin/assets/Games/QuizEngine/result.php',
		type: 'POST',
		data: 'score='+$("#user_score").val(),
		success:function(data){
			fixedScripts();
		}
	});
}
