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