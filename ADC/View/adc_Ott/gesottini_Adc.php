<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/style_ott.css">
    <link rel="stylesheet" href="../css/comp.css">
    <title>Gestion OTT - ADC</title>
</head>
<body>

<?php include('../components/dashboard_gen.php'); ?>

    <!-- PREGUNTAS DE SONDEO -->
    <div class="cards" id="quest">

        <h1>Preguntas de Sondeo</h1>

        <div class="body-card">
            <div class="question_1">
                <textarea name="" id="que" disabled>¿Cuentas con acceso a mi etb?</textarea>
            </div>
        </div>

        <div class="body-card">
            <div class="question_2">
                <textarea name="" id="que" disabled>Vas desinstalar la app de xxxx la vuelves a instalar y validas el acceso nuevamente 📱💻</textarea>
            </div>
        </div>

        <div class="body-card">
            <div class="question_3">
                <textarea name="" id="que" disabled>Envíame foto del error que te genera por favor 📷📸</textarea>
            </div>
        </div>

        <div class="body-card">
            <div class="question_4">
                <textarea name="" id="que" disabled>Gestión asesor: Verifícate según la falla y plataforma en la matriz de soporte, sigue los flujos guiados y le vas informando al cliente con tacto y buena actitud</textarea>
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
                    <p>CAMBIO DE CLAVE MIETB</p>
                </div>
            </div>

        </div>

        <div class="container-menu">

            <div class="menu2" style="opacity: 0;">
                <div>
                    <img src="../images/escen.png" alt="">
                    <p>CONECTA NO NAVEGA: CABLE</p>
                </div>
            </div>

            <div class="menu" onclick="four();">
                <div>
                    <img src="../images/escen.png" alt="">
                    <p>ELIMINAR REGISTRO MIETB</p>
                </div>
            </div>

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
<script src="../../Controller/ott/ott.js"></script>   
<script src="../../Controller/main.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/2.5.1/jspdf.umd.min.js"></script>
</body>
</html>