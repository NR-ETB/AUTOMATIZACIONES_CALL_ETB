$(document).ready(function() {
    // Cuando el valor del select cambia
    $('#bio2').css('bottom','850px');
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
}

function ques22() {
    $('#quest2').css('display','block');
    $('#quest3').css('display','none');
}

function ques3() {
    $('#quest3').css('display','none');
    $('#quest33').css('display','none');
    $('#quest4').css('display','block');
    $('#que2').css('bottom','2px');
    $('#bio2').css('bottom','840px');
}

function ques33() {
    $('#quest3').css('display','block');
    $('#quest4').css('display','none');
}

function ques4() {
    $('#quest4').css('display','none');
    $('#quest5').css('display','block');
    $('#que2').css('bottom','32px');
    $('#que2').css('height','100px');
    $('#bio2').css('bottom','900px');
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
    location.href='./gestvini_Adc.php';
}

function one() {
    location.href='./gestv_Adc.php';
}

function two() {
    location.href='./gestv_Adc2.php';
}

function three() {
    location.href='./gestv_Adc3.php';
}

function four() {
    location.href='./gestv_Adc4.php';
}

function actualizarTexto() {
    const selectRespuesta = document.getElementById("respuesta");
    const textarea = document.getElementById("respuestaTexto");

    const textos = {
        "1": "Verifica por favor un dispositivo tipo adaptador coaxial donde están conectados los decodificadores es de color blanco o negro🧐, confírmame si lo visualizas y me envías foto 📷.\n\nDesconecta uno de los cables y lo conectas directamente al modem🔌 en el puerto IPTV1 o IPTV2, prueba si el televisor ya tiene imagen 📺.\n\n(Si funciona de esta manera el daño esta en el HPNA y se debe enviar visita)",
    };

    const opcionSeleccionada = selectRespuesta.value;
    textarea.value = textos[opcionSeleccionada];

    console.log("Texto actualizado:", textarea.value);
}

function actualizarTexto2() {
    const selectRespuesta = document.getElementById("respuesta2");
    const textarea = document.getElementById("respuestaTexto");

    const textos = {
        "1": "Enviar visita",
        "2": "Verifica los siguientes filtros en plataforma (Portal SUMA) y solicítale un momento a tu cliente:\n\nFiltros en platafor\n\n•	Reiniciar los decos y la ONT\n\n•	Verificar plan tv comercial\n\n•	Normalizar plataformas\n\n•	Validar si la potencia en la ONT es menor a -27 dBm\n\n",
    };

    const opcionSeleccionada = selectRespuesta.value;
    textarea.value = textos[opcionSeleccionada];

    console.log("Texto actualizado:", textarea.value);
}

function actualizarTexto3() {
    const selectRespuesta = document.getElementById("respuesta3");
    const textarea = document.getElementById("respuestaTexto");

    const textos = {
        "1": "Enviar a encuesta",
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
    textarea.value = `Señor@ ${finalName} ¿la ausencia de señal es en todos los decodificadores? (de 3 decodificadores en adelante)`;

    const textarea2 = document.getElementById('que3');
    textarea2.value = `Señ@r ${finalName} permíteme que estoy realizando un reaprovisionamiento desde plataforma 🛠️ ¿Te funciona correctamente el/los decodificadores? 📺🔌`;
}