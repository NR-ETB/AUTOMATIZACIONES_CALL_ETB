<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/style_line.css">
    <link rel="stylesheet" href="../css/comp.css">
    <title>Gestion OTT - ADC</title>
</head>
<body>

<?php include('../components/dashboard_gen.php'); ?>

    <!-- PREGUNTA SESIS -->
    <div class="cards" id="quest2">

        <h1 id="cod">ELIMINAR REGISTRO MIETB</h1>

        <div class="body-card" style="height: 230px;">
            <div class="question_1">
                <textarea id="que2" style="height: 370px;" disabled>Opción desde back operativo

Vamos a realizar un pre registro, te voy a eliminar el registro desde el sistema y vas volver a registrarte y validas 📱💻 </textarea>
            </div>
        </div>

        <div class="body-card" style="height: 360px;">
            <div class="question_1">
                <textarea id="que2" style="height: 370px;" disabled>Opción desde la página de ETB

Para el registro de mi etb lo puedes hacer por medio de nuestra app  mi etb la puedes descargar por medio de la APP STORE o PLAY STORE totalmente gratis 📱, la descargas te registras y podrás consultar y pagar tu factura, activar servicios, solicitar trámites y mucho más o también puedes hacerlo por medio del link https://mietb.etb.com/login/ en la opción de registrate </textarea>
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

        <!-- Aquí cargamos el mensaje en el textarea -->
        <div class="txt">
            <textarea name="respuestaTexto" id="respuestaTexto" disabled></textarea>
        </div>
    </div>

</div>

<script src="../bootstrap/jquery.js"></script>
<script src="../bootstrap/bootstrap.bundle.min.js"></script>
<script src="../../Controller/ott/ott3.js"></script>   
<script src="../../Controller/main.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/2.5.1/jspdf.umd.min.js"></script>
</body>
</html>