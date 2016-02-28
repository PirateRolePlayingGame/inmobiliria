$( document ).ready(function() {


    $(".imagen").mouseover(function(){
        $(this).find('.coso').css("visibility", "visible");
    });
    $(".imagen").mouseout(function(){
        $(this).find('.coso').css("visibility", "hidden");
    });

    $( ".imagen" ).click(function() {
  		$( "#gay" ).show();
	});

	



});