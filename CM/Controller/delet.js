$( document ).ready(function(){
    $('#hov1').css('opacity', '0');
    $('#hov2').css('opacity', '0');
    $('#hov3').css('opacity', '0');
    $('#hov4').css('opacity', '0');
    $('#hov5').css('opacity', '0.3');
});

function btn_dcli() {
    window.location.href = './monitor_Priv/deletecli_Mon.php';
}

function btn_dase() {
    window.location.href = './monitor_Priv/deletease_Mon.php';
}

function btn_caco() {
    window.location.href = './monitor_Priv/createaco_Mon.php';
}