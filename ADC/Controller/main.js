function home() {
    location.href='../adc_Home/home_Adc.php';
}

function tv() {
    location.href='../adc_Tv/gestvini_Adc.php';
}

function submitForm() {
    // Obtener el valor seleccionado
    var respuesta = document.getElementById('respuesta').value;

    // Crear un objeto FormData para enviar los datos
    var formData = new FormData();
    formData.append('respuesta', respuesta);

    // Realizar la petición AJAX
    var xhr = new XMLHttpRequest();
    xhr.open('GET', 'gestv_Adc2.php', true); // Cambia 'tu_archivo_php.php' al nombre de tu archivo PHP
    xhr.onload = function() {
        if (xhr.status === 200) {
            // Aquí puedes actualizar el textarea con la respuesta
            document.getElementById('que2').value = xhr.responseText;
        }
    };
    xhr.send(formData);
}
