<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/style_line.css">
    <link rel="stylesheet" href="../css/comp.css">
    <title>Gestion Telefonica - ADC</title>
</head>
<body>

<?php include('../components/dashboard_gen.php'); ?>

    <!-- PREGUNTAS DE SONDEO -->
    <div class="cards" id="quest">

        <h1>Preguntas de Sondeo</h1>

        <div class="body-card">
            <div class="question_1">
                <textarea name="" id="que" disabled>¿Desde cuándo presentas falla en el teléfono? 📞❌</textarea>
            </div>
        </div>

        <div class="body-card">
            <div class="question_2">
                <textarea name="" id="que" disabled>¿Manejas alguna derivación? 📞</textarea>
            </div>
        </div>

        <div class="body-card">
            <div class="question_3">
                <textarea name="" id="que" disabled>Envíame foto de la conexión de la línea por favor 📞</textarea>
            </div>
        </div>

        <div class="body-card">
            <div class="question_4">
                <textarea name="" id="que" disabled>¿Has validado de manera interna el estado de las conexiones y con otro aparato telefónico? 🧐</textarea>
            </div>
        </div>

        <div class="body-card">
            <div class="question_5">
                <textarea name="" id="que" disabled></textarea>
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
                    <p>LINEA FTTH</p>
                </div>
            </div>

        </div>

        <div class="container-menu">

            <div class="menu2" style="opacity: 0;">
                <div>
                    <img src="../images/escen.png" alt="">
                    <p id="au">AUSENCIA DE SEÑAL VARIOS DECODIFICADORES O TOTAL IMAGEN PIXELADA IMAGEN CONGELADA</p>
                </div>
            </div>

            <div class="menu" onclick="two();">
                <div>
                    <img src="../images/escen.png" alt="">
                    <p>LINEA FTTC</p>
                </div>
            </div>

        </div>

    </div>

    <div class="bio2" id="bio2">
        <div class="data">
            <h3>Nombre:</h3>
            <input type="text" disabled>
        </div>

        <div class="data2">
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
<script src="../../Controller/line/line.js"></script>   
<script src="../../Controller/main.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/2.5.1/jspdf.umd.min.js"></script>
</body>
</html>