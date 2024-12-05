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

function updateAllNames() {
    // Obtener el valor del primer input
    const name = document.getElementById('nameInput').value.trim();

    // Asignar "xxxx" si el campo está vacío
    const finalName = name === "" ? "xxxx" : name;

    const textarea = document.getElementById('que2');
    textarea.value = `Señ@r ${finalName} por favor indícame el nombre de red a la que te encuentras conectad@

Señor@ permíteme 3 minutos y ya vuelvo contigo ⏳😄

Gestión asesor: Sigue los siguientes pasos y valídalos, en SUMA

1.	Validar a cuál red no le permite conectarse (2.4G/5.0G)
2.	Cambiar nombre y contraseña de red.
3.	Reaprovisionar servicios
4.	Validar con más de un dispositivo que conecte el servicio`;

    // Actualizar el contenido del textarea
    const textarea2 = document.getElementById('que3');
    textarea2.value = `Señ@r ${finalName} esta falla no es del servicio como tal ya que la presentas en un solo dispositivo puedes validar con tu técnico de confianza, ¿deseas que te colabore en algo más? 

Gestión asesor: enviar a encuesta si no requiere que le colabore en otro requerimiento`;

    const textarea3 = document.getElementById('que4');
    textarea3.value = `Señ@r ${finalName} vas a realizar una medición de velocidad con un computador conectado de manera directa al modem, no al extensor wifi, ni a la land switch, sin derivaciones, ni conexiones vpn 🧐 con un cable color amarillo utp de categoría (CAT 6) para velocidades superiores a 100 megas, lo vas a conectar en el puerto del modem (LAN 1 / DATOS 1). Lo puedes realizar por medio de este link https://etb.com/medidor/ 🔌💻`;
}

