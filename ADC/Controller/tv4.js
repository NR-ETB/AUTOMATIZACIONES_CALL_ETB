$(document).ready(function() {
    // Cuando el valor del select cambia
    $('#bio2').css('bottom','850px');
    $('#respuesta').change(function() {
        var respuestaId = $(this).val(); // Obtener el valor seleccionado

        if (respuestaId) {
            // Enviar solicitud AJAX al servidor
            $.ajax({
                url: '', // La misma página
                type: 'GET',
                data: { respuesta: respuestaId }, // Enviar el parámetro 'respuesta'
                success: function(data) {
                    // Procesar la respuesta del servidor
                    var respuestaTexto = $(data).find('#respuestaTexto').val(); // Buscar el nuevo texto
                    $('#respuestaTexto').val(respuestaTexto); // Mostrarlo en el textarea
                },
                error: function() {
                    alert("Ocurrió un error al procesar la solicitud.");
                }
            });
        }
    });
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
    // Vaciar el textarea
    $('#respuestaTexto').val('');
    console.log("El textarea ha sido vaciado.");
    
    // Restablecer todos los selectores a su primer valor (por ejemplo, el valor vacío o predeterminado)
    $('select').each(function() {
        // Vuelve a establecer el valor del select al primero (valor vacío)
        $(this).val($(this).find('option:first').val());
    });

    console.log("Todos los selects han sido reiniciados.");
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