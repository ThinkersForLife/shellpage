function loadAddPage(){
	$("div#container").load("controller/add_page.php #addPageMain",function (){
		$('#example').dataTable();
	});
}