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

    <!-- PREGUNTA DECIMA -->
    <div class="cards" id="quest3">

        <h1 id="cod3">AUSENCIA DE SEÑAL VARIOS DECODIFICADORES O TOTAL, IMAGEN PIXELADA, IMAGEN CONGELADA</h1>

        <div class='body-card'>
            <div class='question_1'>
                <textarea id='que2' disabled>Señor@ xxxxx ¿la ausencia de señal es en todos los decodificadores? (de 3 decodificadores en adelante)</textarea>
            </div>
        </div>

        <!-- HTML para el formulario -->
            <div class="body-card">
                <div class="question_2">
                    <select name="respuesta" id="respuesta" onchange="actualizarTexto()"> <!-- Al cambiar, el formulario se enviará -->
                        <option value="0">Selecciona una Opción...</option> <!-- Opción vacía por defecto -->
                        <option value="1">SI</option>
                    </select>
                </div>
            </div>

        <button onclick="ques3(),empty()">Siguiente >></button>

    </div>

    <!-- PREGUNTA ONCE -->
    <div class="cards" id="quest4" style="display: none;">

        <h1 id="cod3">AUSENCIA DE SEÑAL VARIOS DECODIFICADORES O TOTAL, IMAGEN PIXELADA, IMAGEN CONGELADA</h1>

        <div class='body-card'>
            <div class='question_1'>
                <textarea id='que2' placeholder='Escribe aquí la pregunta' disabled>¿Te funciona correctamente el/los decodificadores? 📺🔌</textarea>
            </div>
        </div>

        <!-- HTML para el formulario -->
            <div class="body-card">
                <div class="question_2">
                    <select name="respuesta" id="respuesta2" onchange="actualizarTexto2()"> <!-- Al cambiar, el formulario se enviará -->
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

        <h1 id="cod">CODIGOS DE ERROR MAS COMUNES DE UN DECODIFICADOR</h1>

        <div class='body-card'>
            <div class='question_1'>
                <textarea id='que2' disabled>Señ@r xxxx permíteme que estoy realizando un reaprovisionamiento desde plataforma 🛠️ ¿Te funciona correctamente el/los decodificadores? 📺🔌</textarea>
            </div>
        </div>

        <!-- HTML para el formulario -->
            <div class="body-card">
                <div class="question_2">
                    <select name="respuesta" id="respuesta3" onchange="actualizarTexto3()"> <!-- Al cambiar, el formulario se enviará -->
                        <option value="0">Selecciona una Opción...</option> <!-- Opción vacía por defecto -->
                        <option value="1">SI</option>
                        <option value="2">NO</option>
                    </select>
                </div>
            </div>

        <div class="bot">
            <button onclick="one_ini(),empty()"><< FINALIZAR GESTION >></button>
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

        <div class="actin">
            <img id="actionn" src="../images/modal2.png" alt="">
            <img src="../images/touch1.png" alt="">
            <img id="actionn" src="../images/copy2.png" alt="">
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
<script src="../../Controller/tv/tv4.js"></script>   
<script src="../../Controller/main.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/2.5.1/jspdf.umd.min.js"></script>
</body>
</html>