<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/style_tv.css">
    <link rel="stylesheet" href="../css/comp.css">
    <title>Gestion TV - ADC</title>
</head>
<body>

    <?php include('../components/dashboard_gen.php'); ?>

    <!-- PREGUNTA SIETE -->
    <div class="cards" id="quest3">

        <h1 id="cod">MAL CONECTADO EL DECO <img id="acti" src="../images/touch.png" alt=""></h1>

        <div class='body-card' id="great">
            <div class='question_1'>
                <textarea class="great2" id='que2' placeholder='Escribe aquí la pregunta' disabled>Paso 1. Acércate a la parte trasera del decodificador allí vas a identificar un cable que se parece al de la línea telefónica puede ser de color gris o amarillo lo desconectas por 10 segundos lo conectas nuevamente y luego verificas que la otra punta de ese mismo cable este en el modem en el puerto de IPTV1 o IPTV2, asegúrate de que las dos puntas estén bien conectadas 📺🔌 
                    
Paso 2. Desconecta el decodificador directamente de la toma eléctrica por 10 segundos y lo conectas de nuevo 🔌
                </textarea>
            </div>
        </div>

    </div>

    <!-- PREGUNTA SIETE PARTE DOS-->
    <div class="cards" id="quest33">

        <div class='body-card'>
            <div class='question_1'>
                <textarea id='que2' disabled>¿Funciona correctamente el/los decodificadores en falla? 📺🔌</textarea>
            </div>
        </div>

        <!-- HTML para el formulario -->
            <div class="body-card">
                <div class="question_2">
                    <select name="respuesta" id="respuesta" onchange="actualizarTexto()"> <!-- Al cambiar, el formulario se enviará -->
                        <option value="0">Selecciona una Opción...</option> <!-- Opción vacía por defecto -->
                        <option value="1">SI</option>
                        <option value="2">NO</option>
                    </select>
                </div>
            </div>

        <button onclick="ques3(),empty();">Siguiente >></button>

    </div>

    <!-- PREGUNTA OCHO -->
    <div class="cards" id="quest4" style="display: none;">

        <h1 id="cod">MAL CONECTADO EL DECO <img id="acti" src="../images/touch.png" alt=""></h1>

        <div class='body-card'>
            <div class='question_1'>
                <textarea id='que2' disabled>¿Puedes realizar la prueba con otro cable o decodificador? 📺🔌</textarea>
            </div>
        </div>

        <!-- HTML para el formulario -->
            <div class="body-card">
                <div class="question_2">
                    <select name="respuesta2" id="respuesta2" onchange="actualizarTexto2()"> <!-- Al cambiar, el formulario se enviará -->
                        <option value="0">Selecciona una Opción...</option> <!-- Opción vacía por defecto -->
                        <option value="1">SI</option>
                        <option value="2">NO</option>
                    </select>
                </div>
            </div>

        <button onclick="ques4(),empty();">Siguiente >></button>

    </div>

    <!-- PREGUNTA NOVENA -->
    <div class="cards" id="quest5" style="display: none;">

        <h1 id="cod">MAL CONECTADO EL DECO <img id="acti" src="../images/touch.png" alt=""></h1>

        <div class='body-card'>
            <div class='question_1'>
                <textarea id='que2' disabled>¿Te funciona correctamente el/los decodificadores en falla? 📺🔌</textarea>
            </div>
        </div>

        <!-- HTML para el formulario -->
            <div class="body-card">
                <div class="question_2">
                    <select name="respuesta3" id="respuesta3" onchange="actualizarTexto3()"> <!-- Al cambiar, el formulario se enviará -->
                        <option value="0">Selecciona una Opción...</option> <!-- Opción vacía por defecto -->
                        <option value="1">SI</option>
                        <option value="2">NO</option>
                    </select>
                </div>
            </div>

        <div class="bot">
            <button onclick="one_ini()"><< FINALIZAR GESTION >></button>
        </div>

    </div>

    <div class="bio2" id="bio2">
        <div class="data">
            <h3>Nombre:</h3>
            <input type="text">
        </div>

        <div class="data2">
            <h3>Dato:</h3>
            <input type="text">
        </div>

        <!-- Aquí cargamos el mensaje en el textarea -->
        <div class="txt">
            <textarea name="respuestaTexto" id="respuestaTexto" disabled>
            </textarea>
        </div>
    </div>

</div>

<script src="../bootstrap/jquery.js"></script>
<script src="../bootstrap/bootstrap.bundle.min.js"></script>
<script src="../../Controller/tv3.js"></script>   
<script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/2.5.1/jspdf.umd.min.js"></script>

</body>
</html>