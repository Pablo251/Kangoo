$(document).ready(function () {
	$.ajax({
		url: "index"
	}).done(function(data) 
	{
		console.log(data)
	});
			var mySession = {
			"id": "2",
			"username": "Pablo"
		};
		$.post("<?php echo $this->url->get('index') ?>", mySession , function(data)
		{
             console.log(data);
	    }).done(function() { 
	 
	        alert("correcto");
	 
	    }).fail(function() {
	 
	        alert("error"); 
	    })
	// Boot should execute to sent the save account
	if (localStorage.kangoo != "undefined") {

		// $.post("json", mySession, function(){
		// 	alert("Success!");
		// });
		// $.ajax({
		// 	data: {"parametro1" : "valor1", "parametro2" : "valor2"},
		// 	type: "POST",
		// 	dataType: "json",
		// 	url: "index/json",
		// });
	}
});