$( document ).ready(function() {

    $(".imagen2").click(function(){
        $("#gay").show();
        $(".image-preview").attr('src', $(this).attr('src'));
        $(".image-preview").attr('id', $(this).attr('id'));
    });

});