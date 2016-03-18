$(document).ready(function(){
	$('#loader').hide();
	
	$('#loginform').submit(function(e){
		e.preventDefault();
		
		var formData = $('#loginform').serialize();
		
		$.ajax({
    		type: 'POST',
    		url: "controllers/ajaxLogin.php",
    		data: formData,
    		beforeSend: function(){
    			$('#loader').show();
    		},
		}).always(function(){
			$('#loader').hide();

		}).done(function(data){
			if(JSON.parse(data)){
				$('#mensaje').text("Login Exitoso");
				window.location.replace("http://lhgrupoinmobiliario.com/admin/inmuebles");
				// var url = 'http://example.com/vote/' + Username;
				// var form = $('<form action="' + url + '" method="post">' +
				//   			 '<input type="text" name="api_url" value="' + Return_URL + '" />' +
				//   			 '</form>');
				// $('body').append(form);
				// form.submit();

				
			}else{
				$('#mensaje').text("Login Fallido");
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