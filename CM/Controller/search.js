$( document ).ready(function(){
    $('#hov1').css('opacity', '0.3');
    $('#hov2').css('opacity', '0');
    $('#hov3').css('opacity', '0');
    $('#hov4').css('opacity', '0');
    $('#hov5').css('opacity', '0');
});

function tabcli() {
    $('#modal-loading').modal('toggle')
    setTimeout(() => {
        $('#modal-loading').modal('hide')
        $('#modal-vista').modal('toggle');
  }, 4000);
}

function searchcli() {
    $('#modal-loading').modal('toggle');
    setTimeout(function() {
        $('#modal-loading').modal('hide');
        alert("Por favor, ingresa un número de teléfono válido");
    }, 6000);

}









