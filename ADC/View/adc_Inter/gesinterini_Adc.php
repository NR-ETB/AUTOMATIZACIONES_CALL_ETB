<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/style_inter.css">
    <link rel="stylesheet" href="../css/comp.css">
    <title>Gestion Internet - ADC</title>
</head>
<body>

<?php include('../components/dashboard_gen.php'); ?>

    <!-- PREGUNTAS DE SONDEO -->
    <div class="cards" id="quest">

        <h1>Preguntas de Sondeo</h1>

        <div class="body-card">
            <div class="question_1">
                <textarea name="" id="que" disabled>¿El modem tiene algún led en rojo? 🔴</textarea>
            </div>
        </div>

        <div class="body-card">
            <div class="question_2">
                <textarea name="" id="que" disabled>¿Hay algún cable roto en el predio o en la afuera del mismo? 🙁🔌</textarea>
            </div>
        </div>

        <div class="body-card">
            <div class="question_3">
                <textarea name="" id="que" disabled>¿La falla es por cable o wifi?</textarea>
            </div>
        </div>

        <div class="body-card">
            <div class="question_4">
                <textarea name="" id="que" disabled></textarea>
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
                    <p>LED EN ROJO</p>
                </div>
            </div>

            <div class="menu" onclick="two();">
                <div>
                    <img src="../images/escen.png" alt="">
                    <p>INTERMITENCIA Y LENTITUD 
                    <br>FTTH</p>
                </div>
            </div>

        </div>

        <div class="container-menu">

            <div class="menu" onclick="three();">
                <div>
                    <img src="../images/escen.png" alt="">
                    <p>CONECTA NO NAVEGA: CABLE</p>
                </div>
            </div>

            <div class="menu" onclick="four();">
                <div>
                    <img src="../images/escen.png" alt="">
                    <p>CONECTA NO NAVEGA: WIFI VARIOS DISPOSITIVOS</p>
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

        <!-- Aquí cargamos el mensaje en el textarea -->
        <div class="txt">
            <textarea name="respuestaTexto" id="respuestaTexto" disabled>
            </textarea>
        </div>
    </div>

</div>

<script src="../bootstrap/jquery.js"></script>
<script src="../bootstrap/bootstrap.bundle.min.js"></script>
<script src="../../Controller/inter/inter.js"></script>   
<script src="../../Controller/main.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/2.5.1/jspdf.umd.min.js"></script>
</body>
</html>