$( document ).ready(function(){
    $('#hov3').css('opacity', '0.3');
    $('#hov1').css('opacity', '0');
    $('#hov2').css('opacity', '0');
    $('#hov4').css('opacity', '0');
    $('#hov5').css('opacity', '0');
});

function tabcli() {
    $('#modal-loading').modal('toggle')
    setTimeout(() => {
    $( document ).ready(function() {
        $('#modal-loading').modal('hide')
        $('#modal-vista').modal('toggle');
    });
  }, "4000");
}

document.addEventListener("DOMContentLoaded", function() {
    const codButton = document.getElementById("cod3");
    const codigosMenu = document.getElementById("codigo3");
  
    // Función para mostrar el menú cuando se pasa el cursor sobre el botón cod
    codButton.addEventListener("mouseover", function() {
      codigosMenu.style.display = "block";
    });
  
    // Función para ocultar el menú cuando se retira el cursor del botón cod
    codButton.addEventListener("mouseout", function() {
      codigosMenu.style.display = "none";
    });
  
    // Función para mantener el menú visible cuando se pasa el cursor sobre él
    codigosMenu.addEventListener("mouseover", function() {
      codigosMenu.style.display = "block";
    });
  
    // Función para ocultar el menú cuando se retira el cursor del menú
    codigosMenu.addEventListener("mouseout", function() {
      codigosMenu.style.display = "none";
    });

});

function btn_edi2() {
    window.location.href = './editMon2.php';
}

function btn_edi3() {
    window.location.href = './editMon3.php';
}

// Función para formatear la fecha y hora en el formato adecuado (yyyy-MM-ddThh:mm)
function setFechaHoraActual() {
  // Obtener la fecha y hora actuales
  var fechaActual = new Date();

  // Obtener el año, mes, día, horas y minutos
  var year = fechaActual.getFullYear();
  var month = String(fechaActual.getMonth() + 1).padStart(2, '0'); // Los meses en JavaScript son 0-indexados
  var day = String(fechaActual.getDate()).padStart(2, '0');
  var hour = String(fechaActual.getHours()).padStart(2, '0');
  var minute = String(fechaActual.getMinutes()).padStart(2, '0');

  // Formatear la fecha y hora como yyyy-MM-ddThh:mm
  var fechaHoraFormateada = year + '-' + month + '-' + day + 'T' + hour + ':' + minute;

  // Asignar el valor al campo datetime-local
  document.getElementById('fecha_hora_inicio').value = fechaHoraFormateada;
}

// Llamar a la función cuando la página cargue
window.onload = function() {
  setFechaHoraActual();
};