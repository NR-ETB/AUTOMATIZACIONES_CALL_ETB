$(document).ready(function() {
    // Cuando el valor del select cambia
    $('#bio2').css('bottom','1240px');
    $('#respuesta')

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
    $('#bio2').css('bottom','1170px');
    $('#que2').css('bottom','1px');
}

function ques22() {
    $('#quest2').css('display','block');
    $('#quest3').css('display','none');
}

function ques3() {
    $('#quest3').css('display','none');
    $('#quest4').css('display','block');
    $('#bio2').css('bottom','845px');
}

function ques33() {
    $('#quest3').css('display','block');
    $('#quest4').css('display','none');
}

function ques4() {
    $('#quest3').css('display','none');
    $('#quest5').css('display','block');
    $('#bio2').css('bottom','1145px');
}

function ques44() {
    $('#quest4').css('display','block');
    $('#quest5').css('display','none');
}

function ques5() {
    $('#quest5').css('display','none');
    $('#quest6').css('display','block');
    $('#bio2').css('bottom','1115px');
}

function ques55() {
    $('#quest5').css('display','block');
    $('#quest6').css('display','none');
}

function ques6() {
    $('#quest6').css('display','none');
    $('#quest7').css('display','block');
    $('#bio2').css('bottom','995px');
}

function ques66() {
    $('#quest6').css('display','block');
    $('#quest7').css('display','none');
}

function ques7() {
    $('#quest7').css('display','none');
    $('#quest8').css('display','block');
    $('#bio2').css('bottom','1235px');
}

function ques9() {
    $('#quest3').css('display','none');
    $('#quest9').css('display','block');
    $('#bio2').css('bottom','1155px');
}

function ques10() {
    $('#quest9').css('display','none');
    $('#quest10').css('display','block');
    $('#bio2').css('bottom','1155px');
}

function ques11() {
    $('#quest10').css('display','none');
    $('#quest11').css('display','block');
    $('#bio2').css('bottom','830px');
}

function ques12() {
    $('#quest10').css('display','none');
    $('#quest12').css('display','block');
    $('#bio2').css('bottom','1000px');
}

function ques13() {
    $('#quest10').css('display','none');
    $('#quest13').css('display','block');
    $('#bio2').css('bottom','830px');
}

function ques14() {
    $('#quest13').css('display','none');
    $('#quest14').css('display','block');
    $('#bio2').css('bottom','900px');
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
        "2": "Continua con el soporte",
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
        "2": "Envía visita técnica e instancia administrativa",
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
        "2": "Envía visita técnica e instancia administrativa Gestión asesor: Antes de enviar visita técnica valida la configuración en portal suma; semáforos, reaprovisionamiento del servicio en ap y cambio de contraseña sí aplica.",
    };

    const opcionSeleccionada = selectRespuesta.value;
    textarea.value = textos[opcionSeleccionada];

    console.log("Texto actualizado:", textarea.value);
}

function actualizarTexto4() {
    const selectRespuesta = document.getElementById("respuesta4");
    const textarea = document.getElementById("respuestaTexto");

    const textos = {
        "1": "Señ@r xxxx por favor indicame la ip y puertos sobre los cuales necesitas realizar la apertura",
        "2": "Señ@r en el computador conectado al modem en datos 1 , vas a ejecutar el comando Windows R, te va salir una ventana y vas a escribir CMD le das enter , te aparece una ventana en negro y vas a escribir ipconfig le das enter y me envías una foto de la ip🤗💻",
    };

    const opcionSeleccionada = selectRespuesta.value;
    textarea.value = textos[opcionSeleccionada];

    console.log("Texto actualizado:", textarea.value);
}