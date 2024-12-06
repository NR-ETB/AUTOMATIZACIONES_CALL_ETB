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

    <!-- PREGUNTAS DE SONDEO -->
    <div class="cards" id="quest">

        <h1>Preguntas de Sondeo</h1>

        <div class="body-card">
            <div class="question_1">
                <textarea name="" id="que" disabled>¿Cuántos decodificadores manejas? 📺 (Validar inventario de decos)</textarea>
            </div>
        </div>

        <div class="body-card">
            <div class="question_2">
                <textarea name="" id="que" disabled>¿Desde cuándo se presenta la falla y cuantos decodificadores están en falla? 📺❌</textarea>
            </div>
        </div>

        <div class="body-card">
            <div class="question_3">
                <textarea name="" id="que" disabled>Envíame foto del o los decodificadores que presenten falla por favor 📷📺</textarea>
            </div>
        </div>

        <div class="body-card">
            <div class="question_4">
                <textarea name="" id="que" disabled>Envíame una foto de la parte trasera del modem y decodificador, en la parte de las conexiones 📸🔌</textarea>
            </div>
        </div>

        <div class="body-card">
            <div class="question_5">
                <textarea name="" id="que" disabled>¿Te aparece algún código de error en el televisor? 📺</textarea>
            </div>
        </div>

        <button onclick="ques_ini();">Siguiente >></button>

    </div>

    <!-- PREGUNTA SESIS -->
    <div class="cards" id="quest2" style="display: none;">

        <h1 id="cod2">SELECCIONA LA GESTION A APLICAR...</h1>

        <div class="container-menu">

            <div class="menu" onclick="one();">
                <div>
                    <img src="../images/escen.png" alt="">
                    <p>CÓDIGOS DE ERROR MAS COMUNES DECODIFICADOR</p>
                </div>
            </div>

            <div class="menu" onclick="two();">
                <div>
                    <img src="../images/escen.png" alt="">
                    <p>MAL CONECTADO EL DECO</p>
                </div>
            </div>

        </div>

        <div class="container-menu">

            <div class="menu" onclick="three();">
                <div>
                    <img src="../images/escen.png" alt="">
                    <p id="au">AUSENCIA DE SEÑAL VARIOS DECODIFICADORES O TOTAL IMAGEN PIXELADA IMAGEN CONGELADA</p>
                </div>
            </div>

            <div class="menu" onclick="four();">
                <div>
                    <img src="../images/escen.png" alt="">
                    <p>PROCESO SUSCRIBER ID</p>
                </div>
            </div>

        </div>

    </div>

    <div class="bio2" id="bio2">
        <div class="data" id="dat">
            <h3>Nombre:</h3>
            <input type="text" disabled>
        </div>

        <div class="data2" id="data2">
            <h3>Dato:</h3>
            <input type="text" disabled>
        </div>

        <div class="actin">
            <img src="../images/modal.png" alt="">
            <img src="../images/touch1.png" alt="">
            <img id="actionn" src="../images/pdf2.png" alt="" onclick="man();">
            <img src="../images/copy.png" alt="">
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
<script src="../../Controller/tv/tv.js"></script>   
<script src="../../Controller/main.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/2.5.1/jspdf.umd.min.js"></script>
</body>
</html>