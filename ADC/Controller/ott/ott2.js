$(document).ready(function() {
    // Cuando el valor del select cambia
    $('#bio2').css('bottom','1100px');
    $('#logg').css('bottom','276px');
    $('#sid_img').css('position','relative');
    $('#sid_img').css('bottom','30px');
    $('#sid_img2').css('position','relative');
    $('#sid_img2').css('bottom','30px');
    $('#sid_img3').css('position','relative');
    $('#sid_img3').css('bottom','30px');
    $('#sid_img4').css('position','relative');
    $('#sid_img4').css('bottom','30px');
    $('#sid_img5').css('position','relative');
    $('#sid_img5').css('bottom','30px');
    $('#var').css('margin-top','40px');
    $('#respuestaTexto').css('right','190px');
    $('#actin').css('right','225px');
    $('#data2').css('left','670px');

});

function ques() {
    $('#quest').css('display','none');
    $('#next').css('margin-top','10px');
    $('#bio2').css('bottom','875px');
    $('#quest2').css('display','block');
}

function ques_ini() {
    $('#quest').css('display','none');
    $('#next').css('margin-top','10px');
    $('#bio2').css('bottom','1170px');
    $('#quest2').css('display','block');
}
function ques11() {
    $('#quest').css('display','block');
    $('#next').css('margin-top','0');
    $('#bio2').css('bottom','1250px');
    $('#quest2').css('display','none');
}

function ques2() {
    $('#quest2').css('display','none');
    $('#quest3').css('display','block');
    $('#bio2').css('bottom','845px');
    $('#que2').css('bottom','2px');
}

function ques22() {
    $('#quest2').css('display','block');
    $('#quest3').css('display','none');
}

function ques3() {
    $('#quest3').css('display','none');
    $('#quest4').css('display','block');
}

function ques33() {
    $('#quest3').css('display','block');
    $('#quest4').css('display','none');
}

function ques4() {
    $('#quest4').css('display','none');
    $('#quest5').css('display','block');
}

function ques44() {
    $('#quest4').css('display','block');
    $('#quest5').css('display','none');
}

function ques5() {
    $('#quest5').css('display','none');
    $('#quest6').css('display','block');
}

function ques55() {
    $('#quest5').css('display','block');
    $('#quest6').css('display','none');
}

function ques6() {
    $('#quest6').css('display','none');
    $('#quest7').css('display','block');
}

function ques66() {
    $('#quest6').css('display','block');
    $('#quest7').css('display','none');
}

function empty() {
    $('#respuestaTexto').val('');
    console.log("El textarea ha sido vaciado.");
}

function one_ini() {
    location.href='./gesottini_Adc.php';
}

function updateAllNames() {
    // Obtener el valor del primer input
    const name = document.getElementById('nameInput').value.trim();

    const email = document.getElementById('emaInput').value.trim();

    // Asignar "xxxx" si el campo está vacío
    const finalName = name === "" ? "xxxx" : name;

    const finalEma = email === "" ? "xxxx" : email;

    const textarea = document.getElementById('que2');
    textarea.value = `Señ@r ${finalName} Vamos a generar un cambio de clave de mi etb, y verificas nuevamente
 
Tienes acceso al correo ${finalEma} ?

Valida el correo ${finalEma} te llego un mensaje para realizar el cambio de clave recuerda validar bandeja de entrada, correo no deseado y bandeja de spam, generas el cambio de clave. Recuerda no debe ser una clave que anteriormente hayas utilizado`;
}