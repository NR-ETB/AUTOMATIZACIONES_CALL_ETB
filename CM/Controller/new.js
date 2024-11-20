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
  
  

