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
    $('#bio2').css('bottom','1240px ');
}

function ques33() {
    $('#quest3').css('display','block');
    $('#quest4').css('display','none');
}

function ques4() {
    $('#quest4').css('display','none');
    $('#quest5').css('display','block');
    $('#bio2').css('bottom','830px');
}

function ques44() {
    $('#quest4').css('display','block');
    $('#quest5').css('display','none');
}

function ques5() {
    $('#quest5').css('display','none');
    $('#quest6').css('display','block');
    $('#bio2').css('bottom','1000px');
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
    textarea.value = `¿La falla se presenta en todos los dispositivos o en algunos? 📱📲

Falla en un solo dispositivo
Valida con tu técnico de confianza

Falla en varios dispositivos
Señor / Señora ${finalName} Reinicia tu Modem 📲 valida la conexión en varios equipos por favor 📱📲💻

Nota: Falla por cable: Descartar equipos conectados en red como router o switch (Diferentes a los entregados por ETB).

Realice Ping a los DNS (200.75.51.132) o a una página y verificar respuesta. Si tiene perdidas

Señor@ vamos a realizar un reaprovisionamiento en su servicio 3 minutos y ya vuelvo contigo ⏳😄

Valida la potencia del modem y si en suma está bien los semáforos`;

    // Actualizar el contenido del textarea
    const textarea2 = document.getElementById('que3');
    textarea2.value = `Señor@ ${finalName} vamos a realizar una configuración de tarjeta de red, por favor conecta tu equipo por medio de un cable de red directamente conectado al modem 🔌 y realizas los siguientes pasos 😄💻

Cambiar como comunicarlo Por favor conecta tu equipo por medio de un cable de red directamente al modem.

Configuración de tarjeta de red:
1) Ingrese a la configuración de windows
2)Buscas configuración
3)Das click en Ethernet o red
4) Ethernet configuración avanzada
5) Opción cambiar configuración del adaptador 
6) Ethernet seleccionas Propiedades
7) Seleccionar protocolo de internet versión 4 (TCP/IPv4) Propiedades
8) Seleccionar usar la siguiente dirección Ip colocar (192.168.0 y segmento a seleccionar de la 3 a la 255
9) Seleccionar los DNS de ETB 200.75.51.132 en el prefijo y en el alternativo 200.75.51.133 y aceptar`;
}