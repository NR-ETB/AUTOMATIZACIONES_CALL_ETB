$( document ).ready(function(){
    $('#hov4').css('opacity', '0.3');
    $('#hov1').css('opacity', '0');
    $('#hov2').css('opacity', '0');
    $('#hov3').css('opacity', '0');
    $('#hov5').css('opacity', '0');
});

function tabhys() {
    $('#modal-loading').modal('toggle');
    setTimeout(function() {
        $('#modal-loading').modal('hide');
        $('#modal_vista').modal('show');
    }, 2000);
}





