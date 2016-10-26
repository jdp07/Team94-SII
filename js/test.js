$("#updateForm").submit(function(){
	var str = $(this).serialize();
	$.ajax('updateEvent.php', str, function(result){
		alert(result); // the result variable will contain any text echoed by getResult.php
	});
	//return(false);
});

/*$(document).ready(function() {
	$(function() {
		$("#dialog").dialog({
			autoOpen: false
		});
		$("#button").on("click", function() {
			$("#dialog").dialog("open");
		});
	});
	
	$("#submit").click(function(e) {
		var add = $("#address").val();
		var date = $("#date").val();
		alert("Form Submitted Successfully......");
	});
});*/