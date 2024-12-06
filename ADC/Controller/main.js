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
    let params = `scrollbars=no,resizable=no,status=no,location=no,toolbar=no,menubar=no,
    width=0,height=0,left=-1020,top=-1000`;
    open('../../Model/documents/manADC.pdf', 'manual', params);
}

function copy() {
    // Obtener el elemento del que se copiará el texto
    const textElement = document.getElementById('respuestaTexto');

    // Verificar si el elemento existe y tiene contenido
    if (textElement && textElement.value.trim() !== "") {
        // Crear un campo de texto temporal para copiar
        const tempInput = document.createElement('textarea');
        tempInput.value = textElement.value; // Usamos el valor del textarea
        document.body.appendChild(tempInput);

        // Seleccionar y copiar el texto
        tempInput.select();
        document.execCommand('copy');

        // Eliminar el campo de texto temporal
        document.body.removeChild(tempInput);

        // Mensaje opcional para confirmar
        alert('Texto copiado al portapapeles');
    } else {
        alert('No hay texto disponible para copiar.');
    }
}