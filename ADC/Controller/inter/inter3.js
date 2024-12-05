$(document).ready(function() {
    // Cuando el valor del select cambia
    $('#bio2').css('bottom','1240px');
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
    $('#bio2').css('bottom','970px');
    $('#que2').css('bottom','1px');
}

function ques22() {
    $('#quest2').css('display','block');
    $('#quest3').css('display','none');
}

function ques3() {
    $('#quest3').css('display','none');
    $('#quest4').css('display','block');
    $('#bio2').css('bottom','830px');
}

function ques33() {
    $('#quest3').css('display','block');
    $('#quest4').css('display','none');
}

function ques4() {
    $('#quest4').css('display','none');
    $('#quest5').css('display','block');
    $('#bio2').css('bottom','1160px');
}

function ques44() {
    $('#quest4').css('display','block');
    $('#quest5').css('display','none');
}

function ques5() {
    $('#quest5').css('display','none');
    $('#quest6').css('display','block');
    $('#bio2').css('bottom','1020px');
}

function ques55() {
    $('#quest5').css('display','block');
    $('#quest6').css('display','none');
}

function ques6() {
    $('#quest6').css('display','none');
    $('#quest7').css('display','block');
    $('#bio2').css('bottom','1040px');
}

function ques66() {
    $('#quest6').css('display','block');
    $('#quest7').css('display','none');
}

function ques7() {
    $('#quest7').css('display','none');
    $('#quest8').css('display','block');
    $('#bio2').css('bottom','1000px');
}

function ques9() {
    $('#quest5').css('display','none');
    $('#quest9').css('display','block');
    $('#bio2').css('bottom','1055px');
}

function ques10() {
    $('#quest9').css('display','none');
    $('#quest10').css('display','block');
    $('#bio2').css('bottom','1000px');
}

function empty() {
    $('#respuestaTexto').val('');
    console.log("El textarea ha sido vaciado.");
}

function one_ini() {
    location.href='./gesinterini_Adc.php';
}

function actualizarTexto() {
    const selectRespuesta = document.getElementById("respuesta");
    const textarea = document.getElementById("respuestaTexto");

    const textos = {
        "1": "Envía guion de encuesta",
        "2": "Continua con el soporte realizar una configuración de tarjeta de red ",
    };

    const opcionSeleccionada = selectRespuesta.value;
    textarea.value = textos[opcionSeleccionada];

    console.log("Texto actualizado:", textarea.value);
}

function actualizarTexto2() {
    const selectRespuesta = document.getElementById("respuesta2");
    const textarea = document.getElementById("respuestaTexto");

    const textos = {
        "1": "Envía guion de encuesta",
        "2": "Continua con el soporte",
    };

    const opcionSeleccionada = selectRespuesta.value;
    textarea.value = textos[opcionSeleccionada];

    console.log("Texto actualizado:", textarea.value);
}

function actualizarTexto3() {
    const selectRespuesta = document.getElementById("respuesta3");
    const textarea = document.getElementById("respuestaTexto");

    const textos = {
        "1": "Envía guion de encuesta",
        "2": "Envía visita técnica",
    };

    const opcionSeleccionada = selectRespuesta.value;
    textarea.value = textos[opcionSeleccionada];

    console.log("Texto actualizado:", textarea.value);
}

function updateAllNames() {
    // Obtener el valor del primer input
    const name = document.getElementById('nameInput').value.trim();

    // Asignar "xxxx" si el campo está vacío
    const finalName = name === "" ? "xxxx" : name;

    const textarea = document.getElementById('que2');
    textarea.value = `En estos momentos vamos a apagar el modem🔴 y vamos a desconectar el cable 🔌de la energía por 10 segundos, y vas a encontrar un cable amarillo o blanco verifica que no presente ninguna ruptura, lo vas a estirar y ajusta las puntas 🙌 por favor con mucho cuidado. 🧐🔌

Señor@  ${finalName}  por favor verifica el estado de los leds todos deben quedar en verde, prueba el servicio si ya te funciona 😄

Cambiar la visual de todos en verde por alguno en rojo`;

    // Actualizar el contenido del textarea
    const textarea2 = document.getElementById('que3');
    textarea2.value = `Señor@ ${finalName} la intermitencia es por cable o wifi?`;

    const textarea3 = document.getElementById('que4');
    textarea3.value = `Señor@ ${finalName} la intermitencia es por cable o wifi ?

Para ambos casos

Nota: Hacer un PING hacia internet (Modulo de Internet - Botón Consultas – PING 8.8.8.8)`;
}