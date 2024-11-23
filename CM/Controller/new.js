$( document ).ready(function(){
    $('#hov2').css('opacity', '0.3');
    $('#hov1').css('opacity', '0');
    $('#hov3').css('opacity', '0');
    $('#hov4').css('opacity', '0');
    $('#hov5').css('opacity', '0');
});

document.addEventListener("DOMContentLoaded", function() {
    const codButton = document.getElementById("cod");
    const cod2Button = document.getElementById("cod2");
    const codigosMenu = document.getElementById("codigo");
    const codigosMenu2 = document.getElementById("codigo2");
  
    // Función para mostrar el menú cuando se pasa el cursor sobre el botón cod
    codButton.addEventListener("mouseover", function() {
      codigosMenu.style.display = "block";
    });
  
    // Función para ocultar el menú cuando se retira el cursor del botón cod
    codButton.addEventListener("mouseout", function() {
      codigosMenu.style.display = "none";
    });
  
    // Función para mostrar el menú cuando se pasa el cursor sobre el botón cod2
    cod2Button.addEventListener("mouseover", function() {
      codigosMenu2.style.display = "block";
    });
  
    // Función para ocultar el menú cuando se retira el cursor del botón cod2
    cod2Button.addEventListener("mouseout", function() {
      codigosMenu2.style.display = "none";
    });
  
    // Función para mantener el menú visible cuando se pasa el cursor sobre él
    codigosMenu.addEventListener("mouseover", function() {
      codigosMenu.style.display = "block";
    });
  
    // Función para ocultar el menú cuando se retira el cursor del menú
    codigosMenu.addEventListener("mouseout", function() {
      codigosMenu.style.display = "none";
    });

    // Función para mantener el menú visible cuando se pasa el cursor sobre él
    codigosMenu2.addEventListener("mouseover", function() {
      codigosMenu2.style.display = "block";
    });
  
    // Función para ocultar el menú cuando se retira el cursor del menú
    codigosMenu2.addEventListener("mouseout", function() {
      codigosMenu2.style.display = "none";
    });

});

function btn_ne2() {
    window.location.href = './newMon2.php';
}

function btn_ne3() {
    window.location.href = './newMon3.php';
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
  
  

