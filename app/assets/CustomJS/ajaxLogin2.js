$(document).ready(function(){
	$('#loader').hide();
	
	$('#loginform').submit(function(e){
		e.preventDefault();
		
		var formData = $('#loginform').serialize();
		
		$.ajax({
    		type: 'POST',
    		url: 'controllers/loginTest.php',
    		data: formData,
    		beforeSend: function(){
    			console.log("hue");
    			$('#loader').show();
    		},
		}).always(function(){
			$('#loader').hide();

		}).done(function(data){
			if(JSON.parse(data)){
				$('#mensaje').text("Login Exitoso");
				// window.location.replace("success.php");
			}else{
				$('#mensaje').text("login fallido");
			}

		}).fail(function(){
			
			$('#mensaje').text("login fallido");

		});
	});

	function xhr_get(url) {

		return $.ajax({
		url: url,
		type: 'get',
		dataType: 'json',
		beforeSend: showLoadingImgFn
		}).always(function() {
			
		}).fail(function() {
		
		});

	}

});