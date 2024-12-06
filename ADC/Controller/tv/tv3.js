$(document).ready(function() {
    // Cuando el valor del select cambia
    $('#bio2').css('bottom','1205px');
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
    $('#bio2').css('bottom','840px');
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
        "1": "Guion de finalización de chat",
        "2": "Continuar con el soporte",
    };

    const opcionSeleccionada = selectRespuesta.value;
    textarea.value = textos[opcionSeleccionada];

    console.log("Texto actualizado:", textarea.value);
}

let finalName = "xxxx"; // Valor inicial compartido

function updateAllNames() {
    // Obtener el valor del input
    const name = document.getElementById('nameInput').value.trim();

    // Asignar "xxxx" si está vacío
    finalName = name === "" ? "xxxx" : name;

    // Llamar a actualizarTexto2 para asegurar que se actualice según la selección
    actualizarTexto2();
}

function actualizarTexto2() {
    const selectRespuesta2 = document.getElementById("respuesta2");
    const textarea2 = document.getElementById("respuestaTexto");

    const textos = {
        "1": `Por favor conecta el nuevo cable o decodificador Señor@ ${finalName} para validar la conexión`,
        "2": `Verificar en suma el estado de los semáforos y validar con el cliente el cable HDMI o cable AV (Asesor)\n\nNOTA: Si aun el cliente no cuenta con servicio continuar con el soporte\n\nPara ambos casos\n\nVas a identificar el cable HDMI que está entre el televisor y el decodificador vas a intercambiar las puntas por favor, la punta que está conectada en el decodificador la pones en el televisor y la del televisor en el decodificador, luego en la parte trasera del decodificador hay un botón de encendido y apagado lo vas a apagar lo vuelves a encender y válidas 🔌📺 😀\n\nLuego vas a ubicar en el control del televisor el botón denominado input vas a oprimirlo, este te va a mostrar varias opciones, ahí vas a seleccionar el puerto de HDMI en el cual anteriormente hayas conectado el cable🔌📺\n\n`,
    };

    const opcionSeleccionada = selectRespuesta2.value;

    // Actualizar el textarea con el texto correspondiente a la opción seleccionada
    textarea2.value = textos[opcionSeleccionada];

    console.log("Texto actualizado:", textarea2.value);
}

function actualizarTexto3() {
    const selectRespuesta3 = document.getElementById("respuesta3");
    const textarea3 = document.getElementById("respuestaTexto");

    const textos = {
        "1": "Guion de finalización de chat\n\nXXX, fue un gusto atenderte, espero que te sientas muy satisfecho con la atención que te brindé ✨te recuerdo el radicado de tu solicitud xxx asociado al cun xxx, pero espera, antes de irte! 🤚Te quiero hacer una invitación😊. Por favor evalúa mi atención con la siguiente encuesta 🙏✍️ que me ayuda a continuar mejorando cada día y no te tomara más de un minuto, https://tinyurl.com/2kz62fde. Tu opinión es muy importante para nosotros. Ten en cuenta que a tu correo electrónico puede llegar otra encuesta donde tendrás la opción de calificar la atención recibida en este canal. 📲 A partir de este momento nuestra sesión ha finalizado. Los nuevos mensajes serán atendidos por nuestra agente virtual Luz. Gracias por escribirnos, hasta pronto.",
        "2": "Enviar visita técnica\n\nXXX, fue un gusto atenderte, espero que te sientas muy satisfecho con la atención que te brindé ✨te recuerdo el radicado de tu solicitud xxx asociado al cun xxx, pero espera, antes de irte! 🤚Te quiero hacer una invitación😊. Por favor evalúa mi atención con la siguiente encuesta 🙏✍️ que me ayuda a continuar mejorando cada día y no te tomara más de un minuto, https://tinyurl.com/2kz62fde. Tu opinión es muy importante para nosotros. Ten en cuenta que a tu correo electrónico puede llegar otra encuesta donde tendrás la opción de calificar la atención recibida en este canal. 📲 A partir de este momento nuestra sesión ha finalizado. Los nuevos mensajes serán atendidos por nuestra agente virtual Luz. Gracias por escribirnos, hasta pronto.",
    };

    const opcionSeleccionada = selectRespuesta3.value;
    textarea3.value = textos[opcionSeleccionada];

    console.log("Texto actualizado:", textarea3.value);
}