function home() {
    location.href='../adc_Home/geshome_Adc.php';
}

function tv() {
    location.href='../adc_Tv/gestvini_Adc.php';
}

function phone() {
    location.href='../adc_Line/geslnini_Adc.php';
}

function net() {
    location.href='../adc_Inter/gesinterini_Adc.php';
}

function ott() {
    location.href='../adc_Ott/gesottini_Adc.php';
}

function mod() {
    $('#modal-loading').modal('toggle')
    setTimeout(() => {
    $( document ).ready(function() {
        $('#modal-loading').modal('hide')
        $('#modal-indi').modal('toggle')
    });
    }, "4000");
}

function tou() {
    $('#modal-loading').modal('toggle')
    setTimeout(() => {
    $( document ).ready(function() {
        $('#modal-loading').modal('hide')
        $('#modal-re').modal('toggle')
    });
    }, "4000");
}

function man() {
    
}